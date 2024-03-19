<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'users');
$post  = $_POST;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $post['name'];
    $balance = $post['cost'];
    mysqli_query($connect, "insert into `quests`(`name`,`cost`)
values ('$name','$balance')");
    $ok = array('ok' => 1);
    echo json_encode($ok);
    die();
}