<?php

require_once '../core/Database.php';
require_once '../core/Router.php';

require_once '../app/Controllers/HomeController.php';

$router = new Router();

$router->add('/', function () {

    $controller = new HomeController();

    $controller->index();
});

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = '/inventory-management-system/public';

$uri = str_replace($basePath, '', $uri);

if ($uri === '') {
    $uri = '/';
}

$router->dispatch($uri);