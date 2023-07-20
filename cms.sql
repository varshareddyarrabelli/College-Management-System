-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 06:32 PM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` varchar(25) NOT NULL,
  `c_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`) VALUES
('CID0001', 'MATHS'),
('CID0002', 'PHYSICS'),
('CID0003', 'DBMS'),
('CID0004', 'OPERATING SYSTEM'),
('CID0005', 'NTC'),
('CID0006', 'TOC'),
('CID0007', 'PROGRAM DESIGNING'),
('CID0008', 'FOP'),
('CID0009', 'DSA'),
('CID0010', 'MFML'),
('CID0011', 'NETWORKING'),
('CID0012', 'ENGINEERING GRAPHICS'),
('CID0013', 'CHEMISTRY'),
('CID0014', 'ENGINEERING MECHANICS'),
('CID0015', 'WEB DEVLOPMENT'),
('CID0016', 'CLOUD COMPUTING'),
('CID0017', 'MACHINE LEARNING'),
('CID0018', 'COMPUTER PROGRAMMING'),
('CID0019', 'ENVIRONMENTAL SCIENCE'),
('CID0020', 'NSS');

-- --------------------------------------------------------

--
-- Table structure for table `fa`
--

CREATE TABLE `fa` (
  `fa_id` varchar(25) NOT NULL,
  `t_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fa`
--

INSERT INTO `fa` (`fa_id`, `t_id`) VALUES
('FID0001', 'TID0001'),
('FID0015', 'TID0002'),
('FID0022', 'TID0003'),
('FID0018', 'TID0004'),
('FID0026', 'TID0005'),
('FID0010', 'TID0006'),
('FID0019', 'TID0007'),
('FID0011', 'TID0008'),
('FID0007', 'TID0009'),
('FID0020', 'TID0010'),
('FID0006', 'TID0011'),
('FID0008', 'TID0012'),
('FID0017', 'TID0013'),
('FID0016', 'TID0014'),
('FID0027', 'TID0015'),
('FID0009', 'TID0016'),
('FID0025', 'TID0017'),
('FID0005', 'TID0018'),
('FID0004', 'TID0019'),
('FID0003', 'TID0020'),
('FID0002', 'TID0021'),
('FID0014', 'TID0022'),
('FID0024', 'TID0023'),
('FID0013', 'TID0024'),
('FID0023', 'TID0025'),
('FID0021', 'TID0026'),
('FID0012', 'TID0027');

-- --------------------------------------------------------

--
-- Table structure for table `gradecard`
--

CREATE TABLE `gradecard` (
  `grade` varchar(25) NOT NULL,
  `credits` varchar(25) NOT NULL,
  `s_id` varchar(25) NOT NULL,
  `c_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gradecard`
--

INSERT INTO `gradecard` (`grade`, `credits`, `s_id`, `c_id`) VALUES
('9', '5', 'B200800CS', 'CID0004'),
('7', '4', 'B200800CS', 'CID0020'),
('8', '3', 'B200801CS', 'CID0015'),
('9', '6', 'B200803CS', 'CID0014'),
('8', '4', 'B200804CS', 'CID0008'),
('7', '3', 'B200805CS', 'CID0016'),
('8.5', '3', 'B200806CS', 'CID0002'),
('8..7', '3', 'B200807CS', 'CID0004'),
('9.5', '4', 'B200808CS', 'CID0005'),
('7.5', '3', 'B200809CS', 'CID0018'),
('8', '3', 'B200810CS', 'CID0004'),
('7', '4', 'B200811CS', 'CID0019'),
('8', '2', 'B200812CS', 'CID0010'),
('9', '2', 'B200813CS', 'CID0009'),
('6.5', '4', 'B200814CS', 'CID0011'),
('6.7', '4', 'B200815CS', 'CID0017'),
('7.7', '3', 'B200816CS', 'CID0006'),
('9.5', '4', 'B200817CS', 'CID0007'),
('5.5', '4', 'B200818CS', 'CID0010'),
('6.6', '4', 'B200819CS', 'CID0015'),
('7.6', '3', 'B200820CS', 'CID0018'),
('8.8', '4', 'B200821CS', 'CID0003'),
('9.6', '3', 'B200822CS', 'CID0018');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `s_id` varchar(25) NOT NULL,
  `c_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`s_id`, `c_id`) VALUES
