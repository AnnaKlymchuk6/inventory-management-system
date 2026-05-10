<h1 class="page-title">
    Історія руху товару
</h1>

<div class="form-card">

    <h2>
        <?= htmlspecialchars($product['name']) ?>
    </h2>

</div>

<div class="table-wrapper">

    <table class="products-table">

        <thead>

        <tr>
            <th>Тип</th>
            <th>Кількість</th>
            <th>Коментар</th>
            <th>Користувач</th>
            <th>Дата</th>
        </tr>

        </thead>

        <tbody>

        <?php foreach ($movements as $movement): ?>

            <tr>

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
                    <?= htmlspecialchars($movement['note']) ?>
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