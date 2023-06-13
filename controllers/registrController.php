<?php

namespace controllers;

use helpers\SessionManager;
use views\registr\RegistrFormView;
use models\RegistrModel;

class RegistrController
{
    private $sessionManager;

    public function __construct()
    {
        $this->sessionManager = new SessionManager();
    }

    public function userRegistration()
    {

        $registerView = new RegistrFormView('../public/js/registrHandler.js', "registr", '../public/css/style.css');
        $newUser = new RegistrModel('../dataBase/user.json');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

                $data = $_POST;

                $item = array(
                    'login' => $data['login'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => $data['password']
                );
                $newUser->insert($item);

                $response = $newUser->getErrors();

                if (empty($response['errors'])) {
                    $response['success'] = true;
                }

                $this->sessionManager->set('username', $data['login']);
                PR($_SESSION);

                echo json_encode($response);
            }
        } else {

            $registerView->displayForm();
        }
    }
}
