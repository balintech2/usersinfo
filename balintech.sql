-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2023 at 11:17 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balintech`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

DROP TABLE IF EXISTS `accessories`;
CREATE TABLE IF NOT EXISTS `accessories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(50) NOT NULL,
  `ipAddress` varchar(50) NOT NULL,
  `mainBoard` varchar(50) NOT NULL,
  `cpu` varchar(50) NOT NULL,
  `VGA` varchar(50) NOT NULL,
  `RAM` varchar(50) NOT NULL,
  `HDD` varchar(50) NOT NULL,
  `Opration_System` varchar(50) NOT NULL,
  `Mouse` varchar(50) NOT NULL,
  `KeyBouard` varchar(50) NOT NULL,
  `Monitor` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `reg_username` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `user_fullname`, `ipAddress`, `mainBoard`, `cpu`, `VGA`, `RAM`, `HDD`, `Opration_System`, `Mouse`, `KeyBouard`, `Monitor`, `department`, `reg_username`) VALUES
(56, 'حسن صیدی', '192.168.2.160', '7', '32', '65', '84', '100', '107', '115', '122', '137', 'Engineering', 'mohammad'),
(52, 'منا دربان', '192.168.2.45	', '9', '34', '59', '84', '101', '107', '112', '122', '137', 'Managment', 'mohammad'),
(51, 'محمد کاکاوند	', '192.168.2.77', '6', '31', '64', '87', '96', '107', '112', '122', '155', 'Informatics', 'mohammad'),
(50, 'سمانه رسالتی', '192.168.2.9', '5', '30', '63', '86', '99', '107', '114', '125', '141', 'Informatics', 'mohammad'),
(48, 'سعید عباسی	', '192.168.2.18	', '1', '28', '61', '85', '96', '108', '112', '123', '139', 'Managment', 'mohammad'),
(55, 'محمدرضا روحی', '192.168.2.196	', '8', '33', '66', '88', '99', '107', '112', '127', '143', 'Engineering', 'mohammad'),
(53, 'علی حاج طاهری', '192.168.2.56', '7', '32', '65', '84', '100', '107', '112', '128', '144', 'Engineering', 'mohammad'),
(54, 'حامد احمدی', '192.168.2.47', '8', '33', '66', '88', '99', '107', '110', '127', '137', 'Engineering', 'mohammad'),
(29, 'سید حسین حسینی', '192.168.2.6', '1', '25', '58', '83', '96', '106', '110', '122', '136', 'Managment', 'mohammad'),
(47, 'شیرین میر شجاعی	', '192.168.2.8	', '3', '27', '60', '83', '97', '108', '111', '122', '138', 'Managment', 'mohammad'),
(49, 'انتظامات(رحمانی)	', '192.168.2.95', '4', '29', '62', '83', '98', '107', '113', '124', '150', 'Managment', 'mohammad'),
(46, 'محمد رحمانی', '192.168.2.40', '2', '26', '59', '84', '97', '107', '115', '122', '137', 'Managment', 'mohammad'),
(57, 'FR', '192.168.2.22	', '17', '38', '67', '91', '98', '108', '112', '122', '137', 'Logistic', 'mohammad'),
(58, 'بیژن محمد قلیها	', '192.168.2.59', '16', '41', '72', '89', '96', '108', '116', '126', '146', 'Logistic', 'mohammad'),
(59, 'سجاد جبلی	', '192.168.2.21', '15', '40', '71', '90', '98', '108', '112', '122', '137', 'Logistic', 'mohammad'),
(60, 'محمد امینی	', '192.168.2.23	', '17', '39', '70', '91', '103', '108', '112', '122', '137', 'Logistic', 'mohammad'),
(61, 'روح اله صادقی', '192.168.2.12', '1', '38', '62', '83', '103', '108', '112', '129', '145', 'Logistic', 'mohammad'),
(62, 'زهرا قربانی', '192.168.2.55', '13', '37', '64', '90', '96', '106', '112', '128', '137', 'Logistic', 'mohammad'),
(63, 'پرستو دمرچی	', '192.168.2.13', '12', '27', '69', '90', '96', '106', '110', '127', '137', 'Logistic', 'mohammad'),
(64, 'مهرداد بهرامی', '192.168.2.50', '11', '36', '68', '87', '97', '106', '112', '127', '137', 'Logistic', 'mohammad'),
(65, 'شیوا طاهرخانی', '192.168.2.199	', '10', '35', '67', '89', '96', '106', '115', '122', '143', 'Logistic', 'mohammad'),
(66, 'مهدی غفوری', '--', '3', '50', '78', '92', '97', '107', '115', '133', '154', 'Production', 'mohammad'),
(67, 'بهزاد رضاقلی', '192.168.2.29', '11', '36', '59', '87', '96', '107', '115', '127', '153', 'Production', 'mohammad'),
(68, 'محمد صادق مالک	', '192.168.2.24', '11', '49', '73', '95', '96', '106', '110', '122', '152', 'Production', 'mohammad'),
(69, 'مهدی حکیمیان', '192.168.2.25', '21', '25', '59', '87', '96', '106', '121', '122', '151', 'Production', 'mohammad'),
(70, 'پرستو عدل	', '192.168.2.7	', '6', '54', '67', '89', '96', '108', '116', '134', '150', 'Official', 'mohammad'),
(71, 'سحر نوذری	', '192.168.2.51', '13', '53', '64', '90', '96', '107', '117', '130', '152', 'Official', 'mohammad'),
(72, 'مهسا لشگری	', '192.168.2.80', '13', '52', '64', '90', '97', '107', '117', '130', '147', 'Official', 'mohammad'),
(73, 'بهزاد عبدالهی', '192.168.2.58', '3', '26', '74', '86', '97', '107', '117', '130', '156', 'Official', 'mohammad'),
(74, 'فرشید محمد بیگی', '192.168.2.82', '17', '35', '67', '83', '97', '106', '115', '129', '155', 'Official', 'mohammad'),
(75, 'FIL', '192.168.2.113', '19', '35', '67', '85', '105', '108', '114', '129', '151', 'EquipmentProduction', 'mohammad'),
(76, 'NEW WAY	', '192.168.2.116', '24', '57', '81', '89', '96', '108', '114', '125', '160', 'EquipmentProduction', 'mohammad'),
(77, 'MVC 1000', '192.168.2.111	', '23', '56', '82', '95', '99', '108', '115', '122', '151', 'EquipmentProduction', 'mohammad'),
(78, 'MVC 720	', '192.168.2.114	', '22', '25', '81', '89', '97', '108', '115', '135', '151', 'EquipmentProduction', 'mohammad'),
(79, 'داوود خدابنده	', '192.168.2.90	', '11', '55', '80', '87', '97', '107', '120', '129', '159', 'EquipmentProduction', 'mohammad'),
(80, 'حسین علی شیخ', '192.168.2.110', '11', '32', '79', '86', '105', '107', '115', '125', '139', 'EquipmentProduction', 'mohammad'),
(82, 'مهدی نجفی', '192.168.2.31', '11', '36', '73', '90', '96', '106', '112', '127', '138', 'Quallity', 'mohammad'),
(83, 'مهدی غلامی خواه', '192.168.2.30', '18', '26', '75', '86', '96', '107', '117', '130', '147', 'Quallity', 'mohammad'),
(84, 'محمد مالامیر', '192.168.2.21', '5', '30', '67', '92', '96', '108', '118', '122', '148', 'Quallity', 'mohammad'),
(85, 'آزمایشگاه', '192.168.2.36', '19', '43', '67', '85', '98', '108', '110', '131', '149', 'Quallity', 'mohammad'),
(86, 'TazminBT2', '192.168.2', '5', '44', '75', '90', '98', '108', '119', '132', '147', 'Quallity', 'mohammad'),
(87, 'مهدی طالب خواه	', '190.168.2.66', '1', '38', '77', '93', '98', '108', '115', '128', '147', 'Quallity', 'mohammad'),
(88, 'Lasser1', '--', '3', '46', '67', '94', '104', '108', '120', '132', '138', 'Quallity', 'mohammad'),
(89, 'Lasser2', '--', '3', '47', '67', '94', '104', '109', '121', '125', '150', 'Quallity', 'mohammad');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `score`) VALUES
(1, 'ASUSTek P5KPL', 'MainBoard', 50),
(2, 'ASUS Z710', 'MainBoard', 80),
(3, 'Intel HP', 'MainBoard', 45),
(4, 'GigaByte EP31', 'MainBoard', 55),
(5, 'ASUS TEK H110m', 'MainBoard', 70),
(6, 'ASUS TEK H81-Pluse', 'MainBoard', 65),
(7, 'GigaByte TUFZ370', 'MainBoard', 84),
(8, 'GigaByte z690', 'MainBoard', 95),
(9, 'GigaByte B365m', 'MainBoard', 80),
(10, 'ASUS P5G412', 'MainBoard', 55),
(11, 'ASUS P8H61', 'MainBoard', 70),
(12, 'GigaByte', 'MainBoard', 60),
(13, 'Hewlett 18E7', 'MainBoard', 68),
(14, 'Hewlett ASUS TEK', 'MainBoard', 63),
(15, 'AS Rock N68 Gs3', 'MainBoard', 63),
(16, 'AS Rock G41m', 'MainBoard', 50),
(17, 'ASUS TEK', 'MainBoard', 60),
(18, 'Skylake Q170', 'MainBoard', 60),
(19, 'Gigabyte G31m', 'MainBoard', 45),
(20, 'Intel', 'MainBoard', 20),
(21, 'ASUS z97k', 'MainBoard', 68),
(22, 'GigaByte P41T', 'MainBoard', 72),
(23, 'ASUSTek P5P43', 'MainBoard', 60),
(24, 'GigaByte G41MT', 'MainBoard', 40),
(25, 'Core 2 Duo', 'CPU', 60),
(26, 'Core i5 6600k', 'CPU', 70),
(27, 'Pentium G2030', 'CPU', 50),
(28, 'Pentium E5400', 'CPU', 55),
(29, 'Intel Core2', 'CPU', 50),
(30, 'Core i3 7100', 'CPU', 70),
(31, 'Core i5 4440', 'CPU', 63),
(32, 'Core i5 8400', 'CPU', 80),
(33, 'Core i7 12700', 'CPU', 98),
(34, 'Core i5 9400', 'CPU', 85),
(35, 'Pentium E5500', 'CPU', 50),
(36, 'Core i5 2400', 'CPU', 63),
(37, 'Core i5 4590', 'CPU', 70),
(38, 'Celeron 430', 'CPU', 15),
(39, 'Pentium 4640', 'CPU', 53),
(40, 'AMD Althon II 250', 'CPU', 50),
(41, 'Pentium E5300', 'CPU', 40),
(42, 'Core i5 6400', 'CPU', 68),
(43, 'Core 2 E8400', 'CPU', 50),
(44, 'PenTium G4400', 'CPU', 55),
(45, 'Celeron 437', 'CPU', 20),
(46, 'Pentium 4', 'CPU', 15),
(47, 'Celeron R', 'CPU', 10),
(48, 'Core i5 4460', 'CPU', 69),
(49, 'Core i 231g', 'CPU', 55),
(50, 'Core i3 6006', 'CPU', 60),
(51, 'Core i5 6500', 'CPU', 65),
(52, 'Core i5 4570', 'CPU', 68),
(53, 'Core i5 4610', 'CPU', 70),
(54, 'Pentium G3240', 'CPU', 45),
(55, 'Core i5 2500', 'CPU', 50),
(56, 'Core 2 Q8400', 'CPU', 55),
(57, 'PenTium E5700', 'CPU', 40),
(58, 'GeForce 9500', 'VGA', 40),
(59, 'Geforce GT 710', 'VGA', 60),
(60, 'GigaByte H61m', 'VGA', 40),
(61, 'GeForce GT 9400', 'VGA', 40),
(62, 'Geforce 210', 'VGA', 40),
(63, 'Intel HD 630', 'VGA', 40),
(64, 'Intel HD 4600', 'VGA', 40),
(65, 'Geforce GTX 1650', 'VGA', 70),
(66, 'Gigabyte Egle 3050 8GB', 'VGA', 90),
(67, 'OnBoard', 'VGA', 40),
(68, 'Geforce GT 210', 'VGA', 40),
(69, 'Intel HD', 'VGA', 40),
(70, 'Gigabyte 245Gzm', 'VGA', 40),
(71, 'nForce 630a', 'VGA', 40),
(72, 'ASUS TEK 8200', 'VGA', 40),
(73, 'GeForce GT 430', 'VGA', 50),
(74, 'intel HD 530', 'VGA', 40),
(75, 'intel HD 510', 'VGA', 40),
(76, 'Geforce GT 9500', 'VGA', 40),
(77, 'GeForce GT 630', 'VGA', 40),
(78, 'Intel 520', 'VGA', 40),
(79, 'GeForce GTX 1050', 'VGA', 40),
(80, 'GeForce GT 520', 'VGA', 40),
(81, 'GeForce 8400', 'VGA', 40),
(82, 'GeForce GT 220', 'VGA', 40),
(83, 'DDR2 4G', 'RAM', 55),
(84, 'DDR4 16G', 'RAM', 80),
(85, 'DDR2 2G', 'RAM', 50),
(86, 'DDR4 8G', 'RAM', 70),
(87, 'DDR3 8G', 'RAM', 65),
(88, '32GB 3200 dual DDR4', 'RAM', 97),
(89, 'DDR3 2G', 'RAM', 65),
(90, 'DDR3 4G', 'RAM', 60),
(91, 'DDR3 3G Dual', 'RAM', 55),
(92, 'DDR4 4G', 'RAM', 60),
(93, 'DDR2 1G', 'RAM', 20),
(94, 'DDR2 512M', 'RAM', 10),
(95, 'DDR3 6G dual', 'RAM', 67),
(96, '500G', 'HDD', 70),
(97, '1T', 'HDD', 80),
(98, '160G', 'HDD', 30),
(99, '1T+512SSD', 'HDD', 95),
(100, '1T+256SSD', 'HDD', 90),
(101, '2T', 'HDD', 100),
(102, '250G', 'HDD', 40),
(103, '360G', 'HDD', 50),
(104, '80G', 'HDD', 20),
(105, '260G', 'HDD', 40),
(106, 'Win 7 64bit', 'OprationSystem', 70),
(107, 'Win 10 64bit', 'OprationSystem', 80),
(108, 'Win 7 32bit', 'OprationSystem', 65),
(109, 'XP (SP 3)', 'OprationSystem', 15),
(110, 'Genius', 'Mouse', 50),
(111, 'ASUS', 'Mouse', 50),
(112, 'A4Tech', 'Mouse', 50),
(113, 'Product', 'Mouse', 50),
(114, 'TSCO', 'Mouse', 50),
(115, 'Green', 'Mouse', 50),
(116, 'Rapoo', 'Mouse', 50),
(117, 'Newtech 9200', 'Mouse', 50),
(118, 'FaraSsoo Mouse', 'Mouse', 50),
(119, 'Active', 'Mouse', 50),
(120, 'Logitech', 'Mouse', 50),
(121, 'Beyond', 'Mouse', 50),
(122, 'FaraSsoo Keybord', 'KeyBoard', 50),
(123, 'SA Data', 'KeyBoard', 50),
(124, 'Next', 'KeyBoard', 50),
(125, 'TSCO KeyBoard', 'KeyBoard', 50),
(126, 'RAPOO KeyBoard', 'KeyBoard', 50),
(127, 'A4TECH KeyBoard', 'KeyBoard', 50),
(128, 'Green KeyBoard', 'KeyBoard', 50),
(129, 'Genius KeyBoard', 'KeyBoard', 50),
(130, 'Newtech 9200 KeyBoard', 'KeyBoard', 50),
(131, 'MEDAX KeyBoard', 'KeyBoard', 50),
(132, 'Beyond KeyBoard', 'KeyBoard', 50),
(133, 'LapTop KeyBoard', 'KeyBoard', 50),
(134, 'Venous KeyBoard', 'KeyBoard', 50),
(135, 'DMD KeyBoard', 'KeyBoard', 50),
(136, 'Samsung BX1980', 'Monitor', 50),
(137, 'HP E231 Monitor', 'Monitor', 50),
(138, 'ASUS Monitor', 'Monitor', 50),
(139, 'Samsung SA300 Monitor', 'Monitor', 50),
(140, 'Samsung E1945x Monitor', 'Monitor', 50),
(141, 'LG W2864 Monitor', 'Monitor', 50),
(142, 'HP S231d Monitor', 'Monitor', 80),
(143, 'HP S231 Monitor', 'Monitor', 80),
(144, 'Samsung B2240 Monitor', 'Monitor', 50),
(145, 'BENQ T20IW  Monitor', 'Monitor', 50),
(146, 'Samsung AX1743 Monitor', 'Monitor', 50),
(147, 'DELL Monitor', 'Monitor', 70),
(148, 'Samsung S19V310N Monitor', 'Monitor', 50),
(149, 'Samsung 720W Monitor', 'Monitor', 50),
(150, 'Sumsung E1945x Monitor', 'Monitor', 50),
(151, 'LG Monitor', 'Monitor', 50),
(152, 'Samsung SN2043 Monitor', 'Monitor', 50),
(153, 'Sumsung P20500 Monitor', 'Monitor', 50),
(154, 'LapTop Monitor', 'Monitor', 50),
(155, 'Samsung 2333 Monitor', 'Monitor', 50),
(156, 'HP R221 Monitor', 'Monitor', 50),
(157, 'DELL CN07 Monitor', 'Monitor', 70),
(158, 'Samsung E1945 Monitor', 'Monitor', 50),
(159, 'Samsung P20500 Monitor', 'Monitor', 50),
(160, 'Samsung 713 Monitor', 'Monitor', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'mohammad', 'mohammad', '1234', 'admin'),
(4, 'bt1', 'bt1', '1234', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
