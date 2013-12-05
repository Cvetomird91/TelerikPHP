-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2013 at 05:57 PM
-- Server version: 5.6.11-log
-- PHP Version: 5.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `books`
--
CREATE DATABASE IF NOT EXISTS `books homework` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `books homework`;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(250) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`) VALUES
(1, 'Джон Стайнбек'),
(2, 'Франк Хърбърт'),
(3, 'Дъглас Адамс'),
(4, 'Марк Твен'),
(5, 'Джордж Мартин'),
(6, 'Стивън Ериксън'),
(7, 'Фредерик Пол'),
(8, 'Робърт Джордан'),
(9, 'Станислав Лем'),
(10, 'Брайън Хърбърт'),
(11, 'Кевин Андерсън'),
(12, 'Дан Симънс'),
(13, 'Кен Киси'),
(17, 'Клифърд Саймък'),
(15, 'Франк Милър'),
(16, 'Уилям Бъроуз'),
(18, 'Роджър Зелазни'),
(19, 'Карл Юнг'),
(20, 'Кърт Вонегът'),
(21, 'Тери Гуткайнд'),
(22, 'Х.П. Лъвкрафт'),
(23, 'Нийл Геймън'),
(24, 'Тери Пратчет'),
(25, 'Урсула Ле Гуин');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(250) NOT NULL,
  `comments_count` int(100) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `book_title` (`book_title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `comments_count`) VALUES
(30, 'Sin City', 4),
(9, 'Sandworms of Dune', 0),
(11, 'Paul of Dune', 0),
(6, 'Почти безобидна', 0),
(12, 'Том Сойер', 0),
(10, 'Хрониките на Амбър N1', 0),
(13, 'Кошерът на Хелстрьом', 1),
(19, 'Точния мерник', 1),
(18, 'Ресторант на края на вселената', 0),
(20, 'Кланница Н5', 9),
(21, 'Животът, вселената и всичко останало', 0),
(26, 'Сбогом и благодаря за рибата', 0),
(23, 'На изток от рая', 0),
(24, 'Месията на Дюн', 2),
(25, 'Разкази', 1),
(28, 'Добри Поличби', 0),
(29, 'Стражите! Стражите!', 0),
(31, 'The Reanimator', 3),
(32, 'House Corrino', 0),
(33, 'Лявата ръка на мрака', 1),
(34, 'Землемория', 0),
(35, 'Гейтуей', 0),
(36, 'Jedi Search', 0),
(37, 'Соларис', 0),
(38, 'The Dark Knight Returns', 1),
(39, 'Пътеводител на Галактическия стопаджия', 0);

-- --------------------------------------------------------

--
-- Table structure for table `books_authors`
--

CREATE TABLE IF NOT EXISTS `books_authors` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  KEY `book_id` (`book_id`),
  KEY `author_id` (`author_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books_authors`
--

INSERT INTO `books_authors` (`book_id`, `author_id`) VALUES
(3, 4),
(4, 4),
(5, 4),
(6, 3),
(7, 10),
(7, 11),
(10, 18),
(11, 10),
(11, 11),
(12, 4),
(13, 2),
(14, 2),
(15, 2),
(16, 4),
(17, 4),
(18, 3),
(19, 20),
(20, 20),
(21, 3),
(22, 4),
(23, 1),
(24, 2),
(25, 22),
(1, 3),
(2, 23),
(3, 23),
(3, 24),
(4, 24),
(30, 15),
(31, 22),
(32, 10),
(32, 11),
(33, 25),
(34, 25),
(35, 7),
(36, 11),
(37, 9),
(30, 0),
(38, 15),
(39, 3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(50) NOT NULL AUTO_INCREMENT,
  `book_id` int(100) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(100) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `book_id`, `comment`, `user_id`) VALUES
(1, 30, 'Много добър комикс.', 3),
(2, 24, 'По-кратка от първата част, но се повествованието е доста динамично.', 3),
(3, 29, 'Първата книжка от книгите за градската стража.', 3),
(4, 25, 'Учителят на Стивън Кинг.', 3),
(5, 32, 'Предисторията на династията Корино от "Дюн" света.', 3),
(6, 33, 'Sci fi за една ледена планета.', 5),
(7, 24, 'По-кратка от първата част, но много неща се случват!', 5),
(8, 37, 'Човешка драма, представена през призмата на научната фантастика.', 5),
(9, 30, 'Много здрав комикс!', 5),
(10, 38, 'Nice reboot series.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `comments_count` int(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `password`, `comments_count`) VALUES
(1, 'Нов потребител', 'ecb97ffafc1798cd2f67fcbc37226761', 0),
(2, 'Potrebitel', 'bfd59291e825b5f2bbf1eb76569f8fe7', 0),
(3, 'Cvetomird91', 'bfd59291e825b5f2bbf1eb76569f8fe7', 3),
(4, 'Nov Potrebitel', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0),
(5, 'Piter Dvrie', 'bfd59291e825b5f2bbf1eb76569f8fe7', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
