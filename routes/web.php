<?php

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

$router->add('/login', function () {
    $controller = new AuthController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->login();
        return;
    }

    $controller->loginForm();
});

$router->add('/logout', function () {
    $controller = new AuthController();
    $controller->logout();
});

$router->add('/activity-logs', function () {
    $controller = new ActivityLogController();
    $controller->index();
});

$router->add('/stock/create', function () {
    $controller = new StockMovementController();
    $controller->create();
});

$router->add('/stock/store', function () {
    $controller = new StockMovementController();
    $controller->store();
});

$router->add('/stock/history', function () {
    $controller = new StockMovementController();
    $controller->history();
});

$router->add('/stock/history-all', function () {
    $controller = new StockMovementController();
    $controller->allHistory();
});

$router->add('/sales', function () {
    $controller = new SaleController();
    $controller->index();
});

$router->add('/sales/create', function () {
    $controller = new SaleController();
    $controller->create();
});

$router->add('/sales/store', function () {
    $controller = new SaleController();
    $controller->store();
});