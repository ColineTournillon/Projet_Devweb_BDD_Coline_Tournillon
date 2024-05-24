-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 mai 2024 à 20:28
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id_compte` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `pseudo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `email`, `mdp`, `pseudo`) VALUES
(20, 'co', 'c330ec504d82c24fcd10be978fa74b8a3185a8df719604a85443bb9ca279f5a2', 'co'),
(23, 'coline', '938477de64d86ed380f8437f88c0e1f9c4045626a0896cbb070f479eae229ad9', 'coline'),
(26, 'esirem', '23d30ee9f177edf7de97d9300555533bd91f695d60c5a548cd69d2dfa62511c0', 'esirem'),
(31, 'jk', '31b25869b39f1baa9e7fc279255901b696c36629e57294d4455f479534139852', 'co');

-- --------------------------------------------------------

--
-- Structure de la table `grille`
--

CREATE TABLE `grille` (
  `id_grille` int(11) NOT NULL,
  `id_compte` int(11) DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `nom` varchar(50) NOT NULL,
  `createur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `grille`
--

INSERT INTO `grille` (`id_grille`, `id_compte`, `date_creation`, `nom`, `createur`) VALUES
(89, 26, '2024-05-23 21:31:04', 'grille', 'esirem'),
(90, 20, '2024-05-23 21:35:25', 'chu', 'co'),
(91, 20, '2024-05-24 18:03:15', 'stp', 'co'),
(92, 20, '2024-05-24 19:09:21', 'grid', 'co'),
(93, 26, '2024-05-24 20:03:14', 'dernier', 'esirem');

-- --------------------------------------------------------

--
-- Structure de la table `pixel`
--

CREATE TABLE `pixel` (
  `id_pixel` int(11) NOT NULL,
  `x` int(11) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `y` int(11) NOT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `id_grille` int(11) NOT NULL,
  `id_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_compte`),
  ADD UNIQUE KEY `adresse_mail` (`email`);

--
-- Index pour la table `grille`
--
ALTER TABLE `grille`
  ADD PRIMARY KEY (`id_grille`);

--
-- Index pour la table `pixel`
--
ALTER TABLE `pixel`
  ADD PRIMARY KEY (`id_pixel`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `grille`
--
ALTER TABLE `grille`
  MODIFY `id_grille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `pixel`
--
ALTER TABLE `pixel`
  MODIFY `id_pixel` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
