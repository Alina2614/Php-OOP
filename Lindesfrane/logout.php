<?php
    session_start();
    $_SESSION['email'] = "";
    session_destroy();
    header("location: http://localhost/Lindesfrane/login.html");
?>