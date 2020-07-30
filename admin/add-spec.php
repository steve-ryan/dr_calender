<?php
    include 'database.php';
	$specname =mysqli_real_escape_string($conn,$_POST['speciality']);
	
	$specialityduplicate=mysqli_query($conn,"select * from speciality where spec_name='$specname'");
	if (mysqli_num_rows($specialityduplicate)>0)
	{
		echo json_encode(array("statusCode"=>201));
	}
	else{
	$sql = "INSERT INTO `speciality`( `spec_name`) 
	VALUES ('$specname')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
}
	mysqli_close($conn);
?>