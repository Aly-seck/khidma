-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2017 at 08:34 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dkhidma`
--

-- --------------------------------------------------------

--
-- Table structure for table `accueillant`
--

DROP TABLE IF EXISTS `accueillant`;
CREATE TABLE IF NOT EXISTS `accueillant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accueillant`
--

INSERT INTO `accueillant` (`id`, `nom`, `prenom`, `telephone`) VALUES
(1, 'بوسو', 'عبد الأحد مطلب', 772097732),
(2, 'امباكيا', 'حمد الخد يم', 775499959),
(3, 'بوسو', 'شيخ عبد', 76294405),
(4, 'صار', 'شيخ', 771585649),
(5, 'طن', 'إبرهيم', 774483377),
(6, 'صوص', 'عبد', 706302777),
(7, 'جاي', 'سرج بك', 774994285),
(8, 'امباكي', 'خادم', 775428701),
(9, 'جوب', 'عبد الله', 775347502),
(10, 'جتر', 'شخ عبد الأحد', 771865160),
(11, 'بوسو', 'مرضى', 775150577),
(12, 'انيانغ', 'عبد القادر', 775583845),
(13, 'امباكي', 'مام بل', 772698225),
(14, 'بوسو', 'عبد الأحد جيرن', 775319198),
(15, 'بوسو', 'عبد الأحد مام عست', 776350880),
(16, 'امباكي', 'سرج مود', 772545066),
(17, 'لي', 'عبد الرحمن', 775730734),
(18, 'امبينغ', 'الحسن', 776636816),
(19, 'كي', 'باي مور', 776435002),
(20, 'بص', 'عبد الأحد عافية', 774343315),
(21, 'بص', 'عبد الأحد الحاج شيخ', 777036354),
(22, 'بك', 'مود خبان', 770925959),
(23, 'بص', 'عبد مطلب', 773953576),
(24, 'امباكي', 'شيخنا', 772544992),
(25, 'امباكي', 'محمد', 776768262),
(26, 'انياتغ', 'مود قاهرة', 775674319),
(27, 'امباكي', 'دام', 776581458),
(28, 'امباكي', 'سرين فضل أست', 775909378);

-- --------------------------------------------------------

--
-- Table structure for table `appartement`
--

DROP TABLE IF EXISTS `appartement`;
CREATE TABLE IF NOT EXISTS `appartement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `residence` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombreChambre` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_71A6BD8D3275823` (`residence`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `appartement`
--

INSERT INTO `appartement` (`id`, `residence`, `nom`, `nombreChambre`) VALUES
(1, 1, 'Darou Marnane 1', 40),
(2, 1, 'Darou Marnane 2', 40),
(3, 1, 'Matlaboul Fawzaini', 29),
(4, 3, 'Serigne Abdoul Ahad', 15),
(5, 3, 'Serigne Modou Badar', 9),
(6, 3, 'Serigne Moustapha Bachir', 5),
(7, 3, 'Serigne Mahmoudane', 9);

-- --------------------------------------------------------

--
-- Table structure for table `barkelou`
--

DROP TABLE IF EXISTS `barkelou`;
CREATE TABLE IF NOT EXISTS `barkelou` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre` int(11) NOT NULL,
  `montant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `evenement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remarque` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_FD1A12C6F6B4FB29` (`membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `appartement` int(11) NOT NULL,
  `responsable` int(11) NOT NULL,
  `numero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `etat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C509E4FF71A6BD8D` (`appartement`),
  KEY `IDX_C509E4FF52520D07` (`responsable`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chambre`
--

INSERT INTO `chambre` (`id`, `appartement`, `responsable`, `numero`, `etat`) VALUES
(2, 4, 1, 'A1', 'disponible'),
(3, 4, 1, 'A2', 'disponible'),
(4, 4, 1, 'A3', 'disponible'),
(5, 4, 1, 'A4', 'disponible'),
(6, 4, 1, 'A5', 'disponible'),
(7, 4, 1, 'A6', 'disponible'),
(8, 4, 1, 'A7', 'disponible'),
(9, 4, 2, 'B1', 'disponible'),
(10, 4, 2, 'B2', 'disponible'),
(11, 4, 2, 'B3', 'disponible'),
(12, 4, 2, 'B4', 'disponible'),
(13, 4, 2, 'B5', 'disponible'),
(14, 4, 2, 'B6', 'disponible'),
(15, 4, 2, 'B7', 'disponible'),
(16, 4, 2, 'B8', 'disponible'),
(17, 5, 3, 'M01', 'disponible'),
(18, 5, 3, 'M02', 'disponible'),
(19, 5, 3, 'M03', 'disponible'),
(20, 5, 3, 'M04', 'disponible'),
(21, 5, 3, 'M05', 'disponible'),
(22, 5, 3, 'M06', 'disponible'),
(23, 5, 3, 'M07', 'disponible'),
(24, 5, 3, 'M08', 'disponible'),
(25, 5, 3, 'M09', 'disponible'),
(26, 6, 4, 'S1', 'disponible'),
(27, 6, 4, 'S2', 'disponible'),
(28, 6, 4, 'S3', 'disponible'),
(29, 6, 4, 'S4', 'disponible'),
(30, 6, 4, 'S5', 'disponible'),
(31, 3, 5, 'H01', 'disponible'),
(32, 3, 5, 'H02', 'disponible'),
(33, 3, 5, 'H03', 'disponible'),
(34, 3, 5, 'H04', 'disponible'),
(35, 3, 5, 'H05', 'disponible'),
(36, 3, 5, 'H06', 'disponible'),
(37, 3, 5, 'H07', 'disponible'),
(38, 3, 5, 'H08', 'disponible'),
(39, 3, 5, 'H09', 'disponible'),
(40, 3, 5, 'H10', 'disponible'),
(41, 3, 5, 'H11', 'disponible'),
(42, 3, 5, 'H12', 'disponible'),
(43, 3, 5, 'H13', 'disponible'),
(44, 3, 5, 'H14', 'disponible'),
(45, 3, 5, 'H15', 'disponible'),
(46, 3, 5, 'H16', 'disponible'),
(47, 3, 5, 'H17', 'disponible'),
(48, 3, 5, 'H18', 'disponible'),
(49, 3, 5, 'H19', 'disponible'),
(50, 3, 5, 'H20', 'disponible'),
(51, 3, 5, 'H21', 'disponible'),
(52, 3, 5, 'H22', 'disponible'),
(53, 3, 5, 'H23', 'disponible'),
(54, 3, 5, 'H24', 'disponible'),
(55, 3, 5, 'H25', 'disponible'),
(56, 3, 5, 'H26', 'disponible'),
(57, 3, 5, 'H27', 'disponible'),
(58, 3, 5, 'H28', 'disponible'),
(59, 3, 5, 'H29', 'disponible'),
(61, 1, 7, 'DM101', 'disponible'),
(62, 1, 7, 'DM102', 'disponible'),
(63, 1, 7, 'DM103', 'disponible'),
(64, 1, 7, 'DM104', 'disponible'),
(65, 1, 7, 'DM105', 'disponible'),
(66, 1, 7, 'DM106', 'disponible'),
(67, 1, 7, 'DM107', 'disponible'),
(68, 1, 7, 'DM108', 'disponible'),
(69, 1, 7, 'DM109', 'disponible'),
(70, 1, 7, 'DM110', 'disponible'),
(71, 1, 7, 'DM201', 'disponible'),
(72, 1, 7, 'DM202', 'disponible'),
(73, 1, 7, 'DM203', 'disponible'),
(74, 1, 7, 'DM204', 'disponible'),
(75, 1, 7, 'DM105', 'disponible'),
(76, 2, 6, 'H_06', 'disponible'),
(77, 2, 6, 'H_07', 'disponible'),
(78, 2, 6, 'H_08', 'disponible'),
(79, 2, 6, 'H_09', 'disponible'),
(80, 2, 6, 'H_10', 'disponible'),
(81, 2, 6, 'H_11', 'disponible'),
(82, 2, 6, 'H_12', 'disponible'),
(83, 2, 6, 'H_13', 'disponible'),
(84, 2, 6, 'H_14', 'disponible'),
(85, 2, 6, 'H_15', 'disponible'),
(86, 2, 6, 'H_16', 'disponible'),
(87, 2, 6, 'H_17', 'disponible'),
(88, 2, 6, 'H_18', 'disponible'),
(89, 2, 6, 'H_19', 'disponible'),
(90, 2, 6, 'H_20', 'disponible'),
(91, 2, 6, 'H_21', 'disponible'),
(92, 2, 6, 'H_22', 'disponible'),
(93, 2, 6, 'H_23', 'disponible'),
(94, 2, 6, 'H_24', 'disponible'),
(95, 2, 6, 'H_25', 'disponible'),
(96, 2, 6, 'H_26', 'disponible'),
(97, 2, 6, 'H_27', 'disponible'),
(98, 2, 6, 'H_28', 'disponible'),
(99, 2, 6, 'H_29', 'disponible'),
(100, 2, 6, 'H_30', 'disponible'),
(101, 2, 6, 'H_31', 'disponible'),
(102, 2, 6, 'H_32', 'disponible'),
(103, 2, 6, 'H_33', 'disponible');

-- --------------------------------------------------------

--
-- Table structure for table `cotisation`
--

DROP TABLE IF EXISTS `cotisation`;
CREATE TABLE IF NOT EXISTS `cotisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre` int(11) NOT NULL,
  `date` date NOT NULL,
  `montant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_AE64D2EDF6B4FB29` (`membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delegation`
--

DROP TABLE IF EXISTS `delegation`;
CREATE TABLE IF NOT EXISTS `delegation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chambre` int(11) NOT NULL,
  `accueillant` int(11) NOT NULL,
  `chef` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombrePersonne` int(11) NOT NULL,
  `lieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dateArrive` datetime NOT NULL,
  `dateRetour` datetime NOT NULL,
  `addresse` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_292F436DC509E4FF` (`chambre`),
  KEY `IDX_292F436D7F17D8CE` (`accueillant`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delegation`
--

INSERT INTO `delegation` (`id`, `chambre`, `accueillant`, `chef`, `telephone`, `email`, `type`, `nombrePersonne`, `lieu`, `dateArrive`, `dateRetour`, `addresse`) VALUES
(1, 2, 1, 'Issa', 4556789, 'hjerrh@hf.com', 'rehgrff', 56, 'HFHEE', '2017-11-16 00:00:00', '2017-11-24 00:00:00', 'ERJKOJT'),
(2, 3, 1, 'Modou', 3456789, 'edjunc@gmail.com', 'présent', 78, 'hjhi', '2017-11-01 00:00:00', '2017-11-16 00:00:00', 'f uiouhifu');

-- --------------------------------------------------------

--
-- Table structure for table `engagement`
--

DROP TABLE IF EXISTS `engagement`;
CREATE TABLE IF NOT EXISTS `engagement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membre` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `montant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D86F0141F6B4FB29` (`membre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'serigne', 'serigne', 'basseserigne@gmail.com', 'basseserigne@gmail.com', 1, NULL, '$2y$13$VCzDxuBey.//3SnDtrF5eepP1nxbFi2e9NT4.Urm0MPbSF5/xUfde', '2017-11-06 00:51:35', NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut` int(11) NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numCNI` bigint(20) NOT NULL,
  `addresse` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `lieuNaissance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` bigint(20) NOT NULL,
  `sexe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numInscription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anciennete` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fonction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `observation` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_594AE39CE564F0BF` (`statut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `residence`
--

DROP TABLE IF EXISTS `residence`;
CREATE TABLE IF NOT EXISTS `residence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombreAppartement` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `residence`
--

INSERT INTO `residence` (`id`, `nom`, `nombreAppartement`) VALUES
(1, 'Darou Marnane', 3),
(2, 'Keur Cheikh Mansour DIOUF', 1),
(3, 'Cheikhoul khadim de Touba Mosquée', 3);

-- --------------------------------------------------------

--
-- Table structure for table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `responsable`
--

INSERT INTO `responsable` (`id`, `nom`, `prenom`, `telephone`) VALUES
(1, 'جو', 'سرين مود', 773023495),
(2, 'جوب', 'سرين بك', 772389710),
(3, 'جوب', 'بار', 777985511),
(4, 'جه', 'باب', 775577226),
(5, 'جاي', 'مورتال', 776676480),
(6, 'جوف', 'مام محتار', 766109001),
(7, 'سين', 'شيخ بك', 773913744),
(8, 'قله', 'سرين بك', 776974742);

-- --------------------------------------------------------

--
-- Table structure for table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appartement`
--
ALTER TABLE `appartement`
  ADD CONSTRAINT `FK_71A6BD8D3275823` FOREIGN KEY (`residence`) REFERENCES `residence` (`id`);

--
-- Constraints for table `barkelou`
--
ALTER TABLE `barkelou`
  ADD CONSTRAINT `FK_FD1A12C6F6B4FB29` FOREIGN KEY (`membre`) REFERENCES `membres` (`id`);

--
-- Constraints for table `chambre`
--
ALTER TABLE `chambre`
  ADD CONSTRAINT `FK_C509E4FF52520D07` FOREIGN KEY (`responsable`) REFERENCES `responsable` (`id`),
  ADD CONSTRAINT `FK_C509E4FF71A6BD8D` FOREIGN KEY (`appartement`) REFERENCES `appartement` (`id`);

--
-- Constraints for table `cotisation`
--
ALTER TABLE `cotisation`
  ADD CONSTRAINT `FK_AE64D2EDF6B4FB29` FOREIGN KEY (`membre`) REFERENCES `membres` (`id`);

--
-- Constraints for table `delegation`
--
ALTER TABLE `delegation`
  ADD CONSTRAINT `FK_292F436D7F17D8CE` FOREIGN KEY (`accueillant`) REFERENCES `accueillant` (`id`),
  ADD CONSTRAINT `FK_292F436DC509E4FF` FOREIGN KEY (`chambre`) REFERENCES `chambre` (`id`);

--
-- Constraints for table `engagement`
--
ALTER TABLE `engagement`
  ADD CONSTRAINT `FK_D86F0141F6B4FB29` FOREIGN KEY (`membre`) REFERENCES `membres` (`id`);

--
-- Constraints for table `membres`
--
ALTER TABLE `membres`
  ADD CONSTRAINT `FK_594AE39CE564F0BF` FOREIGN KEY (`statut`) REFERENCES `statut` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
