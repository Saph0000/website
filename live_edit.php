<?php
    session_start();
    require_once("connection.php");
    require_once("connect.php");
    $input = filter_input_array(INPUT_POST);
    if(isset($_SESSION['loggedIn'])){
        echo "test";

        if ($input['action'] == 'edit') {
            $update_field='';

            if(isset($input['name'])) {
                $update_field.= "name='".$input['name']."',";
            } 

            if(isset($input['creationDate'])) {
                $update_field.= "creationDate='".$input['creationDate']."',";
            } 

            if(isset($input['endDate'])) {
                $update_field.= "endDate='".$input['endDate']."',";
            } 

            if(isset($input['description'])) {
                $update_field.= "description='".$input['description']."'";
            } 
            
            if($update_field && $input['id']) {
                $sql_query = "UPDATE Samuel.dbo.projects SET $update_field WHERE id='" . $input['id'] . "'";
                $connection->executeCommand($sql_query);
            }
        }
        
        if($_POST['action'] == 'delete') {
            $query = "
            DELETE FROM Samuel.dbo.projects 
            WHERE id = '".$_POST["id"]."'
            ";
            $connection->executeCommand($query);
        }

    }
    $connection->close();

