-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 02:24 AM
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
(1, 'INT', 'إعلام آلي - الرقمنة - الاتصالات', 'Exploitant informatiques'),
(76, 'AGR', 'Agronomie', 'الفلاحة');

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
  `CIN` varchar(255) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `diplome` varchar(30) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `specialite` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formateurs`
--

INSERT INTO `formateurs` (`id`, `CIN`, `nom`, `prenom`, `grade`, `date_naissance`, `lieu_naissance`, `adresse`, `telephone`, `email`, `diplome`, `experience`, `specialite`, `created_at`) VALUES
(31, '0912345678', 'Velit omnis similiqu', 'Quis veniam dolorum', 'PSFEP2', '2015-03-11', 'Obcaecati earum expl', 'In laboris quia sit', 'Officia vitae esse ', 'kubov@mailinator.com', 'Inventore sit perfer', '', 'Et porro voluptatibu', '2023-05-19 23:32:52');

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
(75, 'qwe', 'qwe', 'qw', 'qw', '6441e169d5b6a1.09229251.docx', '6441e169d61c00.99525350.docx'),
(76, 'qwe', 'qwe', 'qw', 'qw', '6441e1f477fc45.33669608.docx', '6441e1f4781515.19433311.docx');

-- --------------------------------------------------------

--
-- Table structure for table `lang`
--

CREATE TABLE `lang` (
  `id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `arabic` varchar(255) NOT NULL,
  `french` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lang`
--

INSERT INTO `lang` (`id`, `key`, `arabic`, `french`) VALUES
(1, 'dashboard', 'لوحة القيادة', 'Tableau de bord'),
(2, 'produit', 'المنتج', 'Produit'),
(3, 'logout', 'تسجيل خروج', 'Se déconnecter'),
(4, 'options', 'خيارات', 'Options'),
(5, 'imprimer', 'طباعة', 'Imprimer'),
(6, 'telecharger', 'تحميل', 'Télécharger'),
(7, 'ar', 'عربي', 'Arabe'),
(8, 'error', 'خطأ', 'Erreur'),
(9, 'success', 'نجاح', 'Succès'),
(10, 'add_success', 'تمت الإضافة بنجاح', 'Ajout réussi'),
(11, 'view_all', 'عرض الكل', 'Tout voir'),
(12, 'add_form', 'إضافة نموذج', 'Ajouter un formulaire'),
(13, 'delete', 'حذف', 'Supprimer'),
(14, 'ajouter', 'إضافة', 'Ajouter'),
(15, 'modifier', 'تعديل', 'Modifier'),
(16, 'loading', 'جار التحميل...', 'Chargement...'),
(17, 'description', 'الوصف', 'Description'),
(18, 'fichier', 'الملف', 'Fichier'),
(19, 'actions', 'الإجراءات', 'Actions'),
(20, 'date', 'التاريخ', 'Date'),
(21, 'search', 'بحث', 'Rechercher'),
(22, 'save', 'حفظ', 'Enregistrer'),
(23, 'all_fields_required', 'تأكد ان جميع الحقول ممتلئة', 'Tous les champs sont requis'),
(24, 'and', 'و', 'et'),
(25, 'informations_de_lapprenti', 'معلومات المتربص', 'Informations sur le stagiaire'),
(26, 'numero_seriel', 'الرقم التسلسلي ', 'Numéro de série'),
(27, 'annee', 'السنة', 'Année'),
(28, 'kashf_masar_takwin', 'كشف مسار التكوين', 'Révélation du parcours de formation'),
(29, 'nom_et_prenom', 'الاسم واللقب', 'Nom et prénom'),
(30, 'nom', 'اللقب', 'Nom'),
(31, 'prenom', 'الاسم', 'Prénom'),
(32, 'nom_prenom', 'الاسم واللقب', 'Nom et prénom'),
(33, 'adresse', 'العنوان', 'Adresse'),
(34, 'date_et_lieu_de_naissance', 'تاريخ ومكان الميلاد', 'Date et lieu de naissance'),
(35, 'telephone', 'رقم الهاتف', 'Téléphone'),
(36, 'email', 'البريد الإلكتروني', 'E-mail'),
(37, 'sex', 'الجنس', 'Sexe'),
(38, 'homme', 'ذكر', 'Homme'),
(39, 'femme', 'أنثى', 'Femme'),
(40, 'matricule', 'رقم التسجيل', 'Matricule'),
(41, 'informations_personnelles', 'المعلومات الشخصية', 'Informations personnelles'),
(42, 'informations_sur_le_niveau_scolaire', 'المستوى التعليمي', 'Informations sur le niveau scolaire'),
(43, 'informations_sur_la_famille', 'معلومات عن العائلة', 'Informations sur la famille'),
(44, 'formation', 'التكوين', 'Formation'),
(45, 'date_de_naissance', 'تاريخ الميلاد', 'Date de naissance'),
(46, 'lieu_de_naissance', 'مكان الميلاد', 'Lieu de naissance'),
(47, 'annee_scolaire', 'السنة الدراسية', 'Année scolaire'),
(48, 'dernier_etablissement', 'اخر مؤسسة تعليمية', 'Dernier établissement'),
(49, 'etat_civil', 'الحالة العائلية', 'État civil'),
(50, 'nom_du_pere', 'اسم الاب', 'Nom du père'),
(51, 'profession_du_pere', 'مهنة الأب', 'Profession du père'),
(52, 'nom_et_prenom_de_la_mere', 'اسم ولقب الأم', 'Nom et prénom de la mère'),
(53, 'profession_de_la_mere', 'مهنة الأم', 'Profession de la mère'),
(54, 'nombre_de_freres', 'عدد الاخوة', 'Nombre de frères'),
(55, 'profession_des_freres', 'مهن الاخوة', 'Professions des frères'),
(56, 'situation_familiale_des_parents', 'الوضعية العائلية للوالدين', 'Situation familiale des parents'),
(57, 'specialites_demandees', 'الاختصاصات المرغوب فيها', 'Spécialités demandées'),
(58, 'situation_familiale', 'الوضعية العائلية', 'Situation familiale'),
(59, 'celibataire', 'عازب', 'Célibataire'),
(60, 'marie', 'متزوج', 'Marié'),
(61, 'divorce', 'مطلق', 'Divorcé'),
(62, 'veuf', 'أرمل', 'Veuf'),
(63, 'diplome', 'الشهادة', 'Diplôme'),
(64, 'experience_professionnelle', 'الخبرة المهنية', 'Expérience professionnelle'),
(65, 'aucune_information', 'لم يتم تخديث معلومات المتربص بعد', 'Aucune information mise à jour pour le stagiaire'),
(66, 'mise_a_jour_reussi', 'تم تخديث معلومات المتربص بنجاح', 'Mise à jour réussie pour le stagiaire'),
(67, 'orientation', 'توجيه وإدماج المترشحين', 'Orientation et intégration des candidats'),
(68, 'inscriptions_des_demandeurs', 'تنظيم تسجيلات طالبي التكوين', 'Organisation des inscriptions des demandeurs de formation'),
(69, 'add_aprentis', 'إضافة متربص', 'Ajouter un stagiaire'),
(70, 'list_aprentis', 'قائمة المتربصين', 'Liste des stagiaires'),
(71, 'add_formateur', 'اضافة استاذ مكون', 'Ajouter un formateur'),
(72, 'list_formateur', 'قائمة المكونين', 'Liste des formateurs'),
(73, 'formations', 'تنظيم وتسيير التكوين', 'Organisation et gestion de la formation'),
(74, 'branch_et_specialite', 'الشعب والتخصصات', 'Filières et spécialités'),
(75, 'impression_des_formulaires', 'طباعة النماذج', 'Impression des formulaires'),
(76, 'show_section', 'قائمة الفروع', 'Liste des filières'),
(77, 'techniques', 'تسيير الأجهزة التقنية والبيداغوجية', 'Gestion des équipements techniques et pédagogiques'),
(78, 'manifestations', 'الإنضباط والتظاهرات الثقافية والرياضية', 'Discipline et manifestations culturelles et sportives'),
(79, 'branches_et_specialities', 'الشعب والتخصصات', 'Filières et spécialités'),
(80, 'branches', 'الشعب', 'Filières'),
(81, 'branche', 'الشعبة', 'Filière'),
(82, 'list_of_branches', 'قائمة الشعب', 'Liste des filières'),
(83, 'specialities', 'التخصصات', 'Spécialités'),
(84, 'list_of_specialities', 'قائمة التخصصات', 'Liste des spécialités'),
(85, 'add_branch', 'إضافة شعبة', 'Ajouter une filière'),
(86, 'edit_branch', 'تعديل شعبة', 'Modifier une filière'),
(87, 'add_speciality', 'إضافة تخصص', 'Ajouter une spécialité'),
(88, 'edit_speciality', 'تعديل تخصص', 'Modifier une spécialité'),
(89, 'branch_id', 'الرقم التسلسلي للشعبة', 'Identifiant de la filière'),
(90, 'branch_name', 'اسم الشعبة', 'Nom de la filière'),
(91, 'branch_code', 'رمز الشعبة', 'Code de la filière'),
(92, 'branch_intitule', 'الشعبة بالفرنسية', 'Intitulé de la filière en français'),
(93, 'branch_name_fr', 'الشعبة بالفرنسية', 'Nom de la filière en français'),
(94, 'branch_name_ar', 'الشعبة بالعربية', 'Nom de la filière en arabe'),
(95, 'speciality', 'التخصص', 'Spécialité'),
(96, 'speciality_id', 'الرقم التسلسلي للتخصص', 'Identifiant de la spécialité'),
(97, 'speciality_code', 'رمز التخصص', 'Code de la spécialité'),
(98, 'speciality_name', 'اسم التخصص', 'Nom de la spécialité'),
(99, 'speciality_level', 'مستوى التأهيل', 'Niveau de qualification'),
(100, 'speciality_certificate', 'الشهادة المسلمة', 'Certificat délivré'),
(101, 'speciality_duration', 'مدة النكوين', 'Durée de la formation'),
(102, 'speciality_training_mode', 'نمط التكوين', 'Mode de formation'),
(103, 'section', 'الفرع', 'Filière'),
(104, 'section_info', 'معلومات الفرع', 'Informations sur la filière'),
(105, 'numero', 'رقم', 'Numéro'),
(106, 'code_section', 'رمز الفرع', 'Code de la filière'),
(107, 'qualification', 'مستوى التأهيل', 'Niveau de qualification'),
(108, 'debut', 'بداية', 'Début'),
(109, 'fin', 'نهاية', 'Fin'),
(110, 'debut_stage', 'بداية التربص', 'Début de stage'),
(111, 'fin_stage', 'نهاية التربص', 'Fin de stage'),
(112, 'responsable', 'مسؤول الفرع', 'Responsable de la filière'),
(113, 'trainees', 'قائمة المتربصين', 'Liste des stagiaires'),
(114, 'trainee_added', 'تم اضافة المتربص بنجاح', 'Stagiaire ajouté avec succès'),
(115, 'trainee_found', 'تم العثور على المتربص', 'Stagiaire trouvé'),
(116, 'trainee_not_found', 'لم يتم العثور على المتربص', 'Stagiaire introuvable'),
(117, 'section_created', 'تم انشاء الفرع بنجاح', 'Filière créée avec succès'),
(118, 'effectif', 'العدد', 'Effectif'),
(119, 'trainees_number', 'عدد المتربصين', 'Nombre de stagiaires'),
(120, 'boys', 'ذكور', 'Hommes'),
(121, 'girls', 'اناث', 'Femmes'),
(122, 'formateur', 'استاذ مكون', 'Formateur'),
(123, 'formateur_added', 'تم اضافة الاستاذ بنجاح', 'Formateur ajouté avec succès'),
(124, 'formateur_updated', 'تم تحديث الاستاذ بنجاح', 'Formateur mis à jour avec succès'),
(125, 'formateur_not_updated', 'حدث خطأ ما لم يتم تحديث الاستاذ', 'Erreur lors de la mise à jour du formateur'),
(126, 'open_section', 'محضر فتح فرع', 'PV d\'ouverture de section'),
(127, 'speciality_conditions', 'شروط الالتحاق بالتكوين', 'conditions d\\\'accès à la formation'),
(128, 'niveau_d_etude', 'المستوى الدراسي', 'niveau d\'etude'),
(129, 'numero_dinscription', 'رقم التسجيل', 'le numéro d\'inscription'),
(130, 'recently_added_students', 'المتربصين المضافين حديثا', 'derneirs étudiants ajoutés'),
(131, 'total_stagaire', 'إجمالي المتربصين', 'total stagiaire'),
(132, 'total_formateur', 'اجمالي الاستاذة المكونين', 'Total formateurs'),
(133, 'total_section', 'إجمالي الفروع', 'sections totales'),
(134, 'total_specialite', 'مجموع التخصصات والفروع', 'Total specialities et branches'),
(135, 'settings', 'اعدادات', 'settings'),
(136, 'language_settings', 'اعدادات اللغة', 'Paramètres de langue'),
(137, 'key', 'المفتاح', 'cle'),
(138, 'french', 'الفرنسية', 'française'),
(139, 'arabic', 'العربية', 'arabic'),
(140, 'email_exists', 'البريد الالكتروني موجود بالفعل', 'le mail existe'),
(141, 'grade', 'الرتبة', 'grade'),
(142, 'PFP', 'أ.ت.م', 'PFP'),
(143, 'PSFEP1', 'أ.م.ت.ت.م1', 'PSFEP1'),
(144, 'PSFEP2', 'أ.م.ت.ت.م2', 'PSFEP2'),
(145, 'guide_nom', 'تحميل الدليل التفاعلي لمدونة الشعب', 'Guide interactif de branches');

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
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `speciality` int(11) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `effectif` int(11) NOT NULL,
  `trainees` varchar(255) NOT NULL,
  `girls` int(11) NOT NULL,
  `boys` int(11) NOT NULL,
  `manager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `date`, `code`, `numero`, `speciality`, `start`, `end`, `qualification`, `effectif`, `trainees`, `girls`, `boys`, `manager`) VALUES
