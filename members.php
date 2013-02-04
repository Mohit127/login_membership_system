<?php 

session_start();

if(!isset($_SESSION['logged-in']) || $_SESSION['logged-in'] !== true){
	
	header('Location:login.php');
	exit;
}

echo 'Welcome, this is the index page.'; 
?>
<html>
<p>This is members only area!</p>
<p><a href="logout.php">Log out</a></p>
</html>