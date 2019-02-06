<?php

  session_start();
  if(!isset($_SESSION['username'])) 
    {
        $_SESSION['pagename'] = basename($_SERVER['PHP_SELF']);
		header("location: ../login/index.php");
		exit();
	}
	$session_admin_name = $_SESSION['username'];
	
?>
<?php include '../login/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

    <title>Inventory</title>
	
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9] -->
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <!-- [endif]-->

	<link href="js/datepicker.js" rel="stylesheet">

	<link href="js/bootstrap-datepicker.min.js" rel="stylesheet">

	<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="lib/jquery.js" type="text/javascript"></script>
	<script src="src/facebox.js" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('a[rel*=facebox]').facebox({
				loadingImage : 'src/loading.gif',
				closeImage   : 'src/closelabel.png'
			})
		})
	</script>
<style>

table
{
   overflow-y:scroll !important;
   display:block !important;
}
</style>


</head>

<body class="skin-blue">

	<div class="wrapper">

		<?php include('mainheader1.php');?>
        <?php include('mainsidebar1.php');?>
		
		<?php 
            
            $id = $_GET['id'];
            $sql = $link->query("SELECT * FROM vendors WHERE id ='$id'");
            $f4 = $sql->fetch();
            $client_id = $id;
        ?>
		
		<div class="content-wrapper">
	
	<section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header">
                  <i class="fa fa-edit"></i>
                  <h3 class="box-title">Actions</h3>
                </div>
                
                <div class="row">
                    <div class="col-md-3">
                <div class="box-body pad table-responsive">
                  <a href = "#lasttran" data-toggle = "modal" class="btn btn-block btn-info btn-lg text-center">View Old Transaction</a>
                  </div><!-- /.box -->
                </div>
                <div class="col-md-3">
                <div class="box-body pad table-responsive">
                  <a href = "#bal" data-toggle = "modal" class="btn btn-block btn-info btn-lg text-center">Add New Product</a>
                  </div><!-- /.box -->
                </div>
                <div class="col-md-3">
                <div class="box-body pad table-responsive">
                  <a href = "#tran" data-toggle = "modal" class="btn btn-block btn-info btn-lg text-center">New Transaction</a>
                  </div><!-- /.box -->
                </div>
                <div class="col-md-3">
                <div class="box-body pad table-responsive">
                  <a href = "#addoldtran" data-toggle = "modal" class="btn btn-block btn-info btn-lg text-center">Add Old Transaction</a>
                  </div><!-- /.box -->
                </div>
                <div class="col-md-3">
                <div class="box-body pad table-responsive">
                  <a href = "#addmul" data-toggle = "modal" class="btn btn-block btn-info btn-lg text-center">Add Multiple Transaction</a>
                  </div><!-- /.box -->
                </div>
                <div class="col-md-3">
                <div class="box-body pad table-responsive">
                  <a href ="multiple_tran1.php?id=<?php echo $client_id; ?>" class="btn btn-block btn-info btn-lg text-center">Add Multiple Transaction</a>
                  </div><!-- /.box -->
                </div>
                </div>
              </div>
            </div><!-- /.col -->
          </div><!-- ./row -->
          
        </section>
	
        
		
		<section class="content">
          <div class="row">
            <div class="col-xs-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Profile Details</h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                 
                 <div class="box box-primary">
               
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputname1">Name</label>
                      <input type="email" class="form-control" id="exampleInputname1" value="<?php echo $f4[1]; ?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $f4[2]; ?>" readonly>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputphone1">Phone</label>
                      <input type="number" class="form-control" id="exampleInputphone1" value="<?php echo $f4[3]; ?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputpass1">Password</label>
                      <input type="text" class="form-control" id="exampleInputpass1" value="<?php echo $f4[7]; ?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputBusiness_Name1">Business Name</label>
                      <input type="text" class="form-control" id="exampleInputBusiness_Name1" value="<?php echo $f4[8]; ?>">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputAddress1">Address</label>
                      <input type="text" class="form-control" id="exampleInputAddress1" value="<?php echo $f4[9]; ?>">
                    </div>
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                  </div>
                </form>
              </div><!-- /.box -->
                 
				  <br>
				  </div>
			  </div>
			</div>
			<div class="col-xs-6">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Product</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                 
                 <div class="box box-primary">
               
                <!-- form start -->
                
                  <div class="box-body">
                    
                  
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                      
                  </div>
                    <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Service_cost</th>
                        <th>Wait</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                      $table_name = trim($f4[6]);
                      $table_name = (string)$table_name;
                      $query1 = "SELECT * FROM $table_name";
                      $varible1 = $link->prepare($query1);
                      $varible1->execute();
                      $result = $varible1->fetchAll();
                      //echo $result;
                      
                      //echo "jayesh";
                      
                      ?>
                      <?php foreach($result as $row): ?>
                        <tr>
                            
                                <td><? echo $row['id']; ?></td>
                                <td><? echo $row['Product_Name']; ?></td>
                                <td><? echo $row['Service_cost']; ?></td>
                                                        
        									<td>
        
        <a href="#delete_<? echo $row['id']; ?>" class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
        									
        									</td>
        
                        </tr>
                        <? include('delete_product.php'); ?>
                      <?php endforeach ?>
                      
                      
					</tbody>
				  </table>
            
            
            
              </div><!-- /.box -->
                 
				  <br>
				  </div>
			  </div>
			</div>
			
			
			<div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Todays Transaction</h3>
                  <br>
                  
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Service_cost</th>
                        <th>No_of_products</th>
                        <th>Total_Cost</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Shift</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      
                      $table_name = trim($f4[5]);
                      $table_name = (string)$table_name;
                      $dates = (string)date("d-m-Y");
                      $query1 = "SELECT * FROM $table_name WHERE Ddate ='$dates'";
                      $varible1 = $link->prepare($query1);
                      $varible1->execute();
                      $result = $varible1->fetchAll();
                      //echo $result;
                      
                      //echo "jayesh";
                      
                      ?>
                      <?php foreach($result as $row): ?>
                        <tr>
                                <td><? echo $row['id']; ?></td>
                                <td><? echo $row['Product_Name']; ?></td>
                                <td><? echo $row['Service_cost']; ?></td>
                                <td><? echo $row['No_of_products']; ?></td>
                                <td><? echo $row['Total_Cost']; ?></td>
                                <td><? echo $row['date']."-".$row['mounth']."-".$row['year']; ?></td>
                                <td><? echo $row['status']; ?></td>
                                <td><? echo $row['shift']; ?></td>
        						<td><a href="#edit_tra<? echo $row['id']; ?>" class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
        						    <a href="#delete_tra<? echo $row['id']; ?>" class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
        					    </td>
                        </tr>
                        <?php include('delete_tran.php'); ?>
                        <?php include('edit_transaction.php'); ?>
                      <?php endforeach ?>
					</tbody>
				  </table>
				  <br>
				  </div>
			  </div>
			</div>
			
			
			
		  </div>
