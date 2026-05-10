<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/Sale.php';
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Helpers/Auth.php';
require_once __DIR__ . '/../Services/ActivityLogger.php';
require_once __DIR__ . '/../Models/StockMovement.php';

class SaleController extends Controller
{
    private Sale $saleModel;
    private Product $productModel;

    public function __construct()
    {
        Auth::requireLogin();

        $this->saleModel = new Sale();
        $this->productModel = new Product();
    }

    public function index(): void
    {
        $sales = $this->saleModel->getAll();

        $this->view('sales/index', [
            'sales' => $sales
        ]);
    }

    public function create(): void
    {
        $products = $this->productModel->getAll();

        $this->view('sales/create', [
            'products' => $products
        ]);
    }

    public function store(): void
    {
        $productId = (int) $_POST['product_id'];
        $quantity = (int) $_POST['quantity'];
        $note = trim($_POST['note']);

        $product = $this->productModel->getById($productId);

        if (!$product) {
            header('Location: /inventory-management-system/public/sales');
            return;
        }

        if ($quantity <= 0) {
            die('Кількість повинна бути більше нуля');
        }

        if ($quantity > $product['quantity']) {
            die('Недостатньо товару на складі');
        }

        $newQuantity = $product['quantity'] - $quantity;

        $this->productModel->updateQuantity(
            $productId,
            $newQuantity
        );

        $totalPrice = $product['price'] * $quantity;

        $this->saleModel->create([
            'product_id' => $productId,
            'user_id' => Auth::user()['id'],
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'note' => $note
        ]);

        $movementModel = new StockMovement();

        $movementModel->create([
            'product_id' => $productId,
            'user_id' => Auth::user()['id'],
            'type' => 'out',
            'quantity' => $quantity,
            'note' => 'Продаж товару'
        ]);

        $logger = new ActivityLogger();

        $logger->log(
            'Продав товар "' .
            $product['name'] .
            '" (' . $quantity . ' шт.)'
        );

        header('Location: /inventory-management-system/public/sales');
    }
}