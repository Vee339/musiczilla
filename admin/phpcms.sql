-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2025 at 01:55 AM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `poster` varchar(200) NOT NULL,
  `total_views` int(11) NOT NULL,
  `date_of_release` date NOT NULL,
  `number_of_songs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `artist_id`, `poster`, `total_views`, `date_of_release`, `number_of_songs`) VALUES
(5, 'Midnight', 8, 'midnight.jpg', 34234892, '2022-03-18', 21),
(6, 'This Is Acting', 10, 'this_is_acting.png', 85985402, '2018-09-24', 13),
(7, 'Future Nostalgia', 13, 'future_nostalgia.jpg', 87342470, '2021-07-19', 15),
(8, 'Reputation', 8, 'reputation.jpeg', 789734500, '2022-11-12', 16),
(9, 'Happier Than Ever', 11, 'happier_than_ever.png', 84373450, '2016-08-19', 14),
(10, 'Anti', 14, 'anti.jpg', 59437492, '2016-12-19', 9);

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `monthly_listeners` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `photo`, `monthly_listeners`) VALUES
(8, 'Taylor Swift', 'taylor_swift.jpg', 34398700),
(9, 'Ed Sheeran', 'ed_sheeran.jpg', 394893700),
(10, 'Sia', 'sia.jpg', 389435340),
(11, 'Billie Eilish', 'billie_eilish.jpeg', 134854800),
(12, 'Anne Marie', 'anne_marie.jpg', 345235350),
(13, 'Dua Lipa', 'dua_lipa.jpeg', 348975350),
(14, 'Rihanna', 'rihanna.jpeg', 78865450);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `date_of_release` date NOT NULL,
  `views` int(11) NOT NULL,
  `youtube_id` varchar(200) NOT NULL,
  `genre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist_id`, `album_id`, `date_of_release`, `views`, `youtube_id`, `genre`) VALUES
(6, 'Maroon', 8, 5, '2023-07-11', 18374970, 'IHMySdortig', 'Classical'),
(7, 'Bejeweled', 8, 5, '2023-07-18', 457930420, 'ywUqTGWU7ec', 'Classical'),
(8, 'Never Ending', 14, 10, '2025-04-18', 96646780, '_UL4ScAkByA', 'Hip Hop'),
(9, 'One Million Bullets', 10, 6, '2014-06-13', 12749534, '-4Ib25IUZ-Y', 'Pop'),
(10, 'Don\'t Start Now', 13, 7, '2021-06-18', 194672152, 'wd9_QCH8Eq4', 'Pop'),
(11, 'Hallucinate', 13, 7, '2020-12-30', 26846180, 'tth2GxvDZKw', 'Hip Hop'),
(12, 'I Did Somthing Bad', 8, 8, '2017-10-30', 97765834, 'xYLxUJ9v6KU', 'Pop'),
(13, 'Look What You Made Me Do', 8, 8, '2019-05-15', 12943486, 'I3Fr6iKX7VI', 'Pop');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first` varchar(25) DEFAULT NULL,
  `last` varchar(25) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `active` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `dateAdded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first`, `last`, `email`, `password`, `active`, `dateAdded`) VALUES
(1, 'Jane', 'Doe', 'email@address.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Yes', '2022-01-08 02:12:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign` (`artist_id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_album` (`album_id`),
  ADD KEY `fk_artist` (`artist_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `Foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `fk_album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_artist` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
