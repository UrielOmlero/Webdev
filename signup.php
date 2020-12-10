<?php

include_once('./backend/registration.php');

$registration = new Registration();

if(isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $sex = trim($_POST['sex']);
    $birthdate = trim($_POST['birthdate']);

    $register = $registration->userRegistration($username, $password, $name, $sex, $birthdate);

    if($register){  
        echo "<script>alert('Registration Successful! Please Login Now'); window.location.href='login.php'</script>";
        //header('Location: login.php');
    }else{  
        echo "<script>alert('Registration Not Successful')</script>";  
    }  

}

?>

<html>
<head>
<title>Log in</title>
    <link rel="stylesheet" type="text/css" href="css/styleS.css">
    <header>
        <div class="main">
            <div class="logo">
                <img src="image/logo.png">
                
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="dashboard.php">Book</a></li>
            </ul>   
        </div>  
    </header>
<body>
    <div class="signupbox">
    <img src="image/avatar.png" class="avatar">
        <h1>Sign up</h1>

        <form action="" method="POST">
            <p>Name</p>
            <input type="text" name="name" placeholder="Enter Fullname">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password">
            
            <div class="form-field">
                        <p>Sex</p>
                        <select name="sex" id="#">
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
            <div class="form-field">
                        <p>Birthdate</p>
                        <input name="birthdate" type="date">
                    </div>
            <input type="submit" name="submit" value="Sign up">
            <a href="loginadmin.php">Are you an admin?</a><br>
            <a href="login.php">Already have an account?</a>
        </form>
        
    </div>

</body>
</head>
</html>