<?php
include ("./../database/config.php");

if(!empty(($_POST["sel_doc"]) && ($_POST["datepicker"]))){
  /* DO YOUR QUERY HERE AND GET THE OUTPUT YOU WANT */
  $sql="SELECT t.slot_id,t.name FROM timeslot as t LEFT JOIN(SELECT slot_id FROM `appointment` WHERE
   booking_date = '".$_POST["datepicker"]."' AND doctor_id='".$_POST["sel_doc"]."') as a ON a.slot_id = t.slot_id WHERE a.slot_id IS NULL";
  $data= mysqli_query($conn,$sql);

  $slots_array = array();

    while ($row = mysqli_fetch_array($data)) {
     # code...
    $id = $row['slot_id'];
    $name = $row['name'];

     #slot
     $slots_array[] = array("slot_id"=> $id,"name"=> $name);

    //  echo "<option value='".$name."' >".$name."</option>";
    }

    // encoding array to json format
echo json_encode($slots_array);
   
//   echo $data; /* PRINT THE OUTPUT YOU WANT, IT WILL BE RETURNED TO THE ORIGINAL PAGE */
}