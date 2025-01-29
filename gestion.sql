-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 28 jan. 2025 à 15:33
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionnaire_menu`
--

-- --------------------------------------------------------

--
-- Structure de la table `gestion`
--

DROP TABLE IF EXISTS `gestion`;
CREATE TABLE IF NOT EXISTS `gestion` (
  `id_gestion` int NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `ingredients` text NOT NULL,
  `prix` int NOT NULL,
  PRIMARY KEY (`id_gestion`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gestion`
--

INSERT INTO `gestion` (`id_gestion`, `nom`, `ingredients`, `prix`) VALUES
(8, 'Pizza royale', 'Base rouge, jambon, champignons ,emmental', 11),
(10, 'Pizza Savoyarde', 'Base blanche, oignons, pomme de terre, lardons, emmental.', 13),
(11, 'Pizza Chèvre-miel', 'Base blanche, emmental, chèvre, miel', 13),
(12, 'Pizza Marguerita', 'Base rouge, emmental', 10),
(13, 'Pizza Kebab', 'Base blanche, oignons, viande kebab, emmental', 12),
(14, '4 Fromages', 'Base rouge, emmental, roquefort, mozza, chèvre', 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
