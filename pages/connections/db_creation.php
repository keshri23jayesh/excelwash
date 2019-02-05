<?php
    
    include '../../login/config.php';
    
    session_start();
    
    $email = $_SESSION['email'];
    $phone = $_SESSION['phone'];  
    $id = $_SESSION['id'];
    
    list($part1, $pa) = explode('@', $email);
    $part1 = str_replace(".","",$part1);
    
    $part2 = $part1;
    $part1 .= "_Transaction";
    $part2 .= "_Productlist";
    // echo $part1;
    // echo $part2;
    // echo $phone;
    
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    $a = "CREATE TABLE `tedxbank_amansir`.`$part1` ( `id` INT(255) NOT NULL AUTO_INCREMENT , `Product_Name` VARCHAR(255) NOT NULL , `Service_cost` VARCHAR(255) NOT NULL , `No_of_products` VARCHAR(255) NOT NULL , `Total_Cost` VARCHAR(255) NOT NULL , `Ddate` VARCHAR(255) NOT NULL , `date` VARCHAR(255) NOT NULL , `mounth` VARCHAR(255) NOT NULL , `year` VARCHAR(255) NOT NULL , `status` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;";
    $b = "CREATE TABLE `tedxbank_amansir`.`$part2` ( `id` INT(255) NOT NULL AUTO_INCREMENT , `Product_Name` VARCHAR(255) NOT NULL , `Service_cost` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`), UNIQUE (`Product_Name`)) ENGINE = MyISAM;";
    $c = "ALTER TABLE `tedxbank_amansir`.`$part1` ADD UNIQUE( `Product_Name`, `Ddate`);";
        $commands = [$a,$b,$c];
        $count = 0;
        foreach ($commands as $command) 
        {
            $link->exec($command);
            $count++;
        }
        echo $count;
        
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
    $sql = "UPDATE vendors SET transtion_table = '$part1', productlist_table = '$part2' WHERE id = '$id'";
	
	$link->exec($sql);    
	
	header('location: ../');
        
        
        
?>