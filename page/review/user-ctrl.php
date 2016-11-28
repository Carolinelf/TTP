<?php

$userId = $_SESSION['id'];
$dao = new ReviewDao();

$sql = 'SELECT review.id, review.date, review.coffee_type, review.comment, review.rating, review.user_id, review.cafe_id, users.username FROM review JOIN users ON review.user_id = ' . "'$userId'" . ' AND review.status = "pending"';
$reviews = $dao->find($sql);



//$sql = "SELECT username, email, password FROM reviews WHERE user_id = " . "'$userId'";
//$user = $dao->find($sql);
//

