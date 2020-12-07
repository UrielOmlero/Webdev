<?php

include_once('connection.php');

class Registration {
	function __construct() {
		$this->conn = new DBConnection();
		$this->link = $this->conn->connect();
	}

	public function userRegistration($username, $password, $name, $sex, $birthdate) {

		$password = md5($password);
		$sql = "INSERT INTO users (username, password, name, sex, birthdate, isAdmin) 
			VALUES ('$username', '$password', '$name', '$sex', '$birthdate', 'false')";
		$query = mysqli_query($this->link, $sql);

		if($query){
			return true;
		} else{
			return false;
		}

	}

	public function test () {
		return "hello world";
	}
}