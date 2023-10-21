-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 21 2023 г., 14:12
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `root`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `nameCategory` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `nameCategory`) VALUES
(24, 'Антенна'),
(20, 'ИБП'),
(25, 'Коммутатор'),
(28, 'Маршрутизатор'),
(26, 'Монитор'),
(27, 'МФУ'),
(29, 'Ноутбук'),
(1, 'ПК'),
(39, 'Планшет'),
(23, 'Принтер'),
(2, 'Сервер');

-- --------------------------------------------------------

--
-- Структура таблицы `departament`
--

CREATE TABLE `departament` (
  `id_departament` int NOT NULL,
  `nameDepartament` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `departament`
--

INSERT INTO `departament` (`id_departament`, `nameDepartament`) VALUES
(9, 'Информационно-аналитический отдел'),
(2, 'Отдел защиты информации'),
(1, 'Отдел информационных ресурсов и технологий');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int NOT NULL,
  `fio` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(18) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `fio`, `phone`, `message`) VALUES
(1, 'Потапов Клим Максимович', '+7 (904) 584 46 45', 'Снять оборудование с КСО 5392'),
(2, 'Павлов Ефим Георгиевич', '+7 (954) 564 56 45', 'Добавить информационно-аналитический отдел'),
(3, 'Силин Тимур Дамирович', '+7 (564) 496 42 61', 'Проверка от 21.10.2023 пройдена успешно.');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Установлено'),
(2, 'На складе'),
(3, 'Доставка');

-- --------------------------------------------------------

--
-- Структура таблицы `technic`
--

CREATE TABLE `technic` (
  `id` int UNSIGNED NOT NULL,
  `departament` int DEFAULT NULL,
  `category` int DEFAULT NULL,
  `inventory` int UNSIGNED NOT NULL,
  `status_technic` int DEFAULT NULL,
  `title` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `technic`
--

INSERT INTO `technic` (`id`, `departament`, `category`, `inventory`, `status_technic`, `title`) VALUES
(1, 2, 1, 1754, 1, 'GEG Prestige 41240A'),
(2, 2, 2, 336, 3, 'GEG Express 200L 155E'),
(3, 1, 24, 418, 2, 'Hengshanlao 1500VA'),
(4, 9, 28, 791, 2, 'CISCO 1760'),
(5, 9, 20, 316, 2, 'BLACK UPS 1500VA'),
(6, 1, 23, 207, 2, 'AUTONOMIC MB 4016'),
(7, 2, 20, 317, 1, 'BLACK UPS 1500VA'),
(8, 1, 25, 796, 1, 'Catalyst'),
(9, 9, 27, 108, 1, 'Xerox Workcentre Pro 128'),
(10, 9, 2, 517, 3, 'IBM x3650 Rack mount 2 U'),
(11, 1, 2, 615, 2, 'IBM x3650 Rack mount 2 U'),
(12, 1, 23, 588, 1, 'Xerox Workcentre Pro 128'),
(13, 1, 23, 589, 3, 'Xerox PHASER123'),
(14, 1, 23, 590, 1, 'Xerox PHASER'),
(15, 2, 2, 337, 3, 'IBM System x3650 M2'),
(16, 2, 2, 338, 1, 'IBM System x3650 M2'),
(17, 9, 25, 4813, 2, 'HP StorageWorks 416 SAN'),
(18, 9, 25, 4814, 3, 'HP StorageWorks 416 SAN'),
(19, 9, 1, 245, 2, 'DEPO Neos 430'),
(20, 9, 1, 246, 3, 'DEPO Neos 430'),
(21, 1, 1, 335, 1, 'DEPO Neos 430'),
(22, 2, 26, 339, 1, 'DEPO Neos 430'),
(23, 2, 26, 500, 2, 'Acer V193Abm'),
(24, 2, 26, 503, 1, 'Acer V193Abm'),
(25, 1, 1, 504, 1, 'Acer V193Abm'),
(26, 1, 26, 507, 2, 'Acer V193Abm'),
(27, 2, 29, 6242, 2, 'Aquarius Cmp NS735'),
(28, 2, 29, 6250, 3, 'Aquarius Cmp NS735'),
(29, 2, 29, 6255, 2, 'Aquarius Cmp NS735'),
(30, 9, 39, 5961, 1, 'Samsung Galaxy'),
(31, 9, 39, 5959, 2, 'Samsung Galaxy'),
(32, 1, 24, 409, 3, 'Hengshanlao 1500VA'),
(33, 1, 23, 109, 1, 'Xerox Workcentre Pro 128'),
(34, 9, 25, 4815, 2, 'HP StorageWorks 416 SAN'),
(35, 9, 25, 800, 3, 'Catalyst'),
(36, 9, 24, 410, 2, 'Hengshanlao 1500VA'),
(37, 2, 1, 176, 2, 'GEG Prestige 41240A');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(25) NOT NULL,
  `login` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pass`) VALUES
(1, 'adminpanel', 'admin', 'safeindustri');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD UNIQUE KEY `nameCategory` (`nameCategory`);

--
-- Индексы таблицы `departament`
--
ALTER TABLE `departament`
  ADD PRIMARY KEY (`id_departament`),
  ADD UNIQUE KEY `nameDepartament` (`nameDepartament`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `technic`
--
ALTER TABLE `technic`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventory` (`inventory`),
  ADD KEY `departament` (`departament`),
  ADD KEY `category` (`category`),
  ADD KEY `status_technic` (`status_technic`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `departament`
--
ALTER TABLE `departament`
  MODIFY `id_departament` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `technic`
--
ALTER TABLE `technic`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `technic`
--
ALTER TABLE `technic`
  ADD CONSTRAINT `technic_ibfk_1` FOREIGN KEY (`departament`) REFERENCES `departament` (`id_departament`),
  ADD CONSTRAINT `technic_ibfk_2` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `technic_ibfk_3` FOREIGN KEY (`status_technic`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
