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
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Booking Type</th>
        <th>Booking Date</th>
        <th>Booking Cost</th>
        <th>Booked By</th>
        <th>Edit Booking</th>
      </tr>
    </thead>
    <tbody>
    <?php

    $sql = "SELECT b.booking_id, b.booking_type, b.booling_time, tt.ticket_price, b.booked_by
FROM booking b, ticket_types tt
WHERE b.booking_type = tt.ticket_type_name;";
    $result = mysqli_query($con, $sql);
    // $arr=mysqli_fetch_array($result);
    // $max = sizeof($arr);
    // print_r(mysqli_fetch_array($result));

// print_r($result);

while($row=mysqli_fetch_array($result))
{
    echo("<tr>");
    echo("<td>".$row['booking_type']."</td>");
    echo("<td>".$row['booling_time']."</td>");
    echo("<td>".$row['ticket_price']."</td>");
    echo("<td>".$row['booked_by']."</td>");
    echo("<td><a href='edit_booking.php?id=".$row['booking_id']."'>Edit</a></td>");
    echo("</tr>");
}
echo("</tbody>");   
echo("</table>");   

}
mysqli_close($con);
?>
<a href="admin_home.php">< Go Back to Home</a>