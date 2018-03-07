<?php
require_once ('init.php');

$sql_lots = 'SELECT lots.date_of_completion as date_completion, '
                   . 'lots.name as name_lot, '
                   . 'lots.start_price as start_price, '
                   . 'lots.picture as picture, '
                   . 'lots.id as id, '
                   . 'categories.name as name '
           . 'FROM lots JOIN categories ON categories.id = lots.id_categori '
           . 'WHERE lots.id_winner IS NULL and CURDATE() < lots.date_of_completion '
           . 'ORDER BY lots.created_date ASC LIMIT 9;';

$ad_array_items = sql_query($link, $sql_lots);

loading_page('index.php', 'Главная', ['ad_array_items' => $ad_array_items,
                                                        'categories' => $categories,
                                                        'authorization' => $authorization,
                                                        'user' => $user]);

