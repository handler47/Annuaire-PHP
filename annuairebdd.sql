-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 12 Janvier 2019 à 16:17
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

CREATE TABLE IF NOT EXISTS `Adresse` (
  `A_ID` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `A_NumVoie` int(3) NOT NULL,
  `A_NomVoie` varchar(100) NOT NULL,
  `A_ComplementAdresse` varchar(250) NOT NULL,
  `A_Ville` varchar(50) NOT NULL,
  `A_CodePostal` varchar(5) NOT NULL,
  `A_PaysID` int(2) NOT NULL,
  PRIMARY KEY (`A_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `Contact` (
  `C_ID` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `C_Nom` varchar(20) NOT NULL,
  `C_Prenom` varchar(20) NOT NULL,
  `C_DateNais` date NOT NULL,
  `C_AdresseID` int(3) DEFAULT NULL,
  `C_Societe` varchar(20) DEFAULT NULL,
  `C_Commentaire` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`C_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `Pays` (
  `P_ID` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `P_Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `telephone`
--

CREATE TABLE IF NOT EXISTS `Telephone` (
  `T_numero` int(10) NOT NULL,
  `T_TypeTelID` int(3) NOT NULL,
  `T_ContactID` int(3) NOT NULL,
  PRIMARY KEY (`T_numero`,`T_TypeTelID`,`T_ContactID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_telephone`
--

CREATE TABLE IF NOT EXISTS `Type_Telephone` (
  `TY_ID` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `TY_Portable` tinyint(1) NOT NULL DEFAULT '0',
  `TY_Fixe` tinyint(1) NOT NULL DEFAULT '0',
  `TY_Professionnel` tinyint(1) NOT NULL DEFAULT '0',
  `TY_Internationnal` tinyint(1) NOT NULL DEFAULT '0',
  `TY_Fax` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TY_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


--
-- Structure de la table `typetelephone`
--

DROP TABLE IF EXISTS `typetelephone`;
CREATE TABLE IF NOT EXISTS `typetelephone` (
  `Id` int(2) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(25) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typetelephone`
--

INSERT INTO `typetelephone` (`Nom`, `Id`) VALUES
('Fixe', 1),
('Personnel', 2),
('Portable', 3),
('Faxe', 4);
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
