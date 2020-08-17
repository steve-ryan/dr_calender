<?php
    include ("./../database/config.php");
   
    if (count($_POST) > 0) {
    $pid=$_POST['id'];

    $result = mysqli_query($conn, "SELECT * FROM `patient` WHERE patient_id='$pid'");
    $row = mysqli_fetch_array($result);
    if (md5($_POST["currentPassword"]) == $row["password"]) {
        mysqli_query($conn, "UPDATE `patient` SET `password`='".md5($_POST["newPassword"])."' WHERE patient_id='$pid'");
        echo json_encode(array("statusCode"=>200));
    } else{
       echo json_encode(array("statusCode"=>201));
       
    }
}

mysqli_close($conn);
?>
