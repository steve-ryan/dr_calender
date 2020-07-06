<?php


function timeslots($duration,$cleanup,$start,$end,$break_start,$break_end)
{
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
    // return $slot;
    echo "<pre>";
    print_r($slot);
}
$duration = 35;
$cleanup = 10;
$start = '09:00';
$end='16:00';
// lunch break start
$break_start = '11:10';
//lunch break end
$break_end = '11:25';
timeslots($duration,$cleanup,$start,$end,$break_start,$break_end)
?>