<?php

require_once __DIR__ . '/../../Helpers/Auth.php';

$user = Auth::user();

?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Система обліку товарів' ?></title>

    <link rel="stylesheet"
          href="/inventory-management-system/public/css/style.css">
</head>
<body>

<header class="header">
    <h1>Система обліку товарів на складі</h1>

    <nav>
        <a href="/inventory-management-system/public/">Головна</a>

        <a href="/inventory-management-system/public/products">Товари</a>

        <?php if ($user): ?>

            <span><?= htmlspecialchars($user['name']) ?>(<?= htmlspecialchars($user['role']) ?>)</span>

            <a href="/inventory-management-system/public/logout">Вийти</a>
        <?php else: ?>
            <a href="/inventory-management-system/public/login">Увійти</a>
        <?php endif; ?>

        <a href="/inventory-management-system/public/products/low-stock">Малий залишок</a>
    </nav>

</header>

<main class="container">
    <?php require $viewPath; ?>
</main>

<footer class="footer">
    <p>Warehouse Inventory Management System</p>
</footer>

</body>
</html>