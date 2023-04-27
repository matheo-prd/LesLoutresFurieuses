-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 08 mars 2023 à 09:11
-- Version du serveur : 10.6.12-MariaDB
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `btssio17_ppe2_5`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_utilisateur` int(11) NOT NULL,
  `id_trajet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_utilisateur`, `id_trajet`) VALUES
(62, 104);

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE `trajet` (
  `id` int(11) NOT NULL,
  `code_createur` int(11) NOT NULL,
  `lieu_depart` varchar(50) NOT NULL,
  `lieu_arrive` varchar(50) NOT NULL,
  `place_dispo` tinyint(4) NOT NULL,
  `date` date NOT NULL,
  `horaire_depart` time NOT NULL,
  `horaire_arrive` time NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`id`, `code_createur`, `lieu_depart`, `lieu_arrive`, `place_dispo`, `date`, `horaire_depart`, `horaire_arrive`, `prix`) VALUES
(88, 56, 'Angoulins', 'ArdilliÃ¨res', 1, '2019-05-03', '02:00:00', '23:59:00', 2),
(90, 1, 'Rochefort', 'Royan', 3, '2019-04-30', '12:12:00', '13:13:00', 4),
(94, 56, 'Arces', 'Arvert', 1, '2019-05-08', '08:50:00', '10:20:00', 2),
(99, 1, 'Bignay', 'Aigrefeuille-d\'Aunis', 3, '2019-05-03', '20:20:00', '21:10:00', 3),
(102, 60, 'Agudelle', 'Agudelle', 8, '2019-05-17', '23:05:00', '23:35:00', 1777),
(104, 1, 'Rochefort', 'Royan', 2, '2019-10-10', '10:10:00', '12:12:00', 3),
(105, 63, 'Allas-Champagne', 'Agudelle', 1, '2019-05-18', '09:00:00', '10:00:00', -3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `motdepasse`, `age`, `sexe`, `email`, `telephone`) VALUES
(1, 'ThÃ©o', 'LÃ©o', '$2y$10$6uKlFDWR143Uxl3H/cWn3O5W4lWXA0N/0nNpqoJQRPoLfkk4ZZkTO', 20, 'Homme', 'a@a.com', '0622975493'),
(56, 'tardy', 'willy', '$2y$10$5zPZJda1B84XoFosEq1JKe3sDPrcpDoq363n26QnnMSmZ6KZEgBdC', 18, 'Homme', 'a@a.a', '0612992771'),
(58, 'david', 'rudy', '$2y$10$u5e3ASirFfdbrU4h.BjcdeqEtXD6pvmA3Pz7nmKtSNClF03WZMKYK', 18, 'Homme', 'rudydavidlive@gmail.Com', '0622641128'),
(59, 'toto', 'toto', '$2y$10$X0qqto8ZR1PLwWWae6UW0O9i3gqQA4ISlSz465VQUjEWwocgrGCDG', 18, 'Homme', 'toto@toto.com', '0622546458'),
(60, 'aa', 'aa', '$2y$10$H6nBUmVlKOQ1Ck9rdoVhWe81GD0U9hnixGEEBQzLoLe6nAnejsWIy', 19, 'Femme', 'z@z.com', '0743631515'),
(62, 'pres', 'presentation', '$2y$10$qBTw4SOodBsxwbA7mBWPEORtVXA54wvshG8FgygzsFyokTR0Govhy', 18, 'Homme', 'pres@pres.com', '0622975464'),
(63, 'Test', 'test', '$2y$10$qw86/wXSsXaUQIcS0ANwa.ojobsxePryYMjdYVwrV9VryIF41Bfka', 32, 'Homme', 'lulu@gmail.com', '0689897858'),
(64, 'Botuha', 'Adrien', '$2y$10$pMMp30Y15Qhp7r0DJfxzgOfjG15jEh1A6gxMxw9R3GGYJ9cpJMNVK', 20, 'Homme', 'bthadrien@gmail.com', '0633598164'),
(65, 'david', 'rudy', '$2y$10$9ceGKwumpI1vjG7P/7Gjx.Vq7yRINq9XzyLcxMvUIq73szYrKSOOW', 18, 'Homme', 'rudydavidlive@gmail.com', '0622641128'),
(66, 'Duplouich', 'Theo', '$2y$10$BKyV9rMu8Cogd5J0hgbsbONivTr2QUvzoawPKJsZ8NcrSAlUfdzlG', 18, 'Homme', 'theo.duplouich@gmail.com', '602174901');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id` int(11) NOT NULL,
  `nom` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id`, `nom`) VALUES
(392, 'Saint-Quantin-de-Rançanne'),
(391, 'Saint-Porchaire'),
(389, 'Saint-Pierre-du-Palais'),
(390, 'Saint-Pierre-d\'Oléron'),
(388, 'Saint-Pierre-de-Juillers'),
(387, 'Saint-Pierre-de-l\'Isle'),
(386, 'Saint-Pierre-d\'Amilly'),
(385, 'Saint-Pardoult'),
(384, 'Saint-Palais-sur-Mer'),
(383, 'Saint-Palais-de-Phiolin'),
(382, 'Saint-Palais-de-Négrignac'),
(381, 'Saint-Ouen-d\'Aunis'),
(380, 'Saint-Ouen'),
(379, 'Saint-Nazaire-sur-Charente'),
(378, 'Saint-Médard-d\'Aunis'),
(377, 'Saint-Médard'),
(376, 'Saint-Maurice-de-Tavernole'),
(375, 'Saint-Martin-de-Ré'),
(374, 'Saint-Martin-de-Juillers'),
(373, 'Saint-Martin-de-Coux'),
(372, 'Saint-Martin-d\'Ary'),
(371, 'Saint-Martial-sur-Né'),
(370, 'Saint-Martial-de-Vitaterne'),
(369, 'Saint-Martial-de-Mirambeau'),
(368, 'Saint-Martial'),
(367, 'Saint-Mard'),
(366, 'Saint-Mandé-sur-Brédoire'),
(365, 'Saint-Maigrin'),
(364, 'Saint-Loup'),
(363, 'Saint-Léger'),
(362, 'Saint-Laurent-de-la-Prée'),
(361, 'Saint-Laurent-de-la-Barrière'),
(360, 'Saint-Just-Luzac'),
(359, 'Saint-Julien-de-l\'Escap'),
(358, 'Saint-Jean-de-Liversay'),
(357, 'Saint-Jean-d\'Angle'),
(356, 'Saint-Jean-d\'Angély'),
(355, 'Saint-Hippolyte'),
(354, 'Saint-Hilaire-du-Bois'),
(353, 'Saint-Hilaire-de-Villefranche'),
(352, 'Saint-Grégoire-d\'Ardennes'),
(351, 'Saint-Germain-du-Seudre'),
(350, 'Saint-Germain-de-Vibrac'),
(349, 'Saint-Germain-de-Marencennes'),
(348, 'Saint-Germain-de-Lusignan'),
(347, 'Saint-Georges-d\'Oléron'),
(346, 'Saint-Georges-du-Bois'),
(345, 'Saint-Georges-des-Coteaux'),
(344, 'Saint-Georges-des-Agoûts'),
(343, 'Saint-Georges-de-Longuepierre'),
(342, 'Saint-Georges-de-Didonne'),
(341, 'Saint-Georges-Antignac'),
(340, 'Saint-Genis-de-Saintonge'),
(339, 'Saint-Froult'),
(338, 'Saint-Fort-sur-Gironde'),
(337, 'Saint-Félix'),
(336, 'Saint-Eugène'),
(335, 'Sainte-Soulle'),
(334, 'Saintes'),
(333, 'Sainte-Ramée'),
(332, 'Sainte-Radegonde'),
(331, 'Sainte-Même'),
(330, 'Sainte-Marie-de-Ré'),
(329, 'Sainte-Lheurine'),
(328, 'Sainte-Gemme'),
(327, 'Sainte-Colombe'),
(326, 'Saint-Dizant-du-Gua'),
(325, 'Saint-Dizant-du-Bois'),
(324, 'Saint-Denis-d\'Oléron'),
(323, 'Saint-Denis-du-Pin'),
(322, 'Saint-Cyr-du-Doret'),
(321, 'Saint-Crépin'),
(320, 'Saint-Coutant-le-Grand'),
(319, 'Saint-Clément-des-Baleines'),
(318, 'Saint-Ciers-du-Taillon'),
(317, 'Saint-Ciers-Champagne'),
(316, 'Saint-Christophe'),
(315, 'Saint-Césaire'),
(314, 'Saint-Bris-des-Bois'),
(313, 'Saint-Bonnet-sur-Gironde'),
(312, 'Saint-Augustin'),
(311, 'Saint-André-de-Lidon'),
(310, 'Saint-Aigulin'),
(309, 'Saint-Agnant'),
(308, 'Sablonceaux'),
(307, 'Royan'),
(306, 'Rouffignac'),
(305, 'Rouffiac'),
(304, 'Romegoux'),
(303, 'Romazières'),
(302, 'Rochefort'),
(301, 'Rivedoux-Plage'),
(300, 'Rioux'),
(299, 'Rétaud'),
(298, 'Réaux'),
(297, 'Puyrolland'),
(296, 'Puyravault'),
(295, 'Puy-du-Lac'),
(294, 'Puilboreau'),
(293, 'Prignac'),
(292, 'Préguillac'),
(291, 'Poursay-Garnaud'),
(290, 'Pouillac'),
(289, 'Port-d\'Envaux'),
(288, 'Port-des-Barques'),
(287, 'Pont-l\'Abbé-d\'Arnoult'),
(286, 'Pons'),
(285, 'Pommiers-Moulons'),
(284, 'Polignac'),
(283, 'Plassay'),
(282, 'Plassac'),
(281, 'Pisany'),
(280, 'Pessines'),
(279, 'Périgny'),
(278, 'Pérignac'),
(277, 'Péré'),
(276, 'Paillé'),
(275, 'Ozillac'),
(274, 'Orignolles'),
(273, 'Nuaillé-sur-Boutonne'),
(272, 'Nuaillé-d\'Aunis'),
(271, 'Nieul-sur-Mer'),
(270, 'Nieul-le-Virouil'),
(269, 'Nieulle-sur-Seudre'),
(268, 'Nieul-lès-Saintes'),
(267, 'Neuvicq-le-Château'),
(266, 'Neuvicq'),
(265, 'Neulles'),
(264, 'Neuillac'),
(263, 'Néré'),
(262, 'Nantillé'),
(261, 'Nancras'),
(260, 'Nachamps'),
(259, 'Muron'),
(258, 'Mosnac'),
(257, 'Mortiers'),
(256, 'Mortagne-sur-Gironde'),
(255, 'Mornac-sur-Seudre'),
(254, 'Moragne'),
(253, 'Montroy'),
(252, 'Montpellier-de-Médillan'),
(251, 'Montlieu-la-Garde'),
(250, 'Montils'),
(249, 'Montguyon'),
(248, 'Montendre'),
(247, 'Mons'),
(246, 'Moings'),
(244, 'Mirambeau'),
(245, 'Moëze'),
(243, 'Migron'),
(242, 'Migré'),
(241, 'Meux'),
(240, 'Meursac'),
(239, 'Messac'),
(238, 'Meschers-sur-Gironde'),
(237, 'Mérignac'),
(236, 'Médis'),
(235, 'Mazerolles'),
(234, 'Mazeray'),
(233, 'Matha'),
(232, 'Massac'),
(231, 'Marsilly'),
(230, 'Marsais'),
(229, 'Marignac'),
(228, 'Marennes'),
(227, 'Marans'),
(226, 'Macqueville'),
(225, 'Lussant'),
(224, 'Lussac'),
(223, 'Luchat'),
(222, 'Lozay'),
(221, 'Louzignac'),
(220, 'Loulay'),
(219, 'Lorignac'),
(218, 'Lonzac'),
(217, 'Longèves'),
(216, 'Loix'),
(215, 'Loiré-sur-Nie'),
(214, 'Loire-les-Marais'),
(213, 'Le Thou'),
(212, 'Les Touches-de-Périgny'),
(211, 'Les Portes-en-Ré'),
(210, 'Les Nouillers'),
(209, 'Les Mathes'),
(208, 'Les Gonds'),
(207, 'Le Seure'),
(206, 'Les Essards'),
(205, 'Les Églises-d\'Argenteuil'),
(204, 'Les Éduts'),
(203, 'Le Pin'),
(202, 'Léoville'),
(201, 'Le Mung'),
(200, 'Le Gué-d\'Alleré'),
(199, 'Le Gua'),
(198, 'Le Grand-Village-Plage'),
(197, 'Le Gicq'),
(196, 'Le Fouilloux'),
(195, 'Le Douhet'),
(194, 'Le Chay'),
(193, 'Le Château-d\'Oléron'),
(192, 'Le Bois-Plage-en-Ré'),
(191, 'La Villedieu'),
(190, 'La Vergne'),
(189, 'La Vallée'),
(188, 'La Tremblade'),
(187, 'La Ronde'),
(186, 'La Rochelle'),
(185, 'Landrais'),
(184, 'Landes'),
(183, 'La Laigne'),
(182, 'La Jarrie-Audouin'),
(181, 'La Jarrie'),
(180, 'La Jarne'),
(179, 'La Jard'),
(178, 'La Gripperie-Saint-Symphorien'),
(177, 'La Grève-sur-Mignon'),
(176, 'Lagord'),
(175, 'La Genétouze'),
(174, 'La Frédière'),
(173, 'La Flotte'),
(172, 'La Croix-Comtesse'),
(171, 'La Couarde-sur-Mer'),
(170, 'La Clotte'),
(169, 'La Clisse'),
(168, 'La Chapelle-des-Pots'),
(167, 'La Brousse'),
(166, 'La Brée-les-Bains'),
(165, 'La Benâte'),
(164, 'La Barde'),
(163, 'Jussas'),
(162, 'Juicq'),
(161, 'Jonzac'),
(160, 'Jazennes'),
(159, 'Jarnac-Champagne'),
(158, 'Île-d\'Aix'),
(157, 'L\'Houmeau'),
(156, 'Hiers-Brouage'),
(155, 'Haimps'),
(154, 'Guitinières'),
(153, 'Grézac'),
(152, 'Grandjean'),
(151, 'Gourvillette'),
(150, 'Givrezac'),
(149, 'Gibourne'),
(148, 'Germignac'),
(147, 'Genouillé'),
(146, 'Gémozac'),
(145, 'Geay'),
(144, 'Fouras'),
(143, 'Forges'),
(142, 'Fontenet'),
(141, 'Fontcouverte'),
(140, 'Fontaines-d\'Ozillac'),
(139, 'Fontaine-Chalendray'),
(138, 'Floirac'),
(137, 'Fléac-sur-Seugne'),
(136, 'Ferrières'),
(135, 'Fenioux'),
(134, 'Expiremont'),
(133, 'Étaules'),
(132, 'Esnandes'),
(131, 'Épargnes'),
(130, 'L\'Éguille'),
(129, 'Écurat'),
(128, 'Écoyeux'),
(127, 'Échillais'),
(126, 'Échebrune'),
(125, 'Dompierre-sur-Mer'),
(124, 'Dompierre-sur-Charente'),
(123, 'Dolus-d\'Oléron'),
(122, 'Doeuil-sur-le-Mignon'),
(121, 'Dampierre-sur-Boutonne'),
(120, 'Croix-Chapeau'),
(119, 'Cressé'),
(118, 'Crazannes'),
(117, 'Cravans'),
(116, 'Cramchaban'),
(115, 'Cozes'),
(114, 'Coux'),
(113, 'Courpignac'),
(112, 'Courcoury'),
(111, 'Courçon'),
(110, 'Courcerac'),
(109, 'Courcelles'),
(108, 'Courant'),
(107, 'Coulonges'),
(106, 'Corme-Royal'),
(105, 'Corme-Écluse'),
(104, 'Corignac'),
(103, 'Contré'),
(102, 'Consac'),
(101, 'Colombiers'),
(100, 'Coivert'),
(99, 'Clion'),
(98, 'Clérac'),
(97, 'Clavette'),
(96, 'Clam'),
(95, 'Ciré-d\'Aunis'),
(94, 'Cierzac'),
(93, 'Chives'),
(92, 'Chevanceaux'),
(91, 'Chervettes'),
(90, 'Chermignac'),
(89, 'Cherbonnières'),
(88, 'Chérac'),
(87, 'Chepniers'),
(86, 'Chenac-Saint-Seurin-d\'Uzet'),
(85, 'Chaunac'),
(84, 'Chatenet'),
(83, 'Châtelaillon-Plage'),
(82, 'Chartuzac'),
(81, 'Charron'),
(80, 'Chantemerle-sur-la-Soie'),
(79, 'Chaniers'),
(78, 'Champdolent'),
(77, 'Champagnolles'),
(76, 'Champagne'),
(75, 'Champagnac'),
(74, 'Chamouillac'),
(73, 'Chambon'),
(72, 'Chaillevette'),
(71, 'Chadenac'),
(70, 'Cercoux'),
(69, 'Celles'),
(68, 'Cabariot'),
(67, 'Bussac-sur-Charente'),
(66, 'Bussac-Forêt'),
(65, 'Burie'),
(64, 'Brizambourg'),
(63, 'Brives-sur-Charente'),
(62, 'Brie-sous-Mortagne'),
(61, 'Brie-sous-Matha'),
(60, 'Brie-sous-Archiac'),
(59, 'Breuil-Magné'),
(58, 'Breuillet'),
(57, 'Breuil-la-Réorte'),
(56, 'Bresdon'),
(55, 'Bran'),
(54, 'Boutenac-Touvent'),
(53, 'Bourgneuf'),
(52, 'Bourcefranc-le-Chapus'),
(51, 'Bouhet'),
(50, 'Bougneau'),
(49, 'Boscamnant'),
(48, 'Boresse-et-Martron'),
(47, 'Bords'),
(46, 'Boisredon'),
(45, 'Bois'),
(44, 'Blanzay-sur-Boutonne'),
(43, 'Blanzac-lès-Matha'),
(42, 'Biron'),
(41, 'Bignay'),
(40, 'Beurlay'),
(39, 'Berneuil'),
(38, 'Bernay-Saint-Martin'),
(37, 'Bercloux'),
(36, 'Benon'),
(35, 'Belluire'),
(34, 'Bedenac'),
(33, 'Beauvais-sur-Matha'),
(32, 'Beaugeay'),
(31, 'Bazauges'),
(30, 'Barzan'),
(29, 'Ballon'),
(28, 'Ballans'),
(27, 'Balanzac'),
(26, 'Bagnizeau'),
(25, 'Aytré'),
(24, 'Avy'),
(23, 'Authon-Ébéon'),
(22, 'Aumagne'),
(21, 'Aulnay'),
(20, 'Aujac'),
(19, 'Asnières-la-Giraud'),
(18, 'Arvert'),
(17, 'Arthenac'),
(16, 'Ars-en-Ré'),
(15, 'Ardillières'),
(14, 'Archingeay'),
(13, 'Archiac'),
(12, 'Arces'),
(11, 'Antezant-la-Chapelle'),
(10, 'Annezay'),
(9, 'Annepont'),
(8, 'Angoulins'),
(7, 'Angliers'),
(6, 'Andilly'),
(5, 'Anais'),
(4, 'Allas-Champagne'),
(3, 'Allas-Bocage'),
(2, 'Aigrefeuille-d\'Aunis'),
(1, 'Agudelle'),
(393, 'Saint-Rogatien'),
(394, 'Saint-Romain-de-Benet'),
(395, 'Saint-Romain-sur-Gironde'),
(396, 'Saint-Saturnin-du-Bois'),
(397, 'Saint-Sauvant'),
(398, 'Saint-Sauveur-d\'Aunis'),
(399, 'Saint-Savinien'),
(400, 'Saint-Seurin-de-Palenne'),
(401, 'Saint-Sever-de-Saintonge'),
(402, 'Saint-Séverin-sur-Boutonne'),
(403, 'Saint-Sigismond-de-Clermont'),
(404, 'Saint-Simon-de-Bordes'),
(405, 'Saint-Simon-de-Pellouaille'),
(406, 'Saint-Sorlin-de-Conac'),
(407, 'Saint-Sornin'),
(408, 'Saint-Sulpice-d\'Arnoult'),
(409, 'Saint-Sulpice-de-Royan'),
(410, 'Saint-Thomas-de-Conac'),
(411, 'Saint-Trojan-les-Bains'),
(412, 'Saint-Vaize'),
(413, 'Saint-Vivien'),
(414, 'Saint-Xandre'),
(415, 'Saleignes'),
(416, 'Salignac-de-Mirambeau'),
(417, 'Salignac-sur-Charente'),
(418, 'Salles-sur-Mer'),
(419, 'Saujon'),
(420, 'Seigné'),
(421, 'Semillac'),
(422, 'Semoussac'),
(423, 'Semussac'),
(424, 'Siecq'),
(425, 'Sonnac'),
(426, 'Soubise'),
(427, 'Soubran'),
(428, 'Soulignonne'),
(429, 'Souméras'),
(430, 'Sousmoulins'),
(431, 'Surgères'),
(432, 'Taillant'),
(433, 'Taillebourg'),
(434, 'Talmont-sur-Gironde'),
(435, 'Tanzac'),
(436, 'Taugon'),
(437, 'Ternant'),
(438, 'Tesson'),
(439, 'Thaims'),
(440, 'Thairé'),
(441, 'Thénac'),
(442, 'Thézac'),
(443, 'Thors'),
(444, 'Tonnay-Boutonne'),
(445, 'Tonnay-Charente'),
(446, 'Torxé'),
(447, 'Trizay'),
(448, 'Tugéras-Saint-Maurice'),
(449, 'Vandré'),
(450, 'Vanzac'),
(451, 'Varaize'),
(452, 'Varzay'),
(453, 'Vaux-sur-Mer'),
(454, 'Vénérand'),
(455, 'Vergeroux'),
(456, 'Vergné'),
(457, 'Vérines'),
(458, 'Vervant'),
(459, 'Vibrac'),
(460, 'Villars-en-Pons'),
(461, 'Villars-les-Bois'),
(462, 'Villedoux'),
(463, 'Villemorin'),
(464, 'Villeneuve-la-Comtesse'),
(465, 'Villexavier'),
(466, 'Villiers-Couture'),
(467, 'Vinax'),
(468, 'Virollet'),
(469, 'Virson'),
(470, 'Voissay'),
(471, 'Vouhé'),
(472, 'Yves ');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_utilisateur`,`id_trajet`),
  ADD KEY `id_trajet` (`id_trajet`);

--
-- Index pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code_createur` (`code_createur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=473;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_trajet`) REFERENCES `trajet` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `trajet_ibfk_1` FOREIGN KEY (`code_createur`) REFERENCES `utilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
