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
        <th>Animal Name</th>
        <th>Age</th>
        <th>Photo</th>
        <th>Description</th>
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

}
mysqli_close($con);
?>
<a href="admin_home.php">< Go Back to Home</a>