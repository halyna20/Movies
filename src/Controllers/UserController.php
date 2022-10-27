<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Services/UserService.php';

$user = new UserService();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {

    if ($_POST['action'] === 'Registration') {

       $newUser = $user->createUser($_POST['data']);
       echo json_encode($newUser);
    }

    if ($_POST['action'] === 'Login') {
        if (isset($_POST['data'][0]['value']) && $_POST['data'][0]['value'] != ''
            && isset($_POST['data'][1]['value']) && $_POST['data'][1]['value'] != '') {
            $userAuth = $user->login($_POST['data']);
            echo json_encode($userAuth);
        } else {
            $output = ['error' => 'Введіть дані'];
            echo json_encode($output);
        }
    }

    if ($_POST['action'] === 'Logout') {
        $logout = $user->logout();
        echo json_encode($logout);
    }
}