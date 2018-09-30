-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Client :  mysql
-- Généré le :  Dim 30 Septembre 2018 à 19:58
-- Version du serveur :  5.7.23-log
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `php-ajax`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `produit` text NOT NULL,
  `adresse` text NOT NULL,
  `ville` text NOT NULL,
  `cp` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `image`, `email`, `tel`, `produit`, `adresse`, `ville`, `cp`) VALUES
(18, 'Joseph', 'Harman', '1.jpg', 'Joseph@yopmail.com', '0777125580', 'PROD_4', '23 bd mairie', 'LYON', '69005'),
(20, 'Lillie', 'Ferrarium', '3.jpg', 'Lillie@yopmail.com', '0123455432', 'PROD_2', '18 avenue pasteur', 'PARIS', '75015'),
(21, 'Yolanda', 'Green', '5.jpg', 'Green@yopmail.com', '752125580', 'PROD_1', '61 avenue meaux', 'PARIS', '75019'),
(22, 'Cara', 'Gariepy', '7.jpg', 'Cara@yopmail.com', '752125580', 'PROD_2', '4 rue moumonsseau', 'PARIS', '75008'),
(23, 'Christine', 'Johnson', '11.jpg', 'Johnson@yopmail.com', '0456543432', 'PROD_4', '5 rue gogo', 'PARIS', '75019'),
(24, 'Alana', 'Decruze', '12.jpg', 'Alana@yopmail.com', '0456543432', 'PROD_3', '16 avenue republique', 'PARIS', '75010'),
(25, 'Krista', 'Correa', '13.jpg', 'Correa@yopmail.com', '0662125580', 'PROD_3', '12 Rue la timone', 'MARSEILLE', '13013'),
(26, 'Charles', 'Martin', '14.jpg', 'Charles@yopmail.com', '752125580', 'PROD_1', '61 avenue meaux', 'PARIS', '75019'),
(70, 'Cindy', 'Canady', '18211.jpg', 'arem.hamdi@gmail.com', '769761569', 'PROD_2', '11 RUE PIERRE GUIGNOIS', 'IVRY SUR SEINE', '94200'),
(74, 'Farouk', 'DHAHRI', '51363549.jpg', 'farouk.dhahri@gmail.com', '0752125580', 'PROD_1', '61 avenue secretan', 'PARIS', '75019'),
(69, 'Frank', 'Lemons', '22610.jpg', 'Lemons@yopmail.com', '0976765654', 'PROD_1', '3 avenue sidi beau', 'LYON', '69005'),
(66, 'Margaret', 'Ault', '14365.jpg', 'Margaret@yopmail.com', '0765544332', 'PROD_3', '68 avenue meaux', 'PARIS', '75019'),
(71, 'Christina', 'Wilke', '9248.jpg', 'Wilke@yopmail.com', '0654656554', 'PROD_2', '56 rue pain', 'MARSEILLE', '13008'),
(68, 'Roy', 'Newton', '27282.jpg', 'Roy@yopmail.com', '0654321298', 'PROD_1', '45 avenue cafe', 'PARIS', '75016');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
