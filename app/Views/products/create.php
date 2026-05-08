<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Додати товар</title>
</head>
<body>

<h1>Додати товар</h1>

<form action="/inventory-management-system/public/products/store" method="POST">
    <div>
        <label>Назва товару</label><br>
        <input type="text" name="name" required>
    </div><br>
    <div>
        <label>Кількість</label><br>
        <input type="number" name="quantity" required>
    </div><br>

    <div>
        <label>Ціна</label><br>
        <input type="number" step="0.01" name="price" required>
    </div><br>
    <button type="submit">Зберегти</button>
</form>
</body>
</html>