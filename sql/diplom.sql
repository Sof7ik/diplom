-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 26 2021 г., 13:49
-- Версия сервера: 10.3.22-MariaDB
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
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Комплектующие для компьютера'),
(2, 'Садовый инструмент'),
(3, 'Бензоинструмент'),
(4, 'Силовая техника');

-- --------------------------------------------------------

--
-- Структура таблицы `income-parcels-goods`
--

CREATE TABLE `income-parcels-goods` (
  `id-income` int(11) NOT NULL,
  `id-product` int(11) NOT NULL,
  `product-quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `income-parcels-goods`
--

INSERT INTO `income-parcels-goods` (`id-income`, `id-product`, `product-quantity`) VALUES
(7, 21, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `incoming-parcels`
--

CREATE TABLE `incoming-parcels` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `incoming-parcels`
--

INSERT INTO `incoming-parcels` (`id`, `date`) VALUES
(7, '2021-05-26 13:05:26');

-- --------------------------------------------------------

--
-- Структура таблицы `outcome-parcels-goods`
--

CREATE TABLE `outcome-parcels-goods` (
  `id-outcome` int(11) NOT NULL,
  `id-product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `outcoming-parcels`
--

CREATE TABLE `outcoming-parcels` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `cat-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `quantity`, `cat-id`) VALUES
(21, 'Генератор 1000w', NULL, NULL, 10, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `father`, `login`, `password`) VALUES
(1, 'Тестовый', 'Первый', 'Пользователь', 'user', '$2y$10$otNCfTvkIdT7Eb2G.jAKOOffpS5tvknT3BD9zbGHxnwxfiGOhvAl6');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `incoming-parcels`
--
ALTER TABLE `incoming-parcels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `outcoming-parcels`
--
ALTER TABLE `outcoming-parcels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
