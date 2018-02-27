<?php

require_once('data.php');
require_once('function.php');

if ($authorization) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $lot = $_POST;
        $required = ['title', 'category', 'description', 'price', 'lot-step', 'lot-date'];
        $dict = ['title' => 'Наименование', 'category' => 'Категория',
            'description' => 'Описание', 'price' => 'Начальная цена',
            'lot-date' => 'Дата окончания торгов', 'lot-step' => 'Шаг ставки', 'image_url' => 'Картинка'];

        $errors = validation_required($required, $lot);
        foreach ($_POST as $key => $value) {
            if ((($key === 'price') || ($key === 'lot-step')) && ((!filter_var($value, FILTER_VALIDATE_INT,
                    array('options' => array('min_range' => 1)))))) {
                $errors[$key] = 'В поле возможны только целые положительные числа';
            }

            if (($key === 'category') && ($value === 'Выберите категорию')) {
                $errors[$key] = 'Вы не выбрали категорию';
            }

            if ((!strtotime($_POST['lot-date'])) || (strtotime($_POST['lot-date']) < time())) {
                $errors['lot-date'] = 'Некорректно указана дата';
            }
        }

        if ($_FILES['add_img']['name']) {
            $tpm_name = $_FILES['add_img']['tmp_name'];
            $path = $_FILES['add_img']['name'];
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $file_type = finfo_file($finfo, $tpm_name);

            if ($file_type !== 'image/jpeg') {
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
                                                                                    'authorization' => $authorization,
                                                                                    'user' => $user]);
        } else {
            loading_page('lot.php', 'Просмотр добавленного лота', ['lot' => $lot,
                                                                                    'categories' => $categories,
                                                                                    'authorization' => $authorization,
                                                                                    'user' => $user]);
        }
    } else {
        loading_page('add.php', 'Добавление лота', ['categories' => $categories,
                                                                        'authorization' => $authorization,
                                                                        'user' => $user]);
    }
} else {
    http_response_code(403);
    exit();
}
