<?php


$db_user = 'root';
$db_password = '';
$db_name = 'techweb';
$db = new PDO('mysql:host=127.0.0.1; dbname='.$db_name.'; charset=utf8', $db_user, $db_password);

//db attribute
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//api name
define('APP_NAME', 'MYAPI');

?>