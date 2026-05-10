<h1 class="page-title">Оформлення продажу</h1>

<div class="form-card">

    <div class="info-box">
        <p>
            <strong>Оберіть товар</strong> та вкажіть кількість для продажу.
        </p>
        <p>
            Після оформлення продажу система автоматично зменшить
            залишок товару на складі.
        </p>
    </div>

    <?php if (!empty($error)): ?>

        <div class="error-message">
            <?= htmlspecialchars($error) ?>
        </div>

    <?php endif; ?>

    <form class="sale-form"
          action="/inventory-management-system/public/sales/store"
          method="POST">

        <label>Товар</label>

        <select name="product_id" required>

            <?php foreach ($products as $product): ?>

                <option value="<?= $product['id'] ?>"
                        data-price="<?= $product['price'] ?>"
                        data-quantity="<?= $product['quantity'] ?>">

                    <?= htmlspecialchars($product['name']) ?>
                    (<?= $product['quantity'] ?> шт.)

                </option>

            <?php endforeach; ?>

        </select>

        <div class="info-box" id="productInfo">
            <p>
                <strong>Ціна за одиницю:</strong>
                <span id="productPrice">0.00 грн</span>
            </p>

            <p>
                <strong>Доступно на складі:</strong>
                <span class="stock-count" id="productQuantity">0</span>
                шт.
            </p>
        </div>

        <label>Кількість</label>

        <input type="number"
               name="quantity"
               min="1"
               required>

        <div class="total-preview">
            <div class="total-preview-label">
                Загальна сума
            </div>

            <div class="total-preview-value" id="totalPrice">
                0.00 грн
            </div>
        </div>

        <div class="low-stock-warning"
             id="stockWarning"
             style="display: none;">
            Недостатньо товару на складі.
        </div>

        <label>Коментар</label>

        <textarea name="note"
                  rows="4"
                  placeholder="Наприклад: Продаж клієнту"></textarea>

        <button type="submit">
            Оформити продаж
        </button>

    </form>

</div>
