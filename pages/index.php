<?php

  session_start();
  if(!isset($_SESSION['username'])) 
    {
        $_SESSION['pagename'] = basename($_SERVER['PHP_SELF']);
		header("location: ../login/index.php");
		exit();
	}
	$session_admin_name = $_SESSION['username'];
	
	//echo "jayesh";
    //echo $session_admin_name;

?>
<?php	include '../login/config.php'; ?>
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


	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('a[rel*=facebox]').facebox({
				loadingImage : 'src/loading.gif',
				closeImage   : 'src/closelabel.png'
			})
		})
	</script>


</head>

<body class="skin-blue">

	<div class="wrapper">

		<?php include('mainheader1.php');?>
        <?php include('mainsidebar1.php');?>
		
		
		<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
         
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>
                      
        <?php
                      $nRows = $link->query('select count(*) from vendors')->fetchColumn(); 
                      echo $nRows;
        ?>
                      
                      
                  </h3>
                  <p>Vendors Registered</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="vendors_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3> ₹ - 
                 <?php
                      $vids = $link->prepare("SELECT * FROM vendors");
                      $vids->execute();
                      $result = $vids->fetchAll();
                      $var = 0;
                      foreach($result as $row)
                      {
                        $table_name = $row['transtion_table'];
                        $row_as_prod = "SELECT SUM(Total_Cost) FROM $table_name";
                        $row_as_produ = $link->prepare($row_as_prod);
                        $row_as_produ->execute();
                        $row_as_product = $row_as_produ->fetchall();
                        //echo $row_as_product["SUM(Total_Cost)"];
                        
                        foreach($row_as_product as $row):
                        {
                            $var += $row['SUM(Total_Cost)'];
                        }
                        endforeach;
                      }
                      echo $var;
                 ?>
                  </h3>
                  <p>Total Transaction</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3> ₹ - 
                 <?php
                      $vids = $link->prepare("SELECT * FROM vendors");
                      $vids->execute();
                      $result = $vids->fetchAll();
                      $var = 0;
                      foreach($result as $row)
                      {
                        $table_name = $row['transtion_table'];
                        $day = date("d-m-Y");
                        $row_as_prod = "SELECT SUM(Total_Cost) FROM $table_name WHERE Ddate = '$day'";
                        $row_as_produ = $link->prepare($row_as_prod);
                        $row_as_produ->execute();
                        $row_as_product = $row_as_produ->fetchall();
                        echo $row_as_product["SUM(Total_Cost)"];
                        
                        foreach($row_as_product as $row):
                        {
                            $var += $row['SUM(Total_Cost)'];
                        }
                        endforeach;
                      }
                      echo $var;
                 ?>
                  </h3>
                  <p>Todays Transaction</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            
            
          </div><!-- /.row -->
          <!-- Main row -->
          
   
        
        <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Mounthly Revenue</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Month</th>
                      <th>₹</th>
                      
                    </tr>
                  <?php
                  $mounthname = date("m");
                      $vids = $link->prepare("SELECT * FROM vendors");
                      $vids->execute();
                      $result = $vids->fetchAll();
                      $var = 0;
                      for($i = 1 ; $i <= $mounthname ; $i++)
                      {
                          echo "<tr>";
                            echo "<td>".$i."</td>";
                            setlocale(LC_TIME, 'US');                                              
                            $monthName = strftime('%B', mktime(0, 0, 0, $i));
                            echo "<td>".$monthName."</td>";
                          foreach($result as $row)
                          {
                            $table_name = $row['transtion_table'];
                            $day = date("d-m-Y");
                            $row_as_prod = "SELECT SUM(Total_Cost) FROM $table_name WHERE mounth = '$i'";
                            $row_as_produ = $link->prepare($row_as_prod);
                            $row_as_produ->execute();
                            $row_as_product = $row_as_produ->fetchall();
                            echo $row_as_product["SUM(Total_Cost)"];
                            
                            foreach($row_as_product as $row):
                            {
                                $var += $row['SUM(Total_Cost)'];
                            }
                            endforeach;
                          }
                      echo "<td>".$var."</td>";
                      $var = 0;
                      //echo $var;
                      echo "</tr>";
                      }
                      ?>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->  
          

        </section><!-- /.content -->
        
        

        
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
                  <a href = "#bal" data-toggle = "modal" class="btn btn-block btn-info btn-lg text-center">Add Vendor</a>
                  </div><!-- /.box -->
                </div>
                <div class="col-md-3">
                <div class="box-body pad table-responsive">
                  <a href = "#print" data-toggle = "modal" class="btn btn-block btn-info btn-lg text-center">Print Monthly</a>
                  </div><!-- /.box -->
                </div>
                <div class="col-md-3">
                <div class="box-body pad table-responsive">
                  <a href = "#printdate" data-toggle = "modal" class="btn btn-block btn-info btn-lg text-center">Print b/w Dates</a>
                  </div><!-- /.box -->
                </div>
                
                </div>
              </div>
            </div><!-- /.col -->
          </div><!-- ./row -->
          
        </section>
        
        
            <div class="modal modal-primary" id="bal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <form action="connections/add_hospital.php" method="post" class ="form-group" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Vendor</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                                <div class="row">
                                    
                                        <div class="col-lg-6">
                                                <span><b>Name</b></span>
                                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                                        </div>
                                    
                                    
                                        <div class="col-lg-6">
                                                <span><b>Email</b></span>
                                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                        </div>
                                    
                                    
                                        <div class="col-lg-6">
                                                <span><b>Phone</b></span>
                                                <input type="number" name="phone" class="form-control" placeholder="Phone" required>
                                        </div>
                                        
                                        
                                        <div class="col-lg-6">
                                                <span><b>Business_Name</b></span>
                                                <input type="text" name="Business_Name" class="form-control" placeholder="Business_Name">
                                        </div>
                                        
                                        
                                        <div class="col-lg-6">
                                                <span><b>Address</b></span>
                                                <input type="text" name="Address" class="form-control" placeholder="Address">
                                        </div>
                                </div>
                            
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input class="btn btn-outline" type="submit" class ="form-control" value="Register" />
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
              </form>
            </div><!-- /.modal -->
          
          
            <div class="modal modal-primary" id="print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <form action="invoice.php" method="post" class ="form-group" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Print Mounnthly Receipt</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                                <div class="row">
                                    
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                  <label>Select Vendor</label>
                                                  <?php
                                                          $table_name = "vendors";
                                                          $table_name = (string)$table_name;
                                                          $query1 = "SELECT * FROM $table_name";
                                                          $varible1 = $link->prepare($query1);
                                                          $varible1->execute();
                                                          $result = $varible1->fetchAll();
                                                  ?>
                                                  
                                                  <select class="form-control" name="Vendor">
                                                  <?php foreach($result as $row): ?>
                                                    <option value="<? echo $row['Email']; ?>"><? echo $row['Email']; ?></option>
                                                  <?php endforeach ?>
                                                  </select>
                                                </div>
                                            </div>
                                        
                                    
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                  <label>Select Mounth</label>
                                                  <select class="form-control" name="mounth">
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="3">March</option>
                                                    <option value="4">April</option>
                                                    <option value="5">May</option>
                                                    <option value="6">June</option>
                                                    <option value="7">July</option>
                                                    <option value="8">Augest</option>
                                                    <option value="9">September</option>
                                                    <option value="10">October</option>
                                                    <option value="11">November</option>
                                                    <option value="12">December</option>
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
                                    
                                </div>
                            
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input class="btn btn-outline" type="submit" class ="form-control" value="Print" />
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
              </form>
            </div><!-- /.modal -->
            
            
            
            <div class="modal modal-primary" id="printdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <form action="datewise.php" method="post" class ="form-group" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Print b/w dates</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                                <div class="row">
                                    
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                  <label>Select Vendor</label>
                                                  <?php
                                                          $table_name = "vendors";
                                                          $table_name = (string)$table_name;
                                                          $query1 = "SELECT * FROM $table_name";
                                                          $varible1 = $link->prepare($query1);
                                                          $varible1->execute();
                                                          $result = $varible1->fetchAll();
                                                  ?>
                                                  
                                                  <select class="form-control" name="Vendor">
                                                  <?php foreach($result as $row): ?>
                                                    <option value="<? echo $row['Email']; ?>"><? echo $row['Email']; ?></option>
                                                  <?php endforeach ?>
                                                  </select>
                                                </div>
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
                                                  <label>Select Start Date</label>
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
                                                  <label>Select End Date</label>
                                                  <select class="form-control" name="enddate">
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
                                    
                                </div>
                            
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <input class="btn btn-outline" type="submit" class ="form-control" value="Print" />
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
              </form>
            </div><!-- /.modal -->
            
        
      </div><!-- /.content-wrapper -->
		
		
		
		
		
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
