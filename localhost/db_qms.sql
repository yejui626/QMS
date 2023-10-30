-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2022 at 07:10 PM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u886803676_db_qms`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `exp_date` datetime NOT NULL,
  `password` varchar(250) NOT NULL,
  `reset_link_token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `exp_date`, `password`, `reset_link_token`) VALUES
('yjyejui626@gmail.com', '2022-01-26 03:20:51', '$2y$10$SWdjPZVv8OmKDYhIC8LeCefjBpQoCkbTJXvaGnyrWQXpCI6dvimWC', 'a138e600fd314ead1bf1172118b6ed047941'),
('yjyejui626@gmail.com', '2022-01-26 03:23:48', '$2y$10$SWdjPZVv8OmKDYhIC8LeCefjBpQoCkbTJXvaGnyrWQXpCI6dvimWC', 'a138e600fd314ead1bf1172118b6ed044798'),
('yjyejui626@gmail.com', '2022-01-26 03:31:39', '$2y$10$SWdjPZVv8OmKDYhIC8LeCefjBpQoCkbTJXvaGnyrWQXpCI6dvimWC', 'a138e600fd314ead1bf1172118b6ed046019'),
('yjyejui626@gmail.com', '2022-01-26 03:32:14', '$2y$10$SWdjPZVv8OmKDYhIC8LeCefjBpQoCkbTJXvaGnyrWQXpCI6dvimWC', 'a138e600fd314ead1bf1172118b6ed0469'),
('yjyejui626@gmail.com', '2022-01-26 03:33:57', '$2y$10$SWdjPZVv8OmKDYhIC8LeCefjBpQoCkbTJXvaGnyrWQXpCI6dvimWC', 'a138e600fd314ead1bf1172118b6ed04922'),
('yjyejui626@gmail.com', '2022-01-26 03:36:07', '$2y$10$SWdjPZVv8OmKDYhIC8LeCefjBpQoCkbTJXvaGnyrWQXpCI6dvimWC', 'a138e600fd314ead1bf1172118b6ed046886'),
('yjyejui626@gmail.com', '2022-01-26 03:55:53', '$2y$10$SWdjPZVv8OmKDYhIC8LeCefjBpQoCkbTJXvaGnyrWQXpCI6dvimWC', 'a138e600fd314ead1bf1172118b6ed047960'),
('yjyejui626@gmail.com', '2022-01-26 04:16:44', '$2y$10$50/b0KRbWRd1Cheumm/x6Or40NPEUP5lX.aGZ7sc0AAnN2TA5p8Wa', 'a138e600fd314ead1bf1172118b6ed047780'),
('xian_123@gmail.com', '2022-01-26 04:19:55', '$2y$10$7E0uLik.5iIIJ5YFOC/5o.TNSYMZpTcMCjLq2Fg39q/uqmre6e4pq', '5d352876e3acba6db7307c3513039e5c9410'),
('yjyejui626@gmail.com', '2022-01-26 04:23:31', 'edward626', 'a138e600fd314ead1bf1172118b6ed047563'),
('yjyejui626@gmail.com', '2022-01-26 04:25:52', 'edward626', 'a138e600fd314ead1bf1172118b6ed043751'),
('yjyejui626@gmail.com', '2022-01-26 04:35:35', '$2y$10$4wA.w.x.Zlmvug28dcwagOC6W.86bAnK9IStLAAPEXFHwIqcW4FOC', 'a138e600fd314ead1bf1172118b6ed044633'),
('yjyejui626@gmail.com', '2022-01-26 04:37:00', 'edward626', 'a138e600fd314ead1bf1172118b6ed045238'),
('yjyejui626@gmail.com', '2022-01-26 04:40:47', '$2y$10$75gXuzFJD.1YkTRE.Myal.e9fvUKCm0kHBCbHmAradpjGmWIn1Nfi', 'a138e600fd314ead1bf1172118b6ed04547'),
('yjyejui626@gmail.com', '2022-01-26 04:42:35', '$2y$10$1.JyW3aXiG.dvjO.vkqlg.ab8MLUftQtSs/xN1XIdiUWUMTd/eLrS', 'a138e600fd314ead1bf1172118b6ed041358'),
('yjyejui626@gmail.com', '2022-01-26 04:43:30', '$2y$10$Z2K6rKW72EI793c/SPW//eDat.xPgMl260lijFkwQE6/wSwLBPBXK', 'a138e600fd314ead1bf1172118b6ed044954'),
('mingqi01@gmail.com', '2022-01-26 04:54:47', 'mingqi', '394dfb40af7ad123d1663fcfd3da99c65210'),
('mingqi01@gmail.com', '2022-01-26 04:56:38', 'mingqi', '394dfb40af7ad123d1663fcfd3da99c64766'),
('mingqi01@gmail.com', '2022-01-26 04:58:19', 'mingqi', '394dfb40af7ad123d1663fcfd3da99c67610'),
('mingqi01@gmail.com', '2022-01-26 05:12:02', 'mingqi', '394dfb40af7ad123d1663fcfd3da99c69785'),
('xian_123@hotmail.com', '2022-01-26 05:12:37', '$2y$10$CBebWRqoiZC4krM6u3/1h.Wh2EjpdqUoINEIb9LhpoptmmavqOKyy', '2e94d5fb2c5601e85a9198e00786c9608349'),
('mingqi01@gmail.com', '2022-01-26 05:14:12', 'mingqi', '394dfb40af7ad123d1663fcfd3da99c69565'),
('mingqi01@gmail.com', '2022-01-26 05:18:26', 'mingqi', '394dfb40af7ad123d1663fcfd3da99c62525'),
('mingqi01@gmail.com', '2022-01-26 05:50:19', 'mingqi', '394dfb40af7ad123d1663fcfd3da99c69509'),
('mingqi01@gmail.com', '2022-01-26 05:51:18', 'mingqi', '394dfb40af7ad123d1663fcfd3da99c68592'),
('mingqi01@gmail.com', '2022-01-26 07:07:48', 'mingqi', '394dfb40af7ad123d1663fcfd3da99c66469'),
('mingqi01@gmail.com', '2022-02-04 13:29:13', '$2y$10$xuyQS94tbnqMzG58JGeTVe3a7pSMJbc9INTnjU4ufu42dW8tZNeb.', '394dfb40af7ad123d1663fcfd3da99c63389'),
('mingqi01@gmail.com', '2022-02-04 13:40:59', '$2y$10$xuyQS94tbnqMzG58JGeTVe3a7pSMJbc9INTnjU4ufu42dW8tZNeb.', '394dfb40af7ad123d1663fcfd3da99c67635'),
('mingqi01@gmail.com', '2022-02-04 13:54:34', '$2y$10$xuyQS94tbnqMzG58JGeTVe3a7pSMJbc9INTnjU4ufu42dW8tZNeb.', '394dfb40af7ad123d1663fcfd3da99c6599'),
('mingqi01@gmail.com', '2022-02-04 13:59:54', '$2y$10$xuyQS94tbnqMzG58JGeTVe3a7pSMJbc9INTnjU4ufu42dW8tZNeb.', '394dfb40af7ad123d1663fcfd3da99c69516'),
('mingqi01@gmail.com', '2022-02-04 14:03:13', '$2y$10$xuyQS94tbnqMzG58JGeTVe3a7pSMJbc9INTnjU4ufu42dW8tZNeb.', '394dfb40af7ad123d1663fcfd3da99c67585'),
('mingqi01@gmail.com', '2022-02-04 14:10:35', '$2y$10$xuyQS94tbnqMzG58JGeTVe3a7pSMJbc9INTnjU4ufu42dW8tZNeb.', '394dfb40af7ad123d1663fcfd3da99c69882'),
('mingqi01@gmail.com', '2022-02-04 14:12:08', '$2y$10$xuyQS94tbnqMzG58JGeTVe3a7pSMJbc9INTnjU4ufu42dW8tZNeb.', '394dfb40af7ad123d1663fcfd3da99c66755'),
('mingqi01@gmail.com', '2022-02-04 14:18:11', '$2y$10$xuyQS94tbnqMzG58JGeTVe3a7pSMJbc9INTnjU4ufu42dW8tZNeb.', '394dfb40af7ad123d1663fcfd3da99c65193'),
('mingqi01@gmail.com', '2022-02-04 14:28:18', '$2y$10$xuyQS94tbnqMzG58JGeTVe3a7pSMJbc9INTnjU4ufu42dW8tZNeb.', '394dfb40af7ad123d1663fcfd3da99c66510'),
('mingqi01@gmail.com', '2022-02-04 14:50:48', '$2y$10$1Ix85ghuq3scUowl2BLMBuhxiSgQnHS1l1rW8rjwuWsisCO0ZemqS', '394dfb40af7ad123d1663fcfd3da99c63976'),
('mingqi01@gmail.com', '2022-02-04 14:54:44', '$2y$10$1Ix85ghuq3scUowl2BLMBuhxiSgQnHS1l1rW8rjwuWsisCO0ZemqS', '394dfb40af7ad123d1663fcfd3da99c62589'),
('yjyejui626@gmail.com', '2022-02-06 10:53:01', '$2y$10$u749rgyBJZJMlLzcEOx/eOQWYthpamrHUCyp/wDCQjbxwr.VdyR8W', 'a138e600fd314ead1bf1172118b6ed042439'),
('xian_123@hotmail.com', '2022-02-07 14:56:51', '$2y$10$CBebWRqoiZC4krM6u3/1h.Wh2EjpdqUoINEIb9LhpoptmmavqOKyy', '2e94d5fb2c5601e85a9198e00786c9608412'),
('xian_123@hotmail.com', '2022-02-07 15:19:25', '$2y$10$O4pZ9YN5LodzJjppjdzjX.pKAaan0G2men3y1FcwG4sZcM6pd6K7C', '2e94d5fb2c5601e85a9198e00786c9607804'),
('xian_123@hotmail.com', '2022-02-07 15:40:28', '$2y$10$IAvzRbtfNQ7xlgC43s7ebeONw1CXHwJKE1W8ExdaMOPXb5mmoQ4By', '2e94d5fb2c5601e85a9198e00786c9602044'),
('xian_123@hotmail.com', '2022-02-07 16:59:28', '$2y$10$YfKiG/C3tk1vuGVI3t5knOHGW0phDssua2WGVktG50Wyel5c0KNRS', '2e94d5fb2c5601e85a9198e00786c9603392'),
('mingqi01@gmail.com', '2022-02-07 17:44:53', '$2y$10$tlvnhNtva6iCVhzboowNhO/Dl9k7oGuDDJS.cOptpVwfomjrqF6kW', '394dfb40af7ad123d1663fcfd3da99c64850'),
('xian_123@hotmail.com', '2022-02-07 17:49:16', '$2y$10$YfKiG/C3tk1vuGVI3t5knOHGW0phDssua2WGVktG50Wyel5c0KNRS', '2e94d5fb2c5601e85a9198e00786c9608766'),
('xian_123@hotmail.com', '2022-02-07 18:12:36', '$2y$10$.5TWogNGXfwMQRB.9lmTV.l/W2zGkPhH1ztnPSv8riJbpq5IXT8cy', '2e94d5fb2c5601e85a9198e00786c9601845'),
('xian_123@hotmail.com', '2022-02-07 19:26:10', '$2y$10$g8Wfa6xbNes5tBPfGNhfeel611i74NmRCIbYwRZqqMxw8W5HnLV3.', '2e94d5fb2c5601e85a9198e00786c9605291'),
('xian_123@hotmail.com', '2022-02-08 06:26:39', '$2y$10$DGDCUA5O8GPX2jDnhsxmOeXXTofRZCkJzmuGCVM/NmZf/0nexXpvS', '2e94d5fb2c5601e85a9198e00786c9603264'),
('xian_123@hotmail.com', '2022-02-08 06:48:57', '$2y$10$RQssx7XbMI4nNCdjWsq4YuLiSMfyYd15XkrsEgUesgCAMvWx98Y5y', '2e94d5fb2c5601e85a9198e00786c9605387'),
('mingqi01@gmail.com', '2022-02-08 12:24:08', '$2y$10$efwavgiAo3dItd6zIeWenOA74SbOv6Vj5WWspYwRPHXIKmGpJ8ryK', '394dfb40af7ad123d1663fcfd3da99c64827'),
('mingqi01@gmail.com', '2022-02-08 14:27:08', '$2y$10$OooWY43X/A2fSlAnX3grpuwO36x2fGf6OIAv2Uu5TDmFPnVP6W1Ci', '394dfb40af7ad123d1663fcfd3da99c66880'),
('employer@gmail.com', '2022-02-11 13:22:39', '$2y$10$b3SmOiqCbInemyU014do.ucxtYRm92h67.DNB.iWz6FYJerdQU3a6', '98ddfa7ce660b85885e857de8447d1436061'),
('xian_123@hotmail.com', '2022-02-11 14:33:32', '$2y$10$Fh4hh1bNaeHFUoD7ihasN.Z1NDKNv965x0Ta7AmmwlyN.pIllZlFa', '2e94d5fb2c5601e85a9198e00786c9606806');

