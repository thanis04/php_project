-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2022 at 03:23 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surveillance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_ID` varchar(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Password` varchar(10) NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Name`, `Password`) VALUES
('AD001', 'Fathima Aarah', 'A001'),
('AD002', 'Shamil Khan', 'S002'),
('AD003', 'Mohamed Rishad', 'R003');

-- --------------------------------------------------------

--
-- Table structure for table `caught_pub`
--

DROP TABLE IF EXISTS `caught_pub`;
CREATE TABLE IF NOT EXISTS `caught_pub` (
  `Pub_Index` int NOT NULL,
  `Detector_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `caught_pub`
--

INSERT INTO `caught_pub` (`Pub_Index`, `Detector_ID`) VALUES
(1, 'CAM001'),
(1, 'CAM003'),
(1, 'DRN009'),
(1, 'DRN010'),
(1, 'DRN001'),
(2, 'CAM021'),
(2, 'DRN002'),
(2, 'DRN009'),
(3, 'CAM013'),
(3, 'CAM020'),
(3, 'DRN007'),
(1, 'CAM007'),
(1, 'CAM006'),
(1, 'DRN008'),
(1, 'DRN002'),
(5, 'CAM025'),
(5, 'CAM026'),
(5, 'CAM027'),
(5, 'CAM028'),
(5, 'DRN006');

-- --------------------------------------------------------

--
-- Table structure for table `caught_traff`
--

