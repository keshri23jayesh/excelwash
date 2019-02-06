<?php

 include '../../login/config.php';
 
        $idy = $_POST['idy'];
        $sql = $link->query("SELECT * FROM user");
        $f4 = $sql->fetch();
        session_start();
        $_SESSION['username'] = $f4[1];
        $a = "../profile.php?id=";
        $a .= $idy; 
        echo $a;
 
 $count = 0;
  try 
  {
      $Item=$_POST['Item'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number'];
      $idy = $_POST['idy'];
      
      $mounth=$_POST['mounth'];
      $year=$_POST['year'];
      $date =$_POST['startdate'];
      
      $Date = $year."-".$mounth."-".$date;
      $Ddate =(string)$Date;
      $status = $_POST['status'];
      $shift = $_POST['shift'];
      
      list($year,$mounth,$date) = explode('-',$Date);
      
      $table_name=$_POST['table_name'];
      
      $Total_Cost = $Service_cost * $No_of_products;
      
      //echo $Product_Name."<br>".$Service_cost."<br>".$No_of_products."<br>".$Date."<br>".$table_name."<br>".$date."<br>".$mounth."<br>".$year; 
      
      $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
      $sql = "INSERT INTO $table_name(Product_Name, Service_cost, No_of_products, Total_Cost, Ddate, date, mounth, year, status, shift) VALUES ('$Product_Name', '$Service_cost', '$No_of_products', '$Total_Cost', '$Date', '$date', '$mounth', '$year', '$status', '$shift')";
     
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
    {
        $sql = $link->query("SELECT * FROM user");
        $f4 = $sql->fetch();
        session_start();
            
        $_SESSION['username'] = $f4[1];
        $a = "location: ../profile.php?id=";
        $a .= $idy; 
        echo $a;
        header($a);
    }
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
<a href="<?php echo $a; ?>"><button type="button" class="btn btn-primary">Go Back</button></a>
  </div>
     
</div>

</body>
</html>

    
    
    
    
    
    
    
    
