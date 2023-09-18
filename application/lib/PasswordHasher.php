<?php

namespace application\lib;

class PasswordHasher
{
    const SALT = '7747631478fcd374bdbe3137eb66d65';

    

    public function hashPassword($password)
    {
        $saltedPassword = self::SALT . $password;
        $hashedPassword = md5($saltedPassword);
        return  $hashedPassword;
    }

    public function verifyPassword($password, $dataPassword)
    {
        
        $saltedPassword = self::SALT . $password;
        $hashedInput = md5($saltedPassword);
        PR(self::SALT);
        PR($hashedInput); PR($dataPassword);

        return $hashedInput === $dataPassword;
    }
}
