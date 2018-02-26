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
    }

    if (!count($errors) and $users = searchUserByEmail($login_form['email'], $users)) {
        if (password_verify($login_form['password'], $users['password'])) {
            $_SESSION['user'] = $users;
        } else {
            $errors['password'] = 'Неверный пароль';
        }
    } else {
        $errors['email'] = 'Такой пользователь не найден';
    }

    if (count($errors)) {
        loading_page('login.php', 'Аутентификация ', ['errors' => $errors,
                                                                        'login_form' => $login_form,
                                                                        'categories' => $categories,
                                                                        'is_auth' => $is_auth,
                                                                        'user_name' => $user_name,
                                                                        'user_avatar' => $user_avatar]);
    } else {
        header("Location: /index.php");
        exit();
    }

} else {
    if (isset($_SESSION['user'])) {
        loading_page('index.php', 'YetiCave',['categories' => $categories,
                                                                'is_auth' => $is_auth,
                                                                'user_name' => $user_name,
                                                                'user_avatar' => $user_avatar]);
    } else {
        loading_page('login.php', 'Аутентификация', ['categories' => $categories,
                                                                        'is_auth' => $is_auth,
                                                                        'user_name' => $user_name,
                                                                        'user_avatar' => $user_avatar]);
    }
}
