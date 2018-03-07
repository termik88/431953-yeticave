<?php
require_once ('function.php');
require_once ('data.php'); /*вырезать*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sign_up_form = $_POST;
    $errors = ['email' => error_email($sign_up_form['email']),
        'password' => $error_password($sign_up_form['password']),
        'name' => $error_name($sign_up_form['name']),
        'message' => $error_message($sign_up_form['message']),
        'avatar' => $error_avatar($sign_up_form['avatar'])];

    $required = ['email' => 'email',
                'password' => 'string',
                'name' => 'string',
                'message' => 'string'];

    $errors = array_merge(validation_field($required, $sign_up_form), loading_picture($_FILES, 'avatar'));





    if (count($errors)) {
        loading_page('sign-up.php', 'Регистрация ', ['errors' => $errors,
                                                                        'sign_up_form' => $sign_up_form,
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
        loading_page('sign-up.php', 'Регистрация', ['categories' => $categories]);
    }
}
