<?php

require_once __DIR__ . '/../../core/Model.php';

class Product extends Model
{
    public function getAll(): array
    {
        $query = "SELECT * FROM products ORDER BY id DESC";
        $statement = $this->db->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $query = "INSERT INTO products (name, quantity, price) VALUES (:name, :quantity, :price)";
        $statement = $this->db->prepare($query);

        return $statement->execute([
            ':name' => $data['name'],
            ':quantity' => $data['quantity'],
            ':price' => $data['price']
        ]);
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM products WHERE id = :id";
        $statement = $this->db->prepare($query);

        return $statement->execute([
            ':id' => $id
        ]);
    }
}