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
        <th>Ticket type name</th>
        <th>Ticket price</th>
        <th>Discount amount</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
    <?php

      $sql = "select `ticket_type_name`,`ticket_price`,`discount_amount`,`description`"
      ." from `ticket_types`;";
    $result = mysqli_query($con, $sql);
    // $arr=mysqli_fetch_array($result);
    // $max = sizeof($arr);
    // print_r(mysqli_fetch_array($result));


while($row=mysqli_fetch_array($result))
{
    echo("<tr>");
    echo("<td>".$row['ticket_type_name']."</td>");
    echo("<td>".$row['ticket_price']."</td>");
    echo("<td>".$row['discount_amount']."</td>");
    echo("<td>".$row['description']."</td>");
    echo("</tr>");
}
echo("</tr>");
echo("</tbody>");   
echo("</table>");   

}
mysqli_close($con);
?>
