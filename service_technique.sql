-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 10:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service_technique`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `code` varchar(1024) DEFAULT NULL,
  `Intitule_ar` varchar(1024) DEFAULT NULL,
  `Intitule_fr` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `code`, `Intitule_ar`, `Intitule_fr`) VALUES
(1, 'INT', 'إعلام آلي - الرقمنة - الاتصالات', 'Exploitant informatique'),
(2, 'TAG', 'تقنيات الادارة و التسيير', 'Comptabilité'),
(3, 'MEE', 'مهن البيئة و المياه', 'Entretien des réseaux d’alimentation en eau potable'),
(4, 'ART', 'الحرف التقليدية', 'Réalisation des ouvrages de broderie à la main'),
(5, 'MEE', 'مهن البيئة و المياه', 'Récupération et recyclage des déchets'),
(6, 'MEE', 'مهن البيئة و المياه', 'Récupération et recyclage des déchets'),
(7, 'THC', 'النسيج والألبسة', 'Piquage et montage de vêtements'),
(8, 'MEE', 'مهن البيئة و المياه', 'Récupération et recyclage des déchets'),
(10, 'AGR', 'الفلاحة', 'Eleveur de bétail'),
(11, 'AGR', 'الفلاحة', 'Alimentation du bétail'),
(12, 'BTP', 'البناء و الأشغال العمومية', 'Peintre bâtiment'),
(14, 'ART', 'الحرف التقليدية', 'Broderie'),
(16, 'INTEL', 'intel', 'انتل'),
(42, 's', 's', 's'),
(43, 's', 's', 's'),
(48, 'cc', 'cc', 'cc');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `value`) VALUES
(1, 'language', 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `formulaires`
--

CREATE TABLE `formulaires` (
  `id` int(11) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_fr` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `description_fr` varchar(255) NOT NULL,
  `filename_ar` varchar(255) NOT NULL,
  `filename_fr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formulaires`
--

INSERT INTO `formulaires` (`id`, `name_ar`, `name_fr`, `description_ar`, `description_fr`, `filename_ar`, `filename_fr`) VALUES
(22, 'qwe', 'qwe', 'qweqwe', 'weqe', '6441dc8b87d2d3.90977575.docx', '6441dc8b87f178.40194522.docx'),
(38, 'qwe', 'e', 'qwe', 'qwe', '6441df29d7aca0.45200113.docx', '6441df29d7d040.60780062.docx'),
(75, 'qwe', 'qwe', 'qw', 'qw', '6441e169d5b6a1.09229251.docx', '6441e169d61c00.99525350.docx'),
(76, 'qwe', 'qwe', 'qw', 'qw', '6441e1f477fc45.33669608.docx', '6441e1f4781515.19433311.docx');

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `id` int(11) NOT NULL,
  `lang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `lang`) VALUES
(1, 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `niveau_scolar`
--

CREATE TABLE `niveau_scolar` (
  `id` bigint(20) DEFAULT NULL,
  `niveau` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `niveau_scolar`
--

INSERT INTO `niveau_scolar` (`id`, `niveau`) VALUES
(0, 'AUCUN NIVEAU SCOLAIRE'),
(1, 'NIVEAU SCOLAIRE RÉDUIT CYCLE D’ALPHABÉTISATION ACHEVÉ'),
(2, 'CYCLE PRIMAIRE'),
(3, 'FIN DU CYCLE PRIMAIRE'),
(4, 'CYCLE MOYEN'),
(5, '4ÈME ANNÉE MOYENNE'),
(6, '2ÈME ANNÉE SECONDAIRE'),
(7, '3ÈME ANNÉE SECONDAIRE'),
(8, 'CFPS + 02 ans d’expérience professionnelle'),
(9, 'CFPS + classés parmi les cinq (5) premiers'),
(10, 'CAP + 02 ans d’expérience professionnelle'),
(11, 'CAP + 03 ans d’expérience pour les candidats justifiant d’un niveau scolaire inférieur à la 4ème année moyenne'),
(12, 'CAP + 03 ans d’expérience pour les candidats justifiant d’un niveau scolaire inférieur à la 2ème année secondaire'),
(13, 'CAP + 02 ans d’expérience pour les candidats justifiant niveau scolaire du cycle primaire'),
(14, 'CAP + 02 ans d’expérience professionnelle pour les candidats justifiant d’un niveau scolaire de 4ème année moyenne'),
(15, 'CAP + classés parmi les cinq (5) premiers'),
(16, 'CMP + 02 ans d’expérience professionnelle'),
(17, 'CMP + niveau scolaire 2ème année secondaire'),
(18, 'CMP + 02 ans d’expérience professionnelle, pour les candidats justifiant du niveau scolaire inférieur à la 2ème'),
(19, 'CMP + 03 ans d’expérience professionnelle pour les candidats justifiant d’un niveau scolaire inférieur à la 4ème année moyenne'),
(20, 'CMP_OU_CAP_+_2ème AS_\"OU\"_+_EXPER-PROF_\"OU\"_+_Major De Promo'),
(21, 'BT + 3ème année secondaire'),
(22, 'BT + 02 ans d’expérience professionnelle'),
(23, 'BT + 02 ans d’expérience professionnelle pour les candidats justifiant de la 2ème année secondaire'),
(24, 'BT + 04 ans d’expérience professionnelle pour les candidats justifiant d’un niveau scolaire inférieur à la 2ème année secondaire'),
(25, 'BT + classés parmi les cinq (5) premiers'),
(26, 'DEP1'),
(27, 'DEP2'),
(28, '4ème année moyenne Admis'),
(29, '1ére AS réorientés'),
(30, 'BEP'),
(31, 'BT + 06 ans d’expérience professionnelle pour les candidats justifiant d’un niveau scolaire inférieur à la 2ème année secondaire'),
(32, 'CMP + 02 ans d’expérience professionnelle, pour les candidats justifiant du niveau scolaire inférieur à la 4eme annee moyenne'),
(33, 'CMTC_+_3ème AS_OU__EXPER-PROF__\"OU\"_Major De Promo'),
(34, 'CMTC + دورة تكوينية في CED'),
(35, 'CMP + classés parmi les cinq (5) premiers');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `name`, `date`) VALUES
(1, 'فيفري', '02'),
(2, 'سبتمبر', '09');

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `conditions` varchar(255) NOT NULL,
  `training_mode` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `code`, `name`, `level`, `certificate`, `duration`, `conditions`, `training_mode`, `branch_id`) VALUES
(1, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qweqew', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `tel`, `email`, `password`, `img`) VALUES
(1, 'admin', '', '', 'admin@gmail.com', '$2y$10$LEKyEGFcZs04xWUdZr0SyeEh7l3zHIBRIf5HfiGZLlWcNcN6UeF6O', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formulaires`
--
ALTER TABLE `formulaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `formulaires`
--
ALTER TABLE `formulaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
