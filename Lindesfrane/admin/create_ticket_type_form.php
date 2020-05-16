<?php
session_start();
require_once("../includes.php");
require_once("../setup/dbCon.php");
// include("./admin_home.php");
$con = connect();
    $sql = "select `user_type` from `users` where `email`='".$_SESSION['email']."'";
    $result = mysqli_query($con, $sql);

// echo($_SESSION['username']==mysqli_fetch_array($result)[0]);
if('0'==mysqli_fetch_array($result)[0]){
    
?>

    <div class="container">
        <div class="greeting">
            <div class="form" style="width:30%;">
<form method="post" action="./action_pages/addTicketType.php">
    <div class="form-group">
        <label for="ticket_type_name">Ticket type name:</label>
        <input type="text" name="ticket_type_name" class="form-control" id="ticket_type_name">
    </div>
    <div class="form-group">
        <label for="ticket_price">Ticket price:</label>
        <input type="text" name="ticket_price" class="form-control" id="ticket_price">
    </div>
    <div class="form-group">
    <b>Offer discount:</b>
        <div class="material-switch pull-right" style="margin-top: 12px;">
            <input id="offer_discount" name="offer_discount" type="checkbox"/>
            <label for="offer_discount" class="label-default"></label>
        </div>
    </div>
    <div class="form-group" style="width: 75%;">
        <label for="discount_amount">Discount amount:</label>
        <input type="text" name="discount_amount" class="form-control" id="discount_amount">
    </div>
    <b><span style="margin-left: 95%;
    position: relative;
    margin-top: -15%;
    font-size:24px;
    float: left;"> %</span></b>
    <div class="form-group">
        <label for="ticket_type_description">Description:</label>
        <input type="text" name="ticket_type_description" class="form-control" id="ticket_type_description">
    </div>
    <button type="submit" name="save" class="btn btn-default">Save</button>
</form>
</div>
</div>
</div>
<?php
}else{
    header("location:../login.html");
}
?>