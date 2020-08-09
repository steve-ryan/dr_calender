<?php require("./../includes/patient_check.php");
include ("./database.php");
?>

<?php 
include "config.php";

if(isset($_GET['date'])){
    $date = $_GET['date'];
}

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
    <link rel="stylesheet" href="./../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="./../assets/css/test/styles.css">
    <script src="./../assets/js/jquery.js" type="text/javascript"></script>
    <script src="./../assets/js/popper.min.js" type="text/javascript"></script>
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
                        <div class="col-md-12">
                            <!--Next week-->
                            <br />
                            <div class="table-responsive">
                                <table class="table-sm w-auto ">
                                    <tr class="sucess">
                                        <?php
                                        do {
	                                if($dt->format('d M Y')==date('d M Y')){
                                    echo "<td style='background:green'>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</td>\n";
	                                }else{
		                            echo "<td>" . $dt->format('l') . "<br>" . $dt->format('d M Y') . "</td>\n";
	                                }
                                     $dt->modify('+1 day');
                                } while ($week == $dt->format('W'));
                            ?>
                                    </tr>
                                    <?php $timeslots = timeslots($duration,$cleanup,$start,$end,$break_start,$break_end);
    	                        foreach ($timeslots as $ts) {
                        	?>
                                    <tr>

                                        <td><button class=" btn-xs btn-success"
                                                data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                        </td>
                                        <td><button class=" btn-xs btn-success"
                                                data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                        </td>
                                        <td><button class=" btn-xs btn-success"
                                                data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                        </td>
                                        <td><button class=" btn-xs  btn-success"
                                                data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                        </td>
                                        <td class="disabled"><button
                                                class="btn btn-xs btn-danger  disabled"><?php echo "   --Closed--"; ?></button>
                                        </td>
                                        <td><button class=" btn-xs btn-success"
                                                data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                        </td>
                                        <td><button class=" btn-xs btn-success"
                                                data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                                        </td>

                                    </tr>
                                    <?php }?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
    <script src="./../assets/js/jquery.js"></script>
    <script src="./../assets/js/popper.min.js"></script>
    <script src="./../assets/js/bootstrap-4.3.1.js"></script>
    <script>
    $(document).ready(function() {
        $.ajax({
            url: "view-latest-patient.php",
            type: "POST",
            cache: false,
            success: function(dataResult) {
                $('#latest-patient-table').html(dataResult);
            }
        });
    });
    </script>
</body>

</html>