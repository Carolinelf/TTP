<?php

$headTemplate = new HeadTemplate('User List | The Perfect Pour', 'List of Users');

$dao = new UserDao();

$sql = 'SELECT id, username, email, privilege FROM users WHERE status != "deleted"';
$users= $dao->find($sql);


