<?php
require_once('data.php');
require_once('function.php');

$history_lots = [];

if (isset($_COOKIE[$history_array_name])) {

    $history_lots_id = json_decode($_COOKIE[$history_array_name]);

    foreach ($history_lots_id as $id) {
        if (isset($ad_array_items[$id])) {
            $history_lots[$id] = $ad_array_items[$id];
        }
    }

    loading_page('history.php', 'История просмотров', ['history_lots' => $history_lots,
                                                                            'categories' => $categories,
                                                                            'is_auth' => $is_auth,
                                                                            'user_name' => $user_name,
                                                                            'user_avatar' => $user_avatar
    ]);
}