('B200803CS', 'CID0014'),
('B200804CS', 'CID0008'),
('B200805CS', 'CID0016'),
('B200806CS', 'CID0002'),
('B200807CS', 'CID0004'),
('B200808CS', 'CID0005'),
('B200809CS', 'CID0018'),
('B200810CS', 'CID0004'),
('B200811CS', 'CID0019'),
('B200812CS', 'CID0010'),
('B200813CS', 'CID0009'),
('B200814CS', 'CID0011'),
('B200815CS', 'CID0017'),
('B200816CS', 'CID0006'),
('B200817CS', 'CID0007'),
('B200818CS', 'CID0010'),
('B200819CS', 'CID0015'),
('B200820CS', 'CID0018'),
('B200821CS', 'CID0003'),
('B200822CS', 'CID0018');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(25) NOT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `mname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `sex` varchar(25) DEFAULT NULL,
  `dob` varchar(25) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `addr` varchar(500) DEFAULT NULL,
  `attendance` varchar(25) DEFAULT NULL,
  `present` varchar(25) DEFAULT NULL,
  `totaldays` varchar(25) DEFAULT NULL,
  `fa_id` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `fname`, `mname`, `lname`, `sex`, `dob`, `email`, `addr`, `attendance`, `present`, `totaldays`, `fa_id`) VALUES
('B200800CS', 'AADHARSH', 'K', 'XAVIER ', 'MALE', '20-03-2002', 'B200800CS@nitc.ac.in', '401,402 Ramanlal JAI Rahdhakrishna S V Road Soc Dahisar 400068 Mumbai ', '85', '85', '100', 'FID0001'),
('B200801CS', 'AADHAVAN', 'PAAVAI', 'LENIN ', 'MALE', '12-08-2001', 'B200801CS@nitc.ac.in', 'Flat NoGoldwin 12 A-Block,Rebello 132 Hill RoadHouse Bandra West 400050 Mumbai ', '96', '96', '100', 'FID0018'),
('B200803CS', 'AARSHA', 'S', 'S', 'FEMALE', '20-09-2001', 'B200803CS@nitc.ac.in', 'Plot No 5/A Sector 4 Kharghar 410210 Navi Mumbai', '89', '89', '100', 'FID0014'),
('B200804CS', 'ABHAY', 'UNNI', 'NAMBIAR', 'FEMALE', '04-04-1999', 'B200804CS@nitc.ac.in', 'DNO 1-159,post office street,uttarakanchi,prathipadu mandal,east godavari', '94', '94', '100', 'FID0010'),
('B200805CS', 'ADI', 'NARAYANAN', 'KOROTH', 'MALE', '08-05-1998', 'B200805CS@nitc.ac.in', 'DN0:2-67,ADILAKSHMI STREET,LAMPAKALOVA,EASTGODAVARI DISTRICT,533456', '87', '87', '100', 'FID0008'),
('B200806CS', 'AKULA', 'VENKATA', 'SAI ADITHYA', 'MALE', '04-09-1997', 'B200806CS@nitc.ac.in', 'dno:203,arif apartment,karimnagar,601342', '94', '94', '100', 'FID0005'),
('B200807CS', 'AMAL', 'KRISHNA', 'P', 'MALE', '02-06-1997', 'B200807CS@nitc.ac.in', 'dno:3-67,pragathi nagar,hanumakonda,warangal,506001', '82', '82', '100', 'FID0026'),
('B200808CS', 'PONAGANTI', '', 'ANUSHA', 'FEMALE', '05-09-2003', 'B200808CS@nitc.ac.in', '3-60,SAMARLAKOTA,543802', '94', '94', '100', 'FID0027'),
('B200809CS', 'VIPPERLA', 'THARUN', 'KRISHNA TEJA', 'MALE', '20-09-2002', 'B200809CS@nitc.ac.in', 'dno:2-67,kattangal,kerala,673601', '81', '81', '100', 'FID0018'),
('B200810CS', 'MAHANTHI', 'DIVAKAR', 'NAIDU', 'MALE', '07-04-1998', 'B200810CS@nitc.ac.in', '404,khozhikode,kerala,673603', '90', '90', '100', 'FID0004'),
('B200811CS', 'ARRABELLI', 'VARSHA', 'REDDY', 'FEMALE', '05-06-2002', 'B200811CS@nitc.ac.in', 'pune,india,700707', '74', '74', '100', 'FID0012'),
('B200812CS', 'MAMIDAPALLI', 'RISHITHA', 'SRINIVAS', 'FEMALE', '02-02-2002', 'B200812CS@nitc.ac.in', 'RAJAHMUNDRY,EAST GODAVARI,ANDHRA PRADESH,533478', '95', '95', '100', 'FID0026'),
('B200813CS', 'MUAAD', NULL, 'AKMAL', 'MALE', '03-09-2001', 'B200813CS@nitc.ac.in', 'KATTANGAL,KHOZHIKODE,KERALA,673601', '89', '89', '100', 'FID0010'),
('B200814CS', 'KURUVELLA', 'SANTHOSHINI', NULL, 'FEMALE', '02-06-2000', 'B200814CS@nitc.ac.in', 'attara,nellore,andhra pradesh,540604', '90', '90', '100', 'FID0005'),
('B200815CS', 'NANDITHA', NULL, 'MENON', 'FEMALE', '08-05-1999', 'B200815CS@nitc.ac.in', 'KUNNAMANGALAM,KERALA,673604', '84', '84', '100', 'FID0012'),
('B200816CS', 'V', NULL, 'NOOSHIN', 'FEMALE', '01-08-2002', 'B200816CS@nitc.ac.in', 'WAYALAD,KERALA', '91', '91', '100', 'FID0013'),
('B200817CS', 'NAKKA', 'SUSHEEL', 'KUMAR', 'MALE', '09-09-1999', 'B200817CS@nitc.ac.in', 'gandhi nagar,gujarat', '82', '82', '100', 'FID0004'),
('B200818CS', 'P', NULL, 'PRAMODH', 'MALE', '20-09-1999', 'B200818CS@nitc.ac.in', 'SEETHAMMA THALLI STREET,WARANGAL,TELANGANA', '97', '97', '100', 'FID0011'),
('B200819CS', 'POLINENI', NULL, 'RAMANIVAS', 'MALE', '08-07-1999', 'B200819CS@nitc.ac.in', 'CHINTHAPALLI STREET,PRAKASHAM,PRAKASHAM DISTRICT,AP', '96', '96', '100', 'FID0022'),
('B200820CS', 'PATTIPATI', NULL, 'MANASWI', 'FEMALE', '03-03-2003', 'B200820CS@nitc.ac.in', 'CHINTHAPALLI STREET,PRAKASHAM,NELLORE,AP', '94', '94', '100', 'FID0024'),
('B200821CS', 'PRACHI', NULL, 'MISHRA', 'FEMALE', '03-04-2003', 'B200821CS@nitc.ac.in', 'CHINTHAPALLI STREET,KARTHE REHTHE STREET,NALIMA,UP', '86', '86', '100', 'FID0011'),
('B200822CS', 'SAMI', 'P', 'S', 'FEMALE', '09-05-2000', 'B200822CS@nitc.ac.in', 'CHINTHAPALLI STREET,CHIKOYA STREET,CHIMPURU,MP', '87', '87', '100', 'FID0008'),
('B200823CS', 'RUBEN', 'SINU', 'KURIAN', 'MALE', '09-05-1994', 'B200823CS@nitc.ac.in', 'SM STREET,MUMBAI,INDIA', '88', '88', '100', 'FID0019'),
('B200824CS', 'LIVIN', 'K', 'L', 'MALE', '10-05-1995', 'B200824CS@nitc.ac.in', 'ANUSHA STREET,PUNE,MUMBAI,INDIA', '96', '96', '100', 'FID0002'),
('B200825CS', 'LAKSHMI', 'S', 'S', 'FEMALE', '10-09-2000', 'B200825CS@nitc.ac.in', 'VARSHA STREET,LUCKNOW,UP', '66', '66', '100', 'FID0008'),
('B200826CS', 'SWAMY', 'RAJA', 'HRUSHIKESH', 'MALE', '02-09-2001', 'B200826CS@nitc.ac.in', 'gudiwada,andhra pradesh', '89', '89', '100', 'FID0024');

-- --------------------------------------------------------

--
-- Table structure for table `student_phone`
--

CREATE TABLE `student_phone` (
  `s_ph_id` varchar(25) NOT NULL,
  `s_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_phone`
--

INSERT INTO `student_phone` (`s_ph_id`, `s_id`) VALUES
('5456525812', 'B200800CS'),
('4545457523', 'B200801CS'),
('90003151233', 'B200801CS'),
('7036388062', 'B200803CS'),
('9603104471', 'B200803CS'),
('8341185258', 'B200804CS'),
('5959596230', 'B200805CS'),
('8955545968', 'B200806CS'),
('9666325874', 'B200806CS'),
('8666359421', 'B200807CS'),
('9555421213', 'B200808CS'),
('6333000154', 'B200809CS'),
('7531598624', 'B200809CS'),
('6030302114', 'B200810CS'),
('1968685234', 'B200811CS'),
('5262321202', 'B200811CS'),
('4252623282', 'B200812CS'),
('4862597315', 'B200812CS'),
('6235623520', 'B200813CS'),
('6986769656', 'B200814CS'),
('9565852535', 'B200814CS'),
('6535050515', 'B200815CS'),
('1525356595', 'B200816CS'),
('5963217589', 'B200816CS'),
('7585956535', 'B200817CS'),
('1526363595', 'B200818CS'),
('6595854525', 'B200819CS'),
('5000356595', 'B200820CS'),
('9060302050', 'B200821CS'),
('3020104050', 'B200822CS'),
('6393837343', 'B200822CS'),
('2131615141', 'B200823CS'),
('8529631476', 'B200823CS'),
('6252427282', 'B200824CS'),
('6353439383', 'B200824CS'),
('8521593574', 'B200824CS'),
('4251758694', 'B200825CS'),
('5464748494', 'B200825CS'),
('5659585754', 'B200826CS'),
('9586265303', 'B200826CS');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` varchar(25) NOT NULL,
  `Fname` varchar(25) DEFAULT NULL,
  `Mname` varchar(25) DEFAULT NULL,
  `Lname` varchar(25) DEFAULT NULL,
  `sex` varchar(25) DEFAULT NULL,
  `DOB` varchar(25) NOT NULL,
  `native_place` varchar(25) DEFAULT NULL,
  `Addr` varchar(500) NOT NULL,
  `Qualification` varchar(25) NOT NULL,
  `Salary` varchar(25) NOT NULL,
  `Marital_status` varchar(25) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Attendance` varchar(25) NOT NULL,
  `Present` varchar(25) NOT NULL,
  `Total_days` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `Fname`, `Mname`, `Lname`, `sex`, `DOB`, `native_place`, `Addr`, `Qualification`, `Salary`, `Marital_status`, `Email`, `Attendance`, `Present`, `Total_days`) VALUES
('TID0001', 'Vishnu', 'Sandeep', 'Turumella', 'MALE', '28-09-2002', 'Khammam', 'Madhavi enclave, motinagar, Hyderabad, Telangana, 500018 ', 'MTech', '200000', 'NO', 'vishnusandy@gmail.com', '80', '80', '100'),
('TID0002', 'Rahul', NULL, 'Pasupulati', 'MALE', '13-02-2003', 'Chittor', 'Janapriya, motinagar, Hyderabad, Telangana, 500018', 'Mtech', '100000', 'NO', 'rahul@gmail.com', '75', '75', '100'),
('TID0003', 'Budhil', 'Kusal', 'Sai', 'MALE', '19-08-1999', 'Hyderabad', 'plot no 202, Manas Residency, SR-Nagar, Telangana 500912 ', 'PHD', '150000', 'YES', 'budhilsai@gmail.com', '95', '95', '100'),
('TID0004', 'Bhuvan ', 'Sai', 'Nallamothu', 'MALE', '30-09-1999', 'Vijayawada', 'plot no 983, Vasavi Enclave, Hyderabad, Telangana, 500281  ', 'Mtech', '100000', 'NO', 'bhuvansai@gmail.com', '70', '70', '100'),
('TID0005', 'Raja', 'Hrushikesh', 'Swamy', 'MALE', '02-09-2000', 'Khammam', 'plot no 183, Kakatiya Residency, Motinagar, Hyderabad, Telangana 500018', 'MTech', '200000', 'NO', 'raja@gmail.com', '100', '100', '100'),
('TID0006', 'Bhargav', 'Tippi', 'Reddy', 'MALE', '26-06-1995', 'Vijayawada', 'plot no 298, Sai enclave, SRO colony, Vijayawada ,400013, Andhra Pradesh', 'PG', '125000', 'YES', 'tippi@gmail.com', '92', '92', '100'),
('TID0007', 'Pramod', 'paru', 'Bharatwaj', '', '13-11-1990', '  Vizag', '  Manasa Residency, Sai colony, Vizag, Andhra Pradesh , 213793', 'Degree', '75000', '', 'pramod@gmail.com', '97', '97', '100'),
('TID0008', 'Nandini', NULL, 'Chava', 'FEMALE', '06-11-1999', 'Guntur', '#82781, Naga colony, Guntur, Andhra Pradesh, 9289812', 'MTech', '90000', 'NO', 'nandini@gmail.com', '80', '80', '100'),
('TID0009', 'Pranati', 'Kasupu', 'Pranali', 'FEMALE', '12-12-1994', 'Warangal', 'Plot no 827, Krishna colony, Sai Enclave, Telangana, 2632631', 'PG', '125000', 'YES', 'pranati@gmail.com', '87', '87', '100'),
('TID0010', 'Pranati', 'Kasupu', 'Pranali', 'FEMALE', '12-12-1998', 'KHAMMAM', 'Plot no 826, Krishna colony, Sai Enclave, Khammam, Telangana, 2632631', 'PG', '75000', 'YES', 'pranati12@gmail.com', '88', '88', '100'),
('TID0011', 'Kushi', NULL, 'Chowdhary', 'FEMALE', '12-12-1996', 'Bombay', 'Plot no 492, Ramu colony, Vasu Enclave, Bombay, Maharashtra, 4326321', 'MTech', '100000', 'YES', 'Chowdhary@gmail.com', '90', '90', '100'),
('TID0012', 'Pulamma', 'Ramula', 'Reddy', 'FEMALE', '22-12-1975', 'Kakinada', 'Pullareddy Nilayam, Street 21, Kakinada, Andhra Pradesh, 500129', 'PHD', '250000', 'YES', 'pulamma@gmail.com', '100', '100', '100'),
('TID0013', 'Arabelli', 'Varsha', 'Reddy', 'FEMALE', '05-06-1966', 'Warangal', 'One city, Kondapur, Hyderabad, Telangana, 500233 ', 'PHD', '200000', 'YES', 'vari@gmail.com', '75', '75', '100'),
('TID0014', 'Tharun', 'Krishna', 'Teja', 'MALE', '12-12-1999', 'Kakinada', '18-3-27/1, Ayodhya, Uttar Pradesh, 224123 ', 'PHD', '250000', 'YES', 'tharun@gmail.com', '90', '90', '100'),
('TID0015', 'Anusha', NULL, 'Ponaganti', 'FEMALE', '05-09-1995', 'Kakinada', '18-3-27/123, Chennai, Tamil Nadu, 600001', 'MTech', '80000', 'YES', 'anu@gmail.com', '89', '89', '100'),
('TID0016', 'Vijay', 'Kumar', 'Reddy', 'MALE', '01-01-1990', 'Bangalore', 'plot no 362, Polar Residency, Nizam colony, Bangalore, Karnataka, 500032', 'PG', '125000', 'YES', 'kumar@gmail.com', '98', '98', '100'),
('TID0017', 'Ruthvik', 'Kumar', 'Reddy', 'MALE', '18-09-1996', 'Tirupati', 'plot no 200, Yasir Residency, Love colony, Bangalore, Karnataka, 500031', 'PHD', '175000', 'NO', 'ruthvik@gmail.com', '80', '80', '100'),
('TID0018', 'Muddasani', 'Sai', 'Advaith', 'MALE', '05-11-2000', 'Karimnagar', '12-23-132, Nagarjuna colony, SA street, Karimnagar, Telangana, 523219', 'MTech', '95000', 'NO', 'advaith@gmail.com', '88', '88', '100'),
('TID0019', 'Kiran', 'Prasad', 'Yerrineni', 'MALE', '05-08-1996', 'Vizag', '12-37-282, Brigade Residency, Nizampet, Hyderabad, Telangana , 500114', 'MTech', '100000', 'NO', 'kiranprasad@gmail.com', '70', '70', '100'),
('TID0020', 'Monkey', 'D', 'Luffy', 'MALE', '05-05-1997', 'Tokyo', '12-90-321, Onigashima Residency, Wano Street, Kolkata, West Bengal, 700001  ', 'MTech', '175000', 'NO', 'luufyd@gmail.com', '50', '50', '100'),
('TID0021', 'Chekurti', 'Deepak', 'Reddy', 'MALE', '07-05-1994', 'Patna', '20-76-21, Parampara Street, Patna, Bihar, 800001  ', 'PG', '125000', 'YES', 'Deepak@gmail.com', '76', '76', '100'),
('TID0022', 'Mahanti', 'Divakar', 'Naidu', 'MALE', '17-10-1997', 'Vizag', '67-09-21, Main Street, Temple Road, Kusuluvada, Andhra Pradesh, 400938  ', 'PHD', '110213', 'NO', 'Mahanti@gmail.com', '69', '69', '100'),
('TID0023', 'Lalaasa', 'Krishna', 'Chowdhary', 'FEMALE', '26-06-1998', 'Lucknow', 'Plot 123, Rainbow Vistas, Mirzapur, Uttar Pradesh, 900101 ', 'PG', '100000', 'NO', 'Laali@gmail.com', '76', '76', '100'),
('TID0024', 'Mesala', 'Suresh', 'Gopi', 'MALE', '24-04-1990', 'Calicut', '23-24-25, St Joseph colony, Calicut, Kerala, 673001', 'MTech', '150000', 'YES', 'Gopi@gmail.com', '100', '100', '100'),
('TID0025', 'Karanam', 'Hema', 'Bhargavi', 'FEMALE', '01-01-2000', 'Nellore', '23-11-21-3, Ravi Street, Moosa colony, Nellore, Andhra Pradesh, 430032', 'MTech', '110000', 'NO', 'bhargavi@gmail.com', '89', '89', '100'),
('TID0026', 'Ebenezer', 'Rahul', 'Deepak', 'MALE', '28-02-2002', 'Warangal', 'plot no 200, Kakatiya colony, Pitampura, Hamunakonda, Warangal, 593842', 'MTech', '120000', 'NO', 'ebenezer@gmail.com', '99', '99', '100'),
('TID0027', 'Udamala', '', 'Uday', 'MALE', '05-08-1993', 'Kochi', 'plot no 800, St Willams Street, Rome villa, Kochi, 600001', 'MTech', '130000', 'YES', 'uday@gmail.com', '99', '99', '100');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_phone`
--

