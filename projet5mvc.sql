-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 29 juil. 2026 à 13:01
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
-- Base de données : `projet5mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

DROP TABLE IF EXISTS `projets`;
CREATE TABLE IF NOT EXISTS `projets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lien` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `ordre` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `projets`
--

INSERT INTO `projets` (`id`, `lien`, `icon`, `ordre`) VALUES
(1, 'https://webaurelien.fr/projet1/', '6216e413ffebceeca882cb4a1a6b014f.jpeg', 1),
(8, 'https://webaurelien.fr/projet2/', 'a57449775063dac22ce87e2a7f55ff9a.jpeg', 2),
(9, 'http://webaurelien.fr/projet3/', 'b397f7930a0246f8fd6ee24efbce5497.jpeg', 3),
(10, 'http://webaurelien.fr/projet4/', '9e0b98afd7b2b5de9b38b7602be7dd3e.jpeg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `role`, `avatar`) VALUES
(6, 'aurelien1', '$2y$10$WgZloTpOciJSkQjkq0j/2uyjA1hOo0oD4MYwGQEB/.mU/fvBvySK6', 'admin', NULL),
(9, 'aurelien2', '$2y$10$gzZKgt0nPVCHFO9d.0yPr.pXf0EDuM8MxoirRtF.udzGFEu9qpnIm', 'admin', 'd9b75230570346b576bb60cf8c1c52f4.jpeg'),
(10, 'test2', '$2y$10$j7yjqZKzKcdgHUSuo8buU.wbUmTXTuJ3XYB/jdBJym5GnBhRSc6Y2', 'user', NULL),
(14, 'test4', '$2y$10$5OqMjnr1.t9knrfDW2DYOu.RDBX25ZWyDEyeuFixNubncl8wbSaum', 'user', NULL),
(16, 'aurelien', '$2y$10$Lbhx73P33XpEZytrcDM/Q.8sygXXRA/Af6082tpmdY9XJcMXgFdQ.', 'admin', '01e29b85488eace31c38c567f497e8a9.jpeg'),
(17, 'aurelien4', '$2y$10$zhsisMsxp2rAjiSwUyZVyuIMkSEntMiHmZKMVTXFSHX7VPjEM0wfi', 'user', NULL),
(18, 'aurelien3', '$2y$10$BVz9bZXgyxiBpi1oZnzCEuK/hJQUcRCW.scqNA6htgKCPYHEAuPSm', 'user', NULL),
(19, 'aurelien5', '$2y$10$azPk9LuyjDGzTdJiLNmXUOaMLh2C3SYqGdVoi64G7NGfFkGHE7GWa', 'user', NULL),
(20, 'aurelien6', '$2y$10$51oezWjXYJllbtLJkMsxr.va4ieTD59ofXVeFALhyDu6GM4.QGxeS', 'user', NULL),
(21, 'aurelien7', '$2y$10$y0fJqeyULvUzUjgch7.8qusn89Do0SPLlX82k5ZB.A1r9EdFNaD7u', 'user', NULL),
(22, 'aurelien8', '$2y$10$9/bo3BSCGFIkf3x7jxo8OeupgUnBeQqftxs5Gls7PSvgAX574Ijzq', 'user', NULL),
(23, 'aurelien9', '$2y$10$eFPLj2i8g964lVB5F9fKZOzrwbkww1LyftSmd.vGDw6khxoc5Y1zq', 'user', NULL),
(24, 'aurelien10', '$2y$10$rj49L0S7cy2MmUR/kjpC.O0YO83A0mG67RY2xqxS6osSJN5rJ.HMO', 'user', 'a96c23294db233ee77a6819eed911a8c.jpeg'),
(25, 'test45', '$2y$10$5ivc4AnglhzYjtnb85fEBOSmMv6o5kdQ6VtnxQt1R7TKnEJcHx99a', 'user', NULL),
(26, 'test46', '$2y$10$4DRmcLayoaeoRjVD6geIsu0MkwtslVh2jXuDH3JQPU3LlYcge7Ofq', 'user', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
