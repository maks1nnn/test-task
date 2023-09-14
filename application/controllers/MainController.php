<?php

namespace application\controllers;

use application\core\Controller;


class MainController extends Controller
{

    public function indexAction()
    {
        session_start();
        if (!$_SESSION['aunthenticated'] == true) {
            $this->view->redirect('account/login');
        }

        
        $vars = [
            'username' => $_SESSION['username'],
        ];
        


        $this->view->render('Hello',$vars); 
    }
}
