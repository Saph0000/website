<?php
require_once("connect.php");
require_once("connection.php");
session_start();

if($_POST['goal'] !== ""){

$goal = $_POST['goal'];
$userId = $_SESSION['userId'];

$sql = "INSERT INTO Samuel.dbo.goalGallery (xPos, yPos, goal, userId)
VALUES ('50','50','" . $goal . "','" . $userId . "');";
echo $sql;

$connection->executeCommand($sql);

$connection->close();

}else{
    echo "empty";
}