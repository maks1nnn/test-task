<?php

require  '../helpers/Autoloader.php';


use views\registr\RegistrFormView;
use models\RegistrModel;



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
            
    
        echo json_encode($response);
        
    
    }
} else {

    $registerView->displayForm();
}

