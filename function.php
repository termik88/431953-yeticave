<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 09.02.2018
 * Time: 0:25
 */

function loading_page($server_status, $page_loading_function){
    if ($server_status['config']['enable']) {

        $page_loading_function();

    } else {
        $error_msg = "Сайт на техническом обслуживании";
        print ($error_msg);
    }
};

function render_template($template, $data) {
    $html = '';
    if (file_exists($template)) {
        extract($data);
        ob_start();
        require_once($template);
        $html = ob_get_clean();
    }
    return $html;
};

function modify_price($value) {
    $changed_price = ceil($value);
    return $changed_price >= 1000 ? $changed_price = number_format($changed_price, 0, '', ' ') : $changed_price;
};

function esc($str) {
    $text = strip_tags($str);
    return $text;
};

function calc_date() {
    date_default_timezone_set('Europe/Moscow');
    $cur_time = date('H:i:s');
    $cur_time_unix = strtotime($cur_time);
    $midnight_time = strtotime('23:59:59');

    $cal_time = $midnight_time - $cur_time_unix;
    $hour = floor($cal_time / 3600);
    $minutes = floor(($cal_time - $hour * 3600) / 60);

    return 'Осталось: ' . date('H:i', mktime($hour, $minutes));
};
