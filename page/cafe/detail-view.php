<h1>Cafe Detail</h1>
    <p><span class="label">Cafe Name:</span> <?php echo $cafe->getName() ?> </p>
    <p><span class="label">Location:</span> </p>
    <p><span class="label">Average Rating:</span> </p>
    <p><span class="label">Overview:</span> </p>
     


<?php if (empty($reviews)): ?>
    <p>No reviews found.</p>
<?php else: ?>
        <ul class="list">
           <?php foreach ($reviews as $review): ?>
               <li class="card"><p><span class="label">Coffee Type:</span> <?php 
                   echo Utils::escape($review->getCoffeeType()); 
                   ?></p>  
                   <p><span class="label">Rating:</span> <?php 
                   echo Utils::escape($review->getRating()); 
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
<?php endif; 