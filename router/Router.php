<?php

namespace router;

class Router {
    protected $routes = array();

    // Добавление маршрута
    public function addRoute($url, $controller, $action) {
        $this->routes[$url] = array('controller' => $controller, 'action' => $action);
    }

    // Обработка запроса
    public function handleRequest($url) {
        if (array_key_exists($url, $this->routes)) {
            $controllerName = $this->routes[$url]['controller'];
            $actionName = $this->routes[$url]['action'];

            // Создаем экземпляр контроллера
            $controller = new $controllerName();

            // Вызываем соответствующий метод действия
            $controller->$actionName();
        } else {
            // Обработка ошибки 404 - маршрут не найден
            echo "Error 404: Page not found.";
            
        }
    }
}