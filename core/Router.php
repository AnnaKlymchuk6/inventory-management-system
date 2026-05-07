<?php

class Router
{
    private array $routes = [];

    public function add(string $route, callable $action): void
    {
        $this->routes[$route] = $action;
    }

    public function dispatch(string $uri): void
    {
        if (array_key_exists($uri, $this->routes)) {

            $this->routes[$uri]();

            return;
        }

        http_response_code(404);

        echo "404 - Page not found";
    }
}