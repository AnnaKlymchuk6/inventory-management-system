<?php

require_once '../core/Database.php';
require_once '../core/Router.php';

require_once '../app/Controllers/HomeController.php';
require_once '../app/Controllers/ProductController.php';

$router = new Router();

$router->add('/', 'HomeController@index');
$router->add('/products', 'ProductController@index');
$router->add('/products/create', 'ProductController@create');
$router->add('/products/store', 'ProductController@store');
$router->add('/products/delete', 'ProductController@delete');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = '/inventory-management-system/public';

$uri = str_replace($basePath, '', $uri);

if ($uri === '') {
    $uri = '/';
}

$router->dispatch($uri);
