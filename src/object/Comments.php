<?php
session_start();
class Comments
{

    public $id;
    public $comments;
    public $users_id;
    public $news_id;


    private $conn;
    private $tb_name = 'comments';

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insertComments()
    {
        $sessionNewsId = $_SESSION['news_id'];
        $sessionId = $_SESSION['id'];


        $query = "INSERT INTO $this->tb_name 
                  SET comments = :comments, 
                      users_id = :sessionId,
                      news_id = :news_id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':comments', $this->comments);
        $stmt->bindParam(':sessionId', $sessionId);
        $stmt->bindParam(':news_id', $sessionNewsId);

        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        return false;
    }


    public function setId($news_id)
    {
        $this->news_id = $news_id;
    }

    public function seeAllComments()
    {
        $query = "SELECT * FROM $this->tb_name WHERE news_id = :news_id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':news_id', $this->news_id);

        $stmt->execute();

        return $stmt;
    }

    public function deleteComments($id)
    {
        $this->id = $id;

        $query = "DELETE FROM $this->tb_name WHERE id = :id";

        $stmt = $this->conn
            ->prepare($query);

        $stmt->bindParam(":id", $this->id);

        $stmt->execute();

        return $stmt;
    }

}