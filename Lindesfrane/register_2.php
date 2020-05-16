<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['submit'])){
        //done to make sure only submit button is used to submit the form 
        include_once("./setup/dbCon.php");
        $con = connect();
        $fullname=mysqli_real_escape_string($con, $_POST['fullname']);
        $gender =mysqli_real_escape_string($con,$_POST['gender']);
        $email =mysqli_real_escape_string($con,$_POST['email']);
        $password =mysqli_real_escape_string($con,$_POST['password']);
        $postal_address =mysqli_real_escape_string($con,$_POST['postal_address']);
        $post_code =mysqli_real_escape_string($con,$_POST['post_code']);
        
        if ($fullname == "" || $gender == "" || $email == "" || $password == "" || $postal_address == "" || $post_code == "" ) {
            echo 'Some fields are missing.<br>';
        } else {
            if ((!filter_var($email, FILTER_VALIDATE_EMAIL))) {
                echo 'Invalid email.';
            } else {
                if (!preg_match("#.*^(?=.{8})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
                    echo 'Invalid password.';
                } else {
                    if(checkEmailExists($con, $email)){
                        echo "Email address is already registered.<br>";
                    }else{
                        $sql = "INSERT INTO users(
                            `name`, `user_type`, `email`, `password`, `postal_address`, `postcode`, `gender`
                            ) VALUES (
                            '" . $fullname . "',
                            '" . 1 . "',
                            '" . $email . "',
                            '" . md5($password) . "', 
                            '" . $postal_address . "',
                            '" . $post_code . "',
                            '" . $gender . "'
                            );"; //md5 is used to encrypt password
                        $result = mysqli_query($con,$sql);
                        if(!$result){
                            echo("Error occured in executing the SQL syntax. Possible error: ".mysqli_error($con));
                        }else{
                            echo("User has been registered successfully.");
                        }
                    }
                }
            }
        }
        mysqli_close($con);
    }
}

function checkEmailExists($con, $email) {
    $sql = "Select email from users WHERE email='" . $email . "'";
    if (mysqli_num_rows(mysqli_query($con,$sql)) > 0) {
        return true;
    }
}
?>