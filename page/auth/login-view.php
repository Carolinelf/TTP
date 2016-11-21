<?php
/* @var $user Booking */
?>

<div class="card form">
<h1> Log In <a href="index.php?module=auth&page=register">Sign Up</a></h1>
    <?php if ($errors) { ?>
        <div class="errors">
            <p><?php echo $errors; ?></p>
        </div>
    <?php } ?> 
<form action="#" method="post">
    <fieldset>
        <div class="field">
            <label>Username:</label>
           
            <input type="text" name="username"/>
        </div>
        <div class="field">
            <label>Password:</label>
            
            <input type="password" name="password"/>
        </div>
         <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <div class="wrapper">
            <input type="submit" name="submit" value="submit" />
        </div>
    </fieldset>
</form>
</div>
