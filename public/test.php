<?php
require_once '../core/Database.php';

try {

    $database = Database::connect();

    echo "Database connected successfully";

} catch (Exception $e) {

    echo $e->getMessage();
}