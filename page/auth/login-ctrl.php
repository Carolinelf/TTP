<?php
$headTemplate = new HeadTemplate('Login | The Perfect Pour', 'Login to The Perfect Pour');

$dao = new UserDao();
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $user = $dao->findByCredentials($username, $password);

        if ($user === null) {
            Utils::redirect('login', array('module' => 'auth'));
        }

        if ($username === $user->getUsername() && $password === $user->getPassword()) {
            $_SESSION['username'] = $username;
            $_SESSION['privilege'] = $user->getPrivilege();
            $_SESSION['id'] = $user->getId();

            // redirect once logged in
            Utils::redirect('list', array('module' => 'review'));
        } else {
            $error = "Username and/or password is incorrect!";
        }
    }

    $errors = LoginValidator::validate($user);

    if (empty($errors)) {
        // save
        $dao = new UserDao();
        $user = $dao->save($user);
        Flash::addFlash('User saved successfully.');
        // redirect
        Utils::redirect('list', array('module' => 'user'));
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php?module=review&page=list');
}

