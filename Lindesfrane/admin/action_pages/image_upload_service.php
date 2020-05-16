<?php
    function insertImage($con, $imgURL, $ref_id) {
        $sql = "insert into `images`(`image_url`, `ref_id`) values('".$imgURL."', '".$ref_id."')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function uploadImage($con, $fileName, $tempName, $fileSize, $userId) {
        $target_dir = "./resources/images/" . $userId . "/";
        mkdir_r($target_dir);
        print_r($fileName);
        $ext = explode(".", $fileName)[1];
        $newfilename = round(microtime(true)) . '.' . $ext;
        $target_file = $target_dir . $newfilename;
        $uploadOk = FALSE;
// Check if image file is a actual image or fake image
        $check = getimagesize($tempName);
        if ($check !== false) {
            $uploadOk = TRUE;
        } else {
            echo "Error uploading image.";
            $uploadOk = FALSE;
        }
// Check file size
        if ($fileSize > 500000) {
            ?><script> alert("Sorry, your file is too large. (Max size: 5MB)");</script>
                <?php
            $uploadOk = FALSE;
        }
// Allow certain file formats
        if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = FALSE;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == FALSE) {
            echo "Sorry, Something is going wrong. Please try again.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($tempName, $target_file)) {
                insertImage($con, $target_file, $userId);
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
    function mkdir_r($dirName, $rights = 0777) {
        $parts = explode('/', $dirName);
        $dir = "";
        for ($i = 0; $i < count($parts); $i++) {
//            echo $parts[$i] . "<br>";
            $dir .= $parts[$i] . '/';
            if (!is_dir($dir) && strlen($dir) > 0) {
                mkdir($dir, $rights);
            }
        }
    }