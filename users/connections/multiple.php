<?php

         include '../../login/config.php';
 
         $table_name=$_POST['table_name'];
         echo $table_name."<br>";
         $count = 0;
         $no_of_tran = $_POST['no_of_tran'];
         
 if($no_of_tran == 1)
 {
  try 
  {
      $Item=$_POST['Item1'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number1'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth1'];
      $year=$_POST['year1'];
      $date =$_POST['startdate1'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status1'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
 }
 elseif($no_of_tran == 2)
 {
  //1   
  try 
  {
      $Item=$_POST['Item1'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number1'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth1'];
      $year=$_POST['year1'];
      $date =$_POST['startdate1'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status1'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //1
  
  //2
    try 
  {
      $Item=$_POST['Item2'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number2'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth2'];
      $year=$_POST['year2'];
      $date =$_POST['startdate2'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status2'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //2
    
     
 }
 elseif($no_of_tran == 3)
 {
      //1   
  try 
  {
      $Item=$_POST['Item1'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number1'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth1'];
      $year=$_POST['year1'];
      $date =$_POST['startdate1'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status1'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //1
  
  //2
    try 
  {
      $Item=$_POST['Item2'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number2'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth2'];
      $year=$_POST['year2'];
      $date =$_POST['startdate2'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status2'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //2
  
  //3
      try 
  {
      $Item=$_POST['Item3'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number3'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth3'];
      $year=$_POST['year3'];
      $date =$_POST['startdate3'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status3'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //3
  
 }
 elseif($no_of_tran == 4)
 {
  
  //1   
  try 
  {
      $Item=$_POST['Item1'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number1'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth1'];
      $year=$_POST['year1'];
      $date =$_POST['startdate1'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status1'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //1
  
  //2
  try 
  {
      $Item=$_POST['Item2'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number2'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth2'];
      $year=$_POST['year2'];
      $date =$_POST['startdate2'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status2'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //2
  
  //3
  try 
  {
      $Item=$_POST['Item3'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number3'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth3'];
      $year=$_POST['year3'];
      $date =$_POST['startdate3'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status3'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //3
  
  //4
  try 
  {
      $Item=$_POST['Item4'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number4'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth4'];
      $year=$_POST['year4'];
      $date =$_POST['startdate4'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status4'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //4 
 }
 elseif($no_of_tran == 5)
 {
      //1   
  try 
  {
      $Item=$_POST['Item1'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number1'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth1'];
      $year=$_POST['year1'];
      $date =$_POST['startdate1'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status1'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //1
  
  //2
  try 
  {
      $Item=$_POST['Item2'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number2'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth2'];
      $year=$_POST['year2'];
      $date =$_POST['startdate2'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status2'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //2
  
  //3
  try 
  {
      $Item=$_POST['Item3'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number3'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth3'];
      $year=$_POST['year3'];
      $date =$_POST['startdate3'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status3'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //3
  
  //4
  try 
  {
      $Item=$_POST['Item4'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number4'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth4'];
      $year=$_POST['year4'];
      $date =$_POST['startdate4'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status4'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //4
  
    //5
  try 
  {
      $Item=$_POST['Item5'];
      list($part1, $pa) = explode('**', $Item);
      $Product_Name = $part1;
      $Service_cost = $pa;
      $No_of_products=$_POST['Number5'];
      //$idy = $_POST['idy'];
      
      $mounth=$_POST['mounth5'];
      $year=$_POST['year5'];
      $date =$_POST['startdate5'];
      
      $Date = $date."-".$mounth."-".$year;
      $Ddate =(string)$Date;
      $status = $_POST['status5'];
      
      list($date,$mounth,$year) = explode('-',$Date);
      
      $Total_Cost = $Service_cost * $No_of_products;
      
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
  //5
     
 }
    
    if($count!=0)
    {
        
        $idy = $_POST['idy'];
        echo $idy;
        $sql = $link->query("SELECT * FROM vendors WHERE id ='" .$idy. "'");
        $f4 = $sql->fetch();
        
        session_start();
        $_SESSION['email'] = $f4[2];
        $_SESSION['id'] = $f4[0];
        
        echo $_SESSION['email'];
        echo "<br>";
        echo $_SESSION['id'];
        echo "<br>";
        
        $b = "location: ";
        
        $a = "../all_Transactions.php";
        
        //$a .= $idy; 
        $b .= $a;
        echo $a;
        
        header($b);
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
    <h4>Error<?php echo $msg; ?></h4>      
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

    
    
    
    
    
    
    
    
