-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 05:45 AM
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
  `name` varchar(255) NOT NULL,
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

INSERT INTO `formulaires` (`id`, `name`, `name_ar`, `name_fr`, `description_ar`, `description_fr`, `filename_ar`, `filename_fr`) VALUES
(1, 'Fiche d’inscription et de voeux', 'استمارة التسجيل والرغبات', 'Fiche d’inscription et de voeux', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, voluptatum.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, voluptatum.', 'fich_ar.docx', 'fich_fr.docx'),
(2, 'test.docx', 'استمارة التسجيل والرغبات', 'Fiche d’inscription et de voeux', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, voluptatum.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, voluptatum.', '', ''),
(3, 'test.docx', 'استمارة التسجيل والرغبات', 'Fiche d’inscription et de voeux', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, voluptatum.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, voluptatum.', '', '');

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

INSERT INTO `speciality` (`Department code`, `Department`, `Specialty code`, `Specialty`, `Intitulé de la spécialité`, `Training period`, `Level`, `Required level`, `Training style`) VALUES
('INT', 'إعلام آلي - الرقمنة - الاتصالات', 'INT0701', 'مُستغل المعلوماتية', 'Exploitant informatique', '24 شهرًا', '4', 'الثانية ثانوي', 'دروس مسائية'),
('TAG', 'تقنيات الادارة و التسيير', 'TAG0709', 'المحاسبة', 'Comptabilité', '24 شهرًا', '4', 'الثانية ثانوي', 'دروس مسائية'),
('MEE', 'مهن البيئة و المياه', 'MEE0702', 'صيانة شبكات التزويد بالماء الشروب', 'Entretien des réseaux d’alimentation en eau potable', '18 شهرًا', '3', 'الرابعة متوسط', 'دروس مسائية'),
('ART', 'الحرف التقليدية', 'ART11Q', 'إنجاز أعمال الطرز اليدوي', 'Réalisation des ouvrages de broderie à la main', '06 أشهر', 'CQP', 'مستوى تعليمي محدود طور محو الامية منتهي', 'تأهيلي'),
('MEE', 'مهن البيئة و المياه', 'MEE04Q', 'استعادة النفايات وإعادة تدويرها', 'Récupération et recyclage des déchets', '06 أشهر', 'CQP', 'بدون مستوى دراسي', 'تأهيلي'),
('MEE', 'مهن البيئة و المياه', 'MEE04Q', 'استعادة النفايات وإعادة تدويرها', 'Récupération et recyclage des déchets', '06 أشهر', 'CQP', 'بدون مستوى دراسي', 'تأهيلي'),
('THC', 'النسيج والألبسة', 'THC04Q', 'خياطة و تجميع الملابس', 'Piquage et montage de vêtements', '03 أشهر', 'CQP', 'مستوى تعليمي محدود طور محو الامية منتهي', 'تأهيلي'),
('MEE', 'مهن البيئة و المياه', 'MEE04Q', 'استعادة النفايات وإعادة تدويرها', 'Récupération et recyclage des déchets', '06 أشهر', 'CQP', 'بدون مستوى دراسي', 'تأهيلي'),
('INT', 'إعلام آلي - الرقمنة - الاتصالات', 'INT01Q', 'تلقين الإعلام الألي( Word-Excel- Power Point)', 'Initiation à l’informatique (Word, Excel, Power Point)', '06 أشهر', 'CQP', 'الرابعة متوسط', 'تأهيلي'),
('AGR', 'الفلاحة', 'AGR14Q', 'مربي المواشي', 'Eleveur de bétail', '06 أشهر', 'CQP', 'مستوى تعليمي محدود طور محو الامية منتهي', 'تأهيلي'),
('AGR', 'الفلاحة', 'AGR25Q', 'تغذية الماشية', 'Alimentation du bétail', '06 أشهر', 'CQP', 'مستوى تعليمي محدود طور محو الامية منتهي', 'تأهيلي'),
('BTP', 'البناء و الأشغال العمومية', 'BTP05Q', 'دهان البنايات', 'Peintre bâtiment', '03 أشهر', 'CQP', 'مستوى تعليمي محدود طور محو الامية منتهي', 'تأهيلي'),
('INT', 'إعلام آلي - الرقمنة - الاتصالات', 'INT0701P', 'مُستغل المعلوماتية', 'Exploitant informatique', '06 أشهر', '4', '/', 'معــــــابـــــــر'),
('ART', 'الحرف التقليدية', 'ART0710', 'الطرز', 'Broderie', '12 شهرًا', '2', 'الطور الابتدائي', 'حضوري');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
