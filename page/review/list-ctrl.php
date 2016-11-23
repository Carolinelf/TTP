<?php

$headTemplate = new HeadTemplate('Reviews list | The Perfect Pour', 'List of reviews');

$dao = new ReviewDao();

$sql = 'SELECT id, date, coffee_type, comment, user_id, cafe_id FROM review WHERE status != "deleted"';
$reviews = $dao->find($sql);

