<?php
require_once('init.php');

$lot = null;

if (isset($_GET['lot_id'])) {
    $lot_id = intval($_GET['lot_id']);

    $sql_lots = 'SELECT lots.date_of_completion as date_completion, 
                         lots.name as name_lot, 
                         lots.start_price as start_price, 
                         lots.picture as picture, 
                         lots.description as description, 
                         lots.id as id,
                         categories.name as categories_name, 
                         bets.`date` as date_bet, 
                         bets.`sum` as sum_bet, 
                         users.name as user_name 
                         FROM lots JOIN categories ON categories.id = lots.id_categori
                                    LEFT JOIN bets ON bets.id_lot = lots.id
                                    LEFT JOIN users ON users.id = bets.id_user
                         WHERE lots.id = ' . $lot_id . '
                        ORDER BY date_bet ASC';

    if ($result = mysqli_query($link, $sql_lots)) {

        if (!mysqli_num_rows($result)) {
            http_response_code(404);
            loading_page_error(['error' => 'Лот с этим идентификатором не найден']);
        }
        else {
            $lot = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if (isset($_COOKIE[$history_array_name])) {
                if (!in_array($lot_id, json_decode($_COOKIE[$history_array_name]))) {
                    $history_viewed_ids = json_decode($_COOKIE[$history_array_name]);
                    $history_viewed_ids[] = $lot_id;
                    setcookie($history_array_name, json_encode($history_viewed_ids), $expire, $path);
                }
            } else {
                $history_viewed_ids[] = $lot_id;
                setcookie($history_array_name, json_encode($history_viewed_ids), $expire, $path);
            }
        }
    }
    else {
        loading_page_error(mysqli_error($link));
    }
};

loading_page('lot.php', 'YetiCave - Просмотр лота', ['lot' => $lot,
                                                                        'categories' => $categories,
                                                                        'authorization' => $authorization,
                                                                        'user' => $user
]);
