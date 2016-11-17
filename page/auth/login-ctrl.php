<?php
session_start(); 
$headTemplate = new HeadTemplate('Login | The Perfect Pour', 'Login to The Perfect Pour');

$errors = array();
$user = null;
//$edit = array_key_exists('id', $_GET);
//if ($edit) {
//    $dao = new UserDao();
//    $user = Utils::getObjByGetId($dao);
//} else {
    // set defaults
    $user = new User();
    $user->getUsername();
    $user->getPassword();
//    $user->getEmail();
//    $user->setPrivilege('user');
//}

//if (array_key_exists('cancel', $_POST)) {
//    // redirect
//    Utils::redirect('detail', array('id' => $b->getId()));
//} else
    
//    if (array_key_exists('save', $_POST)) {
    // for security reasons, do not map the whole $_POST['todo']
    $data = array(
        $username => $_POST['user']['username'],
        $password => $_POST['user']['password']

//        'username' => $_POST['user']['username'],
//        'password' => $_POST['user']['password']
//        'email' => $_POST['user']['email']
    );
    
    // map
    UserMapper::map($user, $data);
    // validate
    $errors = UserValidator::validate($user);
    // validate
    if (empty($errors)) {
        // save
        $dao = new UserDao();
        $user = $dao->save($user);
        Flash::addFlash('User saved successfully.');
        // redirect once logged in
        Utils::redirect('list', array('module'=>'user'));
     }
//}
