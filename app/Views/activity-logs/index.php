<h1 class="page-title">Історія дій</h1>

<div class="table-wrapper">

    <table class="products-table">
        <thead>
        <tr>
            <th>Користувач</th>
            <th>Дія</th>
            <th>Дата</th>
        </tr>
        </thead>

        <tbody>

        <?php foreach ($logs as $log): ?>

            <tr>
                <td><?= htmlspecialchars($log['user_name']) ?></td>

                <td><?= htmlspecialchars($log['action']) ?></td>

                <td><?= $log['created_at'] ?></td>
            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>
</div>