<?php
    require("./../includes/doctor_check.php");
    include ("./../database/config.php");
    $drid=$_SESSION['drid'];
    $sql = "SELECT a.booking_id,a.doctor_id,a.booking_date,t.name,a.status,p.pfirstname,p.plastname,p.email FROM appointment as a JOIN patient as p ON a.patient_id = p.patient_id JOIN doctor as d ON a.doctor_id=d.doctor_id JOIN timeslot as t ON a.slot_id =t.slot_id  WHERE a.doctor_id='$drid';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr>
    <td><?=$row['booking_date'];?></td>
    <td><?=$row['name'];?></td>
    <td><?=$row['pfirstname'];?></td>
    <td><?=$row['plastname'];?></td>
    <td><?=$row['email'];?></td>
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
		echo "No appointments made yet !";
	}
	mysqli_close($conn);
?>