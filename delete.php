<?php

//Instantiate Class Book
include_once('./backend/book.php');
$book = new Book();

//Get booking by id
// id from the URL
$id = $_GET["id"];
$delete = $book->deleteBookingById($id);

if($delete) {
        echo "<script>alert('Deleted Successful')</script>";
    header("Location: admin.php");
} else {
    echo "<script>alert('Delete Booking Not Successful')</script>";  
}