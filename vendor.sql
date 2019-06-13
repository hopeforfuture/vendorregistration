-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 10:27 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vendor`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_type`
--

CREATE TABLE `company_type` (
  `ctype_id` int(11) NOT NULL,
  `ctype_name` varchar(100) NOT NULL,
  `ctype_status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` bigint(20) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_type`
--

INSERT INTO `company_type` (`ctype_id`, `ctype_name`, `ctype_status`, `created_at`, `modified_at`) VALUES
(1, 'Proprietorship', '1', 0, '2019-05-01 11:31:04'),
(2, 'Company', '1', 0, '2019-05-01 11:31:04'),
(3, 'Partnership', '1', 0, '2019-05-01 11:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(100) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active_status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `created_at`, `updated_at`, `active_status`) VALUES
(3, 'Express Group', 'manojit@expressgrp.com', '5454656546', 1558086210, '2019-05-17 09:43:30', '1'),
(4, 'Nilanjan', 'nilanjan@expressgrp.com', '7890453215', 1558090200, '2019-05-17 10:50:00', '1'),
(8, 'Test Contact', 'test@expressgrp.com', '03340641987', 1558335841, '2019-05-20 07:04:01', '1');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `country_status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1 for active 0 for inactive',
  `created_at` bigint(20) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_status`, `created_at`, `modified_at`) VALUES
(1, 'India', '1', 0, '2019-05-01 12:46:30'),
(2, 'UK', '1', 0, '2019-05-01 12:46:30'),
(3, 'Singapore', '1', 0, '2019-05-01 12:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `StateID` int(11) NOT NULL,
  `CountryID` int(11) NOT NULL,
  `StateName` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `ChangeDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StateID`, `CountryID`, `StateName`, `status`, `ChangeDate`) VALUES
(36, 1, 'ANDHRA PRADESH', '1', '2019-05-01 12:44:14'),
(37, 1, 'ASSAM', '1', '2019-05-01 12:44:14'),
(38, 1, 'ARUNACHAL PRADESH', '1', '2019-05-01 12:44:14'),
(39, 1, 'GUJRAT', '1', '2019-05-01 12:44:14'),
(40, 1, 'BIHAR', '1', '2019-05-01 12:44:14'),
(41, 1, 'HARYANA', '1', '2019-05-01 12:44:14'),
(42, 1, 'HIMACHAL PRADESH', '1', '2019-05-01 12:44:14'),
(43, 1, 'JAMMU & KASHMIR', '1', '2019-05-01 12:44:14'),
(44, 1, 'KARNATAKA', '1', '2019-05-01 12:44:14'),
(45, 1, 'KERALA', '1', '2019-05-01 12:44:14'),
(46, 1, 'MADHYA PRADESH', '1', '2019-05-01 12:44:14'),
(47, 1, 'MAHARASHTRA', '1', '2019-05-01 12:44:14'),
(48, 1, 'MANIPUR', '1', '2019-05-01 12:44:14'),
(49, 1, 'MEGHALAYA', '1', '2019-05-01 12:44:15'),
(50, 1, 'MIZORAM', '1', '2019-05-01 12:44:15'),
(51, 1, 'NAGALAND', '1', '2019-05-01 12:44:15'),
(52, 1, 'ORISSA', '1', '2019-05-01 12:44:15'),
(53, 1, 'PUNJAB', '1', '2019-05-01 12:44:15'),
(54, 1, 'RAJASTHAN', '1', '2019-05-01 12:44:15'),
(55, 1, 'SIKKIM', '1', '2019-05-01 12:44:15'),
(56, 1, 'TAMIL NADU', '1', '2019-05-01 12:44:15'),
(57, 1, 'TRIPURA', '1', '2019-05-01 12:44:15'),
(58, 1, 'UTTAR PRADESH', '1', '2019-05-01 12:44:15'),
(59, 1, 'WEST BENGAL', '1', '2019-05-01 12:44:15'),
(60, 1, 'GOA', '1', '2019-05-01 12:44:15'),
(61, 1, 'PONDICHERY', '1', '2019-05-01 12:44:15'),
(62, 1, 'LAKSHDWEEP', '1', '2019-05-01 12:44:15'),
(63, 1, 'DAMAN & DIU', '1', '2019-05-01 12:44:15'),
(64, 1, 'DADRA & NAGAR', '1', '2019-05-01 12:44:15'),
(65, 1, 'CHANDIGARH', '1', '2019-05-01 12:44:15'),
(66, 1, 'ANDAMAN & NICOBAR', '1', '2019-05-01 12:44:15'),
(67, 1, 'UTTARANCHAL', '1', '2019-05-01 12:44:16'),
(68, 1, 'JHARKHAND', '1', '2019-05-01 12:44:16'),
(69, 1, 'CHATTISGARH', '1', '2019-05-01 12:44:16'),
(70, 1, 'ASSAM', '1', '2019-05-01 12:44:16'),
(71, 1, 'DELHI', '1', '2019-05-07 05:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `tblbankname`
--

CREATE TABLE `tblbankname` (
  `bankid` bigint(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bank_status` enum('1','0') NOT NULL DEFAULT '1',
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbankname`
--

INSERT INTO `tblbankname` (`bankid`, `bank_name`, `bank_status`, `modified_at`) VALUES
(109, 'ABHYUDAYA CO-OP BANK LTD', '1', '2019-05-02 05:54:39'),
(110, 'ABN AMRO BANK', '1', '2019-05-02 05:54:39'),
(111, 'ABU DHABI COMMERCIAL BANK', '1', '2019-05-02 05:54:39'),
(112, 'ALLAHABAD BANK', '1', '2019-05-02 05:54:39'),
(113, 'ANDHRA BANK', '1', '2019-05-02 05:54:39'),
(114, 'AXIS BANK', '1', '2019-05-02 05:54:39'),
(115, 'BANK OF AMERICA', '1', '2019-05-02 05:54:39'),
(116, 'BANK OF BAHRAIN AND KUWAIT', '1', '2019-05-02 05:54:39'),
(117, 'BANK OF BARODA', '1', '2019-05-02 05:54:39'),
(118, 'BANK OF INDIA', '1', '2019-05-02 05:54:39'),
(119, 'BANK OF MAHARASHTRA', '1', '2019-05-02 05:54:39'),
(120, 'BANK OF TOKYO-MITSUBISHI UFJ LTD.', '1', '2019-05-02 05:54:39'),
(121, 'BARCLAYS BANK PLC', '1', '2019-05-02 05:54:39'),
(122, 'BNP PARIBAS', '1', '2019-05-02 05:54:39'),
(123, 'CALYON BANK', '1', '2019-05-02 05:54:39'),
(124, 'CANARA BANK', '1', '2019-05-02 05:54:39'),
(125, 'CATHOLIC SYRIAN BANK LTD.', '1', '2019-05-02 05:54:39'),
(126, 'CENTRAL BANK OF INDIA', '1', '2019-05-02 05:54:39'),
(127, 'CHINATRUST COMMERCIAL BANK', '1', '2019-05-02 05:54:39'),
(128, 'Citibank Na', '1', '2019-05-02 05:54:39'),
(129, 'CITIZENCREDIT CO-OPERATIVE BANK LTD', '1', '2019-05-02 05:54:39'),
(130, 'CITY UNION BANK LTD', '1', '2019-05-02 05:54:39'),
(131, 'CORPORATION BANK', '1', '2019-05-02 05:54:39'),
(132, 'DBS BANK LTD', '1', '2019-05-02 05:54:39'),
(133, 'DENA BANK', '1', '2019-05-02 05:54:39'),
(134, 'DEUTSCHE BANK', '1', '2019-05-02 05:54:39'),
(135, 'DEVELOPMENT CREDIT BANK LIMITED', '1', '2019-05-02 05:54:39'),
(136, 'DICGC', '1', '2019-05-02 05:54:39'),
(137, 'DOMBIVLI NAGARI SAHAKARI BANK LIMITED', '1', '2019-05-02 05:54:39'),
(138, 'HDFC BANK LTD', '1', '2019-05-02 05:54:39'),
(139, 'HSBC', '1', '2019-05-02 05:54:39'),
(140, 'ICICI BANK LTD', '1', '2019-05-02 05:54:39'),
(141, 'IDBI BANK LTD', '1', '2019-05-02 05:54:39'),
(142, 'INDIAN BANK', '1', '2019-05-02 05:54:39'),
(143, 'INDIAN OVERSEAS BANK', '1', '2019-05-02 05:54:39'),
(144, 'INDUSIND BANK LTD', '1', '2019-05-02 05:54:39'),
(145, 'ING VYSYA BANK LTD', '1', '2019-05-02 05:54:39'),
(146, 'JANAKALYAN SAHAKARI BANK LTD', '1', '2019-05-02 05:54:39'),
(147, 'JPMORGAN CHASE BANK N.A', '1', '2019-05-02 05:54:39'),
(148, 'KAPOLE CO OP BANK', '1', '2019-05-02 05:54:39'),
(149, 'KARNATAKA BANK LTD', '1', '2019-05-02 05:54:39'),
(150, 'KARUR VYSYA BANK', '1', '2019-05-02 05:54:39'),
(151, 'KOTAK MAHINDRA BANK', '1', '2019-05-02 05:54:39'),
(152, 'MAHANAGAR CO-OP BANK LTD', '1', '2019-05-02 05:54:39'),
(153, 'MAHARASHTRA STATE CO OPERATIVE BANK', '1', '2019-05-02 05:54:39'),
(154, 'MASHREQBANK PSC', '1', '2019-05-02 05:54:39'),
(155, 'MIZUHO CORPORATE BANK LTD', '1', '2019-05-02 05:54:39'),
(156, 'NEW  INDIA CO-OPERATIVE  BANK  LTD.', '1', '2019-05-02 05:54:39'),
(157, 'NKGSB CO-OP BANK LTD', '1', '2019-05-02 05:54:39'),
(158, 'NUTAN NAGARIK SAHAKARI BANK LTD', '1', '2019-05-02 05:54:39'),
(159, 'OMAN INTERNATIONAL BANK SAOG', '1', '2019-05-02 05:54:39'),
(160, 'ORIENTAL BANK OF COMMERCE', '1', '2019-05-02 05:54:39'),
(161, 'PARSIK JANATA SAHAKARI BANK LTD', '1', '2019-05-02 05:54:39'),
(162, 'PUNJAB AND MAHARASHTRA CO-OP BANK LTD.', '1', '2019-05-02 05:54:39'),
(163, 'PUNJAB AND SIND BANK', '1', '2019-05-02 05:54:39'),
(164, 'RESERVE BANK OF INDIA', '1', '2019-05-02 05:54:39'),
(165, 'SHINHAN BANK', '1', '2019-05-02 05:54:39'),
(166, 'SOCIETE GENERALE', '1', '2019-05-02 05:54:39'),
(167, 'SOUTH INDIAN BANK', '1', '2019-05-02 05:54:39'),
(168, 'STANDARD CHARTERED BANK', '1', '2019-05-02 05:54:39'),
(169, 'STATE BANK OF BIKANER AND JAIPUR', '1', '2019-05-02 05:54:39'),
(170, 'STATE BANK OF HYDERABAD', '1', '2019-05-02 05:54:39'),
(171, 'STATE BANK OF INDIA', '1', '2019-05-02 05:54:39'),
(172, 'STATE BANK OF INDORE', '1', '2019-05-02 05:54:39'),
(173, 'STATE BANK OF MAURITIUS LTD', '1', '2019-05-02 05:54:39'),
(174, 'STATE BANK OF MYSORE', '1', '2019-05-02 05:54:39'),
(175, 'STATE BANK OF PATIALA', '1', '2019-05-02 05:54:39'),
(176, 'STATE BANK OF TRAVANCORE', '1', '2019-05-02 05:54:39'),
(177, 'SYNDICATE BANK', '1', '2019-05-02 05:54:39'),
(178, 'TAMILNAD MERCANTILE BANK LTD', '1', '2019-05-02 05:54:39'),
(179, 'THE AHMEDABAD MERCANTILE CO-OPERATIVE BANK LTD', '1', '2019-05-02 05:54:39'),
(180, 'THE BANK OF NOVA SCOTIA', '1', '2019-05-02 05:54:39'),
(181, 'THE BANK OF RAJASTHAN LTD', '1', '2019-05-02 05:54:39'),
(182, 'THE BHARAT CO-OPERATIVE BANK (MUMBAI) LTD', '1', '2019-05-02 05:54:39'),
(183, 'THE COSMOS CO-OPERATIVE BANK LTD.', '1', '2019-05-02 05:54:39'),
(184, 'THE DHANALAKSHMI BANK LTD', '1', '2019-05-02 05:54:39'),
(185, 'THE FEDERAL BANK LTD', '1', '2019-05-02 05:54:39'),
(186, 'THE GREATER BOMBAY CO-OP. BANK LTD', '1', '2019-05-02 05:54:39'),
(187, 'THE JAMMU AND KASHMIR BANK LTD', '1', '2019-05-02 05:54:39'),
(188, 'THE KALUPUR COMMERCIAL CO. OP. BANK LTD.', '1', '2019-05-02 05:54:39'),
(189, 'THE KALYAN JANATA SAHAKARI BANK LTD.', '1', '2019-05-02 05:54:39'),
(190, 'THE LAKSHMI VILAS BANK LTD', '1', '2019-05-02 05:54:39'),
(191, 'THE RATNAKAR BANK LTD', '1', '2019-05-02 05:54:39'),
(192, 'THE SARASWAT CO-OPERATIVE BANK LTD', '1', '2019-05-02 05:54:39'),
(193, 'THE SHAMRAO VITHAL CO-OPERATIVE BANK LIMITED', '1', '2019-05-02 05:54:39'),
(194, 'THE TAMILNADU STATE APEX COOPERATIVE BANK LIMITED', '1', '2019-05-02 05:54:39'),
(195, 'THE THANE JANATA SAHAKARI BANK LTD', '1', '2019-05-02 05:54:39'),
(196, 'UCO BANK', '1', '2019-05-02 05:54:39'),
(197, 'UNION BANK OF INDIA', '1', '2019-05-02 05:54:39'),
(198, 'UNITED BANK OF INDIA', '1', '2019-05-02 05:54:39'),
(199, 'VIJAYA BANK', '1', '2019-05-02 05:54:39'),
(200, 'YES BANK LTD', '1', '2019-05-02 05:54:39'),
(201, 'ABHYUDAYA CO-OP BANK LTD', '0', '2019-05-02 05:54:39'),
(202, 'AXIS BANK', '0', '2019-05-02 05:54:39'),
(203, 'BANK OF BARODA', '0', '2019-05-02 05:54:39'),
(204, 'BANK OF MAHARASHTRA', '0', '2019-05-02 05:54:39'),
(205, 'CANARA BANK', '0', '2019-05-02 05:54:39'),
(206, 'CENTRAL BANK OF INDIA', '0', '2019-05-02 05:54:39'),
(207, 'HDFC BANK LTD', '0', '2019-05-02 05:54:39'),
(208, 'IDBI BANK LTD', '0', '2019-05-02 05:54:39'),
(209, 'INDIAN OVERSEAS BANK', '0', '2019-05-02 05:54:39'),
(210, 'INDUSIND BANK LTD', '0', '2019-05-02 05:54:39'),
(211, 'KARNATAKA BANK LTD', '0', '2019-05-02 05:54:39'),
(212, 'ORIENTAL BANK OF COMMERCE', '0', '2019-05-02 05:54:39'),
(213, 'PUNJAB NATIONAL BANK', '1', '2019-05-02 05:54:39'),
(214, 'STATE BANK OF PATIALA', '0', '2019-05-02 05:54:39'),
(215, 'UCO BANK', '0', '2019-05-02 05:54:39'),
(216, 'UNION BANK OF INDIA', '0', '2019-05-02 05:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_pswd` varchar(255) NOT NULL,
  `u_type` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1 for admin user 2 for other user',
  `u_status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1 for active user 0 for deleted user',
  `last_login` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_pswd`, `u_type`, `u_status`, `last_login`) VALUES
