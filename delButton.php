<?php
session_start();
require_once("connection.php");
require_once("connect.php");

$id = $_POST['id'];

$sql = "DELETE FROM Samuel.dbo.goalGallery WHERE id='" . $id . "';";

$connection->executeCommand($sql);

$connection->close();