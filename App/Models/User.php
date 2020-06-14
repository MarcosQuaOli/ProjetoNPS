<?php

namespace App\Models;

class User {

    private $id;
    private $username;
    private $senha;
    private $permissao;
    private $created_at;
    
    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}

?>