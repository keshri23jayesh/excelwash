<?php
/* Database config */
$db_host		= 'localhost';
$db_user		= 'biharwq6_user';
$db_pass		= 'user20182018';
$db_database	= 'biharwq6_ewm'; 

/* End config */

$link = new PDO('mysql:host='.$db_host.';dbname='.$db_database, $db_user, $db_pass);
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>