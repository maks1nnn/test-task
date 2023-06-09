<?php

namespace views\enter;

class EnterFormView extends \vendor\FormBuilder
{
    public function __construct($jsHandlerFile, $formId, $cssFile)
    {
        parent::__construct($jsHandlerFile, $formId, $cssFile);

        $this->addField('text', 'login', 'login', 'Enter your login', 'error-login');
        $this->addField('password', 'password', 'password', 'Enter your password', 'error-password');
        $this->addLink('/registr', 'Регистрация');
    }

    public function displayForm()
    {
        $form = $this->buildForm();
        echo $form;
    }
}

