<h2 class="page-title">
    Панель управління складом
</h2>
<div class="dashboard">

    <div class="card">
        <h3>Товарів</h3>
        <p><?= $statistics['total_products'] ?? 0 ?></p>
    </div>

    <div class="card">
        <h3>Одиниць товару</h3>
        <p><?= $statistics['total_quantity'] ?? 0 ?></p>
    </div>

    <div class="card">
        <h3>Загальна вартість</h3>
        <p><?= number_format($statistics['total_value'] ?? 0, 2) ?> грн</p>
    </div>
</div>

<h2 class="section-title">
    Останні товари
</h2>

<div class="products-grid">

    <?php foreach ($latestProducts as $product): ?>

        <div class="product-card">

            <h3><?= htmlspecialchars($product['name']) ?></h3>

            <p>Кількість:
                <strong><?= $product['quantity'] ?></strong>
            </p>

            <p>Ціна:
                <strong><?= number_format($product['price'], 2) ?> грн</strong>
            </p>
        </div>

    <?php endforeach; ?>

</div>