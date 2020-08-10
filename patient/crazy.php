<?php
include ("./database.php");
$duration="30";
    $start="10:00AM";
    $end="07:00PM";

    $start = new DateTime($start);
        $end = new DateTime($end);
        $start_time = $start->format('H:i');
        $end_time = $end->format('H:i');
        $i=0;
        while(strtotime($start_time) <= strtotime($end_time)){
            $start = $start_time;
            $end = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
            $start_time = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));
            $i++;
            if(strtotime($start_time) <= strtotime($end_time)){
                $time[$i]['start'] = $start;
                $time[$i]['end'] = $end;
            }
            //Here you need to write query and fetch data.
    $todayDate = date('d-m-Y');
     //Please check date format. It should be similar as your database date field format.
    //please use data binding instead of contacting variable.
    $selectQuery = "select id from `book` where date = '2020-08-11' and 
        (( `booking_start_time` >= '.$start.' AND `booking_start_time` <= '.$start.' ) || 
        (`booking_close_time` >= '.$end.' AND `booking_close_time` <= '.$end.')) ";

    // After, you need to exeucte this query and need to check query output. if it has records, then you need to show booked else available. as below
    $result = mysqli_query($conn, $selectQuery);
    if ($result->num_rows) {
        $time[$i]['status'] = 'booked';
    } else {
        $time[$i]['status'] = 'availiable';
    }
        }
        print_R($time)
?>