<?php
session_start();
$connect = mysqli_connect('localhost', 'root', 'root', 'users');

$table = $connect->query("SELECT * FROM `quests`");
$tableASSOC = $table->fetch_assoc();

foreach($table as $row){
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["cost"] . "</td>";
    echo "</tr>";
}