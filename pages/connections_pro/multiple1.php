<?php

        include '../../login/config.php';
        $number = $_POST['number'];
        $idy = $_POST['idy'];
        $sql = $link->query("SELECT * FROM user");
        $f4 = $sql->fetch();
        session_start();
        $_SESSION['username'] = $f4[1];
        $a = "location: ../profile.php?id=";
        $a .= $idy; 
        echo $a;
        $table_name=$_POST['table_name'];
        $count = 0;
        $mounth=$_POST['mounth'];
        $year=$_POST['year'];
        $date =$_POST['startdate'];
        $shift = $_POST['shift'];
        $status = $_POST['status'];
        echo $number."<br>";
        $number++;
        $i = 0;
        if($number > 0)
        {
            //$count = $number;
            for($i=1;$i<=$number;$i++)
            {         
                $No_of_products = (int) $_POST['Number'.$i];
                if($No_of_products > 0)
                {
                          try
                          {
                              $Item=$_POST['Item'.$i];
                              list($part1, $pa) = explode('**', $Item);
                              $Product_Name = $part1;
                              $Service_cost = $pa;
                              $No_of_products=$_POST['Number'.$i];
                              //$idy = $_POST['idy'];
                              
                              $Date = $year."-".$mounth."-".$date;
                              $Ddate =(string)$Date;
                              
                              
                              
                              list($year,$mounth,$date) = explode('-',$Date);
                              
                              $Total_Cost = $Service_cost * $No_of_products;
                              
                              $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                
                              //today
                              
                              $search_query = "";
                              $search_query = $link->query("SELECT * FROM $table_name WHERE Product_Name ='$Product_Name' AND Ddate ='$Date'");
                              $f4 = $search_query->fetch();
                              if(!empty($f4))
                              {
                                  //$f4[2]    //service_cost
                                  $No_of_products += $f4[3];    //no of products
                                  $Total_Cost = $Service_cost * $No_of_products;    //total cost
                                  //$sql = "UPDATE $table_name SET status = '$status' WHERE id = '$id'";
                                  $sql = "UPDATE $table_name SET No_of_products = '$No_of_products' ,Total_Cost = '$Total_Cost' WHERE Product_Name ='$Product_Name' AND Ddate ='$Date'";
                                  if($link->exec($sql))
                                        $count++;
                                  else
                                        echo "jayesh<br>";
                              
                              }
                              else
                              {
                                  $sql = "INSERT INTO $table_name(Product_Name, Service_cost, No_of_products, Total_Cost, Ddate, date, mounth, year, status, shift) VALUES ('$Product_Name', '$Service_cost', '$No_of_products', '$Total_Cost', '$Date', '$date', '$mounth', '$year', '$status', '$shift')";
                                  if($link->exec($sql))
                                        $count++;
                                  else
                                        echo "jayesh<br>";
                              }
                              //today
                          }
                          catch(PDOException $e)
                          {
                                $msg = $sql . "<br>" . $e->getMessage();
                          }
                }
            }
        }
        
        $i--;
        echo "<br>".$i." ".$number;
        if(($i == $number) || ($number == 0))
        {header($a);}
       
 
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
 
 