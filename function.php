<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 09.02.2018
 * Time: 0:25
 */

function render_template($template, $data){
    require ('config.php');
    $path_template = $config['tpl_path'] .  $template;
    $html = '';

    if (file_exists($path_template)) {
        extract($data);
        ob_start();
        require_once($path_template);
        $html = ob_get_clean();
    }
    return $html;
};

function loading_page($file_name, $page_title, $data){
    require('config.php');

    if ($config['enable']) {
        $data['content'] = render_template($file_name, $data);
        $data['title'] = $page_title;
        $data['site_name'] = $config['site_name'];
        $layout_content = render_template('layout.php', $data);
        return print($layout_content);
    } else {
        $error_msg = "Сайт на техническом обслуживании";
        print ($error_msg);
    };
};

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
