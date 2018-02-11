<?php

require_once('config.php');
require_once('data.php');
require_once('function.php');

loading_page(function () {
    global $config, $ad_array_items, $categories, $is_auth, $user_name, $user_avatar;
    $page_content = render_template($config['tpl_path'] . 'index.php', ['ad_array_items' => $ad_array_items]);
    $layout_content = render_template($config['tpl_path'] . 'layout.php', [
        'title' => 'Главная',
        'content' => $page_content,
        'categories' => $categories,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'user_avatar' => $user_avatar
    ]);

    print($layout_content);
});
