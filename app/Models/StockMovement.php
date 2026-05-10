<?php
require_once __DIR__ . '/../../core/Model.php';
class StockMovement
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function create(array $data): void
    {
        $sql = "
            INSERT INTO stock_movements
            (product_id, user_id, type, quantity, note)
            VALUES
            (:product_id, :user_id, :type, :quantity, :note)
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':product_id' => $data['product_id'],
            ':user_id' => $data['user_id'],
            ':type' => $data['type'],
            ':quantity' => $data['quantity'],
            ':note' => $data['note']
        ]);
    }

    public function getByProduct(int $productId): array
    {
        $sql = "
            SELECT
                stock_movements.*,
                users.name AS user_name
            FROM stock_movements
            JOIN users
                ON users.id = stock_movements.user_id
            WHERE product_id = :product_id
            ORDER BY created_at DESC
        ";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':product_id' => $productId
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll(): array
    {
        $sql = "
        SELECT
            stock_movements.*,
            products.name AS product_name,
            users.name AS user_name
        FROM stock_movements

        JOIN products
            ON products.id = stock_movements.product_id

        JOIN users
            ON users.id = stock_movements.user_id

        ORDER BY created_at DESC
    ";

        $stmt = $this->db->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}