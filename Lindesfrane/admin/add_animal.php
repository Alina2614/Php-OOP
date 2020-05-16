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
<form action="./action_pages/addAnimal.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="animal_name">Animal name:</label>
        <input type="text" name="animal_name" class="form-control" id="animal_name" required="true">
    </div>
    <div class="form-group">
        <label for="animal_age">Age:</label>
        <input type="number" name="animal_age" class="form-control" id="animal_age">
    </div>
    
    <div class="form-group" style="width: 75%;">
        <label for="animal_photo">Photo:</label>
        <input type="file" name="animal_photo" class="form-control" id="animal_photo"  required="true">
    </div>
    <div class="form-group">
        <label for="animal_description">Description:</label>
        <input type="textarea" name="animal_description" class="form-control" id="animal_description"  required="true">
    </div>
    <input type="hidden" name="create_ticket_type">
    <button type="submit" name="save" class="btn btn-default">Save</button>
</form>
</div>
</div>
</div>
<?php
}else{
    echo("403 : Forbidden.");
}
?>