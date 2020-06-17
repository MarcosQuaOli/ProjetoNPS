<?php

namespace App\Controllers;

use MF\Controller\Action;
use App\DAO\UserDAO;
use App\Models\User;

class UserController extends Action {

	public function validate() {

		$date = new \DateTime('now');

		$dataFormated = $date->format('Y-m-d');

		echo $dataFormated;

		$userDAO = new UserDAO();

		$user = $userDAO->show($_POST['username'], md5($_POST['senha']));

		if(count($user) > 0) {

			$_SESSION['autenticado'] = true;
			$_SESSION['usuario'] = $_POST['username'];
			$_SESSION['permissao'] = $user[0]->permissao;

			if($user[0]->permissao == 'adm') {
				header("Location: /nps-dia?data=".$dataFormated);	
			} else if($user[0]->permissao == 'usuario') {

				header('Location: /nota');				
			}

		} else {

			header('Location: /?erro=1');
		}
	}

	public function store() {

		if($_POST['senha'] == $_POST['confirma']) {

			$userDAO = new UserDAO();
			$user = new User();
			
			$user->__set('username', $_POST['username']);
			$user->__set('senha', md5($_POST['senha']));
			
			$userDAO->insert($user);
			
			header('Location: /register?sucesso=1');				

		} else {
			
			header('Location: /register?erro=1&username=' . $_POST['username']);
		}
		
	}

	public function logout() {
		session_unset();
		session_destroy();
        header('Location: /');
	}

}


?>