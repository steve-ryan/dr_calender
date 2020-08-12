<?php
    include ("./../database/config.php");

    $_POST['val'];
    $_POST['doctor_id'];

    $query = mysqli_query($conn,"UPDATE `doctor` set `active` = '".$_POST['val']."'WHERE `doctor_id`='".$_POST['doctor_id']."'");
    if ($query) {
        $query1=mysqli_query($conn,"SELECT * FROM `doctor` WHERE `doctor_id`='".$_POST['doctor_id']."'");
        $row = mysqli_fetch_assoc($query1);
        echo $row['active'];
    } 

 
?>