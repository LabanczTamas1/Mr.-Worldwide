
<?php

$GLOBALS['DEV_MODE'] = true;

$GLOBALS['DB_HOST'] = '127.0.0.1';
$GLOBALS['DB_USER'] = 'root';
$GLOBALS['DB_PASS'] = '';
$GLOBALS['DB_NAME'] = 'mr.worldwide';
$GLOBALS['DB_PORT'] = '3306';

$GLOBALS['BASE_DIR'] = realpath(__DIR__);
$GLOBALS['URL'] = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>