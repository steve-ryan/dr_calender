<?php require("./../includes/patient_check.php");
include ("./database.php");

    
$duration = 60; // how much the is the duration of a time slot
$cleanup    = 0; // no time interval
$start    = '09:00'; // start time
$end      = '21:00'; // end time
$break_start = '12:59'; // break start
$break_end   = '16:00'; // break end
// Our timeslot code
function timeslots($duration, $cleanup, $start, $end, $break_start, $break_end) {
    $start         = new DateTime($start);
    $end           = new DateTime($end);
    $break_start           = new DateTime($break_start);
    $break_end           = new DateTime($break_end);
    $interval      = new DateInterval("PT" . $duration . "M");
    $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
    $periods = array();

    for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) {
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);

        if(strtotime($break_start->format('H:i ')) < strtotime($endPeriod->format('H:i ')) && strtotime($endPeriod->format('H:i ')) < strtotime($break_end->format('H:i '))){
            $endPeriod = $break_start;
            $periods[] = $intStart->format('H:i ') . ' - ' . $endPeriod->format('H:i ');
            $intStart = $break_end;
            $endPeriod = $break_end;
            $intStart->sub($interval);
        }else{
            $periods[] = $intStart->format('H:i ') . ' - ' . $endPeriod->format('H:i ');
        }
    }


    return $periods;
   
}
?>
<?php
$dt = new DateTime;
if (isset($_GET['year']) && isset($_GET['week'])) {
    $dt -> setISODate($_GET['year'], $_GET['week']);
} else {
    $dt -> setISODate($dt -> format('o'), $dt -> format('W'));
}
$year = $dt -> format('o');
$week = $dt -> format('W');
$month = $dt -> format('F');
$year = $dt -> format('Y');
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
                                    <form method="" action="">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <select class="form-control" id="sel_spec">
                                                    <option value="0">- Select -</option>
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
                                                <select class="form-control" id="sel_doc">
                                                    <option value="0">- Select -</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="datepicker" placeholder="Pick date.." autocomplete="off"
                                                name="date" readonly="readonly" style="background:white;">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="date">
                                                <option value="0" readonly>- Select -</option>
                                                <?php $timeslots = timeslots($duration,$cleanup,$start,$end,$break_start,$break_end);
    	                        foreach ($timeslots as $ts) {
                        	?>

                                                <option value="<?php echo $ts; ?>" name="<?php echo $ts; ?>">
                                                    <?php echo $ts; ?>
                                                </option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <button type="submit" name="submit"
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
    <!-- <script src="./disable.js"></script> -->
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
    <script>
    var today = new Date();
    $("#datepicker").datepicker({
        beforeShowDay: onlyTheseWeekDays([0,1,2, 3,4,6]),
        changeMonth: true,
        changeYear: true,
        minDate: today
    });
    </script>
</body>

</html>