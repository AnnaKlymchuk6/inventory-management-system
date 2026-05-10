<div class="login-container">

    <div class="login-card">

        <h1>Вхід у систему</h1>

        <p class="login-subtitle">Warehouse Inventory Management System</p>

        <?php if (!empty($error)): ?>

            <div class="error-message"><?= $error ?></div>
        <?php endif; ?>

        <form action="/inventory-management-system/public/login" method="POST">

            <div>
                <label>Email</label><br>
                <input type="email" name="email" required>
            </div>

            <div>
                <label>Пароль</label><br>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Увійти</button>
        </form>
    </div>

</div>