 <?php
  include ("./../database/config.php");

	$id=$_POST['booking_id'];
    $sql = "UPDATE `appointment` SET status='0' where booking_id =$id";
    

	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
?>