<!-- SEAN JIM GALABIN -->

<!DOCTYPE html>
<html>
<head>
  <title>View</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <a href="index2.php">Add Data</a>

  <?php
  
  include 'config.php'; //server and database connection

  $q = "SELECT * FROM friends";

  $result = mysqli_query($con,$q); // check if query is true

  echo "<table id='friends'>";
  echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th>
        <th>Age</th>
        <th>Action</th></tr>";
  while ($row=mysqli_fetch_assoc($result)) {
    echo "<form action='update.php' method='POST'>";
    echo "<tr><td><input type='text' name='id' value='{$row['id']}' readonly></td>";
    echo "<td><input type='text' name='fullname' value='{$row['Fullname']}'></td>";
    echo "<td><input type='email' name='email' value='{$row['Email']}'></td>";
    echo "<td><input type='date' name='date1' value='{$row['Date']}'></td>";
    echo "<td><input type='time' name='time1' value='{$row['Time']}'></td>";
    echo "<td><input type='event' name='event' value='{$row['Event']}'></td>";
    echo "<td><input type='submit' name='update' value='Update'><input type='submit' onClick='deleteme()' name='delete' value='Delete'></td></tr>";
    echo "</form>";
    
  }
  echo "</table>";
  mysqli_close($con); //close connection

  ?>

<script>

  

function deleteme(){

  const testDel = confirm("Are you sure");

  if(testDel == true){
    return true;
  } else {
    window.location.href="view.php";
  }
}

</script>


</body>
</html>
