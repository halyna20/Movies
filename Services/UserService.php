<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Repositories/UserRepository.php';

class UserService
{
    protected  $user;

    public function __construct()
    {
        $this->user = new UserRepository();
    }

    public function createUser($data)
    {
        foreach ($data as $value) {
            switch ($value['name']) {
                case "nickname":
                    $nickname = $this->checkInput($value['value']);
                    break;
                case "email":
                    $email = $this->checkInput($value['value']);
                    break;
                case "name":
                    $name = $this->checkInput($value['value']);
                    break;
                case "surname":
                    $surname = $this->checkInput($value['value']);
                    break;
                case "password":
                    $password = $this->checkInput($value['value']);
                    break;
            }
        }

        $newUser = $this->user->createUser($nickname, $email, $name, $surname, $password);
        var_dump($newUser);
        setcookie("user", 1, time()+3600, "/");
        return $newUser;
    }

    public function login($data) {
        foreach ($data as $value) {
            switch ($value['name']) {
                case "emailAuth":
                    $email = $this->checkInput($value['value']);
                    break;
                case "passAuth":
                    $password = $this->checkInput($value['value']);
                    break;
            }
        }

        $userFind = $this->user->getUser($email, $password);
        if ($userFind) {
            setcookie("user", $userFind['id'], time()+3600, "/");
        }
        return $userFind;
    }

    public function logout() {
        $cookie = setcookie("user", "", 0, "/");
        return $cookie;
    }

    protected function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
}