<?php

$headTemplate = new HeadTemplate('Reviews list | The Perfect Pour', 'List of reviews');

$dao = new ReviewDao();

$sql = 'SELECT * FROM review WHERE status != "deleted"';
$reviews = $dao->find($sql);

