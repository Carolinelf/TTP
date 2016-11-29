<?php
$headTemplate = new HeadTemplate('User Profile | The Perfect Pour', 'User Details');

$userId = $_SESSION['id'];
$dao = new UserDao();

$user = $dao->findById($userId);

require '../page/review/profile-ctrl.php';