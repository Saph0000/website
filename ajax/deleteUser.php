<?php
session_start();
if(isset($_SESSION['loggedIn'])){
include_once "C:/xampp/htdocs/webSam/connection.php";
include_once "C:/xampp/htdocs/webSam/connect.php";

$userId = $_SESSION['userId'];

$sql = "DELETE FROM Samuel.dbo.PictureGallery Where userId = '" . $userId . "';";
$sql.= "DELETE FROM Samuel.dbo.goalGallery Where userId = '" . $userId . "';";
$sql .= "DELETE FROM Samuel.dbo.[user] WHERE id = '" . $userId . "';";
echo $sql;
$connection->executeCommand($sql);
$connection->close();
unset($_SESSION['loggedIn']);
unset($_SESSION['userId']);
}else {
    echo "Not logged in";
}
/* Alternative version that only worked in microsoft servermanager and not in PHP

$sql = "ALTER TABLE Samuel.dbo.PictureGallery NOCHECK CONSTRAINT all;
ALTER TABLE Samuel.dbo.goalGallery NOCHECK CONSTRAINT all;
DELETE FROM Samuel.dbo.[user] WHERE id = '" . $userId . "';
ALTER TABLE Samuel.dbo.PictureGallery CHECK CONSTRAINT all;
ALTER TABLE Samuel.dbo.goalGallery CHECK CONSTRAINT all;";
*/