(21, '2018-10-16', 'AGR1901', '322297000270', 8, '2019-01-26', '2020-01-26', 'الطور الابتدائي', 1, '5', 0, 0, 31);

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
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`id`, `code`, `name`, `level`, `certificate`, `duration`, `conditions`, `training_mode`, `created_at`, `updated_at`, `branch_id`) VALUES
(1, 'INT1201', 'تصليح الهواتف الثابثة والنقالة', '2', 'ش ك م', '12 شهر', 'الرابعة متوسط', 'تت', '2023-05-19 20:59:48', '2023-05-19 23:00:23', 1),
(8, 'AGR1901', 'المحاصيل تحت الدفينة', '2', 'ت.ك.م', '12 شهر', 'الطور الابتدائي', 'تكوين حضوري', '2023-05-19 23:46:40', '2023-05-19 23:46:40', 76),
(9, 'AGR0701', 'زراعة الخضروات', '2', 'ش ك م', '12 شهر', 'الطور الابتدائي', 'تكوين حضوري', '2023-05-19 23:47:42', '2023-05-19 23:47:42', 76);

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
  `situation_familiale` varchar(255) NOT NULL,
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
  `branch_id` int(11) NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `birthday`, `born_place`, `situation_familiale`, `matricule`, `password`, `gender`, `email`, `phone`, `address`, `study_level`, `study_year`, `study_last_etablissement_name`, `father_name`, `father_job`, `mother_name`, `mother_job`, `branch_id`, `speciality_id`, `created_at`, `updated_at`) VALUES
