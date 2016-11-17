<?php

$headTemplate = new HeadTemplate('Cafe list | The Perfect Pour', 'List of Cafes');
//$status = Utils::getUrlParam('status');
//TodoValidator::validateStatus($status);
$dao = new CafeDao();
//$search = new TodoSearchCriteria();
//$search->setStatus($status);
// data for template
//$title = Utils::capitalize($status) . ' TODOs';
$sql = 'SELECT * FROM cafe';
$cafes = $dao->find($sql);