<?php 
include ("dbc.php");
$receiver = 'wolfganggermain1@gmail.com';
$sender = 'noreply@seychellesunibridge.com';


if(isset($_POST['delete'])){
	$id = $_POST['id'];
	$sql = "UPDATE events SET visible='0' WHERE id='$id'";
	mysql_query($sql);
	
	header("location: add_item.php");


	
}elseif(isset($_POST['edit'])){
 $id = $_POST['id'];
 $title = $_POST['title'];
 $desc = $_POST['desc'];
 $datepicker = $_POST['datepicker'];

$breakDate = explode('/', $datepicker);//Split month/day to remove leading 0
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

$sql = "UPDATE events SET heading='$title', description='$desc', evdate='$date' WHERE id='$id'";


mysql_query($sql);

header("location: add_item.php");



}else if(isset($_POST['button_pressed'])){
	if(isset($_POST['confirm'])){
		   $desc = $_POST['desc'];

			$to      = $receiver;
			$subject = 'the subject';
			$message = 'This is to <i>confirm</i> that we have accepted your book<br /><img src="http://seychellesunibridge.com/img/i10left.png" alt="test image"> '.$desc;
			
                        $headers[] = 'MIME-Version: 1.0';
                        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                        $headers[] = 'From: Booking Reminder <'.$sender.'>';


                                   

			mail($to, $subject, $message,  implode("\r\n", $headers));


			echo 'Email Sent.';
	}
	if(isset($_POST['cancel'])){
		 $desc = $_POST['desc'];
                        $to      = $receiver;
			$subject = 'the subject';
			$message = 'This is to <i>Declined</i> that we have accepted your book<br /><img src="img src="http://seychellesunibridge.com/img/sorry.jpg" alt="test image"> '.$desc;
			 $headers[] = 'MIME-Version: 1.0';
                        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                        $headers[] = 'From: Booking Reminder <'.$sender.'>';

			mail($to, $subject, $message, $headers);

			echo 'Email Sent.';
	}
}

?>
