<?php



/* Database config */

$db_host		= 'db5000248025.hosting-data.io';
$db_user		= 'dbu105701';
$db_pass		= 'Gonzalanthony22*';
$db_database	= 'dbs242279'; 

/* End config */



$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");

?>