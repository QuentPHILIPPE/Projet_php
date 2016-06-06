-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 06 Juin 2016 à 13:46
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `adresseMail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`adresseMail`) VALUES
('admin@site.com'),
('philippequentin91@gmail.com'),
('Simonvasseur91550@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE `album` (
  `idAlbum` int(11) NOT NULL,
  `nomAlbum` varchar(30) NOT NULL,
  `dateSortie` date DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `lienYoutube` varchar(100) DEFAULT NULL,
  `artiste` int(11) DEFAULT NULL,
  `lienLastFm` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`idAlbum`, `nomAlbum`, `dateSortie`, `note`, `lienYoutube`, `artiste`, `lienLastFm`) VALUES
(1, 'The Black Album', '2016-06-04', 4, 'https://www.youtube.com/watch?v=tlXCutnPb7U', 4, NULL),
(2, 'Me and Bobby Mcgee', '2016-01-01', 4, NULL, 6, NULL),
(4, 'The Number of the Beast', '1988-11-12', 3, NULL, 3, NULL),
(5, 'Led Zeppelin I', '1969-01-12', 4, NULL, 2, NULL),
(6, 'Led Zeppelin II', '1969-10-22', 5, NULL, 2, NULL),
(7, 'Led Zeppelin III', '1970-10-05', 4, NULL, 2, NULL),
(8, 'Led Zeppelin IV', '1971-11-08', 5, NULL, 2, NULL),
(9, 'Houses of the Holy', '1973-03-28', 3, NULL, 2, NULL),
(10, 'Physical Graffiti', '1975-02-24', 5, NULL, 2, NULL),
(11, 'Presence', '1976-03-31', 5, NULL, 2, 'http://www.last.fm/fr/music/Led+Zeppelin/Presence'),
(12, 'In Through the out door ', '1979-08-15', 3, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE `artiste` (
  `idArtiste` int(11) NOT NULL,
  `nomArtiste` varchar(30) NOT NULL,
  `dateNaissance` date DEFAULT NULL,
  `biographie` varchar(2000) DEFAULT NULL,
  `lienWiki` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`idArtiste`, `nomArtiste`, `dateNaissance`, `biographie`, `lienWiki`) VALUES
(1, 'Motorhead', NULL, NULL, 'https://fr.wikipedia.org/wiki/Motörhead'),
(2, 'Led Zeppelin', '1968-09-07', NULL, 'https://fr.wikipedia.org/wiki/Led_Zeppelin'),
(3, 'Iron Maiden', NULL, NULL, 'https://fr.wikipedia.org/wiki/Iron_Maiden'),
(4, 'Metallica', NULL, NULL, 'https://fr.wikipedia.org/wiki/Metallica'),
(5, 'Megadeth', NULL, NULL, 'https://fr.wikipedia.org/wiki/Megadeth'),
(6, 'Janis Joplin', NULL, NULL, 'https://fr.wikipedia.org/wiki/Janis_Joplin'),
(8, 'The Jimi Hendrix Experience', NULL, NULL, 'https://fr.wikipedia.org/wiki/The_Jimi_Hendrix_Experience'),
(9, 'Aerosmith', NULL, NULL, 'https://fr.wikipedia.org/wiki/Aerosmith'),
(10, 'Black Sabbath', NULL, NULL, 'https://fr.wikipedia.org/wiki/Black_Sabbath'),
(11, 'Anthrax', NULL, NULL, 'https://fr.wikipedia.org/wiki/Anthrax_(groupe)'),
(12, 'AC/DC', NULL, NULL, 'https://fr.wikipedia.org/wiki/AC/DC'),
(13, 'Guns N'' Roses', NULL, NULL, 'https://fr.wikipedia.org/wiki/Guns_N%27_Roses');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idCommentaire` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `album` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `message` varchar(500) DEFAULT NULL,
  `dateComm` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`idCommentaire`, `pseudo`, `album`, `note`, `message`, `dateComm`) VALUES
(1, 'user', 11, 5, 'Fine', '2016-06-05 22:33:09'),
(3, 'user', 11, 3, 'Bonjour', '2016-06-05 22:50:58'),
(4, 'user', 11, 1, 'oui', '2016-06-05 22:54:42');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `adresseMail` varchar(50) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdpU` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`adresseMail`, `pseudo`, `mdpU`) VALUES
('admin@site.com', 'admin', '$2y$10$3ItlYMNs6TfYpnwgKL'),
('philippequentin91@gmail.com', 'quentin', '$2y$10$2iEFjEjsK23Q6h0bkd'),
('Simonvasseur91550@gmail.com', 'simon', '$2y$10$/2FLImUXAhBndTtRgg'),
('user@lambda.com', 'user', '$2y$10$v5MbFgJQBOjYiB2aFz');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD KEY `adresseMail` (`adresseMail`);

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`idAlbum`),
  ADD KEY `artiste` (`artiste`);

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`idArtiste`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idCommentaire`),
  ADD KEY `album` (`album`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`adresseMail`),
  ADD UNIQUE KEY `adresseMail` (`adresseMail`,`pseudo`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `album`
--
ALTER TABLE `album`
  MODIFY `idAlbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `idArtiste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idCommentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`adresseMail`) REFERENCES `utilisateur` (`adresseMail`);

--
-- Contraintes pour la table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_3` FOREIGN KEY (`artiste`) REFERENCES `artiste` (`idArtiste`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`album`) REFERENCES `album` (`idAlbum`),
  ADD CONSTRAINT `commentaire_ibfk_3` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
