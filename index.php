<?php
require_once ('data.php');
require_once('function.php');

$page_content = render_template('templates/index.php', ['ad_array_items' => $ad_array_items]);
$layout_content = render_template('templates/layout.php', [
    'title' => 'Главная',
    'content' => $page_content,
    'categories' => $categories,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar
]);

print($layout_content);
