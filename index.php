<?php

if (file_exists('config.php') and file_exists('data.php') and file_exists('function.php')) {
    require_once('config.php');
    require_once('data.php');
    require_once('function.php');
}else {
    print "нет необходимых файлов";
};

/* Опытный образец функции проверки файлов
function checking_files($array_files, $function_land){
    foreach ($array_files as $key => $value) {
        if (file_exists($value)) {
            require_once ($value);
        } else {
            print "Отсуствует файл: " . $value;
        }
    };
    $function_land();
};

checking_files(['config.php', 'data.php', 'function.php']);
*/

function loading_index($array_val) {
    $page_content = render_template($array_val['config']['tpl_path'] . 'index.php',
        ['ad_array_items' => $array_val['ad_array_items']]);

    $layout_content = render_template($array_val['config']['tpl_path'] . 'layout.php',
        ['title' => 'Главная',
        'content' => $page_content,
        'categories' => $array_val['categories'],
        'is_auth' => $array_val['is_auth'],
        'user_name' => $array_val['user_name'],
        'user_avatar' => $array_val['user_avatar']
    ]);
    return print($layout_content);
};

loading_page($config, 'loading_index', ['config' => $config,
    'ad_array_items' => $ad_array_items,
    'categories' => $categories,
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'user_avatar' => $user_avatar
]);

