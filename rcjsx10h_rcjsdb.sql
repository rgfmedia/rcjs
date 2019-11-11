-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 02:20 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rcjsx10h_rcjsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bali`
--

CREATE TABLE `bali` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `date` date NOT NULL,
  `is_paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bali`
--

INSERT INTO `bali` (`id`, `name`, `amount`, `date`, `is_paid`) VALUES
(43, 'elel', 1000, '2019-09-07', 0),
(44, 'mark', 1000, '2019-09-09', 0),
(45, 'junjun', 1000, '2019-09-07', 0),
(46, 'ruben', 2000, '2019-09-07', 0),
(47, 'momhai', 1000, '2019-09-09', 0),
(48, 'junjun', 1000, '2019-09-09', 0),
(49, 'elel', 3000, '2019-09-11', 0),
(50, 'bintoy', 1500, '2019-09-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `BNo` int(11) NOT NULL,
  `Date` varchar(25) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `CheckNo` varchar(25) NOT NULL,
  `Amount` varchar(25) NOT NULL,
  `Details` varchar(250) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `IO` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `collectibles`
--

CREATE TABLE `collectibles` (
  `id` int(11) NOT NULL,
  `collector_name` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `number_of_heads` int(11) NOT NULL,
  `total_kilo` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `collections` int(50) NOT NULL,
  `tac` int(50) NOT NULL,
  `date_collected` varchar(20) NOT NULL,
  `date_delivery` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collectibles`
--

