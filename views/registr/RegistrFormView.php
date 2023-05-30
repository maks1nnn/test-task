<?php

namespace views\registr;


class RegistrFormView extends \vendor\FormBuilder
{
    public function __construct($jsHandlerFile, $formId, $cssFile)
    {
        parent::__construct($jsHandlerFile, $formId, $cssFile);

        $this->addField('login', 'text', 'Login:', '', '', 'Enter your login');
        $this->addField('name', 'text', 'Name:', '', '', 'Enter your name');
        $this->addField('email', 'email', 'Email:', '', '', 'Enter your email');
        $this->addField('password', 'password', 'Password:', '', '', 'Enter your password');
        $this->addField('repeatPassword', 'password', 'Repeat password:', '', '', 'Repeat your password');
    }

    public function displayForm()
    {
        $form = $this->buildForm();
        echo $form;
    }
}

/*$path = 'http://testmanao.loc/controllers/registrController.php';
$formBuilder = new FormBuilder($path);

$formBuilder->addField('login', 'text', 'Login:', '', '', 'Enter your login', true, '([А-Я]{1}[а-яё]{5,23}|[A-Z]{1}[a-z]{5,23})');
$formBuilder->addField('name', 'text', 'Name:', '', '', 'Enter your name', true, '([А-Я]{1}[а-яё]{1,23}|[A-Z]{1}[a-z]{1,23})');
$formBuilder->addField('email', 'email', 'Email:', '', '', 'Enter your email', true, '[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}');
$formBuilder->addField('password', 'password', 'Password:', '', '', 'Enter your password', true);
$formBuilder->addField('repeatPassword', 'password', 'Repeat password:', '', '', 'Repeat your password', true);
$form = $formBuilder->buildForm();
echo $form;*/
