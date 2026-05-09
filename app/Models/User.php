<?php

require_once __DIR__ . '/../../core/Model.php';

class User extends Model
{
    public function findByEmail(string $email): ?array
    {
        $query = "SELECT * FROM users WHERE email = :email";

        $statement = $this->db->prepare($query);

        $statement->execute([
            ':email' => $email
        ]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }
}