<?php

    require_once '../init.php';


    $database = new Config();
    $conn = $database->getConnection();

    $users = new Users($conn);

    $users->email = $_POST['email'];
    $users->username = $_POST['username'];
    $users->password = $_POST['password'];
    $users->usertype = $_POST['usertype'];

    if ($users->signup()) {
        header('Location: ../../completesignup.php');
    }else{
        //header('Location: ../../errorSignup.php');
        var_dump($users);
    }

