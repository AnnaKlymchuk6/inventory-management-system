<?php

require_once __DIR__ . '/../../core/Model.php';

class Category extends Model
{
    public function getAll(): array
    {
        $query = "SELECT * FROM categories ORDER BY name";

        $statement = $this->db->query($query);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}