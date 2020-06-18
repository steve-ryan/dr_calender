<?php
require('./../../includes/connection.php');

$stmt = $conn->prepare("INSERT INTO specialitys (spec_name) VALUES (?)");
$stmt->bind_param("s",$specname);

$specname=mysqli_real_escape_string($conn,$_POST["specname"]);
$stmt->execute();

header('Location: ./../../admin/add-speciality.php');

	$stmt->close();
	$conn->close();
?>