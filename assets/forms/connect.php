<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'elexflex');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

$connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
?>
