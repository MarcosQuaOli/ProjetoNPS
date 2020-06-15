<?php

namespace App\Controllers;

use MF\Controller\Action;

class ViewController extends Action {

	public function login() {
		$this->view->erroLogin = false;

		$this->render('home');
	}

	public function nota() {

		$this->render('nota');
	}

	public function menu() {

		$this->render('menu');
	}

	public function register() {

		$this->render('register');
	}

	public function agradecimento() {

		$this->render('agradecimento');
	}

}


?>