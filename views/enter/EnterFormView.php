<?php

namespace views\enter;

class EnterFormView extends \vendor\FormBuilder
{
    public function __construct($jsHandlerFile, $formId, $cssFile)
    {
        parent::__construct($jsHandlerFile, $formId, $cssFile);

        $this->addField('login', 'text', 'Login:', '', '', 'Enter your name', true, '[A-Za-z]+');
        $this->addField('password', 'password', 'Password:', '', '', 'Enter your password', true);
        $this->addField('link', 'link', '', 'Регистрация', 'http://testmanao.loc/controllers/registrController.php');
    }

    public function displayForm()
    {
        $form = $this->buildForm();
        echo $form;
    }
}

/*$path = 'http://testmanao.loc/controllers/enterController.php';

$formBuilder = new FormBuilder($path);

$formBuilder->addField('login', 'text', 'Login:', '', '', 'Enter your name', true, '[A-Za-z]+');
$formBuilder->addField('password', 'password', 'Password:', '', '', 'Enter your password', true);
$formBuilder->addField('link', 'link', '', 'Регистрация', 'http://testmanao.loc/controllers/registrController.php');
$form = $formBuilder->buildForm();
echo $form; */
