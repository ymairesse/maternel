-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 24 déc. 2022 à 16:17
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
-- Structure de la table `mater_classes`
--

CREATE TABLE `mater_classes` (
  `classe` varchar(20) NOT NULL COMMENT 'nom technique',
  `nomClasse` varchar(30) NOT NULL COMMENT 'nom complet de la classe'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mater_classes`
--

INSERT INTO `mater_classes` (`classe`, `nomClasse`) VALUES
('accueil', 'Classe d\'accueil'),
('mat1', '1e Maternelle'),
('mat2', '2e Maternelle'),
('mat3', '3e Maternelle');

-- --------------------------------------------------------

--
-- Structure de la table `mater_datesRV`
--

CREATE TABLE `mater_datesRV` (
  `id` int(11) NOT NULL COMMENT 'Identifiant de date de RV',
  `date` date NOT NULL COMMENT 'Date de RV',
  `heure` varchar(5) NOT NULL COMMENT 'Heure du RV',
  `nbPlaces` tinyint(4) NOT NULL COMMENT 'nombre de places disponibles'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Catalogue des dates de RV';

--
-- Déchargement des données de la table `mater_datesRV`
--

INSERT INTO `mater_datesRV` (`id`, `date`, `heure`, `nbPlaces`) VALUES
(5, '2020-10-27', '9:00', 10),
(6, '2020-11-10', '15:30', 5),
(17, '2023-01-26', '9:00', 15),
(20, '2023-01-25', '9:00', 15),
(28, '2023-01-19', '9:00', 15),
(29, '2023-01-31', '17:00', 15),
(30, '2023-02-09', '9:00', 15);

-- --------------------------------------------------------

--
-- Structure de la table `mater_inscriptionRV`
--

CREATE TABLE `mater_inscriptionRV` (
  `idInscription` varchar(32) NOT NULL COMMENT 'Identifiant de la demande d''inscription',
  `idRV` int(11) NOT NULL COMMENT 'Identifiant du RV',
  `dateEnvoi` date DEFAULT NULL COMMENT 'Date d''envoi de l''invitation à la réunion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Table inscription / RV';

--
-- Déchargement des données de la table `mater_inscriptionRV`
--

INSERT INTO `mater_inscriptionRV` (`idInscription`, `idRV`, `dateEnvoi`) VALUES
('0a02d4afd6203887beca61e1a156b583', 28, NULL),
('132b04a8e0bb0eac218b6c88ed3fb9e9', 20, NULL),
('2ae6866cbd77028d10d7303128e2f959', 29, NULL),
('2ba2ceff4030d29481ae54ab5ea24642', 20, NULL),
('3dd78805188250ec513cf350c9a337a0', 28, NULL),
('3f26cb6cccadc951f065772aa33f1214', 20, NULL),
('4002abed12fafed40750664b0d1c7aa2', 28, NULL),
('44edbb42b410d5242c5bb639a5b134d1', 20, NULL),
('58094b1af7a0e52a652c688d9a4972d3', 20, NULL),
('591e3b6c58fe648824ab8636bdc4b5e1', 29, NULL),
('64a6911a0c9fd395e630dd65d1739aec', 20, NULL),
('72ade41c0dde8298c832ca2bd6bd877d', 20, NULL),
('891c5583027c1604c07c3c91e7bbc3af', 20, NULL),
('8a5202c10184f9b04cfcce3e6fb59732', 28, NULL),
('8e5e83c6fa79a296dc461066e1f7d601', 20, NULL),
('9d0c0d0c8f74bacfade09d13580fcf7d', 20, NULL),
('9de41f1b3e5e2ee7db73817b4ce60006', 28, NULL),
('a123784f16b2af22cfd82f0140661618', 29, NULL),
('a5033dbce8b0b474eda495c155b706cf', 20, NULL),
('b3c0fd7fad8c67b362ad115abeadc742', 28, NULL),
('b6f28e473b094dcc4a4b9398a81fa6cf', 28, NULL),
('b9097102be056a02bde653aedb0efb29', 28, NULL),
('beca95a62cb1e1a82542bfadf095a369', 29, NULL),
('bfeadb8bc3dd6ccf522134c1129eae49', 29, NULL),
('c3b71bab979b0602a3d1f96439424982', 29, NULL),
('cbfa1ce318c740689f57ec847f185f4b', 29, NULL),
('d8a9232664bc14bf255dd22a2fb6a640', 20, NULL),
('dc550c383bedd707b8a0e3200f13731f', 28, NULL),
('ed52310869c67b2d6fc416c1c03ad1e2', 28, NULL),
('ee2dd9f3b86396aac58c6c59ad0a4991', 28, NULL),
('f9ea62084ea452658f64d1988041964e', 28, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `mater_inscriptions`
--

CREATE TABLE `mater_inscriptions` (
  `n` int(11) NOT NULL,
  `id` varchar(32) NOT NULL COMMENT 'Identifiant de la demande',
  `salutation` enum('Madame','Monsieur') NOT NULL,
  `date` varchar(25) NOT NULL COMMENT 'Date de la demande',
  `nomParent` varchar(40) DEFAULT NULL COMMENT 'Nom du parent',
  `prenomParent` varchar(40) DEFAULT NULL COMMENT 'Prénom du parent',
  `adresse` varchar(100) DEFAULT NULL COMMENT 'Adresse postale du parent',
  `mail` varchar(80) DEFAULT NULL COMMENT 'Adresse mail',
  `telephone` varchar(20) DEFAULT NULL COMMENT 'Téléphone',
  `nomEnfant` varchar(40) DEFAULT NULL COMMENT 'Nom de l''enfant',
  `prenomEnfant` varchar(40) DEFAULT NULL COMMENT 'Prénom de l''enfant',
  `sexe` enum('M','F','A') DEFAULT NULL COMMENT 'Sexe de l''enfant',
  `dateNaissance` date DEFAULT NULL COMMENT 'Date de naissance',
  `classeMat` varchar(20) DEFAULT NULL,
  `creche` varchar(200) DEFAULT NULL COMMENT 'Crèche fréquentée par l''enfant',
  `ecole` varchar(200) DEFAULT NULL COMMENT 'École fréquantée par l''enfant',
  `raison` varchar(200) DEFAULT NULL COMMENT 'Raisons du changement d''école',
  `nomEnfant1` varchar(40) DEFAULT NULL COMMENT 'Nom de l''enfant 1',
  `dnaisEnfant1` varchar(10) DEFAULT NULL COMMENT 'Date de naissance de l''enfant 1',
  `nomEnfant2` varchar(40) DEFAULT NULL COMMENT 'Nom de l''enfant 2',
  `dnaisEnfant2` varchar(10) DEFAULT NULL COMMENT 'Date de naissance de l''enfant 2',
  `nomEnfant3` varchar(40) DEFAULT NULL COMMENT 'Nom de l''enfant 3',
  `dnaisEnfant3` varchar(10) DEFAULT NULL COMMENT 'Date de naissance de l''enfant 3',
  `remarque` varchar(200) DEFAULT NULL COMMENT 'Remarque libre',
  `section` enum('N','M','P','S') DEFAULT NULL COMMENT 'Maternel, Primaire ou Secondaire',
  `nomPrioritaire` varchar(40) DEFAULT NULL COMMENT 'Nom enfant déjà inscrit (prioritaire)',
  `classe` varchar(6) DEFAULT NULL COMMENT 'Classe de l''enfant prioritaire',
  `statut` varchar(20) DEFAULT NULL COMMENT 'Statut de la demande'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Inscriptions maternelles';

--
-- Déchargement des données de la table `mater_inscriptions`
--

INSERT INTO `mater_inscriptions` (`n`, `id`, `salutation`, `date`, `nomParent`, `prenomParent`, `adresse`, `mail`, `telephone`, `nomEnfant`, `prenomEnfant`, `sexe`, `dateNaissance`, `classeMat`, `creche`, `ecole`, `raison`, `nomEnfant1`, `dnaisEnfant1`, `nomEnfant2`, `dnaisEnfant2`, `nomEnfant3`, `dnaisEnfant3`, `remarque`, `section`, `nomPrioritaire`, `classe`, `statut`) VALUES
(466, 'b5d4a11a3311a9a2c51c5284754d5ba7', 'Madame', '2021-09-05 09:25:15', 'Anghel', 'Silvia alina', 'Rue Maurice xhoneux nr 3 1070 Anderlecht ', 'silvia.alina38@yahoo.com', '0489 922778', 'Anghel', 'Eva maria', 'F', '2019-05-22', 'mat1', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'sansReponse'),
(501, '9a916870fc882b30357b3604321b1ef6', 'Madame', '2022-10-01 15:13:23', 'El melioui', 'Mounia', 'Des Déportés Anderlecht  12/2eme1070 anderlecht', 'mouniaelmelioui2018@gmail.com', '0485 056027', 'Kaddar', 'Maissa', 'F', '2019-10-16', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'attente'),
(505, '79a04a597b05c95a85500e5382e3548f', 'Madame', '2021-10-01 08:11:48', 'Kotsis', 'Peristera', 'Rue docteur Huet, 34 \r\n1070 Anderlecht ', 'peristerakotsis@hotmail.be', '0478 057520', 'Carralcazar Valle', 'Georges', 'M', '2020-04-07', '', 'De Zonnebloem', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'msg vocal 19/12/22', NULL, '', '', 'sansReponse'),
(515, 'cbfa1ce318c740689f57ec847f185f4b', 'Madame', '2021-10-07 15:41:08', 'Pascia', 'Loredana ', 'Rue Saint Martin 79 boîte 15 1080 Molenbeek-Saint-Jean ', 'loredanapascia@hotmail.com', '0494 081975', 'Aspeslagh ', 'Lissandro', 'M', '2020-07-15', '', 'Crèche reine fabiola Avenue Jean Dubrucq 90, 1080 Molenbeek-Saint-Jean', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', '', '', 'rvInscription'),
(516, '4517de93bbd28027f207d8eb9f23610a', 'Madame', '2021-10-07 21:56:35', 'Pletosu', 'Mihaiela Raluca', '1070', 'raluca9rusu@yahoo.be', '0485 421847', 'Pletosu', 'Briana', 'F', '2020-05-25', '', 'Les Roseaux\r\nClos de l’Equerre 3, 1070 Anderlecht', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'sansReponse'),
(527, 'bc69b8e0062eb90ea80fa569019cfe33', 'Madame', '2021-10-19 09:15:06', 'Luhudi-Missa ', 'Trecy', 'RUE JAKOB SMITS 107 1070 anderlecht ', 'trecyluhudi@live.be', '0485 672616', 'Mwinyi Shabudu Diwani ', 'Malayika Mahamisa', 'F', '2020-03-25', '', '\r\nCrèche la flèche Rue de la flèche 14\r\n1000 bxl', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'sansReponse'),
(530, '5d82b79e3d00233f8515ab4195ffbc25', 'Madame', '2021-10-22 12:57:46', 'Umutoni ', 'Livia ', 'Rue de la Laiterie,86 bte 19\r\n1070 Bruxelles', 'mutonilivia@gmail.com', '0489 042281', 'Hazali', 'Caleb', 'M', '2020-04-12', '', 'Coucou Winnie', '', 'Rentrée en prégardiennat ', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'sansReponse'),
(531, '356832105266865614af39a311c2faa7', 'Madame', '2021-10-29 10:49:44', 'Ujeniuc ', 'Emanuela ', 'Boulevard Théo Lambert 23 1070 Bruxelles ', 'eemma579@yahoo.com', '0487 803693', 'Dangalas ', 'Antonia ', 'F', '2020-04-05', '', 'Camélias ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(532, 'b9097102be056a02bde653aedb0efb29', 'Madame', '2021-11-01 20:20:18', 'RAMIC', 'Edita', 'Rue Du Pippenzijpe 15\r\n1070 Anderlecht ', 'ramiceditam@gmail.com', '0488 359557', 'CELAJ', 'Bora', 'F', '2020-03-24', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Je souhaite inscrire ma fille en classe d\'accueil dans votre établissement. ', NULL, '', '', 'rvInscription'),
(533, 'beca95a62cb1e1a82542bfadf095a369', 'Madame', '2021-11-02 07:17:11', 'Lawu', 'Tania', 'Avenue dr zamenof 16, 1070 Bruxelles ', 'isaacwathson@gmail.com', '0484 898050', 'Dizolele Ninga ', 'Axel', 'M', '2020-09-22', '', 'Les demoiselles coccinelles \r\nRue dubois thorn 79, 1080 Bruxelles ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Bonjour. \r\nJe fais une inscription anticipée pour être sûre que mon fils ait plus de chance d\'avoir une place.\r\nJ\'espère qu\'il aura une place pour le courant de l\'année 2022-2023.\r\nMerci', NULL, '', '', 'rvInscription'),
(534, 'c299962dd0054a9a3ad3a3c818e7327f', 'Madame', '2021-11-02 22:13:26', 'benkaddour', 'imane', 'chaussée de mons ,301 \r\n1070 anderlecht', 'imanebenkaddour13@gmail.com', '0465 452497', 'MEHRAZ', 'Dania', 'F', '2020-01-26', '', 'les petits plus \r\nadresse : boulevard de la deuxième armée britannique , 27\r\n1190 FOREST ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(536, 'e9afd65e0153dbaf90cd690cd32223b3', 'Monsieur', '2021-11-07 14:02:05', 'Derouichi ', 'Khalif ', '1070 ', 'derouichi_khalif@hotmail.com', '0472 276170', 'Derouichi ', 'Bahia ', 'F', '2020-02-15', '', 'Crèche militaire/police. ', '', 'Entrée maternelle 2022-2023', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(537, '28b3104cda86dcbdc4f3032998df88d0', 'Madame', '2021-11-08 10:34:18', 'Mounadel', 'Loubna', 'Boulevard Louis Mettewie 93', 'lmounadel@hotmail.fr', '0488 360397', 'MALELA ', 'Anissa', 'F', '2020-02-23', '', 'Les petits poucets ( av. Carl Requette 20 - 1080 Molenbeek)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(544, '6fb53a69657b70776ac8451fbe717c64', 'Madame', '2021-11-11 22:31:05', 'Dardiki', 'Farah', 'Rue Léon Delacroix, 1\r\n1070 Anderlecht ', 'farahdardiki@hotmail.com', '0485 936703', 'Mohammadi', 'Souleymen', 'M', '2020-03-27', 'accueil', 'N’a jamais été en crèche ', 'Ne va pas encore à l’école ', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(548, '72ade41c0dde8298c832ca2bd6bd877d', 'Madame', '2021-11-15 21:06:46', 'Zaghloul ', 'Sheryhan', '1082', 'shery.zghl1823@hotmail.com', '0486 244067', 'Sulejmani', 'Rayan', 'M', '2020-04-20', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Bonjour, j’inscris mon fils dans votre établissement car ma sœur a fait ces secondaires chez vous, elle s’appelait Zaghloul Shaymae . Si cela peut vous être utile comme info . Bien à vous .', NULL, '', '', 'rvInscription'),
(553, '1ac0d16ef8244f307cc2f4b79bc0e0d7', 'Madame', '2021-11-22 11:38:53', 'Boutouba', 'Farida', 'avenue de la perseverance15boite6', 'faridaboutouba@hotmail.com', '0485 304634', 'Medjdoub', 'Yassine', 'M', '2020-03-09', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'attente'),
(556, '9fd879cd87c489f900f47f97d39182cf', 'Madame', '2021-11-24 17:43:58', 'Croitor ', 'Iuliana Gina', 'Boulevard Théo Lambert 23\r\n1070 Anderlecht ', 'barariu.iuliana@yahoo.com', '0465 567868', 'Croitor', 'Eduard Sebastian ', 'M', '2020-04-26', '', 'LA PARENT THESE \r\nChaussée de Mons 699, 1070', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(558, '2459f612370cb67e4fef4fe6a5201d94', 'Madame', '2021-11-25 22:39:19', 'Kharrim ', 'Amal', 'Rue Pierre biddaer 7 1070', 'kharrimbxl@hotmail.com', '0484 716318', 'Sedki bakkioui', 'Othmane ', 'M', '2021-05-12', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Bonjour, j aimerai inscrire mon fils dans votre école qui se trouve à 2 pas de mon domicile. En espérant avoir une réponse favorable. Merci. ', NULL, '', '', 'attente'),
(562, '62e13cbf1811000e8ae0bfc14fb56cdd', 'Madame', '2021-12-10 20:31:31', 'Bumbar', 'Camelia', 'Rue polydore moerman 30', 'tudiccamelia@gmail.com', '0465 128633', 'Bumbar', 'Alissa', 'F', '2020-09-05', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', '', '', 'attente'),
(563, 'f9ea62084ea452658f64d1988041964e', 'Monsieur', '2021-12-13 22:28:53', 'nesiti', 'fatjon', 'Rue Theodore Bekaert 4  1070 Anderlecht', 'nesitif@gmail.com', '0466 373727', 'Nesiti', 'Krystian', 'M', '2020-06-17', NULL, 'pas des place ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', '', '', 'rvInscription'),
(570, 'ad625c323d501d5724424e4bec369e58', 'Madame', '2021-12-28 11:18:57', 'Souissi', 'Sara', 'Avenue Victor Olivier 16 ', 'sara-19-90@hotmail.com', '0488 317268', 'El-guennouny', 'Naoufel ', 'M', '2020-07-09', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'sansReponse'),
(576, '313141ff45e3a0b922b0c42aa539bcc7', 'Madame', '2022-01-06 13:41:10', 'CZARKOWSKA', 'KATARZYNA', 'RUE DE LA PROMENADE 19 \r\n1070 ANDERLECHT', 'czarcath@hotmail.com', '0499 420206', 'HUST', 'VICTORIA', 'F', '2020-05-07', '', 'BABAR Av. Gounod 35, 1070 Anderlecht', 'néant', 'néant', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'sansReponse'),
(578, 'b6f28e473b094dcc4a4b9398a81fa6cf', 'Madame', '2022-01-07 21:54:06', 'Silva Correia', 'Claudia', 'Rue Lieutenant Liedel 50 bt 7 1070 Anderlecht', 'cla.silvaco@gmail.com', '0485 166797', 'Deldicq', 'Gabriel', 'M', '2021-01-25', '', 'Les bébés magiques - Rue du Sillon 116, 1070 Anderlecht ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Merci', NULL, '', '', 'rvInscription'),
(581, 'b711ba6975c40ba0853f7b50935c2114', 'Monsieur', '2022-01-09 20:37:16', 'Khloufi ', 'Said', '1070', 'Saidee32@hotmail.com', '0468 493115', 'Khloufi ', 'Jana', 'F', '2020-03-25', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(583, 'a8bfa0903607b4509cb2423e8713c43a', 'Madame', '2022-01-11 09:23:42', 'Bououd', 'Dina', 'Rue d aumale 113', 'bououd1993@outlook.fr', '0485 833239', 'Abdoulkassimi', 'Abderramane ', 'M', '2020-03-10', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(584, '1b1a72be399897d1cd062b4257a1ee29', 'Madame', '2022-01-11 09:29:55', 'maroye', 'Jessica', 'rue Frans Hals 10\r\n1070 Anderlecht', 'jesica1060@live.be', '0486 604826', 'Bahri', 'Samih', 'M', '2020-09-25', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'sansReponse'),
(588, 'a38ee2b8c3a48bfdf3d9750e17ca7b80', 'Madame', '2022-01-11 11:10:05', 'calantzis', 'sylvie', 'avenue Frans Van Kalken 5 boite 103, 1070 Anderlecht', 'calantzissylvie@hotmail.com', '0478 259499', 'Dubois', 'Mateo', 'M', '2020-06-19', '', '/', '/', 'Inscription accueil', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(603, 'bda4f6912038f7e60a1ffa7858f137b2', 'Madame', '2022-01-18 20:48:59', 'Boulaouche', 'Fatima', 'Avenue gounod boite 2 1070 Anderlecht ', 'boulaouchefatima19@yahoo.com', '0484 943348', 'Demirel', 'Murat', 'M', '0201-12-22', '', 'Aucun', 'Aucun', 'Aucun', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', 'Demirel Murat', 'Mater', 'sansReponse'),
(605, '7588debda687943680b4ef76cf42dc41', 'Madame', '2022-01-25 19:34:36', 'Vata', 'Albana', '1070', 'vataalbana@gmail.com', '0486 345798', 'Ukshini', 'Nolan', 'M', '2020-06-08', '', 'Non', 'Non', 'Non ', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', 'Ukshini Lorik', '3MA', 'annule'),
(607, 'd7808f5e83afb5a29118f773656e4b95', 'Madame', '2022-01-28 14:24:24', 'MARIMAN', 'Laura', 'Avenue Frans van Kalken 18/233 1070 Anderlecht ', 'lauramariman@gmail.com', '0472 385812', 'Martinez Redondo', 'Hugo', 'M', '2020-05-31', '', 'Nounou - pascale cohen', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', '', '', 'sansReponse'),
(612, 'c96bf7fcff20507bc3902694ce7a0ad9', 'Madame', '2022-02-04 14:23:43', 'El moujaddid ', 'Samira', '1070', 'Samiraelmoujaddid85@gmail.com', '0465 478147', 'Hajji ', 'Yassine ', 'A', '2020-04-23', '', 'Elmer zwid', 'Insd', 'D\'inscription premiére fois', NULL, NULL, NULL, NULL, NULL, NULL, 'Veuillez inscrire mon fils avec vous. Je suis très intéressé à accepter mon fils avec vous. Merci', NULL, '', '', 'annule'),
(615, '4002abed12fafed40750664b0d1c7aa2', 'Madame', '2022-02-08 16:46:16', 'Mkerref', 'Yousra', 'Brabantsebaan 389, 1600 Sint-Pieters-Leeuw', 'mkerrefyousra@hotmail.fr', '0485 693806', 'Abroum', 'Naim', 'M', '2020-11-26', '', 'Dreamland à Saint-Gilles', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(618, 'ac3f76fe890f641bcb0423ed7a5bb0d4', 'Monsieur', '2022-02-11 14:57:58', 'Cirriez', 'Thibaut', '44 rue de la Laiterie\r\n1070 Anderlecht', 'thibaut.cirriez@gmail.com', '0498 619615', 'Cirriez Nader', 'Astrid', 'F', '2020-10-15', '', 'Coucou Winnie\r\nRue de la Cavatine 35, 1080 Molenbeek-Saint-Jean', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Nous fille rentrerait en classe d\'accueil à partir du 17 avril 2023 (à ses 2,5 ans).', NULL, '', '', 'sansReponse'),
(619, 'bed40d3cd5d5ccf3213fe4c4f41d9804', 'Madame', '2021-10-01 15:10:40', 'Stoian ', 'Florentina Valentina ', 'Rue Lieutenant Liedel 78 Anderlecht ', 'beautifuleyes2011@yahoo.com', '0467 841459', 'Stoian', 'Eva Maria', 'F', '2020-09-13', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(620, '2edecc70978ad878efc6667946218f48', 'Monsieur', '2022-02-15 10:59:08', 'Abroum', 'Said', 'Avenue Francois Malherbe 81/3 1070 Anderlecht', 'saidabroum@hotmail.com', '0477 803717', 'Abroum', 'Ilyes', 'M', '2020-04-08', '', 'Dream Land Rue de mérode 11 1060 Bruxelles', 'Pas d\'école', '-', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(622, '7005da472130e205e333d87d637d6953', 'Madame', '2022-02-17 09:39:56', 'BEZUNARTEA PASCUAL', 'MAITE', 'CLOS DES ETANGS 10.7 \r\n1070 ANDERLECHT', 'm.bezunartea@gmail.com', '0491 900655', 'BEZUNARTEA PASCUAL RODRIGUES FERREIRA', 'ADÈLE', 'F', '2020-10-09', '', 'Crèche de l\'Hôpital Erasme', '', 'Nouvelle inscription pour Maternelle après finir la crèche', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(634, '2ae6866cbd77028d10d7303128e2f959', 'Madame', '2022-03-07 11:51:43', 'BA', 'Khadijatou ', 'Rue de Birmingham354 \r\n1070 ANDERLECHT ', 'kba28030@gmail.com', '0465 655738', 'SoW', 'Aïsha ', 'F', '2020-10-28', '', 'Nom de la crèche : Nieuwkinderland \r\nAdresse de la crèche : Nieuwland 194 1000 BRUSSEL ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', '', '', 'rvInscription'),
(635, 'bfeadb8bc3dd6ccf522134c1129eae49', 'Madame', '2022-03-09 09:38:06', 'OZDEMIR', 'Mehriban', 'Rue Emile Versé 30 bte 2 1070 ANDERLECHT ', 'mihriban1030@hotmail.com', '0489 618122', 'Mihriban OZDEMIR', 'Zeynel CALIKTOR ', 'M', '2020-09-27', '', 'pas en creche ', 'il va commencer sa 1ere maternelle ', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(636, '491889609b4893a8a43d36c151dbb55e', 'Madame', '2022-03-09 12:01:55', 'Noumeri ', 'Nassima', 'Rue memling n11/2', 'Nassima.noumeri@hotmail.com', '0489 387532', 'Mokhtari', 'Riad', 'M', '2020-06-03', '', 'Les Rouseaux', 'Crèche les rouseaux anderlecht ', '1er Maternelle', NULL, NULL, NULL, NULL, NULL, NULL, 'Mon fils aura 2ans et demi le 03/1/2023 et j\'aimerai bien l\'inscrire dans votre école en immersion. \r\nMerci', NULL, '', '', 'sansReponse'),
(639, '832dda7af58c6ca45e59c536a0df3955', 'Madame', '2022-03-11 11:00:06', 'KAMGANG KENMOE', 'Kathie', 'Rue d\'Aumale 54 ,1070 Anderlecht', 'kathie_kamgang@yahoo.fr', '0465 827702', 'NTOUKO TCHEUFFA', 'Chris Eden', 'M', '2020-11-02', '', 'Nieuwkinderland. Nieuwland 194 ,1000 Brussel', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Je souhaite intégrer votre école', NULL, '', '', 'annule'),
(641, 'a551e1e5d83752c5b92f7ffcd939f6fe', 'Monsieur', '2022-03-11 20:53:18', 'El benna ', 'Rafik', 'Rue courtois 22 boite 2\r\n1080 Molenbeek-Saint-Jean ', 'elbenna.rafik@gmail.com', '0472 922230', 'El benna ', 'Kossay ', 'M', '2020-10-12', '', 'Crèche les couleurs olina', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Bonjour \r\nJe souhaite inscrire mon fils dans votre établissement. ', NULL, '', '', 'annule'),
(642, '2ba2ceff4030d29481ae54ab5ea24642', 'Madame', '2022-03-12 11:41:08', 'Somerlinck', 'Megann', 'rue Louis Van Beethoven 34', 'megannsomer1996@gmail.com', '0475 913630', 'Kizilöz', 'Latife Alya', 'F', '2020-08-20', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Ayant été dans votre école ainsi que mon frère, je serais des plus heureuse si ma petite fille pouvait suivre sa scolarité au sein de votre établissement soit en accueil ou 1ère maternelle.', NULL, '', '', 'rvInscription'),
(651, '4dfa8e3d4ea41637b39376323f185976', 'Madame', '2022-03-24 11:44:06', 'El hallaj', 'Nadia', 'Avenue gounod 101, 1070 anderlecht', 'nadia_elhallaj@hotmail.fr', '0493 960455', 'Dergal', 'Noor', 'F', '2020-09-29', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(653, 'e1755f344c28143d619d8624ceda6a45', 'Madame', '2022-03-30 15:21:05', 'Peeters', 'Alexandra', 'Avenue des crocus\r\n28', 'apeeters19@gmail.com', '0471 105081', 'Vincké ', 'Xavier ', 'F', '2022-03-24', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', 'Vincké Owen', '1 ac', 'attente'),
(654, 'd8a9232664bc14bf255dd22a2fb6a640', 'Madame', '2022-03-31 12:08:20', 'Righi', 'Asma', 'rue de la Laiterie 86, 1070', 'righi.asma@hotmail.fr', '0486 982478', 'Aberkane ', 'Mira Melek ', 'F', '2020-09-24', '', 'Crèche actiris', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(661, '891c5583027c1604c07c3c91e7bbc3af', 'Madame', '2022-04-14 14:08:07', 'Demaj', 'Sonila', 'Avenue Paul Janson 51 bt 11 1070 Anderlecht', 'soniladls2@gmail.com', '0484 285049', 'Larsimont', 'Seona', 'F', '2020-10-02', '', 'Pas de crèche actuellement', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(663, '19b5043b8b055e6bdd56b905c05a3962', 'Madame', '2022-04-20 13:53:51', 'Vanderheyden', 'Stéphanie', 'Victor nonnemanstraat 24 1600 Sint-Pieters-Leeuw ', 'fanny3120@hotmail.com', '32471741546', 'HABSAOUI', 'Ines', 'F', '2021-05-07', '', 'O petit câlins à Anderlecht ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Bonjour j ai trois enfants déjà à l insd. Ma fille Criscenzo Alicia en primaire et mes deux fils Criscenzo Jonathan et Florian en secondaire. Comment peut ton inscrire ma fille en accueil?', 'P', 'CRISCENZO ALICIA', '3A', 'inscription'),
(667, '8e5e83c6fa79a296dc461066e1f7d601', 'Monsieur', '2022-04-22 15:13:05', 'Syti', 'Fran', 'Avenue Limbourg 28, 1070 Anderlecht', 'Franfrd@hotmail.com', '0488 981225', 'Syti', 'Ilona', 'F', '2020-09-29', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Nous habitons à même pas 300m de l\'école.', 'S', 'SYTI Laura', '5A', 'rvInscription'),
(669, '4e4a29adf2b609f819af2e77c164df27', 'Madame', '2022-04-24 11:35:02', 'BULUT', 'Nahide', 'Rue du Libre Examen 24 - 1070 ANDERLECHT ', 'bulut.icmr@gmail.com', '0486 107579', 'BULUT PINCKET', 'Seyhan ', 'M', '2020-03-17', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', '', '', 'annule'),
(671, '4cd386d64aa1a6453ede7d290777c65e', 'Madame', '2022-05-04 08:57:18', 'El maslouhi', 'Lala meryem', 'Parc peterboos13d/3 1070 anderlecht ', 'Lalamasouli@gmail.com', '0485 200135', 'Kasabeh ', 'Yousra ', 'F', '2010-04-20', '', '', '', 'Changement d\'adresse ', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'sansReponse'),
(673, '9637a64488fb187f44d1be2c84d8803e', 'Madame', '2022-05-04 12:44:54', 'Carvalho ', 'Ines ', 'Rue fridtjof nansen 34, 1070 Anderlecht ', 'ines1995_carvalho@hotmail.com', '0477 783539', 'Carvalho Correia ', 'Dylan ', 'M', '2020-04-03', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(674, '3dd78805188250ec513cf350c9a337a0', 'Monsieur', '2022-05-04 17:40:26', 'Labbé', 'Etienne', 'rue jean noté,57\r\n1070 Anderlecht', 'etienne_labbe1@yahoo.fr', '0474 375470', 'labbé', 'Zaho', 'M', '2021-03-10', '', '1,2,3 piano', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'je suis un ancien de l isnd humanité\r\nje suis un ami de Kay Frohwein super prof de primaire\r\nje suis le cousin de Anne Pauwels aussi prof de primaire', NULL, '', '', 'rvInscription'),
(677, 'd5f9a64e174f5d404655bae08320fb28', 'Madame', '2022-05-08 12:39:55', 'Chiarel ', 'Giulia', 'Rue Georges Moreau 65, 1070 Anderlecht', 'giulia.chiarel@gmail.com', '0484 466171', 'Lommi Chiarel', 'Nora', 'F', '2021-06-21', '', 'Creche Les Muguets,\r\nRue Robert Bosch, 21\r\n1070 Anderlecht', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'attente'),
(681, 'ba9bba5bde65ef6086a75c7b83b9b42b', 'Madame', '2022-05-11 16:42:33', 'Wary', 'Molly', 'Rue Florimond de pauw\r\n35', 'm.wary@hotmail.be', '0488 213986', 'Kiekens', 'Dany ', 'M', '2022-01-19', '', 'Il n’y vas pas', 'Il n’y en a pas', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'attente'),
(687, '64a6911a0c9fd395e630dd65d1739aec', 'Monsieur', '2022-05-21 08:47:23', 'Ndjokoko-Mputu', 'Héritier ', '30 rue Florimond De Pauw ', 'hnd82@outlook.fr', '0486 640776', 'Ndjokoko-Mputu', 'Ryan', 'M', '2020-06-15', NULL, 'Au petit câlin ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(688, '9d0c0d0c8f74bacfade09d13580fcf7d', 'Madame', '2022-05-24 17:16:35', 'Dakheel ', 'Laila', 'Boulevard Maria Greoninckx de may 99\r\n1070 Anderlecht ', 'dakheel.laila@gmail.com', '0484 847981', 'Hossein', 'Aya', 'F', '2020-09-28', '', 'Mélodie d’olina\r\nRue de Geneffe 22 1080 Molenbeek ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Est-ce que vous avez un classe d’accueil à partir de 2,5 ans ?', NULL, '', '', 'rvInscription'),
(689, 'ee2dd9f3b86396aac58c6c59ad0a4991', 'Monsieur', '2022-05-27 15:22:41', 'Benhachem', 'Moulay ihfid', ' Anderlecht rue Démosthène 20', 'benmoulay1@yahoo.fr', '0474 793798', 'Benhachem', 'Malak', 'F', '2021-01-12', NULL, 'les muguets à Anderlecht', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Mes deux premières filles( jumelles) n\'ont pas eu la chance d\'avoir des places à l\'ISND qui reste une des meilleure à Anderlecht voir sur toute la région Bruxelloise,je souhaite que leur petite sœur', NULL, '', '', 'rvInscription'),
(696, 'dc550c383bedd707b8a0e3200f13731f', 'Madame', '2022-06-13 16:55:58', 'insi', 'soraya', 'Avenue des tamaris 43 F1', 'soraya10.70@hotmail.com', '0499 365650', 'Reguigue', 'Rahel', 'F', '2020-10-04', NULL, 'Crèche Erasme route de lennik 808 1070 Anderlecht ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(701, '6a6342f546697b5d430322e2498daa3f', 'Madame', '2022-06-21 13:45:17', 'Goeman', 'Megan', 'Koersweide n13', 'megan.goeman@hotmail.com', '0471 654792', 'El Yassini Goeman', 'Mathis', 'M', '2019-09-08', '', 'Les capucines ', 'Drèves des agaves ', 'Immersion Neerlandais ', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'attente'),
(702, 'a5033dbce8b0b474eda495c155b706cf', 'Monsieur', '2022-06-22 22:05:15', 'GERGELE', 'Guillaume', 'Allée des lilas 24, Bte 19; 1070 ANDERLECHT', 'g.gergele@gmail.com', '0470 920238', 'GERGELE', 'Elena', 'M', '2020-12-24', NULL, 'Creche les bleuets', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', 'Elena GERGELE', '', 'rvInscription'),
(704, '34e3d98637f966b1a5382774bb5fed80', 'Madame', '2022-06-24 14:12:23', 'Ahdi', 'Samia', 'Avenue de scheut 60', 'ahdisamia@gmail.com', '0489 331497', 'Temsamani Nya', 'Akram', 'M', '2021-03-11', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'J\'aimerai inscrire mon fils en acceuil maternelle pour l\'année 2023-2024 sur votre liste d\'attente ', NULL, '', '', 'confirmeMail'),
(708, 'b6b8250a5bd358ae191a594e6109a89a', 'Monsieur', '2022-06-28 11:12:59', 'LANGENDRIES', 'BRUNO', 'RUE LOUIS VAN BEETHOVEN 65\r\n1070 BRUXELLES', 'bruno-langendries@hotmail.com', '0474 601363', 'LANGENDRIES', 'AARON', 'M', '2020-05-14', '', 'pas de crèche', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(715, 'b94216b9d5fe1a99ae2ea24ffffe83aa', 'Madame', '2022-07-07 13:53:34', 'Azzaoui', 'Samia', 'Rue du Hainaut 21\r\n1420 Braine L’alleud (adresse provisoire)', 'samia.azzaoui91@gmail.com', '0489 133341', 'Zabata', 'Leya', 'F', '2021-01-04', NULL, 'Crèche des coquelicots \r\nAllée des Coquelicots 9 à 1070 Anderlecht \r\n', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(716, '7a9c23d906bc378fa3ca9b400dd17d29', 'Madame', '2022-07-10 20:41:54', 'Viola', 'Alissia', 'Parc jean monnet, 4100\r\n4122', 'viola.alissia@hotmail.com', '0479 345169', 'Mertens', 'Maellia ', 'F', '2020-09-02', '', 'Crèche les p\'tits loups ', 'Aucune', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Bonjour, nous souhaiterions inscrire notre fille Mertens Maellia pour une entrée scolaire pour septembre 2023. \r\nDans l\'attente de vous lire.\r\nMerci d\'avance. \r\nViola Alissia ', 'M', 'Mertens Maellia ', '', 'annule'),
(719, 'b4e044982ebb5f0760f8ffea3f35892b', 'Monsieur', '2022-07-29 18:24:41', 'Kenawy', 'Ragab', '1 avenue Frans van Kalken 1070 Anderlecht ', 'ragab.kenawy@gmail.com', '0483 657215', 'Kenawy Esstouhy', 'Alia', 'F', '2021-10-22', NULL, 'Ne va pas à la crèche ', 'Demande pour entrée en classe d’accueil 2023-2024', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(721, '132b04a8e0bb0eac218b6c88ed3fb9e9', 'Madame', '2022-07-31 15:32:55', 'ALLIOUX', 'Emmeline', '126 rue du Broeck', 'emmeline.allioux@gmail.com', '0032474024105', 'de la Vega Allioux', 'Malena', 'F', '2020-12-18', NULL, 'Crèche 123 Piano à 23 rue de Formanoir, 1070 Anderlecht', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(722, 'a123784f16b2af22cfd82f0140661618', 'Monsieur', '2022-08-01 19:47:30', 'EL GOUR', 'ANOUAR', 'Rue jean morjau 30 \r\n1070 anderlecht ', 'elgouranouar@gmail.com', '0479 663685', 'EL GOUR', 'ISMAIL', 'M', '2020-12-04', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Bonjour Mme Mr \r\nJ aimerai bien inscrire mon fils dans votre école, Dans l\'attente d\'une réponse que j\'espère favorable, je vous prie de recevoir, Madame, Monsieur, mes salutations distinguées.', NULL, '', '', 'rvInscription'),
(723, 'd242a1bf5999d10d8690c818048eaa72', 'Madame', '2022-08-07 11:45:03', 'Durand', 'Amelie', 'Avenue Frans Van Kalken 4, bte 35\r\n1070 Anderlecht ', 'amelie_durand@hotmail.com', '0487 716232', 'Marette', 'Kélio', 'M', '2021-03-08', '', 'Crèche Sainte-Geneviève\r\nAvenue Eudore Pirmez 49\r\n1040 Etterbeek', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(725, '591e3b6c58fe648824ab8636bdc4b5e1', 'Monsieur', '2022-08-17 12:23:59', 'AIT MOULAY', 'Hassan', 'avenue des Tamaris 43 boite J6, 1080 Molenbeek', 'hassanait5@gmail.com', '0488 277821', 'AIT MOULAY', 'Aya', 'F', '2020-10-31', NULL, 'Quelques rendez-vous et inscription sur liste d\'attente. Pour le moment, nous n\'en avons pas encore trouvé', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Bonjour, il s\'agira d\'une inscription pour la rentrée 2023-2024', NULL, '', '', 'rvInscription'),
(728, 'c92711fb30a2755796a6caffc0b4e675', 'Madame', '2022-08-21 22:43:58', 'Jderu', 'Loredana', 'Chaussee de Mons 508 ,1070', 'jderu.loredana1@gmail.com', '0487 258718', 'Iordache', 'Ariana', 'F', '2020-07-31', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'sansReponse'),
(734, '5566900bc53f19ed5648e39e12c7e583', 'Madame', '2022-08-28 13:18:39', 'Narainsamy', 'Catherine', 'Avenue Limbourg, 48, 1070 Anderlecht ', 'cnarainsamy@gmail.com', '0473 542727', 'Rodriguez Lopez Narainsamy ', 'Joaquim', 'M', '2020-03-13', '', '', 'La Colombe Ganshoren', 'Proximité domicile et déjà l’aînée à l’ISND ', NULL, NULL, NULL, NULL, NULL, NULL, '', 'P', 'Rodriguez Lopez Narainsamy Nina Maria', 'P2A', 'inscription'),
(735, '58094b1af7a0e52a652c688d9a4972d3', 'Madame', '2022-08-28 18:46:57', 'Ngamgne Fokam', 'Suzy Liz Fanny ', 'Rue Maurice Albert Raskin 47,1070 Anderlecht', 'fannyfok3@gmail.com', '0465 903270', 'Ngamgne Fokam', 'Mary-Queen Flore-Pétra', 'F', '2018-05-09', '', '', 'Les Goélands ', 'Recherche d\'un programme en immersion. Et votre programme me parle beaucoup . ', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(739, 'c892b43ea410c5722e586355dd5b47dc', 'Madame', '2022-08-29 09:13:47', 'Teuchy', 'Vanessa', 'Hof ter Puttenlaan\r\n20', 'vanessat@hotmail.be', '0486 844430', 'Macken', 'Lena', 'F', '2021-04-01', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', '', '', 'confirmeMail'),
(740, 'cf8935d5f9c0c33df64d9a699c8efc67', 'Madame', '2022-08-29 09:36:01', 'Teixeira da silva ', 'Vera Patrícia ', 'AVENUE MARC HENRI VAN LAER 82 ANDERLECHT ', 'veralixa@hotmail.com', '0472 866067', 'SILVA PIRES ', 'LUCAS RAFAEL ', 'M', '2016-11-30', '', '', '', 'Demenagement Portugal ', NULL, NULL, NULL, NULL, NULL, NULL, 'Yasmin cest ma cousine et mon fils conais pas de enfants je espere reentre dans la meme classe que yasmin de classe md paqui merciHQ', 'M', 'MACHADO DE Almeida', 'MPAQUi', 'annule'),
(742, '79bc57c1c6e505a6ac11ecc1f541c8cb', 'Madame', '2022-08-29 10:42:48', 'RHEINDORF ', 'ALEXANDRA', 'AVENUE DU ROI SOLDAT 94 BOITE 6 - 1070 ANDERLECT', 'alexandra.rheindorf@gmail.com', '0497 499694', 'Méllina', 'MOSTEFA RHEINDORF', 'F', '2021-06-10', '', 'LES BLEUETS', 'CRECHE LES BLEUETS', '1ere inscription', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(743, '0a02d4afd6203887beca61e1a156b583', 'Madame', '2022-08-29 14:36:53', 'Van velthem', 'Melissa ', 'Rue des loups 60 ', 'melissssa.bouh@hotmail.com', '0485 502176', 'Hammenecker ', 'Mathéo ', 'M', '2020-07-31', NULL, 'Les jasmins ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(744, '44edbb42b410d5242c5bb639a5b134d1', 'Madame', '2022-08-31 09:33:04', 'Mechboua ', 'Siham', 'Rue François ysewyn 65 3A ', 'siham08_04@hotmail.fr', '0484 583635', 'Bouzian', 'Leyla', 'F', '2020-03-05', '', '', 'Imi', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(745, 'da7271a03a97a98b1f8d142c9ac01fdf', 'Madame', '2022-08-31 11:58:41', 'Ahraoui', 'Chaimae', 'Avenue Gounod,\r\n44', 'sheymahraoui@hotmail.fr', '0489 897377', 'Azehaf ', 'Rayhan', 'M', '2021-03-04', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(747, '5e7afc64f00a1ec28f71063aa7b189a3', 'Monsieur', '2022-09-01 00:01:21', 'ARI', 'Hakan', 'Rue de l\'obus 163 1070 Anderlecht', 'hakan.ari@gmail.com', '0478 819146', 'ARI', 'Selen', 'F', '2020-08-02', '', '1 2 3 Piano', 'N/A', 'N/A', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'sansReponse'),
(748, 'b3c0fd7fad8c67b362ad115abeadc742', 'Madame', '2022-09-01 00:09:29', 'Payen', 'Christine', '45 rue Henri Caron Boîte 4 1070 Anderlecht', 'payenchr@gmail.com', '0479 594486', 'Mostert Payen', 'Manon', 'F', '2020-09-02', NULL, '123 Piano Rue du Formanoir 23 1070 Anderlecht', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Inscription en 1er maternelle pour l\'année 2023-2024', NULL, '', '', 'rvInscription'),
(749, '8a5202c10184f9b04cfcce3e6fb59732', 'Monsieur', '2022-09-01 07:31:08', 'Bedia Sobrecueva', 'Juan', 'Chaussée de Mons, 664\r\n1070 Anderlecht', 'kodiak42@gmail.com', '0473 467121', 'Bedia Vialars', 'Félix', 'M', '2020-04-18', '', 'La Parent Thèse', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(755, 'd125b1765e2ad663d98945f91157cebc', 'Madame', '2022-09-07 09:21:53', 'El hamdaoui', 'Fatiha', 'Place de Sainte-Adresse 5', 'oumsabrirania@gmail.com', '0477 367775', 'El aachouch ', 'Isshaq', 'M', '2020-08-18', '', 'Accueillante d enfants travaillant  pour Ballon rouge boulevard de l abattoir ', 'Crèche ', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Nous avons aussi un enfant en secondaire a l isnd en immersion, qui a fait l isnd primaire. Ma fille est également en classe d immersion, donc si possible une place en immersion svp', 'P', 'El aachouch Rania', '4eA ', 'inscription'),
(756, 'a12ab0b8a1683bdbc8971f888c98ceae', 'Madame', '2022-09-07 20:35:05', 'Romaniuc', 'Alina', 'Boulevard Felix Paulsen', 'alinaromaniuk@inbox.ru', '0495 438192', 'Tepe', 'Anna - Melissa', 'F', '2021-01-08', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Madame, Monsieur \r\n\r\nJe souhaiterai inscrire mon enfant en maternelle dans votre établissement. \r\nDans l attente d une réponse,  je vous prie d agréer mes sincères salutations. \r\n\r\nMme Tepe', NULL, '', '', 'confirmeMail'),
(757, '60d84525559ec448ac1f92bdf974c0be', 'Madame', '2022-09-11 14:07:45', 'Ahaddad ', 'Mina', '1070', 'melwanamhal@gmail.com', '0486 643256', 'Amhal ', 'Djilali-Jamâa ', 'M', '2021-06-01', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(758, 'f9411965348780d7cf3b71eda69014f7', 'Monsieur', '2022-09-13 09:28:44', 'nzuzi mulamba', 'cedric', '167 rue du broeck\r\n', 'nzuzi_cedric@outlook.fr', '0478 906081', 'Nzuzi mulamba', 'kelya', 'F', '2019-08-20', '', 'petit train olina\r\nRue d\'Enghien 51, 1080 Molenbeek-Saint-', 'ecole 15 molenbeek', 'souahite de regroupée tous les enfant a la meme ecole', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'attente'),
(760, 'e43d1dbd0f2d8079dfc7f4ac9e2eee02', 'Madame', '2022-09-14 09:10:42', 'Himeur ', 'Fatima ', 'Rue James Ensor 53 1070 Anderlecht ', 'fatimazahra.himeur@hotmail.fr', '0489 374004', 'El Amraoui ', 'Mohammed-Ali ', 'M', '2021-06-17', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(761, 'ee2d835999543fa2c075190365ea728d', 'Madame', '2022-09-15 10:16:09', 'Balid', 'Aline', '155 rue de grand bigard ', 'aline-balid@hotmail.fr', '47 0978818', 'Kalaji', 'Nader', 'M', '2021-07-03', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(763, '9de41f1b3e5e2ee7db73817b4ce60006', 'Madame', '2022-09-15 14:04:34', 'Rodrigues de Morais ', 'Juliana ', 'Brogniez número 27 anderlecht\r\n27', 'julianarodriguesdemorais01@gmail.com', '0467 786752', 'Rodrigues de Morais ', 'Yasmin', 'F', '2018-03-02', '', '', 'Saint Marie ', 'Le manque d\'organisation et d\'enseignement n\'est pas bon. L\'enseignement est faible. Les professeurs manquent beaucoup. La porte de l\'école est toujours ouverte, mettant la vie des enfants en danger. ', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(764, '9b5167e45439e6bbaece596bb30fb80e', 'Madame', '2022-09-17 08:09:14', 'Marin', 'Axelle', 'Rue de la laiterie 80 1070 Anderlecht ', 'axellemariin@icloud.com', '0487 255325', 'Pietrons ', 'Maylonn ', 'M', '2021-06-16', NULL, 'Les petits poucet', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', '', '', 'confirmeMail'),
(768, 'c3b71bab979b0602a3d1f96439424982', 'Monsieur', '2022-09-19 09:55:59', 'Sawhney ', 'Pummy', 'Rue de la laiterie 86 boîte 16\r\n1070 Bruxelles ', 'pummysawhney@hotmail.com', '0493 400274', 'Sawhney ', 'Siya', 'F', '2020-07-12', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(770, '231ab4e1c6750cb5b5bf54d0facc0c72', 'Madame', '2022-09-19 12:15:39', 'Badie mossi ', 'Mariama', 'Lieutenant liedel 89\r\nRue lieutenant liedel89', 'Issoufourawda@yahoo.com', '32466473150', 'Issoufou ', 'Rawda', 'F', '2020-04-05', '', 'Crèche les muguets , rue du transvaal 30,1070', 'Ecole de la roue rue van winghen 11,1070', 'Je me suis renseigner un peu tard on ma conseiller dinscrire ma fille dans votre establishment parceque vous enseigner bien ya la rigueur et jespere obtenir de la place pour ma fille au plus vite ', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'sansReponse'),
(771, '3f26cb6cccadc951f065772aa33f1214', 'Madame', '2022-09-19 19:12:12', 'Azirar', 'Hâyat ', 'Avenue Raymond vander bruggen 49', 'hayatazirar94@hotmail.com', '0485 165976', 'Guerbaoui ', 'Wael ', 'M', '2020-12-13', '', 'Olina \r\nQuai du charbonnage 86', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'rvInscription'),
(772, '53b82a3a0f73defe7dae4c376467c207', 'Madame', '2022-09-19 22:35:20', 'Addamo ', 'Marilena', 'Boulevard de la révision 6 , 1070 Anderlecht.', 'marilena_addamo@msn.com', '32484413766', 'Di termini', 'Eros', 'M', '2021-04-21', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(773, '4a4ae50cc7d02e49abcd2f52f02cb1d9', 'Madame', '2022-09-20 08:34:24', 'Ciszkowska', 'Klaudia', 'Avenue docteur Zamenhof 18/101', 'klaudiakul@yahoo.fr', '0499 434800', 'Ciszkowski', 'Leon', 'M', '2020-09-04', '', 'Crèche War memorial, rue Antoine Gautier 60, Etterbeek', '', 'Inscription en classe accueil/maternelle ', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'sansReponse'),
(775, 'ed52310869c67b2d6fc416c1c03ad1e2', 'Monsieur', '2022-09-21 18:15:15', 'Nguyễn', 'Tấn Tài', 'Rue de Veeweyde 140', 'tainguyen6894@gmail.com', '0486 041626', 'Nguyễn', 'Gemma', 'F', '2020-08-27', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Bonjour, je souhaite inscrire pour ma fille chez vous, votre école est très idéal pour ma fille car nous habitons à proximité de l\'école et nos voisins me propose beaucoup. Bonne journée. Cordialement', NULL, '', '', 'rvInscription'),
(776, 'c857ce8836e56ec4765f8e29ea040562', 'Monsieur', '2022-09-21 19:45:25', 'Bassiaux ', 'Ali ', 'A.v. victor Olivier 14/boite 52/1070 anderlecht ', 'ali.bassiaux@outlook.com', '0496 850517', 'Bassiaux ', 'Naila ', 'F', '2020-06-07', '', 'L\'ARBRE á papillons place Lemmens 21, 1070 anderlecht ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'attente'),
(777, '6bd01af7e933b50f6c03c4e2786b5a1c', 'Madame', '2022-09-25 00:12:13', 'BIKANGU LUPINDA', 'ROSE', 'Chaussée de Gand 1161/01, 1082 BERCHEM SAINTE-AGATHE', 'bikangur@yahoo.fr', '0467 856641', 'PETEYAP BIKANGU LUPINDA', 'ANAELLE', 'F', '2020-03-06', NULL, 'BARBARA\r\nBoulevard LEOPOLD II 282, 1081 KOEKELBERG', 'BARBARA\r\nBoulevard LEOPOLD II 282, 1081 KOEKELBERG', 'Déménagement', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(778, '42140856a72b83a053223d7326ace8d0', 'Madame', '2022-09-26 14:25:43', 'AOUAM', 'Samira', 'Route de Lennik 286B - bte 3\r\n1070 Anderlecht', 'arkiza.08reda@gmail.com', '0465 850666', 'ARKIZA ', 'Marwah', 'F', '2020-08-07', NULL, 'Kiekeboe 1 \r\nRue de Danemark 15\r\n1060 Saint-Gilles', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Souhaite inscrite ma fille en 1ère maternelle pour 09/2023', NULL, '', '', 'confirmeMail'),
(779, '89e7818c7c55a2be30d58c50511b52fc', 'Monsieur', '2022-09-27 09:11:15', 'Bouchoiri ', 'Daoud', 'Rue Félicien Rops 39B/13\r\n1070 Anderlecht ', 'dbouchoiri@outlook.com', '0484 159472', 'Bouchoiri ', 'Jouneyd', 'M', '2020-06-06', NULL, 'Les petits bateaux \r\nDigue du canal 113,\r\n1070 Anderlecht ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Entrée en classe d\'accueil ', NULL, '', '', 'confirmeMail'),
(782, '393851fb210e49fbc983c0770375cd10', 'Madame', '2022-10-02 10:21:25', 'Cândida pinto Guimarães ', 'Débora ', 'Rue Victor rauter 232', 'debora_cristina1989@hotmail.com', '0465 719190', 'Guimarães ', 'Lara ', 'F', '2020-05-07', NULL, 'Crèche capucine ', 'ne va toujours pas à l\'école', '', NULL, NULL, NULL, NULL, NULL, NULL, 'bonjour j\'ai vraiment besoin d\'une inscription ma fille près de chez moi', 'M', 'Lara Guimarães ', '', 'confirmeMail'),
(784, 'a1ca31e3e838d89521c2f985c6d6e60c', 'Madame', '2022-10-07 04:18:57', 'Voinea ', 'Diana ', 'Avenue Paul Janson 87', 'dianacastellano768@yahoo.com', '0460 944775', 'Voinea', 'Anelisse', 'F', '2020-12-14', NULL, 'Crèche 123 piano \r\nRue de formanoir 23', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', '', '', 'confirmeMail'),
(785, '725e200b72a7d1e16508afbb9c04c824', 'Monsieur', '2022-10-10 08:51:58', 'Rezaye ', 'Davod', 'Allée de la villa romaine,9/bt1/1070 ', 'davodrezaye@gmail.com', '0466 435229', 'Rezaye ', 'Noyan', 'M', '2020-12-01', NULL, 'No', 'No', 'Pas de motivation car son première inscription ', NULL, NULL, NULL, NULL, NULL, NULL, 'Je voudrais inscrire mon fils pour l\'année prochaine en septembre 2023. ', 'M', 'Rezaye', 'Nayon ', 'confirmeMail'),
(787, '37cabd438a4d1ca1a31ef68f506bbdf1', 'Madame', '2022-10-11 09:53:31', 'AHRAOUI', 'Chahrazade', 'rue erasme 33, 1070 Anderlecht', 'chahrazade.ahraoui@gmail.com', '0488 023025', 'BOUZIANE', 'Issam', 'M', '2021-03-17', NULL, 'Crèche les Camélias\r\nAvenue de Saio 20\r\n1070 Anderlecht', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(788, 'cb343f0b5b5ed31d431c13f31b03408b', 'Monsieur', '2022-10-11 10:43:20', 'TRAN', 'Tam', '49, rue Buffon - 1070 Anderlecht', 'vanettam2020@gmail.com', '0473 177250', 'TRAN', 'Vinh Théo', 'M', '2021-09-16', NULL, 'O P\'tits Câlins (Bd Sylvain Dupuis 191, 1070 Anderlecht)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Notre enfant est né en septembre 2021, pour quelle rentrée scollaire pourrait-il être inscrit ?', NULL, '', '', 'confirmeMail'),
(789, '2f83f5be44fc5ddd7e23ab24c29a9a0d', 'Madame', '2022-10-12 23:31:52', 'constantino', 'grace', 'rue de la marchandise 1060', 'constantino.gracechristine@gmail.com', '0494 374785', 'kim', 'bayne', 'M', '2021-07-01', NULL, 'les momes', '', 'demenagement a anderlecht', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(790, '980cb7b20f8d18c6ac37dc3dbadbeddf', 'Madame', '2022-10-14 15:17:33', 'Boamran', 'Atika', 'clos des pleurotes 3\r\n1070 Anderlecht', 'mayjane@live.fr', '0484 293760', 'Jdia', 'Ambrine', 'F', '2021-03-21', NULL, 'Crèche les 2 Moiselles\r\nrue dubois Thorn', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(793, 'f66c732166c548eebd27e6ac1d67bf5b', 'Madame', '2022-10-18 13:45:02', 'Djebara ', 'Narimene ', 'Chaussée de mons 816 boîte 48 ,anderlecht 1070', 'ninadz1984@gmail.com', '0493 486888', 'Fraoui djebara ', 'Mirhan', 'F', '2019-08-18', '', '', 'Steinerschool brussel \r\nSint janskruidlaan 14, anderlecht 1070', 'Insalubre, très sale, abandonné ,abîmé et quand il pleut c la catastrophe ', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(798, '81a4635c0510c10e0a00260768b14e3a', 'Madame', '2022-11-07 11:54:05', 'Mascia', 'Carla Brunella', 'rue du savoir 11, 1070 Anderlecht', 'masciacarla@hotmail.com', '0497 938600', 'Ukaba Bahati', 'Inaya Kabazungu Francesca', 'M', '2021-09-10', NULL, 'crèche de l\'ULB avenue Antoine Depage 31 – 1000 Bruxelles', 'pas d\'école (enfant est à la crèche)', 'pas de changement d\'école (enfant est à la crèche)', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(801, 'e262092a20bccea5285315dcd10182e3', 'Madame', '2022-11-10 13:22:46', 'Vandenberghe', 'Emma Myriam', 'Rue du Belvédère 22, 1050 Ixelles \r\n(changera probablement d’ici l’entrée à l’école)', 'emmavdg7@gmail.com', '0470 985809', 'Vandenberghe Pambani', 'Aaron-Cash', 'M', '2021-03-20', NULL, 'Crèche le nid', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Je ne compte pas rester habiter sur ixelles. Je pense déménager avant l’entrée à l’école de mon fils ou très peu de temps après. ', NULL, '', '', 'confirmeMail'),
(802, '335f214b9e68eb66d86d508e83bf894e', 'Madame', '2022-11-14 08:09:54', 'WAY', 'Agnès', 'Rue Walcourt 152 boite 23 1070 Anderlecht', 'waycarolagnes@yahoo.fr', '0492 228359', 'Matthys', 'Aïvi', 'M', '2021-02-22', NULL, 'Les coquelicots (1070)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(805, 'e4e39238c17c1efa2f40e24a2fb358e5', 'Madame', '2022-11-24 19:09:00', 'Benaïssa', 'Rajaa', 'Rue d’Aumale 86, 1070 Anderlecht ', 'benaissarajaa92@gmail.com', '0492 084432', 'Boudlal ', 'Ritaj', 'F', '2020-12-20', NULL, 'Pas de crèche ', 'Première entrée ', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', '', '', 'confirmeMail'),
(806, '0c431a18fa756df2bbfb7ce9517277b7', 'Madame', '2022-11-25 17:50:43', 'test', 'test', 'test', 'ymairesse@sio2.be', '0474 754696', 'test', 'test', 'F', '2019-11-25', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(808, '90dab2fa2aff3a116782e08b6847572a', 'Madame', '2022-11-30 15:34:20', 'Batista dos Santos Silva', 'Deisiane', 'rue brogniez 27, anderlecht ', 'deborahthalitac@gmail.com', '46 5303057', 'dos Santos Silva', 'Ezequiel', 'M', '2018-10-30', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'inscription'),
(809, '07f7ef572b9458bf9a59d8db4bf273e1', 'Madame', '2022-12-01 13:23:27', 'Peeters ', 'Céline ', 'Boulevard Jules graindor 35 à Anderlecht ', 'celine.peeters@gmail.com', '0472 030664', 'Hafner Taymans ', 'Siméon ', 'M', '2020-11-11', NULL, 'Les mélodies d\'olina rue de Geneffe 22 à 1080 Molenbeek ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(810, '1e3771b613b5e71ac60bc6ab1096642c', 'Madame', '2022-12-01 16:36:08', 'Proux Malotaux ', 'constance', '80 rue du lieutenant Liedel ', 'constanceproux@gmail.com', '0493 996779', 'Malotaux', 'Clarence', 'M', '2021-02-01', NULL, 'Crèche du béguinage , 1000 Bruxelles ', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(811, 'f31a6a834d122a0ef5c4d220f4bb7c72', 'Madame', '2022-12-06 11:00:18', 'Boutouba', 'Farida', 'Avenue de la persévérance  15/6', 'faridaboutouba@hotmail.com', '0485 304634', 'Medjdoub', 'Yassine', 'M', '2020-03-09', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(812, '1d0f1943475ab783c2866c387f9405b2', 'Madame', '2022-12-08 14:41:23', 'El kandouchi', 'Chaymae', 'Assesteenweg 141 Ternat', 'Elkandouchi.chaymae@outlook.com', '0488 900285', 'Chaymae El kandouchi', 'Akandouch Youssef', 'M', '2019-03-26', NULL, '\r\n/', 'École openveld\r\n', 'Afin de ne fermer \"aucune porte \"pour la vie futur de mon enfant, j\'aimerai qu\'il soit dans une école en immersion afin qu\'il puisse parler les deux langues (le français et le néerlandais).', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(813, '2042121f4b2934e9dd4add3a530e0e25', 'Madame', '2022-12-08 14:46:54', 'El kandouchi', 'Chaymae', 'Assesteenweg 141 Ternat', 'Elkandouchi.chaymae@outlook.com', '0488 900285', 'Akandouch ', 'Youssef', 'M', '2019-02-26', NULL, '/', 'École openveld \r\nRue openveld, Berchem-Sainte-Agathe ', 'Afin de ne fermer aucune \" porte \" pour la vie futur de mon enfant, j\'aimerai qu\'il apprenne les deux langues (le français et le néerlandais)', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(814, '3a26c0ee2ff6f569f83231c4524b5463', 'Madame', '2022-12-08 14:50:06', 'El kandouchi', 'Chaymae', 'Assesteenweg 141 Ternat', 'Elkandouchi.chaymae@outlook.com', '0488 900285', 'Akandouch ', 'Abdellah ', 'M', '2021-07-28', NULL, '/', '/', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(815, '4d5d47abb557facd1f3cfe4447d9c5cd', 'Madame', '2022-12-12 12:05:07', 'Celik', 'Semiha', 'Avenue Venizelos 25A boite 2\r\n1070 Anderlecht', 'semiha.cbox@gmail.com', '0485 892588', 'Demni', 'Zahra', 'F', '2021-12-09', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'annule'),
(816, 'e1696518d5891ee8dc8dd82c909f0d2f', 'Madame', '2022-12-12 12:13:43', 'Celik', 'Semiha', 'Avenue Venizelos 25A boite 2\r\n1070 Anderlecht', 'semiha.cbox@gmail.com', '0485 892588', 'Demni', 'Zahra', 'F', '2021-12-09', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'Bonjour,\r\nCe sera pour une inscription en première maternelle.\r\nCordialement,', NULL, '', '', 'confirmeMail'),
(817, '205373949663943d95cd8e2e9880071b', 'Monsieur', '2022-12-12 16:25:37', 'TILQUIN', 'Boris', '27 Avenue des saisons 1050 Ixelles', 'boristilquin@hotmail.com', '0474 293444', 'TILQUIN', 'Zita', 'F', '2021-01-08', NULL, 'Les Alouettes', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(819, '0671b2f0d79564cbff92aa1b318bd56d', 'Madame', '2022-12-15 00:29:34', 'IDRISSI', 'Fatine', 'rue Edouard Branly 9', 'fatine-idri@live.fr', '0488 366630', 'Smouni ', 'Waël', 'M', '2021-09-04', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(820, 'e51ddd346b8453760d8af22f9d2da2cb', 'Madame', '2022-12-19 13:03:47', 'Douiri', 'Najat ', 'Rue Victor rauter 34 boîte 52 anderlecht 1070', 'jad-11@hotmail.com', '0465 404845', 'Lazar ', 'Safouane ', 'M', '2021-07-22', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(821, '9257ef60308abefd40f39c0adc4e9b13', 'Madame', '2022-12-19 20:13:01', 'Balon', 'Sandrine', 'Rue des Parfums, 18', 'sandrine.balon@gmail.com', '0497 106199', 'Squoquart ', 'Rose', 'F', '2021-02-14', NULL, 'Le Jardin d\'Elmer, Rue Démosthène 111', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', 'confirmeMail'),
(823, 'abe7df39ec826bfab7f592e9e2746d37', 'Monsieur', '2022-12-20 23:07:10', 'LAAKEL HEMDANOU', 'Hakim', 'Théodore Bekaert 6, 1070 Anderlecht', 'LAAKEL@live.be', '0496 273162', 'LAAKEL HEMDANOU', 'Yasmine', 'F', '2021-01-29', NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '', 'M', 'LAAKEL HEMDANOU Isaac', '3e mat', 'confirmeMail');

-- --------------------------------------------------------

--
-- Structure de la table `mater_secretariat`
--

CREATE TABLE `mater_secretariat` (
  `id` varchar(32) NOT NULL,
  `dateRV` varchar(10) DEFAULT NULL,
  `heureRV` varchar(5) DEFAULT NULL,
  `texteStatut` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mater_secretariat`
--

INSERT INTO `mater_secretariat` (`id`, `dateRV`, `heureRV`, `texteStatut`) VALUES
('b5d4a11a3311a9a2c51c5284754d5ba7', '', NULL, 0x4ec2b0206e6f6e2061747472696275c3a93c62723e3c2f703e3c703e4d616d616e206120617070656cc3a920656c6c6520617474656e64206176656320696d70617469656e636520756e6520706c6163652e204a65206c75692061692064697420717527656c6c6520c3a974616974206c612073756976616e7465204d3120737572206c61206c6973746520),
('ed52310869c67b2d6fc416c1c03ad1e2', '', NULL, 0x342064656d616e64657320656e766f79c3a9657320646570756973206c652031392f30312f32303232),
('8a5202c10184f9b04cfcce3e6fb59732', '', NULL, 0x332064656d616e64657320656e766f79c3a965732030312f31302f32303231),
('5e7afc64f00a1ec28f71063aa7b189a3', '', NULL, 0x6d65737361676520766f63616c206c652032322f31322f323032323c62723e3c2f703e3c703e332064656d616e64657320656e766f79c3a96573206465707569732032332f31312f32303231),
('c857ce8836e56ec4765f8e29ea040562', '', NULL, 0x322064656d616e64657320656e766f79c3a965732030382f30362f32303232),
('d7808f5e83afb5a29118f773656e4b95', '', NULL, 0x6d65737361676520766f63616c2032322f31322f32303232),
('bda4f6912038f7e60a1ffa7858f137b2', '', NULL, 0x6d65737361676520766f63616c206c652031322f31322f323220706f75722064656d616e64657220626f6e6e652064617465206465206e61697373616e6365),
('cf8935d5f9c0c33df64d9a699c8efc67', '', NULL, ''),
('6a6342f546697b5d430322e2498daa3f', '', NULL, 0x736f65757220c3a020696e73637269726520656e207072696d6169726520323031373c2f703e3c703e4a2761692064656d616e64c3a920c3a0207665726f20706172206d61696c207327696c20656c6c6520617661697420756e6520706c616365),
('1ac0d16ef8244f307cc2f4b79bc0e0d7', '', NULL, 0x696e73637269742064616e7320756e6520617574726520c3a9636f6c65206d616d616e206e6f75732072617070656c6c652063617220696e74c3a972657373c3a9652032322f31322f32323c62723e3c2f703e3c703e4d616d616e20c3a020617070656cc3a9206c652032342f303320706f7572207361766f6972206fc3b920656c6c652065737420737572206c69737465206427617474656e74653c703e3c2f703e3c703e65742072617070656c20656e206a75696e2032382f30362f32303232),
('2459f612370cb67e4fef4fe6a5201d94', '', NULL, 0x64656d616e64652072656e766f79c3a965206c652031392f30343c2f703e3c703e68616269746520746f7574207072c3a8732c2076657574206162736f6c756d656e7420756e6520706c616365),
('9fd879cd87c489f900f47f97d39182cf', '', NULL, ''),
('4a4ae50cc7d02e49abcd2f52f02cb1d9', '', NULL, 0x6d65737361676520766f63616c206c652032322f31322f32303232),
('231ab4e1c6750cb5b5bf54d0facc0c72', '', NULL, 0x6d65737361676520766f63616c206c652032322f31322f32303232),
('d125b1765e2ad663d98945f91157cebc', '', NULL, ''),
('9637a64488fb187f44d1be2c84d8803e', '', NULL, 0x617574726520c3a9636f6c65),
('72ade41c0dde8298c832ca2bd6bd877d', '', NULL, ''),
('79bc57c1c6e505a6ac11ecc1f541c8cb', '', NULL, 0x6d61696c20706f7572206469726520717527696c206e27792070617320646520706c616365266e6273703b20636574746520616e6ec3a96520656e206163637565696c2e206c652032322f31322f323032323c2f703e3c703e4a65206761726465206c612064656d616e646520706f7572206d3120323032332f32303234),
('6fb53a69657b70776ac8451fbe717c64', '', NULL, 0x636f75727269657220656e766f79c3a92031302e30312e3232),
('28b3104cda86dcbdc4f3032998df88d0', '', NULL, ''),
('e9afd65e0153dbaf90cd690cd32223b3', '', NULL, ''),
('c299962dd0054a9a3ad3a3c818e7327f', '', NULL, ''),
('beca95a62cb1e1a82542bfadf095a369', '', NULL, ''),
('b9097102be056a02bde653aedb0efb29', '', NULL, ''),
('9d0c0d0c8f74bacfade09d13580fcf7d', '', NULL, 0x617574726520c3a9636f6c65),
('b6b8250a5bd358ae191a594e6109a89a', '', NULL, 0x617574726520c3a9636f6c65),
('7a9c23d906bc378fa3ca9b400dd17d29', '', NULL, 0x6e646c73),
('c92711fb30a2755796a6caffc0b4e675', '', NULL, 0x6d65737361676520766f63616c2032322f31322f32303232),
('4cd386d64aa1a6453ede7d290777c65e', '', NULL, 0x6d657373616765206c61697373c3a920706f7572206c612064617465206465206e61697373616e63652032322f31322f32303232),
('19b5043b8b055e6bdd56b905c05a3962', '', NULL, ''),
('2ba2ceff4030d29481ae54ab5ea24642', '', NULL, ''),
('a551e1e5d83752c5b92f7ffcd939f6fe', '', NULL, ''),
('832dda7af58c6ca45e59c536a0df3955', '', NULL, ''),
('491889609b4893a8a43d36c151dbb55e', '', NULL, 0x6d65737361676520766f63616c2032322f31322f3232),
('bfeadb8bc3dd6ccf522134c1129eae49', '', NULL, ''),
('2ae6866cbd77028d10d7303128e2f959', '', NULL, ''),
('7005da472130e205e333d87d637d6953', '', NULL, 0x65746f75722065737061676e65),
('2edecc70978ad878efc6667946218f48', '', NULL, 0x617574726520c3a9636f6c65),
('ac3f76fe890f641bcb0423ed7a5bb0d4', '', NULL, 0x6d65737361676520766f63616c2032322f31322f32303232),
('4002abed12fafed40750664b0d1c7aa2', '', NULL, ''),
('c96bf7fcff20507bc3902694ce7a0ad9', '', NULL, 0x617574726520c3a9636f6c65),
('7588debda687943680b4ef76cf42dc41', '', NULL, 0x617574726520c3a9636f6c65),
('f31a6a834d122a0ef5c4d220f4bb7c72', '', NULL, 0x646f75626c6f6e),
('a38ee2b8c3a48bfdf3d9750e17ca7b80', '', NULL, 0x617574726520c3a9636f6c65),
('a8bfa0903607b4509cb2423e8713c43a', '', NULL, 0x617574726520c3a9636f6c65),
('1b1a72be399897d1cd062b4257a1ee29', '', NULL, 0x6d65737361676520766f63616c2032322f31322f32303232),
('b711ba6975c40ba0853f7b50935c2114', '', NULL, 0x64c3a96dc3a96e6167c3a92073757220636861726c65726f69),
('313141ff45e3a0b922b0c42aa539bcc7', '', NULL, 0x6d65737361676520766f63616c2032322f31322f32303232),
('ad625c323d501d5724424e4bec369e58', '', NULL, 0x6d65737361676520766f63616c2032322f31322f32303232),
('62e13cbf1811000e8ae0bfc14fb56cdd', '', NULL, 0x32322f31322f32303232206f6b20706f7572207072656e647265206c6120706c616365266e6273703b206d616973207061727420656e20766163616e6365732c202c6e6f75732072617070656c6c6520c3a020736f6e207265746f757220),
('e1755f344c28143d619d8624ceda6a45', '', NULL, 0x656e747265726120656e2061636320656e20323032342f32303235),
('4dfa8e3d4ea41637b39376323f185976', '', NULL, 0x65636f6c65206e646c73),
('bed40d3cd5d5ccf3213fe4c4f41d9804', '', NULL, 0x7665757420706c7573206c6120706c6163653c2f703e3c703e64656d616e646520656e766f79c3a965206c652030312f3130203c62723e3c703e3c2f703e3c703e65742072656e766f79c3a965206c652031322f30322f32303232),
('d8a9232664bc14bf255dd22a2fb6a640', '', NULL, ''),
('891c5583027c1604c07c3c91e7bbc3af', '', NULL, ''),
('9a916870fc882b30357b3604321b1ef6', '', NULL, 0x746f756a6f757273207472c3a87320696e74c3a972657373c3a92070617220756e6520706c61636520656e204d3220706f75722032303233202831372f31302f3230323229),
('79a04a597b05c95a85500e5382e3548f', '', NULL, 0x6d617576616973206ec2b0),
('cbfa1ce318c740689f57ec847f185f4b', '', NULL, ''),
('4517de93bbd28027f207d8eb9f23610a', '', NULL, 0x6d65737361676520766f63616c266e6273703b2032322f31322f3232),
('bc69b8e0062eb90ea80fa569019cfe33', '', NULL, 0x6d65737361676520766f63616c266e6273703b2032322f31322f3232),
('5d82b79e3d00233f8515ab4195ffbc25', '', NULL, 0x6d65737361676520766f63616cc2a02032322f31322f3232),
('356832105266865614af39a311c2faa7', '', NULL, 0x61757472652065636f6c65),
('90dab2fa2aff3a116782e08b6847572a', '', NULL, 0x696e736372697074696f6e2073652066657261206c652030392f3031),
('d5f9a64e174f5d404655bae08320fb28', '', NULL, ''),
('e1696518d5891ee8dc8dd82c909f0d2f', '', NULL, ''),
('4d5d47abb557facd1f3cfe4447d9c5cd', '', NULL, 0x646f75626c6f6e2064656d616e6465),
('ba9bba5bde65ef6086a75c7b83b9b42b', '', NULL, ''),
('4e4a29adf2b609f819af2e77c164df27', '', NULL, 0x64c3a96dc3a96e6167656d656e743c62723e3c2f703e3c703e41207265636f6e74616374657220706f757220323032332f323032342e266e6273703b20417474656e74696f6e206e6f7573207265636f6e7461637465206176616e742064c3a963656d62726520323032323c703e3c2f703e3c703e6d657373616765206c61697373c3a9206c652031392f303920706f757220706c616365),
('a123784f16b2af22cfd82f0140661618', '', NULL, 0x736570742032303233204d3120656e2064656d616e6465),
('f9411965348780d7cf3b71eda69014f7', '', NULL, 0x65736f696e20646520706c6163657320656e207072696d61697265),
('9de41f1b3e5e2ee7db73817b4ce60006', '', NULL, 0x6d61696e7469656e2064656d616e646520706f7572204d3120656e2032303233206d616d616e20696e73746974),
('44edbb42b410d5242c5bb639a5b134d1', '', NULL, 0x4d6164616d65206d61696e7469656e74206c27696e736372697074696f6e20706f757220323032332d323032342e20456e66616e742073636f6c61726973c3a96520494d493c2f703e3c703e6265736f696e206175737369266e6273703b20706c61636520656e207072696d6169726520323031373c2f703e3c703e322064656d616e64657320656e766f79c3a965732032312f30322f32303232),
('f66c732166c548eebd27e6ac1d67bf5b', '', NULL, ''),
('3dd78805188250ec513cf350c9a337a0', '', NULL, 0x7665757420706c616365206163637565696c2073657020323320),
('5566900bc53f19ed5648e39e12c7e583', '', NULL, 0x6d61696e7469656e2064656d616e6465206d312073657074203233203c2f703e3c703e322064656d616e64657320656e766f79c3a965732031392f31312f32303231),
('d242a1bf5999d10d8690c818048eaa72', '', NULL, 0x746a7320696e74c3a972657373c3a92070617220706c61636520706f75722032332f323428656e66616e7420706c6163c3a9292030372f31312f323220),
('c3b71bab979b0602a3d1f96439424982', '', NULL, 0x6c616365204d3120323032332f323032343c703e3c2f703e3c703ec3896e6f726dc3a96d656e742064652064656d616e646520656e766f79c3a9657320737572206c652073697465206465707569732030322f323032323c2f703e3c703e666f727420696e74c3a972657373c3a96573286175206d6f696e7320382064656d616e64657320c3a0206469666620646174657329),
('3f26cb6cccadc951f065772aa33f1214', '', NULL, ''),
('b6f28e473b094dcc4a4b9398a81fa6cf', '', NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `mater_statuts`
--

CREATE TABLE `mater_statuts` (
  `ordre` tinyint(4) DEFAULT NULL,
  `statut` varchar(20) NOT NULL COMMENT 'Statut de la demande',
  `phrase` varchar(30) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL COMMENT 'Statut en français'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Statut des demandes d''inscription';

--
-- Déchargement des données de la table `mater_statuts`
--

INSERT INTO `mater_statuts` (`ordre`, `statut`, `phrase`) VALUES
(1, 'confirmeMail', 'Mail confirmé'),
(3, 'sansReponse', 'Appel tél. sans réponse'),
(7, 'invitationEnvoyee', 'Invitation mail envoyée'),
(2, 'attente', 'En attente d\'une place'),
(5, 'rvInscription', 'Rv d\'inscription fixé'),
(6, 'inscription', 'Inscription finalisée'),
(8, 'annule', 'Demande annulée');

-- --------------------------------------------------------

--
-- Structure de la table `mater_users`
--

CREATE TABLE `mater_users` (
  `userName` varchar(7) NOT NULL COMMENT 'Nom d''utilisateur',
  `nom` varchar(40) NOT NULL COMMENT 'Nom',
  `prenom` varchar(40) NOT NULL COMMENT 'Prénom',
  `md5pwd` varchar(40) NOT NULL COMMENT 'passwd au format MD5',
  `mail` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Table des utilisateurs';

--
-- Déchargement des données de la table `mater_users`
--

INSERT INTO `mater_users` (`userName`, `nom`, `prenom`, `md5pwd`, `mail`) VALUES
('MAIYV', 'Mairesse', 'Yves', '1224b6196e600af6d118b8d7a12fec76', 'ymairesse@isnd.be'),
('admin', 'Administrateur', 'admin', 'a532a0ff6af11fad256a16f5b5aa5db3', 'direction.maternelle@isnd.be');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `mater_datesRV`
--
ALTER TABLE `mater_datesRV`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mater_inscriptionRV`
--
ALTER TABLE `mater_inscriptionRV`
  ADD PRIMARY KEY (`idInscription`,`idRV`);

--
-- Index pour la table `mater_inscriptions`
--
ALTER TABLE `mater_inscriptions`
  ADD PRIMARY KEY (`n`);

--
-- Index pour la table `mater_secretariat`
--
ALTER TABLE `mater_secretariat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mater_statuts`
--
ALTER TABLE `mater_statuts`
  ADD PRIMARY KEY (`statut`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `mater_datesRV`
--
ALTER TABLE `mater_datesRV`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de date de RV', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `mater_inscriptions`
--
ALTER TABLE `mater_inscriptions`
  MODIFY `n` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=824;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
