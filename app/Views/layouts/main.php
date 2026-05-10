<?php

require_once __DIR__ . '/../../Helpers/Auth.php';

$user = Auth::user();

?>

<!DOCTYPE html>
<html lang="uk">

<head>

    <meta charset="UTF-8">

    <title>
        <?= $title ?? 'Warehouse Inventory System' ?>
    </title>

    <link rel="stylesheet" href="/inventory-management-system/public/css/style.css">

</head>
<body>

<header class="header">

    <div class="header-top">

        <div>
            <h1 class="system-title">Warehouse Inventory System</h1>

            <p class="system-subtitle">Система обліку товарів на складі</p>
        </div>

        <?php if ($user): ?>

            <div class="user-panel">

                <span class="role-badge role-<?= htmlspecialchars($user['role']) ?>">
                    <?= htmlspecialchars($user['role']) ?>
                </span>

                <a class="logout-btn" href="/inventory-management-system/public/logout">Вийти</a>

            </div>

        <?php endif; ?>

    </div>

    <nav class="navbar">
        <a class="nav-link" href="/inventory-management-system/public/">
            Dashboard
        </a>

        <a class="nav-link" href="/inventory-management-system/public/products">
            Товари
        </a>

        <a href="/inventory-management-system/public/stock/history-all">
            Рух товарів
        </a>

        <a class="nav-link" href="/inventory-management-system/public/products/low-stock">
            Низький запас
        </a>

        <a href="/inventory-management-system/public/activity-logs">
            Історія дій
        </a>
    </nav>

</header>

<main class="container">
    <?php require $viewPath; ?>
</main>

<footer class="footer">

    <p>Warehouse Inventory System</p>

</footer>

</body>
</html>