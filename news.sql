-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 10:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `publish_date` datetime NOT NULL,
  `image` text CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `article_category` varchar(255) CHARACTER SET utf8 NOT NULL,
  `related_links` text CHARACTER SET utf8 DEFAULT NULL,
  `video` text CHARACTER SET utf8 NOT NULL,
  `tags` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Num_of_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `title`, `publish_date`, `image`, `content`, `author`, `article_category`, `related_links`, `video`, `tags`, `Num_of_views`) VALUES
(21, 'Al Ahly', '2022-05-11 14:24:14', 'ALAHLY.jpeg', '<p>                                Cairo giants Al Ahly aim to support new head coach Ricardo Soares, to accomplish something with the football team, following the great achievements by previous coach Pitso Mosimane.                            </p>                            <p>                                Al Ahly Football Company, headed by Yassin Mansour, and the club’s planning committee, headed by Mohsen Saleh, will hold an important meeting with Soares, in the presence of Mahmoud Al-Khatib, the President of the club.                            </p>', 'salma El-Sheikh', 'Policy', '', '', '', 31),
(22, 'Al SiSi', '2022-07-19 08:29:14', 'ss.jpg', '<p>                                Cairo giants Al Ahly aim to support new head coach Ricardo Soares, to accomplish something with the football team, following the great achievements by previous coach Pitso Mosimane.                            </p>                            <p>                                Al Ahly Football Company, headed by Yassin Mansour, and the club’s planning committee, headed by Mohsen Saleh, will hold an important meeting with Soares, in the presence of Mahmoud Al-Khatib, the President of the club.                            </p>', 'Sarah El-Sheikh', 'Policy', '', '', '', 18),
(23, 'madrid', '2022-07-31 19:18:33', 'ff.jpg', '<p>                                Cairo giants Al Ahly aim to support new head coach Ricardo Soares, to accomplish something with the football team, following the great achievements by previous coach Pitso Mosimane.                            </p>                            <p>                                Al Ahly Football Company, headed by Yassin Mansour, and the club’s planning committee, headed by Mohsen Saleh, will hold an important meeting with Soares, in the presence of Mahmoud Al-Khatib, the President of the club.                            </p>', 'Sarah mohamed', 'Policy', '', '', '', 12),
(40, 'sport', '2022-08-10 22:16:57', '207282.jpg', '<p>                                Cairo giants Al Ahly aim to support new head coach Ricardo Soares, to accomplish something with the football team, following the great achievements by previous coach Pitso Mosimane.                            </p>                            <p>                                Al Ahly Football Company, headed by Yassin Mansour, and the club’s planning committee, headed by Mohsen Saleh, will hold an important meeting with Soares, in the presence of Mahmoud Al-Khatib, the President of the club.                            </p>', 'ADESRTY', '', NULL, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Num_of_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `Num_of_views`) VALUES
(1, 'Policy', 1),
(2, 'Economy', 2),
(3, 'Sport', 10),
(4, 'Policy', 4),
(5, 'Economy', 12),
(6, 'Health', 5),
(7, 'Sport', 20),
(8, 'Policy', 31),
(9, 'Economy', 21),
(10, 'Health', 12),
(11, 'culture', 6),
(12, 'Health', 4),
(13, 'Sport', 8),
(14, 'Economy', 0),
(15, 'Economy', 0),
(16, 'Economy', 0),
(17, 'Economy', 0),
(18, 'Health', 0),
(19, 'Economy', 0),
(20, 'culture', 0),
(21, 'culture', 0),
(22, 'Policy', 0),
(23, 'culture', 0),
(24, 'culture', 0),
(25, 'Policy', 0),
(26, 'culture', 0),
(27, 'Economy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Num_of_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`, `Num_of_views`) VALUES
(1, 'Policy', 1),
(2, 'Economy', 1),
(3, 'Sport', 4),
(4, 'Policy', 6),
(5, 'Policy', 4),
(6, 'Policy', 2),
(7, 'Economy', 0),
(8, 'Economy', 0),
(9, 'Economy', 0),
(10, 'Economy', 0),
(11, 'Policy', 0),
(12, 'Policy', 0),
(13, 'Economy', 0),
(14, 'Economy', 0),
(15, 'Economy', 0),
(16, 'Policy', 0),
(17, 'Health', 0),
(18, 'Policy', 0),
(19, 'Culture', 0),
(20, 'Economy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` text CHARACTER SET utf8 NOT NULL,
  `position` enum('1','2','3') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `mail`, `password`, `position`) VALUES
(1, 'sa', '1234', '1'),
(2, 'arwa@gmail.com', '123456', '2');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`) VALUES
(4, 'sara.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
