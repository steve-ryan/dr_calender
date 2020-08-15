<?php
    include ("./../database/config.php");
    $pid=$_POST['pid'];
    $doctor_id=$_POST['doctor_id'];
    $slot_id=$_POST['slot_id'];
    $booking_date=$_POST['booking_date'];
    
    $sql="INSERT INTO `appointment` (`patient_id`,`doctor_id`,`slot_id`,`booking_date`) VALUES ('$pid','$doctor_id','$slot_id','$booking_date')";
    
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
    }
    // $sql->close();
	mysqli_close($conn);
?>