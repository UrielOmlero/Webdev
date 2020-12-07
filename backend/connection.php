<?php

include_once('config.php');

class DBConnection {

	function __construct() {
		ob_start();

	    // Set sessions
	    if(!isset($_SESSION)) {
	        session_start();
	    }
	}

	public function connect() {
		$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABSE);
		
		// if($connection) {
		// 	die('connected');
		// } else {
		// 	die ("Cannot connect to the database");  
		// }

	    return $connection;
	}
}