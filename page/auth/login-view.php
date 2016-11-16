<?php

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

