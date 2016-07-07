-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 06 2016 г., 11:58
-- Версия сервера: 5.5.43-37.2
-- Версия PHP: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cp20720_testovoe`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `oven` int(11) NOT NULL,
  `paste` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `stuffing` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indexed_foreign` (`oven`,`paste`,`size`,`stuffing`,`target`),
  KEY `paste_id` (`paste`),
  KEY `size_id` (`size`),
  KEY `stuffing_id` (`stuffing`),
  KEY `target_id` (`target`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `price`, `oven`, `paste`, `size`, `stuffing`, `target`) VALUES
(1, 'Тестовый продукт 1', 3492, 1, 3, 3, 3, 2),
(2, 'Тестовый продукт 2', 1298, 2, 1, 3, 3, 3),
(3, 'Тестовый продукт 3', 1242, 2, 3, 1, 5, 1),
(4, 'Тестовый продукт 4', 932, 2, 3, 1, 5, 2),
(5, 'Тестовый продукт 6', 1342, 2, 3, 1, 5, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `oven`
--

CREATE TABLE IF NOT EXISTS `oven` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `oven`
--

INSERT INTO `oven` (`id`, `slug`, `name`) VALUES
(1, 'oven', 'В духовке'),
(2, 'fried', 'Жареные'),
(3, 'steam', 'На пару');

-- --------------------------------------------------------

--
-- Структура таблицы `paste`
--

CREATE TABLE IF NOT EXISTS `paste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `paste`
--

INSERT INTO `paste` (`id`, `slug`, `name`) VALUES
(1, 'flaky', 'Слоистое'),
(2, 'yeast', 'Дрожжевое'),
(3, 'rye', 'Ржаное'),
(4, 'unleavened', 'Бездрожжевое');

-- --------------------------------------------------------

--
-- Структура таблицы `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `size`
--

INSERT INTO `size` (`id`, `slug`, `name`) VALUES
(1, 'huge', 'Огромные'),
(2, 'big', 'Большие'),
(3, 'medium', 'Средние'),
(4, 'small', 'Маленькие');

-- --------------------------------------------------------

--
-- Структура таблицы `stuffing`
--

CREATE TABLE IF NOT EXISTS `stuffing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stuffing`
--

INSERT INTO `stuffing` (`id`, `slug`, `name`) VALUES
(1, 'raspberries', 'Малина'),
(3, 'strawberry', 'Клубника'),
(4, 'mutton', 'Баранина'),
(5, 'pork', 'Свинина'),
(6, 'potato', 'Картошка');

-- --------------------------------------------------------

--
-- Структура таблицы `target`
--

CREATE TABLE IF NOT EXISTS `target` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `target`
--

INSERT INTO `target` (`id`, `slug`, `name`) VALUES
(1, 'satisfying', 'Сытный'),
(2, 'light', 'Легкий'),
(3, 'gift', 'Подарочный');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD CONSTRAINT `target_id` FOREIGN KEY (`target`) REFERENCES `target` (`id`),
  ADD CONSTRAINT `oven_id` FOREIGN KEY (`oven`) REFERENCES `oven` (`id`),
  ADD CONSTRAINT `paste_id` FOREIGN KEY (`paste`) REFERENCES `paste` (`id`),
  ADD CONSTRAINT `size_id` FOREIGN KEY (`size`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `stuffing_id` FOREIGN KEY (`stuffing`) REFERENCES `stuffing` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
