<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Редагування товару</title>
</head>
<body>
<h1>Редагування товару</h1>
<?php if (!empty($errors)): ?>

    <div><?php foreach ($errors as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
    <hr>
<?php endif; ?>
<form action="/inventory-management-system/public/products/update" method="POST">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">

    <div>
        <label>Назва товару</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
    </div><br>

    <div>
        <label>Кількість</label><br>
        <input type="number" name="quantity" value="<?= $product['quantity'] ?>" required>
    </div><br>

    <div>
        <label>Ціна</label><br>
        <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required>
    </div><br>

    <button type="submit">
        Оновити
    </button>
</form>
</body>
</html>
