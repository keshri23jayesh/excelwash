<?php

        include '../../login/config.php';
        $number = $_POST['number'];
        $idy = $_POST['idy'];
        $sql = $link->query("SELECT * FROM user");
        $f4 = $sql->fetch();
        session_start();
        $_SESSION['username'] = $f4[1];
        $a = "../multiple_tran.php?id=";
        $a .= $idy; 
        echo $a;
        $table_name=$_POST['table_name'];
        $count = 0;
        
        echo $number."-".$idy."-".$table_name."-"."<br>";
        
        $number++;
        if($number > 0)
        {
            for($i=1;$i<=$number;$i++)
            {             
                          try
                          {
                              $Item=$_POST['Item'.$i];
                              list($part1, $pa) = explode('**', $Item);
                              $Product_Name = $part1;
                              $Service_cost = $pa;
                              $No_of_products=$_POST['Number'.$i];
                              //$idy = $_POST['idy'];
                              
                              $mounth=$_POST['mounth'.$i];
                              $year=$_POST['year'.$i];
                              $date =$_POST['startdate'.$i];
                              
                              $Date = $year."-".$mounth."-".$date;
                              $Ddate =(string)$Date;
                              $status = $_POST['status'.$i];
                              $shift = $_POST['shift'.$i];
                              
                              list($year,$mounth,$date) = explode('-',$Date);
                              
                              $Total_Cost = $Service_cost * $No_of_products;
                              
                              $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                   
                              $sql = "INSERT INTO $table_name(Product_Name, Service_cost, No_of_products, Total_Cost, Ddate, date, mounth, year, status) VALUES ('$Product_Name', '$Service_cost', '$No_of_products', '$Total_Cost', '$Date', '$date', '$mounth', '$year', '$status')";
                            
                              if($link->exec($sql))
                                    $count++;
                              else
                                    echo "jayesh<br>";
                          }
                          catch(PDOException $e)
                          {
                                $msg = $sql . "<br>" . $e->getMessage();
                          }
            }
        }
       
 
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
 
 