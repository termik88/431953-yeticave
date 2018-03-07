<?php

require_once('init.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login_form = $_POST;
    $errors = [
        'email' => error_email($login_form['email']),
        'password' => error_field_requred($login_form['password'])];
    $errors = array_filter($errors);

    if (!count($errors)) {
        $sql_email = db_get_prepare_stmt($link,'SELECT * FROM users WHERE email = ?', [strtolower($login_form['email'])]);
        $user_email = sql_query($link, $sql_email);

        $users = searchUserByEmail($login_form['email'], $user_email);
        if ($users) {
            if (password_verify($login_form['password'], $users['password'])) {
                $_SESSION['user'] = $users;
                header("Location: /index.php");
                exit();
            } else {
                $errors['password'] = 'Вы ввели неверный пароль';
            }
        } else if (!$users){
            $errors['email'] = 'Такой пользователь не найден';
        }
    }  else {
        loading_page('login.php', 'Авторизация ', ['errors' => $errors,
                                                                        'login_form' => $login_form,
                                                                        'categories' => $categories]);
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
