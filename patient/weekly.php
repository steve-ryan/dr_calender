<?php
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
    // echo $periods;
}

$duration = 30; // how much the is the duration of a time slot
$cleanup    = 0; // don't mind this
$start    = '09:00'; // start time
$end      = '21:00'; // end time
$break_start = '12:59'; // break start
$break_end   = '16:00'; // break end
// availableSlots($duration, $cleanup, $start, $end, $break_start, $break_end);
?>
<table>
         <?php $timeslots = timeslots($duration, $cleanup, $start, $end, $break_start, $break_end);
    	                        foreach ($timeslots as $ts) {
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