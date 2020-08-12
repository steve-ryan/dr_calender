 <?php
    include ("./../database/config.php");

	$id=$_POST['spec_id'];
    $sql = "DELETE FROM `speciality` WHERE spec_id=$id";
    

	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>