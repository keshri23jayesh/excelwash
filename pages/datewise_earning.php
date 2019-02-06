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

<style>
table, th, td {
    border: 1px solid black !important;
}
</style>


</head>

<body class="skin-blue">

<div class="wrapper">

		<?php include('mainheader1.php');?>
        <?php include('mainsidebar1.php');?>
		
		<div class="content-wrapper">
        
        
        <?php
            
            $Vendor=$_POST['Vendor'];
            
            $startdate =$_POST['startdate'];
            $enddate =$_POST['enddate'];
            
            $startmounth=$_POST['startmounth'];
            $endmounth=$_POST['endmounth'];
            
            $startyear=$_POST['startyear'];
            $endyear=$_POST['endyear'];
            
            if($startyear > $endyear)
            {
                $swap='';
                $swap = $startyear;
                $startyear = $endyear;
                $endyear = $swap;
            }
            
            if($startmounth > $endmounth)
            {
                $swap='';
                $swap = $startmounth;
                $startmounth = $endmounth;
                $endmounth = $swap;
            }
            
            if($startmounth == $endmounth)
            {
                if($startdate > $enddate)
                {
                $swap='';
                $swap = $startdate;
                $startdate = $enddate;
                $enddate = $swap;
                }
            }
            
            $date1 = $startyear."-".$startmounth."-".$startdate;
            $date1 = str_replace(" ","",$date1);
            $date2 = $endyear."-".$endmounth."-".$enddate;
            $date2 = str_replace(" ","",$date2);
            
            //echo $date1;
            echo "<br>";
            //echo $date2;
            
            $time = strtotime($date1);
            $date1 = date('Y-m-d',$time);
            //echo $date1."<br>";
            
            $time = strtotime($date2);
            $date2 = date('Y-m-d',$time);
            //echo $date2;
            
            
            if($Vendor == "All")
            {
            
                  
                      $vids = $link->prepare("SELECT * FROM vendors");
                      $vids->execute();
                      $result = $vids->fetchAll();
                      $var = 0;
                   
                          foreach($result as $row)
                          {
                            $table_name = $row['transtion_table'];
                            $row_as_prod = "SELECT SUM(Total_Cost) FROM $table_name WHERE Ddate BETWEEN '$date1' AND '$date2'";
                            //$row_as_prod = "SELECT SUM(Total_Cost) FROM $table_name WHERE Ddate >= '$date1' AND Ddate <= '$date2'";
                            $row_as_produ = $link->prepare($row_as_prod);
                            $row_as_produ->execute();
                            $row_as_product = $row_as_produ->fetchall();
                            //echo $row_as_product["SUM(Total_Cost)"];
                            //print_r($row_as_product);
                            foreach($row_as_product as $jayes):
                            {
                                $var += $jayes['SUM(Total_Cost)'];
                            }
                            endforeach;
                          }
                      //echo $var;
                      //echo "ifflag";
             
            }
            else
            {
            
                      $vids = $link->prepare("SELECT * FROM vendors WHERE Email = '$Vendor'");
                      $vids->execute();
                      $result = $vids->fetchAll();
                      $var = 0;
                   
                          foreach($result as $row)
                          {
                            $table_name = $row['transtion_table'];
                            $row_as_prod = "SELECT SUM(Total_Cost) FROM $table_name WHERE Ddate BETWEEN '$date1' AND '$date2'";
                            //$row_as_prod = "SELECT SUM(Total_Cost) FROM $table_name WHERE Ddate >= '$date1' AND Ddate <= '$date2'";
                            $row_as_produ = $link->prepare($row_as_prod);
                            $row_as_produ->execute();
                            $row_as_product = $row_as_produ->fetchall();
                            //echo $row_as_product["SUM(Total_Cost)"];
                            //print_r($row_as_product);
                            foreach($row_as_product as $jayes):
                            {
                                $var += $jayes['SUM(Total_Cost)'];
                            }
                            endforeach;
                          }
                      //echo $var;
                      //echo "elseflag";
            
            }
            
            
        ?>
        
        
        <section class="content">
            <div class='row'>
              <div class='col-sm-12'>
                <div class='box box-primary'>
                  <div class='box-header with-border'>
                    <h3 class='box-title'>Ready</h3>
                   
                  </div><!-- /.box-header -->
                  <div class='box-body'>
                    <h3>Transaction Between <?php echo "<b>". $date1 ."</b> and <b>" . $date2 . "</b> is <b> ₹ ". $var ."</b>" ?></h3>
                    
                  </div><!-- /.box-body -->
                </div><!-- /.box -->
              </div><!-- /.col -->
             </div>
        </section>
        
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
