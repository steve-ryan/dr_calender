<?php
    require("./../includes/patient_check.php");
    include ("./../database/config.php");
    $pid=$_SESSION['pid'];
    $d_day = date('Y-m-d');
    $sql = "SELECT a.patient_id,a.booking_id,a.booking_date,t.name,a.status,d.firstname,d.lastname,s.spec_name FROM appointment as a JOIN doctor as d ON a.doctor_id=d.doctor_id JOIN speciality as s ON d.spec_id=s.spec_id JOIN timeslot as t ON a.slot_id =t.slot_id WHERE a.patient_id='$pid' AND booking_date>='$d_day';";
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
    echo "<p id=id=sts".$row['status']." style='color:red'>Canceled</p>";
    }
    ?>
    </td>

    <td>
        <div class="visible-md visible-lg hidden-sm hidden-xs">
            <?php if(($row['status']==1))  
                    { ?>

            <a href="#" class="text-danger cancel"
                onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top"
                tooltip="Remove" data-id=<?=$row['booking_id'];?>>Cancel</a>
            <?php } else {

		echo "<p id=sts".$row['status']." style='color:black'>Canceled</p>";
		} ?>

        </div>
    </td>
</tr>
<?php	
	}
	}
	else {
		echo "Yet to make an appointment !";
	}
	mysqli_close($conn);
?>