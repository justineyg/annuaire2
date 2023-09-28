-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 28 sep. 2023 à 10:02
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `annuaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `business_sector`
--

CREATE TABLE `business_sector` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `business_sector`
--

INSERT INTO `business_sector` (`id`, `name`) VALUES
(1, 'Agriculture, sylviculture et pêche'),
(2, 'Industries extractives'),
(3, 'Industrie chimique'),
(4, 'Industrie pharmaceutique'),
(5, 'Industrie des Technologies de l’Information et de la Communication (TIC)'),
(6, 'Énergie (production et distribution d’électricité, de gaz, de vapeur et d’air conditionné)'),
(7, 'Construction, BTP'),
(8, 'Tourisme'),
(9, 'Recherche-développement scientifique'),
(10, 'Enseignement, recherche'),
(11, 'Administration d’État, Collectivités territoriales, Hospitalière'),
(12, 'Santé humaine et action sociale');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230822143514', '2023-08-22 14:35:31', 38),
('DoctrineMigrations\\Version20230822145352', '2023-08-22 14:54:45', 42),
('DoctrineMigrations\\Version20230823132525', '2023-08-23 13:25:32', 65),
('DoctrineMigrations\\Version20230824150417', '2023-08-24 15:04:26', 90),
('DoctrineMigrations\\Version20230829143204', '2023-08-29 14:32:18', 15),
('DoctrineMigrations\\Version20230829144230', '2023-08-29 14:42:50', 25),
('DoctrineMigrations\\Version20230829153413', '2023-08-29 15:34:24', 142),
('DoctrineMigrations\\Version20230829153837', '2023-08-29 15:39:00', 51),
('DoctrineMigrations\\Version20230829154247', '2023-08-29 15:42:55', 70),
('DoctrineMigrations\\Version20230829155141', '2023-08-29 15:51:48', 124),
('DoctrineMigrations\\Version20230905145209', '2023-09-05 14:52:15', 45),
('DoctrineMigrations\\Version20230906092757', '2023-09-06 09:28:03', 57),
('DoctrineMigrations\\Version20230906125909', '2023-09-06 12:59:16', 51),
('DoctrineMigrations\\Version20230906130231', '2023-09-06 13:02:38', 55),
('DoctrineMigrations\\Version20230906160309', '2023-09-06 16:03:15', 88),
('DoctrineMigrations\\Version20230906161112', '2023-09-06 16:11:22', 279);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `firstname` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` longtext COLLATE utf8mb4_unicode_ci,
  `promotion_id` int(11) NOT NULL,
  `business_sector_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id`, `firstname`, `lastname`, `biography`, `promotion_id`, `business_sector_id`, `created_at`, `email`, `profession_id`, `slug`, `job`) VALUES
(1, 'Victoria', 'Sendil-Prebou', '<div>chefffe de projet numérique</div>', 8, 1, '2023-09-06 16:52:00', 'victoria_sendilprebou@hotmail.fr', NULL, 'sendil-prebou-victoria', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `name` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `name`, `image`) VALUES
(5, 'Gisèle Halimi', 'giseleHalimi.webp'),
(6, 'Simone Veil', 'simoneVeil.webp'),
(7, 'Aimé Césaire', 'AimeCesaire.jpg'),
(8, 'Joséphine Baker', 'josephineBaker.webp'),
(9, 'test1', 'campusnocturne.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `created_at`, `lastname`) VALUES
(1, 'juju-yaj@live.fr', '[\"ROLE_USER\"]', 'coucou', '2023-08-23 13:38:40', ''),
(2, 'alexis.marin@gmail.coml', '[\"ROLE_USER\"]', 'hey', '2023-08-23 13:43:42', ''),
(3, 'ju@live.fr', '[\"ROLE_USER\"]', 'coucou', '2023-08-23 14:50:08', ''),
(4, 'kali@gmail.com', '[]', '$2y$13$UnqdpmluKDdpNl3nPSkJoOgea.ffjaJrLjfAUuuiEfqRddWtn1Gb2', '2023-08-24 13:34:34', ''),
(5, 'gege@live.fr', '[]', '$2y$13$ik.yM7Jv1pdul5Pj4dSrrubD4MeCupu5gv.lSIgggAz78KxfwlmLC', '2023-08-24 13:49:07', ''),
(6, 'alki@gmail.com', '[]', '$2y$13$Nk9vnVs6JCOjNAHqDep2KubiI73zaoYmW7mISF7QmNg/jektIGmXq', '2023-08-24 13:50:45', 'alki');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `business_sector`
--
ALTER TABLE `business_sector`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E6D6B297139DF194` (`promotion_id`),
  ADD KEY `IDX_E6D6B297C7F1CE18` (`business_sector_id`),
  ADD KEY `IDX_E6D6B297FDEF8996` (`profession_id`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `business_sector`
--
ALTER TABLE `business_sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `FK_E6D6B297139DF194` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `FK_E6D6B297C7F1CE18` FOREIGN KEY (`business_sector_id`) REFERENCES `business_sector` (`id`),
  ADD CONSTRAINT `FK_E6D6B297FDEF8996` FOREIGN KEY (`profession_id`) REFERENCES `business_sector` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
