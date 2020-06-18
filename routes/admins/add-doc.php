<?php
require('./../../includes/connection.php');

$stmt = $conn->prepare("INSERT INTO doctors (f_name,l_name,spec_id,password,email) VALUES (?,?,?,?,?)");
$stmt->bind_param("ssiss",$firstname,$lastname,$specialization,$encrypt,$email);
$firstname=mysqli_real_escape_string($conn,$_POST["firstname"]);
$lastname=mysqli_real_escape_string($conn,$_POST["lastname"]);
$specialization=mysqli_real_escape_string($conn,$_POST["username"]);
$password=mysqli_real_escape_string($conn,$_POST["password"]);
$encrypt=md5($password);
$email=mysqli_real_escape_string($conn,$_POST["email"]);
$stmt->execute();

header('Location: ./../../admin/add-doctor.php');

	$stmt->close();
	$conn->close();
?>