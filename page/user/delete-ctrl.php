<?php

$userDao = new UserDao();
$user = Utils::getObjByGetId($userDao); 

$userDao->delete($user->getId()); 
Flash::addFlash('Review deleted successfully.');

Utils::redirect('list', array('module'=>'user'));

