<?php
require_once("connect.php");
require_once("connection.php");

session_start();
$picId = $_POST['picId'];
$userId = $_SESSION['userId'];
$yPos =  $_POST['coordinatesTop'];
$xPos = $_POST['coordinatesLeft'];

$sql = "UPDATE Samuel.dbo.goalGallery 
SET xPos = " . $xPos . ", yPos = " . $yPos . " 
WHERE id = " . $picId . "AND userId = " . $userId . ";";
echo $sql;

$connection->executeCommand($sql);

$connection->close();

