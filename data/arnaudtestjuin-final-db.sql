-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 26 Juin 2015 à 15:59
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `arnaudtestjuin`
--

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE IF NOT EXISTS "droit" (
  "id" int(10) unsigned NOT NULL AUTO_INCREMENT,
  "lenom" varchar(45) DEFAULT NULL,
  "laperm" smallint(5) unsigned DEFAULT '2',
  PRIMARY KEY ("id"),
  UNIQUE KEY "lenom_UNIQUE" ("lenom")
) AUTO_INCREMENT=4 ;

--
-- Contenu de la table `droit`
--

INSERT INTO `droit` (`id`, `lenom`, `laperm`) VALUES
(1, 'Administrateur', 0),
(2, 'Modérateur', 1),
(3, 'Utilisateur', 2);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS "photo" (
  "id" int(10) unsigned NOT NULL AUTO_INCREMENT,
  "lenom" varchar(50) DEFAULT NULL,
  "lextension" char(3) DEFAULT NULL,
  "lepoids" int(10) unsigned DEFAULT NULL,
  "lalargeur" int(10) unsigned DEFAULT NULL,
  "lahauteur" int(10) unsigned DEFAULT NULL,
  "letitre" varchar(60) DEFAULT NULL,
  "ladesc" varchar(500) DEFAULT NULL,
  "affiche" smallint(5) unsigned DEFAULT '2',
  "utilisateur_id" int(10) unsigned NOT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "lenom_UNIQUE" ("lenom"),
  KEY "fk_photo_utilisateur1_idx" ("utilisateur_id")
) AUTO_INCREMENT=45 ;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`id`, `lenom`, `lextension`, `lepoids`, `lalargeur`, `lahauteur`, `letitre`, `ladesc`, `affiche`, `utilisateur_id`) VALUES
(17, '20150626092252no1h497l296o900m676dgl840cpgk9qdhqmc', 'jpg', 699378, 2560, 1600, 'cat', 'lechat', 2, 2),
(18, '20150626092320inoc9h3780qhqkgfgmhfbja8ffnk1gfg5kn5', 'jpg', 1292553, 1920, 1200, 'water fall', 'cascade', 2, 2),
(19, '20150626092349hemr7014m1okpnnbl4drhachhl5n2o4ao2p0', 'jpg', 1080551, 2560, 1440, 'test', 'test3', 2, 2),
(20, '2015062609253743rgd5b45f12fcbiikbana3afepi5k5nk5g0', 'jpg', 1617042, 1920, 1080, 'hummer', '4*4', 2, 1),
(21, '2015062609271455i2gmj9fonciekic8nj8q1l3dd81eqp8qol', 'jpg', 910202, 1920, 1200, 'mooooooooooooooooooooto', 'mooooooooooooooooooooooooooooooooooooooooooooooooooooooooootooooo', 2, 1),
(22, '20150626093544e4e8oin9gkrpe038gk2agc5giqr6p27an8h2', 'jpg', 996853, 1920, 1080, 'island', '&icirc;le', 2, 1),
(28, '20150626100123lkeb7nc3aloa82gkqlhj31egi7hne91nnn35', 'jpg', 2582935, 1920, 1080, 'pre', 'preprepre', 2, 3),
(29, '20150626100143ic32okreir01j0m33qii38abjb4mikrgkh2a', 'jpg', 1882699, 2560, 1600, 'avion', 'vion vion vion', 2, 3),
(30, '20150626100216eai4p3mg7kf9b8clme06qaj249l7frqd7r0f', 'jpg', 1571335, 2560, 1600, 'mirror', 'ror ror ror', 2, 3),
(31, '20150626100434n0rnel49o7mf590615bah0qkhmmhli5idh4b', 'jpg', 1934892, 1680, 1050, 'one', 'one one one', 2, 5),
(32, '20150626100501329oj82ccej448lg8bde8hof4clcaiir85ml', 'jpg', 511225, 1920, 1080, 'two', 'two two two', 2, 5),
(33, '20150626100524ki955fmb87qhd0dkir7l8gon6bdjp5mfe10j', 'jpg', 1473615, 2560, 1600, 'three', 'three three three', 2, 5),
(35, '20150626143806q2gg614nignf0jo1r1bgjl99mcm33j1fof29', 'jpg', 1276108, 2560, 1440, 'fire', 'firefirefire', 2, 1),
(36, '20150626143833dg1lpp6preik9lk6ablrfe8a1b9818iqpem8', 'jpg', 1297617, 2560, 1440, 'rally', 'rallyrallyrally', 2, 1),
(37, '20150626143925aa6515eno5llf9jl1geq776mi5jlqdqmrh7b', 'jpg', 793029, 1920, 1200, 'mountains', 'mountainsmountainsmountains', 2, 1),
(38, '20150626144003niogb6ealbgeo96qk1op2phmq33621rd5mh4', 'jpg', 1199095, 2560, 1440, 'bmw', 'bmwbmwbmw', 2, 2),
(39, '20150626144030o9nibr8peenqnb1o1jo74obohqbq164f6c2j', 'jpg', 954657, 1920, 1080, 'fleuve', 'fleuvefleuvefleuve', 2, 2),
(40, '20150626144059gf01nam6rcfggamqa7apfdo24mgqk63ojfm1', 'jpg', 372421, 1920, 1200, 'tuture2', 'tuture tuture tuture', 2, 2),
(41, '20150626144210ld9ab1lf80pdad2r300qgm2omcqrj0d51j9j', 'jpg', 874445, 1920, 1200, 'voiture bleue', 'bleuebleuebleue', 2, 3),
(42, '20150626144243imfhfihphcq1q622ab5bghanljni05lkqr8g', 'jpg', 1271268, 1920, 1080, 'couchersoleil', 'couchersoleilcouchersoleilcouchersoleil', 2, 3),
(43, '201506261443402e5859793kqlelrp6ne4gfqkpode66qin412', 'jpg', 174380, 1920, 1080, 'valise', 'valisevalisevalise', 2, 3),
(44, '20150626144429ei9hjncof75o8bf2rifc3hd9hai6caip17pf', 'jpg', 1184871, 1920, 1200, 'nature', 'naturenaturenature', 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `photo_has_rubrique`
--

CREATE TABLE IF NOT EXISTS "photo_has_rubrique" (
  "photo_id" int(10) unsigned NOT NULL,
  "rubrique_id" int(10) unsigned NOT NULL,
  PRIMARY KEY ("photo_id","rubrique_id"),
  KEY "fk_photo_has_rubrique_rubrique1_idx" ("rubrique_id"),
  KEY "fk_photo_has_rubrique_photo1_idx" ("photo_id")
);

--
-- Contenu de la table `photo_has_rubrique`
--

INSERT INTO `photo_has_rubrique` (`photo_id`, `rubrique_id`) VALUES
(17, 1),
(19, 3),
(19, 4),
(31, 4),
(32, 4),
(33, 4),
(18, 5),
(22, 5),
(28, 5),
(30, 5),
(35, 5),
(37, 5),
(39, 5),
(42, 5),
(44, 5),
(36, 6),
(29, 7),
(20, 8),
(21, 8),
(29, 8),
(36, 8),
(38, 8),
(40, 8),
(41, 8),
(43, 9);

-- --------------------------------------------------------

--
-- Structure de la table `rubrique`
--

CREATE TABLE IF NOT EXISTS "rubrique" (
  "id" int(10) unsigned NOT NULL AUTO_INCREMENT,
  "lintitule" varchar(60) DEFAULT NULL,
  PRIMARY KEY ("id")
) AUTO_INCREMENT=10 ;

--
-- Contenu de la table `rubrique`
--

INSERT INTO `rubrique` (`id`, `lintitule`) VALUES
(1, 'Animaux'),
(2, 'Architectures'),
(3, 'Artistiques'),
(4, 'Personnes'),
(5, 'Paysages'),
(6, 'Sports'),
(7, 'Technologies'),
(8, 'Transports'),
(9, 'Divers');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS "utilisateur" (
  "id" int(10) unsigned NOT NULL AUTO_INCREMENT,
  "lelogin" varchar(100) DEFAULT NULL,
  "lepass" varchar(45) DEFAULT NULL,
  "lemail" varchar(150) DEFAULT NULL,
  "lenom" varchar(80) DEFAULT NULL,
  "valide" tinyint(3) unsigned DEFAULT '1',
  "droit_id" int(10) unsigned NOT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "lelogin_UNIQUE" ("lelogin"),
  KEY "fk_utilisateur_droit_idx" ("droit_id")
) AUTO_INCREMENT=10 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `lelogin`, `lepass`, `lemail`, `lenom`, `valide`, `droit_id`) VALUES
(1, 'admin', 'admin', 'a.clarebots@gmail.com', 'Super Admin', 1, 1),
(2, 'modo', 'modo', 'modo@truc.be', 'MR le modo', 1, 2),
(3, 'util1', 'util1', 'util1@truc.be', 'utilisateur 1', 1, 3),
(5, 'util2', 'util2', 'util2@truc.be', 'utilisateur 2', 1, 3),
(9, 'util3', 'util3', 'util3@example.com', 'util3', 1, 3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT "fk_photo_utilisateur1" FOREIGN KEY ("utilisateur_id") REFERENCES "utilisateur" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `photo_has_rubrique`
--
ALTER TABLE `photo_has_rubrique`
  ADD CONSTRAINT "fk_photo_has_rubrique_photo1" FOREIGN KEY ("photo_id") REFERENCES "photo" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT "fk_photo_has_rubrique_rubrique1" FOREIGN KEY ("rubrique_id") REFERENCES "rubrique" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT "fk_utilisateur_droit" FOREIGN KEY ("droit_id") REFERENCES "droit" ("id") ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
