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
        $driver = require 'application/config/driverDb.php';       
        $fileName = require 'application/config/json.php';
        if ($driver === 'JSON')
        {
            $this->json = new JsonDb($fileName);
        }else{
            $this->db = new Db;
        }
        $this->hasher = new PasswordHasher;
    }
}
