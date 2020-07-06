<?php 
include "config.php";

$duration = 40;
$cleanup = 15;
$start = '09:00';
$end = '21:00';
// $day_closed = array("Friday");
// $day_closed_text = "Closed";
// lunch break start
$break_start = '11:10';
//lunch break end
$break_end = '11:25';
// Our timeslot code
function timeslots($duration, $cleanup, $start, $end, $break_start, $break_end) {

    $start = new DateTime($start);
    $end = new DateTime($end);
    $break_start = new DateTime($break_start);
    $break_end = new DateTime($break_end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slot = array();

    for ($intStart = $start; $intStart < $end; $intStart -> add($interval) -> add($cleanupInterval)) {

        $endPeriod = clone $intStart;
        $endPeriod -> add($interval);
        if (strtotime($break_start -> format('H:i A')) < strtotime($endPeriod -> format('H:i A')) && strtotime(($endPeriod -> format('H:i A')) < strtotime($break_end -> format('H:i A')))) {

            $endPeriod = $break_start;
            $slot[] = $intStart -> format('H:i A').'-'.$endPeriod -> format('H:i A');
            $intStart = $break_end;
            $endPeriod = $break_end;
            $intStart -> sub($interval);

        } else {
            $slot[] = $intStart -> format('H:iA')."-".$endPeriod -> format('H:iA');
        }
    }
    return $slot;
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
    <link rel="stylesheet" href="./../assets/css/test/styles.css">
    <script src="./../assets/js/jquery.js" type="text/javascript"></script>

</head>

<body>
    <div class="grid-container">

        <?php
    include ('./../includes/sidebars/patient_sidebar.php');
    ?>
        <main class="main">
            <div class="main_overview">
                <div class="container">
                    <div class="card">
                        <div class="card-body ">
                            <form action="./../routes/admins/add-doc.php" method="post">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">

                                        <div class="card">
                                            <div class="card-header text-center "> Book Appointment</div>

                                            <div class="card-body ">


                                                <!-- <form action="./../routes/admins/add-doc.php" method="post"> -->
                                                <div class="form-row">

                                                    <div class="form-group col-md-6 col-sm-6">
                                                        <label for="name"><i>Speciality:</i></label>
                                                        <select name="" class="form-control" id="speciality">

                                                            <option value="0" class="disabled">- Select -</option>
                                                            <?php 
                                                            // Fetch Speciality
                                                            $sql_department = "SELECT * FROM department";
                                                            $department_data = mysqli_query($con,$sql_department);
                                                            while($row = mysqli_fetch_assoc($department_data) ){
                                                            $departid = $row['id'];
                                                            $depart_name = $row['depart_name'];
              
                                                              // Option
                                                             echo "<option value='".$departid."' >".$depart_name."</option>";
                                                            }
                                                              ?>
                                                        </select>
                                                    </div>
                                                    <div class="clear"></div>
                                                    <div class="form-group col-md-6 col-sm-6">
                                                        <label for="name"><i>Doctor:</i></label>
                                                        <select name="" class="form-control" id="doctor">
                                                            <option value="0">Choose1..</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- <button class="btn btn-primary" type="submit">Submit</button> -->
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="card">
                                            <div class="card-header h-100 no-radius text-center bg-info"> Selecting
                                                Timeslots
                                            </div>
                                            <div class="card-body ">
                                                <!-- <form action="./../routes/admins/add-doc.php" method="post"> -->
                                                <div class="form-row">

                                                    <div class="form-group col-md-6 col-sm-6">
                                                        <label for="name"><strong>Morning:<sup>AM</sup></strong></label>
                                                        <br />
                                                        <label for="option">08:40-09:10 </label>
                                                        <input id="option" type="checkbox" value="">
                                                        <label for="option">09:20-09:50 </label>
                                                        <input id="option" type="checkbox" value="">

                                                    </div>
                                                    <div class="form-group col-md-6 col-sm-6">
                                                        <label
                                                            for="name"><strong>Afternoon:<sup>PM</sup></strong></label>
                                                        <br />
                                                        <input id="option" type="checkbox" value="">
                                                        <label for="option">1:10-1:40 </label>
                                                        <br />
                                                        <input id="option" type="checkbox" value="">
                                                        <label for="option">10:00-10:30 </label>

                                                    </div>

                                                </div>
                                                <!-- </form> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                &nbsp;
                                <div class="text-center">
                                    <button class="btn btn-info" type="submit">Check Availability </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h2><?php echo "$month $year"; ?></h2>
                            <a class="btn btn-primary btn-xs"
                                href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week-1).'&year='.$year; ?>">Pre
                                Week</a>
                            <a class="btn btn-primary btn-xs" href="weekly.php">Current Week</a>
                            <!--Previous week-->
                            <a class="btn btn-primary btn-xs"
                                href="<?php echo $_SERVER['PHP_SELF'].'?week='.($week+1).'&year='.$year; ?>">Next
                                Week</a>
                        </center>
                        <!--Next week-->
                        <br /><br />
                        <table>
                            <tr class="sucess">
                                <?php
do {
	if($dt->format('d M Y')==date('d M Y')){
echo "<td style='background:red'>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</td>\n";
	}else{
		echo "<td>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</td>\n";
	}
    
    $dt->modify('+1 day');
} while ($week == $dt->format('W'));
?>
                            </tr>
                            <?php $timeslots = timeslots($duration,$cleanup,$start,$end,$break_start,$break_end);
    	foreach ($timeslots as $ts) {
            # code...
            // $tsclosed = echo "Closed";
    	
    	?>
                            <tr>

                                <td><button class="btn-info btn-xs"><?php echo $ts; ?></button>
                                </td>
                                <td><button class="btn-info btn-xs"><?php echo $ts; ?></button>
                                </td>
                                <td><button class="btn-info btn-xs"><?php echo $ts; ?></button>
                                </td>
                                <td><button class="btn-info btn-xs"><?php echo $ts; ?></button>
                                </td>
                                <td class="disabled"><button class="btn-danger  disabled"><?php echo "   --Closed--"; ?></button>
                                </td>
                                <td><button class="btn-info btn-xs"><?php echo $ts; ?></button>
                                </td>
                                <td><button class="btn-info btn-xs"><?php echo $ts; ?></button>
                                </td>

                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        $("#speciality").change(function() {
            var deptid = $(this).val();

            $.ajax({
                url: 'getUsers.php',
                type: 'post',
                data: {
                    depart: deptid
                },
                dataType: 'json',
                success: function(response) {

                    var len = response.length;

                    $("#doctor").empty();
                    for (var i = 0; i < len; i++) {
                        var id = response[i]['id'];
                        var name = response[i]['name'];

                        $("#doctor").append("<option value='" + id + "'>" + name +
                            "</option>");

                    }
                }
            });
        });

    });
    </script>
</body>

</html>