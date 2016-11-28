<?php
$headTemplate = new HeadTemplate('User Profile | The Perfect Pour', 'User Details');

$dao = new UserDao();

$userId = $_SESSION['id'];


$sql = "SELECT username, email, password FROM users WHERE id = " . "'$userId'";
$user = $dao->find($sql);

$userEmail = $user['email'];