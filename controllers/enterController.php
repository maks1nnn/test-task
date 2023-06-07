<?php

require  '../helpers/Autoloader.php';


use views\enter\EnterFormView;
use models\EnterModel;


$enterView = new EnterFormView('../public/js/enterHandler.js', "enter", '../public/css/style.css');
$newUser = new EnterModel('../dataBase/user.json');
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


        echo json_encode($response);
    }
} else {

    $enterView->displayForm();
}
