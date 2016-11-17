<?php

$headTemplate = new HeadTemplate('Reviews list | The Perfect Pour', 'List of reviews');
//$status = Utils::getUrlParam('status');
//TodoValidator::validateStatus($status);
$dao = new ReviewDao();
//$search = new TodoSearchCriteria();
//$search->setStatus($status);
// data for template
//$title = Utils::capitalize($status) . ' TODOs';
$sql = 'SELECT * FROM review WHERE status != "deleted"';
$reviews = $dao->find($sql);