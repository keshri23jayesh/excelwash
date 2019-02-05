<?php

      include '../../login/config.php';
        
      $id = $_POST['id'];
      $Name = $_POST['Name'];
      $Email = $_POST['Email'];
      $Phone = $_POST['Phone'];
      
    
    
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
    $sql = "UPDATE vendors SET Name = '$Name', Email = '$Email', Phone = '$Phone'  WHERE id = '$id'";
	
	$link->exec($sql);
		
	header('location: ../vendors_list.php');

?>
