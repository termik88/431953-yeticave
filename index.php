<?php

require_once('data.php');
require_once('function.php');

loading_page('index.php', 'Главная', ['ad_array_items' => $ad_array_items,
                                                           'categories' => $categories,
                                                           'is_auth' => $is_auth,
                                                           'user_name' => $user_name,
                                                           'user_avatar' => $user_avatar
]);
