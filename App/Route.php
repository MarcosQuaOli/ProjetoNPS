<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'viewController',
			'action' => 'login'
		);

		$routes['nota'] = array(
			'route' => '/nota',
			'controller' => 'viewController',
			'action' => 'nota'
		);

		$routes['agradecimento'] = array(
			'route' => '/agradecimento',
			'controller' => 'viewController',
			'action' => 'agradecimento'
		);

		$routes['register'] = array(
			'route' => '/register',
			'controller' => 'viewController',
			'action' => 'register'
		);

		$routes['nps-dia'] = array(
			'route' => '/nps-dia',
			'controller' => 'npsController',
			'action' => 'showDia'
		);

		$routes['nps-mes'] = array(
			'route' => '/nps-mes',
			'controller' => 'npsController',
			'action' => 'showMes'
		);

		$routes['nps-ano'] = array(
			'route' => '/nps-ano',
			'controller' => 'npsController',
			'action' => 'showAno'
		);

		$routes['nps-create'] = array(
			'route' => '/nps-create',
			'controller' => 'npsController',
			'action' => 'store'
		);

		$routes['nps-delete'] = array(
			'route' => '/nps-delete',
			'controller' => 'npsController',
			'action' => 'delete'
		);

		$routes['nps-show'] = array(
			'route' => '/nps-show',
			'controller' => 'npsController',
			'action' => 'show'
		);

		$routes['user'] = array(
			'route' => '/user',
			'controller' => 'userController',
			'action' => 'validate'
		);

		$routes['user-create'] = array(
			'route' => '/user-create',
			'controller' => 'userController',
			'action' => 'store'
		);

		$routes['logout'] = array(
			'route' => '/logout',
			'controller' => 'userController',
			'action' => 'logout'
		);

		$routes['texto-edit'] = array(
			'route' => '/texto-edit',
			'controller' => 'viewController',
			'action' => 'textoEdit'
		);

		$routes['texto-update'] = array(
			'route' => '/texto-update',
			'controller' => 'textController',
			'action' => 'update'
		);

		$this->setRoutes($routes);
	}

}

?>