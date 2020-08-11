<?php
	include 'database.php';
	$sql = "SELECT pfirstname, plastname, email FROM patient ORDER BY created_at DESC LIMIT 5";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr>
    <td><?=$row['pfirstname'];?></td>
    <td><?=$row['plastname'];?></td>
    <td><?=$row['email'];?></td>
</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>