</section>

<div class="modal modal-primary" id="addmul" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <form action="multiple_tran.php?id=<? echo $client_id; ?>" method="post" class ="form-group" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Multiple</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="no_of_tran">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input class="btn btn-outline" type="submit" class ="form-control" value="Submit" />
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
              </form>
            </div><!-- /.modal --> 
            



<div class="modal modal-primary" id="bal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <form action="connections_pro/add_hospital.php" method="post" class ="form-group" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Items</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                                <div class="row">
                                    
                                        <div class="col-lg-6">
                                                <span><b>Product_Name</b></span>
                                                <input type="text" name="Product_Name" class="form-control" placeholder="Product Name (should be unique)">
                                        </div>
                                        <div class="col-lg-6">
                                                <span><b>Service_cost</b></span>
                                                <input type="number" name="Service_cost" class="form-control" placeholder="Service_cost">
                                        </div>
                                        <input type="hidden" name="table_name" value="<?php echo $f4[6]; ?>">
                                        <input type="hidden" name="idy" value="<?php echo $_GET['id']; ?>">
                                </div>
                            
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input class="btn btn-outline" type="submit" class ="form-control" value="Submit" />
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
              </form>
            </div><!-- /.modal --> 

<div class="modal modal-primary" id="tran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <form action="connections_pro/Transaction.php" method="post" class ="form-group" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal Primary</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">  
                                <div class="row">
                                    
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                  <label>Product Name & Cost</label>
                                                  <?php
                                                          $table_name = trim($f4[6]);
                                                          $table_name = (string)$table_name;
                                                          $query1 = "SELECT * FROM $table_name";
                                                          $varible1 = $link->prepare($query1);
                                                          $varible1->execute();
                                                          $result = $varible1->fetchAll();
                                                  ?>
                                                  
                                                  <select class="form-control" name="Item">
                                                  <?php foreach($result as $row): ?>
                                                    <option value="<? echo $row['Product_Name']."**".$row['Service_cost']; ?>"><? echo $row['Product_Name']."<b>-</b>".$row['Service_cost']; ?></option>
                                                  <?php endforeach ?>
                                                  </select>
                                                </div>
                                            </div>
                                            
                                        <div class="col-lg-6">
                                                <span><b>Number</b></span>
                                                <input type="number" name="Number" class="form-control" placeholder="No of Items">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Pending">Pending</option>
                                                    <option value="Washed">Washed</option>
                                                    <option value="Delivered">Delivered</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Shift</label>
                                                <select class="form-control" name="shift">
                                                    <option value="Morning">Morning</option>
                                                    <option value="Evening">Evening</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <input type="hidden" name="table_name" value="<?php echo $f4[5]; ?>">
                                        <input type="hidden" name="idy" value="<?php echo $_GET['id']; ?>">
                                        
                                </div>
                            
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input class="btn btn-outline" type="submit" class ="form-control" value="Submit" />
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
              </form>
            </div><!-- /.modal --> 
            
