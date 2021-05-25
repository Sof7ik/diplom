-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 26 2021 г., 01:25
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `income-parcels-goods`
--

CREATE TABLE `income-parcels-goods` (
  `id-income` int NOT NULL,
  `id-product` int NOT NULL,
  `product-quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `income-parcels-goods`
--

INSERT INTO `income-parcels-goods` (`id-income`, `id-product`, `product-quantity`) VALUES
(1, 1, 10),
(1, 2, 4),
(3, 2, 40),
(5, 1, 30);

-- --------------------------------------------------------

--
-- Структура таблицы `incoming-parcels`
--

CREATE TABLE `incoming-parcels` (
  `id` int NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `incoming-parcels`
--

INSERT INTO `incoming-parcels` (`id`, `date`) VALUES
(1, '2021-05-23 15:37:53'),
(3, '2021-05-05 16:06:59'),
(4, '2021-05-26 00:32:21'),
(5, '2021-05-12 00:11:00'),
(6, '2021-05-24 00:05:59');

-- --------------------------------------------------------

--
-- Структура таблицы `outcome-parcels-goods`
--

CREATE TABLE `outcome-parcels-goods` (
  `id-outcome` int NOT NULL,
  `id-product` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `outcome-parcels-goods`
--

INSERT INTO `outcome-parcels-goods` (`id-outcome`, `id-product`, `quantity`) VALUES
(1, 1, 20),
(1, 2, 10),
(2, 1, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `outcoming-parcels`
--

CREATE TABLE `outcoming-parcels` (
  `id` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `outcoming-parcels`
--

INSERT INTO `outcoming-parcels` (`id`, `date`) VALUES
(1, '2021-05-25 14:17:41'),
(2, '2021-05-25 14:17:50'),
(3, '2021-05-25 14:17:50');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `quantity`) VALUES
(1, 'Леёнька', 'Новое описание товара', 'https://sun9-57.userapi.com/impg/iRNJppSfo_og4MHRrmsG1567CaYkKAdcZxTEdQ/5zW3xSxvtvw.jpg?size=2560x1707&quality=96&sign=bd1594a2136d9800e8e4ad1846b12498&type=album', 1),
(2, 'корпус компьютерный чёрный Ranou', 'Mini-Tower — второй по популярности типоразмер. С развитием технологий размер материнских плат все уменьшался, а звуковые, видео- и сетевые карты все чаще оказывались интегрированы в «материнку». В результате для простых сборок Mid-Tower оказался слишком просторен. Для таких случаев разработан Mini-Tower, который обычно имеет ту же ширину, что и Mid-Tower, но меньшую высоту и длину. Стандартная плата ATX в такой корпус уже не лезет, поддерживаются только те форм-факторы, которые по размерам меньше или равны Micro-ATX и Mini-ITX.\n\n', 'https://cdn.svyaznoy.ru/upload/iblock/9dd/1029545_v01_b.jpg', 123);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `father` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `father`, `login`, `password`) VALUES
(1, 'Тестовый', 'Первый', 'Пользователь', 'user', '$2y$10$otNCfTvkIdT7Eb2G.jAKOOffpS5tvknT3BD9zbGHxnwxfiGOhvAl6');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `income-parcels-goods`
--
ALTER TABLE `income-parcels-goods`
  ADD PRIMARY KEY (`id-income`,`id-product`),
  ADD KEY `id-goods` (`id-product`);

--
-- Индексы таблицы `incoming-parcels`
--
ALTER TABLE `incoming-parcels`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `outcome-parcels-goods`
--
ALTER TABLE `outcome-parcels-goods`
  ADD PRIMARY KEY (`id-outcome`,`id-product`),
  ADD KEY `id-product` (`id-product`);

--
-- Индексы таблицы `outcoming-parcels`
--
ALTER TABLE `outcoming-parcels`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `incoming-parcels`
--
ALTER TABLE `incoming-parcels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `outcoming-parcels`
--
ALTER TABLE `outcoming-parcels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `income-parcels-goods`
--
ALTER TABLE `income-parcels-goods`
  ADD CONSTRAINT `income-parcels-goods_ibfk_1` FOREIGN KEY (`id-product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `income-parcels-goods_ibfk_2` FOREIGN KEY (`id-income`) REFERENCES `incoming-parcels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `outcome-parcels-goods`
--
ALTER TABLE `outcome-parcels-goods`
  ADD CONSTRAINT `outcome-parcels-goods_ibfk_1` FOREIGN KEY (`id-outcome`) REFERENCES `outcoming-parcels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `outcome-parcels-goods_ibfk_2` FOREIGN KEY (`id-product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
