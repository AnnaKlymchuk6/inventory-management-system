<h1>Список товарів</h1>

<form method="GET">
    <input type="text" name="search" placeholder="Пошук товару" value="<?= htmlspecialchars($search ?? '') ?>">

    <button type="submit">Пошук</button>
</form>
<br>

<form method="GET">
    <label>Фільтр по категорії</label>

    <select name="category">
        <option value="">Усі товари</option>

        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"
                    <?= $selectedCategory == $category['id'] ? 'selected' : '' ?>><?= htmlspecialchars($category['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Фільтрувати</button>
</form>
<br>

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
        <p>Категорія:<?= htmlspecialchars($product['category_name']) ?></p>

        <form action="/inventory-management-system/public/products/delete" method="POST">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">

            <a href="/inventory-management-system/public/products/edit?id=<?= $product['id'] ?>">Редагувати</a>
            <button type="submit"
                    onclick="return confirm('Ви впевнені що хочете видалити товар?')">
                Видалити
            </button>
        </form>
    </div>
    <hr>
<?php endforeach; ?>

