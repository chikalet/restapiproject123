<?php
session_start();
$connect = mysqli_connect('localhost', 'root', 'root', 'users');

$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_EMAIL);

$email = stripslashes($email);
$email = htmlspecialchars($email);
$password = stripslashes($_POST['password']);
$password = htmlspecialchars($_POST['password']);

$table = $connect->query("SELECT * FROM `data` where `email`='$email'");
$tableASSOC = $table->fetch_assoc();

if (empty($tableASSOC['id'])){
    $_SESSION['message'] = "пользователь не найден";
    header('location: index.php');
    exit();
} else {
    header('location: quests.php');
    exit();
}



