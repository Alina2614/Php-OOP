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
    // echo($_GET['id']);
?>
  <form method="POST" action="edit_booking.php">
    <div class="form-group">
      <label for="email">Booking Type:</label>
      <select name="booking_type">
        <option value="Adults">Adults</option>
        <option value="Children">Children</option>
        <option value="Old Age Pensioners">Old Age Pensioners</option>
        <option value="VIP">VIP</option>
      </select>
    </div>
    <input type="hidden" name="id" value="<?php echo($_GET['id'])?>" />
    <div class="form-group">
      <label for="pwd">Booking Time:</label>
      <input name="booking_time" type="booking_time" class="form-control">
    </div>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
<?php
    if(isset($_POST['id'])){
        // print_r($_POST);
        $booking_id = $_POST['id'];
        $booking_type = $_POST['booking_type'];
        $booking_time = $_POST['booking_time'];

        $sql = "UPDATE booking b
SET
b.booking_type = '".$booking_type."',
b.booling_time = '".$booking_time."'
WHERE
b.booking_id = '".$booking_id."';";
        $result = mysqli_query($con, $sql);
    }
}
mysqli_close($con);
?>
<a href="admin_home.php">< Go Back to Home</a>