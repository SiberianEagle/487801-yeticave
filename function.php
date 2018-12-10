<?php

function include_template($name, $data) {
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

function price_correct($price){
    $roundprice = ceil($price);
    if ($roundprice >= 1000) {
        $roundprice = number_format($roundprice, 0, ',', ' ');
    } 
        return $roundprice."₽";
};

?>