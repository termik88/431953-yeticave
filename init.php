<?php
require_once ('function.php');
require_once ('config/db.php');
require_once('mysql_helper.php');

/*Тайм зона*/
date_default_timezone_set('Europe/Moscow');

/*Куки*/
session_start();
$authorization = false;
$user = [];

if (!empty($_SESSION) && isset($_SESSION['user'])) {
    $authorization = true;
    $user = $_SESSION['user'];
}

/*Проверка БД и обработка общего запроса - Категорий*/
if (!$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database'])) {
    $error = mysqli_connect_error();
    loading_page_error($error);
    die();

} else {
    mysqli_set_charset($link, "utf8");

    $sql_categories = 'SELECT `id`, `name` '
                     . 'FROM categories '
                     . 'ORDER BY `id`';
    $result = mysqli_query($link, $sql_categories);

    if (!$result) {
        $error = mysqli_error($link);
        loading_page_error($error);
        die();
    } else {
        $categories = [];
        foreach(mysqli_fetch_all($result, MYSQLI_ASSOC) as $categories_value) {
            $categories[$categories_value['id']] = $categories_value;
        }
    }
};

/*История*/
$history_array_name = 'history_viewed_ids';
$history_viewed_ids = [];
$expire = strtotime('30 days');
$path = '/';
