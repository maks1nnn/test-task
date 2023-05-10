<?php

use vendor\FormBuilder;

$path = '';
$formBuilder = new FormBuilder($path);
$formBuilder->addField('text', 'name', 'Имя', true);
$formBuilder->addField('email', 'email', 'Email', true);
$formBuilder->addField('password', 'password', 'Пароль', true);
$formBuilder->addField('password', 'password', 'Пароль', true);
$formBuilder->addField('submit', 'submit', 'Отправить');
$formHtml = $formBuilder->buildForm();
echo $formHtml;
