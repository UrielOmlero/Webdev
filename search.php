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

</body>
</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=cathedral",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `booking` WHERE Name = '$str'");

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
			</tr>

			<tr>
					<td><?php echo $row->name; ?></td>
					<td><?php echo $row->email;?></td>
					<td><?php echo $row->date;?></td>
					<td><?php echo $row->time;?></td>
					<td><?php echo $row->type;?></td>
					
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?>