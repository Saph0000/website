<?php
require_once("connect.php");
require_once("connection.php");

session_start();
$userId = $_SESSION['userId'];
$yPos =  $_POST['coordinatesTop'];
$xPos = $_POST['coordinatesLeft'];
$zindex = $_POST['zindex'];
$picId = $_POST['picId'];

$sql = "UPDATE Samuel.dbo.PictureGallery 
SET xPos = " . $xPos . ", yPos = " . $yPos . ", zindex=" . $zindex . "
WHERE id = " . $picId . "AND userId = " . $userId . "; 
UPDATE Samuel.dbo.PictureGallery set zindex = zindex - 1 where id <>" . $picId;

$sql2 = "UPDATE Samuel.dbo.PictureGallery set zindex = zindex - 1 where id <>" . $picId;
echo $sql2;

$connection->executeCommand($sql);

$connection->close();

