<?php

$headTemplate = new HeadTemplate('Sign up | The Perfect Pour', 'Register as a User');

$errors = array();
$edit = array_key_exists('id', $_GET);

    // set defaults
    $user = new User();
    $user->getUsername();
    $user->getPassword();
    $user->getEmail();
    $user->setPrivilege('user');
    $user->setStatus('pending');

    
    if (array_key_exists('save', $_POST)) {

    // for security reasons, do not map the whole $_POST['todo']
    $data = array(
        'username' => $_POST['user']['username'],
        'password' => $_POST['user']['password'],
        'email' => $_POST['user']['email']
            
//        'username' => filter_input(INPUT_POST, ['user']['username'], FILTER_SANITIZE_STRING),
//        'password' => filter_input(INPUT_POST, ['user']['password'], FILTER_SANITIZE_STRING),
//        'email' => filter_input(INPUT_POST, ['user']['email'], FILTER_SANITIZE_STRING)
    );
    

    // map
    UserMapper::map($user, $data);

    // validate
    $errors = RegisterValidator::validate($user);
    // validate
    if (empty($errors)) {
        // save
        $dao = new UserDao();
        $user = $dao->save($user);
        Flash::addFlash('User saved successfully.');
        // redirect
        Utils::redirect('list', array('module'=>'user'));
     
    }
    }