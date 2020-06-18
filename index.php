<?php

	require_once "vendor/autoload.php";	
	
	if(session_status() !== PHP_SESSION_ACTIVE) {
		ini_set('session.gc_maxlifetime', 57600); 
		ini_set('session.cookie_lifetime', 57600);
		ini_set('session.cache_expire', 57600);	
		session_start();
	}

	$route = new \App\Route;	

?>