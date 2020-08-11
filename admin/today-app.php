<?php
    require("./../includes/admin_check.php");
    include 'database.php';
    $d_day = date('Y-m-d');
    $sql = "SELECT a.booking_id,a.booking_date,t.name,a.status,p.pfirstname,p.patient_id,p.plastname,d.firstname,d.lastname,s.spec_name FROM appointment as a JOIN doctor as d ON a.doctor_id=d.doctor_id JOIN speciality as s ON d.spec_id=s.spec_id JOIN patient as p ON a.patient_id=p.patient_id JOIN timeslot as t ON a.slot_id =t.slot_id WHERE a.booking_date ='$d_day';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

            $patientf= $row['firstname'];
            $patientl= $row['lastname'];
?>
<tr>
    <td><?=$row['booking_id'];?></td>
     <td><?=$row['pfirstname'];?> <?=$row['plastname'];?></td>
     <td><?=$row['firstname'];?> <?=$row['lastname'];?></td>
    <td><?=$row['name'];?></td>
      <td>
    <?php

    if ($row['status']== 1) {
        echo "<p id=sts".$row['booking_id']." style='color:green'>Active</p>";
    } else {
    echo "<p id=id=sts".$row['booking_id']." style='color:red'>Cancelled</p>";
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