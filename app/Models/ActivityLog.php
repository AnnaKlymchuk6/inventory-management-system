<?php

require_once __DIR__ . '/../../core/Model.php';

class ActivityLog extends Model
{
    public function create(string $userName, string $action): bool
    {
        $query = "INSERT INTO activity_logs (user_name, action) VALUES (:user_name, :action)";
        $statement = $this->db->prepare($query);

        return $statement->execute([
            ':user_name' => $userName,
            ':action' => $action
        ]);
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM activity_logs ORDER BY created_at DESC";
        $statement = $this->db->query($query);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}