<?php
session_start();
require_once("../../includes.php");
require_once("../../setup/dbCon.php");
// include("./admin_home.php");
if(!isset($_SESSION['email'])){
    header("location:../../login.html");
}
$con = connect();
    
    // print_r($_POST);
if(isset($_POST)){
    if(isset($_POST['offer_discount'])){
        $ticket_type_name = $_POST['ticket_type_name'];
        $ticket_price = $_POST['ticket_price'];
        $offer_discount = 1;
        $discount_amount = $_POST['discount_amount'];
        $ticket_type_description = $_POST['ticket_type_description'];            
    }else{
        $ticket_type_name = $_POST['ticket_type_name'];
        $ticket_price = $_POST['ticket_price'];
        $offer_discount = '0';
        $discount_amount = '0';
        $ticket_type_description = $_POST['ticket_type_description'];
    }
    // print_r($_POST);                 
    $sql = "select `user_type` from `users` where `email`='".$_SESSION['email']."'";
    $result = mysqli_query($con, $sql);
    $arr=mysqli_fetch_array($result);

    if('0'==$arr[0]){
        $sql = "select `ticket_type_name` from `ticket_types` where `ticket_type_name`='".$ticket_type_name."'";
        $result = mysqli_query($con, $sql);
        
        if(sizeof(mysqli_fetch_array($result))>0){
            echo("Ticket type already exists.");
        }else{
            $sql="insert into `ticket_types`"
            ."(`ticket_type_name`, "
            ."`ticket_price`, "
            ."`on_discount`, "
            ."`discount_amount`, "
            ."`description`"
            .")values("
            ."'".$ticket_type_name."',"
            ."'".$ticket_price."',"
            ."'".$offer_discount."',"
            ."'".$discount_amount."',"
            ."'".$ticket_type_description."')" ;
            $result = mysqli_query($con, $sql);
            if(mysqli_affected_rows($con)>0){
                // header("location:../admin_home.php");
                echo("Ticket added successfully.");
                // echo("");
                
            }else{
                // header("location:../admin_home.php");
                echo("Ticket adding failed.");
            }
            
        }
    }else{
        echo("ERROR 403 : Access Denied.");
    }
}
// echo($_SESSION['username']==mysqli_fetch_array($result)[0]);

?>

<script>
        var timer = setTimeout(function() {
            window.location='../view_ticket_types.php'
        }, 1000);
</script>