<?php

  session_start();
  if(!isset($_SESSION['email'])) 
    {
        $_SESSION['pagename'] = basename($_SERVER['PHP_SELF']);
		header("location: login/index.php");
		exit();
	}
	$session_admin_name = $_SESSION['email'];
	

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
        
        <section class="content-header">
          <h3>
            Hello!! 
            <?php echo $_SESSION['email']; ?>
          </h3>
          
        </section>
        
        <?php
            
            $mounth=$_POST['mounth'];
            $year=$_POST['year'];
            $table_name=$_POST['table_name'];
            $table_name2=$_POST['table_name2'];
            
            $query1 = "SELECT * FROM $table_name WHERE mounth = '$mounth'";
            $varible1 = $link->prepare($query1);
            $varible1->execute();
            $result = $varible1->fetchall();
            
        
        ?>
        
        
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> AdminLTE, Inc.
                <small class="pull-right">Date: 2/10/2014</small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong>Admin, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (804) 123-5432<br/>
                Email: info@almasaeedstudio.com
              </address>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Products</th>  
                    <?php
                    $que = "SELECT DISTINCT Ddate FROM $table_name WHERE mounth = '$mounth' ORDER BY mounth ";
                    $vari = $link->prepare($que);
                    $vari->execute();
                    $dates = $vari->fetchall();
                    $dates = array_reverse($dates, true);
                    foreach($dates as $row): 
                    ?>
                     <th><?php echo $row['Ddate']; ?></th>
                    
                   <?php endforeach ?>
                   <th>Price</th>
                   <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php
                    
                    //fetching the name of the product
                    $ProductName = "SELECT Product_Name FROM $table_name2";
                    $Pro = $link->prepare($ProductName);
                    $Pro->execute();
                    $ProD = $Pro->fetchall();
                    //end fetching the name of the product
                    
                    foreach($ProD as $row)
                    { 
                        //fetching the quantity of according to date
                        echo "<tr>";
                        echo "<td>". $row['Product_Name'] ."</td>";
                            $jay = $row['Product_Name'];
                            $row_as_prod = "SELECT Product_Name, Service_cost, No_of_products, Total_Cost, Ddate FROM $table_name WHERE mounth = '$mounth' AND Product_Name = '$jay' ORDER BY mounth";
                            $row_as_produ = $link->prepare($row_as_prod);
                            $row_as_produ->execute();
                            $row_as_product = $row_as_produ->fetchall();
                            
                            foreach($dates as $dateasrow)
                            {
                                $total="";
                                echo "<td>";
                                foreach($row_as_product as $rowaa)
                                {
                                    if($rowaa['Ddate'] == $dateasrow['Ddate'])
                                    {
                                        echo $rowaa['No_of_products'];
                                    }
                                    else
                                    {
                                        echo "";
                                    }
                                    $total += $rowaa['No_of_products'];
                                    $price = $rowaa['Service_cost'];
                                }
                                echo "</td>";
                                
                            }
                            echo "<td>".$price."</td>";
                            $total = $total * $price;
                            echo "<td>".$total."</td>";
                            $row_as_product="";
                            $total="";
                            $price = "";
                        echo "</tr>";
                    }
                    
                ?>
                
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-print"></i> Print</button>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include('footer.php');?>		
</div>


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
