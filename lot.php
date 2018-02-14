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

    foreach ($ad_array_items as $item) {
        if ($item['id'] === $lot_id) {
            $lot = $item;
            break;
        }
    }
}

if (!$lot) {
    http_response_code(404);
}

loading_page('lot.php', 'YetiCave - Просмотр лота', ['ad_array_items' => $ad_array_items,
                                                                        'categories' => $categories,
                                                                        'is_auth' => $is_auth,
                                                                        'user_name' => $user_name,
                                                                        'user_avatar' => $user_avatar
]);
