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
            
            $mounth=$_POST['mounth'];
            $year=$_POST['year'];
            $Vendor=$_POST['Vendor'];
            $startdate =$_POST['startdate'];
            $enddate =$_POST['enddate'];
            
            $startdate1 =$_POST['startdate'];
            $enddate1 =$_POST['enddate'];
            
            $startdate = min($startdate,$enddate);
            $enddate = max($startdate1,$enddate1);
            
            
            
            $sql = $link->query("SELECT * FROM vendors WHERE Email ='$Vendor'");
            $f4 = $sql->fetch();
            
            $table_name=$f4[5];
            $table_name2=$f4[6];
            
            echo " ".$mounth." ".$year." ".$Vendor." ".$startdate." ".$enddate." ".$table_name." ".$table_name2;
            
            // $query1 = "SELECT * FROM $table_name WHERE mounth = '$mounth'";
            // $varible1 = $link->prepare($query1);
            // $varible1->execute();
            // $result = $varible1->fetchall();
        ?>
        
        
        <section class="content">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> <?php echo $f4[8]; ?>
                <small class="pull-right"><?php echo date("d-m-Y"); ?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
                <strong><?php echo $f4[1]; ?></strong><br>
                <?php echo $f4[9]; ?><br>
                
                Phone: <?php echo $f4[3]; ?><br/>
                Email: <?php echo $f4[2]; ?>
              </address>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table">
                  
                  <colgroup>
                    <col span="1" style="background-color:#b3b3b3">
                  </colgroup>
                
                <thead>
                  <tr>
                    <th>Products</th>  
                    <?php
                    
                    $que = "SELECT DISTINCT Ddate FROM $table_name WHERE date >= '$startdate' AND date <= '$enddate' AND mounth = '$mounth' ORDER BY Ddate ";
                    $vari = $link->prepare($que);
                    $vari->execute();
                    $dates = $vari->fetchall();
                    $dates = array_reverse($dates, true);
                    foreach($dates as $row): 
                    ?>
                     <th><?php echo $row['Ddate']; ?></th>
                    
                   <?php endforeach ?>
                   <th>Total</th>
                   <th>Price</th>
                   <th>Amount</th>
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
                    $sumtotal=0;
                    foreach($ProD as $row)
                    { 
                        //fetching the quantity of according to date
                        
                            $jay = $row['Product_Name'];
                            $row_as_prod = "SELECT Product_Name, Service_cost, No_of_products, Total_Cost, Ddate FROM $table_name WHERE date >= '$startdate' AND date <= '$enddate' AND mounth = '$mounth' AND Product_Name = '$jay' ORDER BY mounth";
                            $row_as_produ = $link->prepare($row_as_prod);
                            $row_as_produ->execute();
                            $row_as_product = $row_as_produ->fetchall();
                            
                        if($row_as_product) 
                        {
                        echo "<tr>";
                        echo "<td>". $row['Product_Name'] ."</td>";    
                        $total=0;
                            
                            foreach($dates as $dateasrow)
                            {
                                $total_no_of_product=0;
                                echo "<td>";
                                foreach($row_as_product as $rowaa)
                                {
                                    if($rowaa['Ddate'] == $dateasrow['Ddate'])
                                    {
                                        echo $rowaa['No_of_products'];
                                        $total += $rowaa['No_of_products']*$rowaa['Service_cost'];
                                    }
                                    else
                                    {
                                        echo "";
                                    }
                                    $total_no_of_product += $rowaa['No_of_products'];
                                    $price = $rowaa['Service_cost'];
                                }
                                echo "</td>";
                            }
                            echo "<td>".$total_no_of_product."</td>";
                            echo "<td>".$price."</td>";
                            echo "<td>".$total."</td>";
                            $sumtotal += $total;
                            $row_as_product="";
                            $total_no_of_product=0;
                            $total=0;
                            $price = 0;
                        echo "</tr>";
                        }
                    }
                    echo "<tr>";
                    echo "<td>TOTAL</td>";
                    foreach($dates as $dateasrow)
                            {
                                echo "<td></td>";
                            }
                   
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "<td>".$sumtotal."</td>";
                    echo "<tr>";
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
