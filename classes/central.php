<?php 

class membership{
	
	public $id = null;
	public $error = array();
	
	public function verify_user($name, $pass){
		if(!empty($name) && !empty($pass)){
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$query = "SELECT * FROM users WHERE username = :name AND password = :pass LIMIT 1";
		$sql = $conn->prepare($query);
		$sql->bindValue(":name", $name,PDO::PARAM_STR);
		$sql->bindValue(":pass", md5($pass),PDO::PARAM_STR);
		$sql->execute();
		$row = $sql->fetch();
		if($row) return true;
		else echo 'Incorrect username/password.';
		$conn = null;
	}
	else{
		echo 'Please fill the login form completely.';
	 }
	}
	
	public function check_user_exists($name, $email){
		$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$query = "SELECT * FROM users WHERE username = :username OR email = :email";
		$sql = $conn->prepare($query);
		$sql->bindValue(":username", $name,PDO::PARAM_STR);
		$sql->bindValue(":email", $email,PDO::PARAM_STR);
		$sql->execute();
		$row = $sql->fetch();
		if($row) return true;
		
	}
	
	
	public function register($name, $pass, $email){
			if(!is_null($this->id)) trigger_error("Already registered");
			$conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
			$query = "INSERT INTO users(username, password, email)VALUES(:name, :pass, :email)";
			$sql = $conn->prepare($query);
			$sql->bindValue(":name", $name,PDO::PARAM_STR);
		 	$sql->bindValue(":pass", md5($pass),PDO::PARAM_STR);
		 	$sql->bindValue(":email", $email,PDO::PARAM_STR);
		 	$this->id = $conn->lastInsertId();
		 	$sql->execute();
		 	$conn = null;
		 	header("location: confirm.php");
	}
		
}
?>