-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 02 2021 г., 15:55
-- Версия сервера: 8.0.23
-- Версия PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `site_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actions`
--

CREATE TABLE `actions` (
  `id` int NOT NULL,
  `admin_id` int NOT NULL,
  `event` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `actions`
--

INSERT INTO `actions` (`id`, `admin_id`, `event`, `date`) VALUES
(3, 8, 'Upload file ВТ.docx to c:/', '2021-04-29 17:13:06'),
(4, 8, 'Move file C:/ВТ.docx to C:/Storage/ВТ.docx', '2021-04-29 17:13:06'),
(5, 8, 'Delete file C:/Storage/ВТ.docx', '2021-04-29 17:13:06'),
(6, 8, 'Send email ', '2021-04-29 17:13:06'),
(7, 8, 'Send email ', '2021-04-29 17:13:06');

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `name`, `email`) VALUES
(8, 'alex99976', '5f4dcc3b5aa765d61d8327deb882cf99', 'Alex', 'aa@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `browsers`
--

CREATE TABLE `browsers` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `count` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `browsers`
--

INSERT INTO `browsers` (`id`, `name`, `count`) VALUES
(1, 'Opera', 0),
(2, 'Microsoft Edge', 2),
(3, 'Internet Explorer', 0),
(4, 'Chrome', 11),
(5, 'Safari', 0),
(9, 'Firefox', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `category_element`
--

CREATE TABLE `category_element` (
  `id` int NOT NULL,
  `filter_id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category_element`
--

INSERT INTO `category_element` (`id`, `filter_id`, `name`) VALUES
(1, 1, 'ASUS'),
(2, 1, 'Lenovo'),
(3, 1, 'HP'),
(4, 1, 'Acer'),
(5, 1, 'Dell'),
(6, 1, 'MSI'),
(7, 1, 'Xiaomi'),
(8, 1, 'Huawei'),
(9, 1, 'HONOR'),
(10, 2, 'HD/HD+ (768p/900p)'),
(11, 2, 'Full HD (1080p)'),
(12, 2, 'QHD (1440p)'),
(13, 2, 'Retina'),
(14, 2, 'QHD+ (1800p)'),
(15, 2, '4K UHD (2160p)'),
(16, 3, 'менее 4 ГБ'),
(17, 3, '4-6 ГБ'),
(18, 3, '8-12 ГБ'),
(19, 3, '16-24 ГБ'),
(20, 3, '32 ГБ и более'),
(21, 4, 'менее 12\"'),
(22, 4, '12-13\"'),
(23, 4, '13.3-14\"'),
(24, 4, '15\"'),
(25, 4, '17\"'),
(26, 4, '18\" и более'),
(27, 1, 'Microsoft');

-- --------------------------------------------------------

--
-- Структура таблицы `filter_category`
--

CREATE TABLE `filter_category` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `filter_category`
--

INSERT INTO `filter_category` (`id`, `name`) VALUES
(1, 'Производитель'),
(2, 'Разрешение экрана'),
(3, 'Оперативная память'),
(4, 'Диагональ экрана');

-- --------------------------------------------------------

--
-- Структура таблицы `header_nav`
--

CREATE TABLE `header_nav` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `header_nav`
--

INSERT INTO `header_nav` (`id`, `name`, `page`) VALUES
(1, 'Главная', 'index.php'),
(2, 'Каталог', 'catalog.php'),
(3, 'Контакты', 'contacts.php'),
(4, 'Новости', 'news.php'),
(5, 'О нас', 'about.php');

-- --------------------------------------------------------

--
-- Структура таблицы `index_advantages`
--

CREATE TABLE `index_advantages` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `index_advantages`
--

INSERT INTO `index_advantages` (`id`, `title`, `text`, `image`) VALUES
(1, 'ГАРАНТИЯ ВОЗВРАТА ДЕНЕГ', 'ВЫ ВСЕГДА МОЖЕТЕ ОТКАЗАТЬСЯ ОТ ТОВАРА И ВЕРНУТЬ ДЕНЬГИ', 'assets/images/main/icon1.png'),
(2, 'БЕСПЛАТНАЯ ДОСТАВКА', 'БЕСПЛАТНАЯ ДОСТАВКА ПО ГОРОДУ. ВЫГОДНЫЕ УСЛОВИЯ ДОСТАВКИ ПО ВСЕЙ СТРАНЕ', 'assets/images/main/icon2.png'),
(3, 'ГАРАНТИРОВАННАЯ ПОДДЕРЖКА', 'ГОТОВЫ ОКАЗАТЬ ПОМОЩЬ 24/7', 'assets/images/main/icon3.png'),
(4, 'НАДЕЖНАЯ ГАРАНТИЯ', 'ВСЕГДА ВЫПОЛНЯЕМ ГАРАНТИЙНЫЕ ОБЯЗАТЕЛЬСТВА', 'assets/images/main/icon4.png');

-- --------------------------------------------------------

--
-- Структура таблицы `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(6, 'ale976@gmail.com'),
(2, 'alexaa76@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `news_articles`
--

CREATE TABLE `news_articles` (
  `id` int NOT NULL,
  `author_id` int NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `publications_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_articles`
--

INSERT INTO `news_articles` (`id`, `author_id`, `title`, `text`, `image`, `publications_date`) VALUES
(2, 8, 'Ультрабук Asus ZenBook 14 UX435EG: компактная модель с производительным процессором, дискретной видеокартой и длительным временем автономной работы', 'Новая аппаратная платформа с процессором семейства Tiger Lake-U, быстрой оперативной памятью LPDDR4X и ураганным SSD делают данную модель идеальной для решения практически любых рабочих задач, а расширить границы возможного поможет второй экран ScreenPad 2.0...', 'assets/images/news/1.jpg', '2021-04-04 21:31:29'),
(3, 8, 'Ноутбук Asus VivoBook S15 S533FL: действительно мобильная модель', 'Asus VivoBook S15 S533FL позиционируется для повседневного использования, вроде смартфона в кармане, который рассчитан на постоянное ношение с собой и использование...', 'assets/images/news/2.jpg', '2021-04-04 21:32:25'),
(4, 8, 'Ноутбук Apple MacBook Air на базе Apple M1: насколько быстрее и дольше предшественника работает ультрапортативный компьютер?', 'У компьютеров новой линейки Apple на базе чипа M1 существенно (порой — в разы) выросла производительность, время автономной работы, особенно при средней нагрузке, увеличилось, а стабильность — не уменьшилась...', 'assets/images/news/3.jpg', '2021-04-04 21:33:02'),
(5, 8, 'Ноутбук Apple MacBook Air на базе Apple M1: насколько быстрее и дольше предшественника работает ультрапортативный компьютер?', 'У Honor MagicBook 15 в сравнении с MagicBook 14 больше экран, так что немного больше и габариты с весом. Также отметим чуть более комфортную работу ноутбука по уровню шума под нагрузкой...', 'assets/images/news/4.jpg', '2021-04-04 21:35:11');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'ASUS TUF Gaming F15 FX506LI-HN012', '15.6\" 1920 x 1080 IPS, несенсорный, Intel Core i5 10300H 2500 МГц, 8 ГБ, SSD 512 ГБ, граф. адаптер: NVIDIA GeForce GTX 1650 Ti 4 ГБ, без ОС, цвет крышки черный', '2590,00', 'assets/images/products/1.jpeg'),
(2, 'Huawei MateBook D 15 AMD Boh-WAQ9R', '15.6\" 1920 x 1080 IPS, несенсорный, AMD Ryzen 5 3500U 2100 МГц, 8 ГБ, SSD 256 ГБ, граф. адаптер: встроенный, Windows 10, цвет крышки серебристый', '2590,00', 'assets/images/products/2.jpeg'),
(3, 'HP Gaming Pavilion 15-dk1029ur 232C8EA', '15.6\" 1920 x 1080 IPS, несенсорный, Intel Core i5 10300H 2500 МГц, 16 ГБ, SSD 1024 ГБ, граф. адаптер: NVIDIA GeForce RTX 2060 Max-Q 6 ГБ, без ОС, цвет крышки черный/зеленый', '3381,72', 'assets/images/products/3.jpeg'),
(4, 'HONOR MagicBook 14 2020 53010VTY', '14.0\" 1920 x 1080 IPS, несенсорный, AMD Ryzen 5 3500U 2100 МГц, 8 ГБ, SSD 512 ГБ, граф. адаптер: встроенный, Windows 10, цвет крышки темно-серый', '1927,61', 'assets/images/products/4.jpeg'),
(5, 'Lenovo IdeaPad 5 15IIL05 81YK006HRE', '15.6\" 1920 x 1080 IPS, несенсорный, Intel Core i5 1035G1 1000 МГц, 8 ГБ, SSD 512 ГБ, граф. адаптер: NVIDIA GeForce MX350 2 ГБ, без ОС, цвет крышки темно-серый', '2090,00', 'assets/images/products/5.jpeg'),
(6, 'HP 14s-fq0035ur 24C07EA', '14.0\" 1920 x 1080 IPS, несенсорный, AMD Ryzen 3 4300U 2700 МГц, 8 ГБ, SSD 512 ГБ, граф. адаптер: встроенный, без ОС, цвет крышки серебристый', '1457,15', 'assets/images/products/6.jpeg'),
(7, 'ASUS Zenbook UX433FQ-A5081T', '14.0\" 1920 x 1080 IPS, несенсорный, Intel Core i5 10210U 1600 МГц, 8 ГБ, SSD 256 ГБ, граф. адаптер: NVIDIA GeForce MX350 2 ГБ, Windows 10, цвет крышки темно-синий', '2677,09', 'assets/images/products/7.jpeg'),
(8, 'ASUS ROG Strix G15 G512LV-HN154', '15.6\" 1920 x 1080 IPS, несенсорный, Intel Core i7 10750H 2600 МГц, 16 ГБ, SSD 512 ГБ, граф. адаптер: NVIDIA GeForce RTX 2060 6 ГБ, без ОС, цвет крышки черный', '3676,49', 'assets/images/products/8.jpeg'),
(9, 'Xiaomi RedmiBook 16 JYU4275CN', '16.1\" 1920 x 1080 IPS, несенсорный, AMD Ryzen 5 4500U 2300 МГц, 8 ГБ, SSD 512 ГБ, граф. адаптер: встроенный, Windows 10, цвет крышки темно-серый', '2168,00', 'assets/images/products/9.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `recomended_products`
--

CREATE TABLE `recomended_products` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `recomended_products`
--

INSERT INTO `recomended_products` (`id`, `product_id`, `name`, `price`, `image`) VALUES
(1, 0, 'Xiaomi Mi Notebook Pro', '2387,69', 'assets/images/main/feature_product_1.jpg'),
(2, 0, 'ASUS ZenBook Flip 14', '3375,02', 'assets/images/main/feature_product_2.jpg'),
(3, 0, 'Surface Laptop Go', '1428,96', 'assets/images/main/feature_product_3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `trending_products`
--

CREATE TABLE `trending_products` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `trending_products`
--

INSERT INTO `trending_products` (`id`, `product_id`, `name`, `price`, `image`) VALUES
(1, 0, 'Asus ZenBook 13', '2597,28', 'assets/images/main/trending_product_1.jpg'),
(2, 0, 'Acer Swift 5', '3364,75', 'assets/images/main/trending_product_2.jpg'),
(3, 0, 'HP Envy 13t', '1948,60', 'assets/images/main/trending_product_3.jpg'),
(4, 0, 'LG Gram 17', '3615,01', 'assets/images/main/trending_product_4.jpg'),
(5, 0, 'Dell XPS 13', '5670,83', 'assets/images/main/trending_product_5.jpg'),
(6, 0, 'ASUS Zenbook Pro Duo', '10634,49', 'assets/images/main/trending_product_6.jpg'),
(7, 0, 'Lenovo IdeaPad S940', '3897,22', 'assets/images/main/trending_product_7.jpg'),
(8, 0, 'Lenovo Legion Y740', '3819,28', 'assets/images/main/trending_product_8.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `register_date`) VALUES
(8, 'alex99976', '5f4dcc3b5aa765d61d8327deb882cf99', 'Alexander', 'alexandr99976@gmail.com', '2021-04-05 19:46:47'),
(9, 'A', '7fc56270e7a70fa81a5935b72eacbe29', 'A', 'A', '2021-04-05 20:12:22'),
(10, 'V', '5206560a306a2e085a437fd258eb57ce', 'V', 'V', '2021-04-05 20:34:35'),
(11, 'B', '9d5ed678fe57bcca610140957afab571', 'B', 'B', '2021-04-05 20:58:13'),
(12, 'G', 'dfcf28d0734569a6a693bc8194de62bf', 'G', 'G', '2021-04-05 21:00:03');

-- --------------------------------------------------------

--
-- Структура таблицы `voting_results`
--

CREATE TABLE `voting_results` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `voters_count` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `voting_results`
--

INSERT INTO `voting_results` (`id`, `name`, `voters_count`) VALUES
(1, 'Microsoft', 2),
(2, 'ASUS', 1),
(3, 'Acer', 2),
(4, 'Lenovo', 1),
(5, 'Dell', 8),
(6, 'HP', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `browsers`
--
ALTER TABLE `browsers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `category_element`
--
ALTER TABLE `category_element`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_element_ibfk_1` (`filter_id`);

--
-- Индексы таблицы `filter_category`
--
ALTER TABLE `filter_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `header_nav`
--
ALTER TABLE `header_nav`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `index_advantages`
--
ALTER TABLE `index_advantages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `news_articles`
--
ALTER TABLE `news_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author_id`) USING BTREE;

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `recomended_products`
--
ALTER TABLE `recomended_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `trending_products`
--
ALTER TABLE `trending_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- Индексы таблицы `voting_results`
--
ALTER TABLE `voting_results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `browsers`
--
ALTER TABLE `browsers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `category_element`
--
ALTER TABLE `category_element`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `filter_category`
--
ALTER TABLE `filter_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `header_nav`
--
ALTER TABLE `header_nav`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `index_advantages`
--
ALTER TABLE `index_advantages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news_articles`
--
ALTER TABLE `news_articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `recomended_products`
--
ALTER TABLE `recomended_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `trending_products`
--
ALTER TABLE `trending_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `voting_results`
--
ALTER TABLE `voting_results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `actions_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `category_element`
--
ALTER TABLE `category_element`
  ADD CONSTRAINT `category_element_ibfk_1` FOREIGN KEY (`filter_id`) REFERENCES `filter_category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `news_articles`
--
ALTER TABLE `news_articles`
  ADD CONSTRAINT `news_articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
