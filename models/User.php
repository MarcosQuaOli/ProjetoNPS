<?php

namespace App\Models;

class User {
    private $id;
    private $email;
    private $senha;

    public function __get($params) {
        return $this->$params;
    }

    public function __set($params, $value) {
        $this->$params = $value;
    }    
}

?>