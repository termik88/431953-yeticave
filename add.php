<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 17.02.2018
 * Time: 21:01
 */

require_once('data.php');
require_once('function.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lot = $_POST;
    $required = ['title', 'category', 'description', 'price', 'lot-date', 'lot-step'];
    $dict = ['title' => 'Название', 'category' => 'Категория',
        'description' => 'Описание', 'price' => 'Начальная цена', 'lot-date' => 'Дата окончания торгов', 'lot-step' => 'Шаг ставки'];
    $errors = [];

    foreach ($required as $key) {
        if (empty($_POST[$key])) {
                $errors[$key] = 'Это поле надо заполнить';
        }
    }


    /* Работа с файлом */
    if (isset($_FILES['add_img']['name'])) {
        $tpm_name = $_FILES['add_img']['tmp_name'];
        $path = $_FILES['add_img']['name'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tpm_name);

        $res = move_uploaded_file($tpm_name, 'img/' . $path);
        if ($file_type !== 'image/jpeg' || $file_type !== 'image/png') {
            $errors['file'] = 'Загрузите картинку в формате jpeg, либо png';
        } else {
            move_uploaded_file($tpm_name, 'img/' . $path);
        }
    }

    if (isset($path)) {
        $lot['image_url'] = 'img/' . $path;
    }

    loading_page('lot.php', 'Просмотр лота', ['lot' => $lot,
                                                                    'categories' => $categories,
                                                                    'is_auth' => $is_auth,
                                                                    'user_name' => $user_name,
                                                                    'user_avatar' => $user_avatar
    ]);
}
else {
    loading_page('add.php', 'Добавление лота', ['categories' => $categories,
                                                                    'is_auth' => $is_auth,
                                                                    'user_name' => $user_name,
                                                                    'user_avatar' => $user_avatar]);
}
