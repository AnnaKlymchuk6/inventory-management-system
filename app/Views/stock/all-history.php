<h1 class="page-title">
    Історія руху товарів
</h1>

<div class="table-wrapper">

    <table class="products-table">

        <thead>

        <tr>
            <th>Товар</th>
            <th>Тип</th>
            <th>Кількість</th>
            <th>Користувач</th>
            <th>Дата</th>
        </tr>

        </thead>

        <tbody>

        <?php foreach ($movements as $movement): ?>

            <tr>

                <td>
                    <?= htmlspecialchars($movement['product_name']) ?>
                </td>

                <td>

                    <?php if ($movement['type'] === 'in'): ?>

                        <span class="badge success-badge">
                            Надходження
                        </span>

                    <?php else: ?>

                        <span class="badge danger-badge">
                            Списання
                        </span>

                    <?php endif; ?>

                </td>

                <td>
                    <?= $movement['quantity'] ?>
                </td>

                <td>
                    <?= htmlspecialchars($movement['user_name']) ?>
                </td>

                <td>
                    <?= $movement['created_at'] ?>
                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>