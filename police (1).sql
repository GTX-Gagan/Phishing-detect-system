-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 06:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `police`
--

-- --------------------------------------------------------

--
-- Table structure for table `citizen_commitee`
--

CREATE TABLE `citizen_commitee` (
  `Citizen_id` int(10) UNSIGNED NOT NULL,
  `Beat_no` varchar(45) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Father_name` varchar(45) DEFAULT NULL,
  `Citizen_type` varchar(45) DEFAULT NULL,
  `Area` varchar(45) DEFAULT NULL,
  `Age` varchar(45) DEFAULT NULL,
  `Religion` varchar(45) DEFAULT NULL,
  `Caste` varchar(45) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `State` varchar(45) DEFAULT NULL,
  `District` varchar(45) DEFAULT NULL,
  `Pincode` varchar(45) DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Station_id` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `citizen_commitee`
--

INSERT INTO `citizen_commitee` (`Citizen_id`, `Beat_no`, `Name`, `Father_name`, `Citizen_type`, `Area`, `Age`, `Religion`, `Caste`, `Address`, `State`, `District`, `Pincode`, `Phone`, `Email`, `Station_id`, `City`) VALUES
(26, '324', 'Raheem', 'Razak', 'Senior citizen', 'Kasaba', '34', 'Muslim', 'Abdul', 'Puttur', 'Karnataka', 'Dakshina Kannada', '546789', '3456789097', 'R@gmail.com', '12', 'Puttur'),
(27, '456', 'rr', 'va', 'Senior citizen', 'Bolar', '45', 'Hindu', 'Shetty', 'bolar', 'Karnataka', 'Dakshina Kannada', '654323', '4321234567', 'rr@gmail.com', '15', 'Mangalore'),
(28, '6', 'r', 'f', 'Select Any', 'Select Any', '3', 'Select Any', 'Select Any', 'fg', 'Select Any', 'Select Any', '7', '6734567898', 'f@gmail.com', '15', 'Select Any'),
(29, '555', 'd', 'gg', 'Senior citizen', 'Bolar', '19', 'Christian', 'Shetty', 'f', 'Gujraat', 'Hassan', '567897', '1234456789', 'v@gmail.com', '12', 'Puttur'),
(30, '555', 'd', 'gg', 'Senior citizen', 'Bolar', '19', 'Christian', 'Shetty', 'f', 'Gujraat', 'Hassan', '567897', '1234456789', 'v@gmail.com', '12', 'Puttur'),
(31, '456', 'Lohith', 'Lakshmish', 'Normal', 'Asaigoli', '29', 'Hindu', 'Shetty', 'Mangalore', 'Karnataka', 'Dakshina Kannada', '56789', '6544321122', 'L@gmail.com', '12', 'Mangalore'),
(32, '345', 'rag', 'raghu', 'Senior citizen', 'Bolar', '34', 'Muslim', 'Shetty', 'gfdhg\r\nmnvm,b', 'Gujraat', 'Dakshina Kannada', '654323', '7678909876', 'v@gmail.com', '13', 'Sulia'),
(33, '345', 'rf', 'rakjd', 'Senior citizen', 'Bolar', '56', 'Christian', 'Shetty', 'gs', 'Kerla', 'Udupi', '678907', '8753346789', 'v@gmail.com', '12', 'Puttur'),
(34, '345', 'raj', 'Ram', 'Senior citizen', 'Bolar', '35', 'Hindu', 'Shetty', 'Konaje ', 'Gujraat', 'Dakshina Kannada', '6545678', '1234567890', 'v@gmail.com', '12', 'Puttur'),
(35, '345', 'raj', 'Ram', 'Senior citizen', 'Bolar', '35', 'Hindu', 'Shetty', 'Konaje ', 'Gujraat', 'Dakshina Kannada', '6545678', '1234567890', 'v@gmail.com', '12', 'Puttur'),
(36, '345', 'raj', 'Ram', 'Senior citizen', 'Bolar', '35', 'Hindu', 'Shetty', 'Konaje ', 'Gujraat', 'Dakshina Kannada', '6545678', '1234567890', 'v@gmail.com', '12', 'Puttur'),
(37, '345', 'dfa', 'vfdb', 'Senior citizen', 'Bolar', '45', 'Hindu', 'Shetty', 'fvsd', 'Kerla', 'Udupi', '456543', '4534545454', 'v@gmail.com', '12', 'Mangalore');

-- --------------------------------------------------------

--
-- Table structure for table `crime_details`
--

CREATE TABLE `crime_details` (
  `Crime_details_id` int(10) UNSIGNED NOT NULL,
  `Fir_no` varchar(45) DEFAULT NULL,
  `District` varchar(45) DEFAULT NULL,
  `Subdivision` varchar(45) DEFAULT NULL,
  `Police_station_id` varchar(45) DEFAULT NULL,
  `Fir_date` varchar(45) DEFAULT NULL,
  `Act` varchar(45) DEFAULT NULL,
  `Section` varchar(45) DEFAULT NULL,
  `Place_of_occurance` varchar(45) DEFAULT NULL,
  `Witness` varchar(45) DEFAULT NULL,
  `Crime_Name` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `crime_details`
--

INSERT INTO `crime_details` (`Crime_details_id`, `Fir_no`, `District`, `Subdivision`, `Police_station_id`, `Fir_date`, `Act`, `Section`, `Place_of_occurance`, `Witness`, `Crime_Name`, `status`) VALUES
(4, '66', 'Dk', 'B', '12', '3/13/2019', 'gghh', 'jjjjj', 'Konaje', 'ggh', 'Kidnap', 'Approved'),
(5, '444', 'Udupi', 'A', '13', '3/13/2019', 'gioo', 'sdddr', 'State bank', 'arvii', 'missing case', 'Investigate'),
(6, '222', 'Udupi', 'A', '13', '3/13/2019', 'qwe', 'poiu', 'Konaje', 'wer', 'Murder', 'Investigate'),
(7, '222', 'Udupi', 'A', '15', '3/13/2019', 'qwe', 'poiu', 'Konaje', 'wer', 'Murder', 'Investigate'),
(8, '188', 'Dk', 'Mangalore South', '15', '1/6/2019', 'IPC 1860', '375', 'State bank', 'Rahul', 'Kidnap', 'Investigate'),
(9, '188', 'Dakshina Kannada', 'Uppinangadi Sub div', '16', '2/24/2019', 'IPC 1860', '375', 'State bank', 'Ramesh', 'Kidnap', 'Investigate'),
(10, '1', 'Select Any', 'Select Any', '12', '2019-03-22', 's', '2', 'Select Any', 'd', 'd', 'Investigate'),
(11, '3', 'Select Any', 'Select Any', '12', '2019-03-05', 'f', '4', 'Select Any', 'gf', 'f', 'Investigate'),
(12, '3', 'Select Any', 'Select Any', '13', '2019-03-04', 'f', '4', 'Select Any', 'gf', 'f', 'Investigate'),
(13, '5', 'Select Any', 'Select Any', '16', '2019-03-04', 'f', '4', 'Select Any', 'd', 'd', 'Investigate'),
(14, '34', 'Dk', 'Uppinangadi Sub div', '15', '03-03-2019', 'IPC 375', '340', 'State bank', 'RAKSHAK', 'Murder', 'Investigate'),
(15, '7777', 'Hassan', 'Uppinangadi Sub div', '13', '10-03-2019', 'nbn', 'bvb', 'State bank', 'nbv', 'Murder', 'Investigate'),
(16, '8888', 'Hassan', 'Uppinangadi Sub div', '12', '10-03-2019', 'nbn', 'bvb', 'State bank', 'nbv', 'Murder', 'Investigate'),
(17, '999', 'Hassan', 'Uppinangadi Sub div', '15', '10-03-2019', 'nbn', 'bvb', 'State bank', 'nbv', 'Murder', 'Investigate'),
(18, '909', 'Dk', 'Uppinangadi Sub div', '13', '11-03-2019', 'vn', 'j', 'State bank', 'vjh', 'jh', 'Investigate'),
(19, '1000', 'Dk', 'Uppinangadi Sub div', '16', '11-03-2019', 'cxcx', 'df', 'State bank', 'dfas', 'cczv', 'Investigate'),
(20, '123', 'Hassan', 'Mangalore South', '15', '04-03-2019', '54', 'vh', 'State bank', 'cxvf', 'fdg', 'pending'),
(21, '12', 'zfdfb', 'zbdb', '12', '2024-02-12', 'zsfvdfv', 'dbdsb', 'dscas', 'dfbdfb', 'egwegwg', 'Investigate');

-- --------------------------------------------------------

--
-- Table structure for table `duty_board`
--

CREATE TABLE `duty_board` (
  `duty_board_id` int(10) UNSIGNED NOT NULL,
  `Police_id` varchar(45) NOT NULL,
  `District` varchar(45) DEFAULT NULL,
  `Unit_type` varchar(45) DEFAULT NULL,
  `From_date` varchar(45) DEFAULT NULL,
  `To_date` varchar(45) DEFAULT NULL,
  `Place` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `duty_board`
--

INSERT INTO `duty_board` (`duty_board_id`, `Police_id`, `District`, `Unit_type`, `From_date`, `To_date`, `Place`) VALUES
(33, '17', 'Dakshina kannada', 'Puttur', '2018-12-31', '2022-06-15', 'Bantwal'),
(34, '19', 'Dakshina kannada', 'Manglore', '2023-11-01', '2024-12-07', 'Puttur'),
(35, '37', 'Dakshina kannada', 'kudla', '2023-03-30', '2025-05-08', 'Ullal');

-- --------------------------------------------------------

--
-- Table structure for table `endrosement`
--

CREATE TABLE `endrosement` (
  `endrosement_id` int(10) UNSIGNED NOT NULL,
  `Petition_register_id` int(10) UNSIGNED DEFAULT NULL,
  `Date` varchar(45) DEFAULT NULL,
  `Reason` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petition_endrosement`
--

CREATE TABLE `petition_endrosement` (
  `Endrosement_id` int(10) UNSIGNED NOT NULL,
  `District` varchar(45) NOT NULL,
  `Unit_type` varchar(45) DEFAULT NULL,
  `Units` varchar(45) DEFAULT NULL,
  `Petition_type` varchar(45) DEFAULT NULL,
  `Classification` varchar(45) DEFAULT NULL,
  `Reference_no` varchar(45) DEFAULT NULL,
  `Action_status` varchar(45) DEFAULT NULL,
  `Date_of_receipt` varchar(45) DEFAULT NULL,
  `Petition_register_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `petition_endrosement`
--

INSERT INTO `petition_endrosement` (`Endrosement_id`, `District`, `Unit_type`, `Units`, `Petition_type`, `Classification`, `Reference_no`, `Action_status`, `Date_of_receipt`, `Petition_register_id`) VALUES
(1, 'dakshina kannada', 'A', 'puttur', '1', 'sgth', '8888', 'arrest', '3/5/2019', '1'),
(2, 'Hasana', 'D', 'puttur', '1', 'dfg', '667', 'arrest', '3/12/2019', '1'),
(3, 'dakshina kannada', 'A', 'poiutr', '1', 'xxxxxxx', '667', 'arrest', '3/26/2019', '1');

-- --------------------------------------------------------

--
-- Table structure for table `petition_register`
--

CREATE TABLE `petition_register` (
  `Petition_register_id` int(10) UNSIGNED NOT NULL,
  `Petition_type` varchar(45) NOT NULL,
  `Reference_number` varchar(45) DEFAULT NULL,
  `Classification` varchar(45) DEFAULT NULL,
  `Date_of_receipt` varchar(45) DEFAULT NULL,
  `Facts_of_petition` varchar(45) DEFAULT NULL,
  `Sent_to_district` varchar(45) DEFAULT NULL,
  `Sent_to_unit` varchar(45) DEFAULT NULL,
  `Petitioner_name` varchar(45) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `Street` varchar(45) DEFAULT NULL,
  `Father_name` varchar(45) DEFAULT NULL,
  `Area` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `petition_register`
--

INSERT INTO `petition_register` (`Petition_register_id`, `Petition_type`, `Reference_number`, `Classification`, `Date_of_receipt`, `Facts_of_petition`, `Sent_to_district`, `Sent_to_unit`, `Petitioner_name`, `Address`, `Street`, `Father_name`, `Area`, `Status`) VALUES
(49, 'Chain Snatching', '567', 'Higher Current', '04-12-2018', 'Lost of chain', 'Dakshina Kannada', 'Mangalore Rural Ps', 'Radha', 'Mangalore', 'Asaigoli', 'Ramakanth', 'Konaje', 'Rejected'),
(50, 'Mobile Phone Lost', '4356', 'Lower Current', '06-02-2019', 'Lost of Phone', 'Dakshina Kannada', 'Mangalore Rural Ps', 'Rohan', 'Mangalore', 'kavoor', 'Ramesh', 'Urwa', 'Completed'),
(51, 'Harrasment', '667', 'Lower Current', '03-02-2019', 'Mentally tortured ', 'Dakshina Kannada', 'Mangalore Rural Ps', 'Sujatha', 'mangalore', 'Mangalore', 'Suresh', 'Konaje', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `police_details`
--

CREATE TABLE `police_details` (
  `Police_id` int(10) UNSIGNED NOT NULL,
  `Station_id` varchar(45) DEFAULT NULL,
  `Designation` varchar(45) DEFAULT NULL,
  `Gender` varchar(45) DEFAULT NULL,
  `Date_of_birth` varchar(45) DEFAULT NULL,
  `Police_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `police_details`
--

INSERT INTO `police_details` (`Police_id`, `Station_id`, `Designation`, `Gender`, `Date_of_birth`, `Police_name`) VALUES
(17, '12', 'Commissioner of Police', 'Female', '2024-01-06', 'Sandeep Patilll'),
(18, '13', 'ACP', 'Male', '2024-01-12', 'Hanumantharaya'),
(19, '15', 'DCP', 'Female', '2024-01-05', 'Uma Prashanth'),
(33, '12', 'Select Any', 'Male', '3/22/2019', 'hm'),
(34, '12', 'Select Any', 'Female', '3/28/2019', 'sad'),
(35, '12', 'Commissioner of Police', 'Female', '2019-03-04', 'h'),
(36, '12', 'Commissioner of Police', 'Female', '1990-01-29', 'h'),
(37, '12', 'DCP', 'Male', '30-01-1990', 'Rohan'),
(40, '12', 'DSP', 'Female', '2024-01-05', 'Royston');

-- --------------------------------------------------------

--
-- Table structure for table `public_service`
--

CREATE TABLE `public_service` (
  `Public_service_id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Contact_no` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `public_service`
--

INSERT INTO `public_service` (`Public_service_id`, `Name`, `Contact_no`) VALUES
(4, 'ambulance', '108'),
(6, 'Paramedics', '7890876543'),
(7, 'Fire brigade', '1234566777');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Reg_id` int(10) UNSIGNED NOT NULL,
  `User_name` varchar(45) DEFAULT NULL,
  `Password` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `User_type` varchar(45) DEFAULT NULL,
  `Email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Reg_id`, `User_name`, `Password`, `User_type`, `Email`, `Phone`) VALUES
(42, 'royston', '1234', 'Admin', 'admin@gmail.com', '1234567890'),
(43, 'joshwa', '34', 'Police', 'joshwa@gmail.com', '0987654321'),
(44, 'allennn', '1111', 'Police', 'test@gmail.com', '1234567896');

-- --------------------------------------------------------

--
-- Table structure for table `station_details`
--

CREATE TABLE `station_details` (
  `Station_id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `Area` varchar(45) DEFAULT NULL,
  `Type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `station_details`
--

INSERT INTO `station_details` (`Station_id`, `Name`, `City`, `Area`, `Type`) VALUES
(12, 'Puttur', 'Puttur', 'Puttur Town', 'Local police'),
(13, 'Uppinangadi', 'Uppinangadi', 'Kasaba', 'Local police'),
(15, 'Bellare', 'Sullia', 'Sullia', 'Local police'),
(16, 'Bantwal', 'Bantwal', 'Bc road', 'Local police');

-- --------------------------------------------------------

--
-- Table structure for table `victim_details`
--

CREATE TABLE `victim_details` (
  `Victim_details_id` int(10) UNSIGNED NOT NULL,
  `is_police` varchar(45) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `type_of_injury` varchar(45) DEFAULT NULL,
  `nationality` varchar(45) DEFAULT NULL,
  `mean` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `victim_details`
--

INSERT INTO `victim_details` (`Victim_details_id`, `is_police`, `type`, `type_of_injury`, `nationality`, `mean`, `state`, `city`, `area`, `gender`) VALUES
(5, 'yes', 'Identified', 'Murder', 'Indian', 'Knife', 'Karnataka', 'Mangalore', 'Konaje', 'male'),
(6, 'yes', 'Identified', 'Murder', 'Indian', 'Pistol', 'Kerala', 'ThokkotThalapady', 'Konaje', 'female'),
(7, 'no', 'Unidentified', 'Murder', 'Indian', 'Knife', 'Karnataka', 'Mangalore', 'Konaje', 'female'),
(8, 'no', 'Unidentified', 'Murder', 'Indian', 'Knife', 'Karnataka', 'Mangalore', 'Konaje', 'female'),
(9, 'yes', 'Identified', 'Murder', 'Indian', 'knife', 'karnataka', 'kudla', 'manglore', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `vip_tour_details`
--

CREATE TABLE `vip_tour_details` (
  `Vip_tour_details_id` int(10) UNSIGNED NOT NULL,
  `Vip_name` varchar(45) NOT NULL,
  `Proposed_date_of_departure` varchar(45) DEFAULT NULL,
  `Arrival_unit` varchar(45) DEFAULT NULL,
  `Place_of_arrival` varchar(45) DEFAULT NULL,
  `Date_of_arrival` varchar(45) DEFAULT NULL,
  `Visiting_places` varchar(45) DEFAULT NULL,
  `Mode_of_journey` varchar(45) DEFAULT NULL,
  `Type_of_security` varchar(45) DEFAULT NULL,
  `Station_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vip_tour_details`
--

INSERT INTO `vip_tour_details` (`Vip_tour_details_id`, `Vip_name`, `Proposed_date_of_departure`, `Arrival_unit`, `Place_of_arrival`, `Date_of_arrival`, `Visiting_places`, `Mode_of_journey`, `Type_of_security`, `Station_id`) VALUES
(9, 'Jagadish Shetter', '2/19/2019', 'sdadfds', 'Mangalore Airport', '2/15/2019', 'Neharu Maidan', 'Road', 'ad', '12'),
(10, 'Darshan', '01-03-2019', 'Uppinagadi ps', 'Manglore Airport', '01-03-2019', 'Temple', 'road', 'x', '13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citizen_commitee`
--
ALTER TABLE `citizen_commitee`
  ADD PRIMARY KEY (`Citizen_id`);

--
-- Indexes for table `crime_details`
--
ALTER TABLE `crime_details`
  ADD PRIMARY KEY (`Crime_details_id`);

--
-- Indexes for table `duty_board`
--
ALTER TABLE `duty_board`
  ADD PRIMARY KEY (`duty_board_id`);

--
-- Indexes for table `endrosement`
--
ALTER TABLE `endrosement`
  ADD PRIMARY KEY (`endrosement_id`);

--
-- Indexes for table `petition_endrosement`
--
ALTER TABLE `petition_endrosement`
  ADD PRIMARY KEY (`Endrosement_id`);

--
-- Indexes for table `petition_register`
--
ALTER TABLE `petition_register`
  ADD PRIMARY KEY (`Petition_register_id`);

--
-- Indexes for table `police_details`
--
ALTER TABLE `police_details`
  ADD PRIMARY KEY (`Police_id`);

--
-- Indexes for table `public_service`
--
ALTER TABLE `public_service`
  ADD PRIMARY KEY (`Public_service_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Reg_id`);

--
-- Indexes for table `station_details`
--
ALTER TABLE `station_details`
  ADD PRIMARY KEY (`Station_id`);

--
-- Indexes for table `victim_details`
--
ALTER TABLE `victim_details`
  ADD PRIMARY KEY (`Victim_details_id`);

--
-- Indexes for table `vip_tour_details`
--
ALTER TABLE `vip_tour_details`
  ADD PRIMARY KEY (`Vip_tour_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citizen_commitee`
--
ALTER TABLE `citizen_commitee`
  MODIFY `Citizen_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `crime_details`
--
ALTER TABLE `crime_details`
  MODIFY `Crime_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `duty_board`
--
ALTER TABLE `duty_board`
  MODIFY `duty_board_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `endrosement`
--
ALTER TABLE `endrosement`
  MODIFY `endrosement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petition_endrosement`
--
ALTER TABLE `petition_endrosement`
  MODIFY `Endrosement_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petition_register`
--
ALTER TABLE `petition_register`
  MODIFY `Petition_register_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `police_details`
--
ALTER TABLE `police_details`
  MODIFY `Police_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `public_service`
--
ALTER TABLE `public_service`
  MODIFY `Public_service_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `Reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `station_details`
--
ALTER TABLE `station_details`
  MODIFY `Station_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `victim_details`
--
ALTER TABLE `victim_details`
  MODIFY `Victim_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vip_tour_details`
--
ALTER TABLE `vip_tour_details`
  MODIFY `Vip_tour_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
