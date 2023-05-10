<?php

use view\formBase\Form;
use view\formBase\Input;
use view\formBase\Submit;

$form = (new Form)->setAttrs(['action' => 'scriptRegistr.php', 'method' => 'POST']);
	
	echo $form->open();
		echo (new Input)->setAttr('type', 'text')->setAttr('name', 'userName' )->setAttr('required' )->setAttr('placeholder', 'Введите логин ...') . '<br>' . '<br>';

        echo (new Input)->setAttr('type', 'text')->setAttr('name', 'email')->setAttr('placeholder', 'Введите адрес ...') . '<br>' . '<br>';

		echo (new Input)->setAttr('type', 'text')->setAttr('name', 'password')->setAttr('required' )->setAttr('placeholder', 'Введите пароль ...') . '<br>' . '<br>';

        echo (new Input)->setAttr('type', 'text')->setAttr('name', 'confirm_password')->setAttr('required' )->setAttr('placeholder', 'Повторите пароль ...') . '<br>' . '<br>';

		echo (new Input)->setAttr('type', 'text')->setAttr('name', 'userName' )->setAttr('required' )->setAttr('placeholder', 'Введите логин ...') . '<br>' . '<br>';

		echo new Submit . '<br>' . '<br>';

        
        
	echo $form->close();
    

	/*login (unique) [валидация : минимум 6 символов ];
● password [валидация : минимум 6 символов , обязательно должны
состоять из цифр и букв];
● confirm_password [должен совпадать с password];
● email (unique) [валидация : email];
● name [валидация : минимум 2 символа , только буквы].*/

//<div class="error-message" style="display:none;"></div>