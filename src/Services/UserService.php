<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Repositories/UserRepository.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Services/HelpService.php';

class UserService
{
    protected  $user;
    protected HelpService $service;


    public function __construct()
    {
        $this->user = new UserRepository();
        $this->service = new HelpService();
    }

    public function createUser($data)
    {

        foreach ($data as $key => $value) {
            switch ($key) {
                case "nickname":
                    $nickname = $this->service->checkInput($value);
                    break;
                case "email":
                    $email = $this->service->checkInput($value);
                    break;
                case "name":
                    $name = $this->service->checkInput($value);
                    break;
                case "surname":
                    $surname = $this->service->checkInput($value);
                    break;
                case "password":
                    $password = $this->service->checkInput($value);
                    break;
            }
        }
        $checkEmail = $this->user->getUserByEmail($email);
        if ($checkEmail) {
            $output = ['error' => 'Користувач з таким email вже існує'];
            return $output;
        }
        $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 11]);

        $newUser = $this->user->createUser($nickname, $email, $name, $surname, $password);

        return $newUser;
    }

    public function login($data)
    {
        foreach ($data as $value) {
            switch ($value['name']) {
                case "emailAuth":
                    $email = $this->service->checkInput($value['value']);
                    break;
                case "passAuth":
                    $password = $this->service->checkInput($value['value']);
                    break;
            }
        }

        $userFind = $this->user->getUserByEmail($email);

        if ($userFind) {
            if (password_verify($password, $userFind['password'])) {
                setcookie("user", $userFind['id'], time() + 3600, "/");
            } else {
                $output = ['error' => "Пароль не вірний"];
                return $output;
            }
        } else {
            $output = ['error' => "Користувач не знайдений"];
            return $output;
        }
        return $userFind;
    }

    public function logout()
    {
        $cookie = setcookie("user", "", 0, "/");
        return $cookie;
    }
}
