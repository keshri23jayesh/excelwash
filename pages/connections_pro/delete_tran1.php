

<?php

 include '../../login/config.php';
 
 $count = 0;
  try 
  {
    
    $id = $_POST['id'];
    $table_name=$_POST['table_name'];
    $idy=$_POST['idy'];
    $dates=$_POST['dates'];
    
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
    $sql = "DELETE FROM $table_name WHERE id = '$id'";
    
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
        	$_SESSION['dates'] = $dates;
            $a = "location: ../previous_days.php?id=";
            $a .= $idy; 
            echo $a;
            header($a);
        }
        else
        echo "";
    ?>