<div class="modal modal-primary" id="lasttran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <form action="previous_days.php?id=<?php echo $_GET['id']; ?>" method="post" class ="form-group" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">View Old Transaction</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">  
                                <div class="row">
                                        
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                  <label>Select Mounth</label>
                                                  <select class="form-control" name="mounth">
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">Augest</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                  </select>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                  <label>Select Date</label>
                                                  <select class="form-control" name="startdate">
                                                  
                                                  <option value="01">01</option>
                                                  <option value="02">02</option>
                                                  <option value="03">03</option>
                                                  <option value="04">04</option>
                                                  <option value="05">05</option>
                                                  <option value="06">06</option>
                                                  <option value="07">07</option>
                                                  <option value="08">08</option>
                                                  <option value="09">09</option>
                                                  
                                                  <?php for($i=10; $i<32; $i++) 
                                                    { 
                                                    ?>
                                                    <option value="<? echo $i; ?>"><? echo $i; ?></option>
                                                  <?php 
                                                    } 
                                                    ?>
                                                  </select>
                                                </div>
                                            </div>
                                            
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                  <label>Select Year</label>
                                                  <select class="form-control" name="year">
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                  </select>
                                                </div>
                                        </div>
                                        
                                        <input type="hidden" name="table_name" value="<?php echo $f4[5]; ?>">
                                        <input type="hidden" name="idy" value="<?php echo $_GET['id']; ?>">
                                        
                                </div>
                            
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input class="btn btn-outline" type="submit" class ="form-control" value="Submit" />
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
              </form>
            </div><!-- /.modal --> 

<div class="modal modal-primary" id="addoldtran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <form action="connections_pro/Transaction1.php" method="post" class ="form-group" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Old Transaction</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">  
                                <div class="row">
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                  <label>Product Name & Cost</label>
                                                  <?php
                                                          $table_name = trim($f4[6]);
                                                          $table_name = (string)$table_name;
                                                          $query1 = "SELECT * FROM $table_name";
                                                          $varible1 = $link->prepare($query1);
                                                          $varible1->execute();
                                                          $result = $varible1->fetchAll();
                                                  ?>
                                                  
                                                  <select class="form-control" name="Item">
                                                  <?php foreach($result as $row): ?>
                                                    <option value="<? echo $row['Product_Name']."**".$row['Service_cost']; ?>"><? echo $row['Product_Name']."<b>-</b>".$row['Service_cost']; ?></option>
                                                  <?php endforeach ?>
                                                  </select>
                                                </div>
                                            </div>
                                            
                                        <div class="col-lg-6">
                                                <span><b>Number</b></span>
                                                <input type="number" name="Number" class="form-control" placeholder="No of Items">
                                        </div>
                                    
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                  <label>Select Mounth</label>
                                                  <select class="form-control" name="mounth">
                                                    <option value="01">January</option>
                                                    <option value="02">February</option>
                                                    <option value="03">March</option>
                                                    <option value="04">April</option>
                                                    <option value="05">May</option>
                                                    <option value="06">June</option>
                                                    <option value="07">July</option>
                                                    <option value="08">Augest</option>
                                                    <option value="09">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
                                                  </select>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                  <label>Select Date</label>
                                                  <select class="form-control" name="startdate">
                                                  
                                                  <option value="01">01</option>
                                                  <option value="02">02</option>
                                                  <option value="03">03</option>
                                                  <option value="04">04</option>
                                                  <option value="05">05</option>
                                                  <option value="06">06</option>
                                                  <option value="07">07</option>
                                                  <option value="08">08</option>
                                                  <option value="09">09</option>
                                                  
                                                  <?php for($i=10; $i<32; $i++) 
                                                    { 
                                                    ?>
                                                    <option value="<? echo $i; ?>"><? echo $i; ?></option>
                                                  <?php 
                                                    } 
                                                    ?>
                                                  </select>
                                                </div>
                                            </div>
                                            
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                  <label>Select Year</label>
                                                  <select class="form-control" name="year">
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                  </select>
                                                </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select class="form-control" name="status">
                                                    <option value="Pending">Pending</option>
                                                    <option value="Washed">Washed</option>
                                                    <option value="Delivered">Delivered</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Shift</label>
                                                <select class="form-control" name="shift">
                                                    <option value="Morning">Morning</option>
                                                    <option value="Evening">Evening</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="table_name" value="<?php echo $f4[5]; ?>">
                                        <input type="hidden" name="idy" value="<?php echo $_GET['id']; ?>">
                                        
                                </div>
                            
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input class="btn btn-outline" type="submit" class ="form-control" value="Submit" />
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
              </form>
            </div><!-- /.modal --> 	
	



<!-- /.row -->


</div>
<!-- /#wrapper -->
</div>
<?php include('footer.php');?>

<!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js" type="text/javascript"></script>
<!-- Custom Theme JavaScript -->

<script src="../dist/js/sb-admin-2.js"></script>
<script>
	$('.carousel').carousel({
        interval: 3000 //changes the speed
    })
</script>
<script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>


</body>

</html>
