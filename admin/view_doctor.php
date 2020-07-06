<?php
	include 'database.php';
	$sql = "SELECT s.spec_name,d.doctor_id,d.firstname,d.lastname,d.email,d.active FROM doctor as d JOIN speciality as s ON d.spec_id = s.spec_id;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr>
    <td><?=$row['doctor_id'];?></td>
    <td><?=$row['firstname'];?></td>
    <td><?=$row['lastname'];?></td>
    <td><?=$row['spec_name'];?></td>
    <td><?=$row['email'];?></td>
    <td><button type="button" class="btn btn-danger btn-sm delete" data-id=<?=$row['doctor_id'];?>>Delete</button></td>
</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>