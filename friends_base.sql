-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 30 2020 г., 17:23
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `friends_base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `secondname` varchar(45) NOT NULL,
  `patronymic` varchar(45) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `addres` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `comment` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`id`, `firstname`, `secondname`, `patronymic`, `sex`, `birthday`, `phone`, `addres`, `email`, `comment`) VALUES
(1, 'Николай', 'Шебалков', 'Александрович', 'м', '', '89995176541', '', '', ''),
(3, 'Сергей', 'Пилонов', 'Викторович', 'м', '1997-07-22', '', '', '', ''),
(5, 'Никита', 'Демешев', 'Сергеевич', 'м', '1994-12-24', '', 'Внуково, 2-я Внуковская, 7', '', ''),
(11, 'Дмитрий', 'Корнеев', 'Сергеевич', 'м', '1998-06-22', '', '', '', ''),
(12, 'Анна', 'Сергеева', '', 'ж', '', '89165456782', '', '', ''),
(13, 'Евгений', 'Кукуев', 'Викторович', 'м', '', '', 'Сальвадора Альенде, 16-24', '', ''),
(14, 'Владимир', 'Ульянов', 'Ильич', 'м', '', '', 'Красная пл., 2а', 'ulyanov@mail.su', ''),
(15, 'Лазарь', 'Мышьяков', 'Моисеевич', 'м', '', '89173456141', '', '', ''),
(16, 'Анна', 'Коломенская', '', 'ж', '', '', 'annakolomenskaya@ya.ru', '', ''),
(17, 'Сергей', 'Лобов', '', 'м', '', '', '', 'akbars@ya.ru', ''),
(18, 'Илья', 'Самоваров', 'Ефимович', 'м', '1987-05-17', '', '', '', ''),
(19, 'Андрей', 'Николаев', 'Леонидович', 'м', '', '', '', 'leo@bk.ru', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
