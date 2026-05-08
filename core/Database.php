<?php
class Database
{
    private static ?PDO $connection = null;

    public static function connect(): PDO
    {
        if (self::$connection === null) {

            $config = require __DIR__ . '/../config/database.php';

            self::$connection = new PDO(
                "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8",
                $config['username'],
                $config['password']
            );

            self::$connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }

        return self::$connection;

    private static ?PDO $instance = null;

    public static function connect(): PDO
    {
        if (self::$instance === null) {

            $config = require __DIR__ . '/../config/database.php';

            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";

            self::$instance = new PDO(
                $dsn,
                $config['username'],
                $config['password']
            );

            self::$instance->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }

        return self::$instance;
    }
}