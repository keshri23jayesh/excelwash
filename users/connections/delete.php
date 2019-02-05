<?php

 include '../../login/config.php';
 $count = 0;
  try 
  {
      $id = $_POST['id'];
      $table_name = $_POST['table_name'];
      $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      
      $sql = "DELETE FROM $table_name WHERE id = '$id'";
      $link->exec($sql);
      
  }
catch(PDOException $e)
    {
    $msg = $sql . "<br>" . $e->getMessage();
    }
    
    //if($count!=0)
    header('location: ../all_Transactions.php');
    //else
    echo "";
    
    ?>


    
    
    
    
    
    
    
    
