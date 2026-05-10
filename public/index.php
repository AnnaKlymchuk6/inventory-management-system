<?php
session_start();
require_once '../core/Database.php';
require_once '../core/Router.php';

require_once '../app/Controllers/HomeController.php';
require_once '../app/Controllers/ProductController.php';
require_once '../app/Controllers/AuthController.php';

require_once '../app/Controllers/ActivityLogController.php';

require_once '../app/Controllers/StockMovementController.php';
require_once '../app/Controllers/SaleController.php';

$router = new Router();

require_once '../routes/web.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$basePath = '/inventory-management-system/public';

$uri = str_replace($basePath, '', $uri);

if ($uri === '') {
    $uri = '/';
}

$router->dispatch($uri);