INSERT INTO `collectibles` (`id`, `collector_name`, `customer`, `number_of_heads`, `total_kilo`, `price`, `collections`, `tac`, `date_collected`, `date_delivery`) VALUES
(676, 'yakyak', 'vina', 2, 200, 100, 5000, 5000, '2019-09-07', '2019-09-06'),
(677, 'yakyak', 'vina', 2, 200, 100, 5000, 5000, '2019-09-07', '2019-09-07'),
(678, 'reymond', 'mario', 1, 100, 100, 8000, 8000, '2019-09-07', '2019-09-06'),
(679, 'reymond', 'mario', 1, 100, 100, 8000, 8000, '2019-09-07', '2019-09-07'),
(680, 'lambong', 'lito', 3, 300, 100, 15000, 15000, '2019-09-07', '2019-09-06'),
(681, 'lambong', 'lito', 3, 300, 100, 15000, 15000, '2019-09-07', '2019-09-07'),
(682, 'momhai', 'eping', 1, 100, 100, 5000, 5000, '2019-09-07', '2019-09-06'),
(683, 'momhai', 'eping', 1, 100, 100, 5000, 5000, '2019-09-07', '2019-09-07'),
(684, 'lambong', 'daryl', 1, 100, 100, 10000, 10000, '2019-09-07', '2019-09-06'),
(685, 'lambong', 'daryl', 1, 100, 100, 10000, 10000, '2019-09-07', '2019-09-07'),
(686, 'momhai', 'ating', 3, 300, 100, 20000, 20000, '2019-09-07', '2019-09-06'),
(687, 'momhai', 'ating', 3, 300, 100, 20000, 20000, '2019-09-07', '2019-09-07'),
(688, 'yakyak', 'm.b', 1, 100, 100, 5000, 5000, '2019-09-09', '2019-09-06'),
(689, 'yakyak', 'm.b', 1, 100, 100, 5000, 5000, '2019-09-09', '2019-09-07'),
(690, 'elel', 'jun sta fe', 2, 200, 100, 5000, 5000, '2019-09-07', '2019-09-06'),
(691, 'elel', 'jun sta fe', 2, 200, 100, 5000, 5000, '2019-09-07', '2019-09-07'),
(692, 'elel', 'oyay', 2, 200, 100, 15000, 15000, '2019-09-07', '2019-09-06'),
(693, 'elel', 'oyay', 2, 200, 100, 15000, 15000, '2019-09-07', '2019-09-07'),
(694, 'reymond', 'dodong', 4, 400, 100, 5000, 5000, '2019-09-12', '2019-09-06'),
(695, 'reymond', 'dodong', 4, 400, 100, 5000, 5000, '2019-09-12', '2019-09-07'),
(696, 'reymond', 'roldan', 2, 200, 100, 5000, 5000, '2019-09-10', '2019-09-08'),
(697, 'reymond', 'roldan', 2, 200, 100, 5000, 5000, '2019-09-10', '2019-09-10'),
(698, 'elel', 'zaldy', 1, 100, 100, 5000, 5000, '2019-09-09', '2019-09-08'),
(699, 'elel', 'zaldy', 1, 100, 100, 5000, 5000, '2019-09-09', '2019-09-10'),
(700, 'lambong', 'noli', 3, 300, 100, 5000, 5000, '2019-09-10', '2019-09-08'),
(701, 'lambong', 'noli', 1, 100, 100, 5000, 5000, '2019-09-10', '2019-09-09'),
(702, 'lambong', 'noli', 3, 300, 100, 5000, 5000, '2019-09-10', '2019-09-10'),
(703, 'lambong', 'noli', 1, 100, 100, 5000, 5000, '2019-09-10', '2019-09-11'),
(704, 'elel', 'joel', 1, 100, 100, 10000, 10000, '2019-09-09', '2019-09-08'),
(705, 'elel', 'joel', 1, 100, 100, 10000, 10000, '2019-09-09', '2019-09-10'),
(706, 'yakyak', 'bryan', 1, 100, 100, 10000, 10000, '2019-09-09', '2019-09-08'),
(707, 'yakyak', 'bryan', 1, 100, 100, 10000, 10000, '2019-09-09', '2019-09-10'),
(708, 'reymond', 'lourd', 3, 300, 100, 5000, 5000, '2019-09-10', '2019-09-08'),
(709, 'reymond', 'lourd', 3, 300, 100, 5000, 5000, '2019-09-10', '2019-09-10'),
(710, 'elel', 'erika', 1, 100, 100, 5000, 5000, '2019-09-10', '2019-09-08'),
(711, 'elel', 'erika', 1, 100, 100, 5000, 5000, '2019-09-10', '2019-09-10'),
(712, 'elel', 'marisa', 2, 200, 100, 10000, 10000, '2019-09-10', '2019-09-08'),
(713, 'elel', 'marisa', 2, 200, 100, 10000, 10000, '2019-09-10', '2019-09-10'),
(714, 'lambong', 'mike', 2, 200, 100, 10000, 10000, '2019-09-09', '2019-09-08'),
(715, 'lambong', 'mike', 2, 200, 100, 10000, 10000, '2019-09-09', '2019-09-10'),
(716, 'lambong', 'carlo', 2, 200, 100, 5000, 5000, '2019-09-09', '2019-09-08'),
(717, 'lambong', 'carlo', 2, 200, 100, 5000, 5000, '2019-09-09', '2019-09-10'),
(718, 'elel', 'igme', 2, 200, 100, 10000, 10000, '2019-09-12', '2019-09-09'),
(719, 'elel', 'igme', 2, 200, 100, 10000, 10000, '2019-09-12', '2019-09-11'),
(720, 'elel', 'agida', 1, 100, 100, 2000, 2000, '2019-09-11', '2019-09-09'),
(721, 'elel', 'agida', 1, 100, 100, 2000, 2000, '2019-09-11', '2019-09-11'),
(722, 'yakyak', 'bong', 1, 100, 100, 5000, 5000, '2019-09-10', '2019-09-09'),
(723, 'yakyak', 'bong', 1, 100, 100, 5000, 5000, '2019-09-10', '2019-09-11'),
(724, 'momhai', 'noli', 3, 300, 100, 10000, 15000, '2019-09-10', '2019-09-08'),
(725, 'momhai', 'noli', 1, 100, 100, 10000, 15000, '2019-09-10', '2019-09-09'),
(726, 'momhai', 'noli', 3, 300, 100, 10000, 15000, '2019-09-10', '2019-09-10'),
(727, 'momhai', 'noli', 1, 100, 100, 10000, 15000, '2019-09-10', '2019-09-11'),
(728, 'elel', 'melchor', 3, 300, 100, 25000, 25000, '2019-09-11', '2019-09-09'),
(729, 'elel', 'melchor', 3, 300, 100, 25000, 25000, '2019-09-11', '2019-09-11'),
(730, 'reymond', 'victoria', 1, 100, 100, 5000, 5000, '2019-09-11', '2019-09-09'),
(731, 'reymond', 'victoria', 1, 100, 100, 5000, 5000, '2019-09-11', '2019-09-11'),
(732, 'elel', 'romeo', 2, 200, 100, 20000, 20000, '2019-09-11', '2019-09-09'),
(733, 'elel', 'romeo', 2, 200, 100, 20000, 20000, '2019-09-11', '2019-09-11'),
(734, 'lambong', 'poloy', 2, 200, 100, 10000, 10000, '2019-09-11', '2019-09-09'),
(735, 'lambong', 'poloy', 2, 200, 100, 10000, 10000, '2019-09-11', '2019-09-11'),
(736, 'elel', 'arthur', 2, 200, 100, 10000, 10000, '2019-09-10', '2019-09-09'),
(737, 'elel', 'arthur', 2, 200, 100, 10000, 10000, '2019-09-10', '2019-09-11'),
(738, 'lambong', 'loling', 1, 100, 100, 5000, 5000, '2019-09-12', '2019-09-12'),
(739, 'yakyak', 'palompon joseph', 3, 300, 100, 5000, 5000, '2019-09-12', '2019-09-12'),
(740, 'lambong', 'albert', 1, 100, 100, 5000, 5000, '2019-09-13', '2019-09-12'),
(741, 'momhai', 'maning', 1, 100, 100, 10000, 10000, '2019-09-13', '2019-09-12'),
(742, 'elel', 'eboy', 3, 300, 100, 5000, 5000, '2019-09-12', '2019-09-12'),
(743, 'reymond', 'neneng', 1, 100, 100, 5000, 5000, '2019-09-13', '2019-09-12'),
(744, 'lambong', 'renato', 2, 200, 100, 20000, 20000, '2019-09-13', '2019-09-12'),
(745, 'elel', 'boboy', 2, 200, 100, 10000, 10000, '2019-09-12', '2019-09-12'),
(746, 'lambong', 'winnie', 2, 200, 100, 5000, 5000, '2019-09-13', '2019-09-12'),
(747, 'elel', 'oyay', 2, 200, 100, 5000, 20000, '2019-09-12', '2019-09-06'),
(748, 'elel', 'oyay', 2, 200, 100, 5000, 20000, '2019-09-12', '2019-09-07'),
(749, 'elel', 'vina', 2, 200, 100, 5000, 10000, '2019-09-12', '2019-09-06'),
(750, 'elel', 'vina', 2, 200, 100, 5000, 10000, '2019-09-12', '2019-09-07'),
(751, 'elel', 'joel', 1, 100, 100, 12006, 22006, '2019-09-12', '2019-09-08'),
(752, 'elel', 'joel', 1, 100, 100, 12006, 22006, '2019-09-12', '2019-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `clctr_name` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `cust` varchar(50) NOT NULL,
  `tac_amount` int(50) NOT NULL,
  `chck_no` varchar(50) NOT NULL,
  `k_o_expnses` varchar(50) NOT NULL,
  `expnses_amnt` int(50) NOT NULL,
  `damage` varchar(50) NOT NULL,
  `dmg_kg` int(50) NOT NULL,
  `dmg_amount` int(50) NOT NULL,
  `bali_name` varchar(50) NOT NULL,
  `bali_amount` int(50) NOT NULL,
  `is_paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `clctr_name`, `date`, `cust`, `tac_amount`, `chck_no`, `k_o_expnses`, `expnses_amnt`, `damage`, `dmg_kg`, `dmg_amount`, `bali_name`, `bali_amount`, `is_paid`) VALUES
(385, 'yakyak', '2019-09-07', 'vina', 5000, '', 'diesel', 100, '', 0, 0, '', 0, 0),
(386, 'reymond', '2019-09-07', 'mario', 8000, '', 'meals', 100, '', 0, 0, 'elel', 1000, 0),
(387, 'lambong', '2019-09-07', 'lito', 15000, '', 'meals', 100, 'karne', 1, 100, '', 0, 0),
(388, 'momhai', '2019-09-07', 'eping', 5000, '', '', 0, '', 0, 0, '', 0, 0),
(389, 'lambong', '2019-09-07', 'daryl', 10000, '', 'diesel', 100, '', 0, 0, '', 0, 0),
(390, 'momhai', '2019-09-07', 'ating', 20000, '', '', 0, '', 0, 0, '', 0, 0),
(391, 'yakyak', '2019-09-09', 'm.b', 5000, '', 'meals', 100, '', 0, 0, 'mark', 1000, 0),
(392, 'elel', '2019-09-07', 'jun sta fe', 5000, '', 'diesel', 100, '', 0, 0, 'junjun', 1000, 0),
(393, 'elel', '2019-09-07', 'oyay', 15000, '', 'diesel', 100, '', 0, 0, 'ruben', 2000, 0),
(394, 'reymond', '2019-09-12', 'dodong', 5000, '2000347', 'diesel', 100, '', 0, 0, '', 0, 0),
(395, 'reymond', '2019-09-09', 'kaloy', 5000, '', 'diesel', 100, '', 0, 0, '', 0, 1),
(396, 'reymond', '2019-09-10', 'roldan', 5000, '2000347', 'diesel', 100, '', 0, 0, '', 0, 0),
(397, 'elel', '2019-09-09', 'zaldy', 5000, '', 'diesel', 100, '', 0, 0, 'momhai', 1000, 0),
(398, 'lambong', '2019-09-10', 'noli', 5000, '', '', 0, '', 0, 0, '', 0, 0),
(399, 'elel', '2019-09-09', 'joel', 10000, '', 'diesel', 100, '', 0, 0, '', 0, 1),
(400, 'yakyak', '2019-09-09', 'bryan', 10000, '', 'diesel', 100, '', 0, 0, 'junjun', 1000, 0),
(401, 'reymond', '2019-09-10', 'lourd', 5000, '', 'meals', 100, '', 0, 0, '', 0, 0),
(402, 'elel', '2019-09-10', 'erika', 5000, '', '', 0, '', 0, 0, '', 0, 0),
(403, 'elel', '2019-09-10', 'marisa', 10000, '', 'diesel', 100, '', 0, 0, '', 0, 0),
(404, 'lambong', '2019-09-09', 'mike', 10000, '', 'diesel', 100, '', 0, 0, '', 0, 0),
(405, 'lambong', '2019-09-09', 'carlo', 5000, '', '', 0, '', 0, 0, '', 0, 0),
(406, 'elel', '2019-09-12', 'igme', 10000, '', 'diesel', 100, '', 0, 0, '', 0, 0),
(407, 'elel', '2019-09-11', 'agida', 2000, '', 'diesel', 100, '', 0, 0, '', 0, 0),
(408, 'yakyak', '2019-09-10', 'bong', 5000, '', '', 0, '', 0, 0, '', 0, 0),
(409, 'momhai', '2019-09-10', 'noli', 10000, '', '', 0, '', 0, 0, '', 0, 0),
(410, 'elel', '2019-09-11', 'melchor', 25000, '', 'diesel', 100, '', 0, 0, 'elel', 3000, 0),
(411, 'reymond', '2019-09-11', 'victoria', 5000, '', '', 0, '', 0, 0, '', 0, 0),
(412, 'elel', '2019-09-11', 'romeo', 20000, '', 'diesel', 100, '', 0, 0, '', 0, 0),
(413, 'lambong', '2019-09-11', 'poloy', 10000, '', '', 0, '', 0, 0, '', 0, 0),
(414, 'elel', '2019-09-10', 'arthur', 10000, '', 'diesel', 100, '', 0, 0, '', 0, 0),
(415, 'lambong', '2019-09-12', 'loling', 5000, '', '', 0, '', 0, 0, '', 0, 0),
(416, 'yakyak', '2019-09-12', 'palompon joseph', 5000, '', 'diesel', 100, '', 0, 0, '', 0, 0),
(417, 'lambong', '2019-09-13', 'albert', 5000, '2000347', 'diesel', 100, '', 0, 0, '', 0, 0),
(418, 'momhai', '2019-09-13', 'maning', 10000, '', 'meals', 100, '', 0, 0, '', 0, 1),
(419, 'elel', '2019-09-12', 'eboy', 5000, '', '', 0, '', 0, 0, '', 0, 0),
(420, 'reymond', '2019-09-13', 'neneng', 5000, '', '', 0, '', 0, 0, '', 0, 0),
(421, 'lambong', '2019-09-13', 'renato', 20000, '', 'diesel', 100, '', 0, 0, '', 0, 1),
(422, 'elel', '2019-09-12', 'boboy', 10000, '', '', 0, '', 0, 0, '', 0, 0),
(423, 'lambong', '2019-09-13', 'winnie', 5000, '', '', 0, '', 0, 0, '', 0, 0),
(424, 'elel', '2019-09-12', 'oyay', 5000, '', '', 0, '', 0, 0, '', 0, 0),
(425, 'elel', '2019-09-12', 'vina', 5000, '', '', 0, '', 0, 0, '', 0, 0),
(426, 'elel', '2019-09-12', 'joel', 12006, '2000347', '', 0, '', 0, 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `D_ID` int(11) NOT NULL,
  `Date` varchar(15) NOT NULL DEFAULT '',
  `Name` varchar(50) NOT NULL,
  `Mark_No` varchar(5) NOT NULL,
  `Num_Heads` int(50) NOT NULL,
  `Kg` int(10) NOT NULL,
  `Price` int(50) NOT NULL,
  `Date_Created` varchar(25) NOT NULL,
  `is_paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`D_ID`, `Date`, `Name`, `Mark_No`, `Num_Heads`, `Kg`, `Price`, `Date_Created`, `is_paid`) VALUES
