<?php
	session_start();
	if(!(isset($_SESSION['authorized']) & $_SESSION['authorized'] === true)){
		header("location: login.php");	
	}



?>


<!Doctype html>
<html lang="en">
<head>
	<title>Calendar System.</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<!--CSS-->
	<link rel="stylesheet" href="css/calendar.css" />
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--JS-->
	<script type="text/javascript" src="js/calendar.js"></script>
	<!--script src="js/require.js"></script-->

	<!--FrameWork-->
	<script src="js/jquery.js"></script>
 	<script src="js/jquery-ui.js"></script>
	<script>
		$( function() {
			$( "#menu" ).menu();
		});
	</script>
	
<?include "functions/style.php"?>

</head>
<body onLoad="initialCalendar();">
	

<?php include "menu_nav.php";	?>
	
<div id="calendar-wrapper">	
	<div id="showCalendar"></div>
</div>
	
<div id="overlay">
	<div id="events"></div>

</div>
	
</body>
</html>
