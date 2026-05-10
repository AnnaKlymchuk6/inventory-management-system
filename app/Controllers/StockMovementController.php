<?php

require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Models/StockMovement.php';
require_once __DIR__ . '/../Services/StockService.php';
require_once __DIR__ . '/../Helpers/Auth.php';
require_once __DIR__ . '/../Services/ActivityLogger.php';

class StockMovementController extends Controller
{
    private Product $productModel;
    private StockMovement $movementModel;
    private StockService $stockService;

    public function __construct()
    {
        Auth::requireLogin();

        $this->productModel = new Product();
        $this->movementModel = new StockMovement();
        $this->stockService = new StockService();
    }

    public function create(): void
    {
        if (Auth::isEmployee()) {
            header('Location: /inventory-management-system/public/products');
            return;
        }

        $productId = (int) $_GET['product_id'];

        $product = $this->productModel->getById($productId);

        $this->view('stock/create', [
            'product' => $product
        ]);
    }

    public function store(): void
    {
        if (Auth::isEmployee()) {
            header('Location: /inventory-management-system/public/products');
            return;
        }

        $productId = (int) $_POST['product_id'];
        $type = $_POST['type'];
        $quantity = (int) $_POST['quantity'];
        $note = trim($_POST['note']);

        $user = Auth::user();

        $product = $this->productModel->getById($productId);

        if (!$product) {

            header('Location: /inventory-management-system/public/products');
            return;
        }

        if ($quantity <= 0) {

            $this->view('stock/create', [
                'product' => $product,
                'error' => 'Кількість повинна бути більшою за 0'
            ]);

            return;
        }

        if ($type === 'in') {

            $this->stockService->addStock(
                $productId,
                $user['id'],
                $quantity,
                $note
            );

        } elseif ($type === 'out') {

            $success = $this->stockService->removeStock(
                $productId,
                $user['id'],
                $quantity,
                $note
            );

            if (!$success) {

                $this->view('stock/create', [
                    'product' => $product,
                    'error' => 'Недостатньо товару на складі'
                ]);

                return;
            }

        } else {

            $this->view('stock/create', [
                'product' => $product,
                'error' => 'Невірний тип операції'
            ]);

            return;
        }

        $logger = new ActivityLogger();

        $logger->log(
            'Виконав рух товару: ' .
            $product['name'] .
            ' (' . $type . ')'
        );

        header('Location: /inventory-management-system/public/stock/history?product_id=' . $productId);
    }

    public function history(): void
    {
        $productId = (int) $_GET['product_id'];

        $product = $this->productModel->getById($productId);

        $movements = $this->movementModel->getByProduct($productId);

        $this->view('stock/history', [
            'product' => $product,
            'movements' => $movements
        ]);
    }
    public function allHistory(): void
    {
        $movements = $this->movementModel->getAll();

        $this->view('stock/all-history', [
            'movements' => $movements
        ]);
    }
}