<?php


require_once '../init.php';

$database = new Config();
$conn = $database->getConnection();

$comments = new Comments($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($comments->deleteComments($id)) {
        header("Location: ../../user_page/");
    }
} else {
    echo 'Nije uspelo brisanje';
}