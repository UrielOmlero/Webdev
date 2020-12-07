<!DOCTYPE html>
<html>
<head>
  <title>Update</title>
</head>
<body>

  <?php

  include 'config.php'; //server and database connection

if(isset($_POST['update'])){
      
  $id = $_POST['id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $newAge = $_POST['age'];
  
  $query = "UPDATE friends SET firstname= '$firstname', lastname= '$lastname', age='$newAge' WHERE id = $id;";

  $result = mysqli_query($con, $query);

  echo "<script>alert('Data updated!')</script>";
  header( "refresh:1;url=view.php" );

  } else if(isset($_POST['delete'])) {
      
    $id = $_POST['id'];

    $q = "DELETE FROM friends WHERE id = '$id'";

    $result = mysqli_query($con, $q);

    if($result){

      header("Location: view.php");

    } else {

      echo("Error description: " . mysqli_error($con));

    }
  } 
  


mysqli_close($con); 
?>
      



</body>
</html>
