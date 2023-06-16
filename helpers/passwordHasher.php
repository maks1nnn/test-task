<?php

namespace helpers;

class PasswordHasher
{
    public function generateSalt()
    {
        return bin2hex(random_bytes(16));
    }

    public function hashPassword($password)
    {
        $salt = $this->generateSalt();
        $saltedPassword = $salt . $password;
        $hashedPassword = md5($saltedPassword);
        return [
            'salt' => $salt,
            'hashedPassword' => $hashedPassword
        ];
    }

    public function verifyPassword($password, $hashedPassword, $salt)
    {
        $saltPassword = $salt . $password;
        $hashedInput = md5($saltPassword);
        return $hashedInput === $hashedPassword;
    }

}



    
