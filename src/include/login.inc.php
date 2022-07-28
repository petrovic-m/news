<?php

require_once '../init.php';

$database = new Config();
$conn = $database->getConnection();

$users = new Users($conn);

$users->username = $_POST['username'];
$users->password = $_POST['password'];
$stmt = $users->login();

if($stmt->rowCount() == 1){
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    session_start();
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];

    $_SESSION['usertype'] = $row['usertype'];
        if ($row['usertype'] == 'user') {
            header('Location: ../../user_page');
        } elseif ($row['usertype'] == 'admin') {
            header('Location: ../../admin_page');
        }
}else{
    header('Location: ../../index.php');
}