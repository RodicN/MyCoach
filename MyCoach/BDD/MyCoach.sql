-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 13 oct. 2023 à 10:23
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mycoach`
--

-- --------------------------------------------------------

--
-- Structure de la table `jours`
--

DROP TABLE IF EXISTS `jours`;
CREATE TABLE IF NOT EXISTS `jours` (
  `idJours` int NOT NULL AUTO_INCREMENT,
  `jour` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idJours`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jours`
--

INSERT INTO `jours` (`idJours`, `jour`) VALUES
(1, 'Lundi'),
(2, 'Mardi'),
(3, 'Mercredi'),
(4, 'Jeudi'),
(5, 'Vendredi'),
(6, 'Samedi'),
(7, 'Dimanche');

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `idLieu` int NOT NULL AUTO_INCREMENT,
  `Ville` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `CP` int NOT NULL,
  `Salle` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idLieu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `Ville`, `adresse`, `CP`, `Salle`) VALUES
(1, 'Toulouse', '7 avenue', 31000, 'Fitness Park'),
(2, 'Toulouse', '5 Rue', 31500, 'Basic-Fit'),
(3, 'Albi', '20 avenue', 81000, 'Basic-Fit');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `idNiveau` int NOT NULL AUTO_INCREMENT,
  `niveau` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idNiveau`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`idNiveau`, `niveau`) VALUES
(1, 'Débutant'),
(2, 'Intermédiaire'),
(3, 'Expert');

-- --------------------------------------------------------

--
-- Structure de la table `programme`
--

DROP TABLE IF EXISTS `programme`;
CREATE TABLE IF NOT EXISTS `programme` (
  `idProgramme` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idProgramme`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `programme`
--

INSERT INTO `programme` (`idProgramme`, `libelle`) VALUES
(1, 'Renforcement musculaire'),
(2, 'Perte de poids'),
(3, 'Remise en forme'),
(4, 'Relaxation'),
(5, 'Préparation physique'),
(6, 'Étirements et assouplissements');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `idSeance` int NOT NULL AUTO_INCREMENT,
  `idProgramme` int NOT NULL,
  `idNiveau` int NOT NULL,
  `idLieu` int NOT NULL,
  `idJours` int NOT NULL,
  `libelleSeance` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  PRIMARY KEY (`idSeance`),
  KEY `idProgramme` (`idProgramme`) USING BTREE,
  KEY `idLieu` (`idLieu`) USING BTREE,
  KEY `idNiveau` (`idNiveau`),
  KEY `idJours` (`idJours`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`idSeance`, `idProgramme`, `idNiveau`, `idLieu`, `idJours`, `libelleSeance`, `heureDebut`, `heureFin`) VALUES
(1, 1, 1, 1, 1, 'Renforcement musculaire', '08:00:00', '09:00:00'),
(2, 1, 3, 2, 3, 'Renforcement musculaire', '14:30:00', '16:00:00'),
(3, 1, 2, 3, 2, 'Renforcement musculaire', '10:00:00', '11:00:00'),
(4, 2, 3, 1, 6, 'Perte de poids', '18:00:00', '19:00:00'),
(5, 2, 1, 2, 4, 'Perte de poids', '16:00:00', '17:00:00'),
(6, 2, 2, 2, 5, 'Perte de poids', '11:30:00', '13:00:00'),
(7, 3, 1, 1, 1, 'Remise en forme', '09:30:00', '11:00:00'),
(8, 3, 3, 2, 3, 'Remise en forme', '10:30:00', '12:00:00'),
(9, 3, 2, 3, 2, 'Remise en forme', '15:00:00', '16:00:00'),
(10, 4, 1, 2, 4, 'Relaxation', '20:00:00', '21:00:00'),
(11, 4, 2, 2, 5, 'Relaxation', '17:30:00', '19:00:00'),
(12, 4, 3, 3, 6, 'Relaxation', '16:30:00', '18:00:00'),
(13, 5, 2, 1, 1, 'Préparation physique', '16:30:00', '18:00:00'),
(14, 5, 1, 1, 7, 'Préparation physique', '13:00:00', '14:00:00'),
(15, 5, 3, 2, 2, 'Préparation physique', '11:00:00', '12:00:00'),
(16, 6, 3, 1, 5, 'Étirements et assouplissements', '08:30:00', '10:00:00'),
(17, 6, 1, 2, 3, 'Étirements et assouplissements', '18:30:00', '20:00:00'),
(18, 6, 2, 3, 4, 'Étirements et assouplissements', '12:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `motDePasse` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `nom`, `prenom`, `email`, `motDePasse`) VALUES
(8, 'Nou', 'Rodic', 'rodic.nou@gmail.com', '098f6bcd4621d373cade4e832627b4f6'),
(9, 'Dupont', 'Mark', 'mark.dupont@gmail.com', 'c5ff3518aaf39e15799a104f6aae4006');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`idJours`) REFERENCES `jours` (`idJours`),
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`idNiveau`) REFERENCES `niveau` (`idNiveau`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seance_ibfk_3` FOREIGN KEY (`idProgramme`) REFERENCES `programme` (`idProgramme`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seance_ibfk_4` FOREIGN KEY (`idLieu`) REFERENCES `lieu` (`idLieu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
