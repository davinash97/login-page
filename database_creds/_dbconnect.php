<?php
    try {
        $server = "localhost";
        $username = "test";
        $password = $username;
        $database = "users_db";
        $db_name = "users_database";
        $conn = mysqli_connect($server, $username, $password, $database);
        if ($conn -> connect_error){
            die("Error Connecting to Database: ". $conn -> connect_error);
        }
    } catch(Exception $e) {
        echo 'Message: ' . $e;
    }

?>