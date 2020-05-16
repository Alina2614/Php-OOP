<?php
session_start();
require_once("../includes.php");
require_once("../setup/dbCon.php");
// include("./admin_home.php");
$con = connect();
    $sql = "select `user_type` from `users` where `email`='".$_SESSION['email']."'";
    $result = mysqli_query($con, $sql);

// echo($_SESSION['username']==mysqli_fetch_array($result)[0]);
if('1'==mysqli_fetch_array($result)[0]){
    
?>

   <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Lindesfrane</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a data-pid ="Home" href="./user_home.php">Home</a></li>
                <li><a href="./booking.php" >Make a Booking</a></li>
                <li><a data-pid ="animal_options" href="#">Animals</a></li>
                <li><a data-pid ="vip_options" href="#">VIP</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><?php echo("" . $arr[0] . ""); ?></li>
                <li><a id="logout" href="#">Log out</a></li>
            </ul>
        </div>
    </nav>
    <div id="content-pane"></div>
<table>
	<tbody><tr>
		<th>Opening Time</th>
		<th>Closing Time</th>
	</tr>
	<tr>
		<td>09:00am</td>
		<td>6:00pm <br> Last entry time = 3:00pm</td>
	</tr>
</tbody></table>
<?php }else {
    // header("location:http://localhost/Lindesfrane/login.html");
}
?>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#logout").click(function(){
            window.location.href = "http://localhost/Lindesfrane/logout.php";
        });
    });
  </script>