<?php 

require 'includes/config.php';

if(isset($_POST['submit'])){
	
	$user = new membership();
	$status = $user->verify_user($_POST['name'], $_POST['pass']);
	if($status){
		$_SESSION['logged-in'] = true;
		header("Location: members.php");
		exit;
	}
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Login</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
    <body>
    <div id="login">
    	<form method="post" action="login.php" class="input-form">
    		<h2>Login <small>enter your credentials</small></h2>
    		<p>
    			<label for="name">Username: </label>
    			<input type="text" name="name"/>
    		</p>
    		<p>
    			<label for="pass">Password: </label>
    			<input type="password" name="pass"/>
    		</p>
    		<p>
    			<input type="submit" id="submit" value="login" name="submit"/>
    			<a href="register.php">Register</a>
    		</p>
    	</form>
    </div>
    </body>
</html>