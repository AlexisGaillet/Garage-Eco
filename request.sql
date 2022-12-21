-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 21 déc. 2022 à 02:25
-- Version du serveur : 5.7.33
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `garage-eco`
--

-- --------------------------------------------------------

--
-- Structure de la table `brands`
--

DROP DATABASE IF EXISTS `garage-eco`;

CREATE DATABASE `garage-eco` character set 'UTF8';

USE `garage-eco`;

CREATE TABLE `brands` (
  `Id_brands` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `most_selled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`Id_brands`, `name`, `most_selled`) VALUES
(1, 'Audi', 1),
(2, 'Mercedes-Benz', 1),
(3, 'BMW', 1),
(4, 'Bugatti', 0),
(7, 'Volkswagen', 1),
(8, 'Alpine', 0),
(9, 'Alpha Romeo', 0),
(10, 'Porsche', 0),
(11, 'Ferrari', 0),
(12, 'Renault', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `Id_cars` int(11) NOT NULL,
  `Id_users` int(11) NOT NULL,
  `Id_brands` int(11) NOT NULL,
  `Id_models` int(11) NOT NULL,
  `Id_types` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`Id_cars`, `Id_users`, `Id_brands`, `Id_models`, `Id_types`) VALUES
(1, 2, 1, 1, 7),
(2, 1, 1, 1, 4),
(4, 1, 1, 1, 6),
(5, 1, 1, 1, 2),
(6, 1, 1, 1, 5),
(7, 1, 8, 13, 8);

-- --------------------------------------------------------

--
-- Structure de la table `cars_problems`
--

CREATE TABLE `cars_problems` (
  `Id_cars` int(11) NOT NULL,
  `Id_problems` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `models`
--

CREATE TABLE `models` (
  `Id_models` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `car_year` varchar(15) DEFAULT NULL,
  `Id_brands` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `models`
--

INSERT INTO `models` (`Id_models`, `name`, `car_year`, `Id_brands`) VALUES
(1, 'A3', '(2013-2018)', 1),
(2, 'A3', '(2018-...)', 1),
(3, 'A1', '(2009-2015)', 1),
(4, 'A1', '(2015-2021)', 1),
(5, 'A1', '(2021-...)', 1),
(6, 'A4', '(2014-2020)', 1),
(7, 'A4', '(2020-...)', 1),
(8, '190', '(1982-1993)', 2),
(9, 'Classe A', '(2004-2012)', 2),
(10, 'Classe A', '(2012-2018)', 2),
(11, 'Classe A', '(2018-...)', 2),
(12, 'A110', '(1964-1979)', 8),
(13, 'A110', '(2017-...)', 8),
(14, 'A110S', '(2021-...)', 8);

-- --------------------------------------------------------

--
-- Structure de la table `models_types`
--

CREATE TABLE `models_types` (
  `Id_models` int(11) NOT NULL,
  `Id_types` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `problems`
--

CREATE TABLE `problems` (
  `Id_problems` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `problems_solutions`
--

CREATE TABLE `problems_solutions` (
  `Id_problems` int(11) NOT NULL,
  `Id_solutions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `solutions`
--

CREATE TABLE `solutions` (
  `Id_solutions` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `solutions`
--

INSERT INTO `solutions` (`Id_solutions`, `title`, `description`) VALUES
(1, 'Vidange', 'Afin d\'assurer le bon fonctionnement de votre moteur, il est important de faire régulièrement des vidanges afin de changer l\'huile moteur de votre voiture.'),
(2, 'Changer une vitre de voiture', 'Même si les vitres sont résistantes, elles peuvent être endommagées suite à un choc qui va provoquer un impact ou des fissures. Dans ce cas, il faut alors remplacer la vitre au plus vite.'),
(3, 'Changer les plaquettes de frein', 'Indispensables au ralentissement et à l\'immobilisation de votre véhicule, les plaquettes de frein assurent la sécurité de celui-ci. Voici comment les changer !');

-- --------------------------------------------------------

--
-- Structure de la table `solutions_steps`
--

CREATE TABLE `solutions_steps` (
  `Id_solutions` int(11) NOT NULL,
  `Id_steps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `steps`
--

CREATE TABLE `steps` (
  `Id_steps` int(11) NOT NULL,
  `Id_solutions` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `steps`
--

INSERT INTO `steps` (`Id_steps`, `Id_solutions`, `title`, `description`) VALUES
(1, 1, 'Choisir son huile moteur', 'Tout d\'abord, pour faire sa vidange, il est important d\'utiliser le bon type d\'huile moteur. Nous vous renvoyons donc vers la notice de votre véhicule qui vous explique comment choisir son huile moteur correctement.'),
(2, 1, 'Placer correctement la voiture', 'Afin que le réservoir d\'huile se vide correctement, il convient de placer la voiture sur une surface plate. Vous pouvez également mettre la voiture sur quatre chandelles pour accéder plus facilement au bouchon de vidange.'),
(3, 1, 'Dévisser le bouchon de vidange', 'Placez le bac récupérateur sous le bouchon de vidange et dévissez le bouchon à l\'aide d\'une clé plate. Attention, sur certains modèles de voiture, le pas de vis est inversé donc ne forcez pas trop sur le bouchon.'),
(4, 1, 'Laisser l\'huile moteur d\'écouler', 'Une fois le bouchon retiré, laissez l\'huile s’écouler. Vous devez ouvrir le bouchon de remplissage d\'huile moteur afin de faire appel d\'air et permettre que le réservoir se vide mieux.\r\n\r\nBon à savoir : il est possible de faire tourner sa voiture quelques minutes avant de faire la vidange afin que l\'huile soit plus fluide grâce à la chaleur du moteur.'),
(5, 1, 'Changer le filtre à huile (facultatif)', 'Bien que cela ne soit pas obligatoire, nous vous conseillons de changer votre filtre à huile lors de chaque vidange. Cela permettra d\'augmenter la durée de vie de votre huile et de votre moteur. Pour cela, rien de plus simple, il vous suffit de dévisser l\'ancien filtre lorsque le réservoir est vidé. Lubrifiez ensuite le nouveau joint du filtre à huile et fixez le nouveau filtre.'),
(6, 1, 'Revisser le bouchon de vidange', 'Une fois que toute l\'huile moteur usagée s\'est écoulée, vous pouvez revisser le bouchon de vidange. Afin de ne pas abîmer le pas de vis, il est conseillé de revisser le bouchon tout d\'abord à la main puis ensuite à l\'aide de la clé. Attention à ne pas trop serrer le bouchon.'),
(7, 1, 'Reremplir le réservoir d\'huile moteur', 'À l\'aide de votre entonnoir, versez la nouvelle huile dans le réservoir d\'huile. Attention à ne pas trop remplir le réservoir surtout que vous ferez la remise à niveau après. Refermez le bouchon de remplissage une fois l\'huile remise.'),
(8, 1, 'Vérifier le niveau de l\'huile', 'Démarrez la voiture et laissez la tourner pendant quelques minutes. Puis effectuez le niveau à l\'aide de la jauge et ajoutez de l\'huile petit à petit jusqu\'à être au bon niveau.'),
(9, 1, 'Recycler l\'huile moteur usagée', 'Votre vidange faite, il ne vous reste donc qu\'à vous débarrasser de l\'huile moteur usagée. En effet, il est interdit de jeter de l\'huile moteur dans les égouts ou à la poubelle. Vous devez donc vous rendre soit à la déchetterie, soit dans un garage auto soit dans le magasin où vous avez acheter la nouvelle huile. Attention, en cas de non respect de la loi sur le recyclage de l\'huile moteur, vous risquez une grosse amende.'),
(10, 2, 'Extraire la vitre abîmée', 'Le changement de vitre de voiture est une intervention complexe qu\'il vaut mieux confier à un professionnel. En effet, il être très méticuleux afin de ne pas endommager l\'installation électrique de la vitre. Pour débuter l\'opération, il faut démonter le panneau de la portière, le lève-vitre, les poignées de portes et débrancher les connexions électriques.'),
(11, 2, 'Installer la vitre neuve', 'Assurez-vous que la nouvelle vitre corresponde bien à votre voiture en ce qui concerne la taille et la forme. Ensuite, installez la nouvelle vitre de voiture à son emplacement puis rebranchez les connexions électriques, les poignées de porte, le lève-vitre et le panneau de la portière.'),
(12, 2, 'Tester la vitre de voiture', 'Une fois que vous avez monté la nouvelle vitre de voiture, vous devez tester le fonctionnement de cette dernière. Pour ce faire, appuyez sur le bouton puis faites monter et descendre la vitre à plusieurs reprises. Si vous remarquez que la vitre ne s\'actionne pas correctement, cela veut dire que le changement de vitre a mal été réalisé. Il faut alors emmener le véhicule chez un professionnel.');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `Id_types` int(11) NOT NULL,
  `engine_type` varchar(25) NOT NULL,
  `motorization` smallint(6) NOT NULL,
  `Id_models` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`Id_types`, `engine_type`, `motorization`, `Id_models`) VALUES
(1, '1.6 TDI (105 CH)', 1, 1),
(2, '1.6 TDI (110 CH)', 1, 1),
(3, '2.0 TDI (150 CH)', 1, 1),
(4, '2.0 TDI (184 CH)', 1, 1),
(5, '1.4 TFSI (125 CH)', 2, 1),
(6, '1.8 TFSI (180 CH)', 2, 1),
(7, '1.4 TFSI e-tron (150 CH)', 3, 1),
(8, '1.8 Turbo (252 CH)', 2, 13),
(9, '1.8 Turbo (300 CH)', 2, 14);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Id_users` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `mail` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `valided_at` datetime DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id_users`, `firstname`, `lastname`, `mail`, `password`, `created_at`, `valided_at`, `admin`) VALUES
(1, 'Alexis', 'Gaillet', 'alexisgaillet36@gmail.com', '$2y$10$DVi59IBra7c0eTTFXav5iOIMHLdWil85h.6Bx4/AWMhB2HZmkAnfO', NULL, NULL, 1),
(2, 'Alexis', 'Gaillet', 'alexisgaillet361@gmail.com', '$2y$10$tn8dWAMXBt8gtzqrH0B5SedZgWq9NrKfcD2zhqCeqeQxRbIeA1oiq', NULL, NULL, 0),
(3, 'Paul', 'Ramain', 'paul@gmail.com', '$2y$10$wQgtzXtwCeUs9Iu2RppXyOtQIZUoCGkuYWl4JeA04zg8texJ/.k4q', NULL, NULL, 0),
(4, 'Mathieu', 'Dacheux', 'mathieudacheux@gmail.com', '$2y$10$M6gO5nNtGNEflO12no.S4uDvjFCcrFQjiCKAYoIw7tahx8Nuskn2e', NULL, NULL, 0),
(5, 'Claude', 'Rigaux', 'clauderigaux@gmail.com', '$2y$10$rJqxA5Sqkwe.Nti2XtBc6eKX96ZZQfpKpcNuZR/3SHfrX7r6IL1s2', NULL, NULL, 0),
(6, 'Laura', 'Antoniolli', 'lauraantoniolli@gmail.com', '$2y$10$IbuuH4T6Uh/t2CCMjpZgbuzJqgxXpdg8OITOD5x8Xl5Ao7.1U5Nfi', NULL, NULL, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`Id_brands`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`Id_cars`),
  ADD KEY `Id_users` (`Id_users`),
  ADD KEY `Id_brands` (`Id_brands`),
  ADD KEY `Id_models` (`Id_models`),
  ADD KEY `Id_types` (`Id_types`);

--
-- Index pour la table `cars_problems`
--
ALTER TABLE `cars_problems`
  ADD PRIMARY KEY (`Id_cars`,`Id_problems`),
  ADD KEY `Id_problems` (`Id_problems`);

--
-- Index pour la table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`Id_models`),
  ADD KEY `Id_brands` (`Id_brands`);

--
-- Index pour la table `models_types`
--
ALTER TABLE `models_types`
  ADD PRIMARY KEY (`Id_models`,`Id_types`),
  ADD KEY `Id_types` (`Id_types`);

--
-- Index pour la table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`Id_problems`);

--
-- Index pour la table `problems_solutions`
--
ALTER TABLE `problems_solutions`
  ADD PRIMARY KEY (`Id_problems`,`Id_solutions`),
  ADD KEY `Id_solutions` (`Id_solutions`);

--
-- Index pour la table `solutions`
--
ALTER TABLE `solutions`
  ADD PRIMARY KEY (`Id_solutions`);

--
-- Index pour la table `solutions_steps`
--
ALTER TABLE `solutions_steps`
  ADD PRIMARY KEY (`Id_solutions`,`Id_steps`),
  ADD KEY `Id_steps` (`Id_steps`);

--
-- Index pour la table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`Id_steps`),
  ADD KEY `Id_solutions` (`Id_solutions`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`Id_types`),
  ADD KEY `Id_models` (`Id_models`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brands`
--
ALTER TABLE `brands`
  MODIFY `Id_brands` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `Id_cars` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `models`
--
ALTER TABLE `models`
  MODIFY `Id_models` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `problems`
--
ALTER TABLE `problems`
  MODIFY `Id_problems` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `solutions`
--
ALTER TABLE `solutions`
  MODIFY `Id_solutions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `steps`
--
ALTER TABLE `steps`
  MODIFY `Id_steps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `Id_types` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`Id_users`) REFERENCES `users` (`Id_users`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`Id_brands`) REFERENCES `brands` (`Id_brands`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_ibfk_3` FOREIGN KEY (`Id_models`) REFERENCES `models` (`Id_models`) ON DELETE CASCADE,
  ADD CONSTRAINT `cars_ibfk_4` FOREIGN KEY (`Id_types`) REFERENCES `types` (`Id_types`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cars_problems`
--
ALTER TABLE `cars_problems`
  ADD CONSTRAINT `cars_problems_ibfk_1` FOREIGN KEY (`Id_cars`) REFERENCES `cars` (`Id_cars`),
  ADD CONSTRAINT `cars_problems_ibfk_2` FOREIGN KEY (`Id_problems`) REFERENCES `problems` (`Id_problems`);

--
-- Contraintes pour la table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_ibfk_1` FOREIGN KEY (`Id_brands`) REFERENCES `brands` (`Id_brands`) ON DELETE CASCADE;

--
-- Contraintes pour la table `models_types`
--
ALTER TABLE `models_types`
  ADD CONSTRAINT `models_types_ibfk_1` FOREIGN KEY (`Id_models`) REFERENCES `models` (`Id_models`),
  ADD CONSTRAINT `models_types_ibfk_2` FOREIGN KEY (`Id_types`) REFERENCES `types` (`Id_types`);

--
-- Contraintes pour la table `problems_solutions`
--
ALTER TABLE `problems_solutions`
  ADD CONSTRAINT `problems_solutions_ibfk_1` FOREIGN KEY (`Id_problems`) REFERENCES `problems` (`Id_problems`),
  ADD CONSTRAINT `problems_solutions_ibfk_2` FOREIGN KEY (`Id_solutions`) REFERENCES `solutions` (`Id_solutions`);

--
-- Contraintes pour la table `solutions_steps`
--
ALTER TABLE `solutions_steps`
  ADD CONSTRAINT `solutions_steps_ibfk_1` FOREIGN KEY (`Id_solutions`) REFERENCES `solutions` (`Id_solutions`),
  ADD CONSTRAINT `solutions_steps_ibfk_2` FOREIGN KEY (`Id_steps`) REFERENCES `steps` (`Id_steps`);

--
-- Contraintes pour la table `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `types_ibfk_1` FOREIGN KEY (`Id_models`) REFERENCES `models` (`Id_models`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
