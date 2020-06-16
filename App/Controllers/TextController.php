<?php

namespace App\Controllers;

use MF\Controller\Action;
use App\DAO\TextoDAO;
use App\Models\Texto;

class TextController extends Action {

    public function update() {
        $textoDAO = new TextoDAO();
        $texto = new Texto();

        $texto->__set('id', 1);
        $texto->__set('texto', $_POST['texto']);

        $textoDAO->update($texto);

        header('Location: /texto-edit?sucesso=1');
    }
}

?>