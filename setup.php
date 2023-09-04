<?php

    $server = "127.0.0.1"; // or 127.0.0.1
    $username = "root"; // Your Admin Username here
    $password = "root"; // Your Root Password here
    $database = "users_db";
    $db_name = "users_database";
    
    try{
        $createDB = "CREATE DATABASE `$database`";
        $conn = mysqli_connect($server, $username, $password);
        $result = mysqli_query($conn, $createDB);
        if($result) {
            echo "Successfully created Database";
        } else {
            echo "Some error occured";
        }
    } catch (Exception $e) {
        echo "Message: . $e";
    } finally {
        $conn -> close();
    }

    try {    
        $conn = mysqli_connect($server, $username, $password, $database);
        $SQL = "CREATE TABLE IF NOT EXISTS `users_db`.`users_database` (
        `sno` INT AUTO_INCREMENT PRIMARY KEY,
        `fname` VARCHAR(20) NOT NULL,
        `lname` VARCHAR(20) NOT NULL,
        `email` VARCHAR(30) NOT NULL,
        `username` VARCHAR(12) NOT NULL,
        `phone` BIGINT(12) NOT NULL,
        `dob` DATE NOT NULL,
        `city` VARCHAR(15) NOT NULL,
        `district` VARCHAR(15) NOT NULL,
        `state` VARCHAR(15) NOT NULL,
        `password` VARCHAR(15) NOT NULL,
        INDEX (`sno`),
        UNIQUE (`username`),
        UNIQUE (`phone`)
    ) ENGINE = InnoDB";

        $result = $conn -> query($SQL);
        if ($result) {
            echo "Succesful";
        }else {
            echo "Some Error Occured";
        }
    }
    catch (Exception $e) {
        echo 'Message: ' . $e->getMessage();
    }
    finally {
        header('Location: index.php');
    }
?>