(5, 'Damian', 'Prince', '2001-11-04', 'Sunt est id aliquam ', '', '0001-2-23', '$2y$10$PrQofLpUime1Yf/yX.7ZDupXbbse6jNgUQw6Don7xNo40LCBu8PFe', 'f', 'xegi@mailinator.com', '+1 (193) 588-7881', 'Ea sunt tempora repu', 'Facilis consequatur', '2013', 'Dara Byrd', 'Tallulah Santos', 'Est sint deserunt id', 'Kevin Andrews', 'Nam illo debitis per', 76, 8, '2023-05-20 01:30:43', '2023-05-20 01:30:43');

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
(21, 'hamza hassani', '', '+213674020244', 'hassanih97@gmail.com', '$2y$10$RZjMe76tb9R4vdOI6wX/B.Gx3UZmUX/cCBsCdLDvb5Lx5hAzX2EiO', '', 'admin'),
(39, 'Damian Prince', '', '+1 (193) 588-7881', 'xegi@mailinator.com', '$2y$10$PrQofLpUime1Yf/yX.7ZDupXbbse6jNgUQw6Don7xNo40LCBu8PFe', '', 'student'),
(41, 'Velit omnis similiqu Quis veniam dolorum', '', 'Officia vitae esse ', 'kubov@mailinator.com', '$2y$10$bC1stpFwOmWoU3Yb4NDal.M.lYZLoWV701KxdYbHmOG/P9A1GeU8S', '', 'formateur');

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
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `speciality` (`speciality`),
  ADD KEY `manager` (`manager`),
  ADD KEY `manager_2` (`manager`);

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
  ADD KEY `branches` (`branch_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branch_id` (`branch_id`),
  ADD KEY `speciality_id` (`speciality_id`),
  ADD KEY `branch_id_2` (`branch_id`),
  ADD KEY `speciality_id_2` (`speciality_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `formateurs`
--
ALTER TABLE `formateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `formulaires`
--
ALTER TABLE `formulaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `manager_id` FOREIGN KEY (`manager`) REFERENCES `formateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `spec` FOREIGN KEY (`speciality`) REFERENCES `specialities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `specialities`
--
ALTER TABLE `specialities`
  ADD CONSTRAINT `branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `branch__id` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `spec_id` FOREIGN KEY (`speciality_id`) REFERENCES `specialities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
