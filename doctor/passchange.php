<?php
    include ("./../database/config.php");
   
    if (count($_POST) > 0) {
    $drid=$_POST['id'];

    $result = mysqli_query($conn, "SELECT * FROM `doctor` WHERE doctor_id='$drid'");
    $row = mysqli_fetch_array($result);
    if (md5($_POST["currentPassword"]) == $row["password"]) {
        mysqli_query($conn, "UPDATE `doctor` SET `password`='".md5($_POST["newPassword"])."' WHERE doctor_id='$drid'");
        echo json_encode(array("statusCode"=>200));
    } else{
       echo json_encode(array("statusCode"=>201));
       
    }
}

mysqli_close($conn);
?>
