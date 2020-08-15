<?php require("./../includes/patient_check.php");
include ("./../database/config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
    <link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="./../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="./../assets/css/test/styles.css">
    <script src="./../assets/js/jquery.js" type="text/javascript"></script>
    <script src="./../assets/js/popper.min.js" type="text/javascript"></script>
    <script>
    function onlyTheseWeekDays(arr) {
        var days = [];
        if (arr instanceof Array) {
            days = arr;
        } else if (!isNaN(Number(arr))) {
            days.push(arr);
        }
        return function(date) {
            var dayOfWeek = date.getDay(),
                i;
            for (i = 0; i < days.length; i += 1) {
                if (days[i] === dayOfWeek) {
                    return [true];
                }
            }
            return [false];
        };
    }
    </script>

</head>

<body>
    <div class="grid-container">

        <?php
    include ('./../includes/sidebars/patient_sidebar.php');
    ?>
        <main class="main"
            style="background-image: url(./../public/doctor_appointment_codecanyon_banner.jpg); background-blend-mode: multiply; background-image:linear-gradient(to top,#CCFFCC,#CCCCCC); background-repeat: repeat; background-attachment: auto width:100%">
            <div class="main_overview">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-header text-center bg-info text-white">Make Appointment</div>
                                <div class="card-body">

                                <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                            </div>
                                    <form method="" action="" id="booking_form">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <select class="form-control" id="sel_spec" required>
                                                    <option value="">- Select -</option>
                                                    <?php
                                                    $sql="SELECT * FROM speciality";
                                                    $data= mysqli_query($conn,$sql);
                                                    while ($row = mysqli_fetch_assoc($data)) {
                                                        # code...
                                                        $id = $row['spec_id'];
                                                        $name = $row['spec_name'];

                                                        //option
                                                        echo "<option value='".$id."' >".$name."</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <select class="form-control" id="sel_doc" name="sel_doc" required>
                                                    <option value="" disabled>- Select -</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="datepicker" value=""
                                                placeholder="Pick date.." readonly autocomplete="off" name="datepicker"
                                                style="background:white;">
                                        </div>

                                        <div class="form-group">
                                            <select class="form-control" id="show" required>
                                                <option value="" disabled>- Kindly fill previous parts -</option>
                                            </select>
                                        </div>

                                        <?php
                                        $pid=$_SESSION['pid'];
                                        echo '<input type="hidden" id="pid" name="id" value="'.$pid.'">';
                                        ?>


                                        <button type="submit" name="submit" id="submit_btn"
                                            class="btn btn-info btn-lg btn-block">Book</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
    <script src="./../assets/js/jquery.js"></script>
    <script src="./../assets/js/jquery-ui.js"></script>
    <script src="./../assets/js/popper.min.js"></script>
    <script src="./../assets/js/bootstrap-4.3.1.js"></script>
    <script>
    $(document).ready(function() {

        $("#sel_spec").change(function() {
            var specid = $(this).val();

            $.ajax({
                url: 'getDoctor.php',
                type: 'post',
                data: {
                    speciality: specid
                },
                dataType: 'json',
                success: function(response) {

                    var len = response.length;

                    $("#sel_doc").empty();
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['doctor_id'];
                        var name = response[i]['firstname'];
                        var lname = response[i]['lastname'];

                        $("#sel_doc").append("<option value='" + id + "'>" + name + ' ' +
                            lname +
                            "</option>");

                    }
                }
            });
        });

    });
    </script>

    <!-- Code to disable friday which is index[5] on jquey datepicker -->
    <script>
    var today = new Date();
    $("#datepicker").datepicker({
        beforeShowDay: onlyTheseWeekDays([0, 1, 2, 3, 4, 6]),
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        minDate: today 
    });
    </script>

    <script>
    $(document).ready(function() {
        $("#booking_form").submit(function(e) {
            e.preventDefault();

            //disable the submit button
            $("#submit_btn").attr("disabled", true);
            return true;
        });
    });
    </script>

    <!-- Code to populate available slot option based on doctor id and date picked -->
    <script>
    $(document).ready(function() {
    
        $("form").change(function(form) {
            $.ajax({
                type: "POST",
                url: "bkdate.php",
                data: $(this).serialize(),
                dataType: 'json',
                success: function(result) {

                    var len = result.length;
                    $("#show").empty();

                    for (var i = 0; i < len; i++) {
                        var id = result[i]['slot_id'];
                        var name = result[i]['name'];

                        $("#show").append("<option value='" + id + "'>" + name +
                            "</option>");
                    }
                    
                }
            });
        });

    });
    </script>


    <!-- Booking script -->
    <script>
$(document).ready(function() {
	$('#submit_btn').on('click', function() {
		$("#submit_btn").attr("disabled", "disabled");
		var pid = $('#pid').val();
		var doctor = $('#sel_doc').val();
		var slot = $('#show').val();
		var date = $('#datepicker').val();
		if(pid!="" && doctor!="" && slot!="" && date!=""){
			$.ajax({
				url: "bkappointment.php",
				type: "POST",
				data: {
					pid: pid,
					doctor_id: doctor,
					slot_id: slot,
					booking_date: date				
				},
				cache: false,
				success: function(dataResult){
                    // alert("doing great");
					var dataResult = JSON.parse(dataResult);
                    // alert("doing great");
					if(dataResult.statusCode==200){
						$("#submit_btn").removeAttr("disabled");
						$('#booking_form').find('input:text').val('');
						$("#success").show();
						$('#success').html('Booked successfully !'); 						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>

</body>

</html>