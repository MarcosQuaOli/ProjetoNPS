<?php

namespace App\Models;

class Texto {

    private $id;
    private $texto;
    private $created_at;
    
    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}

?>