<?php

	require_once "vendor/autoload.php";
	
	if(session_status() !== PHP_SESSION_ACTIVE) {
		session_start();
	}

	$route = new \App\Route;	

?>