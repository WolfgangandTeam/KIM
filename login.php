<?php
	session_start();

//connect to db
	$db = mysqli_connect("localhost", "root", "", "excellence");

	if(isset($_POST['login_btn'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//prevent injection

		$username = stripcslashes($username);
		$password = stripcslashes($password);
		//$username = mysql_real_escape_string($username);
		//$password = mysql_real_escape_string($password);
		
		
		
		$password = md5($password);
		echo $password;
		$sql = "SELECT * FROM user WHERE user_name ='$username' AND password='$password'";
		$result = mysqli_query($db, $sql);
		
		if(mysqli_num_rows($result) == 1){
			$_SESSION['message'] = "You are now Logged in";
			$_SESSION['username'] = $username;
			$_SESSION['authorized'] = true;
			header("location: index.php");		
		}else{
			$_SESSION['message'] = "Incorrect Username/Password combination";
		}
		
	
	
	
	}


?>







<!Doctype html>
<html>
<head>
	<link rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="js/trigger.js"></script>
	<title>Login and register</title>
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
<body>
	
	<!--?php include "menu_nav.php";	?-->
	<div class="header">
		<h1>Login and register</h1>
	</div>
	<?php
		if(isset($_SESSION['message'])){
			echo "<div id='error_msg'>".$_SESSION['message']."</div>";
			unset($_SESSION['message']);

		}
	?>
	
	
	<form method="POST" action="login.php">
		<table>
			<tr>
				<td>Username: </td>
				<td><input type="text" name="username" class="textInput"></td>
			</tr>
			
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password" class="textInput"></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" name="login_btn" value="Login"></td>
			</tr>
		</table>	
		
	</form>	

	<div><a href="register.php">Register</a></div>

</body>
</html>
