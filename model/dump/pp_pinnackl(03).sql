-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2015 at 10:56 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pp_pinnackl`
--

-- --------------------------------------------------------

--
-- Table structure for table `pp_article`
--

CREATE TABLE IF NOT EXISTS `pp_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_id` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `id_category` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_article` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pp_article`
--

INSERT INTO `pp_article` (`id`, `title_id`, `title`, `content`, `id_category`, `date`) VALUES
(1, 'OnePlus one mythe ou realiste', 'OnePlus one mythe ou réalisté', '<p>Oneplus one<br /><br />The Nexus 4 and Nexus 5 started something. They showed consumers something they hadn&rsquo;t seen before in the mobile space - value for money. They showed that you didn&rsquo;t have to pay &pound;500 for a decent phone experience, that bloatware was BAD, and that sometimes going direct to a supplier and cutting out the middle man isn&rsquo;t altogether a bad idea. And then the Nexus 6 happened and 90% of what we just talked about disappeared like a fart in the wind.<br /><br />Normally this would be a problem. But now, thanks to the miracle of capitalism, we have a new player in town that is essentially doing the exact same thing. The company in question is called OnePlus and its first handset, the OnePlus One, now, more than ever before, fills a HUGE void for many consumers by offering a top-tier handset (a la the Nexus 5) for a fraction of the price (unlike the Nexus 6). Thing is, the company runs a bizarre, almost Masonic invite-only system which makes getting hold of a handset a bit tricky &ndash; although you can read more about that here.</p>', 4, '2015-01-27 09:46:44'),
(2, 'recap day 3', 'Recap Day 3', '\r\n\r\nBienvenue dans ce premier récapitulatif de la ligue chinoise de League of Legends, la LPL. Et comme il est de coutume en Chine, le manque de respect et les plays de folie ont été de mise et ce dès la première game. On commence d''abord par le point des résultats journée par journée.\r\nLes résultats de cette semaine 1\r\nJour 1\r\n	Invictus Gaming 	2 	- 	0 	World Elite   	\r\n	Team Gamtee 	0 	- 	2 	Team Snake 	\r\n	LGD 	2 	- 	0 	Energy Pacemaker 	\r\n	Edward Gaming 	2 	- 	0 	Team King 	\r\n\r\nUne première journée sans affiche majeure, où toutes les hiérarchies furent respectées : les duos coréens des IG (Kakao-Rookie) et des EDG (Pawn-Deft) ont carry leurs teams respectives, même si aucune des games de la journée (et même de la semaine) n''a vu une équipe marcher impunie sur une autre. Team Snake a triomphé sans coup férir d''une Team Gamtee fébrile et trop avide de kills (avec notamment un chase à 4 min des Gamtee digne de la ligue du Lichtenstein), et Imp a carry LGD face à Energy Pacemaker, même si les deux équipes ont affiché des moves défensifs très propres et que les EP n''ont pas été ridicules, loin de là.\r\nJour 2\r\n	Star Horn Royal Club 	2 	- 	0 	Master 3 	\r\n	Team Snake 	2 	- 	0 	World Elite 	\r\n	Invictus Gaming 	2 	- 	0 	            Team Gamtee 	\r\n	OMG 	2 	- 	0 	Vici Gaming 	\r\n\r\nOn passe la deuxième avec ce jour 2, qui a vu une rencontre prometteuse entre Star Horn et M3 tourner à l''avantage de l''équipe de Cola (qui a méga carry avec son Mega Gnar et des ultis sur 5 personnes). Team Snake confirme son bon début de saison contre World Elite dans des parties très disputées, IG domine des Gamtee manifestement perturbés par leur B02 de la veille et qui ont serré le jeu comme pas possible. Mais la vraie affiche, c''était OMG-Vici, et elle a tenu toute ses promesses. La première game voit les OMG s''imposer après un mauvais early, mais c''est bien la deuxième partie qui restera dans les mémoires : Vici domine la partie, à plus d''une dizaine de kills et de milliers de golds d''avance, tue un deuxième baron Nashor... et perd la partie quelques minutes après car l''équipe de Mata et Dandy a laissé les OMG obtenir un cinquième dragon qui leur fait gagner le teamfight décisif et rusher la victoire au mid. De manière générale, les Vici ont été dominé sur les rotations et le decision-making.\r\nJour 3\r\n	Team King 	0 	- 	2 	Master 3 	\r\n	OMG 	2 	- 	0 	Energy Pacemaker 	\r\n	Star Horn Royal Club 	0 	- 	2 	LGD 	\r\n	Edward Gaming 	2 	- 	0 	Vici Gaming 	\r\n\r\nUn dernier jour faste : les Master 3 reprennent des couleurs avec une victoire sur Team King et un signature pick de Lopper qui sort son Singed bien-aimé pour la win. OMG domine EP mais dans la douleur, avec deux parties disputées même si les EP se font finalement outplay à chaque fois. Dans la première grosse affiche de la journée, LGD vient à bout de StarHorn avec un Imp MONSTRUEUX sur Sivir malgré le Gnar de Cola, et un jeu d''équipe un peu meilleur dans tous les niveaux du jeu. Enfin, les champions en titre EDG ont battu les nouveaux espoirs Vici Gaming, avec un Deft sur Ezreal qui a humilié le pauvre Vasili, souffre douleur des Ewdard. À noter pour les Vici que si Vasili n''est pour l''instant pas au niveau et que Dandy est à la traîne, Mata reste très solide et qu''Hetong, le mid player, a réussi à briller.\r\nLe classement des LPL après la semaine 1\r\n\r\nRappel : un Bo2 gagné (2 - 0) rapporte trois points, une égalité (1-1) un point, et une défaite  0-2... zéro point.\r\n  	Équipes 	Points\r\n	OMG 	6\r\n	Team Snake 	6\r\n	Edwarg Gaming 	6\r\n	Invictus Gaming 	6\r\n	LGD 	6\r\n	Star Horn Royal Club 	3\r\n	Master 3 	3\r\n	World Elite 	0\r\n	Gamtee 	0\r\n	Energy Pacemaker 	0\r\n	Team King 	0\r\n	Vici Gaming 	0\r\n\r\nCe qu''il faut retenir de cette première semaine\r\n\r\n - Peu de surprises, la plupart des équipes sont à leur place, excepté Vici Gaming qui n''a pas eu une seule victoire malgré ses deux champions du monde, et Team Snake qui elle a fait un carton plein même si ses victimes n''étaient pas des favoris. Les Vici Gaming souffrent du manque de performances de Vasili mais aussi de Dandy que je n''ai pas trouvé décisif, loin de là (et face à EDG, la comparaison face à un Clearlove omniprésent n''était pas à son avantage). La Team Snake elle n''a pas montré de moves sortis de l''espace ou des mécaniques incroyables mais une cohésion d''équipe et des rotations très agréablement surprenantes, il faudra voir s''ils peuvent tenir ce rythme pendant 11 semaines, mais ils se positionnent comme une équipe de milieu de tableau tout à fait honnête.\r\n\r\n- Mis à part le cas Vici, la greffe des Coréens semble presque partout ailleurs avoir pris : Kakao  et Rookie chez IG, Pawn et Deft chez EDG, et Looper ainsi qu''Acorn chez Master 3 s''en sont bien tirés. OMG également montre une forme assez importante et le OMG-SHR de la semaine prochaine n''en apparaît que plus alléchant. En bas du classement, Gamtee, EP et Team King risquent de devoir jouer leur survie tout le long du championnat. Enfin j''ai un peu peur pour les World Elite, qui jouaient des adversaires à priori prenables (Snake, Invictus Gaming) et n''ont pas obtenu de victoire, Spirit s''acharnant à chaque début de Bo2 à jouer sa Riven dans la jungle, sans succès. Il va falloir se remettre les idées en place avant la deuxième semaine, car ce sont les Master 3 et surtout les OMG qui sont au programme et il ne faudrait pas stagner à la place de lanterne rouge.\r\n\r\n- Enfin, on notera des manques de respect assez flagrants mais toujours agréables à regarder, comme celui de Rookie sur Spirit lors de la toute première game (un Twister Game ne s''intéresse pas à la tour qui se dresse entre vous et lui...) et celui de Deft contre Vasili (là non plus, la tour ne protège pas contre les rayons lasers). Le fait que de nombreuses games soient animées et qu''il n''y ait quasiment pas de purge confirme tout le bien qu''on pouvait penser de cette compétition.\r\n\r\n \r\n\r\nVoilà pour ce résumé de la première semaine des LPL, n''hésitez pas à commenter les plays de Deft, les errements des Vici Gaming où la surprise Snake. On se retrouve la semaine prochaine pour une nouvelle review de la meilleure ligue LoL du monde... en tout cas, de celle où le respect manque souvent.\r\n', 2, '2015-01-27 09:46:44'),
(5, 'test', 'test', '<p>test</p>', 3, '2015-02-01 13:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `pp_page`
--

CREATE TABLE IF NOT EXISTS `pp_page` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tag` varchar(45) NOT NULL,
  `name_category` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pp_page`
--

INSERT INTO `pp_page` (`id`, `tag`, `name_category`) VALUES
(1, 'sport', 'Sport'),
(2, 'jeux-video', 'Jeux-vidéo'),
(3, 'musique', 'Musique'),
(4, 'technologie', 'Nouvelles technologies'),
(5, 'cine-serie', 'Cinéma - Séries');

-- --------------------------------------------------------

--
-- Table structure for table `pp_comment`
--

CREATE TABLE IF NOT EXISTS `pp_comment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_article` int(10) NOT NULL,
  `comment` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date_comment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pp_comment`
