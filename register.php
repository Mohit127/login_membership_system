<?php 

require 'includes/config.php';
$member = new membership();
$require = array("username", "password", "email");
$errors = array();
if(isset($_POST['submit'])){
//validation to check if a field is left blank.
	foreach ($require as $field){
		if(isset($_POST[$field]) && !empty($_POST[$field]))
		{
			$$field = $_POST[$field];
		}else{
			$errors[] = $field.' field cannot be left blank.';
		}
	}
//validation to check if a field is left blank.
	
	$duplicate = $member->check_user_exists($_POST['username'], $_POST['email']);
	
	if($duplicate) $errors[] = "User/email already exists"; 

	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['email']))
		$errors[] = "Please enter a valid email address";
	
	if($errors){
		foreach ($errors as $err)
		echo "<p class='error'>$err</p>";
	}else{
	
	
	$member->register($username, $password, $email);
	}
}

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Register</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
    <body>
    <div id="register">
    	<form method="post" action="register.php" class="input-form">
    		<h2>Register</h2>
    		<p>
    			<label for="username">Username: </label>
    			<input type="text" name="username"/>
    		</p>
    		<p>
    			<label for="password">Password: </label>
    			<input type="password" name="password"/>
    		</p>
    		<p>
    			<label for="email">Email: </label>
    			<input type="text" name="email"/>
    		</p>
    		<p>
    			<input type="submit" id="submit" value="Submit" name="submit"/>
    		</p>
    	</form>
    </div>
    </body>
</html>