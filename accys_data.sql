-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 04 mai 2021 à 01:54
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `accys_data`
--

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `employeeID` varchar(5) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phoneNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `manager`
--

CREATE TABLE `manager` (
  `managerID` varchar(5) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phoneNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `printer`
--

CREATE TABLE `printer` (
  `printerID` varchar(5) NOT NULL,
  `printerModel` varchar(60) NOT NULL,
  `printerBrand` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rma`
--

CREATE TABLE `rma` (
  `rmaID` varchar(5) NOT NULL,
  `productID` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `rmaReason` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `toner`
--

CREATE TABLE `toner` (
  `tonerID` varchar(5) NOT NULL,
  `tonerModel` varchar(60) NOT NULL,
  `tonerBrand` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`);

--
-- Index pour la table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`managerID`);

--
-- Index pour la table `printer`
--
ALTER TABLE `printer`
  ADD PRIMARY KEY (`printerID`);

--
-- Index pour la table `rma`
--
ALTER TABLE `rma`
  ADD PRIMARY KEY (`rmaID`),
  ADD KEY `productID` (`productID`);

--
-- Index pour la table `toner`
--
ALTER TABLE `toner`
  ADD PRIMARY KEY (`tonerID`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rma`
--
ALTER TABLE `rma`
  ADD CONSTRAINT `rma_product_fk` FOREIGN KEY (`productID`) REFERENCES `printer` (`printerID`),
  ADD CONSTRAINT `rma_product_fk2` FOREIGN KEY (`productID`) REFERENCES `toner` (`tonerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
