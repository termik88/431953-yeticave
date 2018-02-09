<?php
require_once ('data.php');
require_once('function.php');
/*require_once('config.php');

if ($config['enable']) {

} else {

}*/

$page_content = render_template('templates/index.php', ['ad_array_items' => $ad_array_items ]);
$layout_content = render_template('templates/layout.php', [
    'title' => 'Главная',
    'content' => $page_content
]);

?>
