<?php

namespace models;

use models\UniqueChecker;
use helpers\PasswordHasher;

class RegistrModel extends \vendor\JsonDb
{
    private $passwordHasher;
    private $uniqueChecker;


    public function __construct($fileName)
    {
        parent::__construct($fileName);
        $this->passwordHasher = new PasswordHasher();
        $this->uniqueChecker = new UniqueChecker($fileName);
    }


    public function insert($item)
    {
        if (!$this->fileExists()) {
            $this->createFile();
        }
        $login = $item['login'];
        $email = $item['email'];
        $password = $item['password'];

        if ($this->uniqueChecker->isLoginUnique($login) && $this->uniqueChecker->isEmailUnique($email)) {
            $hashedPassword = $this->passwordHasher->hashPassword($password);
            $item['password'] = $hashedPassword['hashedPassword'];
            $item['salt'] = $hashedPassword['salt'];
            parent::insert($item);
        } else {
            return;
        }
    }

    public function getErrors()
    {
        return $this->uniqueChecker->getResponse();
    }
    
    private function fileExists()
    {
        return file_exists($this->fileName);
    }

    private function createFile()
    {
        file_put_contents($this->fileName, '[]');
    }
}
