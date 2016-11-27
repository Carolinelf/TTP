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
<h1>
    <?php if ($edit): ?>
        Edit User
    <?php else: ?>
        Add New User
    <?php endif; ?>
</h1>

<?php if (!empty($errors)): ?>
<ul class="errors">
    <?php foreach ($errors as $error): ?>
        <?php /* @var $error Error */ ?>
        <li><?php echo $error->getMessage(); ?></li>
    <?php endforeach; ?>
</ul>
<?php endif; ?>
 

<form action="#" method="post">
    <fieldset>
            <div class="form-group row">
                <div class=" col-xs-6"> 
                    <label for="username">Username:</label>
                    <input type="text" name="user[username]" id="username" value="<?php echo Utils::escape($user->getUsername()); ?>"
                   class="form-control text<?php echo error_field('username', $errors); ?>"/>
                </div></div>
            <div class="form-group row">
                <div class=" col-xs-6"> 
                    <label for="password">Password:</label>
                    <input type="password" name="user[password]" id="password" value="<?php echo Utils::escape($user->getPassword()); ?>"
                   class="form-control text<?php echo error_field('password', $errors); ?>"/>
                </div></div>
                        <div class="form-group row">
                <div class=" col-xs-6"> 
                    <label for="email">Email:</label>
                    <input type="text"  name="user[email]" id="email" value="<?php echo Utils::escape($user->getEmail()); ?>"
                   class="form-control text<?php echo error_field('email', $errors); ?>"/>
                </div></div>
                <div class="form-group row">
                            <div class="offset-sm-6 col-sm-6">
                                <button type="submit" class="btn btn-secondary"  name="save" value="<?php echo $edit ? 'EDIT' : 'ADD'; ?>" class="submit">Submit</button>
                            </div>
                        </div>
    </fieldset>
</form>
