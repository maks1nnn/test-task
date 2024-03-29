<?php


namespace controllers;

use helpers\SessionManager;
use views\enter\EnterFormView;
use models\EnterModel;
use helpers\CookiesManager;

class EnterController

{
    private $sessionManager;
    private $cookiesManager;

    public function __construct()
    {
        $this->sessionManager = new SessionManager();
        $this->cookiesManager = new CookiesManager();
    }

    public function exec()
    {
        $authenticated = $this->sessionManager->get('authenticated');
        if ($authenticated === true) {
            header("Location: /hello");
        }
        $enterView = new EnterFormView('../public/js/enterHandler.js', "enter", '../public/css/style.css');
        $newUser = new EnterModel('../database/user.json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

                $data = $_POST;
                $item = array(
                    'login' => $data['login'],
                    'password' => $data['password']
                );

                $newUser->checkUser($item);

                $response = $newUser->getResponse();
                if (empty($response['errors'])) {
                    $response['success'] = true;
                    $this->sessionManager->set('username', $data['login']);
                    $this->sessionManager->set('authenticated', true);
                    $this->cookiesManager->set('username', $data['login'], time() + 3600, '/', '', false, true);
                }

                header('Content-Type: application/json');
                echo json_encode($response);
            }
        } else {
            $login = $this->sessionManager->get('username');
            


            $enterView->displayForm($login);
        }
    }
}
