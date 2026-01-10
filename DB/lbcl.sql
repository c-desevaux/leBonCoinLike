-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 10 jan. 2026 à 13:44
-- Version du serveur : 8.0.40
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lbcl`
--

-- --------------------------------------------------------

--
-- Structure de la table `Ad`
--

CREATE TABLE `Ad` (
  `idAd` int NOT NULL,
  `titleAd` varchar(50) NOT NULL,
  `txtAd` varchar(500) NOT NULL,
  `dateAd` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `priceAd` decimal(15,2) NOT NULL,
  `idUser` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Ad`
--

INSERT INTO `Ad` (`idAd`, `titleAd`, `txtAd`, `dateAd`, `priceAd`, `idUser`) VALUES
(1, 'Velo de ville', 'Solide et agile vélo de Ville parmi plusieurs - 7 vitesses - Il conviendra à des personnes jusqu\'à 175 cm.', '2025-12-25 18:45:00', 320.00, 2),
(2, 'PS5', 'Tres bon état disponible sur Evreux', '2026-01-08 17:19:39', 420.00, 4),
(37, 'PES 3', 'Jeu de Football', '2026-01-10 14:43:35', 19.00, 14);

-- --------------------------------------------------------

--
-- Structure de la table `Picture`
--

CREATE TABLE `Picture` (
  `idPic` int NOT NULL,
  `namePic` varchar(50) NOT NULL,
  `idAd` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `Picture`
--

INSERT INTO `Picture` (`idPic`, `namePic`, `idAd`) VALUES
(1, 'velo.png', 1),
(2, 'ps5.png', 2),
(3, 'ps5-2.png', 2),
(30, '7tAsivQEuq4869.png', 37);

-- --------------------------------------------------------

--
-- Structure de la table `User_`
--

CREATE TABLE `User_` (
  `idUser` int NOT NULL,
  `pseudUser` varchar(50) NOT NULL,
  `emailUser` varchar(50) NOT NULL,
  `dateUser` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pwUser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `User_`
--

INSERT INTO `User_` (`idUser`, `pseudUser`, `emailUser`, `dateUser`, `pwUser`) VALUES
(1, 'Bernard', 'bernard@example.com', '2025-12-23 10:00:00', 'Azerty123**'),
(2, 'Bob', 'bob@example.com', '2025-12-22 14:30:00', 'Wvcxnvb654++'),
(3, 'Charlie', 'charlie@example.com', '2025-12-20 09:15:00', 'Lmkjgh789**'),
(4, 'Julie', 'julie@example.com', '2025-12-21 18:45:00', 'Qsdgfgh852**'),
(5, 'Marie', 'marie27@example.com', '2026-01-08 17:19:25', 'Fdsfdsq564645**'),
(6, 'admin', 'admin@admin.com', '2026-01-08 17:20:01', '$2y$10$sQv8fT4dUWVg0DG4bvCUrOwaChPmApvfXOt8sd9RQoSq5lEkpjV/W'),
(9, 'louise', 'louiseds@gmail.com', '2026-01-09 18:59:28', '$2y$10$Chr710d46r/ThxEW8Le4ZuqVGam9ckqVc3W7CuiXNz1h8WU0HaOLG'),
(14, 'corentin', 'corentin@user.com', '2026-01-10 14:42:56', '$2y$10$790Nkk9L98c/sQ.down2GO972bdTtdVcM7JsAFPbH/VOiYvFqkvxS');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Ad`
--
ALTER TABLE `Ad`
  ADD PRIMARY KEY (`idAd`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `Picture`
--
ALTER TABLE `Picture`
  ADD PRIMARY KEY (`idPic`),
  ADD UNIQUE KEY `namePic` (`namePic`),
  ADD KEY `idAd` (`idAd`);

--
-- Index pour la table `User_`
--
ALTER TABLE `User_`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `emailUser` (`emailUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Ad`
--
ALTER TABLE `Ad`
  MODIFY `idAd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `Picture`
--
ALTER TABLE `Picture`
  MODIFY `idPic` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `User_`
--
ALTER TABLE `User_`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Ad`
--
ALTER TABLE `Ad`
  ADD CONSTRAINT `ad_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `User_` (`idUser`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Picture`
--
ALTER TABLE `Picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`idAd`) REFERENCES `Ad` (`idAd`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
