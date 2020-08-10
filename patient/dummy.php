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