<h1 class="underline"><?php echo $cafe->getName() ?></h1>
<div class="numberCircle"><?php echo Utils::escape($cafe->getAverageRating()); ?></div> 
<p><span class="label">Location:</span> <?php echo $cafe->getLocation() ?></p>
    <p><span class="label">Overview:</span><?php echo $cafe->getOverview() ?> </p>
     

<?php require '../page/review/detail-view.php'; ?>