<h1>Список товарів</h1>

<div class="filters">

    <div class="filters-wrapper">
        <form method="GET">
            <input type="text" name="search" placeholder="Пошук товару"
                   value="<?= htmlspecialchars($search ?? '') ?>">

            <button type="submit">Пошук</button>
        </form>

        <form method="GET">
            <select name="category">

                <option value="">Усі категорії</option>

                <?php foreach ($categories as $category): ?>

                    <option value="<?= $category['id'] ?>"
                            <?= $selectedCategory == $category['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category['name']) ?>
                    </option>

                <?php endforeach; ?>

            </select>

            <button type="submit">Фільтрувати</button>
        </form>
    </div>
</div>

<?php if (!Auth::isEmployee()): ?>

    <a class="add-btn" href="/inventory-management-system/public/products/create">Додати товар</a>

<?php endif; ?>

<div class="table-wrapper">

    <table class="products-table">
        <thead>
        <tr>
            <th>Назва</th>
            <th>Категорія</th>
            <th>Кількість</th>
            <th>Ціна</th>
            <?php if (!Auth::isEmployee()): ?>
                <th>Дії</th>
            <?php endif; ?>
        </tr>
        </thead>

        <tbody>

        <?php foreach ($products as $product): ?>

            <tr>
                <td><?= htmlspecialchars($product['name']) ?></td>

                <td><?= htmlspecialchars($product['category_name']) ?></td>

                <td class="<?= $product['quantity'] <= 5 ? 'low-stock' : '' ?>">
                    <?= $product['quantity'] ?>
                </td>

                <td><?= number_format($product['price'], 2) ?> грн</td>

                <td>
                    <div class="actions">
                        <?php if (!Auth::isEmployee()): ?>
                            <a class="edit-btn"
                               href="/inventory-management-system/public/products/edit?id=<?= $product['id'] ?>">
                                Редагувати
                            </a>
                        <?php endif; ?>

                        <?php if (Auth::isAdmin()): ?>

                            <form action="/inventory-management-system/public/products/delete" method="POST"
                                    onsubmit="return confirm('Видалити товар?')">
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">

                                <button class="delete-btn" type="submit">Видалити</button>
                            </form>

                        <?php endif; ?>

                    </div>

                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>

</div>