<?php

use helpers\SessionManager;
use router\Router;

require  '../helpers/printDebugs.php';
require  '../helpers/Autoloader.php';

$session = new SessionManager();
$authenticated = $session->get('authenticated');

$router = new Router();

// Добавляем маршруты
$router->addRoute('/start', 'controllers\EnterController', 'exec');
$router->addRoute('/registr', 'controllers\RegistrController', 'userRegistration');
$router->addRoute('/hello', 'controllers\HelloController', 'hello');

if ($authenticated === true) {
    $currentUrl = '/hello';
} elseif ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '') {
    $currentUrl = '/start';
} else {
    // Получаем текущий URL
    $currentUrl = $_SERVER['REQUEST_URI'];
}
// Обрабатываем запрос
$router->handleRequest($currentUrl);
