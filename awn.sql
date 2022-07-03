-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 29 juin 2022 à 18:06
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*Ahmedou Salem*/

--
-- Base de données : `awn`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `tel` int(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `des` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `bool` tinyint(1) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `date` datetime NOT NULL,
  `credit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `lastname`, `tel`, `password`, `id_cat`, `des`, `img`, `bool`, `gender`, `date`, `credit`) VALUES
(9, 'sidi', 'ahmed', 44222222, '96e79218965eb72c92a549dd5a330112', 3, 'BonjourXN', 'avatar-01.jpg', 1, 'M', '2022-06-02 21:43:37', 5000),
(10, 'sidi', 'mohamed', 28282828, '96e79218965eb72c92a549dd5a330112', 2, '8587878794884', 'avatar-02.jpg', 1, 'M', '2022-06-05 21:44:47', 5000),
(11, 'Ablo ', 'sidi', 22228888, '96e79218965eb72c92a549dd5a330112', 3, 'Bonjour je suis une pessonne qui travail', 'Ahmedou.jpg', 1, 'M', '2022-06-01 21:44:41', 5000),
(12, 'Sidi', 'Salem', 21212121, '96e79218965eb72c92a549dd5a330112', 2, 'Bonjour hi pro cvcv', 'avatar-03.jpg', 1, 'M', '2022-06-05 21:44:35', 5000),
(13, 'mohamed', 'sidi', 22222441, '96e79218965eb72c92a549dd5a330112', 3, 'je suis actuellement the name is a beautiful ???? ', 'avatar-04.jpg', 1, 'M', '2022-06-05 21:44:30', 5000),
(14, 'Babe', 'Sidi', 26666666, '96e79218965eb72c92a549dd5a330112', 2, 'A ledeye 5bre vi se qui consernnn', 'avatar-05.jpg', 1, 'M', '2022-06-01 21:44:25', 5000),
(15, 'الديدين', 'الشيكر', 46666666, '96e79218965eb72c92a549dd5a330112', 3, 'أنا اعل لدي شريكة ياي بوي', 'avatar-06.jpg', 1, 'M', '2022-06-01 21:44:20', 5000),
(16, 'SIDI', 'SIDI', 31232323, '96e79218965eb72c92a549dd5a330112', 2, 'SDFGHJKLXGFCHJVBKNLVJHBK', 'avatar-07.jpg', 1, 'M', '2022-06-02 21:44:12', 5000),
(19, 'Admin', 'Admin', 32323232, '96e79218965eb72c92a549dd5a330112', 2, 'Bonjour Sidi Med ', 'avatar-08.jpg', 1, 'M', '2022-06-02 21:44:05', 5000),
(20, 'Med', 'Med', 23233322, '96e79218965eb72c92a549dd5a330112', 4, 'ETVFYGBUHNIJD', 'avatar-09.jpg', 0, 'M', '2022-06-05 21:43:55', 5000),
(21, 'MED', 'Test', 33322233, '96e79218965eb72c92a549dd5a330112', 3, 'TCFVYGBUHNIJ?OK.', 'avatar-10.jpg', 0, 'M', '2022-06-05 21:43:49', 5000),
(22, 'Seyid', 'Ahmedou', 32323232, 'c5556ec9f079eeb2d08c095f15d7f102', 3, 'description', '', 0, 'M', '2022-06-22 00:00:00', 7000);

-- --------------------------------------------------------

--
-- Structure de la table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`) VALUES
(3, 'Ahmedou', '547901d3fbe6f2633306e89bca2c66ae8409e0ad');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Plombier'),
(2, 'Electriciens'),
(3, 'Peindre'),
(4, 'Menuiser');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idc` int(11) NOT NULL,
  `Commande` varchar(255) NOT NULL,
  `id_fourniseur` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_de_commande` datetime NOT NULL,
  `longitude` double DEFAULT NULL,
  `stutus` tinyint(150) NOT NULL,
  `latitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`idc`, `Commande`, `id_fourniseur`, `id_user`, `date_de_commande`, `longitude`, `stutus`, `latitude`) VALUES
(15, 'Bonjour mecieur le monsieur le fourniseur ', 14, 23, '2022-05-17 00:00:00', -15.9228064, 1, 18.1130361),
(18, 'le dey robine 5asre', 9, 23, '2022-05-18 16:22:11', -15.9228064, 0, 18.1130361),
(22, 'j ai une robiner ', 11, 27, '2022-05-19 22:50:04', -15.9228064, 0, 18.1130361),
(29, 'fjsjhgshjbcxjh hbqjhqg hsqbhcc', 11, 31, '2022-05-28 09:30:23', -15.9228064, 0, 18.1130361),
(61, 'description', 20, 14, '2022-06-25 20:27:38', -15.23059, 0, 16.97128),
(62, 'deidine', 15, 10, '2022-06-25 20:29:58', -7.60696, 0, 32.99936),
(65, 'bonjour jai une robinet', 19, 9, '2022-06-29 13:15:38', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `dislike`
--

CREATE TABLE `dislike` (
  `dis_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `stus` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dislike`
--

INSERT INTO `dislike` (`dis_id`, `user_id`, `admin_id`, `stus`) VALUES
(160, 14, 14, 1),
(161, 13, 13, 1),
(168, 13, 11, 1),
(169, 13, 16, 1),
(173, 13, 11, 1),
(189, 13, 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `favorite`
--

CREATE TABLE `favorite` (
  `fa_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `fav` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `favorite`
