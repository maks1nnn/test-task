<?php

use helpers\SessionManager;
//use router\Router;

require  '../helpers/printDebugs.php';
require  '../helpers/autoloader.php';
require  '../config/configRouts.php';

$session = new SessionManager();

if ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '') {
    $currentUrl = '/start';
} else {
    // Получаем текущий URL
    $currentUrl = $_SERVER['REQUEST_URI'];
}

PR($currentUrl);
// Обрабатываем запрос
$router->handleRequest($currentUrl);
