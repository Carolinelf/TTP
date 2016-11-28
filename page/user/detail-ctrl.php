<?php
$headTemplate = new HeadTemplate('User Profile | The Perfect Pour', 'User Details');

$dao = new UserDao();
$user = Utils::getObjByGetId($dao);

//$_SESSION['id'] = $user->getId();
//$userId = $_SESSION['id'];
//
//$sql = 'SELECT username, email, password FROM user WHERE  status != "deleted" AND id = ' . $userId;
//$user = $dao->find($sql);
