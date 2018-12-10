<?php

$time_to_off = function($off){

    $present_time = time();
    $future_time = strtotime($off);
    $time_diff = $future_time - $present_time;
    $days_off = floor($time_diff / 86400);
    $time_off = floor($time_diff/3600).':'.floor( ($time_diff%3600) / 60) ;
    if ($days_off>0){
    	return $days_off.'дн.';
    };
    return $time_off;
};
?>