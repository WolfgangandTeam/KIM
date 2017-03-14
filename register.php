<?php
	session_start();

//connect to db
	$db = mysqli_connect("localhost", "root", "", "authentication");

	if(isset($_POST['register_btn'])){
		session_start();
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		
		if($password == $password2){
			//create user	
			$password = md5($password);
			$sql = "INSERT INTO users(username, email, password) VALUES('$username','$email','$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: login.php"); //redirect to homepage
			
		}else{
			//failed
			$_SESSION['message'] = "The 2 passwords do not match";
		
		}
	
	
	}


?>







<!Doctype html>
<html>
<head>
	<link rel="stylesheet" href="css/register.css" />
	<script type="text/javascript" src="js/trigger.js"></script>
	<title>Login and register</title>
</head>
<body>
	<div class="header">
		<h1>Login and register</h1>
	</div>
	
	<?php
		if(isset($_SESSION['message'])){
			echo "<div id='error_msg'>".$_SESSION['message']."</div>";
			unset($_SESSION['message']);

		}
	?>
	
	<form method="POST" action="register.php">
		<table>
			<tr>
				<td>Username: </td>
				<td><input type="text" name="username" class="textInput"></td>
			</tr>
			
			<tr>
				<td>Email: </td>
				<td><input type="email" name="email" class="textInput"></td>
			</tr>
			
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password" class="textInput"></td>
			</tr>
			
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password2" class="textInput"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="register_btn" value="Register"></td>
			</tr>
		</table>	
		
	</form>	
	
	<div><a href="login.php">login</a></div>



</body>
</html>
