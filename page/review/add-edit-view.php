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
/* @var $booking Booking */
?>

<div class="card form">
    <h1>
        <?php if ($edit): ?>
            Edit Review
        <?php else: ?>
            Add New Review
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
                <div class=" col-xs-10"> 
                    <label for="coffeetype">Coffee Type:</label>
                    <select class="form-control" name="review[coffee_type]">
                        <?php foreach ($coffeeTypes as $coffeeType): ?>
                            <option value="<?php echo $coffeeType; ?>"
                                    <?php if ($review->getCoffeeType() == $coffeeType): ?>
                                        selected="selected"
                                    <?php endif; ?>
                                    ><?php echo $coffeeType; ?></option>
<?php endforeach; ?>
                    </select>
                </div></div>
            <div class="form-group row">
                <div class=" col-xs-10"> 
                    <label for="cafe">Cafe:</label>
                    <input class="form-control" type="text" name="review[cafe_id]" value="<?php echo Utils::escape($review->getCafeId()); ?>"
                           class="text<?php echo error_field('cafe_id', $errors); ?>"/>
                </div>  </div>
            <div class="form-group row">
                <div class=" col-xs-10">       
                    <label for="rating">Rating:</label>
                    <select class="form-control" name="review[rating]">
                        <?php foreach ($ratings as $rating): ?>
                            <option value="<?php echo $rating; ?>"
                                    <?php if ($review->getRating() == $rating): ?>
                                        selected="selected"
                                    <?php endif; ?>
                                    ><?php echo $rating; ?></option>
<?php endforeach; ?>    
                    </select>
                </div></div>


            <div class="form-group row">
                <div class=" col-xs-10">   
                    <label for="review">Review:</label>
                    <textarea class="form-control" type="text" name="review[comment]" value="<?php echo Utils::escape($review->getComment()); ?>"
                              class="text<?php echo error_field('comment', $errors); ?>"></textarea>
                </div></div>

            <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-secondary" name="save">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>