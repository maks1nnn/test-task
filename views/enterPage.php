<?php

use view\formBase\Form;
use view\formBase\Input;
use view\formBase\Link;
use view\formBase\Submit;

$form = (new Form)->setAttrs(['action' => 'scriptEnter.php', 'method' => 'POST']);
	
	echo $form->open();
		echo (new Input)->setAttr('type', 'text')->setAttr('name', 'login')->setAttr('value', $name)->setAttr('placeholder', 'Введите имя ...') . '<br>' . '<br>';
        echo (new Input)->setAttr('type', 'text')->setAttr('name', 'password')->setAttr('placeholder', 'Введите пароль ...') . '<br>' . '<br>';
		


		echo new Submit . '<br>' . '<br>';

        echo (new Link)->setAttr('href', '/public/indexRegistr.php')->setText('Регистрация')->show();

        
	echo $form->close();
    

/*	Форма авторизации
1. Поля:
● login;
● password.

В случае ошибки, возвращаем текст с ошибками. Подставляем их рядом с полями, в
которых допущена ошибка.*/