<?php

namespace application\models;

use application\core\Model;

class Main extends Model{

    public function getNames(){
        $result = $this->db->row('SELECT login, email FROM users');
        return $result;
    } 
}