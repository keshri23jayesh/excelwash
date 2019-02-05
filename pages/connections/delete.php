<?php

	include '../../login/config.php';
	if(isset($_GET['id']))
           {
        
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$uid = $_GET['id'];
// 		$vids = $link->prepare("SELECT * FROM vendors WHERE id = '".$uid."'");
//         $vids->execute();
//         $result = $vids->fetchAll();
        
//         echo sizeof($result);        
        
        $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $link->query("SELECT * FROM vendors WHERE id = '".$uid."'");
        $id = $q->fetch();
		//echo $id[0];
		
		$part1 = $id[5];
		$part2 = $id[6];
		
// 		$sql1 = "DROP TABLE ".$id[5]."";
// 		$link->exec($sql1);
		
// 		$sql2 = "DROP TABLE ".$id[6]."";
// 		$link->exec($sql2);
		
		
		$a = "DROP TABLE IF EXISTS `$part1`";
        $b = "DROP TABLE IF EXISTS `$part2`";
    
        $commands = [$a,$b];
        $count = 0;
        foreach ($commands as $command) 
        {
            $link->exec($command);
            $count++;
        }
		
		
		
		//DROP TABLE Shippers;
		
		$sql = "DELETE FROM vendors WHERE id = '".$_GET['id']."'";
		

		if($link->exec($sql))
                {
		        	header('location: ../vendors_list.php');
		        }
             }

?>