<?php 
include ("dbc.php");



	session_start();
	if(!(isset($_SESSION['authorized']) & $_SESSION['authorized'] === true)){
		header("location: login.php");	
	}






 $table_name = $_POST['table_name'];
 $table_row = $_POST['table_row'];
 $value = $_POST['value'];
 $desc = $_POST['desc'];


$sql = "INSERT INTO data_dictionary values ('','$table_name','$table_row','$value','$desc','1')";

mysql_query($sql);


header("location: data_dictionary.php");


?>
