<?php

include_once('connection.php');

class Search {
	function __construct() {
		$this->conn = new DBConnection();
		$this->link = $this->conn->connect();
    }
    
    public function searchBooking($data) {
        $sql = "SELECT * FROM booking WHERE name LIKE '%$data%'";

        $result = mysqli_query($this->link, $sql);

        return $result;
    }

}