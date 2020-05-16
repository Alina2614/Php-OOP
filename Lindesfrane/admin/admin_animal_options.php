<ul class="nav nav-tabs">
    <li class="active"><a data-pid1="add_animal" href="#">Add Animal</a></li>
    <li><a  data-pid1="view_animals" href="#">View Animals</a></li>
</ul>

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
<div id="animal_options_content-pane">
    <div class="container">
        <div class="greeting">
            <div class="form" style="width:30%;">
<form action="./action_pages/addAnimal.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="animal_name">Animal name:</label>
        <input type="text" name="animal_name" class="form-control" id="animal_name">
    </div>
    <div class="form-group">
        <label for="animal_age">Age:</label>
        <input type="number" name="animal_age" class="form-control" id="animal_age">
    </div>
    
    <div class="form-group" style="width: 75%;">
        <label for="animal_photo">Photo:</label>
        <input type="file" name="animal_photo" class="form-control" id="animal_photo">
    </div>
    <div class="form-group">
        <label for="animal_description">Description:</label>
        <input type="textarea" name="animal_description" class="form-control" id="animal_description">
    </div>
    <input type="hidden" name="create_ticket_type">
    <button type="submit" name="save" class="btn btn-default">Save</button>
</form>
</div>
</div>
</div>
</div>
<?php
}else{
    echo("403 : Forbidden.");
}
?>
<script type="text/javascript">
    $(document).ready(function () {
    $('.nav-tabs li a').click(function(e) {
    $('.nav-tabs li.active').removeClass('active');
    var $parent = $(this).parent();
    $parent.addClass('active');
    e.preventDefault();
    });

    // $("#offer_discount").click(
    //     function() {
    //         alert( $("#offer_discount").val());
    //     }
    // );
    $("[data-pid1]").click(
    function() {
    var pid1 = $(this).data("pid1");
    if (pid1 === "add_animal") {
    $("#animal_options_content-pane").empty();
    $("#animal_options_content-pane").load("./add_animal.php");

    }else if(pid1==="view_animals"){
    $("#animal_options_content-pane").empty();
    $("#animal_options_content-pane").load("./view_animals.php");
    }
    });

    });
</script>