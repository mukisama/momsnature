-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2016 at 03:09 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `momsnature`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `description`, `created_on`) VALUES
(1, 'Health Care', '2015-09-08 08:25:12'),
(2, 'Beauty Care', '2015-09-08 08:25:12'),
(3, 'House Care', '2015-09-08 08:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `state_id`, `name`) VALUES
(1, 1, 'Mersing'),
(2, 2, 'Baling'),
(3, 3, 'Gua Musang'),
(4, 4, 'Jasin'),
(5, 5, 'Jelebu'),
(6, 6, 'Rompin'),
(7, 7, 'Timor Laut'),
(8, 8, 'Kerian'),
(9, 10, 'Hulu Selangor'),
(10, 11, 'Hulu Terengganu'),
(11, 1, 'Kota Tinggi'),
(12, 2, 'Bandar Baharu'),
(13, 3, 'Tanah Merah'),
(14, 4, 'Alor Gajah'),
(15, 5, 'Jempol'),
(16, 6, 'Lipis'),
(17, 7, 'Barat Daya'),
(18, 10, 'Gombak'),
(19, 11, 'Dungun'),
(20, 1, 'Ledang'),
(21, 2, 'Kota Setar'),
(22, 3, 'Jeli'),
(23, 4, 'Melaka Tengah'),
(24, 5, 'Kuala Pilah'),
(25, 6, 'Bentong'),
(26, 7, 'Seberang Perai Selatan'),
(27, 8, 'Kuala Kangsar'),
(28, 10, 'Sepang'),
(29, 11, 'Kuala Terengganu'),
(30, 1, 'Segamat'),
(31, 2, 'Kuala Muda'),
(32, 3, 'Kuala Krai'),
(33, 5, 'Rembau'),
(34, 6, 'Raub'),
(35, 7, 'Seberang Perai Tengah'),
(36, 8, 'Manjung'),
(37, 10, 'Kuala Selangor'),
(38, 11, 'Besut'),
(39, 1, 'Johor Bahru'),
(40, 2, 'Kubang Pasu'),
(41, 3, 'Kota Bharu'),
(42, 5, 'Port Dickson'),
(43, 6, 'Pekan'),
(44, 7, 'Seberang Perai Utara'),
(45, 8, 'Hulu Perak'),
(46, 10, 'Hulu Langat'),
(47, 11, 'Kemaman'),
(48, 1, 'Muar'),
(49, 2, 'Kulim'),
(50, 3, 'Tumpat'),
(51, 5, 'Tampin'),
(52, 6, 'Maran'),
(53, 8, 'Hilir Perak'),
(54, 10, 'Klang'),
(55, 11, 'Setiu'),
(56, 1, 'Kluang'),
(57, 2, 'Padang Terap'),
(58, 3, 'Pasir Puteh'),
(59, 5, 'Seremban'),
(60, 6, 'Kuantan'),
(61, 8, 'Perak Tengah'),
(62, 10, 'Petaling'),
(63, 11, 'Marang'),
(64, 1, 'Batu Pahat'),
(65, 2, 'Pendang'),
(66, 3, 'Machang'),
(67, 6, 'Temerloh'),
(68, 8, 'Kinta'),
(69, 10, 'Sabak Bernam'),
(70, 1, 'Pontian'),
(71, 2, 'Langkawi'),
(72, 3, 'Bachok'),
(73, 6, 'Jerantut'),
(74, 1, 'Kulai Jaya'),
(75, 2, 'Pokok Sena'),
(76, 3, 'Pasir Mas'),
(77, 6, 'Cameron Highlands'),
(78, 8, 'Batang Padang'),
(79, 2, 'Sik'),
(80, 6, 'Bera'),
(81, 8, 'Kampar'),
(82, 13, 'Asajaya'),
(83, 2, 'Yan'),
(84, 13, 'Kuching'),
(85, 13, 'Kapit'),
(86, 13, 'Kanowit'),
(87, 13, 'Julau'),
(88, 13, 'Bintulu'),
(89, 13, 'Maradong'),
(90, 13, 'Daro'),
(91, 13, 'Samarahan'),
(92, 13, 'Lubuk Antu'),
(93, 13, 'Sri Aman'),
(94, 13, 'Lundu'),
(95, 13, 'Limbang'),
(96, 13, 'Lawas'),
(97, 13, 'Serian'),
(98, 13, 'Sibu'),
(99, 13, 'Simunjan'),
(100, 13, 'Pakan'),
(101, 13, 'Song'),
(102, 13, 'Saratok'),
(103, 13, 'Bau'),
(104, 13, 'Sarikei'),
(105, 13, 'Betong'),
(106, 13, 'Marudu'),
(107, 13, 'Miri'),
(108, 12, 'Pensiangan'),
(109, 12, 'Kunak'),
(110, 12, 'Tenom'),
(111, 12, 'Tongod'),
(112, 12, 'Sipitang'),
(113, 12, 'Semporna'),
(114, 12, 'Lahad Datu'),
(115, 12, 'Beaufort'),
(116, 12, 'Keningau'),
(117, 12, 'Kuala Penyu'),
(118, 12, 'Kinabatangan'),
(119, 12, 'Papar'),
(120, 12, 'Tambunan'),
(121, 12, 'Labuk & Sugut'),
(122, 12, 'Sandakan'),
(123, 12, 'Ranau'),
(124, 12, 'Tuaran'),
(125, 12, 'Kota Belud'),
(126, 12, 'Kota Kinabalu'),
(127, 12, 'Pitas'),
(128, 12, 'Kudat'),
(129, 12, 'Tawau'),
(130, 12, 'Penampang'),
(131, 12, 'Kota Marudu'),
(132, 14, 'WP Kuala Lumpur'),
(133, 15, 'WP Labuan'),
(134, 16, 'WP Putrajaya'),
(135, 1, 'Tangkak'),
(136, 10, 'Kuala Langat'),
(137, 8, 'Larut Matang & Selama'),
(138, 9, 'Perlis');

-- --------------------------------------------------------

--
-- Table structure for table `hierarchy`
--

CREATE TABLE IF NOT EXISTS `hierarchy` (
  `id` int(11) NOT NULL,
  `wholeseller_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `transaction_number` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `remarks` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `transaction_number`, `product_id`, `quantity`, `amount`, `remarks`, `created_on`) VALUES
(94, '201510O000000', 6, 2, '22.00', NULL, '2015-10-28 04:13:47'),
(95, '201510O000000', 14, 2, '18.00', NULL, '2015-10-28 04:13:47'),
(96, '201510O000000', 15, 2, '21.60', NULL, '2015-10-28 04:13:47'),
(97, '201510O000000', 1, 1, '9.00', NULL, '2015-10-28 04:13:47'),
(98, '201510O000000', 11, 2, '102.00', NULL, '2015-10-28 04:13:47'),
(99, '201510O000001', 1, 4, '36.00', NULL, '2015-10-28 06:45:31'),
(100, '201510O000001', 5, 3, '36.30', NULL, '2015-10-28 06:45:31'),
(101, '201510O000001', 16, 3, '29.70', NULL, '2015-10-28 06:45:32'),
(102, '201510O000002', 1, 3, '27.00', NULL, '2015-10-28 07:48:44'),
(103, '201510O000003', 1, 5, '45.00', NULL, '2015-10-29 01:57:59'),
(104, '201510O000004', 9, 4, '43.20', NULL, '2015-10-29 04:42:57'),
(105, '201510O000004', 11, 5, '255.00', NULL, '2015-10-29 04:42:57'),
(106, '201602O000005', 1, 3, '27.00', NULL, '2016-02-23 01:33:13'),
(107, '201602O000005', 13, 4, '84.00', NULL, '2016-02-23 01:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `isUsed` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `link`, `isUsed`, `created_on`) VALUES
(1, '563084355f896', 1, '2015-10-28 08:15:49'),
(2, '5630883e72bab', 1, '2015-10-28 08:33:02'),
(3, '56308a0db8cb0', 0, '2015-10-28 08:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `transaction_number` varchar(255) NOT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_number`, `order_status`, `user_id`, `amount`, `created_on`) VALUES
(55, '201510O000000', 'Items Delivered', 3, '172.60', '2015-10-28 04:13:47'),
(56, '201510O000001', 'Items Delivered', 3, '102.00', '2015-10-28 06:45:32'),
(57, '201510O000002', 'Pending Payment', 3, '27.00', '2015-10-29 04:23:29'),
(58, '201510O000003', 'Items Delivered', 1, '45.00', '2015-10-29 04:23:38'),
(59, '201510O000004', 'Pending Payment', 1, '298.20', '2015-10-29 04:42:57'),
(60, '201602O000005', 'Pending Payment', 1, '111.00', '2016-02-23 01:33:16');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `transaction_number` varchar(255) NOT NULL,
  `receipt_number` varchar(255) DEFAULT NULL,
  `method` varchar(255) NOT NULL,
  `copy` varchar(255) NOT NULL,
  `remarks` text,
  `isApproved` tinyint(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `transaction_number`, `receipt_number`, `method`, `copy`, `remarks`, `isApproved`, `created_on`) VALUES
(11, '201510O000000', '201510R000001', 'Cash Term', 'receipts/201510O000000', 'asdadasdasd', 1, '2015-10-28 04:15:38'),
(12, '201510O000001', '201510R000002', 'Cheque', 'receipts/201510O000001', 'test', 1, '2015-10-28 06:46:41'),
(13, '201510O000003', '201510R000003', 'Cheque', 'receipts/201510O000003', 'ttestt', 1, '2015-10-29 04:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `SKU` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `manufacturer` varchar(255) DEFAULT NULL,
  `wholeseller_price` decimal(10,2) NOT NULL,
  `agent_price` decimal(10,2) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `pictures` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `SKU`, `category_id`, `type_id`, `description`, `manufacturer`, `wholeseller_price`, `agent_price`, `isActive`, `pictures`, `created_on`) VALUES
(1, 'Organic Lemon Myrtle Tea', 'Tea25', 1, 1, 'Lemon Myrtle Tea for reducing fat, reduce muscles tension and joint  pain, headache, fever, avoid ulcer, boost immune system, and treat cough.', '', '6.00', '9.00', 1, 'products/Teh Lemon Myrtle 200px agent site.jpg', '2015-10-19 03:24:44'),
(5, 'Soap Bar Lemon Myrtle with Fragrance', 'Soap90Fragrance', 2, 1, 'Soap Bar Lemon Myrtle contains Lemon Myrtle essential oil which treats pimples and acnes thanks to its high citral content. This soap bar helps relieve eczema irritation and skin itchiness, reduce pigmentation and also good to get moisturize, soft and healthy skin. Available in Peach & Rose fragrance.', '', '9.90', '12.10', 1, 'products/momsnature-soapbar-peach 200px agent site.jpg', '2015-10-19 03:24:58'),
(6, 'Soap Bar Lemon Myrtle (90g)', ' Soap90', 2, 1, 'This soap bar helps relieve eczema irritation and skin itchiness,pimple, acne,  reduce pigmentation and also good to get moisturize, soft and healthy skin.', '', '9.00', '11.00', 1, 'products/Sabun Lemon Myrtle 200px agent site.jpg', '2015-10-19 03:25:12'),
(7, 'Soap Bar Lemon Myrtle (15g)', ' Soap15', 2, 1, 'Soap Bar Lemon Myrtle contains Lemon Myrtle essential oil which treats pimples and acnes thanks to its high citral content. This soap bar helps relieve eczema irritation and skin itchiness, reduce pigmentation and also good to get moisturize, soft and healthy skin.', '', '1.80', '2.25', 1, 'products/sabun kecik crop 200px agent site.jpg', '2015-10-19 03:17:49'),
(8, 'Organic Lemon Myrtle Spices', 'Spice50', 1, 2, 'Lemon Myrtle can be used in cooking thanks to its lemony smells and the fresher and sweeter tastes compared to the real lemon. The spice make it easier to work with the other materials compared to lemon and it also create better sweeter smells. For more recipe ideas, visit www.momsnature.com.my.', 'Mom''s Nature', '6.00', '9.00', 1, 'products/Serbuk Herba Lemon Myrtle 200px agent site.jpg', '2015-10-19 03:10:34'),
(9, 'Organic Lemon Myrtle Body Wash', 'ShowerGel250ml', 2, 1, 'Enriched with the sweet rose scent, Lemon Myrtle Body Wash helps to reduce eczema itchiness, reduce body acne and also removes impurities and dirt due to sweats. Suitable for normal and oily skin.', '', '7.20', '10.80', 1, 'products/momsnature-bodywash 200px agent site.jpg', '2015-10-19 03:26:26'),
(11, 'Lemon Myrtle Spa Oil with Virgin Coconut Oil', 'VCOSpaOil100', 2, 1, 'Used as massage oil, with its high content of antibackteria and anti fungal properties kills and reduce itchiness, eczema and body acne. Rich with high moisture content makes skin supple and looks younger, relieve skin irritation and other skin diseases.', '', '34.00', '51.00', 1, 'products/momsnature-VCO-essential-oils-cinnamon 200px agent site.jpg', '2015-10-19 03:17:16'),
(12, 'Lemon Myrtle Spa Oil with Virgin Coconut Oil	 (8 ml)', 'VCOSpaOil8', 2, 1, 'Used as massage oil, with its high content of antibackteria and anti fungal properties kills and reduce itchiness, eczema and body acne. Rich with high moisture content makes skin supple and looks younger, relieve skin irritation and other skin diseases.', '', '4.80', '7.20', 1, 'products/momsnature-VCO-essential-oils-cinnamon small 200px agent site.jpg', '2015-10-19 03:16:59'),
(13, 'Lemon Myrtle Essential Oil', 'EO10', 2, 1, 'Smells like lemon, this refreshing Lemon Myrtle Essential Oil can be used with diffuser to relax and during spa treatment. The diffuse smells when used with essential oil diffuser helps to raise the mood and makes your mind relax, at peace and boost up your mood. Lemon Myrtle Essential Oil can be use directly on skin as massage oil and also as room fragrance.', '', '9.00', '21.00', 1, 'products/momsnature-essential-oil 200px agent site.jpg', '2015-10-19 03:16:36'),
(14, 'Lemon Myrtle Hand Wash', 'HandWash500ml', 2, 1, 'The freshness of Lemon Myrtle with its antibacteria content makes Lemon Myrtle Hand Wash suitable for all types of skin and the whole family.', '', '6.00', '9.00', 1, 'products/momsnature-handwash 200px agent site.jpg', '2015-10-19 03:28:01'),
(15, 'Lemon Myrtle Multi Purpose Spray Strong', 'MultiPurposeSpray500_02', 3, 1, 'Lemon Myrtle Multi Purpose Spray made from all natural ingredients which helps to protect your house from insects such as flies, cockroaches, rats, and mosquitoes. Only spray a small amount on surfaces and then wipe it off with a clean cloth.', '', '7.20', '10.80', 1, 'products/Semburan Serbaguna Lemon Myrtle 200px agent site.jpg', '2015-10-19 03:28:17'),
(16, 'Lemon Myrtle Multi-Purpose Spray', 'MultiPurposeSpray500_01', 3, 1, 'made from all natural ingredients which helps to clean your dining table and any other surface from dirt and with the Lemon Myrtle extract added in, it will keep insects such as flies, cockroaches, rats, and mosquitoes away from your house', '', '6.60', '9.90', 1, 'products/momsnature-multipurpose-spray-02  200px agent site.jpg', '2015-10-19 03:28:31'),
(17, 'test', 'test-pic', 1, 1, 'this is a test', 'qwe', '21.00', '12.00', 0, 'products/test-pic', '2015-10-28 03:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_on`) VALUES
(1, 'admin', '2015-09-17 04:03:51'),
(4, 'wholeseller', '2015-09-06 16:10:33'),
(5, 'agent', '2015-09-06 16:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Johor'),
(2, 'Kedah'),
(3, 'Kelantan'),
(4, 'Melaka'),
(5, 'Negeri Sembilan'),
(6, 'Pahang'),
(7, 'Pulau Pinang'),
(8, 'Perak'),
(9, 'Perlis'),
(10, 'Selangor'),
(11, 'Terengganu'),
(12, 'Sabah'),
(13, 'Sarawak'),
(14, 'Wilayah Persekutuan Kuala Lumpur'),
(15, 'Wilayah Persekutuan Labuan'),
(16, 'Wilayah Persekutuan Putrajaya');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `description`, `created_on`) VALUES
(1, 'Physical', '2015-09-08 08:26:57'),
(2, 'Service', '2015-09-08 08:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ic_no` varchar(255) NOT NULL,
  `hp_no` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `district_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_address` text NOT NULL,
  `shop_contact_number` varchar(155) DEFAULT NULL,
  `shop_link` varchar(155) DEFAULT NULL,
  `wholeseller_id` int(11) DEFAULT NULL,
  `copy` varchar(255) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `ic_no`, `hp_no`, `email`, `address`, `district_id`, `state_id`, `role_id`, `shop_name`, `shop_address`, `shop_contact_number`, `shop_link`, `wholeseller_id`, `copy`, `created_on`) VALUES
(1, 'admin', '$2y$10$bV9/RxHscZOhffmP0I0sZ.NxSluzkVtBkPV2FhiWkhwllfwdW04UC', 'Administrator', '12341234', '123123', 'admin@momsnature.com', 'no address', 1, 4, 1, '', '', '', '', NULL, NULL, '2015-10-28 08:15:16'),
(2, 'user', '$2a$10$vsD7N.uREZMB.mKrXNDNGuOJI/QIBcF.KuV0/UytmLjiBLiay5Ktm', 'werwqre', 'qwerwer', 'wqerwer', 'qwerw@ewe.cv', 'fasfawefaw', 132, 14, 0, '', '', '', '', NULL, 'details/sample mykad.jpg', '2015-10-28 08:16:55'),
(3, 'siti', '$2a$10$KNWtCY27I98GbQP5A/ir8eYX.ZsL8uPyKPLQX/99fW2KAQUOH.bUy', 'siti wan kembang', '53523523r23', '12413423423', 'vdfvdf@sdfsd.mon', 'fgdsgar', 0, 16, 1, 'Kedai cik Siti', 'Address test\r\nline 1 test\r\nline 2 test', '100100100', 'kaksiti.com', NULL, 'details/siti', '2015-10-29 05:25:49'),
(4, 'primus', '$2a$10$kGlQ24PvcXJVsJhFfAwvNeg30iT9Lbz0qsgaLO4oIO7SAyUBISQQu', 'qweqwe', 'qweqwe', 'qweqwe', 'qwe@qweqwecv.com', 'qweqwe', 134, 16, 5, 'qweqwewq', 'qweqwe', 'qweqwe', '', NULL, 'details/primus', '2015-10-28 08:54:33'),
(5, 'siti', '$2a$10$wq7NA7PRTSjL4/Z5CwOh4OOF/Wf0Gq1xeHGwSABYAH2IsV/F4wtH.', 'qweqwe', 'qweqwe', 'qweqwe', 'qweqw@faw.nmw', 'qweqwe', 0, 10, 4, 'qweqwewq', 'qqadasdasd', '', '', NULL, 'details/siti', '2015-10-28 09:24:50'),
(6, 'siti', '$2a$10$Tyk2onMtf4/NU66/jyJ8/OlXHAf.4JmZ431NHvvzAWiTs5BCUy3g2', 'qweqwe', 'weqweq', 'qweq', 'qweqwe@adfa.com', 'qweqwe', 2, 2, 4, '12312', '312312', '12312', '12312', NULL, 'details/siti', '2015-10-28 09:26:59'),
(7, 'primus', '$2a$10$UMJxlbs0I/XSp2HqpMFH.eKbH3coY45d2ktaMudLIHkkcUqt0bA7i', 'qweqwe', 'qweqwe', 'qweqwe', 'qwe@qweqwecv.com', 'qweqwe', 134, 16, 5, 'qweqwewq', 'qweqwe', 'qweqwe', '', NULL, NULL, '2015-10-29 02:18:23'),
(8, 'primus', '$2a$10$RKtTCXqqHTliEmxGxJq2ROQZ.VwfVwCHxZyZRAL4kTFTdtt7Z07tG', 'qweqwe', 'qweqwe', 'qweqwe', 'qwe@qweqwecv.com', 'qweqwe', 52, 6, 4, 'qweqwewq', 'qweqwe', 'qweqwe', '', NULL, NULL, '2015-10-29 02:24:05'),
(9, 'primus', '$2a$10$U7sJESHfX/lhmwdAkpdGkOe.s4haZOboDDd8nLlCB.lCdJCwLMO42', 'qweqwe', 'qweqwe', 'qweqwe', 'qwe@qweqwecv.com', 'qweqwe', 134, 16, 4, 'qweqwewq', 'qweqwe', 'qweqwe', '', NULL, NULL, '2015-10-29 02:18:44'),
(10, 'primus', '$2a$10$0tCENTS9nF8Y1JQOeifmyeIjVd3Yki3OJAEe1XMIjLXV4RZHh8B52', 'qweqwe', 'qweqwe', 'qweqwe', 'qwe@qweqwecv.com', 'ghghgh', 134, 16, 4, 'qweqwewq', 'qweqwe', 'qweqwe', '', NULL, NULL, '2015-10-29 02:19:51'),
(11, 'primus', '$2a$10$hPiEl71F4TYScEqLeETJ6eVxHdLo90DPdBPXzuO6v1o2/D3dNhDkO', 'qweqwe', 'qweqwe', 'qweqwe', 'qwe@qweqwecv.com', 'qweqwe', 134, 1, 5, 'qweqwewq', 'qweqwe', 'qweqwe', '', NULL, NULL, '2015-10-29 02:20:40'),
(12, 'siti', '$2a$10$C92KcTK1w5dZsddehEbUku5Wiu24C7d6nti5j9Unn9Lz45oteE0du', 'qweqwe', 'qweqwe', 'qweqwe', 'qwe@qweqwecv.com', 'qweqwe', 134, 16, 5, 'qweqwewq', 'qweqwe', 'qweqwe', '', NULL, NULL, '2015-10-29 02:21:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hierarchy`
--
ALTER TABLE `hierarchy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `hierarchy`
--
ALTER TABLE `hierarchy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