--

INSERT INTO `favorite` (`fa_id`, `user_id`, `admin_id`, `fav`) VALUES
(16, 8, 11, 1),
(46, 14, 12, 1),
(56, 17, 13, 1),
(57, 17, 13, 1),
(71, 14, 10, 1),
(76, 21, 10, 1),
(79, 21, 11, 1),
(80, 21, 10, 1),
(81, 21, 9, 1),
(82, 21, 10, 1),
(83, 21, 13, 1),
(84, 6, 9, 1),
(86, 22, 10, 1),
(87, 22, 12, 1),
(92, 23, 12, 1),
(93, 24, 10, 1),
(98, 23, 11, 1),
(102, 25, 12, 1),
(103, 23, 10, 1),
(105, 26, 10, 1),
(107, 26, 15, 1),
(108, 26, 11, 1),
(109, 9, 10, 1),
(111, 27, 10, 1),
(112, 27, 12, 1),
(113, 6, 10, 1),
(129, 28, 12, 1),
(130, 28, 10, 1),
(131, 28, 9, 1),
(162, 31, 11, 1),
(214, 13, 10, 1),
(216, 13, 19, 1),
(217, 13, 12, 1),
(219, 13, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `li_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `fav` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`li_id`, `user_id`, `admin_id`, `fav`) VALUES
(16, 8, 11, 1),
(46, 14, 12, 1),
(56, 17, 13, 1),
(57, 17, 13, 1),
(71, 14, 10, 1),
(76, 21, 10, 1),
(79, 21, 11, 1),
(80, 21, 10, 1),
(81, 21, 9, 1),
(82, 21, 10, 1),
(83, 21, 13, 1),
(84, 6, 9, 1),
(86, 22, 10, 1),
(87, 22, 12, 1),
(92, 23, 12, 1),
(93, 24, 10, 1),
(98, 23, 11, 1),
(102, 25, 12, 1),
(103, 23, 10, 1),
(105, 26, 10, 1),
(107, 26, 15, 1),
(108, 26, 11, 1),
(109, 9, 10, 1),
(111, 27, 10, 1),
(112, 27, 12, 1),
(113, 6, 10, 1),
(129, 28, 12, 1),
(130, 28, 10, 1),
(131, 28, 9, 1),
(162, 31, 11, 1),
(214, 13, 10, 1),
(216, 13, 19, 1),
(217, 13, 12, 1),
(219, 13, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `tel` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `lastname`, `tel`, `password`, `img`, `gender`, `date`) VALUES
(6, 'Cheikh', 'Med', '27272727', '96e79218965eb72c92a549dd5a330112', '59f60a81-d061-47c5-b5f9-e2e62ca9eb88424118433.jpg', 'M', '2022-04-05 21:43:23'),
(8, 'sidi', 'Ahmed', '26272627', '96e79218965eb72c92a549dd5a330112', '59f60a81-d061-47c5-b5f9-e2e62ca9eb88424118433.jpg', 'M', '2022-04-01 21:43:19'),
(9, 'SISI', 'Mohamed', '22222222', '96e79218965eb72c92a549dd5a330112', '59f60a81-d061-47c5-b5f9-e2e62ca9eb88424118433.jpg', 'M', '2022-06-05 21:43:13'),
(10, 'Sidi ', 'Ablo', '22442244', '96e79218965eb72c92a549dd5a330112', '59f60a81-d061-47c5-b5f9-e2e62ca9eb88424118433.jpg', 'M', '2022-06-05 21:43:07'),
(13, 'Med Sii', 'Muhamed', '22212222', '96e79218965eb72c92a549dd5a330112', 'image_picker3349006291790279248.jpg', 'M', '2022-06-01 21:43:02'),
(14, 'Cheik', 'Sidi', '3222222', '96e79218965eb72c92a549dd5a330112', '11466d1c-ddbf-4758-ba83-89daceb5cd12-356226269.jpg', 'M', '2022-06-05 21:42:57'),
(17, 'Ahmed', 'sidi', '44222222', '96e79218965eb72c92a549dd5a330112', '50207c8b-140c-4b86-89de-8b28c3e0bc24162588746.jpg', 'M', '2022-06-01 21:42:51'),
(20, 'Cheikh', 'Muhamed', '43333333', '96e79218965eb72c92a549dd5a330112', 'b20fe478-11da-40d1-a2f4-581229dba16a-104112590.jpg', 'M', '2022-06-01 21:42:46'),
(21, 'Ahme', 'barick', '43222223', '96e79218965eb72c92a549dd5a330112', 'a8a36f4c-b05d-4a06-a73a-1b971b8e3fd31317680579.jpg', 'M', '2022-06-02 21:42:39'),
(22, 'Sidi', 'Ahmed', '32222220', '96e79218965eb72c92a549dd5a330112', '9efaab92-6bac-4398-952d-9291eaf7e0bd-1590645483.jpg', 'M', '2022-06-02 21:42:31'),
(23, 'Muhamed', 'Sidi', '27222222', '96e79218965eb72c92a549dd5a330112', 'image_picker1976026987443680699.jpg', 'M', '2022-06-01 21:42:22'),
(24, 'Abhhs', 'ahmed', '49787868', '96e79218965eb72c92a549dd5a330112', 'image_picker4750866247429723295.jpg', 'M', '2022-06-05 21:42:15'),
(25, 'idoumu', 'Gegari', '44433344', '96e79218965eb72c92a549dd5a330112', 'bd57e6f9-2fa1-4474-b230-caa6b857a3cc589210689.jpg', 'M', '2022-06-05 21:42:09'),
(26, 'سيدنا ', 'محمد', '47444444', '96e79218965eb72c92a549dd5a330112', 'ea5eee43-2892-4534-b1e3-81889a459b21445449457237206288.jpg', 'M', '2022-06-06 21:42:02'),
(27, 'Khyte', 'Sidi', '44322222', '96e79218965eb72c92a549dd5a330112', 'c2235d1f-6bdb-41f6-9f10-58bf474158991541787539.jpg', 'M', '2022-06-02 21:41:56'),
(28, 'Cheik', 'Sidi', '32323232', '96e79218965eb72c92a549dd5a330112', '2399617d-9ade-4be4-8c65-bedcefa5ac07989971794.jpg', 'M', '2022-06-02 21:41:49'),
(29, 'Ahmed', 'Ahmed', '23232212', '96e79218965eb72c92a549dd5a330112', 'per.JPG', 'M', '2022-06-01 21:41:41'),
(30, 'Meryme', 'Babe', '44334343', '96e79218965eb72c92a549dd5a330112', 'image_picker-879040330.jpeg', 'M', '2022-06-01 21:41:33'),
(31, 'Ahmedo', 'Saleme', '44333222', '96e79218965eb72c92a549dd5a330112', 'per.JPG', 'M', '2022-06-05 21:41:22'),
(34, 'SIDI', 'SIDI', '33322111', 'bae175604f2b1309ea6a36453190b70e', 'per.JPG', 'M', '2022-06-06 21:40:36');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`);

--
-- Index pour la table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `id_fourniseur` (`id_fourniseur`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `dislike`
--
ALTER TABLE `dislike`
  ADD PRIMARY KEY (`dis_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`fa_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`li_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `dislike`
--
ALTER TABLE `dislike`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT pour la table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `fa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `li_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`cat_id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_fourniseur`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `dislike`
--
ALTER TABLE `dislike`
  ADD CONSTRAINT `dislike_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `dislike_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
