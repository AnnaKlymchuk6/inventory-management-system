<h1 class="page-title">Рух товару</h1>

<div class="form-card">

    <h2><?= htmlspecialchars($product['name']) ?></h2>

    <?php if (!empty($error)): ?>

        <div class="error-message">
            <?= $error ?>
        </div>

    <?php endif; ?>

    <form action="/inventory-management-system/public/stock/store"
          method="POST">

        <input type="hidden"
               name="product_id"
               value="<?= $product['id'] ?>">

        <label>Тип операції</label>

        <select name="type">

            <option value="in">Надходження</option>

            <option value="out">Списання</option>

        </select>

        <label>Кількість</label>

        <input type="number"
               name="quantity"
               min="1"
               required>

        <label>Причина / Коментар</label>

        <textarea
                name="note"
                placeholder="Наприклад: пошкодження товару, нове постачання, повернення..."
        ></textarea>

        <button type="submit">
            Зберегти
        </button>

    </form>

</div>