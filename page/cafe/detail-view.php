<h1>Cafe Detail</h1>
    <p><span class="label">Cafe Name:</span> <?php echo $cafe->getName() ?> </p>
    <p><span class="label">Location:</span> <?php echo $cafe->getLocation() ?></p>
    <p><span class="label">Average Rating:</span><?php echo $cafe->getAverageRating() ?> </p>
    <p><span class="label">Overview:</span><?php echo $cafe->getOverview() ?> </p>
     

<?php require '../page/review/detail-view.php'; ?>