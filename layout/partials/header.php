<?php 
//if(!isset($_SESSION['username'])) {
//$login = '<a href="index.php?module=auth&page=login" class="navbar-link">Login/Sign Up</a> ';
//$callToAct ='<a class="btn btn-primary btn-lg" href="index.php?module=auth&page=register" role="button">Sign Up »</a>';
//} else {
//$username = $_SESSION['username'];
//$addReview = '<li class="nav-item"> <a class="nav-link" href="index.php?module=review&page=add-edit">Add Review</a></li>';
//$greeting = "Hello $username";   
//$login = '<a href="index.php?module=auth&page=login&logout=true" class="navbar-link">Logout</a>';
//    if ($_SESSION['privilege'] === 'admin') {
//        $userList = '<li class="nav-item"> <a class="nav-link" href="index.php?module=user&page=list">User List</a></li>';
//        $admin = 'Hello admin';
//    }
//}
//$_SESSION['privilege'] = $privilege;

 if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
$greeting = "Hello $username";   
$login = '<a href="index.php?module=auth&page=login&logout=true" class="navbar-link">Logout</a>';

//        if ($privilege == 'admin') {
//        $message = "hello user";
//        $userList = '<li class="nav-item"> <a class="nav-link" href="index.php?module=user&page=list">User List</a></li>';
//        } 
//        else {
//        $message = "hello admin";
//        }
 } else if(!isset($_SESSION['username'])) {
$login = '<a href="index.php?module=auth&page=login" class="navbar-link">Login/Sign Up</a> ';
$callToAct ='<a class="btn btn-primary btn-lg" href="index.php?module=auth&page=register" role="button">Sign Up »</a>';
}
 
 
        

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= $headTemplate->getTitle(); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css" type="text/css">

</head>
    <body>
        <header>   
<nav class="navbar navbar-collapse navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigationbar"> 
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span></button>   	
      <a class="navbar-brand" href="index.php?module=review&page=list">The Perfect Pour</a>
    </div>
      <div class="navbar-collapse collapse" id="navigationbar">
    <ul class="nav navbar-nav navbar-right">
        <li><a class="active"><?php echo "$greeting"?></a></li>  
        <li><?php echo "$login"; ?></li>
           <li><a href="#" class="active"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></li>
           <li><a href="#" class="active">Store</a></li>
       </ul>
     </div>
  </div>
</nav> 

<div class="jumbotron hero-img">
      <div class="container">
        <h1>Need Coffee?</h1>
        <p class="tagline">We'll help you find the best!</p>
        <p><?php echo "$callToAct"; ?><?php echo "$message"; ?></p>
      </div>
    </div>
   