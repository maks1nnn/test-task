<?php

namespace controllers;

use helpers\SessionManager;
use views\hello\HelloView;

class HelloController
{
    private $sessionManager;

    public function __construct()
    {
        $this->sessionManager = new SessionManager();
    }

    public function hello()
    {
        $userName = $this->sessionManager->get('username');
        $newEnter = new HelloView($userName, '../public/js/logout.js' );
        
        $html = $newEnter->generateHTML();
               
        echo $html;
        
    }
}
