    <?php
    $interval = 40;
$cleanup = 15;
$start_time = '09:00';
$end = '21:00';
function getTimeSlot($start_time,$end){
    $start= new DateTime($start);
    $end= new DateTime($end);
    $start_time= $start->format('H:i');

    $end_time = $end->format('H:i');
    $i=0;

    while(strtotime($start_time)<= strtotime($end_time)){
        $start=$start_time;
        $end = date('H:i',strtotime('+'.$interval.'minutes',strtotime($start_time)));
        $start_time=date('H:i',strtotime('+'.$interval.'minutes',strtotime($start_time)));
        $i++;
        if(strtotime($start_time)<= strtotime($end_time)){
            $time[$i]['start']=$start;
           $time[$i]['end']=$end; 
        }
}
        return $time;
    }

    $slot = getTimeSlot(15,'10:00','13:00');

    echo "<pre>";
    print_r($slot);

    ?>