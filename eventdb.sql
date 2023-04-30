-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 02:54 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(01, 'Elias', 'Muhoozi', 'eli0@outlook.com', 'muhlias');

-- --------------------------------------------------------

--
-- Table structure for table `beginner`
--

CREATE TABLE `beginner` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `item` varchar(25) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category` int(2) NOT NULL,
  `score` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `beginner_scores`
--

CREATE TABLE `beginner_scores` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `rubric` int(2) NOT NULL,
  `judge` int(2) NOT NULL,
  `score` int(2) NOT NULL,
  `team` int(4) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(01, 'Pitch', 'Asses the ability of the participants to clearly elaborate their Idea ');

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

CREATE TABLE `judge` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(001, 'Denis', 'Obua', 'denis@trying.test', 'Denis001'),
(002, 'Moses', 'Ayoo', 'ayoo@moses.test', 'Moses002');

-- --------------------------------------------------------

--
-- Table structure for table `junior`
--

CREATE TABLE `junior` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `item` varchar(25) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category` int(2) NOT NULL,
  `score` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `junior`
--

INSERT INTO `junior` (`id`, `item`, `description`, `category`, `score`) VALUES
(01, 'Problem statement', 'Clearly states the problem and shows why the problem is important to the team and the\r\ncommunity\r\n\r\n', 1, 5),
(02, 'Problem research & SDGs', 'Explains what the team researched about the problem and how it relates to the United Nations\r\nSustainable Development Goals', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `junior_scores`
--

CREATE TABLE `junior_scores` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `rubric` int(2) NOT NULL,
  `judge` int(2) NOT NULL,
  `score` int(2) NOT NULL,
  `team` int(4) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(45) NOT NULL,
  `district` varchar(15) DEFAULT NULL,
  `region` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `name`, `district`, `region`) VALUES
(001, 'Sacred Heart SS', 'Gulu', 'Northern Region'),
(002, 'Gulu High School', 'Gulu', 'Northern Region'),
(003, 'Oaks of R HS', 'Kiryandongo', 'Western Region'),
(004, 'Blessed Esther Education Center', 'Wakiso', 'Central Region');

-- --------------------------------------------------------

--
-- Table structure for table `senior`
--

CREATE TABLE `senior` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `item` varchar(25) NOT NULL,
  `description` varchar(250) NOT NULL,
  `category` int(2) NOT NULL,
  `score` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `senior`
--

INSERT INTO `senior` (`id`, `item`, `description`, `category`, `score`) VALUES
(01, 'Problem statement', 'Clearly states the problem and shows why the problem is important to the team and the\r\ncommunity', 1, 5),
(02, 'Problem research', 'Explains what the team researched about the problem and how it relates to the United Nations\r\nSustainable Development Goals\r\n', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `senior_scores`
--

CREATE TABLE `senior_scores` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `rubric` int(2) NOT NULL,
  `judge` int(2) NOT NULL,
  `score` int(2) NOT NULL,
  `team` int(4) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(25) NOT NULL,
  `division` char(1) NOT NULL,
  `school` int(3) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `division`, `school`) VALUES
(0001, 'Super Heroes', 'S', 001),
(0002, 'Knowledge Hunters', 'S', 002),
(0003, 'The Curious', 'J', 003),
(0004, 'Shining Angels', 'B', 004);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beginner`
--
ALTER TABLE `beginner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_beginner_category` (`category`);

--
-- Indexes for table `beginner_scores`
--
ALTER TABLE `beginner_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_beginner_scores_beginner` (`rubric`),
  ADD KEY `fk_beginner_scores_judge` (`judge`),
  ADD KEY `fk_beginner_scores_team` (`team`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judge`
--
ALTER TABLE `judge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `junior`
--
ALTER TABLE `junior`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_junior_category` (`category`);

--
-- Indexes for table `junior_scores`
--
ALTER TABLE `junior_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_junior_scores_junior` (`rubric`),
  ADD KEY `fk_junior_scores_judge` (`judge`),
  ADD KEY `fk_junior_scores_team` (`team`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senior`
--
ALTER TABLE `senior`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_senior_category` (`category`);

--
-- Indexes for table `senior_scores`
--
ALTER TABLE `senior_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_senior_scores_senior` (`rubric`),
  ADD KEY `fk_senior_scores_judge` (`judge`),
  ADD KEY `fk_senior_scores_team` (`team`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_team_school` (`school`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `beginner`
--
ALTER TABLE `beginner`
  MODIFY `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beginner_scores`
--
ALTER TABLE `beginner_scores`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `judge`
--
ALTER TABLE `judge`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `junior`
--
ALTER TABLE `junior`
  MODIFY `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `junior_scores`
--
ALTER TABLE `junior_scores`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `senior`
--
ALTER TABLE `senior`
  MODIFY `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `senior_scores`
--
ALTER TABLE `senior_scores`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
