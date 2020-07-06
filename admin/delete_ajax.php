 <?php
    include 'database.php';

	$id=$_POST['doctor_id'];
	$sql = "DELETE FROM `doctor` WHERE doctor_id=$id";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>