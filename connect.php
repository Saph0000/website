<?php
//connect to the sql server
require_once "connection.php";

$host = "winas099.wina.local";   
        $username = "tankdbu";     
        $password = "saentis.blick";    
        $database = "Samuel";   



        /* Connect using SQL Server. */    
        $connection = new SqlConnection($host, $username, $password, $database);

        if (!$connection->open()) {

        die("Connection failed:");

        }