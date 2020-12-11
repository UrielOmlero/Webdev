<?php
session_start();

// print_r($_SESSION);
// die();

//Check if user is already authenticated
if(!isset($_SESSION['authenticated'])) {
    header("Location: login.php");
} else if($_SESSION["isAdmin"] === "false") {
	 header("Location: dashboard.php");
}

//Instantiate Class Book
include_once('./backend/book.php');
$book = new Book();

//Get booking by id
// id from the URL
$id = $_GET["id"];
$booking = $book->getBookingById($id);


//Handle Form Update
if(isset($_POST["update"])) {
	$name = trim($_POST["name"]);
	$email = trim($_POST["email"]);
	$date = trim($_POST["date"]);
	$time = trim($_POST["time"]);
	$event = trim($_POST["event"]);

	$updateBooking = $book->updateBooking($id, $name, $email, $date, $time, $event);

	if($updateBooking) {
        echo "<script>alert('UpdateBooking Successful')</script>";
        header("Location: admin.php");
	} else {
		echo "<script>alert('Update Booking Not Successful')</script>";  
	}
}



?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin Page</title>
		<link rel="stylesheet" href="css/Styletrial.css">
		<!-- Font -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700,900" rel="stylesheet">
	</head>
	<header>
		<div class="main">
			<div class="logo">
				<img src="image/logo.png">
				
		</div>
			<ul>
				<li><a href="index.php">Home</a></li>
				<?php if(isset($_SESSION['username'])) { ?>
				<li><a href="index.php"><?php echo $_SESSION['username'] ?></a></li>
				<?php } ?>
				<li><a href="logout.php">Log Out</a></li>
			</ul>   
		</div>  
	</header>
	<body>
	<div class="container">
    <p><a href="admin.php">Back to Admin Page</a></p>
    <?php while($row = mysqli_fetch_assoc($booking)) { ?>
		<form action="" method="POST">
            

            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
			<h2 class="heading heading-yellow">Edit Event Booking</h2>

			<div class="form-field">
				<p>Your Name</p>
				<input type="text" name="name" placeholder="Your Name" value="<?php echo $row["name"]; ?>">
			</div>
			<div class="form-field">
				<p>Your email</p>
				<input type="email" name="email" placeholder="Your email" value="<?php echo $row["email"]; ?>"> 
			</div>
			<div class="form-field">
				<p>Date</p>
				<input type="date" name="date" value="<?php echo $row["date"]; ?>">
			</div>
			<div class="form-field">
				<p>Time</p>
				<input type="time" name="time" value="<?php echo $row["time"]; ?>">
			</div>
			<div class="form-field">
				<p>Type of event</p>
				<select name="event" id="#">
					<option value="wedding" <?php if($row["type"] === "wedding") {echo "selected";} ?>>Wedding</option>
					<option value="baptismal" <?php if($row["type"] === "baptismal") {echo "selected";} ?>>Baptismal</option>
					<option value="burial" <?php if($row["type"] === "burial") {echo "selected";} ?>>Burial</option>
				</select>
			</div>

			<button type="submit" name="update" class="btn">Update</button>
		</form>
        
        <?php } ?>
	</div>
</body>
</html>