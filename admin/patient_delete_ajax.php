 <?php
  include ("./../database/config.php");

	$id=$_POST['patient_id'];
    $sql = "DELETE FROM `patient` WHERE patient_id=$id";
    

	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>