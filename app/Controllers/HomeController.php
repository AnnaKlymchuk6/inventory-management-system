<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/Product.php';

class HomeController extends Controller
{
    private Product $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index(): void
    {
        Auth::requireLogin();

        $statistics = $this->productModel->getStatistics();

        $latestProducts = $this->productModel->getLatestProducts();

        $this->view('home', [
            'statistics' => $statistics,
            'latestProducts' => $latestProducts
        ]);
    }
}