

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Booking</title>
	<link rel="stylesheet" href="css/styleb.css">
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
                <li><a href="signup.php">Sign up</a></li>
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

				<h4 class="heading-phone">Call Us: 0965 146 1428</h4>
		</div>

		<div class="container-form">
				<form action="#">
					<h2 class="heading heading-yellow">Online Event Booking</h2>

					<div class="form-field">
						<p>Your Name</p>
						<input type="text" placeholder="Your Name">
					</div>
					<div class="form-field">
						<p>Your email</p>
						<input type="email" placeholder="Your email">
					</div>
					<div class="form-field">
						<p>Date</p>
						<input type="date">
					</div>
					<div class="form-field">
						<p>Time</p>
						<input type="time">
					</div>
					<div class="form-field">
						<p>Type of event</p>
						<select name="select" id="#">
							<option value="1">Wedding</option>
							<option value="2">Baptismal</option>
							<option value="3">Burial</option>
						</select>
					</div>

					<button class="btn">Submit</button>
				</form>
		</div>
	</div>
	
	
</body>
</html>