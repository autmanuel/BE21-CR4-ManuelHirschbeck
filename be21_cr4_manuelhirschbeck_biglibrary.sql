-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2024 at 05:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be21_cr4_manuelhirschbeck_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `be21_cr4_manuelhirschbeck_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be21_cr4_manuelhirschbeck_biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `isbn_code` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `type` enum('book','CD','DVD') NOT NULL,
  `author_first_name` varchar(50) NOT NULL,
  `author_last_name` varchar(50) NOT NULL,
  `publisher_name` varchar(50) NOT NULL,
  `publisher_address` varchar(200) NOT NULL,
  `publish_date` date NOT NULL,
  `availability` enum('available','reserved') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `image`, `isbn_code`, `description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `availability`) VALUES
(1, 'Harry Potter and the Sorcerer\'s Stone', 'https://m.media-amazon.com/images/I/71RVt35ZAbL._SY466_.jpg', '9780590353427', 'The first novel in the Harry Potter series by J.K. Rowling.', 'book', 'J.K.', 'Rowling', 'Scholastic Inc.', '123 Magical Street, London', '1997-06-26', 'available'),
(2, 'The Dark Side of the Moon', 'https://m.media-amazon.com/images/I/41UUPbY35tL._SX450_.jpg', '9780192773079', 'Pink Floyd\'s eighth studio album.', 'CD', 'Pink', 'Floyd', 'Harvest Records', '456 Sound Avenue, Los Angeles', '1973-03-01', 'reserved'),
(3, 'The Godfather', 'https://m.media-amazon.com/images/I/714ZOEiVNtL._AC_UY327_FMwebp_QL65_.jpg', '9780451205766', 'The son of the patriarch of the most powerful Mafia clan.', 'DVD', 'Francis', 'Ford Coppola', 'Paramount Home Entertainment', '789 Movie Street, New York', '1972-03-24', 'available'),
(4, 'The Lion King', 'https://m.media-amazon.com/images/I/81aLWmKrNVL._AC_UY327_FMwebp_QL65_.jpg', '9780786830380', 'A Disney animated film.', 'DVD', 'Walt', 'Disney', 'Walt Disney Studios', '890 Animation Avenue, Burbank', '1994-06-15', 'reserved'),
(5, '1984', 'https://m.media-amazon.com/images/I/71rpa1-kyvL._SY466_.jpg', '9780451524935', 'A dystopian novel by George Orwell.', 'book', 'George', 'Orwell', 'Secker & Warburg', '234 Fiction Street, London', '1949-06-08', 'available'),
(6, 'Abbey Road', 'https://m.media-amazon.com/images/I/61Co-XI3WGL._SX300_SY300_QL70_ML2_.jpg', '9780061770842', 'The Beatles\' eleventh studio album.', 'CD', 'The Beatles', 'The Beatles', 'Apple Records', '567 Music Street, London', '1969-09-26', 'reserved'),
(7, 'Titanic', 'https://m.media-amazon.com/images/I/71osmBH30GL._AC_UY327_FMwebp_QL65_.jpg', '9780743273565', 'A film directed by James Cameron.', 'DVD', 'James', 'Cameron', '20th Century Studios', '789 Movie Street, Hollywood', '1997-12-19', 'available'),
(8, 'The Hobbit', 'https://m.media-amazon.com/images/I/41R23wIsc-L._SY445_SX342_.jpg', '9780547928227', 'A fantasy novel by J.R.R. Tolkien.', 'book', 'J.R.R.', 'Tolkien', 'Houghton Mifflin Harcourt', '123 Fantasy Avenue, Oxford', '1937-09-21', 'reserved'),
(9, 'Thriller', 'https://m.media-amazon.com/images/I/51ABspGNBwL._SY300_SX300_QL70_ML2_.jpg', '9780192878901', 'Michael Jackson\'s iconic album.', 'CD', 'Michael', 'Jackson', 'Epic Records', '456 Record Avenue, Los Angeles', '1982-11-30', 'available'),
(10, 'Jurassic Park', 'https://m.media-amazon.com/images/I/51Sh8gB0bfL._SY445_SX342_.jpg', '9780345538987', 'A science fiction novel by Michael Crichton.', 'book', 'Michael', 'Crichton', 'Alfred A. Knopf', '456 Fiction Street, New York', '1990-11-20', 'reserved'),
(11, 'Harry Potter and the Chamber of Secrets', 'https://m.media-amazon.com/images/I/818umIdoruL._SY466_.jpg', '9780439064866', 'The second novel in the Harry Potter series by J.K. Rowling.', 'book', 'J.K.', 'Rowling', 'Scholastic Inc.', '123 Magical Street, London', '1998-07-02', 'available'),
(12, 'The Hunger Games', 'https://m.media-amazon.com/images/I/61vUUwoikBL._AC_UY218_.jpg', '9780439023481', 'The first novel in The Hunger Games trilogy by Suzanne Collins.', 'book', 'Suzanne', 'Collins', 'Scholastic Inc.', '123 Magical Street, London', '2008-09-14', 'available'),
(13, 'Wish You Were Here', 'https://m.media-amazon.com/images/I/71m0ofUWYXL._AC_UY218_.jpg', '9780888688885', 'Pink Floyd\'s ninth studio album.', 'CD', 'Pink', 'Floyd', 'Harvest Records', '456 Sound Avenue, Los Angeles', '1975-09-12', 'available'),
(14, 'The Godfather Returns', 'https://m.media-amazon.com/images/I/51V297GDZPL.jpg', '9780451211866', 'A sequel to The Godfather by Mark Winegardner.', 'book', 'Mark', 'Winegardner', 'G.P. Putnam\'s Sons', '789 Book Street, New York', '2004-11-05', 'reserved'),
(15, 'Tom Clancy Duty and Honor', 'https://m.media-amazon.com/images/I/81qmT7mfQNL._AC_UY218_.jpg', '9780399176807', 'A novel by Grant Blackwood continuing the Tom Clancy series.', 'book', 'Grant', 'Blackwood', 'G.P. Putnam\'s Sons', '789 Book Street, New York', '2016-06-14', 'reserved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
