-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 27, 2022 at 06:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student details(mini project)`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Description` varchar(3000) NOT NULL,
  `Subject Code` varchar(11) NOT NULL,
  `Posted By` varchar(50) NOT NULL,
  `Posted On` varchar(20) NOT NULL,
  `Posted time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ID`, `Title`, `Description`, `Subject Code`, `Posted By`, `Posted On`, `Posted time`) VALUES
(1, 'Internal Assessment - 2', 'IA3 has been scheduled on June 3rd. All the Students must prepare well to get good marks', '52KAN', 'Kanaka V', '26 May, 2022 11:24pm', '1653587698');

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `ID` int(11) NOT NULL,
  `Student ID` varchar(11) DEFAULT NULL,
  `Total Class` int(3) DEFAULT NULL,
  `Attended Class` int(3) DEFAULT NULL,
  `Percentage` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`ID`, `Student ID`, `Total Class`, `Attended Class`, `Percentage`) VALUES
(5, 'ST001', 200, 190, 95),
(6, 'ST002', 200, 200, 100),
(7, 'ST003', 200, 180, 90),
(8, 'ST005', 200, 197, 99),
(9, 'ST004', 200, 199, 100);

-- --------------------------------------------------------

--
-- Table structure for table `exam_marks`
--

CREATE TABLE `exam_marks` (
  `ID` int(11) NOT NULL,
  `Student ID` varchar(11) DEFAULT NULL,
  `Subject Code` varchar(11) DEFAULT NULL,
  `External Marks` int(11) DEFAULT NULL,
  `Internals Total` int(11) DEFAULT NULL,
  `Total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_marks`
--

INSERT INTO `exam_marks` (`ID`, `Student ID`, `Subject Code`, `External Marks`, `Internals Total`, `Total`) VALUES
(11, 'ST001', '51ENG', 79, 19, 98),
(12, 'ST001', '52KAN', 78, 20, 98),
(13, 'ST001', '53HIN', 80, 18, 98),
(14, 'ST001', '54MAT', 77, 19, 96),
(15, 'ST001', '55SCI', 80, 20, 100),
(16, 'ST001', '56SOC', 75, 18, 93),
(18, 'ST002', '51ENG', 80, 16, 96),
(19, 'ST002', '52KAN', 76, 19, 95),
(20, 'ST002', '53HIN', 65, 16, 81),
(21, 'ST002', '54MAT', 75, 18, 93),
(22, 'ST002', '55SCI', 79, 20, 99),
(23, 'ST002', '56SOC', 65, 17, 82),
(25, 'ST003', '51ENG', 60, 17, 77),
(26, 'ST003', '52KAN', 77, 17, 94),
(27, 'ST003', '53HIN', 58, 16, 74),
(28, 'ST003', '54MAT', 66, 19, 85),
(29, 'ST003', '55SCI', 70, 18, 88),
(30, 'ST003', '56SOC', 80, 14, 94),
(31, 'ST005', NULL, NULL, NULL, NULL),
(32, 'ST005', '51ENG', 80, 20, 100),
(33, 'ST005', '52KAN', 80, 20, 100),
(34, 'ST005', '53HIN', 78, 19, 97),
(35, 'ST005', '54MAT', 79, 19, 98),
(36, 'ST005', '55SCI', 80, 20, 100),
(37, 'ST005', '56SOC', 76, 19, 95),
(39, 'ST004', '51ENG', 73, 18, 91),
(40, 'ST004', '52KAN', 67, 17, 84),
(41, 'ST004', '53HIN', 70, 15, 85),
(42, 'ST004', '54MAT', 80, 20, 100),
(43, 'ST004', '55SCI', 76, 18, 94),
(44, 'ST004', '56SOC', 63, 16, 79);

-- --------------------------------------------------------

--
-- Table structure for table `internals_marks`
--

CREATE TABLE `internals_marks` (
  `ID` int(11) NOT NULL,
  `Student ID` varchar(11) DEFAULT NULL,
  `Subject Code` varchar(11) DEFAULT NULL,
  `IA1` int(3) DEFAULT NULL,
  `IA2` int(3) DEFAULT NULL,
  `IA3` int(3) DEFAULT NULL,
  `Average` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internals_marks`
--

INSERT INTO `internals_marks` (`ID`, `Student ID`, `Subject Code`, `IA1`, `IA2`, `IA3`, `Average`) VALUES
(11, 'ST001', '51ENG', 17, 19, 20, 19),
(12, 'ST001', '52KAN', 20, 19, 20, 20),
(13, 'ST001', '53HIN', 20, 18, 17, 18),
(14, 'ST001', '54MAT', 20, 18, 18, 19),
(15, 'ST001', '55SCI', 20, 19, 20, 20),
(16, 'ST001', '56SOC', 17, 18, 19, 18),
(18, 'ST002', '51ENG', 18, 16, 15, 16),
(19, 'ST002', '52KAN', 19, 18, 19, 19),
(20, 'ST002', '53HIN', 17, 15, 16, 16),
(21, 'ST002', '54MAT', 18, 18, 18, 18),
(22, 'ST002', '55SCI', 20, 19, 20, 20),
(23, 'ST002', '56SOC', 18, 17, 17, 17),
(25, 'ST003', '51ENG', 19, 15, 17, 17),
(26, 'ST003', '52KAN', 18, 16, 17, 17),
(27, 'ST003', '53HIN', 18, 14, 15, 16),
(28, 'ST003', '54MAT', 19, 19, 19, 19),
(29, 'ST003', '55SCI', 19, 17, 18, 18),
(30, 'ST003', '56SOC', 15, 12, 16, 14),
(32, 'ST005', '51ENG', 20, 20, 19, 20),
(33, 'ST005', '52KAN', 20, 19, 20, 20),
(34, 'ST005', '53HIN', 20, 19, 18, 19),
(35, 'ST005', '54MAT', 20, 19, 19, 19),
(36, 'ST005', '55SCI', 20, 20, 20, 20),
(37, 'ST005', '56SOC', 19, 18, 20, 19),
(38, 'ST004', NULL, NULL, NULL, NULL, NULL),
(39, 'ST004', '51ENG', 18, 17, 19, 18),
(40, 'ST004', '52KAN', 19, 15, 16, 17),
(41, 'ST004', '53HIN', 15, 17, 14, 15),
(42, 'ST004', '54MAT', 20, 20, 20, 20),
(43, 'ST004', '55SCI', 20, 15, 19, 18),
(44, 'ST004', '56SOC', 16, 13, 18, 16);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `Student ID` varchar(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Class` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Blood Group` text NOT NULL,
  `DOB` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Admission Number` int(10) NOT NULL,
  `Admission Date` date NOT NULL,
  `Religion` varchar(15) NOT NULL,
  `Nationality` varchar(15) NOT NULL,
  `Father Name` varchar(50) NOT NULL,
  `Father Occupation` varchar(25) NOT NULL,
  `Father PhoneNum` varchar(15) NOT NULL,
  `Mother Name` varchar(50) NOT NULL,
  `Mother Occupation` varchar(25) NOT NULL,
  `Mother PhoneNum` varchar(15) NOT NULL,
  `Present Address` varchar(255) NOT NULL,
  `Permanent Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`Student ID`, `Name`, `Class`, `Gender`, `Blood Group`, `DOB`, `Email`, `Admission Number`, `Admission Date`, `Religion`, `Nationality`, `Father Name`, `Father Occupation`, `Father PhoneNum`, `Mother Name`, `Mother Occupation`, `Mother PhoneNum`, `Present Address`, `Permanent Address`) VALUES
('ST001', 'Afreen S', 'V A', 'Male', 'B+', '02 Dec, 2011', 'afreen@gmail.com', 200503, '2022-05-06', 'Muslim', 'Indian', 'Saleem', 'Paramedic', '+91 9255547457', 'Fouziya Saleem', 'House-wife', '+91 9841255514', '16/1, 1st C Main Rd, Mookambika Nagar, Banashankari 3rd Stage, Hosakerehalli, Bengaluru, Karnataka 560085', '16/1, 1st C Main Rd, Mookambika Nagar, Banashankari 3rd Stage, Hosakerehalli, Bengaluru, Karnataka 560085'),
('ST002', 'Dhara S', 'V A', 'Female', 'A-', '20 Oct, 2011', 'dhara@gmail.com', 200542, '2022-05-07', 'Hindu', 'Indian', 'Siddharth', 'Software Engineer', '+91 9958301412', 'Kavya', 'Fashion designer', '+91 9845042671', '206, 16th Cross Rd, JP Nagar 4th Phase, Dollars Colony, Phase 4, J. P. Nagar, Bengaluru, Karnataka 560078', '206, 16th Cross Rd, JP Nagar 4th Phase, Dollars Colony, Phase 4, J. P. Nagar, Bengaluru, Karnataka 560078'),
('ST003', 'Kushal Nair', 'V A', 'Male', 'AB+', '26 Mar, 2011', 'kushalnair@gmail.com', 200451, '2022-05-03', 'Hindu', 'Indian', 'Raghav Nair', 'Sales executive', '+91 9548135745', 'Hosanna', 'House-wife', '+91 9888412357', '147, 24th Main Rd, R.K Colony, Marenahalli, 2nd Phase, J. P. Nagar, Bengaluru, Karnataka 560041', '147, 24th Main Rd, R.K Colony, Marenahalli, 2nd Phase, J. P. Nagar, Bengaluru, Karnataka 560041'),
('ST004', 'Saanvi R', 'V A', 'Female', 'B-', '12 May, 2011', 'saanvi@gmail.com', 200589, '2022-05-07', 'Hindu', 'Indian', 'Ramesh', 'Networking Engineer', '+91 9638524155', 'Shreya', 'School lecturer', '+91 9123456899', '153/C, 2nd Stage Rd, Dodda Basti, Bhuvaneshwari Nagar, Road, Bengaluru, Karnataka 560056', '153/C, 2nd Stage Rd, Dodda Basti, Bhuvaneshwari Nagar, Road, Bengaluru, Karnataka 560056'),
('ST005', 'Oliver J', 'V A', 'Male', 'O+', '21 Sep, 2011', 'oliver@gmail.com', 200510, '2022-05-06', 'Christian', 'Indian', 'John', 'Taxi Driver', '+91 9451575322', 'Meghana', 'Pharmacy', '+91 6362595412', '19/2, Mango Garden Layout , Kanakapura Road, Behind METRO CASH &amp; CARRY, Bengaluru, Karnataka 560062', '19/2, Mango Garden Layout , Kanakapura Road, Behind METRO CASH &amp; CARRY, Bengaluru, Karnataka 560062');

--
-- Triggers `student_details`
--
DELIMITER $$
CREATE TRIGGER `Add Student ID into Stud_users Table` AFTER INSERT ON `student_details` FOR EACH ROW INSERT INTO `stud_users`
(`Unique_ID`) VALUES (new.`Student ID`)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Add Student ID into attendance Table` AFTER INSERT ON `student_details` FOR EACH ROW INSERT INTO `attendence`
(`Student ID`) VALUES (new.`Student ID`)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Add Student ID into exam_marks Table` AFTER INSERT ON `student_details` FOR EACH ROW INSERT INTO `exam_marks`
(`Student ID`) VALUES (new.`Student ID`)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Add Student ID into internals_marks Table` AFTER INSERT ON `student_details` FOR EACH ROW INSERT INTO `internals_marks`
(`Student ID`) VALUES (new.`Student ID`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stud_users`
--

CREATE TABLE `stud_users` (
  `ID` int(11) NOT NULL,
  `Unique_ID` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_users`
--

INSERT INTO `stud_users` (`ID`, `Unique_ID`, `password`) VALUES
(5, 'ST001', '$2y$10$uxZKkF1LjcVSvX8J1fNuo.UGbs0x.hq0NUEXoSfPKS09/Aw2w5j/i'),
(6, 'ST002', NULL),
(7, 'ST003', NULL),
(8, 'ST005', NULL),
(9, 'ST004', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_details`
--

CREATE TABLE `subject_details` (
  `Subject Code` varchar(11) NOT NULL,
  `Subject Name` varchar(255) NOT NULL,
  `Instructor Name` varchar(255) NOT NULL,
  `Instructor Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_details`
--

INSERT INTO `subject_details` (`Subject Code`, `Subject Name`, `Instructor Name`, `Instructor Email`) VALUES
('51ENG', 'English', 'Anuradha', 'anuradha@gmail.com'),
('52KAN', 'Kannada', 'Kanaka V', 'kanaka@gmail.com'),
('53HIN', 'Hindi', 'Mamatha', 'mamatha@gmail.com'),
('54MAT', 'Mathematics', 'Venkat Ramana', 'venkat@gmail.com'),
('55SCI', 'Science', 'Chethan N', 'chethan@gmail.com'),
('56SOC', 'Social_Science', 'Esther', 'esther@gmail.com');

--
-- Triggers `subject_details`
--
DELIMITER $$
CREATE TRIGGER `Add Subject Code into exam_marks Table` AFTER INSERT ON `subject_details` FOR EACH ROW INSERT INTO `exam_marks`
(`Subject Code`) VALUES (new.`Subject Code`)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Add Subject Code into internals_marks Table` AFTER INSERT ON `subject_details` FOR EACH ROW INSERT INTO `internals_marks`
(`Subject Code`) VALUES (new.`Subject Code`)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_user`
--

CREATE TABLE `teacher_user` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_user`
--

INSERT INTO `teacher_user` (`ID`, `USERNAME`, `PASSWORD`) VALUES
(3, 'kanaka', '$2y$10$G7Teg4ss2rWBLia02uXxc.w.orm.t6LB7XyBP8A3qJH/k6qRQSflW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Subject Code` (`Subject Code`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Student ID` (`Student ID`);

--
-- Indexes for table `exam_marks`
--
ALTER TABLE `exam_marks`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Student ID` (`Student ID`),
  ADD KEY `Subject Code` (`Subject Code`);

--
-- Indexes for table `internals_marks`
--
ALTER TABLE `internals_marks`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Student ID` (`Student ID`),
  ADD KEY `Subject Code` (`Subject Code`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`Student ID`);

--
-- Indexes for table `stud_users`
--
ALTER TABLE `stud_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Unique_ID` (`Unique_ID`);

--
-- Indexes for table `subject_details`
--
ALTER TABLE `subject_details`
  ADD PRIMARY KEY (`Subject Code`);

--
-- Indexes for table `teacher_user`
--
ALTER TABLE `teacher_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam_marks`
--
ALTER TABLE `exam_marks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `internals_marks`
--
ALTER TABLE `internals_marks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `stud_users`
--
ALTER TABLE `stud_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher_user`
--
ALTER TABLE `teacher_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`Subject Code`) REFERENCES `subject_details` (`Subject Code`) ON UPDATE CASCADE;

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `attendence_ibfk_1` FOREIGN KEY (`Student ID`) REFERENCES `student_details` (`Student ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_marks`
--
ALTER TABLE `exam_marks`
  ADD CONSTRAINT `exam_marks_ibfk_1` FOREIGN KEY (`Student ID`) REFERENCES `student_details` (`Student ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_marks_ibfk_2` FOREIGN KEY (`Subject Code`) REFERENCES `subject_details` (`Subject Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `internals_marks`
--
ALTER TABLE `internals_marks`
  ADD CONSTRAINT `internals_marks_ibfk_1` FOREIGN KEY (`Student ID`) REFERENCES `student_details` (`Student ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `internals_marks_ibfk_2` FOREIGN KEY (`Subject Code`) REFERENCES `subject_details` (`Subject Code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stud_users`
--
ALTER TABLE `stud_users`
  ADD CONSTRAINT `stud_users_ibfk_1` FOREIGN KEY (`Unique_ID`) REFERENCES `student_details` (`Student ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
