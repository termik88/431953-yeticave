<?php

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

function loading_page_error ($error) {
    loading_page('error.php', 'Ошибка', ['error' => $error]);
}

function sql_query($link, $sql) {
    if (!$result = mysqli_query($link, $sql)) {
        $error = mysqli_error($link);
        loading_page_error($error);
        die();
    } else {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
};

function modify_price($value) {
    $changed_price = ceil($value);
    return $changed_price >= 1000 ? $changed_price = number_format($changed_price, 0, '', ' ') : $changed_price;
};

function calc_date($expiration) {
    $res = '';
    $diff = strtotime($expiration) - time();
    if ($diff>=604800){
        $res = date("d.m.y", strtotime($expiration)) ;
    }
    else if ($diff<604800 && $diff>=86400){
        $res = round($diff/86400). ' д.' ;
    }
    else if ($diff<86400 && $diff>=3600){
        $res = round($diff/3600). ' ч.' ;
    }
    else if ($diff<3600){
        $res = round($diff/60). ' мин.' ;
    }
    return $res;
};

function diff_date($expiration){
    return (strtotime($expiration) - strtotime(date('H.i.s')));
};

function validation_required($required, $array_post) {
    $errors = [];
    foreach ($required as $field) {
        if (empty($array_post[$field])) {
            $errors[$field] = 'Это поле надо заполнить';
        }
    }
    return $errors;
};

function searchUserByEmail($email, $users) {
    $result = null;
    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $result = $user;
            break;
        }
    }

    return $result;
};

/************************/
function validation_field($array_required_field, $array_post) {
    $errors = [];
    foreach ($array_required_field as $required_key => $required_field) {
        if(empty($array_post[$required_key])) {
            $errors[$required_key] = 'Это поле надо заполнить';
            continue;
        }
        if ($array_required_field[$required_key] === 'email' && !filter_var($array_post[$required_key], FILTER_VALIDATE_EMAIL)) {
            $errors[$required_key] = 'Не правильно введен Email';
            continue;
        }
    }
    return $errors;
};

function loading_picture ($picture, $name_input) {
    $errors = [];
    if ($picture[$name_input]['name']) {
        $tpm_name = $picture[$name_input]['tmp_name'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tpm_name);

        if ($file_type !== 'image/jpeg') {
            $errors[$name_input] = 'Загрузите картинку в формате jpeg, либо png';
        }
    } else {
        $errors[$name_input] = 'Вы не загрузили файл';
    }
    return $errors;
}

/*****************/
function error_field_requred($field) {
    if(empty($field)) {
        return 'Это поле надо заполнить';
    }
    return '';
}

function error_email($field) {
    if(empty($field)) {
        return 'Это поле надо заполнить';
    }
    if (!filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return 'Не правильно введен Email';
    }
    return '';
}

function error_name($field) {
    return $error = error_field_requred($field);
}

function error_password($field) {
    $error = error_field_requred($field);


}
