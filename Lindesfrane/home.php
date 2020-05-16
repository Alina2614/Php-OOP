<?php
    session_start();
    include_once("./setup/dbCon.php");
    $con = connect();
    $sql = "select `user_type` from users where `email`='".$_SESSION['email']."'";
    $result = mysqli_query($con, $sql);
    mysqli_fetch_array($result)[0]=='0'?header("location:./admin/admin_home.php"):header("location:./user/user_home.php");
?>