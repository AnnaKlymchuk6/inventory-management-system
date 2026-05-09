<?php

require_once __DIR__ . '/../../core/Model.php';

class Product extends Model
{
    public function getAll(): array
    {
        $query = "SELECT products.*, categories.name AS category_name
        FROM products LEFT JOIN categories ON products.category_id = categories.id
        ORDER BY products.id DESC";

        $statement = $this->db->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $query = "INSERT INTO products (name, quantity, price, category_id) VALUES (:name, :quantity, :price, :category_id)";
        $statement = $this->db->prepare($query);

        return $statement->execute([
            ':name' => $data['name'],
            ':quantity' => $data['quantity'],
            ':price' => $data['price'],
            ':category_id' => $data['category_id']
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

    public function getById(int $id): array|false
    {
        $query = "SELECT * FROM products WHERE id = :id";
        $statement = $this->db->prepare($query);

        $statement->execute([
            ':id' => $id
        ]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function update(int $id, array $data): bool
    {
        $query = "UPDATE products SET name = :name, quantity = :quantity, price = :price WHERE id = :id";
        $statement = $this->db->prepare($query);

        return $statement->execute([
            ':id' => $id,
            ':name' => $data['name'],
            ':quantity' => $data['quantity'],
            ':price' => $data['price']
        ]);
    }

    public function search(string $keyword): array
    {
        $query = "SELECT * FROM products WHERE name LIKE :keyword ORDER BY id DESC";
        $statement = $this->db->prepare($query);

        $statement->execute([
            ':keyword' => '%' . $keyword . '%'
        ]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getStatistics(): array
    {
        $query = "SELECT COUNT(*) as total_products, SUM(quantity) as total_quantity,
       SUM(quantity * price) as total_value FROM products";

        $statement = $this->db->query($query);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getLatestProducts(): array
    {
        $query = "SELECT * FROM products ORDER BY id DESC LIMIT 5";

        $statement = $this->db->query($query);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}