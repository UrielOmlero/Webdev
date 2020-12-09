<?php  include('server.php'); 

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = false;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");


			$n = mysqli_fetch_array($record);
			$Fullname = $n['Fullname'];
			$Email = $n['Email'];
			$Date = $n['Date'];
			$Time = $n['Time'];
			$Event = $n['Event'];


	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
	<link rel="stylesheet" href="css/Styletrial.1.css">
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
			<?php if (isset($_SESSION['msg'])): ?>
			<div class="msg"> 
				<?php 
					echo $_SESSION['msg']; 
					unset($_SESSION['msg']);
				?>
			</div>
		<?php endif ?>
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
		<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['Fullname']; ?></td>
				<td><?php echo $row['Email']; ?></td>
				<td><?php echo $row['Date']; ?></td>
				<td><?php echo $row['Time']; ?></td>
				<td><?php echo $row['Event']; ?></td>
				<td> 
					<a href="trial.php?edit=<?php echo $row['id']; ?>">Edit</a>
				</td>
				<td>
					<a href="server.php?del=<?php echo $row['id']; ?>" >Delete</a>
				</td>
			</tr>  
		<?php } ?>
</tbody>
</table>
	<form method="post" action="server.php">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="Fullname" value="<?php echo $Fullname; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="email" name="Email" value="<?php echo $Email; ?>">
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
		<div class="input-group">
			<?php if ($edit_state == True): ?>
				  <button type="submit" name="save" class="btn">Save</button>
			<?php else: ?>
				<button type="submit" name="update" class="btn">Update</button>
			<?php endif ?>
		</div>
	</form>
	</div>
	
	
</body>
</html>