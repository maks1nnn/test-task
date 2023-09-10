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

        /*$result = $this->model->getNames();
        PR($result);
        $vars = [
            'names' => $result,
        ];
        PR($vars);*/


        $this->view->render('Hello',); 
    }
}
