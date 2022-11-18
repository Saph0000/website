<?php
session_start();
include_once "c:/xampp/htdocs/webSam/connection.php";
include_once "c:/xampp/htdocs/webSam/connect.php";

$newPasswordHash = md5($_POST['newPassword']);
$oldPassword = $_POST['oldPassword'];
$userId = $_SESSION['userId'];

//getting the real password from the database
$sql = "SELECT passwordHash FROM Samuel.dbo.[user] WHERE id='".$userId."'";
$result = $connection->executeQuery($sql);
$password = $result->getNextRow();

//sql for the new Password
$newSql = "UPDATE Samuel.dbo.[user] SET passwordHash = '" . $newPasswordHash . "' WHERE id = '" . $userId . "'";


 //checking if the password ir right
 if(md5($oldPassword) == $password['passwordHash']){
 echo "Password updated successfully";
 $connection->executeCommand($newSql);
}else {
    echo "Wrong Password";
}