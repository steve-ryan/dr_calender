<?php
include ("./../database/config.php");

$firstname = $_POST['firstname'];
$lastname = $_POST["lastname"];
$yob =$_POST["yob"];
$email = $_POST["email"];
$password = md5($_POST["password"]);

$emailduplicate=mysqli_query($conn,"select * from patient where email='$email'");
	if (mysqli_num_rows($emailduplicate)>0)
	{
		echo json_encode(array("statusCode"=>201));
	}
	else{

 $query="INSERT INTO `patient`( `firstname`,`lastname`,`YOB`, `email`, `password`) 
	VALUES ('$firstname','$lastname','$yob','$email','$password')";
if (mysqli_query($conn, $query)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
    }
}
   
	mysqli_close($conn);

?>