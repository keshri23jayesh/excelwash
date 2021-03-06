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
            //echo $f4[6];
            $no_of_tran = $_POST['no_of_tran'];
        ?>
		
		<div class="content-wrapper">
	<section class="content">
    	<div class="row">
        	<div class="col-md-12">
        	    <div class="box box-primary">
                        <div class="box-header">
                          <h3 class="box-title">Quick Example</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form action="connections_pro/multiple.php" method="post" class ="form-group" >
                          <div class="box-body">
                            
                                               <div class="row"> 
                                                    <?php 
                                                        for($k=1; $k<=$no_of_tran; $k++) 
                                                        {
                                                    ?>
                                                        <div class="col-md-2">
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
                                                          
                                                          <select class="form-control" name="Item<?php echo $k; ?>">
                                                          <?php foreach($result as $row): ?>
                                                            <option value="<? echo $row['Product_Name']."**".$row['Service_cost']; ?>"><? echo $row['Product_Name']."<b>-</b>".$row['Service_cost']; ?></option>
                                                          <?php endforeach ?>
                                                          </select>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                        <div class="form-group">
                                                        <span><b>Number</b></span>
                                                        <input type="number" name="Number<?php echo $k; ?>" class="form-control" placeholder="No of Items">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                        <div class="form-group">
                                                          <label>Select Mounth</label>
                                                          <select class="form-control" name="mounth<?php echo $k; ?>">
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
                                                        <div class="col-md-2">
                                                        <div class="form-group">
                                                          <label>Select Date</label>
                                                          <select class="form-control" name="startdate<?php echo $k; ?>">
                                                          
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
                                                        <div class="col-md-2">
                                                        <div class="form-group">
                                                          <label>Select Year</label>
                                                          <select class="form-control" name="year<?php echo $k; ?>">
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                          </select>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                        <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control" name="status<?php echo $k; ?>">
                                                            <option value="Pending">Pending</option>
                                                            <option value="Washed">Washed</option>
                                                            <option value="Delivered">Delivered</option>
                                                        </select>
                                                    </div>
                                                        </div>
                                                    <?php 
                                                        }
                                                    ?>
                                                        
                                                        
                                                </div>
                                        
                            
                          </div><!-- /.box-body -->
                            
                            <input type="hidden" name="no_of_tran" value="<?php echo $no_of_tran; ?>">
                            <input type="hidden" name="table_name" value="<?php echo $f4[5]; ?>">
                            <input type="hidden" name="idy" value="<?php echo $_GET['id']; ?>">
                            
                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div><!-- /.box -->
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
