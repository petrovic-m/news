<?php

require_once '../init.php';


$database = new Config();
$conn = $database->getConnection();

$news = new News($conn);

$news->title = $_POST['title'];
$news->body = $_POST['body'];

if ($news->addNews()) {
    header('Location: ../../admin_page');
}else{
    header('Location: ../../admin_page');
}

