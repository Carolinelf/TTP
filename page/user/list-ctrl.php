<?php

$headTemplate = new HeadTemplate('User List | The Perfect Pour', 'List of Users');

//$status = Utils::getUrlParam('status');
//TodoValidator::validateStatus($status);

$dao = new UserDao();
//$search = new TodoSearchCriteria();
//$search->setStatus($status);

// data for template
//$title = Utils::capitalize($status) . ' TODOs';
$sql = 'SELECT id, username, email, privilege FROM users';
$users= $dao->find($sql);
