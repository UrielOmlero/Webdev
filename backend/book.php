<?php

include_once('connection.php');

class Book {
	function __construct() {
		$this->conn = new DBConnection();
		$this->link = $this->conn->connect();
    }
    
    public function addBooking($name, $email, $date, $time, $event) {

        $sql = "INSERT INTO booking (name, email, date, time, type) 
            VALUES ('$name', '$email', '$date', '$time', '$event')";
        
        $result = mysqli_query($this->link, $sql);

        if($result) {
            // print_r($result);
            // die();
            return true;
        } else {
            // print_r('Something went wrong');
            // die();
            return false;
        }
    }

    public function getAllBookings() {
        $sql = "SELECT * FROM booking";

        $result = mysqli_query($this->link, $sql);

        return $result;
    }

    public function getBookingById($id) {

        $sql = "SELECT * FROM booking WHERE id = '$id'";

        $result = mysqli_query($this->link, $sql);

        return $result;

    }

    public function updateBooking($id, $name, $email, $date, $time, $event) {
        $sql = "UPDATE booking SET name = '$name', email = '$email', date = '$date', time = '$time', type = '$event' WHERE id = '$id'";

        $result = mysqli_query($this->link, $sql);

        return $result;

    }

    public function deleteBookingById($id) {
        $sql = "DELETE FROM booking WHERE id = '$id'";

        $result = mysqli_query($this->link, $sql);

        return $result;

    }

}