(1, 'Vendor Admin', 'admin@expressgrp.com', '0192023a7bbd73250516f069df18b500', '1', '1', 1560404799);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_contacts`
--

CREATE TABLE `vendor_contacts` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `created_at` bigint(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_contacts`
--

INSERT INTO `vendor_contacts` (`id`, `vendor_id`, `contact_id`, `created_at`, `updated_at`) VALUES
(89, 29, 4, 1558329189, '2019-05-20 05:13:09'),
(90, 7, 4, 1558329189, '2019-05-20 05:13:09'),
(91, 16, 8, 1559630885, '2019-06-04 06:48:05'),
(92, 11, 8, 1559630885, '2019-06-04 06:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_files`
--

CREATE TABLE `vendor_files` (
  `f_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_status` enum('A','P','R') NOT NULL DEFAULT 'P' COMMENT 'A for ACCEPT P for PENDING R for REJECT',
  `f_type` enum('I','Q') NOT NULL COMMENT 'I for INVOICE Q for QUOTATION',
  `paid_status` enum('1','0','NA') NOT NULL DEFAULT '0' COMMENT '1 for paid 0 for unpaid',
  `f_reject_reason` text,
  `payment_due_date` bigint(20) DEFAULT NULL,
  `created_at` bigint(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active_status` enum('1','0') NOT NULL DEFAULT '1' COMMENT '1 for active 0 for in active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_files`
--

INSERT INTO `vendor_files` (`f_id`, `vendor_id`, `f_name`, `f_status`, `f_type`, `paid_status`, `f_reject_reason`, `payment_due_date`, `created_at`, `updated_at`, `active_status`) VALUES
(18, 10, '450465723_inv1.png', 'A', 'I', '0', '', NULL, 1557730190, '2019-05-13 11:16:07', '1'),
(19, 10, '526744289_inv2.png', 'A', 'I', '1', '', 1591295400, 1557730190, '2019-05-13 11:21:35', '1'),
(20, 10, '998503661_inv3.png', 'R', 'I', '0', '', NULL, 1557730190, '2019-05-13 07:44:05', '1'),
(21, 10, '93932007_inv5.png', 'A', 'I', '1', '', 1559759400, 1557730190, '2019-05-13 11:19:09', '1'),
(22, 10, '734602743_cancelled-cheque-3.jpg', 'A', 'Q', 'NA', '', NULL, 1557730481, '2019-05-13 07:37:02', '1'),
(23, 10, '267122759_gst.jpg', 'R', 'Q', 'NA', 'Invalid doc.', NULL, 1557730481, '2019-05-13 07:31:23', '1'),
(24, 10, '157781915_img1.png', 'R', 'Q', 'NA', 'Inappropiate document', NULL, 1557730481, '2019-05-13 07:29:41', '1'),
(25, 6, '522710526_quo7.jpg', 'P', 'Q', 'NA', '', NULL, 1557733886, '2019-05-13 11:22:11', '1'),
(26, 6, '946364962_quo4.jpg', 'A', 'Q', 'NA', '', NULL, 1557733886, '2019-05-13 10:10:44', '1'),
(27, 6, '926240356_quo2.png', 'R', 'Q', 'NA', 'Lorem ipsumis the dummy text for the industry', NULL, 1557733886, '2019-05-13 11:27:20', '1'),
(28, 6, '355044954_gst2.png', 'A', 'I', '1', '', 1544639400, 1557735877, '2019-05-13 12:18:47', '1'),
(29, 6, '832116963_inv2.png', 'R', 'I', '0', 'No proper doc', 1567967400, 1557735877, '2019-05-13 11:23:59', '1'),
(30, 10, '76065_trade-license-4.jpg', 'P', 'I', '0', NULL, NULL, 1557747465, '2019-05-13 11:37:45', '1'),
(31, 30, '847428052_gst2.png', 'P', 'I', '0', NULL, NULL, 1557748266, '2019-05-13 11:51:06', '1'),
(32, 30, '185428323_gst2.png', 'P', 'I', '0', NULL, NULL, 1557748266, '2019-05-13 11:51:07', '1'),
(33, 30, '512883908_gst3.jpg', 'P', 'I', '0', NULL, NULL, 1557748267, '2019-05-13 11:51:07', '1'),
(34, 30, '378084185_gst4.png', 'P', 'I', '0', NULL, NULL, 1557748267, '2019-05-13 11:51:07', '1'),
(35, 30, '767983269_trade-license-5.jpg', 'P', 'I', '0', NULL, NULL, 1557748267, '2019-05-13 12:31:27', '1'),
(36, 30, '528828913_gst5.jpg', 'A', 'Q', 'NA', '', NULL, 1557748281, '2019-05-13 12:17:21', '1'),
(37, 30, '316588813_inv4.png', 'P', 'Q', 'NA', NULL, NULL, 1557748281, '2019-05-13 11:51:21', '1'),
(38, 30, '581845562_trade-license.jpg', 'R', 'Q', 'NA', 'for test', NULL, 1557748281, '2019-05-13 12:16:15', '1'),
(39, 10, '123105086_vendor_registration.pdf', 'P', 'I', '0', NULL, NULL, 1557840971, '2019-05-14 13:38:48', '1'),
(40, 10, '997658610_gst2.png', 'P', 'Q', 'NA', NULL, NULL, 1557895743, '2019-05-15 04:49:03', '1'),
(41, 10, '604328318_trade6.jpg', 'P', 'Q', 'NA', NULL, NULL, 1557895743, '2019-05-15 04:49:03', '1'),
(42, 10, '183578379_vendor_registration.pdf', 'P', 'Q', 'NA', NULL, NULL, 1557895814, '2019-05-15 04:50:14', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_info`
--

CREATE TABLE `vendor_info` (
  `vendor_id` int(11) NOT NULL,
  `vendor_country` int(11) NOT NULL,
  `vendor_unique` varchar(200) DEFAULT NULL,
  `vendor_type_id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_type_id` int(11) NOT NULL,
  `company_address` text NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(200) NOT NULL,
  `company_pin` varchar(50) NOT NULL,
  `company_tel1` varchar(50) NOT NULL,
  `company_tel2` varchar(50) DEFAULT NULL,
  `company_url` varchar(255) DEFAULT NULL,
  `contact_p_name` varchar(100) NOT NULL,
  `contact_p_post` varchar(100) NOT NULL,
  `contact_p_mob` varchar(100) NOT NULL,
  `contact_p_email` varchar(100) NOT NULL,
  `contact_p_password` varchar(255) NOT NULL,
  `pan_info` varchar(255) NOT NULL,
  `gst_info` varchar(255) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `branch_name` varchar(200) NOT NULL,
  `acc_no` varchar(100) NOT NULL,
  `ifsc_code` varchar(100) NOT NULL,
  `acc_type` enum('S','C','CCR') NOT NULL COMMENT 'S for savings a/c C for current a/c CCR for Cash Credit',
  `trade_file` varchar(255) DEFAULT NULL COMMENT 'Trade License File Info',
  `cert_file` varchar(255) DEFAULT NULL COMMENT 'Certfication of Incorporation File Info',
  `pan_file` varchar(255) DEFAULT NULL COMMENT 'Pan File Info',
  `gst_file` varchar(255) DEFAULT NULL COMMENT 'GST File Info',
  `cancelled_cheque_file` varchar(255) DEFAULT NULL COMMENT 'Cancelled Cheque File',
  `created_at` bigint(20) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `vendor_status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_info`
--

INSERT INTO `vendor_info` (`vendor_id`, `vendor_country`, `vendor_unique`, `vendor_type_id`, `company_name`, `company_type_id`, `company_address`, `state_id`, `city_name`, `company_pin`, `company_tel1`, `company_tel2`, `company_url`, `contact_p_name`, `contact_p_post`, `contact_p_mob`, `contact_p_email`, `contact_p_password`, `pan_info`, `gst_info`, `bank_id`, `branch_name`, `acc_no`, `ifsc_code`, `acc_type`, `trade_file`, `cert_file`, `pan_file`, `gst_file`, `cancelled_cheque_file`, `created_at`, `modified_at`, `vendor_status`) VALUES
(5, 1, NULL, 6, 'Farmneed Business Service', 2, 'kolkata', 59, 'Kolkata', '700091', '033 2557 3503', '01140097895', 'http://www.google.com', 'Syantan', 'Senior Developer', '6290094803', 'hr@farmneed.com', 'e2d9fd746c89452f6991dcf4c4a2afd0', 'AIIPPNO190F', 'GST123', 138, 'Laketown branch', '789032145674', 'HDFC000349', 'CCR', '818530_trade-license.jpg', '979558_img1.png', '417947_pan-card.jpg', '692113_gst1.png', '755967_cancelled-cheque.jpg', 1557146190, '2019-05-06 12:36:30', '1'),
(6, 1, NULL, 2, 'ABC Ltd', 1, 'kolkata', 59, 'Kolkata', '700028', '033 2557 3503', '01140097895', 'http://www.google.com', 'Nilanjan', 'Audit officer', '8697038228', 'mnbl87@gmail.com', '0192023a7bbd73250516f069df18b500', 'AIIPPNO19U8', 'GST12345', 114, 'Laketown branch', '789032145674', 'BOBJESSOR001', 'S', '333403_trade-license1.jpg', NULL, '443067_pan-card.jpg', '239661_gst2.png', '733956_cancelled-cheque.jpg', 1557146546, '2019-05-06 12:42:26', '1'),
(7, 1, NULL, 6, 'TCS', 2, 'Mumbai', 47, 'Mumbai', '110896', '033 2556 6745', '01140097895', 'https://www.tcs.com', 'Mukesh', 'Senior Developer', '9007352832', 'hr@tcs.com', '0192023a7bbd73250516f069df18b500', 'AIIPPNO19U8', 'GST123456', 116, 'Laketown branch', '789032145674', 'BOBJESSOR001', 'C', NULL, '230151_coi-1.png', '900386_pancard2.jpg', '802652_gst3.jpg', '248940_cancelled-cheque.jpg', 1557147059, '2019-05-06 12:50:59', '1'),
(8, 1, NULL, 4, 'Techno Exponent', 1, 'Webel More , Salt Lake', 59, 'Kolkata', '700091', '9067812345', '01140054671', '', 'Avoy', 'Senior Developer', '8697475371', 'hr@technoexponent.com', '0192023a7bbd73250516f069df18b500', 'AIIPPNO190F', 'GST123456', 140, 'Laketown branch', '789032145674', 'BOBJESSOR001', 'C', '697569_trade-license1.jpg', NULL, '498631_pancard1.jpg', '471399_gst.jpg', '838199_cancelled-cheque.jpg', 1557148218, '2019-05-06 13:10:18', '0'),
(9, 1, NULL, 9, 'Smartwork Business Solution', 3, 'Kolkata, Salt Lake', 59, 'Kolkata', '700091', '0123421345', '', '', 'kousik Dey', 'Audit officer', '8906745321', 'kaushikdey@sworks.co.in', '637d2d901f38fec8c57942c9932716a7', 'AIIPPNO19U8', 'GST12345', 138, 'Laketown branch', '789032145674', 'HDFC000349', 'S', '914954_trade-license-3.jpg', NULL, '228000_pan-card.jpg', '640448_gst2.png', '479661_cancelled-cheque.jpg', 1557148487, '2019-05-06 13:14:47', '1'),
(10, 1, NULL, 7, 'Bluent e Solution', 3, 'South Delhi', 71, 'Delhi', '110674', '01167859034', '', 'http://www.bluent.com', 'Kirti Prasad', 'HR', '8956409126', 'hr@bluent.com', '0192023a7bbd73250516f069df18b500', 'AIPPNO190F', 'G0987', 114, 'Laketown branch', '789032145674', 'AXIX000111', 'S', '981052_trade-license-4.jpg', NULL, '612551_pan-card.jpg', '267791_gst3.jpg', '232755_cancelled-cheque.jpg', 1557206328, '2019-05-07 05:18:48', '1'),
(11, 1, NULL, 7, 'Tekriti Software', 2, 'Gurgaon', 41, 'Gurgaon', '109786', '01167893461', '', '', 'Megha Thakur', 'HR', '9007193161', 'hr@tekriti.com', '02d81c5311f38839cfac1151c0152627', 'AIIPPNO190F', 'GST123456', 122, 'Salt Lake', '789032145674', 'BNP000111', 'S', NULL, '407967_coi-3.png', '389770_pancard2.jpg', '772624_gst3.png', '614837_cancelled-cheque.jpg', 1557206637, '2019-05-07 05:23:57', '1'),
(12, 1, NULL, 9, 'Clavax technology', 3, 'Udoyg Vihar, Gurgaon', 41, 'Gurgaon', '700091', '0189045321', '', 'https://www.clavax.com', 'Praveen Narwal', 'HR', '0123421345', 'mnbl87@yahoo.com', '5eb7cc59b554f5b608c04e1cffdfb1ca', 'AIIPPNO190F', 'GST123456', 114, 'Salt Lake', '789032145674', 'AXIX000111', 'CCR', '288489_trade-license1.jpg', NULL, '904693_pancard1.jpg', '552760_gst3.png', '566862_cancelled-cheque.jpg', 1557207310, '2019-05-07 05:35:10', '1'),
(13, 1, NULL, 1, 'sdgsgsgsgg', 3, 'dsgdsdssggds', 63, 'ssgsgsgds', '546231', '0123498789', '', '', 'Habib', 'HR', '7890156879', 'hr@abc.com', '80a7a65d43e373f7307bdeb147e9baed', 'AIIPPNO190F', 'GST123456', 121, 'Laketown branch', '434343543543543', 'BOBJESSOR001', 'C', '670563_trade-license-3.jpg', NULL, '12807_pancard1.jpg', '137063_gst3.jpg', '400421_cancelled-cheque.jpg', 1557209338, '2019-05-07 06:08:58', '1'),
(14, 1, NULL, 7, 'Facebook', 2, 'Bengaluru', 44, 'Bengaluru', '222212', '0123421345', '', 'https://www.facebook.com', 'Mark Zuckerbag', 'CEO', '9078543976', 'hr@facebook.com', 'e3bcd29ccda136b66bd7acb0b0abf01b', 'AIIPPNO19U8', 'GST123456', 153, 'Mumbai South', '434343543543543', 'HDFC000349', 'C', '33366_trade-license-5.jpg', '879010_coi-3.png', '266046_pancard2.jpg', '363013_gst5.jpg', '177537_Cancelled-cheque-2.jpg', 1557210293, '2019-05-07 06:24:53', '0'),
(15, 1, NULL, 5, 'Websoft', 3, 'Salt lake AD Block', 59, 'Kolkata', '700091', '9250652895', '', '', 'Pulak', 'developer', '9005671234', 'hr@websoft.com', 'b2423bfe59ff2ed3bf63450211881cd1', 'AIPPNO190F', 'GST123456', 124, 'Mumbai South', '789032145674', 'AXIX000111', 'CCR', '335442_trade-license1.jpg', NULL, '85652_pancard1.jpg', '592972_gst2.png', '221995_Cancelled-cheque-2.jpg', 1557217773, '2019-05-07 08:29:33', '1'),
(16, 1, NULL, 7, 'IBM', 2, 'Bengaluru', 44, 'Bengaluru', '200300', '9987632451', '', 'https://www.ibm.com', 'Sourav Nandi', 'Lead', '9987632451', 'hr@ibm.com', '670b693e77df026fce8207cbd9c5b4c7', 'AIIPPNO190F', 'GST123456', 126, 'Shyambazar', '789032145674', 'HDFC000349', 'S', NULL, '782431_coi-2.jpg', '51619_pancard2.jpg', '258742_gst3.jpg', '739368_Cancelled-cheque-2.jpg', 1557224604, '2019-05-07 10:23:24', '1'),
(17, 1, NULL, 6, 'Test Company', 1, 'Mumbai', 47, 'mumbai', '111222', '09956458976', '', '', 'sayan', 'Officer', '9078621345', 'test@test.com', 'ec7430a18a0dc22994ae52c268f72256', 'AIIPPNO190F', 'GST123', 117, 'Mumbai South', '789032145674', 'HDFC000349', 'S', '145630_trade-license-3.jpg', NULL, '850434_pancard1.jpg', '28582_gst2.png', '571628_Cancelled-cheque-2.jpg', 1557234020, '2019-05-07 13:00:20', '0'),
(18, 1, NULL, 5, 'Test Company Ltd', 3, 'Kolkata', 59, 'Kolkata', '700037', '123456', '', '', 'Test', 'manager', '9067123456', 'test@yahoo.com', '2be31ddf5b929dc8f25e6ce6ed9d1c20', 'AIPPNO19G', 'GST123456', 119, 'Shyambazar', '111222', 'UUUUUUUU', 'S', '240466_trade-license1.jpg', NULL, '817545_pancard1.jpg', '259885_gst2.png', '506028_Cancelled-cheque-2.jpg', 1557295935, '2019-05-08 06:12:15', '1'),
(19, 1, NULL, 6, 'aaaaaaaaaa', 3, 'cdsdsgfdsg', 43, 'Kashmir', '222222', '22221187', '', '', 'Sahil', 'manager', '6666677777', 'test@hotmail.com', 'c1726a5f4492c4e2bba842fcdfb92e52', 'AIPPNO19G', 'GST123456', 155, 'Shyambazar', '111222', 'UUUUUUUU', 'CCR', '940384_trade-license-4.jpg', NULL, '374074_pan-card.jpg', '932684_gst.jpg', '710974_cancelled-cheque.jpg', 1557296250, '2019-05-08 06:17:30', '0'),
(20, 1, NULL, 7, 'SSSSSSDDDDDD', 3, 'fdgfdgfdfdgfd', 36, 'Hyderabad', '222222', '111111', '', '', 'Mukesh', 'HR', '5555', 'bbbbbbb@gmail.com', '91888dd202d9705865b3c63bb365a235', 'AIPPNO190G', 'GGGGGGGGG11111111', 196, 'Park street', '888888888888', 'AAAAAAAAA', 'C', '992096_trade-license.jpg', NULL, '319600_pancard1.jpg', '240778_gst3.jpg', '279700_Cancelled-cheque-2.jpg', 1557296507, '2019-05-08 06:21:47', '0'),
(21, 1, NULL, 2, 'KKKK', 2, 'Delhi', 71, 'Delhi', '333333', '222222222222222', '', '', 'SSSS', 'ZZZZZZZZ', '88888888888', 'abc@pqr.com', '237c0b13d33bfec26ac7f3ac5af5abd8', 'AAAAAOOOOOOO55555', 'GSTRYU3456', 197, 'Delhi', '2222223333333333', 'HelloUNI', 'C', '556178_trade-license1.jpg', '456009_coi-2.jpg', '786298_pan-card.jpg', '25067_gst3.jpg', '844760_cancelled-cheque.jpg', 1557296908, '2019-05-08 06:28:28', '0'),
(22, 1, NULL, 5, 'HIHIHI', 1, 'Kalyani', 59, 'Kalyani', '666666', '222222222222222', '', '', 'KaoMao', 'ZZZZZZZZ', '77777567890', 'kaomao@gmail.com', '9b331f243d15f3812a1e735117644a50', 'AIPPNO907H', 'GSTRYU3456', 185, 'Garia', '6666666', 'FBLUPC111', 'C', '886601_trade-license-4.jpg', NULL, '524650_pancard2.jpg', '699231_gst3.png', '753522_Cancelled-cheque-2.jpg', 1557297162, '2019-05-08 06:32:42', '0'),
(23, 1, NULL, 4, 'ewrewewrewr', 2, 'vvsvdsdsdf', 39, 'dsdsdsds', '333333', '2121131313', '', '', 'dfdssdds', 'trrtryytrytrtr', '66666666666', 'dxfdgfdggd@fdhfdhdhdhfd.com', 'af97218c83cd558928f5a84cf16e76dc', 'fdgfdgfdfdgfd', 'fdgfdfdgdfg', 199, 'fdfdgfdgfdg', '5464656544', 'dhhhdhtrtr', 'CCR', NULL, '692835_coi-1.png', '248623_pan-card.jpg', '364877_gst3.png', '286041_cancelled-cheque.jpg', 1557298355, '2019-05-08 06:52:35', '0'),
(24, 1, NULL, 8, 'dfdfdsdsfds', 2, 'ewrewrewdsdsdsds', 39, 'fdddhdhgdh', '444444', '22222222222222222', '', '', 'hcbcbdd', 'fddgdgfdgfd', '44445555', 'manojit@in.com', '96497e6a693b97991777d2e68dc20d70', 'hgegggfdfdg', 'vbvcbvcbvcbvc', 188, 'ewrewrewrewr', '333333333222222222', 'dhhhdhtrtr', 'CCR', '456734_trade-license-5.jpg', '255438_coi-3.png', '820688_pancard1.jpg', '910804_cancelled-cheque.jpg', '960253_vendor registration.pdf', 1557298659, '2019-05-08 06:57:39', '0'),
(25, 1, NULL, 6, 'JJJJ', 2, 'Mumbai', 47, 'Mumbai', '444444', '33331111', '', '', 'DDDDD', 'HR', '6790045321', 'hr@fdfd.com', '0192023a7bbd73250516f069df18b500', 'gdsdsffd', 'vdsvdsdsfds', 124, 'vcxcxvxvxvc', '664335435', 'vcncccvc', 'S', '840160_vendor registration.pdf', '965084_coi-2.jpg', '522683_pan-card.jpg', '731990_gst5.jpg', '482386_cancelled-cheque.jpg', 1557299829, '2019-05-08 07:17:09', '0'),
(26, 1, NULL, 2, 'Infosys', 1, 'Bengaluru', 44, 'Bengaluru', '890345', '0895678342', '', '', 'Nidhi', 'HR', '7890567341', 'hr@infosys.com', '1b64d362e52e168ecffc251c78136261', 'AIPPN0190G', 'GGGG123', 159, 'KOLKATA', '67874567', '555555GGGG', 'S', '667304_trade-license-4.jpg', NULL, '434699_pancard2.jpg', '588566_gst3.jpg', '577151_Cancelled-cheque-2.jpg', 1557301525, '2019-05-08 07:45:25', '0'),
(27, 1, NULL, 6, 'Farmneed Business Service', 2, 'kolkata', 59, 'Kolkata', '700091', '033 2557 3503', '01140097895', 'http://www.google.com', 'Syantan', 'Senior Developer', '9230459769', 'hr@farmneed.com', '10c4981bb793e1698a83aea43030a388', 'AIIPPNO190F', 'GST123', 138, 'Laketown branch', '789032145674', 'HDFC000349', 'CCR', '818530_trade-license.jpg', '979558_img1.png', '417947_pan-card.jpg', '692113_gst1.png', '755967_cancelled-cheque.jpg', 1557146190, '2019-05-06 12:36:30', '1'),
(28, 1, NULL, 6, 'Test Company Ltd', 2, 'Kolkata', 60, 'Panaji', '444444', '777777777', '', '', 'ABC', 'HR', '9126394834', 'doyeta.piyali@gmail.com', 'a6efab98a7eecb769a9a85366963cbd8', 'AIPPNO190H', 'GST9806', 199, 'Gariahat', '66666666666', 'VJ1111', 'S', '157428_trade-license1.jpg', '343830_coi-3.png', '474391_pancard1.jpg', '421792_gst1.png', '35432_cancelled-cheque.jpg', 1557314583, '2019-05-08 11:23:03', '0'),
(29, 1, NULL, 9, 'TATA Communication', 2, 'Kolkata', 59, 'Kolkata', '700023', '8790233333', '', 'https://www.tatacomm.com', 'Suchi', 'Architect', '8905671234', 'suchi@gmail.com', '0192023a7bbd73250516f069df18b500', 'BIPPN0120G', 'GST9806', 151, 'Park Street', '999999', 'PARK111', 'C', '328631_trade6.jpg', '59104_coi-3.png', '423682_Pancard3.jpg', '607952_gst6.jpg', '560219_cancelled-cheque-3.jpg', 1557319772, '2019-05-08 12:49:32', '1'),
(30, 1, NULL, 1, 'express weather', 2, 'kolkata', 59, 'kolkata', '700092', '033123456789', '033123456789', 'http://www.ishanbanerjee.com', 'Nilanjan Banerjee', 'developer', '8017469711', 'nilanjanban@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'avghjjjj', '420', 140, 'kolkata', '333212154122541', 'Blllllll110000', 'S', '706944_cancelled-cheque.jpg', '683420_Cancelled-cheque-2.jpg', '106164_gst3.jpg', '570524_inv2.png', '706291_inv4.png', 1557748077, '2019-05-13 11:47:57', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_type`
--

CREATE TABLE `vendor_type` (
  `vtype_id` int(11) NOT NULL,
  `vtype_name` varchar(100) NOT NULL,
  `vtype_status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` bigint(20) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_type`
--

INSERT INTO `vendor_type` (`vtype_id`, `vtype_name`, `vtype_status`, `created_at`, `modified_at`) VALUES
(1, 'IT hardware', '1', 0, '2019-05-01 11:23:17'),
(2, 'Travel service', '1', 0, '2019-05-01 11:23:49'),
(4, 'Utility service', '1', 0, '2019-05-01 11:24:44'),
(5, 'sensor manufacturer', '1', 0, '2019-05-02 04:54:23'),
(6, 'Property management company', '1', 0, '2019-05-02 04:54:23'),
(7, 'general order supplier', '1', 0, '2019-05-02 04:55:33'),
(8, 'ISP & Telcom service', '1', 0, '2019-05-02 04:55:33'),
(9, 'food & catering service', '1', 0, '2019-05-02 04:56:09'),
(10, 'others ', '1', 0, '2019-05-02 04:56:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_type`
--
ALTER TABLE `company_type`
  ADD PRIMARY KEY (`ctype_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`StateID`) USING BTREE;

--
-- Indexes for table `tblbankname`
--
ALTER TABLE `tblbankname`
  ADD PRIMARY KEY (`bankid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `vendor_contacts`
--
ALTER TABLE `vendor_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_files`
--
ALTER TABLE `vendor_files`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `vendor_info`
--
ALTER TABLE `vendor_info`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor_type`
--
ALTER TABLE `vendor_type`
  ADD PRIMARY KEY (`vtype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_type`
--
ALTER TABLE `company_type`
  MODIFY `ctype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `StateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tblbankname`
--
ALTER TABLE `tblbankname`
  MODIFY `bankid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_contacts`
--
ALTER TABLE `vendor_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `vendor_files`
--
ALTER TABLE `vendor_files`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `vendor_info`
--
ALTER TABLE `vendor_info`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `vendor_type`
--
ALTER TABLE `vendor_type`
  MODIFY `vtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
