<?php

  session_start();
  if(!isset($_SESSION['username'])) 
    {
        $_SESSION['pagename'] = basename($_SERVER['PHP_SELF']);
		header("location: ../login/index.php");
		exit();
	}
	$session_admin_name = $_SESSION['username'];
	$new_date = $_SESSION['dates'];
	//echo $new_date;
	
	
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
		
		
		<div class="content-wrapper">
		
	
		
       
        
        <?php 
        
            $mounth=$_POST['mounth'];
            $year=$_POST['year'];
            $startdate =$_POST['startdate'];
            $table_name=$_POST['table_name'];
            $dates = $startdate."-".$mounth."-".$year;
            $dates = (string)$dates;
            
            //echo " ".$mounth."-- ".$year."-- ".$startdate."-- ".$table_name."-- ".$dates;
            
            if($_SESSION['dates'])
            {
                $dates = (string)$_SESSION['dates'];
            }
            //echo " ".$dates;
            $id = $_GET['id'];
            $sql = $link->query("SELECT * FROM vendors WHERE id ='$id'");
            $f4 = $sql->fetch();
        ?>
		
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
			
			
			
			<div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Transaction in <?php echo $dates; ?></h3>
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
                        <th>Wait</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      
                    <?php
                      
                      $table_name1 = trim($f4[5]);
                      $table_name1 = (string)$table_name1;
                      //$dates = (string)date("d-m-Y");
                      $query1 = "SELECT * FROM $table_name1 WHERE Ddate ='$dates'";
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
        						<td><a href="#edit_tra<? echo $row['id']; ?>" class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
        						    <a href="#delete_tra<? echo $row['id']; ?>" class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
        					    </td>
                        </tr>
                        <?php include('delete_tran1.php'); ?>
                        <?php include('edit_transaction1.php'); ?>
                      <?php endforeach ?>
                      
                      
					</tbody>
				  </table>
				  <br>
				  </div>
			  </div>
			</div>		
		  </div>
</section>


	
	
	
	
	

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
