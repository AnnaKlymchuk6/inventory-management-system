-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 10 2026 г., 17:50
-- Версия сервера: 8.4.7
-- Версия PHP: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `warehouse_inventory_management_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE IF NOT EXISTS `activity_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_name`, `action`, `created_at`) VALUES
(1, 'Admin', 'Вийшов із системи', '2026-05-10 10:58:57'),
(2, 'Manager', 'Увійшов у систему', '2026-05-10 10:59:16'),
(3, 'Manager', 'Вийшов із системи', '2026-05-10 12:05:38'),
(4, 'Admin', 'Увійшов у систему', '2026-05-10 12:05:41'),
(5, 'Admin', 'Продав товар \"Подвійна миска\" (2 шт.)', '2026-05-10 15:45:37');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Корм для котів', NULL, '2026-05-09 13:18:38'),
(2, 'Корм для собак', NULL, '2026-05-09 13:18:38'),
(3, 'Іграшки', NULL, '2026-05-09 13:18:38'),
(4, 'Лежанки', NULL, '2026-05-09 13:18:38'),
(5, 'Переноски', NULL, '2026-05-09 13:18:38'),
(6, 'Наповнювачі', NULL, '2026-05-09 13:18:38'),
(7, 'Акваріуми', NULL, '2026-05-09 13:18:38'),
(8, 'Ласощі', NULL, '2026-05-09 13:18:38'),
(9, 'Нашийники', NULL, '2026-05-09 13:18:38'),
(10, 'Миски', NULL, '2026-05-09 13:18:38');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `supplier_id` int DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `quantity` int DEFAULT '0',
  `price` decimal(10,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `fk_category` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `supplier_id`, `name`, `description`, `quantity`, `price`, `created_at`) VALUES
(3, 1, NULL, 'Royal Canin для кошенят', NULL, 15, 850.00, '2026-05-09 13:26:34'),
(4, 1, NULL, 'Purina Cat Chow', NULL, 4, 420.00, '2026-05-09 13:26:34'),
(5, 2, NULL, 'Pedigree для дорослих собак', NULL, 20, 620.00, '2026-05-09 13:26:34'),
(6, 2, NULL, 'Brit Premium для собак', NULL, 3, 910.00, '2026-05-09 13:26:34'),
(7, 3, NULL, 'Іграшкова мишка для котів', NULL, 12, 120.00, '2026-05-09 13:26:34'),
(8, 3, NULL, 'Канат для собак', NULL, 5, 180.00, '2026-05-09 13:26:34'),
(9, 4, NULL, 'М’яка лежанка для кота', NULL, 2, 1400.00, '2026-05-09 13:26:34'),
(10, 4, NULL, 'Велика лежанка для собаки', NULL, 1, 2600.00, '2026-05-09 13:26:34'),
(11, 5, NULL, 'Пластикова переноска', NULL, 7, 950.00, '2026-05-09 13:26:34'),
(12, 6, NULL, 'Бентонітовий наповнювач', NULL, 18, 300.00, '2026-05-09 13:26:34'),
(13, 7, NULL, 'Акваріум 40 літрів', NULL, 2, 3500.00, '2026-05-09 13:26:34'),
(14, 8, NULL, 'Ласощі для кроликів', NULL, 9, 210.00, '2026-05-09 13:26:34'),
(15, 9, NULL, 'Шкіряний нашийник', NULL, 6, 400.00, '2026-05-09 13:26:34'),
(16, 10, NULL, 'Подвійна миска', NULL, 9, 250.00, '2026-05-09 13:26:34');

-- --------------------------------------------------------

--
-- Структура таблицы `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `user_id`, `quantity`, `total_price`, `note`, `created_at`) VALUES
(1, 16, 1, 2, 500.00, 'Продаж клієнту', '2026-05-10 15:45:37');

-- --------------------------------------------------------

--
-- Структура таблицы `stock_movements`
--

DROP TABLE IF EXISTS `stock_movements`;
CREATE TABLE IF NOT EXISTS `stock_movements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `type` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `stock_movements`
--

INSERT INTO `stock_movements` (`id`, `product_id`, `user_id`, `type`, `quantity`, `note`, `created_at`) VALUES
(1, 16, 1, 'out', 2, 'Продаж товару', '2026-05-10 15:45:37');

-- --------------------------------------------------------

--
-- Структура таблицы `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '2026-05-09 19:22:41'),
(2, 'Manager', 'manager@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'manager', '2026-05-09 19:22:41'),
(3, 'Employee', 'employee@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'employee', '2026-05-09 19:22:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
