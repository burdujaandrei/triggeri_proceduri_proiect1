-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 03:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adventure`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertPortofoliu` (IN `strTitle` VARCHAR(50), IN `strImage` VARCHAR(100))  BEGIN 
			INSERT INTO `portofoliu` (`title`, `image`)  VALUES (strTitle,strImage);
			END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proceduraDelete` (IN `strId` INT)  BEGIN
	        DELETE FROM portofoliu WHERE id=strId;
	    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `proceduraUpdate` (IN `strId` INT, IN `strTitle` VARCHAR(50), IN `strImage` VARCHAR(100))  BEGIN
		        UPDATE portofoliu SET title=strTitle, image=strImage WHERE id=strId;
		    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(3) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `title`, `content`, `image`) VALUES
(1, 'Plan your trip', 'Fusce elementum nisi et magna tristique, ut facilisis magna dapibus.', 'images/slider/slide1.jpg'),
(2, 'Bootstrap Theme', 'Pellentesque mollis purus ipsum. Fusce tristique ante et est placerat dignissim.', 'images/slider/slide2.jpg'),
(3, 'Mobile Ready', 'You may edit or remove any content section as you wish.', 'images/slider/slide3.jpg'),
(4, 'Responsive Design', 'Phasellus ultrices, nunc et tempus porta, tellus purus elementum.', 'images/slider/slide4.jpg'),
(5, 'Get it FREE!', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.', 'images/slider/slide5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `portofoliu`
--

CREATE TABLE `portofoliu` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portofoliu`
--

INSERT INTO `portofoliu` (`id`, `title`, `image`) VALUES
(2, 'Trip Planning', 'images/portfolio-img2.jpg'),
(3, 'Scheduling', 'images/portfolio-img3.jpg'),
(4, 'Arranging', 'images/portfolio-img4.jpg'),
(5, 'Organizing', 'images/portfolio-img5.jpg'),
(6, 'Grouping', 'images/portfolio-img6.jpg');

--
-- Triggers `portofoliu`
--
DELIMITER $$
CREATE TRIGGER `MysqlTriggerInsert` AFTER INSERT ON `portofoliu` FOR EACH ROW BEGIN
		    INSERT INTO `portofoliu_update` (`title`,`image`,`status`,`edtime`) VALUES (NEW.title,NEW.image,'INSERTED',NOW());
		    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TriggerDelete` AFTER DELETE ON `portofoliu` FOR EACH ROW BEGIN
	    INSERT INTO portofoliu_update(id,title,image,status,edtime) VALUES (NULL,OLD.title,OLD.image,'DELETED',NOW());
	    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TriggerUpdate` BEFORE UPDATE ON `portofoliu` FOR EACH ROW BEGIN
		    INSERT INTO `portofoliu_update` (`title`,`image`,`status`,`edtime`) VALUES (NEW.title,NEW.image,'UPDATED',NOW());
		    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `portofoliu_update`
--

CREATE TABLE `portofoliu_update` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `edtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portofoliu_update`
--

INSERT INTO `portofoliu_update` (`id`, `title`, `image`, `status`, `edtime`) VALUES
(8, 'Test', 'images/slider/thumb5.jpg', 'INSERTED', '2020-05-31 16:07:17'),
(9, 'Plan your tripSSSS', 'images/slider/slide1.jpg', 'UPDATED', '2020-05-31 16:24:57'),
(10, 'Plan your tripssss', 'images/slider/slide1.jpg', 'UPDATED', '2020-05-31 16:28:37'),
(11, 'Plan your tripssss', 'images/slider/slide1.jpg', 'UPDATED', '2020-05-31 16:29:10'),
(12, 'Plan your tripssss', 'images/slider/slide1.jpg', 'UPDATED', '2020-05-31 16:30:11'),
(13, 'Plan your trip', 'images/slider/slide1.jpg', 'UPDATED', '2020-05-31 16:33:04'),
(14, 'Plan your trips', 'images/slider/slide1.jpg', 'UPDATED', '2020-05-31 16:38:08'),
(15, 'Test', 'images/slider/thumb5.jpg', 'DELETED', '2020-05-31 16:43:10'),
(16, 'Plan your trips', 'images/slider/slide1.jpg', 'DELETED', '2020-05-31 16:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `work_owl`
--

CREATE TABLE `work_owl` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `delay` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_owl`
--

INSERT INTO `work_owl` (`id`, `title`, `content`, `icon`, `delay`) VALUES
(1, 'SOCIAL MEDIA', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'tools', '0.3s'),
(2, 'TRIP PLANNING', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'tablet', '0.6s'),
(3, 'WEB MARKETING', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'bike', '0.9s'),
(4, 'EXPLORING PLACES', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'flag', '0.9s'),
(5, 'RECREATIONS', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'basket', '0.9s');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofoliu`
--
ALTER TABLE `portofoliu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofoliu_update`
--
ALTER TABLE `portofoliu_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_owl`
--
ALTER TABLE `work_owl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `portofoliu`
--
ALTER TABLE `portofoliu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `portofoliu_update`
--
ALTER TABLE `portofoliu_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `work_owl`
--
ALTER TABLE `work_owl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
