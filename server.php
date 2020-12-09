<?php 
	session_start();
	

	// initialize variables
	

	$Fullname = "";
	$Email = "";
	$Date = "";
	$Time = "";
	$Event = "";
	$id = 0;
	$edit_state = true;

	$db = mysqli_connect('localhost', 'root', '', 'crud');

	if (isset($_POST['save'])) {
		$Fullname = $_POST['Fullname'];
		$Email = $_POST['Email'];
		$Date = $_POST['Date1'];
		$Time = $_POST['Time1'];
		$Event = $_POST['Event'];

		$query = "INSERT INTO info (Fullname, Email, Date, Time, Event) VALUES ('$Fullname', '$Email', '$Date', '$Time', '$Event')";
		mysqli_query($db, $query);
		header('location:trial.php');
	}

		if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$Fullname = $_POST['Fullname'];
	$Email = $_POST['Email'];
	$Date = $_POST['Date1'];
	$Time = $_POST['Time1'];
	$Event = $_POST['Event'];

	mysqli_query($db, "UPDATE info SET Fullname='$Fullname', Email='$Email', Date1='$Date', Time1='$Time', Event='$Event' WHERE id=$id");
	header('location: trial.php');
}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM info WHERE id=$id");
	header('location: trial.php');
}

	$results = mysqli_query($db, "SELECT * FROM info");

	?>