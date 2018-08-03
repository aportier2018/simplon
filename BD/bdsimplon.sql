-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : db745063418.db.1and1.com
-- Généré le :  ven. 03 août 2018 à 09:15
-- Version du serveur :  5.5.60-0+deb7u1-log
-- Version de PHP :  7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db745063418`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_art` int(11) NOT NULL,
  `titre_art` varchar(50) NOT NULL,
  `resume_art` varchar(50) NOT NULL,
  `id_theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_art`, `titre_art`, `resume_art`, `id_theme`) VALUES
(3, 'html', 'html nouvelle formule', 1);

-- --------------------------------------------------------

--
-- Structure de la table `auteuredacteur`
--

CREATE TABLE `auteuredacteur` (
  `id_auteur` int(11) NOT NULL,
  `n_auteur` varchar(50) NOT NULL,
  `p_auteur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auteuredacteur`
--

INSERT INTO `auteuredacteur` (`id_auteur`, `n_auteur`, `p_auteur`) VALUES
(1, 'simplon', 'simplon');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_img` int(11) NOT NULL,
  `titre_img` varchar(50) NOT NULL,
  `n_photographe` varchar(10) DEFAULT NULL,
  `p_photographe` varchar(10) DEFAULT NULL,
  `source` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_img`, `titre_img`, `n_photographe`, `p_photographe`, `source`) VALUES
(1, 'html5', 'nomp', 'prenomp', 'http://icons.iconarchive.com/icons/designbolts/cute-social-2014/256/HTML5-icon.png');

-- --------------------------------------------------------

--
-- Structure de la table `integrer`
--

CREATE TABLE `integrer` (
  `id_img` int(11) NOT NULL,
  `id_art` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `integrer`
--

INSERT INTO `integrer` (`id_img`, `id_art`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `motcle`
--

CREATE TABLE `motcle` (
  `id_motcle` int(11) NOT NULL,
  `motcle` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `motcle`
--

INSERT INTO `motcle` (`id_motcle`, `motcle`) VALUES
(1, 'html'),
(3, 'php'),
(4, 'balise');

-- --------------------------------------------------------

--
-- Structure de la table `possede`
--

CREATE TABLE `possede` (
  `id_art` int(11) NOT NULL,
  `id_motcle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `possede`
--

INSERT INTO `possede` (`id_art`, `id_motcle`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `publie`
--

CREATE TABLE `publie` (
  `id_art` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL,
  `date_publicat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publie`
--

INSERT INTO `publie` (`id_art`, `id_auteur`, `date_publicat`) VALUES
(3, 1, '2018-08-09');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id_theme` int(11) NOT NULL,
  `theme` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`id_theme`, `theme`) VALUES
(1, 'html'),
(2, 'php'),
(5, 'base de donnée'),
(6, 'phpmyadmin'),
(7, 'base de donnée'),
(8, 'phpmyadmin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_art`),
  ADD KEY `article_theme_FK` (`id_theme`);

--
-- Index pour la table `auteuredacteur`
--
ALTER TABLE `auteuredacteur`
  ADD PRIMARY KEY (`id_auteur`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_img`);

--
-- Index pour la table `integrer`
--
ALTER TABLE `integrer`
  ADD PRIMARY KEY (`id_img`,`id_art`),
  ADD KEY `integrer_article0_FK` (`id_art`);

--
-- Index pour la table `motcle`
--
ALTER TABLE `motcle`
  ADD PRIMARY KEY (`id_motcle`);

--
-- Index pour la table `possede`
--
ALTER TABLE `possede`
  ADD PRIMARY KEY (`id_art`,`id_motcle`),
  ADD KEY `possede_motcle0_FK` (`id_motcle`);

--
-- Index pour la table `publie`
--
ALTER TABLE `publie`
  ADD PRIMARY KEY (`id_art`,`id_auteur`),
  ADD KEY `publie_auteuredacteur0_FK` (`id_auteur`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id_theme`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `auteuredacteur`
--
ALTER TABLE `auteuredacteur`
  MODIFY `id_auteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `motcle`
--
ALTER TABLE `motcle`
  MODIFY `id_motcle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id_theme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_theme_FK` FOREIGN KEY (`id_theme`) REFERENCES `theme` (`id_theme`);

--
-- Contraintes pour la table `integrer`
--
ALTER TABLE `integrer`
  ADD CONSTRAINT `integrer_image_FK` FOREIGN KEY (`id_img`) REFERENCES `image` (`id_img`),
  ADD CONSTRAINT `integrer_article0_FK` FOREIGN KEY (`id_art`) REFERENCES `article` (`id_art`);

--
-- Contraintes pour la table `possede`
--
ALTER TABLE `possede`
  ADD CONSTRAINT `possede_article_FK` FOREIGN KEY (`id_art`) REFERENCES `article` (`id_art`),
  ADD CONSTRAINT `possede_motcle0_FK` FOREIGN KEY (`id_motcle`) REFERENCES `motcle` (`id_motcle`);

--
-- Contraintes pour la table `publie`
--
ALTER TABLE `publie`
  ADD CONSTRAINT `publie_article_FK` FOREIGN KEY (`id_art`) REFERENCES `article` (`id_art`),
  ADD CONSTRAINT `publie_auteuredacteur0_FK` FOREIGN KEY (`id_auteur`) REFERENCES `auteuredacteur` (`id_auteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
