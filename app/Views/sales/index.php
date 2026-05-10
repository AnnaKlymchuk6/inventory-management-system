<h1 class="page-title">Продажі</h1>

<a class="add-btn"
   href="/inventory-management-system/public/sales/create">
    Оформити продаж
</a>

<div class="table-wrapper">

    <table class="products-table">

        <thead>
        <tr>
            <th>Товар</th>
            <th>Кількість</th>
            <th>Сума</th>
            <th>Працівник</th>
            <th>Дата</th>
        </tr>
        </thead>

        <tbody>

        <?php foreach ($sales as $sale): ?>

            <tr>

                <td><?= htmlspecialchars($sale['product_name']) ?></td>

                <td><?= $sale['quantity'] ?></td>

                <td>
                    <?= number_format($sale['total_price'], 2) ?> грн
                </td>

                <td><?= htmlspecialchars($sale['user_name']) ?></td>

                <td><?= $sale['created_at'] ?></td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>