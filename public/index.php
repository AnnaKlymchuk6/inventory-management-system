<?php

require_once '../core/Database.php';
require_once '../core/Router.php';

require_once '../app/Controllers/HomeController.php';
require_once '../app/Controllers/ProductController.php';

$router = new Router();

$router->add('/', function () {
    $controller = new HomeController();
    $controller->index();
});

$router->add('/products', function () {
    $controller = new ProductController();
    $controller->index();
});

$router->add('/products/create', function () {
    $controller = new ProductController();
    $controller->create();
});

$router->add('/products/store', function () {
    $controller = new ProductController();
    $controller->store();
});

$router->add('/products/delete', function () {
    $controller = new ProductController();
    $controller->delete();
});

$router->add('/products/edit', function () {
    $controller = new ProductController();
    $controller->edit();
});

$router->add('/products/update', function () {
    $controller = new ProductController();
    $controller->update();
});

$router->add('/products/low-stock', function () {
    $controller = new ProductController();
    $controller->lowStock();
});

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = '/inventory-management-system/public';

$uri = str_replace($basePath, '', $uri);

if ($uri === '') {
    $uri = '/';
}

$router->dispatch($uri);