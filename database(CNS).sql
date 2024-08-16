-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 09:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `AdminName` varchar(30) NOT NULL,
  `AdminPassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`AdminName`, `AdminPassword`) VALUES
('Umme Hani', 'Login@01'),
('Pruthviraj', 'Login@01');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `userId` int(2) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `ConMessage` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`userId`, `Fname`, `Lname`, `Email`, `Phone`, `ConMessage`) VALUES
(1, 'Karan', 'Malhotra', 'karn@gmail.com', '7411569758', 'Invalid email issue even though my email is valid '),
(2, 'Saima', 'Mariyum ', 'saima@gmail.com', '788435239', 'I wanna know is any kind of consultation available for job purpose.'),
(3, 'Neha', 'Nisar', 'Neha@gmail.com', '9380898974', 'Is all Courses available for free or should i need to pay');

-- --------------------------------------------------------

--
-- Table structure for table `jobcompany`
--

CREATE TABLE `jobcompany` (
  `jobId` varchar(30) NOT NULL,
  `companyName` varchar(30) NOT NULL,
  `jobRole` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobcompany`
--

INSERT INTO `jobcompany` (`jobId`, `companyName`, `jobRole`, `location`, `link`) VALUES
('65f797c964d77', 'TATA Comunication', 'Junior Team Member', 'Chennai', 'https://bit.ly/3iCH5e3'),
('65f798620fba3', 'RedBus ', 'Executive- Brand Marketing', 'Banglore', 'http://bit.ly/3I2Ajv0'),
('65f798b903e00', 'Wipro', 'Process Associate', 'Banglore', 'https://bit.ly/3pAABzT'),
('65f8ccacbc226', 'Deloitte', 'Associate Analyst', 'Hyderabad', 'https://bit.ly/2WGUF8m'),
('65f8cd2954261', 'Google', 'Pre-Doctoral Researcher', 'Banglore', 'https://bit.ly/3pQn5J9'),
('65f8cd76b4374', 'Intel', 'Data Engineer', 'Banglore', 'https://bit.ly/3Eh02Ld'),
('65f8d238b896a', 'EY India', 'Data Analytics', 'Kochi', 'https://bit.ly/3KJPKHW');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `userId` varchar(20) NOT NULL,
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `UserPhone` int(20) DEFAULT NULL,
  `UserEmail` varchar(20) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `UserLanguage` varchar(20) DEFAULT NULL,
  `UserState` varchar(20) DEFAULT NULL,
  `Country` varchar(20) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `College` varchar(20) DEFAULT NULL,
  `Degree` varchar(20) DEFAULT NULL,
  `PassYear` year(4) DEFAULT NULL,
  `CGPA` float(4,2) DEFAULT NULL,
  `Domain` varchar(20) DEFAULT NULL,
  `JobLocation` varchar(20) DEFAULT NULL,
  `ResumeFile` blob DEFAULT NULL,
  `LinkedIn` varchar(50) DEFAULT NULL,
  `Github` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`userId`, `Fname`, `Lname`, `UserPhone`, `UserEmail`, `DateOfBirth`, `UserLanguage`, `UserState`, `Country`, `Gender`, `College`, `Degree`, `PassYear`, `CGPA`, `Domain`, `JobLocation`, `ResumeFile`, `LinkedIn`, `Github`) VALUES
('65f75cb130bc7', 'Anaya', 'Nisar', 2147483647, 'anaya@gmail.com', '2002-07-09', 'Urdu', 'Karnataka', 'India', 'Female', 'UVCE', '', '2024', 8.90, 'Cloud computing', 'Bengaluru', NULL, 'https://linkedin.com/in/umme-hani-7aa049231', 'https://github.com/U');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `userId` varchar(20) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `UserEmail` varchar(20) NOT NULL,
  `UserPhone` varchar(20) NOT NULL,
  `UserPassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`userId`, `UserName`, `UserEmail`, `UserPhone`, `UserPassword`) VALUES
('65f75cb130bc7', 'Anaya', 'anaya@gmail.com', '9868578956', 'Anaya@01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `jobcompany`
--
ALTER TABLE `jobcompany`
  ADD UNIQUE KEY `jobId` (`jobId`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `userId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
