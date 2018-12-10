<?php

function include_template($name, $data) 
{
    $name = 'templates/' . $name;
    $result = '';

    if (!file_exists($name)) {
        return $result;
    }

    ob_start();
    extract($data);
    require $name;

    $result = ob_get_clean();

    return $result;
}

function price_correct($price)
{
    $roundprice = ceil($price);
    if ($roundprice  >= 1000) 
    {
         $roundprice = number_format($roundprice, 0, ',', ' ');
    }
    return $roundprice."₽";
}

function time_to_off($off)
{
    $future_time = strtotime($off);
    $present_time = time();
    $time_off = date("H:i", $future_time - $present_time);
    return $time_off;
}

?>