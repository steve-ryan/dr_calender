<?php

include("./database.php");

$firstname = $_POST['firstname'];
$lastname = $_POST["lastname"];
$speciality =$_POST["speciality"];
$email = $_POST["email"];
$password = md5($_POST["password"]);

$emailduplicate=mysqli_query($conn,"select * from doctor where email='$email'");
	if (mysqli_num_rows($emailduplicate)>0)
	{
		echo json_encode(array("statusCode"=>201));
	}
	else{
    //     $query = $conn->prepare("INSERT INTO `doctor`( `firstname`,`lastname`,`spec_id`, `email`, `password`) 
	// VALUES (?,?,?,?,?)");
    //  $query->bind_param("ssiss",'$firstname','$lastname','$speciality','$email','$password');
    //  $query->execute();
    //  $query->close();
 $query="INSERT INTO `doctor`( `firstname`,`lastname`,`spec_id`, `email`, `password`) 
	VALUES ('$firstname','$lastname','$speciality','$email','$password')";
if (mysqli_query($conn, $query)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
    }
}
    // $query->close();
	mysqli_close($conn);

?>