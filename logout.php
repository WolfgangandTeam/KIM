 <?php
	session_start();
	$_SESSION['authorized'] = false;
	session_destroy();
	unset($_SESSION['username']);//and more session if there is 
	unset($_SESSION['authorized']);
	$_session['message'] = "You are now logged out";
	header("location: login.php");
	



?>