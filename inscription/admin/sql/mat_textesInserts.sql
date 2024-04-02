-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 27 jan. 2023 à 17:24
-- Version du serveur : 10.6.11-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `maternel`
--

-- --------------------------------------------------------

--
-- Structure de la table `mat_textesInserts`
--

CREATE TABLE `mat_textesInserts` (
  `textName` varchar(60) NOT NULL COMMENT 'Nom du texte type',
  `texteInsert` varchar(20) NOT NULL COMMENT 'Texte effectif pour l''Insert',
  `titreInsert` varchar(60) NOT NULL COMMENT 'Commentaire sur l''insert'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Textes des inserts';

--
-- Déchargement des données de la table `mat_textesInserts`
--

INSERT INTO `mat_textesInserts` (`textName`, `texteInsert`, `titreInsert`) VALUES
('confirmation', '##dateNaissance##', 'Date de naissance'),
('confirmation', '##lien##', 'Lien à cliquer'),
('confirmation', '##nomEnfant##', 'Nom de famille'),
('confirmation', '##nomParent##', 'Nom de famille'),
('confirmation', '##prenomEnfant##', 'Prénom de l\'enfant'),
('confirmation', '##prenomParent##', 'Prénom du parent'),
('confirmation', '##salutation##', 'Madame / Monsieur'),
('invitation', '##dateNaissance##', 'Date de naissance'),
('invitation', '##dateRV##', 'Date du RV d\'inscription'),
('invitation', '##nomClasse##', 'Future classe de l\'enfant'),
('invitation', '##nomEnfant##', 'Nom de l\'enfant'),
('invitation', '##nomParent##', 'Nom du parent'),
('invitation', '##prenomEnfant##', 'Prénom de l\'enfant'),
('invitation', '##prenomParent##', 'Prénom du parent'),
('invitation', '##salutation##', 'Madame / Monsieur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `mat_textesInserts`
--
ALTER TABLE `mat_textesInserts`
  ADD PRIMARY KEY (`textName`,`texteInsert`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mat_textesInserts`
--
ALTER TABLE `mat_textesInserts`
  ADD CONSTRAINT `mat_textesInserts_ibfk_1` FOREIGN KEY (`textName`) REFERENCES `mat_textes` (`textName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
