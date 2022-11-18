<?php
require_once ("connect.php");
require_once ("connection.php");
$query = " INSERT INTO Samuel.dbo.projects (name";

    if ($_POST['creationDate'] !== ""){
        $query .= ", creationDate";
    }

    if ($_POST['endDate'] !== ""){
        $query .= ", endDate";
    }  

$query .= ",description) VALUES ('" . $_POST['rowName'] . "', '";

    if ($_POST['creationDate'] !== ""){
        $query .= $_POST['creationDate'] . "', '";
    }
    if ($_POST['endDate'] !== ""){
        $query .= $_POST['endDate'] . "', '";
    }
$query .= $_POST['description'] . "');";

    $connection->executeCommand($query);
    echo $query;
    $connection->close();
