<?php

function error_field($title, array $errors) {
    foreach ($errors as $error) {
        /* @var $error Error */
        if ($error->getSource() == $title) {
            return ' error-field';
        }
    }
    return '';
}
/* @var $user Booking */
?>
<div class="card form">
<h1> Log In <a href="index.php?module=auth&page=register">Sign Up</a></h1>

<?php if (!empty($errors)): ?>
<ul class="errors">
    <?php foreach ($errors as $error): ?>
        <?php /* @var $error Error */ ?>
        <li><?php echo $error->getMessage(); ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
 

<form  action="#" method="post">
    <fieldset>
        <div class="field">
            <label>Username:</label>
            
            <input type="text" name="user[username]" value="<?php echo Utils::escape($user->getUsername()); ?>"
                   class="text<?php echo error_field('username', $errors); ?>"/>
        </div>
        <div class="field">
            <label>Password:</label>
            
            <input type="password" name="user[password]" value="<?php echo Utils::escape($user->getPassword()); ?>"
                   class="text<?php echo error_field('password', $errors); ?>"/>
        </div>
 
        <div class="wrapper">
            <input type="submit" name="save" value="<?php echo $edit ? 'EDIT' : 'ADD'; ?>" class="submit" />
        </div>
    </fieldset>
</form>
</div>
