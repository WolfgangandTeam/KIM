<?php 
include ("dbc.php");



if(isset($_POST['delete'])){
	$id = $_POST['id'];
	$sql = "UPDATE data_dictionary SET visible='0' WHERE id='$id'";
	mysql_query($sql);
	
	header("location: add_item.php");


	
}elseif(isset($_POST['edit'])){
 $id = $_POST['id'];
 $title = $_POST['title'];
 $desc = $_POST['desc'];
 $datepicker = $_POST['datepicker'];

$breakDate = explode('/', $datepicker);//Split month/day to remove leading
$month = $breakDate[0];
$day = $breakDate[1];
$year = $breakDate[2];
if(substr($month,0,1) === '0'){
	$month = substr($month,1,1);
}

if(substr($day,0,1) === '0'){
	$day = substr($day,1,1);
}

$date = $month."/".$day."/".$year;

$sql = "UPDATE data_dictionary SET heading='$title', description='$desc', evdate='$date' WHERE id='$id'";


mysql_query($sql);

header("location: add_item.php");



}


?>
