-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Oct 21, 2021 at 11:41 AM
-- Server version: 8.0.26
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HMS`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`%` PROCEDURE `add_doctor` (IN `specilization` INT(20), IN `doctorName` VARCHAR(255), IN `address` LONGTEXT, IN `docFees` VARCHAR(255), IN `contactno` BIGINT(10), IN `docEmail` VARCHAR(255), IN `password` VARCHAR(255), IN `creationDate` TIMESTAMP, IN `updationDate` TIMESTAMP)  BEGIN
INSERT INTO doctors(specilization,doctorName,address,docFees,contactno, docEmail, password,creationDate, updationDate)VALUES(specilization,doctorName,address,docFees,contactno,docEmail,password,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP);
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `add_medhis` (IN `PatientID` INT, IN `bs` VARCHAR(200), IN `bp` VARCHAR(200), IN `wt` VARCHAR(100), IN `temp` VARCHAR(200), IN `prec` MEDIUMTEXT, IN `crdt` TIMESTAMP)  BEGIN
INSERT INTO tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres,CreationDate)
value(PatientID,bs,bp,wt,temp,prec,CURRENT_TIMESTAMP);
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `add_patient` (IN `PatientName` VARCHAR(200), IN `PatientContno` BIGINT(10), IN `PatientEmail` VARCHAR(200), IN `PatientGender` VARCHAR(50), IN `PatientAdd` MEDIUMTEXT, IN `PatientAge` INT(10), IN `PatientMedhis` MEDIUMTEXT)  BEGIN
INSERT INTO tblpatient(PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) VALUES(PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis);
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `delete_doctor` (IN `did` INT)  BEGIN
DELETE FROM doctors where doc_id=did;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `delete_medhis` (IN `vid` INT(20))  BEGIN
DELETE  FROM tblmedicalhistory WHERE PatientID=vid;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `delete_patient` (IN `p_id` INT(20))  BEGIN
DELETE  FROM tblpatient WHERE Pat_id=p_id;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `delete_user` (IN `p_id` INT(20))  BEGIN
DELETE  FROM users WHERE id=p_id;
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `insert_users` (IN `fname` VARCHAR(255), IN `addr` VARCHAR(255), IN `city` VARCHAR(255), IN `gender` VARCHAR(255), IN `email` VARCHAR(255), IN `password` VARCHAR(255), OUT `id` VARCHAR(20))  BEGIN
INSERT INTO users(fullname,address,city,gender,email,password) VALUES(fname,addr,city,gender,email,password);
SET id=LAST_INSERT_ID();
END$$

CREATE DEFINER=`root`@`%` PROCEDURE `update_doctor` (IN `did` INT(10), IN `spec` INT(10), IN `docname` VARCHAR(255), IN `address` LONGTEXT, IN `docfees` VARCHAR(255), IN `contactno` BIGINT(20), IN `docemail` VARCHAR(255))  UPDATE doctors SET specilization=spec,doctorName=docname,address=address,docFees=docfees,contactno=contactno,docEmail=docemail where doc_id=did$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '123456', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int DEFAULT NULL,
  `userId` int DEFAULT NULL,
  `consultancyFees` int DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `userStatus` int DEFAULT NULL,
  `doctorStatus` int DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(1, 'Test', 7, 6, 600, '2021-10-11', '9:15 AM', '2021-10-11 14:31:28', 1, 0, '2021-10-11 16:10:11'),
(2, '3', 4, 3, 200, ' 	2021-10-12 08:39:18', '04:30 ', '2021-10-21 10:58:08', 1, 1, '2021-10-12 08:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doc_id` int NOT NULL,
  `specilization` int DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doc_id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 2, 'Aman', 'Paldi', '10000', 6757775567, 'aman@gmail.com', '12345', '2021-10-12 08:39:18', '2021-10-13 06:49:45'),
