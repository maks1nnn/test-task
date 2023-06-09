<?php


namespace controllers;

use views\enter\EnterFormView;
use models\EnterModel;

class EnterController
{


    public function exec()
    {
PR($_POST);
        $enterView = new EnterFormView('../public/js/enterHandler.js', "enter", '../public/css/style.css');
        $newUser = new EnterModel('../dataBase/user.json');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

                $data = $_POST;
                $item = array(
                    'login' => $data['login'],
                    'password' => $data['password']
                );
                PR($item);
                $newUser->checkUser($item);
                PR($newUser);

                $response = $newUser->getResponse();
                if (empty($response['errors'])) {
                    $response['success'] = true;
                }
                header('Content-Type: application/json');
                echo json_encode($response);
                
            }
        } else {

            $enterView->displayForm();
        }
    }
}
