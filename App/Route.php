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

		$routes['menu'] = array(
			'route' => '/menu',
			'controller' => 'viewController',
			'action' => 'menu'
		);

		$routes['register'] = array(
			'route' => '/register',
			'controller' => 'viewController',
			'action' => 'register'
		);

		$routes['nps'] = array(
			'route' => '/nps',
			'controller' => 'npsController',
			'action' => 'index'
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

		$routes['nps-dia'] = array(
			'route' => '/nps-dia',
			'controller' => 'npsController',
			'action' => 'showDia'
		);

		$routes['nps-mes'] = array(
			'route' => '/nps-mes',
			'controller' => 'npsController',
			'action' => 'showNpsMes'
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

		$this->setRoutes($routes);
	}

}

?>