<?php

namespace application\controllers;

use application\lib\Validator;

class AjaxController
{
    public $validator;
    public function __construct()
    {
        $this->validator = new Validator;
    }

    public function handleAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
                // Получение данных из формы
                $login = isset($_POST['login']) ? $_POST['login'] : null;
                $name = isset($_POST['name']) ? $_POST['name'] : null;
                $email = isset($_POST['email']) ? $_POST['email'] : null;
                $password = isset($_POST['password']) ? $_POST['password'] : null;
                $repeatPassword = isset($_POST['repeatPassword']) ? $_POST['repeatPassword'] : null;
            } else {
                // Обработка обычного POST запроса (не AJAX)
                // Ваш код обработки данных здесь, если это не AJAX запрос
            }

            // Валидация данных

            $this->validator->validateLogin($login);
            $this->validator->validatePassword($password);

            // Проверка, есть ли дополнительные поля
            if (isset($name, $email, $repeatPassword)) {
                $this->validator->validateName($name);
                $this->validator->validateEmail($email);
                $this->validator->validateRepeatPassword($repeatPassword, $password);
            }

            $response = $this->validator->getResponse();

            if (empty($response['errors'])) {
                $response['success'] = true;
            }

            echo json_encode($response);
        } else {
            exit;
        }
    }
    public function logoutAction(){        
        setcookie($_SESSION['username'], "", time() - 3600, "/");
        unset($_COOKIE[$_SESSION['username']]);
        session_destroy();


        echo "Logout successful";
    }
}
