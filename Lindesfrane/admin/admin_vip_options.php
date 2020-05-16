<?php 
session_start();
require_once("../includes.php");
require_once("../setup/dbCon.php");
// include("./admin_home.php");
$con = connect();
if(isset($_SESSION['email'])){
    $sql = "select `user_type` from `users` where `email`='".$_SESSION['email']."'";
    $result = mysqli_query($con, $sql);

// echo($_SESSION['username']==mysqli_fetch_array($result)[0]);
if('0'==mysqli_fetch_array($result)[0]){
  ?>

<ul class="nav nav-tabs">
    <li class="active"><a data-pid1="show_vip_bookings" href="#">Show VIP Bookings</a></li>
</ul>

<div id="vip_options_content-pane">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Booking Type</th>
        <th>Price</th>
        <th>Booking Date</th>
      </tr>
    </thead>
    <tbody>
    <?php

    $sql = "SELECT a.animal_name,a.animal_age, i.image_url, a.description FROM animals a, images i WHERE a.animal_photo_id = i.image_id;";
    $result = mysqli_query($con, $sql);
    // $arr=mysqli_fetch_array($result);
    // $max = sizeof($arr);
    // print_r(mysqli_fetch_array($result));

// print_r($result);

while($row=mysqli_fetch_array($result))
{
    echo("<tr>");
    echo("<td>".$row['animal_name']."</td>");
    echo("<td>".$row['animal_age']." Month</td>");
    echo("<td><img  height='100' width='100' src='./action_pages".$row['image_url']."'></td>");
    echo("<td>".$row['description']."</td>");
    echo("</tr>");
}
echo("</tbody>");   
echo("</table>");   
?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
    $('.nav-tabs li a').click(function(e) {
    $('.nav-tabs li.active').removeClass('active');
    var $parent = $(this).parent();
    $parent.addClass('active');
    e.preventDefault();
    });


    $("[data-pid1]").click(function() {
    var pid1 = $(this).data("pid1");
    if (pid1 === "show_vip_bookings") {
    $("#vip_options_content-pane").empty();
    $("#vip_options_content-pane").load("./create_ticket_type_form.php");
    }
    });

    });
</script>
<?php
    }else{
        echo("ERROR 403: Forbidden");
    }
    }else{
        echo("ERROR 403: Forbidden");
        ?>
        <script>
            var timer = setTimeout(function() {
            window.location='../login.html'
        }, 1000);
        </script>
        <?php
    }
?>
