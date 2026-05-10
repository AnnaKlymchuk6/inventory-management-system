<div class="form-card">
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
            <label>Назва товару</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Кількість</label>
            <input type="number" name="quantity" required>
        </div>

        <div>
            <label>Ціна</label>
            <input type="number" step="0.01" name="price" required>
        </div>

        <div>
            <label>Категорія</label>

            <select name="category_id">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Зберегти</button>
    </form>
</div>