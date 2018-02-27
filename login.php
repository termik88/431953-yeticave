<?php

require_once('data.php');
require_once ('userdata.php');
require_once('function.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login_form = $_POST;
    $required = ['email', 'password'];

    $errors = validation_required($required, $login_form);

    if (!filter_var($login_form['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Не правильно введен Email';
    } else {
        $users = searchUserByEmail($login_form['email'], $users);
        if (!count($errors) && $users) {
            if (password_verify($login_form['password'], $users['password'])) {
                $_SESSION['user'] = $users;
            } else {
                $errors['password'] = 'Вы ввели неверный пароль';
            }
        } else if (!$users){
            $errors['email'] = 'Такой пользователь не найден';
        }
    }

    if (count($errors)) {
        loading_page('login.php', 'Авторизация ', ['errors' => $errors,
                                                                        'login_form' => $login_form,
                                                                        'categories' => $categories]);
    } else {
        header("Location: /index.php");
        exit();
    }

} else {
    if (isset($_SESSION['user'])) {
        loading_page('index.php', 'YetiCave', ['ad_array_items' => $ad_array_items,
                                                                'categories' => $categories,
                                                                'authorization' => $authorization,
                                                                'user' => $user]);
    } else {
        loading_page('login.php', 'Авторизация', ['categories' => $categories]);
    }
}
