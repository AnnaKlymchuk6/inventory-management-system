<h1>Вхід у систему</h1>

<?php if (!empty($error)): ?>
    <div class="error-message">
        <?= $error ?>
    </div>
<?php endif; ?>

<form action="/inventory-management-system/public/login" method="POST">
    <div>
        <label>Email</label><br>

        <input type="email" name="email" required>
    </div>
    <br>

    <div>
        <label>Пароль</label><br>
        <input type="password" name="password" required>
    </div>
    <br>

    <button type="submit">Увійти</button>
</form>