<?php

include_once('./backend/login.php');
$login = new Login();


//Check if user is already authenticated
if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === "true") {
    header("Location: dashboard.php");
}

if(isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $loggedIn = $login->userLogin($username, $password);

    if($loggedIn){  
        echo "<script>alert('$loggedIn');</script>";
        //header('Location: login.php');
    }else{  
        echo "<script>alert('Registration Not Successful')</script>";  
    }  

}


?>
<html>
<head>
<title>Log in</title>
    <link rel="stylesheet" type="text/css" href="css/styleA.1.css">
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
    <div class="loginbox">
    <img src="image/avatar.png" class="avatar">
        <h1>Hello Admin!</h1>
        <form>
            <p>Username</p>
            <input type="text" name="" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="" placeholder="Enter Password">
            <input type="submit" name="" value="Login">
            <a href="login.php">Are you a user?</a><br>
         
        </form>
        
    </div>

</body>
</head>
</html>