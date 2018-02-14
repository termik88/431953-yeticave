<?php


require_once('data.php');
require_once('function.php');

function render_template($template, $data) {
    $html = '';
    if (file_exists($template)) {
        extract($data);
        ob_start();
        require_once($template); /*$data['config']['tpl_path'] . */
        $html = ob_get_clean();
    }
    return $html;
};
/*
function loading_index($path, $name_page, $array_val) {
    $page_content = render_template($path . 'index.php', $array_val);

    $layout_content = render_template($path . 'layout.php', ['title' => $name_page,
                                                            'content' => $page_content,
                                                            'categories' => $array_val['categories'],
                                                            'is_auth' => $array_val['is_auth'],
                                                            'user_name' => $array_val['user_name'],
                                                            'user_avatar' => $array_val['user_avatar']
    ]);
    return print($layout_content);
};*/


function loading_page($name_page, $data){
    require_once('config.php');

    if ($config['enable']) {
        $data['title'] = $name_page;
        $data['content'] = render_template($config['tpl_path'] . 'index.php', $data);
        $layout_content = render_template($config['tpl_path'] . 'layout.php', $data);
        return print($layout_content);
    } else {
        $error_msg = "Сайт на техническом обслуживании";
        print ($error_msg);
    }
};



loading_page('Главная', ['ad_array_items' => $ad_array_items,
                                                   'categories' => $categories,
                                                   'is_auth' => $is_auth,
                                                   'user_name' => $user_name,
                                                   'user_avatar' => $user_avatar
]);