CREATE TABLE `teacher_phone` (
  `t_ph_id` varchar(25) NOT NULL,
  `t_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_phone`
--

INSERT INTO `teacher_phone` (`t_ph_id`, `t_id`) VALUES
('8341185258', 'TID0001'),
('9603104471', 'TID0002'),
('8639845169', 'TID0003'),
('9849805879', 'TID0004'),
('48596', 'TID0005'),
('9121083799', 'TID0005'),
('7036388062', 'TID0006'),
('1598623542', 'TID0007'),
('9000631923', 'TID0007'),
('7093119393', 'TID0008'),
('5496853290', 'TID0009'),
('8555984564', 'TID0009'),
('7306928669', 'TID0010'),
('9866328140', 'TID0011'),
('8331844466', 'TID0012'),
('8555921764', 'TID0013'),
('9491783262', 'TID0014'),
('9701107879', 'TID0015'),
('9494545651', 'TID0016'),
('9632584621', 'TID0016'),
('9440445725', 'TID0017'),
('7671076053', 'TID0018'),
('9182017440', 'TID0019'),
('9949428887', 'TID0020'),
('9490353691', 'TID0021'),
('7995116342', 'TID0022'),
('8374246678', 'TID0023'),
('9866328156', 'TID0024'),
('9618006792', 'TID0025'),
('5698230101', 'TID0026'),
('9515605868', 'TID0026'),
('10203050604', 'TID0027'),
('9509021212', 'TID0027');

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `c_id` varchar(25) NOT NULL,
  `t_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`c_id`, `t_id`) VALUES
('CID0001', 'TID0003'),
('CID0002', 'TID0004'),
('CID0003', 'TID0011'),
('CID0004', 'TID0013'),
('CID0005', 'TID0017'),
('CID0006', 'TID0016'),
('CID0007', 'TID0024'),
('CID0008', 'TID0010'),
('CID0009', 'TID0016'),
('CID0010', 'TID0015'),
('CID0011', 'TID0007'),
('CID0012', 'TID0008'),
('CID0013', 'TID0007'),
('CID0014', 'TID0020'),
('CID0015', 'TID0018'),
('CID0016', 'TID0012'),
('CID0017', 'TID0005'),
('CID0018', 'TID0014'),
('CID0019', 'TID0023'),
('CID0020', 'TID0021'),
('CID0012', 'TID0019'),
('CID0011', 'TID0022'),
('CID0016', 'TID0025'),
('CID0013', 'TID0026'),
('CID0006', 'TID0027'),
('CID0015', 'TID0006'),
('CID0020', 'TID0002'),
('CID0015', 'TID0001'),
('CID0013', 'TID0009');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`, `type`) VALUES
('tharun', 'tharun', 'admin'),
('vari', 'vari', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_id` (`c_id`);

--
-- Indexes for table `fa`
--
ALTER TABLE `fa`
  ADD PRIMARY KEY (`fa_id`),
  ADD UNIQUE KEY `fa_id` (`fa_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `gradecard`
--
ALTER TABLE `gradecard`
  ADD PRIMARY KEY (`s_id`,`c_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`s_id`,`c_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `s_id` (`s_id`),
  ADD KEY `fa_id` (`fa_id`);

--
-- Indexes for table `student_phone`
--
ALTER TABLE `student_phone`
  ADD PRIMARY KEY (`s_ph_id`),
  ADD UNIQUE KEY `s_ph_id` (`s_ph_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `teacher_phone`
--
ALTER TABLE `teacher_phone`
  ADD PRIMARY KEY (`t_ph_id`),
  ADD UNIQUE KEY `t_ph_id` (`t_ph_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD KEY `c_id` (`c_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`,`pass`,`type`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fa`
--
ALTER TABLE `fa`
  ADD CONSTRAINT `fa_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`);

--
-- Constraints for table `gradecard`
--
ALTER TABLE `gradecard`
  ADD CONSTRAINT `gradecard_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `gradecard_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`);

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`),
  ADD CONSTRAINT `register_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`fa_id`) REFERENCES `fa` (`fa_id`);

--
-- Constraints for table `student_phone`
--
ALTER TABLE `student_phone`
  ADD CONSTRAINT `student_phone_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`);

--
-- Constraints for table `teacher_phone`
--
ALTER TABLE `teacher_phone`
  ADD CONSTRAINT `teacher_phone_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `teacher` (`t_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
