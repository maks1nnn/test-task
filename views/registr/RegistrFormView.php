<?php

namespace views\registr;


class RegistrFormView extends \vendor\FormBuilder
{
    public function __construct($jsHandlerFile, $formId, $cssFile)
    {
        parent::__construct($jsHandlerFile, $formId, $cssFile);

        $this->addField('text', 'login', 'login', '', 'Enter your login', 'error-login');
        $this->addField('text', 'name', 'name', '', 'Enter your name', 'error-name');
        $this->addField('email', 'email', 'email', '', 'Enter your email', 'error-email');
        $this->addField('password', 'password', 'password', '', 'Enter your password', 'error-password');
        $this->addField('password', 'repeatPassword', 'repeatPassword', '', 'Repeat your password', 'error-repeatPassword');
    }

    public function displayForm()
    {
        $form = $this->buildForm();
        echo $form;
    }
}
