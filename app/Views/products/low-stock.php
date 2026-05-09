<h1>Товари з малим залишком</h1>

<?php if (empty($products)): ?>
    <p>Усі товари в достатній кількості.</p>
<?php endif; ?>

<?php foreach ($products as $product): ?>
    <div class="low-stock-card">
        <h3><?= htmlspecialchars($product['name']) ?></h3>

        <p>Залишилось:<?= $product['quantity'] ?></p>
    </div>

<?php endforeach; ?>