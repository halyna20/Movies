<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/lib/Database.php";
class FilmRepository
{
    private $db;
    public function __construct() {

        $this->db = new Database();
    }

    public function getAllFilms() {
        $query = "SELECT * FROM movies ORDER BY id ";

        try {
            $result = $this->db->select($query);

            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getFilmsByName() {
        $query = "SELECT * FROM movies ORDER BY title";

        try {
            $result = $this->db->select($query);

            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function addFilm($title, $year, $format, $stars, $description) {
        $query = "INSERT INTO movies (`title`, `year`, `format`, `stars`, `description`) 
                    VALUES ('" . $title . "', '" . $year . "', '" . $format . "', '" . $stars . "', '" . $description . "')";
        try {
            $result = $this->db->insert($query);

            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteFilm($id) {
        $query = "DELETE FROM movies WHERE `id` = " . $id;

        try {
            $result = $this->db->delete($query);

            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getFilmById($id) {
        $query = "SELECT * FROM movies WHERE `id` =" . $id;

        try {
            $result = $this->db->select($query);

            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function search($value) {
        $query = "SELECT * FROM movies WHERE `title` LIKE '%" . $value . "%' OR `stars` LIKE '%". $value . "%'";

        try {
            $result = $this->db->select($query);

            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function importData($title, $year, $format, $stars) {
        $query = "INSERT INTO movies (`title`, `year`, `format`, `stars`) 
                    VALUES ('" . $title . "', '" . $year . "', '" . $format . "', '" . $stars . "')";

        try {
            $result = $this->db->insert($query);

            return $result;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}