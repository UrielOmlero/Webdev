<?php
session_start();

// print_r($_SESSION);
// die();

//Check if user is already authenticated
if(!isset($_SESSION['authenticated'])) {
    header("Location: login.php");
}

//Instantiate Class Book
include_once('./backend/book.php');
$book = new Book();



//Handle Form Submit
if(isset($_POST["book"])) {
	$name = trim($_POST["name"]);
	$email = trim($_POST["email"]);
	$date = trim($_POST["date"]);
	$time = trim($_POST["time"]);
	$event = trim($_POST["event"]);

	$createBooking = $book->addBooking($name, $email, $date, $time, $event);

	if($createBooking) {
		echo "<script>alert('Booking Successful')</script>";  
	} else {
		echo "<script>alert('Booking Not Successful')</script>";  
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Booking</title>
	<link rel="stylesheet" href="css/styleb.2.css">
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
		<div class="container-time">
				<h2 class="heading">Time Open</h2>
				<h3 class="heading-days">Monday-Friday</h3>
				<p>7am - 11am</p>
				<p>1pm - 5pm</p>

				<h3 class="heading-days">Saturday and Sunday</h3>
				<p>9am - 11am </p>
				<p>1pm - 3pm</p>

				<hr>

				<h4 class="heading-phone">Call Us: 0965 946 1428</h4>
		</div>

		<div class="container-form">
				<form action="" method="POST">
					<h2 class="heading heading-yellow">Online Event Booking</h2>

					<div class="form-field">
						<p>Your Name</p>
						<input type="text" name="name" placeholder="Your Name">
					</div>
					<div class="form-field">
						<p>Your email</p>
						<input type="email" name="email" placeholder="Your email">
					</div>
					<div class="form-field">
						<p>Date</p>
						<input type="date" name="date">
					</div>
					<div class="form-field">
						<p>Time</p>
						<input type="time" name="time">
					</div>
					<div class="form-field">
						<p>Type of event</p>
						<select name="event" id="#">
							<option value="wedding">Wedding</option>
							<option value="baptismal">Baptismal</option>
							<option value="burial">Burial</option>
						</select>
					</div>

					<button type="submit" name="book" class="btn">Submit</button>
				</form>
		</div>
	</div>
	
	
</body>
</html>