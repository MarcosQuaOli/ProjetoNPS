<?php

namespace App\Controllers;

use MF\Controller\Action;
use App\DAO\TextoDAO;
use App\Models\Texto;

class ViewController extends Action {

	public function login() {
		$this->view->erroLogin = false;

		$this->render('home');
	}

	public function nota() {

		$textoDAO = new TextoDAO();

		$result = $textoDAO->show();

		$this->view->texto = $result[0]->texto;

		$this->render('nota');
	}

	public function register() {

		$this->render('register');
	}

	public function agradecimento() {

		$this->render('agradecimento');
	}

	public function textoEdit() {
		$this->render('texto');
	}

}


?>