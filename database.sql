-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: ictstu-db1.cc.swin.edu.au
-- Generation Time: Jul 15, 2025 at 12:13 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s104700948_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addjobs`
--

CREATE TABLE `addjobs` (
  `JobID` int(11) NOT NULL,
  `Title` varchar(30) NOT NULL,
  `Reference` varchar(5) NOT NULL,
  `Salary` varchar(30) NOT NULL,
  `Reporter` varchar(80) NOT NULL,
  `Responsibility` varchar(1000) NOT NULL,
  `Qualification` varchar(1000) NOT NULL,
  `Skill` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addjobs`
--

INSERT INTO `addjobs` (`JobID`, `Title`, `Reference`, `Salary`, `Reporter`, `Responsibility`, `Qualification`, `Skill`) VALUES
(1, 'Mobile Application Developer', 'ABC01', '$60,000 - $120,000 per year', 'Head Mobile Application Developer', 'Collaborate with cross-functional teams to define, design, and develop mobile applications that meet business objectives and user needs.\r\nParticipate in the entire app development lifecycle, from concept ideation to app deployment and maintenance.\r\nStay up-to-date with the latest mobile app development trends, tools, and technologies.', 'Bachelor\'s degree in Computer Science, Software Engineering, or a related field (or equivalent work experience).\r\nProven 3 years experience as a Mobile Application Developer, with a strong portfolio of published mobile apps.\r\nProficiency in mobile app development frameworks and programming languages such as Swift (for iOS) or Kotlin/Java (for Android).', 'Experience with cross-platform mobile development frameworks such as React Native or Flutter.\r\nFamiliarity with version control systems (e.g., Git) and agile development methodologies.\r\nKnowledge of mobile app security best practices and performance optimization techniques.'),
(2, 'Software Engineer', 'ABC02', '$80,000 - $120,000 per year', 'Senior Software Engineer', 'Design, develop, and maintain software applications and systems according to project requirements and specifications.\r\nWrite clean, efficient, and maintainable code following best practices and coding standards.\r\nConduct thorough testing and debugging to ensure the reliability, performance, and security of the software.', 'Bachelor\'s degree in Computer Science, Software Engineering, or a related field (or equivalent work experience).\r\nProven 3 years experience as a Software Engineer, with a strong portfolio of software projects.\r\nProficiency in programming languages such as Python, Java, C++, or JavaScript.', 'Experience with web development frameworks and technologies such as Django, Flask, React, or Angular.\r\nFamiliarity with database systems (e.g., SQL, NoSQL) and data modeling concepts.\r\nKnowledge of cloud computing platforms (e.g., AWS, Azure, Google Cloud) and deployment technologies.'),
(3, 'Data Engineer', 'ABC03', '$90,000 - $140,000 per year', 'Data Engineering Manager', 'Design, develop, and deploy robust data pipelines to collect, process, and transform large volumes of data from various sources.\r\nImplement data integration solutions to enable seamless data flow between different systems and platforms.\r\nBuild and maintain data warehouses, data lakes, and other data storage solutions to support analytics and reporting requirements.\r\nOptimize data infrastructure for performance, scalability, and reliability, considering factors such as latency, throughput, and resource utilization.', 'Essential:\r\n\r\nBachelor\'s degree in Computer Science, Information Systems, or a related field (or equivalent work experience).\r\nProven 4 years experience as a Data Engineer, Data Analyst, or similar role, with a strong track record of building and managing data pipelines.\r\nProficiency in programming languages such as Python, SQL, Scala, or Java, with experience in data processing frameworks (e.g., Apache Spark, Apache Flink).', 'Essential:\r\n\r\nBachelor\'s degree in Computer Science, Information Systems, or a related field (or equivalent work experience).\r\nProven 4 years experience as a Data Engineer, Data Analyst, or similar role, with a strong track record of building and managing data pipelines.\r\nProficiency in programming languages such as Python, SQL, Scala, or Java, with experience in data processing frameworks (e.g., Apache Spark, Apache Flink).');

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `ReferenceNumber` varchar(5) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Street` varchar(40) NOT NULL,
  `Suburb` varchar(40) NOT NULL,
  `State` varchar(3) NOT NULL,
  `Postcode` varchar(4) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `Skills` varchar(50) NOT NULL,
  `OtherSkills` text NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `ReferenceNumber`, `Firstname`, `Lastname`, `DOB`, `Gender`, `Street`, `Suburb`, `State`, `Postcode`, `Email`, `PhoneNumber`, `Skills`, `OtherSkills`, `Status`) VALUES
(2, 'ABC02', 'Bill', 'Gates', '1998-11-15', 'other', '1 Microsoft Street', 'Fitzroy', 'VIC', '3101', 'bill.gates@gmail.com', '0412345678', 'HTML, CSS, PHP', '', 'Complete'),
(3, 'ABC03', 'Susan', 'Wojcicki', '2000-05-03', 'female', '6/20 Youtube Avenue', 'Sydney', 'NSW', '2100', 'susan@gmail.com', '0455678678', 'HTML, CSS, JavaScript, PHP', 'Video editing.', 'Complete'),
(5, 'ABC02', 'Timothy', 'Armstrong', '2001-02-12', 'male', '5 AOL Drive', 'Melbourne', 'VIC', '3100', 'tim.armstrong@outlook.com', '0499999999', 'CSS, PHP, MySQL', '', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `Fullname`, `Username`, `Password`) VALUES
(7, 'Tien', 'tienxinhdep', '9af52d42bbf41fd409d8c66847a5db6d'),
(8, 'tien', 'tienxinhdepkhong', 'ff630c4f62b5cc99415aafdb2fa397b5'),
(9, 'd', 'd', '4fe3b7f31e2c8a5beb1f40e2e808c56b'),
(11, 'fdhgfhd', 'hatien', 'c488d430395b5df82b16a3e9a43d7870'),
(12, 'hatien', 'hatien21', 'c488d430395b5df82b16a3e9a43d7870'),
(13, 'hatien', 'hatien1', 'c488d430395b5df82b16a3e9a43d7870'),
(14, 'thi ha lan le', 'halan', 'b6acbfd21f895c8ec2bfab16fc7c78fd'),
(15, 'Jean', 'Jean', 'ca563137cfc79206a1ff432e442793c5'),
(16, 'KAIBIN WANG', 'admin', 'a43c27c2babefd68df8a694900f30a1c'),
(17, 'tien', 'tienlehaha', '559ec82112e490123652e6a87ac9fa48'),
(18, 'uhsduhsdh', 'hehe', '88ea2da74df2255eebcc625ee2f99f44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addjobs`
--
ALTER TABLE `addjobs`
  ADD PRIMARY KEY (`JobID`);

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addjobs`
--
ALTER TABLE `addjobs`
  MODIFY `JobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
