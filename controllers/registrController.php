<?php

require  '../helpers/Autoloader.php';
//require '../views/registr/RegistrFormView.php';
//require '..vendor/FormBuilder.php';

use views\registr\RegistrFormView;

//require_once 'model/User.php';
//require_once 'view/RegisterView.php';

// Создаем экземпляр модели и представления
//$userModel = new User();
$registerView = new RegistrFormView('../public/js/handler.js', "registr",'../public/css/style.css');

//if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
   // print_r($_POST);}
    
    // Запрос был отправлен методом POST
    // Ваш код обработки запроса здесь
$registerView->displayForm();

//$logPath = "cats.log";

//$logData = file_get_contents($logPath);
//print_r($logData);
/*if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    print_r($_POST);// Здесь выполняем нужные действия для AJAX-запроса
    // ...
} else {
    $registerView->displayForm();
    // Если это не AJAX-запрос, то ничего не делаем
    // или выполните другие действия, в зависимости от потребностей
}*/
// Если данные формы были отправлены методом POST
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $login = $_POST['login'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = $_POST['repeatPassword'];*/

    /* Проверяем, что все поля заполнены
    if (!empty($name) && !empty($email) && !empty($password)) {
        // Создаем нового пользователя
        $userModel->createUser($name, $email, $password);
        // Перенаправляем на страницу успешной регистрации
        header('Location: success.php');
        exit;
    } else {
        // Если не все поля заполнены, выводим сообщение об ошибке
        $registerView->showError('Please fill in all fields');
    }*/
/*} else {
    // Если данные формы не были отправлены методом POST, просто отображаем страницу регистрации
    $registerView->displayForm();
}*/