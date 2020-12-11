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

//Get All bookings from database
$bookings = $book->getAllBookings();

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
		<?php if($bookings) { ?>
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Date</th>
					<th>Time</th>
					<th>Event</th>

					<th colspan="5">Action</th>
				</tr>
			</thead>
			<tbody>
			
				<?php while($row = mysqli_fetch_assoc($bookings)) { ?>
				<tr>
					<td><?php echo $row["name"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo date('m-d-Y', strtotime($row["date"])); ?></td>
					<td><?php echo date('h:i:s A', strtotime($row["time"])); ?></td>
					<td><?php echo $row["type"]; ?></td>
					<td> 
						<a href="edit.php?id=<?php echo $row["id"] ?>">Edit</a>
					</td>
					<td>
						<a href="delete.php?id=<?php echo $row["id"] ?>" >Delete</a>
					</td>
				</tr>  
				<?php } ?>
			
			</tbody>
		</table>
		<?php } else {?>
		<p>No Bookings</p>

		<?php } ?>
		
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
</body>
</html>