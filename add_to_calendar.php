<?php 
include ("dbc.php");


/*echo $title = $_POST['title'];
echo $desc = $_POST['desc'];
echo $datepicker = $_POST['datepicker'];
$find_comments = mysql_query("SELECT * FROM events");
/*while($row = mysql_fetch_assoc($find_comments)){
	$comment_name = $row['text'];
	
	//echo "<p>$comment_name - $comment</p>";

}

$sql = "INSERT INTO events values ('',,'$title','$desc','$datepicker'";
mysql_query($sql);

echo "Succss trial";*/


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

$sql = "INSERT INTO events values ('','$title','$desc','$date','','1')";

mysql_query($sql);


header("location: index.php");


?>
