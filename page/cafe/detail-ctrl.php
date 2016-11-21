<?php

$headTemplate = new HeadTemplate('Cafe Details | The Perfect Pour', 'Cafe Details');

// data for template
$review = Utils::getObjByGetId();
$latestReview = $review-> getStatus() == Review::STATUS_PENDING && $review->getDate() < new DateTime();
//$tooLate = $todo->getStatus() == Todo::STATUS_PENDING && $todo->getDueOn() < new DateTime();
