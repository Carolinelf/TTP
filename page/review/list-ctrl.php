<?php

$headTemplate = new HeadTemplate('Reviews list | The Perfect Pour', 'List of reviews');

$dao = new ReviewDao();


$sql = 'SELECT review.id, review.date, review.coffee_type, review.comment, review.rating, review.user_id, review.cafe_id, users.username AS username FROM review JOIN users ON review.user_id = users.id AND review.status = "pending"';
$reviews = $dao->find($sql);
