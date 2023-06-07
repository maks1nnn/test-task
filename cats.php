<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $array = array($_POST['login'],
         $_POST['name'],
         $_POST['email'],
         $_POST['password']);

// Преобразовать массив в строку
$logMessage = print_r($array, true);

// Записать строку в лог файл
error_log($logMessage, 3, "../log.log");
        $item = array(
        'login' => $_POST['login'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
        );
       
        print_r($item);
    }}