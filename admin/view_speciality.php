<?php
	include 'database.php';
	$sql = "SELECT spec_id,spec_name FROM speciality";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr>
    <td><?=$row['spec_name'];?></td>
    <td><p type="button" class="btn btn-danger btn-sm delete" data-id=<?=$row['spec_id'];?>>Delete</p></td>
	<td><p type="button" class="btn btn-success btn-sm editbtn" data-id=<?=$row['spec_id'];?>>Edit</p></td>
</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>