<?php    
    ini_set('session.cookie_httponly', 1);
    session_start();
    require_once "connection.php";
    require_once "connect.php";

//testing if userName and Password are set
    if(isset($_POST['userName']) && isset($_POST['password'])) 
        {  
            $name = $_POST["userName"];
            $pass  = $_POST["password"];
            //getting the real password from the database
           $sql = "SELECT passwordHash FROM Samuel.dbo.[user] WHERE userName='".$name."'";
           $result = $connection->executeQuery($sql);
           $row = $result->getNextRow();
           
           $idSql = "SELECT id FROM Samuel.dbo.[user] WHERE userName='" . $name . "'";
           $idResult = $connection->executeQuery($idSql);
           $idRow = $idResult->getNextRow();
            //checking if the password ir right
            if(md5($pass) == $row['passwordHash']){
                echo "logged in";
                $_SESSION['loggedIn'] = $name;
                $_SESSION['userId'] = $idRow['id'];
                exit;

            }else{
                echo "wrong password or username";
                exit;
            }
        } else {
        //if something went completly wrong
        error_log("userName and Password are not set");
        return 1;
    }
?>