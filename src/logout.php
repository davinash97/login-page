<?php
    setcookie("email", "");
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: ../index.php");
    exit();
?>