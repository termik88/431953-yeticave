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
    $required = ['title', 'category', 'description', 'price', 'lot-step', 'lot-date'];
    $dict = ['title' => 'Наименование', 'category' => 'Категория',
        'description' => 'Описание', 'price' => 'Начальная цена', 'lot-date' => 'Дата окончания торгов', 'lot-step' => 'Шаг ставки'];
    $errors = [];

    foreach ($required as $key) {
        if (empty($_POST[$key])) {
                $errors[$key] = 'Поле не заполненое';
        }
    }

    foreach ($_POST as $key => $value) {
        if ((($key === 'price') or ($key === 'lot-step')) and (!ctype_digit($value))) {
                $errors[$key] = 'В поле возможны только целые положительные числа';
        }

        if (($key === 'category') and ($value === 'Выберите категорию')) {
                $errors[$key] = 'Вы не выбрали категорию';
        }

        if ((!strtotime($_POST[$key])) or (strtotime($_POST[$key]) < time())) {
            $errors[$key] = 'Некорректно указана дата';
        }
    }

    if ($_FILES['add_img']['name']) {
        $tpm_name = $_FILES['add_img']['tmp_name'];
        $path = $_FILES['add_img']['name'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_type = finfo_file($finfo, $tpm_name);

        if ($file_type !== "image/jpeg" || $file_type !== "image/png") {
            $errors['image_url'] = 'Загрузите картинку в формате jpeg, либо png';
        } else {
            move_uploaded_file($tpm_name, 'img/' . $path);
            $lot['image_url'] = 'img/' . $path; /*img - указано в дате, поэтому*/
        }
    } else {
        $errors['image_url'] = 'Вы не загрузили файл';
    }

    if (count($errors)) {
        loading_page('add.php', 'Добавление лота - ошибки', ['lot' => $lot,
                                                                                'errors' => $errors,
                                                                                'dict' => $dict,
                                                                                'categories' => $categories,
                                                                                'is_auth' => $is_auth,
                                                                                'user_name' => $user_name,
                                                                                'user_avatar' => $user_avatar
        ]);
    } else {
        loading_page('lot.php', 'Просмотр добавленного лота', ['lot' => $lot,
                                                                    'categories' => $categories,
                                                                    'is_auth' => $is_auth,
                                                                    'user_name' => $user_name,
                                                                    'user_avatar' => $user_avatar
        ]);
    }
} else {
    loading_page('add.php', 'Добавление лота', ['categories' => $categories,
                                                                    'is_auth' => $is_auth,
                                                                    'user_name' => $user_name,
                                                                    'user_avatar' => $user_avatar]);
}
