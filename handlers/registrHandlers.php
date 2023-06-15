<?php
require  '../helpers/autoloader.php';

use vendor\Validator;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
        // Получение данных из формы
        $login = $_POST['login'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repeatPassword = $_POST['repeatPassword'];
    }

    // Валидация данных
    $validator = new Validator();
    $validator->validateLogin($login);
    $validator->validateName($name);
    $validator->validateEmail($email);
    $validator->validatePassword($password);
    $validator->validateRepeatPassword($repeatPassword, $password);

    $response = $validator->getResponse();

    if (empty($response['errors'])) {
        $response['success'] = true;
    }

    echo json_encode($response);
} else {
    exit;
}
