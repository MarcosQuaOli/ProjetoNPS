<?php

namespace App\Models;

class Nps {

    private $id;
    private $nota;
    private $usuario;
    private $created_at;

    
    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}

?>