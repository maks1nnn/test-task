<?php

namespace application\core;

use application\lib\Db;
use application\lib\JsonDb;
use application\lib\PasswordHasher;

abstract class Model
{
    public $json;
    public $db;
    public $hasher;

    public function __construct()
    {
        $fileName = require 'application/config/json.php';
        $this->db = new Db;
        $this->json = new JsonDb($fileName);
        $this->hasher = new PasswordHasher;
    }
}
