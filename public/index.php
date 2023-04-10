<?php

//NOTE: REMOVE SITE_PREFIX BEFORE PRODUCTION
// This is a workaround due to working on several XAMPP sites

// Require strict typing
declare(strict_types=1);

// Load autoloader from Composer
require_once '../vendor/autoload.php';
// Load Config
require_once '../config/config.php';

// Router
$router = new App\Router();
$router->get(
	SITE_PREFIX . '/',
	function() {
		echo 'test';
	}
);

echo '<pre>';
$router->resolve(
	$_SERVER['REQUEST_URI'],
	strtolower($_SERVER['REQUEST_METHOD']));
echo '</pre>';