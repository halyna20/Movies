<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/conf/db.php';

class Database
{
    protected $host   = DB_HOST;
    protected $user   = DB_USER;
    protected $pass   = DB_PASS;
    protected $dbname = DB_NAME;

    protected $connect;
    protected $error;

    public function __construct() {
        $this->connectDB();
    }

    private function connectDB() {
        $this->connect = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );

        if (!$this->connect) {
            $this->error = "Connection fail" . $this->connect->connect_error;
            return false;
        }
    }

    public function select($query) {
        $result = $this->connect->query($query) or
        die($this->connect->error . __LINE__);

        $i = 0;
        $countRows = $result->num_rows;

        $data = [];
        if ($countRows > 1) {
            while ($i < $countRows ) {
                $data[] = $result->fetch_assoc();
                $i++;
            }
        } else if ($countRows === 1){
            $data = $result->fetch_assoc();
        }

        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
    }

    public function insert($query) {
        $insert_row = $this->connect->query($query) or
        die($this->connect->error . __LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            return false;
        }
    }


    public function update($query) {
        $update_row = $this->connect->query($query) or
        die($this->connect->error . __LINE__);
        if ($update_row) {
            return $update_row;
        } else {
            return false;
        }
    }


    public function delete($query) {
        $delete_row = $this->connect->query($query) or
        die($this->connect->error . __LINE__);
        if ($delete_row) {
            return $delete_row;
        } else {
            return false;
        }
    }
}