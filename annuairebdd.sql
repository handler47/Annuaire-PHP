-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 20 Janvier 2019 à 17:19
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`A_ID`, `A_NumVoie`, `A_NomVoie`, `A_ComplementAdresse`, `A_Ville`, `A_CodePostal`, `A_PaysID`) VALUES
(1, 2, 'Rue du Corocodille', '', 'Bordeaux', '33800', 1),
(2, 13, 'Avenue Pierre', 'Residence Jean Bat 3 Appt 6', 'Bordeaux', '33800', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`C_ID`, `C_Nom`, `C_Prenom`, `C_DateNais`, `C_AdresseID`, `C_Societe`, `C_Commentaire`) VALUES
(1, 'Boby', 'Billy', '2000-12-01', 1, 'Subway', 'je l''aime pas'),
(2, 'Smith', 'Tara', '1997-03-14', 2, 'Sfr', 'ma soeur');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `P_ID` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `P_Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`P_ID`, `P_Nom`) VALUES
(1, 'France');

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
('0657321309', 2, 2),
('0664372437', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_telephone`
--

CREATE TABLE IF NOT EXISTS `type_telephone` (
  `TY_ID` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `TY_Portable` tinyint(1) NOT NULL DEFAULT '0',
  `TY_Fixe` tinyint(1) NOT NULL DEFAULT '0',
  `TY_Professionnel` tinyint(1) NOT NULL DEFAULT '0',
  `TY_Internationnal` tinyint(1) NOT NULL DEFAULT '0',
  `TY_Fax` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `type_telephone`
--

INSERT INTO `type_telephone` (`TY_ID`, `TY_Portable`, `TY_Fixe`, `TY_Professionnel`, `TY_Internationnal`, `TY_Fax`) VALUES
(1, 1, 0, 0, 0, 0),
(2, 0, 1, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
