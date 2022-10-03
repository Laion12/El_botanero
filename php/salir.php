<?php
    require_once 'main.php';
    session_unset();
    session_destroy();
    if(headers_sent()){
        echo "<script> window.location.href='../views/login.html' </script>";
    }else{
        header("location: ../views/login.html");
        exit();
    }
?>