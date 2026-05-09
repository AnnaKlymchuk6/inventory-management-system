<h1>Додати товар</h1>
<?php if (!empty($errors)): ?>
    <div>
        <?php foreach ($errors as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
    <hr>
<?php endif; ?>
<form action="/inventory-management-system/public/products/store" method="POST">
    <div>
        <label>Назва товару</label><br>
        <input type="text" name="name" required>
    </div><br>
    <div>
        <label>Кількість</label><br>
        <input type="number" name="quantity" required>
    </div><br>

    <div>
        <label>Ціна</label><br>
        <input type="number" step="0.01" name="price" required>
    </div><br>

    <div>
        <label>Категорія</label><br><br>

        <select name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div><br>

    <button type="submit">Зберегти</button>
</form>