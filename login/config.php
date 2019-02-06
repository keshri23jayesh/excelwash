<?php
/* Database config */
$db_host		= 'localhost';
$db_user		= 'tedxbank_amansir';
$db_pass		= 'amansir@123';
$db_database	= 'tedxbank_amansir'; 

/* End config */

$link = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>