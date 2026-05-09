<h2>Головна панель</h2>

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

<h2>Останні товари</h2>

<?php if (empty($latestProducts)): ?>
    <p>Товарів поки немає.</p>
<?php endif; ?>

<?php foreach ($latestProducts as $product): ?>

    <div class="product-card">
        <h3><?= htmlspecialchars($product['name']) ?></h3>

        <p>Кількість:<?= $product['quantity'] ?></p>

        <p>Ціна:<?= $product['price'] ?> грн</p>
    </div>

<?php endforeach; ?>