<?php


class News
{
    public $id;
    public $title;
    public $body;
    public $users_id;

    private $conn;
    private $tb_name = 'news';

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function addNews()
    {
        $sessionId = $this->users_id = $_SESSION['id'];
        $query = "INSERT INTO $this->tb_name 
                  SET title = :title, 
                      body = :body,
                      users_id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':id', $sessionId);

        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        return false;

    }

    public function deleteNews($id)
    {
        $this->id = $id;
        $query = "DELETE FROM $this->tb_name WHERE id = :id";

        $stmt = $this->conn
                ->prepare($query);

        $stmt->bindParam(":id", $this->id);

        $stmt->execute();

        return $stmt;
    }

    public function viewNews(){

        $query = "SELECT *
        FROM $this->tb_name";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

}