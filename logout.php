<?php

require_once('data.php');
require_once ('userdata.php');
require_once('function.php');

unset($_SESSION['user']);

header('Location: /index.php');
exit();
