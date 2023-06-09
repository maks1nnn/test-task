<?php

namespace models;

use helpers\PasswordHasher;

class EnterModel extends \vendor\JsonDb
{
    private $passwordHasher;
    private $response = [];


    public function __construct($fileName)
    {
        parent::__construct($fileName);
        $this->passwordHasher = new PasswordHasher();
    }


    public function checkUser($inputItem)
    {
        $login = $inputItem['login'];
        $password = $inputItem['password'];
        $userData = $this->getByLogin($login);

        if ($userData !== null) {
            $salt = $userData['salt'];
            $hashedPassword = $userData['password'];
            if ($this->passwordHasher->verifyPassword($password, $hashedPassword, $salt)) {
                return true;
            } else {
                $this->response['errors']['password'] = array(
                    'field' => 'password',
                    'message' => 'Неверный пароль.'
                );
                return false;
            }
        } else {
            $this->response['errors']['login'] = array(
                'field' => 'login',
                'message' => 'Пользователь  не найден.'
            );

            return;
        }
    }

    public function getByLogin($login)
    {
        $data = $this->getAll();

        foreach ($data as $item) {
            if ($item['login'] === $login) {
                return $item;
            }
        }

        return null;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
