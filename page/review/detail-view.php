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
                   </li>
           <?php endforeach; ?>
       </ul>
<?php endif; ?>