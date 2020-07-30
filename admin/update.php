<?php
	include 'database.php';
	$id=$_POST['id'];
	$spec_name=$_POST['speciality'];
	$sql = "UPDATE `speciality` 
	SET `spec_name`='$spec_name' WHERE spec_id=$id";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>