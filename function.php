<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 09.02.2018
 * Time: 0:25
 */

function render_template($template, $data) {
    $str = '';
    if (file_exists($template)) {
        require_once ($template);
        ob_start();
        print ($data);
        print ($template);
        $str = ob_get_clean();
    }
    return $str;
};

?>
