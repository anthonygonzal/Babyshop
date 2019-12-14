<?php
$mysql_hostname = "db5000248025.hosting-data.io";
$mysql_user = "dbu105701";
$mysql_password = "Gonzalanthony22*";
$mysql_database = "dbs242279";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>