DROP TABLE IF EXISTS `caught_traff`;
CREATE TABLE IF NOT EXISTS `caught_traff` (
  `Traf_Index` int NOT NULL,
  `Detector_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `caught_traff`
--

INSERT INTO `caught_traff` (`Traf_Index`, `Detector_ID`) VALUES
(1, 'CAM005'),
(1, 'CAM007'),
(1, 'DRN001'),
(1, 'DRN008'),
(1, 'DRN002'),
(2, 'CAM013'),
(2, 'CAM015'),
(2, 'CAM016'),
(2, 'DRN005'),
(2, 'DRN007'),
(3, 'CAM013'),
(3, 'CAM014'),
(3, 'DRN008'),
(4, 'CAM001'),
(4, 'DRN004'),
(4, 'DRN007'),
(5, 'CAM009'),
(5, 'CAM010'),
(5, 'CAM011'),
(5, 'CAM012'),
(5, 'DRN003');

-- --------------------------------------------------------

--
-- Table structure for table `commited_by_pub`
--

DROP TABLE IF EXISTS `commited_by_pub`;
CREATE TABLE IF NOT EXISTS `commited_by_pub` (
  `Pub_Index` int NOT NULL,
  `Offence_Id` varchar(10) NOT NULL,
  PRIMARY KEY (`Pub_Index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commited_by_pub`
--

INSERT INTO `commited_by_pub` (`Pub_Index`, `Offence_Id`) VALUES
(1, 'OF003'),
(2, 'OF007'),
(3, 'OF001'),
(5, 'OF002');

-- --------------------------------------------------------

--
-- Table structure for table `commited_by_traf`
--

DROP TABLE IF EXISTS `commited_by_traf`;
CREATE TABLE IF NOT EXISTS `commited_by_traf` (
  `Traff_Index` int NOT NULL,
  `Offence_Id` varchar(10) NOT NULL,
  PRIMARY KEY (`Traff_Index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commited_by_traf`
--

INSERT INTO `commited_by_traf` (`Traff_Index`, `Offence_Id`) VALUES
(1, 'OF012'),
(2, 'OF015'),
(3, 'OF017'),
(4, 'OF012'),
(5, 'OF019');

-- --------------------------------------------------------

--
-- Table structure for table `depends`
--

DROP TABLE IF EXISTS `depends`;
CREATE TABLE IF NOT EXISTS `depends` (
  `ID_Num` varchar(10) NOT NULL,
  `Guardian` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `depends`
--

INSERT INTO `depends` (`ID_Num`, `Guardian`) VALUES
('PE001', 'PE002'),
('PE001', 'PE003'),
('PE001', 'PE004'),
('PE002', 'PE001'),
('PE002', 'PE003'),
('PE002', 'PE004'),
('PE003', 'PE001'),
('PE003', 'PE002'),
('PE003', 'PE004'),
('PE004', 'PE001'),
('PE004', 'PE002'),
('PE004', 'PE003'),
('PE005', 'PE006'),
('PE006', 'PE005'),
('PE007', 'PE008'),
('PE007', 'PE009'),
('PE008', 'PE007'),
('PE008', 'PE009'),
('PE009', 'PE007'),
('PE009', 'PE008'),
('PE010', 'PE011'),
('PE011', 'PE010');

-- --------------------------------------------------------

--
-- Table structure for table `detected`
--

DROP TABLE IF EXISTS `detected`;
CREATE TABLE IF NOT EXISTS `detected` (
  `DETECTED_INDEX` int NOT NULL AUTO_INCREMENT,
  `ID_Type` varchar(20) NOT NULL,
  `DetectedFileLink` varchar(20) NOT NULL,
  `Num_Of_Cam` int NOT NULL,
  `Time` time NOT NULL,
  `Detected_Accuracy` int NOT NULL,
  `Date` date NOT NULL,
  `Num_of_Drone` int NOT NULL,
  `Last_Loc` varchar(30) NOT NULL,
  `Detected_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`DETECTED_INDEX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detector_cam`
--

DROP TABLE IF EXISTS `detector_cam`;
CREATE TABLE IF NOT EXISTS `detector_cam` (
  `Cam_ID` varchar(10) NOT NULL,
  `Accuracy` int NOT NULL,
  `Location` varchar(20) NOT NULL,
  `ELEVATION` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detector_cam`
--

INSERT INTO `detector_cam` (`Cam_ID`, `Accuracy`, `Location`, `ELEVATION`) VALUES
('CAM001', 14, 'Bottom Town', '60ft'),
('CAM002', 14, 'Bottom Town', '80ft'),
('CAM003', 14, 'Bottom Town', '70ft'),
('CAM004', 14, 'Bottom Town', '65ft'),
('CAM005', 14, 'East Coast', '60ft'),
('CAM006', 14, 'East Coast', '80ft'),
('CAM007', 14, 'East Coast', '70ft'),
('CAM008', 14, 'East Coast', '65ft'),
('CAM009', 14, 'Up Most Hill', '60ft'),
('CAM010', 14, 'Up Most Hill', '80ft'),
('CAM011', 14, 'Up Most Hill', '70ft'),
('CAM012', 14, 'Up Most Hill', '65ft'),
('CAM013', 14, 'West Coast', '60ft'),
('CAM014', 14, 'West Coast', '80ft'),
('CAM015', 14, 'West Coast', '70ft'),
('CAM016', 14, 'West Coast', '65ft'),
('CAM017', 14, 'Bank End', '60ft'),
('CAM018', 14, 'Bank End', '80ft'),
('CAM019', 14, 'Bank End', '70ft'),
('CAM020', 14, 'Bank End', '65ft'),
('CAM021', 14, 'South Wridge', '60ft'),
('CAM022', 14, 'South Wridge', '80ft'),
('CAM023', 14, 'South Wridge', '70ft'),
('CAM024', 14, 'South Wridge', '65ft'),
('CAM026', 14, 'West Bank', '80ft'),
('CAM027', 14, 'West Bank', '70ft'),
('CAM028', 14, 'West Bank', '65ft'),
('CAM030', 15, 'Nintavur', '100ft');

-- --------------------------------------------------------

--
-- Table structure for table `detector_drone`
--

DROP TABLE IF EXISTS `detector_drone`;
CREATE TABLE IF NOT EXISTS `detector_drone` (
  `Drone_ID` varchar(10) NOT NULL,
  `Accuracy` int NOT NULL,
  `Active_Area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detector_drone`
--

INSERT INTO `detector_drone` (`Drone_ID`, `Accuracy`, `Active_Area`) VALUES
('DRN001', 30, 'East Coast'),
('DRN002', 30, 'West Coast'),
('DRN003', 30, 'Bottom Town'),
('DRN004', 30, 'Up Most Hill'),
('DRN005', 30, 'South Wridge'),
('DRN006', 30, 'Bank End'),
('DRN007', 30, 'West Bank'),
('DRN008', 30, 'East Coast'),
('DRN009', 30, 'West Coast'),
('DRN010', 30, 'Bottom Town');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

DROP TABLE IF EXISTS `fine`;
CREATE TABLE IF NOT EXISTS `fine` (
  `OffenID` varchar(10) NOT NULL,
  `Per_Type` char(1) NOT NULL,
  `MidPer` float NOT NULL,
  `EndPer` float NOT NULL,
  `Int_Amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`OffenID`, `Per_Type`, `MidPer`, `EndPer`, `Int_Amount`) VALUES
('OF001', 'R', 1.5, 2.5, 100),
('OF001', 'F', 1, 2, 80),
('OF002', 'R', 2, 3, 150),
('OF002', 'F', 1, 3, 120),
('OF003', 'R', 2, 3.5, 200),
('OF003', 'F', 1.5, 2, 160),
('OF004', 'R', 2, 3, 80),
('OF004', 'F', 2, 3, 64),
('OF005', 'R', 3, 4, 300),
('OF005', 'F', 2.5, 3, 240),
('OF006', 'R', 3, 4, 300),
('OF006', 'F', 2.5, 3, 240),
('OF007', 'R', 5, 10, 1000),
('OF007', 'F', 5, 10, 800),
('OF008', 'R', 3, 3.5, 500),
('OF008', 'F', 2.5, 3, 400),
('OF009', 'R', 1.5, 2, 50),
('OF009', 'F', 1.5, 2, 40),
('OF010', 'R', 2, 3, 40),
('OF010', 'F', 1.5, 2.7, 32),
('OF011', 'R', 4, 5, 600),
('OF011', 'F', 3.3, 4.7, 480),
('OF012', 'R', 4.7, 5.6, 300),
('OF012', 'F', 4.3, 5.2, 240),
('OF013', 'R', 5, 7, 800),
('OF013', 'F', 4.8, 7, 640),
('OF014', 'R', 3, 4, 350),
('OF014', 'F', 2.5, 3.3, 280),
('OF015', 'R', 2.7, 3.2, 200),
('OF015', 'F', 2.4, 2.9, 160),
('OF016', 'R', 0.5, 1, 60),
('OF016', 'F', 0.5, 1, 48),
('OF017', 'R', 4.5, 5.3, 700),
('OF017', 'F', 4.3, 5, 560),
('OF018', 'R', 1.2, 1.5, 200),
('OF018', 'F', 1.2, 1.5, 160),
('OF019', 'R', 1, 1.2, 100),
('OF019', 'F', 1, 1.2, 80),
('OF020', 'R', 4.3, 6, 750),
('OF020', 'F', 4, 5.2, 600),
('OF021', 'R', 3, 3.7, 450),
('OF021', 'F', 3, 3.5, 360);

-- --------------------------------------------------------

--
-- Table structure for table `found`
--

DROP TABLE IF EXISTS `found`;
CREATE TABLE IF NOT EXISTS `found` (
  `DETECTED_INDEX` int NOT NULL,
  `Detector_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `miss_obj`
--

DROP TABLE IF EXISTS `miss_obj`;
CREATE TABLE IF NOT EXISTS `miss_obj` (
  `Owner_ID` varchar(10) NOT NULL,
  `Descrip` varchar(20) NOT NULL,
  `File_Link` varchar(20) NOT NULL,
  `Special_Fea` varchar(150) NOT NULL,
  PRIMARY KEY (`Owner_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miss_obj`
--

INSERT INTO `miss_obj` (`Owner_ID`, `Descrip`, `File_Link`, `Special_Fea`) VALUES
('PE002', 'Generator', 'bit.obj.ly2', 'Having a Spiderman Sticker'),
('PE019', 'Laptop', 'bit.obj.ly4', 'Well head manufacturer product');

-- --------------------------------------------------------

--
-- Table structure for table `miss_per`
--

DROP TABLE IF EXISTS `miss_per`;
CREATE TABLE IF NOT EXISTS `miss_per` (
  `ID_Num` varchar(10) NOT NULL,
  `File_Link` varchar(20) NOT NULL,
  `Special_Fea` varchar(150) NOT NULL,
  PRIMARY KEY (`ID_Num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miss_per`
--

INSERT INTO `miss_per` (`ID_Num`, `File_Link`, `Special_Fea`) VALUES
('PE004', 'bit.ly.4', 'Left Hander'),
('PE006', 'bit.ly.6', 'Locomotor disability');

-- --------------------------------------------------------

--
-- Table structure for table `miss_veh`
--

DROP TABLE IF EXISTS `miss_veh`;
CREATE TABLE IF NOT EXISTS `miss_veh` (
  `Veh_ID` varchar(10) NOT NULL,
  `File_Link` varchar(20) NOT NULL,
  `Special_Fea` varchar(150) NOT NULL,
  PRIMARY KEY (`Veh_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `miss_veh`
--

INSERT INTO `miss_veh` (`Veh_ID`, `File_Link`, `Special_Fea`) VALUES
('VE007', 'bit.veh.ly7', 'There is a demage in mud guard'),
('VE011', 'bit.veh.ly11', 'Right Head light not working');

-- --------------------------------------------------------

--
-- Table structure for table `most_wanted`
--

DROP TABLE IF EXISTS `most_wanted`;
CREATE TABLE IF NOT EXISTS `most_wanted` (
  `ID_Num` varchar(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `File_Link` varchar(20) NOT NULL,
  `Specisl_Fea` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `most_wanted`
--

INSERT INTO `most_wanted` (`ID_Num`, `Name`, `File_Link`, `Specisl_Fea`) VALUES
('PE021', 'Prabath', 'bit.ly.21', 'Having a Tattoo on left arm shoulder'),
('PE022', 'Roman', 'bit.ly.22', 'Bald man wearing a earing on his right ear');

-- --------------------------------------------------------

--
-- Table structure for table `offense`
--

DROP TABLE IF EXISTS `offense`;
CREATE TABLE IF NOT EXISTS `offense` (
  `OffenID` varchar(10) NOT NULL,
  `OffDes` varchar(100) NOT NULL,
  `Off_Type` char(1) NOT NULL,
  `RedZone` int NOT NULL,
  PRIMARY KEY (`OffenID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `offense`
--

INSERT INTO `offense` (`OffenID`, `OffDes`, `Off_Type`, `RedZone`) VALUES
('OF001', 'Smoking at nonsmoking area', 'P', 12),
('OF002', 'littering in public places', 'P', 24),
('OF003', 'Spitting in public', 'P', 30),
('OF004', 'Crossing roads in wrong places ', 'P', 21),
('OF005', 'Graffiti', 'P', 15),
('OF006', 'Sticking posters in public places', 'P', 15),
('OF007', 'Detecting weapons', 'P', 12),
('OF008', 'Destroying public properties ', 'P', 9),
('OF009', 'Sidewalk violation', 'P', 30),
('OF010', 'Violating pedestrian rules', 'P', 18),
('OF011', 'Exceeded posted speed limit', 'T', 15),
('OF012', 'Crossing mid-way lines', 'T', 24),
('OF013', 'Fail to obey traffic control devices and signs', 'T', 9),
('OF014', 'One-way violations', 'T', 12),
('OF015', 'Improper lane use', 'T', 9),
('OF016', 'Popping out of running vehicles', 'T', 30),
('OF017', 'Throwing garbage out.', 'T', 24),
('OF018', 'Parking violations', 'T', 15),
('OF019', 'No helmet', 'T', 9),
('OF020', 'Improper usage of vehicle lights', 'T', 9),
('OF021', 'Excessive vehicle smoke emission', 'T', 30);

-- --------------------------------------------------------

--
-- Table structure for table `phone_no`
--

DROP TABLE IF EXISTS `phone_no`;
CREATE TABLE IF NOT EXISTS `phone_no` (
  `ID_Num` varchar(10) NOT NULL,
  `Phn_Num` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phone_no`
--

INSERT INTO `phone_no` (`ID_Num`, `Phn_Num`) VALUES
('PE001', 6108695859),
('PE002', 8276755074),
('PE003', 8948810541),
('PE004', 9193962462),
('PE005', 1625757197),
('PE006', 4301043291),
('PE007', 7953225043),
('PE008', 8810120808),
('PE009', 5622015121),
('PE010', 1219382655),
('PE011', 3672306034),
('PE012', 5160243121),
('PE013', 1947239736),
('PE014', 6803936968),
('PE015', 1335569172),
('PE016', 9599584023),
('PE017', 2769825866),
('PE018', 4955510693),
('PE019', 9446899935),
('PE020', 8353745418);

-- --------------------------------------------------------

--
-- Table structure for table `public_sus`
--

DROP TABLE IF EXISTS `public_sus`;
CREATE TABLE IF NOT EXISTS `public_sus` (
  `Pub_Index` int NOT NULL AUTO_INCREMENT,
  `ID_Status` char(1) NOT NULL,
  `PubFileLink` varchar(10) NOT NULL,
  `OffenDes` varchar(150) NOT NULL,
  `FineAmount` int NOT NULL,
  `Date` date NOT NULL,
  `days` int NOT NULL,
  `Detected_Accuracy` int NOT NULL,
  `Num_Of_Cam` int NOT NULL,
  `Num_Of_Drone` int NOT NULL,
  `Time` time NOT NULL,
  `Location` varchar(20) NOT NULL,
  `Pub_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Pub_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `public_sus`
--

INSERT INTO `public_sus` (`Pub_Index`, `ID_Status`, `PubFileLink`, `OffenDes`, `FineAmount`, `Date`, `days`, `Detected_Accuracy`, `Num_Of_Cam`, `Num_Of_Drone`, `Time`, `Location`, `Pub_ID`) VALUES
(1, 'A', 'bit.ly2', 'Spitting in public', 200, '2022-02-16', 1, 100, 2, 3, '04:26:03', 'Bottom Town', 'PE002'),
(2, 'I', 'bit.ly17', 'Detecting weapons', 920, '2022-02-02', 15, 74, 1, 2, '06:26:03', 'South Wridge', 'PE017'),
(3, 'A', 'bit.ly1', 'Smoking at nonsmoking area', 104, '2022-02-07', 10, 58, 2, 1, '12:12:03', 'Bank End', 'PE001'),
(4, 'A', 'bit.ly2', 'Spitting in public', 200, '2022-02-11', 6, 88, 2, 2, '09:56:03', 'East Coast', 'PE002'),
(5, 'A', 'bit.ly10', 'littering in public places', 153, '2022-02-02', 15, 86, 4, 1, '11:56:03', 'West Bank', 'PE010');

-- --------------------------------------------------------

--
-- Table structure for table `surv_person`
--

DROP TABLE IF EXISTS `surv_person`;
CREATE TABLE IF NOT EXISTS `surv_person` (
  `ID_Num` varchar(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `File_Link` varchar(10) NOT NULL,
  `Per_Type` char(1) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Status` char(1) NOT NULL,
  `Password` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_Num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surv_person`
--

INSERT INTO `surv_person` (`ID_Num`, `Name`, `Address`, `File_Link`, `Per_Type`, `Email`, `Status`, `Password`) VALUES
('PE001', 'James', 'Pineland,Texas(TX), 75968', 'bit.ly1', 'R', 'James001@coolmail.com', 'A', 'aaaa'),
('PE002', 'Mellissa', 'Pineland,Texas(TX), 75969', 'bit.ly2', 'R', 'Mellissa002@coolmail.com', 'A', 'bbbb'),
('PE003', 'John', 'Pineland,Texas(TX), 75970', 'bit.ly3', 'R', 'John003@coolmail.com', 'A', 'cccc'),
('PE004', 'Michael', 'Pineland,Texas(TX), 75971', 'bit.ly4', 'R', 'Michael004@coolmail.com', 'A', 'dddd'),
('PE005', 'William', 'ROTHSAY,Minnesota(MN), 56579', 'bit.ly5', 'R', 'William005@coolmail.com', 'A', 'eeee'),
('PE006', 'Nancy', 'ROTHSAY,Minnesota(MN), 56580', 'bit.ly6', 'R', 'Nancy006@coolmail.com', 'A', 'ffff'),
('PE007', 'Richard', 'Trenary,Michigan(MI), 49891', 'bit.ly7', 'R', 'Richard007@coolmail.com', 'A', 'gggg'),
('PE008', 'Joseph', 'Trenary,Michigan(MI), 49892', 'bit.ly8', 'R', 'Joseph008@coolmail.com', 'A', 'hhhh'),
('PE009', 'Thomas', 'Trenary,Michigan(MI), 49893', 'bit.ly9', 'R', 'Thomas009@coolmail.com', 'A', 'iiii'),
('PE010', 'Felicia', 'Marne,Iowa(IA), 51552', 'bit.ly10', 'R', 'Felicia010@coolmail.com', 'A', 'jjjj'),
('PE011', 'Daniel', 'Marne,Iowa(IA), 51553', 'bit.ly11', 'R', 'Daniel011@coolmail.com', 'A', 'kkkk'),
('PE012', 'Christinna', 'El Paso,Texas(TX), 79901', 'bit.ly12', 'R', 'Christinna012@coolmail.com', 'A', 'llll'),
('PE013', 'Anthony', 'Boston,Massachusetts(MA), 02199', 'bit.ly13', 'R', 'Anthony013@coolmail.com', 'A', 'mmmm'),
('PE014', 'Paul', 'West Bend,Wisconsin(WI), 53095', 'bit.ly14', 'R', 'Paul014@coolmail.com', 'A', 'nnnn'),
('PE015', 'Shelia', 'Athens,Tennessee(TN), 37303', 'bit.ly15', 'R', 'Shelia015@coolmail.com', 'A', 'oooo'),
('PE016', 'Gopal', 'Parkageburg, Somaliya(NS), 47212', 'bit.ly16', 'F', 'Gopal016@coolmail.com', 'A', 'pppp'),
('PE017', 'Sharuk', 'Main Street, PencilVeniya, 77123', 'bit.ly17', 'F', 'Sharuk017@coolmail.com', 'A', 'qqqq'),
('PE018', 'Sahana', 'Plymouth,Indiana(IN), 46563', 'bit.ly18', 'F', 'Sahana018@coolmail.com', 'A', 'rrrr'),
('PE019', 'Ohiya', 'PRINCETON,Illinois(IL), 61356', 'bit.ly19', 'F', 'Ohiya019@coolmail.com', 'A', 'ssss'),
('PE020', 'Mala', 'Philadelphia,Pennsylvania(PA), 19103', 'bit.ly20', 'F', 'Mala020@coolmail.com', 'A', 'tttt');

-- --------------------------------------------------------

--
-- Table structure for table `traffic_sus`
--

DROP TABLE IF EXISTS `traffic_sus`;
CREATE TABLE IF NOT EXISTS `traffic_sus` (
  `Traf_Index` int NOT NULL AUTO_INCREMENT,
  `ID_Status` char(1) NOT NULL,
  `TraffFileLink` varchar(20) NOT NULL,
  `OffenDes` varchar(150) NOT NULL,
  `FineAmount` int NOT NULL,
  `Date` date NOT NULL,
  `days` int NOT NULL,
  `Detected_Accuracy` int NOT NULL,
  `Num_Of_Cam` int NOT NULL,
  `Num_Of_Drone` int NOT NULL,
  `Time` time NOT NULL,
  `Location` varchar(20) NOT NULL,
  `Owner_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`Traf_Index`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `traffic_sus`
--

INSERT INTO `traffic_sus` (`Traf_Index`, `ID_Status`, `TraffFileLink`, `OffenDes`, `FineAmount`, `Date`, `days`, `Detected_Accuracy`, `Num_Of_Cam`, `Num_Of_Drone`, `Time`, `Location`, `Owner_ID`) VALUES
(1, 'A', 'bit.veh.ly7', 'Crossing mid-way lines', 314, '2022-02-05', 12, 100, 2, 3, '04:30:00', 'East Coast', 'PE010'),
(2, 'A', 'bit.veh.ly3', 'Improper lane use', 212, '2022-02-10', 7, 100, 3, 2, '02:00:00', 'West Coast', 'PE001'),
(3, 'A', 'bit.veh.ly4', 'Throwing garbage out.', 732, '2022-02-01', 16, 58, 2, 1, '07:23:00', 'West Coast', 'PE005'),
(4, 'A', 'bit.veh.ly8', 'Crossing mid-way lines', 314, '2022-02-03', 14, 74, 1, 2, '07:47:00', 'Bottom Town', 'PE011'),
(5, 'I', 'bit.veh.ly15', 'No helmet', 82, '2022-01-15', 33, 86, 4, 1, '08:19:02', 'Up Most Hill', 'PE020');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `Veh_ID` varchar(10) NOT NULL,
  `Veh_Type` varchar(20) NOT NULL,
  `Veh_Des` varchar(50) NOT NULL,
  `Veh_Link` varchar(20) NOT NULL,
  `Owner_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Veh_ID`, `Veh_Type`, `Veh_Des`, `Veh_Link`, `Owner_ID`) VALUES
('VE001', 'Van', 'Home usage', 'bit.veh.ly1', 'PE001'),
('VE002', 'Bike', 'Work and home usage', 'bit.veh.ly2', 'PE001'),
('VE003', 'Truck', 'Business', 'bit.veh.ly3', 'PE001'),
('VE004', 'Car', 'Home usage and Personal', 'bit.veh.ly4', 'PE005'),
('VE005', 'Bike', 'Personal usage', 'bit.veh.ly5', 'PE005'),
('VE006', 'Car', 'Home and work usage', 'bit.veh.ly6', 'PE007'),
('VE007', 'Bike', 'Delivery purposes', 'bit.veh.ly7', 'PE010'),
('VE008', 'Van', 'Business', 'bit.veh.ly8', 'PE011'),
('VE009', 'Van', 'Delivery purposes and personal', 'bit.veh.ly9', 'PE012'),
('VE010', 'Car', 'Taxi ', 'bit.veh.ly10', 'PE013'),
('VE011', 'Car', 'Personal usage', 'bit.veh.ly11', 'PE014'),
('VE012', 'Bike', 'Delivery purposes', 'bit.veh.ly12', 'PE015'),
('VE013', 'Truck', 'Business and delivery', 'bit.veh.ly13', 'PE017'),
('VE014', 'Car', 'Home usage and Personal', 'bit.veh.ly14', 'PE018'),
('VE015', 'Bike', 'Personal usage', 'bit.veh.ly15', 'PE020');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
