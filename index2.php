

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Booking</title>
	<link rel="stylesheet" href="css/styleAB.css">
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
                <li><a href="view.php">View</a></li>
            </ul>   
        </div>  
    </header>
<body>

	 <?php

  include 'config.php'; //server and database connection

  if(isset($_POST['submit'])) {

    $Fullname = $_POST['fullname'];
    $Email = $_POST['email'];
    $Time = $_POST['time1'];
    $Date = $_POST['date1'];
    $Event = $_POST['event'];

    $query = "INSERT INTO friends (fullname, email, time1, date1, event)
    VALUES ('$fullname', '$email', '$time1', '$date1', 'event')";

    mysqli_query($con, $query);

  }


  mysqli_close($con); //close connection

  ?>


	<div class="container">
		<div class="container-form">
				<form action="#">
					<h2 class="heading heading-yellow">Online Event Booking Admin</h2>

					<div class="form-field">
						<p>Your Name</p>
						<input type="text" name="fullname" placeholder="Your Name">
					</div>
					<div class="form-field">
						<p>Your email</p>
						<input type="email" name="email" placeholder="Your email">
					</div>
					<div class="form-field">
						<p>Date</p>
						<input  type="date" name="date1">
					</div>
					<div class="form-field">
						<p>Time</p>
						<input type="time" name="time1">
					</div>
					<div class="form-field">
						<p>Type of event</p>
						<select name="event" id="#">
							<option value="1">Wedding</option>
							<option value="2">Baptismal</option>
							<option value="3">Burial</option>
						</select>
					</div>

				
					<p><input type="submit" name="submit" value="SUBMIT"></p>
				</form>

		</div>
	</div>
	
	
</body>
</html>