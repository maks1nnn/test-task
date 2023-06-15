<?php

use helpers\SessionManager;

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


// Обрабатываем запрос
$router->handleRequest($currentUrl);
