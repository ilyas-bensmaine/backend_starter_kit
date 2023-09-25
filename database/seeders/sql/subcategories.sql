-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 01:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auto_part_db`
--

-- --------------------------------------------------------

-- Dumping data for table `subcategories`
--

INSERT INTO `part_sub_categories` (`id`, `part_category_id`, `arabic_name`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'كوروا و ديستريبسيو', 'Courroies et Distribution', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(2, 1, 'ويل / اكسيسوار فيدونج', 'Huile / Accessoires vidange', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(3, 1, 'انجيكسيو كاربيراسيو', 'Injection carburation', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(4, 1, 'بوجي و بياس داليماج', 'Bougies et Pièces d allumage', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(5, 1, 'موتور و كيلاس', 'Moteur et Culasse', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(6, 1, 'كابتور و كابل موتور', 'Capteurs et câbles moteur', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(7, 1, 'تيربو', 'Turbo', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(8, 1, 'بومب', 'Pompes', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(9, 1, 'سيبور موتور', 'Supports moteur', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(10, 1, 'ليبريفيكاسيو', 'Lubrification', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(11, 1, 'سوباب دي موتور', 'Soupapes du moteur', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(12, 1, 'اليمونتاسيو كاربيرو', 'Alimentation carburant', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(13, 2, 'اوبتيك و فار', 'Optiques et Phares', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(14, 2, 'سيويقلاس', 'Essuie-glaces', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(15, 2, 'اومبول', 'Ampoules', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(16, 2, 'ريتروفيزور', 'Rétroviseurs', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(17, 2, 'اسيياج دي فار', 'Essuyage des phares', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(18, 3, 'امورتيسور', 'Amortisseurs', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(19, 3, 'سيسبونسيو داسو', 'Suspension d Essieux', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(20, 3, 'روتيل / ديراكسيو', 'Rotules / Direction', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(21, 3, 'مايو و رولمو', 'Moyeux et Roulements', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(22, 3, 'ترونسميسيو', 'Transmission', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(23, 3, 'ديراكسو', 'Direction', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(24, 3, 'بيتي(Butées)', 'Butées', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(25, 3, 'كيت دو ريباراسيو أي راسومبلاج', 'Kits de réparation et dassemblage', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(26, 3, 'روسور و سوفلي', 'Ressorts et Soufflets', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(27, 3, 'بياس سيسبونسيو اخرى', 'Autres pièces Suspension', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(28, 3, 'سفار', 'Sphères', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(29, 3, 'سيسبونسيو بنوماتيك', 'Suspension Pneumatique', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(30, 3, 'روتيل / سيسبونسيو', 'Rotules / Suspension', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(31, 4, 'بلاكات دو فران', 'Plaquettes de frein', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(32, 4, 'ديسك دو فران', 'Disques de frein', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(33, 4, 'ايدروليك', 'Hydraulique', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(34, 4, 'فران تومبور', 'Freins à tambours', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(35, 4, 'كابتور و كابل دو فريناج', 'Capteurs et câbles de freinage', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(36, 4, 'اسيستونس او فريناج', 'Assistance au freinage', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(37, 5, 'فيلتر', 'Filtres', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(38, 5, ' بياس دو فيلتراسيو أخرى', 'Autres Pièces de Filtration', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(39, 5, 'ويل / اكسيسوار فيدونج', 'Huile / Accessoires vidange', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(40, 6, 'باطري', 'Batteries', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(41, 6, 'ألتيرناتور', 'Alternateur', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(42, 6, 'ديمارور', 'Démarreur', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(43, 6, 'التارناتور-ديمارور', 'Alterno-Démarreurs', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(44, 7, 'اومبرياج و فولون موتور', 'Embrayage et Volant-moteur', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(45, 7, 'اكسيسوار دو بوات فيتاس', 'Accessoires de boîte de vitesse', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(47, 8, 'كابتور ديشابمو', 'Capteurs déchappement', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(48, 8, 'سيلونسيو و تيب', 'Silencieux et Tubes', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(49, 8, 'كاتاليزور و فيلتر بارتيكول', 'Catalyseurs et Filtres à particules', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(50, 8, 'اكسيسوار دو مونتاج', 'Accessoires de montage', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(51, 8, ' بياس ديشابمو أخرى', 'Autres pièces déchappement', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(52, 9, 'روفرواديسمو', 'Refroidissement', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(53, 9, 'شوفاج و فونتيليزاسيو', 'Chauffage et Ventilation', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(54, 9, 'كليماتيزاسيو', 'Climatisation', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(55, 9, 'كابتور و سوند ترميك', 'Capteurs et Sondes thermiques', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(56, 10, 'ابييمو و كونفور انتاريور', 'Habillement et Confort Intérieur', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(57, 10, 'اد لا كوندويت أي او ستاسيونمو', 'Aide à la conduite et au stationnement', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(58, 10, 'كونكايري', 'Quincaillerie', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(59, 10, 'سيركوي و سينياليزاسيو', 'Sécurité et Signalisation', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(60, 10, 'ايكيبمو ايفار', 'Equipement Hiver', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(61, 11, 'فيرا', 'Vérins', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(62, 11, 'لاف  فيتر', 'Lève-vitres', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(63, 11, 'سيرور / فارميتور', 'Serrure / Fermeture', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(64, 11, 'كوموند و بيدالي', 'Commandes et Pédalier', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(65, 11, 'ايليكتريك', 'Electricité', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(66, 11, ' بياس دابيتاكل أخرى', 'Autres pièces dhabitacle', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(67, 11, 'كلاكسو ,افارتيسور سونور', 'Klaxon, avertisseurs sonores', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(68, 11, 'جوان دابيتاكل', 'Joints dhabitacle', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(69, 12, 'شان-نيياج و ايكيبمو رو', 'Chaînes-neiges et Equipements Roue', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(70, 13, 'اديتيف ة تراتمو سبيسيفيك', 'Additifs et Traitements spécifiques', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(71, 13, 'نيتوياج و بروتيكسيو ايكستاريور', 'Nettoyage et Protection Extérieure', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(72, 13, 'ريبراسيو و مانتونونس', 'Réparation et Maintenance', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(73, 13, 'نيتوياج و بروتيكسيو ابيتاكل', 'Nettoyage et Protection de lHabitacle', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(74, 13, 'ليكيد دو فونكسيونمو', 'Liquides de fonctionnement', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(75, 13, 'اكسيسوار نيتوياج', 'Accessoires Nettoyage', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(76, 14, 'اتلاج', 'Attelage', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(77, 14, 'اكسيسوار داتلاج و بورتاج', 'Accessoires d’Attelage et Portage', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(78, 15, 'بار-شوك', 'Pare-choc', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(79, 15, 'بارتي اريار', 'Partie arrière', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(80, 15, 'بورتيار', 'Portières', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(81, 15, 'بارتي افو', 'Partie avant', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(82, 15, 'لال', 'Ailes', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(83, 15, 'كابو', 'Capot', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(84, 15, 'فيتر', 'Vitres', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(85, 15, 'قري دو رادياتور', 'Grille de radiateur', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(86, 16, 'اوتيلاج ديفار و كوفري', 'Outillage divers & coffrets', '2022-04-01 17:49:16', '2022-04-01 17:49:16'),
(87, 16, 'ايكليراج', 'Eclairage', '2022-04-01 17:49:16', '2022-04-01 17:49:16');

--
-- Indexes for dumped tables
--


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subcategories`
--

-- Constraints for dumped tables
--

--
-- Constraints for table `subcategories`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;