<?php

$reviewDao = new ReviewDao();
$review = Utils::getObjByGetId($reviewDao);


$reviewDao->delete($review->getId());
Flash::addFlash('Review deleted successfully.');

Utils::redirect('list', array('module'=>'review'));
