-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2024 at 01:45 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21333276_njsmtiplacementscell`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administrator`
--

CREATE TABLE `Administrator` (
  `AdminId` varchar(29) NOT NULL,
  `UserType` varchar(29) DEFAULT NULL,
  `Email` varchar(69) DEFAULT NULL,
  `Password` varchar(69) DEFAULT NULL,
  `OTP` int(6) DEFAULT NULL,
  `remember_token` varchar(29) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Administrator`
--

INSERT INTO `Administrator` (`AdminId`, `UserType`, `Email`, `Password`, `OTP`, `remember_token`, `created_at`, `updated_at`) VALUES
('Admin2', 'Administrator', 'njsmtiplacementcell@gmail.com', '18b06f349dea5205c799f9e839b44c86', 245683, NULL, '2024-02-22 14:52:11', '2024-02-22 14:46:31'),
('ADMINISTRATOR@NJSMTI', 'Administrator', 'ghanshyamvaja11@gmail.com', '3ab963dea0d50be5461330a2c0208f35', 637184, NULL, '2024-05-17 07:55:53', '2024-05-17 07:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `Applications`
--

CREATE TABLE `Applications` (
  `ApplicationId` bigint(15) NOT NULL,
  `StudentId` varchar(29) NOT NULL,
  `JobId` varchar(29) NOT NULL,
  `ApplicationDate` date NOT NULL,
  `Status` varchar(2) DEFAULT NULL,
  `remember_token` varchar(29) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Applications`
--

INSERT INTO `Applications` (`ApplicationId`, `StudentId`, `JobId`, `ApplicationDate`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(57438749831, '1111', '1120', '2009-05-24', NULL, NULL, '2024-05-09 07:21:40', '2024-05-09 07:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `Companies`
--

CREATE TABLE `Companies` (
  `CompanyId` varchar(29) NOT NULL,
  `UserType` varchar(9) NOT NULL,
  `Name` varchar(69) NOT NULL,
  `Email` varchar(69) NOT NULL,
  `Industry` varchar(29) NOT NULL,
  `Location` varchar(290) NOT NULL,
  `Password` varchar(69) NOT NULL,
  `OTP` int(6) NOT NULL,
  `remember_token` varchar(69) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Companies`
--

INSERT INTO `Companies` (`CompanyId`, `UserType`, `Name`, `Email`, `Industry`, `Location`, `Password`, `OTP`, `remember_token`, `created_at`, `updated_at`) VALUES
('11', 'Company', 'Aa', 'aa@gmail.com', 'IT', 'Xhdn', 'd5a12fc2ec9fa02e671fb9ad2215a469', 291721, NULL, '2024-05-09 09:18:15', '2024-05-09 09:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `ContactUs`
--

CREATE TABLE `ContactUs` (
  `name` varchar(29) NOT NULL,
  `Email` varchar(59) NOT NULL,
  `Query_Type` varchar(29) NOT NULL,
  `description` varchar(996) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ContactUs`
--

INSERT INTO `ContactUs` (`name`, `Email`, `Query_Type`, `description`, `created_at`, `updated_at`) VALUES
('Abab', 'a@gmail.com', 'Exam', 'Dbdjdnxjdnn\r\nDndndnxn', '2024-05-09 07:29:19', '2024-05-09 07:29:19'),
('GV', 'vajaghanshyam11@gmail.com', 'Library', '42\r\nCd\r\nEf\r\n86\r\nIj\r\nK', '2024-02-14 07:56:59', '2024-02-14 07:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `EventId` varchar(29) NOT NULL,
  `Name` varchar(29) NOT NULL,
  `Date` date NOT NULL,
  `Description` varchar(690) NOT NULL,
  `remember_token` varchar(29) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`EventId`, `Name`, `Date`, `Description`, `remember_token`, `created_at`, `updated_at`) VALUES
('2002', 'ABC42', '2024-02-15', 'A\r\nB\r\nC\r\nD\r\nE', NULL, '2024-02-14 07:22:27', '2024-02-14 07:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `JobPostings`
--

CREATE TABLE `JobPostings` (
  `JobId` varchar(29) NOT NULL,
  `CompanyId` varchar(29) NOT NULL,
  `Position` varchar(69) NOT NULL,
  `Field` varchar(29) NOT NULL,
  `Description` varchar(290) NOT NULL,
  `Salary` int(6) NOT NULL,
  `Requirement` varchar(290) NOT NULL,
  `ApplicationDeadline` date NOT NULL,
  `remeber_token` varchar(29) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Placements`
--

CREATE TABLE `Placements` (
  `PlacementId` varchar(29) NOT NULL,
  `StudentId` varchar(29) NOT NULL,
  `JobId` varchar(29) NOT NULL,
  `DatePlaced` date NOT NULL,
  `SalaryOffered` int(6) NOT NULL,
  `remember_token` varchar(29) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Placements`
--

INSERT INTO `Placements` (`PlacementId`, `StudentId`, `JobId`, `DatePlaced`, `SalaryOffered`, `remember_token`, `created_at`, `updated_at`) VALUES
('1212', '1111', '2020', '2024-05-09', 50000, NULL, '2024-05-09 07:26:31', '2024-05-09 07:26:31'),
('14', '8686', '118659', '2024-02-14', 500000, NULL, '2024-02-14 08:58:04', '2024-02-14 08:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
  `StudentId` varchar(59) NOT NULL,
  `UserType` varchar(59) NOT NULL,
  `Name` varchar(59) NOT NULL,
  `Program` varchar(59) NOT NULL,
  `Mobile` bigint(10) NOT NULL,
  `Email` varchar(59) NOT NULL,
  `Password` varchar(59) NOT NULL,
  `OTP` int(6) NOT NULL,
  `Resume_Path` varchar(906) DEFAULT NULL,
  `remember_token` varchar(59) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`StudentId`, `UserType`, `Name`, `Program`, `Mobile`, `Email`, `Password`, `OTP`, `Resume_Path`, `remember_token`, `created_at`, `updated_at`) VALUES
('1111', 'Student', '11', 'MCA Sem-1', 1111111111, 'gvaja57@gmail.com', '1c07979b71aa0363de78f0e7d02865a8', 863528, 'https://docs.google.com/document/d/13GTPE5Ov58Bot2bQVYOq2jL0BVx5XK3U3E3_qM30_i0/edit?usp=drivesdk', NULL, '2024-05-09 07:11:59', '2024-05-09 07:21:03'),
('12121212599', 'Student', 'સેલજા ચૌહાણ', 'MCA Sem-2', 85686568954, 'seljachauhan23@gmail.com', '18b06f349dea5205c799f9e839b44c86', 283998, NULL, NULL, '2024-02-22 14:04:42', '2024-02-22 14:04:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administrator`
--
ALTER TABLE `Administrator`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `Applications`
--
ALTER TABLE `Applications`
  ADD PRIMARY KEY (`ApplicationId`);

--
-- Indexes for table `Companies`
--
ALTER TABLE `Companies`
  ADD PRIMARY KEY (`CompanyId`);

--
-- Indexes for table `ContactUs`
--
ALTER TABLE `ContactUs`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`EventId`);

--
-- Indexes for table `JobPostings`
--
ALTER TABLE `JobPostings`
  ADD PRIMARY KEY (`JobId`);

--
-- Indexes for table `Placements`
--
ALTER TABLE `Placements`
  ADD PRIMARY KEY (`PlacementId`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`StudentId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
