<?php

$id = $_SESSION['id'];
$dao = new UserDao();
$sql = 'SELECT username, email, password FROM user WHERE  status != "deleted" AND id = ' . $id;
$reviews = $dao->find($sql);
