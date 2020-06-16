<?php

namespace App\DAO;

use App\DAO\Connection;
use App\Models\Texto;

class TextoDAO extends Connection {

    public function show() {

        $query = 'select texto from texts where id = 1';

        return $this->select($query);

    }

    public function update(Texto $texto) {

        $query = 'UPDATE texts SET texto = :texto where id = :id';

        return $this->query($query, array(
            'id' => $texto->__get('id'),
            'texto' => $texto->__get('texto')
        ));

    }

}


?>