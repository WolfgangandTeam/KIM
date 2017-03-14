<?php 
include ("dbc.php");

	session_start();
	if(!(isset($_SESSION['authorized']) & $_SESSION['authorized'] === true)){
		header("location: login.php");	
	}





if(isset($_POST['delete'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM `events` WHERE id=$id";
	mysql_query($sql);
	
	header("location: deleted.php");

echo '<div id="success">Success</div>';
	
}elseif(isset($_POST['undo'])){
 $id = $_POST['id'];


$sql = "UPDATE events SET visible='1' WHERE id='$id'";

mysql_query($sql);

header("location: deleted.php");

echo '<div id="success">Success</div>';

}


?>
