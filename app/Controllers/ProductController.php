<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Models/Category.php';
require_once __DIR__ . '/../Helpers/Auth.php';
require_once __DIR__ . '/../Services/ProductValidator.php';
require_once __DIR__ . '/../Services/ActivityLogger.php';


class ProductController extends Controller
{
    private Product $productModel;
    private ProductValidator $validator;

    public function __construct()
    {
        Auth::requireLogin();

        $this->productModel = new Product();
        $this->validator = new ProductValidator();
    }

    public function index(): void
    {
        $categoryModel = new Category();

        $categories = $categoryModel->getAll();

        $search = $_GET['search'] ?? '';

        $selectedCategory = $_GET['category'] ?? null;

        if ($selectedCategory === '') {
            $selectedCategory = null;
        }

        if (!empty($search)) {
            $products = $this->productModel->search($search, $selectedCategory ? (int)$selectedCategory : null);
        } else {
            $products = $this->productModel->getAll(
                $selectedCategory ? (int)$selectedCategory : null
            );
        }

        $this->view('products/index', [
            'products' => $products,
            'search' => $search,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory
        ]);
    }

    public function create(): void
    {
        if (Auth::isEmployee()) {
            header('Location: /inventory-management-system/public/products');

            return;
        }
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();

        $this->view('products/create', [
            'categories' => $categories
        ]);
    }

    public function store(): void
    {
        if (Auth::isEmployee()) {
            header('Location: /inventory-management-system/public/products');

            return;
        }

        $errors = $this->validator->validate($_POST);

        if (!empty($errors)) {
            $categoryModel = new Category();

            $categories = $categoryModel->getAll();

            $this->view('products/create', [
                'errors' => $errors,
                'categories' => $categories
            ]);

            return;
        }

        $this->productModel->create($_POST);

        $logger = new ActivityLogger();
        $logger->log(
            'Додав товар "' . $_POST['name'] . '"'
        );

        header('Location: /inventory-management-system/public/products');
    }

    public function delete(): void
    {
        if (!Auth::isAdmin()) {
            header('Location: /inventory-management-system/public/products');

            return;
        }
        $id = (int) $_POST['id'];
        $product = $this->productModel->getById($id);

        $this->productModel->delete($id);

        $logger = new ActivityLogger();
        $logger->log(
            'Видалив товар "' . $product['name'] . '"'
        );

        header('Location: /inventory-management-system/public/products');
    }

    public function edit(): void
    {
        if (Auth::isEmployee()) {
            header('Location: /inventory-management-system/public/products');

            return;
        }

        $id = (int) $_GET['id'];

        $product = $this->productModel->getById($id);

        $categoryModel = new Category();

        $categories = $categoryModel->getAll();

        $this->view('products/edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function update(): void
    {
        if (Auth::isEmployee()) {
            header('Location: /inventory-management-system/public/products');

            return;
        }

        $id = (int) $_POST['id'];

        $errors = $this->validator->validate($_POST);

        if (!empty($errors)) {
            $product = $this->productModel->getById($id);

            $categoryModel = new Category();

            $categories = $categoryModel->getAll();

            $this->view('products/edit', [
                'product' => $product,
                'categories' => $categories,
                'errors' => $errors
            ]);

            return;
        }

        $this->productModel->update($id, $_POST);

        $logger = new ActivityLogger();
        $logger->log(
            'Оновив товар "' . $_POST['name'] . '"'
        );

        header('Location: /inventory-management-system/public/products');
    }

    public function lowStock(): void
    {
        $products = $this->productModel->getLowStockProducts();

        $this->view('products/low-stock', [
            'products' => $products
        ]);
    }
}