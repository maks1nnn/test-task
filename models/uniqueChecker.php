<?php

namespace models;

class UniqueChecker extends \vendor\JsonDb
{
    private $response = [];

    public function isLoginUnique($login)
    {
        $data = $this->getAll();

        foreach ($data as $item) {
            if ($item['login'] === $login) {
                $this->response['errors']['login'] = array(
                    'field' => 'login',
                    'message' => 'Этот логин уже используется.');
                return false;
            }
        }

        return true;
    }

    public function isEmailUnique($email)
    {
        $data = $this->getAll();

        foreach ($data as $item) {
            if ($item['email'] === $email) {
                $this->response['errors']['email'] = array(
                    'field' => 'email',
                    'message' => 'Этот адрес уже используется.');
                return false;
            }
        }

        return true;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
