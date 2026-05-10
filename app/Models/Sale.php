<?php

class Sale
{
    public function create(array $data): void
    {
        $db = Database::connect();

        $stmt = $db->prepare("
            INSERT INTO sales (
                product_id,
                user_id,
                quantity,
                total_price,
                note
            )
            VALUES (
                :product_id,
                :user_id,
                :quantity,
                :total_price,
                :note
            )
        ");

        $stmt->execute([
            'product_id' => $data['product_id'],
            'user_id' => $data['user_id'],
            'quantity' => $data['quantity'],
            'total_price' => $data['total_price'],
            'note' => $data['note']
        ]);
    }

    public function getAll(): array
    {
        $db = Database::connect();

        $stmt = $db->query("
            SELECT sales.*,
                   products.name AS product_name,
                   users.name AS user_name
            FROM sales
            JOIN products ON sales.product_id = products.id
            JOIN users ON sales.user_id = users.id
            ORDER BY sales.created_at DESC
        ");

        return $stmt->fetchAll();
    }
}