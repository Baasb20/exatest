-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 11:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoen`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `artikel` varchar(250) NOT NULL,
  `prijs` decimal(60,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `artikel`, `prijs`) VALUES
(1, 'Nike', '12'),
(2, 'Adidas', '23'),
(3, 'NotNike', '13'),
(4, 'NotAdidas', '45'),
(5, 'WalmartNike', '0');

-- --------------------------------------------------------

--
-- Table structure for table `bar`
--

CREATE TABLE `bar` (
  `id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `totaal` decimal(5,2) DEFAULT NULL,
  `drank_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bar`
--

INSERT INTO `bar` (`id`, `aantal`, `totaal`, `drank_id`) VALUES
(1, 3, '6.00', 3),
(2, 4, '8.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bestelling`
--

CREATE TABLE `bestelling` (
  `id` int(11) NOT NULL,
  `aantal` varchar(250) NOT NULL,
  `afgehaald` varchar(250) NOT NULL,
  `datum` date DEFAULT NULL,
  `klant_id` int(11) NOT NULL,
  `artikel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bestelling`
--

INSERT INTO `bestelling` (`id`, `aantal`, `afgehaald`, `datum`, `klant_id`, `artikel_id`) VALUES
(1, '1', 'ja', '2021-04-14', 2, 2),
(2, '1', 'nee', '2021-04-14', 3, 1),
(3, '1', 'nee', '2021-04-14', 2, 4),
(4, '2', 'ja', '2021-04-14', 2, 3),
(5, '1', 'ja', '2021-04-21', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `drank`
--

CREATE TABLE `drank` (
  `id` int(11) NOT NULL,
  `dranknaam` varchar(250) NOT NULL,
  `prijs` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drank`
--

INSERT INTO `drank` (`id`, `dranknaam`, `prijs`) VALUES
(1, 'Cola', '3.00'),
(2, 'Fanta', '2.00'),
(3, 'Sprite', '2.00'),
(4, 'Pepsi', '0.69'),
(5, 'Water', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `eten`
--

CREATE TABLE `eten` (
  `id` int(11) NOT NULL,
  `etennaam` varchar(250) NOT NULL,
  `prijs` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eten`
--

INSERT INTO `eten` (`id`, `etennaam`, `prijs`) VALUES
(1, 'Pizza', '12.12'),
(2, 'Hamburger', '10.00'),
(3, 'Rijst', '16.00'),
(4, 'Spaghetti', '15.00'),
(5, 'Shoarma', '14.00');

-- --------------------------------------------------------

--
-- Table structure for table `factuur`
--

CREATE TABLE `factuur` (
  `id` int(11) NOT NULL,
  `factuurdatum` date NOT NULL,
  `klant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keuken`
--

CREATE TABLE `keuken` (
  `id` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `totaal` decimal(5,2) DEFAULT NULL,
  `eten_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuken`
--

INSERT INTO `keuken` (`id`, `aantal`, `totaal`, `eten_id`) VALUES
(1, 3, '36.00', 1),
(2, 2, '32.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `id` int(11) NOT NULL,
  `voorletters` varchar(250) NOT NULL,
  `tussenvoegsel` varchar(250) DEFAULT NULL,
  `achternaam` varchar(250) NOT NULL,
  `adres` varchar(250) NOT NULL,
  `postcode` varchar(250) NOT NULL,
  `woonplaats` varchar(250) NOT NULL,
  `geboortedatum` date DEFAULT NULL,
  `gebruikersnaam` varchar(250) NOT NULL,
  `wachtwoord` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`id`, `voorletters`, `tussenvoegsel`, `achternaam`, `adres`, `postcode`, `woonplaats`, `geboortedatum`, `gebruikersnaam`, `wachtwoord`) VALUES
(2, 'l', 'l', 'l', 'q', '1234AB', 'l', '0000-00-00', 'N123', '$2y$10$gtxzKrOCeF4VBTDvnIkBFuCDZ3r8Pbd3uZrU.1x8NOmUmfLqLaTvS'),
(3, 't', '', 'ttt', 'ttt', 'ttt', 'ttt', '0000-00-00', 'tom', '$2y$10$LbhRUp6sE8pWYDeoAGzDD.Y9UTga22XuMp5duVCIH030D5OdscGNi');

-- --------------------------------------------------------

--
-- Table structure for table `medewerker`
--

CREATE TABLE `medewerker` (
  `id` int(11) NOT NULL,
  `gebruikersnaam` varchar(250) NOT NULL,
  `wachtwoord` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medewerker`
--

INSERT INTO `medewerker` (`id`, `gebruikersnaam`, `wachtwoord`) VALUES
(1, 'admin', '$2y$10$dwE5nC7SQ555ePNdKuvT0.xoLny4OeFnroNEdl7zjB5gqlXvRAM8q'),
(2, 'Don', '$2y$10$dwE5nC7SQ555ePNdKuvT0.xoLny4OeFnroNEdl7zjB5gqlXvRAM8q'),
(3, 'Ben', '$2y$10$dwE5nC7SQ555ePNdKuvT0.xoLny4OeFnroNEdl7zjB5gqlXvRAM8q');

-- --------------------------------------------------------

--
-- Table structure for table `tafel`
--

CREATE TABLE `tafel` (
  `id` int(11) NOT NULL,
  `tafelnummer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tafel`
--

INSERT INTO `tafel` (`id`, `tafelnummer`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7');

-- --------------------------------------------------------

--
-- Table structure for table `winkel`
--

CREATE TABLE `winkel` (
  `id` int(11) NOT NULL,
  `winkelnaam` varchar(250) NOT NULL,
  `winkeladres` varchar(250) NOT NULL,
  `winkelpostcode` varchar(250) NOT NULL,
  `vestigingsplaats` varchar(250) NOT NULL,
  `telefoonnummer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `winkel`
--

INSERT INTO `winkel` (`id`, `winkelnaam`, `winkeladres`, `winkelpostcode`, `vestigingsplaats`, `telefoonnummer`) VALUES
(1, 't', 't', 't', 'amsterdam', '061111'),
(2, 'a', 'a', 'a', 'den haag', '061111111'),
(3, 'b', 'b', 'b', 'rotterdam', '06111112'),
(4, 'ee', 'e', 'e', 'Utrecht', '06222222'),
(5, 'j', 'j', 'j', 'amsterdam', '0777777');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bar`
--
ALTER TABLE `bar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drank_id` (`drank_id`);

--
-- Indexes for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klant_id` (`klant_id`),
  ADD KEY `artikel_id` (`artikel_id`);

--
-- Indexes for table `drank`
--
ALTER TABLE `drank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eten`
--
ALTER TABLE `eten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klant_id` (`klant_id`);

--
-- Indexes for table `keuken`
--
ALTER TABLE `keuken`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eten_id` (`eten_id`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tafel`
--
ALTER TABLE `tafel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winkel`
--
ALTER TABLE `winkel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bar`
--
ALTER TABLE `bar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drank`
--
ALTER TABLE `drank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eten`
--
ALTER TABLE `eten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `factuur`
--
ALTER TABLE `factuur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keuken`
--
ALTER TABLE `keuken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tafel`
--
ALTER TABLE `tafel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `winkel`
--
ALTER TABLE `winkel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bar`
--
ALTER TABLE `bar`
  ADD CONSTRAINT `bar_ibfk_1` FOREIGN KEY (`drank_id`) REFERENCES `drank` (`id`);

--
-- Constraints for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `bestelling_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`id`),
  ADD CONSTRAINT `bestelling_ibfk_2` FOREIGN KEY (`artikel_id`) REFERENCES `artikel` (`id`);

--
-- Constraints for table `factuur`
--
ALTER TABLE `factuur`
  ADD CONSTRAINT `factuur_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `klant` (`id`);

--
-- Constraints for table `keuken`
--
ALTER TABLE `keuken`
  ADD CONSTRAINT `keuken_ibfk_1` FOREIGN KEY (`eten_id`) REFERENCES `eten` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
