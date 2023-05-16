<?php

use vendor\FormBuilder;

$path = 'http://testmanao.loc/controllers/enterController.php';

$formBuilder = new FormBuilder($path);

$formBuilder->addField('login', 'text', 'Login:', '', '', 'Enter your name', true, '[A-Za-z]+');
$formBuilder->addField('password', 'password', 'Password:', '', '', 'Enter your password', true);
$formBuilder->addField('link', 'link', '', 'Регистрация', 'http://testmanao.loc/controllers/registrController.php');
$form = $formBuilder->buildForm();
echo $form;
