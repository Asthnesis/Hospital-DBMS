-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 09:03 PM
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
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `service` double NOT NULL,
  `appointment` double NOT NULL,
  `consultation` double NOT NULL,
  `laboratory` double NOT NULL,
  `medications` double NOT NULL,
  `room` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `service`, `appointment`, `consultation`, `laboratory`, `medications`, `room`) VALUES
(1000, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `progress` varchar(255) NOT NULL,
  `referral` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `medicinename` varchar(255) NOT NULL,
  `dosage` varchar(20) NOT NULL,
  `Frequency` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `duration`, `progress`, `referral`, `date`, `medicinename`, `dosage`, `Frequency`, `notes`) VALUES
(1000, '3 weeks', '', 'N/A', '2023-07-23', 'Amoxilin', '3 tablets', 'Thrice a day', 'Patient should avoid cold drinks and cold weather'),
(1001, '', '', '', '2023-07-23', '', '', '', ''),
(1002, '', '', '', '2023-07-23', '', '', '', ''),
(1003, '', '', '', '2023-07-23', '', '', '', ''),
(1004, '', '', '', '2023-07-23', '', '', '', ''),
(1005, '', '', '', '2023-07-23', '', '', '', ''),
(1006, '', '', '', '2023-07-23', '', '', '', ''),
(1007, '', '', '', '2023-07-24', '', '', '', ''),
(1008, '', '', '', '2023-07-24', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('Admin', '12345'),
('Doctor A', 'Doctor_1'),
('D-1234', 'D1234'),
('R-1234', 'R1234'),
('N-1234', 'N1234');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `allergies` varchar(255) NOT NULL,
  `bloodpressure` varchar(255) NOT NULL,
  `temperature` double NOT NULL,
  `height` double NOT NULL,
  `weight` double NOT NULL,
  `observations` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `allergies`, `bloodpressure`, `temperature`, `height`, `weight`, `observations`) VALUES
(1000, 'Penicilina and fexofenadine', '118/78', 36.5, 178, 72, 'The patient appears fine and okay'),
(1001, 'Penicillin', '130/85', 37.5, 165, 68, 'Patient has a known allergy to penicillin. Blood pressure and temperature are within normal range.'),
(1002, 'Sulfa Drugs', '140/90', 37.2, 178, 72, 'Blood pressure is slightly elevated, and the patient is advised to monitor it regularly'),
(1003, 'None', '120/80', 37, 180, 82, ' Patient appears to be in good health with no notable concerns.'),
(1004, 'None', '118/75', 37.1, 179, 61, ' Patient is in good health, with normal blood pressure and temperature'),
(1005, 'Penicillin', '140/90', 38, 135, 46, 'High fever and coughing suggesting presence of common cold'),
(1006, 'Aspirin', '110/70', 37, 162, 54, 'Routine checkup. Blood pressure and temperature are within normal range. Patient appears to be in good health'),
(1007, '', '', 0, 0, 0, ''),
(1008, '', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adm` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `diagnostics` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `adm`, `age`, `phone`, `diagnostics`) VALUES
(1, 'Anthony Kimani', 'T12345', 26, '0740404000', 'Common cold'),
(3, 'Christine Nyabuto', 'T12346', 23, '0710203040', 'Ulcers'),
(68, 'John Kinuthia', 'T1234578', 18, '0701020304', 'Cancer');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nok` varchar(255) NOT NULL,
  `nok_phone` varchar(20) NOT NULL,
  `hospbill` float NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`id`, `name`, `age`, `gender`, `phone`, `address`, `nok`, `nok_phone`, `hospbill`, `doctor`, `ward`) VALUES
(1000, 'Anthony Kimani', 26, 'Male', '0740404000', 'Ruiru', 'Grace Kimani', '0701020304', 60000, 'Dr Rupani', ''),
(1001, 'Elizabeth Chepkoskei', 26, 'Female', '0743852662', 'Bypass', 'Christine Adhiambo', '07374723532', 60, 'Dr Evans', ''),
(1002, 'Evanson Oburu', 26, 'Male', '0740404000', 'Juja', 'Mary Atieno', '0723456778', 60, 'Dr Ngugi', ''),
(1003, 'Christine Nyabuto', 23, 'Female', '0700123456', 'Ruiru', 'Triza Onkora', '0798765431', 2000, 'Dr Miriam', ''),
(1004, 'Alex Obaire', 23, 'Male', '0700123456', 'Juja', 'Josephine Simiyu', '07981287332', 2000, 'Dr Miriam', 'M21'),
(1005, 'Bramuel Bless', 15, 'Male', 'N/A', 'Ngara', 'Edmond Wafula', '0747258295', 300, 'Dr Joy', ''),
(1006, 'Mercy Kivutha', 46, 'Female', '07362878282', 'Juja', 'John Bahati', '0763276573', 0, 'Dr Ngugi S', 'N/A'),
(1007, 'Mark Murima', 36, 'Male', '0792847499', 'Mangu', 'Jack Murima', '0745678930', 0, 'Dr Esther', 'N/A'),
(1008, 'Josephine Magu', 0, 'Female', '0701022344', 'Ruiru', '123747hh', '07mcxknjnbjg', 0, 'Isaack', 'N/A');

--
-- Triggers `receptionist`
--
DELIMITER $$
CREATE TRIGGER `after_receptionist_insert` AFTER INSERT ON `receptionist` FOR EACH ROW BEGIN
    INSERT INTO doctor (ID) VALUES (NEW.ID);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`id`) REFERENCES `receptionist` (`id`),
  ADD CONSTRAINT `fk_receptionist_id` FOREIGN KEY (`id`) REFERENCES `receptionist` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`id`) REFERENCES `receptionist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