-- --------------------------------------------------------

--
-- Table structure for table `tb_address`
--

CREATE TABLE `tb_address` (
  `a_addressID` int(20) NOT NULL,
  `a_street` varchar(50) NOT NULL,
  `a_city` varchar(50) NOT NULL,
  `a_postcode` int(5) NOT NULL,
  `a_state` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_address`
--

INSERT INTO `tb_address` (`a_addressID`, `a_street`, `a_city`, `a_postcode`, `a_state`) VALUES
(1, '111 Jalan Tembikai, Taman Tembikai,', 'Bukit Tembikai', 11111, 'Johor'),
(2, '222 Jalan pisang, Taman Pisang,', 'Bukit Pisang', 22222, 'Johor'),
(3, '321 Jalan Nanas 21, Taman Nanas 31', 'Nanas ', 33333, 'Johor'),
(4, 'add', 'new', 99999, 'Johor'),
(5, '123, Jln 123', '123', 12332, 'Johor'),
(7, '123, Jln 123', '123', 12312, 'Johor'),
(8, '123, Jln 123', '123', 14567, 'Johor'),
(9, 'MCD Johor', 'skudai', 15000, 'Johor'),
(10, '6 lorong berapit', 'berapit', 14000, 'Johor'),
(11, 'mcd alma', 'bukit mertajam', 15000, 'Johor'),
(12, '123, Jln 123', '123', 123, 'Johor'),
(13, 'MCD johor', 'Masai', 15004, 'Johor'),
(14, '123, Jln 123', '123', 123, 'Johor'),
(15, '1', '2', 3, 'Johor'),
(16, '123, Jln 123', '123', 123, 'Johor'),
(17, 'MCD Johor1', 'skudai', 15000, 'Johor'),
(18, '123, Jln 123', '234', 43, 'Johor'),
(19, '123, Jln 123', '123', 123, 'Johor'),
(20, '123, Jalan Tembikai,', 'Tembikai', 54000, 'Johor'),
(21, '123, 123', '123', 123, 'Johor'),
(22, '123', '123', 123, 'Johor'),
(23, '123, Jalan Tembikai,', 'Tembikai,', 12345, 'Johor'),
(24, '123, Jln Tembikai', 'Tembikai', 12345, 'Johor'),
(26, '123, Jln Pisang', 'Pisang', 13456, 'Johor'),
(27, '123, Jln 123', '123', 12345, 'Johor'),
(28, '123, jln 123', '123', 12345, 'Johor'),
(30, '123, Jln 123', '234', 12323, 'Johor'),
(31, '12, Jalan Bentara, Taman Ungku Tun Aminah', 'Johor Bahru', 80350, 'Johor'),
(32, '6 lorong berapit', 'berapit', 14000, 'Johor'),
(33, '30,LORONG JAMBU MADU 2, TAMAN JAMBU MADU', 'BUKIT MERTAJAM', 14000, 'Johor'),
(34, 'MCD Johor', 'skudai', 15001, 'Johor'),
(35, 'MCD Johor', 'skudai', 15000, 'Johor'),
(37, 'Krp', 'Bukit Mertajam', 14000, 'Johor'),
(38, 'Krp', 'Bukit Mertajam', 14000, 'Johor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `c_custID` int(20) NOT NULL,
  `c_userID` int(10) NOT NULL,
  `c_customerName` varchar(20) NOT NULL,
  `c_phoneNo` varchar(12) NOT NULL,
  `c_addressID` int(20) NOT NULL,
  `c_statusID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`c_custID`, `c_userID`, `c_customerName`, `c_phoneNo`, `c_addressID`, `c_statusID`) VALUES
