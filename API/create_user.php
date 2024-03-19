<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'users');
$post  = $_POST;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($ur[4])){
    $dateJSGET = array();
    $idGET = intval($ur[4]);
    $resultPOST = $connect->query("SELECT * FROM `data` WHERE `id`='$idGET'");
    while($dateGET = mysqli_fetch_all($resultPOST)){
        $dateJSGET[] = $dateGET;
    }


    echo json_encode($dateJSGET);
    die();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($ur[4])){
    $idPOST = intval($ur[4]);
    $setClauses = array();
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $setClauses[] = "`username` = '$username'";
    }
    if (isset($_POST['lastname'])) {
        $lastname = $_POST['lastname'];
        $setClauses[] = "`lastname` = '$lastname'";
    }
    if (isset($_POST['phonenumber'])) {
        $phonenumber = $_POST['phonenumber'];
        $setClauses[] = "`phonenumber` = '$phonenumber'";
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $setClauses[] = "`email` = '$email'";
    }

    $setClause = implode(', ', $setClauses);

    if (!empty($setClause)) {
        mysqli_query($connect, "UPDATE `data` SET $setClause WHERE id = '$idPOST'");
    }

    $ok = array('ok' => 1);
    echo json_encode($ok);
    //mysqli_query($connect,"UPDATE `data` SET `username` = '$username', `lastname` = '$lastname', `email` = '$email', `phoneNumber` = '$phonenumber' WHERE id = '$idPOST'");
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $table = $connect->query("SELECT * FROM `data`");

    while($data = mysqli_fetch_all($table)){
        $dataJS [] = $data;
    }

    echo json_encode($dataJS);
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $post['username'];
    $lastname = $post['lastname'];
    $phonenumber =$post['phonenumber'];
    $email = $post['email'];
    $balance = $post['balance'];
    mysqli_query($connect, "insert into `data`(`username`, `lastname`, `phoneNumber`, `email`, `balance`)
values ('$username', '$lastname', '$phonenumber', '$email', '$balance')");
    $ok = array('ok' => 1);
    echo json_encode($ok);
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE'){
    $idDELETE = intval($ur[4]);
    $resultDELETE = mysqli_query($connect, "DELETE FROM `data` WHERE `id`='$idDELETE'");
    $ok = array('ok' => 1);
    echo json_encode($ok);
    die();
}
