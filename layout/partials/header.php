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
<nav class="navbar navbar-collapse collapse navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">The Perfect Pour</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
           <li><a href="index.php?module=auth&page=register" class="navbar-link">Login/Sign Up</a> </li>
           <li><a href="#" class="navbar-link"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></li>
           <li><a href="#" class="navbar-link">Store</a></li>
       </ul>
  </div>
</nav> 
<div class="jumbotron hero-img">
      <div class="container">
        <h1>Need Coffee?</h1>
        <p class="tagline">We'll help you find the best!</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Sign Up »</a></p>
      </div>
    </div>
   