-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 09:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sante_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE `accounttype` (
  `libelle` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accounttype`
--

INSERT INTO `accounttype` (`libelle`) VALUES
('admin'),
('medecin'),
('superuser'),
('user');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `user_id` int(11) NOT NULL,
  `num_rv` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `commentaire` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `avissignale`
--

CREATE TABLE `avissignale` (
  `avis_user_id` int(11) NOT NULL,
  `avis_num_rv` int(11) NOT NULL,
  `user_signal_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_quarentaine` tinyint(1) NOT NULL DEFAULT 0,
  `is_ok` tinyint(1) NOT NULL DEFAULT 0,
  `admin_actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demandepaiement`
--

CREATE TABLE `demandepaiement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `montant` int(11) NOT NULL,
  `numTel` varchar(20) NOT NULL,
  `operateur_libelle` varchar(50) NOT NULL,
  `etat` varchar(20) NOT NULL,
  `dossier_ouvert` tinyint(1) NOT NULL DEFAULT 0,
  `admin_actor_id` int(11) NOT NULL,
  `paiement_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `concernes` varchar(20) NOT NULL,
  `question` varchar(500) NOT NULL,
  `reponse` text NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favoris`
--

CREATE TABLE `favoris` (
  `user_id` int(11) NOT NULL,
  `medecin_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hopital`
--

CREATE TABLE `hopital` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `lien` varchar(255) NOT NULL,
  `lat` decimal(8,6) NOT NULL,
  `lon` decimal(9,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hopital`
--

INSERT INTO `hopital` (`id`, `nom`, `lien`, `lat`, `lon`) VALUES
(1, 'Dantek', 'www.dantek.com', 14.716700, 17.467700),
(2, 'Fane', 'www.fane.com', 14.758900, 17.393800);

-- --------------------------------------------------------

--
-- Table structure for table `medecininfos`
--

CREATE TABLE `medecininfos` (
  `user_id` int(11) NOT NULL,
  `specialite_id` int(11) DEFAULT NULL,
  `autre_specialite` varchar(100) DEFAULT NULL,
  `hopital_id` int(11) DEFAULT NULL,
  `autre_hopital` varchar(100) DEFAULT NULL,
  `lat_lieurv` decimal(8,6) DEFAULT NULL,
  `lon_lieurv` decimal(9,6) DEFAULT NULL,
  `ville_lieurv` varchar(100) DEFAULT NULL,
  `attestation` varchar(255) NOT NULL,
  `carte_professionnelle` varchar(255) NOT NULL,
  `confirmed` tinyint(1) DEFAULT 0,
  `declined` tinyint(1) DEFAULT 0,
  `bio` text DEFAULT NULL,
  `tarif_enfant` int(11) DEFAULT NULL,
  `tarif_adulte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `notifType_libelle` varchar(50) NOT NULL,
  `num_rv` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notiftype`
--

CREATE TABLE `notiftype` (
  `libelle` varchar(50) NOT NULL,
  `icone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operateur`
--

CREATE TABLE `operateur` (
  `libelle` varchar(50) NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `priserv`
--

CREATE TABLE `priserv` (
  `user_id` int(11) NOT NULL,
  `num_rv` int(11) NOT NULL,
  `categorie_age` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `etat` varchar(15) NOT NULL,
  `commentaire` text DEFAULT NULL,
  `prix` int(11) NOT NULL,
  `paied` tinyint(1) NOT NULL DEFAULT 0,
  `online_paied` tinyint(1) NOT NULL DEFAULT 0,
  `paiement_code` varchar(255) DEFAULT NULL,
  `nbPatients` int(11) NOT NULL DEFAULT 1,
  `nom_complet_autre1` varchar(255) DEFAULT NULL,
  `categorie_age_autre1` varchar(20) DEFAULT NULL,
  `nom_complet_autre2` varchar(255) DEFAULT NULL,
  `categorie_age_autre2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rendezvous`
--

CREATE TABLE `rendezvous` (
  `num_rv` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `nb_limite` int(11) DEFAULT NULL,
  `closed` tinyint(1) NOT NULL DEFAULT 0,
  `medecin_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialite`
--

CREATE TABLE `specialite` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `couleur` varchar(10) NOT NULL,
  `icone` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `specialite`
--

INSERT INTO `specialite` (`id`, `nom`, `couleur`, `icone`, `description`) VALUES
(1, 'cardiologie', '#FF5733', 'public/Icons/Cardiologue.png', 'Cecis est la specialisation de cardio'),
(2, 'gynecologie', '#6495ED', 'public/Icons/gyneco.png', 'Cecis est la specialisation de gyneco'),
(3, 'generaliste', '#eeeeee', 'public/Icons/generalist.png', 'Cecis est la specialisation de generaliste');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `token` varchar(30) NOT NULL,
  `nom_complet` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `code_verification` int(11) NOT NULL CHECK (`code_verification` between 1000 and 9999),
  `accountType_libelle` varchar(15) NOT NULL,
  `sexe` varchar(1) DEFAULT NULL,
  `date_de_naissance` datetime DEFAULT NULL,
  `numero_tel` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
  `bloque` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `token`, `nom_complet`, `email`, `mot_de_passe`, `code_verification`, `accountType_libelle`, `sexe`, `date_de_naissance`, `numero_tel`, `photo`, `verified_at`, `bloque`) VALUES
(3, '56b5ebc2c5dd6', 'Mohamed Gaye', 'testuser1@gmail.com', '$2y$10$0wTTiCAMzvxkqv9aEJQB.uV23JgbDnOSldqBGkNCFSJCVdfDjiQ7W', 7976, 'user', 'h', '2024-02-28 00:00:00', NULL, 'public/uploads/user_profils/image_768FngN.jpg', '2024-02-26 04:31:09', 0),
(4, 'QK4z4UidKgHwstQD7r1a12HbLZqDor', NULL, 'testmedecin1@gmail.com', '$2y$10$paAQnwlyDdB5ccZN0HFHKukDwW70xemd4MyEST8Yw/AmNHLlWgpuG', 9763, 'medecin', NULL, NULL, NULL, NULL, '2024-02-26 19:46:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `validermedecin`
--

CREATE TABLE `validermedecin` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `validate_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounttype`
--
ALTER TABLE `accounttype`
  ADD PRIMARY KEY (`libelle`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`user_id`,`num_rv`),
  ADD KEY `num_rv` (`num_rv`);

--
-- Indexes for table `avissignale`
--
ALTER TABLE `avissignale`
  ADD PRIMARY KEY (`avis_user_id`,`avis_num_rv`),
  ADD KEY `avis_num_rv` (`avis_num_rv`),
  ADD KEY `user_signal_id` (`user_signal_id`),
  ADD KEY `admin_actor_id` (`admin_actor_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `demandepaiement`
--
ALTER TABLE `demandepaiement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `operateur_libelle` (`operateur_libelle`),
  ADD KEY `admin_actor_id` (`admin_actor_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`user_id`,`medecin_id`),
  ADD KEY `medecin_id` (`medecin_id`);

--
-- Indexes for table `hopital`
--
ALTER TABLE `hopital`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Indexes for table `medecininfos`
--
ALTER TABLE `medecininfos`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `attestation` (`attestation`),
  ADD UNIQUE KEY `carte_professionnelle` (`carte_professionnelle`),
  ADD KEY `specialite_id` (`specialite_id`),
  ADD KEY `hopital_id` (`hopital_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `notifType_libelle` (`notifType_libelle`),
  ADD KEY `num_rv` (`num_rv`);

--
-- Indexes for table `notiftype`
--
ALTER TABLE `notiftype`
  ADD PRIMARY KEY (`libelle`);

--
-- Indexes for table `operateur`
--
ALTER TABLE `operateur`
  ADD PRIMARY KEY (`libelle`);

--
-- Indexes for table `priserv`
--
ALTER TABLE `priserv`
  ADD PRIMARY KEY (`user_id`,`num_rv`),
  ADD KEY `num_rv` (`num_rv`);

--
-- Indexes for table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD PRIMARY KEY (`num_rv`),
  ADD KEY `medecin_id` (`medecin_id`);

--
-- Indexes for table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `accountType_libelle` (`accountType_libelle`);

--
-- Indexes for table `validermedecin`
--
ALTER TABLE `validermedecin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demandepaiement`
--
ALTER TABLE `demandepaiement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hopital`
--
ALTER TABLE `hopital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rendezvous`
--
ALTER TABLE `rendezvous`
  MODIFY `num_rv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `validermedecin`
--
ALTER TABLE `validermedecin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`num_rv`) REFERENCES `priserv` (`num_rv`);

--
-- Constraints for table `avissignale`
--
ALTER TABLE `avissignale`
  ADD CONSTRAINT `avissignale_ibfk_1` FOREIGN KEY (`avis_user_id`) REFERENCES `avis` (`user_id`),
  ADD CONSTRAINT `avissignale_ibfk_2` FOREIGN KEY (`avis_num_rv`) REFERENCES `avis` (`num_rv`),
  ADD CONSTRAINT `avissignale_ibfk_3` FOREIGN KEY (`user_signal_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `avissignale_ibfk_4` FOREIGN KEY (`admin_actor_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `demandepaiement`
--
ALTER TABLE `demandepaiement`
  ADD CONSTRAINT `demandepaiement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `demandepaiement_ibfk_2` FOREIGN KEY (`operateur_libelle`) REFERENCES `operateur` (`libelle`),
  ADD CONSTRAINT `demandepaiement_ibfk_3` FOREIGN KEY (`admin_actor_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favoris_ibfk_2` FOREIGN KEY (`medecin_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `medecininfos`
--
ALTER TABLE `medecininfos`
  ADD CONSTRAINT `medecininfos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `medecininfos_ibfk_2` FOREIGN KEY (`specialite_id`) REFERENCES `specialite` (`id`),
  ADD CONSTRAINT `medecininfos_ibfk_3` FOREIGN KEY (`hopital_id`) REFERENCES `hopital` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`notifType_libelle`) REFERENCES `notiftype` (`libelle`),
  ADD CONSTRAINT `notification_ibfk_3` FOREIGN KEY (`num_rv`) REFERENCES `rendezvous` (`num_rv`);

--
-- Constraints for table `priserv`
--
ALTER TABLE `priserv`
  ADD CONSTRAINT `priserv_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `priserv_ibfk_2` FOREIGN KEY (`num_rv`) REFERENCES `rendezvous` (`num_rv`);

--
-- Constraints for table `rendezvous`
--
ALTER TABLE `rendezvous`
  ADD CONSTRAINT `rendezvous_ibfk_1` FOREIGN KEY (`medecin_id`) REFERENCES `medecininfos` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`accountType_libelle`) REFERENCES `accounttype` (`libelle`);

--
-- Constraints for table `validermedecin`
--
ALTER TABLE `validermedecin`
  ADD CONSTRAINT `validermedecin_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `validermedecin_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
