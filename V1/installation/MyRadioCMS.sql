-- phpMyAdmin SQL Dump
-- version 4.0.0
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 28 Mai 2013 à 11:19
-- Version du serveur: 5.1.69-cll
-- Version de PHP: 5.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `firstheu_dave`
--

-- --------------------------------------------------------

--
-- Structure de la table `radio_config`
--

CREATE TABLE IF NOT EXISTS `radio_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text CHARACTER SET utf8 NOT NULL,
  `reset` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '0000/00/00 00:00:00',
  `www` text CHARACTER SET utf8 NOT NULL,
  `path` text CHARACTER SET utf8 NOT NULL,
  `defilante` int(1) NOT NULL DEFAULT '1',
  `rewrite` int(1) NOT NULL DEFAULT '1',
  `rnuid` text CHARACTER SET utf8 NOT NULL,
  `rnapikey` text CHARACTER SET utf8 NOT NULL,
  `rnplay` text CHARACTER SET utf8 NOT NULL,
  `idd` varchar(225) CHARACTER SET utf8 NOT NULL,
  `idp` varchar(225) CHARACTER SET utf8 NOT NULL,
  `licence` varchar(225) CHARACTER SET utf8 NOT NULL,
  `localkey` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `radio_config`
--

INSERT INTO `radio_config` (`id`, `nom`, `reset`, `www`, `path`, `defilante`, `rewrite`, `rnuid`, `rnapikey`, `rnplay`, `idd`, `idp`, `licence`, `localkey`) VALUES
(1, 'MyRadioCMS', '0000-00-00 00:00:00', 'http://dave.myradiocms.com/', '', 1, 1, '4D6260E6-CFC2-49A0-A73E-585B0CEB2E03', '08ee6d03-154a-4c62-9d52-87b10fe210d9', 'http://listen.radionomy.com/nsnf-radio', '137129', '78845', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `radio_dedicaces`
--

CREATE TABLE IF NOT EXISTS `radio_dedicaces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `temps` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Structure de la table `radio_defilante`
--

CREATE TABLE IF NOT EXISTS `radio_defilante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Structure de la table `radio_equipe`
--

CREATE TABLE IF NOT EXISTS `radio_equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `avatar` text CHARACTER SET utf8 NOT NULL,
  `rrang` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Structure de la table `radio_footer`
--

CREATE TABLE IF NOT EXISTS `radio_footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordre` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `ref` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `radio_footer`
--

INSERT INTO `radio_footer` (`id`, `ordre`, `label`, `ref`) VALUES
(13, 5, 'LIEN #3', '#'),
(11, 3, 'LIEN #1', '#'),
(12, 4, 'LIEN #2', '#'),
(10, 2, 'FORUM', 'http://forum.myradiocms.com'),
(9, 1, 'PARTENAIRES', 'partenaires.php');

-- --------------------------------------------------------

--
-- Structure de la table `radio_news`
--

CREATE TABLE IF NOT EXISTS `radio_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `stamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `radio_news`
--

INSERT INTO `radio_news` (`id`, `titre`, `image`, `message`, `stamp`) VALUES
(14, 'Titre 1', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1367085432),
(12, 'Titre 2', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1367084918),
(11, 'Titre 3', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 1367084911);

-- --------------------------------------------------------

--
-- Structure de la table `radio_partenaires`
--

CREATE TABLE IF NOT EXISTS `radio_partenaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `ref` varchar(150) NOT NULL,
  `img` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `radio_partenaires`
--

INSERT INTO `radio_partenaires` (`id`, `nom`, `ref`, `img`) VALUES
(4, 'MyRadioCMS', 'http://myradiocms.com/', 'http://image.noelshack.com/fichiers/2013/18/1367522394-mrclogocroqui.png');

-- --------------------------------------------------------

--
-- Structure de la table `radio_shout`
--

CREATE TABLE IF NOT EXISTS `radio_shout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `temps` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

--
-- Structure de la table `radio_site`
--

CREATE TABLE IF NOT EXISTS `radio_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `favicon` varchar(150) NOT NULL,
  `logo_general` varchar(150) NOT NULL,
  `logo_index` varchar(150) NOT NULL,
  `top_video` varchar(150) NOT NULL,
  `vid_desc` varchar(255) NOT NULL,
  `fb` varchar(120) NOT NULL,
  `twitter` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `radio_site`
--

INSERT INTO `radio_site` (`id`, `favicon`, `logo_general`, `logo_index`, `top_video`, `vid_desc`, `fb`, `twitter`) VALUES
(1, 'http://demo.myradiocms.com/images/favicon.ico', 'http://demo.myradiocms.com/images/logo.png', 'http://demo.myradiocms.com/images/banner1.jpg', 'http://www.youtube.com/embed/KrVC5dm5fFc', 'Test de description en dessous de la vidéo !', '#', '#');

-- --------------------------------------------------------

--
-- Structure de la table `radio_users`
--

CREATE TABLE IF NOT EXISTS `radio_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `age` int(2) NOT NULL DEFAULT '18',
  `description` text NOT NULL,
  `profession` text NOT NULL,
  `sexe` varchar(5) NOT NULL DEFAULT 'homme',
  `situation` text NOT NULL,
  `vip` int(1) NOT NULL DEFAULT '0',
  `debut_vip` datetime NOT NULL,
  `fin_vip` datetime NOT NULL,
  `rang` int(1) NOT NULL DEFAULT '0',
  `ban` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
