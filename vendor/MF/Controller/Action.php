<?php

namespace MF\Controller;

abstract class Action {

	protected $view;
	protected $data;

	public function __construct() {
		$this->view = new \stdClass();
		$this->data = new \DateTime('now', new \DateTimeZone('America/Sao_Paulo'));
	}

	protected function render($view, $layout = 'main') {
		$this->view->page = $view;

		if(file_exists("App/Views/layouts/".$layout.".phtml")) {
			require_once "App/Views/layouts/".$layout.".phtml";
		} else {
			$this->content();
		}
	}

	protected function content() {
		$classAtual = get_class($this);

		$classAtual = str_replace('App\\Controllers\\', '', $classAtual);

		$classAtual = strtolower(str_replace('Controller', '', $classAtual));

		require_once "App/Views/".$classAtual."/".$this->view->page.".phtml";
	}
}

?>