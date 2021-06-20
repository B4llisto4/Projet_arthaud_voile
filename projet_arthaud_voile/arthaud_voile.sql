-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 17 juin 2021 à 21:46
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `arthaud_voile`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `name`) VALUES
(2, 'toto@toto.fr', '', NULL),
(3, 'toto@toto.fr', '$2y$10$IKASFqxgVMPqgAl5xE5oU.MSCcxs/HZqPnoY5w/dF0Zvsaw9o4Afy', NULL),
(4, 'toto@toto.fr', '$2y$10$i2thF2mXQbzyoao7ArZA2eurGLzGTqG31QAYsfIO7xQ8YxptYUgim', NULL),
(5, 'toto@toto.fr', '$2y$10$N1uwYhJI2qazenMd8xqbSO3RMznBj3xkBQEbZYRVuGNtFlTpipZra', NULL),
(6, 'toto@toto.fr', '$2y$10$7/m/GMPDc25OzcG8MBztxumz7r0h99Kkv.0rO0ZYiNVSyZEiR4KVG', ''),
(7, 'toto@toto.toto', '$2y$10$wB.UvskNJ7k1hiV2f.Gm7OaKISKawvgtXf9wszRGUsKRE.9tMTU0u', 'toto'),
(8, 'toto@toto.toto', '$2y$10$GK2b4u8VcwTlbCiexhGLuePkJMZ.d6C/GkjivyhrjZzsru6mQkMJG', 'toto'),
(9, 'toto@toto.toto', '$2y$10$7VQ60I3HcSCrgNk7HFHmf.NVTaQmlbt8wWIlmcvVNMbdDWigCev96', 'toto'),
(10, 'baptisteraymond6@gmail.com', '$2y$10$xA9l5JK5buKGdUIRMNoCuurdmZ3SQHzFCIyxsWgSnp6VPwEbIqGgy', 'Raymond'),
(11, 'baptisteraymond4@gmail.com', '$2y$10$UbxAeMwmD0cGfAt5lnES6.XJSBYWIKOFw.faIzpyS7.dxaQDxpWGa', 'Raymond'),
(12, 'baptisteraymond4@gmail.com', '$2y$10$su8ZmqKEBNzepy/.ntdpKu1r1jve8CKoBoxWe1LWn4kvnLYQLpB3e', 'Raymond');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`name`, `lastname`, `email`, `password`, `address`) VALUES
('toto', 'toto', 'toto@toto.fr', '$2y$10$OVxJN94tE2aoCFu1yILo/.VlFApzhuZjc/331bGhqz4NOUdisd602', 'toto'),
('toto2', 'toto2', 'toto2@toto2.fr', '$2y$10$tROJXNmmVIfC3qjM5c/62uAuOAhupqF/sqG/bFXmVol81MI0t0nLK', 'toto2');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(5) NOT NULL,
  `id_client` int(5) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_client`, `status`) VALUES
(1, 1, 'En cours'),
(2, 2, 'Nouvelle');

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id_commande` int(5) NOT NULL,
  `id_produit` int(5) NOT NULL,
  `qty` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `compte_client`
--

CREATE TABLE `compte_client` (
  `username` int(20) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(40) NOT NULL,
  `qty_available` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
