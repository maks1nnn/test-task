<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{


    public function loginAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/account/login') {
            $inputData = array(
                'login' => $_POST['login'],
                'password' => $_POST['password']
            );

            $this->model->checkUser($inputData);
            $response = $this->model->getResponse();
            if ($response['success'] === true) {
                $_SESSION['aunthenticated'] = true;
                $_SESSION['username'] = $_POST['login'];
                setcookie($_POST['login'], $_POST['name'], time() + 3600, "/");
            }
            echo json_encode($response);
            exit;
        }

        $this->view->render('Enter');
    }

    public function registerAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/account/register') {
            $inputData = array(
                'login' => $_POST['login'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            );

            $this->model->registrUser($inputData);
            $response = $this->model->getResponse();
            echo json_encode($response);
            exit;
        }

        $this->view->render('Register');
    }
}
