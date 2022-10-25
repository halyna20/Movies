<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Services/UserService.php';

$user = new UserService();


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {

    if ($_POST['action'] === 'Registration') {

       $newUser = $user->createUser($_POST['data']);
       echo json_encode($newUser);
    }

    if ($_POST['action'] === 'Login') {
        $userAuth = $user->login($_POST['data']);

        echo json_encode($userAuth);
    }

    if ($_POST['action'] === 'Logout') {
        $logout = $user->logout();
        echo json_encode($logout);
    }
}