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