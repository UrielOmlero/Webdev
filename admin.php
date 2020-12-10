

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
                <li><a href="signup.php">Sign up</a></li>
            </ul>   
        </div>  
    </header>
<body>


	<div class="container">
			
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
		
			<tr>
				<td> Jedd </td>
				<td> Urieljedd@gmail.com </td>
				<td> march 16 </td>
				<td> 09:12 </td>
				<td> Wedding </td>
				<td> 
					<a href="#">Edit</a>
				</td>
				<td>
					<a href="#" >Delete</a>
				</td>
			</tr>  
		
</tbody>
</table>
	<form method="post" action="server.php">
		<input type="hidden" name="id" >
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="Fullname" >
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="email" name="Email">
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
							  <button type="submit" name="save" class="btn">Save</button>
	
				<button type="submit" name="update" class="btn">Update</button>
			
		</div>
	</form>
	</div>
	
	
</body>
</html>