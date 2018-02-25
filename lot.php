<?php
/**
 * Created by PhpStorm.
 * User: Илья
 * Date: 14.02.2018
 * Time: 23:26
 */

require_once('data.php');
require_once('function.php');

$lot = null;

if (isset($_GET['lot_id'])) {
    $lot_id = $_GET['lot_id'];

    foreach ($ad_array_items as $key => $item) {
        if ($key === (int)$lot_id) {
            $lot = $item;
        }
    }

    if (isset($_COOKIE[$history_array_name])) {
        if (!in_array($lot_id, json_decode($_COOKIE[$history_array_name]))) {
            $history_viewed_ids = json_decode($_COOKIE[$history_array_name]);
            $history_viewed_ids[] = $lot_id;
            setcookie($history_array_name, json_encode($history_viewed_ids), $expire, $path);
        }
    } else {
        setcookie($history_array_name, json_encode($history_viewed_ids), $expire, $path);
    }
};

if (!$lot) {
    http_response_code(404);
};

loading_page('lot.php', 'YetiCave - Просмотр лота', ['lot_id' => $lot_id,
                                                                        'lot' => $lot,
                                                                        'bets' => $bets,
                                                                        'categories' => $categories,
                                                                        'is_auth' => $is_auth,
                                                                        'user_name' => $user_name,
                                                                        'user_avatar' => $user_avatar
]);
