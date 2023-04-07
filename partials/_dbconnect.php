<?php
try {
    $server = "localhost";
    $username = "test";
    $password = $username;
    $database = "users_db";
    $db_name = "users_database";
    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn){
        die("Error". mysqli_connect_error());
    }
}
catch(Exception $e) {
    echo 'Message: ' + $e->getMessage();
}
?>
