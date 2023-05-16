<?php

use vendor\FormBuilder;

$path = 'http://testmanao.loc/controllers/registrController.php';
$formBuilder = new FormBuilder($path);

$formBuilder->addField('login', 'text', 'Login:', '', '', 'Enter your name', true, '[A-Za-z]+');
$formBuilder->addField('name', 'text', 'Name:', '', '', 'Enter your name', true, '[A-Za-z]+');
$formBuilder->addField('email', 'email', 'Email:', '', '', 'Enter your email', true, '[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}');
$formBuilder->addField('password', 'password', 'Password:', '', '', 'Enter your password', true);
$formBuilder->addField('repeatPassword', 'password', 'Repeat password:', '', '', 'Repeat your password', true);
$form = $formBuilder->buildForm();
echo $form;
