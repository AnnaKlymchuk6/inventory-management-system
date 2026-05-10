# Inventory Management System

## Опис проєкту

Inventory Management System — це вебзастосунок для обліку товарів на складі.  
Проєкт був створений в рамках фінального проєкту з дисципліни «Конструювання програмного забезпечення».

Основна ідея системи — спростити роботу зі складом товарів та автоматизувати основні процеси:

- облік товарів;
- контроль залишків;
- продаж товарів;
- історію руху товарів;
- логування дій користувачів;
- авторизацію та ролі користувачів.

Проєкт реалізований з використанням MVC архітектури.

---

# Основний функціонал

## Авторизація та ролі

У системі реалізована авторизація користувачів.

Доступні ролі:

- Admin
- Manager
- Employee

Ролі мають різні права доступу до функціоналу системи.

### Можливості ролей

#### Admin

- додавання товарів;
- редагування товарів;
- видалення товарів;
- перегляд історії дій;
- перегляд руху товарів;
- оформлення продажів.

#### Manager

- додавання товарів;
- редагування товарів;
- перегляд руху товарів;
- оформлення продажів.

#### Employee

- перегляд товарів;
- перегляд dashboard;
- оформлення продажів.

### Основні файли

- [AuthController](./app/Controllers/AuthController.php)
- [Auth Helper](./app/Helpers/Auth.php)
- [Auth Views](./app/Views/auth/)

---

# Модуль товарів

Система дозволяє:

- переглядати список товарів;
- додавати товари;
- редагувати товари;
- видаляти товари;
- шукати товари;
- фільтрувати товари за категоріями;
- переглядати товари з низьким запасом.

Для товарів зберігаються:

- назва;
- категорія;
- кількість;
- ціна.

### Основні файли

- [ProductController](./app/Controllers/ProductController.php)
- [Product Model](./app/Models/Product.php)
- [ProductValidator](./app/Services/ProductValidator.php)
- [Products Views](./app/Views/products/)

---

# Категорії

У системі використовується система категорій товарів.

Категорії дозволяють:

- фільтрувати товари;
- організовувати склад;
- швидше знаходити потрібні товари.

### Основні файли

- [Category Model](./app/Models/Category.php)
- [Products View](./app/Views/products/index.php)

---

# Панель управління

На головній сторінці відображається dashboard зі статистикою складу.

Dashboard показує:

- кількість товарів;
- кількість одиниць товару;
- загальну вартість товарів;
- останні додані товари;
- товари з низьким запасом.

### Основні файли

- [HomeController](./app/Controllers/HomeController.php)
- [Home View](./app/Views/home.php)

---

# Sales System

У системі реалізований модуль продажів.

Користувач може:

- оформлювати продаж товару;
- вказувати кількість;
- додавати коментар;
- переглядати історію продажів.

Після продажу система автоматично:

- зменшує кількість товару на складі;
- створює запис у таблиці продажів;
- створює запис у історії руху товару;
- додає запис у activity log.

### Основні файли

- [SaleController](./app/Controllers/SaleController.php)
- [Sale Model](./app/Models/Sale.php)
- [Sales Views](./app/Views/sales/)

---

# Stock Movements

У системі реалізований модуль руху товарів.

Підтримуються операції:

- надходження товару;
- списання товару;
- перегляд історії руху товарів.

При кожній операції автоматично оновлюється кількість товару на складі.

Також користувач може додати коментар до операції.

### Основні файли

- [StockMovementController](./app/Controllers/StockMovementController.php)
- [StockMovement Model](./app/Models/StockMovement.php)
- [StockService](./app/Services/StockService.php)
- [MovementFactory](./app/Factories/MovementFactory.php)
- [Stock Views](./app/Views/stock/)

---

# Activity Log

Система автоматично зберігає історію дій користувачів.

Логуються:

- авторизація;
- вихід із системи;
- створення товарів;
- редагування товарів;
- видалення товарів;
- продажі;
- рух товарів.

### Основні файли

- [ActivityLogController](./app/Controllers/ActivityLogController.php)
- [ActivityLog Model](./app/Models/ActivityLog.php)
- [ActivityLogger](./app/Services/ActivityLogger.php)

---

# Використані технології

Проєкт створений з використанням:

- PHP
- MySQL
- HTML
- CSS
- JavaScript

---

# Структура проєкту

```text
inventory-management-system/
│
├── app/
│   ├── Controllers/
│   ├── Factories/
│   ├── Helpers/
│   ├── Models/
│   ├── Services/
│   └── Views/
│
├── config/
├── core/
├── public/
│   ├── css/
│   └── js/
│
├── routes/
├── README.md
└── warehouse_inventory_management_db.sql
```

---

# База даних

У проєкті використовується MySQL база даних.

Основні таблиці:

- users
- products
- categories
- sales
- stock_movements
- activity_logs