(3, 8, '123', '321', 3, 7),
(5, 21, 'Lee Ming Qi', '012-45678901', 5, 7),
(6, 9, 'leeming qi', '012111111', 1, 6),
(7, 9, 'yiyi yi', '012111111', 1, 7),
(8, 7, 'er erer', '022212312', 2, 7),
(9, 20, '123', '123', 2, 7),
(18, 20, 'Lee Ming Qi1', '012-45678901', 16, 7),
(19, 20, 'Lee Ming Qi', '012-45678901', 19, 7),
(20, 22, 'employee (editted)', '01231334234', 18, 7),
(21, 8, 'lee min qi', '012-6347323', 21, 7),
(22, 8, 'Lee Ming Qi', '012', 22, 7),
(23, 8, 'Lee Ming Qi', '012-4567891', 23, 7),
(25, 9, 'cust wa', '012-5436784', 26, 7),
(26, 9, 'Lee Ming Qi', '012-45678901', 27, 7),
(28, 9, 'Lee Ming Qi', '012-45678901', 30, 7),
(29, 9, 'Lee Ming Qi', '012-4750891', 31, 6),
(32, 20, 'MCD Johor', '0125486952', 34, 7),
(33, 20, 'MCD Johor', '0125486952', 35, 6),
(34, 31, 'Lee Jia Xian', '01120621573', 37, 6),
(35, 30, 'Lee Jia Xian3232', '01120621573', 38, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_feedback`
--

CREATE TABLE `tb_feedback` (
  `f_feedbackID` int(20) NOT NULL,
  `f_serviceID` int(20) NOT NULL,
  `f_details` varchar(254) NOT NULL,
  `f_rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_feedback`
--

INSERT INTO `tb_feedback` (`f_feedbackID`, `f_serviceID`, `f_details`, `f_rating`) VALUES
(1, 9, 'veli good', 5),
(5, 10, 'good quotation', 5),
(6, 12, 'add request in module', 1),
(8, 14, 'room cleaning', 2),
(9, 15, 'good', 5),
(10, 16, '1231231', 3),
(11, 17, '3123123', 1),
(12, 27, 'good service', 5),
(17, 19, 'fafsadfsdfa', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_item`
--

CREATE TABLE `tb_item` (
  `i_itemID` int(100) NOT NULL,
  `i_quotationID` int(20) NOT NULL,
  `i_item` varchar(254) NOT NULL,
  `i_qty` int(10) NOT NULL,
  `i_qtType` varchar(5) NOT NULL,
  `i_unitPrice` float(7,2) NOT NULL,
  `i_amount` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_item`
--

INSERT INTO `tb_item` (`i_itemID`, `i_quotationID`, `i_item`, `i_qty`, `i_qtType`, `i_unitPrice`, `i_amount`) VALUES
(1, 3, 'aircon', 1, '1', 5.00, 5.00),
(2, 3, 'air kosong', 3, '2', 5.00, 15.00),
(5, 5, 'fire', 8, '3', 1.00, 8.00),
(8, 8, '1', 1, '1', 0.00, 0.00),
(9, 9, '1', 1, '1', 1.00, 1.00),
(15, 12, 'customer 1', 1, '2', 1.00, 1.00),
(16, 12, 'customer 2', 2, '2', 2.00, 4.00),
(17, 12, 'customer 3', 3, '3', 3.00, 9.00),
(18, 13, 'customer 4', 4, '4', 4.00, 16.00),
(19, 13, 'customer 5', 5, '1', 5.00, 25.00),
(22, 15, 'halo1', 2, '1', 2.00, 4.00),
(23, 15, 'halo2', 3, '1', 1.00, 3.00),
(113, 5, 'water', 2, '1', 3.00, 6.00),
(120, 8, '2', 3, '4', 3.00, 9.00),
(122, 45, 'sponge', 1, '3', 8.00, 8.00),
(123, 45, 'soap', 1, '3', 8.88, 8.88),
(129, 12, 'customer 3.3', 3, '4', 3.33, 9.99),
(132, 49, 'Vacuum Cleaner\r\n-PWRC 1531 \r\n-500W', 1, '3', 123.00, 123.00),
(133, 49, 'jet\r\n-100pa', 1, '1', 324.53, 324.53),
(134, 49, 'lawn mowers\r\n-100W\r\n-Model : POWERED', 2, '2', 123.00, 246.00),
(138, 8, '3', 3, '3', 3.00, 9.00),
(139, 8, '4', 4, '2', 4.32, 17.28),
(140, 53, '123', 431, '2', 3.00, 999.99),
(141, 54, 'fire 1', 12, '2', 32.00, 384.00),
(142, 54, 'fire 2\r\nfire 3', 2, '3', 3.33, 6.66),
(144, 56, '1', 1, '2', 23.00, 23.00),
(154, 65, '1', 12, '3', 231.00, 2772.00),
(162, 71, '123', 12, '2', 23.00, 276.00),
(165, 73, '1233', 12, '2', 23.00, 276.00),
(166, 73, '32', 2, '4', 2.00, 4.00),
(167, 74, 'chemical 1', 1, '1', 12.00, 12.00),
(168, 74, 'chemical 2', 2, '1', 32.00, 64.00),
(181, 83, 'Chemical 1', 3, '1', 38.88, 116.64),
(182, 83, 'Chemical 2', 2, '1', 32.00, 64.00),
(184, 85, '123', 20, '1', 2.00, 40.00),
(185, 86, 'monitor 27inch', 1, '3', 666.00, 666.00),
(186, 86, 'Wireless mouse', 1, '3', 68.00, 68.00),
(187, 87, '123', 12, '1', 32.00, 384.00),
(188, 88, 'Service', 1, '1', 25.00, 25.00),
(189, 88, 'Washing tools', 1, '2', 15.00, 15.00);

-- --------------------------------------------------------

--
-- Table structure for table `tb_quotation`
--

CREATE TABLE `tb_quotation` (
  `q_quotationID` int(20) NOT NULL,
  `q_serviceID` int(20) NOT NULL,
  `q_totalAmount` float(7,2) NOT NULL,
  `q_date` date NOT NULL,
  `q_topic` varchar(100) NOT NULL,
  `q_statusID` int(1) NOT NULL,
  `q_reason` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_quotation`
--

INSERT INTO `tb_quotation` (`q_quotationID`, `q_serviceID`, `q_totalAmount`, `q_date`, `q_topic`, `q_statusID`, `q_reason`) VALUES
(3, 9, 20.00, '2022-01-13', 'saddddddddd', 3, NULL),
(5, 10, 15.00, '2022-01-19', 'edited topic again ', 3, NULL),
(8, 9, 9.00, '2022-01-14', '1', 3, NULL),
(9, 9, 1.00, '2022-01-14', '2 edited', 3, NULL),
(12, 12, 14.00, '2022-01-14', 'I am customer', 5, '-'),
(13, 12, 41.00, '2022-01-14', 'customer testing', 2, 'testing'),
(15, 10, 7.00, '2022-01-15', 'employer 2', 2, 'Because\r\n   I\r\n   want \r\n   to \r\n   try\r\n'),
(17, 10, 7.00, '2022-01-15', 'employer 2', 3, NULL),
(22, 12, 13.00, '2022-01-15', '123', 2, 'no item'),
(45, 14, 16.88, '2022-01-17', 'kitchen cleaning', 3, NULL),
(49, 15, 693.53, '2022-01-18', 'kitchen cleaning\r\nbedroom cleaning ', 3, NULL),
(53, 17, 999.99, '2022-01-18', '123123', 3, NULL),
(54, 20, 390.66, '2022-01-18', 'fire ', 3, NULL),
(56, 22, 23.00, '2021-11-30', '111', 3, NULL),
(65, 22, 2772.00, '2022-09-16', '1', 2, NULL),
(71, 24, 276.00, '2022-02-24', '123', 3, NULL),
(73, 18, 280.00, '2022-01-24', 'pest control', 5, NULL),
(74, 27, 76.00, '2022-02-07', 'termite', 3, NULL),
(83, 37, 180.64, '2022-02-07', 'Termite Control', 1, NULL),
(85, 19, 40.00, '2022-02-09', '123', 3, NULL),
(86, 21, 734.00, '2022-02-10', 'computer', 1, NULL),
(87, 13, 384.00, '2022-02-10', '123', 1, NULL),
(88, 43, 40.00, '2022-02-10', 'Air Cond. cleaning\r\n', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_service`
--

CREATE TABLE `tb_service` (
  `s_serviceID` int(20) NOT NULL,
  `s_userID` int(10) NOT NULL,
  `s_custID` int(20) NOT NULL,
  `s_requestDate` datetime NOT NULL,
  `s_completeDate` datetime DEFAULT NULL,
  `s_details` varchar(254) NOT NULL,
  `s_statusID` int(1) NOT NULL,
  `s_typeID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_service`
--

INSERT INTO `tb_service` (`s_serviceID`, `s_userID`, `s_custID`, `s_requestDate`, `s_completeDate`, `s_details`, `s_statusID`, `s_typeID`) VALUES
(9, 9, 6, '2022-01-13 11:44:00', '2022-01-22 17:27:53', 'halo', 4, 1),
(10, 9, 6, '2022-01-14 11:44:00', '2022-02-10 15:19:10', 'hello', 4, 2),
(12, 20, 9, '2022-01-14 21:02:45', '0000-00-00 00:00:00', 'customer', 5, 3),
(13, 20, 9, '2022-01-14 21:02:45', '0000-00-00 00:00:00', 'customer', 3, 4),
(14, 20, 3, '2022-01-22 00:00:00', '0000-00-00 00:00:00', 'kitchen', 5, 5),
(15, 20, 9, '2022-01-17 00:00:00', '2022-01-18 11:29:14', 'kitchen', 4, 6),
(16, 9, 3, '2022-01-19 00:00:00', '0000-00-00 00:00:00', 'Fire Alarm System and Fire Hydrant Repair', 5, 7),
(17, 9, 3, '2022-01-13 00:00:00', '2022-01-18 15:13:30', 'abc', 4, 8),
(18, 9, 9, '2022-01-22 00:00:00', '2022-02-06 17:28:07', 'cockroach ', 4, 3),
(19, 9, 6, '2022-01-19 00:00:00', '2022-02-09 18:03:45', 'crow', 4, 3),
(20, 20, 3, '2022-01-20 00:00:00', '2022-01-18 18:22:56', 'fire', 4, 5),
(21, 20, 9, '2022-01-07 00:00:00', '0000-00-00 00:00:00', 'computer', 3, 2),
(22, 20, 9, '2022-01-20 00:00:00', '2022-01-22 08:58:07', 'air con cleaning', 4, 1),
(23, 9, 6, '2022-01-07 00:00:00', '0000-00-00 00:00:00', 'abc', 2, 8),
(24, 9, 3, '2022-01-29 00:00:00', '2022-01-21 18:57:40', '123', 4, 5),
(25, 20, 9, '2022-02-06 17:06:42', '2022-02-09 01:06:42', '31231', 5, 8),
(26, 9, 3, '2022-02-06 17:06:42', '2022-02-11 01:06:42', '312313', 5, 7),
(27, 20, 5, '2022-02-08 00:00:00', '2022-02-07 07:13:21', 'Termite', 5, 3),
(37, 9, 29, '2022-02-08 00:00:00', '0000-00-00 00:00:00', 'Termite Control', 3, 3),
(42, 9, 6, '2022-02-11 00:00:00', '0000-00-00 00:00:00', 'fwqefwqfw', 3, 3),
(43, 30, 35, '2022-02-18 00:00:00', '2022-02-10 15:29:09', 'Not COld', 4, 1),
(44, 9, 6, '2022-02-11 00:00:00', '0000-00-00 00:00:00', '312', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `st_statusID` int(1) NOT NULL,
  `st_details` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`st_statusID`, `st_details`) VALUES
(1, 'Pending'),
(2, 'Rejected'),
(3, 'Accepted'),
(4, 'Completed'),
(5, 'Cancelled'),
(6, 'Active'),
(7, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `t_typeID` int(1) NOT NULL,
  `t_details` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`t_typeID`, `t_details`) VALUES
(1, 'Air Conditioning'),
(2, 'Electrical and Electronic'),
(3, 'Pest Control'),
(4, 'Cleaning and Sanitary'),
(5, 'Fire Fighting and Alram System'),
(6, 'Pump'),
(7, 'Sewage'),
(8, 'Civil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `u_userID` int(10) NOT NULL,
  `u_username` varchar(20) NOT NULL,
  `u_pwd` varchar(100) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_type` int(1) NOT NULL,
  `u_statusID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`u_userID`, `u_username`, `u_pwd`, `u_email`, `u_type`, `u_statusID`) VALUES
(7, 'employee1', '$2y$10$dLhdxeRa5p.hjaTMu6LkdueVlA9IvxAIUHbqmZE1nmTS8QmMg0ryi', 'employee1@gmail.com', 2, 6),
(8, 'customer', '$2y$10$WxCPIoy0uiPr8sLcOMu/HO3pfxBgMRa/ptgseMV4mwuSachhk3V46', 'customer@gmail.com', 3, 6),
(9, 'employer1', '$2y$10$b3SmOiqCbInemyU014do.ucxtYRm92h67.DNB.iWz6FYJerdQU3a6', 'employer@gmail.com', 1, 6),
(20, 'customer1', '$2y$10$hkqOl9/lzm.pAUC8q6mR3.q3f/HZLm2il556sBaUhn.S2s1S8emQ.', '31231313123@gmail.com', 3, 6),
(21, 'customer2', '$2y$10$oC9GJqfLwnNgamyViuSwHeZgJuPgzb3yGRyQcQ4hVaT/jWEzU4ZWG', 'customer2@gmail.com', 3, 6),
(22, 'employee2', '$2y$10$c8H4gy0ogIjbQp7zboz04uFhg5Wr.Ig1DZTUygdfbjtJ620pYwCzm', 'employee2@gmail.com', 2, 6),
(28, 'Ali', '$2y$10$EBLKMf46d22B4EgL6iXe8enMmaLolFoq5yJMJUERD885NVBgDxgRe', 'Ali@gmail.com', 1, 7),
(29, 'Ahmad222', '$2y$10$3Rnyhe8WqlV2bHAEUAIQeuX65E2S5RWxUptQmbch8lJ.NOA4j3fYK', 'Ahmad@gmail.com', 3, 6),
(30, 'lee123', '$2y$10$Fh4hh1bNaeHFUoD7ihasN.Z1NDKNv965x0Ta7AmmwlyN.pIllZlFa', 'xian_123@hotmail.com', 3, 6),
(31, 'employee', '$2y$10$fA6472QKiAOuozGNSsd.KOFjGB2h.QLX/290.TS1ypAk1//KumhlK', 'employee@htomail.com', 2, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`a_addressID`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`c_custID`),
  ADD KEY `c_userID` (`c_userID`,`c_addressID`,`c_statusID`),
  ADD KEY `c_addressID` (`c_addressID`),
  ADD KEY `c_statusID` (`c_statusID`);

--
-- Indexes for table `tb_feedback`
--
ALTER TABLE `tb_feedback`
  ADD PRIMARY KEY (`f_feedbackID`),
  ADD KEY `f_serviceID` (`f_serviceID`);

--
-- Indexes for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`i_itemID`),
  ADD KEY `i_quotationID` (`i_quotationID`);

--
-- Indexes for table `tb_quotation`
--
ALTER TABLE `tb_quotation`
  ADD PRIMARY KEY (`q_quotationID`),
  ADD KEY `q_serviceID` (`q_serviceID`,`q_statusID`),
  ADD KEY `q_statusID` (`q_statusID`);

--
-- Indexes for table `tb_service`
--
ALTER TABLE `tb_service`
  ADD PRIMARY KEY (`s_serviceID`),
  ADD KEY `s_userID` (`s_custID`,`s_statusID`,`s_typeID`),
  ADD KEY `s_custID` (`s_custID`),
  ADD KEY `s_statusID` (`s_statusID`),
  ADD KEY `s_typeID` (`s_typeID`),
  ADD KEY `s_userID_2` (`s_userID`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`st_statusID`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`t_typeID`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`u_userID`),
  ADD UNIQUE KEY `u_email` (`u_email`),
  ADD UNIQUE KEY `u_username` (`u_username`),
  ADD KEY `u_statusID` (`u_statusID`),
  ADD KEY `u_statusID_2` (`u_statusID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_address`
--
ALTER TABLE `tb_address`
  MODIFY `a_addressID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `c_custID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_feedback`
--
ALTER TABLE `tb_feedback`
  MODIFY `f_feedbackID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_item`
--
ALTER TABLE `tb_item`
  MODIFY `i_itemID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `tb_quotation`
--
ALTER TABLE `tb_quotation`
  MODIFY `q_quotationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tb_service`
--
ALTER TABLE `tb_service`
  MODIFY `s_serviceID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `u_userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD CONSTRAINT `tb_customer_ibfk_1` FOREIGN KEY (`c_userID`) REFERENCES `tb_user` (`u_userID`),
  ADD CONSTRAINT `tb_customer_ibfk_2` FOREIGN KEY (`c_addressID`) REFERENCES `tb_address` (`a_addressID`),
  ADD CONSTRAINT `tb_customer_ibfk_3` FOREIGN KEY (`c_statusID`) REFERENCES `tb_status` (`st_statusID`);

--
-- Constraints for table `tb_feedback`
--
ALTER TABLE `tb_feedback`
  ADD CONSTRAINT `tb_feedback_ibfk_1` FOREIGN KEY (`f_serviceID`) REFERENCES `tb_service` (`s_serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD CONSTRAINT `tb_item_ibfk_1` FOREIGN KEY (`i_quotationID`) REFERENCES `tb_quotation` (`q_quotationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_quotation`
--
ALTER TABLE `tb_quotation`
  ADD CONSTRAINT `tb_quotation_ibfk_1` FOREIGN KEY (`q_statusID`) REFERENCES `tb_status` (`st_statusID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_quotation_ibfk_2` FOREIGN KEY (`q_serviceID`) REFERENCES `tb_service` (`s_serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_service`
--
ALTER TABLE `tb_service`
  ADD CONSTRAINT `tb_service_ibfk_3` FOREIGN KEY (`s_custID`) REFERENCES `tb_customer` (`c_custID`),
  ADD CONSTRAINT `tb_service_ibfk_5` FOREIGN KEY (`s_typeID`) REFERENCES `tb_type` (`t_typeID`),
  ADD CONSTRAINT `tb_service_ibfk_6` FOREIGN KEY (`s_statusID`) REFERENCES `tb_status` (`st_statusID`),
  ADD CONSTRAINT `tb_service_ibfk_7` FOREIGN KEY (`s_userID`) REFERENCES `tb_user` (`u_userID`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`u_statusID`) REFERENCES `tb_status` (`st_statusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
