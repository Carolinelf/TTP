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
?>
<div class="card form"> 
    <h1><a href="index.php?module=auth&page=login">Log In</a> Sign Up </h1>

    <?php if (!empty($errors)): ?>
        <ul class="errors">
            <?php foreach ($errors as $error): ?>
                <?php /* @var $error Error */ ?>
                <li><?php echo $error->getMessage(); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>


    <form class="validator" action="#" method="post">
        <fieldset>
            <div class="form-group row">
                <div class=" col-xs-10"> 
                        <label for="username">Username:</label>
                        <input type="text"  class="form-control" name="user[username]" id="username" value="<?php echo Utils::escape($user->getUsername());?>"
                               class="text<?php echo error_field('username', $errors); ?>" required/>
                <span class="correct" id="username-error"></span>    
                </div></div>

            <div class="form-group row">
                <div class=" col-xs-10"> 
                    <label for="password">Password:</label>

                    <input type="password" class="form-control" name="user[password]" id="password" value="<?php echo Utils::escape($user->getPassword());?>"
                           class="text<?php echo error_field('password', $errors); ?>" required/>
                    <span class="correct" id="password-error"></span>
                </div></div>
            <div class="form-group row">
                <div class=" col-xs-10"> 
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="user[email]" id="email" value="<?php echo Utils::escape($user->getEmail());?>"
                               class="text<?php echo error_field('email', $errors); ?>" required/>
                        <span class="correct" id="email-error"></span>
                    </div></div>

            <div class="wrapper">
                <input type="submit" name="save" class="btn btn-secondary" value="<?php echo $edit ? 'EDIT' : 'ADD'; ?>" class="submit" />
            </div>
        </fieldset>
    </form>
</div>
