-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 05 oct. 2020 à 20:28
-- Version du serveur :  5.7.31
-- Version de PHP : 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_divinas`
--

-- --------------------------------------------------------

--
-- Structure de la table `acte_deces`
--

DROP TABLE IF EXISTS `acte_deces`;
CREATE TABLE IF NOT EXISTS `acte_deces` (
  `id_deces` int(11) NOT NULL AUTO_INCREMENT,
  `acte_deces_num` varchar(100) NOT NULL,
  `volume_acte` varchar(100) NOT NULL,
  `folio_acte` varchar(100) NOT NULL,
  `annee_acte` varchar(100) NOT NULL,
  `jour_acte` varchar(100) NOT NULL,
  `profession_deces` varchar(100) NOT NULL,
  `est_decede` varchar(100) NOT NULL,
  `residant_deces` varchar(100) NOT NULL,
  `nationalite_deces` varchar(100) NOT NULL,
  `etat_civil_deces` varchar(100) NOT NULL,
  `comID` int(11) NOT NULL,
  `ID_Off` int(11) NOT NULL,
  `defunt_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_deces`),
  KEY `comID` (`comID`),
  KEY `ID_Off` (`ID_Off`),
  KEY `id_defunt` (`defunt_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `acte_de_naissance`
--

DROP TABLE IF EXISTS `acte_de_naissance`;
CREATE TABLE IF NOT EXISTS `acte_de_naissance` (
  `idActeNais` int(11) NOT NULL AUTO_INCREMENT,
  `codeAct` varchar(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `folio` varchar(100) NOT NULL,
  `profession` varchar(100) NOT NULL,
  `nationalite` varchar(100) NOT NULL,
  `professionpere` varchar(100) NOT NULL,
  `resident` varchar(100) NOT NULL,
  `langue` varchar(100) NOT NULL,
  `officier_id` int(11) NOT NULL,
  `commune_id` int(11) NOT NULL,
  `nouveaune_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idActeNais`),
  KEY `officier_id` (`officier_id`),
  KEY `commune_id` (`commune_id`),
  KEY `nouveaune_id` (`nouveaune_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `acte_mariage`
--

DROP TABLE IF EXISTS `acte_mariage`;
CREATE TABLE IF NOT EXISTS `acte_mariage` (
  `id_acte_mariage` int(11) NOT NULL AUTO_INCREMENT,
  `acte_num` varchar(100) NOT NULL,
  `annee` varchar(100) NOT NULL,
  `jour` varchar(100) NOT NULL,
  `etat_civil_epoux` varchar(100) NOT NULL,
  `residant_epoux` varchar(100) NOT NULL,
  `profession_epoux` varchar(100) NOT NULL,
  `etat_civil_epouse` varchar(100) NOT NULL,
  `residant_epouse` varchar(100) NOT NULL,
  `profession_epouse` varchar(100) NOT NULL,
  `dote_composee` varchar(255) NOT NULL,
  `date_celebree` date NOT NULL,
  `date_publier` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `officierID` int(11) NOT NULL,
  `communesID` int(11) NOT NULL,
  `projet_mariage_id` int(11) NOT NULL,
  `publier` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_acte_mariage`),
  KEY `officierID` (`officierID`),
  KEY `communesID` (`communesID`),
  KEY `projet_mariage_id` (`projet_mariage_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(100) NOT NULL,
  `nomAgent` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `type_Id` int(11) NOT NULL,
  `loginAdmin` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `type_Id` (`type_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `matricule`, `nomAgent`, `service`, `type_Id`, `loginAdmin`, `motdepasse`) VALUES
(1, '2020121', 'Kamb', 'Mairie', 3, 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commune` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commune`
--

INSERT INTO `commune` (`id`, `commune`) VALUES
(1, 'Kampemba'),
(2, 'Lubumbashi'),
(3, 'Kenya'),
(4, 'Ruashi'),
(5, 'Katuba'),
(6, 'Annexe'),
(7, 'Kamalondo');

-- --------------------------------------------------------

--
-- Structure de la table `defunt`
--

DROP TABLE IF EXISTS `defunt`;
CREATE TABLE IF NOT EXISTS `defunt` (
  `id_defunt` int(11) NOT NULL AUTO_INCREMENT,
  `nom_defunt` varchar(100) NOT NULL,
  `postnom_defunt` varchar(100) NOT NULL,
  `prenom_defunt` varchar(100) NOT NULL,
  `sexe_defunt` varchar(100) NOT NULL,
  `nom_pere` varchar(100) NOT NULL,
  `nom_mere` varchar(100) NOT NULL,
  `nom_comparant` varchar(100) NOT NULL,
  `date_deces` date NOT NULL,
  `lieu_naissance` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adresse_defunt` varchar(255) NOT NULL,
  `Id_commune` int(11) NOT NULL,
  `frais_ID` int(11) NOT NULL,
  PRIMARY KEY (`id_defunt`),
  KEY `Id_commune` (`Id_commune`),
  KEY `frais_ID` (`frais_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `frais_mariage`
--

DROP TABLE IF EXISTS `frais_mariage`;
CREATE TABLE IF NOT EXISTS `frais_mariage` (
  `id_Frais` int(11) NOT NULL AUTO_INCREMENT,
  `nomme` varchar(100) NOT NULL,
  `typeFrais` varchar(100) NOT NULL,
  `montant` int(11) NOT NULL,
  `communee_id` int(11) NOT NULL,
  `prepose_id` int(11) NOT NULL,
  `date_frais` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_Frais`),
  KEY `communee_id` (`communee_id`),
  KEY `prepose_id` (`prepose_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mariages`
--

DROP TABLE IF EXISTS `mariages`;
CREATE TABLE IF NOT EXISTS `mariages` (
  `id_mariage` int(11) NOT NULL,
  `nomEpoux` varchar(100) NOT NULL,
  `nomEpouse` varchar(100) NOT NULL,
  `descriptionMariage` varchar(255) NOT NULL,
  `photoEpoux` varchar(255) NOT NULL,
  `photoEpouse` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idCommune` int(11) NOT NULL,
  KEY `idCommune` (`idCommune`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `nouveau_ne`
--

DROP TABLE IF EXISTS `nouveau_ne`;
CREATE TABLE IF NOT EXISTS `nouveau_ne` (
  `id_naissance` int(11) NOT NULL AUTO_INCREMENT,
  `nom_nv_ne` varchar(100) NOT NULL,
  `postnom_nv_ne` varchar(100) NOT NULL,
  `prenom_nv_ne` varchar(100) NOT NULL,
  `sexe` varchar(100) NOT NULL,
  `nom_pere` varchar(100) NOT NULL,
  `nom_mere` varchar(100) NOT NULL,
  `nom_declarant` varchar(100) NOT NULL,
  `lieu_naissance` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `ID_comm` int(11) NOT NULL,
  `frais_doc_id` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_naissance`),
  KEY `ID_comm` (`ID_comm`),
  KEY `frais_doc_id` (`frais_doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `officier`
--

DROP TABLE IF EXISTS `officier`;
CREATE TABLE IF NOT EXISTS `officier` (
  `idOfficier` int(11) NOT NULL AUTO_INCREMENT,
  `nomOfficier` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `login` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `typeOfficier` int(11) NOT NULL,
  `communeId` int(11) NOT NULL,
  PRIMARY KEY (`idOfficier`),
  KEY `typeOfficier` (`typeOfficier`),
  KEY `communeId` (`communeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prepose`
--

DROP TABLE IF EXISTS `prepose`;
CREATE TABLE IF NOT EXISTS `prepose` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `login` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `typePrepose` int(11) NOT NULL,
  `idcommune` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `typePrepose` (`typePrepose`),
  KEY `idcommune` (`idcommune`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prepose`
--

INSERT INTO `prepose` (`id`, `nom`, `prenom`, `login`, `motdepasse`, `typePrepose`, `idcommune`) VALUES
(1, 'DIVINE', 'DIVINE', 'DIVINE', 'DIVINE', 4, 7),
(2, 'MANASSE', 'MANASSE', 'MANASSE', 'MANASSE', 4, 2),
(3, 'DODET', 'DODET', 'DODET', 'DODET', 4, 7),
(4, 'DAUPHIN', 'DAUPHIN', 'DAUPHIN', '1111', 4, 1),
(5, 'DON', 'DON', 'DON', 'DON', 1, 7),
(6, 'DO', 'DO', 'DO', 'DO', 5, 7);

-- --------------------------------------------------------

--
-- Structure de la table `projet_mariage`
--

DROP TABLE IF EXISTS `projet_mariage`;
CREATE TABLE IF NOT EXISTS `projet_mariage` (
  `id_projet_mariage` int(11) NOT NULL AUTO_INCREMENT,
  `numero_projet` varchar(100) NOT NULL,
  `nom_Epoux` varchar(100) NOT NULL,
  `nom_Epouse` varchar(100) NOT NULL,
  `lieu_naissance_epoux` varchar(100) NOT NULL,
  `date_naissance_epoux` date NOT NULL,
  `lieu_naissance_epouse` varchar(100) NOT NULL,
  `date_naissance_epouse` date NOT NULL,
  `nom_temoin` varchar(100) NOT NULL,
  `regime_matrimoniaux` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photoEpoux` varchar(255) NOT NULL,
  `photoEpouse` varchar(255) NOT NULL,
  `id_Communes` int(11) NOT NULL,
  `nom_pere_epoux` varchar(100) NOT NULL,
  `nom_mere_epoux` varchar(100) NOT NULL,
  `nom_pere_epouse` varchar(100) NOT NULL,
  `nom_mere_epouse` varchar(100) NOT NULL,
  `province_epoux` varchar(100) NOT NULL,
  `territoire_epoux` varchar(100) NOT NULL,
  `province_epouse` varchar(100) NOT NULL,
  `territoire_epouse` varchar(100) NOT NULL,
  `date_celebration` date NOT NULL,
  `frais_document_id` int(11) NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_projet_mariage`),
  KEY `id_Communes` (`id_Communes`),
  KEY `frais_document_id` (`frais_document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typeuser`
--

DROP TABLE IF EXISTS `typeuser`;
CREATE TABLE IF NOT EXISTS `typeuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeUser` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeuser`
--

INSERT INTO `typeuser` (`id`, `typeUser`) VALUES
(1, 'Prepose mariage'),
(2, 'Officier de l\'Etat'),
(3, 'Administrateur'),
(4, 'Prepose naissance'),
(5, 'Prepose deces');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acte_deces`
--
ALTER TABLE `acte_deces`
  ADD CONSTRAINT `acte_deces_ibfk_1` FOREIGN KEY (`defunt_ID`) REFERENCES `defunt` (`id_defunt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acte_deces_ibfk_2` FOREIGN KEY (`ID_Off`) REFERENCES `officier` (`idOfficier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acte_deces_ibfk_3` FOREIGN KEY (`comID`) REFERENCES `commune` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `acte_de_naissance`
--
ALTER TABLE `acte_de_naissance`
  ADD CONSTRAINT `acte_de_naissance_ibfk_1` FOREIGN KEY (`commune_id`) REFERENCES `commune` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acte_de_naissance_ibfk_2` FOREIGN KEY (`officier_id`) REFERENCES `officier` (`idOfficier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acte_de_naissance_ibfk_3` FOREIGN KEY (`nouveaune_id`) REFERENCES `nouveau_ne` (`id_naissance`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `acte_mariage`
--
ALTER TABLE `acte_mariage`
  ADD CONSTRAINT `acte_mariage_ibfk_1` FOREIGN KEY (`communesID`) REFERENCES `commune` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acte_mariage_ibfk_2` FOREIGN KEY (`officierID`) REFERENCES `officier` (`idOfficier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acte_mariage_ibfk_3` FOREIGN KEY (`projet_mariage_id`) REFERENCES `projet_mariage` (`id_projet_mariage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`type_Id`) REFERENCES `typeuser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `defunt`
--
ALTER TABLE `defunt`
  ADD CONSTRAINT `defunt_ibfk_1` FOREIGN KEY (`frais_ID`) REFERENCES `frais_mariage` (`id_Frais`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `defunt_ibfk_2` FOREIGN KEY (`Id_commune`) REFERENCES `commune` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `frais_mariage`
--
ALTER TABLE `frais_mariage`
  ADD CONSTRAINT `frais_mariage_ibfk_1` FOREIGN KEY (`communee_id`) REFERENCES `commune` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `frais_mariage_ibfk_2` FOREIGN KEY (`prepose_id`) REFERENCES `prepose` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `nouveau_ne`
--
ALTER TABLE `nouveau_ne`
  ADD CONSTRAINT `nouveau_ne_ibfk_1` FOREIGN KEY (`ID_comm`) REFERENCES `commune` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `officier`
--
ALTER TABLE `officier`
  ADD CONSTRAINT `officier_ibfk_1` FOREIGN KEY (`typeOfficier`) REFERENCES `typeuser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `officier_ibfk_2` FOREIGN KEY (`communeId`) REFERENCES `commune` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `prepose`
--
ALTER TABLE `prepose`
  ADD CONSTRAINT `prepose_ibfk_1` FOREIGN KEY (`typePrepose`) REFERENCES `typeuser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prepose_ibfk_2` FOREIGN KEY (`idcommune`) REFERENCES `commune` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `projet_mariage`
--
ALTER TABLE `projet_mariage`
  ADD CONSTRAINT `projet_mariage_ibfk_1` FOREIGN KEY (`id_Communes`) REFERENCES `commune` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
