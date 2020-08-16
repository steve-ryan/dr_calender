<?php
    require("./../includes/patient_check.php");
    include ("./../database/config.php");
    $drid=$_SESSION['drid'];
    $d_day = date('Y-m-d');
    $sql = "SELECT a.booking_id,a.doctor_id,a.booking_date,t.name,a.status,p.pfirstname,p.plastname,p.email FROM appointment as a JOIN patient as p ON a.patient_id = p.patient_id JOIN doctor as d ON a.doctor_id=d.doctor_id JOIN timeslot as t ON a.slot_id =t.slot_id  WHERE a.doctor_id='$drid' AND a.booking_date ='$d_day';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr>
    <td><?=$row['pfirstname'];?></td>
    <td><?=$row['plastname'];?></td>
    <td><?=$row['email'];?></td>
    <td><?=$row['name'];?></td>
    <td>
    <?php

    if ($row['status']== 1) {
        echo "<p id=sts".$row['status']." style='color:green'>Active</p>";
    } else {
    echo "<p id=sts".$row['status']." style='color:red'>Canceled</p>";
    }
    ?>
    </td>
</tr>
<?php	
    }
    }
    else {
        echo "<tr><td>No appoinment!</td></tr>";
    }
	
	mysqli_close($conn);
?>