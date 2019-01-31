-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 31 Janvier 2019 à 18:39
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `annuairebdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `A_ID` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `A_NumVoie` int(3) NOT NULL,
  `A_NomVoie` varchar(100) NOT NULL,
  `A_ComplementAdresse` varchar(250) NOT NULL,
  `A_Ville` varchar(50) NOT NULL,
  `A_CodePostal` varchar(5) NOT NULL,
  `A_PaysID` int(2) NOT NULL,
  PRIMARY KEY (`A_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`A_ID`, `A_NumVoie`, `A_NomVoie`, `A_ComplementAdresse`, `A_Ville`, `A_CodePostal`, `A_PaysID`) VALUES
(1, 2, 'Rue du Corocodille', '', 'Bordeaux', '33800', 1),
(2, 13, 'Avenue Pierre', 'Residence Jean Bat 3 Appt 6', 'Bordeaux', '33800', 1),
(3, 4, 'Rue régis', 'Résidence Fleurot Batiment 2 Appartement 5', 'BClichy', '92000', 1),
(4, 3, 'Impasse Jean-pierre', '', 'Nantes', '44200', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `C_ID` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `C_Nom` varchar(20) NOT NULL,
  `C_Prenom` varchar(20) NOT NULL,
  `C_DateNais` date NOT NULL,
  `C_AdresseID` int(3) DEFAULT NULL,
  `C_Societe` varchar(20) DEFAULT NULL,
  `C_Commentaire` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`C_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`C_ID`, `C_Nom`, `C_Prenom`, `C_DateNais`, `C_AdresseID`, `C_Societe`, `C_Commentaire`) VALUES
(1, 'Boby', 'Billy', '2000-12-01', 1, 'Subway', 'je l''aime pas'),
(2, 'Smith', 'Tara', '1997-03-14', 2, 'Sfr', 'ma soeur'),
(3, 'Dupont', 'John', '1996-03-05', 3, 'Decathlon', 'ami de Tara'),
(4, 'Laffite', 'Chloe', '1994-07-22', 4, 'Mcdo', 'collègue de boulot');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `P_ID` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `P_Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`P_ID`, `P_Nom`) VALUES
(1, 'France'),
(2, 'Allemagne'),
(3, 'Espagne'),
(4, 'Italie'),
(5, 'Portugal'),
(6, 'Autriche'),
(7, 'Belgique'),
(8, 'Suisse'),
(9, 'Royaume-Uni'),
(10, 'Pays-Bas'),
(11, 'Irlande'),
(12, 'Finlande'),
(13, 'Suède'),
(14, 'Danemark'),
(15, 'USA'),
(16, 'Canada'),
(17, 'Russie'),
(18, 'Chine'),
(19, 'Japon');

-- --------------------------------------------------------

--
-- Structure de la table `telephone`
--

CREATE TABLE IF NOT EXISTS `telephone` (
  `T_numero` varchar(10) NOT NULL,
  `T_TypeTelID` int(3) NOT NULL,
  `T_ContactID` int(3) NOT NULL,
  PRIMARY KEY (`T_numero`,`T_TypeTelID`,`T_ContactID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `telephone`
--

INSERT INTO `telephone` (`T_numero`, `T_TypeTelID`, `T_ContactID`) VALUES
('0467789978', 1, 1),
('0556725388', 1, 4),
('0657321309', 2, 1),
('0664372437', 4, 2),
('0666666666', 4, 3),
('0689438549', 3, 1),
('0690802902', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_telephone`
--

CREATE TABLE IF NOT EXISTS `type_telephone` (
  `TY_ID` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `TY_TYPETEL` varchar(25) NOT NULL,
  PRIMARY KEY (`TY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `type_telephone`
--

INSERT INTO `type_telephone` (`TY_ID`, `TY_TYPETEL`) VALUES
(1, 'Fixe'),
(2, 'Portable'),
(3, 'Fax'),
(4, 'Personnel');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
