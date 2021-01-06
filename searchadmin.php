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
include_once('./backend/search.php');
$search = new Search();

$bookings = [];

//Handle Form Submit
if(isset($_POST["submit"])) {
	$searchData = trim($_POST["search"]);
	$bookings = $search->searchBooking($searchData);
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
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
				<li><a href="admin.php">Home</a></li>
				<?php if(isset($_SESSION['username'])) { ?>
				<li><a href="index.php"><?php echo $_SESSION['username'] ?></a></li>
				<?php } ?>
				<li><a href="logout.php">Log Out</a></li>
			</ul>   
		</div>  
	</header>
 
<body>

<form method="post">
<label>Search</label>
<input type="text" name="search" placeholder="Enter name">
<button type="submit" name="submit" class="btn">Search</button>
	
</form>
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
</body>
</html>

<!-- <?php


$con = new PDO("mysql:host=localhost;dbname=cathedral",'root','');
if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `booking` WHERE name LIKE '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>Name</th>
				<th>email</th>
				<th>Date</th>
				<th>Time</th>
				<th>Event</th>
				<th colspan="5">Action</th>
			</tr>

			<tr>
					<td><?php echo $row->name; ?></td>
					<td><?php echo $row->email;?></td>
					<td><?php echo $row->date;?></td>
					<td><?php echo $row->time;?></td>
					<td><?php echo $row->type;?></td>
					<td> 
						<a href="edit.php?id=<?php echo $row->id; ?>">Edit</a>
					</td>
					<td>
						<a href="delete.php?id=<?php echo $row->id; ?>" >Delete</a>
					</td>
					
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?> -->