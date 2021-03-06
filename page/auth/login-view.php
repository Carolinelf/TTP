<?php //
/* @var $user Booking */
?>

<div class="card form">
    <h1> Log In <a href="index.php?module=auth&page=register">Sign Up</a></h1>
    <?php if ($errors) { ?>
        <div class="errors">
            <p><?php echo $errors; ?></p>
        </div>
    <?php } ?> 
    <form  action="#" method="post">
        <fieldset>
            <div class="form-group row">
                <div class=" col-xs-10"> 
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" id="username"/>
                </div></div>
            <div class="form-group row">
                <div class=" col-xs-10"> 
                    <label for="password">Password:</label>
                    <input type="password"  class="form-control" name="password" id="password"/>
                </div></div>
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <label class="checkbox-label" for="remember-me-label">
                        <input type="checkbox" value="remember-me" id="remember-me-label"> Remember me
                        </div>
                        </div>
                    <div class="form-group row wrapper">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" type="submit" name="submit" value="submit" class="btn btn-secondary">Submit</button>
                            </div>
                        </div>
                        </fieldset>
                        </form>
                </div>
