-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 09:34 PM
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
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `lang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `lang`) VALUES
(1, 'ar');

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
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `id` int(11) NOT NULL,
  `Department code` varchar(1024) DEFAULT NULL,
  `Department` varchar(1024) DEFAULT NULL,
  `Specialty code` varchar(1024) DEFAULT NULL,
  `Specialty` varchar(1024) DEFAULT NULL,
  `Intitulé de la spécialité` varchar(1024) DEFAULT NULL,
  `Training period` varchar(1024) DEFAULT NULL,
  `Level` varchar(1024) DEFAULT NULL,
  `Required level` varchar(1024) DEFAULT NULL,
  `Training style` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`id`, `Department code`, `Department`, `Specialty code`, `Specialty`, `Intitulé de la spécialité`, `Training period`, `Level`, `Required level`, `Training style`) VALUES
(1, 'INT', 'إعلام آلي - الرقمنة - الاتصالات', 'INT0701', 'مُستغل المعلوماتية', 'Exploitant informatique', '24 شهرًا', '4', 'الثانية ثانوي', 'دروس مسائية'),
(2, 'TAG', 'تقنيات الادارة و التسيير', 'TAG0709', 'المحاسبة', 'Comptabilité', '24 شهرًا', '4', 'الثانية ثانوي', 'دروس مسائية'),
(3, 'MEE', 'مهن البيئة و المياه', 'MEE0702', 'صيانة شبكات التزويد بالماء الشروب', 'Entretien des réseaux d’alimentation en eau potable', '18 شهرًا', '3', 'الرابعة متوسط', 'دروس مسائية'),
(4, 'ART', 'الحرف التقليدية', 'ART11Q', 'إنجاز أعمال الطرز اليدوي', 'Réalisation des ouvrages de broderie à la main', '06 أشهر', 'CQP', 'مستوى تعليمي محدود طور محو الامية منتهي', 'تأهيلي'),
(5, 'MEE', 'مهن البيئة و المياه', 'MEE04Q', 'استعادة النفايات وإعادة تدويرها', 'Récupération et recyclage des déchets', '06 أشهر', 'CQP', 'بدون مستوى دراسي', 'تأهيلي'),
(6, 'MEE', 'مهن البيئة و المياه', 'MEE04Q', 'استعادة النفايات وإعادة تدويرها', 'Récupération et recyclage des déchets', '06 أشهر', 'CQP', 'بدون مستوى دراسي', 'تأهيلي'),
(7, 'THC', 'النسيج والألبسة', 'THC04Q', 'خياطة و تجميع الملابس', 'Piquage et montage de vêtements', '03 أشهر', 'CQP', 'مستوى تعليمي محدود طور محو الامية منتهي', 'تأهيلي'),
(8, 'MEE', 'مهن البيئة و المياه', 'MEE04Q', 'استعادة النفايات وإعادة تدويرها', 'Récupération et recyclage des déchets', '06 أشهر', 'CQP', 'بدون مستوى دراسي', 'تأهيلي'),
(9, 'INT', 'إعلام آلي - الرقمنة - الاتصالات', 'INT01Q', 'تلقين الإعلام الألي( Word-Excel- Power Point)', 'Initiation à l’informatique (Word, Excel, Power Point)', '06 أشهر', 'CQP', 'الرابعة متوسط', 'تأهيلي'),
(10, 'AGR', 'الفلاحة', 'AGR14Q', 'مربي المواشي', 'Eleveur de bétail', '06 أشهر', 'CQP', 'مستوى تعليمي محدود طور محو الامية منتهي', 'تأهيلي'),
(11, 'AGR', 'الفلاحة', 'AGR25Q', 'تغذية الماشية', 'Alimentation du bétail', '06 أشهر', 'CQP', 'مستوى تعليمي محدود طور محو الامية منتهي', 'تأهيلي'),
(12, 'BTP', 'البناء و الأشغال العمومية', 'BTP05Q', 'دهان البنايات', 'Peintre bâtiment', '03 أشهر', 'CQP', 'مستوى تعليمي محدود طور محو الامية منتهي', 'تأهيلي'),
(13, 'INT', 'إعلام آلي - الرقمنة - الاتصالات', 'INT0701P', 'مُستغل المعلوماتية', 'Exploitant informatique', '06 أشهر', '4', '/', 'معــــــابـــــــر'),
(14, 'ART', 'الحرف التقليدية', 'ART0710', 'الطرز', 'Broderie', '12 شهرًا', '2', 'الطور الابتدائي', 'حضوري');

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
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
