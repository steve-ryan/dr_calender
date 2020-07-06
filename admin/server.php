<?php
$conn = mysqli_connect('localhost', 'root', '', 'drcalender');
  if($conn) {
    echo "connected";
  }else {
      
    die('Connection failed ' . mysqli_error($conn));

  }
  if (isset($_POST['save'])) {
    $speciality = $_POST['speciality'];
  	// $comment = $_POST['comment'];
  	$sql = "INSERT INTO specialitys (spec_name) VALUES ('{$speciality}')";
  	if (mysqli_query($conn, $sql)) {
  	  $id = mysqli_insert_id($conn);
      $saved_comment = '<div class="comment_box">
      		<span class="delete" data-id="' . $id . '" >delete</span>
      		<span class="edit" data-id="' . $id . '">edit</span>
      		<div class="display_name">'. $speciality .'</div>
      	</div>';
  	  echo $saved_comment;
  	}else {
  	  echo "Error: ". mysqli_error($conn);
  	}
  	exit();
  }
?>