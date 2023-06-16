<?php

namespace views\enter;

class EnterFormView extends \vendor\FormBuilder
{
    public function __construct($jsHandlerFile, $formId, $cssFile)
    {
        parent::__construct($jsHandlerFile, $formId, $cssFile);
        
       
        $this->addLink('/registr', 'Регистрация');
    }

    public function displayForm($login)
    {
        $this->addField('text', 'login', 'login',$login,'Enter your login', 'error-login');
        $this->addField('password', 'password', 'password', '', 'Enter your password', 'error-password');

                
        $form = $this->buildForm();
        echo $form;
    }

    
}

