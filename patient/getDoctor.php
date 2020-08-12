<?php
include ("./../database/config.php");

$specid = $_POST['speciality']; 

$sql = "SELECT doctor_id,firstname,lastname FROM doctor WHERE active='1' AND spec_id=".$specid;

$result = mysqli_query($conn,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $userid = $row['doctor_id'];
    $name = $row['firstname'];
    $lname = $row['lastname'];

    $users_arr[] = array("doctor_id" => $userid, "firstname" => $name,"lastname"=>$lname);
}

// encoding array to json format
echo json_encode($users_arr);