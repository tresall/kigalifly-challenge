-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 07:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imops`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doc_id` int(11) NOT NULL,
  `names` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `hosp_name` varchar(100) DEFAULT NULL,
  `phone_nbr` varchar(30) DEFAULT NULL,
  `register_dt` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doc_id`, `names`, `password`, `hosp_name`, `phone_nbr`, `register_dt`, `status`) VALUES
(1, 'Dr. Nteziryayo JMV', '827ccb0eea8a706c4c34a16891f84e7b', 'CHUK', '0783006902', '25-01-2022', 1),
(2, 'Dr. Kamanzi', '827ccb0eea8a706c4c34a16891f84e7b', 'Nyiranuma', '0790904527', '30-01-2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `sndr_nm` varchar(50) NOT NULL,
  `sndr_mail` varchar(255) NOT NULL,
  `sndr_msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `sndr_nm`, `sndr_mail`, `sndr_msg`) VALUES
(1, 'hfgf', 'alaintresorcyusa683@gmail.com', 'hhhhh'),
(2, 'Cyusa Alain Tresor', 'alaintresorcyusa683@gmail.com', 'Hello teting'),
(3, 'Testing 1', 'tresorcyusadev@gmail.com', 'Hello testing message service'),
(4, 'Cyusa Alain Tresor', 'alaintresorcyusa683@gmail.com', 'h'),
(5, 'Cyusa Alain Tresor', 'alaintresorcyusa683@gmail.com', 'Hello Testing....');

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `op_id` int(11) NOT NULL,
  `op_name` varchar(60) DEFAULT NULL,
  `op_phone` varchar(50) DEFAULT NULL,
  `op_pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`op_id`, `op_name`, `op_phone`, `op_pwd`) VALUES
(1, 'test_operator', '0783006902', '2c65f441a44812b6589e123c0b5d06d8');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `doc_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `received` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `prod_id`, `quantity`, `doc_id`, `order_date`, `received`) VALUES
(1, 1, 10, 1, '2022-02-05 11:52:44', 0),
(2, 2, 2, 1, '2022-02-05 11:55:51', 1),
(3, 4, 8, 2, '2022-02-05 11:56:25', 1),
(4, 4, 1, 1, '2022-02-05 14:04:52', 0),
(5, 1, 3, 2, '2022-02-05 14:05:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `gram_unit` int(11) NOT NULL,
  `total_mass_g` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `quantity`, `gram_unit`, `total_mass_g`, `date_added`, `status`) VALUES
(1, 'Parcetamol', 387, 100, '38700', '2022-02-05 11:44:29', 1),
(2, 'Aspirin', 18, 50, '900', '2022-02-05 11:44:49', 1),
(3, 'Quartem', 100, 80, '8000', '2022-02-05 11:45:07', 0),
(4, 'Fenelga', 91, 40, '3640', '2022-02-05 11:45:22', 1),
(5, 'gjgh', 2, 6, '12', '2022-02-05 17:29:55', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
