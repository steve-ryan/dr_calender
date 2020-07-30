<?php
    include 'database.php';

    $_POST['val'];
    $_POST['patient_id'];

    $query = mysqli_query($conn,"UPDATE `patient` set `active` = '".$_POST['val']."'WHERE `patient_id`='".$_POST['patient_id']."'");
    if ($query) {
        $query1=mysqli_query($conn,"SELECT * FROM `patient` WHERE `patient_id`='".$_POST['patient_id']."'");
        $row = mysqli_fetch_assoc($query1);
        echo $row['active'];
    } 

 
?>