(3, 1, 'jay', 'nehrunagar', '25033', 8956230235, 'jay@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-10-13 14:07:30', '2021-10-14 07:46:35'),
(4, 3, 'kishan', 'puna', '500', 9865744215, 'kishan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-10-13 14:07:30', '2021-10-13 08:25:03'),
(16, 2, 'bharat', 'rajkot', '500', 9856230145, 'bharat@gmail.com', '123456', '2021-10-13 14:07:30', '2021-10-13 14:07:30'),
(21, 2, 'rohit', 'mumbai', '1500', 8945451245, 'rohit@gmail.com', '123456', '2021-10-20 11:15:39', '2021-10-21 07:38:25'),
(22, 2, 'rahul kl', 'banglore', '60000', 789562130, 'rahul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-10-20 11:26:19', '2021-10-21 07:44:32'),
(24, 1, 'mahendra', 'bihar', '1500', 897774532, 'mahendra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-10-21 07:54:42', '2021-10-21 07:54:42'),
(25, 2, 'mahendra', 'bihar', '15000', 9865321487, 'mahendra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-10-21 07:55:30', '2021-10-21 07:55:30'),
(26, 3, 'rishabh', 'delhi', '1200', 8956231245, 'rishabh@gmail.com', '3d9188577cc9bfe9291ac66b5cc872b7', '2021-10-21 08:01:49', '2021-10-21 08:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `spec_id` int NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`spec_id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Test', '2019-06-23 17:51:06', '2019-06-23 17:55:06'),
(2, 'Dermatologist', '2019-11-10 18:36:36', '2019-11-10 18:36:50'),
(3, 'homeopathy', '2021-10-13 04:28:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `PatientID` int NOT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(1, 'asdf', 'sdf', '23', 'sdf', 'sdfgdfg', '2021-10-20 13:03:58'),
(2, 'sads', 'asdas', 'asdas', 'sadsa', 'asdasd', '2021-10-14 05:14:36'),
(3, 'asdf', 'sdfg', '55', 'dssf', 'asd', '2021-10-21 05:03:05'),
(5, 'hgfd', 'sad', '34', 'dfg', 'sdfg', '2021-10-21 05:00:41'),
(6, 'asdfghjk', 'asdfghjkl;', '56', 'ASDFGH', 'ASDFG', '2021-10-21 05:14:33'),
(7, 'sadf', 'asdcv', '55', 'asdfg', 'sdfgh', '2021-10-21 05:10:10'),
(11, 'no', 'no', '88', 'no', 'no', '2021-10-21 08:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `Pat_id` int NOT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext,
  `PatientAge` int DEFAULT NULL,
  `PatientMedhis` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`Pat_id`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`) VALUES
(1, 'Manisha Jha', 4558968789, 'test@gmail.com', 'Male', 'New Delhi', 26, 'She is diabetic patient'),
(2, 'ramesh', 8956237845, 'ramesh@gmail.com', 'male', 'asdlj', 22, 'no'),
(5, 'raj', 1234567890, 'raj@gmail.com', 'male', 'botad', 33, 'no'),
(6, 'asnf', 1234567890, 'a@gmail.com', 'male', 'asd', 23, 'asdfgnm'),
(7, 'sd', 1234567890, 'a@gmail.com', 'male', 'fgf', 22, 'ff'),
(8, 'bharat', 1234567890, 'bharat@gmail.com', 'male', 'ahmedabad', 22, 'no medical history'),
(9, 'rishi', 1234567890, 'rishi@gmail.com', 'male', 'ahmedabad', 22, 'no medical history'),
(10, 'aditya', 1234567890, 'adi@gmail.com', 'male', 'botad', 15, 'no medical history'),
(11, 'asdf', 1234567890, 'a@gmail.com', 'female', 'asdfghjk', 19, 'sdfgh');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `address`, `city`, `gender`, `email`, `password`) VALUES
(2, 'Sarita pandey', 'New Delhi India', 'Delhi', 'female', 'test@gmail.com', 'f925916e2754e5e03f75dd58a5733251'),
(3, 'Amit', 'New Delhi', 'New delhi', 'male', 'amit@gmail.com', 'f925916e2754e5e03f75dd58a5733251'),
(4, 'Rahul Singh', 'New Delhi', 'New delhi', 'male', 'rahul@gmail.com', 'f925916e2754e5e03f75dd58a5733251'),
(6, 'Test user', 'New Delhi', 'Delhi', 'male', 'tetuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251'),
(7, 'John', 'USA', 'Newyork', 'male', 'john@test.com', 'f925916e2754e5e03f75dd58a5733251'),
(79, 'ketan', 'botad', 'botad', 'male', 'k@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doc_id`),
  ADD KEY `specilization` (`specilization`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`spec_id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`PatientID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`Pat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doc_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `spec_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `Pat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`specilization`) REFERENCES `doctorspecilization` (`spec_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
