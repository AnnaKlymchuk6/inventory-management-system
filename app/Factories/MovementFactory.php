<?php

class MovementFactory
{
    public static function create(
        int $productId,
        int $userId,
        string $type,
        int $quantity,
        string $note
    ): array {

        return [
            'product_id' => $productId,
            'user_id' => $userId,
            'type' => $type,
            'quantity' => $quantity,
            'note' => $note
        ];
    }
}