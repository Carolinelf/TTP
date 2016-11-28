<?php
//~ Template for list.php
// variables:
//  $title - page title
//  $status - status of TODOs to be displayed
//  $todos - TODOs to be displayed
?>

<h1 class="underline">Latest Reviews</h1>

<?php if (empty($reviews)): ?>
    <p>No reviews found.</p>
<?php else: ?>
        <ul class="list">
           <?php foreach ($reviews as $review): ?>
               <li class="card">
                   <div class="numberCircle"><?php 
                echo Utils::escape($review->getRating()); 
                ?></div>
                   <p><span class="label">Coffee Type:</span> <?php 
                   echo Utils::escape($review->getCoffeeType()); 
                   ?></p>  
                   <p><span class="label">Date Created:</span> <?php 
                   echo Utils::escape($review->getDate()); 
                   ?></p>  
                   <p><span class="label">Review:</span> <?php 
                   echo Utils::escape($review->getComment()); 
                   ?></p> 
                   <p><span class="label">Created By:</span><?php 
                   echo  Utils::escape($review->getUsername());
                   ?></p>
                   <?php if (array_key_exists('privilege', $_SESSION)){
                        if ($_SESSION['privilege'] === 'admin'){?>
                         <a href="index.php?module=review&page=add-edit&id=<?php echo $review->getId()?>">Edit</a>
                        | <a href="index.php?module=review&page=delete&id=<?php echo $review->getId()?>">Delete</a>
                   <?php }} ?>
                   </li>
           <?php endforeach; ?>
       </ul>
<?php endif; ?>

