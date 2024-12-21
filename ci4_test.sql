-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2024 at 05:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `key` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `v_clients`
--

CREATE TABLE `v_clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `alternative_no` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `referred_by` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_clients`
--

INSERT INTO `v_clients` (`id`, `name`, `birth_date`, `age`, `gender`, `mobile_no`, `alternative_no`, `address`, `state`, `pincode`, `email`, `referred_by`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', '1990-01-01', 34, 'Male', '1234567890', '0987654321', '123 Main St, City A', 'State A', '123456', 'john.doe@example.com', 'Referral A', 1, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(2, 'Jane Smith', '1988-05-15', 36, 'Female', '9876543210', '1234509876', '456 Elm St, City B', 'State B', '654321', 'jane.smith@example.com', 'Referral B', 2, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(3, 'Alice Johnson', '1995-07-20', 29, 'Female', '1122334455', '5566778899', '789 Oak St, City C', 'State C', '789012', 'alice.j@example.com', 'Referral C', 3, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(4, 'Bob Williams', '1992-03-12', 32, 'Male', '2233445566', '6655443322', '101 Pine St, City D', 'State D', '345678', 'bob.w@example.com', 'Referral D', 4, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(5, 'Charlie Brown', '1985-11-08', 39, 'Male', '3344556677', '7766554433', '202 Maple St, City E', 'State E', '987654', 'charlie.b@example.com', 'Referral E', 5, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(6, 'Diana Prince', '1993-09-21', 31, 'Female', '4455667788', '8877665544', '303 Cedar St, City F', 'State F', '456789', 'diana.p@example.com', 'Referral F', 6, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(7, 'Eve Adams', '1991-04-10', 33, 'Female', '5566778899', '9988776655', '404 Birch St, City G', 'State G', '321098', 'eve.a@example.com', 'Referral G', 7, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(8, 'Frank Castle', '1989-06-30', 35, 'Male', '6677889900', '0011223344', '505 Cherry St, City H', 'State H', '210987', 'frank.c@example.com', 'Referral H', 8, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(9, 'Grace Lee', '1994-02-25', 30, 'Female', '7788990011', '1122334455', '606 Spruce St, City I', 'State I', '109876', 'grace.l@example.com', 'Referral I', 9, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(10, 'Hank Pym', '1987-12-19', 37, 'Male', '8899001122', '2233445566', '707 Fir St, City J', 'State J', '987123', 'hank.p@example.com', 'Referral J', 10, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(11, 'Ivy Green', '1990-08-14', 34, 'Female', '9900112233', '3344556677', '808 Redwood St, City K', 'State K', '654987', 'ivy.g@example.com', 'Referral K', 11, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(12, 'Jack White', '1986-03-03', 38, 'Male', '0011223344', '4455667788', '909 Sycamore St, City L', 'State L', '432109', 'jack.w@example.com', 'Referral L', 12, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(13, 'Kara Zor-El', '1992-11-29', 32, 'Female', '1122334455', '5566778899', '1010 Dogwood St, City M', 'State M', '321654', 'kara.z@example.com', 'Referral M', 13, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(14, 'Leo King', '1997-07-07', 27, 'Male', '2233445566', '6655443322', '1111 Palm St, City N', 'State N', '987321', 'leo.k@example.com', 'Referral N', 14, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(15, 'Mia Turner', '1988-09-17', 36, 'Female', '3344556677', '7766554433', '1212 Magnolia St, City O', 'State O', '654321', 'mia.t@example.com', 'Referral O', 15, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(16, 'Nathan Drake', '1984-05-25', 40, 'Male', '4455667788', '8877665544', '1313 Aspen St, City P', 'State P', '789654', 'nathan.d@example.com', 'Referral P', 16, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(17, 'Olivia Benson', '1993-02-11', 31, 'Female', '5566778899', '9988776655', '1414 Walnut St, City Q', 'State Q', '567890', 'olivia.b@example.com', 'Referral Q', 17, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(18, 'Paul Atreides', '1989-10-30', 35, 'Male', '6677889900', '0011223344', '1515 Poplar St, City R', 'State R', '876543', 'paul.a@example.com', 'Referral R', 18, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(19, 'Quinn Harper', '1990-06-06', 34, 'Male', '7788990011', '1122334455', '1616 Beech St, City S', 'State S', '345678', 'quinn.h@example.com', 'Referral S', 19, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(20, 'Rachel Green', '1986-01-20', 38, 'Female', '8899001122', '2233445566', '1717 Cypress St, City T', 'State T', '123456', 'rachel.g@example.com', 'Referral T', 20, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(21, 'Sam Fisher', '1991-07-22', 33, 'Male', '9900112233', '3344556677', '1818 Hickory St, City U', 'State U', '234567', 'sam.f@example.com', 'Referral U', 21, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(22, 'Tina Goldstein', '1995-12-11', 29, 'Female', '0011223344', '4455667788', '1919 Chestnut St, City V', 'State V', '345789', 'tina.g@example.com', 'Referral V', 22, '2024-12-03 03:46:28', '2024-12-03 03:46:28'),
(23, 'Uma Thurman', '1988-03-15', 36, 'Female', '1122334455', '5566778899', '2020 Maple St, City W', 'State W', '678901', 'uma.t@example.com', 'Referral W', 23, '2024-12-03 03:46:28', '2024-12-03 03:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `v_sales`
--

CREATE TABLE `v_sales` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `service_details` text NOT NULL,
  `cash_type` enum('online','cash','check','other') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `gst_amount` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_sales`
--

INSERT INTO `v_sales` (`id`, `date`, `client_id`, `service_details`, `cash_type`, `amount`, `gst_amount`, `total`, `address`, `mobile_no`) VALUES
(1, '2024-11-04', 7, 'e4g44g', 'check', 100000.00, 4567.00, 104567.00, 'Address Example 5', '9876504321'),
(2, '2024-11-07', 1, 'fvnhufhh', 'check', 50000.00, 4856.00, 54856.00, 'Nashik', '09763715014'),
(3, '2024-11-12', 7, '4555', 'check', 1235.00, 34.00, 1269.00, 'Address Example 5', '9876504321'),
(4, '2024-12-21', 12, 'demo', 'check', 100000.00, 4755.00, 456626.00, 'nashik', '9763715014');

-- --------------------------------------------------------

--
-- Table structure for table `v_user`
--

CREATE TABLE `v_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `otp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `v_user`
--

INSERT INTO `v_user` (`id`, `name`, `email`, `avatar`, `password`, `role`, `otp`) VALUES
(1, 'Vaibhav Baghdane', 'vaibhavbaghdane1234@gmail.com', NULL, '$2y$12$e8.iKCRC/CJ8dzwDISAN/.L6N63eph/AvHJr5pbxZ/fCOEL5kenla', 'admin', NULL),
(2, 'admin', 'admin@admin.com', NULL, '$2y$12$Ue0Dm8cqCC.VFaTRLWJf9uWPyUX6vZtlbPAtjzhAE9WLKMBPC6Dt6', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `v_clients`
--
ALTER TABLE `v_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `v_sales`
--
ALTER TABLE `v_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `v_user`
--
ALTER TABLE `v_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`),
  ADD KEY `role_index` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `v_clients`
--
ALTER TABLE `v_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `v_sales`
--
ALTER TABLE `v_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `v_user`
--
ALTER TABLE `v_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `v_sales`
--
ALTER TABLE `v_sales`
  ADD CONSTRAINT `v_sales_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `v_clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
