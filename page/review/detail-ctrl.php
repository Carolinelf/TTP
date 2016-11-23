<?php

$id = $_GET['id'];
$dao = new ReviewDao();
$sql = 'SELECT id, date, coffee_type, comment, user_id, cafe_id FROM review WHERE  status != "deleted" AND cafe_id = ' . $id;
$reviews = $dao->find($sql);
