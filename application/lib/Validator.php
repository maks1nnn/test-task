<?php

namespace application\lib;

class Validator
{
    private $response = [];

    public function validateLogin($login)
    {
        if (empty($login)) {
            $this->response['errors']['login'] = array(
                'field' => 'login',
                'message' => 'Имя является обязательным полем.'
            );
        } else {
            $pattern = '/^.{6,}$/u'; // Регулярное выражение для проверки имени

            if (!preg_match($pattern, $login)) {
                $this->response['errors']['login'] = array(
                    'field' => 'login',
                    'message' => 'Неправильный формат логина.Минимум 6 символов.Должно содержать только латинские буквы.'
                );
            }
        }
    }

    public function validateName($name)
    {
        if (empty($name)) {
            $this->response['errors']['name'] = array(
                'field' => 'name',
                'message' => 'Пожалуйста, введите имя пользователя.'
            );
        } else {
            $pattern = '/^[a-zA-Z]{2,30}$/u'; // Регулярное выражение для проверки имени

            if (!preg_match($pattern, $name)) {
                $this->response['errors']['name'] = array(
                    'field' => 'name',
                    'message' => 'Неправильный формат имени.Минимум 2 символа только буквы.Должно содержать только латинские буквы.'
                );
            }
        }
    }

    public function validatePassword($password)
    {
        if (empty($password)) {
            $this->response['errors']['password'] = array(
                'field' => 'password',
                'message' => 'Пожалуйста, введите пароль'
            );
        } else {
            $pattern = '/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{6,30}$/u'; // Регулярное выражение для проверки имени

            if (!preg_match($pattern, $password)) {
                $this->response['errors']['password'] = array(
                    'field' => 'password',
                    'message' => 'Неправильный формат пароля.Минимум 6 символов.Бууквы и цифры.Должно содержать только латинские буквы. '
                );
            }
        }
    }

    public function validateRepeatPassword($repeatPassword, $password)
    {
        if (empty($repeatPassword)) {
            $this->response['errors']['repeatPassword'] = array(
                'field' => 'repeatPassword',
                'message' => 'Пожалуйста, повторите пароль'
            );
        } elseif ($repeatPassword !== $password) { {
                $this->response['errors']['repeatPassword'] = array(
                    'field' => 'repeatPassword',
                    'message' => 'Пароли не совпадают'
                );
            }
        }
    }

    public function validateEmail($email)
    {
        if (empty($email)) {
            $this->response['errors']['email'] = array(
                'field' => 'email',
                'message' => 'Email является обязательным полем.'
            );
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->response['errors']['email'] = array(
                'field' => 'email',
                'message' => 'Пожалуйста, введите корректный адрес электронной почты.'
            );
        }
    }

    public function getResponse()
    {
        return $this->response;
    }
}
