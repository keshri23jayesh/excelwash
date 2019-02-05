<?php

  session_start();
  if(!isset($_SESSION['username'])) 
        {
        $_SESSION['pagename'] = basename($_SERVER['PHP_SELF']);
		header("location: index.php");
		exit();
	}
	$session_admin_name = $_SESSION['username'];
	
	//echo "jayesh";
    //echo $session_admin_name;

?>


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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

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


</head>

<body class="skin-blue">

	<div class="wrapper">

		<?php include('mainheader1.php');?>
                <?php include('mainsidebar1.php');?>
		
		
		<div class="content-wrapper">
		
		<section class="content-header">
          <h1>
            <small></small>
          </h1>
        </section>
		
<section class="content">	
			 
			 <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Add Channel </h3>
              
			  <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            
			<div class="box-body">	
				
				
           <div id="maintable">
              
				<form action="connect.php" method="post" class = "form-group" >
                        <div id="ac">
						 <div class="row">
						 
						
			     <div class="col-xs-3 col-sm-3 col-md-3">
			     </div>				
                            <div class="col-xs-6 col-sm-6 col-md-6">
							<span>Channel Name: </span><input type="text" name="remark" class = "form-control" />
                            
                            </div>
                            
			     <div class="col-xs-3 col-sm-3 col-md-3">
			     </div>
			    </div> 
			    <div class="row">
			     <div class="col-xs-3 col-sm-3 col-md-3">
			     </div>				
                            
							<div class="col-xs-6 col-sm-6 col-md-6">
							<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="ADD" />
                            </div>
                            <div class="col-xs-3 col-sm-3 col-md-3">
			     </div>
			     </div>
                            
						 </div>
				
						</form>
                    
	
	
	
	   </div>
</div>
				
			
			</div>
			<section>
			<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Current Channels</h3>
              
			  <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
			<div>
			
			<table class="table table-striped table-bordered table-hover" style="width:100%" id="dataTables-example">
                     <thead>
											<tr>
											    <th width="90%">Channel</th>
											    <th width="10%">Delete</th>
											</tr>
										</thead>
					 
					 
					 <?php	
					 include 'config.php';
                       
                       $fetchD = $link->prepare("SELECT * FROM chanel");
                       $fetchD->execute();//executing the query
                       $resultArr = array();//to store results
                          while($row = $fetchD->fetch())
                              {
                            ?>
							<tr>
                            <td><b><?php echo $row['remark']; ?></b></td>
                            <td> 
                <a href="deletecust.php?id=<?php echo $row['id']; ?>" class="btn btn-danger delbutton" title="Click To Delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
							</tr>
                        <?php	
                              } 
                            ?>
                                
                    </table>
			
			
			</div>
			
			</div>
			</section>
             			
	              
		</div>		
				
	<?php include('footer.php');?>

<!-- /.row -->


</div>
<!-- /#wrapper -->

<!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
<!-- Custom Theme JavaScript -->

<script src="./dist/js/sb-admin-2.js"></script>
<script>
	$('.carousel').carousel({
        interval: 3000 //changes the speed
    })
</script>

</body>

</html>
