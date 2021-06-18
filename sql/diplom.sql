-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 18 2021 г., 11:16
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

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
(11, 25, 100),
(12, 26, 100),
(13, 27, 50),
(14, 28, 10);

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
(7, '2021-05-26 13:05:26'),
(8, '2021-06-01 11:06:12'),
(9, '2021-06-01 11:06:12'),
(10, '2021-06-01 11:06:12'),
(11, '2021-06-02 17:06:14'),
(12, '2021-06-02 17:06:14'),
(13, '2021-06-02 17:06:14'),
(14, '2021-06-02 17:06:14');

-- --------------------------------------------------------

--
-- Структура таблицы `outcome-parcels-goods`
--

CREATE TABLE `outcome-parcels-goods` (
  `id-outcome` int(11) NOT NULL,
  `id-product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `outcome-parcels-goods`
--

INSERT INTO `outcome-parcels-goods` (`id-outcome`, `id-product`, `quantity`) VALUES
(16, 25, 20),
(16, 26, 5),
(16, 27, 10),
(16, 28, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `outcoming-parcels`
--

CREATE TABLE `outcoming-parcels` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `outcoming-parcels`
--

INSERT INTO `outcoming-parcels` (`id`, `date`) VALUES
(16, '2021-06-02 17:06:45');

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
(25, 'CBR CW 830M Green, Веб-камера с матрицей 0,3 МП, разрешение видео 640х480, USB 2.0, встроенный микрофон, ручная фокусировка, крепление на мониторе, длина кабеля 1,4 м, цвет зелёный', '', 'https://comp-city.com/upload/resize_cache/webp/iblock/0ec/450_450_140cd750bba9870f18aada2478b24840a/0ecddd497219ad90b24528a52aee5e9e.webp', 80, 1),
(26, 'Logitech Webcam C930e {Full HD 1080p/30fps, автофокус, zoom 4x, угол обзора 90°, стереомикрофон, защитная шторка, кабель 1.83м}', '', 'https://comp-city.com/upload/resize_cache/webp/upload/iblock/b97/s531nwwfrt1tvewrdpo30677j4hlvliq.webp', 95, 1),
(27, 'Веб-камера с матрицей 2 МП, разрешение видео 1920х1080, USB 2.0, встроенный микрофон с шумоподавлением, автофокус, крепление на мониторе, длина кабеля 1,8 м, цвет чёрный', '', 'https://comp-city.com/upload/resize_cache/webp/iblock/080/450_450_140cd750bba9870f18aada2478b24840a/080057ae0c4d5f5971d1526f607e02e6.webp', 40, 1),
(28, 'Газонокосилка аккумуляторная [512201435] { 40В, акб 2,5Ач, ширина кошения 37см, травосборник 40 л }', '', 'https://comp-city.com/upload/resize_cache/webp/iblock/55d/o8uwdtisuh9afrarz431xeuuzqrrjagb.webp', 5, 2);

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
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `father`, `login`, `password`, `role`) VALUES
(1, 'Тестовый', 'Первый', 'Пользователь', 'user', '$2y$10$otNCfTvkIdT7Eb2G.jAKOOffpS5tvknT3BD9zbGHxnwxfiGOhvAl6', 0),
(3, 'Админ', 'Админ', 'Админ', 'admin', '$2y$10$WDxZelA3fJbeTOmfENT4eurPGvd2adlfjsXNxaPvwd2MJFwLX0Y2i', 1);

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
  ADD PRIMARY KEY (`id-outcome`,`id-product`,`quantity`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat-id` (`cat-id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `outcoming-parcels`
--
ALTER TABLE `outcoming-parcels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat-id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
