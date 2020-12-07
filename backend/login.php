<?php

include_once('connection.php');

class Login {
	function __construct() {
		$this->conn = new DBConnection();
		$this->link = $this->conn->connect();
	}

	public function userLogin($username, $password) {

		$password = md5($password);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$query = mysqli_query($this->link, $sql);

		if(mysqli_num_rows($query) == 1){
			echo "Logged in successfully";
            die($sql);
		} else{
			return "Invalid name and password";
		}

	}

	public function test () {
		return "hello world";
	}
}