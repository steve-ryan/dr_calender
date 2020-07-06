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

                <div class="row">
                    <div class="">
                        <div>
                            <div class="dashboard">
                                <?php
                                    $duration = 35;
                                    $cleanup = 0;
                                    $start = '09:00';
                                    $end='12:00';
                                    // lunch break start
                                    $break_start = '11:10';
                                    //lunch break end
                                    $break_end = '11:25';

function timeslots($duration,$cleanup,$start,$end,$break_start,$break_end){
	# code...
	                $start = new DateTime($start);
	                $end = new DateTime($end);
	                $break_start = new DateTime($break_start);
	                $break_end = new DateTime($break_end);
	                $interval = new DateInterval("PT".$duration."M");
	                $cleanupInterval = new DateInterval("PT".$cleanup."M");
	                $slot = array();

	    for ($intStart=$start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)) { 
		# code...
		$endPeriod = clone $intStart;
		$endPeriod->add($interval);
		if (strtotime($break_start->format('H:i A')) < strtotime($endPeriod->format('H:i A')) && strtotime(($endPeriod->format('H:i A')) < strtotime($break_end->format('H:i A')))) {

			$endPeriod = $break_start;
			$slot[] = $intStart->format('H:i A').'-'.$endPeriod->format('H:i A');
			$intStart = $break_end;
			$endPeriod = $break_end;
			$intStart->sub($interval);

		}else{
		$slot[] = $intStart->format('H:i A')."-".$endPeriod->format('H:i A');
	}
}
	return $slot;
}
?>



                                <?php
$dt = new DateTime;
if (isset($_GET['year']) && isset($_GET['week'])) {
    $dt->setISODate($_GET['year'], $_GET['week']);
} else {
    $dt->setISODate($dt->format('o'), $dt->format('W'));
}
$year = $dt->format('o');
$week = $dt->format('W');
$month = $dt->format('F');
$year = $dt->format('Y');
?>



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
                                                    <td><button class="btn-info btn-xs"><?php echo $ts; ?></button>
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


                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
    <script src="./../assets/js/main.js" type="text/javascript"></script>
</body>

</html>