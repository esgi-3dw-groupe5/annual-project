-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 16 Janvier 2015 à 18:00
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
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `id_category` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `pp_article`
--

INSERT INTO `pp_article` (`id`, `title`, `content`, `id_category`) VALUES
(1, 'dzefezefze', '<p>zeffzeefzzeffzefze</p>', 1),
(2, 'Lyon nouveau patron', '<article class="box-wrapper">\r\n<div class="box-content article">\r\n<h2>Lyon nouveau patron</h2>\r\n<div>\r\n<p>Un Olympique en a chass&eacute; un autre. Pour la premi&egrave;re fois depuis la sixi&egrave;me journ&eacute;e, l&rsquo;OM a chut&eacute; de son fauteuil de leader, principale cons&eacute;quence de sa d&eacute;faite conc&eacute;d&eacute;e vendredi soir &agrave; Montpellier (2-1). Les joueurs de Marcelo Bielsa accusent une longueur de retard sur l&rsquo;Olympique lyonnais, facile vainqueur de Toulouse (3-0) gr&acirc;ce notamment aux 18e et 19e but cette saison d&rsquo;Alexandre Lacazette. &laquo;Il va falloir &ecirc;tre &agrave; la hauteur de ce classement&raquo;, a pr&eacute;venu Hubert Fournier, sans pour autant &eacute;voquer ouvertement le titre. &laquo;Il n&rsquo;est pas interdit de la prononcer (sic) non plus, mais il faut rester lucide.&raquo; Vainqueur lors des cinq derni&egrave;res journ&eacute;es, l&rsquo;OL reste &eacute;galement sur neuf succ&egrave;s d&rsquo;affil&eacute;e &agrave; Gerland. Du jamais vu depuis 1973-74.</p>\r\n</div>\r\n</div>\r\n</article>', 1),
(3, 'éré"r"éré"r"é', '<p>zrrr&eacute;"&eacute;"rr&eacute;"r&eacute;"</p>', 3);

-- --------------------------------------------------------

--
-- Structure de la table `pp_categorie`
--

CREATE TABLE IF NOT EXISTS `pp_categorie` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag` varchar(45) NOT NULL,
  `name_categ` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `pp_categorie`
--

INSERT INTO `pp_categorie` (`id`, `tag`, `name_categ`) VALUES
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
