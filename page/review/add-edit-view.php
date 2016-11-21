<?php

//~ Template for add-edit.php
// variables:
//  $errors - validation errors
//  $todo - submitted TODO
//  $edit - true for EDIT, false for ADD
function error_field($title, array $errors) {
    foreach ($errors as $error) {
        /* @var $error Error */
        if ($error->getSource() == $title) {
            return ' error-field';
        }
    }
    return '';
}
/* @var $booking Booking */
?>
<div class="card form">
<h1>
    <?php if ($edit): ?>
        Edit Review
    <?php else: ?>
        Add Review
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
            <label>Coffee Type:</label>
            <select name="review[coffee_type]">
            <?php foreach ($coffeeTypes as $coffeeType): ?>
                <option value="<?php echo $coffeeType; ?>"
                        <?php if ($review->getCoffeeType() == $coffeeType): ?>
                            selected="selected"
                        <?php endif; ?>
                        ><?php echo $coffeeType; ?></option>
            <?php endforeach; ?>
            </select>
            
            <div class="field">
            <label>Cafe:</label>
            <input type="text" name="review[cafe_id]" value="<?php echo Utils::escape($review->getCafeId()); ?>"
                   class="text<?php echo error_field('cafe_id', $errors); ?>"/>
            </div>  
            
            <label>Rating:</label>
    <select name="review[rating]">
    <?php foreach ($ratings as $rating): ?>
        <option value="<?php echo $rating; ?>"
                <?php if ($review->getRating() == $rating): ?>
                    selected="selected"
                <?php endif; ?>
                ><?php echo $rating; ?></option>
    <?php endforeach; ?>    
        </select>
        <div class="field">
            <label>Review:</label>
            <input type="text" name="review[comment]" value="<?php echo Utils::escape($review->getComment()); ?>"
                      class="text<?php echo error_field('comment', $errors); ?>"/>
        </div>
            
            <div class="wrapper">
            
            <input type="submit" name="save" value="<?php echo $edit ? 'EDIT' : 'ADD'; ?>" class="submit" />
        </div>
    </fieldset>
</form>
    </div>