-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2013 at 08:11 AM
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
CREATE DATABASE IF NOT EXISTS `books` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `books`;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(250) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

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
(18, 'Роджър Зелазни');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(250) NOT NULL,
  PRIMARY KEY (`book_id`),
  KEY `book_title` (`book_title`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`) VALUES
(1, 'The Dark Knight Returns'),
(2, 'Sandworms of Dune'),
(3, 'Хъкълбери Фин'),
(9, 'Sandworms of Dune'),
(11, 'Paul of Dune'),
(6, 'Почти безобидна'),
(12, 'Том Сойер'),
(10, 'Хрониките на Амбър N1'),
(13, 'Кошерът на Хелстрьом'),
(16, 'Том Сойер');

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
(17, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
