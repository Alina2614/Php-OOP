<?php
//  echo $_POST["email"] ;
//  echo $_POST["password"];
session_start();
if (!isset($_SESSION['email'])) {

    // $invalidLogin = true;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // echo("At line 9");
        if (isset($_POST['login'])) {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                include_once("./setup/dbCon.php");
                $con = connect();
                $email =mysqli_real_escape_string($con,$_POST['email']);
                $password =mysqli_real_escape_string($con,$_POST['password']);
                // echo(checkLogin($con, $email, $password));
                if(checkLogin($con, $email, $password)==true){
                    $_SESSION['email'] = $email; //['email'] is a variable for this super-global variable $_SESSION
                    header("location: home.php");
                }else if(checkLogin($con, $email, $password)==false){
                    echo("The Login attempt was unsuccessful. Invalid username or password.<br>");
                    echo("Go back to the <a href='./login.html'>login page</a>");
                    ?>
                    <script>
                        var timer = setTimeout(function() {
                            window.location='../index.html'
                        }, 1000);
                    </script>
                    <?php
                }
            }
        }
    }
}else{
    header("location: home.php");
}

function checkLogin($con, $email, $password) {
    $sql="select `password` from `users` where `email`='".$email."';";
    $result = mysqli_query($con, $sql);
    // print_r(md5($password));
    if(mysqli_fetch_array($result)[0]==$password){
        // echo("Success");
        return true;
    }else{
        // echo("Failure");
        return false;
    }
}
?>