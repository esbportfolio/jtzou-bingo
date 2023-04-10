<?php

declare(strict_types=1);

namespace App;

class Router {
	// Set an array to hold routes
	private array $routes;
	
	// Register a route, saving the request method,
	// route string, and action to take
	public function register(
		string $requestMethod,
		string $route,
		callable $action
	): self {
		$this->routes[$requestMethod][$route] = $action;
		return $this;
	}
	
	// Register a get route specifically
	public function get(
		string $route,
		callable $action	
	) : self {
		return $this->register('get', $route, $action);
	}
	
	// Resolve a route
	public function resolve(
		string $requestUri,
		string $requestMethod
	) {
		// Discard any query data
		$route = explode('?', $requestUri)[0];
		// Lookup the route by request method, and then route name
		$action = $this->routes[$requestMethod][$route] ?? null;
		
		// If the action doesn't exist, display 'Not Found'
		if (! $action ) {
			echo 'Not Found';
			return;
		}
		
		// Otherwise call the function
		return call_user_func($action);
	}
}