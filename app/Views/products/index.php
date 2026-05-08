<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Товари</title>
</head>
<body>
<h1>Список товарів</h1>

<a href="/inventory-management-system/public/products/create">Додати товар</a>

<hr>

<?php if (empty($products)): ?>
    <p>Товарів поки немає.</p>
<?php endif; ?>

<?php foreach ($products as $product): ?>
    <div>
        <h3><?= htmlspecialchars($product['name']) ?></h3>

        <p>Кількість: <?= $product['quantity'] ?></p>
        <p>Ціна: <?= $product['price'] ?> грн</p>

        <form action="/inventory-management-system/public/products/delete" method="POST">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">
            <button type="submit">Видалити</button>

            <a href="/inventory-management-system/public/products/edit?id=<?= $product['id'] ?>">Редагувати</a>
        </form>
    </div>
    <hr>
<?php endforeach; ?>

</body>
</html>