--

INSERT INTO `pp_comment` (`id`, `id_article`, `comment`, `author`, `date_comment`) VALUES
(1, 1, 'Tres bon article !', 'Alexis', '2015-02-01 21:06:13'),
(2, 1, 'Ouai c''est pas faux :)', 'Thorel', '2015-02-01 21:20:21'),
(3, 1, '<p>teeeeeeeeeeeeeeeeeessssssssssssstttttttttttttttttt</p>', 'Alexis', '2015-02-02 09:46:28'),
(4, 1, '<p>test2</p>', 'Alexis', '2015-02-02 09:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `pp_role`
--

CREATE TABLE IF NOT EXISTS `pp_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `role_UNIQUE` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pp_role`
--

INSERT INTO `pp_role` (`id`, `role`) VALUES
(5, 'administrator'),
(2, 'author'),
(3, 'editor'),
(4, 'moderator'),
(1, 'viewer');

-- --------------------------------------------------------

--
-- Table structure for table `pp_users`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pp_users`
--

INSERT INTO `pp_users` (`id`, `gender`, `firstname`, `name`, `pseudo`, `email`, `password`, `birth_date`, `register_date`, `status`, `role`) VALUES
(1, 0, 'Hervé', 'Tutuaku', 'Syu93', 'herve.tutuaku@gmail.com', '$2y$10$1MB5akGVWYlSvO6o/wPojOJHpHnnB19egi6ZFXLSBbLWG8Xt5nlyy', '1993-01-23', '2015-01-03 16:28:24', 1, 'viewer'),
(2, 0, 'Alexis', 'Thorel', 'Alexis', 'alexis.thorel@gmail.com', '$2y$10$X9G2f3fh4oDcqBCW.4xfdOm6z6dYxe1F5c/pgPC6d4z45j/kjEmWO', '2015-01-26', '2015-01-26 21:27:33', 1, 'viewer');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pp_users`
--
ALTER TABLE `pp_users`
  ADD CONSTRAINT `pp_users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `pp_role` (`role`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
