<?php 
include "config.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mysqli=new mysqli('localhost','root','','bookingcalender');
    $stmt=$mysqli->prepare("INSERT INTO bookings(name,email,date)VALUES(?,?,?)");
    $stmt->bind_param('sss',$name,$email,$date);
    $stmt->execute();
    $msg="<div class='alert alert-success'>Booking Successfull</div>";
    $stmt->close();
    $mysqli->close();
}

$duration = 40;
$cleanup = 15;
$start = '09:00';
$end = '18:00';
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
echo "<td style='background:blue'>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</td>\n";
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

                                    <td><button class="btn-info btn-xs"
                                            data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                    </td>
                                    <td><button class="btn-info btn-xs"
                                            data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                    </td>
                                    <td><button class="btn-info btn-xs"
                                            data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                    </td>
                                    <td><button class="btn-info btn-xs"
                                            data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                    </td>
                                    <td class="disabled"><button
                                            class="btn-danger  disabled"><?php echo "   --Closed--"; ?></button>
                                    </td>
                                    <td><button class="btn-info btn-xs"
                                            data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                    </td>
                                    <td><button class="btn-info btn-xs"
                                            data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                    </td>

                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- The Modal -->
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Booking:<span id="slot"></span></h4>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="">Timeslot</label>
                                                <input type="text" readonly name="timeslot" id="timeslot"
                                                    class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Timeslot</label>
                                                <input type="text" readonly name="timeslot" id="timeslot" hidden>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

        </main>
    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
    <script src="./../assets/js/bootstrap.min.js" type="text/javascript"></script>
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
    <script>
    $(".book").click(function() {
        var timeslot = $(this).attr('data-timeslot');
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#myModal").modal("show");
    });
    </script>
</body>

</html>