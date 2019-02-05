<?php

 include '../../login/config.php';
 $count = 0;
  try 
  {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $phone=$_POST['phone'];
      $Business_Name=$_POST['Business_Name'];
      $Address=$_POST['Address'];
      $timestamp = time();
        
     function random_password( $length = 8 ) 
     {
         $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
         $password = substr( str_shuffle( $chars ), 0, $length );
         return $password;
     }
     
      $password = random_password(8);
      
      $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
      $sql = "INSERT INTO vendors(Name, Email, Phone, Date, Password, Business_Name, Address) VALUES ('$name', '$email', '$phone', '$timestamp', '$password', '$Business_Name', '$Address')";       
     
      if($link->exec($sql))
          $count++;
      else
        echo "jayesh";
  }
catch(PDOException $e)
    {
    //$msg = $sql . "<br>" . $e->getMessage();
    }
      
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $link->query("SELECT id FROM vendors ORDER BY id DESC LIMIT 1");
    $id = $q->fetch();
    
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['id'] = $id[0];
    
    if($count!=0)
    header('location: db_creation.php');
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
  <li>Make sure you have entered a correct email id.<b><?php echo $_SESSION['email']; ?></b> </li>
  <li>May be connection didn't work</li>
  <li>Try once more</li>
</ul>
<a href="../"><button type="button" class="btn btn-primary">Go Back</button></a>
  </div>
     
</div>

</body>
</html>

    
    
    
    
    
    
    
    
