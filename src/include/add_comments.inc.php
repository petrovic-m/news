<?php


require_once '../init.php';


$database = new Config();
$conn = $database->getConnection();

$comments = new Comments($conn);

$comments->comments = $_POST['comments'];

if ($comments->insertComments()) {
    header('Location: ../../user_page');
}else{
    echo 'Neuspesno postavljanje';
    echo '<a href="../../user_page/">Go back!</a>';
}