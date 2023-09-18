<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{
    private $response = [];

    public function registrUser($inputData)
    {
        $data = $this->json->getAll();
        foreach ($data as $item) {
            if ($item['login'] === $inputData['login']) {
                $this->response['errors']['login'] = array(
                    'field' => 'login',
                    'message' => 'Этот логин уже используется.'
                );
            } elseif ($item['email'] === $inputData['email']) {
                $this->response['errors']['login'] = array(
                    'field' => 'email',
                    'message' => 'Этот адрес уже используется.'
                );
            }
        }
        if (empty($this->response)) {
            $inputData['password'] = $this->hasher->hashPassword($inputData['password']);
            $this->json->insert($inputData);
            $this->response[] = ['success' => true];
        }
    }

    public function checkUser($inputData)
    {
        $data = $this->json->getAll();
        $userData = null;
        foreach ($data as $item) {
            if ($item['login'] === $inputData['login']) {
                $userData = $item;
                break;
            }
        }
        if ($userData) {
            if ($this->hasher->verifyPassword($inputData['password'], $userData['password'])) {
                $this->response['success'] = true;
            } else {
                $this->response['errors']['password'] = array(
                    'field' => 'password',
                    'message' => 'Неверный пароль.',
                );
            }
        } else {
            $this->response['errors']['login'] = array(
                'field' => 'login',
                'message' => 'Пользователь не найден.',
            );
        }
    }

    public function getResponse()
    {
        return $this->response;
    }
}
