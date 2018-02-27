<?php

require_once('data.php');
require_once('function.php');

loading_page('index.php', 'Главная', ['ad_array_items' => $ad_array_items,
                                                            'categories' => $categories,
                                                            'authorization' => $authorization,
                                                            'user' => $user
]);
