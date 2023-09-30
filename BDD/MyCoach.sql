-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 29 sep. 2023 à 16:54
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `MyCoach`
--

-- --------------------------------------------------------

--
-- Structure de la table `jours`
--

CREATE TABLE `jours` (
  `idJours` int(11) NOT NULL,
  `jour` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `lieu` (
  `idLieu` int(11) NOT NULL,
  `Ville` varchar(25) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `CP` int(11) NOT NULL,
  `Salle` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `niveau` (
  `idNiveau` int(11) NOT NULL,
  `niveau` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `programme` (
  `idProgramme` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `seance` (
  `idSeance` int(11) NOT NULL,
  `idProgramme` int(11) NOT NULL,
  `idNiveau` int(11) NOT NULL,
  `idLieu` int(11) NOT NULL,
  `idJours` int(11) NOT NULL,
  `libelleSeance` varchar(50) NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `motDePasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `nom`, `prenom`, `email`, `motDePasse`) VALUES
(1, 'Doe', 'John', 'john@example.com', 'motdepasse1'),
(2, 'Smith', 'Jane', 'jane@example.com', 'motdepasse2'),
(3, 'Brown', 'Tom', 'tom@example.com', 'motdepasse3'),
(4, 'N', 'Rodic', 'rodic.nou@gmail.com', 'test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jours`
--
ALTER TABLE `jours`
  ADD PRIMARY KEY (`idJours`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`idLieu`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`idNiveau`);

--
-- Index pour la table `programme`
--
ALTER TABLE `programme`
  ADD PRIMARY KEY (`idProgramme`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`idSeance`),
  ADD KEY `idProgramme` (`idProgramme`) USING BTREE,
  ADD KEY `idLieu` (`idLieu`) USING BTREE,
  ADD KEY `idNiveau` (`idNiveau`),
  ADD KEY `idJours` (`idJours`) USING BTREE;

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jours`
--
ALTER TABLE `jours`
  MODIFY `idJours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `idLieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `idNiveau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `programme`
--
ALTER TABLE `programme`
  MODIFY `idProgramme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `idSeance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
