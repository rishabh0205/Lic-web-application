-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 03:43 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lic_india`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `isActive` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `name`, `short_name`, `email`, `password`, `phone`, `address`, `pin`, `state`, `type`, `image`, `isActive`) VALUES
(1, 'District Institute Of Education & Training', 'DIET', 'thetechnomind@gmail.com', 'e6e061838856bf47e1de730719fb2609', '8869937372, 8601670556', 'Jagatganj, Ramkatora Road, Varanasi', '221001', 'Uttar Pradesh', 'Admin', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `client_policy`
--

CREATE TABLE `client_policy` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `client_dob` varchar(255) NOT NULL,
  `client_age` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lic_policy` varchar(255) NOT NULL,
  `policy_plan` varchar(255) NOT NULL,
  `isActive` varchar(255) NOT NULL DEFAULT 'Active',
  `create_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_policy`
--

INSERT INTO `client_policy` (`id`, `client_name`, `client_address`, `client_dob`, `client_age`, `contact`, `email`, `lic_policy`, `policy_plan`, `isActive`, `create_date`) VALUES
(1, 'Rishabh Srivastava', 'Badi Piyari, Kabir Chaura, Varanasi', '1994-08-27', '25 Year', '7531598524', 'rishu@gmail.com', '2', 'Abc', 'Active', '2019-08-27'),
(2, 'Ajay Kumar Prajapati', 'Suriyawan', '1991-08-27', '27 Year', '7412589632', 'ajay@gmail.com', '1', 'Abc', 'Active', '2019-08-27'),
(4, 'Uday Govind Pathak', 'Kaimur, Bihar - 821103', '1991-08-27', '28 Year', '7643158245', 'uday@gmail.com', '1', 'Abc', 'Active', '2019-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_dob` varchar(255) NOT NULL,
  `customer_age` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `possibility` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `customer_name`, `customer_address`, `customer_dob`, `customer_age`, `contact`, `email`, `possibility`, `description`) VALUES
(1, 'Rishabh Srivastava', 'Kabir Chaura, Varanasi, Uttar Pradesh.', '1994-05-02', '25 Year', '7531598522', 'rishu@gmail.com', 'Interested', 'Yhgsjd mnbmxc srjhg. ughier kjhkghse iuhgier srdgsf'),
(3, 'Ajay Kumar Prajapati', 'Netanagar, Suriyawan, Sant Ravidas Nagar Bhadohi, Uttar Pradesh - 221404', '1991-08-07', '28 Year', '7412589523', 'ajay@gmail.com', 'Not Interested', 'In every chapter, you can edit the examples online, and click on a button to view the result. In every chapter, you can edit the examples online, and click on a button to view the result.');

-- --------------------------------------------------------

--
-- Table structure for table `lic_policy`
--

CREATE TABLE `lic_policy` (
  `id` int(11) NOT NULL,
  `lic_policy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lic_policy`
--

INSERT INTO `lic_policy` (`id`, `lic_policy`) VALUES
(1, 'LIC Jeevan Akshay'),
(2, 'LIC e-Term Plan'),
(3, 'LIC New Childrenâ€™s Money Back Plan'),
(4, 'LIC Jeevan Anand'),
(5, 'LIC Jeevan Saral'),
(6, 'LIC JIvan Bima Nigam');

-- --------------------------------------------------------

--
-- Table structure for table `policy_plan`
--

CREATE TABLE `policy_plan` (
  `id` int(11) NOT NULL,
  `lic_policy_id` varchar(255) NOT NULL,
  `policy_plan` varchar(255) NOT NULL,
  `entry_age` varchar(255) NOT NULL,
  `maximun_maturity_age` varchar(255) NOT NULL,
  `policy_term` varchar(255) NOT NULL,
  `purchase_price` varchar(255) NOT NULL,
  `minimun_sum_assured` varchar(255) NOT NULL,
  `medical_checkup` varchar(255) NOT NULL,
  `isActive` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy_plan`
--

INSERT INTO `policy_plan` (`id`, `lic_policy_id`, `policy_plan`, `entry_age`, `maximun_maturity_age`, `policy_term`, `purchase_price`, `minimun_sum_assured`, `medical_checkup`, `isActive`) VALUES
(1, '2', 'Pure Term Plan', 'Age Of 18 - 60 Year', '75 Year', '10-35 Year', '4600.00', '2500000.00', 'No', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_policy`
--
ALTER TABLE `client_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lic_policy`
--
ALTER TABLE `lic_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_plan`
--
ALTER TABLE `policy_plan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_policy`
--
ALTER TABLE `client_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lic_policy`
--
ALTER TABLE `lic_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `policy_plan`
--
ALTER TABLE `policy_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
