<?php
	include 'database.php';
	$sql = "SELECT patient_id,firstname,lastname,YOB,email,active FROM patient;";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr>
    <td><?=$row['patient_id'];?></td>
    <td><?=$row['firstname'];?></td>
    <td><?=$row['lastname'];?></td>
    <td><?=$row['YOB'];?></td>
    <td><?=$row['email'];?></td>
    <td>
    <?php

    if ($row['active']== 1) {
        echo "<p id=sts".$row['patient_id']." style='color:green'>Active</p>";
    } else {
    echo "<p id=id=sts".$row['patient_id']." style='color:red'>Inactive</p>";
    }
    ?>
    </td>
    <td>
        <select class=" border-warning" onchange="active_inactive_doc(this.value,<?php echo $row['patient_id'];?>)">
            <option value="">Select</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>

        </select>
    </td>
    <td><button type="button" class="btn btn-danger btn-sm delete" data-id=<?=$row['patient_id'];?>>Delete</button></td>
</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($conn);
?>