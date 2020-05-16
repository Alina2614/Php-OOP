<?php
session_start();
require_once("../includes.php");
require_once("../setup/dbCon.php");
$con = connect();
// print_r($_SESSION);
if(!isset($_SESSION)){
  header("location:../login.html");
}
$sql = "select `name`, `email`, `user_type` from users where `email`='" . $_SESSION['email'] . "'";
$result = mysqli_query($con, $sql);
$arr= mysqli_fetch_array($result);
if($arr[2]=="1"){
  ?>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Lindesfrane</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a data-pid ="Home" href="./admin_home.php">Home</a></li>
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

  <form method="POST" action="booking.php">
    <div class="form-group">
      <label for="email">Booking Type:</label>
      <select name="booking_type">
        <option value="Adults">Adults</option>
        <option value="Children">Children</option>
        <option value="Old Age Pensioners">Old Age Pensioners</option>
        <option value="VIP">VIP</option>
      </select>
    </div>
    <div class="form-group">
      <label for="pwd">Booking Time:</label>
      <input name="booking_time" type="booking_time" class="form-control">
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>

  <?php
  if(isset($_POST['submit'])){
    // print_r($_POST);
    $booking_type=$_POST['booking_type'];
    $booking_time = $_POST['booking_time'];

    $sql = "insert into `booking`(`booking_type`, `booling_time`, `booked_by`)values('".$booking_type."', '".$booking_time."', '".$_SESSION['email']."');";
    
    $result = mysqli_query($con, $sql);
    if(mysqli_affected_rows($con)>0){
      echo("Booked successfully.");
    }else{
      echo("Booking failed.");
    }
  }
}else{
  ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#logout").click(function(){
            window.location.href = "http://localhost/Lindesfrane/logout.html";
        });
    });
  </script>
  <?php
}

  ?>
