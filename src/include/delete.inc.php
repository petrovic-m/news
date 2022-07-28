<?php

require_once '../init.php';

$database = new Config();
$conn = $database->getConnection();

$news = new News($conn);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($news->deleteNews($id)) {
        header("Location: ../../admin_page/");
    }
} else {
    echo 'Nije uspelo brisanje';
}