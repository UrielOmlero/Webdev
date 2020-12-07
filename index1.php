<!-- SEAN JIM GALABIN -->
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
</head>
<body>

  <?php

  include 'config.php'; //server and database connection

  if(isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];

    $query = "INSERT INTO friends (firstname, lastname, age)
    VALUES ('$firstname', '$lastname', '$age')";

    mysqli_query($con, $query);

  }


  mysqli_close($con); //close connection

  ?>

  <form action="" method="POST">
    <p><input type="text" name="firstname" placeholder="First Name"></p>
    <p><input type="text" name="lastname" placeholder="Last Name"></p>
    <p><input type="number" name="age" placeholder="Age"></p>
    <p><input type="submit" name="submit" value="SUBMIT"></p>
  </form>

  <a href="view.php">VIEW TABLE</a>

</body>
</html>
