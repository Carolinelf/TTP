<?php

$userId = $_SESSION['id'];
$dao = new ReviewDao();


$sql = 'SELECT review.id, review.date, review.coffee_type, review.comment, review.rating, review.user_id, review.cafe_id, users.id FROM review JOIN users ON review.user_id = users.id AND review.status = "pending" AND users.id = ' . "'$userId'";
$reviews = $dao->find($sql);

