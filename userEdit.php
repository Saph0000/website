<?php
    session_start();
    require_once("connection.php");
    require_once("connect.php");
    $input = filter_input_array(INPUT_POST);
    if(isset($_SESSION['loggedIn'])){
        if ($input['action'] == 'edit') {
            $update_field='';
            if(isset($input['userName'])) {
                $update_field.= "userName='".$input['userName']."',";
            } 
            if(isset($input['email'])) {
                $update_field.= "email='".$input['email']."',";
            } 
            if(isset($input['firstName'])) {
                $update_field.= "firstName='".$input['firstName']."',";
            } 
            if(isset($input['lastName'])) {
                $update_field.= "lastName='".$input['lastName']."'";
            } 
            
            if($update_field && $input['id']) {
                $sql_query = "UPDATE Samuel.dbo.[user] SET $update_field WHERE id='" . $input['id'] . "'";
                echo $sql_query;
                $connection->executeCommand($sql_query);
                $_SESSION['loggedIn'] = $input['userName'];
            }
        }
    }
    $connection->close();