(1997, '2019-09-06', 'vina', '1', 1, 100, 100, '2019-09-12 22:38:21', 0),
(1998, '2019-09-06', 'vina', '2', 2, 100, 100, '2019-09-12 22:39:30', 0),
(2000, '2019-09-06', 'mario', '1', 1, 100, 100, '2019-09-12 22:39:40', 0),
(2120, '2019-09-07', 'vina', '1', 1, 100, 100, '2019-09-12 22:49:13', 0),
(2121, '2019-09-07', 'vina', '2', 2, 100, 100, '2019-09-12 22:49:32', 0),
(2122, '2019-09-07', 'mario', '1', 1, 100, 100, '2019-09-12 22:49:48', 0),
(2123, '2019-09-07', 'lito', '1', 1, 100, 100, '2019-09-12 22:50:08', 0),
(2124, '2019-09-07', 'lito', '2', 2, 100, 100, '2019-09-12 22:50:24', 0),
(2125, '2019-09-07', 'lito', '3', 3, 100, 100, '2019-09-12 22:50:42', 0),
(2126, '2019-09-07', 'eping', '1', 1, 100, 100, '2019-09-12 22:51:03', 0),
(2127, '2019-09-07', 'daryl', '1', 1, 100, 100, '2019-09-12 22:51:22', 0),
(2128, '2019-09-07', 'ating', '1', 1, 100, 100, '2019-09-12 22:51:43', 0),
(2129, '2019-09-07', 'ating', '2', 2, 100, 100, '2019-09-12 22:52:03', 0),
(2130, '2019-09-07', 'ating', '3', 3, 100, 100, '2019-09-12 22:52:20', 0),
(2131, '2019-09-07', 'm.b', '1', 1, 100, 100, '2019-09-12 22:52:38', 0),
(2132, '2019-09-07', 'jun sta fe', '1', 1, 100, 100, '2019-09-12 22:53:06', 0),
(2133, '2019-09-07', 'jun sta fe', '2', 2, 100, 100, '2019-09-12 22:53:21', 0),
(2134, '2019-09-07', 'oyay', '1', 1, 100, 100, '2019-09-12 22:53:39', 0),
(2135, '2019-09-07', 'oyay', '2', 2, 100, 100, '2019-09-12 22:53:54', 0),
(2136, '2019-09-07', 'dodong', '1', 1, 100, 100, '2019-09-12 22:54:10', 0),
(2137, '2019-09-08', 'roldan', '1', 1, 100, 100, '2019-09-12 22:56:12', 0),
(2138, '2019-09-08', 'roldan', '2', 2, 100, 100, '2019-09-12 22:56:29', 0),
(2139, '2019-09-08', 'zaldy', '1', 1, 100, 100, '2019-09-12 22:56:44', 0),
(2140, '2019-09-08', 'noli', '1', 1, 100, 100, '2019-09-12 22:57:05', 0),
(2141, '2019-09-08', 'noli', '2', 2, 100, 100, '2019-09-12 22:57:21', 0),
(2142, '2019-09-08', 'noli', '3', 3, 100, 100, '2019-09-12 22:57:43', 0),
(2143, '2019-09-08', 'joel', '1', 1, 100, 100, '2019-09-12 22:58:02', 1),
(2144, '2019-09-08', 'bryan', '1', 1, 100, 100, '2019-09-12 22:59:06', 0),
(2145, '2019-09-08', 'lourd', '1', 1, 100, 100, '2019-09-12 22:59:22', 0),
(2146, '2019-09-08', 'lourd', '2', 2, 100, 100, '2019-09-12 22:59:38', 0),
(2147, '2019-09-08', 'lourd', '3', 3, 100, 100, '2019-09-12 22:59:56', 0),
(2148, '2019-09-08', 'erika', '1', 1, 100, 100, '2019-09-12 23:00:13', 0),
(2149, '2019-09-08', 'marisa', '1', 1, 100, 100, '2019-09-12 23:00:31', 0),
(2150, '2019-09-08', 'marisa', '2', 2, 100, 100, '2019-09-12 23:00:48', 0),
(2151, '2019-09-08', 'mike', '1', 1, 100, 100, '2019-09-12 23:01:09', 0),
(2152, '2019-09-08', 'mike', '2', 2, 100, 100, '2019-09-12 23:01:25', 0),
(2153, '2019-09-08', 'carlo', '1', 1, 100, 100, '2019-09-12 23:01:39', 0),
(2154, '2019-09-08', 'carlo', '2', 2, 100, 100, '2019-09-12 23:01:55', 0),
(2155, '2019-09-09', 'igme', '1', 1, 100, 100, '2019-09-12 23:03:45', 0),
(2156, '2019-09-09', 'igme', '2', 2, 100, 100, '2019-09-12 23:04:00', 0),
(2157, '2019-09-09', 'agida', '1', 1, 100, 100, '2019-09-12 23:04:21', 0),
(2158, '2019-09-09', 'r.b', '1', 1, 100, 100, '2019-09-12 23:04:38', 0),
(2159, '2019-09-09', 'r.b', '2', 2, 100, 100, '2019-09-12 23:04:53', 0),
(2160, '2019-09-09', 'r.b', '3', 3, 100, 100, '2019-09-12 23:05:09', 0),
(2161, '2019-09-09', 'bong', '1', 1, 100, 100, '2019-09-12 23:05:27', 0),
(2162, '2019-09-09', 'noli', '1', 1, 100, 100, '2019-09-12 23:05:53', 0),
(2163, '2019-09-09', 'melchor', '1', 1, 100, 100, '2019-09-12 23:06:29', 0),
(2164, '2019-09-09', 'melchor', '2', 2, 100, 100, '2019-09-12 23:06:46', 0),
(2165, '2019-09-09', 'melchor', '3', 3, 100, 100, '2019-09-12 23:07:05', 0),
(2166, '2019-09-09', 'victoria', '1', 1, 100, 100, '2019-09-12 23:07:21', 0),
(2167, '2019-09-09', 'romeo', '1', 1, 100, 100, '2019-09-12 23:07:38', 0),
(2168, '2019-09-09', 'romeo', '2', 2, 100, 100, '2019-09-12 23:07:59', 0),
(2169, '2019-09-09', 'poloy', '1', 1, 100, 100, '2019-09-12 23:08:26', 0),
(2170, '2019-09-09', 'poloy', '2', 2, 100, 100, '2019-09-12 23:08:41', 0),
(2171, '2019-09-09', 'arthur', '1', 1, 100, 100, '2019-09-12 23:08:59', 0),
(2172, '2019-09-09', 'arthur', '2', 2, 100, 100, '2019-09-12 23:09:17', 0),
(2173, '2019-09-10', 'roldan', '1', 1, 100, 100, '2019-09-12 23:09:53', 0),
(2174, '2019-09-10', 'roldan', '2', 2, 100, 100, '2019-09-12 23:10:11', 0),
(2175, '2019-09-10', 'zaldy', '1', 1, 100, 100, '2019-09-12 23:10:26', 0),
(2176, '2019-09-10', 'noli', '1', 1, 100, 100, '2019-09-12 23:10:55', 0),
(2177, '2019-09-10', 'noli', '2', 2, 100, 100, '2019-09-12 23:11:14', 0),
(2178, '2019-09-10', 'noli', '3', 3, 100, 100, '2019-09-12 23:11:32', 0),
(2179, '2019-09-10', 'joel', '1', 1, 100, 100, '2019-09-12 23:11:47', 1),
(2180, '2019-09-10', 'bryan', '1', 1, 100, 100, '2019-09-12 23:12:44', 0),
(2181, '2019-09-10', 'lourd', '1', 1, 100, 100, '2019-09-12 23:13:04', 0),
(2182, '2019-09-10', 'lourd', '2', 2, 100, 100, '2019-09-12 23:13:18', 0),
(2183, '2019-09-10', 'lourd', '3', 3, 100, 100, '2019-09-12 23:13:35', 0),
(2184, '2019-09-10', 'erika', '1', 1, 100, 100, '2019-09-12 23:13:51', 0),
(2185, '2019-09-10', 'marisa', '1', 1, 100, 100, '2019-09-12 23:14:14', 0),
(2186, '2019-09-10', 'marisa', '2', 2, 100, 100, '2019-09-12 23:14:29', 0),
(2187, '2019-09-10', 'mike', '1', 1, 100, 100, '2019-09-12 23:14:45', 0),
(2188, '2019-09-10', 'mike', '2', 2, 100, 100, '2019-09-12 23:15:01', 0),
(2189, '2019-09-10', 'carlo', '1', 1, 100, 100, '2019-09-12 23:15:15', 0),
(2190, '2019-09-10', 'carlo', '2', 2, 100, 100, '2019-09-12 23:15:31', 0),
(2191, '2019-09-11', 'igme', '1', 1, 100, 100, '2019-09-12 23:15:47', 0),
(2192, '2019-09-11', 'igme', '2', 2, 100, 100, '2019-09-12 23:16:01', 0),
(2193, '2019-09-11', 'agida', '1', 1, 100, 100, '2019-09-12 23:16:20', 0),
(2194, '2019-09-11', 'r.b', '1', 1, 100, 100, '2019-09-12 23:16:42', 0),
(2195, '2019-09-11', 'r.b', '2', 2, 100, 100, '2019-09-12 23:16:56', 0),
(2196, '2019-09-11', 'r.b', '3', 3, 100, 100, '2019-09-12 23:17:18', 0),
(2197, '2019-09-11', 'bong', '1', 1, 100, 100, '2019-09-12 23:17:45', 0),
(2198, '2019-09-11', 'noli', '1', 1, 100, 100, '2019-09-12 23:18:01', 0),
(2199, '2019-09-11', 'melchor', '1', 1, 100, 100, '2019-09-12 23:18:18', 0),
(2200, '2019-09-11', 'melchor', '2', 2, 100, 100, '2019-09-12 23:18:37', 0),
(2201, '2019-09-11', 'melchor', '3', 3, 100, 100, '2019-09-12 23:18:54', 0),
(2202, '2019-09-11', 'victoria', '1', 1, 100, 100, '2019-09-12 23:19:10', 0),
(2203, '2019-09-11', 'romeo', '1', 1, 100, 100, '2019-09-12 23:19:29', 0),
(2204, '2019-09-11', 'romeo', '2', 2, 100, 100, '2019-09-12 23:19:46', 0),
(2205, '2019-09-11', 'poloy', '1', 1, 100, 100, '2019-09-12 23:20:06', 0),
(2206, '2019-09-11', 'poloy', '2', 2, 100, 100, '2019-09-12 23:20:21', 0),
(2207, '2019-09-11', 'arthur', '1', 1, 100, 100, '2019-09-12 23:20:39', 0),
(2208, '2019-09-11', 'arthur', '2', 2, 100, 100, '2019-09-12 23:20:53', 0),
(2209, '2019-09-06', 'lito', '1', 1, 100, 100, '2019-09-12 23:28:29', 0),
(2210, '2019-09-06', 'lito', '2', 2, 100, 100, '2019-09-12 23:28:44', 0),
(2211, '2019-09-06', 'lito', '3', 3, 100, 100, '2019-09-12 23:29:00', 0),
(2212, '2019-09-06', 'eping', '1', 1, 100, 100, '2019-09-12 23:29:17', 0),
(2213, '2019-09-06', 'daryl', '1', 1, 100, 100, '2019-09-12 23:29:31', 0),
(2214, '2019-09-06', 'ating', '1', 1, 100, 100, '2019-09-12 23:29:46', 0),
(2215, '2019-09-06', 'ating', '2', 2, 100, 100, '2019-09-12 23:30:07', 0),
(2216, '2019-09-06', 'ating', '3', 3, 100, 100, '2019-09-12 23:30:28', 0),
(2217, '2019-09-06', 'm.b', '1', 1, 100, 100, '2019-09-12 23:30:46', 0),
(2218, '2019-09-06', 'jun sta fe', '1', 1, 100, 100, '2019-09-12 23:31:05', 0),
(2219, '2019-09-06', 'jun sta fe', '2', 2, 100, 100, '2019-09-12 23:31:22', 0),
(2220, '2019-09-06', 'oyay', '1', 1, 100, 100, '2019-09-12 23:31:39', 0),
(2221, '2019-09-06', 'oyay', '2', 2, 100, 100, '2019-09-12 23:31:54', 0),
(2222, '2019-09-06', 'dodong', '1', 1, 100, 100, '2019-09-12 23:32:13', 0),
(2223, '2019-09-06', 'dodong', '2', 2, 100, 100, '2019-09-12 23:32:26', 0),
(2224, '2019-09-07', 'dodong', '2', 2, 100, 100, '2019-09-12 23:33:23', 0),
(2225, '2019-09-12', 'kokoy', '1', 1, 100, 100, '2019-09-12 23:36:27', 0),
(2226, '2019-09-12', 'kokoy', '2', 2, 100, 100, '2019-09-12 23:36:47', 0),
(2227, '2019-09-12', 'loling', '1', 1, 100, 100, '2019-09-12 23:37:03', 0),
(2228, '2019-09-12', 'palompon joseph', '1', 1, 100, 100, '2019-09-12 23:37:51', 0),
(2229, '2019-09-12', 'palompon joseph', '2', 2, 100, 100, '2019-09-12 23:38:04', 0),
(2230, '2019-09-12', 'palompon joseph', '3', 3, 100, 100, '2019-09-12 23:38:20', 0),
(2231, '2019-09-12', 'albert', '1', 1, 100, 100, '2019-09-12 23:38:35', 0),
(2232, '2019-09-12', 'maning', '1', 1, 100, 100, '2019-09-12 23:38:49', 1),
(2233, '2019-09-12', 'eboy', '1', 1, 100, 100, '2019-09-12 23:39:10', 0),
(2234, '2019-09-12', 'eboy', '2', 2, 100, 100, '2019-09-12 23:39:46', 0),
(2235, '2019-09-12', 'eboy', '3', 3, 100, 100, '2019-09-12 23:40:04', 0),
(2236, '2019-09-12', 'neneng', '1', 1, 100, 100, '2019-09-12 23:40:29', 0),
(2237, '2019-09-12', 'renato', '1', 1, 100, 100, '2019-09-12 23:41:05', 1),
(2238, '2019-09-12', 'renato', '2', 2, 100, 100, '2019-09-12 23:41:19', 1),
(2239, '2019-09-12', 'boboy', '1', 1, 100, 100, '2019-09-12 23:41:33', 0),
(2240, '2019-09-12', 'boboy', '2', 2, 100, 100, '2019-09-12 23:41:49', 0),
(2241, '2019-09-12', 'winnie', '1', 1, 100, 100, '2019-09-12 23:42:16', 0),
(2242, '2019-09-12', 'winnie', '2', 2, 100, 100, '2019-09-12 23:42:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `salary` int(10) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `position`, `name`, `salary`, `date`) VALUES
(52, 'driver', 'bintoy', 5000, '2019-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `farm` varchar(50) NOT NULL,
  `ahente_name` varchar(50) NOT NULL,
  `ahente_price` int(10) NOT NULL,
  `SOP` int(10) NOT NULL,
  `reynan` int(10) NOT NULL,
  `driver` int(10) NOT NULL,
  `labor` int(10) NOT NULL,
  `truck` int(10) NOT NULL,
  `expenses` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `farm`, `ahente_name`, `ahente_price`, `SOP`, `reynan`, `driver`, `labor`, `truck`, `expenses`) VALUES
(1, '2019-11-08', 'Trome', 'CHoOx', 200, 201, 202, 203, 204, 205, 206),
(2, '2019-11-01', 'Dona Farm', 'CHoOx 2', 200, 100, 100, 100, 100, 100, 100);

-- --------------------------------------------------------

--
-- Table structure for table `kapital`
--

CREATE TABLE `kapital` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `farm` varchar(50) NOT NULL,
  `ss_heads` int(10) NOT NULL,
  `ss_kilos` int(10) NOT NULL,
  `ts_heads` int(10) NOT NULL,
  `ts_kilos` int(10) NOT NULL,
  `s_heads` int(10) NOT NULL,
  `s_kilos` int(10) NOT NULL,
  `s_feeds` int(10) NOT NULL,
  `rip` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `remittance` int(10) NOT NULL,
  `bali` int(10) NOT NULL,
  `collectible` int(10) NOT NULL,
  `transaction` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kapital`
--

INSERT INTO `kapital` (`id`, `date`, `farm`, `ss_heads`, `ss_kilos`, `ts_heads`, `ts_kilos`, `s_heads`, `s_kilos`, `s_feeds`, `rip`, `total`, `remittance`, `bali`, `collectible`, `transaction`) VALUES
(1, '2019-11-01', 'Trome', 89, 4000, 126, 12600, 0, 0, 0, 0, -8600, 344406, 11500, 902994, 1),
(2, '2019-11-01', 'Dona Farm', 89, 4000, 126, 12600, 0, 0, 0, 0, -8600, 344406, 11500, 902994, 1),
(3, '2019-11-03', 'Camlla', 89, 4000, 126, 12600, 0, 0, 0, 0, -8600, 344406, 11500, 902994, 2),
(4, '2019-11-08', 'Trome', 89, 4000, 126, 12600, 0, 0, 0, 0, -8600, 344406, 11500, 902994, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kumprada`
--

CREATE TABLE `kumprada` (
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `driver` varchar(50) NOT NULL,
  `farm` varchar(50) NOT NULL,
  `no_pigs` int(20) NOT NULL,
  `pig_kilo` int(20) NOT NULL,
  `pig_price` int(30) NOT NULL,
  `feeds_kilo` int(10) NOT NULL,
  `feeds_price` int(10) NOT NULL,
  `total_expenses` int(10) NOT NULL,
  `is_paid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kumprada`
--

INSERT INTO `kumprada` (`id`, `date`, `driver`, `farm`, `no_pigs`, `pig_kilo`, `pig_price`, `feeds_kilo`, `feeds_price`, `total_expenses`, `is_paid`) VALUES
(1, '2019-11-01', 'Hilario', 'Trome', 40, 1000, 10000, 50, 1200, 1500, 0),
(2, '2019-11-03', 'Bintoy', 'Camlla', 150, 1000, 10000, 1, 0, 0, 0),
(3, '2019-11-08', 'Ronny', 'Trome', 15, 1000, 10000, 50, 1200, 0, 0),
(4, '2019-11-01', 'Dona', 'Dona Farm', 10, 1000, 10000, 50, 1200, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pig_stocks`
--

CREATE TABLE `pig_stocks` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `driver` varchar(50) NOT NULL,
  `kind` varchar(50) NOT NULL,
  `no_heads` int(50) NOT NULL,
  `kilos` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sumada`
--

CREATE TABLE `sumada` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `kind` varchar(50) NOT NULL,
  `sacks` varchar(20) NOT NULL,
  `no_pigs` int(10) NOT NULL,
  `kilos` int(10) NOT NULL,
  `expenses` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `roles` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `roles`, `username`, `password`, `created_at`) VALUES
(1, 'Bossing Vic', 'admin', 'admin', '$2y$10$JU5pWaSfkcsS59nNXNZo1ueOLT.Lwc.I8Ts1zPPSUfVtGBQly3ItS', '2019-02-20 15:43:12'),
(2, 'Angel Locsin', 'secretary', 'secretary', '$2y$10$ok2fruJ9G7.H2crhN5QAeObFDKIZ6AlqPgTuKZraJrrCKJX4UTqre', '2019-04-04 00:00:00'),
(3, 'Richard Gomez', 'secretary', 'richard', '$2y$10$5GWF8vdkPkCLmpsuSXIrEuWdXYZmuCsCDiFfsPZecMfpoq/qGpk1m', '2019-04-22 22:08:35'),
(4, 'Pedro Pendoko', 'admin', 'juandelacruz', '$2y$10$SYD3bMp2KnT8XWJTqtErxe3/VtE/iUU.mG3WqzumrJ0lULOMWuLgu', '2019-04-22 22:11:21'),
(5, 'rcsj', 'admin', 'rcsj', '$2y$10$okld5ncIZYQku3peLGvdB.9PJwfRcRVHnOxstSV5jCHMN80O1q7K6', '2019-04-24 11:59:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bali`
--
ALTER TABLE `bali`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`BNo`);

--
-- Indexes for table `collectibles`
--
ALTER TABLE `collectibles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`D_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kapital`
--
ALTER TABLE `kapital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kumprada`
--
ALTER TABLE `kumprada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pig_stocks`
--
ALTER TABLE `pig_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumada`
--
ALTER TABLE `sumada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bali`
--
ALTER TABLE `bali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `BNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collectibles`
--
ALTER TABLE `collectibles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=753;

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=427;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2243;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kapital`
--
ALTER TABLE `kapital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kumprada`
--
ALTER TABLE `kumprada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pig_stocks`
--
ALTER TABLE `pig_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sumada`
--
ALTER TABLE `sumada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
