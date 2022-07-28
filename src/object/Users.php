<?php

class Users
{

    public $id;
    public $email;
    public $username;
    public $password;
    public $usertype = '';

    private $conn;
    private $tb_name = 'users';

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function userAlreadyExists()
    {
        $query = "SELECT *
                  FROM $this->tb_name
                  WHERE username = :username AND password = :password";

        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);

        if($stmt->rowCount() == 1){
            return true;
        }else{
            return false;
        }
    }

    public function signup()
    {
//        if($this->userAlreadyExists()){
//            return false;
//        }
        $query = "INSERT INTO $this->tb_name 
                  SET email = :email, 
                      username = :username, 
                      password = :password, 
                      usertype = :usertype";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':usertype', $this->usertype);

        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        return false;
    }

    public function login()
    {
        $query = "SELECT id, username, password, usertype
                  FROM $this->tb_name
                  WHERE username = :username AND password = :password";

        $stmt = $this->conn->prepare($query);


        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $this->password);

        $stmt->execute();
        return $stmt;
    }
    public function viewUsers()
    {
        $query = "SELECT * FROM $this->tb_name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


}
