<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 09.02.2018
 * Time: 0:25
 */


function modify_price($value) {
    $changed_price = ceil($value);
    return $changed_price >= 1000 ? $changed_price = number_format($changed_price, 0, '', ' ') : $changed_price;
};

function esc($str) {
    return strip_tags($str);
};

function calc_date($cur_time) {
    date_default_timezone_set('Europe/Moscow');
    $cur_time_unix = strtotime($cur_time);
    $midnight_time = strtotime('23:59:59');

    $cal_time = $midnight_time - $cur_time_unix;
    $hour = floor($cal_time / 3600);
    $minutes = floor(($cal_time - $hour * 3600) / 60);

    return date('H:i', mktime($hour, $minutes));
};
