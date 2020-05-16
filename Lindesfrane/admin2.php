<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['submit'])){
        //done to make sure only submit button is used to submit the form 
        include_once("./setup/dbCon.php");
        $con = connect();
        $name=mysqli_real_escape_string($con, $_POST['name']);
        $ID =mysqli_real_escape_string($con,$_POST['ID']);
        $type_name =mysqli_real_escape_string($con,$_POST['type_name']);
        $unit_price =mysqli_real_escape_string($con,$_POST['unit_price']);
        $description =mysqli_real_escape_string($con,$_POST['description']);
        
        if ($name == "" || $ID == "" || $type_name == "" || $unit_price == "" || $description == ""  ) {
            echo 'Some fields are missing.<br>';
        } else {
            // combobox co

            if(checkEmailExists($con, $email)){
                        echo "Email address is already registered.<br>";
                    }else{
                        $sql = "INSERT INTO ticket_type(
                            `name`, `ID`, `type_name`, `unit_price`, `description`
                            ) VALUES (
                            '" . $name . "',
                            '" . $ID . "', 
                            '" . 1 . "', 
                            '" . $type_name . "'
                            '" . $unit_price . "',
                            '" . $description . "',
                            );"; //md5 is used to encrypt password
                //1 here...user/admin-0/1 coding? +automated ID?
                        $result = mysqli_query($con,$sql);
                        if(!$result){
                            echo("Error occured in executing the SQL syntax. Possible error: ".mysqli_error($con));
                        }else{
                            echo("Ticket has been registered successfully.");
                        }
                    }
                }
            }
        }
        mysqli_close($con);
    


//function checkNameExists($con, $email) {
    $sql = "Select email from users WHERE email='" . $email . "'";
    if (mysqli_num_rows(mysqli_query($con,$sql)) > 0) {
        return true;
    }
//
// same named usrs?//
?>