<?php

require_once('config.php');
require_once('data.php');
require_once('function.php');

loading_page(function () {
    /*global $config, $ad_array_items, $categories, $is_auth, $user_name, $user_avatar;*/
    $page_content = render_template($GLOBALS['config']['tpl_path'] . 'index.php', ['ad_array_items' => $GLOBALS['ad_array_items']]);
    $layout_content = render_template($GLOBALS['config']['tpl_path'] . 'layout.php', [
        'title' => 'Главная',
        'content' => $page_content,
        'categories' => $GLOBALS['categories'],
        'is_auth' => $GLOBALS['is_auth'],
        'user_name' => $GLOBALS['user_name'],
        'user_avatar' => $GLOBALS['user_avatar']
    ]);

    print($layout_content);
});
