<?php

class Config
{
    public $db_host = 'localhost';
    public $db_name = 'news';
    public $db_user = 'root';
    public $db_pass = 'root';

    private $conn;

    public function getConnection()
    {
        $this->conn = null;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
            PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
        ];
        try {
            $this->conn = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name,$this->db_user,$this->db_pass, $options);
        }catch (PDOException $e) {
            echo 'Problem: ' .$e->getMessage();
        }
        return $this->conn;
    }
}