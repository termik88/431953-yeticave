<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 09.02.2018
 * Time: 0:25
 */

function loading_page($page_loading_function){
    global $config;
    if ($config['enable']) {

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
}

function esc($str) {
    $text = strip_tags($str);
    return $text;
}
