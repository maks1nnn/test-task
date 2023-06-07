<?php
require  '../helpers/Autoloader.php';

use vendor\Validator;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
        // Получение данных из формы
        $login = $_POST['login'];        
        $password = $_POST['password'];
        
    }

    // Валидация данных
    $validator = new Validator();
    $validator->validateLogin($login);
    $validator->validatePassword($password);
    
    $response = $validator->getResponse();

    if (empty($response['errors'])) {
        $response['success'] = true;
    }

    echo json_encode($response);
} else {
    exit;
}
