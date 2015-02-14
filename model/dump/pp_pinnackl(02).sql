-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 18 Janvier 2015 à 17:35
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pp_pinnackl`
--

-- --------------------------------------------------------

--
-- Structure de la table `pp_article`
--

CREATE TABLE IF NOT EXISTS `pp_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_id` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `id_category` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `pp_article`
--

INSERT INTO `pp_article` (`id`, `title_id`, `title`, `content`, `id_category`) VALUES
(1, 'OnePlus one mythe ou realiste', 'OnePlus one mythe ou réalisté', '<p>Oneplus one<br /><br />The Nexus 4 and Nexus 5 started something. They showed consumers something they hadn&rsquo;t seen before in the mobile space - value for money. They showed that you didn&rsquo;t have to pay &pound;500 for a decent phone experience, that bloatware was BAD, and that sometimes going direct to a supplier and cutting out the middle man isn&rsquo;t altogether a bad idea. And then the Nexus 6 happened and 90% of what we just talked about disappeared like a fart in the wind.<br /><br />Normally this would be a problem. But now, thanks to the miracle of capitalism, we have a new player in town that is essentially doing the exact same thing. The company in question is called OnePlus and its first handset, the OnePlus One, now, more than ever before, fills a HUGE void for many consumers by offering a top-tier handset (a la the Nexus 5) for a fraction of the price (unlike the Nexus 6). Thing is, the company runs a bizarre, almost Masonic invite-only system which makes getting hold of a handset a bit tricky &ndash; although you can read more about that here.</p>', 4);

-- --------------------------------------------------------

--
-- Structure de la table `pp_page`
--

CREATE TABLE IF NOT EXISTS `pp_page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag` varchar(45) NOT NULL,
  `name_category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `pp_page`
--

INSERT INTO `pp_page` (`id`, `tag`, `name_category`) VALUES
(1, 'sport', 'Sport'),
(2, 'jeux-video', 'Jeux-vidéo'),
(3, 'musique', 'Musique'),
(4, 'technologie', 'Nouvelles technologies'),
(5, 'cine-serie', 'Cinéma - Séries');

-- --------------------------------------------------------

--
-- Structure de la table `pp_role`
--

CREATE TABLE IF NOT EXISTS `pp_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `role_UNIQUE` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `pp_role`
--

INSERT INTO `pp_role` (`id`, `role`) VALUES
(5, 'administrator'),
(2, 'author'),
(3, 'editor'),
(4, 'moderator'),
(1, 'viewer');

-- --------------------------------------------------------

--
-- Structure de la table `pp_users`
--

CREATE TABLE IF NOT EXISTS `pp_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gender` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `pseudo` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(256) NOT NULL,
  `birth_date` date NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  `role` varchar(15) NOT NULL DEFAULT 'viewer',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `pseudo_UNIQUE` (`pseudo`),
  KEY `role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `pp_users`
--

INSERT INTO `pp_users` (`id`, `gender`, `firstname`, `name`, `pseudo`, `email`, `password`, `birth_date`, `register_date`, `status`, `role`) VALUES
(1, 0, 'Hervé', 'Tutuaku', 'Syu93', 'herve.tutuaku@gmail.com', '$2y$10$1MB5akGVWYlSvO6o/wPojOJHpHnnB19egi6ZFXLSBbLWG8Xt5nlyy', '1993-01-23', '2015-01-03 16:28:24', 1, 'viewer');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pp_users`
--
ALTER TABLE `pp_users`
  ADD CONSTRAINT `pp_users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `pp_role` (`role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
