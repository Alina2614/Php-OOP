<?php
session_start();
echo("something");
require_once("../../includes.php");
require_once("../../setup/dbCon.php");
require_once("./image_upload_service.php");
// include("./admin_home.php");
print_r($_FILES);
if(!isset($_SESSION['email'])){
    header("location:../../login.html");
}
$con = connect();
    
    // print_r($_POST);
if(isset($_POST)){
    $animal_name = $_POST['animal_name'];
    $animal_age = $_POST['animal_age'];
    $animal_description = $_POST['animal_description'];
    $fileName = $_FILES["animal_photo"]["name"];
    $tempName = $_FILES["animal_photo"]["tmp_name"];
    $size = $_FILES["animal_photo"]["size"];

    // print_r($_FILES);                 
    $sql = "select `user_type` from `users` where `email`='".$_SESSION['email']."'";
    $result = mysqli_query($con, $sql);
    $arr=mysqli_fetch_array($result);


    if('0'==$arr[0]){
        $sql = "INSERT INTO `animals`(`animal_name`, `animal_age`, `description`)VALUES('".$animal_name."','".$animal_age."','".$animal_description."');";
        $result = mysqli_query($con, $sql);
        $last_id = mysqli_insert_id($con);
        $flag = uploadImage($con, $fileName, $tempName, $size, $last_id);

        $sql="UPDATE `animals` SET animal_photo_id = '".mysqli_insert_id($con)."' WHERE animal_id = '".$last_id."';";
        $result = mysqli_query($con, $sql);
        if(mysqli_affected_rows($con)>0){
            echo "Adding successful.";
        }else{
            echo "Adding failed.";
        }
    }else{
        echo "ERROR 403 : Forbidden!";
    }
}
?>
<script>
        var timer = setTimeout(function() {
            window.location='../view_animals.php'
        }, 1000);
</script>