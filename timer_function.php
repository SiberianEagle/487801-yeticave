<?php

function time_to_off($off)
{
    $future_time = strtotime($off);
    $present_time = time();
    $time_off = date("H:i", $future_time - $present_time);
    return $time_off;
};

?>