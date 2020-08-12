<?php
include ("./../database/config.php");

$firstname =mysqli_real_escape_string($conn,$_POST['firstname']);
$lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
$speciality =mysqli_real_escape_string($conn,$_POST["speciality"]);
$email = mysqli_real_escape_string($conn,$_POST["email"]);
$password = md5($_POST["password"]);

$emailduplicate=mysqli_query($conn,"select * from doctor where email='$email'");
	if (mysqli_num_rows($emailduplicate)>0)
	{
		echo json_encode(array("statusCode"=>201));
	}
	else{

 $query="INSERT INTO `doctor`( `firstname`,`lastname`,`spec_id`, `email`, `password`) 
	VALUES ('$firstname','$lastname','$speciality','$email','$password')";
if (mysqli_query($conn, $query)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
    }
}
   
	mysqli_close($conn);

?>