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
			while ($data = mysqli_fetch_assoc($query)) {
				// printf("id: %s\n", $data['id']);
				// printf("username: %s\n", $data['username']);
				// printf("isAdmin: %d\n", $data['isAdmin']);
				//Once logged in add the data to session
				$_SESSION["isAdmin"] = $data['isAdmin'];
				$_SESSION["username"] = $data['username'];
				$_SESSION["authenticated"] = "true";

			}
         	header("Location: bookf.php");

		} else{
			return "Invalid username and password";
		}

	}
}