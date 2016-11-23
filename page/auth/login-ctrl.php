<?php
$headTemplate = new HeadTemplate('Login | The Perfect Pour', 'Login to The Perfect Pour');
$dao = new UserDao();

if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $privilege = $_POST['privilege'];
        $user = $dao->findByCredentials($username, $password);

        if ($user === null) {
            Utils::redirect('login', array('module' => 'auth'));
        }

        if ($username === $user->getUsername() && $password === $user->getPassword()) {
            if (isset($_POST['remember-me'])) {
                setcookie('remember-me', 'username', time() + 60, '/login.php');
            }
            $_SESSION['privilege'] = $privilege;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            // redirect once logged in
            Utils::redirect('list', array('module' => 'review'));
        } else {
            $error = "Username and/or password is incorrect!";
        }
    }
    if (isset($_COOKIE['remember-me'])) {
        $_SESSION['username'] = $_COOKIE['remember-me'];
        header('Location: index.php');
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php?module=review&page=list');
}

