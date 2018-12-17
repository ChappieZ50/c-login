<?php
session_start();
ob_start();
date_default_timezone_set('Europe/Istanbul');
spl_autoload_register(function ($className) {
    $dir = dirname(__FILE__) . '/';
    if (file_exists($dir . '../classes/' . $className . '.php'))
        require_once $dir . '../classes/' . $className . '.php';
});
define('URL', 'http://localhost/c-login/');
define('PATH', realpath('.'));
$config = [
    'host' => 'localhost',
    'database_name' => 'c-login',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8'

];

try {
    $db = new BasicDB($config['host'], $config['database_name'], $config['username'], $config['password'], $config['charset']);
} catch (PDOException $e) {
    die($e->getMessage());
}