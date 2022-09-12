-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 12, 2022 at 06:22 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etnoserbiabooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Date` date NOT NULL,
  `UserID` bigint(20) NOT NULL,
  `VacationID` bigint(20) NOT NULL,
  `DateFrom` date NOT NULL,
  `DateTo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Date`, `UserID`, `VacationID`, `DateFrom`, `DateTo`) VALUES
('2022-09-12', 1, 2, '2022-09-28', '2022-10-07'),
('2022-09-12', 1, 3, '2022-09-25', '2022-10-05'),
('2022-09-12', 1, 4, '2022-09-14', '2022-09-29'),
('2022-09-12', 1, 6, '2022-09-18', '2022-09-28'),
('2022-09-12', 8, 1, '2022-09-27', '2022-09-30'),
('2022-09-12', 8, 3, '2022-09-27', '2022-10-08'),
('2022-09-12', 8, 4, '2022-09-22', '2022-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `ID` bigint(20) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`FirstName`, `LastName`, `Password`, `ID`, `Email`) VALUES
('Admin', 'Admin', 'admin', 1, 'admin@admin.com'),
('Nemanja', 'Zajic', 'Dunje99', 2, 'zakizaja@gmail.com'),
('Nesto', 'Neko', 'fdsfjsdlkfslkd', 3, 'zakizaja@hotmail.com'),
('gdfgdfgd', 'dfgdfgdf', 'gdfgdrgdfg', 8, 'dasda@fdff');

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

CREATE TABLE `vacation` (
  `ID` bigint(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Price` decimal(6,2) NOT NULL,
  `Place` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacation`
--

INSERT INTO `vacation` (`ID`, `Name`, `Description`, `Price`, `Place`) VALUES
(1, 'Meandri Uvca', 'Reka Uvac protice izmedju planine Zlatar i Zlatibor', '1000.00', 'Bajina Basta'),
(2, 'Gostoljublje', 'Gostoljublje nalazi se u Kosjeriću i nudi smeštaj sa restoranom, sezonskim bazenom na otvorenom', '999.00', 'Kosjeric'),
(3, 'Moravski Konaci', 'Moravski Konaci nalazi se u Velikoj Plani i poseduje restoran, sezonski bazen na otvorenom i bar', '1200.00', 'Velika Plana'),
(4, 'Sirogojno', 'Sirogojno je udaljeno 26 km od Zlatibora. Poznato je po muzeju pod otvorenim nebom “Staro selo” ', '2000.00', 'Zlatibor'),
(5, 'Stanisici', 'Spa centar raspolaže sa bazenom na otvorenom, hidromasažnom kadom, saunom i fitnes zonom, a nudi opu', '1500.00', 'Bjeljina'),
(6, 'Trsic', 'Nastalo je u želji da se oživi uspomena na Vuka Karadžića i sačuva duh vremena', '1200.00', 'Loznica');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Date`,`UserID`,`VacationID`),
  ADD KEY `id_user` (`UserID`),
  ADD KEY `id_vacation` (`VacationID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `ID` (`ID`),
  ADD KEY `Email_2` (`Email`);

--
-- Indexes for table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vacation`
--
ALTER TABLE `vacation`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `id_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_vacation` FOREIGN KEY (`VacationID`) REFERENCES `vacation` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
