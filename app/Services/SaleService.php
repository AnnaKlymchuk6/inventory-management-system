<?php

require_once __DIR__ . '/../Models/Sale.php';
require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Models/StockMovement.php';
require_once __DIR__ . '/ActivityLogger.php';
require_once __DIR__ . '/../Helpers/Auth.php';

class SaleService
{
    private Sale $saleModel;
    private Product $productModel;
    private StockMovement $movementModel;
    private ActivityLogger $logger;

    public function __construct()
    {
        $this->saleModel = new Sale();
        $this->productModel = new Product();
        $this->movementModel = new StockMovement();
        $this->logger = new ActivityLogger();
    }

    public function processSale(int $productId, int $quantity, string $note, array $user): array
    {
        $product = $this->productModel->getById($productId);

        if (!$product) {
            return ['success' => false, 'error' => 'Product not found', 'redirect' => true];
        }

        if ($quantity <= 0) {
            return ['success' => false, 'error' => 'Кількість повинна бути більше нуля'];
        }

        if ($quantity > $product['quantity']) {
            return ['success' => false, 'error' => 'Недостатньо товару на складі'];
        }

        $newQuantity = $product['quantity'] - $quantity;
        $this->productModel->updateQuantity($productId, $newQuantity);

        $totalPrice = $product['price'] * $quantity;
        $this->saleModel->create([
            'product_id' => $productId,
            'user_id' => $user['id'],
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'note' => $note
        ]);

        $this->movementModel->create([
            'product_id' => $productId,
            'user_id' => $user['id'],
            'type' => 'out',
            'quantity' => $quantity,
            'note' => 'Продаж товару'
        ]);

        $this->logger->log(
            'Продав товар "' . $product['name'] . '" (Кількість: ' . $quantity . ')'
        );

        return ['success' => true];
    }
}