SQL файл бази даних:

```text
warehouse_inventory_management_db.sql
```

---

# Запуск проєкту локально

## 1. Клонувати репозиторій

```bash
git clone <repository-link>
```

---

## 2. Імпортувати базу даних

Імпортувати файл:

```text
warehouse_inventory_management_db.sql
```

у MySQL через phpMyAdmin.

---

## 3. Налаштувати підключення до БД

Файл:

```text
config/database.php
```

Необхідно вказати:

- host
- database name
- username
- password

---

## 4. Запустити локальний сервер

Проєкт можна запускати через:

- WAMP
- XAMPP
- Open Server

---

## 5. Відкрити проєкт у браузері

```text
http://localhost/inventory-management-system/public
```

---

# Test Accounts

## Admin

```text
Email: admin@gmail.com
Password: password
```

## Manager

```text
Email: manager@gmail.com
Password: password
```

## Employee

```text
Email: employee@gmail.com
Password: password
```

---

# Programming Principles

## 1. SRP (Single Responsibility Principle)

Кожен клас має одну основну відповідальність.

Приклади:

- [Product Model](./app/Models/Product.php) відповідає за роботу з товарами;
- [ActivityLogger](./app/Services/ActivityLogger.php) відповідає за логування;
- [ProductValidator](./app/Services/ProductValidator.php) відповідає за валідацію товарів.

---

## 2. DRY (Don't Repeat Yourself)

Повторювана логіка була винесена у helper та service класи.

Приклади:

- [Auth Helper](./app/Helpers/Auth.php)
- [StockService](./app/Services/StockService.php)
- [ProductValidator](./app/Services/ProductValidator.php)

---

## 3. Separation of Concerns

У проєкті використовується MVC архітектура.

- Controllers — обробка запитів;
- Models — робота з базою даних;
- Views — UI частина.

### Приклади

- [Controllers](./app/Controllers/)
- [Models](./app/Models/)
- [Views](./app/Views/)

---

## 4. KISS (Keep It Simple, Stupid)

Логіка програми реалізована максимально просто та зрозуміло.

Більшість методів виконують одну конкретну задачу.

---

## 5. OCP (Open/Closed Principle)

Структура проєкту дозволяє легко додавати новий функціонал.

Наприклад:

- нові модулі;
- нові ролі;
- нові типи операцій.

---

# Design Patterns

## 1. MVC (Model-View-Controller)

Основний архітектурний патерн проєкту.

Використовується для розділення:

- логіки програми;
- роботи з даними;
- UI частини.

### Приклади

- [Controllers](./app/Controllers/)
- [Models](./app/Models/)
- [Views](./app/Views/)

---

## 2. Singleton Pattern

Використовується для централізованого підключення до бази даних.

### Файл

- [Database](./core/Database.php)

Усі моделі використовують одне підключення до БД.

---

## 3. Factory Pattern

Factory використовується для створення структури даних руху товару.

### Файл

- [MovementFactory](./app/Factories/MovementFactory.php)

Factory дозволяє централізувати створення даних для stock movement операцій.

---

## 4. Service Layer Pattern

Бізнес-логіка була винесена у service класи.

### Файли

- [StockService](./app/Services/StockService.php)
- [ActivityLogger](./app/Services/ActivityLogger.php)

Сервіси відповідають за:

- логіку руху товару;
- зміну залишків;
- логування дій користувачів.

---

# Refactoring Techniques

## 1. Extract Class

Логіка була винесена у окремі класи:

- ProductValidator
- ActivityLogger
- StockService

---

## 2. Extract Method

Велика логіка була розділена на менші методи.

Це зробило код більш читабельним.

---

## 3. Remove Duplication

Повторюваний код був винесений у helper та service класи.

---

## 4. Rename Methods and Variables

Методи та змінні були перейменовані на більш зрозумілі назви.

Наприклад:

- `moveStock()`
- `$productId`
- `$quantity`

---

## 5. Introduce Service Layer

Бізнес-логіка була винесена з контролерів у service класи.

### Приклад

- [StockService](./app/Services/StockService.php)

---

# Git Workflow

Під час розробки використовувались окремі feature-гілки:

- `feature/auth-system`
- `feature/ui-improvements`
- `feature/activity-log`
- `feature/stock-movements`
- `feature/sales-system`

Для кожної фічі створювались окремі коміти та pull requests.

---

# Висновок

Під час виконання проєкту були застосовані:

- принципи чистого коду;
- патерни проєктування;
- техніки рефакторингу;
- MVC архітектура;
- робота з Git та GitHub.

Проєкт дозволив отримати практичний досвід роботи з:

- PHP;
- MySQL;
- CRUD операціями;
- авторизацією;
- ролями користувачів;
- організацією структури проєкту;
- побудовою вебзастосунків.