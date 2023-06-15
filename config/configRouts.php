<?php

use router\Router;

$router = new Router();

// Добавляем маршруты
$router->addRoute('/start', 'controllers\EnterController', 'exec');
$router->addRoute('/registr', 'controllers\RegistrController', 'userRegistration');
$router->addRoute('/hello', 'controllers\HelloController', 'hello');
