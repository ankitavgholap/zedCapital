<?php

date_default_timezone_set("Asia/Kolkata");
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "db_gurukrupa";
$db = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Database Connection Problem a");mysqli_select_db($db, $mysql_database) or die("Database Connection Problem b");

?>