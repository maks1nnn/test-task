<?php

namespace application\core;

use application\core\View;

abstract class Controller
{

    public $route;
    public $view;
    public $model;
    public $acl;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
        if (isset($_SESSION['authenticated'])) {
            header("Location: /hello");
        }
    }

    public function loadModel($name)
    {
        $path = 'application\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }

    public function checkAcl()
    {
        $this->acl = require 'application/acl/' . $this->route['controller'] . '.php';

        if ($this->isAcl('all')) {
            return true;
        }
        return false;
    }
    
    public function isAcl($key)
    {
        return in_array($this->route['action'], $this->acl[$key]);
    }
}
