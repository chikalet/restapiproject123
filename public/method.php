
<?php
header('Content-Type: application/json');
$url = $_SERVER['REQUEST_URI'];
$ur = explode('/', $url);
$nameMethod = $ur[3];


if ($nameMethod == 'create_user'){
    require '../API/create_user.php';
    die();
} else if ($nameMethod == 'create_quest'){
    require '../API/create_quest.php';
    die();
}

$ok = array('fail' => 1);
echo json_encode($ok);
?>

