<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Models/Category.php';
class ProductController extends Controller
{
    private Product $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    public function index(): void
    {
        $search = $_GET['search'] ?? '';

        if (!empty($search)) {
            $products = $this->productModel->search($search);
        } else {
            $products = $this->productModel->getAll();
        }

        $this->view('products/index', [
            'products' => $products,
            'search' => $search
        ]);
    }

    public function create(): void
    {
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();

        $this->view('products/create', [
            'categories' => $categories
        ]);
    }

    public function store(): void
    {
        $name = trim($_POST['name']);
        $quantity = (int) $_POST['quantity'];
        $price = (float) $_POST['price'];

        $errors = [];

        if ($name === '') {
            $errors[] = 'Назва товару обов’язкова.';
        }

        if ($quantity < 0) {
            $errors[] = 'Кількість не може бути від’ємною.';
        }

        if ($price < 0) {
            $errors[] = 'Ціна не може бути від’ємною.';
        }

        if (!empty($errors)) {

            $this->view('products/create', [
                'errors' => $errors
            ]);

            return;
        }

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

        $name = trim($_POST['name']);
        $quantity = (int) $_POST['quantity'];
        $price = (float) $_POST['price'];

        $errors = [];

        if ($name === '') {
            $errors[] = 'Назва товару обов’язкова.';
        }
        if ($quantity < 0) {
            $errors[] = 'Кількість не може бути від’ємною.';
        }
        if ($price < 0) {
            $errors[] = 'Ціна не може бути від’ємною.';
        }

        if (!empty($errors)) {
            $product = $this->productModel->getById($id);

            $this->view('products/edit', [
                'product' => $product,
                'errors' => $errors
            ]);
            return;
        }

        $this->productModel->update($id, $_POST);

        header('Location: /inventory-management-system/public/products');
    }
}