<?php
session_start();
include_once("connection.php");
include_once("connect.php");

$userName = $_POST['userName'];
$firstname = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$createUserQuery = "INSERT INTO Samuel.dbo.[user] (userName, passwordHash, email, firstName, lastName)
VALUES ('" . $userName . "', '" . $password . "', '" . $email . "', '" . $firstname . "', '" . $lastName . "');";
$addPicturesQuery = 
$sql = "SELECT *
FROM Samuel.dbo.[user]
WHERE EXISTS
(SELECT * FROM Samuel.dbo.Picturegallery WHERE userName = '" . $userName . "'); ";
$query = $connection->executeQuery($sql);
if($query->getNextRow()){
  echo "Username already exist's";
} else {
  echo "logedIn";
  $connection->executeCommand($createUserQuery);
  $idSql = "SELECT id FROM Samuel.dbo.[user] WHERE userName='" . $userName . "'";
    $result = $connection->executeQuery($idSql);
    $row = $result->getNextRow();
    $_SESSION['loggedIn'] = $userName;
    $_SESSION['userId'] = $row['id'];
}