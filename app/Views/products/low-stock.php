<h1 class="page-title">
    Товари з низьким запасом
</h1>

<div class="products-grid">

    <?php foreach ($products as $product): ?>

        <div class="low-stock-card">
            <h3><?= htmlspecialchars($product['name']) ?></h3>

            <p>Залишилось:
                <strong><?= $product['quantity'] ?></strong>
            </p>
        </div>

    <?php endforeach; ?>

</div>