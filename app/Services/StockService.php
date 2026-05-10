<?php

require_once __DIR__ . '/../Models/Product.php';
require_once __DIR__ . '/../Models/StockMovement.php';
require_once __DIR__ . '/../Factories/MovementFactory.php';

class StockService
{
    private Product $productModel;
    private StockMovement $movementModel;

    public function __construct()
    {
        $this->productModel = new Product();
        $this->movementModel = new StockMovement();
    }

    public function moveStock(
        int $productId,
        int $userId,
        string $type,
        int $quantity,
        string $note
    ): bool {

        $product = $this->productModel->getById($productId);

        $currentQuantity = (int) $product['quantity'];

        if ($type === 'out' && $currentQuantity < $quantity) {
            return false;
        }

        $newQuantity = $currentQuantity;

        if ($type === 'in') {
            $newQuantity += $quantity;
        }

        if ($type === 'out') {
            $newQuantity -= $quantity;
        }

        $this->productModel->updateQuantity(
            $productId,
            $newQuantity
        );

        $data = MovementFactory::create(
            $productId,
            $userId,
            $type,
            $quantity,
            $note
        );

        $this->movementModel->create($data);

        return true;
    }
}