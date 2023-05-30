<?php

require_once 'model/User.php';
require_once 'view/RegisterView.php';

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    // Здесь выполняем нужные действия для AJAX-запроса
    // ...
} else {
    // Если это не AJAX-запрос, то ничего не делаем
    return; // или выполните другие действия, в зависимости от потребностей
}

// Создаем экземпляр модели и представления
$userModel = new User();
$registerView = new RegisterView();

// Если данные формы были отправлены методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Проверяем, что все поля заполнены
    if (!empty($name) && !empty($email) && !empty($password)) {
        // Создаем нового пользователя
        $userModel->createUser($name, $email, $password);
        // Перенаправляем на страницу успешной регистрации
        header('Location: success.php');
        exit;
    } else {
        // Если не все поля заполнены, выводим сообщение об ошибке
        $registerView->showError('Please fill in all fields');
    }
} else {
    // Если данные формы не были отправлены методом POST, просто отображаем страницу регистрации
    $registerView->show();
}