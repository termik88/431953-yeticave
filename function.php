<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 09.02.2018
 * Time: 0:25
 */

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
