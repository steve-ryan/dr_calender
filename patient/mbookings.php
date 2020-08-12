<?php
    require("./../includes/patient_check.php");
    include ("./../database/config.php");
    $pid=$_SESSION['pid'];
    $sql = "SELECT a.patient_id,a.booking_id,a.booking_date,t.name,a.status,d.firstname,d.lastname,s.spec_name FROM appointment as a JOIN doctor as d ON a.doctor_id=d.doctor_id JOIN speciality as s ON d.spec_id=s.spec_id JOIN timeslot as t ON a.slot_id =t.slot_id WHERE a.patient_id='$pid';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr>
    <td><?=$row['booking_date'];?></td>
    <td><?=$row['name'];?></td>
    <td><?=$row['firstname'];?></td>
    <td><?=$row['lastname'];?></td>
    <td><?=$row['spec_name'];?></td>
    <td>
    <?php

    if ($row['status']== 1) {
        echo "<p id=sts".$row['status']." style='color:green'>Active</p>";
    } else {
    echo "<p id=id=sts".$row['status']." style='color:red'>Cancelled</p>";
    }
    ?>
    </td>
   
    <td><button type="button" class="btn btn-danger btn-sm delete" data-id=<?=$row['booking_id'];?>>Cancel</button></td>
</tr>
<?php	
	}
	}
	else {
		echo "Yet to make an appointment !";
	}
	mysqli_close($conn);
?>