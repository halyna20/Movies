<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/lib/Database.php";

class UserRepository
{
    private $db;
    public function __construct() {
        $this->db = new Database();
    }

    public function createUser($nickname, $email, $name, $surname, $password) {
        $query = "INSERT INTO users (`nickname`, `email`, `name`, `surname`, `password`) 
                    VALUES ('" . $nickname . "', '" . $email . "', '" . $name . "', '" . $surname . "', '" . $password . "')";

        try {
            $result = $this->db->insert($query);

            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getUserByEmail($email) {
        $query = "SELECT id, password FROM users WHERE `email` LIKE '" . $email . "'";
        try {
            $result = $this->db->select($query);

            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}