<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $login = $_POST['login'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];

// Запись данных в лог
$logData = "Login: " . $login . "\n"
         . "Name: " . $name . "\n"
         . "Email: " . $email . "\n"
         . "Password: " . $password . "\n"
         . "Repeat Password: " . $repeatPassword . "\n";

error_log($logData, 3, "cats.log");

    // Валидация данных
    $errors = array();

    if (empty($name)) {
        $errors[] = "Имя является обязательным полем.";
    }
    $pattern = '/^[a-zA-Zа-яА-ЯёЁ\s-]{2,30}$/u'; // Регулярное выражение для проверки имени

    if (!preg_match($pattern, $name)) {
        $errors[] = "Имя является обязательным полем.";
    } 

    if (empty($email)) {
        $errors[] = "Email является обязательным полем.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Неправильный формат email.";
    }

    // Если есть ошибки валидации, отправляем их обратно в JavaScript
    if (!empty($errors)) {
        $response = array('success' => false, 'errors' => $errors);
        echo json_encode($response);
        exit;
    }

    // Данные прошли валидацию
    $response = array('success' => true, 'name' => $name, 'email' => $email);
    echo json_encode($response);
} else {
    // Обработка ошибки, если запрос не был отправлен методом POST
    $response = array('success' => false, 'errors' => array("Ошибка: Неверный метод запроса."));
    echo json_encode($response);
}
?>