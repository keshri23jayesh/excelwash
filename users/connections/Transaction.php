<?php

 include '../../login/config.php';
 $count = 0;
  try 
  {
      $Item=$_POST['Item'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number'];
      $Date = date("d-m-Y");
      $status = $_POST['status'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $table_name=$_POST['table_name'];
      
      $Total_Cost = $Service_cost * $No_of_products;
      
      //echo $Product_Name."<br>".$Service_cost."<br>".$No_of_products."<br>".$Date."<br>".$table_name."<br>".$date."<br>".$mounth."<br>".$year; 
      
      $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
      $sql = "INSERT INTO $table_name(Product_Name, Service_cost, No_of_products, Total_Cost, Ddate, date, mounth, year, status) VALUES ('$Product_Name', '$Service_cost', '$No_of_products', '$Total_Cost', '$Date', '$date', '$mounth', '$year', '$status')";
     
      if($link->exec($sql))
          $count++;
      else
        echo "jayesh";
  }
catch(PDOException $e)
    {
    $msg = $sql . "<br>" . $e->getMessage();
    }
    
    if($count!=0)
    header('location: ../all_Transactions.php');
    else
    echo "";
    
    ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h4>Error <?php echo $msg; ?></h4>      
    <p></p>
    <ul>
  <li>You are Repeating Product_Name in Same Date.<b></b> </li>
  <li>Please Delete Previous Entry.</li>
  <li>Try once more</li>
</ul>
<a href="../all_Transactions.php"><button type="button" class="btn btn-primary">Go Back</button></a>
  </div>
     
</div>

</body>
</html>

    
    
    
    
    
    
    
    
