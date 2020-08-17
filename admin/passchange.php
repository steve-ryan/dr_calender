<?php
    include ("./../database/config.php");
   
    if (count($_POST) > 0) {
    $admin_id=$_POST['id'];

    $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE admin_id='$admin_id'");
    $row = mysqli_fetch_array($result);
    if (md5($_POST["currentPassword"]) == $row["password"]) {
        mysqli_query($conn, "UPDATE `admin` SET `password`='".md5($_POST["newPassword"])."' WHERE admin_id='$admin_id'");
        echo json_encode(array("statusCode"=>200));
    } else{
       echo json_encode(array("statusCode"=>201));
       
    }
}

mysqli_close($conn);
?>
