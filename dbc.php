<?php
$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "ecalendar";
$conn = mysql_connect($db_host,$db_username,$db_pass) or die("Couldn't not connect to database");
mysql_select_db($db_name) or die("No database");
?>