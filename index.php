<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"></link>
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/dist/jquery.tabledit.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
        //setting cookie to httpOnly
        ini_set('session.cookie_httponly', 1);
        session_start();
        //include files for connection to sql server
        require_once "connection.php";
        require_once "connect.php";
        

        //require the bootstrap modals
        require_once "modal/rowModal.php";
        require_once "modal/loginModal.php";
        require_once "modal/logoutModal.php"; 
        require_once "modal/userModal.php";
        require_once "modal/registerModal.php";
        require_once "modal/changePasswordModal.php";

        //checking if user is new or logged in
        $isLoggedIn = isset($_SESSION['loggedIn']) == true;
        require_once('site.php');
        /*if(isset($_SESSION['loggedIn']) == true){
            require_once "loggedin.php";
            
        }else {
            require_once "newUser.php";
        }*/
    ?>
</body>
</html>