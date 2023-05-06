-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 04:45 PM
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
(14, 'ART', 'الحرف التقليدية', 'Broderie'),
(16, 'INTEL', 'intel', 'انتل'),
(42, 's', 's', 's'),
(43, 's', 's', 's'),
(48, 'cc', 'cc', 'cc'),
(49, 's', 's', 's'),
(50, 'w', 'w', 'w'),
(51, 'w', 'w', 'w'),
(52, 'w', 'w', 'w'),
(53, 'w', 'w', 'w'),
(54, 'w', 'w', 'w'),
(55, 'w', 'w', 'w'),
(56, 'w', 'w', 'w'),
(57, 'w', 'w', 'w'),
(58, 'w', 'w', 'w'),
(59, 'w', 'w', 'w'),
(60, 'e', 'e', 'erer');

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
-- Table structure for table `formateurs`
--

CREATE TABLE `formateurs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `matriclue` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formateurs`
--

INSERT INTO `formateurs` (`id`, `name`, `matriclue`, `email`) VALUES
(1, 'as', '', '');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `month`, `year`) VALUES
(1, '2', '2023'),
(2, '9', '2023');

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
  `branch_id` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `code`, `name`, `level`, `certificate`, `duration`, `conditions`, `training_mode`, `branch_id`, `created_at`, `updated_at`) VALUES
(2, 'ssssssssss', 'ssssssss', 'ssssssssssss', 'ssssssssssss', 'sssssssss', 'adasd', 's', 7, '2023-05-05 14:59:35', '2023-05-06 01:03:42'),
(3, 's', 's', 's', 's', 's', 's', 's', 3, '2023-05-05 15:04:52', '2023-05-05 15:04:52'),
(4, 's', 's', 's', 's', 's', 's', 's', 5, '2023-05-05 15:14:50', '2023-05-05 15:14:50'),
(5, 's', 's', 's', 's', 's', 's', 's', 49, '2023-05-05 15:17:21', '2023-05-05 15:17:21'),
(6, 's', 's', 's', 's', 's', 's', 's', 7, '2023-05-05 15:17:48', '2023-05-05 15:17:48'),
(8, 'e', 'qw', 'qw', 'e', 'e', 'w', 'e', 10, '2023-05-05 17:53:51', '2023-05-05 17:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `born_place` varchar(255) NOT NULL,
  `matricule` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `study_level` varchar(255) NOT NULL,
  `study_year` varchar(255) NOT NULL,
  `study_last_etablissement_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_job` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mother_job` varchar(255) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `speciality_id` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `birthday`, `born_place`, `matricule`, `password`, `gender`, `email`, `phone`, `address`, `study_level`, `study_year`, `study_last_etablissement_name`, `father_name`, `father_job`, `mother_name`, `mother_job`, `branch_id`, `speciality_id`, `created_at`, `updated_at`) VALUES
(25, 'hassani', 'hamza', '', '', '0024-2-23', '$2y$10$XwO1qL2fgen3.7Pxmsl7Uuy1Uy8uL9cjj9DDkn2UEQdtpQTusYWXG', 'm', 'hassanih97@gmail.com', '0674020244', 'citty hassani slimane', 'CMTC_+_3ème AS_OU__EXPER-PROF__', 's', 'asdasd', 'asd', 'asdas', 'asdasd', 'asd', '7', '6', '2023-05-06 10:25:31', '2023-05-06 10:25:31'),
(38, 'hassani', 'hamza', '', '', '0025-2-23', '$2y$10$dk/HKz5jdPT3eVM5KnQd9.3uOCqAm27SpMdtkmxK/Jwr.mE2T8gNm', 'm', 'hassanih97@gmail.com', '0674020244', 'citty hassani slimane', 'CMP + 02 ans d’expérience professionnelle, pour les candidats justifiant du niveau scolaire inférieur à la 4eme annee moyenne', 'asdasd', 'asdasd', 'asdas', 'dasdas', 'dasd', 'asdasd', '7', '2', '2023-05-06 12:00:16', '2023-05-06 12:00:16'),
(39, 'hassani', 'hamza', '1992-02-20', 'سيدي طيفور', '0038-2-23', '$2y$10$rEfwFXZvJGPX2nYXL8s9TOzA8izY4ktISB2kcF6fNO2aipJwON7Fm', 'f', 'hassanih97@gmail.com', '0674020244', 'citty hassani slimane', 'CMTC_+_3ème AS_OU__EXPER-PROF__', '2022', 'ثانوية زش احمد سيدي طيفور', 'محمد', 'حارس', 'حساني حليمة', 'لاشيء', '7', '2', '2023-05-06 13:29:00', '2023-05-06 13:29:00');

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
  `img` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `tel`, `email`, `password`, `img`, `role`) VALUES
(1, 'admin', '', '', 'admin@gmail.com', '$2y$10$LEKyEGFcZs04xWUdZr0SyeEh7l3zHIBRIf5HfiGZLlWcNcN6UeF6O', '', 'admin'),
(2, 'hassani hamza', '', '0674020244', 'hassanih97@gmail.com', '$2y$10$dk/HKz5jdPT3eVM5KnQd9.3uOCqAm27SpMdtkmxK/Jwr.mE2T8gNm', '', 'student'),
(3, 'hassani hamza', '', '0674020244', 'hassanih97@gmail.com', '$2y$10$rEfwFXZvJGPX2nYXL8s9TOzA8izY4ktISB2kcF6fNO2aipJwON7Fm', '', 'student');

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
-- Indexes for table `formateurs`
--
ALTER TABLE `formateurs`
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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch` (`branch_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `speciality_id` (`speciality_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `formateurs`
--
ALTER TABLE `formateurs`
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
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
