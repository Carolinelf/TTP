<?php
session_start(); 
require 'db.php';
$error = '';
if(isset($_POST['submit'])){
    
//    //mock database values
//    $mock_user = 'username';
//    $mock_pass = 'password';
    
   //get username and password from Post
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = getUserDetails($username, $password);
    
    //compare to see if it works
    if($username === $user['username'] && $password === $user['password']){
        if(isset($_POST['remember-me'])) {
            setcookie('remember-me', 'username', time()+ 60, '/login.php');
        }
        
    $_SESSION['role'] = $user['role'];
    //set username into session
    $_SESSION['username'] = $username;
    //redirect to index
    header('Location: index.php'); 
    }
    //if not correct show an error message
    else{
      $error = "Username and/or password is incorrect!";
    }
}

if(isset($_COOKIE['remember-me'])) {
    $_SESSION['username'] = $_COOKIE['remember-me'];
    header('Location: index.php'); 
}
    
if(isset($_GET['logout'])){
    session_destroy();
    header('Location: index.php'); 
   
}
require 'partials/header.php';

?>
        <div class="container">
                <form class="form-signin" action="" method="POST">
                <h2 class="form-signin-heading">Please sign in</h2>
                <label for="inputUsername" class="sr-only">Email address</label>
                <input id="inputUsername" class="form-control" name="username" placeholder="Username">
                <label for="inputPassword" class="sr-only">Password</label>
                <input id="inputPassword" class="form-control" type="password" name="password" placeholder="Password">
                <?php if(isset($error)){
                    echo $error;
                } ?>
                 <label>
                    <input type="checkbox" name="remember-me"> Remember Me?
                </label>
                <input class="btn btn-lg btn-primary btn-block" name="submit" type="submit">
            </form>
        </div>
    
    <?php 
    include 'partials/footer.php';
