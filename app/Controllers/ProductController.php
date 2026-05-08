<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/Product.php';

class ProductController extends Controller
{
    private Product $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index(): void
    {
        $products = $this->productModel->getAll();
        $this->view('products/index', ['products' => $products]);
    }

    public function create(): void
    {
        $this->view('products/create');
    }

    public function store(): void
    {
        $this->productModel->create($_POST);
        header('Location: /inventory-management-system/public/products');
    }

    public function delete(): void
    {
        $id = (int) $_POST['id'];
        $this->productModel->delete($id);
        header('Location: /inventory-management-system/public/products');
    }

    public function edit(): void
    {
        $id = (int) $_GET['id'];
        $product = $this->productModel->getById($id);

        $this->view('products/edit', [
            'product' => $product
        ]);
    }

    public function update(): void
    {
        $id = (int) $_POST['id'];
        $this->productModel->update($id, $_POST);
        header('Location: /inventory-management-system/public/products');
    }
}