<?php

 include '../../login/config.php';
 $count = 0;
  try 
  {
      $Product_Name=$_POST['Product_Name'];
      $Service_cost=$_POST['Service_cost'];
      $table_name=$_POST['table_name'];
      $timestamp = time();
      
      //echo $Product_Name.$Service_cost.$table_name; 
      
      
      $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
      $sql = "INSERT INTO $table_name(Product_Name, Service_cost) VALUES ('$Product_Name', '$Service_cost')";
     
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
    header('location: ../own_cost.php');
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
    <h1>Error</h1>      
    <p><?php echo $msg; ?></p>
    <ul>
  <li>Make sure you have entered a correct Product Name.<b><?php echo $Product_Name; ?></b> </li>
  <li>May be connection didn't work</li>
  <li>Try once more</li>
</ul>
<a href="../own_cost.php"><button type="button" class="btn btn-primary">Go Back</button></a>
  </div>
     
</div>

</body>
</html>

    
    
    
    
    
    
    
    
