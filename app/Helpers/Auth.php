<?php

class Auth
{
    public static function login(array $user): void
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'role' => $user['role']
        ];
    }

    public static function logout(): void
    {
        unset($_SESSION['user']);
    }

    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    public static function check(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function role(): ?string
    {
        return $_SESSION['user']['role'] ?? null;
    }

    public static function isAdmin(): bool
    {
        return self::role() === 'admin';
    }

    public static function isManager(): bool
    {
        return self::role() === 'manager';
    }

    public static function isEmployee(): bool
    {
        return self::role() === 'employee';
    }
}