<?php

function price_correct($price){
    $roundprice = ceil($price);
    if ($roundprice  < 1000) {
        return $roundprice."₽";
    } else {
        $finalprice = number_format($roundprice, 0, ',', ' ');
        return $finalprice."₽";
    }
};

?>