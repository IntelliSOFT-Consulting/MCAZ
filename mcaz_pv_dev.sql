-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2018 at 10:06 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcaz_pv_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `acl_phinxlog`
--

CREATE TABLE `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acl_phinxlog`
--

INSERT INTO `acl_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20141229162641, 'CakePhpDbAcl', '2017-10-31 15:45:09', '2017-10-31 15:45:09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE `acos` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 928),
(2, 1, NULL, NULL, 'Users', 2, 31),
(3, 2, NULL, NULL, 'login', 3, 4),
(4, 2, NULL, NULL, 'logout', 5, 6),
(5, 2, NULL, NULL, 'index', 7, 8),
(6, 2, NULL, NULL, 'view', 9, 10),
(7, 2, NULL, NULL, 'add', 11, 12),
(8, 2, NULL, NULL, 'edit', 13, 14),
(9, 2, NULL, NULL, 'delete', 15, 16),
(10, 1, NULL, NULL, 'Attachments', 32, 43),
(11, 10, NULL, NULL, 'index', 33, 34),
(12, 10, NULL, NULL, 'view', 35, 36),
(13, 10, NULL, NULL, 'add', 37, 38),
(14, 10, NULL, NULL, 'edit', 39, 40),
(15, 10, NULL, NULL, 'delete', 41, 42),
(16, 1, NULL, NULL, 'Doses', 44, 55),
(17, 16, NULL, NULL, 'index', 45, 46),
(18, 16, NULL, NULL, 'view', 47, 48),
(19, 16, NULL, NULL, 'add', 49, 50),
(20, 16, NULL, NULL, 'edit', 51, 52),
(21, 16, NULL, NULL, 'delete', 53, 54),
(22, 1, NULL, NULL, 'Error', 56, 57),
(23, 1, NULL, NULL, 'Counties', 58, 69),
(24, 23, NULL, NULL, 'index', 59, 60),
(25, 23, NULL, NULL, 'view', 61, 62),
(26, 23, NULL, NULL, 'add', 63, 64),
(27, 23, NULL, NULL, 'edit', 65, 66),
(28, 23, NULL, NULL, 'delete', 67, 68),
(29, 1, NULL, NULL, 'Designations', 70, 81),
(30, 29, NULL, NULL, 'index', 71, 72),
(31, 29, NULL, NULL, 'view', 73, 74),
(32, 29, NULL, NULL, 'add', 75, 76),
(33, 29, NULL, NULL, 'edit', 77, 78),
(34, 29, NULL, NULL, 'delete', 79, 80),
(35, 1, NULL, NULL, 'Routes', 82, 93),
(36, 35, NULL, NULL, 'index', 83, 84),
(37, 35, NULL, NULL, 'view', 85, 86),
(38, 35, NULL, NULL, 'add', 87, 88),
(39, 35, NULL, NULL, 'edit', 89, 90),
(40, 35, NULL, NULL, 'delete', 91, 92),
(41, 1, NULL, NULL, 'WhoDrugs', 94, 107),
(42, 41, NULL, NULL, 'index', 95, 96),
(43, 41, NULL, NULL, 'view', 97, 98),
(44, 41, NULL, NULL, 'add', 99, 100),
(45, 41, NULL, NULL, 'edit', 101, 102),
(46, 41, NULL, NULL, 'delete', 103, 104),
(47, 1, NULL, NULL, 'Pages', 108, 111),
(48, 47, NULL, NULL, 'display', 109, 110),
(49, 1, NULL, NULL, 'Feedbacks', 112, 123),
(50, 49, NULL, NULL, 'index', 113, 114),
(51, 49, NULL, NULL, 'view', 115, 116),
(52, 49, NULL, NULL, 'add', 117, 118),
(53, 49, NULL, NULL, 'edit', 119, 120),
(54, 49, NULL, NULL, 'delete', 121, 122),
(55, 1, NULL, NULL, 'SadrFollowups', 124, 135),
(56, 55, NULL, NULL, 'index', 125, 126),
(57, 55, NULL, NULL, 'view', 127, 128),
(58, 55, NULL, NULL, 'add', 129, 130),
(59, 55, NULL, NULL, 'edit', 131, 132),
(60, 55, NULL, NULL, 'delete', 133, 134),
(61, 1, NULL, NULL, 'Groups', 136, 147),
(62, 61, NULL, NULL, 'index', 137, 138),
(63, 61, NULL, NULL, 'view', 139, 140),
(64, 61, NULL, NULL, 'add', 141, 142),
(65, 61, NULL, NULL, 'edit', 143, 144),
(66, 61, NULL, NULL, 'delete', 145, 146),
(67, 1, NULL, NULL, 'SadrListOfDrugs', 148, 159),
(68, 67, NULL, NULL, 'index', 149, 150),
(69, 67, NULL, NULL, 'view', 151, 152),
(70, 67, NULL, NULL, 'add', 153, 154),
(71, 67, NULL, NULL, 'edit', 155, 156),
(72, 67, NULL, NULL, 'delete', 157, 158),
(73, 1, NULL, NULL, 'Messages', 160, 171),
(74, 73, NULL, NULL, 'index', 161, 162),
(75, 73, NULL, NULL, 'view', 163, 164),
(76, 73, NULL, NULL, 'add', 165, 166),
(77, 73, NULL, NULL, 'edit', 167, 168),
(78, 73, NULL, NULL, 'delete', 169, 170),
(79, 1, NULL, NULL, 'Pqmps', 172, 183),
(80, 79, NULL, NULL, 'index', 173, 174),
(81, 79, NULL, NULL, 'view', 175, 176),
(82, 79, NULL, NULL, 'add', 177, 178),
(83, 79, NULL, NULL, 'edit', 179, 180),
(84, 79, NULL, NULL, 'delete', 181, 182),
(85, 1, NULL, NULL, 'Sadrs', 184, 201),
(86, 85, NULL, NULL, 'index', 185, 186),
(87, 85, NULL, NULL, 'view', 187, 188),
(88, 85, NULL, NULL, 'add', 189, 190),
(89, 85, NULL, NULL, 'edit', 191, 192),
(90, 85, NULL, NULL, 'delete', 193, 194),
(91, 1, NULL, NULL, 'SubCounties', 202, 213),
(92, 91, NULL, NULL, 'index', 203, 204),
(93, 91, NULL, NULL, 'view', 205, 206),
(94, 91, NULL, NULL, 'add', 207, 208),
(95, 91, NULL, NULL, 'edit', 209, 210),
(96, 91, NULL, NULL, 'delete', 211, 212),
(97, 1, NULL, NULL, 'Frequencies', 214, 225),
(98, 97, NULL, NULL, 'index', 215, 216),
(99, 97, NULL, NULL, 'view', 217, 218),
(100, 97, NULL, NULL, 'add', 219, 220),
(101, 97, NULL, NULL, 'edit', 221, 222),
(102, 97, NULL, NULL, 'delete', 223, 224),
(103, 1, NULL, NULL, 'DrugDictionaries', 226, 237),
(104, 103, NULL, NULL, 'index', 227, 228),
(105, 103, NULL, NULL, 'view', 229, 230),
(106, 103, NULL, NULL, 'add', 231, 232),
(107, 103, NULL, NULL, 'edit', 233, 234),
(108, 103, NULL, NULL, 'delete', 235, 236),
(109, 1, NULL, NULL, 'Countries', 238, 249),
(110, 109, NULL, NULL, 'index', 239, 240),
(111, 109, NULL, NULL, 'view', 241, 242),
(112, 109, NULL, NULL, 'add', 243, 244),
(113, 109, NULL, NULL, 'edit', 245, 246),
(114, 109, NULL, NULL, 'delete', 247, 248),
(115, 1, NULL, NULL, 'FacilityCodes', 250, 261),
(116, 115, NULL, NULL, 'index', 251, 252),
(117, 115, NULL, NULL, 'view', 253, 254),
(118, 115, NULL, NULL, 'add', 255, 256),
(119, 115, NULL, NULL, 'edit', 257, 258),
(120, 115, NULL, NULL, 'delete', 259, 260),
(121, 1, NULL, NULL, 'HelpInfos', 262, 273),
(122, 121, NULL, NULL, 'index', 263, 264),
(123, 121, NULL, NULL, 'view', 265, 266),
(124, 121, NULL, NULL, 'add', 267, 268),
(125, 121, NULL, NULL, 'edit', 269, 270),
(126, 121, NULL, NULL, 'delete', 271, 272),
(127, 1, NULL, NULL, 'Acl', 274, 275),
(128, 1, NULL, NULL, 'Bake', 276, 277),
(129, 1, NULL, NULL, 'DebugKit', 278, 305),
(130, 129, NULL, NULL, 'Toolbar', 279, 282),
(131, 130, NULL, NULL, 'clearCache', 280, 281),
(132, 129, NULL, NULL, 'Composer', 283, 286),
(133, 132, NULL, NULL, 'checkDependencies', 284, 285),
(134, 129, NULL, NULL, 'Panels', 287, 292),
(135, 134, NULL, NULL, 'index', 288, 289),
(136, 134, NULL, NULL, 'view', 290, 291),
(137, 129, NULL, NULL, 'MailPreview', 293, 300),
(138, 137, NULL, NULL, 'index', 294, 295),
(139, 137, NULL, NULL, 'sent', 296, 297),
(140, 137, NULL, NULL, 'email', 298, 299),
(141, 129, NULL, NULL, 'Requests', 301, 304),
(142, 141, NULL, NULL, 'view', 302, 303),
(143, 1, NULL, NULL, 'Migrations', 306, 307),
(144, 2, NULL, NULL, 'register', 17, 18),
(145, 2, NULL, NULL, 'profile', 19, 20),
(146, 1, NULL, NULL, 'Aefis', 308, 323),
(147, 146, NULL, NULL, 'index', 309, 310),
(148, 146, NULL, NULL, 'view', 311, 312),
(149, 146, NULL, NULL, 'add', 313, 314),
(150, 146, NULL, NULL, 'edit', 315, 316),
(151, 146, NULL, NULL, 'delete', 317, 318),
(152, 1, NULL, NULL, 'SadrOtherDrugs', 324, 335),
(153, 152, NULL, NULL, 'index', 325, 326),
(154, 152, NULL, NULL, 'view', 327, 328),
(155, 152, NULL, NULL, 'add', 329, 330),
(156, 152, NULL, NULL, 'edit', 331, 332),
(157, 152, NULL, NULL, 'delete', 333, 334),
(158, 1, NULL, NULL, 'Api', 336, 401),
(159, 158, NULL, NULL, 'Sadrs', 337, 350),
(160, 159, NULL, NULL, 'index', 338, 339),
(161, 159, NULL, NULL, 'view', 340, 341),
(162, 159, NULL, NULL, 'add', 342, 343),
(163, 159, NULL, NULL, 'edit', 344, 345),
(164, 159, NULL, NULL, 'delete', 346, 347),
(165, 1, NULL, NULL, 'Crud', 402, 403),
(166, 1, NULL, NULL, 'Josegonzalez\\Upload', 404, 405),
(167, 1, NULL, NULL, 'AdrListOfDrugs', 406, 417),
(168, 167, NULL, NULL, 'index', 407, 408),
(169, 167, NULL, NULL, 'view', 409, 410),
(170, 167, NULL, NULL, 'add', 411, 412),
(171, 167, NULL, NULL, 'edit', 413, 414),
(172, 167, NULL, NULL, 'delete', 415, 416),
(173, 1, NULL, NULL, 'Adrs', 418, 431),
(174, 173, NULL, NULL, 'index', 419, 420),
(175, 173, NULL, NULL, 'view', 421, 422),
(176, 173, NULL, NULL, 'add', 423, 424),
(177, 173, NULL, NULL, 'edit', 425, 426),
(178, 173, NULL, NULL, 'delete', 427, 428),
(179, 1, NULL, NULL, 'AdrOtherDrugs', 432, 443),
(180, 179, NULL, NULL, 'index', 433, 434),
(181, 179, NULL, NULL, 'view', 435, 436),
(182, 179, NULL, NULL, 'add', 437, 438),
(183, 179, NULL, NULL, 'edit', 439, 440),
(184, 179, NULL, NULL, 'delete', 441, 442),
(185, 1, NULL, NULL, 'AdrLabTests', 444, 455),
(186, 185, NULL, NULL, 'index', 445, 446),
(187, 185, NULL, NULL, 'view', 447, 448),
(188, 185, NULL, NULL, 'add', 449, 450),
(189, 185, NULL, NULL, 'edit', 451, 452),
(190, 185, NULL, NULL, 'delete', 453, 454),
(191, 1, NULL, NULL, 'AefiListOfVaccines', 456, 467),
(192, 191, NULL, NULL, 'index', 457, 458),
(193, 191, NULL, NULL, 'view', 459, 460),
(194, 191, NULL, NULL, 'add', 461, 462),
(195, 191, NULL, NULL, 'edit', 463, 464),
(196, 191, NULL, NULL, 'delete', 465, 466),
(197, 1, NULL, NULL, 'AefiListOfDiluents', 468, 479),
(198, 197, NULL, NULL, 'index', 469, 470),
(199, 197, NULL, NULL, 'view', 471, 472),
(200, 197, NULL, NULL, 'add', 473, 474),
(201, 197, NULL, NULL, 'edit', 475, 476),
(202, 197, NULL, NULL, 'delete', 477, 478),
(203, 2, NULL, NULL, 'home', 21, 22),
(204, 2, NULL, NULL, 'activate', 23, 24),
(205, 158, NULL, NULL, 'Adrs', 351, 362),
(206, 205, NULL, NULL, 'index', 352, 353),
(207, 205, NULL, NULL, 'view', 354, 355),
(208, 205, NULL, NULL, 'add', 356, 357),
(209, 205, NULL, NULL, 'edit', 358, 359),
(210, 205, NULL, NULL, 'delete', 360, 361),
(211, 158, NULL, NULL, 'Aefis', 363, 376),
(212, 211, NULL, NULL, 'index', 364, 365),
(213, 211, NULL, NULL, 'view', 366, 367),
(214, 211, NULL, NULL, 'add', 368, 369),
(215, 211, NULL, NULL, 'edit', 370, 371),
(216, 211, NULL, NULL, 'delete', 372, 373),
(217, 1, NULL, NULL, 'CakePdf', 480, 481),
(218, 1, NULL, NULL, 'Queue', 482, 483),
(219, 1, NULL, NULL, 'Provinces', 484, 495),
(220, 219, NULL, NULL, 'index', 485, 486),
(221, 219, NULL, NULL, 'view', 487, 488),
(222, 219, NULL, NULL, 'add', 489, 490),
(223, 219, NULL, NULL, 'edit', 491, 492),
(224, 219, NULL, NULL, 'delete', 493, 494),
(225, 1, NULL, NULL, 'SaefiListOfVaccines', 496, 507),
(226, 225, NULL, NULL, 'index', 497, 498),
(227, 225, NULL, NULL, 'view', 499, 500),
(228, 225, NULL, NULL, 'add', 501, 502),
(229, 225, NULL, NULL, 'edit', 503, 504),
(230, 225, NULL, NULL, 'delete', 505, 506),
(231, 1, NULL, NULL, 'Saefis', 508, 521),
(232, 231, NULL, NULL, 'index', 509, 510),
(233, 231, NULL, NULL, 'view', 511, 512),
(234, 231, NULL, NULL, 'add', 513, 514),
(235, 231, NULL, NULL, 'edit', 515, 516),
(236, 231, NULL, NULL, 'delete', 517, 518),
(237, 158, NULL, NULL, 'Saefis', 377, 388),
(238, 237, NULL, NULL, 'index', 378, 379),
(239, 237, NULL, NULL, 'view', 380, 381),
(240, 237, NULL, NULL, 'add', 382, 383),
(241, 237, NULL, NULL, 'edit', 384, 385),
(242, 237, NULL, NULL, 'delete', 386, 387),
(243, 1, NULL, NULL, 'Admin', 522, 627),
(244, 243, NULL, NULL, 'Users', 523, 542),
(246, 244, NULL, NULL, 'index', 524, 525),
(247, 244, NULL, NULL, 'view', 526, 527),
(248, 244, NULL, NULL, 'profile', 528, 529),
(249, 244, NULL, NULL, 'add', 530, 531),
(250, 244, NULL, NULL, 'edit', 532, 533),
(251, 244, NULL, NULL, 'delete', 534, 535),
(252, 244, NULL, NULL, 'dashboard', 536, 537),
(253, 243, NULL, NULL, 'Sadrs', 543, 554),
(254, 253, NULL, NULL, 'index', 544, 545),
(255, 253, NULL, NULL, 'view', 546, 547),
(256, 253, NULL, NULL, 'add', 548, 549),
(257, 253, NULL, NULL, 'edit', 550, 551),
(258, 253, NULL, NULL, 'delete', 552, 553),
(259, 243, NULL, NULL, 'Adrs', 555, 566),
(260, 259, NULL, NULL, 'index', 556, 557),
(261, 259, NULL, NULL, 'view', 558, 559),
(262, 259, NULL, NULL, 'add', 560, 561),
(263, 259, NULL, NULL, 'edit', 562, 563),
(264, 259, NULL, NULL, 'delete', 564, 565),
(265, 243, NULL, NULL, 'Saefis', 567, 578),
(266, 265, NULL, NULL, 'view', 568, 569),
(267, 265, NULL, NULL, 'add', 570, 571),
(268, 265, NULL, NULL, 'edit', 572, 573),
(269, 265, NULL, NULL, 'delete', 574, 575),
(270, 243, NULL, NULL, 'Aefis', 579, 590),
(271, 270, NULL, NULL, 'index', 580, 581),
(272, 270, NULL, NULL, 'view', 582, 583),
(273, 270, NULL, NULL, 'add', 584, 585),
(274, 270, NULL, NULL, 'edit', 586, 587),
(275, 270, NULL, NULL, 'delete', 588, 589),
(276, 265, NULL, NULL, 'index', 576, 577),
(286, 2, NULL, NULL, 'dashboard', 25, 26),
(287, 243, NULL, NULL, 'Groups', 591, 602),
(288, 287, NULL, NULL, 'index', 592, 593),
(289, 287, NULL, NULL, 'view', 594, 595),
(290, 287, NULL, NULL, 'add', 596, 597),
(291, 287, NULL, NULL, 'edit', 598, 599),
(292, 287, NULL, NULL, 'delete', 600, 601),
(293, 1, NULL, NULL, 'Manager', 628, 751),
(294, 293, NULL, NULL, 'Users', 629, 644),
(295, 294, NULL, NULL, 'dashboard', 630, 631),
(296, 294, NULL, NULL, 'index', 632, 633),
(297, 294, NULL, NULL, 'view', 634, 635),
(298, 294, NULL, NULL, 'profile', 636, 637),
(299, 294, NULL, NULL, 'add', 638, 639),
(300, 294, NULL, NULL, 'edit', 640, 641),
(301, 294, NULL, NULL, 'delete', 642, 643),
(302, 293, NULL, NULL, 'Adrs', 645, 668),
(303, 302, NULL, NULL, 'index', 646, 647),
(304, 302, NULL, NULL, 'view', 648, 649),
(305, 302, NULL, NULL, 'add', 650, 651),
(306, 302, NULL, NULL, 'edit', 652, 653),
(307, 302, NULL, NULL, 'delete', 654, 655),
(308, 293, NULL, NULL, 'Groups', 669, 680),
(309, 308, NULL, NULL, 'index', 670, 671),
(310, 308, NULL, NULL, 'view', 672, 673),
(311, 308, NULL, NULL, 'add', 674, 675),
(312, 308, NULL, NULL, 'edit', 676, 677),
(313, 308, NULL, NULL, 'delete', 678, 679),
(314, 293, NULL, NULL, 'Saefis', 681, 704),
(315, 314, NULL, NULL, 'index', 682, 683),
(316, 314, NULL, NULL, 'view', 684, 685),
(317, 314, NULL, NULL, 'add', 686, 687),
(318, 314, NULL, NULL, 'edit', 688, 689),
(319, 314, NULL, NULL, 'delete', 690, 691),
(320, 293, NULL, NULL, 'Aefis', 705, 726),
(321, 320, NULL, NULL, 'index', 706, 707),
(322, 320, NULL, NULL, 'view', 708, 709),
(323, 320, NULL, NULL, 'add', 710, 711),
(324, 320, NULL, NULL, 'edit', 712, 713),
(325, 320, NULL, NULL, 'delete', 714, 715),
(326, 293, NULL, NULL, 'Sadrs', 727, 750),
(327, 326, NULL, NULL, 'index', 728, 729),
(328, 326, NULL, NULL, 'view', 730, 731),
(329, 326, NULL, NULL, 'add', 732, 733),
(330, 326, NULL, NULL, 'edit', 734, 735),
(331, 326, NULL, NULL, 'delete', 736, 737),
(332, 1, NULL, NULL, 'Evaluator', 752, 867),
(333, 332, NULL, NULL, 'Users', 753, 768),
(334, 333, NULL, NULL, 'dashboard', 754, 755),
(335, 333, NULL, NULL, 'index', 756, 757),
(336, 333, NULL, NULL, 'view', 758, 759),
(337, 333, NULL, NULL, 'profile', 760, 761),
(338, 333, NULL, NULL, 'add', 762, 763),
(339, 333, NULL, NULL, 'edit', 764, 765),
(340, 333, NULL, NULL, 'delete', 766, 767),
(341, 332, NULL, NULL, 'Adrs', 769, 790),
(342, 341, NULL, NULL, 'index', 770, 771),
(343, 341, NULL, NULL, 'view', 772, 773),
(344, 341, NULL, NULL, 'add', 774, 775),
(345, 341, NULL, NULL, 'edit', 776, 777),
(346, 341, NULL, NULL, 'delete', 778, 779),
(347, 332, NULL, NULL, 'Groups', 791, 802),
(348, 347, NULL, NULL, 'index', 792, 793),
(349, 347, NULL, NULL, 'view', 794, 795),
(350, 347, NULL, NULL, 'add', 796, 797),
(351, 347, NULL, NULL, 'edit', 798, 799),
(352, 347, NULL, NULL, 'delete', 800, 801),
(353, 332, NULL, NULL, 'Saefis', 803, 824),
(354, 353, NULL, NULL, 'index', 804, 805),
(355, 353, NULL, NULL, 'view', 806, 807),
(356, 353, NULL, NULL, 'add', 808, 809),
(357, 353, NULL, NULL, 'edit', 810, 811),
(358, 353, NULL, NULL, 'delete', 812, 813),
(359, 332, NULL, NULL, 'Aefis', 825, 844),
(360, 359, NULL, NULL, 'index', 826, 827),
(361, 359, NULL, NULL, 'view', 828, 829),
(362, 359, NULL, NULL, 'add', 830, 831),
(363, 359, NULL, NULL, 'edit', 832, 833),
(364, 359, NULL, NULL, 'delete', 834, 835),
(365, 332, NULL, NULL, 'Sadrs', 845, 866),
(366, 365, NULL, NULL, 'index', 846, 847),
(367, 365, NULL, NULL, 'view', 848, 849),
(368, 365, NULL, NULL, 'add', 850, 851),
(369, 365, NULL, NULL, 'edit', 852, 853),
(370, 365, NULL, NULL, 'delete', 854, 855),
(371, 1, NULL, NULL, 'Notifications', 868, 879),
(372, 371, NULL, NULL, 'index', 869, 870),
(373, 371, NULL, NULL, 'view', 871, 872),
(374, 371, NULL, NULL, 'add', 873, 874),
(375, 371, NULL, NULL, 'edit', 875, 876),
(376, 371, NULL, NULL, 'delete', 877, 878),
(377, 243, NULL, NULL, 'Messages', 603, 614),
(378, 377, NULL, NULL, 'index', 604, 605),
(379, 377, NULL, NULL, 'view', 606, 607),
(380, 377, NULL, NULL, 'add', 608, 609),
(381, 377, NULL, NULL, 'edit', 610, 611),
(382, 377, NULL, NULL, 'delete', 612, 613),
(383, 1, NULL, NULL, 'SoftDelete', 880, 881),
(384, 85, NULL, NULL, 'e2b', 195, 196),
(385, 146, NULL, NULL, 'e2b', 319, 320),
(386, 173, NULL, NULL, 'e2b', 429, 430),
(387, 231, NULL, NULL, 'e2b', 519, 520),
(389, 326, NULL, NULL, 'assignEvaluator', 738, 739),
(390, 158, NULL, NULL, 'Users', 389, 396),
(394, 390, NULL, NULL, 'register', 390, 391),
(400, 390, NULL, NULL, 'add', 392, 393),
(403, 1, NULL, NULL, 'ADmad\\JwtAuth', 882, 883),
(404, 390, NULL, NULL, 'token', 394, 395),
(405, 1, NULL, NULL, 'Reviews', 884, 895),
(406, 405, NULL, NULL, 'index', 885, 886),
(407, 405, NULL, NULL, 'view', 887, 888),
(408, 405, NULL, NULL, 'add', 889, 890),
(409, 405, NULL, NULL, 'edit', 891, 892),
(410, 405, NULL, NULL, 'delete', 893, 894),
(411, 326, NULL, NULL, 'causality', 740, 741),
(412, 326, NULL, NULL, 'requestReporter', 742, 743),
(413, 85, NULL, NULL, 'followup', 197, 198),
(415, 326, NULL, NULL, 'requestEvaluator', 744, 745),
(416, 326, NULL, NULL, 'committeeReview', 746, 747),
(417, 146, NULL, NULL, 'followup', 321, 322),
(418, 320, NULL, NULL, 'assignEvaluator', 716, 717),
(419, 320, NULL, NULL, 'requestEvaluator', 718, 719),
(420, 320, NULL, NULL, 'requestReporter', 720, 721),
(421, 320, NULL, NULL, 'committeeReview', 722, 723),
(422, 211, NULL, NULL, 'followup', 374, 375),
(423, 159, NULL, NULL, 'followup', 348, 349),
(424, 314, NULL, NULL, 'assignEvaluator', 692, 693),
(425, 314, NULL, NULL, 'requestEvaluator', 694, 695),
(426, 314, NULL, NULL, 'requestReporter', 696, 697),
(427, 314, NULL, NULL, 'committeeReview', 698, 699),
(428, 314, NULL, NULL, 'causality', 700, 701),
(429, 302, NULL, NULL, 'assignEvaluator', 656, 657),
(430, 302, NULL, NULL, 'requestEvaluator', 658, 659),
(431, 302, NULL, NULL, 'causality', 660, 661),
(432, 302, NULL, NULL, 'requestReporter', 662, 663),
(433, 302, NULL, NULL, 'committeeReview', 664, 665),
(434, 85, NULL, NULL, 'vigibase', 199, 200),
(435, 1, NULL, NULL, 'Sites', 896, 907),
(436, 435, NULL, NULL, 'index', 897, 898),
(437, 435, NULL, NULL, 'view', 899, 900),
(438, 435, NULL, NULL, 'add', 901, 902),
(439, 435, NULL, NULL, 'edit', 903, 904),
(440, 435, NULL, NULL, 'delete', 905, 906),
(441, 243, NULL, NULL, 'Sites', 615, 626),
(442, 441, NULL, NULL, 'index', 616, 617),
(443, 441, NULL, NULL, 'view', 618, 619),
(444, 441, NULL, NULL, 'add', 620, 621),
(445, 441, NULL, NULL, 'edit', 622, 623),
(446, 441, NULL, NULL, 'delete', 624, 625),
(447, 341, NULL, NULL, 'assignEvaluator', 780, 781),
(448, 341, NULL, NULL, 'requestEvaluator', 782, 783),
(449, 341, NULL, NULL, 'causality', 784, 785),
(450, 341, NULL, NULL, 'requestReporter', 786, 787),
(451, 341, NULL, NULL, 'committeeReview', 788, 789),
(452, 353, NULL, NULL, 'assignEvaluator', 814, 815),
(453, 353, NULL, NULL, 'requestEvaluator', 816, 817),
(454, 353, NULL, NULL, 'causality', 818, 819),
(455, 353, NULL, NULL, 'requestReporter', 820, 821),
(456, 353, NULL, NULL, 'committeeReview', 822, 823),
(457, 359, NULL, NULL, 'assignEvaluator', 836, 837),
(458, 359, NULL, NULL, 'requestEvaluator', 838, 839),
(459, 359, NULL, NULL, 'requestReporter', 840, 841),
(460, 359, NULL, NULL, 'committeeReview', 842, 843),
(461, 365, NULL, NULL, 'assignEvaluator', 856, 857),
(462, 365, NULL, NULL, 'causality', 858, 859),
(463, 365, NULL, NULL, 'requestReporter', 860, 861),
(464, 365, NULL, NULL, 'requestEvaluator', 862, 863),
(465, 365, NULL, NULL, 'committeeReview', 864, 865),
(466, 158, NULL, NULL, 'Sites', 397, 400),
(467, 466, NULL, NULL, 'view', 398, 399),
(468, 1, NULL, NULL, 'Facilities', 908, 923),
(469, 468, NULL, NULL, 'facilityName', 909, 910),
(470, 468, NULL, NULL, 'facilityCode', 911, 912),
(471, 468, NULL, NULL, 'index', 913, 914),
(472, 468, NULL, NULL, 'view', 915, 916),
(473, 468, NULL, NULL, 'add', 917, 918),
(474, 468, NULL, NULL, 'edit', 919, 920),
(475, 468, NULL, NULL, 'delete', 921, 922),
(476, 2, NULL, NULL, 'forgotPassword', 27, 28),
(477, 2, NULL, NULL, 'resetPassword', 29, 30),
(478, 41, NULL, NULL, 'drugName', 105, 106),
(479, 244, NULL, NULL, 'deactivate', 538, 539),
(480, 244, NULL, NULL, 'activate', 540, 541),
(481, 1, NULL, NULL, 'CsvView', 924, 925),
(482, 1, NULL, NULL, 'Search', 926, 927),
(483, 326, NULL, NULL, 'archive', 748, 749),
(484, 302, NULL, NULL, 'archive', 666, 667),
(485, 314, NULL, NULL, 'archive', 702, 703),
(486, 320, NULL, NULL, 'archive', 724, 725);

-- --------------------------------------------------------

--
-- Table structure for table `adrs`
--

CREATE TABLE `adrs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `adr_id` varchar(255) DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `assigned_date` datetime DEFAULT NULL,
  `mrcz_protocol_number` varchar(255) DEFAULT NULL,
  `mcaz_protocol_number` varchar(255) DEFAULT NULL,
  `principal_investigator` varchar(255) DEFAULT NULL,
  `reporter_name` varchar(100) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `reporter_phone` varchar(100) DEFAULT NULL,
  `name_of_institution` varchar(100) DEFAULT NULL,
  `institution_code` varchar(100) DEFAULT NULL,
  `study_title` varchar(255) DEFAULT NULL,
  `study_sponsor` varchar(255) DEFAULT NULL,
  `date_of_adverse_event` date DEFAULT NULL,
  `participant_number` varchar(255) DEFAULT NULL,
  `report_type` varchar(255) DEFAULT NULL,
  `date_of_site_awareness` date DEFAULT NULL,
  `date_of_birth` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(17) DEFAULT NULL,
  `study_week` varchar(55) DEFAULT NULL,
  `visit_number` varchar(55) DEFAULT NULL,
  `adverse_event_type` varchar(55) DEFAULT NULL,
  `sae_type` varchar(255) DEFAULT NULL,
  `sae_description` text,
  `toxicity_grade` varchar(55) DEFAULT NULL,
  `previous_events` varchar(55) DEFAULT NULL,
  `previous_events_number` varchar(55) DEFAULT NULL,
  `total_saes` varchar(55) DEFAULT NULL,
  `location_event` varchar(55) DEFAULT NULL,
  `location_event_specify` text,
  `research_involves` varchar(55) DEFAULT NULL,
  `research_involves_specify` text,
  `name_of_drug` text,
  `drug_investigational` varchar(55) DEFAULT NULL,
  `patient_other_drug` varchar(55) DEFAULT NULL,
  `report_to_mcaz` varchar(55) DEFAULT NULL,
  `report_to_mcaz_date` date DEFAULT NULL,
  `report_to_mrcz` varchar(55) DEFAULT NULL,
  `report_to_mrcz_date` date DEFAULT NULL,
  `report_to_sponsor` varchar(55) DEFAULT NULL,
  `report_to_sponsor_date` date DEFAULT NULL,
  `report_to_irb` varchar(55) DEFAULT NULL,
  `report_to_irb_date` date DEFAULT NULL,
  `medical_history` text,
  `diagnosis` text,
  `immediate_cause` text,
  `symptoms` text,
  `investigations` text,
  `results` text,
  `management` text,
  `outcome` text,
  `d1_consent_form` varchar(55) DEFAULT NULL,
  `d2_brochure` varchar(55) DEFAULT NULL,
  `d3_changes_sae` varchar(55) DEFAULT NULL,
  `d4_consent_sae` varchar(55) DEFAULT NULL,
  `changes_explain` text,
  `assess_risk` varchar(55) DEFAULT NULL,
  `submitted` int(2) DEFAULT '0',
  `submitted_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'UnSubmitted',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adrs`
--

INSERT INTO `adrs` (`id`, `user_id`, `adr_id`, `reference_number`, `assigned_to`, `assigned_by`, `assigned_date`, `mrcz_protocol_number`, `mcaz_protocol_number`, `principal_investigator`, `reporter_name`, `reporter_email`, `designation_id`, `reporter_phone`, `name_of_institution`, `institution_code`, `study_title`, `study_sponsor`, `date_of_adverse_event`, `participant_number`, `report_type`, `date_of_site_awareness`, `date_of_birth`, `age`, `gender`, `study_week`, `visit_number`, `adverse_event_type`, `sae_type`, `sae_description`, `toxicity_grade`, `previous_events`, `previous_events_number`, `total_saes`, `location_event`, `location_event_specify`, `research_involves`, `research_involves_specify`, `name_of_drug`, `drug_investigational`, `patient_other_drug`, `report_to_mcaz`, `report_to_mcaz_date`, `report_to_mrcz`, `report_to_mrcz_date`, `report_to_sponsor`, `report_to_sponsor_date`, `report_to_irb`, `report_to_irb_date`, `medical_history`, `diagnosis`, `immediate_cause`, `symptoms`, `investigations`, `results`, `management`, `outcome`, `d1_consent_form`, `d2_brochure`, `d3_changes_sae`, `d4_consent_sae`, `changes_explain`, `assess_risk`, `submitted`, `submitted_date`, `status`, `created`, `modified`, `deleted`) VALUES
(1, 3, NULL, 'SAE1/2017', 12, 2, '2017-12-18 23:56:27', '2255', '3212', 'PI numero uno', 'Edward', 'eddieokemwa@gmail.com', 2, '254729932475', 'Kenyatta National Hospital', '001', 'Big study', 'GSK', '2008-11-12', '225', 'Initial', '2017-06-08', '09-11-2017', NULL, 'Male', '33', '2', 'SAE', 'Life-threatening (an actual risk of death at the time of the event).', 'None to specify', 'Grade 3', 'No', '22', '4', 'Other, specify', 'specified here', 'Drug', 'specified research involves', 'sijui', 'Yes', '', 'Yes', '2017-11-01', 'No', '2017-11-02', 'No', '2017-11-03', 'Yes', '2017-11-07', 'Medical history', 'alikua mgongjwa', 'hatujatambua', 'coughing', 'none so far', 'Coco di rahh', 'Alpha blondy', 'tereree', 'Yes', 'No', 'N/A', 'No', 'Explanation required', 'Yes', 2, '2017-12-18', 'Approved', '2017-11-09 16:45:27', '2017-12-19 00:01:19', NULL),
(2, NULL, NULL, 'SAE2/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eddieokemwa@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2017-11-29 15:00:21', '2017-11-29 15:00:21', NULL),
(3, NULL, NULL, 'SAE3/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eddieokemwa@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2017-12-08 00:47:46', '2017-12-08 00:47:46', '2018-01-07 22:00:44'),
(4, 3, NULL, 'SAE4/2017', NULL, NULL, NULL, '2255', '3212', 'PI numero uno', 'Gi', 'eddieokemwa@gmail.com', 5, '', 'Kenyatta National Hospital', 'but more', 'Big study', 'GSK', '2017-12-01', '225', 'Initial', '2017-12-01', '14-10-2004', NULL, 'Male', '33', '2', 'SAE', 'Life-threatening (an actual risk of death at the time of the event).', 'asdfas asfa ', 'Grade 4', 'Yes', '22', '4', 'Clinic/Hospital', 'asfasfdasfd', 'Procedure', 'asdfasfd', 'asfasfdasfd', 'Yes', 'Yes', 'Yes', '2017-12-02', 'No', '2017-12-01', 'Yes', '2017-12-05', 'Yes', '2017-12-01', 'asdf asfd saf ', 'da sdf', ' asdfas fa', 'sfas ', 'asfsa f', 'asf a', 'asdf a', 'asdf sa f', 'No', 'Yes', 'N/A', 'Yes', 'sdfsadf asdf adf', 'Yes', 1, NULL, NULL, '2017-12-08 00:50:18', '2017-12-12 09:28:51', NULL),
(6, 16, NULL, 'SAE6/2018', NULL, NULL, NULL, NULL, NULL, NULL, 'reporter', 'eddyokemwa@gmail.com', 5, '0729932475', NULL, 'bu Bulawayo Maternal Health Clinic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'UnSubmitted', '2018-01-03 02:00:17', '2018-01-03 02:00:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adr_lab_tests`
--

CREATE TABLE `adr_lab_tests` (
  `id` int(11) NOT NULL,
  `adr_id` int(11) DEFAULT NULL,
  `lab_test` varchar(100) DEFAULT NULL,
  `abnormal_result` varchar(100) DEFAULT NULL,
  `site_normal_range` varchar(100) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `lab_value` varchar(100) DEFAULT NULL,
  `lab_value_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adr_lab_tests`
--

INSERT INTO `adr_lab_tests` (`id`, `adr_id`, `lab_test`, `abnormal_result`, `site_normal_range`, `collection_date`, `lab_value`, `lab_value_date`, `created`, `modified`) VALUES
(1, 1, 'Test 1', 'How can we tell', '22', '2017-11-09', 'this one de', '2017-11-01', '2017-11-12 13:20:19', '2017-11-12 13:20:19'),
(2, 1, 'Test 2', 'Test 2', '303', '2017-11-08', 'zion IC', '2017-11-10', '2017-11-12 13:20:19', '2017-11-12 13:20:19'),
(3, 1, '', '', '', NULL, '', NULL, '2017-11-13 21:18:52', '2017-11-13 21:18:52'),
(4, 4, 'Test 1', 'How can we tell', '22', '2017-12-01', 'asfdas f a', '2017-12-07', '2017-12-12 09:28:51', '2017-12-12 09:28:51'),
(5, 4, 'Test 2', 'Test 2', '303', '2017-12-01', 'zion IC', '2017-12-01', '2017-12-12 09:28:51', '2017-12-12 09:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `adr_list_of_drugs`
--

CREATE TABLE `adr_list_of_drugs` (
  `id` int(11) NOT NULL,
  `adr_id` int(11) DEFAULT NULL,
  `drug_name` varchar(100) DEFAULT NULL,
  `dosage` varchar(100) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  `frequency_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `stop_date` date DEFAULT NULL,
  `taking_drug` varchar(100) DEFAULT NULL,
  `relationship_to_sae` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adr_list_of_drugs`
--

INSERT INTO `adr_list_of_drugs` (`id`, `adr_id`, `drug_name`, `dosage`, `dose_id`, `route_id`, `frequency_id`, `start_date`, `stop_date`, `taking_drug`, `relationship_to_sae`, `created`, `modified`) VALUES
(1, 1, 'Devices 1', '2', 5, 3, 3, '2017-11-01', NULL, 'Yes', 'Possibly related', '2017-11-12 12:09:39', '2017-11-12 12:09:39'),
(3, 1, 'Devices 3 ', '35', 4, 3, 3, '2017-11-01', NULL, 'Yes', 'Possibly related', '2017-11-12 12:18:51', '2017-11-12 12:18:51'),
(4, 4, 'Devices 1', '2', 17, 23, 5, '2017-12-01', NULL, 'Yes', 'Possibly related', '2017-12-12 09:28:51', '2017-12-12 09:28:51'),
(5, 4, 'Devices 2', '3', 7, 37, 5, '2017-12-01', NULL, 'No', 'Not related', '2017-12-12 09:28:51', '2017-12-12 09:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `adr_other_drugs`
--

CREATE TABLE `adr_other_drugs` (
  `id` int(11) NOT NULL,
  `adr_id` int(11) DEFAULT NULL,
  `drug_name` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `stop_date` date DEFAULT NULL,
  `relationship_to_sae` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adr_other_drugs`
--

INSERT INTO `adr_other_drugs` (`id`, `adr_id`, `drug_name`, `start_date`, `stop_date`, `relationship_to_sae`, `created`, `modified`) VALUES
(1, 1, 'Miti ni dawa', '2017-11-01', '2017-11-09', 'Not related', '2017-11-12 12:24:44', '2017-11-12 12:24:44'),
(2, 4, 'Miti ni dawa', '2017-12-01', '2017-12-09', 'Definitely related', '2017-12-12 09:28:51', '2017-12-12 09:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `aefis`
--

CREATE TABLE `aefis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `aefi_id` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `assigned_date` datetime DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_surname` varchar(255) DEFAULT NULL,
  `patient_next_of_kin` varchar(255) DEFAULT NULL,
  `patient_address` varchar(255) DEFAULT NULL,
  `patient_telephone` varchar(255) DEFAULT NULL,
  `report_type` varchar(20) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `date_of_birth` varchar(20) DEFAULT NULL,
  `age_at_onset` varchar(20) DEFAULT NULL,
  `age_at_onset_years` int(11) DEFAULT NULL,
  `age_at_onset_months` int(11) DEFAULT NULL,
  `age_at_onset_days` int(11) DEFAULT NULL,
  `age_at_onset_specify` int(11) DEFAULT NULL,
  `reporter_name` varchar(100) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `reporter_department` varchar(100) DEFAULT NULL,
  `reporter_address` varchar(100) DEFAULT NULL,
  `reporter_institution` varchar(255) DEFAULT NULL,
  `reporter_district` varchar(100) DEFAULT NULL,
  `reporter_province` varchar(100) DEFAULT NULL,
  `reporter_phone` varchar(100) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `name_of_vaccination_center` varchar(200) DEFAULT NULL,
  `adverse_events` varchar(100) DEFAULT NULL,
  `ae_severe_local_reaction` int(2) DEFAULT NULL,
  `ae_seizures` int(2) DEFAULT NULL,
  `ae_abscess` int(2) DEFAULT NULL,
  `ae_sepsis` int(2) DEFAULT NULL,
  `ae_encephalopathy` int(2) DEFAULT NULL,
  `ae_toxic_shock` int(2) DEFAULT NULL,
  `ae_thrombocytopenia` int(2) DEFAULT NULL,
  `ae_anaphylaxis` int(2) DEFAULT NULL,
  `ae_fever` int(2) DEFAULT NULL,
  `ae_3days` int(2) DEFAULT NULL,
  `ae_febrile` int(2) DEFAULT NULL,
  `ae_beyond_joint` int(2) DEFAULT NULL,
  `ae_afebrile` int(2) DEFAULT NULL,
  `ae_other` int(2) DEFAULT NULL,
  `adverse_events_specify` text,
  `aefi_date` datetime DEFAULT NULL,
  `notification_date` date DEFAULT NULL,
  `description_of_reaction` text,
  `treatment_provided` varchar(100) DEFAULT NULL,
  `serious` varchar(10) DEFAULT NULL,
  `serious_yes` varchar(200) DEFAULT NULL,
  `outcome` varchar(100) DEFAULT NULL,
  `died_date` date DEFAULT NULL,
  `autopsy` varchar(100) DEFAULT NULL,
  `past_medical_history` text,
  `district_receive_date` date DEFAULT NULL,
  `investigation_needed` varchar(10) DEFAULT NULL,
  `investigation_date` date DEFAULT NULL,
  `national_receive_date` date DEFAULT NULL,
  `comments` text,
  `submitted` int(2) DEFAULT '0',
  `submitted_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'UnSubmitted',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aefis`
--

INSERT INTO `aefis` (`id`, `user_id`, `aefi_id`, `province_id`, `reference_number`, `assigned_to`, `assigned_by`, `assigned_date`, `patient_name`, `patient_surname`, `patient_next_of_kin`, `patient_address`, `patient_telephone`, `report_type`, `gender`, `date_of_birth`, `age_at_onset`, `age_at_onset_years`, `age_at_onset_months`, `age_at_onset_days`, `age_at_onset_specify`, `reporter_name`, `designation_id`, `reporter_department`, `reporter_address`, `reporter_institution`, `reporter_district`, `reporter_province`, `reporter_phone`, `reporter_email`, `name_of_vaccination_center`, `adverse_events`, `ae_severe_local_reaction`, `ae_seizures`, `ae_abscess`, `ae_sepsis`, `ae_encephalopathy`, `ae_toxic_shock`, `ae_thrombocytopenia`, `ae_anaphylaxis`, `ae_fever`, `ae_3days`, `ae_febrile`, `ae_beyond_joint`, `ae_afebrile`, `ae_other`, `adverse_events_specify`, `aefi_date`, `notification_date`, `description_of_reaction`, `treatment_provided`, `serious`, `serious_yes`, `outcome`, `died_date`, `autopsy`, `past_medical_history`, `district_receive_date`, `investigation_needed`, `investigation_date`, `national_receive_date`, `comments`, `submitted`, `submitted_date`, `status`, `created`, `modified`, `deleted`) VALUES
(1, 3, NULL, NULL, 'AEFI1/2017', 12, 2, '2017-12-18 00:22:03', 'Justin', 'dida', 'ba bwaki yo wapi', '785', '741125', NULL, 'Female', '--2015', 'Months', 5, 2, 3, 45, 'Edward', 2, 'pharmacy', '7554', NULL, 'Namulongo', 'Entebbe', '254729932475', 'eddieokemwa@gmail.com', 'Namugongo PMCT Center', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'specified other', '2017-11-03 12:34:00', '2017-11-02', 'Kichwa nauma', 'Yes', 'Yes', 'Death', 'Recovering', '2008-11-05', 'Unknown', 'We suspect something here', '2008-11-06', 'Yes', '2018-03-16', '2017-06-08', 'Criticial out deh', 1, '2017-12-17', 'RequestEvaluator', '2017-11-11 07:55:59', '2017-12-18 01:18:53', NULL),
(2, 3, NULL, 2, 'AEFI2/2017', NULL, NULL, NULL, 'Justin', 'dida', 'ba bwaki yo wapi', '785', '741125', NULL, 'Male', '15-10-2003', 'Years', NULL, NULL, NULL, 55, 'Edward', 1, 'pharmacy', '7554', NULL, 'Namulongo', NULL, '0729932475', 'eddyokemwa@gmail.com', 'Namugongo PMCT Center', NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'asfasfdafd', '2017-07-12 09:21:00', '2017-12-01', 'you should put more effort into entering some pretty long text here.....', 'Yes', 'No', 'Hospitalization', 'Recovered', '2017-12-01', 'No', 'safdasdfa', '2017-12-01', 'Yes', '2017-12-01', '2017-12-01', 'asfasdasfd', 2, '2017-12-16', 'Archived', '2017-11-23 00:51:20', '2017-12-18 01:07:07', NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JMM', 's', 's', 's', 's', NULL, 'Male', '4-2-2016', 's', NULL, NULL, NULL, NULL, 's', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ss', 'ae_seizures,ae-thrombocytopenia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-21', 'ss', NULL, 'Yes', 'Hospitalizaion/Prolonged', 'Recovering', NULL, 'No', 'ss', '2017-10-01', 'Yes', '2017-10-13', '2017-10-20', 'sss', 0, NULL, NULL, '2017-12-06 09:46:35', '2017-12-06 09:46:35', '2018-01-07 21:58:09'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JMM', 's', 's', 's', 's', NULL, 'Male', '4-2-2016', 's', NULL, NULL, NULL, NULL, 's', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ss', 'ae_seizures,ae-thrombocytopenia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-21', 'ss', NULL, 'Yes', 'Hospitalizaion/Prolonged', 'Recovering', NULL, 'No', 'ss', '2017-10-01', 'Yes', '2017-10-13', '2017-10-20', 'sss', 0, NULL, NULL, '2017-12-06 09:48:25', '2017-12-06 09:48:25', NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'JMM', 's', 's', 's', 's', NULL, 'Male', '4-2-2016', 's', NULL, NULL, NULL, NULL, 's', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ss', 'ae_seizures,ae-thrombocytopenia', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-10-21', 'ss', NULL, 'Yes', 'Hospitalizaion/Prolonged', 'Recovering', NULL, 'No', 'ss', '2017-10-01', 'Yes', '2017-10-13', '2017-10-20', 'sss', 0, NULL, NULL, '2017-12-06 09:55:15', '2017-12-06 09:55:15', NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, 'John', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2017-12-06 09:57:07', '2017-12-06 09:57:07', NULL),
(7, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FollowUp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'list of vaccine', '2016-12-17 03:43:00', '2017-12-01', 'asfdadfadsfa', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2017-12-17', 'UnSubmitted', '2017-12-17 00:44:13', '2017-12-17 01:01:59', NULL),
(8, 3, NULL, NULL, 'AEFI8/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eddyokemwa@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'UnSubmitted', '2017-12-17 23:03:41', '2017-12-17 23:03:41', '2018-01-07 13:13:34'),
(9, 16, NULL, NULL, 'AEFI9/2018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'reporter', 5, NULL, 'kazi moto', NULL, NULL, NULL, '0729932475', 'eddyokemwa@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'UnSubmitted', '2018-01-03 01:59:53', '2018-01-03 01:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aefi_list_of_diluents`
--

CREATE TABLE `aefi_list_of_diluents` (
  `id` int(11) NOT NULL,
  `aefi_id` int(11) DEFAULT NULL,
  `diluent_name` varchar(100) DEFAULT NULL,
  `diluent_date` datetime DEFAULT NULL,
  `batch_number` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aefi_list_of_diluents`
--

INSERT INTO `aefi_list_of_diluents` (`id`, `aefi_id`, `diluent_name`, `diluent_date`, `batch_number`, `expiry_date`, `created`, `modified`) VALUES
(1, 1, 'Diluent 1', '2017-11-03 11:02:00', '22', '2017-11-01', '2017-11-11 07:13:56', '2017-11-11 07:13:56'),
(3, 1, 'Diluent 3 ', '2017-11-01 10:14:00', '22', '2017-11-01', '2017-11-11 07:15:01', '2017-11-11 07:15:01'),
(4, 3, 'sss', NULL, 'ss', '2017-10-15', '2017-12-06 09:46:35', '2017-12-06 09:46:35'),
(5, 4, 'sss', NULL, 'ss', '2017-10-15', '2017-12-06 09:48:25', '2017-12-06 09:48:25'),
(6, 5, 'sss', NULL, 'ss', '2017-10-15', '2017-12-06 09:55:15', '2017-12-06 09:55:15'),
(7, 2, 'Diluent 1', '2017-11-03 11:02:00', '22', '2017-12-01', '2017-12-12 08:21:51', '2017-12-12 08:21:51'),
(8, 2, 'Diluent 2', '2017-12-01 08:22:00', '55', '2008-12-05', '2017-12-12 08:22:21', '2017-12-12 08:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `aefi_list_of_vaccines`
--

CREATE TABLE `aefi_list_of_vaccines` (
  `id` int(11) NOT NULL,
  `aefi_id` int(11) DEFAULT NULL,
  `vaccine_name` varchar(100) DEFAULT NULL,
  `vaccination_date` datetime DEFAULT NULL,
  `vaccination_time` varchar(15) DEFAULT NULL,
  `dosage` varchar(255) DEFAULT NULL,
  `batch_number` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `diluent_batch_number` varchar(55) DEFAULT NULL,
  `diluent_date` datetime DEFAULT NULL,
  `diluent_expiry_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aefi_list_of_vaccines`
--

INSERT INTO `aefi_list_of_vaccines` (`id`, `aefi_id`, `vaccine_name`, `vaccination_date`, `vaccination_time`, `dosage`, `batch_number`, `expiry_date`, `diluent_batch_number`, `diluent_date`, `diluent_expiry_date`, `created`, `modified`) VALUES
(1, 1, 'militant', '2017-11-03 15:19:00', NULL, '1st', '55', '2017-11-10', '', NULL, NULL, '2017-11-10 09:32:08', '2017-12-17 20:55:31'),
(3, 1, 'Jose', '2017-11-03 15:19:00', NULL, '3rd', '55', '2017-11-09', '', NULL, NULL, '2017-11-10 09:47:00', '2017-12-17 20:55:31'),
(4, 1, 'ka', '2017-11-10 18:31:00', NULL, '22', '55', '2017-11-01', '', NULL, NULL, '2017-11-10 11:31:47', '2017-12-17 20:55:31'),
(5, 3, 'ss', NULL, NULL, 's', 'ss', '2017-10-22', NULL, NULL, NULL, '2017-12-06 09:46:35', '2017-12-06 09:46:35'),
(6, 4, 'ss', NULL, NULL, 's', 'ss', '2017-10-22', NULL, NULL, NULL, '2017-12-06 09:48:25', '2017-12-06 09:48:25'),
(7, 5, 'ss', NULL, NULL, 's', 'ss', '2017-10-22', NULL, NULL, NULL, '2017-12-06 09:55:15', '2017-12-06 09:55:15'),
(8, 2, 'militant', '2011-11-02 15:20:00', NULL, '1st', '55', '2017-12-01', '10', '2017-12-16 20:16:00', '2017-12-02', '2017-12-12 08:21:51', '2017-12-16 19:16:24'),
(9, 2, 'Vive', '2017-07-06 17:20:00', NULL, '2nd', '200', '2008-01-08', '5', '2017-12-16 20:16:00', '2017-12-04', '2017-12-12 08:21:51', '2017-12-16 19:16:24'),
(10, 2, 'above', '2017-12-09 20:19:00', NULL, '3rd', '22', '2017-12-07', '3', '2017-12-16 20:20:00', '2017-12-08', '2017-12-16 19:19:33', '2017-12-16 19:20:04'),
(11, 7, 'follow up list', '2017-12-01 03:41:00', NULL, '2', '55', '2017-12-09', '10', '2017-12-17 01:42:00', '2017-12-06', '2017-12-17 00:44:13', '2017-12-17 00:44:13'),
(12, 7, 'Vive', '2017-11-01 16:19:00', NULL, '2nd', '200', '2012-12-07', '5', '2017-12-17 03:42:00', '2008-12-04', '2017-12-17 00:44:13', '2017-12-17 00:44:13'),
(13, 7, 'follow up list', '2017-12-01 03:41:00', NULL, '2', '55', '2017-12-09', '10', '2017-12-17 01:42:00', '2017-12-06', '2017-12-17 01:01:59', '2017-12-17 01:01:59'),
(14, 7, 'Vive', '2017-11-01 16:19:00', NULL, '2nd', '200', '2012-12-07', '5', '2017-12-17 03:42:00', '2008-12-04', '2017-12-17 01:01:59', '2017-12-17 01:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE `aros` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(2, NULL, 'Groups', 1, NULL, 1, 4),
(3, NULL, 'Groups', 2, NULL, 5, 10),
(4, NULL, 'Groups', 3, NULL, 11, 36),
(5, 2, 'Users', 1, NULL, 2, 3),
(6, 3, 'Users', 2, NULL, 6, 7),
(7, 4, 'Users', 3, NULL, 12, 13),
(8, 4, 'Users', 4, NULL, 14, 15),
(9, 4, 'Users', 5, NULL, 16, 17),
(10, 4, 'Users', 6, NULL, 18, 19),
(11, 4, 'Users', 7, NULL, 20, 21),
(12, 4, 'Users', 8, NULL, 22, 23),
(13, 4, 'Users', 9, NULL, 24, 25),
(14, 3, 'Users', 10, NULL, 8, 9),
(15, NULL, 'Groups', 4, NULL, 37, 42),
(16, 15, 'Users', 11, NULL, 38, 39),
(17, 15, 'Users', 12, NULL, 40, 41),
(18, 4, 'Users', 13, NULL, 26, 27),
(19, 4, 'Users', 14, NULL, 28, 29),
(20, 4, 'Users', 15, NULL, 30, 31),
(21, 4, 'Users', 16, NULL, 32, 33),
(22, 4, 'Users', 17, NULL, 34, 35);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE `aros_acos` (
  `id` int(11) NOT NULL,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 2, 1, '1', '1', '1', '1'),
(2, 3, 1, '1', '1', '1', '1'),
(3, 4, 145, '1', '1', '1', '1'),
(4, 4, 88, '1', '1', '1', '1'),
(5, 4, 87, '1', '1', '1', '1'),
(6, 4, 89, '1', '1', '1', '1'),
(7, 4, 149, '1', '1', '1', '1'),
(8, 4, 150, '1', '1', '1', '1'),
(9, 4, 148, '1', '1', '1', '1'),
(10, 4, 176, '1', '1', '1', '1'),
(11, 4, 177, '1', '1', '1', '1'),
(12, 4, 175, '1', '1', '1', '1'),
(13, 4, 72, '1', '1', '1', '1'),
(14, 4, 157, '1', '1', '1', '1'),
(15, 4, 196, '1', '1', '1', '1'),
(16, 4, 202, '1', '1', '1', '1'),
(17, 4, 172, '1', '1', '1', '1'),
(18, 4, 184, '1', '1', '1', '1'),
(19, 4, 203, '1', '1', '1', '1'),
(20, 4, 234, '1', '1', '1', '1'),
(21, 4, 235, '1', '1', '1', '1'),
(22, 4, 233, '1', '1', '1', '1'),
(23, 4, 230, '1', '1', '1', '1'),
(24, 4, 286, '1', '1', '1', '1'),
(25, 15, 1, '1', '1', '1', '1'),
(26, 3, 326, '1', '1', '1', '1'),
(27, 4, 376, '1', '1', '1', '1'),
(28, 4, 413, '1', '1', '1', '1'),
(29, 4, 417, '1', '1', '1', '1'),
(30, 4, 8, '1', '1', '1', '1'),
(31, 4, 147, '1', '1', '1', '1'),
(32, 4, 232, '1', '1', '1', '1'),
(33, 4, 174, '1', '1', '1', '1'),
(34, 4, 86, '1', '1', '1', '1'),
(35, 4, 151, '1', '1', '1', '1'),
(36, 4, 236, '1', '1', '1', '1'),
(37, 4, 178, '1', '1', '1', '1'),
(38, 4, 90, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `foreign_key`, `file`, `dir`, `size`, `type`, `model`, `category`, `description`, `created`, `modified`) VALUES
(1, 3, 'DSC_1145.jpg', 'webroot/files/Attachments/file/', '106704', 'image/jpeg', 'Sadrs', 'attachments', 'asfa', '2017-11-13 19:58:54', '2017-12-06 01:29:14'),
(2, 3, 'DSC_1007.jpg', 'webroot/files/Attachments/file/', '138255', 'image/jpeg', 'Sadrs', 'attachments', 'batch this', '2017-11-13 20:22:13', '2017-12-06 01:29:14'),
(3, 3, 'DSC_0815.jpg', 'webroot/files/Attachments/file/', '266055', 'image/jpeg', 'Sadrs', 'attachments', 'Kadenge', '2017-11-13 20:24:09', '2017-12-06 01:29:14'),
(4, 1, 'DSC_0939.jpg', 'webroot/files/Attachments/file/', '138338', 'image/jpeg', 'Aefis', 'attachments', 'File ya ADR', '2017-11-13 21:13:06', '2017-12-18 01:18:53'),
(5, 1, 'sadr.png', 'webroot/files/Attachments/file/', '206820', 'image/png', 'Adrs', 'attachments', '51', '2017-11-13 21:27:05', '2017-12-18 22:42:28'),
(6, 1, 'view.png', 'webroot/files/Reports/file/', '54123', 'image/png', 'Saefis', 'reports', NULL, '2017-11-25 21:29:14', '2017-11-25 21:29:14'),
(7, 1, 'get_sadr.png', 'webroot/files/Attachments/file/', '695113', 'image/png', 'Saefis', 'attachments', 'A good file', '2017-11-25 21:32:03', '2017-11-25 21:33:33'),
(8, 2, 'view.json', 'webroot/files/Attachments/file/', '3426', 'application/json', 'Aefis', 'attachments', 'assa  asdf asdf ', '2017-12-01 10:13:58', '2017-12-16 20:34:36'),
(15, 38, 'faustina', 'webroot/files/Attachments/file/', '943', 'image/png', 'Sadrs', NULL, 'Ajax save file ', '2017-12-04 20:44:20', '2017-12-04 20:44:20'),
(16, 39, 'faustina', 'webroot/files/Attachments/file/', '943', 'image/png', 'Sadrs', 'attachments', 'Ajax save file ', '2017-12-04 21:10:01', '2017-12-04 21:10:01'),
(17, 40, 'faustina', 'webroot/files/Attachments/file/', '943', 'image/png', 'Sadrs', 'attachments', 'Ajax save file ', '2017-12-05 18:29:35', '2017-12-05 18:29:35'),
(18, 41, 'sample.txt', 'webroot/files/Attachments/file/', '21', 'text/plain', 'Sadrs', 'attachments', NULL, '2017-12-05 18:31:33', '2017-12-05 18:31:33'),
(19, 42, 'sample.txt', 'webroot/files/Attachments/file/', '21', 'text/plain', 'Sadrs', 'attachments', NULL, '2017-12-05 18:33:13', '2017-12-05 18:33:13'),
(20, 43, 'sample.txt', 'webroot/files/Attachments/file/', '21', 'text/plain', 'Sadrs', 'attachments', NULL, '2017-12-05 18:38:54', '2017-12-05 18:38:54'),
(21, 44, 'sample.txt', 'webroot/files/Attachments/file/', '21', 'text/plain', 'Sadrs', 'attachments', NULL, '2017-12-05 18:39:37', '2017-12-05 18:39:37'),
(22, 45, 'sample.txt', 'webroot/files/Attachments/file/', '21', 'text/plain', 'Sadrs', 'attachments', NULL, '2017-12-05 18:43:28', '2017-12-05 18:43:28'),
(23, 46, 'sample.txt', 'webroot/files/Attachments/file/', '21', 'text/plain', 'Sadrs', 'attachments', NULL, '2017-12-05 18:46:38', '2017-12-05 18:46:38'),
(24, 47, 'sample.txt', 'webroot/files/Attachments/file/', '21', 'text/plain', 'Sadrs', 'attachments', NULL, '2017-12-05 18:47:08', '2017-12-05 18:47:08'),
(25, 48, 'sample.txt', 'webroot/files/Attachments/file/', '21', 'text/plain', 'Sadrs', 'attachments', NULL, '2017-12-05 18:49:07', '2017-12-05 18:49:07'),
(26, 49, 'sample.txt', 'webroot/files/Attachments/file/', '21', 'text/plain', 'Sadrs', 'attachments', NULL, '2017-12-05 18:50:17', '2017-12-05 18:50:17'),
(27, 50, 'sample.txt', 'webroot/files/Attachments/file/', '21', 'text/plain', 'Sadrs', 'attachments', NULL, '2017-12-05 18:52:12', '2017-12-05 18:52:12'),
(28, 51, 'sample.txt', 'webroot/files/Attachments/file/', '21', 'text/plain', 'Sadrs', 'attachments', NULL, '2017-12-05 18:56:43', '2017-12-05 18:56:43'),
(29, 52, 'sample.txt', 'webroot/files/Attachments/file/', '21', 'text/plain', 'Sadrs', 'attachments', NULL, '2017-12-05 18:59:07', '2017-12-05 18:59:07'),
(30, 53, 'faustina', 'webroot/files/Attachments/file/', '942', 'image/png', 'Sadrs', 'attachments', 'Ajax save file ', '2017-12-08 17:15:29', '2017-12-08 17:15:29'),
(32, 55, '5a2acafb704cc-faustina', 'webroot/files/Attachments/file/', '943', 'image/png', 'Sadrs', 'attachments', 'Ajax save file ', '2017-12-08 17:25:15', '2017-12-08 17:25:15'),
(33, 56, '5a2acb2f72a4c-faustina', 'webroot/files/Attachments/file/', '943', 'image/png', 'Sadrs', 'attachments', 'Ajax save file ', '2017-12-08 17:26:07', '2017-12-08 17:26:07'),
(34, 57, '5a2acb987b223-faustina', 'webroot/files/Attachments/file/', '943', 'image/png', 'Sadrs', 'attachments', 'Ajax save file ', '2017-12-08 17:27:52', '2017-12-08 17:27:52'),
(35, 29, 'new_sadr.png', 'webroot/files/Attachments/file/', '44098', 'image/png', 'Sadrs', 'attachments', 'Something special', '2017-12-12 08:03:42', '2017-12-12 08:08:45'),
(36, 4, 'new_sadr.png', 'webroot/files/Attachments/file/', '44098', 'image/png', 'Adrs', 'attachments', 'asfasasf', '2017-12-12 09:28:51', '2017-12-12 09:28:51'),
(37, 4, 'get_sadr', 'webroot/files/Attachments/file/', '825081', 'application/octet-stream', 'Adrs', 'attachments', 'asfsa fsa fsaf ', '2017-12-12 09:28:51', '2017-12-12 09:28:51'),
(38, 28, 'edit.json', 'webroot/files/Attachments/file/', '3604', 'application/json', 'Sadrs', 'attachments', 'Kidude', '2017-12-15 15:04:56', '2018-01-01 12:57:02'),
(39, 60, 'access-with-token.png', 'webroot/files/Attachments/file/', '49538', 'image/png', 'Sadrs', 'attachments', 'access with token', '2017-12-15 15:07:23', '2017-12-15 15:11:03'),
(40, 7, 'EmojiOneMozilla.ttf', 'webroot/files/Attachments/file/', '1227260', 'application/x-font-ttf', 'Aefis', 'attachments', 'ati ttf?', '2017-12-17 00:44:13', '2017-12-17 00:44:13'),
(41, 7, NULL, NULL, NULL, NULL, 'Aefis', 'attachments', 'ati ttf?', '2017-12-17 01:01:59', '2017-12-17 01:01:59'),
(42, 64, '5a3be325a2fe1-faustina', 'webroot/files/Attachments/file/', '943', 'image/png', 'Sadrs', 'attachments', 'Ajax save file ', '2017-12-21 16:36:53', '2017-12-21 16:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` int(11) NOT NULL,
  `county_name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` char(2) CHARACTER SET latin1 DEFAULT '',
  `name` tinytext CHARACTER SET latin1,
  `name_fr` tinytext CHARACTER SET latin1,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `name_fr`, `created`, `modified`) VALUES
(1, 'AD', 'Andorra', 'Andorre', NULL, NULL),
(2, 'AE', 'United Arab Emirates', 'Émirats arabes unis', NULL, NULL),
(3, 'AF', 'Afghanistan', 'Afghanistan', NULL, NULL),
(4, 'AG', 'Antigua and Barbuda', 'Antigua-et-Barbuda', NULL, NULL),
(5, 'AI', 'Anguilla', 'Anguilla', NULL, NULL),
(6, 'AL', 'Albania', 'Albanie', NULL, NULL),
(7, 'AM', 'Armenia', 'Arménie', NULL, NULL),
(8, 'AO', 'Angola', 'Angola', NULL, '2012-07-09 14:58:07'),
(9, 'AQ', 'Antarctica', 'Antarctique', NULL, NULL),
(10, 'AR', 'Argentina', 'Argentine', NULL, NULL),
(11, 'AS', 'American Samoa', 'Samoa américaine', NULL, NULL),
(12, 'AT', 'Austria', 'Autriche', NULL, NULL),
(13, 'AU', 'Australia', 'Australie', NULL, NULL),
(14, 'AW', 'Aruba', 'Aruba', NULL, NULL),
(16, 'AZ', 'Azerbaijan', 'Azerbaïdjan', NULL, NULL),
(17, 'BA', 'Bosnia and Herzegovina', 'Bosnie-Herzégovine', NULL, NULL),
(18, 'BB', 'Barbados', 'Barbade', NULL, NULL),
(19, 'BD', 'Bangladesh', 'Bangladesh', NULL, NULL),
(20, 'BE', 'Belgium', 'Belgique', NULL, NULL),
(21, 'BF', 'Burkina Faso', 'Burkina Faso', NULL, NULL),
(22, 'BG', 'Bulgaria', 'Bulgarie', NULL, NULL),
(23, 'BH', 'Bahrain', 'Bahreïn', NULL, NULL),
(24, 'BI', 'Burundi', 'Burundi', NULL, NULL),
(25, 'BJ', 'Benin', 'Bénin', NULL, NULL),
(26, 'BL', 'Saint Barthélemy', 'Saint-Barthélemy', NULL, NULL),
(27, 'BM', 'Bermuda', 'Bermudes', NULL, NULL),
(28, 'BN', 'Brunei Darussalam', 'Brunei Darussalam', NULL, NULL),
(29, 'BO', 'Bolivia', 'Bolivie', NULL, NULL),
(30, 'BQ', 'Caribbean Netherlands ', 'Pays-Bas caribéens', NULL, NULL),
(31, 'BR', 'Brazil', 'Brésil', NULL, NULL),
(32, 'BS', 'Bahamas', 'Bahamas', NULL, NULL),
(33, 'BT', 'Bhutan', 'Bhoutan', NULL, NULL),
(34, 'BV', 'Bouvet Island', 'Île Bouvet', NULL, NULL),
(35, 'BW', 'Botswana', 'Botswana', NULL, NULL),
(36, 'BY', 'Belarus', 'Bélarus', NULL, NULL),
(37, 'BZ', 'Belize', 'Belize', NULL, NULL),
(38, 'CA', 'Canada', 'Canada', NULL, NULL),
(39, 'CC', 'Cocos (Keeling) Islands', 'Îles Cocos (Keeling)', NULL, NULL),
(40, 'CD', 'Congo, Democratic Republic of', 'Congo, République démocratique du', NULL, NULL),
(41, 'CF', 'Central African Republic', 'République centrafricaine', NULL, NULL),
(42, 'CG', 'Congo', 'Congo', NULL, NULL),
(43, 'CH', 'Switzerland', 'Suisse', NULL, NULL),
(44, 'CI', 'Côte D’Ivoire', 'Côte d’Ivoire', NULL, NULL),
(45, 'CK', 'Cook Islands', 'Îles Cook', NULL, NULL),
(46, 'CL', 'Chile', 'Chili', NULL, NULL),
(47, 'CM', 'Cameroon', 'Cameroun', NULL, NULL),
(48, 'CN', 'China', 'Chine', NULL, NULL),
(49, 'CO', 'Colombia', 'Colombie', NULL, NULL),
(50, 'CR', 'Costa Rica', 'Costa Rica', NULL, NULL),
(51, 'CU', 'Cuba', 'Cuba', NULL, NULL),
(52, 'CV', 'Cape Verde', 'Cap-Vert', NULL, NULL),
(53, 'CW', 'Curaçao', 'Curaçao', NULL, NULL),
(54, 'CX', 'Christmas Island', 'Île Christmas', NULL, NULL),
(55, 'CY', 'Cyprus', 'Chypre', NULL, NULL),
(56, 'CZ', 'Czech Republic', 'République tchèque', NULL, NULL),
(57, 'DE', 'Germany', 'Allemagne', NULL, NULL),
(58, 'DJ', 'Djibouti', 'Djibouti', NULL, NULL),
(59, 'DK', 'Denmark', 'Danemark', NULL, NULL),
(60, 'DM', 'Dominica', 'Dominique', NULL, NULL),
(61, 'DO', 'Dominican Republic', 'République dominicaine', NULL, NULL),
(62, 'DZ', 'Algeria', 'Algérie', NULL, NULL),
(63, 'EC', 'Ecuador', 'Équateur', NULL, NULL),
(64, 'EE', 'Estonia', 'Estonie', NULL, NULL),
(65, 'EG', 'Egypt', 'Égypte', NULL, NULL),
(66, 'EH', 'Western Sahara', 'Sahara Occidental', NULL, NULL),
(67, 'ER', 'Eritrea', 'Érythrée', NULL, NULL),
(68, 'ES', 'Spain', 'Espagne', NULL, NULL),
(69, 'ET', 'Ethiopia', 'Éthiopie', NULL, NULL),
(70, 'FI', 'Finland', 'Finlande', NULL, NULL),
(71, 'FJ', 'Fiji', 'Fidji', NULL, NULL),
(72, 'FK', 'Falkland Islands', 'Îles Malouines', NULL, NULL),
(73, 'FM', 'Micronesia, Federated States of', 'Micronésie, États fédérés de', NULL, NULL),
(74, 'FO', 'Faroe Islands', 'Îles Féroé', NULL, NULL),
(75, 'FR', 'France', 'France', NULL, NULL),
(76, 'GA', 'Gabon', 'Gabon', NULL, NULL),
(77, 'GB', 'United Kingdom', 'Royaume-Uni', NULL, NULL),
(78, 'GD', 'Grenada', 'Grenade', NULL, NULL),
(79, 'GE', 'Georgia', 'Géorgie', NULL, NULL),
(80, 'GF', 'French Guiana', 'Guyane française', NULL, NULL),
(81, 'GG', 'Guernsey', 'Guernesey', NULL, NULL),
(82, 'GH', 'Ghana', 'Ghana', NULL, NULL),
(83, 'GI', 'Gibraltar', 'Gibraltar', NULL, NULL),
(84, 'GL', 'Greenland', 'Groenland', NULL, NULL),
(85, 'GM', 'Gambia', 'Gambie', NULL, NULL),
(86, 'GN', 'Guinea', 'Guinée', NULL, NULL),
(87, 'GP', 'Guadeloupe', 'Guadeloupe', NULL, NULL),
(88, 'GQ', 'Equatorial Guinea', 'Guinée équatoriale', NULL, NULL),
(89, 'GR', 'Greece', 'Grèce', NULL, NULL),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'Géorgie du Sud et les îles Sandwich du Sud', NULL, NULL),
(91, 'GT', 'Guatemala', 'Guatemala', NULL, NULL),
(92, 'GU', 'Guam', 'Guam', NULL, NULL),
(93, 'GW', 'Guinea-Bissau', 'Guinée-Bissau', NULL, NULL),
(94, 'GY', 'Guyana', 'Guyana', NULL, NULL),
(95, 'HK', 'Hong Kong', 'Hong Kong', NULL, NULL),
(96, 'HM', 'Heard and McDonald Islands', 'Îles Heard et McDonald', NULL, NULL),
(97, 'HN', 'Honduras', 'Honduras', NULL, NULL),
(98, 'HR', 'Croatia', 'Croatie', NULL, NULL),
(99, 'HT', 'Haiti', 'Haïti', NULL, NULL),
(100, 'HU', 'Hungary', 'Hongrie', NULL, NULL),
(101, 'ID', 'Indonesia', 'Indonésie', NULL, NULL),
(102, 'IE', 'Ireland', 'Irlande', NULL, NULL),
(103, 'IL', 'Israel', 'Israël', NULL, NULL),
(104, 'IM', 'Isle of Man', 'Île de Man', NULL, NULL),
(105, 'IN', 'India', 'Inde', NULL, NULL),
(106, 'IO', 'British Indian Ocean Territory', 'Territoire britannique de l\'océan Indien', NULL, NULL),
(107, 'IQ', 'Iraq', 'Irak', NULL, NULL),
(108, 'IR', 'Iran', 'Iran', NULL, NULL),
(109, 'IS', 'Iceland', 'Islande', NULL, NULL),
(110, 'IT', 'Italy', 'Italie', NULL, NULL),
(111, 'JE', 'Jersey', 'Jersey', NULL, NULL),
(112, 'JM', 'Jamaica', 'Jamaïque', NULL, NULL),
(113, 'JO', 'Jordan', 'Jordanie', NULL, NULL),
(114, 'JP', 'Japan', 'Japon', NULL, NULL),
(115, 'KE', 'Kenya', 'Kenya', NULL, NULL),
(116, 'KG', 'Kyrgyzstan', 'Kirghizistan', NULL, NULL),
(117, 'KH', 'Cambodia', 'Cambodge', NULL, NULL),
(118, 'KI', 'Kiribati', 'Kiribati', NULL, NULL),
(119, 'KM', 'Comoros', 'Comores', NULL, NULL),
(120, 'KN', 'Saint Kitts and Nevis', 'Saint-Kitts-et-Nevis', NULL, NULL),
(121, 'KP', 'North Korea', 'Corée du Nord', NULL, NULL),
(122, 'KR', 'South Korea', 'Corée du Sud', NULL, NULL),
(123, 'KW', 'Kuwait', 'Koweït', NULL, NULL),
(124, 'KY', 'Cayman Islands', 'Îles Caïmans', NULL, NULL),
(125, 'KZ', 'Kazakhstan', 'Kazakhstan', NULL, NULL),
(126, 'LA', 'Lao People’s Democratic Republic', 'Laos', NULL, NULL),
(127, 'LB', 'Lebanon', 'Liban', NULL, NULL),
(128, 'LC', 'Saint Lucia', 'Sainte-Lucie', NULL, NULL),
(129, 'LI', 'Liechtenstein', 'Liechtenstein', NULL, NULL),
(130, 'LK', 'Sri Lanka', 'Sri Lanka', NULL, NULL),
(131, 'LR', 'Liberia', 'Libéria', NULL, NULL),
(132, 'LS', 'Lesotho', 'Lesotho', NULL, NULL),
(133, 'LT', 'Lithuania', 'Lituanie', NULL, NULL),
(134, 'LU', 'Luxembourg', 'Luxembourg', NULL, NULL),
(135, 'LV', 'Latvia', 'Lettonie', NULL, NULL),
(136, 'LY', 'Libya', 'Libye', NULL, NULL),
(137, 'MA', 'Morocco', 'Maroc', NULL, NULL),
(138, 'MC', 'Monaco', 'Monaco', NULL, NULL),
(139, 'MD', 'Moldova', 'Moldavie', NULL, NULL),
(140, 'ME', 'Montenegro', 'Monténégro', NULL, NULL),
(141, 'MF', 'Saint-Martin (France)', 'Saint-Martin (France)', NULL, NULL),
(142, 'MG', 'Madagascar', 'Madagascar', NULL, NULL),
(143, 'MH', 'Marshall Islands', 'Îles Marshall', NULL, NULL),
(144, 'MK', 'Macedonia', 'Macédoine', NULL, NULL),
(145, 'ML', 'Mali', 'Mali', NULL, NULL),
(146, 'MM', 'Myanmar', 'Myanmar', NULL, NULL),
(147, 'MN', 'Mongolia', 'Mongolie', NULL, NULL),
(148, 'MO', 'Macau', 'Macao', NULL, NULL),
(149, 'MP', 'Northern Mariana Islands', 'Mariannes du Nord', NULL, '2012-07-09 14:14:26'),
(150, 'MQ', 'Martinique', 'Martinique', NULL, NULL),
(151, 'MR', 'Mauritania', 'Mauritanie', NULL, NULL),
(152, 'MS', 'Montserrat', 'Montserrat', NULL, NULL),
(153, 'MT', 'Malta', 'Malte', NULL, NULL),
(154, 'MU', 'Mauritius', 'Maurice', NULL, NULL),
(155, 'MV', 'Maldives', 'Maldives', NULL, NULL),
(156, 'MW', 'Malawi', 'Malawi', NULL, NULL),
(157, 'MX', 'Mexico', 'Mexique', NULL, NULL),
(158, 'MY', 'Malaysia', 'Malaisie', NULL, NULL),
(159, 'MZ', 'Mozambique', 'Mozambique', NULL, NULL),
(160, 'NA', 'Namibia', 'Namibie', NULL, NULL),
(161, 'NC', 'New Caledonia', 'Nouvelle-Calédonie', NULL, NULL),
(162, 'NE', 'Niger', 'Niger', NULL, NULL),
(163, 'NF', 'Norfolk Island', 'Île Norfolk', NULL, NULL),
(164, 'NG', 'Nigeria', 'Nigeria', NULL, NULL),
(165, 'NI', 'Nicaragua', 'Nicaragua', NULL, NULL),
(166, 'NL', 'The Netherlands', 'Pays-Bas', NULL, NULL),
(167, 'NO', 'Norway', 'Norvège', NULL, NULL),
(168, 'NP', 'Nepal', 'Népal', NULL, NULL),
(169, 'NR', 'Nauru', 'Nauru', NULL, NULL),
(170, 'NU', 'Niue', 'Niue', NULL, NULL),
(171, 'NZ', 'New Zealand', 'Nouvelle-Zélande', NULL, NULL),
(172, 'OM', 'Oman', 'Oman', NULL, NULL),
(173, 'PA', 'Panama', 'Panama', NULL, NULL),
(174, 'PE', 'Peru', 'Pérou', NULL, NULL),
(175, 'PF', 'French Polynesia', 'Polynésie française', NULL, NULL),
(176, 'PG', 'Papua New Guinea', 'Papouasie-Nouvelle-Guinée', NULL, NULL),
(177, 'PH', 'Philippines', 'Philippines', NULL, NULL),
(178, 'PK', 'Pakistan', 'Pakistan', NULL, NULL),
(179, 'PL', 'Poland', 'Pologne', NULL, NULL),
(180, 'PM', 'St. Pierre and Miquelon', 'Saint-Pierre-et-Miquelon', NULL, NULL),
(181, 'PN', 'Pitcairn', 'Pitcairn', NULL, NULL),
(182, 'PR', 'Puerto Rico', 'Puerto Rico', NULL, NULL),
(183, 'PS', 'Palestinian Territory, Occupied', 'Territoires palestiniens', NULL, NULL),
(184, 'PT', 'Portugal', 'Portugal', NULL, NULL),
(185, 'PW', 'Palau', 'Palau', NULL, NULL),
(186, 'PY', 'Paraguay', 'Paraguay', NULL, NULL),
(187, 'QA', 'Qatar', 'Qatar', NULL, NULL),
(188, 'RE', 'Reunion', 'Réunion', NULL, NULL),
(189, 'RO', 'Romania', 'Roumanie', NULL, NULL),
(190, 'RS', 'Serbia', 'Serbie', NULL, NULL),
(191, 'RU', 'Russian Federation', 'Russie', NULL, NULL),
(192, 'RW', 'Rwanda', 'Rwanda', NULL, NULL),
(193, 'SA', 'Saudi Arabia', 'Arabie saoudite', NULL, NULL),
(194, 'SB', 'Solomon Islands', 'Îles Salomon', NULL, NULL),
(195, 'SC', 'Seychelles', 'Seychelles', NULL, NULL),
(196, 'SD', 'Sudan', 'Soudan', NULL, NULL),
(197, 'SE', 'Sweden', 'Suède', NULL, NULL),
(198, 'SG', 'Singapore', 'Singapour', NULL, NULL),
(199, 'SH', 'Saint Helena', 'Sainte-Hélène', NULL, NULL),
(200, 'SI', 'Slovenia', 'Slovénie', NULL, NULL),
(201, 'SJ', 'Svalbard and Jan Mayen Islands', 'Svalbard et île de Jan Mayen', NULL, NULL),
(202, 'SK', 'Slovakia (Slovak Republic)', 'Slovaquie (République slovaque)', NULL, NULL),
(203, 'SL', 'Sierra Leone', 'Sierra Leone', NULL, NULL),
(204, 'SM', 'San Marino', 'Saint-Marin', NULL, NULL),
(205, 'SN', 'Senegal', 'Sénégal', NULL, NULL),
(206, 'SO', 'Somalia', 'Somalie', NULL, NULL),
(207, 'SR', 'Suriname', 'Suriname', NULL, NULL),
(208, 'SS', 'South Sudan', 'Soudan du Sud', NULL, NULL),
(209, 'ST', 'Sao Tome and Principe', 'Sao Tomé-et-Principe', NULL, NULL),
(210, 'SV', 'El Salvador', 'El Salvador', NULL, NULL),
(211, 'SX', 'Saint-Martin (Pays-Bas)', 'Sint Maarten ', NULL, NULL),
(212, 'SY', 'Syria', 'Syrie', NULL, NULL),
(213, 'SZ', 'Swaziland', 'Swaziland', NULL, NULL),
(214, 'TC', 'Turks and Caicos Islands', 'Îles Turks et Caicos', NULL, NULL),
(215, 'TD', 'Chad', 'Tchad', NULL, NULL),
(216, 'TF', 'French Southern Territories', 'Terres australes françaises', NULL, NULL),
(217, 'TG', 'Togo', 'Togo', NULL, NULL),
(218, 'TH', 'Thailand', 'Thaïlande', NULL, NULL),
(219, 'TJ', 'Tajikistan', 'Tadjikistan', NULL, NULL),
(220, 'TK', 'Tokelau', 'Tokelau', NULL, NULL),
(221, 'TL', 'Timor-Leste', 'Timor-Leste', NULL, NULL),
(222, 'TM', 'Turkmenistan', 'Turkménistan', NULL, NULL),
(223, 'TN', 'Tunisia', 'Tunisie', NULL, NULL),
(224, 'TO', 'Tonga', 'Tonga', NULL, NULL),
(225, 'TR', 'Turkey', 'Turquie', NULL, NULL),
(226, 'TT', 'Trinidad and Tobago', 'Trinité-et-Tobago', NULL, NULL),
(227, 'TV', 'Tuvalu', 'Tuvalu', NULL, NULL),
(228, 'TW', 'Taiwan', 'Taïwan', NULL, NULL),
(229, 'TZ', 'Tanzania', 'Tanzanie', NULL, NULL),
(230, 'UA', 'Ukraine', 'Ukraine', NULL, NULL),
(231, 'UG', 'Uganda', 'Ouganda', NULL, NULL),
(232, 'UM', 'United States Minor Outlying Islands', 'Îles mineures éloignées des États-Unis', NULL, NULL),
(233, 'US', 'United States', 'États-Unis', NULL, NULL),
(234, 'UY', 'Uruguay', 'Uruguay', NULL, NULL),
(235, 'UZ', 'Uzbekistan', 'Ouzbékistan', NULL, NULL),
(236, 'VA', 'Vatican', 'Vatican', NULL, NULL),
(237, 'VC', 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les-Grenadines', NULL, NULL),
(238, 'VE', 'Venezuela', 'Venezuela', NULL, NULL),
(239, 'VG', 'Virgin Islands (British)', 'Îles Vierges britanniques', NULL, NULL),
(240, 'VI', 'Virgin Islands (U.S.)', 'Îles Vierges américaines', NULL, NULL),
(241, 'VN', 'Vietnam', 'Vietnam', NULL, NULL),
(242, 'VU', 'Vanuatu', 'Vanuatu', NULL, NULL),
(243, 'WF', 'Wallis and Futuna Islands', 'Îles Wallis-et-Futuna', NULL, NULL),
(244, 'WS', 'Samoa', 'Samoa', NULL, NULL),
(245, 'YE', 'Yemen', 'Yémen', NULL, NULL),
(246, 'YT', 'Mayotte', 'Mayotte', NULL, NULL),
(247, 'ZA', 'South Africa', 'Afrique du Sud', NULL, NULL),
(248, 'ZM', 'Zambia', 'Zambie', NULL, NULL),
(249, 'ZW', 'Zimbabwe', 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Physician', NULL, NULL),
(2, 'Therapist', NULL, NULL),
(3, 'Nurse', NULL, NULL),
(4, 'Pharmacy Technician', NULL, NULL),
(5, 'Clinical Laboratory Technician', NULL, NULL),
(6, 'Pharmacist', NULL, NULL),
(7, 'Health Information Technician', NULL, NULL),
(8, 'Family Practitioner', NULL, NULL),
(9, 'Dentist', NULL, NULL),
(10, 'Occupational Therapist', NULL, NULL),
(11, 'Ophthalmologist', NULL, NULL),
(12, 'Veterinary surgeon', NULL, NULL),
(13, 'Surgeon', NULL, NULL),
(14, 'Paediatrician', NULL, NULL),
(15, 'Anaesthetist', NULL, NULL),
(16, 'Optometrist', NULL, NULL),
(17, 'Psychiatrist', NULL, NULL),
(18, 'Obstetrician/Gynaecologist', NULL, NULL),
(19, 'Dispensary Assistant', NULL, NULL),
(20, 'Doctor', NULL, NULL),
(21, 'Patient', NULL, NULL),
(22, 'Relative/Friend', NULL, NULL),
(23, 'Other Health Care Professional', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doses`
--

CREATE TABLE `doses` (
  `id` int(11) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `icsr_code` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doses`
--

INSERT INTO `doses` (`id`, `value`, `icsr_code`, `name`, `created`, `modified`) VALUES
(2, 'mg', '003', 'mg', NULL, NULL),
(3, 'ml', '012', 'ml', NULL, NULL),
(4, 'µg', '004', 'µg', NULL, NULL),
(5, 'g', '002', 'g', NULL, NULL),
(6, 'Iu', '025', 'Iu', NULL, NULL),
(7, 'DF dosage form', '032', 'DF dosage form', NULL, NULL),
(8, 'Gtt drop(s)', '031', 'Gtt drop(s)', NULL, NULL),
(9, 'mmol', '023', 'mmol', NULL, NULL),
(10, 'meq', '029', 'meq', NULL, NULL),
(11, '%', '030', '%', NULL, NULL),
(12, 'µCi', '020', 'µCi', NULL, NULL),
(13, 'µg/kg', '008', 'µg/kg', NULL, NULL),
(14, 'µg/m2', '010', 'µg/m2', NULL, NULL),
(15, 'µl', '013', 'µl', NULL, NULL),
(16, 'µmol', '024', 'µmol', NULL, NULL),
(17, 'Bq', '014', 'Bq', NULL, '2012-07-09 16:18:37'),
(18, 'Ci curie(s)', '018', 'Ci curie(s)', NULL, NULL),
(19, 'GBq', '015', 'GBq', NULL, NULL),
(20, 'iu/kg', '028', 'iu/kg', NULL, NULL),
(21, 'Kbq', '017', 'Kbq', NULL, NULL),
(22, 'kg', '001', 'kg', NULL, NULL),
(23, 'Kiu', '026', 'Kiu', NULL, NULL),
(24, 'l', '011', 'l', NULL, NULL),
(25, 'MBq', '016', 'MBq', NULL, NULL),
(26, 'mCi', '019', 'mCi', NULL, NULL),
(27, 'mg/kg', '007', 'mg/kg', NULL, NULL),
(28, 'mg/m2', '009', 'mg/m2', NULL, NULL),
(29, 'Miu', '027', 'Miu', NULL, NULL),
(30, 'Mol', '022', 'Mol', NULL, NULL),
(31, 'nCi', '021', 'nCi', NULL, NULL),
(32, 'ng', '005', 'ng', NULL, NULL),
(33, 'pg', '006', 'pg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drug_dictionaries`
--

CREATE TABLE `drug_dictionaries` (
  `id` varchar(10) NOT NULL,
  `MedId` varchar(35) DEFAULT NULL,
  `drug_record_number` varchar(6) DEFAULT NULL,
  `sequence_no_1` varchar(2) DEFAULT NULL,
  `sequence_no_2` varchar(3) DEFAULT NULL,
  `sequence_no_3` varchar(10) DEFAULT NULL,
  `sequence_no_4` varchar(10) DEFAULT NULL,
  `generic` char(1) DEFAULT NULL,
  `drug_name` varchar(80) DEFAULT NULL,
  `name_specifier` varchar(30) DEFAULT NULL,
  `market_authorization_number` varchar(30) DEFAULT NULL,
  `market_authorization_date` varchar(8) DEFAULT NULL,
  `market_authorization_withdrawal_date` varchar(8) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `company` varchar(10) DEFAULT NULL,
  `marketing_authorization_holder` varchar(10) DEFAULT NULL,
  `source_code` varchar(10) DEFAULT NULL,
  `source_country` varchar(10) DEFAULT NULL,
  `source_year` varchar(3) DEFAULT NULL,
  `product_type` varchar(10) DEFAULT NULL,
  `product_group` varchar(10) DEFAULT NULL,
  `create_date` varchar(8) DEFAULT NULL,
  `date_changed` varchar(8) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug_dictionaries`
--

INSERT INTO `drug_dictionaries` (`id`, `MedId`, `drug_record_number`, `sequence_no_1`, `sequence_no_2`, `sequence_no_3`, `sequence_no_4`, `generic`, `drug_name`, `name_specifier`, `market_authorization_number`, `market_authorization_date`, `market_authorization_withdrawal_date`, `country`, `company`, `marketing_authorization_holder`, `source_code`, `source_country`, `source_year`, `product_type`, `product_group`, `create_date`, `date_changed`, `created`, `modified`) VALUES
('105142', '', '004300', '01', '001', '0000000001', '0000000001', 'N', 'Atasol compound', '', '', '', '', 'UNS', '0', '0', '056', 'CAN', '78', '001', '0', '20041231', '20041231', NULL, NULL),
('105144', '', '004300', '01', '003', '0000000001', '0000000001', 'N', 'Atasol', '', '', '', '', 'UNS', '0', '0', '064', 'AUS', '90', '001', '0', '20041231', '20041231', NULL, NULL),
('107155', '', '005097', '01', '016', '0000000001', '0000000001', 'N', 'Panadol', '', '', '', '', 'UNS', '0', '0', 'GBR', 'GBR', '94', '001', '0', '20041231', '20041231', NULL, NULL),
('1082797', '', '000469', '01', '009', '0000000125', '0000000001', 'N', 'Crystepin', '', '', '', '', 'EST', '7156', '21245', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1082798', '', '000469', '01', '009', '0000000001', '0000000001', 'N', 'Crystepin', '', '', '', '', 'EST', '7156', '21245', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1082799', '', '000469', '01', '009', '0000000001', '0000000001', 'N', 'Crystepin', '', '', '', '', 'UNS', '7156', '7157', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1082917', '', '000291', '01', '032', '0000000206', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'EST', '7156', '20253', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1082918', '', '000291', '01', '032', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'EST', '7156', '20253', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1082919', '', '000291', '01', '032', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'UNS', '7156', '7157', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1082920', '', '000291', '01', '032', '0000000209', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'EST', '7156', '20253', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1083773', '', '000291', '01', '032', '0000000209', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'LVA', '7156', '23215', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1083774', '', '000291', '01', '032', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'LVA', '7156', '23215', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084139', '', '054876', '01', '001', '0000000252', '0000000001', 'N', 'Anginal', '', '', '', '', 'LVA', '7156', '23141', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084140', '', '054876', '01', '001', '0000000001', '0000000001', 'N', 'Anginal', '', '', '', '', 'LVA', '7156', '23141', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084141', '', '054876', '01', '001', '0000000001', '0000000001', 'N', 'Anginal', '', '', '', '', 'UNS', '7156', '7157', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084142', '', '054876', '01', '001', '0000000176', '0000000001', 'N', 'Anginal', '', '', '', '', 'LVA', '7156', '23141', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084360', '', '000469', '01', '009', '0000000125', '0000000001', 'N', 'Crystepin', '', '', '', '', 'LTU', '7156', '22741', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084361', '', '000469', '01', '009', '0000000001', '0000000001', 'N', 'Crystepin', '', '', '', '', 'LTU', '7156', '22741', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084553', '', '000291', '01', '032', '0000000209', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'LTU', '7156', '21705', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084554', '', '000291', '01', '032', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'LTU', '7156', '21705', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084610', '', '000291', '01', '032', '0000000206', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'LTU', '7156', '21705', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1086178', '', '000291', '03', '004', '0000000209', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'POL', '7156', '24755', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1086179', '', '000291', '03', '004', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'POL', '7156', '24755', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1086180', '', '000291', '03', '004', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'UNS', '7156', '7157', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('111886', '', '007242', '01', '001', '0000000001', '0000000001', 'N', 'Cotylenol', '', '', '', '', 'N/A', '0', '0', '011', 'USA', '83', '001', '0', '20041231', '20050930', NULL, NULL),
('117513', '', '010775', '01', '001', '0000000001', '0000000001', 'N', 'Briserin', '', '', '', '', 'UNS', '0', '0', '015', 'DEU', '77', '001', '0', '20041231', '20041231', NULL, NULL),
('117515', '', '010775', '01', '004', '0000000001', '0000000001', 'N', 'Crystepin', '', '', '', '', 'UNS', '0', '0', '091', 'N/A', '93', '001', '0', '20041231', '20041231', NULL, NULL),
('120519', '', '013252', '01', '001', '0000000001', '0000000001', 'N', 'Day & night cold & flu', '', '', '', '', 'UNS', '0', '0', '132', 'GBR', '97', '001', '0', '20041231', '20041231', NULL, NULL),
('121229', '', '013862', '01', '001', '0000000001', '0000000001', 'N', 'Bronchosan', '', '', '', '', 'UNS', '0', '0', '002', 'N/A', '98', '002', '0', '20041231', '20050331', NULL, NULL),
('122306', '', '015172', '01', '002', '0000000001', '0000000001', 'N', 'Ardeycholan n', '', '', '', '', 'UNS', '0', '0', '002', 'N/A', '01', '002', '0', '20041231', '20050331', NULL, NULL),
('126158', '', '000200', '01', '012', '0000000350', '0000000062', 'N', 'Ben-u-ron', '500mg supp. fur schulkinder', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('126159', '', '000200', '01', '012', '0000000350', '0000000001', 'N', 'Ben-u-ron', 'Suppositorien', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('127288', '', '000200', '01', '003', '0000000125', '0000001057', 'N', 'Panadol', 'extend 665 mg depottabletti', '', '', '', 'FIN', '7156', '3957', '051', 'FIN', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('127289', '', '000200', '01', '003', '0000000125', '0000000001', 'N', 'Panadol', 'extend depottabletti', '', '', '', 'FIN', '7156', '3957', '051', 'FIN', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('127290', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', '', '', '', '', 'FIN', '7156', '3957', '051', 'FIN', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('128531', '', '000200', '01', '003', '0000000100', '0000000062', 'N', 'Panadol', 'rapid', '', '', '', 'AUS', '7156', '12085', '214', 'GBR', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('128532', '', '000200', '01', '003', '0000000100', '0000000001', 'N', 'Panadol', 'rapid', '', '', '', 'AUS', '7156', '12085', '214', 'GBR', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('13610', '', '000913', '01', '001', '0000000001', '0000000001', 'Y', 'Psyllium hydrophilic mucilloid', '', '', '', '', 'N/A', '0', '0', '002', 'N/A', '72', '001', '0', '19851231', '19851231', NULL, NULL),
('13619', '', '000913', '01', '010', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'UNS', '0', '7157', '005', 'DEU', '87', '001', '0', '19870331', '19870331', NULL, NULL),
('1925', '', '000047', '01', '001', '0000000001', '0000000001', 'Y', 'Bromhexine', '', '', '', '', 'N/A', '0', '0', '001', 'N/A', '', '001', '0', '19851231', '19851231', NULL, NULL),
('1929', '', '000047', '02', '001', '0000000001', '0000000001', 'Y', 'Bromhexine hydrochloride', '', '', '', '', 'N/A', '0', '0', '179', 'N/A', '', '001', '0', '19851231', '19851231', NULL, NULL),
('1962', '', '000047', '02', '034', '0000000001', '0000000001', 'N', 'Bronchosan', '', '', '', '', 'SVK', '0', '9575', 'SVK', 'SVK', '98', '001', '0', '19980630', '19980930', NULL, NULL),
('207302', '', '007242', '01', '034', '0000000150', '0000000001', 'N', 'Codral cough, cold & flu day & night', '', '', '', '', 'AUS', '7156', '18064', '002', 'N/A', '05', '001', '0', '20050630', '20050630', NULL, NULL),
('207303', '', '007242', '01', '034', '0000000001', '0000000001', 'N', 'Codral cough, cold & flu day & night', '', '', '', '', 'AUS', '7156', '18064', '002', 'N/A', '05', '001', '0', '20050630', '20050630', NULL, NULL),
('207304', '', '007242', '01', '034', '0000000001', '0000000001', 'N', 'Codral cough, cold & flu day & night', '', '', '', '', 'UNS', '7156', '7157', '002', 'N/A', '05', '001', '0', '20050630', '20050630', NULL, NULL),
('236599', '', '000291', '03', '001', '0000000001', '0000000001', 'Y', 'Plantago ovata extract', '', '', '', '', 'N/A', '0', '0', '237', 'N/A', '05', '002', '0', '20050630', '20050630', NULL, NULL),
('271148', '', '012896', '01', '015', '0000000100', '0000000001', 'N', 'Benylin day & night', '', '', '', '', 'IRL', '7156', '26117', '002', 'N/A', '05', '001', '0', '20050823', '20050823', NULL, NULL),
('271149', '', '012896', '01', '015', '0000000001', '0000000001', 'N', 'Benylin day & night', '', '', '', '', 'IRL', '7156', '26117', '002', 'N/A', '05', '001', '0', '20050823', '20050823', NULL, NULL),
('271150', '', '012896', '01', '015', '0000000001', '0000000001', 'N', 'Benylin day & night', '', '', '', '', 'UNS', '7156', '7157', '002', 'N/A', '05', '001', '0', '20050823', '20050823', NULL, NULL),
('27456', '', '004300', '01', '001', '0000000001', '0000000001', 'N', 'Atasol compound', '', '', '', '', 'CAN', '0', '4493', '056', 'CAN', '78', '001', '0', '19851231', '20041231', NULL, NULL),
('27458', '', '004300', '01', '003', '0000000001', '0000000001', 'N', 'Atasol', '8', '', '', '', 'AUS', '0', '8994', '064', 'AUS', '90', '001', '0', '19901231', '20041231', NULL, NULL),
('275605', '', '000429', '01', '001', '0000000100', '0000000023', 'N', 'Dipyridamole', '', '', '', '', 'MYS', '0', '25884', 'MYS', 'MYS', '05', '001', '0', '20050927', '20050927', NULL, NULL),
('275606', '', '000429', '01', '001', '0000000100', '0000000001', 'N', 'Dipyridamole', '', '', '', '', 'MYS', '0', '25884', 'MYS', 'MYS', '05', '001', '0', '20050927', '20050927', NULL, NULL),
('275607', '', '000429', '01', '001', '0000000001', '0000000001', 'N', 'Dipyridamole', '', '', '', '', 'MYS', '0', '25884', 'MYS', 'MYS', '05', '001', '0', '20050927', '20050927', NULL, NULL),
('275608', '', '000429', '01', '001', '0000000100', '0000000039', 'N', 'Dipyridamole', '', '', '', '', 'MYS', '0', '26089', 'MYS', 'MYS', '05', '001', '0', '20050927', '20050927', NULL, NULL),
('275609', '', '000429', '01', '001', '0000000100', '0000000001', 'N', 'Dipyridamole', '', '', '', '', 'MYS', '0', '26089', 'MYS', 'MYS', '05', '001', '0', '20050927', '20050927', NULL, NULL),
('275610', '', '000429', '01', '001', '0000000001', '0000000001', 'N', 'Dipyridamole', '', '', '', '', 'MYS', '0', '26089', 'MYS', 'MYS', '05', '001', '0', '20050927', '20050927', NULL, NULL),
('30075', '', '005097', '01', '001', '0000000001', '0000000001', 'N', 'Para-seltzer', '', '', '', '', 'GBR', '0', '10853', '013', 'GBR', '80', '001', '0', '19851231', '19851231', NULL, NULL),
('30090', '', '005097', '01', '016', '0000000001', '0000000001', 'N', 'Panadol', 'Extra', '', '', '', 'GBR', '0', '9038', 'GBR', 'GBR', '94', '001', '0', '19940930', '20041231', NULL, NULL),
('36106', '', '007242', '01', '001', '0000000001', '0000000001', 'N', 'Cotylenol', '', '', '', '', 'USA', '0', '6247', '011', 'USA', '83', '001', '0', '19851231', '19851231', NULL, NULL),
('36117', '', '007242', '01', '012', '0000000001', '0000000001', 'N', 'Day & night cold & flu', 'Capsules', '', '', '', 'AUS', '0', '7610', '049', 'AUS', '94', '001', '0', '19990630', '20041231', NULL, NULL),
('402236', '', '000200', '01', '003', '0000000105', '0000000062', 'N', 'Panadol', 'Pore 500 mg', '', '', '', 'FIN', '7156', '3957', '051', 'FIN', '05', '001', '0', '20050930', '20050930', NULL, NULL),
('402237', '', '000200', '01', '003', '0000000105', '0000000001', 'N', 'Panadol', 'Pore', '', '', '', 'FIN', '7156', '3957', '051', 'FIN', '05', '001', '0', '20050930', '20050930', NULL, NULL),
('43168', '', '010775', '01', '001', '0000000001', '0000000001', 'N', 'Briserin', '', '', '', '', 'DEU', '0', '8994', '015', 'DEU', '77', '001', '0', '19920630', '19920930', NULL, NULL),
('43171', '', '010775', '01', '004', '0000000001', '0000000001', 'N', 'Crystepin', '', '', '', '', 'CZE', '0', '5737', '091', 'N/A', '93', '001', '0', '19930930', '19930930', NULL, NULL),
('47069', '', '013252', '01', '001', '0000000001', '0000000001', 'N', 'Day & night cold & flu', 'Tablets', '', '', '', 'USA', '0', '10881', '132', 'GBR', '97', '001', '0', '19970630', '20041231', NULL, NULL),
('4762', '', '000200', '01', '001', '0000000001', '0000000001', 'Y', 'Paracetamol', '', '', '', '', 'N/A', '0', '0', '001', 'N/A', '', '001', '0', '19851231', '19851231', NULL, NULL),
('4763', '', '000200', '01', '002', '0000000001', '0000000001', 'N', 'Dymadon', '', '', '', '', 'AUS', '0', '1672', '012', 'AUS', '68', '001', '0', '19851231', '19851231', NULL, NULL),
('4764', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', '', '', '', '', 'NZL', '0', '11043', '017', 'NZL', '68', '001', '0', '19851231', '19851231', NULL, NULL),
('4765', '', '000200', '01', '004', '0000000001', '0000000001', 'N', 'Alvedon', '', '', '', '', 'SWE', '0', '2909', '019', 'SWE', '68', '001', '0', '19851231', '19851231', NULL, NULL),
('4766', '', '000200', '01', '005', '0000000001', '0000000001', 'N', 'Tylenol', '', '', '', '', 'USA', '0', '6247', '010', 'USA', '68', '001', '0', '19851231', '19851231', NULL, NULL),
('4767', '', '000200', '01', '006', '0000000001', '0000000001', 'N', 'Tempra', '', '', '', '', 'CAN', '0', '6255', '014', 'CAN', '68', '001', '0', '19851231', '19851231', NULL, NULL),
('4768', '', '000200', '01', '007', '0000000001', '0000000001', 'N', 'Calpol', '', '', '', '', 'GBR', '0', '1672', '013', 'GBR', '69', '001', '0', '19851231', '19851231', NULL, NULL),
('4769', '', '000200', '01', '008', '0000000001', '0000000001', 'N', 'Atasol', '', '', '', '', 'CAN', '0', '4493', '014', 'CAN', '68', '001', '0', '19851231', '19851231', NULL, NULL),
('4770', '', '000200', '01', '009', '0000000001', '0000000001', 'Y', 'Acetaminophen', '', '', '', '', 'UNS', '0', '0', '006', 'USA', '', '001', '0', '19851231', '19981231', NULL, NULL),
('4771', '', '000200', '01', '010', '0000000001', '0000000001', 'N', 'Acamol', '', '', '', '', 'ISR', '0', '4661', '038', 'ISR', '73', '001', '0', '19851231', '19851231', NULL, NULL),
('4772', '', '000200', '01', '011', '0000000001', '0000000001', 'N', 'Hedex', '', '', '', '', 'NLD', '0', '9848', '016', 'NLD', '73', '001', '0', '19851231', '19851231', NULL, NULL),
('4773', '', '000200', '01', '012', '0000000001', '0000000001', 'N', 'Ben-u-ron', '', '', '', '', 'DEU', '0', '988', '015', 'DEU', '71', '001', '0', '19851231', '19851231', NULL, NULL),
('4790', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'DNK', '0', '2441', '024', 'DNK', '83', '001', '0', '19851231', '20041231', NULL, NULL),
('48010', '', '013862', '01', '001', '0000000001', '0000000001', 'N', 'Bronchosan', '', '', '', '', 'NLD', '0', '1166', '002', 'N/A', '98', '002', '0', '19980930', '20050331', NULL, NULL),
('4816', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'FRA', '0', '5967', '043', 'FRA', '86', '001', '0', '19870930', '20041231', NULL, NULL),
('4819', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'FRA', '0', '10571', 'FRA', 'FRA', '87', '001', '0', '19870930', '20041231', NULL, NULL),
('4823', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', 'Soluble', '', '', '', 'AUS', '0', '11043', '049', 'AUS', '86', '001', '0', '19880331', '20041231', NULL, NULL),
('4833', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'GBR', '0', '9848', '071', 'GBR', '88', '001', '0', '19890331', '20041231', NULL, NULL),
('4849', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'NLD', '0', '3611', 'NLD', 'NLD', '89', '001', '0', '19891231', '20041231', NULL, NULL),
('4853', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'ESP', '0', '11043', '075', 'ESP', '89', '001', '0', '19910630', '20041231', NULL, NULL),
('4879', '', '000200', '01', '005', '0000000001', '0000000001', 'N', 'Tylenol', '', '', '', '', 'AUS', '0', '5053', 'AUS', 'AUS', '93', '001', '0', '19930331', '20041231', NULL, NULL),
('4901', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'GBR', '0', '1406', 'GBR', 'GBR', '94', '001', '0', '19940930', '20041231', NULL, NULL),
('4914', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', 'For children', '', '', '', 'SGP', '0', '9848', '108', 'SGP', '93', '001', '0', '19960331', '20041231', NULL, NULL),
('4915', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'ESP', '0', '4625', '075', 'ESP', '95', '001', '0', '19960331', '20041231', NULL, NULL),
('4924', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'FRA', '0', '1428', 'FRA', 'FRA', '96', '001', '0', '19961231', '20041231', NULL, NULL),
('4926', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'GBR', '0', '2293', '071', 'GBR', '96', '001', '0', '19970331', '20041231', NULL, NULL),
('4927', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'DEU', '0', '2347', '015', 'DEU', '96', '001', '0', '19970331', '20041231', NULL, NULL),
('4931', '', '000200', '01', '008', '0000000001', '0000000001', 'N', 'Atasol', 'Forte', '', '', '', 'CAN', '0', '3641', '056', 'CAN', '97', '001', '0', '19971231', '20041231', NULL, NULL),
('4935', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'EST', '0', '10080', '136', 'EST', '98', '001', '0', '19980630', '20041231', NULL, NULL),
('4937', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'DEU', '0', '9777', '015', 'DEU', '96', '001', '0', '19980630', '20041231', NULL, NULL),
('4941', '', '000200', '01', '006', '0000000001', '0000000001', 'N', 'Tempra', 'Forte', '', '', '', 'PHL', '0', '6255', '115', 'PHL', '98', '001', '0', '19980930', '20041231', NULL, NULL),
('4950', '', '000200', '01', '007', '0000000001', '0000000001', 'N', 'Calpol', 'Suspension', '', '', '', 'TUR', '0', '3953', '147', 'TUR', '98', '001', '0', '19981231', '20041231', NULL, NULL),
('4951', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', 'Hot', '', '', '', 'FIN', '0', '9589', '051', 'FIN', '98', '001', '0', '19990331', '20041231', NULL, NULL),
('4961', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', 'Forte', '', '', '', 'FIN', '0', '9589', '051', 'FIN', '99', '001', '0', '19990630', '20041231', NULL, NULL),
('49634', '', '015172', '01', '001', '0000000001', '0000000001', 'Y', 'Chelidonium majus', '', '', '', '', 'N/A', '0', '0', 'UNS', 'UNS', '', '002', '0', '20010331', '20050331', NULL, NULL),
('49635', '', '015172', '01', '002', '0000000001', '0000000001', 'N', 'Ardeycholan n', '', '', '', '', 'DEU', '0', '572', '002', 'N/A', '01', '002', '0', '20010331', '20050331', NULL, NULL),
('4967', '', '000200', '01', '004', '0000000001', '0000000001', 'N', 'Alvedon', 'Forte', '', '', '', 'SWE', '0', '701', '022', 'SWE', '00', '001', '0', '20000630', '20041231', NULL, NULL),
('4971', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'DEU', '0', '5841', '015', 'DEU', '01', '001', '0', '20010331', '20041231', NULL, NULL),
('4972', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'DEU', '0', '1026', '015', 'DEU', '01', '001', '0', '20010331', '20041231', NULL, NULL),
('51025', '', '004300', '01', '003', '0000000001', '0000000001', 'N', 'Atasol', '30', '', '', '', 'CAN', '0', '1742', '002', 'N/A', '01', '001', '0', '20010930', '20041231', NULL, NULL),
('55595', '', '007242', '01', '012', '0000000150', '0000000001', 'N', 'Day & night cold & flu', '', '', '', '', 'NZL', '7156', '10877', '002', 'N/A', '03', '001', '0', '20030320', '20041231', NULL, NULL),
('55596', '', '007242', '01', '012', '0000000001', '0000000001', 'N', 'Day & night cold & flu', '', '', '', '', 'NZL', '7156', '10877', '002', 'N/A', '03', '001', '0', '20030320', '20041231', NULL, NULL),
('55597', '', '007242', '01', '012', '0000000001', '0000000001', 'N', 'Day & night cold & flu', '', '', '', '', 'UNS', '7156', '7157', '002', 'N/A', '03', '001', '0', '20030320', '20041231', NULL, NULL),
('55969', '', '000200', '01', '005', '0000000001', '0000000001', 'N', 'Tylenol', '', '', '', '', 'CHE', '7156', '5011', '089', 'CHE', '03', '001', '0', '20030523', '20030630', NULL, NULL),
('55970', '', '000200', '01', '005', '0000000001', '0000000001', 'N', 'Tylenol', '', '', '', '', 'UNS', '7156', '7157', '089', 'CHE', '03', '001', '0', '20030523', '20050331', NULL, NULL),
('57203', '', '000200', '01', '003', '0000000127', '0000000001', 'N', 'Panadol', 'Filmtabletten', '', '', '', 'CHE', '0', '11766', 'CHE', 'CHE', '04', '001', '0', '20030626', '20040909', NULL, NULL),
('57204', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', '', '', '', '', 'CHE', '0', '11766', 'CHE', 'CHE', '04', '001', '0', '20030626', '20040909', NULL, NULL),
('57205', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', '', '', '', '', 'UNS', '7156', '7157', 'CHE', 'CHE', '03', '001', '0', '20030626', '20030626', NULL, NULL),
('57333', '', '000200', '01', '005', '0000000100', '0000000062', 'N', 'Tylenol', 'Forte caplets', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '03', '001', '0', '20030626', '20030626', NULL, NULL),
('58905', '', '007242', '01', '017', '0000000100', '0000000001', 'N', 'Comtrex day-night', '', '', '', '', 'USA', '7156', '1515', '010', 'USA', '03', '001', '0', '20030630', '20041231', NULL, NULL),
('58906', '', '007242', '01', '017', '0000000001', '0000000001', 'N', 'Comtrex day-night', '', '', '', '', 'USA', '7156', '1515', '010', 'USA', '03', '001', '0', '20030630', '20041231', NULL, NULL),
('58907', '', '007242', '01', '017', '0000000001', '0000000001', 'N', 'Comtrex day-night', '', '', '', '', 'UNS', '7156', '7157', '010', 'USA', '03', '001', '0', '20030630', '20041231', NULL, NULL),
('59502', '', '000200', '01', '012', '0000000100', '0000000062', 'N', 'Ben-u-ron', 'Tabletten', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('59503', '', '000200', '01', '012', '0000000100', '0000000001', 'N', 'Ben-u-ron', 'Tabletten', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('59504', '', '000200', '01', '012', '0000000001', '0000000001', 'N', 'Ben-u-ron', '', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('59505', '', '000200', '01', '012', '0000000001', '0000000001', 'N', 'Ben-u-ron', '', '', '', '', 'UNS', '7156', '7157', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('60241', '', '000200', '01', '005', '0000000100', '0000000001', 'N', 'Tylenol', 'Caplets', '', '', '', 'CHE', '5010', '5011', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('60324', '', '000200', '01', '005', '0000000100', '0000000062', 'N', 'Tylenol', 'Forte tabletten', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('60819', '', '000200', '01', '005', '0000000100', '0000000001', 'N', 'Tylenol', 'Tabletten', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('62308', '', '000291', '01', '001', '0000000001', '0000000001', 'Y', 'Plantago ovata', '', '', '', '', 'N/A', '0', '0', 'UNS', 'UNS', '', '002', '0', '20031212', '20050331', NULL, NULL),
('62437', '', '000469', '01', '001', '0000000001', '0000000001', 'Y', 'Rauwolfia serpentina', '', '', '', '', 'N/A', '0', '0', 'UNS', 'UNS', '', '002', '0', '20031212', '20050331', NULL, NULL),
('65504', '', '000200', '01', '005', '0000000100', '0000000062', 'N', 'Tylenol', 'Extra-strength caplets 500mg', '', '', '', 'CAN', '7156', '12679', 'CAN', 'CAN', '04', '001', '0', '20040315', '20040315', NULL, NULL),
('65505', '', '000200', '01', '005', '0000000100', '0000000001', 'N', 'Tylenol', 'Caplets', '', '', '', 'CAN', '7156', '12679', 'CAN', 'CAN', '04', '001', '0', '20040315', '20040315', NULL, NULL),
('65506', '', '000200', '01', '005', '0000000001', '0000000001', 'N', 'Tylenol', '', '', '', '', 'CAN', '7156', '12679', 'CAN', 'CAN', '04', '001', '0', '20040315', '20040315', NULL, NULL),
('65507', '', '000200', '01', '005', '0000000100', '0000000062', 'N', 'Tylenol', 'Extra-strength tab 500mg', '', '', '', 'CAN', '7156', '12679', 'CAN', 'CAN', '04', '001', '0', '20040315', '20040315', NULL, NULL),
('65508', '', '000200', '01', '005', '0000000100', '0000000001', 'N', 'Tylenol', 'Tab', '', '', '', 'CAN', '7156', '12679', 'CAN', 'CAN', '04', '001', '0', '20040315', '20040315', NULL, NULL),
('68190', '', '012896', '01', '001', '0000000001', '0000000001', 'Y', 'Diphenhydra. hcl w/paracetamol/pseudoeph. hcl', '', '', '', '', 'N/A', '0', '0', '002', 'N/A', '04', '001', '0', '20040521', '20040630', NULL, NULL),
('69036', '', '007242', '01', '022', '0000000001', '0000000001', 'N', 'Tylenol', '', '', '', '', 'UNS', '7156', '7157', '214', 'GBR', '04', '001', '0', '20040614', '20040614', NULL, NULL),
('70144', '', '000200', '01', '003', '0000000125', '0000000062', 'N', 'Panadol', 'Gladde', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70145', '', '000200', '01', '003', '0000000125', '0000000001', 'N', 'Panadol', 'Gladde', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70146', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', '', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70147', '', '000200', '01', '003', '0000000127', '0000000001', 'N', 'Panadol', 'Zapp', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70148', '', '000200', '01', '003', '0000000127', '0000000062', 'N', 'Panadol', 'Zapp', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70149', '', '000200', '01', '003', '0000000350', '0000000202', 'N', 'Panadol', 'Zetpil', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70150', '', '000200', '01', '003', '0000000350', '0000000001', 'N', 'Panadol', 'Zetpil', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70151', '', '000200', '01', '003', '0000000350', '0000000001', 'N', 'Panadol', 'Junior', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70152', '', '000200', '01', '003', '0000000350', '0000000157', 'N', 'Panadol', 'Junior', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70153', '', '000200', '01', '003', '0000000350', '0000000068', 'N', 'Panadol', 'Junior', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70154', '', '000200', '01', '003', '0000000350', '0000000062', 'N', 'Panadol', 'Junior', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('71515', '', '005097', '01', '001', '0000000001', '0000000001', 'N', 'Para-seltzer', '', '', '', '', 'UNS', '7156', '7157', '013', 'GBR', '80', '001', '0', '20040831', '20040831', NULL, NULL),
('71882', '', '000200', '01', '003', '0000000127', '0000000062', 'N', 'Panadol', 'Filmtabletten', '', '', '', 'CHE', '0', '11766', 'CHE', 'CHE', '04', '001', '0', '20040909', '20040909', NULL, NULL),
('72255', '', '000200', '01', '012', '0000000350', '0000000068', 'N', 'Ben-u-ron', '250mg supp. fur kleinkinder', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '04', '001', '0', '20040913', '20040913', NULL, NULL),
('72256', '', '000200', '01', '012', '0000000350', '0000000001', 'N', 'Ben-u-ron', 'Supp. fur kleinkinder', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '04', '001', '0', '20040913', '20040913', NULL, NULL),
('72257', '', '000200', '01', '012', '0000000351', '0000000083', 'N', 'Ben-u-ron', '1000mg supp fur erwachsene', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '04', '001', '0', '20040913', '20040913', NULL, NULL),
('72258', '', '000200', '01', '012', '0000000351', '0000000001', 'N', 'Ben-u-ron', 'Supp fur erwachsene', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '04', '001', '0', '20040913', '20040913', NULL, NULL),
('72608', '', '000200', '01', '005', '0000000251', '0000000013', 'N', 'Tylenol', 'Kinder tropfen', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040914', '20040914', NULL, NULL),
('72609', '', '000200', '01', '005', '0000000251', '0000000001', 'N', 'Tylenol', 'Kinder tropfen', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040914', '20040914', NULL, NULL),
('72911', '', '000200', '01', '005', '0000000350', '0000000013', 'N', 'Tylenol', 'Kinder 100 mg suppositorien', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040915', '20040915', NULL, NULL),
('72912', '', '000200', '01', '005', '0000000350', '0000000001', 'N', 'Tylenol', 'Kinder suppositorien', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040915', '20040915', NULL, NULL),
('72913', '', '000200', '01', '005', '0000000350', '0000000014', 'N', 'Tylenol', 'Kinder 200 mg suppositorien', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040915', '20040915', NULL, NULL),
('74158', '', '000200', '01', '005', '0000000104', '0000000053', 'N', 'Tylenol', 'Kinder kautabletten', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040921', '20040921', NULL, NULL),
('74159', '', '000200', '01', '005', '0000000104', '0000000001', 'N', 'Tylenol', 'Kinder kautabletten', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040921', '20040921', NULL, NULL),
('74540', '', '000200', '01', '012', '0000000260', '0000000014', 'N', 'Ben-u-ron', 'Sirup', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '04', '001', '0', '20040921', '20050930', NULL, NULL),
('74541', '', '000200', '01', '012', '0000000260', '0000000001', 'N', 'Ben-u-ron', 'Sirup', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '04', '001', '0', '20040921', '20040921', NULL, NULL),
('74647', '', '000200', '01', '003', '0000000105', '0000000062', 'N', 'Panadol', 'Brausetabletten', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('74648', '', '000200', '01', '003', '0000000350', '0000000157', 'N', 'Panadol', '125 mg suppositorien', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('74649', '', '000200', '01', '003', '0000000105', '0000000001', 'N', 'Panadol', 'Brausetabletten', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('74650', '', '000200', '01', '003', '0000000350', '0000000001', 'N', 'Panadol', 'Suppositorien', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('74651', '', '000200', '01', '003', '0000000350', '0000000068', 'N', 'Panadol', '250 mg suppositorien', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('74652', '', '000200', '01', '003', '0000000350', '0000000062', 'N', 'Panadol', '500 mg suppositorien', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('74653', '', '000200', '01', '003', '0000000350', '0000000083', 'N', 'Panadol', '1000 mg suppositorien', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('82476', '', '000200', '01', '007', '0000000001', '0000000001', 'N', 'Calpol', '', '', '', '', 'UNS', '7156', '7157', '199', 'IRL', '01', '001', '0', '20041231', '20051231', NULL, NULL),
('85405', '', '000047', '02', '034', '0000000001', '0000000001', 'N', 'Bronchosan', '', '', '', '', 'UNS', '0', '0', 'SVK', 'SVK', '98', '001', '0', '20041231', '20041231', NULL, NULL),
('8755', '', '000429', '01', '001', '0000000001', '0000000001', 'Y', 'Dipyridamole', '', '', '', '', 'N/A', '0', '0', '001', 'N/A', '', '001', '0', '19851231', '19851231', NULL, NULL),
('87551', '', '000200', '01', '002', '0000000001', '0000000001', 'N', 'Dymadon', '', '', '', '', 'UNS', '0', '0', '012', 'AUS', '68', '001', '0', '20041231', '20041231', NULL, NULL),
('87552', '', '000200', '01', '004', '0000000001', '0000000001', 'N', 'Alvedon', '', '', '', '', 'UNS', '0', '7157', '019', 'SWE', '68', '001', '0', '20041231', '20060109', NULL, NULL),
('87553', '', '000200', '01', '006', '0000000001', '0000000001', 'N', 'Tempra', '', '', '', '', 'UNS', '0', '0', '014', 'CAN', '68', '001', '0', '20041231', '20041231', NULL, NULL),
('87554', '', '000200', '01', '008', '0000000001', '0000000001', 'N', 'Atasol', '', '', '', '', 'UNS', '0', '0', '014', 'CAN', '68', '001', '0', '20041231', '20041231', NULL, NULL),
('87555', '', '000200', '01', '010', '0000000001', '0000000001', 'N', 'Acamol', '', '', '', '', 'UNS', '0', '0', '038', 'ISR', '73', '001', '0', '20041231', '20041231', NULL, '2012-11-05 19:26:32'),
('87556', '', '000200', '01', '011', '0000000001', '0000000001', 'N', 'Hedex', '', '', '', '', 'UNS', '0', '0', '016', 'NLD', '73', '001', '0', '20041231', '20041231', NULL, NULL),
('8762', '', '000429', '01', '008', '0000000001', '0000000001', 'N', 'Anginal', '', '', '', '', 'JPN', '0', '11137', '036', 'JPN', '76', '001', '0', '19851231', '19851231', NULL, NULL),
('8783', '', '000429', '01', '001', '0000000001', '0000000001', 'N', 'Dipyridamole', '', '', '', '', 'BEL', '0', '3310', '072', 'BEL', '92', '001', '0', '19930630', '20041231', NULL, NULL),
('90683', '', '000429', '01', '008', '0000000001', '0000000001', 'N', 'Anginal', '', '', '', '', 'UNS', '0', '0', '036', 'JPN', '76', '001', '0', '20041231', '20041231', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_code` varchar(255) DEFAULT NULL,
  `dhis2_code` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `facility_name` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_code`, `dhis2_code`, `district`, `facility_name`, `longitude`, `latitude`) VALUES
('ZW000A01', 'LixFsP9YMT9', 'Harare', 'Avondale', '31.0291', '-17.7883'),
('ZW000A02', 'OBXlKhRkRIb', 'Harare', 'Arcadia', '31.0546', '-17.8468'),
('ZW000A05', 'UiPBTlrwap5', 'Harare', 'Belvedere', '31.0243', '-17.82'),
('ZW000A08', 't0hAcwHFHPq', 'Harare', 'Braeside', '31.0657', '-17.8399'),
('ZW000A09', 'GdL5a5OSZ15', 'Harare', 'Budiriro', '30.9354', '-17.8912'),
('ZW000A0C', 'MjDD6XQksTN', 'Harare', 'Beatrice Infectious', '31.0282', '-17.8601'),
('ZW000A0D', 'NwIjXPvTYN0', 'ha Harare', 'ha Wilkins Infectious Diseases Hospital', '', ''),
('ZW000A0E', 'L8FHOxqCfOa', 'ha Harare', 'ha St Annes Hospital', '', ''),
('ZW000A0F', 'QOSVNeZ8v9H', 'ha Harare', 'ha Avenues Clinic Hospital', '', ''),
('ZW000A10', 'ZRcIuk4ds0W', 'Harare', 'Eastlea', '31.0861', '-17.8256'),
('ZW000A11', 'R9siosZGUNf', 'Harare', 'Glen norah', '30.969', '-17.9058'),
('ZW000A13', 'mUxVNM06Sk3', 'Harare', 'Glen view', '30.9508', '-17.908'),
('ZW000A14', 'JKa3ZBAdM6k', 'ha Harare', 'ha Glen View Satellite Clinic', '', ''),
('ZW000A15', 'FU8Z93y9IuS', 'Harare', 'Greendale', '31.1291', '-17.8105'),
('ZW000A17', 'F4AJYW3LDd7', 'Harare', 'Hatcliffe Polyclinic', '31.1075', '-17.6974'),
('ZW000A18', 'PLxOtSolhG5', 'Harare', 'Highfield', '30.9945', '-17.8846'),
('ZW000A19', 'AYEjUHiuvp5', 'Harare', 'Kambuzuma', '30.9683', '-17.8581'),
('ZW000A20', 'mee4OawYuZj', 'Harare', 'Kuwadzana ', '30.9285', '-17.8323'),
('ZW000A21', 'KDRm4HCFdj9', 'Harare', 'Mabelreign', '30.9987', '-17.7914'),
('ZW000A23', 'kN7DcESNWZp', 'Harare', 'Mabvuku', '31.1971', '-17.8357'),
('ZW000A25', 'E7AXNPjenwo', 'Harare', 'Matapi', '31.0427', '-17.8589'),
('ZW000A26', 's1BtvNQ1vRc', 'Harare', 'Mbare hostels', '31.0393', '-17.8666'),
('ZW000A27', 'G6bGAnRpVN3', 'Harare', 'Mbare ', '31.0355', '-17.8597'),
('ZW000A28', 'EWMnY0PYBjL', 'Harare', 'Mt pleasant', '31.0458', '-17.7691'),
('ZW000A29', 'MNpfnKkWMnl', 'Harare', 'Mufakose', '30.9297', '-17.8669'),
('ZW000A33', 'mOG4It93hxE', 'ha Harare', 'ha Rujeko PolyClinic', '', ''),
('ZW000A34', 'GLqagpqiJ55', 'Harare', 'Rutsanana', '30.9861', '-17.9065'),
('ZW000A35', 'fbumlk4A6cT', 'Harare', 'Southerton', '31.0089', '-17.8663'),
('ZW000A37', 'UQfTSqwDWuU', 'Harare', 'Sunningdale', '31.0543', '-17.8684'),
('ZW000A38', 'UM3CeWRmpig', 'Harare', 'Tafara', '31.2135', '-17.8316'),
('ZW000A39', 'RG4VU0RvA6Q', 'Harare', 'Warren Park', '30.9782', '-17.8338'),
('ZW000A41', 'mwJTr9zLk7k', 'Harare', 'Waterfalls', '31.0308', '-17.8903'),
('ZW000A42', 'mSu42uQEjOs', 'Harare', 'Western Triangle', '30.9804', '-17.8949'),
('ZW000A44', 'uToHmSh0xud', 'Harare', 'Hatfield', '31.0864', '-17.8787'),
('ZW000A45', 'dhH6KRKUf1c', 'Harare', 'Malborough', '30.9981', '-17.7568'),
('ZW000A46', 'VyjlnYDk0Qv', 'Harare', 'Highlands ', '31.0856', '-17.8187'),
('ZW000A47', 'ubKnqpQFMbU', 'ha Eastern District', 'ha Mabvuku Sate', '', ''),
('ZW000A48', 'H2meFOjYe4f', 'ha Eastern District', 'ha ZPS Harare Central Prison Hospital', '', ''),
('ZW000A52', 'EvB19FciC9r', 'Harare', 'Highlands ', '31.0891', '-17.7997'),
('ZW000A53', 'yuE9DIrPeww', 'Harare', 'Hopley', '30.99', '-17.9249'),
('ZW000AP1', 'RUUfP2v2ixg', 'ha Northern District', 'ha Newlands Clinic', '', ''),
('ZW000B01', 'kVEQJTFoFoA', 'Chitungwiza', 'Seke South', '31.0763', '-18.0314'),
('ZW000B02', 'tPiQaqp8wX7', 'Chitungwiza', 'Seke North', '31.0943', '-18.0152'),
('ZW000B03', 'JHGXfAqaDN6', 'Chitungwiza', 'St Mary\'s', '31.0427', '-17.9947'),
('ZW000B04', 'MviCUcbWstw', 'Chitungwiza', 'Zengeza 3', '31.0582', '-18.0066'),
('ZW000B0B', 'OREiGho2b9G', 'ha Chitungwiza Urban District', 'ha South Medical Hospital', '', ''),
('ZW000B0C', 'fj0LjOpeVrO', 'ha Chitungwiza Urban District', 'ha St Michaels Clinic', '', ''),
('ZW000B0D', 'P1Yxb7N3wvJ', 'Chitungwiza', 'Manyame 24Hr', '31.0427', '-17.9908'),
('ZW000C0C', 'UuHcaRFt2ZE', 'Chitungwiza', 'Chitungwiza', '31.0628', '-18.0176'),
('ZW000D0D', 'egktPmYQEns', 'Harare', 'Harare', '31.0128', '-17.8609'),
('ZW000E0B', 'Hk3MEywVXHw', 'ha Harare', 'ha Harare Psychiatric', '', ''),
('ZW010101', 'CV4IXOSr5ky', 'Buhera', 'Berenyazvidzi', '31.7377', '-19.05373'),
('ZW010102', 'TSZXbU6qfEv', 'Buhera', 'Betera', '32.0012207', '-19.37372'),
('ZW010103', 'BD1Jfvjv9U2', 'Buhera', 'Madzimbashuro', '31.65630913', '-19.43503'),
('ZW010104', 'Z3zy2PuT7Bd', 'Buhera', 'Mombeyarara', '31.60378075', '-19.20428'),
('ZW010105', 'm7DEma7WFue', 'Buhera', 'Murwira', '31.83353043', '-19.53361'),
('ZW010106', 'OhbIh1Vr8da', 'Buhera', 'Zangama', '32.11957932', '-19.56878'),
('ZW01010A', 'AmshadDUFjP', 'Buhera', 'Buhera', '31.43592072', '-19.33897'),
('ZW01010B', 'caxcNeLNWje', 'Buhera', 'Birchenough', '32.33853149', '-19.97181'),
('ZW01010C', 'crCCkYOvmme', 'Buhera', 'Murambinda', '31.65555954', '-19.26678'),
('ZW010116', 'SfjgNrMMfET', 'Buhera', 'Mudawose', '32.09959', '-19.47415'),
('ZW010117', 'p7YSxA5z5XM', 'Buhera', 'Chimbudzi', '31.8042202', '-19.47289'),
('ZW010118', 'BPTlzlZSXck', 'Buhera', 'Garamwera', '31.40218925', '-19.20661'),
('ZW010119', 'hSYoXS16XPR', 'Buhera', 'Munyanyi', '31.7346096', '-19.15669'),
('ZW010124', 'qB4aqkr5Zan', 'Buhera', 'Mudanda', '31.71755981', '-19.39111'),
('ZW010125', 'NzioLDOMyHi', 'Buhera', 'Bangure', '31.77325058', '-19.53564'),
('ZW010126', 'jH46ybtyEXK', 'Buhera', 'Chabata', '32.15781021', '-19.78603'),
('ZW010127', 'hNoV44tWsEW', 'Buhera', 'Chapanduka', '32.1689415', '-19.68356'),
('ZW010128', 'twU87JyEeTq', 'Buhera', 'Chapwanya', '31.35243988', '-19.17197'),
('ZW010129', 'ShBRKNawnxh', 'Buhera', 'Chirozva', '32.00093842', '-19.45672'),
('ZW010130', 'veHcLRZXMge', 'Buhera', 'Chiwenga', '31.98941994', '-19.23839'),
('ZW010131', 'QOUhAoaWRDk', 'Buhera', 'Chiweshe', '31.88455963', '-19.22269'),
('ZW010132', 'bEJ6QvvP0jI', 'Buhera', 'Gunura', '32.30699921', '-19.87439'),
('ZW010133', 'qJJ6I9d7TGu', 'Buhera', 'Gombe', '31.53335953', '-19.23786'),
('ZW010134', 'dudLclDI9eN', 'Buhera', 'Mutepfe', '31.96869087', '-19.76764'),
('ZW010135', 'jlVfnFAU0q4', 'Buhera', 'Mutiusinazita', '32.06731033', '-19.72489'),
('ZW010136', 'u4hcDaNwITk', 'Buhera', 'Muzokomba', '31.97167015', '-19.58381'),
('ZW010137', 'nI7iCnzqfvW', 'Buhera', 'Nerutanga', '31.35038948', '-19.28703'),
('ZW010138', 'cDMh15Lx49d', 'Buhera', 'Rambanapasi', '31.65449905', '-19.13994'),
('ZW010139', 'aFSG27wnzQY', 'Buhera', 'Chawatama', '31.5992', '-19.13214'),
('ZW010175', 'dPK4rB0KqA7', 'Buhera', 'Dorowa', '31.7682209', '-19.05431'),
('ZW010201', 'qVjkv57fvWb', 'Chimanimani', 'Bumba', '32.63581085', '-19.65556'),
('ZW010202', 'K3ntSeDRPaA', 'Chimanimani', 'Changazi', '32.47256088', '-19.93394'),
('ZW010203', 'H8cEwsCKC4t', 'Chimanimani', 'Chayamiti', '32.55456162', '-19.66983'),
('ZW010204', 'PUNmyNqtxNl', 'Chimanimani', 'Chikukwa', '32.93732834', '-19.72056'),
('ZW010205', 'WAj0s2JUSP5', 'Chimanimani', 'Nyahode', '32.82271957', '-19.94106'),
('ZW010208', 'OuEqlnfUt7c', 'Chimanimani', 'Muchadziya', '32.9486084', '-20.01139'),
('ZW01020A', 'rpR9uJUifr4', 'Chimanimani', 'Biriwiri', '32.67343903', '-19.79031'),
('ZW01020B', 'GtuPUhZTkij', 'Chimanimani', 'Nyanyadzi', '32.42192078', '-19.78694'),
('ZW01020C', 'LS2Iy7H3Kx3', 'Chimanimani', 'Mutambara', '32.68603134', '-19.53492'),
('ZW01020D', 'w1KvMDHi7cA', 'Chimanimani', 'Rusitu', '32.86471939', '-20.03361'),
('ZW01020E', 'H2nBLDGbyPZ', 'Chimanimani', 'Chimanimani Hospital', '32.8576', '-19.81937'),
('ZW010225', 'vo5ZD5eTTjh', 'Chimanimani', 'Cashel', '32.7883606', '-19.54161'),
('ZW010226', 'Cc5fCsfiMeA', 'Chimanimani', 'Chakohwa', '32.51755905', '-19.55397'),
('ZW010227', 'Aiidz5NIu4q', 'Chimanimani', 'Chikwakwa', '32.57313919', '-19.85436'),
('ZW010229', 'ScPDUtDOQ7r', 'Chimanimani', 'Gudyanga', '32.40428162', '-19.86911'),
('ZW010230', 'f9V9wkQROiw', 'Chimanimani', 'Mutsvangwa', '32.91249847', '-20.07528'),
('ZW010231', 'CQ3o6mYp1Zp', 'Chimanimani', 'Ngorima', '32.85749817', '-20.05167'),
('ZW010232', 'dQUAeiEDFpr', 'Chimanimani', 'Shinja', '32.60668945', '-19.75481'),
('ZW010251', 'vTaoplhoJM3', 'Chimanimani', 'ARDA Rusitu', '32.78583145', '-20.03472'),
('ZW010252', 'N78su57cU07', 'Chimanimani', 'Martin', '32.93402863', '-19.76719'),
('ZW010261', 'L7P4zrK5k64', 'Chimanimani', 'Charter', '32.80675125', '-19.83536'),
('ZW010262', 'yhlaqZWt7N1', 'Chimanimani', 'Chisengu', '32.88586044', '-19.90414'),
('ZW010263', 'Aqp0UdKoD2W', 'ma Chimanimani District', 'ma Gwendingwe Clinic', '', ''),
('ZW010264', 'PxvvQMGB0kx', 'Chimanimani', 'Roscommon', '32.81055832', '-20.02167'),
('ZW010265', 'UibBP7xjfCl', 'Chimanimani', 'Tarka', '32.93761063', '-19.97231'),
('ZW010266', 'rajvxcpGpWt', 'Chimanimani', 'Tilbury', '32.97296906', '-19.90747'),
('ZW010303', 'kMKIwh4EQPi', 'Chipinge', 'Chinyamukwaka', '32.3608284', '-20.91722'),
('ZW010306', 'Rc6mdgR6jQc', 'Chipinge', 'Kopera', '32.77000046', '-20.32139'),
('ZW010307', 'Dlm5vVPH4xZ', 'Chipinge', 'Mabeye', '32.36027908', '-20.90194'),
('ZW010309', 'arxXEDOObfS', 'Chipinge', 'Mahenye', '32.39283', '-21.25018'),
('ZW01030A', 'prJwfHo35UK', 'Chipinge', 'Chipinge', '32.61917114', '-20.19583'),
('ZW01030B', 'eh9v7iWzf12', 'Chipinge', 'Chikore', '32.49777985', '-20.43694'),
('ZW01030C', 'iwiIo0ksDLj', 'Chipinge', 'Mt. Selinda', '32.70306015', '-20.42389'),
('ZW01030D', 'eeOndYZ0Czy', 'Chipinge', 'St. Peters', '32.21527863', '-20.77111'),
('ZW010311', 'LaAarcpXdJr', 'Chipinge', 'Musirwizi', '32.5802803', '-20.46028'),
('ZW010312', 'GSO7OZtivM0', 'Chipinge', 'Paidamoyo', '32.80582809', '-20.11056'),
('ZW010314', 'Knr1EHQbGwh', 'Chipinge', 'Tanganda', '32.35055923', '-20.11056'),
('ZW010315', 'jq5ZU3Veftn', 'Chipinge', 'Tongogara', '32.30638886', '-20.34806'),
('ZW010316', 'IIth6fUG1GG', 'Chipinge', 'Tuzuka', '32.484827', '-20.541155'),
('ZW010317', 'QIrP8yI4al9', 'Chipinge', 'ZRP-Chipinge', '32.62221909', '-20.19917'),
('ZW010318', 'mQHHLJQlIZ3', 'ma Chipinge District', 'ma ZPS Chipinge Prison Clinic', '', ''),
('ZW010325', 'moQZ9tvpYvt', 'Chipinge', 'Chibuwe', '32.30083084', '-20.46417'),
('ZW010326', 'kmamm2DHAkx', 'ma Chipinge District', 'ma Gumira Clinic', '', ''),
('ZW010327', 'pGQjbvHMTPK', 'Chipinge', 'Hwakata', '32.48556137', '-20.82556'),
('ZW010328', 'FbavS0QLZNB', 'Chipinge', 'Kondo', '32.38528061', '-20.39806'),
('ZW010329', 'vkNmGPfwSDf', 'Chipinge', 'Madhuka', '32.36333084', '-20.72111'),
('ZW010330', 'TSXhr5Oon4K', 'Chipinge', 'Manzvire', '32.34027863', '-20.77556'),
('ZW010331', 'mY5MuS8ibsq', 'Chipinge', 'Musani', '32.40333176', '-20.08361'),
('ZW010332', 'hKl4NCF7eRF', 'Chipinge', 'Mutandahwe', '32.19499969', '-21.01056'),
('ZW010333', 'WDjdDW5YM9t', 'Chipinge', 'Mutema', '32.36027908', '-20.13417'),
('ZW010334', 'h0HY9qChF4k', 'Chipinge', 'Ngaome', '32.56972122', '-19.98972'),
('ZW010335', 'wRKMZ42iW4k', 'Chipinge', 'Rimbi', '32.39305878', '-20.5475'),
('ZW010336', 'PnK6HVt1SRm', 'Chipinge', 'Vheneka', '32.1538887', '-20.93722'),
('ZW010337', 'aJ0Yovbj54f', 'Chipinge', 'Zamchiya', '32.47750092', '-20.69972'),
('ZW010338', 'cfyzxG8NXg5', 'Chipinge', 'Checheche', '32.61000061', '-20.03722'),
('ZW010339', 'TKrmz8yHMzD', 'Chipinge', 'Chisuma', '32.36027908', '-21.05306'),
('ZW010340', 'JlS9FkKe7Im', 'Chipinge', 'Muparadze', '32.27666855', '-21.07389'),
('ZW010345', 'GICpKH9qAO3', 'Chipinge', 'Chipangayi', '32.3533287', '-20.26306'),
('ZW010346', 'SzA0jNDxgVy', 'Chipinge', 'Chiriga', '32.608623', '-20.276047'),
('ZW010347', 'WDhJhhGwrLR', 'Chipinge', 'Gaza', '32.63943863', '-20.19194'),
('ZW010348', 'SVtVD1Rl6la', 'Chipinge', 'Junction Gate', '32.78416824', '-20.16056'),
('ZW010349', 'NBVeWREYjSt', 'Chipinge', 'Chipinge Town ', '32.625347', '-20.19111'),
('ZW010350', 'eTm3CJ9XKCY', 'Chipinge', 'Tamandai', '32.83279', '-20.30563'),
('ZW010351', 'ABH9FxABdpN', 'ma Chipinge District', 'ma Nyunga Clinic', '', ''),
('ZW010361', 'wp2D6uvatyy', 'ma Chipinge District', 'ma Arda Chisumbanje Clinic', '', ''),
('ZW010362', 'LRrRucSyV0u', 'Chipinge', 'Clear Water', '32.72721863', '-20.10889'),
('ZW010364', 'eA9SVqmE5dM', 'Chipinge', 'Jersey', '32.67972183', '-20.52528'),
('ZW010365', 'wjp2vgBsUf3', 'Chipinge', 'ARDA-Mid-Save', '32.37889099', '-20.05167'),
('ZW010366', 'fh1XKCyfkGN', 'Chipinge', 'New Year Gift', '32.57444', '-20.09583'),
('ZW010367', 'wlJbhvl1hXM', 'Chipinge', 'Silverstream', '32.68444061', '-19.98972'),
('ZW010369', 'ocZcHjwY60I', 'ma Chipinge District', 'ma Southdown Clinic', '', ''),
('ZW010371', 'vkZIaoGo7gn', 'Chipinge', 'Ratelshoek', '32.80611038', '-20.24639'),
('ZW010372', 'HbCkQDFnwXR', 'Chipinge', 'Zona', '32.73611069', '-20.43722'),
('ZW010390', 'CuuhL6E9mz8', 'Chipinge', 'Gwenzi', '32.66249847', '-20.53'),
('ZW010401', 'lzja6Z7gLlI', 'Makoni', 'Bamba', '32.30622101', '-18.20478'),
('ZW010402', 'Flp3vCTgDrH', 'Makoni', 'Chikobvore', '32.15671921', '-18.90203'),
('ZW010403', 'GP1o1ImE8kr', 'Makoni', 'Chinhenga', '32.50246811', '-18.03619'),
('ZW010404', 'QK63B8hEjh5', 'Makoni', 'Bingaguru', '32.3889389', '-18.22244'),
('ZW010405', 's6XW9zO319h', 'Makoni', 'Chinyika 2', '32.289355', '-18.143585'),
('ZW010406', 'ueyLZw0eNlp', 'Makoni', 'Chinyudze', '32.20046997', '-18.18653'),
('ZW010407', 'TzHvI00E7RH', 'Makoni', 'Gorubi Springs', '32.23431', '-18.67112'),
('ZW010409', 'CSEp89EQzMI', 'Makoni', 'Gowakowa', '32.33406067', '-18.08644'),
('ZW01040A', 'DC7Rz9IEw9Q', 'Makoni', 'Rusape', '32.13636017', '-18.53892'),
('ZW01040B', 'x34uXkCe1ET', 'Makoni', 'Weya', '32.15196991', '-18.04158'),
('ZW01040C', 'vvIjMN898IB', 'Makoni', 'Makoni', '32.38877869', '-18.61997'),
('ZW01040D', 'KoIw7LDGj9f', 'Makoni', 'Nedevedzo', '31.87491989', '-18.55028'),
('ZW01040E', 'vubZWOdIwQU', 'Makoni', 'St Micheals', '32.45042038', '-17.90319'),
('ZW01040F', 'zoRhmzvxj3m', 'Makoni', 'St Theresa', '31.91918945', '-18.58714'),
('ZW010410', 'pGZ8wBu4TVD', 'Makoni', 'Katsenga', '32.00347137', '-18.72456'),
('ZW010411', 'nusxH4dUCBX', 'Makoni', 'Maparura', '32.40510941', '-18.00294'),
('ZW010412', 'bEmIi49FX23', 'Makoni', 'Masvosva', '31.85693932', '-18.70275'),
('ZW010413', 'qNM0xkDjd2P', 'Makoni', 'Matotwe', '32.36692047', '-18.52292'),
('ZW010414', 'HHeHDfrf9G9', 'Makoni', 'Mayo1', '32.27336121', '-17.87047'),
('ZW010415', 'cYGPBGuZmRf', 'Makoni', 'Mayo2', '32.3517189', '-17.78494'),
('ZW010418', 'JOtTKeBqxSg', 'Makoni', 'Nyahowe', '32.4030304', '-17.93886'),
('ZW010419', 'sirWV0cn0Tt', 'Makoni', 'Nyahukwe', '32.3223114', '-18.46983'),
('ZW010420', 'Nbg5jfWxWRm', 'Makoni', 'Nyamukamani', '32.1720314', '-18.09111'),
('ZW010425', 'o1koaovBpfp', 'Makoni', 'Chiduku', '31.9347496', '-18.82058'),
('ZW010426', 'QY6PYYlyHc3', 'Makoni', 'Chikore', '32.50703049', '-17.72186'),
('ZW010427', 'M63d8AhC8z9', 'Makoni', 'Nyazura', '32.17139053', '-18.72089'),
('ZW010428', 'CP661imetWS', 'Makoni', 'Dowa', '31.80269051', '-18.52369'),
('ZW010429', 'gwWyz9Yf0k4', 'Makoni', 'Dumbamwe', '32.38531113', '-18.42167'),
('ZW010430', 'Aw0gLK0LUg8', 'Makoni', 'Matsika', '31.95266914', '-18.70075'),
('ZW010431', 'ZNRqWYbfd15', 'Makoni', 'Nyamidzi', '32.08721924', '-18.93989'),
('ZW010432', 'VfrcAWmDlIN', 'Makoni', 'Mukamba', '32.00271988', '-18.86703'),
('ZW010433', 'rnPGEznV0Bb', 'Makoni', 'Rukweza', '32.08377838', '-18.8045'),
('ZW010434', 'BotP1Hanr0I', 'Makoni', 'Tandi', '32.02088928', '-18.56839'),
('ZW010435', 'Ixfqop6Lj7J', 'Makoni', 'Tariro', '32.0839386', '-18.73558'),
('ZW010436', 'MKcrk2b2e4G', 'Makoni', 'Tsanzaguru', '32.10678101', '-18.61947'),
('ZW010437', 'giUlAqwyIdB', 'Makoni', 'Era Mine', '32.27172089', '-18.23656'),
('ZW010438', 'vyqimrfz51a', 'Makoni', 'Maurice Nyagumbo', '32.33710861', '-18.67436'),
('ZW010439', 'CZWF01QsFtT', 'ma Makoni District', 'ma Mufusire Clinic', '', ''),
('ZW010440', 'kebWUmGSpPD', 'Makoni', 'Headlands', '32.03989029', '-18.28597'),
('ZW010441', 'NsczMWPrPgN', 'Makoni', 'Mubvurungwa', '31.9343605', '-18.53472'),
('ZW010442', 'yEQzNamH3uC', 'Makoni', 'Vengere', '32.11877823', '-18.55675'),
('ZW010443', 'fKZgpZN6GBl', 'Makoni', 'Ringanayi', '32.43861008', '-18.55803'),
('ZW010444', 'HUOuqNzR6Aq', 'Makoni', 'Mavhudzi', '32.14423', '-18.72616'),
('ZW010445', 'W9sqarekapD', 'Makoni', 'Chinyadza', '32.02244186', '-18.67194'),
('ZW010446', 'jqirYc5fbgN', 'Makoni', 'Nyamusosa', '32.26243', '-18.00061'),
('ZW010447', 'xqxQzc5uJQ5', 'ma Makoni District', 'ma Sangano Clinic', '', ''),
('ZW010474', 'nOJs765REgP', 'ma Makoni District', 'ma ZPS Rusape Prison Clinic', '', ''),
('ZW010474', 'nOJs765REgP', 'Makoni', 'RUSAPE PRISON', '', ''),
('ZW010475', 'PzFSuCtPXpX', 'ma Makoni District', 'ma Rusape ZRP Clinic', '', ''),
('ZW010481', 'tgEcmH86yG7', 'Makoni', 'MUKUWAPASI REHAB', '', ''),
('ZW010482', 'tgEcmH86yG7', 'Makoni', 'Mukuwapasi', '32.21847153', '-18.50592'),
('ZW010491', 'Hgy0mKJsd6k', 'Makoni', 'Nyazura', '32.22460938', '-18.75678'),
('ZW010492', 'Q4pYhjAOvDW', 'Makoni', 'Anorldine', '32.20314026', '-18.23539'),
('ZW010501', 'nX2wdonp9qm', 'Mutare', 'Bwizi', '32.43558121', '-19.35569'),
('ZW010502', 'UM6l3jCXCeU', 'Mutare', 'Chiadzwa', '32.3373909', '-19.61906'),
('ZW010503', 'm6dVqEaLMBZ', 'Mutare', 'Mavhiza', '32.23868942', '-19.50536'),
('ZW010504', 'vvbLDyFCjWc', 'Mutare', 'Gutaurare', '32.61811066', '-19.37139'),
('ZW010505', 'Aqp0UdKoD2W', 'ma Mutare District', 'ma Gwindingwi Rural Health Centre', '32.65383148', '-19.9385'),
('ZW010506', 'O1fCNuvsfI3', 'Mutare', 'Muromo', '32.55638886', '-19.38897'),
('ZW010507', 'YsNestJGSg9', 'Mutare', 'St Welburgh', '32.71035', '-19.1165'),
('ZW010508', 'OHEf3RcLGXc', 'Mutare', 'Chiwere', '32.25064087', '-19.03914'),
('ZW010509', 'jeG6aR2JPR9', 'Mutare', 'Mt Zuma', '32.13581085', '-19.10497'),
('ZW01050A', 'RCcVLhP0OOz', 'Mutare', 'Mutare', '32.67047119', '-18.96972'),
('ZW01050B', 'SAAdC9MLpwY', 'ma Mutare City', 'ma Mutare Infectious Disease Hospital', '', ''),
('ZW01050C', 'bvHAxX0E4E3', 'Mutare', 'Sakubva', '32.65156174', '-18.98944'),
('ZW01050E', 'BmQ8l3yqaT3', 'Mutare', 'Marange', '32.27425003', '-19.25336'),
('ZW01050F', 'FQUAPwfgFog', 'Mutare', 'St Andrews', '32.34072113', '-19.42161'),
('ZW01050G', 'f7IkOT2Fpg5', 'Mutare', 'St Joseph\'s', '32.62497', '-18.99814'),
('ZW010510', 'nur0AEwM4OY', 'ma Mutare District', 'ma Munyarari Clinic', '', ''),
('ZW010511', 'B3QCBw575UP', 'Mutare', 'Nyagundi', '32.36872101', '-19.11756'),
('ZW010512', 'j5z5Vg20MEn', 'Mutare', 'Nyamazura', '32.41685867', '-18.88764'),
('ZW010513', 'k9ZNxyUdCX2', 'Mutare', 'Zvipiripiri', '32.1910286', '-19.33794'),
('ZW010515', 'VBQGAnJefui', 'Mutare', 'Vumba', '32.81328', '-19.04207'),
('ZW010516', 'OlBZHeF4Ilo', 'ma Mutare District', 'ma Mutare ZRP Clinic', '', ''),
('ZW010519', 'DgIsJlyh7ei', 'Mutare', 'Chitora', '32.62321', '-19.32544'),
('ZW010520', 'CfSF8vkX9AT', 'Mutare', 'Matanda', '32.40403', '-19.24827'),
('ZW010521', 'XD3SG9HU45u', 'Mutare', 'Lee Kul', '32.28185', '-18.87699'),
('ZW010523', 'MVBUcdeZX5s', 'ma Mutare District', 'ma Army Dependent Clinic', '', ''),
('ZW010524', 'wzDAn1eA5kd', 'Mutare', 'ARDA Odzi', '32.36755', '-18.97483'),
('ZW010525', 'ztdSiPmI0jW', 'Mutare', 'Bakorenhema', '32.35144043', '-19.30542'),
('ZW010526', 'y0apJPdoLjN', 'Mutare', 'Berzerly Bridge', '32.4892807', '-19.25094'),
('ZW010527', 'm8DAMDBYPtN', 'Mutare', 'Chipfatsura', '32.28535843', '-19.17347'),
('ZW010529', 'SXQUXZcRPpT', 'Mutare', 'Chitakatira', '32.68661118', '-19.13406'),
('ZW010530', 'aguTJqpXxlw', 'Mutare', 'Mambwere', '32.63513947', '-19.28447'),
('ZW010531', 'a53FjMa0Ant', 'Mutare', 'Masasi', '32.42430878', '-19.43903'),
('ZW010532', 'Tt1gpPLHadg', 'Mutare', 'Prison Farm', '32.57973', '-18.96491'),
('ZW010533', 'wGXvOjmu96h', 'Mutare', 'Mukwada', '32.35535812', '-19.52181'),
('ZW010534', 'sWYcABebL7i', 'Mutare', 'Chitaka', '32.48403168', '-19.12181'),
('ZW010535', 'ODObWEFaXym', 'Mutare', 'Mushunje', '32.44081116', '-19.16811'),
('ZW010536', 'LrvqVkxFVsI', 'Mutare', 'Nzvenga', '32.37125015', '-19.35089'),
('ZW010537', 'XZzgzuU96aH', 'Mutare', 'Rowa', '32.62435913', '-19.16856'),
('ZW010538', 'eFmKu8tm7j9', 'Mutare', 'Odzi', '32.38896942', '-18.96922'),
('ZW010539', 'tQoib218u3c', 'Mutare', 'Zimunya', '32.62342072', '-19.10036'),
('ZW010540', 'qeXexLypgiq', 'Mutare', 'Zumbare', '32.15258026', '-19.22053'),
('ZW010541', 'wsesGoK4rZD', 'Mutare', 'Dora', '32.52222061', '-19.07036'),
('ZW010543', 'G3ZYErhtakQ', 'Mutare', 'Chishingwi', '32.40555954', '-19.603'),
('ZW010544', 'sjqxywFwPPr', 'Mutare', 'Chipendeke', '32.7040596', '-19.32369'),
('ZW010545', 'bO62hSAscwQ', 'Mutare', 'Burma Valley', '32.80686188', '-19.20719'),
('ZW010560', 'acZeUEYvJu9', 'ma Mutare City', 'ma Hob House Clinic', '', ''),
('ZW010561', 'pyvuKuH8RCC', 'Mutare', 'City Clinic', '32.67074966', '-18.98767'),
('ZW010562', 'XhRWmvXHxeR', 'Mutare', 'Chikanga', '32.64107895', '-18.96889'),
('ZW010563', 'MrKXsFnrL8j', 'Mutare', 'Dangamvura', '32.6001091', '-19.00678'),
('ZW010564', 'hz6M0qg1e2n', 'Mutare', 'Sakubva Health Centre', '32.64739', '-18.99012'),
('ZW010565', 'qRroK8G1NdU', 'Mutare', 'Florida', '32.65243912', '-18.97078'),
('ZW010566', 'h19bKSYBhsC', 'Mutare', 'Fernvalley', '32.65113831', '-19.03792'),
('ZW010584', 'dtvjiz5g22E', 'ma Mutare District', 'ma Mapofu Clinic', '', ''),
('ZW010591', 'YP2FZTjfV0z', 'Mutare', 'Chikwariro', '32.30678177', '-19.33714'),
('ZW010601', 'cHV2bfs6fO7', 'Mutasa', 'Chavhanga', '33.0032196', '-18.23625'),
('ZW010602', 'ZEKFKqDov1x', 'Mutasa', 'Rupinda', '32.85655975', '-18.63775'),
('ZW010603', 'x6fzK3lC31k', 'Mutasa', 'Sherukuru', '32.53636169', '-18.64078'),
('ZW01060A', 'bUaxaZ6EBrj', 'Mutasa', 'Tsonzo', '32.6032486', '-18.68836'),
('ZW01060B', 'rBQzyDOllhb', 'Mutasa', 'Bonda', '32.60338974', '-18.45428'),
('ZW01060C', 'Eej6PK0ibK9', 'Mutasa', 'Old Mutare', '32.58803177', '-18.90747'),
('ZW01060D', 'GllfEqmEhOT', 'Mutasa', 'St Barbaras', '32.47352982', '-18.50311'),
('ZW01060E', 'Jj8DNk112jl', 'Mutasa', 'Triashill', '32.47303009', '-18.43531'),
('ZW01060F', 'Dh0nRziYm59', 'Mutasa', 'Hauna', '32.85197067', '-18.49153'),
('ZW010625', 'hWY5bWPfKN9', 'Mutasa', 'Chitombo', '32.78974915', '-18.55269'),
('ZW010626', 'Ues29NW1eYO', 'Mutasa', 'Guta', '32.65293884', '-18.74136'),
('ZW010627', 'E3H6wlL5tV2', 'Mutasa', 'Hauna', '32.85083008', '-18.502'),
('ZW010628', 'YT86mnonZzz', 'Mutasa', 'Mundeya', '32.98957825', '-18.4225'),
('ZW010629', 'hX6rd1u0c3e', 'Mutasa', 'Mupotedzi', '32.80147171', '-18.57139'),
('ZW010630', 'ATW7rLLuxXS', 'Mutasa', 'Mt Jenya', '32.50263977', '-18.75283'),
('ZW010631', 'uuN5RuVkZjK', 'Mutasa', 'Mutasa', '32.65393829', '-18.55447'),
('ZW010632', 'YHNrgUBY7iS', 'Mutasa', 'Moyoweshumba', '32.67235947', '-18.67472'),
('ZW010633', 'GDqFwDpZc0S', 'Mutasa', 'Ngarura', '32.87152863', '-18.58803'),
('ZW010635', 'xvuWT8iCSZz', 'Mutasa', 'Zindi', '32.93635941', '-18.38922'),
('ZW010636', 'PVqBMEITGZG', 'Mutasa', 'Sachisuko', '33.00214005', '-18.38981'),
('ZW010637', 'n5tQj1nHrSp', 'Mutasa', 'Sadziwa', '32.55828094', '-18.50056'),
('ZW010638', 'stQ9t1Klkv0', 'Mutasa', 'Sagambe', '33.00286102', '-18.32481'),
('ZW010639', 'rC42Q9ltl0P', 'Mutasa', 'Sahumani', '32.82027817', '-18.55569'),
('ZW010640', 'WYa9kpJoGlO', 'Mutasa', 'Sakupwanya', '32.65560913', '-18.60747'),
('ZW010641', 'wV5yUxxZ6tB', 'Mutasa', 'Samanga', '32.75527954', '-18.53369'),
('ZW010642', 'SamIzZkG4Sg', 'Mutasa', 'Samaringa', '32.78430939', '-18.62308'),
('ZW010643', 'urarwO4MT3n', 'Mutasa', 'Zongoro', '32.58778', '-18.78931'),
('ZW010645', 'WTG6oEnR7sN', 'Mutasa', 'Chinamasa', '32.57098', '-18.57828'),
('ZW010664', 'ChudQ17X9zf', 'Mutasa', 'ma Eastern Highlands Plantation Clinic', '32.95180893', '-18.35414'),
('ZW010665', 'vD0cmk3nKr1', 'Mutasa', 'Haparare', '32.47261047', '-18.60322'),
('ZW010667', 'ND24v6EuXVS', 'Mutasa', 'Katiyo', '33.03453064', '-18.37128'),
('ZW010668', 'FFKaCUsSCQj', 'Mutasa', 'ma Selbourne/Nyanga Pine Clinic', '32.65771', '-18.53106'),
('ZW010669', 'AoSdsIPLKWX', 'Mutasa', 'Drenane', '32.70674896', '-18.76931'),
('ZW010670', 'k4plSoMGa0V', 'Mutasa', 'Imbeza', '32.72091', '-18.91068'),
('ZW010671', 'yGoo44PvDXg', 'Mutasa', 'Red Wing', '32.67213821', '-18.871'),
('ZW010672', 'GGQhftNDqxV', 'Mutasa', 'Sheba', '32.80480957', '-18.77103'),
('ZW010673', 'ejTzO8trGcX', 'Mutasa', 'Stapleford', '32.82181168', '-18.74047'),
('ZW010691', 'CjhuibtqJ9P', 'Mutasa', 'Gatsi', '32.81785965', '-18.52333'),
('ZW010692', 'MwBIBpbaKVP', 'Mutasa', 'ma Honde Mission Clinic', '32.76974869', '-18.60322'),
('ZW010693', 'TLygdaSGpts', 'Mutasa', 'St Augustines', '32.6554985', '-18.87431'),
('ZW010694', 'uXG7AmdmYq1', 'Mutasa', 'St Peter\'s Mandeya', '32.93996811', '-18.45806'),
('ZW010696', 'aBLvPMrMUva', 'Mutasa', 'Mapara', '32.65219116', '-18.78369'),
('ZW010697', 'kdjqcumgZK9', 'Mutasa', 'Jombe', '32.70233154', '-18.63772'),
('ZW010698', 'RcSUy8MhT4H', 'Mutasa', 'Premier', '32.54691', '-18.90384'),
('ZW010702', 'RVTCuLOTnIC', 'Nyanga', 'Dombo', '32.43803024', '-18.35139'),
('ZW010703', 'cGLXwIb6qa3', 'Nyanga', 'Fombe', '32.99074936', '-17.33472'),
('ZW010704', 'TrTateV4FpE', 'Nyanga', 'Gairezi', '32.95471954', '-18.10139'),
('ZW010705', 'Y6f51RnIFBf', 'Nyanga', 'Gotekote', '32.67319107', '-17.71917'),
('ZW010706', 'i955VY3NXvb', 'Nyanga', 'Nyarumvurwe', '32.65750122', '-18.2235'),
('ZW010707', 'qUajs0mhlbX', 'Nyanga', 'Matize', '32.92385864', '-17.57161'),
('ZW010709', 'TPQQomko5Wj', 'Nyanga', 'Nyamombe', '32.55833054', '-17.75681'),
('ZW01070A', 'MZykUUn5dYo', 'Nyanga', 'Nyanga', '32.75753021', '-18.22828'),
('ZW01070B', 'cdFeP19JNZ0', 'Nyanga', 'Avilla', '32.78696823', '-17.46947'),
('ZW01070C', 'iVxtmaNOfJy', 'Nyanga', 'Elim', '32.78955841', '-17.60311'),
('ZW01070D', 'gNDwbtp5I75', 'Nyanga', 'Mt Mellary', '32.73577881', '-17.97469'),
('ZW01070E', 'GS1T53HSfL7', 'Nyanga', 'Regina Coeli', '32.88499832', '-17.86889'),
('ZW010710', 'sSKlpVkDqJK', 'Nyanga', 'Nyautate', '32.6550293', '-17.84089'),
('ZW010711', 'xlfJsY2oi9P', 'Nyanga', 'Ruchera', '32.55397034', '-18.11878'),
('ZW010725', 'FvfmaBnvRKX', 'Nyanga', 'Chitindo', '32.9842186', '-17.79064'),
('ZW010726', 'xx6DcGodWk5', 'Nyanga', 'Chiwarira', '31.57185936', '-17.15781'),
('ZW010727', 'aA8JmPQmK81', 'Nyanga', 'Nyamaropa', '32.95360947', '-17.8625'),
('ZW010729', 'qQpBT1CP8eY', 'Nyanga', 'Kambudzi', '32.86796951', '-17.78936'),
('ZW010730', 'hYY8iQw9VjP', 'Nyanga', 'Nyatate', '32.6720314', '-18.01797'),
('ZW010731', 'fngPvM0fNNI', 'Nyanga', 'Samvure', '32.97138977', '-17.71872'),
('ZW010732', 'omGmH28ptOx', 'Nyanga', 'Tombo', '32.88388824', '-18.0175'),
('ZW010761', 'taXTBOfQPrt', 'Nyanga', 'Nyangui', '32.78535843', '-18.02061'),
('ZW010762', 'HW0eTeLlega', 'Nyanga', 'Nyafaru', '32.93111038', '-18.18917'),
('ZW010763', 'VAUEhOQ0M5c', 'Nyanga', 'Erin', '32.70222092', '-18.3835'),
('ZW010791', 'kmX3rzzOBG5', 'ma Nyanga District', 'ma Nyangombe Clinic', '', ''),
('ZW010792', 'PQYcMmTvt6L', 'Nyanga', 'Claremont', '32.70164', '-18.32787'),
('ZW010794', 'OQucnnhShgt', 'Nyanga', 'Nyadowa', '32.9217186', '-17.75789'),
('ZW010795', 'iGL5yAjdHAC', 'Nyanga', 'Spring Valley', '32.54565', '-18.3711'),
('ZW020101', 'LlBAE0LCS4k', 'Bindura', 'Chiveso', '31.34956932', '-17.46283'),
('ZW020102', 'IDbYdjwj14C', 'Bindura', 'Muonwe', '31.25351906', '-17.52205'),
('ZW020103', 'ePZ78XLZM0A', 'Bindura', 'mc ZPS Bindura Prison Clinic', '31.3264', '-17.29262'),
('ZW020104', 'eXlDbDvNDwz', 'Bindura', 'Bindura Polyclinic', '31.33197975', '-17.30967'),
('ZW020105', 'PN1oUrZNWpR', 'Bindura', 'ZRP Bindura', '31.3288002', '-17.29583'),
('ZW02010A', 'WwSWlsfhq7n', 'Bindura', 'Bindura', '31.32876968', '-17.29005'),
('ZW020125', 'HWEKcq4FVGQ', 'Bindura', 'Katanya', '31.38008', '-16.8692'),
('ZW020126', 'gGHjg0ZF3Rr', 'Bindura', 'Nyava', '31.36051941', '-17.56392'),
('ZW020145', 'QppzgSk1p8u', 'Bindura', 'Chiriseri', '31.16135025', '-17.45422'),
('ZW020146', 'Gu1JjY6Edv0', 'Bindura', 'Manhenga', '31.31217003', '-17.39605'),
('ZW020161', 'nthtrQ8ZYCS', 'Bindura', 'Rusununguko', '31.28075027', '-17.06137'),
('ZW020162', 'JT4xbWNaj7X', 'Bindura', 'Chipadze', '31.35515022', '-17.31758'),
('ZW020163', 'GnrA0A7yXp9', 'Bindura', 'Chiwaridzo', '31.3592205', '-17.32222'),
('ZW020175', 'X7zphE53Ypc', 'Bindura', 'Freda Rebecca', '31.33197975', '-17.30967'),
('ZW020176', 'MGkBDNSEhJC', 'Bindura', 'Trojan', '31.28507996', '-17.33128'),
('ZW020177', 'atIzgRoLGLR', 'Bindura', 'Farm H.Centre', '31.35577965', '-17.31998'),
('ZW020178', 'yibYZ6Po0zH', 'Bindura', 'Foothills', '31.27804947', '-17.2132'),
('ZW020179', 'yYhEp4VZzBs', 'Bindura', 'Busce ', '31.333', '-17.3249'),
('ZW020181', 'RssHyAx1haj', 'Bindura', 'ZNFPC', '31.33429', '-17.31039'),
('ZW020182', 'i9ye3IKSAQG', 'Bindura', 'Rutope', '31.56554985', '-17.55588'),
('ZW020183', 'SLW5ioYcyec', 'Bindura', 'Manga', '31.25575', '-16.889'),
('ZW020184', 'EiLjfjMowWZ', 'Bindura', 'Mupandira', '31.30719', '-17.459816'),
('ZW020185', 'zW8TMirt94J', 'Bindura', 'Takunda ', '31.1522', '-17.2316'),
('ZW020186', 'DTEru2o5vj7', 'Bindura', 'Glamorgan', '31.4236', '-17.4394'),
('ZW020201', 'eheoVVnQWUz', 'Centenary', 'Chawarura', '31.11017036', '-16.5185'),
('ZW020202', 'odZS1HPsm2F', 'Centenary', 'Hoya', '31.30266953', '-16.357'),
('ZW020203', 'IUEcjWshRkE', 'Centenary', 'Machaya', '31.16200066', '-16.35067'),
('ZW020204', 'yCf2IRuuCK4', 'Centenary', 'Muzarabani', '30.89249992', '-16.3925'),
('ZW020207', 'u19lBQJUIP1', 'Centenary', 'Chidikamwedzi', '30.96166', '-16.80012'),
('ZW020208', 'dba4bhqXMYE', 'Centenary', 'Chinyani', '31.20588', '-16.58268'),
('ZW020209', 'UWioIdFCTFv', 'Centenary', 'Always ', '31.0023', '-16.6736'),
('ZW02020A', 'xfgrIEhpVaZ', 'Centenary', 'St Alberts', '31.26667023', '-16.57083'),
('ZW020225', 'VXdzwHagVkQ', 'Centenary', 'Hwata', '30.95999908', '-16.32367'),
('ZW020226', 'oqHezjkD4Tl', 'Centenary', 'Dambakurima', '31.08856', '-16.14613'),
('ZW020245', 'EoPAtQiKTcB', 'Centenary', 'David Nelson', '31.11667061', '-16.7295'),
('ZW020285', 'yWX9wymGipZ', 'Centenary', 'Chadereka', '31.20216942', '-16.167'),
('ZW020301', 'gqopHUVukuS', 'Guruve', 'Bvochora', '30.58551979', '-16.57822'),
('ZW020802', 'lcFNlE8AAkS', 'mc Mbire District', 'Masomo', '30.89067078', '-16.31323'),
('ZW020305', 'FgU4Zcz5U7E', 'Guruve', 'Negomo', '30.75917053', '-16.51056'),
('ZW020306', 'FqmwZK7FDnu', 'Guruve', 'Nyamhondoro', '30.75778008', '-16.85139'),
('ZW020307', 'B9rF35hip2q', 'Guruve', 'Shinje', '30.72360992', '-16.70667'),
('ZW020308', 'jL9rTOt4KD3', 'mc Guruve District', 'mc Guruve Centre Rural Health Clinic', '', ''),
('ZW02030B', 'gn5KxqkLgTm', 'Guruve', 'mc Guruve District Hospital', '30.70222092', '-16.67111'),
('ZW020326', 'GYbuNzdwdUb', 'Guruve', 'Bakasa', '30.69277954', '-16.52667'),
('ZW020327', 'gZDrLl5gKNO', 'Guruve', 'Bepura', '30.67250061', '-16.85667'),
('ZW020329', 'y44otghVAx2', 'Guruve', 'Chipuriro', '30.72571945', '-16.77972'),
('ZW020330', 'delete', '', 'GONONO R.H.C.', '', ''),
('ZW020331', 'nNqtwWJ06vF', 'Guruve', 'Kachuta', '30.50264931', '-16.63361'),
('ZW020333', 'HGx2Xw00U3Z', 'Guruve', 'Matsvitsi', '30.61083031', '-16.67278'),
('ZW020334', 'VGSf8Penxpm', 'Guruve', 'Gota', '30.65777969', '-16.58639'),
('ZW020336', 'ryHT5F30qfA', 'Guruve', 'mc Guruve ZRP Clinic', '30.7032', '-16.6628'),
('ZW020339', 'PiTrurNdiyL', 'Guruve', 'Nyakapupu', '30.62805939', '-16.75167'),
('ZW020343', 'JUuZbcHORmk', 'Guruve', 'Ruyamuro', '30.79528046', '-16.71917'),
('ZW020344', 'cXIACOdC70S', 'Guruve', 'Birkdale', '30.7191', '-16.969'),
('ZW020345', 'dQlG18anLKE', 'Guruve', 'Mugarakamwe', '30.57957', '-16.86427'),
('ZW020346', 't7z7r7sYM2T', 'Guruve', 'Kemutamba', '30.44222', '-16.63607'),
('ZW020347', 'tcl0y5CACHp', 'Guruve', 'Kamusasa', '30.87209', '-16.66756'),
('ZW020348', 'tkDEu9U43fG', 'Guruve', 'Brandon ', '30.5841', '-16.9699'),
('ZW020401', 'uLmC0kJJ4TQ', 'Mazowe', 'Chinehasha', '31.19017982', '-16.92892'),
('ZW020402', 'AbJRmrLd9eB', 'Mazowe', 'Nyakudya', '31.13680077', '-17.02013'),
('ZW020403', 'bs45px6C40Q', 'Mazowe', 'Shutu', '31.13912964', '-17.07427'),
('ZW020404', 'Closed', '', 'HATCLIFFE Extension Clinic', '', ''),
('ZW020405', 'JxGGdcBF1lo', 'Mazowe', 'Montgomery ', '30.783', '-17.247'),
('ZW020406', 'CxlReo4oAPb', 'Mazowe', 'Donje', '30.95695', '-16.9492'),
('ZW020408', 'FKa3yMeMRO7', 'Mazowe', 'Ardura', '31.00105', '-17.30145'),
('ZW02040A', 'zbeXocs4ras', 'Mazowe', 'Concession Hosp.', '30.94342995', '-17.38715'),
('ZW02040B', 'BCQx0EncS5A', 'Mazowe', 'Rosa', '31.04725075', '-17.134'),
('ZW02040C', 'fRsvqX30akL', 'Mazowe', 'Howard', '30.99430084', '-17.56592'),
('ZW02040D', 'n51CG1eEvX9', 'Mazowe', 'mc Mazowe Citrus Clinic', '31.00945091', '-17.45395'),
('ZW02040E', 'rn0AGNueA6V', 'Mazowe', 'Mvurwi', '30.855', '-17.03112'),
('ZW020410', 'rUmvSFmllUB', 'Mazowe', 'Davaar', '31.13387', '-17.27463'),
('ZW020411', 'mN1DcmfGN73', 'Mazowe', 'Vonabor', '31.12155', '-17.37307'),
('ZW020425', 'shdHYR7Vlpv', 'Mazowe', 'Bare', '31.12623024', '-16.87747'),
('ZW020427', 'HumcblmYQdJ', 'Mazowe', 'Jingamvura', '31.20145035', '-16.83293'),
('ZW020428', 'FH56ZyKYbKB', 'Mazowe', 'Makope', '31.06069946', '-17.02938'),
('ZW020430', 'ks9Wt9MTNYA', 'Mazowe', 'Christon Bank', '31.0093708', '-17.6095'),
('ZW020432', 'K84eutOBGqf', 'Mazowe', 'Nzvimbo', '31.05260086', '-17.0807'),
('ZW020445', 'RbrrEAl4xGX', 'Mazowe', 'Belgone Clinic', '30.87218094', '-17.52498'),
('ZW020446', 'dlvLQ9cbCAJ', 'Mazowe', 'Holmeden', '30.69062996', '-17.29543'),
('ZW020447', 'ZKR9y6QBLKq', 'Mazowe', 'Tsungubvi', '31.05647087', '-17.36563'),
('ZW020475', 'TL6P8ih7Ra3', 'Mazowe', 'Henderson Research', '30.97216988', '-17.59243'),
('ZW020476', 'lmAKkT4GV7z', 'Mazowe', 'Iron Duke', '31.06539917', '-17.44133'),
('ZW020477', 'plRdDXQh3rU', 'Mazowe', 'mc Mazowe Mine Clinic', '30.9246006', '-17.47368'),
('ZW020478', 'lpwDIjXunPD', 'Mazowe', 'Stories Mine', '30.96113014', '-17.51272'),
('ZW020479', 'FD35gFkOMLQ', 'Mazowe', 'mc ZPS Mazowe Prison Clinic', '30.9238', '-17.6031'),
('ZW020482', 'AbzDyWN1GSN', 'Mazowe', 'N.E.M.Centre', '31.00281906', '-17.36957'),
('ZW020483', 'JxGGdcBF1lo', 'Mazowe', 'MONTGOMERY C.C', '', ''),
('ZW020484', 'e4uQ0NpQoba', 'Mazowe', 'Dambo', '31.08111954', '-17.19515'),
('ZW020485', 'aU0pH9gpvY9', 'Mazowe', 'Forrester', '30.9546', '-17.0488'),
('ZW020486', 'HJEvBCmpR3C', 'Mazowe', 'mc Mazowe Secondary Clinic', '30.93087006', '-17.61567'),
('ZW020487', 'BXJNIljcB4y', 'Mazowe', 'Shopo', '31.19999', '-17.02617'),
('ZW020501', 'vVmQGytV5iT', 'Mt Darwin', 'Dotito', '31.5902195', '-16.56878'),
('ZW020502', 'ENpqUhT1fYg', 'Mt Darwin', 'Kamutsenzere', '31.7856102', '-16.38361'),
('ZW020503', 'kso4CHS6P7v', 'Mt Darwin', 'Mukumbura', '31.65189934', '-16.20028'),
('ZW020504', 'yubwlZ66a2P', 'Mt Darwin', 'Nyamahobobo', '31.88368988', '-16.70283'),
('ZW020505', 'xeyqyhrEqJ9', 'Mt Darwin', 'Pfunyanguwo', '31.90032959', '-16.57581'),
('ZW020506', 'auaQozRIOLm', 'Mt Darwin', 'Tsakare', '31.55611038', '-16.82555'),
('ZW020507', 'OnljtPLFl6a', 'Mt Darwin', 'Mutungagore', '31.52272034', '-16.60139'),
('ZW020508', 'WrL273SAP43', 'Mt Darwin', 'Mutasa', '31.61568', '-16.4288'),
('ZW020509', 'v2vaeAxaZMm', 'Mt Darwin', 'Chiburi ', '31.339', '-16.7034'),
('ZW02050A', 'bVyRm1Ji34n', 'Mt Darwin', 'Mt Darwin', '31.58872032', '-16.77578'),
('ZW02050B', 'nBHR2ZPXjOV', 'Mt Darwin', 'Karanda', '31.83955002', '-16.65555'),
('ZW020525', 'I9r7N3wptXc', 'Mt Darwin', 'Chawanda', '31.67015076', '-16.61703'),
('ZW020526', 'D5gTnvm2lRc', 'Mt Darwin', 'Kaitano', '31.55252075', '-16.31861'),
('ZW020527', 'GI0IFNWXS8a', 'Mt Darwin', 'Nembire', '31.50015068', '-16.58956'),
('ZW020528', 'RXs4ee54yhG', 'Mt Darwin', 'Pachanza', '31.7713604', '-16.56711'),
('ZW020529', 'Jp6UwiCCNTp', 'Mt Darwin', 'Bveke', '31.78725052', '-16.56939'),
('ZW020530', 'N6SOXv9F9sV', 'Mt Darwin', 'ZRP', '31.57672', '-16.77998'),
('ZW020531', 'fLWLLyv4Y5o', 'Mt Darwin', 'Mt Darwin', '31.5761', '-16.7799'),
('ZW020533', 'vu1VRNXKPmX', 'Mt Darwin', 'Bandimba', '31.85968', '-16.36914'),
('ZW020534', 'GvVoQrSmWnX', 'mc Mount Darwin District', 'mc Chitse Clinic', '', ''),
('ZW020535', 'Tma30DTWHyh', 'mc Mount Darwin District', 'mc Chitepo Clinic', '', ''),
('ZW020601', 'KyBetKcK90J', 'Rushinga', 'Mukosa', '32.65610123', '-16.65855'),
('ZW020602', 'DOlQq1GB4v8', 'Rushinga', 'Mukonde', '32.29872894', '-16.61053'),
('ZW020603', 'XatZA7PFuMP', 'Rushinga', 'Nhawa', '32.1656189', '-16.57892'),
('ZW020604', 'njamIl8fT5g', 'Rushinga', 'Rushinga', '32.02153015', '-16.63225'),
('ZW020606', 'rd5Uf966GNs', 'Rushinga', 'Nyamatikiti', '32.10972977', '-16.73908'),
('ZW020607', 'qmaGE9Oq6kA', 'Rushinga', 'Chimandau', '32.56536865', '-16.65597'),
('ZW02060A', 'DL9A4lDtWrG', 'mc Rushinga District', 'mc Chimhanda District Hospital', '', ''),
('ZW02060B', 'JZXjde8nGqB', 'Rushinga', 'Mary Mount', '32.52962875', '-16.67677'),
('ZW020625', 'pyGvDPF4vaL', 'Rushinga', 'Bungwe', '32.0678215', '-16.56635'),
('ZW020626', 'eopLbB9IjK6', 'Rushinga', 'Rusambo', '32.18284988', '-16.62985'),
('ZW020627', 'Z3uUAktokIU', 'Rushinga', 'Chimhanda', '32.12905121', '-16.63128'),
('ZW020701', 'tU6OmZQaPOr', 'Shamva', 'Nyamaruro', '31.41414', '-16.9515'),
('ZW020703', 'wH0Gbj1nPrz', 'Shamva', 'Chishapa', '31.60021973', '-17.20986'),
('ZW020704', 'eiOs4aU2yjI', 'Shamva', 'Goora', '31.51667023', '-16.91667'),
('ZW020705', 'SbxuBIpMpI0', 'Shamva', 'Mupfurudzi', '31.6578', '-16.9344'),
('ZW02070A', 'blxFf086iZk', 'Shamva', 'Shamva', '31.57016945', '-17.32711'),
('ZW02070B', 'jRiHpNfGlM7', 'Shamva', 'mc Madziwa Rural Hospital', '31.53878021', '-16.92558'),
('ZW020712', 'GKtPGyT5u0Z', 'Shamva', 'Wadzanai', '31.57036018', '-17.30539'),
('ZW020725', 'WTACDqodL5z', 'Shamva', 'Chakonda', '31.60335922', '-17.02592'),
('ZW020726', 'oauPRjbamz2', 'Shamva', 'Chidembo', '31.5668602', '-17.08352'),
('ZW020727', 'M1bLJxP0KX6', 'Shamva', 'Chihuri', '31.55051994', '-16.87733'),
('ZW020728', 'dctbNHhtdAb', 'Shamva', 'Takawira', '31.61624', '-17.02528'),
('ZW020776', 'v0iFLfLnhZu', 'Shamva', 'Shamva Gold Mine', '31.56876946', '-17.31627'),
('ZW020777', 'nyZPn26CoFt', 'Shamva', 'Nyamaropa', '31.51339', '-17.04933'),
('ZW020801', 'UJhT9GLgCuc', 'mc Mbire District', 'Masoka', '30.16666985', '-16.16667'),
('ZW020803', 'SncjH98WFxs', 'mc Mbire District', 'mc Mushumbi RHC', '', ''),
('ZW02080B', 'a5nhOcrZJdL', 'mc Mbire District', 'Chitsungo', '30.55571938', '-16.27722'),
('ZW020820', 'cR7Npl4ihAb', 'mc Mbire District', 'Chapoto', '30.39763069', '-15.70058'),
('ZW020821', 'EDClzGRGLtD', 'mc Mbire District', 'Angwa', '30.30805969', '-16.10195'),
('ZW020830', 'hJI1t61vx9V', 'mc Mbire District', 'Chikafa', '30.56088066', '-16.00798'),
('ZW020831', 'HVtlH7H8abS', 'mc Mbire District', 'Gonono', '30.83333015', '-16.08695'),
('ZW020832', 'Oz6p5RcJadO', 'mc Mbire District', 'mc Musengezi Clinic', '31.11824989', '-16.11073'),
('ZW020833', 'bcTRZqn3n4R', 'mc Mbire District', 'Mahuwe', '30.73527908', '-16.38389'),
('ZW020834', 'Kv7K3EAEDs8', 'Mbire', 'Chirunya', '30.61864', '-16.34884'),
('ZW020835', 'ngymqKr33XI', 'Mbire', 'Nyambudzi', '30.5915', '-16.08729'),
('ZW020841', 'Tt9lULArquT', 'mc Mbire District', 'Chidodo', '31.05616951', '-16.02513'),
('ZW030101', 'XHTiVLFtZqs', 'Chikomba', 'Mufudziwakanaka', '31.60444069', '-18.8415'),
('ZW030102', 'iTfYEv5vhzX', 'Chikomba', 'Murezi', '31.05356026', '-19.20133'),
('ZW030103', 'XPk4JYUZeS1', 'Chikomba', 'Nyamhere', '31.00374985', '-18.81919'),
('ZW030104', 'E20saWNnwOT', 'me Chikomba District', 'me Zvamatobwe Rural Health Centre', '', ''),
('ZW030105', 'Xj0WA3RP39z', 'Chikomba', 'ZRP', '30.88971', '-19.02226'),
('ZW030106', 'nSAW8ByurST', 'Chikomba', 'Chivu Prison', '30.89779', '-19.01863'),
('ZW030107', 'v93SBcv3pGc', 'Chikomba', 'Musuma', '31.51968956', '-19.15311'),
('ZW03010A', 'OPxYB3sxLY9', 'Chikomba', 'Chivhu', '30.9027195', '-19.01814'),
('ZW03010B', 'FYwRJcKqz7u', 'Chikomba', 'Nharira', '31.17119026', '-19.07433'),
('ZW03010C', 'jkdHKf3rDMq', 'Chikomba', 'Range', '31.00064087', '-19.02097'),
('ZW03010D', 'AZ9MMvkxJ5m', 'Chikomba', 'Sadza', '31.40797043', '-18.83706'),
('ZW03010E', 'qV7RnLkuF5g', 'Chikomba', 'Gandachibvuva', '31.43643951', '-19.10203'),
('ZW030125', 'BX0lrhmpmJS', 'Chikomba', 'Tavara', '30.71906', '-18.80102'),
('ZW030126', 'gVxFHNoVz6h', 'Chikomba', 'Gokomere', '31.35333061', '-19.05353'),
('ZW030127', 'HvEGvesS9qA', 'Chikomba', 'Madamombe', '31.10038948', '-19.11844'),
('ZW030128', 'UWlAvJGXIFq', 'Chikomba', 'Manyene ', '30.9954', '-18.8642'),
('ZW030129', 'zMWqMUxMT7E', 'Chikomba', 'Masasa', '31.25441933', '-18.9075'),
('ZW030130', 'PHry0pvv7Xd', 'Chikomba', 'Mbiru', '31.20158005', '-18.95808'),
('ZW030131', 'rYxjnRpUUVH', 'Chikomba', 'Mushipe', '31.68363953', '-19.02072'),
('ZW030132', 'LlAXaPDxq6q', 'Chikomba', 'Nhangabwe', '31.50555992', '-18.85081'),
('ZW030133', 'yPuklv04aPn', 'Chikomba', 'Popoteke', '31.52386093', '-19.06781'),
('ZW030134', 'UsYPWsQXGbg', 'Chikomba', 'Rutanhira', '31.41953087', '-18.75014'),
('ZW030135', 'zp9pKkYf6Wp', 'Chikomba', 'Shumba', '31.56767082', '-18.92444'),
('ZW030136', 'zF8O9v4NbSA', 'Chikomba', 'Unyetu', '31.30097008', '-18.97331'),
('ZW030137', 'SgPs0vNlPpn', 'Chikomba', 'Wazvaremaka', '31.23793983', '-19.002'),
('ZW030145', 'QUME57YvrvB', 'Chikomba', 'Chivhu', '30.90644073', '-19.00511'),
('ZW030146', 'U5aX0dFbY3W', 'Chikomba', 'Gandami', '31.26761055', '-18.72261'),
('ZW030147', 'fEbetpqDByU', 'Chikomba', 'Lancashire', '31.15356064', '-19.18906'),
('ZW030148', 'ekbdtc8K62D', 'Chikomba', 'Mutoro', '31.08382988', '-18.85592'),
('ZW030149', 'dNu7gRSOYDL', 'Chikomba', 'Wiltshire', '31.17144012', '-18.87272'),
('ZW030191', 'AbmoDPp12lC', 'Chikomba', 'Daramombe', '31.32369041', '-19.10703'),
('ZW030192', 'gnCAtjVM4jt', 'Chikomba', 'Mwerahari', '31.23664093', '-19.05522'),
('ZW030201', 'Lz1AbYU7hzv', 'Goromonzi', 'Bosha', '31.55306053', '-17.50075'),
('ZW030202', 'A6Zh7rdRYc6', 'Goromonzi', 'Domboshava', '31.13871956', '-17.60214'),
('ZW030203', 'feUcANH6pxB', 'Goromonzi', 'Mwanza', '31.48681068', '-17.76875'),
('ZW030204', 'cMGGgI1kcoa', 'Goromonzi', 'Rusununguko ', '31.4331', '-17.9916'),
('ZW030205', 'EzI6Ss6lDDC', 'Goromonzi', 'Goromonzi High ', '31.3597', '-17.8672'),
('ZW03020A', 'LUkaYUNEAWd', 'Goromonzi', 'Makumbe', '31.27318954', '-17.54042'),
('ZW03020C', 'pH4O4ZdhV53', 'Goromonzi', 'Ruwa Rehab.', '31.23513985', '-17.90167'),
('ZW03020D', 'B7MCqlnt9c9', 'Goromonzi', 'Chikwaka', '31.48586082', '-17.55206'),
('ZW030225', 'ojBxVwmGZz1', 'Goromonzi', 'Chinamhora', '31.18456078', '-17.57161'),
('ZW030226', 'GLitgBlY1o4', 'Goromonzi', 'Chinyika', '31.35627937', '-17.83503'),
('ZW030227', 'KCZ5VpGQhPY', 'Goromonzi', 'Kowoyo', '31.48925018', '-17.67219'),
('ZW030228', 'sXUp7AuXmyD', 'Goromonzi', 'Masukandoro', '31.15321922', '-17.54042'),
('ZW030229', 'Z8GLhBou1nb', 'Goromonzi', 'Nyaure', '31.27144051', '-17.62294'),
('ZW030230', 'l1hKpCwcy08', 'Goromonzi', 'Pote', '31.12093925', '-17.57222'),
('ZW030245', 'o11Z9SbhWy2', 'Goromonzi', 'Bromley', '31.3212', '-18.0801'),
('ZW030246', 'txD1TwpwsHW', 'Goromonzi', 'Cranborne Clinic', '31.20742035', '-17.95506'),
('ZW030247', 'UHYe7uDKdy0', 'Goromonzi', 'John Reimer', '31.38442039', '-17.72214'),
('ZW030248', 'jNap2n4Fp0y', 'Goromonzi', 'Kubatsirana', '31.37047005', '-17.82031'),
('ZW030249', 'SoB3qwqFglW', 'Goromonzi', 'Rusike', '31.5182209', '-17.87261'),
('ZW030250', 'WY8QnZOhdzS', 'Goromonzi', 'Ruwa ', '31.2377', '-17.8902'),
('ZW030251', 'rV7p7ulQYVL', 'Goromonzi', 'Joan Rankini ', '31.3847', '-17.7223'),
('ZW030252', 'Qe0frbRzvAu', 'Goromonzi', 'St Joseph\'s ', '31.1964', '-17.7514'),
('ZW030273', 'bI1tMUwxCTF', 'Goromonzi', 'Ruwa ', '31.2418', '-17.8966'),
('ZW030274', 'YcXtnxEmwyu', 'Goromonzi', 'Melfort ', '31.324', '-17.9998'),
('ZW030275', 'Zdk9tV9SPmR', 'Goromonzi', 'Acturus Mine', '31.31681061', '-17.788'),
('ZW030276', 'kVejSam8zQX', 'Goromonzi', 'Gejo raRuby', '31.3238', '-17.7404'),
('ZW030301', 'r5tDghDcwfn', 'Ump', 'Kafura', '32.25278091', '-16.84306'),
('ZW030302', 'klKzBRhEkqX', 'Ump', 'Karimbika', '32.01472092', '-17.31306'),
('ZW030303', 'vUjMV9NBf7l', 'UMP', 'Sowa ', '32.0993', '-16.996'),
('ZW030304', 'yDyRCeplLTy', 'UMP', 'Marembera ', '31.7067', '-17.3899'),
('ZW03030A', 'x7PRZXUho2z', 'Ump', 'Mutawatawa', '31.9738903', '-17.12139'),
('ZW030325', 'dthDF4C3Sm3', 'Ump', 'Borera', '31.97611046', '-17.02083'),
('ZW030326', 'ACVRAzGDfqV', 'UMP', 'Chikuhwa', '31.8404', '-17.223'),
('ZW030327', 'LHjVeJtFyO2', 'Ump', 'Chipfunde', '31.93416977', '-17.22472'),
('ZW030328', 'MD7xcLAvrRe', 'Ump', 'Chitimbe', '31.78360939', '-17.45139'),
('ZW030329', 'jSLNp76dXAv', 'Ump', 'Chitsungo', '32.07389069', '-16.94528'),
('ZW030330', 'CGPfx0JG2rZ', 'Ump', 'Manyika', '31.89611053', '-17.36028'),
('ZW030331', 'OHRuhvMjaio', 'Ump', 'Maramba', '31.98500061', '-17.03667'),
('ZW030332', 'Dn8LxB4ddA4', 'UMP', 'Mashambanhaka', '31.8225', '-17.2751'),
('ZW030333', 'yLTF6bssNwa', 'Ump', 'Nhakiwa', '31.80083084', '-17.37111'),
('ZW030334', 'WdK3I5H1YIv', 'Ump', 'Nyakasoro', '32.19194031', '-16.9025'),
('ZW030336', 'AdrZGzBHBdf', 'Ump', 'Nyanzou', '32.30472183', '-16.78028'),
('ZW030337', 'GScNFtBXxLn', 'Ump', 'Muskwe', '31.97639084', '-17.40333'),
('ZW030338', 'rf7X8GX6O7P', 'UMP', 'Dewe  ', '32.4641', '-16.7837'),
('ZW030391', 'qRWMwz2zOp2', 'Ump', 'Dindi', '32.08778', '-16.88'),
('ZW030401', 'AMeY6hXLpfJ', 'Hwedza', 'Garaba', '31.53463936', '-18.7085'),
('ZW030402', 'sQTDkxDALfD', 'Hwedza', 'Goneso', '31.90127945', '-18.89328'),
('ZW030403', 'JmPNa09jErl', 'Hwedza', 'Goto', '31.80672073', '-18.72842'),
('ZW030405', 'YpyGnrByRlN', 'Hwedza', 'Sengezi', '31.48711014', '-18.74408'),
('ZW030406', 'jvPwK9jlFjR', 'Hwedza', 'me Gotora/Skimpton Clinic', '31.45557', '-18.65151'),
('ZW030407', 'isHKFLO4HHq', 'Hwedza', 'Idube', '31.52172', '-18.50209'),
('ZW030408', 'KlF4lvdXsZh', 'Hwedza', 'Sango ', '31.7505', '-18.7824'),
('ZW03040A', 'MZgVEwKjxI3', 'Hwedza', 'Wedza', '31.56722069', '-18.62839'),
('ZW03040B', 'MIIoWiLSVfi', 'Hwedza', 'Mt St Mary\'s', '31.6835804', '-18.70842'),
('ZW030425', 'i6teuuckzzW', 'Hwedza', 'Chigondo', '31.71972084', '-18.85983'),
('ZW030427', 'RUbBKXlaAGF', 'Hwedza', 'Mukamba', '31.82132912', '-18.87653'),
('ZW030445', 'Pe9vjw20foQ', 'Hwedza', 'Chikurumadziva', '31.91749954', '-19.04894'),
('ZW030446', 'O2TArDE6O3s', 'Hwedza', 'Makarara', '31.83481026', '-19.02697'),
('ZW030447', 'fS3cTGFoLZ0', 'Hwedza', 'Zvidhuri', '31.72294044', '-18.96144'),
('ZW030501', 'mfbKAvsWhd6', 'Marondera', 'Border Church', '31.34056091', '-18.23686'),
('ZW030502', 'NF7mpu2EvNX', 'Marondera', 'Chimbwanda', '31.15019035', '-18.40128'),
('ZW030503', 'fQUGtsR81lp', 'Marondera', 'Dimbiti', '31.78936005', '-18.38519'),
('ZW030504', 'qEnOAb2ngj2', 'Marondera', 'Kushinga Phikelela', '31.6699', '-18.1544'),
('ZW030505', 'xDCT70uOXUQ', 'Marondera', 'Mudzimuirema', '31.09005928', '-18.28439'),
('ZW030506', 'M4GcIA6G5Yf', 'Marondera', 'Wenimbe', '31.79039001', '-18.23633'),
('ZW03050A', 'zrEeu5PasDm', 'Marondera', 'me Marondera Provincial Hospital', '31.53450012', '-18.20553'),
('ZW03050B', 'nk2lS02CIvE', 'Marondera', 'Chiota', '31.2404995', '-18.32094'),
('ZW03050C', 'QHPjyQCdaZ1', 'Marondera', 'Borrandile', '31.54143906', '-18.18464'),
('ZW030511', 'zjRZGEq6H2c', 'Marondera', 'me ZPS Marondera Prison Clinic ', '31.43256', '-18.18013'),
('ZW030512', 'O6kzhSbPx0o', 'Marondera', 'ZRP', '31.55904', '-18.18789'),
('ZW030513', 'BKZmRVJ0K9V', 'Marondera', 'me Ridigita Farm Prison Clinic', '31.5133', '-18.3724'),
('ZW030525', 'trTCqAUZngw', 'Marondera', 'Masikana', '31.68660927', '-18.35392'),
('ZW030528', 'lxK3LLA9aLc', 'Marondera', 'me Marondera Rural Council Clinic', '31.5907', '-18.1566'),
('ZW030529', 'SzXvLdD2rg2', 'Marondera', 'Chiparawe', '31.63982964', '-18.00653'),
('ZW030545', 'oEwopIvfS15', 'Marondera', 'Igava', '31.62410927', '-18.46728'),
('ZW030561', 'YZuS9BT4pKu', 'Marondera', 'Dombotombo', '31.56706047', '-18.18722'),
('ZW030562', 'nRSfosZwTju', 'Marondera', 'Nyameni', '31.54143906', '-18.20611'),
('ZW030563', 'P0jm09rHVzC', 'Marondera', 'Nyembanzvere', '31.13047', '-18.21594'),
('ZW030564', 'B35nVDlj7GY', 'Marondera', 'Lustliegh', '31.38554', '-18.433'),
('ZW030586', 'xWpVDFqwfs9', 'Marondera', 'Waddilove ', '31.3857', '-18.2567'),
('ZW030588', 'AKCixQDIf0K', 'Marondera', 'Rakodzi ', '31.6062', '-18.1825'),
('ZW030601', 'w91Pdaoyw6t', 'Mudzi', 'Chimukoko', '32.50730896', '-16.96742'),
('ZW030602', 'sNXjwi7ELPe', 'Mudzi', 'Chiunye', '32.28713989', '-17.00475'),
('ZW030603', 'yMtK3S8nhQo', 'Mudzi', 'Gozi', '32.86700058', '-17.18619'),
('ZW030604', 'ga4R0LVpMQZ', 'Mudzi', 'Kondo', '32.65636063', '-16.90114'),
('ZW030605', 'ZwYyO4TGfWH', 'Mudzi', 'Makaha', '32.62403107', '-17.28722'),
('ZW030606', 'Xkfoiswgpb9', 'Mudzi', 'Masarakufa', '32.57027817', '-17.03969'),
('ZW030607', 'dMek5b21Mr7', 'Mudzi', 'Nyamanyora', '32.50497055', '-16.87269'),
('ZW03060A', 'z4SzUXzBpKF', 'Mudzi', 'Kotwa', '32.66936111', '-16.98928'),
('ZW030625', 'Uzc69lvByvk', 'Mudzi', 'St. Pius', '32.80596924', '-16.75703'),
('ZW030626', 'Xydb813pfZQ', 'Mudzi', 'Kapotesa', '32.75218964', '-17.01956'),
('ZW030627', 'eANtdLc9zeW', 'Mudzi', 'Kotwa', '32.67282867', '-17.00811'),
('ZW030628', 'ZPOAwzV6LOI', 'Mudzi', 'Masenda', '32.25447083', '-17.10814'),
('ZW030629', 'DvigEFxkVl1', 'Mudzi', 'Nyamapanda', '32.86571884', '-16.96828'),
('ZW030630', 'Sj0rbpas8DA', 'Mudzi', 'Nyamatawa', '32.65531158', '-17.20389'),
('ZW030631', 'x8erRQoNuQe', 'Mudzi', 'Nyamukoho', '32.31850052', '-17.07097'),
('ZW030632', 'AI3PYYYx61D', 'Mudzi', 'Shinga', '32.4394989', '-17.00806'),
('ZW030633', 'A07DDnPfVPy', 'Mudzi', 'Suswe', '32.40539169', '-17.17456'),
('ZW030634', 'atzPnwnfKwM', 'Mudzi', 'Chisvo', '32.35824966', '-16.95819'),
('ZW030691', 'e95WT3Di3Ae', 'Mudzi', 'Chikwizo', '32.78955841', '-17.20656'),
('ZW030692', 'a1nC2XuGpY0', 'Mudzi', 'Dendera', '32.7207489', '-16.95756'),
('ZW030693', 'DZPVGzfLY1Y', 'Mudzi', 'Nyahuku', '32.88816834', '-16.81739'),
('ZW030701', 'yHaKCyV8Bd5', 'Murehwa', 'Chitate', '31.88652992', '-17.67478'),
('ZW030703', 'SteTta0wB61', 'Murehwa', 'Jekwa', '32.08956146', '-17.75797'),
('ZW030704', 'WnPhXXKOpLq', 'Murehwa', 'Kadenge ', '31.7797', '-17.8838'),
('ZW030705', 'TwQ48A8hBre', 'Murehwa', 'Madamombe', '31.65402985', '-17.47419'),
('ZW030706', 'QJpvYebxudy', 'Murehwa', 'Munamba', '31.59078026', '-17.89122'),
('ZW030707', 'JW2LQmwyzs4', 'Murehwa', 'Murehwa', '31.789', '-17.6546'),
('ZW030708', 'GiVFEv4yPaN', 'Murehwa', 'Prison', '31.7877', '-17.65589'),
('ZW03070A', 'sCYa4AlPTb9', 'Murehwa', 'Murewa', '31.78763962', '-17.65783'),
('ZW03070B', 'GRyNGyhYYmi', 'Murehwa', 'St Pauls Musami', '31.5858593', '-17.75058'),
('ZW03070C', 'KgmA6MdMtFY', 'Murehwa', 'Nhowe', '31.94075012', '-17.85256'),
('ZW030722', 'EW1W9dgRyOa', 'Murehwa', 'Murewa ', '31.7801', '-17.6415'),
('ZW030723', 'bM0W5COOBgn', 'Murehwa', 'Chitowa 1', '31.8661', '-17.5234'),
('ZW030724', 'pb9OlYzcpDj', 'Murehwa', 'Chitowa 2 ', '31.9116', '-17.5988'),
('ZW030725', 'nWhYVNm0WBU', 'Murehwa', 'Dandara', '31.68605995', '-17.50764'),
('ZW030726', 'XUeDZQc29Ce', 'Murehwa', 'Dombwe ', '31.9716', '-17.7698'),
('ZW030727', 'jGH2r8SpBR1', 'Murehwa', 'Kadzere', '31.73699951', '-17.78822'),
('ZW030728', 'cD95jTscQmY', 'Murehwa', 'Nyamutumbu', '31.61743927', '-17.62108'),
('ZW030729', 'PewheyywlnB', 'Murehwa', 'Shambamuto', '31.63931084', '-17.87231'),
('ZW030730', 'CijX89n5eHh', 'Murehwa', 'Craiglea', '31.82746', '-17.96305'),
('ZW030731', 'ZhCfNcrOPZb', 'Murehwa', 'Matututu ', '31.7366', '-17.4807'),
('ZW030732', 'r5kFjZtm6fX', 'Murehwa', 'Ngwerume', '31.69831', '-17.58456'),
('ZW030745', 'hzPUNLSAcny', 'Murehwa', 'Macheke', '31.85560989', '-18.15306'),
('ZW030746', 'mG2ONKeQCOH', 'Murehwa', 'Virginia Clinic', '32.0907', '-17.8553'),
('ZW030747', 'NOekVWNaW3O', 'Murehwa', 'Waterloo', '31.93400002', '-17.88836');
INSERT INTO `facilities` (`facility_code`, `dhis2_code`, `district`, `facility_name`, `longitude`, `latitude`) VALUES
('ZW030748', 'B7lz3ZdJEhH', 'Murehwa', 'Welcome Home Liden', '31.80101', '-18.10296'),
('ZW030749', 't7hkFBKLoGo', 'Murehwa', 'Kambarami ', '31.7326', '-17.6268'),
('ZW030750', 'rVVyFuRAfpN', 'Murehwa', 'Muchinjike ', '31.7346', '-17.5402'),
('ZW030771', 'p1T8lmKy3fI', 'Murehwa', 'Nehoreka', '31.58967', '-17.76112'),
('ZW030772', 'uI3m539OPHe', 'Murehwa', 'Goso', '31.78155', '-17.55378'),
('ZW030801', 'NPo39PNvxY0', 'Mutoko', 'Hoyuyu 1', '32.15555954', '-17.56853'),
('ZW030802', 'WodUaeT9wjB', 'Mutoko', 'Hoyuyu 2', '32.25149918', '-17.76861'),
('ZW030803', 'JFNNch7ZJVN', 'Mutoko', 'Kapondoro', '32.48', '-17.3735'),
('ZW030804', 'p1v1QU4KQSj', 'Mutoko', 'Katsukunya', '32.15468979', '-17.40781'),
('ZW030805', 'NgikWvqYEkx', 'Mutoko', 'Kawewe', '32.35289001', '-17.21972'),
('ZW030806', 'x44HsR9Qq1X', 'Mutoko', 'Mushimbo', '32.3947', '-17.4282'),
('ZW030807', 'ZhMnTpPHQkP', 'Mutoko', 'Nyamuzizi', '32.35602951', '-17.63819'),
('ZW030808', 'cCdp294NXnX', 'Mutoko', 'Nyadire Resettlement', '31.96282', '-17.49227'),
('ZW030809', 'Nr9PnOvHJ5C', 'Mutoko', 'Kushinga', '32.02027893', '-17.62114'),
('ZW03080A', 'Wihdkhi7Aah', 'Mutoko', 'Mutoko', '32.23860931', '-17.42342'),
('ZW03080B', 'ibnZnbDrE09', 'Mutoko', 'Nyamuzuwe', '32.25418854', '-17.25403'),
('ZW03080C', 'sy4K8oabHGL', 'Mutoko', 'Makosa', '32.47161102', '-17.26753'),
('ZW03080D', 'NmP3Phb5kXi', 'Mutoko', 'Nyadire ', '32.025', '-17.422'),
('ZW03080E', 'AnhuqtGQXU9', 'Mutoko', 'Louisa Guidotte', '32.38985825', '-17.35572'),
('ZW030810', 'SuZnhJW4o8e', 'Mutoko', 'Nzira', '32.13711166', '-17.66817'),
('ZW030811', 'yXDxPkj2VjH', 'Mutoko', 'Mutoko ', '32.2192', '-17.4088'),
('ZW030812', 'fqKerAPQHlY', 'Mutoko', 'Chikondoma', '32.2507', '-17.39984'),
('ZW030814', 'wucRLEdDKSm', 'Mutoko', 'Chidye', '32.62211', '-17.45294'),
('ZW030815', 'xyi6WrBmW9s', 'Mutoko', 'Madimutsa', '32.31187', '-17.14878'),
('ZW030820', 'Closed', '', 'EPI MOBILE', '', ''),
('ZW030821', 'Closed', '', 'Mutoko ZNFPC CLINIC', '', ''),
('ZW030825', 'D4WpAh9SgYH', 'Mutoko', 'Charewa', '32.15361023', '-17.17356'),
('ZW030826', 'UkLrjAdBsmV', 'Mutoko', 'Matedza', '32.43708038', '-17.55014'),
('ZW030827', 'VdDV1ffFXiF', 'Mutoko', 'Mother of Peace', '32.27', '-17.4119'),
('ZW030861', 'MejHuw2wWXV', 'Mutoko', 'Mutemwa Lep.', '32.25355911', '-17.41978'),
('ZW030891', 'ER8MCtyWYI5', 'Mutoko', 'Chindenga', '32.10519028', '-17.23619'),
('ZW030898', 'KzoyRcQSBbJ', 'Mutoko', 'Kowo ', '32.3095', '-17.2546'),
('ZW030899', 'NHj26zCwsmI', 'Mutoko', 'Kawazva', '32.26708', '-17.17914'),
('ZW030901', 'OFfbxvItnX5', 'Seke', 'Acton Ronolds', '31.03853035', '-18.35294'),
('ZW030902', 'erjaP6iGLO9', 'Seke', 'Zhakata ', '31.2097', '-18.1457'),
('ZW030903', 'fZoVqfNG9Dg', 'Chitungwiza', 'Z.R.P. Seke CLINIC', '31.1103', '-18.0169'),
('ZW030904', 'LEDVQ0Hpzsw', 'Seke', 'Ringa', '30.95043945', '-18.48839'),
('ZW030905', 'Abmo1sONk9G', 'Seke', 'Masasa', '31.10333061', '-18.41806'),
('ZW030906', 'Closed', '', 'SEKE EPI UNIT', '', ''),
('ZW030907', 'Closed', '', 'CBD CLINIC', '', ''),
('ZW03090A', 'HzsCdzycH81', 'Seke', 'Beatrice', '30.85577965', '-18.25661'),
('ZW03090B', 'oDRIn1TRJQ5', 'Seke', 'Kunaka', '31.2219696', '-18.07236'),
('ZW030921', 'cuaFWOVyBcF', 'Seke', 'Charakupa', '31.33643913', '-18.17086'),
('ZW030922', 'dinMl4eP4Nu', 'Seke', 'Jonasi', '31.13467026', '-18.05411'),
('ZW030923', 'uAnfaRYyxmn', 'Seke', 'Makanyazingwa', '31.40163994', '-18.20086'),
('ZW030924', 'd36D8bX616g', 'Seke', 'Marirangwe ', '30.8036', '-18.0727'),
('ZW030925', 'MCTrOJalFxg', 'Seke', 'Muda', '31.01985931', '-18.29'),
('ZW030926', 'GN8ay9yoERu', 'Seke', 'me Epworth Polyclinic ', '31.1395', '-17.8994'),
('ZW030983', 'L3bhMDQZ8l6', 'Seke', 'Derbyshire', '31.03632927', '-17.95647'),
('ZW030984', 'K8JHQUQfuae', 'Seke', 'Lanark', '30.90024948', '-18.06819'),
('ZW030990', 'F0ea0uQpBtP', 'me Seke District', 'me Epworth Mission Clinic', '', ''),
('ZW040101', 'NnqNcMDpUNY', 'Chegutu', 'Chibero', '30.6613903', '-18.09583'),
('ZW040102', 'pr3OA2Snlps', 'Chegutu', 'Gora', '30.72999954', '-18.42417'),
('ZW040103', 'Xx2vto5TcJv', 'Chegutu', 'Mbuyanehanda', '30.21582985', '-17.92139'),
('ZW040104', 'QqSkHt2vLvl', 'Chegutu', 'Monera', '30.73193932', '-18.11389'),
('ZW040105', 'RjVkEZqu46z', 'Chegutu', 'Msengezi', '30.10250092', '-17.94944'),
('ZW040106', 'SDh1YVOVccE', 'Chegutu', 'Musinami', '30.49888992', '-18.30306'),
('ZW04010B', 'Bptnjxo6m5A', 'Chegutu', 'Mhondoro', '30.5886097', '-18.31833'),
('ZW04010C', 'Nooh15bzo4O', 'Chegutu', 'Norton', '30.6875', '-17.88694'),
('ZW040125', 'WWbdpFMcvjZ', 'Chegutu', 'Chikara', '30.70000076', '-18.47028'),
('ZW040126', 'HveAeV6CvrV', 'Chegutu', 'Chivero', '30.60416985', '-18.17944'),
('ZW040127', 'OiOTmgg2IYI', 'Chegutu', 'Mhondoro North', '30.69388962', '-18.16944'),
('ZW040128', 'cfjk1dGjdlQ', 'Chegutu', 'Mupawose', '30.50250053', '-18.48056'),
('ZW040129', 'm8GBz4K50XD', 'Chegutu', 'Rwizi', '30.63055992', '-18.44833'),
('ZW040130', 'pHfYf2HeLON', 'Chegutu', 'Watyoka', '30.68638992', '-18.32444'),
('ZW040145', 'MzKUnHQrIAV', 'Chegutu', 'mw Chegutu Clinic', '30.14555931', '-18.13611'),
('ZW040146', 'Jo89evshx8A', 'Chegutu', 'mw Dombwe Clinic', '30.28083038', '-17.94361'),
('ZW040147', 'CVszPWzF4WE', 'Chegutu', 'Katangautano', '30.66832924', '-17.8825'),
('ZW040148', 'LeZgvBMv6xR', 'Chegutu', 'Sandringham', '30.66167068', '-18.08361'),
('ZW040149', 'vT5oaS4TOdg', 'Chegutu', 'Selous', '30.44861031', '-18.06861'),
('ZW040151', 'UPtK34fA6GZ', 'Chegutu', 'David Whitehead', '30.12888908', '-18.14167'),
('ZW040152', 'F3kdWqiKhDN', 'Chegutu', 'Hunyani', '30.70000076', '-17.85778'),
('ZW040161', 'Ntr6VH1qAJl', 'Chegutu', 'Pfupajena', '30.13582993', '-18.12444'),
('ZW040162', 'YrLclGGTdJa', 'Chegutu', 'Chinengundu', '30.1426', '-18.121'),
('ZW040176', 'B0siCMc82Xc', 'Chegutu', 'ZMDC', '30.1344', '-18.0228'),
('ZW040177', 'ZmsUGq7jdPX', 'Chegutu', 'Lizmore', '29.96793', '-18.02337'),
('ZW040178', 'sWjKyzkChj3', 'Chegutu', 'Homedale', '30.48453', '-18.1878'),
('ZW040179', 'fy4iRoRcrth', 'Chegutu', 'Mafuti', '30.2804', '-18.2996'),
('ZW040180', 'qAj4FeHrhCb', 'Chegutu', 'Brunswick', '30.04442', '-18.22281'),
('ZW040181', 'dk3jiq2dHYj', 'mw Chegutu District', 'mw Dudley Hall Clinic', '', ''),
('ZW040182', 'rrBuO3LiAUY', 'mw Chegutu District', 'mw Chegutu CBDS Clinic', '', ''),
('ZW040183', 'lMf3rJ8V2pE', 'Chegutu', 'Suri-Suri', '29.97694016', '-18.15806'),
('ZW040184', 'rrwRWdBIu4E', 'Chegutu', 'mw Chegutu District Hospital', '30.14944077', '-18.12861'),
('ZW040185', 'KVkYtEFMCIN', 'mw Chegutu District', 'mw Batsiranai Nursing Home', '', ''),
('ZW040186', 'fKLCgQosQCh', 'mw Chegutu District', 'mw Beersheba Mission Clinic', '', ''),
('ZW040187', 'RPldbqpVgwA', 'mw Chegutu District', 'mwPresbyterian Clinic', '', ''),
('ZW040201', 'KMhDzcwtcEi', 'Hurungwe', 'Chirundu', '28.86055946', '-16.04389'),
('ZW040202', 'tNooDwYWdaJ', 'Hurungwe', 'Chivende', '29.34943962', '-17.31583'),
('ZW040203', 'fYXmY87UqtV', 'Hurungwe', 'Deve', '29.03146', '-17.02504'),
('ZW040205', 'AWivwhWkNzl', 'Hurungwe', 'Masanga', '29.22999954', '-16.73611'),
('ZW040206', 'Y7BYSQJ5MLz', 'Hurungwe', 'Zvipani', '29.21027946', '-16.98306'),
('ZW040207', 'E0AFzQNcapu', 'Hurungwe', 'Zebra Downs', '29.8291', '-16.8509'),
('ZW040208', 'cSWNVcN3NRE', 'mw Hurungwe District', 'mw Chibara Clinic', '', ''),
('ZW040209', 'k2TRaRVvJhP', 'mw Hurungwe District', 'mw ZPS Karoi Prison Clinic', '', ''),
('ZW040209', 'DFYIXQC5gIh', 'mw Hurungwe District', 'mw ZPS Hurungwe Prison Clinic', '', ''),
('ZW04020A', 'HweUoYPqEPm', 'Hurungwe', 'Karoi', '29.68778038', '-16.81528'),
('ZW04020B', 'fqzU9gJin39', 'mw Hurungwe District', 'mw Hurungwe Rural Hospital', '', ''),
('ZW04020C', 'feg23tKkoKy', 'Hurungwe', 'Mwami', '29.7761097', '-16.67167'),
('ZW04020D', 'UcJKVyyylMH', 'Hurungwe', 'Chidamoyo', '29.19194031', '-17.14833'),
('ZW040225', 'F2zPzFu25FX', 'Hurungwe', 'Chinhere', '29.43693924', '-17.21556'),
('ZW040226', 'UzwlH9DKyqL', 'Hurungwe', 'Chundu', '29.64249992', '-16.39278'),
('ZW040227', 'XEOVqP1R0dh', 'Hurungwe', 'Kazangarare', '29.83555985', '-16.55917'),
('ZW040228', 'KnvPyJl7vp5', 'Hurungwe', 'Nyamakaze', '29.43638992', '-16.40389'),
('ZW040229', 'eEfUA9ZxG6Q', 'Hurungwe', 'Nyamhunga', '29.19528008', '-16.885'),
('ZW040245', 'ptcT8WoVLbG', 'Hurungwe', 'Hewiyai', '29.67388916', '-16.56972'),
('ZW040246', 'ncSavEEyOvs', 'Hurungwe', 'Hesketh', '29.53778076', '-16.86944'),
('ZW040247', 'Gc1X3NYyk9O', 'Hurungwe', 'Mashongwe', '29.54166985', '-16.44056'),
('ZW040248', 'HSKwN9sUvmt', 'Hurungwe', 'Nyangoma', '29.92667007', '-16.86639'),
('ZW040249', 'vI1Kf4HOQla', 'Hurungwe', 'Tenewe', '29.61166954', '-17.29056'),
('ZW040275', 'J9WafyyWlop', 'Hurungwe', 'Lynx', '29.45083046', '-16.59806'),
('ZW040291', 'f68QKUNRmhY', 'Hurungwe', 'Kapfunde', '29.40833092', '-17.06583'),
('ZW040294', 'AsmK5WOEVFv', 'Hurungwe', 'Kasimube', '29.87722015', '-17.03111'),
('ZW040295', 'ZkAUz0ZfGXn', 'Hurungwe', 'Karuru', '29.6427803', '-16.47806'),
('ZW040296', 'HWM12v0UAX6', 'Hurungwe', 'Dete', '29.94249916', '-16.50056'),
('ZW040297', 'jQkd7s1bI5s', 'Hurungwe', 'Lan lorry', '29.46661', '-16.75765'),
('ZW040298', 'aG3e8vLBDp8', 'Hurungwe', 'ZRP Karoi', '29.6829', '-16.8175'),
('ZW040299', 'zyhGiUplloV', 'Hurungwe', 'Doro', '29.35702', '-16.71696'),
('ZW040302', 'pggK8xtOWkp', 'mw Mhondoro District', 'Dondoshava', '30.59693909', '-18.68278'),
('ZW040303', 'gn52LwHeWA6', 'mw Mhondoro District', 'Donain', '29.62888908', '-18.50778'),
('ZW040304', 'lcljUIailpa', 'mw Sanyati District', 'mw New Geja Rural Health Centre', '', ''),
('ZW040305', 'G57fVB65L2O', 'mw Sanyati District', 'Jompani', '29.44861031', '-18.06917'),
('ZW040306', 'cAMje9pQE3E', 'mw Mhondoro District', 'mw Jondale Bumbe Rural Health Centre', '30.41666985', '-18.59389'),
('ZW040307', 'GxXp62pvGkn', 'mw Sanyati District', 'mw ZPS Kadoma Prison Clinic', '29.87556076', '-18.38917'),
('ZW040308', 'ueC0VR439jb', 'mw Mhondoro District', 'Muzvezve', '30.58250046', '-18.54444'),
('ZW040309', 'DKq7C6J9P60', 'mw Sanyati District', 'Nyabango', '29.52721977', '-17.85306'),
('ZW04030A', 'fpOZUI5rEff', 'mw Sanyati District', 'mw Kadoma General Hospital', '29.9116706848', '-18.33083'),
('ZW04030B', 'ysPngdiDqUX', 'mw Mhondoro District', 'mw Ngezi (mhondoro) Rural Hospital', '30.63249969', '-18.65417'),
('ZW04030C', 'mM1Xp7OSsOv', 'mw Sanyati District', 'mw Sanyati Mission Hospital', '29.30916977', '-17.95278'),
('ZW04030D', 'fxFr4twqaIm', 'mw Mhondoro District', 'mw St Michael\'s Mission Hospital', '30.67889023', '-18.56667'),
('ZW04030E', 'qNA0WCicGW3', 'mw Mhondoro District', 'mw Battlefields5 Brigade Army Clinic', '29.90583038', '-18.62444'),
('ZW04030F', 'qpEq965s2Ry', 'mw Sanyati District', 'mw Rimuka MCH Municipal Clinic', '', ''),
('ZW040310', 'GG5fmAKKfw4', 'mw Sanyati District', 'Nyamatani', '29.53471947', '-18.19917'),
('ZW040311', 'fmMgkv25D5z', 'mw Sanyati District', 'Vere', '29.3525', '-18.0937'),
('ZW040315', 'BemKVece1hq', 'mw Mhondoro District', 'Manyoni', '30.46833038', '-18.8175'),
('ZW040316', 'WEEMtqVtHT7', 'mw Sanyati District', 'Chemukute', '29.9796', '-18.317'),
('ZW040317', 'gWE3zAl8pbe', 'mw Mhondoro District', 'Twin Tops', '30.10364', '-18.58832'),
('ZW040318', 'xSEU0kfcYUB', 'mw Mhondoro District', 'Chingondo', '30.35557', '-18.44847'),
('ZW040320', 'rs48hsAHBof', 'mw Sanyati District', 'Black Movale', '29.87599', '-17.94313'),
('ZW040321', 'knjK07tin6v', 'mw Sanyati District', 'Nyaonde', '29.43693924', '-17.73222'),
('ZW040322', 'ldOvhQ2kYsi', 'mw Mhondoro District', 'Mukarati', '30.48917007', '-18.55667'),
('ZW040323', 's7X1foLFGE8', 'mw Mhondoro District', 'mw Zimplats Trauma Centre Private Clinic', '', ''),
('ZW040324', 'jZT88S28eSb', 'mw Sanyati District', 'mw Perseverance Army Clinic', '', ''),
('ZW040325', 'ggbM4q0E7FM', 'mw Mhondoro District', 'Bururu', '30.49056053', '-18.69722'),
('ZW040326', 'Wy34Zk2to8H', 'mw Sanyati District', 'mw Chirikiti RDC Clinic', '29.42056084', '-17.97611'),
('ZW040327', 'gro8cEQCXu8', 'mw Mhondoro District', 'Manyewe', '30.52305985', '-18.60722'),
('ZW040328', 'geW8p2ssd3n', 'mw Mhondoro District', 'Murambwa', '30.72167015', '-18.58333'),
('ZW040329', 'mmV7mnyIlXG', 'mw Sanyati District', 'Muuyu', '29.49193954', '-17.94722'),
('ZW040330', 'iyiMmbaIa08', 'mw Mhondoro District', 'mw Sanyati RDC Clinic', '29.24333', '-17.99083'),
('ZW040346', 'daBCGmAg9r8', 'mw Sanyati District', 'Ordoff', '29.84749985', '-18.28083'),
('ZW040348', 'Ml25Hu7FAPO', 'mw Mhondoro District', 'mw Turf Estate RDC Clinic', '30.27693939', '-18.67639'),
('ZW040361', 'QUKQlheaguk', 'mw Sanyati District', 'Rimuka', '29.893', '-18.3458'),
('ZW040362', 'vTet0yGknw8', 'mw Sanyati District', 'Waverly', '29.9191', '-18.34768'),
('ZW040363', 'dizbbt1c58H', 'mw Sanyati District', 'mw Ngezi Municipal Clinic', '29.85972023', '-18.37889'),
('ZW040377', 'kDHBO9DwrmJ', 'mw Sanyati District', 'Golden Valley', '29.7930603', '-18.22306'),
('ZW040379', 'GdlWakJtoRZ', 'mw Sanyati District', 'Patchway Mine', '29.8003', '-18.2305'),
('ZW040381', 'OO9JaMzwvJn', 'mw Sanyati District', 'Jairos Jiri', '29.87825', '-18.34778'),
('ZW040384', 'aIPqoEQQZu9', 'mw Mhondoro District', 'Mafindifindi', '30.51416969', '-18.74611'),
('ZW040389', 'V91qrg6c0yU', 'mw Sanyati District', 'Chakari', '29.84527969', '-18.07833'),
('ZW040402', 'wRdT8kS44sr', 'Kariba', 'Gatse Gatse', '28.86027908', '-16.78361'),
('ZW040403', 'UxQucFI6E3p', 'Kariba', 'Kanyati', '28.99527931', '-16.91528'),
('ZW040404', 'DOhScLRYKX2', 'Kariba', 'Mola', '28.29861069', '-16.92611'),
('ZW040405', 'XzL8xx0lbDy', 'Kariba', 'Negande', '28.24110985', '-17.19278'),
('ZW04040A', 'EBfmC3oJ5sM', 'Kariba', 'Kariba', '28.79166985', '-16.52028'),
('ZW040425', 'rC7i1uDARQP', 'Kariba', 'Chalala', '28.30027962', '-16.84167'),
('ZW040427', 'lS5KthlM5eO', 'Kariba', 'Msampakaruma', '28.7677803', '-17.15861'),
('ZW040428', 'XwwBXUiEqLF', 'Kariba', 'Siakobvu', '28.36417007', '-17.13111'),
('ZW040461', 'JMz01Ql0U1E', 'Kariba', 'Nyamhunga', '28.84832954', '-16.51806'),
('ZW040462', 'SxToMjJJz68', 'Kariba', 'Mahombekombe', '28.75806046', '-16.52611'),
('ZW040463', 't3EseaHV0b5', 'Kariba', 'Kasvisva', '28.50133', '-17.22925'),
('ZW040464', 'mbVEXm82AwL', 'Kariba', 'Mayovhe', '28.18771', '-17.02508'),
('ZW040501', 'J6htfyEOgkh', 'Makonde', 'Chinhoyi Prison Clinic', '30.19744', '-17.36109'),
('ZW040502', 'xfXOVtAcjHn', 'Makonde', 'Chinhoyi ZRP Camp Clinic', '30.17167', '-17.35684'),
('ZW040503', 'rZD7HDCc67F', 'Makonde', 'Chinhoyi University Clinic', '30.20806', '-17.34913'),
('ZW040505', 'i7f92RTlyom', 'Makonde', 'Kamonde', '29.35861015', '-17.47306'),
('ZW040506', 'NG4e4layZjo', 'Makonde', 'Kenzamba', '29.60499954', '-17.47306'),
('ZW040507', 'FKhAJhXjzhx', 'Makonde', 'Murereka', '30.02639008', '-17.27556'),
('ZW040508', 'w5gb3klCYji', 'Makonde', 'Zumbara', '29.88138962', '-17.67361'),
('ZW040509', 'ooSFsGF2dJY', 'Makonde', 'Godzi', '29.52222061', '-17.61778'),
('ZW04050A', 'BP0IGornqbn', 'Makonde', 'Chinhoyi P.H', '30.20889091', '-17.36222'),
('ZW04050B', 'toCuAvEIFtG', 'Makonde', 'St. Rupets', '29.69277954', '-17.76917'),
('ZW04050D', 'TUce5qd0i8U', 'Makonde', 'mw Makonde Christ Hosp', '30.16444016', '-16.89194'),
('ZW040510', 'YmvLtM3DznO', 'Makonde', 'River Ranch', '29.99041', '-16.99737'),
('ZW040512', 'IsRIVwWXtQK', 'Makonde', 'Gudubu', '30.0577', '-16.9298'),
('ZW040525', 'K7zbR9jRGTu', 'Makonde', 'Hombwe', '29.77916908', '-17.69417'),
('ZW040526', 'LpQK3Eec8Ay', 'Makonde', 'Mukohwe', '29.81082916', '-17.81028'),
('ZW040527', 'qLpKVzFktN7', 'Makonde', 'Obva', '29.50638962', '-17.53444'),
('ZW040533', 'E1lUjnhgNHO', 'mw Makonde District', 'mw Runene RDCClinic', '', ''),
('ZW040545', 'yVBotWcHbOu', 'Makonde', 'Doma', '30.24221992', '-16.75889'),
('ZW040546', 'Closed', '', 'MAGOG FARM HEALTH POST', '', ''),
('ZW040547', 'XkuKaxtXv8w', 'Makonde', 'Matorangera', '30.11194038', '-17.56833'),
('ZW040548', 'VKTZGYgvGbX', 'Makonde', 'Umboe', '30.18333054', '-17.0475'),
('ZW040551', 'Closed', '', 'C.S.C.', '', ''),
('ZW040561', 'ogbAgg8zwC2', 'mw Makonde District', 'mw Chinhoyi Munic Clinic', '', ''),
('ZW040562', 'cfYVFtLReGT', 'Makonde', 'Chikonohono', '30.19444084', '-17.39'),
('ZW040563', 'GlampS7ZKwE', 'mw Makonde District', 'mw Makonde ZNFPC Clinic', '', ''),
('ZW040575', 'udWpiurZMVp', 'Makonde', 'Alaska', '30.06749916', '-17.37389'),
('ZW040576', 'Closed', '', 'DAMBA CLINIC', '', ''),
('ZW040578', 'wYA3w30yssa', 'Makonde', 'Kosana', '30.21389008', '-16.66722'),
('ZW040579', 'XivulgBxpIY', 'mw Makonde District', 'mw Nyamugomba RDC Clinic', '', ''),
('ZW040580', 'v8hbbEXJulE', 'Makonde', 'mw PSZ Private Clinic', '30.20319', '-17.36414'),
('ZW040581', 'd3VmuOC7Mz5', 'Makonde', 'Green Valley', '30.15505', '-16.68228'),
('ZW040582', 'vMCUDg37YDQ', 'mw Makonde District', 'mw Presbyterian Private Clinic', '', ''),
('ZW040583', 'v59WnRtc1MF', 'mw Makonde District', 'mw Portlet RDC clinic', '', ''),
('ZW040584', 'xkcTYcOE1rB', 'mw Makonde District', 'mw Sadoma RDC Clinic', '', ''),
('ZW040585', 'ohAeL3I4ZEj', 'mw Makonde District', 'mw Gamanya RDC clinic', '', ''),
('ZW040586', 'bpu2ZCmx7d3', 'mw Makonde District', 'mw Chimanimani RDC Clinic', '', ''),
('ZW040601', 'Xh1S0QX9HWx', 'Zvimba', 'Chivhere', '30.03055954', '-17.66528'),
('ZW040602', 'nqtw8QgNOtK', 'Zvimba', 'Gwebi', '30.85832977', '-17.67694'),
('ZW04060C', 'kvq5cN02EHW', 'Zvimba', 'Darwendale', '30.54888916', '-17.72028'),
('ZW04060D', 'x66hV0UrQCG', 'Zvimba', 'Raffingora', '30.43055916', '-17.03694'),
('ZW04060E', 'dfpYezH6cH6', 'Zvimba', 'Father Onea', '30.38611031', '-17.79944'),
('ZW04060F', 'aMFd7hYaHSk', 'Zvimba', 'Mutorashanga', '30.67638969', '-17.14667'),
('ZW04060G', 'b9vsXIKqid1', 'Zvimba', 'Zvimba', '30.19889069', '-17.69917'),
('ZW04060H', 'oD9PKarQjyE', 'mw Zvimba District', 'mw Banket Outreach Mobile', '', ''),
('ZW040625', 'K1kK9fDmd7v', 'Zvimba', 'Masiyarwa', '30.32999992', '-17.81111'),
('ZW040626', 'sdN3U9AOEpk', 'Zvimba', 'Chirau', '30.1241703', '-17.68167'),
('ZW040627', 'w3EePaVqKMz', 'Zvimba', 'Jari', '30.03360939', '-17.73194'),
('ZW040628', 'vHEgaMne8F1', 'mw Zvimba District', 'mw Madzorera RDC Clinic', '', ''),
('ZW040629', 'HnfbuFOJS6n', 'mw Zvimba District', 'mw Mpumbu RDC Clinic', '', ''),
('ZW040641', 'mmuli7uwAPQ', 'Zvimba', 'ARDA Sisi', '30.42028046', '-16.89056'),
('ZW040642', 's8hVhOA5Ibt', 'Zvimba', 'Ayrshire', '30.43861008', '-17.03944'),
('ZW040643', 'ZzxlAv1BO5j', 'Zvimba', 'Kutama', '30.42000008', '-17.73944'),
('ZW040644', 'AlhbuXhG77V', 'Zvimba', 'Kuwadzana', '30.39472008', '-17.37639'),
('ZW040645', 'YfZFBb4Ke9p', 'mw Zvimba District', 'mw Mount Hampden RDC Clinic', '', ''),
('ZW040646', 'X8QsJGkQVdg', 'Zvimba', 'mw Nyabira RDC Clinic', '30.8116703', '-17.67361'),
('ZW040647', 'O3FM4meFqdP', 'Zvimba', 'TRBC', '30.33333015', '-17.58389'),
('ZW040648', 'EJGMNgSreZS', 'Zvimba', 'Trelawney', '30.45889091', '-17.54139'),
('ZW040649', 'aWhygv9Wr7a', 'Zvimba', 'Zowa', '30.04972076', '-17.805'),
('ZW040676', 'Zv0OMYQpKGo', 'Zvimba', 'Muriel', '30.60000038', '-17.24556'),
('ZW040677', 'NfsQQEiohAb', 'Zvimba', 'Sutton', '30.59277916', '-17.40056'),
('ZW040678', 'AHUpXALQka8', 'Zvimba', 'Vanad', '30.71833038', '-17.08694'),
('ZW040679', 'uFImSWuEJ2P', 'Zvimba', 'Kemurara', '30.11608', '-17.7538'),
('ZW040680', 'jAbqHJKvsAm', 'mw Zvimba District', 'mw Dzivaresekwa gvt Clinic', '', ''),
('ZW040681', 'LCqojzkIKO4', 'Zvimba', 'Inkomo', '30.71833038', '-17.67083'),
('ZW040682', 'rAUXsauSfFh', 'Zvimba', 'Crest Breeders', '30.94111061', '-17.94139'),
('ZW040683', 'bFCxwAuThTm', 'Zvimba', 'Mpinga Clinic', '30.56607', '-17.50907'),
('ZW040686', 'J2tcZ8weE1X', 'mw Zvimba District', 'mw Aryshire Mine Clinic', '', ''),
('ZW040687', 'OBGRRromwaH', 'Zvimba', 'ZIMPAM', '30.50917053', '-17.84139'),
('ZW040689', 'k3G1VjfRUGu', 'mw Zvimba District', 'mw Lospen Farming Clinic', '', ''),
('ZW040690', 'NTkxOkHNsKj', 'mw Zvimba District', 'mw North Middle Dyke Clinic', '', ''),
('ZW050101', 'dlqwJ6OKw9r', 'mn Binga District', 'mn Chunga Rural Health Centre', '', ''),
('ZW050102', 'HXHPwUjXD8A', 'Binga', 'Lubimbi', '27.19194031', '-17.94944'),
('ZW050103', 'rBTEnsD0X8Z', 'Binga', 'Lusulu', '27.86222076', '-18.06833'),
('ZW050104', 'BonXdPEgO3t', 'Binga', 'Muchesu', '27.68917084', '-17.94778'),
('ZW050105', 'acQe3id5m7a', 'Binga', 'Siansundu', '27.21916962', '-17.98333'),
('ZW050108', 'LTtUPlsg8Yd', 'Binga', 'Chinego', '28.07500076', '-17.19472'),
('ZW05010A', 'miYTD7Z89qM', 'Binga', 'Binga', '27.32666969', '-17.63944'),
('ZW05010B', 'MukdpNMa0wO', 'Binga', 'Siabuwa', '28.04389', '-17.47472'),
('ZW05010C', 'hHheqUpfla0', 'Binga', 'Kariangwe', '27.53499985', '-17.96972'),
('ZW050125', 'EqD2xssNXGE', 'Binga', 'Pashu', '27.40056038', '-18.20806'),
('ZW050190', 'lj1GfhHdZjV', 'Binga', 'Tinde', '27.18206', '-18.26125'),
('ZW050191', 'A925fAGWY0M', 'Binga', 'Sinakoma', '27.60401', '-17.69109'),
('ZW050192', 'OExCvkJ9VkG', 'Binga', 'Simatelele', '27.25738', '-17.78883'),
('ZW050193', 'V40fJlBGl5l', 'Binga', 'Sinasengwe', '27.8232', '-17.5689'),
('ZW050194', 'ETm6n9STB4U', 'Binga', 'Siabuzuba', '27.4339', '-17.6948'),
('ZW050196', 'IODfsT3zfgs', 'mn Binga District', 'mn Siadindi Rural Health Centre', '', ''),
('ZW050197', 'PYkTLQgYOqM', 'mn Binga District', 'mn ZPS Binga Prison Clinic', '', ''),
('ZW050201', 'QRmrW2KSw7E', 'Bubi', 'Lukala', '28.41222', '-19.26389'),
('ZW050202', 'AluwtlpghNX', 'Bubi', 'Mbembeswana', '28.40193939', '-19.33056'),
('ZW05020A', 'DhKzAnRliZz', 'Bubi', 'Inyathi', '28.85610962', '-19.685'),
('ZW050226', 'yOPB5Y4iGLD', 'Bubi', 'Sicanda', '28.47528076', '-19.33583'),
('ZW050227', 'BWHB0AClSm2', 'Bubi', 'Balanda', '28.5154', '-19.4522'),
('ZW050228', 'pDNRL1m5sJd', 'Bubi', 'Majiji', '28.3468', '-19.3774'),
('ZW050230', 'GP77AVs6oLi', 'Bubi', 'Mdutshane', '28.63129', '-19.47221'),
('ZW050231', 'GAD9gVWs9cr', 'mn Bubi District', 'mn Kenilworth Clinic', '', ''),
('ZW050232', 'KkRJZlMtmZz', 'Bubi', 'Raafs', '28.6463', '-19.8848'),
('ZW050256', 'mWDhu5xtTrE', 'Bubi', 'Isabella Mine', '28.54944038', '-19.46111'),
('ZW050301', 'wDtbGPatTno', 'Hwange', 'Chisuma', '25.95471954', '-18.01361'),
('ZW050302', 'AvldN9Anc7S', 'Hwange', 'Jambezi', '26.22750092', '-18.05222'),
('ZW050303', 'a7pO3OO3I52', 'Hwange', 'Kanywambizi', '26.31110954', '-18.01694'),
('ZW050304', 'ZF4DBQE21YK', 'Hwange', 'Makwandara', '27.20055962', '-18.31722'),
('ZW050305', 'r9yhzcMuDa7', 'Hwange', 'Mwemba', '26.56056023', '-18.18333'),
('ZW050306', 'eKeQZ0FUknQ', 'mn Hwange District', 'mn ZRP Victoria Falls', '', ''),
('ZW05030A', 'fnTUcLvSFv6', 'Hwange', 'Victoria Falls', '25.82611084', '-17.94389'),
('ZW05030B', 'rprerQGVIlD', 'Hwange', 'Lukosi', '26.62778091', '-18.36056'),
('ZW05030D', 'E54XNunYxiM', 'Hwange', 'Hwange Colliery Hospital', '26.5022', '-18.3582'),
('ZW050326', 'aq8MAvUpdWn', 'Hwange', 'Dete', '26.86778069', '-18.61583'),
('ZW050327', 'DxYCdFYiA2M', 'Hwange', 'Dinde', '26.73749924', '-18.38'),
('ZW050330', 'H6XDX82MnK3', 'Hwange', 'Lupote', '26.96417046', '-18.51278'),
('ZW050331', 'WuPQlo8ThPp', 'Hwange', 'Main Camp.', '26.95222092', '-18.73167'),
('ZW050332', 'eu1hrSICcH2', 'Hwange', 'Ndlovu', '25.98389053', '-18.10083'),
('ZW050333', 'JUDZoAkUMWG', 'Hwange', 'Simangani', '26.72417068', '-18.11028'),
('ZW050335', 'LXVUGQm7RGZ', 'Hwange', 'Mabale', '27.0702', '-18.5721'),
('ZW050337', 'J7MxHJHZ9bi', 'Hwange', 'St Patricks', '26.5122', '-18.3289'),
('ZW050339', 'hXpefkkW4IR', 'mn Hwange District', 'mn CBDS ZNFPC Clinic', '', ''),
('ZW050353', 'U3e6ekRXW7y', 'Hwange', 'Zimbabwe Prison Services', '26.53142', '-18.34919'),
('ZW050355', 'sOSMAtvracs', 'Hwange', 'ZRP Hwange', '26.51302', '-18.34558'),
('ZW050358', 'zWJE0ySFXHq', 'Hwange', 'mn Zesa Dressing Station Clinic', '26.4927', '-18.3629'),
('ZW050359', 'Z3HcoSNeppw', 'Hwange', 'Zesa Chibondo', '26.5141', '-18.3306'),
('ZW050360', 'zbS445H6kah', 'Hwange', 'Ingagula', '26.46145', '-18.38911'),
('ZW050361', 'jZGy677dnfU', 'Hwange', 'Empumalanga', '26.5008297', '-18.34972'),
('ZW050362', 'OYnj7haEW3L', 'Hwange', 'Chinotimba', '25.82583046', '-17.94528'),
('ZW050381', 'jpEG9V6xrYP', 'Hwange', 'Dete', '26.85831', '-18.62354'),
('ZW050382', 'xhIwGYQXNXZ', 'Hwange', 'Ngumija', '26.49616', '-18.37741'),
('ZW050383', 'MfkW1a4Hqku', 'Hwange', 'NRZ Surgery', '26.48723', '-18.37115'),
('ZW050391', 'CpgIKDUylA4', 'Hwange', 'Lukunguni', '26.22833061', '-18.04444'),
('ZW050392', 'e9VM80nHbQh', 'Hwange', 'No 1 Clinic', '26.49204', '-18.35426'),
('ZW050393', 'ixdjf7oLHyv', 'Hwange', 'No1 North', '26.47342', '-18.33347'),
('ZW050394', 'dh8SkIE24ec', 'Hwange', 'No 2 Clinic', '26.42891', '-18.36407'),
('ZW050395', 'aWzNvLJPiws', 'Hwange', 'No 3 Clinic', '26.40722', '-18.41659'),
('ZW050396', 'Gahvlupt3c8', 'Hwange', 'No 5 Clinic', '26.44014', '-18.37726'),
('ZW050397', 'delete', '', 'NO. 2 NORTH CLINIC', '', ''),
('ZW050402', 'BeVXhb4Okd5', 'Lupane', 'Dandanda', '27.86916924', '-18.44889'),
('ZW050403', 'XrHUnXYBubZ', 'Lupane', 'Dongamuzi', '27.44719', '-18.40378'),
('ZW050404', 'bh46Jbdsx4Y', 'Lupane', 'Gomoza', '28.22360992', '-18.84139'),
('ZW050405', 'TWK9GVJ0YcF', 'Lupane', 'Kanyandavu', '27.97777939', '-18.30444'),
('ZW050406', 'UBges4sOxQE', 'Lupane', 'Lupane', '27.77194023', '-18.93528'),
('ZW050407', 'ECxIUwSg9Ep', 'Lupane', 'Lupaka', '27.90361023', '-18.78333'),
('ZW050408', 'AKb6QXbWJCC', 'mn Lupane District', 'mn Lupane Mobile A', '', ''),
('ZW05040A', 'nCSV7v53HRq', 'Lupane', 'St. Pauls', '28.11388969', '-19.02028'),
('ZW05040B', 'jeGBzfmKlQl', 'Lupane', 'St. Lukes', '27.96861076', '-19.10972'),
('ZW050410', 'PbZBQj0Weu0', 'mn Lupane District', 'mn Lupane ZNFPC Clinic', '', ''),
('ZW050426', 'ru92cefCXx3', 'Lupane', 'Jotsholo', '27.55833054', '-18.73056'),
('ZW050427', 'P4uahA4HI3l', 'Lupane', 'Mdlankunzi', '27.75193977', '-18.49389'),
('ZW050491', 'DKPcDr74KRI', 'Lupane', 'Fatima', '27.414', '-18.74072'),
('ZW050492', 'WuDZ8D5PcVj', 'Hwange', 'Gwayi', '27.18638992', '-18.61111'),
('ZW050502', 'rF3ZY8pOeYJ', 'Nkayi', 'Mateme', '28.95722008', '-18.66917'),
('ZW050503', 'kXnKVCPF1wZ', 'Nkayi', 'Ngwaladi', '28.37972069', '-18.57667'),
('ZW050505', 'gmLfAfr1YLt', 'Nkayi', 'Sivalo', '28.35139084', '-18.74306'),
('ZW050506', 'yzteaQjArJn', 'Nkayi', 'mn Zenka Rural Health Centre', '28.77305985', '-19.07'),
('ZW05050A', 'j0FI6bcuGFL', 'Nkayi', 'Nkayi', '28.89138985', '-19.00056'),
('ZW05050B', 'fSmMezXYT0V', 'Nkayi', 'Dakamela', '28.66666985', '-18.79722'),
('ZW05050C', 'MjYcpFjUjbG', 'Nkayi', 'Mbuma', '28.44166946', '-18.94889'),
('ZW050525', 'o8v1aiUjp5z', 'Nkayi', 'Fanison', '28.88582993', '-18.91583'),
('ZW050526', 'g29TEy9yTIW', 'Nkayi', 'Nesigwe', '28.8116703', '-18.72778'),
('ZW050527', 'A1W7R6k1DFR', 'Nkayi', 'Sebumane', '28.46138954', '-18.67028'),
('ZW050528', 'anB7WKFPWNK', 'Nkayi', 'Sikobokobo', '28.48749924', '-18.7825'),
('ZW050529', 'zMnGvy72aws', 'Nkayi', 'Zinyangeni', '28.98806', '-19.07778'),
('ZW050530', 'aqDFRDAgV5s', 'mn Nkayi District', 'mn Nkayi Mobile', '', ''),
('ZW050531', 'x3RUgj2P3u6', 'mn Nkayi District', 'mn Mbuma Mobile', '', ''),
('ZW050532', 'xGHewS8QVb9', 'Nkayi', 'Guwe', '28.96777916', '-19.21444'),
('ZW050533', 'icHSTSJ1PwX', 'Nkayi', 'Gwelutshena', '28.70889091', '-18.66306'),
('ZW050534', 'dxJvAPw0cIF', 'Nkayi', 'Sesame', '28.71249962', '-18.955'),
('ZW050603', 'EI2eBWX6AdG', 'Tsholotsho', 'Makaza', '27.64581', '-19.93546'),
('ZW050604', 'IihNPoKOuZq', 'Tsholotsho', 'Mlagisa', '27.66749954', '-19.15111'),
('ZW050605', 'sp2U5DIl8aL', 'Tsholotsho', 'Mtshayeli', '27.0886097', '-18.35889'),
('ZW050606', 'vDdAHJWNfHn', 'Tsholotsho', 'Sodaka', '27.08416939', '-19.39889'),
('ZW05060A', 'wNv0rUXoprE', 'Tsholotsho', 'Tsholotsho', '27.75527954', '-19.77278'),
('ZW05060B', 'lZbqwxClTKl', 'Tsholotsho', 'Sipepa', '27.65500069', '-19.28667'),
('ZW05060C', 'HnmD3aN1Aji', 'Tsholotsho', 'Pumula', '27.09139061', '-19.59306'),
('ZW050625', 'M8GUxpcY9zW', 'Tsholotsho', 'Bubude', '27.81193924', '-20.1'),
('ZW050626', 'pqpfmI41yEY', 'Tsholotsho', 'Dlamini', '27.406', '-19.4999'),
('ZW050628', 'zOu1YfpEc99', 'Tsholotsho', 'Jimila', '27.73860931', '-19.49333'),
('ZW050629', 'wycmA4jZHbq', 'Tsholotsho', 'Madlamombe', '27.50806046', '-19.77528'),
('ZW050630', 'dnyF1KLtmrO', 'Tsholotsho', 'Nkunzi', '27.88861084', '-20.10056'),
('ZW050631', 'CGm37qYHO3h', 'Tsholotsho', 'T. Urban', '27.75278091', '-19.76694'),
('ZW050633', 'N7lqxou06rj', 'Tsholotsho', 'Samahuru', '27.18993', '-19.48617'),
('ZW050634', 'v5HsXI0RbYg', 'Tsholotsho', 'Shaba', '27.7239', '-20.043'),
('ZW050694', 'delete', '', 'CBD [ZNFPC]', '', ''),
('ZW050696', 'H7pfKUKYqHv', 'Tsholotsho', 'Kapane', '27.51749992', '-19.26056'),
('ZW050697', 'BnH3EgzEjkO', 'Tsholotsho', 'Panedziba', '27.57139015', '-19.46944'),
('ZW050698', 'oh1Jp42kTE9', 'Tsholotsho', 'Sikente', '27.35356', '-19.78716'),
('ZW050699', 'fD3e45suK7g', 'Tsholotsho', 'Bemba', '27.27332', '-19.45289'),
('ZW050701', 'Nl8DQA0UiAH', 'mn Umguza District', 'mn Umguza Council Clinic', '', ''),
('ZW050702', 'ZSPT125KBlK', 'mn Umguza District', 'mn Nyamandlovu Mobile', '', ''),
('ZW050702', 'Duplicate', '', 'Nyamandlovu Mobile', '', ''),
('ZW050703', 'DHX4QPFYNf1', 'Umguza', 'Igusi', '28.07416916', '-19.66111'),
('ZW05070A', 'NwhxM073HO5', 'Umguza', 'Nyamandlovu', '28.26556015', '-19.85889'),
('ZW050710', 'DAC9AC1mXL3', 'mn Umguza District', 'mn ZNA Braddy BarracksClinic', '', ''),
('ZW050711', 'sJJltflaDJG', 'mn Umguza District', 'mn Anju Prison Clinic', '', ''),
('ZW050720', 'q0UgCWN6tzK', 'mn Umguza District', 'mn ZRP Rosecamp Clinic', '', ''),
('ZW050722', 'vpzJk8cjnPq', 'Umguza', 'Khami Remand ', '28.3962', '-20.0662'),
('ZW050723', 'zHpvI0rRefO', 'Umguza', 'Khami Maximum', '28.4028', '-20.0666'),
('ZW050724', 'AXfud0aoV19', 'Umguza', 'Khami Medium Clinic', '28.3926', '-20.0617'),
('ZW050725', 'poAoKEJzA1L', 'Umguza', 'mn ZPS Mlondolozi Prison Clinic', '28.3953', '-20.0638'),
('ZW050726', 'n7PWhl64p5Y', 'Umguza', 'Fingo', '28.89417076', '-19.9675'),
('ZW050728', 'TVm0Oe65yz9', 'Umguza', 'Redwood', '28.41426', '-19.73884'),
('ZW050729', 'FvzDz7j6bk3', 'Umguza', 'Ntabazinduna', '28.84556007', '-19.97944'),
('ZW050733', 'Lux101IAoQw', 'Umguza', 'Mbembesi', '28.3289', '-19.4938'),
('ZW050752', 'U955E1dbBJN', 'Umguza', 'Fair bridge', '28.70000076', '-20.09917'),
('ZW050753', 'AApdlLy8xDh', 'Umguza', 'Unicem', '28.68499947', '-20.11861'),
('ZW050765', 'rgzyJUhxM9t', 'mn Umguza District', 'mn ZNA Imbizo Camp Hospital', '', ''),
('ZW050781', 'X0nOmkqcDn9', 'Umguza', 'T.G Silundika', '28.1923', '-19.9487'),
('ZW050785', 'TQlbLlJai3Z', 'mn Umguza District', 'mn ZPS Ntabazinduna Prison Clinic', '', ''),
('ZW050788', 'ptCi4yUczMp', 'mn Umguza District', 'mn ZRP Ntabazinduna Rural Health Centre', '', ''),
('ZW050791', 'Ellfi6GeXAw', 'Umguza', 'St. James ', '28.0553', '-19.9505'),
('ZW050797', 'qaQFT9xBClt', 'mn Umguza District', 'mn ZNA Induna Clinic', '', ''),
('ZW050798', 'tRcbhjUWJpw', 'Umguza', 'Muntu', '28.006', '-19.9121'),
('ZW060101', 'Pc5yc5tAeNF', 'Beitbridge', 'Chikwarakwara', '31.09124947', '-22.31725'),
('ZW060102', 'poqrqFB4ezD', 'Beitbridge', 'Chituripasi', '30.7875309', '-22.20064'),
('ZW060103', 'B0IgvxGs1In', 'Beitbridge', 'Dite', '30.39002991', '-22.22214'),
('ZW060104', 'GM03mm6duRI', 'Beitbridge', 'Majini', '29.69067001', '-21.50331'),
('ZW060105', 'qTqTdojssVw', 'Beitbridge', 'Prison', '29.98527908', '-22.22269'),
('ZW060106', 'l5x633QnB6H', 'Beitbridge', 'Shabwe', '30.22278023', '-22.10489'),
('ZW060108', 'RGvXTGJ3oi8', 'Beitbridge', 'ZRP', '30.0051899', '-22.21992'),
('ZW060109', 'MtYXI5MCtuX', 'Beitbridge', 'Nottingham', '29.63697052', '-22.12217'),
('ZW06010A', 'E8EI6XrQSsn', 'Beitbridge', 'Beitbridge', '29.98760986', '-22.20458'),
('ZW060125', 'cOFrvE80WQ7', 'Beitbridge', 'Chasvingo', '30.50114059', '-22.05558'),
('ZW060126', 'c0IieswYbFt', 'Beitbridge', 'Dulibadzimu', '29.98372078', '-22.20681'),
('ZW060127', 'C04QiGQzbtb', 'Beitbridge', 'Masera', '29.58650017', '-21.93431'),
('ZW060128', 'myQLemPmnNB', 'Beitbridge', 'Swereki', '29.40386009', '-21.87125'),
('ZW060129', 'pUVSUBJ8Es1', 'Beitbridge', 'Shashe', '29.32243919', '-22.10292'),
('ZW060130', 'IkmlK2VvJyA', 'Beitbridge', 'Tongwe', '30.04042053', '-21.93567'),
('ZW060131', 'NX5E8VD4qql', 'Beitbridge', 'Zezane', '29.50341988', '-21.62461'),
('ZW060176', 'Wj4RlmwcJkb', 'Beitbridge', 'Makakabule', '29.93680954', '-22.13792'),
('ZW060177', 'XJpNFeubEmY', 'Beitbridge', 'Chamunangana', '29.60194016', '-21.60719'),
('ZW060181', 'yWUEiTZdX3r', 'Beitbridge', 'NRZ', '30.00781059', '-22.22078'),
('ZW060201', 'xfTfBuZjJkt', 'Bulilimamangwe', 'Village 13', '27.52388954', '-20.39056'),
('ZW060202', 'nwwAxlXbJwl', 'Bulilimamangwe', 'Huwana', '27.46556091', '-19.89528'),
('ZW060204', 'nr8AGzrBEAa', 'Bulilimamangwe', 'Makhuleka', '27.26861', '-19.90611'),
('ZW060206', 'pxWz8J9mpVR', 'Bulilimamangwe', 'Matshinge', '27.71916962', '-20.21028'),
('ZW060208', 'O5YeiVf8VLA', 'Bulilimamangwe', 'Nswazwi', '27.35250092', '-20.39194'),
('ZW06020B', 'puEtgGYL24a', 'Bulilima', 'Lady Barring', '27.3283', '-19.94806'),
('ZW06020C', 'icJVWJT4Kor', 'Bulilima', 'Lady Stanley', '27.5874', '-20'),
('ZW060220', 'Slqko1xDIYV', 'Bulilimamangwe', 'Hingwe', '27.30167007', '-20.145'),
('ZW060225', 'UeNiHcD5J7x', 'Bulilimamangwe', 'Dombodema', '27.62221909', '-20.40417'),
('ZW060228', 'bmL5zWEj6T7', 'Bulilimamangwe', 'Madlambuzi', '27.44333076', '-20.15111'),
('ZW060230', 'KBygsFhy7Xa', 'Bulilimamangwe', 'Ndiweni', '27.7508297', '-20.36611'),
('ZW060231', 'h6WcQ915OrH', 'Bulilimamangwe', 'Sikhatini', '27.89916992', '-20.35278'),
('ZW060234', 'jjDh5hjk7jD', 'Bulilimamangwe North', 'Bezu', '27.87091', '-20.23436'),
('ZW060235', 'dekCnTKC0br', 'Bulilimamangwe North', 'Masendu', '27.53517', '-20.13567'),
('ZW060291', 'RciFvYGZ2xo', 'Bulilimamangwe', 'Solusi', '28.16028023', '-20.19278'),
('ZW060301', 'dhiLrn2OMIj', 'Gwanda', 'Gungwe', '28.88731003', '-21.45617'),
('ZW060302', 'OUmbO9Dx9Av', 'Gwanda', 'Makwe', '28.75638962', '-20.96919'),
('ZW060303', 'V3JpY96kdVF', 'Gwanda', 'Nhwali', '29.20549965', '-21.70358'),
('ZW060304', 'ayVaCeZSRAC', 'Gwanda', 'Gwanda Prison', '29.00653076', '-20.95706'),
('ZW060305', 'Wc63W8e4VPt', 'Gwanda', 'Simbumbumbu', '28.75761032', '-20.75217'),
('ZW060306', 'NoyhPjmwOeo', 'Gwanda', 'Stanmore', '29.03660965', '-20.66992'),
('ZW060307', 'WKaj0aWHhxU', 'Gwanda', 'ZRP', '29.0124', '-20.9373'),
('ZW060308', 'Closed', 'Gwanda', 'Gwanda ZNA. CLINIC', '', ''),
('ZW060309', 'n94LdFhOYbM', 'Gwanda', 'ZNFPC', '29.01849937', '-20.94064'),
('ZW06030A', 'nRFC0VVvNG1', 'Gwanda', 'Gwanda Prov. Hosp', '29.00005913', '-20.95786'),
('ZW06030B', 'pTC2Kr3J36g', 'Gwanda', 'Manama', '28.99114037', '-21.57014'),
('ZW06030C', 'VXlbEmt9svC', 'Gwanda', 'Mtshabezi', '28.90691948', '-20.70111'),
('ZW060325', 'ULqqDsrSxfO', 'Gwanda', 'Buvuma', '29.20446968', '-21.46747'),
('ZW060326', 'dtbRhEVyrat', 'Gwanda', 'Kafusi', '28.77222061', '-21.60386'),
('ZW060327', 'zUcx6zsL46y', 'Gwanda', 'Mashaba', '28.95038986', '-21.66825'),
('ZW060328', 'Q38EU4UNiaJ', 'Gwanda', 'Mzimuni', '29.13558006', '-20.65025'),
('ZW060329', 'GBsKRjq9zHR', 'Gwanda', 'Ntalale', '28.88607979', '-21.35731'),
('ZW060330', 'OZjJKN6uFmQ', 'Gwanda', 'Sengwezani', '28.97450066', '-21.37139'),
('ZW060331', 'cjtHIvjlvHq', 'Gwanda', 'Garanyemba', '28.98773', '-21.16676'),
('ZW060332', 'Wrw1IDqVBNr', 'Gwanda', 'Sitezi', '28.8005', '-20.8209'),
('ZW060333', 'tPTWTiP1Kqw', 'Gwanda', 'Lushongwe', '28.78025', '-21.01852'),
('ZW060334', 'UZ7r9hwZMgd', 'Gwanda', 'Mapate', '28.90015', '-21.57018'),
('ZW060362', 'PhCiI8NplKa', 'Gwanda', 'Pakama', '29.02396965', '-20.93975'),
('ZW060363', 'qYV2YCq6MNp', 'Gwanda', 'Silonga', '29.17406082', '-21.38333'),
('ZW060376', 'uUh93Rzjw0K', 'Gwanda', 'Blanket Mine', '28.90613937', '-20.87447'),
('ZW060377', 'L8lKPZA39ga', 'Gwanda', 'Collen Bawn', '29.22178078', '-21.0035'),
('ZW060379', 'ksvPeqYhNHi', 'Gwanda', 'Jessie Mine', '29.32280922', '-21.05517'),
('ZW060380', 'Ij65wjZHAiz', 'Gwanda', 'Vumba-Chingwe', '28.92378044', '-20.88653'),
('ZW060382', 'qHOiL9glACJ', 'Gwanda', 'West Nicolson', '29.3689', '-21.0709'),
('ZW060383', 's9H39zxxy8a', 'Gwanda', 'Joshua Mqabuko Nkomo Polytech Clinic', '29.0129', '-20.95247'),
('ZW060402', 'zmh954cgQHV', 'Insiza', 'Gwatemba', '29.69050026', '-20.40542'),
('ZW060403', 'GJZjvxYCw20', 'ms Insiza District', 'ms Insiza Rural Health Centre', '', ''),
('ZW060404', 'Nw3NVUqhNaU', 'Insiza', 'Mabuze', '29.45292091', '-20.93906'),
('ZW060405', 'lCRlkEz71cc', 'Insiza', 'Nkankezi', '29.42378044', '-20.48781'),
('ZW060406', 'lhvnFybX6Pe', 'Insiza', 'Nyamime', '29.30438995', '-20.90644'),
('ZW060407', 'LcHMxhBrEBo', 'Insiza', 'Sanale', '29.55517006', '-20.68947'),
('ZW06040A', 'FZH7EITOBvB', 'Insiza', 'Filabusi', '29.28667068', '-20.54033'),
('ZW06040B', 'LbdpvKwWs0Y', 'Insiza', 'Shangani', '29.37375069', '-19.78414'),
('ZW06040C', 'HGrsdZnGVLx', 'Insiza', 'Avoca', '29.50555992', '-20.83492'),
('ZW06040D', 'XX0ZMuuDZhk', 'Insiza', 'Wanezi', '29.58552933', '-20.57447'),
('ZW060425', 'jTCANAwYpUA', 'Insiza', 'Singwango', '29.31760979', '-20.78678'),
('ZW060426', 'WXjYZkmAcxq', 'Insiza', 'Zhulube', '29.29006004', '-20.64019'),
('ZW060427', 'KQ8U5Cg3AUa', 'Insiza', 'Singwambizi', '29.54654', '-20.93315'),
('ZW060428', 'nvcYHMpAHfm', 'Insiza', 'Kombo', '29.04724', '-19.85475'),
('ZW060477', 'yW7Fi0sI8ww', 'Insiza', 'Shangani', '29.22488976', '-19.68997'),
('ZW060501', 'kyaDYgOIpBZ', 'ms Matobo District', 'Natisa', '28.50527954', '-20.69019'),
('ZW060502', 'BP9mhp7zXMN', 'ms Matobo District', 'Sankonjana', '28.70027924', '-21.40547'),
('ZW060503', 'OGwUj8IBy4e', 'ms Matobo District', 'Homestead', '28.55385971', '-21.25589'),
('ZW060504', 'kh6ns6DZgxB', 'ms Matobo District', 'Beula', '28.40613937', '-21.48506'),
('ZW060505', 'knWOPLAfcgs', 'ms Matobo District', 'Ekukanyeni', '28.67786', '-20.40312'),
('ZW06050A', 'qZ20lY26Zhi', 'ms Matobo District', 'ms Maphisa District Hospital', '28.47435951', '-21.07378'),
('ZW06050B', 'IKhkPBZe9GG', 'ms Matobo District', 'Kezi', '28.4580307', '-20.91947'),
('ZW06050C', 'CRnw6S2VnRr', 'ms Matobo District', 'Matobo Rural', '28.48785973', '-20.41767'),
('ZW06050D', 'fGPBRoboFJn', 'ms Matobo District', 'Tshelanyemba', '28.48802948', '-21.35383'),
('ZW06050E', 'r8YiLD53wqA', 'ms Matobo District', 'ms St Joseph\'s Mission Hospital', '', ''),
('ZW060525', 'n0JZrktiRpP', 'ms Matobo District', 'Mbembeswana', '28.2531395', '-21.03622'),
('ZW060581', 'yxtQKFT8xxn', 'ms Matobo District', 'Gulati', '28.5902195', '-20.45719'),
('ZW060591', 'cHsk8ISst3c', 'ms Matobo District', 'Matobo', '28.72024918', '-20.46828'),
('ZW060592', 'm2YKQmvbayb', 'ms Matobo District', 'Bazha', '28.33506012', '-20.60611'),
('ZW060593', 'JW60FzjZUJu', 'Matobo', 'Masiye Camp', '28.6291', '-20.59'),
('ZW060594', 'HgTsVb46oGb', 'Matobo', 'Cyrene ', '28.4149', '-20.3311'),
('ZW060601', 'o7lk8OxDSN5', 'Esigodini', 'Kumbuzi', '28.90706062', '-20.62233'),
('ZW060602', 'kDv1D2Ehf98', 'Esigodini', 'Mbizingwe', '28.81893921', '-20.40375'),
('ZW060603', 'C31Snb6h6dX', 'ms Umzingwane District', 'ms Umzingwane ZNA Clinic', '', ''),
('ZW06060A', 'Wz8YBhr40BI', 'Esigodini', 'Esigodini', '28.93678093', '-20.28347'),
('ZW060625', 'pHDEvqavUGq', 'Esigodini', 'Esibobvu', '28.90357971', '-20.40247'),
('ZW060626', 'acCVg6eZCR4', 'Esigodini', 'Habani', '28.95606041', '-20.32064'),
('ZW060627', 'SYh7kFev6Op', 'Esigodini', 'Mawabeni', '28.98513985', '-20.40653'),
('ZW060628', 'F9bd4PTzZLa', 'Esigodini', 'Mhlahlandlela', '28.78556061', '-20.52142'),
('ZW060629', 'SrqxRxaYSzn', 'Esigodini', 'Nhlangano', '28.77243996', '-20.20519'),
('ZW060630', 'LKwAHy9EDfG', 'Esigodini', 'Nswazi', '28.98477936', '-20.55722'),
('ZW060631', 'j6F1kG6g3f6', 'Esigodini', 'Ntshamathe', '28.79100037', '-20.15072'),
('ZW060632', 'pCODIoWCbsR', 'Esigodini', 'Irisvale', '29.08530998', '-20.52311'),
('ZW060633', 'tROtYT5ipod', 'Umzingwane', 'Mpisini', '29.10956', '-20.20814'),
('ZW060676', 'w4rwyHJKWBr', 'Esigodini', 'How Mine', '28.78455925', '-20.30364'),
('ZW060684', 'yVmpZgFmHx4', 'ms Umzingwane District', 'ms Mzingwane RHC', '', ''),
('ZW060703', 'AEArYs0pk3a', 'Bulilimamangwe', 'Ingwizi', '27.87083054', '-21.11917'),
('ZW060705', 'b0WVnEWPk15', 'Bulilimamangwe', 'Marula', '28.09361076', '-20.4725'),
('ZW060707', 'c3kGl224qGl', 'Bulilimamangwe', 'Mayobodo', '28.15155', '-21.3633'),
('ZW060709', 'sHMQrK4mrVe', 'Bulilimamangwe North', 'Bango', '28.13474', '-21.25769'),
('ZW06070A', 'i7kUNSMazUq', 'Bulilimamangwe', 'Plumtree', '27.80888939', '-20.49667'),
('ZW06070D', 'rOWtl12FU0f', 'Bulilimamangwe', 'Brunapeg', '28.03306007', '-21.16944'),
('ZW06070D', 'rOWtl12FU0f', 'Mangwe', 'St. Annes', '28.332', '-21.1696'),
('ZW06070E', 'Kcm1LN2oBWI', 'Bulilimamangwe', 'Embakwe', '27.82110977', '-20.77917'),
('ZW060727', 'oSAZBT5wDIC', 'Bulilimamangwe', 'Madabe', '27.75333023', '-20.81444'),
('ZW060729', 'croT0mcnle6', 'Bulilimamangwe', 'Mambale', '28.28471947', '-21.47833'),
('ZW060732', 'Pu8ltwdaHfW', 'Bulilimamangwe', 'Tshitshi', '27.74806023', '-21.00333'),
('ZW060733', 'epzuk3Ugv3q', 'Bulilimamangwe South', 'SANZUKWI', '28.00213', '-21.10654'),
('ZW060745', 'rzWIrDCE3FA', 'Bulilimamangwe', 'Dingumuzi', '27.80888939', '-20.5025'),
('ZW060792', 'DROeVoEXVYs', 'Bulilimamangwe', 'Empandeni', '27.90278053', '-20.70778'),
('ZW060793', 'IH6BF90iN6D', 'Mangwe', 'Plumtree ZPS', '27.8103', '-20.4916'),
('ZW070101', 'NYWetpSMWGf', 'Chirumanzu', 'Chizhou', '30.50447083', '-19.55183'),
('ZW070102', 'jkKXdHWUIPR', 'Chirumanzu', 'Denhere', '30.51683044', '-19.77036'),
('ZW070103', 'gIKW0lmqvaz', 'Chirumanzu', 'Lynwood', '30.52421951', '-19.40619'),
('ZW070104', 'klEB2HlYhmz', 'Chirumanzu', 'Nyautonga', '30.68371964', '-19.65475'),
('ZW070105', 'waqTKtBqvzx', 'Chirumanzu', 'Nyikavanhu', '30.65077972', '-18.97053'),
('ZW070106', 'ZokXr8S7M1j', 'Chirumanzu', 'Guramatunhu', '30.48756027', '-19.63519'),
('ZW070108', 'snps191LWM4', 'Chirumanzu', 'Tokwe 4', '30.25167084', '-19.47556'),
('ZW070109', 'd73t6Bs5YRb', 'Chirumhanzu', 'Musena', '30.4083', '-18.8616'),
('ZW07010A', 'tda4dUNbHXS', 'Chirumanzu', 'Mvuma', '30.52086067', '-19.29036'),
('ZW07010B', 'Y3Bg4ZzxfGm', 'Chirumanzu', 'mi Chilimanzi Rural Hospital(Chaka)', '30.68914032', '-19.53636'),
('ZW07010C', 'mib1cXwWt3O', 'Chirumanzu', 'Driefontein', '30.70710945', '-19.41889'),
('ZW07010D', 'NDHNjXIlHLK', 'Chirumanzu', 'Holy Cross', '30.59094048', '-19.56742'),
('ZW07010E', 'zuwe1zLXtYM', 'Chirumanzu', 'Muwonde', '30.70203018', '-19.42233'),
('ZW07010F', 'E7z7msrh2Ti', 'Chirumanzu', 'St. Theresa', '30.63485909', '-19.71856'),
('ZW070125', 'ibYWPAMeCBw', 'Chirumanzu', 'Chengwena', '30.55322075', '-19.80483'),
('ZW070126', 'K8kVjbJUQEO', 'Chirumanzu', 'Hama', '30.62450027', '-19.85431'),
('ZW070127', 'X6AP7mzriHR', 'Chirumanzu', 'Siyahokwe', '30.50431061', '-19.68994'),
('ZW070128', 'rW0hFHerdeG', 'Chirumhanzu', 'Mapiravana', '30.5011', '-19.4935'),
('ZW070145', 'Cv6kmfDxwVs', 'Chirumanzu', 'Lalapanzi', '30.18531036', '-19.33514'),
('ZW070151', 'r2IcqebfUbB', 'Churumhanzu', 'ZAMASCO CLINIC', '', ''),
('ZW070181', 'Closed', '', 'ATHENS CLINIC', '', ''),
('ZW070186', 'heqvYVrVaIM', 'Chirumanzu', 'Central Estates', '30.46363', '-19.2211'),
('ZW070201', 'pL4gUH07HdO', 'Gokwe', 'Gwanyika', '29.24167061', '-18.26278'),
('ZW070202', 'k3KMG4tehcq', 'Gokwe', 'Kadzidirire', '28.9383297', '-17.50028'),
('ZW070203', 'PqExsT2KAi8', 'Gokwe', 'Madzivazu', '28.50583076', '-17.62972'),
('ZW070204', 'f6CgkxVhCLE', 'Gokwe', 'Mzadzi', '29.05278015', '-17.47944'),
('ZW070205', 'XllhG5cKBYD', 'Gokwe', 'Mashame', '28.79750061', '-17.2725'),
('ZW070206', 'ujR0SPoYlYt', 'Gokwe', 'Mateta', '28.53306007', '-18.3925'),
('ZW070207', 'nu3j8J5HOpv', 'Gokwe', 'Norah', '29.16777992', '-17.51306'),
('ZW070208', 'JIMqCEwBKen', 'Gokwe', 'Nyaje', '28.79750061', '-18.55222'),
('ZW070209', 'ExkjdxwIkft', 'Gokwe', 'Simchembu', '28.23969078', '-17.68439'),
('ZW07020A', 'cn05qNHxtLo', 'Gokwe', 'Gokwe', '28.92499924', '-18.21139'),
('ZW07020B', 'TNtqKFGZD68', 'Gokwe', 'Chireya', '28.5988903', '-17.54417'),
('ZW07020C', 'EWIT0gjbKzw', 'Gokwe', 'Kana', '28.51582909', '-18.55583'),
('ZW07020D', 'LCL9ryFvCb6', 'Gokwe', 'Mtora', '29.00694084', '-17.72083'),
('ZW070210', 'pGbz0iYwQQN', 'Gokwe', 'Tsungai', '29.14249992', '-17.61306'),
('ZW070211', 'fzX4nYbF8u2', 'Gokwe', 'Svisvi', '28.77750015', '-18.06028'),
('ZW070212', 'rGSQkc52bpf', 'Gokwe', 'Zhamba', '28.06110954', '-18.225'),
('ZW070213', 'lUaxwkrJJ9g', 'mi Gokwe South District', 'mi Cheziya Clinic', '', ''),
('ZW070215', 'ITksWtZaDvn', 'mi Gokwe South District', 'mi Gokwe South ZRP Camp Clinic', '', ''),
('ZW070216', 'uRUqAmJnbUw', 'Gokwe', 'Chitave', '28.45111084', '-18.19778'),
('ZW070217', 'mPRfeVLlEh6', 'Gokwe South', 'Mateme', '28.92017', '-18.5753'),
('ZW070219', 'h2xWiMJwiP7', 'Gokwe', 'Jahana', '28.95332909', '-18.01806'),
('ZW070220', 'ld130D1EL0R', 'Gokwe North', 'Vumba', '28.18426', '-17.76407'),
('ZW070224', 'gdr27YOXPty', 'Gokwe South', 'PSZ', '28.9385', '-18.2204'),
('ZW070225', 'JIw5Wb3mAJZ', 'Gokwe', 'Chemahuro', '29.11277962', '-18.21611'),
('ZW070226', 'CXLqK6E4nCr', 'Gokwe', 'Gawa', '28.73389053', '-18.26167'),
('ZW070227', 'mxgUxlPeZ4S', 'Gokwe', 'Gumunyu', '28.90527916', '-17.40972'),
('ZW070228', 'QOyVj877fR2', 'Gokwe', 'Jiri', '28.25749969', '-18.345'),
('ZW070229', 'bXlxEPKa20b', 'Gokwe', 'Kahobo', '28.76333046', '-17.7375'),
('ZW070230', 'UC2KKnYZ3jw', 'Gokwe', 'Krima', '29.37194061', '-18.45028'),
('ZW070231', 'lafgRVBCHPb', 'Gokwe', 'Kuwirirana', '29.03027916', '-17.9075'),
('ZW070232', 'AcK4cq5nDXi', 'Gokwe', 'Mangidi', '28.35582924', '-18.12194'),
('ZW070233', 'u2a0I7Vp7s8', 'Gokwe', 'Manoti', '28.37944031', '-18.45833'),
('ZW070234', 'hWbSV3iEQ4S', 'mi Gokwe South District', 'Masuka', '28.40250015', '-18.00333'),
('ZW070235', 'pAg0wU4miIq', 'Gokwe', 'Msala', '28.04528046', '-18.465'),
('ZW070236', 'oKevHdgQchc', 'Gokwe', 'Musita', '28.57860947', '-17.84361'),
('ZW070237', 'z8YBhfH0zfl', 'Gokwe', 'Nyamunga', '29.46249962', '-18.34667'),
('ZW070238', 'eHtpKDVWlGl', 'Gokwe', 'Sai', '28.32860947', '-18.25861'),
('ZW070239', 'GAfmXZsidnX', 'Gokwe', 'Tongwe', '29.10388947', '-18.08111'),
('ZW070240', 'RnD0rb3ufox', 'Gokwe', 'Zhomba', '28.31306076', '-17.44139'),
('ZW070241', 'f5SWKyYXPLQ', 'mi Gokwe South District', 'mi Mkoka Clinic', '', ''),
('ZW070291', 's0sZR1GDeoX', 'Gokwe', 'Denda', '28.82028008', '-17.78917'),
('ZW070292', 'R1bec89l3UY', 'Gokwe', 'Goredema', '28.89694023', '-17.85194'),
('ZW070293', 'btpo9RLUGxP', 'Gokwe', 'Manyoni', '28.60222054', '-18.14722'),
('ZW070294', 'nEmrUB00q9I', 'Gokwe', 'Mutange', '29.24028015', '-18.20472'),
('ZW070295', 'rt2UEccM5K5', 'Gokwe', 'Nenyunga', '28.25305939', '-17.44139'),
('ZW070296', 'UoLvuRUpeG6', 'Gokwe', 'Sesame', '28.73500061', '-17.95472'),
('ZW070297', 'ZW070316', 'Gokwe', 'Huchu', '28.53249931', '-17.98611'),
('ZW070298', 'X8zn12MUr5m', 'Gokwe', 'Rubatsiro', '29.09388924', '-17.77472'),
('ZW070301', 'GlxURpUrNmh', 'Gweru', 'Gunde', '30.00278091', '-19.18781'),
('ZW070302', 'scgHyOj7lEc', 'Gweru', 'Kabanga', '30.07344055', '-19.1395'),
('ZW070303', 'KZia6a11ZKK', 'Gweru', 'Mangwande', '29.4228096', '-19.37181'),
('ZW070304', 'wqTGtMBR7VW', 'Gweru', 'Masvori', '30.05999947', '-19.21278'),
('ZW070305', 'RbhNPaoniaH', 'Gweru', 'Nkululeko', '29.65280914', '-19.20103'),
('ZW070306', 'X4dssd21wEo', 'Gweru', 'Ntabamhlope', '29.40489006', '-19.17239'),
('ZW070307', 'iMVtldIWJyN', 'Gweru', 'MSU', '29.8418', '-19.511'),
('ZW07030A', 'W4xgmp39E7M', 'Gweru', 'Gweru P.H', '29.83908081', '-19.47222'),
('ZW07030B', 'ulXymYvr8YZ', 'mi Gweru District', 'mi Gweru District Hospital', '', ''),
('ZW07030B', 'QOxd0srupY8', 'mi Gweru District', 'mi Five Maintenance Clinic', '', ''),
('ZW07030C', 'HZJ8sepNyEZ', 'Gweru', 'Chikwingwizha', '29.9564209', '-19.5555'),
('ZW07030D', 'pNc4TLhO9gr', 'mi Gweru City', 'mi Gweru Infectious Diseases Hospital', '', ''),
('ZW07030F', 'X65FArxjvOS', 'Gweru', 'Thornhill', '29.8555', '-19.4487'),
('ZW070313', 'fNORHKgBfTQ', 'Gweru', 'Connemara', '29.81996918', '-19.20722'),
('ZW070314', 'HwIT3aIsuTN', 'Gweru', 'Whahwa', '30.02071953', '-19.35661'),
('ZW070316', 'S9f6KQakc2E', 'Gweru', 'ZRP', '29.8229', '-19.4585'),
('ZW070320', 'Closed', '', 'GWERU OUTREACH MOBILE', '', ''),
('ZW070325', 'E8YETQLa2jF', 'Gweru', 'Chiundura', '29.95261002', '-19.23689'),
('ZW070326', 'uGuNFdnD0Hh', 'Gweru', 'Maboleni', '29.43983078', '-19.29136'),
('ZW070327', 'nyAB0YMDoBt', 'Gweru', 'Madhikani', '29.30513954', '-19.27042'),
('ZW070328', 'M0SaUIESsW3', 'Gweru', 'Makepesi', '29.56883049', '-19.38919'),
('ZW070345', 'GJpUvLLUGTt', 'Gweru', 'Somabula', '29.66994095', '-19.70069'),
('ZW070346', 'IIABLkS1ldc', 'Gweru', 'Vungu', '29.4722805', '-19.40322'),
('ZW070347', 'dAkr74lJdkt', 'Gweru', 'Nyama', '29.34163', '-19.21865'),
('ZW070348', 'pkZQSY7NDOT', 'mi Gweru District', 'mi Vungu District Mobile', '', ''),
('ZW070351', 'BAf7gHorQXx', 'Gweru', 'BATA', '29.79553', '-19.47412'),
('ZW070353', 'Closed', '', 'DAIRY MARKET. BOARD', '', ''),
('ZW070362', 'fuHLYlO0nIe', 'Gweru', 'Mkoba 1', '29.76658', '-19.46726'),
('ZW070363', 'MMimEdy88IO', 'Gweru', 'Mkoba Poly', '29.75082', '-19.459'),
('ZW070364', 'AMcdsZqn641', 'Gweru', 'Monomutapa', '29.80173', '-19.44489'),
('ZW070365', 'Tvj32SyBPNc', 'Gweru', 'Medical Centre', '29.8028', '-19.4479'),
('ZW070366', 'LoSjn0yJDgY', 'Gweru', 'Ivene', '29.8007', '-19.49625'),
('ZW070367', 'czJaFNMnZaU', 'Gweru', 'Senga Poly', '29.83814', '-19.49622'),
('ZW070368', 'kcSDI2qlspj', 'Gweru', 'Totonga', '29.82668', '-19.42968'),
('ZW070381', 'JbvHP9GFMd9', 'Gweru', 'Dabuka', '29.78063', '-19.52241'),
('ZW070385', 'CruRr3BB7uS', 'Gweru', 'Railways', '29.80665', '-19.45662'),
('ZW070385', 'CruRr3BB7uS', 'mi Gweru City', 'mi Gweru NRZ Clinic', '', ''),
('ZW070391', 'qKmB3CBc0NN', 'Gweru', 'Lower Gweru', '29.54042053', '-19.38747'),
('ZW070392', 'UUrAeWdJEzE', 'Gweru', 'St Patricks', '29.90280914', '-19.22369'),
('ZW070401', 'HrCYQmO3SNa', 'Kwekwe', 'Dendera', '29.10292053', '-18.70764'),
('ZW070402', 'JK0aFYdJY9x', 'Kwekwe', 'Donsa', '28.90630913', '-18.76897'),
('ZW070403', 'teWdoeRkmBn', 'Kwekwe', 'Mazebe', '29.00630951', '-18.93542'),
('ZW070404', 'byadYrctbqg', 'Kwekwe', 'Msilahove', '29.15613937', '-19.17339'),
('ZW070405', 'fMobiVP4T70', 'Kwekwe', 'Nyoni', '29.33756065', '-18.96747'),
('ZW070409', 'IXHsmjCW0vy', 'Kwekwe', 'Majorca', '29.60128021', '-18.77267'),
('ZW07040A', 'fN5Q0AZoXdy', 'Kwekwe', 'Kwekwe', '29.82374954', '-18.93572'),
('ZW07040B', 'qrfT3L9YO0c', 'Kwekwe', 'Silobela', '29.30458069', '-19.00511'),
('ZW07040C', 'DvW4fK9utJL', 'Kwekwe', 'Zhombe', '29.38493919', '-18.70336'),
('ZW070425', 'wo80amFm4OB', 'Kwekwe', 'Don Juan', '29.50744057', '-18.607'),
('ZW070426', 'IgWXO6O9cwM', 'Kwekwe', 'Exchange', '29.07592', '-18.84766'),
('ZW070427', 'G679ypcHye5', 'Kwekwe', 'Malisa Josefa', '29.12324905', '-19.00353'),
('ZW070428', 'w5Foehru2SO', 'mi Kwekwe District', 'mi Malisa Zhombe Clinic', '', ''),
('ZW070429', 'm145xcyK3sD', 'Kwekwe', 'Ntabeni', '29.33472061', '-18.80214'),
('ZW070430', 'zDHXPrHvZRf', 'Kwekwe', 'Samambwa', '29.45247078', '-18.33406'),
('ZW070431', 'PZBpKzBqPK8', 'mi Kwekwe District', 'mi Senkwazi Clinic', '', ''),
('ZW070432', 'cBXTpF0j9Li', 'Kwekwe', 'Sidakeni', '29.46838951', '-18.43989'),
('ZW070433', 'LOf2t7SLChQ', 'Kwekwe', 'Jackson', '29.25005913', '-19.10408'),
('ZW070434', 'eUv3iLHTiIN', 'Kwekwe', 'Simana', '29.11927986', '-18.92169');
INSERT INTO `facilities` (`facility_code`, `dhis2_code`, `district`, `facility_name`, `longitude`, `latitude`) VALUES
('ZW070451', 'BZOLhPC0o23', 'Kwekwe', 'Globe & Phonics', '29.8005', '-18.9231'),
('ZW070452', 'ShaUoNIfalb', 'Kwekwe', 'Rio Tinto', '29.43556023', '-18.46828'),
('ZW070453', 'i1OgeQDkwvW', 'Gweru', 'Mlezu', '29.92036057', '-19.15614'),
('ZW070453', 'i1OgeQDkwvW', 'Kwekwe', 'Mlezu', '29.3', '-19.1337'),
('ZW070454', 'tPlsx1I80sP', 'Kwekwe', 'Torwood', '29.73644066', '-19.02261'),
('ZW070459', 'brQm8hctUbs', 'Kwekwe', 'Redcliff', '29.78238', '-19.0226'),
('ZW070461', 'Ve7IRU3xTkP', 'Kwekwe', 'Amaveni', '29.78466', '-18.92453'),
('ZW070462', 'LbDW2TtPafa', 'Kwekwe', 'Mbizo 1', '29.83498', '-18.90588'),
('ZW070463', 'n7VCAl5EpZX', 'Kwekwe', 'Mbizo 11', '29.8502', '-18.9061'),
('ZW070464', 'UcjVrqFdzjb', 'Kwekwe', 'Rutendo', '29.77346', '-19.0084'),
('ZW070465', 'jmQaIMZ8F8q', 'Kwekwe', 'Sebakwe', '30.1225605', '-18.98881'),
('ZW070466', 'swWTIel4uf2', 'Kwekwe', 'Sherwood', '29.8062191', '-18.82453'),
('ZW070476', 'Closed', '', 'COMMUNITY POLYCLINIC', '', ''),
('ZW070477', 'f5r24bbz4bp', 'Kwekwe', 'Jena', '29.1651', '-18.8762'),
('ZW070481', 'lYISea3sa7Y', 'Kwekwe', 'Gaika', '29.8104', '-18.9485'),
('ZW070484', 'Q0SIcfVYZ3T', 'Kwekwe', 'Tiger Riff', '29.7114', '-18.8808'),
('ZW070485', 'fklDIbnXvDq', 'Kwekwe', 'Munyati', '29.78697014', '-18.67142'),
('ZW070486', 'oTzdCScsUos', 'Kwekwe', 'Aldavis', '29.81286', '-18.9364'),
('ZW070487', 'rSzWOU0r2dC', 'Kwekwe', 'ZRP', '29.8169', '-18.9417'),
('ZW070488', 'Ueajare7wgg', 'Kwekwe', 'Gomola', '29.45247078', '-18.76839'),
('ZW070501', 'BEFoLFs36HA', 'Mberengwa', 'Gwarava', '30.06847', '-20.95372'),
('ZW070502', 'tNU9P4tgMhs', 'Mberengwa', 'Mataga', '30.19042015', '-20.84119'),
('ZW070503', 'eQC86cRs7RZ', 'Mberengwa', 'Mavorovondo', '29.8180809', '-20.9215'),
('ZW070503', 'Duplicate', 'Mberengwa', 'MAVOROVONDO R.H.C.', '29.8180809', '-20.9215'),
('ZW070504', 'uQ9ydoZsNxt', 'Mberengwa', 'Murongwe', '30.25756073', '-20.60161'),
('ZW070505', 'Jr8if0re3nm', 'Mberengwa', 'Mwenezi', '29.7045002', '-20.77317'),
('ZW070506', 'XsaldP3aocJ', 'Mberengwa', 'Vurasha', '30.38402939', '-20.93614'),
('ZW070507', 'PhtaiN9uHu6', 'Mberengwa', 'Wanezi', '29.73971939', '-20.56978'),
('ZW070508', 'aWd20Dgkezw', 'Mberengwa', 'Kotokwe', '29.58897018', '-20.98397'),
('ZW07050A', 'sW2IoMcwvul', 'Mberengwa', 'Mberengwa', '29.91980934', '-20.48881'),
('ZW07050B', 'quI1OYvSBPV', 'Mberengwa', 'Jeka', '29.93413925', '-20.85536'),
('ZW07050C', 'r3oWdQofL1r', 'Mberengwa', 'Masase', '29.66699982', '-20.98667'),
('ZW07050D', 'mWQfdYJ8Ogf', 'Mberengwa', 'Mnene', '30.05381012', '-20.62342'),
('ZW07050E', 'F2UQyWLITD3', 'Mberengwa', 'Musume', '30.23905945', '-20.92289'),
('ZW070525', 'rrBkoOMZ2AC', 'Mberengwa', 'Bonda', '30.40714073', '-20.87094'),
('ZW070526', 'KbXhBIthsOo', 'Mberengwa', 'Chabwira', '30.23944092', '-20.67058'),
('ZW070527', 'jzGuPbMDQnJ', 'Mberengwa', 'Chedembeko', '29.90756035', '-20.73936'),
('ZW070528', 'QQsfN0FpDGU', 'Mberengwa', 'Chingezi', '29.78660965', '-20.72236'),
('ZW070529', 'uwaxQgd4SXs', 'Mberengwa', 'Makuwerere', '30.23636055', '-20.98544'),
('ZW070530', 'nuWZ2Ki399S', 'Mberengwa', 'Matedzi', '30.28738976', '-20.80739'),
('ZW070531', 'LoodK7ava2N', 'Mberengwa', 'Mazivofa', '30.10186005', '-20.75736'),
('ZW070532', 'v0m8r70tRq1', 'Mberengwa', 'Imbahuru', '30.10207939', '-20.86708'),
('ZW070533', 'RzpKJ0Szgz3', 'Mberengwa', 'Muketi', '30.14031029', '-21.00736'),
('ZW070534', 'AXBqSlJtWxr', 'Mberengwa', 'Negobe', '30.35491943', '-20.68572'),
('ZW070535', 'IyEihJS1W2P', 'Mberengwa', 'Ingezi', '30.38619041', '-20.58697'),
('ZW070536', 'pqunV5XpzEX', 'Mberengwa', 'Ngungumbane', '30.42119026', '-20.78594'),
('ZW070537', 'QtQuJs4drLH', 'Mberengwa', 'Svita', '30.13594055', '-20.58678'),
('ZW070538', 'lsUKdklKOFn', 'Mberengwa', 'Mponjani', '30.3904705', '-20.71839'),
('ZW070539', 'Hh829PZcxK8', 'Mberengwa', 'Mposi', '30.02206039', '-20.82161'),
('ZW070540', 'Vjl8EMsht4t', 'Mberengwa', 'Chiedza', '29.68721962', '-20.91722'),
('ZW070541', 'sDzK8Pt7tQU', 'Mberengwa', 'Vutsanana', '30.1959', '-20.7342'),
('ZW070578', 'qk0h8CWfku5', 'Mberengwa', 'Sandawana', '29.93564034', '-20.92094'),
('ZW070579', 'ixb5wH52mNJ', 'Mberengwa', 'Buchwa', '30.38104', '-20.6077'),
('ZW070586', 'XH5wtiNaktn', 'mi Mberengwa District', 'mi Mnene Outreach Mobile', '', ''),
('ZW070601', 'XWOMMnxlSoD', 'Shurugwi', 'Chikato', '30.30253029', '-19.81733'),
('ZW070602', 'LsOQ88WjuXR', 'Shurugwi', 'Chironde', '30.10330963', '-19.67347'),
('ZW070603', 'RB5YfilIXTy', 'Shurugwi', 'Chitora', '30.33897018', '-19.57206'),
('ZW070604', 'IKCXW2cAgiU', 'Shurugwi', 'Gwanza', '30.38903046', '-19.78753'),
('ZW070605', 'TD7ae6B1B8i', 'Shurugwi', 'Marishongwe', '30.01932907', '-19.87072'),
('ZW070606', 'D8CMbsbjqfb', 'Shurugwi', 'Rusike', '30.13622093', '-19.90139'),
('ZW070607', 'DHEcl0aTZ6O', 'Shurugwi', 'Tana', '30.30574989', '-19.88975'),
('ZW070608', 'db63NfYNFHF', 'Shurugwi', 'Zvarota', '30.22117043', '-19.5565'),
('ZW070609', 'aL58fK7xuuQ', 'Shurugwi', 'Svika', '30.25432968', '-19.57464'),
('ZW07060A', 'abUk6qibmMl', 'Shurugwi', 'Shurugwi', '30.0011692', '-19.67286'),
('ZW07060B', 'cHT3PnSLQGW', 'Shurugwi', 'Zvamabande', '30.13594055', '-19.80181'),
('ZW07060C', 'er8MU1A7ayn', 'Shurugwi', 'Chrome Mines', '29.99334', '-19.65205'),
('ZW070625', 's2XKQ7ZiCub', 'Shurugwi', 'Banga', '30.26968956', '-19.97475'),
('ZW070626', 'wgtPy9tJVaB', 'Shurugwi', 'Gundura', '30.08336067', '-19.88494'),
('ZW070627', 'HClC4EoiIq1', 'Shurugwi', 'Mazibisa', '30.25642014', '-19.8555'),
('ZW070628', 'ZOI2LyVcE8Z', 'Shurugwi', 'Nhema', '30.22019005', '-19.61906'),
('ZW070629', 'vZADsV7Sw4f', 'Shurugwi', 'Tongogara', '30.20760918', '-19.72044'),
('ZW070645', 'sLsMVIpwoky', 'Shurugwi', 'Jobolinko', '30.28710938', '-19.68503'),
('ZW070646', 'DccfijgagVH', 'Shurugwi', 'Makusha', '29.99906', '-19.67596'),
('ZW070647', 'i9MkUcK2ICF', 'Shurugwi', 'Rockford', '30.30810928', '-19.75194'),
('ZW070648', 'TmP4rXQZHcS', 'mi Shurugwi District', 'mi Tokwe Clinic', '', ''),
('ZW070679', 'X7x12PYjdok', 'Shurugwi', 'Golden Quary', '29.9821', '-19.6199'),
('ZW070691', 'HTBlKWC3ivP', 'Shurugwi', 'Hanke', '30.16764069', '-19.65592'),
('ZW070692', 'olYisdMN5zi', 'Shurugwi', 'Pakame', '30.04083061', '-19.93808'),
('ZW070698', 'NWTrxjKRc2D', 'Shurugwi', 'Dorset', '29.81333', '-19.95071'),
('ZW070701', 'YhVBzHr20wt', 'Zvishavane', 'Maketo', '29.93444061', '-20.20569'),
('ZW070702', 'UXwsoodN7jT', 'Zvishavane', 'Mandava', '30.06003', '-20.30589'),
('ZW070703', 'IV4p2J0Nryn', 'Zvishavane', 'Matenda', '30.05653', '-20.00344'),
('ZW070704', 'RE3XdcTPvmu', 'Zvishavane', 'Vugwi', '30.18968964', '-20.47197'),
('ZW070705', 'tflMp1UOdUl', 'Zvishavane', 'Vukuzenzele', '29.87214088', '-20.26669'),
('ZW07070A', 'SHBczc4h9R2', 'Zvishavane', 'Zvishavane', '30.05238914', '-20.30581'),
('ZW07070B', 'XLxruS1jL1F', 'Zvishavane', 'Lundi', '30.01794052', '-20.25819'),
('ZW07070C', 'apmZoDToelb', 'Zvishavane', 'Shabanie Mine', '30.06206', '-20.32071'),
('ZW070725', 'YkO5HeH7cyE', 'Zvishavane', 'Gudo', '30.21932983', '-20.39072'),
('ZW070726', 'SYIise5QtQF', 'Zvishavane', 'Mabasa', '30.0866909', '-20.15469'),
('ZW070727', 'bCGckHi7m7T', 'Zvishavane', 'Mapanzure', '29.91963959', '-20.08956'),
('ZW070728', 'x27Dvx5zX0K', 'Zvishavane', 'Murowa', '30.38694', '-20.53392'),
('ZW070729', 'c27sRLtrAAv', 'Zvishavane', 'Mtambi', '30.28418922', '-20.46786'),
('ZW070730', 'ZW070830', 'Zvishavane', 'Weleza', '30.1148', '-20.23495'),
('ZW070730', 'bthbb1sWMTl', 'mi Zvishavane District', 'mi Welezi Clinic', '', ''),
('ZW070776', 'WP6I08tjKCG', 'Zvishavane', 'Sabi Mine', '30.13646', '-20.39601'),
('ZW070777', 'RSWJwvm4fOh', 'Zvishavane', 'Mimosa', '29.83839035', '-20.33686'),
('ZW070778', 'o1XUOkb8Chw', 'Zvishavane', 'Medical Centre', '30.0516', '-20.3142'),
('ZW070780', 'QE3JDuXXC03', 'Zviashavane', 'ZPS', '30.057', '-20.3113'),
('ZW070785', 'EKzN9za0veE', 'Zvishavane', 'ZRP', '30.06', '-20.3079'),
('ZW070787', 'Iu4JU5vvsTl', 'Zvishavane', 'Mhondongori', '29.79052', '-20.27637'),
('ZW07080A', 'hqMzUGRF0Vl', 'mi Gokwe South District', 'mi Gokwe South District Hospital', '', ''),
('ZW080101', 'JI5VUIfVM9X', 'Bikita', 'Chirorwe', '31.91802979', '-19.88528'),
('ZW080102', 'fEoKPhBWVJD', 'Bikita', 'Devure 1', '32.12055969', '-19.95322'),
('ZW080103', 'DjzMz2Vsf8z', 'Bikita', 'Deure II', '31.95138', '-20.247192'),
('ZW080104', 'gjJpDJGG8bE', 'Bikita', 'Mkanga', '31.72113991', '-20.43703'),
('ZW080105', 'vMhfQ2lxNWJ', 'Bikita', 'Mukore', '31.84224', '-20.14081'),
('ZW080106', 'BkYTPx8PjB7', 'Bikita', 'Nyika', '31.58885956', '-20.00586'),
('ZW080107', 'R7iT0ozHwhk', 'Bikita', 'Ngorima', '31.68431091', '-20.28881'),
('ZW080108', 'lz7PrWN52YE', 'Bikita', 'Muvava', '', ''),
('ZW08010A', 'QDH3UlnqxdE', 'Bikita', 'Bikita', '31.60647011', '-20.06703'),
('ZW08010B', 'NMwfQhVVJic', 'Bikita', 'Chikuku', '31.86856079', '-20.0005'),
('ZW08010C', 'g2h0AGCGHG4', 'Bikita', 'Mashoko', '31.75057983', '-20.50519'),
('ZW08010D', 'skig6i0kMFB', 'Bikita', 'Silveira', '31.68678093', '-20.02347'),
('ZW080125', 'pt2kLo8cYjp', 'Bikita', 'Chitasa', '31.85453033', '-20.20817'),
('ZW080126', 'lnNATIfIe8J', 'Bikita', 'Hozvi', '31.53725052', '-20.05172'),
('ZW080127', 'yoSv5OSOTSt', 'Bikita', 'Pfupajena', '31.61775017', '-20.18919'),
('ZW080128', 'dW1nZB3QRuP', 'Bikita', 'Marozva', '31.52099991', '-20.00053'),
('ZW080129', 'MwCeR5AU5Xo', 'Bikita', 'Odzi', '31.85753059', '-20.42022'),
('ZW080130', 'BGXb33lhLbj', 'Bikita', 'Negovano', '31.72709', '-20.12917'),
('ZW080131', 'gNLShJ0wMmH', 'Bikita', 'Murwira', '31.65306091', '-19.94133'),
('ZW080132', 'YuB4DjpGKbr', 'Bikita', 'Mungezi', '31.52096', '-19.91393'),
('ZW080133', 'paEcB63wSvW', 'Bikita', 'Mutikizizi', '31.71084', '-20.20992'),
('ZW080134', 'IEJ0WsPBshR', 'Bikita', 'Gangare', '31.81698', '-19.9153'),
('ZW080135', 'T9AbvutvhKo', 'Bikita', 'Gava', '31.80962', '-20.53792'),
('ZW080176', 'xuedeiYXBDU', 'Bikita', 'Bikita Minerals', '31.80962', '-20.53792'),
('ZW080201', 'C5NOjTNMSLP', 'Chiredzi', 'Chambuta', '31.80488968', '-21.25369'),
('ZW080202', 'hYRXKuetQiF', 'Chiredzi', 'Chilonga', '31.6558609', '-21.22336'),
('ZW080204', 'MCNppVS36MO', 'Chiredzi', 'Chizvirizvi', '32.01939011', '-20.98369'),
('ZW080205', 'glToTsmBSNs', 'Chiredzi', 'Davata', '31.23349953', '-22.26981'),
('ZW080206', 'WrNbv2VF3IX', 'Chiredzi', 'Gezani', '31.15553093', '-22.10286'),
('ZW080207', 'Tjo7lWewbhC', 'Chiredzi', 'Malipati', '31.42019081', '-22.07142'),
('ZW080208', 'QI6mEC6q6Ge', 'Chiredzi', 'Mahlanguleni', '31.50419044', '-21.53764'),
('ZW080209', 'elKvx3rNTFA', 'Chiredzi', 'Muteyo', '32.12044144', '-20.93611'),
('ZW08020A', 'YbDW3tcFc5A', 'Chiredzi', 'Chiredzi', '31.67321968', '-21.036'),
('ZW08020B', 'tW1seCReVmF', 'Chiredzi', 'Chikombedzi', '31.33930969', '-21.67494'),
('ZW08020C', 'xuwXHQW0lEx', 'Chiredzi', 'Hippo Valley', '31.6511097', '-21.07347'),
('ZW08020D', 'of7XjyQuOBa', 'Chiredzi', 'Triangle', '31.47485924', '-21.04056'),
('ZW080210', 'WKb2oTWOZFK', 'Chiredzi', 'Nyangambe', '31.7523098', '-20.68347'),
('ZW080210', 'N80nErx1IsY', 'mv Chiredzi District', 'mv Nyambange Rural Health Centre', '', ''),
('ZW080211', 'wbX3Fgf7RX8', 'Chiredzi', 'Faversham', '31.35101', '-20.68621'),
('ZW080212', 'yq0AR7eRb3Y', 'Chiredzi', 'Old Boli', '31.45088959', '-21.42189'),
('ZW080213', 'nHNI84MVP0n', 'Chiredzi', 'Samu', '31.37443924', '-22.23522'),
('ZW080214', 'CktmRE9FieY', 'Chiredzi', 'Pahlela', '31.35771942', '-21.94103'),
('ZW080217', 'EqcfpqVkoXv', 'mv Chiredzi District', 'mv ZPS Chiredzi Prison Clinic', '', ''),
('ZW080218', 'FU7AXdidV0z', 'Chiredzi', 'ZRP', '31.67328072', '-21.03814'),
('ZW080225', 'DSg8HlmZ9uq', 'Chiredzi', 'Chimbwedziva', '31.79063988', '-21.35144'),
('ZW080226', 'igoWuGaddpK', 'Chiredzi', 'Chipiwa', '31.79128075', '-20.836'),
('ZW080227', 'FHv7mXP5yzW', 'Chiredzi', 'St Joseph', '32.12078094', '-20.82314'),
('ZW080228', 'jOpC2qi2X6j', 'Chiredzi', 'Dumisa', '31.4039402', '-22.21711'),
('ZW080229', 'RjPaRRmbrJq', 'Chiredzi', 'Porepore', '31.90518951', '-20.78747'),
('ZW080230', 'zxb1zUFM5sS', 'Chiredzi', 'Rapanguwana', '32.15028', '-21.00061'),
('ZW080231', 'lkhHqzi6ezf', 'Chiredzi', 'Rutandare', '31.30443954', '-22.10658'),
('ZW080232', 'N5W4thMg9Vf', 'Chiredzi', 'Chitsa', '32.15139008', '-21.10053'),
('ZW080233', 'EKnfAqyWdAo', 'mv Chiredzi District', 'mv Tshovani Clinic', '', ''),
('ZW080233', 'C3ns30PcFjR', 'Chiredzi', 'Tsovani', '31.68841934', '-21.039'),
('ZW080234', 'Kj83rFr3Q4P', 'Chiredzi', 'Makambe', '31.34011078', '-21.45361'),
('ZW080235', 'qHkq8Y4E0Q8', 'Chiredzi', 'Chomopani', '31.29052925', '-21.53381'),
('ZW080282', 'zbvky2oW8Wm', 'Chiredzi', 'Mkwasine', '31.88460922', '-20.83886'),
('ZW080284', 'z0dLCJK70y4', 'mv Chiredzi District', 'mv Chiredzi ZSA Clinic', '', ''),
('ZW080284', 'Y0hSxhcytz0', 'Chiredzi', 'ZSA', '31.61693954', '-21.03806'),
('ZW080285', 'SPN07U8I1kP', 'Chiredzi', 'NRZ', '31.46928024', '-21.02481'),
('ZW080285', 'D59t6IjbFPC', 'mv Chiredzi District', 'mv NRZ Clinic (Chiredzi)', '', ''),
('ZW080291', 'RR17IHFupHB', 'Chiredzi', 'Damarakanaka', '31.47324944', '-21.33969'),
('ZW080292', 'd3nnIyRIBkd', 'Chiredzi', 'Chingele', '31.61894035', '-21.41761'),
('ZW080302', 'LbxK9ARCm0M', 'Chivi', 'Chigwikwi', '30.20046997', '-20.15394'),
('ZW080303', 'kFndlxCVNkl', 'Chivi', 'Mhandamabwe', '30.37161064', '-20.11747'),
('ZW080304', 'VD1EhcQ8bNE', 'Chivi', 'Ngundu', '30.80264091', '-20.80253'),
('ZW080305', 'ajETJbPXyrQ', 'Chivi', 'Razi', '30.65422058', '-20.71986'),
('ZW080307', 'HCrlcfVKtZ4', 'Chivi', 'Takavarasha', '30.3073101', '-20.33397'),
('ZW080308', 'W5VZWNHM64p', 'Chivi', 'Nyahombe', '30.98888969', '-20.82406'),
('ZW08030A', 'ZmycPHadal5', 'Chivi', 'Chivi', '30.50655937', '-20.31897'),
('ZW08030A', 'ZmycPHadal5', 'Chivi', 'Chivi', '30.507307', '-20.314247'),
('ZW08030B', 'yUZhrtZsDix', 'Chivi', 'Chivi', '30.68786049', '-20.39058'),
('ZW08030C', 'OLppnxxYhG8', 'Chivi', 'Berejena', '30.58960915', '-20.63389'),
('ZW080321', 's2aXJCgTb0O', 'Chivi', 'Masinire', '30.37121964', '-20.40044'),
('ZW080324', 'jdwUJNG2RZj', 'mv Chivi District', 'mv Zivuku Clinic', '', ''),
('ZW080325', 'L5BRfqu0wvC', 'Chivi', 'Chifedza', '30.55810928', '-20.45081'),
('ZW080325', 'gqcU7kuBg9L', 'mv Chivi District', 'mv Vuranda Clinic', '', ''),
('ZW080326', 'L2jJid5aanE', 'Chivi', 'Davira', '30.43564034', '-20.47203'),
('ZW080327', 'dr94rzbEjNI', 'Chivi', 'Madamombe', '30.32361031', '-20.05228'),
('ZW080328', 'qIx8s9wFdbA', 'Chivi', 'Shindi', '30.85036087', '-20.87186'),
('ZW080333', 'WKajRM67kXh', 'Chivi', 'Utete', '30.20657921', '-20.03928'),
('ZW080391', 'k9LxvErzpF5', 'Chivi', 'Chivi', '30.55755997', '-20.35531'),
('ZW080401', 'IbfTUlnnPd2', 'Gutu', 'Mushaviri', '31.10091972', '-19.72333'),
('ZW080402', 'nMBIqdJIM7h', 'Gutu', 'Majarada', '31.38452911', '-19.83931'),
('ZW080403', 'v038Gk7E3aC', 'Gutu', 'Matizha', '30.96875', '-19.47356'),
('ZW080404', 'bvCr3KyoKpI', 'Gutu', 'Mutema', '30.98797035', '-19.88822'),
('ZW080405', 'rO0zd2ABjrh', 'Gutu', 'Nemashakwe', '31.68405914', '-19.83439'),
('ZW080406', 'TGVBYUvxPe5', 'Gutu', 'Soti Source', '31.20718956', '-19.45097'),
('ZW080408', 'BDPOo7vb6SH', 'Gutu', 'Chitando', '31.20241928', '-19.90722'),
('ZW080409', 'hmLr5OJqWd6', 'Gutu', 'Zvavahera', '31.35560989', '-19.57472'),
('ZW08040A', 'CsrqsNpaRqk', 'Gutu', 'Gutu', '31.15007973', '-19.65761'),
('ZW08040B', 'QEvN9NNhcHY', 'Gutu', 'Chimombe', '31.60614014', '-19.67189'),
('ZW08040D', 'fg20SUCO1na', 'Gutu', 'Chinyika', '31.48505974', '-19.50567'),
('ZW08040E', 'SmTWwxr4dsM', 'Gutu', 'Gutu', '31.21805954', '-19.65678'),
('ZW080425', 'qmuwPOCEvKY', 'Gutu', 'Cheshuro', '31.035245', '-19.843855'),
('ZW080426', 'NEZ2SRy5lc7', 'Gutu', 'Denhere', '31.18907928', '-19.28422'),
('ZW080427', 'ai2dhghqcnv', 'Gutu', 'Devure', '31.38666916', '-19.66761'),
('ZW080428', 'N79CQMH43tT', 'Gutu', 'Magombedze', '31.35021973', '-19.75803'),
('ZW080429', 'rFtocyzKceW', 'Gutu', 'Mazura', '31.64043999', '-19.60406'),
('ZW080430', 'Ba8txogG0jd', 'Gutu', 'Munyikwa', '31.80521965', '-19.72236'),
('ZW080431', 'XxPMxOI9jqs', 'Gutu', 'Nyazvidzi', '31.36735916', '-19.40494'),
('ZW080432', 'EWpTNffyi57', 'Gutu', 'Zinhata', '31.58646965', '-19.81789'),
('ZW080433', 'hyeZYVzPpLf', 'Gutu', 'Tirizi', '31.45027924', '-19.75394'),
('ZW080434', 'JhOE2PlU286', 'Gutu', 'Chiwore', '30.83930969', '-19.63397'),
('ZW080435', 'CK9XQFNrRzR', 'Gutu', 'Chitsa', '31.61733055', '-19.50175'),
('ZW080436', 'CwWMght8FRk', 'mv Gutu District', 'mv Chipiri Clinic', '', ''),
('ZW080436', 'bdCSEqaZjQ0', 'Gutu', 'Chepiri', '31.88508034', '-19.80603'),
('ZW080437', 'oJnY7eweQV8', 'Gutu', 'Dambara', '31.28635979', '-19.37464'),
('ZW080438', 'voupqZXYz1a', 'Gutu', 'Mataruse', '31.77186012', '-19.61928'),
('ZW080438', 'C3NcCrDgghe', 'mv Gutu District', 'mv Matomuse Clinic', '', ''),
('ZW080476', 'n2rESObXoQJ', 'mv Gutu District', 'mv Gutu Population Health Clinic', '', ''),
('ZW080491', 'vb0GjmvFmNM', 'Gutu', 'Serima', '30.88368988', '-19.51861'),
('ZW080492', 'S32hXpOtszS', 'Gutu', 'Mutero', '31.43803024', '-19.63433'),
('ZW080492', 'oLW8WxRRKwz', 'mv Gutu District', 'mv Mutero Rural Health Centre', '', ''),
('ZW080493', 'KJd1P67fZtb', 'Gutu', 'Mukaro', '31.15789032', '-19.75686'),
('ZW080493', 'eAeYJMOHja5', 'mv Gutu District', 'mv Mukaro Mission Hospital', '', ''),
('ZW080501', 'i1XUWpnIRQx', 'Masvingo', 'Alvod', '30.77088928', '-19.83389'),
('ZW080502', 'Fzq9mTt0mwd', 'Masvingo', 'Mukosi', '30.88978004', '-20.53867'),
('ZW080503', 'khsYWpCvLLQ', 'Masvingo', 'Mushandike', '30.71863937', '-20.20614'),
('ZW080504', 'VzoCjYnSVc2', 'Masvingo', 'Musvovi', '31.07022095', '-20.70494'),
('ZW080505', 'gsTGlHB8gmo', 'mv Masvingo District', 'mv ZPS Mutimurefu Prison Clinic', '', ''),
('ZW080505', 'g62Dpo22HZV', 'Masvingo', 'Mutimurefu', '31.037316', '-20.104089'),
('ZW080506', 'qzKscgrRHcZ', 'Masvingo', 'Nemwanwa', '30.92044067', '-20.27436'),
('ZW080507', 'Gx9mi4IpwDI', 'Masvingo', 'Nyikavanhu', '31.2206707', '-20.85339'),
('ZW080508', 'KDF86JWL9kr', 'Masvingo', 'ZRP Masvingo', '30.84577', '-20.6535'),
('ZW080509', 'G9IafWJuShQ', 'mv Masvingo District', 'mv 41st Brigade Clinic', '', ''),
('ZW08050A', 'McRpRMSMisr', 'Masvingo', 'Masvingo', '30.83913994', '-20.07272'),
('ZW08050B', 'LCjmNyIXjJ5', 'mv Masvingo District', 'mv Ngomahuru Psychiatric Hospital', '', ''),
('ZW08050C', 'FqtCDeFcuH7', 'Masvingo', 'Nyajena', '31.16732979', '-20.60147'),
('ZW08050D', 'THcy9of3EKy', 'Masvingo', 'Mogenester', '30.93507957', '-20.32372'),
('ZW08050E', 'YDV9XYWfyKl', 'Masvingo', 'Gokomere', '30.77453041', '-19.95453'),
('ZW08050F', 'AJ3uwrj63yO', 'Masvingo', 'Gaths Mine', '30.51238', '-20.0236'),
('ZW080510', 'i1svOb8EvPf', 'Masvingo', 'Masvingo Teachers College', '30.86269', '-20.10285'),
('ZW080511', 'BwhiLyWCv3K', 'Masvingo', 'Masvingo Poly Technic', '30.83191', '-20.08477'),
('ZW080512', 'Pn253DhIGF5', 'Masvingo', 'Summerton', '30.70318985', '-19.97103'),
('ZW080513', 'TrNFY61RrsO', 'mv Masvingo District', 'mv Wendedzo Clinic', '', ''),
('ZW080514', 'ql8eIGGkFJk', 'mv Masvingo District', 'mv Great Zimbabwe University Clinic', '', ''),
('ZW080520', 'g24yFqYA5xs', 'mv Masvingo District', 'mv Masvingo Rural District Council Mobile', '', ''),
('ZW080525', 'Q5S4ghrkIPr', 'Masvingo', 'Charumbira', '30.85639', '-20.29011'),
('ZW080526', 'voCqrifiYBN', 'Masvingo', 'Chatikobo', '31.15414047', '-20.43461'),
('ZW080527', 'RBAiyJ9u8im', 'Masvingo', 'Gundura', '30.52416992', '-19.87314'),
('ZW080528', 'TY6QX9xvr5f', 'Masvingo', 'Mapanzure', '30.87352943', '-20.40011'),
('ZW080529', 's11E1ddJRAJ', 'mv Masvingo District', 'mv ZPS Masvingo Remand Prison Clinic', '', ''),
('ZW080530', 'WpORH5kQ8fl', 'Masvingo', 'Bere', '30.47186089', '-20.03367'),
('ZW080531', 'Hz6oxH5mkwS', 'Masvingo', 'Murinye', '31.0537796', '-20.37325'),
('ZW080532', 'Q573I7dDsyy', 'Masvingo', 'Rukovo', '31.06792068', '-20.26822'),
('ZW080533', 'GmVXlJ4SYAZ', 'Masvingo', 'Shumba', '30.9691906', '-20.42275'),
('ZW080534', 'lfdYioS0Sbu', 'Masvingo', 'Zimuto', '30.85433006', '-20.06789'),
('ZW080534', 'lfdYioS0Sbu', 'Masvingo', 'Zimuto', '30.86891937', '-19.85644'),
('ZW080534', 'lfdYioS0Sbu', 'Masvingo', 'Zimuto BC', '30.864467', '-19.856462'),
('ZW080535', 'bQEbyIDLBKt', 'Masvingo', 'Mucheke', '30.81936073', '-20.08344'),
('ZW080536', 'Yoy3Jj07Yif', 'Masvingo', 'Zano', '31.12188911', '-20.2025'),
('ZW080540', 'CgHpXtKGPab', 'Masvingo', 'Guwa', '31.05475044', '-20.62497'),
('ZW080541', 'lslcMx31f2m', 'Masvingo', 'Gurajena', '30.90313911', '-19.77056'),
('ZW080543', 'u2oQ7F51Cum', 'mv Masvingo District', 'mv Zvamahande Clinic', '', ''),
('ZW080544', 'eA27CMD9GCW', 'Masvingo', 'Ngomahuru', '30.72394', '-20.43699'),
('ZW080576', 'hLt1vxPMtLl', 'Masvingo', 'Renco', '31.17053032', '-20.63819'),
('ZW080581', 'ck7pLPOQFDF', 'mv Masvingo District', 'mv Mazorodze Clinic', '', ''),
('ZW080582', 'FklZnyAweeh', 'Masvingo', 'Rujeko', '30.8374691', '-20.08433'),
('ZW080583', 'RyXYCIjkAWw', 'Masvingo', 'Runyararo', '30.82336044', '-20.10292'),
('ZW080583', 'RyXYCIjkAWw', 'Masvingo', 'Runyararo', '30.80991', '-20.0972'),
('ZW080591', 'mJaQxbScx06', 'Masvingo', 'Bondolfi', '30.75056076', '-20.28386'),
('ZW080592', 'AD1DBy9TnBQ', 'Masvingo', 'Shonganiso', '31.0854702', '-20.43675'),
('ZW080593', 'R9QcV5vI9ij', 'Masvingo', 'Zimuto', '30.85519028', '-19.95311'),
('ZW080601', 'Bvkjml3FqP8', 'Mwenezi', 'Chimbudzi', '30.50610924', '-20.94306'),
('ZW080602', 'HNUnbxZ5OUy', 'Mwenezi', 'Chirindi', '30.18000031', '-21.11611'),
('ZW080603', 'EKhuNsZc6Nl', 'Mwenezi', 'Chizumba', '30.57250023', '-21.13972'),
('ZW080604', 'sXRr6Jh1Ukn', 'Mwenezi', 'Maranda', '30.31583023', '-21.14583'),
('ZW080605', 'iZRMamLhmG5', 'Mwenezi', 'Nehanda', '30.60277939', '-20.82833'),
('ZW080606', 'Z7U0RkB0VQt', 'Mwenezi', 'Rutenga', '30.72944069', '-21.23778'),
('ZW08060A', 'aE9GkM17t5V', 'Mwenezi', 'Neshuro', '30.64666939', '-20.94083'),
('ZW08060B', 'Czle6XjxWyz', 'Mwenezi', 'Matibi', '30.48611069', '-20.75028'),
('ZW080625', 'QRc5MpV5Zts', 'Mwenezi', 'Mazetese', '30.30528069', '-21.04639'),
('ZW080627', 'fTtp6NjSMw4', 'Mwenezi', 'Mushava', '30.58389091', '-21.07639'),
('ZW080628', 'qLzDP5tdFZe', 'Mwenezi', 'Mwenezi', '30.70000076', '-21.41417'),
('ZW080629', 'dF1v2SOuvg2', 'Mwenezi', 'Murove', '30.42444038', '-21.05917'),
('ZW080630', 'VplhWkXe21U', 'Mwenezi', 'Mulelesi', '30.05916977', '-21.21417'),
('ZW080631', 'Du7biKhp1Ss', 'Mwenezi', 'Boterere', '30.26423', '-21.23095'),
('ZW080632', 'd7fOaS2UsST', 'Mwenezi', 'Marinda', '30.39756', '-21.20691'),
('ZW080681', 'NrFFCY3Je1b', 'Mwenezi', 'Rutenga RWS', '30.74333', '-21.25361'),
('ZW080682', 'LTctrOQJUYV', 'Mwenezi', 'Mwenezana', '30.625022', '-21.3625022'),
('ZW080683', 'dSmOsBpEdS0', 'mv Mwenezi District', 'mv G and N Clinic', '', ''),
('ZW080691', 'CoBuECjxZyS', '-21.1458]"', 'mv Maranda Clinic', '"[30.3158', ''),
('ZW080692', 'mxsDtZixLZC', 'Mwenezi', 'Lundi', '30.78166962', '-20.8975'),
('ZW080701', 'CtwfEoZrU3T', 'Zaka', 'Chipinda', '31.34071922', '-20.06892'),
('ZW080702', 'QKyJjASGoVM', 'Zaka', 'Harava', '31.27368927', '-20.40028'),
('ZW080703', 'TJqJ2ltKRH3', 'Zaka', 'Nemauku', '31.367537', '-20.281069'),
('ZW080704', 'goEe1IufApa', 'Zaka', 'Svuvure', '31.55732918', '-20.556'),
('ZW080705', 'jmqpBkcYVsh', 'Zaka', 'Zibwowa', '31.55372047', '-20.45111'),
('ZW08070A', 'NiAU2RdFd2O', 'Zaka', 'Ndanga', '31.32192039', '-20.18517'),
('ZW08070C', 'zF94vTZUOen', 'Zaka', 'Musiso', '31.4399395', '-20.43994'),
('ZW080720', 'sjw6oE6j9MO', 'mv Zaka District', 'mv Zaka EPI Mobile', '', ''),
('ZW080725', 'JxITOVaPFT1', 'Zaka', 'Bota', '31.40731049', '-20.62272'),
('ZW080726', 'OpqO7PRXP1Q', 'Zaka', 'Bvukururu', '31.4387207', '-20.10544'),
('ZW080727', 'Xv9Q2UReY0b', 'Zaka', 'Chinyabako', '31.55583', '-20.30689'),
('ZW080729', 'YBrN4MulgEM', 'Zaka', 'Chiredzana', '31.67089081', '-20.56889'),
('ZW080730', 'pHJSEeiAdBO', 'Zaka', 'Fuve', '31.61763954', '-20.35083'),
('ZW080732', 'aymM2tvX3J6', 'Zaka', 'Jichidza', '31.26786041', '-20.30397'),
('ZW080733', 'm7fNYLjfiTM', 'Zaka', 'Mushaya', '31.28597069', '-20.60228'),
('ZW080734', 'luI8lmoabFH', 'mv Zaka District', 'mv Ndanga Clinic', '', ''),
('ZW080735', 'ZQ5iU1uamLY', 'Zaka', 'Nhema', '31.544249', '-20.272823'),
('ZW080736', 'sFfKzYeVI4U', 'Zaka', 'Nyakunhuwa', '31.359695', '-20.460264'),
('ZW080737', 'wsvthNm37mG', 'Zaka', 'Siyawareva', '31.4861908', '-20.43864'),
('ZW080738', 'X6gxxPEVIzy', 'Zaka', 'Veza', '31.31711006', '-20.38519'),
('ZW080739', 'tyF4ojI2pf0', 'Zaka', 'Jerera', '31.45138931', '-20.42467'),
('ZW080740', 'EnUWwQqs6vP', 'Zaka', 'Mageza', '31.16789', '-20.3274'),
('ZW080741', 'KPkANbubddY', 'mv Zaka District', 'mv Mandhloro Clinic', '', ''),
('ZW080741', 'g0Ai6GvQkQE', 'mv Zaka District', 'mv Madhloro Clinic', '', ''),
('ZW080791', 'VJ0Qw6b1JSY', 'Zaka', 'Jichidza', '31.22244072', '-20.26978'),
('ZW090A01', 'MdssoEu135X', 'Bulawayo', 'Emakhandeni', '28.5249', '-20.1185'),
('ZW090A02', 'lmWhvNsB4XS', 'Bulawayo', 'Tshaballa', '28.5358', '-20.1744'),
('ZW090A03', 'g6ay6w7LekM', 'Bulawayo', 'E.F Watson', '28.545', '-20.1433'),
('ZW090A04', 'zmivGPwI9w9', 'Bulawayo', 'Entumbane', '28.5435', '-20.1207'),
('ZW090A05', 'e1IkMDxL8fe', 'bu Northern Suburbs District', 'bu Khami Road Clinic', '', ''),
('ZW090A06', 'xgkg7SkAtoW', 'Bulawayo', 'Luveve', '28.5118', '-20.1137'),
('ZW090A07', 'W71FXxLCgwr', 'Bulawayo', 'Magwegwe', '28.5084', '-20.1369'),
('ZW090A08', 'zxc4441YIhY', 'Bulawayo', 'Mzilikazi', '28.5696', '-20.1395'),
('ZW090A09', 'yuqvs8nDoW7', 'Bulawayo', 'Njube', '28.5329', '-20.1345'),
('ZW090A0A', 'ixCPrKpqwfy', 'bu Northern Suburbs District', 'bu Lady Rodwell Maternity Hospital', '', ''),
('ZW090A0E', 'RcNBj1T8gKb', 'Bulawayo', 'Thorngrove', '28.5559', '-20.1472'),
('ZW090A0G', 'snVfYfw3wu2', 'Bulawayo', 'Martar-Dei', '28.5965', '-20.1828'),
('ZW090A10', 'YVhOfzBetf1', 'Bulawayo', 'Nkulumane', '28.5202', '-20.1889'),
('ZW090A11', 'vzOHH2UeLTM', 'Bulawayo', 'Pelandaba', '28.5277', '-20.1466'),
('ZW090A12', 'CyzLGOqW4CZ', 'Bulawayo', 'Princess Margaret', '28.5898', '-20.1559'),
('ZW090A13', 'xQrUWw2fUC7', 'Bulawayo', 'Pumula ', '28.4803', '-20.1423'),
('ZW090A14', 'wBUDmbYlwLg', 'Bulawayo', 'Dr. Shennan ', '28.5674', '-20.1898'),
('ZW090A17', 'kQYOhNfF8V7', 'Bulawayo', 'Nketa', '28.534', '-20.2003'),
('ZW090A18', 'HyfZLnkED5k', 'Bulawayo', 'Northern Surbabs ', '28.5906', '-20.1268'),
('ZW090A19', 'l4HBtkwJhfZ', 'bu Northern Suburbs District', 'bu King\'s Maternity Clinic', '', ''),
('ZW090A20', 'cs3euJGArOo', 'bu Northern Suburbs District', 'bu Jubilee Clinic', '', ''),
('ZW090A21', 'rzb4Tw8eRDn', 'bu Northern Suburbs District', 'bu Bulawayo Maternal Health Clinic', '', ''),
('ZW090A21', 'dj3yixBALQD', 'bu Northern Suburbs District', 'bu Maternal and Child Health Centre', '', ''),
('ZW090A22', 'CgvZBugWYNn', 'bu Northern Suburbs District', 'bu Galen House Clinic', '', ''),
('ZW090A23', 'DwAlIVIbmIU', 'Bulawayo', 'Marondera', '28.5658', '-20.1374'),
('ZW090A24', 'UZqwaoVwvED', 'bu Northern Suburbs District', 'bu Bulawayo Family Medical Clinic', '', ''),
('ZW090A27', 'bCj2JfVpDwN', 'Bulawayo', 'Cowdray Park', '28.5087', '-20.0798'),
('ZW090A28', 'NpqeIttg5Cn', 'bu Northern Suburbs District', 'bu Silver Oaks Medical Centre', '', ''),
('ZW090A30', 'ZTL5TeMdviJ', 'bu Northern Suburbs District', 'bu Bulawayo Family Health Clinic', '', ''),
('ZW090A31', 'VWMkdfPIFPU', 'Bulawayo', '24-Hr Medical centre', '28.5277', '-20.1959'),
('ZW090A32', 'uZx1AbqBvTk', 'bu Northern Suburbs District', 'bu Main Street Clinic', '', ''),
('ZW090A33', 'RPASqynqwCM', 'Bulawayo', 'Maqhawe', '28.5009', '-20.1825'),
('ZW090A35', 'Ta5WU3NkNI0', 'Bulawayo', 'Pumula South', '28.4789', '-20.1622'),
('ZW090A36', 'f0xKBrZmcn8', 'bu Northern Suburbs District', 'bu Tembi Home Health Centre', '', ''),
('ZW090A39', 'rsn7P5OG1qd', 'bu Northern Suburbs District', 'bu Dr W Ndebele Clinic', '', ''),
('ZW090B0B', 'FOLMj0wPdOM', 'Bulawayo', 'Ingutsheni', '28.5766', '-20.1797'),
('ZW090C0C', 'KrJFStwra1P', 'bu Bulawayo Central Hospitals', 'bu UBH', '', ''),
('ZW090C0C', 'f6TuF07vwQr', 'Bulawayo', 'UBH', '28.6168', '-20.1664'),
('ZW090D0D', 'wsiS4rgfTm1', 'Bulawayo', 'Mpilo', '28.5708', '-20.1274'),
('ZW090D0D', 'lNcVomkCBOC', 'bu Mpilo', 'bu Mpilo Central Hospital', '', ''),
('', 'zUwmTT7voUJ', 'mv Masvingo District', 'mv Nyamande Clinic', '', ''),
('', 'ZroUxJW9iFQ', 'mn ZNA Braddy BarracksClinic', 'MN BRADDY', '', ''),
('', 'ZeLKg1z0ril', 'ha Eastern District', 'ha ZPS Harare Central Kentuky Prison Clinic', '', ''),
('', 'zDJxAy5tWc9', 'Bulawayo', 'Magwegwe North', '28.4951', '-20.1222'),
('', 'zAtYR7ZYUZ5', 'ma Nyanga District', 'ma Nyanguai Clinic', '', ''),
('', 'Z9w4yjx82FH', 'mw Zvimba District', 'mw Zvimba ZNFPC Clinic', '', ''),
('', 'z4QkjZPb6Fi', 'mw Makonde District', 'mw Makonde CBDS Clinic', '', ''),
('', 'Yzle3VzzyNN', 'Gweru', 'Tumbire', '29.4591', '-19.2506'),
('', 'YY0h3RaMrJN', 'me Mudzi District', 'me Nyapfunde Clinic', '', ''),
('', 'Yx5OTPLeUAc', 'mw Makonde District', 'mw Manyamba Rural Health Centre', '', ''),
('', 'ylFBVjnvqYP', 'ha Parirenyatwa Group of Hospitals', 'ha Parirenyatwa Casualty', '', ''),
('', 'ykGqyoIiu08', 'Mberengwa', 'ZPS', '29.9066', '-20.4779'),
('', 'yHHxYR0gIdJ', 'Gweru', 'Chinamasa', '29.9187', '-19.3053'),
('', 'yF36BJkyZkV', 'mw Chegutu District', 'mw Santa Barbara Mission Clinic', '', ''),
('', 'Y994YLVGuhY', 'ha Eastern District', 'ha ZPS Chikurubi Prison Dependants Clinic', '', ''),
('', 'xonqKvtiuxk', 'mv Chiredzi District', 'mv Dzavata Rural Health Centre', '', ''),
('', 'xKyiPe1J3DR', 'Kwekwe', 'ZPS', '29.1862', '-18.9416'),
('', 'xHIT3s80j50', 'mi Shurugwi District', 'mi Unki Clinic', '', ''),
('', 'XGNMosPGvzj', 'bu Northern Suburbs District', 'bu Pumula South Private Maternity Clinic', '', ''),
('', 'WWfWkLrHJVp', 'mi Gweru District', 'mi ZPS Whawha Prison Young Offenders Clinic', '', ''),
('', 'WUctvvuFuCM', 'ha Chitungwiza Central Hospital', 'ha Chitungwiza Maternity Services', '', ''),
('', 'WTqubvlU5op', 'ma Mutare District', 'ma ZPS Mutare Remand Prison Clinic', '', ''),
('', 'wT4eGsRLTWI', 'ha Harare Central South Eastern District', 'ha Harare City Private Institutions', '', ''),
('', 'WrD91KBvywr', 'mn Hwange District', 'mn Wellness Clinic', '', ''),
('', 'wNWk4ZQ6j81', 'ha Harare Central HospitaL', 'ha Harare Casualty', '', ''),
('', 'whpjZATZFoE', 'Hwange', 'Elephant Hills', '25.82613', '-17.91214'),
('', 'wH2xlL41Wbb', 'me Marondera District', 'me ZPS Ridigita Prison Clinic', '', ''),
('', 'WG5o4DJ5LYA', 'ha Chitungwiza Central Hospital', 'ha Chitungwiza Peadiatrics', '', ''),
('', 'WaYcDd2d9pk', 'ha Northern District', 'ha Borrowdale Clinic', '', ''),
('', 'VsCO40x1g1H', 'ha Chitungwiza Central Hospital', 'ha Chitungwiza Casualty', '', ''),
('', 'VRhyfZsm2tg', 'Kariba', 'Carribea Bay', '28.8031', '-16.5349'),
('', 'vnk8ws8BiGl', 'mn Umguza District', 'mn ZPS Khami Prison Staff Hospital', '', ''),
('', 'vn0WMoBf2hU', 'mv Masvingo District', 'mv Masvingo Rural District Council', '', ''),
('', 'vCdwyhmdzCe', 'me Mudzi District', 'me Mavhurazi clinic', '', ''),
('', 'v36ugriKdqP', 'mv Chivi District', 'mv Chirogwe Clinic', '', ''),
('', 'UXSP7PvIeDp', 'Hurungwe', 'Karoi Static', '29.6976', '-16.8075'),
('', 'UuHcaRFt2ZE', 'ha Harare Central Hospitals', 'ha Chitungwiza Central Hospital', '', ''),
('', 'udzEiBNEWeK', 'Seke', 'Overspill', '31.1565', '-17.8848'),
('', 'UA8oSDEFWgF', 'mv Masvingo District', 'mi Victoria High School Clinic', '', ''),
('', 'u0OcwSOClYn', 'ma Mutare District', 'ZPS MUTARE REMAND PRISON', '', ''),
('', 'TRu9REB4Q2X', 'mn Hwange District', 'mn Sidinda Rural Health Center', '', ''),
('', 'tq5SG6q8QUN', 'mn Hwange Colliery', 'mn Open Cast DR STATION', '', ''),
('', 'TlvL9zinytR', 'mc Rushinga District', 'mc Mazowe Bridge Rural Health Centre', '', ''),
('', 'sxPcBwIecTn', 'mi Kwekwe District', 'mi Zibagwe Rural District Council Clinic', '', ''),
('', 'SwtuQ2awRBo', 'mn Hwange District', 'mn ZPS Victoria Falls Prison Clinic', '', ''),
('', 'SP6JqFuJz7w', 'mi Shurugwi District', 'mi Zhaugwe Rural Health Centre', '', ''),
('', 'sa6I2X2iibD', 'mn Nkayi District', 'mn ZPS Nkayi Prison Clinic', '', ''),
('', 'S7ihrtajal5', 'mn Umguza District', 'mn ZPS Bulawayo Prison Clinic', '', ''),
('', 's4DMLIyHvLV', 'mi Zvishavane District', 'mi Rutendo Polyclinic', '', ''),
('', 'S1cZEJTerpe', 'ha Harare Central Hospitals', 'ha Harare Central HospitaL', '', ''),
('', 'RXt6JRztoPs', 'mv Bikita District', 'mv Ruponeso Clinic', '', ''),
('', 'rWhTP9rL1pr', 'ha Western District', 'ha Kuwadzana Phase 4', '', ''),
('', 'roGzelO4gPi', 'Mberengwa', 'Gaha', '29.8082', '-20.9729'),
('', 'RNy892dYSXr', 'Chipinge', 'Muswera', '32.605458', '-20.334519'),
('', 'RhxJVMsa8KW', 'mn Hwange District', 'mn Hwange Colliery', '', ''),
('', 'rho03NzB39h', 'ms Gwanda District', 'ms Silikwe Clinic', '', ''),
('', 'RBH49SMclnb', 'mw Sanyati District', 'ZRP', '29.9142', '-18.334'),
('', 'r5tFSDk2b8N', 'ha Eastern District', 'ha ZPS Chikurubi Maximum Prison Psychiatric', '', ''),
('', 'qzi6uFHa251', 'mi Kwekwe District', 'mi Topomazi Clinic', '', ''),
('', 'qYHXGSTNij8', 'mn Tsholotsho District', 'mn ZPS Tsholotsho Prison Clinic', '', ''),
('', 'PYVmCC5QzWR', 'Chikomba', 'Bvumbura', '31.27388954', '-19.13572'),
('', 'pofi4Agnpb3', 'bu Northern Suburbs District', 'bu CIMAS', '', ''),
('', 'pLiP5wLAIG7', 'mc Guruve District', 'mc Guruve Farm Health Scheme Clinic', '', ''),
('', 'PjmHC474EDN', 'ha Parirenyatwa Group of Hospitals', 'ha Parirenyatwa Staff Clinic', '', ''),
('', 'pIS8S7U9Sfo', 'mi Gokwe North District', 'mi Zhumba Clinic', '', ''),
('', 'PBEMVp7KXEp', 'mn Hwange Colliery', 'mn NO 2 DR STATION', '', ''),
('', 'oU49czd8SsW', 'mi Kwekwe District', 'mi Neighbourhood Surgery', '', ''),
('', 'oPuOEOz6VQQ', 'Beitbridge', 'Makombe', '30.5491', '-21.90371'),
('', 'OoUrZty9Ack', 'mi Gweru District', 'mi ZPS Thornhill Prison Clinic', '', ''),
('', 'ONmg4djzSUr', 'Harare', 'Caledonia', '31.2348', '-17.8451'),
('', 'oGoA3lS8Zu8', 'Gweru', 'Child Welfare', '29.83183', '-19.46832'),
('', 'Oe78ZdUDfSV', 'mi Shurugwi District', 'mi ZPS Shurugwi Prison Clinic', '', ''),
('', 'nxs1XzhCsB2', 'bu Northern Suburbs District', 'bu Parkade Centre', '', ''),
('', 'nXbiljJiSU9', 'mn Lupane District', 'mn ZPS Lupane Prison Clinic', '', ''),
('', 'nUPLeyD1mko', 'Mudzi', 'Chingamuka', '32.55430985', '-16.86803'),
('', 'NFr6poQnnZp', 'mi Gokwe North District', 'mi Gandavaroyi Clinic', '', ''),
('', 'NFDk0STscQI', 'mw Zvimba District', 'mw Bervking', '', ''),
('', 'NdNQBZC4plK', 'Hwange', 'Safari Lodge', '26.97443962', '-18.65611'),
('', 'mX8Iy87bSd0', 'me Goromonzi District', 'me Chishawasha Mission Clinic', '', ''),
('', 'Mj2x0INOlC7', 'me Goromonzi District', 'me ZPS Goromonzi Clinic', '', ''),
('', 'm8wk3IQkRom', 'bu Northern Suburbs District', 'bu Tshabalala Pvt Maternity Clinic', '', ''),
('', 'M4ZdpOygWSB', 'mw Zvimba District', 'mw ZPS Banket Prison Clinic', '', ''),
('', 'lskkAqCn3on', 'mn Hwange District', 'mn Nsongwa RHC', '', ''),
('', 'LKQCVzMlfxz', 'ha Eastern District', 'ha ZPS Chikurubi Female Prison Clinic', '', ''),
('', 'lKky1wClDaL', 'mw Zvimba District', 'mw Paramedical ARMY Hospital', '', ''),
('', 'LJUiK9hhD3j', 'ha Eastern District', 'ha ZPS Chikurubi Farm Prison', '', ''),
('', 'kxo3n8oZSaH', 'mn Hwange District', 'mn Songwa RHC', '', ''),
('', 'kt4DYjIBLlP', 'Zvimba', 'Banket', '30.39583015', '-17.38333'),
('', 'khYpE0OD9sA', 'Gutu', 'Guni', '31.14068985', '-20.00739'),
('', 'kh7nxvSaNtx', 'ha Eastern District', 'ha ZPS Chikurubi Maximum Prison Hospital', '', ''),
('', 'KDtapVKZRH9', 'mw Chinhoyi Provincial Hospital', 'mw Chinhoyi Provincial Hospital Casualty', '', ''),
('', 'K318vCZzdP2', 'mi Kwekwe District', 'mi Kwewe Polyclinic', '', ''),
('', 'JOfStEUt5e3', 'mn Hwange District', 'mn Milonga Rural Health Center', '', ''),
('', 'JJQhG6vfVHq', 'ha Eastern District', 'ha ZPS Chikurubi Prison Staff Hospital', '', ''),
('', 'Jf06hGdTGOt', 'bu Northern Suburbs District', 'bu Mahatshula Private Clinic', '', ''),
('', 'JduDBFvSkJI', 'mw Kariba District', 'mw ZPS Kariba Prison Clinic', '', ''),
('', 'j6V403chZCy', 'Gokwe South', 'Med-Park', '28.9397', '-18.2194'),
('', 'IzyrISIu5GW', 'ha Parirenyatwa Group of Hospitals', 'ha Parirenyatwa OPD', '', ''),
('', 'HYbpBJ0DCpZ', 'Gokwe south', 'Njelele', '29.0725', '-18.3025'),
('', 'hWbSV3iEQ4S', '-18.0033]"', 'mi Masuka Clinic', '"[28.4025', ''),
('', 'hrel5Tx9pKa', 'ha Eastern District', 'ha ZPS Harare Remand Prison', '', ''),
('', 'HOlb2wJQI4C', 'bu Bulawayo Central Hospitals', 'bu Ingutsheni', '', ''),
('', 'HLt8VqgQSH4', 'me Mutoko District', 'me ZN Army Camp Clinic Mutoko', '', ''),
('', 'hfkMdRTZsja', 'ha Harare Central South Eastern District', 'ha Parirenyatwa Clinic', '', ''),
('', 'GqwHVq4sdAP', 'ma Mutare District', 'ma Chatora Clinic', '', ''),
('', 'gGPnnqPAjz5', 'ha Chitungwiza Central Hospital', 'ha Chitungwiza Staff Clinic', '', ''),
('', 'GehBPE0FzB1', 'ha Harare Central HospitaL', 'ha Harare Paediatric', '', ''),
('', 'GD8EL0CSQSn', 'mw Mhondoro District', 'Gavhunga', '30.5599', '-18.72362'),
('', 'GCyRcR8dYEc', 'bu Northern Suburbs District', 'bu Royal Women\'s Clinic', '', ''),
('', 'g6ZZTzRxuno', 'Kwekwe', 'Mpinda', '29.2516098', '-19.15281'),
('', 'fZoVqfNG9Dg', 'Chitungwiza', 'ZRP camp', '31.1103', '-18.0169'),
('', 'Fy7dmIVnLrw', 'Gweru', 'Sino Zimbabwe', '30.0505', '-19.4184'),
('', 'fwV4STmkiq2', 'mc Shamva District', 'mc Madziwa Teachers\' College', '', ''),
('', 'fUUzoo2TLS9', 'me Mudzi District', 'me Nyamande Clinic', '', ''),
('', 'Fp8Yy74TCXu', 'ms Gwanda District', 'ms ZPS Filabusi Prison Clinic', '', ''),
('', 'fmgu6etdyLq', 'ma Mutare City', 'ma Sakubva Clinic', '', ''),
('', 'fJQT9Me7IlN', 'Gokwe South', 'Ndabambi', '29.3527', '-18.3231'),
('', 'fgWvSa8BDMD', 'mi Gokwe North District', 'mi Sanyati Mine Clinic', '', ''),
('', 'f7WXqv3NgCo', 'Shamva', 'chipoli ', '31.6841', '-17.2431'),
('', 'eUpO3WR3BKX', 'Buhera', 'Nyashanu', '31.53828049', '-19.28339'),
('', 'eTumkl8DSgO', '-17.9861]"', 'mi Huchu Clinic', '28.5325', ''),
('', 'Ett4I6kXvlz', 'me Marondera District', 'me Benjimed Private Clinic', '', ''),
('', 'eelkwjILUSv', 'mi Gokwe South District', 'mi Chitapo Clinic', '', ''),
('', 'ee367Xt3fRC', 'Gweru', 'Ruby', '29.445', '-19.611'),
('', 'e2w3gIVleBH', 'Shamva', 'mliti ', '31.4909', '-17.3739'),
('', 'dtyRypbIahM', 'mv Mwenezi District', 'mv Munyamani Rural Health Centre', '', ''),
('', 'dsqZiQwL964', 'Bubi', 'Turk Mine', '28.79389', '-19.71306'),
('', 'DC2oHCck0rA', 'ha Harare Province', 'ha Infectious Diseases Hospital', '', ''),
('', 'DbQXH7UTxW2', 'mw Makonde District', 'mw Kanyaga RDC Clinic', '', ''),
('', 'd8kcODE6HxZ', 'mv Chiredzi District', 'mv Chomupane Clinic', '', ''),
('', 'CvwlQZJp9g7', 'ma Chipinge District', 'ma Changazi clinic', '', ''),
('', 'cuCXSfoR12B', 'mv Masvingo District', 'mi Masvingo City', '', ''),
('', 'CpSRvjt0nkl', 'ma Nyanga District', 'ma Nyanga District Mobile', '', ''),
('', 'ci8nTvALyD5', 'mi Kwekwe District', 'mi Dambridge Clinic', '29.1225', '-19.1033'),
('', 'cfCeHnYPptp', 'mi Gweru District', 'mi Gweru City', '', ''),
('', 'cdDx6dXekAS', 'Kwekwe', 'Sigebubi', '28.9612', '-18.7356'),
('', 'C8cvRyUwNvw', 'Gokwe South', 'ZPS', '28.9337', '-18.2154'),
('', 'BWIG3f8pztU', 'me Marondera District', 'me Mahusekwa District Hospital', '', ''),
('', 'BnuCMCoUXxB', 'ma Makoni District', 'ma ZPS Little Kraal Prison Clinic', '', ''),
('', 'AXXQQVWUbCw', 'Mudzi', 'Mudzi Camp', '32.4498', '-17.1149'),
('', 'aXbupxQbubo', 'ha Harare', 'ha Annexe Hospital', '29.8817', '-18.3553'),
('', 'AS8MaWY2nbY', 'mn Hwange District', 'mn Falls Medical Center', '', ''),
('', 'arOd51g8jSQ', 'mw Hurungwe District', 'mw Murambe Clinic', '', ''),
('', 'anFVAVMwFHQ', 'me Mudzi District', 'me Goromonzi Clinic', '', ''),
('', 'ahIxYuB4HzP', 'mw Hurungwe District', 'mw Makuti Rural Health Centre', '', ''),
('', 'aG3e8vLBDp8', 'mw Hurungwe District', 'mw ZRP Clinic', '30.0052', '-22.2199'),
('', 'Ac5uYQLKdfz', 'ha Eastern District', 'ha ZPS Harare Central Prison Dependants Clinic', '', ''),
('', 'jLG7jgKTHcq', 'mc Guruve District', 'mc Guruve ZPS Clinic', '', ''),
('', 'NKO2ZLBx39Z', 'mw Mhondoro District', 'mw Battlefieds clinic', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `facility_codes`
--

CREATE TABLE `facility_codes` (
  `id` int(11) NOT NULL,
  `facility_code` varchar(17) DEFAULT NULL,
  `facility_name` varchar(250) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `county` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `owner` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `sub_location` varchar(250) DEFAULT NULL,
  `description_of_location` tinytext,
  `constituency` varchar(250) DEFAULT NULL,
  `nearest_town` varchar(250) DEFAULT NULL,
  `beds` varchar(50) DEFAULT NULL,
  `cots` varchar(50) DEFAULT NULL,
  `official_landline` varchar(20) DEFAULT NULL,
  `official_fax` varchar(20) DEFAULT NULL,
  `official_mobile` varchar(20) DEFAULT NULL,
  `official_email` varchar(50) DEFAULT NULL,
  `official_address` varchar(50) DEFAULT NULL,
  `official_alternate_number` varchar(20) DEFAULT NULL,
  `town` varchar(100) DEFAULT NULL,
  `post_code` varchar(20) DEFAULT NULL,
  `in_charge` varchar(100) DEFAULT NULL,
  `job_title_of_in_charge` varchar(150) DEFAULT NULL,
  `open_24hrs` varchar(50) DEFAULT NULL,
  `open_weekends` varchar(50) DEFAULT NULL,
  `operational_status` varchar(50) DEFAULT NULL,
  `anc` varchar(10) DEFAULT NULL,
  `art` varchar(10) DEFAULT NULL,
  `beoc` varchar(10) DEFAULT NULL,
  `blood` varchar(10) DEFAULT NULL,
  `caes_sec` varchar(10) DEFAULT NULL,
  `ceoc` varchar(10) DEFAULT NULL,
  `c_imci` varchar(10) DEFAULT NULL,
  `epi` varchar(10) DEFAULT NULL,
  `fp` varchar(10) DEFAULT NULL,
  `growm` varchar(10) DEFAULT NULL,
  `hbc` varchar(10) DEFAULT NULL,
  `hct` varchar(10) DEFAULT NULL,
  `ipd` varchar(10) DEFAULT NULL,
  `opd` varchar(10) DEFAULT NULL,
  `outreach` varchar(10) DEFAULT NULL,
  `pmtct` varchar(10) DEFAULT NULL,
  `rad_xray` varchar(10) DEFAULT NULL,
  `rhtc_rhdc` varchar(10) DEFAULT NULL,
  `tb_diag` varchar(10) DEFAULT NULL,
  `tb_labs` varchar(10) DEFAULT NULL,
  `tb_treat` varchar(10) DEFAULT NULL,
  `Youth` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `email` char(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `feedback` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `email`, `user_id`, `subject`, `feedback`, `created`, `modified`) VALUES
(1, 'eddieokemwa@gmail.com', NULL, NULL, NULL, '2018-01-03 12:45:56', '2018-01-03 12:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `frequencies`
--

CREATE TABLE `frequencies` (
  `id` int(11) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `icsr_code` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frequencies`
--

INSERT INTO `frequencies` (`id`, `value`, `name`, `icsr_code`, `created`, `modified`) VALUES
(2, 'OD', 'OD (once daily)', NULL, NULL, NULL),
(3, 'BD', 'BD (twice daily)', NULL, NULL, NULL),
(4, 'TID.', 'TID. (three times a day)', NULL, NULL, NULL),
(5, 'QID|QDS', 'QID|QDS (four times a day)', NULL, NULL, NULL),
(6, 'PRN', 'PRN PRN (as needed)', NULL, NULL, NULL),
(7, 'MANE', 'MANE (in the morning)', NULL, NULL, NULL),
(8, 'NOCTE', 'NOCTE (at night)', NULL, NULL, NULL),
(9, 'STAT', 'STAT (immediately)', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Administrators', 'Super users', '2017-10-31 19:27:19', '2017-10-31 19:27:19'),
(2, 'Managers', 'Evaluators Level 1', '2017-10-31 19:28:01', '2017-12-04 23:25:36'),
(3, 'Users', 'End users', '2017-10-31 19:28:12', '2017-10-31 19:28:12'),
(4, 'Evaluators', 'Level 2 Evaluators', '2017-12-04 23:25:24', '2017-12-04 23:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `help_infos`
--

CREATE TABLE `help_infos` (
  `id` int(11) NOT NULL,
  `field_name` varchar(25) DEFAULT NULL,
  `field_label` varchar(255) DEFAULT NULL,
  `place_holder` varchar(140) DEFAULT NULL,
  `help_type` varchar(50) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `content` text,
  `help_text` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `help_infos`
--

INSERT INTO `help_infos` (`id`, `field_name`, `field_label`, `place_holder`, `help_type`, `title`, `content`, `help_text`, `type`, `created`, `modified`) VALUES
(1, 'SadrReportTitle', 'REPORT TITLE', 'this content title..', 'mapop', 'Report Title', 'Appropriate title for the report e.g Nevirapine related Rash', 'e.g Nevirapine related rash', 'sadr', '2012-06-15 13:53:24', '2013-02-15 12:46:52'),
(2, 'patient_name', 'PATIENT\'S INITIALS', 'patient\'s initials', 'tooltipper', 'We only need your initials, not the full name', '', 'e.g A.B', 'sadr', '2012-06-15 14:39:39', '2013-02-09 17:05:29'),
(3, 'date_of_birth', 'DATE OF BIRTH', 'dd/mm/yyyy', 'tooltipper', 'select beginning of the month if unsure', '', 'If selected, year is mandatory. ', 'sadr', '2012-06-15 14:58:25', '2012-07-02 14:44:37'),
(4, 'description_of_reaction', 'BRIEF DESCRIPTION OF REACTION', '', 'mapop', 'Brief Description', 'Please describe the reaction in terms of symptoms', 'e.g accompanied by vomiting', 'sadr', '2012-06-15 15:02:45', '2012-06-15 15:02:45'),
(5, 'date_of_onset_of_reaction', 'DATE OF ONSET OF REACTION', 'dd/mm/yyyy', 'tooltipper', 'When did the reaction start', '', 'Date format dd-mm-yyyy e.g (18-05-2012) ', 'sadr', '2012-06-15 15:04:20', '2012-06-15 15:04:20'),
(6, 'patient_address', 'PATIENT\'S ADDRESS', 'patient\'s address', 'tooltipper', 'Where does the patient reside', '', 'e.g kayole', 'sadr', '2012-06-15 15:05:34', '2012-06-15 15:05:34'),
(7, 'gender', 'GENDER', '', '', '', '', '', 'sadr', '2012-06-15 15:06:47', '2012-06-15 15:06:47'),
(8, 'drug_name', 'LIST OF ALL DRUGS USED IN THE LAST 3 MONTHS PRIOR TO REACTION. IF PREGNANT, INDICATE THE DRUGS USED DURING THE 1st TRIMESTER ', '', 'tooltipper', 'This is the generic name', '', '(include OTC and herbals) ', 'sadr', '2012-06-15 16:45:19', '2012-06-15 16:45:19'),
(9, 'dose', 'DOSE', NULL, 'tooltipper', 'Dosage', '', '', 'sadr', '2012-06-15 16:52:24', '2012-06-15 16:55:17'),
(10, 'route_and_frequency', 'ROUTE AND FREQUENCY', NULL, '', '', '', '', 'sadr', '2012-06-15 16:57:06', '2012-06-15 17:30:08'),
(11, 'date_started', 'DATE STARTED', NULL, '', '', '', '(dd-mm-yyyy)', 'sadr', '2012-06-15 16:58:51', '2012-06-15 16:58:51'),
(12, 'suspected_drug', '', '', 'tooltipper', 'Drug suspected to cause reaction', 'At least one option must be selected<br>', '(select at least one)', 'sadr', '2012-06-15 17:01:16', '2013-02-09 17:07:06'),
(13, 'reporter_name', 'NAME OF PERSON REPORTING', NULL, 'tooltipper', 'Your names', '', '', 'sadr', '2012-06-15 17:11:01', '2012-06-15 17:11:01'),
(14, 'reporter_email', 'E-MAIL ADDRESS', NULL, 'tooltipper', 'Your E-Mail address', '', 'You will get updates to this email!', 'sadr', '2012-06-15 17:12:36', '2012-06-15 17:12:36'),
(15, 'header_title', '', '', '', '', 'Pharmacy and Poisons Board', '', 'header', '2012-06-23 19:46:37', '2012-06-30 11:21:56'),
(16, 'header_subtitle', '', '', '', '', 'Pharmacovigilance electronic reporting system', '', 'header', '2012-06-23 19:49:21', '2013-02-09 16:58:36'),
(17, 'header_caption', '', NULL, '', '', 'Ensuring Safety, Quality and Efficacy of Medicines', '', 'header', '2012-06-23 19:50:32', '2012-06-23 19:50:32'),
(18, 'menu_home', '', NULL, '', '', 'Home', '', 'menu', '2012-06-23 19:51:24', '2012-06-23 19:51:24'),
(19, 'menu_sadr', '', '', '', '', 'Report a Suspected Adverse Drug Reaction', '', 'menu', '2012-06-23 19:52:23', '2013-02-09 16:57:41'),
(20, 'menu_pqmp', '', '', '', '', 'Report a Suspected Poor Quality Medicine', '', 'menu', '2012-06-23 19:52:36', '2013-02-09 16:57:59'),
(21, 'menu_login', '', NULL, '', '', 'Login', '', 'menu', '2012-06-23 19:52:50', '2012-06-23 19:52:50'),
(22, 'menu_register', '', NULL, '', '', 'Register', '', 'menu', '2012-06-23 19:52:59', '2012-06-23 19:52:59'),
(24, 'home_content', '', '', '', '', '<div class="page-header" id="home_header">\r\n   <h1>Pharmacovigilance Electronic Reporting System <small>Pink and Yellow Forms</small></h1>\r\n</div>\r\n\r\n<div class="row-fluid" id="home_content">\r\n  <div class="span6 columns">\r\n      <div class="page-header">\r\n        <h3>Reporting a Suspected Adverse Drug Reaction   <small>(Yellow Form)</small></h3>\r\n      </div>\r\n  <a href="/sadrs/add"><img src="/img/sadr_2.png" style="float: left; margin: 5px; width: 30%;"></a>  \r\n      \r\n      <strong>Your support towards the National Pharmacovigilance system is appreciated.</strong><br>\r\n            Submission of a report does not constitute an admission that medical personnel or manufacturer or the product caused or contributed to the event.\r\n      Patient\'s identity is held in strict confidence and programme staff is not... \r\n      <p><a class="btn  btn-large btn-inverse" href="/sadrs/add">Report!</a></p>  \r\n      <div class="page-header">\r\n        <h3>Reporting a Suspected Poor Quality Medicinal Product&nbsp;<small>(Pink Form)</small></h3>\r\n      </div>    \r\n  <a href="/pqmps/add"><img src="/img/pqmp_2.png" style="float: left; margin: 5px; width: 30%;"></a>\r\n      <strong>Your support towards the National Pharmacovigilance system is appreciated.</strong><br>\r\n            Submission of a report does not constitute an admission that medical personnel or manufacturer or the product caused or contributed to the event.\r\n      Patient\'s identity is held in strict confidence and programme staff is not... \r\n      <p><a class="btn btn-large btn" href="/pqmps/add">Report!</a></p>\r\n</div>\r\n<div class="span6 columns">\r\n          <h2>Reporting Forms</h2>\r\n          <div id="myCarousel" class="carousel slide">\r\n            <div class="carousel-inner">\r\n              <div class="item active">\r\n                <a href="/sadrs/add"><img src="/img/sadr_2.png" alt=""></a>\r\n                <div class="carousel-caption">\r\n          <a class="btn btn-warning" href="/sadrs/add">Report!</a>\r\n          <h4><strong><em>You need not be certain... just be suspicious!</em></strong></h4>     \r\n          <p></p>\r\n                </div>\r\n              </div>\r\n              <div class="item">\r\n                <a href="/pqmps/add"><img src="/img/pqmp_2.png" alt=""></a>\r\n                <div class="carousel-caption">\r\n          <a class="btn btn-warning" href="/pqmps/add">Report!</a>\r\n          <h4><strong><em>You need not be certain... just be suspicious!</em></strong></h4>     \r\n                </div>\r\n              </div>\r\n            </div>\r\n            <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>\r\n            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>\r\n          </div>\r\n          <div class="alert alert-info" style="text-align: center;">\r\n            <div align="left"><strong>Your support towards the National Pharmacovigilance system is appreciated.</strong><br></div><div align="left">\r\n            Submission of a report does not constitute an admission that medical personnel or manufacturer or the product caused or contributed to the event.\r\n      Patient\'s identity is held in strict confidence and programme staff is not expected to and will not disclose the reporter\'s identity in response to any\r\n      public request. Information submitted by you will contribute to the improvement of drug safety and therapy in Kenya. \r\n          </div></div>\r\n         \r\n  </div>\r\n</div>\r\n\r\n\r\n<div class="row-fluid" id="home_content">\r\n  <div class="span12">\r\n        <h3>Reporting Tools   <small>(Download standalone applications for PC and Mobile installation)</small></h3>\r\n        <br>\r\n      <table class="table table-condensed table-striped">\r\n        <tbody>\r\n          <tr>\r\n            <td><i class="icon-ok"></i> <br></td>\r\n            <td><p>Download the PV Desktop app <small>(Windows Installer)</small> </p></td>\r\n            <td><a class="btn" href="/files/pv-install.exe"><i class="icon-download-alt"></i> PV.exe</a></td>\r\n            <td><i class="icon-ok"></i> <br></td>\r\n            <td><p>Download the PV Desktop app as a jar file <small>(Linux/Mac OS)</small>  </p></td>\r\n            <td><a class="btn" href="/files/PIV.jar"><i class="icon-download-alt"></i> PIV.jar</a></td>\r\n          </tr>\r\n          <tr>\r\n            <td><i class="icon-ok"></i> <br></td>\r\n            <td><p>Download the PV Mobile app for Android </p></td>\r\n            <td><a class="btn" href="/files/PPBMobile.apk"><i class="icon-download-alt"></i> Android Installer</a></td>\r\n            <td><i class="icon-ok"></i> <br></td>\r\n            <td><p>Download the PV Mobile app for app Nokia </p></td>\r\n            <td><a class="btn" href="/files/PPB_Mobile.wgz"><i class="icon-download-alt"></i> Nokia Installer</a></td>\r\n          </tr>\r\n          <tr>\r\n            <td><i class="icon-ok"></i> <br></td>\r\n            <td colspan="3"><p>Download Java Runtime Edition <small>(java is required for the desktop application)</small></p></td>\r\n            <td colspan="2"><a class="btn" href="/files/jre-7u13-windows-i586.exe"><i class="icon-download-alt"></i> Java Installer</a></td>\r\n          </tr>\r\n        </tbody>\r\n      </table>\r\n  </div>\r\n</div>', '', 'home', '2012-06-23 19:59:24', '2013-02-15 15:30:38'),
(25, 'menu_report', '', NULL, '', '', 'My Reports', '', 'menu', '2012-06-23 20:09:53', '2012-06-23 20:09:53'),
(26, 'menu_report_sadr', '', '', '', '', 'SADR Reports', '', 'menu', '2012-06-23 20:11:27', '2012-08-01 15:38:28'),
(27, 'menu_report_pqmp', '', '', '', '', 'PQMP Reports', '', 'menu', '2012-06-23 20:11:52', '2012-08-01 15:38:42'),
(28, 'sadr_add_header', '', '', '', '', '<h1>Suspected Adverse Drug Reaction Reporting Form  <small>(YELLOW FORM)</small></h1>', '', 'sadr_add', '2012-06-26 17:15:16', '2013-02-15 12:56:36'),
(29, 'sadr_add_content', '', '', '', '', '', '', '', '2012-06-26 17:16:46', '2012-06-30 13:31:17'),
(30, 'sadr_edit_tab1', '', NULL, '', '', 'Initial Report ID: ', '', NULL, '2012-06-26 17:34:10', '2012-06-26 17:34:10'),
(31, 'sadr_edit_tab2', '', NULL, '', '', 'Follow Up Reports ', '', NULL, '2012-06-26 17:36:01', '2012-06-26 17:36:01'),
(32, 'sadr_edit_tip', '', NULL, '', '', '<span class="label label-important">Tip:</span> Fields marked with <span style="color:red;">*</span> are mandatory', '', NULL, '2012-06-26 17:42:55', '2012-06-26 17:42:55'),
(33, 'sadr_edit_form_id', '', NULL, '', 'Form ID:', '<h6><span class="label label-important">Important</span> Unique Form ID</h6>	', '', NULL, '2012-06-26 17:45:46', '2012-06-26 17:45:46'),
(34, 'SadrNameOfInstitution', 'NAME OF INSTITUTION', '', '', '', '', '', NULL, '2012-06-26 17:55:05', '2012-06-26 17:55:05'),
(35, 'address', 'ADDRESS', NULL, '', '', '', '', NULL, '2012-06-26 18:01:51', '2012-06-26 18:01:51'),
(36, 'sadr_county_id', 'COUNTY', NULL, '', '', '', '', NULL, '2012-06-26 18:05:33', '2012-06-26 18:05:33'),
(37, 'institution_code', 'INSTITUTION CODE', NULL, '', '', '', '', NULL, '2012-06-26 18:07:23', '2012-06-26 18:07:23'),
(38, 'sadr_contact', 'INSTITUTION CONTACT', NULL, '', '', '', '', NULL, '2012-06-26 18:07:36', '2012-06-26 18:07:36'),
(39, 'ip_no', 'IP/OP. NO.', NULL, '', '', '', '', NULL, '2012-06-26 18:08:46', '2012-06-26 18:08:46'),
(40, 'age_group', 'AGE GROUP', NULL, '', '', '', '', NULL, '2012-06-26 18:09:41', '2012-06-26 18:09:41'),
(41, 'known_allergy', 'ANY KNOWN ALLERGY', NULL, '', '', '', '', NULL, '2012-06-26 18:10:52', '2012-06-26 18:10:52'),
(42, 'ward', 'WARD / CLINIC', NULL, '', '', '', '(Name/ Number)', NULL, '2012-06-26 18:14:28', '2012-06-26 18:14:28'),
(43, 'SadrReporterEmail', 'E-MAIL ADDRESS', NULL, '', '', '', 'This information is <span class="label label-success">Confidential</span>', NULL, '2012-06-30 11:49:18', '2012-06-30 12:11:28'),
(44, 'menu_report_followup', '', NULL, '', '', 'SADR Follow UP reports', '', NULL, '2012-08-03 15:01:22', '2012-08-03 15:01:22'),
(45, 'sadr_add_left_content', '', '', '', '', '<div class="accordion" id="accordion2">\r\n						<div class="accordion-group">\r\n						  <div class="accordion-heading">\r\n							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">\r\n							  EXPLANATORY NOTES\r\n							</a>\r\n						  </div>\r\n						  <div id="collapseThree" class="accordion-body collapse in">\r\n							<div class="accordion-inner">\r\n								  <!-- Headings & Paragraph Copy -->\r\n								  <div class="row-fluid">\r\n									<div class="span12">\r\n									  <h3>New Report</h3>\r\n									  <p>When submitting a new report, you are first required to provide us with the type of report and your email address. We will use this address to send you copies of the reports you have submitted to us</p>\r\n									  <p>You are advised to <a href="/users/register">register</a> as a \r\n										user especially if you will be using this system often</p>\r\n					<h4>Benefits of Registration</h4>\r\n					<dl>\r\n						</dl><ol><li><b>Form Auto-filling</b>: The new forms will be automatically filled with some of your registration data to reduce the work required to fill the entire form.</li><li><b>Reports:</b> You will get access to all reports that you have submitted in a easy to use interface.If you have registered your institution code and you posses appropriate privileges, you will be able to view a listing of other reports submitted from the same institution.</li><li><b>Optional persistent communication with Pharmacovigilance department at PPB:</b> You will have the option of turning on or off initial Email Notification. You will be able to turn or or off the automatic email sent when you create a report.You will still get the confirmation email on successful submit.</li></ol><dl>\r\n					</dl>				<h3>WHO CAN REPORT</h3>\r\n										<p>All healthcare professionals (clinicians, dentists, nurses, pharmacists, physiotherapists, community health \r\n											workers etc) are encouraged to report. Patients (or their next of kin) may also report.</p>\r\n										<address>\r\n											<strong>THE PHARMACY AND POISONS BOARD</strong><br>\r\n											Lenana Road.<br>\r\n											<abbr title="Post Office Box">P.O. Box</abbr> 27663-00506 NAIROBI<br>\r\n											<abbr title="Telephone Number">Tel:</abbr> (020)-2716905 / 6 Ext 114 \r\n											<abbr title="Fascimile">Fax:</abbr> (020)-2713431 / 2713409 <br>\r\n											E-mail: <a href="mailto:#">pv@pharmacyboardkenya.org</a>\r\n\r\n											\r\n										  </address>\r\n									</div>\r\n															\r\n								  </div>\r\n							   \r\n							</div>\r\n						  </div>\r\n						</div>				\r\n					</div>', '', 'sadr_add', '2012-08-03 15:09:17', '2013-02-20 17:39:30'),
(46, 'sadr_add_middle_header', '', '', '', '', '<h3>Report Type<br></h3>', '', 'sadr_add', '2012-08-03 15:11:04', '2013-02-09 12:41:13'),
(47, 'sadr_add_right_content1', '', NULL, '', '', '<h3>Search for Initial Report<small> Use Report ID</small></h3>', '', 'sadr_add', '2012-08-03 15:18:02', '2012-08-03 15:18:02'),
(48, 'sadr_add_right_content2', '', NULL, '', '', '<h3>Search for follow up report<small> Use Report ID', '', 'sadr_add', '2012-08-03 15:18:24', '2012-08-03 15:18:24'),
(49, 'product_formulation_1', 'Oral tablets / capsules', NULL, '', '', '', '', 'pqmp', '2012-09-29 09:46:37', '2012-09-29 09:46:37'),
(50, 'product_formulation_2', 'Oral suspension / syrup', NULL, '', '', '', '', 'pqmp', '2012-09-29 09:47:42', '2012-09-29 09:47:42'),
(51, 'product_formulation_3', 'Injection', NULL, '', '', '', '', 'pqmp', '2012-09-29 09:48:12', '2012-09-29 09:48:12'),
(52, 'product_formulation_4', 'Diluent', NULL, '', '', '', '', 'pqmp', '2012-09-29 09:48:45', '2012-09-29 09:48:45'),
(53, 'product_formulation_5', 'Powder for Reconstitution of Suspensions', '', '', '', '', '', 'pqmp', '2012-09-29 09:49:01', '2012-11-27 12:16:45'),
(54, 'product_formulation_6', 'Powder for Reconstitution of Injection', NULL, '', '', '', '', 'pqmp', '2012-09-29 09:49:28', '2012-09-29 09:54:02'),
(55, 'product_formulation_7', 'Eye drops', NULL, '', '', '', '', 'pqmp', '2012-09-29 09:49:57', '2012-09-29 09:49:57'),
(56, 'product_formulation_8', 'Ear drops', NULL, '', '', '', '', 'pqmp', '2012-09-29 09:50:14', '2012-09-29 09:50:14'),
(57, 'product_formulation_9', 'Nebuliser solution', NULL, '', '', '', '', 'pqmp', '2012-09-29 09:50:38', '2012-09-29 09:50:38'),
(58, 'product_formulation_10', 'Cream / Ointment / Liniment / Paste', NULL, '', '', '', '', 'pqmp', '2012-09-29 09:51:01', '2012-09-29 09:51:01'),
(59, 'product_formulation_11', 'Other', NULL, '', '', '', '', 'pqmp', '2012-09-29 09:51:31', '2012-09-29 09:51:31'),
(60, 'pqmp_add_header', '', '', '', '', '<h1>Poor Quality Medicinal Products Reporting Form  <small>(PINK FORM)</small></h1>', '', 'pqmp_add', '2012-11-02 14:11:01', '2012-11-12 11:16:42'),
(61, 'pqmp_add_left_content', '', '', '', '', '<div class="accordion" id="accordion2">\r\n						<div class="accordion-group">\r\n						  <div class="accordion-heading">\r\n							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">\r\n							  EXPLANATORY NOTES\r\n							</a>\r\n						  </div>\r\n						  <div id="collapseThree" class="accordion-body collapse in">\r\n							<div class="accordion-inner">\r\n								  <!-- Headings & Paragraph Copy -->\r\n								  <div class="row-fluid">\r\n									<div class="span12">\r\n									  <h3>New Report</h3>\r\n									  <p>When submitting a new report, you are first required to provide us with the type of report and your email address.</p>\r\n									  <p>We will use this address to send you copies of the reports you have submitted to us</p>\r\n									  <p>You are advised to <a href="/users/register">register</a> as a \r\n										user especially if you will be using this system often</p>\r\n										<h4>Benefits of Registration</h4>\r\n										<dl>\r\n											</dl><ol><li><b>Form Auto-filling</b>: The new forms will be automatically \r\nfilled with some of your registration data to reduce the work required \r\nto fill the entire form.</li><li><b>Reports:</b> You will get access to \r\nall reports that you have submitted in a easy to use interface.If you \r\nhave registered your institution code and you posses appropriate \r\nprivileges, you will be able to view a listing of other reports \r\nsubmitted from the same institution.</li><li><b>Optional persistent communication with Pharmacovigilance department at PPB:</b>\r\n You will have the option of turning on or off initial Email \r\nNotification. You will bea ble to turn or or off the automatic email \r\nsent when you create a report.You will still get the confirmation email \r\non successful submit.</li></ol><dl></dl>\r\n									  <h3>WHAT TO REPORT</h3>\r\n									  <p>An Adverse Drug Reaction (ADR) is defined as a reaction that is noxious and unintended, and occurs at doses normally used in\r\n										 man for prophylaxis, diagnosis or treatment of a disease, or for modification of physiological function.</p>\r\n										<address>\r\n											<strong>THE PHARMACY AND POISONS BOARD</strong><br>\r\n											Lenana Road.<br>\r\n											<abbr title="Post Office Box">P.O. Box</abbr> 27663-00506 NAIROBI<br>\r\n											<abbr title="Telephone Number">Tel:</abbr> (020)-2716905 / 6 Ext 114 \r\n											<abbr title="Fascimile">Fax:</abbr> (020)-2713431 / 2713409 <br>\r\n											E-mail: <a href="mailto:#">pv@pharmacyboardkenya.org</a>\r\n\r\n											\r\n										  </address>\r\n									</div>\r\n															\r\n								  </div>\r\n							   \r\n							</div>\r\n						  </div>\r\n						</div>				\r\n					</div>', '', 'pqmp_add', '2012-11-02 14:13:02', '2013-02-09 12:39:03'),
(62, 'pqmp_add_middle_header', '', NULL, '', '', '				<h3>New Report</h3>', '', 'pqmp_add', '2012-11-02 14:14:40', '2012-11-02 14:14:40'),
(63, 'pqmp_add_right_content1', '', NULL, '', '', '<h3>Search <small> Use Report ID</small></h3>', '', 'pqmp_add', '2012-11-02 14:19:45', '2012-11-02 14:19:45'),
(64, 'pqmp_add_request', '', NULL, '', '', '<h3>Request for Submitted reports <small>Get all reports you have submitted using this email address...</small></h3>', '', 'pqmp_add', '2012-11-02 14:20:09', '2012-11-02 14:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` longtext,
  `type` varchar(255) DEFAULT NULL,
  `description` text,
  `style` varchar(255) DEFAULT NULL,
  `priority` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `subject`, `content`, `type`, `description`, `style`, `priority`, `created`, `modified`, `deleted`) VALUES
(1, 'applicant_submit_sadr_email', 'New SADR report :reference_number', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :reference_number</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :reporter_email,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: ACKNOWLEDGEMENT OF RECEIPT OF A SUSPECTED ADVERSE DRUG REACTION (ADR) REPORT :reference_number</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We acknowledge with thanks receipt of the suspected adverse drug reaction (ADR) report <strong>:reference_number</strong>. The report will be processed and tabled for consideration by the Pharmacovigilance and Clinical Trials Committee. We will notify you of the Committee&rsquo;s decision in due course.</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We appreciate your submission of the report and your support of the national pharmacovigilance programme in promoting patient safety. </span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:14px"><em><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">pdf_copy&nbsp; :pdf_link</span></span></em></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>MEDICINES CONTROL AUTHORITY OF ZIMBABWE</strong></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><em>to insert signature</em></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>DIRECTOR - GENERAL</strong></span></span></span></p>\r\n', 'email', 'Email sent to reporter after submitting SADR report', 'success', 3, '2017-12-05 21:58:48', '2018-01-07 22:19:13', NULL),
(2, 'applicant_submit_sadr_notification', 'Submitted report :reference number', '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>:reporter_email</em>. Your reference number is <strong>:reference_number</strong>.</p>\r\n', 'notification', 'System notification generated for the user when they submit a new SADR Report', 'success', 4, '2017-12-05 22:15:10', '2018-01-03 13:28:53', NULL),
(3, 'registration_email', 'Registration to MCAZ PV', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p>You are getting this email because you have registered as a new user in the :pv_site. To activate your account, please click on the link below and then proceed to login</p>\r\n\r\n<p><u><strong>:activation_link</strong></u></p>\r\n\r\n<p><em>if you did not register, you can safely ignore this email!</em></p>\r\n', 'email', 'Email Sent to reporter upon successful registration', NULL, NULL, '2017-12-05 00:00:00', '2018-01-03 01:18:17', NULL),
(4, 'manager_submit_sadr_email', 'New SADR report :reference_number', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p>A new SADR report :reference_number, has been submitted from the online portal and is ready for review.</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ PV</p>\r\n', 'email', 'Email sent to evaluators when a new ADR report is submitted.', NULL, NULL, '2017-12-09 14:39:08', '2018-01-03 02:48:21', NULL),
(5, 'manager_submit_sadr_notification', 'New SADR report :reference_number', '<p>New SADR report :reference_number submitted on :submitted_date is ready for review.</p>\r\n', 'notification', 'Notification sent to evaluators on new ADR report submitted.', 'info', 5, '2017-12-09 14:41:28', '2018-01-03 14:13:29', NULL),
(6, 'manager_assign_evaluator_email', 'New report :reference_number for review', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p>You have been assigned a new Report :reference_number for review :assigned_by_name.</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to evaluator when a new report has been assigned to them.', 'danger', 1, '2017-12-12 15:17:08', '2018-01-03 14:13:54', NULL),
(7, 'manager_assign_evaluator_notification', 'New report :reference_number for review', '<p>Newly assigned Report :reference_number for review. Assigned by :assigned_by_name</p>\r\n\r\n<p>:user_message</p>\r\n', 'notification', 'Notification sent to Evaluator when they have been assigned a new SADR report for review.', 'danger', 1, '2017-12-12 15:24:26', '2018-01-03 14:14:13', NULL),
(8, 'manager_assign_notification', 'Assigned :reference_number to :assigned_to_name', '<p>Assigned :reference_number to :assigned_to_name.</p>\r\n', 'notification', 'Notification sent to Manager when they have assigned an evaluator a new report for review.', 'info', 4, '2017-12-12 15:30:10', '2018-01-03 14:14:31', NULL),
(9, 'manager_assign_evaluator_message', 'New report :reference_number for review', '<p>Dear :name,</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>:assigned_by_name</p>\r\n', 'message', 'Message sent by manager to evaluator during assignment', 'warning', 1, '2017-12-12 15:51:59', '2018-01-03 14:14:55', NULL),
(10, 'manager_review_assigned_email', 'New Review for report :reference_number', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p>A new review has been submitted for report :reference_number assigned to you by :assigned_by_name.</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to assigned evaluator Level 2 when manager conducts a causality assessment', NULL, NULL, '2017-12-13 14:36:44', '2018-01-03 02:48:47', NULL),
(11, 'manager_review_assigned_notification', 'New Committee Review for report :reference_number', '<p>Dear :name,</p>\r\n\r\n<p>A new review has been submitted for report :reference_number assigned to you.</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>MCAZ</p>\r\n', 'notification', 'Notification sent to Evaluator Level 2 when a new review is submitted by manager.', 'danger', 1, '2017-12-13 14:39:25', '2018-01-03 14:15:22', NULL),
(12, 'manager_review_notification', 'New Review for report :reference_number', '<p>You have submitted a review for report :reference_number</p>\r\n', 'notification', 'Notification sent to manager when they conduct causality assessment', 'info', 4, '2017-12-13 14:48:28', '2018-01-03 14:15:38', NULL),
(13, 'manager_request_reporter_email', 'New request for info for report :reference_number', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear Sir/Madam,</p>\r\n\r\n<p>Kindly provide more information for the report :reference_number</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'The automatic email with the user message sent to the reporter when MCAZ request for more information.', NULL, NULL, '2017-12-13 16:55:04', '2018-01-03 02:48:56', NULL),
(14, 'manager_request_reporter_message', 'New request for info for report :reference_number', '<p>Dear Sir/Madam,</p>\r\n\r\n<p>Kindly provide more information for the report :reference_number</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'message', 'The automatic message with the user message sent to the reporter when MCAZ request for more information.', NULL, NULL, '2017-12-13 16:55:45', '2017-12-13 16:55:45', NULL),
(15, 'manager_request_reporter_evaluator_notification', 'Request for more information by :assigned_by_name for :reference_number', '<p>A new request for more information for :reference_number has been sent by :assigned_by_name</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>Edward</p>\r\n', 'notification', 'Notification sent to assigned evaluator when manager requests for more information from reporter', 'danger', 1, '2017-12-13 17:15:44', '2018-01-03 14:15:53', NULL),
(16, 'applicant_submit_sadr_followup_email', 'New follow up report for SADR report :reference_number', '<p>&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :reference_number</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :reporter_email,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: ACKNOWLEDGEMENT OF RECEIPT OF A SUSPECTED ADVERSE DRUG REACTION (ADR) REPORT :reference_number</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We acknowledge with thanks receipt of the suspected adverse drug reaction (ADR) report <strong>:reference_number</strong>. The report will be processed and tabled for consideration by the Pharmacovigilance and Clinical Trials Committee. We will notify you of the Committee&rsquo;s decision in due course.</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We appreciate your submission of the report and your support of the national pharmacovigilance programme in promoting patient safety. </span></span></span></p>\r\n\r\n<p style="text-align:left"><em>pdf_copy&nbsp; :pdf_link</em></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>MEDICINES CONTROL AUTHORITY OF ZIMBABWE</strong></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><em>to insert signature</em></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>DIRECTOR - GENERAL</strong></span></span></span></p>\r\n', 'email', 'Email notification for a submitting a follow up suspected adverse drug reacation (ADR) report', 'info', 4, '2017-12-14 15:05:03', '2018-01-07 22:24:32', NULL),
(17, 'applicant_submit_sadr_followup_notification', 'New follow up report for SADR report :reference_number', '<p>New follow up report for SADR report :reference_number created on :created</p>\r\n', 'notification', 'Notification sent to manager upon successful submit of new follow up report by reporter', 'info', 5, '2017-12-14 15:11:05', '2018-01-04 01:05:31', NULL),
(18, 'manager_submit_sadr_followup_email', 'New follow up report for SADR report :reference_number', '<p>&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :reference_number</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :reporter_email,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: ACKNOWLEDGEMENT OF RECEIPT OF A SUSPECTED ADVERSE DRUG REACTION (ADR) REPORT :reference_number</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We acknowledge with thanks receipt of the suspected adverse drug reaction (ADR) report <strong>:reference_number</strong>. The report will be processed and tabled for consideration by the Pharmacovigilance and Clinical Trials Committee. We will notify you of the Committee&rsquo;s decision in due course.</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We appreciate your submission of the report and your support of the national pharmacovigilance programme in promoting patient safety. </span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>MEDICINES CONTROL AUTHORITY OF ZIMBABWE</strong></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><em>to insert signature</em></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>DIRECTOR - GENERAL</strong></span></span></span></p>\r\n', 'email', 'Email sent to manager when follow up report sent by applicant', NULL, NULL, '2017-12-14 15:16:09', '2018-01-03 02:50:24', NULL),
(19, 'manager_submit_sadr_followup_notification', 'New follow up report for SADR report :reference_number', '<p>New follow up report for SADR report :reference_number created on :created</p>\r\n', 'notification', 'Notification sent to manager upon successful submit of new follow up report by reporter', 'info', 5, '2017-12-14 15:17:48', '2018-01-04 01:05:54', NULL),
(20, 'manager_request_evaluator_email', 'New request for info for report :reference_number', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p>Kindly provide more information for the report :reference_number</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'The automatic email with the user message sent to the evaluator when MCAZ request for more information.', NULL, NULL, '2017-12-16 13:04:08', '2018-01-03 02:50:07', NULL),
(21, 'manager_request_evaluator_message', 'New request for info for report :reference_number', '<p>Dear :name,</p>\r\n\r\n<p>Kindly provide more information for the report :reference_number</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>:user_message</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'message', 'The automatic message with the user message sent to the evaluator when MCAZ request for more information.', NULL, NULL, '2017-12-16 13:18:51', '2017-12-16 13:18:51', NULL),
(22, 'manager_committee_assigned_email', 'New Committee Review for report :reference_number', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p>A new committee review has been submitted for report :reference_number assigned to you by :assigned_by_name.</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to assigned evaluator Level 2 when manager conducts uploads committee Review', NULL, NULL, '2017-12-16 16:45:44', '2018-01-03 02:51:08', NULL),
(23, 'manager_committee_assigned_notification', 'New Committee Review for report :reference_number', '<p>Dear :name,</p>\r\n\r\n<p>A new Committee review has been submitted for report :reference_number assigned to you by :assigned_by_name.</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>MCAZ</p>\r\n', 'notification', 'Notification sent to Evaluator Level 2 when a New Committee review is submitted', 'danger', 1, '2017-12-16 16:53:28', '2018-01-06 20:57:18', NULL),
(24, 'manager_committee_notification', 'New Committee Review for report :reference_number', '<p>You have submitted a committee review for report :reference_number</p>\r\n', 'notification', 'Notification sent to manager when they upload committee review for report', 'danger', 1, '2017-12-16 16:55:41', '2018-01-06 20:57:37', NULL),
(25, 'reporter_committee_comments_email', 'MCAZ review of :reference_number', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear Sir/Madam,</p>\r\n\r\n<p>MCAZ has reviewed and approved the :reference_number that you submitted on :created.</p>\r\n\r\n<p>MCAZ Comments:</p>\r\n\r\n<p>:literature_review</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'email', 'Email sent to reporter when the committee approves the report', NULL, NULL, '2017-12-16 17:08:01', '2018-01-03 02:51:25', NULL),
(26, 'reporter_committee_comments_notification', 'MCAZ review of :reference_number', '<p>MCAZ Review of :reference_number,</p>\r\n\r\n<p>MCAZ has reviewed and approved the :reference_number that you submitted on :created.</p>\r\n\r\n<p>MCAZ Comments:</p>\r\n\r\n<p>:literature_review</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'notification', 'Notification sent to reporter when MCAZ reviews the report', 'danger', 1, '2017-12-16 17:10:06', '2018-01-06 20:57:56', NULL),
(27, 'applicant_submit_aefi_email', 'New AEFI report :reference_number', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :reference_number</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :reporter_email,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: ACKNOWLEDGEMENT OF RECEIPT OF A AEFI REPORT :reference_number</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We acknowledge with thanks receipt of the adverse event following immunization (AEFI) report <strong>:reference_number</strong>. The report will be processed and tabled for consideration by the Pharmacovigilance and Clinical Trials Committee. We will notify you of the Committee&rsquo;s decision in due course.</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We appreciate your submission of the report and your support of the national pharmacovigilance programme in promoting patient safety. </span></span></span></p>\r\n\r\n<p style="text-align:left"><em>pdf_copy&nbsp; :pdf_link</em></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>MEDICINES CONTROL AUTHORITY OF ZIMBABWE</strong></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><em>to insert signature</em></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>DIRECTOR - GENERAL</strong></span></span></span></p>\r\n', 'email', 'Email sent to reporter after submitting AEFI report', 'info', 4, '2017-12-16 19:31:30', '2018-01-07 22:21:36', NULL),
(28, 'applicant_submit_aefi_notification', 'Submitted report :reference_number', '<p>Thank you for submitting the AEFI report to MCAZ. An acknowledgement email has been sent to <em>:reporter_email</em>. Your reference number is <strong>:reference_number</strong>.</p>\r\n', 'notification', 'System notification generated for the user when they submit a new AEFI Report', 'success', 2, '2017-12-16 19:33:47', '2018-01-06 20:58:19', NULL),
(29, 'manager_submit_aefi_email', 'New AEFI report :reference_number', '<p>Dear :name,</p>\r\n\r\n<p>A new AEFI report :reference_number, has been submitted from the online portal and is ready for review.</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ PV</p>\r\n', 'email', 'Email sent to evaluators when a new AEFI report is submitted.', NULL, NULL, '2017-12-16 19:38:02', '2017-12-16 19:38:02', NULL),
(30, 'manager_submit_aefi_notification', 'New AEFI report :reference_number', '<p>New AEFI report :reference_number submitted on :submitted_date is ready for review.</p>\r\n', 'notification', 'Notification sent to evaluators on new AEFI report submitted.', 'success', 2, '2017-12-16 19:39:25', '2018-01-06 20:58:54', NULL);
INSERT INTO `messages` (`id`, `name`, `subject`, `content`, `type`, `description`, `style`, `priority`, `created`, `modified`, `deleted`) VALUES
(31, 'applicant_submit_aefi_followup_email', 'New follow up report for AEFI report :reference_number', '<p>&nbsp;</p>\r\n\r\n<p><img src="data:image/png;base64,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6zA0mqURVqKGxrZJXu7MrE9hy5HFl1hU6qoa5LijT9WtVforQVZLnVnpKPMwD7GMr2KojjU1VbL5VuvYqt+w+AG5WLewSGksZcHfT5gmfzhGh2z1ZYBUyivsDaBDjq1gqIN86eT1198ryAqN2fSivdGA1H355Zfy7bffyueffy5ff/319IGL+FCHqhUH4vKbmbhFxJmXd8Acx48fLxdffLE17u4453fOOecUXkRomGe2sSP86quvLksssURLqvws/ck7WB977LEFQr322mvLs88+K5WVlWaVevnll3+Wus+sUt4W1eqq+w8//FB22WUXOfvss03MzJY3cWhHwY/60tTOzaxWbQ+Pjt9//71cddVVli7lg+P8x0iftHgmSe/1119vu+I/UUjH5T//+U+hrG644YZCPc+rRb346quvWv3RlvG8TJs2zaJ7vdl8881loYUWKrQ37X1hiHVy2d99952cf/75Bb29zcrr35Zr4uKosxMmTJDTTz9d5p9/fpOdXNsR6DC5i/Ee/dBTauHqIiuvuZx+xIBhzbY5aBofasBttPma2uvXasHy5QLeAOnY1LJV2yDfTaiSpx55TUNF1o5AgbKEVIiRISUnVSL/ufleXbWpizDgI+rdTCOsf0rksAq6o6KG/Kg+OlH/kvNv1gUiiMPfZZfZd04PP2YvvRGIEMfmFc/9kRxDzPw7JY42x07kxFOPUVkkoHnknxGrzDUDrykdi5gRvsraqWq1G6kRsJwRBpJolErPG2WXkVvJ+EnfWBS7V7DcEUg9C5bAQqp2gjWO1bFDhwyWD8d+oriHRSxhDh/xuA7pgaF9OkyHqk8/51j1h5wqMTUCjlVNrzIIzvrLJTLHQJ2bSBZYVFPEstZckxlflWTD16UQdyWNb77yccHKkd80Gmn+toolY4455pD1119fhgwZInPPPbfQQLXFHXfccTLffPPJvPPOK1988YXFxbWn8aHD8w74+OOPl5EjR8p+++0nvXv3Lqji5O/oo482/en0IZkz2zhDgp544gn56KOPTPbMxi8o9COesGckDfvQoUN1tXsXmTp1qnVWl112mVAOPXSBVEVFhUycOPFH1OqHS4oyoWwPPPBAWW655eSmm24yQt9eYsTLCw7C1Z76ObM5PfTQQ2X//feXPffc06J27crmnjzvtLUd7m5mqA44QSxxd97p83BnGO0n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" /></p>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :reference_number</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :reporter_email,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: ACKNOWLEDGEMENT OF RECEIPT OF A ADVERSE EVENT FOLLOWING IMMUNIZATION (AEFI) REPORT :reference_number</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We acknowledge with thanks receipt of the AEFI report <strong>:reference_number</strong>. The report will be processed and tabled for consideration by the Pharmacovigilance and Clinical Trials Committee. We will notify you of the Committee&rsquo;s decision in due course.</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We appreciate your submission of the report and your support of the national pharmacovigilance programme in promoting patient safety. </span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>MEDICINES CONTROL AUTHORITY OF ZIMBABWE</strong></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><em>to insert signature</em></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>DIRECTOR - GENERAL</strong></span></span></span></p>\r\n', 'email', 'Email sent on successful submit of followup by reporter', NULL, NULL, '2017-12-17 00:07:36', '2017-12-17 00:07:36', NULL),
(32, 'applicant_submit_aefi_followup_notification', 'New follow up report for report :reference_number', '<p>New follow up report for SADR report :reference_number created on :created</p>\r\n', 'notification', 'Notification sent to reporter upon successful submission of followup report', 'warning', 2, '2017-12-17 00:09:03', '2018-01-06 20:59:13', NULL);
INSERT INTO `messages` (`id`, `name`, `subject`, `content`, `type`, `description`, `style`, `priority`, `created`, `modified`, `deleted`) VALUES
(33, 'manager_submit_aefi_followup_email', 'New follow up report for report :reference_number', '<p>&nbsp;</p>\r\n\r\n<p><img src="data:image/png;base64,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6zA0mqURVqKGxrZJXu7MrE9hy5HFl1hU6qoa5LijT9WtVforQVZLnVnpKPMwD7GMr2KojjU1VbL5VuvYqt+w+AG5WLewSGksZcHfT5gmfzhGh2z1ZYBUyivsDaBDjq1gqIN86eT1198ryAqN2fSivdGA1H355Zfy7bffyueffy5ff/319IGL+FCHqhUH4vKbmbhFxJmXd8Acx48fLxdffLE17u4453fOOecUXkRomGe2sSP86quvLksssURLqvws/ck7WB977LEFQr322mvLs88+K5WVlWaVevnll3+Wus+sUt4W1eqq+w8//FB22WUXOfvss03MzJY3cWhHwY/60tTOzaxWbQ+Pjt9//71cddVVli7lg+P8x0iftHgmSe/1119vu+I/UUjH5T//+U+hrG644YZCPc+rRb346quvWv3RlvG8TJs2zaJ7vdl8881loYUWKrQ37X1hiHVy2d99952cf/75Bb29zcrr35Zr4uKosxMmTJDTTz9d5p9/fpOdXNsR6DC5i/Ee/dBTauHqIiuvuZx+xIBhzbY5aBofasBttPma2uvXasHy5QLeAOnY1LJV2yDfTaiSpx55TUNF1o5AgbKEVIiRISUnVSL/ufleXbWpizDgI+rdTCOsf0rksAq6o6KG/Kg+OlH/kvNv1gUiiMPfZZfZd04PP2YvvRGIEMfmFc/9kRxDzPw7JY42x07kxFOPUVkkoHnknxGrzDUDrykdi5gRvsraqWq1G6kRsJwRBpJolErPG2WXkVvJ+EnfWBS7V7DcEUg9C5bAQqp2gjWO1bFDhwyWD8d+oriHRSxhDh/xuA7pgaF9OkyHqk8/51j1h5wqMTUCjlVNrzIIzvrLJTLHQJ2bSBZYVFPEstZckxlflWTD16UQdyWNb77yccHKkd80Gmn+toolY4455pD1119fhgwZInPPPbfQQLXFHXfccTLffPPJvPPOK1988YXFxbWn8aHD8w74+OOPl5EjR8p+++0nvXv3Lqji5O/oo482/en0IZkz2zhDgp544gn56KOPTPbMxi8o9COesGckDfvQoUN1tXsXmTp1qnVWl112mVAOPXSBVEVFhUycOPFH1OqHS4oyoWwPPPBAWW655eSmm24yQt9eYsTLCw7C1Z76ObM5PfTQQ2X//feXPffc06J27crmnjzvtLUd7m5mqA44QSxxd97p83BnGO0nDUBb4mW88MILy6677irbbrtt0fK64IILZJ555pEll1zS6scyyyzT7MezQntG28QzEdeb559/Xj744AN7gcS152UhDxRlSnu10047yUEHHdTsdnvkx3EOO+wwGT58uPzxj3+Ufv3YHiy5mUFgljxtWLqUZ8gHSgQWW2LhQCaMp0RkpRWtbAjPhvZEevSpkE22XFd7HoYT1FKWWQDZL61n9776VYKrVVJQmyiFxCAcmlwgaCXy2CPPytQptbLHfjtlKUN5Mn2M7AQLWeBEwZ/GD1IJYZk8sUrOPuN8nbPGFh86N0/DNyjh6dq1m8w7dA5ZaPF5LJyRF5NXzHEju1lIusysWGRhlVWXlqq67zPSFT9sED2iutXPcaSBDPPYmD/YvUeJWgBX0YBmfzQ9LJouCsENXWQenW84rCAnYJkVeYGgNdcb/JBRUVEuXbt0k3vvfExXPuv8OP0X5rA1VZlSLTesdrX1NXLQEbrPXGGYFRoNgcRcr0jr/S8++kYX29ytOuo9Wy3NFjNNcxyba9H2q3oj5Fo6KqpUyeTDDz7uRVtUiA8XcRNScN999xXqzNJLL120EzVMMuLN2zAWNByk7je/+U0hnfZ0XnGcM844Q265RaceqIv15JpGmrd29Bg2TMu0HY78Et+tKe0Q8aNFgYhWVVUZOaAzguSdeuqpRuZwWCAeffRRIy04CO+P4dxiSnm0p/OakY4u89JLLxUsOODgbdrMkjPirbPOOvZ8HHnkkbOMXLmO/qJEvcRxPO+88+TGG2+U7t27T5fVHwKvfCLkFTJAWrwsOblxyyX+YPpjWTLz+nGNDo7FVlttZVa4Lbfc0vzee+896du3r2DJK+Yef/xxeeWVV8yiRbxvvvnGjljqOO+v22iRt2uvvVYGDx4c2kZ7Wa+3cKQxaNAgO7anvSqm00UXXST33qtbUeXczNZXosdx/vWvf9nLKO7HqDt5/X/p1x0mdzZsqh38B2M/0mG372XllZcPmGTWpdYBykgVhRcF5HNlkydPsOHKAjmC6GiFfOX5t3Vif5g/FyxCHkaP+p9OnpNrLh8lQ+efV3698qJGfbCM6SSwzFhFamQ9G/rMLFj4lhmZK5FbdAi4V485VAfkIVStiGrNm1o5RYav+zurbC1bniKdiI7Dy1xIl7MefbrIiisvZd+CZdGBV+zSbA5jYGoogGamnRIiTVe5YZ1+DmzjzdYOREb35GsGoKWjCWqUo/9wgOlsy0jYqw9XKJvpyRUWsGAVKpdH/u95ufO2B5TklZslr7QU0hiwMDGKASS8a49G2fvg7TILXchfsEWGh7W0rIscfOCJMkD3BQzFCHY6r7JAXoNaHf1bUd5VHn/0OYO4rZ0vb8xYhMjLp59+WmjwvFPwRoWy4RzytcEGG5iqkKXYzcoGyDtOb4RpiOP5gW3NXzFMvTMudu/n4Id+lIsTBLc+FcO3V69e8n//93+CVSK2UvyQ+aAu3HrrrT9Iel7P0H/RRRdtVzbiOoulBnfllVfadIKOOuolOoK1v4A89thjJjZ+HprmMXc0xZmLT97dCoauTmD8OXr44YfN2t4ey/fMaVI8dFw2hHjmmWfkt7/9rQX2+svLTLG6ThjI37LLLmvhCUMct/Yuv/zy9iL0q1/9SkaMGGFhKCvue99CeJ4vv7ZAHXSuN6RxVjue7+Tah0AHyZ2TJJFPP/nCVoYusXSYh2bbYHC7TQ7yFVSB5Cyz/KIy35BBKo85WfjrfWVZZTqs2FBfJjddd6eSgwJb0vuQmxCuTL9u8c1nk2T0Q0/LDjtvmpEzJEAoQhzjcr6dhhGdoKjd5VRP/nXe5UrmfBmsT05VK1V1lay3/upNXK1A1ojoRAxBSMvII5ctuOtuvkz3vesSLHKEMWuXLoBQcWHVZx5EpU0qurZ+mhx19EG2gfGLL7xp8bA6NqESdFllteWkuoZvziqZUktZ+A6uYtUS+VYBdToETur33vWgTBpfad+ChZXltyqhgajSzZv/9o/jM9xc1yYtkDPmxY/k9Zfft6F37kAyjTTbkGrHXEBZ5VqZlsnnn+kwNKLbWLNpIBmePfjggy3euuuq1VgdDRY/8ugdLuRq9913N4sK8bwB5uhkzCJ3wOUb9biz5xwLVkedE8VZpXNH9cnHp+N98sknzRuC59a6ljqktdZayyx4eezycmfFNdhRL7bbbrtZIa6oDM9ne0h4jAEvIgyVYc0BU4hBR53rBg6khez4pePHKIPW8uBkzgmP13Enm1tvvXWBhP4UusbtCfnAmuY65+t3Mf2wZrlzWVzffffdZtEjv5Bt6ijxnch5O0JavMx6+9Yalm2953rn9W9r/LaEc4zaEjaFCQi0sQtsAa5g1jKy8cnHX9hx8SUWNyJlK10jqlFcgpMASFA4h3/RTx9wyN5SWa0TQjMSwhYmdbrnHUOz111za3NxBf6jUjT+3beP1g6hl+y8+9ZKSFiUYUwpHE16cJam/Y8JVKOMffsTmTheF3XonRJtFFkda42ZRivr0ihD1CLYct6MZUT6kTokJiZ+TRp06a6WQjWo1elmxOaa6RMIayBBgZCVlUPiamXBRYdK37m6yKcffSHHHXmaEa8UoueEAAAgAElEQVT8UB6EDOvgiF22UVKsFjfAIQlTL5w311WvdBi8XIdktV1QV6oNoRJcDUr+bc5eGC82OTQeQxceLGtuwNBkGGoNeXXZGkaHavceebgONQyyL30w106/a2bx7WsjHXSBAKtcS7JRpk0JE7idmLVFPA3iSSedZEGffvppO9IZeIPiHcRLL71k1hSIBFi7P43adNirDCwlDOPOyGJCA8xcMsK11lByzxttq4+hkApZRA7p8fO36cLN7MSHO8lfrLPH9fAM3fqE7LwMvyb/Hq4lIoKOHmZmyORqq61myUCkW3PewbUULsaktfQhzU5S0Jm8Myycd+DquBXrzEjP5VCexYbAY0yKkXXXsz0dmuOB3szdOvHEE23eHjKZdtBRF+f5L3/5i0yaxIr/pvauGCakCRbU8ZbqpevVlmcGGZQP6XpZ5QkmuJLnuI4zt82H8UmvJV07ipHrR36LPRfoFaft5exH8tRS+7Xmmms2U8/l+Bw95hlCuN3fralcu14cScvDcI2u7rw9ijHlHpgSLo+1y4nrgddx6n9LZU4YrxeEa+359Hte3oSP0+tomRWL39a2o1jcn4Nfx8gdKyUzkvDtt+OVCHTRoTddAWp0iQe+bXtdWNOQNRAZ/5D1Nl1VY09WbyVFWOzUlMVcsrpanTvwxXh5WYdndcpbFg/iQtdOdkrlqktvkGV//SvpMweTefnmhQ/HBhIZ/uatbKaE5eeFp96V/kpG6nRVhs0zU5JkNiYlUN26V8jcQ3Ryp5Kc5n0r7CKk30ScOOPf9P6Ic0fMChsy1QcQubr/m2UN8sNDqemHvCkvqmV7kxo5+CgWdOhwy4W3yrjPp0nN1Ca8Q1OLVNVb2dUe+20j4yd8a3MEbVjV5tvhQprZReHAqlp/+Ot1vhwLI9h8uk7TZfEEw/AQterayfLvy/6qiupKPEs05DMUi/7VZEbf87TUTNE5H4wIMQwL2bb5kVoqbGjdYUdpKtFBFPKzod5SGHMbHA0EjdPAgQNtkQSdBvOG8PfGgw6CMCuvvLJuCfOG+ecbLA9LI0TDQ3ga2QG6AXe3bt2kZ8+wotlVIhxxzjrrLHuTxnrIIgo6TJzLIx0aUxYPoAeWLGTHDRuyjjnmGEuHfDD5mLAsnHA9GdrcfvvtzWrhC0CQ8eqrr8oCCyxgOjBRG1lMxsZaxtwf/HHoEDewEF3uzTnnnDaHh3Mm0nt6hCUO9Qgc0AtC6R1BG4rGgjAXqbVGP5bjHbljwzwzx4RyIP2rr766mbzbbrvNdGJu3+WXX26dMTpTXgwJHXLIIZYEOjCnCT/PA1gik1WCdKr4gwPz5f72t79Z2uD41ltvFcrr3XffNfngQZmTLpPowSou07biUyyclwHklPTXW2+9gvWzJcLuhIA8xGVE2bofi4/8Hnj++c9/tutNN93U6lscz/XCb4sttrB6S54J5y875NfLFj/w8rriOE+ePNlEkSeeK8oUGZQPZdWnTx87dxJz1113WRmA6x133GFxp0yZYmlTfujDXDTK7eSTT7aXNc+fH+OyQL77f/bZZ9PBTR7QzTEnTfQDH9JED0h27Bwrr69YqdEZnRimRRZ1pFh9cMziewzTUtarrrqqbLbZZhbPdeac+Xk77LCDyQcrf6FgeJrV8+jhw5+UKbpwDabvvPOOqY4FmLzk/YuVOeFZ2EHd44d82h/HynWnrJFHewTO6DdmzJhCvuM8kg64EJ48IJf20l+eWDySL0fq1B577DGdv8/PZSqHx2EoG+flyHxNcKAMXbcHHnjAwni4YuVTCPAzOOkQuYsz99GHH9tigy7dmLRNzrS3nW7ft9ZyHDp6ZPLrN6CHrDV8VR0aVcCNu2nHoHJL9PNWPbr2lKuv0KXjGiVYbIIFiHhvvfaBfPDex7LXfttnemRpBsbTXAEjAtzISAaK6+mDDz5khGy6rTr0Pvup4SCdWt9+YKf6kEG+pmGOOSRKcbuWy7obrixTJ1XLqFG3Gz6XXqifTzOy5o54FZqPMhm60NwydMG57SFrWqSB8kZZZ+AykFn9yjw5TatUC0WnJctKq/5K5Q7U+JllMxPHwhMobZXuLXjg/sfrQ9u9mTUw1I0mIjYDBdp+W1W1b+BmbmYfPiYF04B5p8WDjwwe+LFjx8qwYcOsAfI6WkwxOisaHhpUOhUaXbbsoFOFCLmj8WZhBmkhj/s0ujQgcYNJOBpZFlvEjjgejk6XOVWkTWPnHSIdl3cSEInrrrtuOpXpGB58UL9DrA6Z5O+ee+6xczo5OlA6HPy9M6JxXGONNSw9LDfovtZaawkTq8kTcQnLZHE6YzDwN230ac0R1zsf0nRHGbSV5IELRJwhLMcEHTbaaCNbxYme7tDRrbbkl7IbN26clR9pugxkUn7kw3Gg8yDOvvvuK2wzwYIPHNuyLLDAAvLQQw9ZB7HIIotYWTH/bbHFFjPrB5hxZFju/ffftzIm77i4/AuKzsQJGP/617+2oW2XyTXu+uuvL/jFIukcPWzsDxb8cJ5vzsGH+kQcnhtwLhafYdADDjjA7kF4kAGm3omSV+LyIsECGeouGFPvwI6OFT/yBEH8+9//bn44Onfu7bzzzrbqHQe58Tmx5qEOMsD2IGCPHpA06tjJSu4gL7xg4ajT3EdHjvzc0kdZQQrzzvVHP+oVLyOeB+ocLxMsbqA+4sg3cjmyCAIHwXLLMfPvvPyL1QPHjSP3//nPfxa2fKG+ud5xWYA71lvwxKErmPMyywINdyeccIK9aBB3xx13NPmsgt1www2tPuPPin3cSiutVIiXP1lwwQXlkUcesXJcYYUVDE+eHeT5DzLF7gSUsx+Rw+rflvKN5ZkXVp4d2jaO6IuDKKIfL6Y4you2/IorrjB/d5yz8h634ooryosvvmj1h21zuAc25B3ZXLulkpcc6tWbb+oUKHWej4Lgn+FJ6y3tDBTWslIAQqDJ32ujp0OGFfqz+VnFyNR08rJAUWC2ryjJVr7uowRtwqRxRrRYDIHjCxcMGz54zxO2/10YluMOmx6XyNWX3aHz9eaTdTbmIYmUCNGn06C5R4Bj/LhJmpcuaqma3vLYTQksrtg2GzMQPvO3jXxi4WLivuZFrWZ1DTWyxdbr6aQ7kSefeFUtfj1tVeuoa3UPwJwj91RCyuiYPx4olVW6jQTs1SxsbSkgwhCWn+piRDMA2ahfp7j4qjNNjLYzhXrAsG4gkWpVvOhW6dZFHzq10AXCBwlXWTbfkby5BVFPZ4VTXSCV7oo1EsWScRJBw0KHzaTkp556yoIigwd+lVVWsYn7bo2KiUec3mmnnWaNB9YzJzLesfL2SqeIozM94ogjrBH0BpsGN169Szi/xzkNpTsaHnSDGKAXsonPz3VzMuQ4+NH9XZZ3Wt5B04gi3yfKx2QIfVipyvwtzskjYX21HG+8oc412jwgsIjzAFHExQ1uIVN6EpdZfE46MbmI4+TP6byfe+656ebhOQlhfmXcSW6zzTYmAqsPnQ1v63QWNPJgiZXS9fUjusS4Ig8LFdYnyBBz8tZaay2rT14ebF/BcDME0t1cc80lu+22m8mio6YMvN60hFE+v/G1x0FnVnIjF92oV7h99tmnKPbkG+cEwGVS38GjmHM94/LNh4PYONmCzJA/9u3zuOg3TF+awAli42VMuFGjRpk4CFvsIII49rPDQTL/97//2TnxsFIhNy4f5Mb1Pk7/qKOOMusR9d0tm16vmcfGVh9xmVlCmQNv15l6xR6VWJe8HNincKmllpIXXnjB5CMXvbjvYWK98CNMS5j6fdefNgQ/For4C0JL9Qcyh0O2E1iuvXzZR5I6jzymOUAKqUcQJF7ScFikfXi72JQCwvASA8HjWYA8OcHDou1l4oukTGjmeBZwbtn1sPhRLoyaQLKQCylfQAkn1kfaGRx6gwfOia5j+/vf/978iedli/xTTjlFaLPd8bIKEeYlIm7fqFM4f8mOdStE/pmdBDbTbqV4e3CSEBoRxcu61+DbJkZVCI0aFJDFV8vYsisvIfPM1x+7kJE45pWxfQagl+hii5uvx8LgWdAQOtf81lvukk23VPIThIXjzPxVvvHFF9poMGxopKbJkad84zczomc6bEakwMMHlCt1ccQxxx3IJ3DlzL+cq8Suu2EwfvxUGfPSWAPeUW86Nsra660oVTUMcehbKeTZym1GxR+XH6SMhqxcanSMddsdNxVdnKpOGyPlbFYmBFGfBt0TZcI33+lWMpdIOYtSbFhZO49syDTgQNptrR8hRpv+UgFn0nnHRjQfymEOizsaIvJHYxI3nPkHnIYE683HH39s4bwh5w3SyQCNMI5GAn+In8skjNcvb/jjNLC+ufM4DBv6kC9hkcEPfdEHOS7L4xSE6EnciaCPdx7IYh8tZMXxfG4Ob8h+jyPWFG80Y/nse+Zvu/hDODxN1ysOzznycBALv24pbD4u1xBK9KcTiPFDhu/FReONQ2fv7LC6uCPs8OHDC3g4pn7fseXacUAWHRNWJOLHaWPt5B5EInaEu+qqqyw89zj6sGC+fjWL2MIFcbCAkU8fqkQvyInXk/zwImk6Ac2/tMTXcT2I80f+uS7msLbFJIBr3zAcXfmxSh3rZ+zwhyxDlHzLG++oHRdfTY2/64YuWPQI4+Fb0i2u+xAYHFZrd8ikTvzhD38wr5bkEA7CSrlhhcORPuH5sScjukCsY9kuz/UM/VqI11LZUx6OPZZIHEOP1FX04Bc/X7GcuD4UFNET18Nx83ve3vjWKe7Piw+uJTy45/nn/Nxzz7X8xyMEEH3HB52ZEpHfSD6WH+/76WXr5eIv4qTlJJSpNYRDNnIYssZdeOGFdnT3ySefyALaruMIz/QWHFjF7RsvuGAPWXXXWv4LgX7Ckxn17q2qplVX74eHuldvnVOkIFbXYI3RDlaBym61KiPcZIgunIWvRuhDz3JRdbvusYORCasIShpKmEulE7y6V/SQG64K81xsvpduH/LIQ89L1bRq2WWvrdUDAjPzHb3WQR1G0glikCTffTfLAYXfEPZaIas/gssw1A2CLW1NdMmlF5FuOuVv7Nsfyye6d1z4fJnOGaroKheed43pbZUu0o/THr27yubbrKsbKIMJVjMlXJk1tLWMKGVTILSThUQrKdSF9Cq6Wv54uhJMc8hj4nJIkGF0tkz58wnnSL++aiI3Eqnl5hsoF8g4cTtU/ULy0/2duYLxTsHF+PAOb4RuZaMRcfO+h487d4/rE/AhNJQBjT0NLUc/Z5gKx1AQ5MOdNxR5fVpq5IlHnHh/qThusXj5xsgbP9eBPLXk52F4k/cOxp5J/ZFHCDLxGYrG4cdwNDqxRQNxaNw9DdIppqOn4x2R5zM8e9Tb1h3pOlnLh0QGHSE6eyPu8r2D9TiEJVzsT15inYvp7+WOHC8P/BiewzGvERcTC65jouKEKl9eFnEGjjhYuuKvBaAHP4g5HRZzL3EuPy4LJ9TFkomxiMsDOcWwcBm8sHha+TxRR3A+D9TjOHa+eS3WdCf9rofLcn/Pk+vmMly3vA7cx4+yYMgeSxUWV+qyh+VFjfljLTmXzXA3zi18cZo+JIvVqBi+HtbrV1we+XTRlXDUX+Zv4iAscd5iOXH8PPYtlVkxf8cSeflnJa+jXyOHNBn1wLm+nLs8LJu8EDNdIl8HYj2K6c5UCBwELXa04bxE+9QK5EC+GUqGaOLwg8hjNSc/Lt+nIHg74kfqBL/XXuMjCuH5LYZTM0V+4ouO9a669YSzsgUXWkDnWOkcFB3KDLa3tuTMyVdeDfzVT/vprXfcSE2yk5RC0Bmol5IFCAfAvv36BzL2Ld2Chej6u/T8a3QhxeKywCJzhU2RY8tQG/t8ZNG4humCzSNRAYz4mZtxR9MWBNoUhgZIhzux2h10+EiLcvWlt0nf3jqHpVwXOtRV29zEpx5/KfAlgLIJinR0WcOrCysOOHg3mfTdOB/htvutO8oBDAIOLKSorZsix594oNQaiVdnRRgsLe7x0btfyd13PB4WcPjiDUsqK2dPtxnRC7E7+rfwwClm7XEQrj/96U8WlcYAsoKZHitCWx/m22+/3eJ7IxvrgZ83ji7PCc/M6usNkhOFPGFAXqxzW/VvTQ/woYN6++23iwaLrQPgxyR2J7Y0uj5Rvmhk9QQLnj/vYH3Sc7G8uQxvgLl2TEgz3yFwH6IJDnFn1ZIus8qf9HwSt8/h8vS9TPyaI/nBv73lxZwvrIRgyQ8sefEAD2QyNM79YvjMqjy3VQ5WOxzEs5g+HSG6rkMxuX4PPPz+X//6VyOQWILwZzNkpk3gCFOsDnpcn9jv9c79vVydpLqV08vC9WjrEXmUr88TZNi4GEbtld9WPdoarhj24MhcUzBmnp+3t8XC5tPxZ4KjvxB5GC9LpobgGK4Hb0gcQ84QeJy3z8y1ZSg9bgtcB39Rz6fv1z9m+9GSDjPyz7OqGYVvdl/xNWsSbuCAfkbsWDVr/T3ebZt4pwGDJalJuEkw13/OnrLG2itpRaiwFbMNOtGuTC1DzOHq3auPXHnZTRbuy0/G6Qa2T8luI/V7qnrNN2ab9e9NIoPgFv5iGJxzLrbtUGtVTn8KtLra9xlro8AW0mmLN5ZRWyerFsQyTbtnz66y9gYrypRJVTYkzefKaLj5RBuuvrZMrrn0duNsnncjvubK9KsaQ2Tw0AFaPkzeDmTZ7xY/OkGCKKKHrqrq3U22320TNVvr0F+2FU5geNnkdw26357HSr8+g3T+JeWKbiih48j2MoBMhtvaR76K69nkW1Gu6eConO10vkKS+WzMg2LRQ1ucNzxu8cvHoeH473//W+i0md+Biy0P+TitXXsDQ8eCZaNYg8McIG+w2tJ4tpYe93yoc/fddy8a1OfL0IBDLLCGcO7khkbThweLCQAL4vnwpW+JQt5a0p97ft/LgGs/z6eDnDPP1PmiP6JjxSqOrzfEzi05fkTnYuXYVlWxDI8ePTq8oGaywNSH+x17wnQknbbqM6NwDP3jsKwUKy/3i6ckzEhm/n4xuR6Gugk+4M+wKfWb7xbjWBzkCweQUew5xZ/65KvYWUyDn//idHxhTV6/mb1mbjCOxQ2+obHnMX5x5PNdP7WL6xgLVnDgiAWbIdTFF198plX0l2G3svlKVwSBA9vFMI8Qco5jpwGmKbCABufEmLnD6BKXFVNTcMW+uIE/c/l+Ka5D5A4CAfGgk59/2NxGKMa+974dmy1mmCEaqBF39nTM/kalXz/Yfyf5btIEbYwYrmVoNDxo5TrZ697bdKWfcoj77npU+vXvJ9tuv3GWmspsU/+u6WZz21zN/iqHTX+tM4nusS1KbU2YeNxagzHD7BYChHw2hQc4veILFcaJ1ASvJ3W67QjfoN3y9+HNY/TDL+hCBXbuDjiYmnrO0Oy1V/63YCBDLsPIYfg8gHHI4XsZCWdhSkudZaw/nxgLZcOQe42cc8Hp4VIZZHhws0UnFJ/+Xnr2Xfn4A52jZkOSat0z65z+7JgViA25Q/y83DMrYJww522y7DUv5K7dwsNp0QGmHY45Jm7ypyHwScsuqiW5PiTDmzVviflwrPRiYi+4rbXWWnZkSIJw+bBtVdvnndBx5J2vKpuVnbivOGQ4LT9HhvT5Ni6ONLGEkC+eFebBecfT0kRs1x9LhE9cJqyHL9a5Om6QJ85Jd++997a0ipFyPmeEPj7xOo/ZrL52/fyLAQzvxxYgt7qgE0NUfo0e7WljsEowDBZ3WMhy8uhzSovVz1md97bIY7Vj/Nzk4/h82HjOVT5MW6+L4el+Xrec2GGtB6N46kSxdNzKyhxOyjr+vmr8TGOx9Yn7+bIpJrclP16qaEdwLG7AIc+fs/hZz1u2WpL5Q/s7IfJnwBdV5Ql7sfLJ60Y+vazYxgjnG4rHeLOIh1EXrHaQSo+DP5ZZtqdh+gwujucLL3hJKqZPPCyb1+3ndk3v2m5nmYeP6GHw0HkVpFJ545Wxdo1laMbsKut8nQBEmtidzHL22zWXkT5zqrVJP7MF2VA6aRbDRm3I2ef4gdtflKt0a5ThG6ytKx6yaEzEawxErOUMkopaBFDY0guHjTdaX+XqVx1UfnDZ8KWSu7rKRvnyQ91/z2xq06+mzSIUOeStk5lM1LTQGdGxC7WC2Ry3QIpKleQ1lFTJIUfuaVMJ/37W+daJsZkxixdoYJT+6bFWN5P+TD4ay4bSLLmnk832FrPiaJD1NlxNpkz71rJaptbQVp1iHb4nq9YUJfCLLD2vrLiavmkx3KsSgt40LJAznZ9U3SgH7HmM9OzWSxdSKC1VklrKljFY+GwoNhsitrl+WGJ0CwTd8maewf2lvIzhPpVLXk0y8dpWPU0aGCiZHDpscMiSlWWGcfCxv97JRV7NTr3j9Z3g4zd3GgF/azTpmibOG1bOabh4Lu6//37bOsEJEN+KZOm9x2OCLvHYZJYJ7t6QsKoubvzjhof90twRhvQZbsCx+paJzp4eJIbtB7yzsjqS6VsQkp046XLdPBx1jEaRa8eNzo58YQni7dvfgrHIsaKMb5m6zgx7eL5c5lpKaltzcdpuBaHz9zl9cVx0Qj6EiNWgnhYfV8flyR2yY/1cllsAYtnkAbnkn/O4HDycpwcWyHZi5isuCRdjDp7EufnmmwtEF7nMxQK/Sy65pKAC/l6WyPe0Yh39nLDgg/WLBQA+xy3W2XXDqsF98sX2Pnnnw+pg67r7QhPqNM7lep6dbEBwfHgyX+5+HefDcWUeJNjkF1WQFs+Gb1ORLwOPH/tTl5kvi4uJTpyubxXEoqC8XqyYJh6rRiFPreFOGtwn/eHDh9ucMcqMvSPx4x4Y+d6V4BjXB5cdb6zMfQ/j+fJ8ki+fu8n8tTjf+XywQpW6HjsfakR+sbiE9bRi/Hybllh37vv2RsXa1Fg+FkbwoS2NZcTbO7FPJEO1OMLkv63rC7ksQOb+8Y9/GJlmZa7jzS3OebHEsQejD/tyTXuLYxX37373OzuPyxiiyLOCHz8nkJQr9cVf+mdUL0zwT+za1nu2QclFFxumq5S6yTNPv2yhIT8ddfbgGEnTFUF77qQdTJVSCl0tpIINXCUfPXv3kj8df7ruGfS17LmvfhIIY5FWDniRLb5wF5hIEZWa34CHrLDSYlI5jc8ZkRDEBTn+sOpy6rffwWaW+RcRWdQLqGO4s3PNRsYpQyxLL5AlVpg2luvcGP23+FKLSq8BOt9iWqWcfOox8q9LT5Z/XfJnOe/ik+W8S0+U8y7R60tPlUuu/KdMnVajuqt+tiCETGR5VLz6Duohm2yxrj5BdFotWMxcfyXXgSSWSU3dVLnkct0PSkX5g2tWQU1H16UBtvz3ltFSORVCYNRR/VTzbO5fyBO0LdQLvstbqwtlDjtmH9liy82MqGKZbXLEjS6LnoZ8sTCk0SzI9bLSKsvZFjm4Yg9g3vrD5HPmhdGBxHGYRM3S/NgMjzzi+1YLPPB80SJOh+0c2DcJjGiMafC5T6MRdzpYwHz4d9iwYWa94E0becSlwUc37/AhDEwcpuHxZfl0QmwL4StwGeb19Fi1x+IHd4TlGl1olON8eUNIA8qQsneKzDOks2Qo0ckBDTlDrG5NY2I3mKA/W1cwMdrxoJFmjh1vyshkQQVzmCCpbpEpKJg7QQZDTnRi6MBwCRYp/4QWfgw5I5ehYHQgDvqhK2/YhGEY0ud1YdFDb/yJ5/V4k002sfi+EAZV0N0tgG4Jw584hx9+uGlLeYE/BAR5kHd0gHAX2xvO5xGydxj7EuIob7ZIYRUepMuJNnIgA+hFBxYTRosYOcJCSuhE6YwgW/jxy3fI1BUvO/YK833OHAsfJsNS5hv4+hwl5DEB3bcgATfwZqsQ5pSxXxmYsL8edZHw8cavvNA4wWDKA44wvEjxYkI92z0b7qecGVpj1SNbiRAOxwIH0ucaq7X7O8Gg7KnP+LOHYezQE3+2+iFvvtVKHAYcHANIw4ycp0846gHkGGLlpIByZl4ZZUL5oqdj7StrWU3uzyr3vG4i24kY58wXdcc5ZUT9jn+UA88KL0a+eIc4pOHPAducuN6QKKZ04CDv+PPj+fFV7pQBuKIX25H4SyZ5I6y3DQxz4vDjxQHdIXSUOfXO880CE7CgjtBuEJ+XRoboSYNnyre7QR7+4Ae54iWW+ksZ0T7En2NDPj/Sp/2mHLDAxZu2Q+gWWGABOTkbojWFc843qscbSx7ySJt23Vcoc8/zk4//c7nWaVtGYdrniKoZx9aiNhrZcvg+8qF+DuvV93TfGVsdOaPeOYQ5/8yb5IrLrpcX37vL9CgoZAUFiCXyzecTZOXlt5BBfefX6/CpK+SXlGnqutigZ98yefRFnX+n3IGtPmzVrcYjPhLf0G1CNl//ABnQV/dsihYSYG1cYtmhcu1/mYOjlUPjqwFMll98felWNof66Bw73QyYFaPYDGt0zt3Oe20sR/9pbyMfQX5L8HlOIhyawcIFZAeiqA/gq+/Jluvvr6tMB6ruaKPzlpTcVtdUyhXXnCkrr7VUSJB7WC3UKleA2JPiqOIghOQzkFAsjFgDSaVR3nv9U9lYy6pvtvu6JV7UhU6wpqZE1lj/V3LuJX/SUOir2CIMfNFS96CZpl/IWHaRzaRvT93RHmudAlNq5A7BpE8eAw6UX5kS72pdnPHca3fL0UecIk8/9qaVY7CiagNnBQnugQwWVQ+JSggba7X2qfipNd/LHfddIgstOW+hA/dGzOPT4OBHtcds7/e9YaBR8Q6RjtYtGdynYYYYxXGQy3V+2IjGFdM/pJG5L3Q48RAPhIRGmEaUoQLIAPOg2BqFBo+9m/jOLWFIl849n5c4TRo9CCSkjS9FMF/ILTjEQwb59caPRpSOGMLBPcKQb/JMB+HY4EdYXJweDSzbF7BBLe7WW2+1ztTTgpRwzdw5hp7p5HnrJQ6ddj4vJiRzTtDQBTnoCI68gftWFQbYeiEAABviSURBVAzxcE0H7J0LeXPihs5gBhbXXHONDFMCjaWAPe3izhMS7bp4XDpL8u/5Ri108i0gCIeVibzQEUDOkANW/vKALpQ3ZYCLCSX6+PA1+DH/DxIcO7cuOQbcK7YYxfMc1w/w8k1d4zzgT0frhIG4YEcd97pJepBXOk3KDQJFnpiqAIGko42H+xhmhtCz3QfHuK4iC2yd1Hhd8iM4u37oQh2hvlDWdMqsAvUvZJB/wvhqbMcKWU5Cuc8Lij+/Xqd5ph1HiDcWOci0L66JcScuVh2ewXg7pGaFk7vwZ8rzy7OO1Zpr0mLSPvgSzvPhGzOjo9cN0qaMvQ55MsTzvMX55jwuX5ft+vjWJl4m3PfnE+xJz4k+/sSjbNGHeuKyuaYMqSvxHnTEJzz6EhYZvPCydxxlBylnUQN1xrEhDD9edPFHD7a6gYzxbGNpw/Lp8wq9rkDqmaNHO0MbifWbZ9rlefmSR4+DJZshWQimY0942iVWzRZbBe3Y0c4zZ48517wEMZ3BN4V3nJH1c3YdI3dZzsLXGkrl/LOul7//7Uq55qazZbV11IKilaV1AKjsJdISuXPovLB23OJgeef1cVqRVG5GILhXrYsr9j94BzngSF3iD+fIyERT2kruXlZyt16e3FGhIXfzZ+SOPfTChOaTjz1H7hj1tA4XogUEQ9OE1ChbmWu+nnL3Y5ebnxOW4oUcHubpw3g8jvxC5/nmK0ruNtS34D4DNB21rMEyK9gYWt/wX79FKqdUy4H7HK/z7bormVErmH6jlRFOCBYsiuHbmjq1TCiX2mPfnWXVNbI3PbYyyciVlYlG+u3S+lZb292sXS27kOdp+pmx1z/Q/Z9IU/ECEchdXLan/+kiueW6R4z22QNnnymDSJE3J2jE1XyZeVWkz4Ayefj5G2TfnY+TF595T8MGSyv2PeTYlzlaJXcBx0aGf7WBqSv5Tl569y4tQ3LUREpazp8mkTW46Oz1LA4f+xGWX75BpWHB0ci1VOdjf5dZLD3kFGuovANwOY69EyHixWkUk+H388c4v34ex3e/PBbFMMvnP59HrnF5DGMd4rTzehTDsZj+Lfm5PPRAf+S5i+sz/rGO+Xy0JN/9id8WGXm8Yrl+z3UuFjb283OOuDg/sdw8plwTlvwWk0fctuQ/Tj+PZayPh8vLjNPO15M4rJedl1++HPN5b0mvGJP4nEVAWLkgeC1h6OGLPWd5uaSPzt4++Hk+j3k9vRw5etl43mKs4vSKYVsM5zxGXBPX0yqWhzjtOJzr2RJWnk8vp/i5ivORP8/rEMv3PMVx4nzmZeV1i+/n05nRtcftiIwZpTEr7sfjhO2WZx24ticbbramddyjdCVncG1ktjNgwHx5QlmI7H3ArjKt+jv7uD1bfMAyjAY01siI3ZWsWF8PueAtQs+b2m0NUyR7mR9Epbm+OiSz3wgdZhhve8EFgmcUSn8N8unH38jUCXTooVPnAcd5JW+eUoaBJcEfiBbDmRAc8hWw4y7fbw2ZIlyw6NVX1ck224aFFHeMeliee+wDefaRD+WZRz6WZx57X5597F31G2v+zzzyvrz4xIfy8nMfy1/+dF6BUxpRVKJllRHQ1Mp15HH76rBosNhQ8f0BRA9cqLg65FVbLfsdqLtzZzXFSzQsmAl6fvvFRLn8wlt0jqJa+hiNzfYoDPWC/GG1Q0DWmSpBrKmdKruM1I2CFYZ33xur8ZTIGYdue5VEfp1uas2XUbCsLrbEMNMdQ1NmbLLr1hx59we/GOGI/QhXLAyNtr9t5xsRTzv2dxnFZBE+fnP3MPh5+rEst1oRL/YvJsPv54/F8Inj+/08Fvjn85DPf/4+13m/fPpx2nk9iuGYj9/atctDB8fTdeLaf3kd89etpcE9lx2HKyYjj1cc3u+1Vrfi+H7ueWhJxzymXLtuxeQhp5jueflx+vl8FJOblxmH8TJxOXFYzvNpeZ6L5T0fNtbN22w/MkTJcCkWJW/X8/mMr4s9Z/nwpB+XYVwH43zl9fS8xGWTD1MsLfzyeMXhimHEffzzZeLx4jj5cC3J87helvl4nmacRj49l+35jmXm4xfDMh+mWFru19aj65LXqa3xf6xwbe9JW9MoIy4LLT5YFlhgXhn94GOiizvb7KBNThqKRbLFC9p5D1/nN9Kjpz7Y1nlj2VLrjA7//mqZhaXPQN0oMyNpQZpKbE1oISFCO7nzNySR+YYNki23W19l6OaFmMIY/tP0KnRDOd1YQC656DolIsHSxMMKOZq+sCMF7DSkw2IQGy5Vv3+ceXFBT1awZqY40475hVhmDj1qD+OEl158tXTXb9sGEsXbdk2gTFjIFKMSJVFlorvyK2H6/OOv5etP+CJFcEbGVLxpoLpusNHqMvH7r+2mvX366uBCeA2sOHfrpSvAjtlFo7CxZ1ZdLC9edUrl2CPO0qHkuQKxKywyyTA1yxsJEz74NareXXuXyu4HbGX75X31lX7XUsm6kTSTHOGW6VPsQINcoWbNOrVW1tRMkcOOZJWkl2WxGMkvIZAQSAg0IUCbzVYavvUOq3f5TBZtS/zilDBLCPzSEOgwuSt0pdnK1j322lH3W9Pvil72HyUfbYODB6mlLplRHJMDo1Mutd1Om0udWr18hevUKZNln/3ZcT0bZikQg5YkRjqZfsEUHXwDzbPhVyUbp5x+iEyrZBi4XK1qWBx06K++Rt/CKuTGq3WjWk0CUof+xd940KFJD7M2quxSVqlq2meccqm8+so7ljSWNeNAZJahT7UYNjRWy3IrLSTl+vGP98d+ot/s+1pKy5UYluvwsRFOFjMoScRSVsocvGDRLMO/oYtccM4VJpMGzN5MfQ6iDt/2naOnDF+Pj1mHt8qwPUpTdWAu29Spk+SkP+teSapaaTZkirHRhlVN6RIdJv9MHhv9nA36lpMvdDciB920QPbXoNY/9WplrVQi9tezT7CFD/X1OmeyLszH49NyTc5izNCBG1a6ep0b+ds1llbiC26RjjOUkAIkBBICszMCzJtk5SXtJN8kZpV5cgmBXzoCHSZ3TQDQGetHm0dsquSnVC44T4nFDF3owBnVhFw08aAma5pxHe2sw3w3kZ133VKmTP4+SFYS0bNvVxm+8e+UjOWJQXNiVVQVJSeBegQaQiqkBQlhUUbvAV3l4ivOkW/VVG9bgmQEFjJRp5P4jzjotEDq9FZYeRqkZcrpIbrWU7M2Ztavc8+6Vi6/9EZtUMJ2JDZsavyOIgkLFmpqquVPpx5t4q6/9j6dizevLvbQeXY6fFtapt8Bbci2MgFGJWyQrhL2r1MrZ3mXcvnffY9YXKizbeqcndvG0/r/+JMO1qFntZoZQWqqCrb6VMMMHjJINt56LcOjAVZnxcX2Mk352nv3w2Rgf74IwsR8cMSaCSAqz6x2qhMacK5lVKeLL0bstr2ss6FuTK1W18k6cb2uNoQ3EzxJZLTQTj0ttxoGz8JfNKmrq9Vh9F0sqNUVKycII+knlxBICCQEWkaAxUisdGWxACs+i4/CtBw/3UkI/BwR6DC5s86YP2bS0dWFamXadW+dS1XVRc47/QbrbMN8rtDRQmCCBauJIHz26ZdmGaueEix4dfqpLP/6AaIhJpaIEoQhw+aU5X69qBKbOqUNtbLxZmuRuFqtdGg05nemDyQF4iA6bMd2Ca4s3b6Gh0SpzlWV2SfFLA6fT+P7qSHs6hssJ2efe7xMnjrO5NmkfyV++tUveeR/z8lZJ15mhKpE/SA4cEDnI7o7mJ+aNBWt4UQO2vOPcsm/rpdhQxeUK68Pq3QhfpAgthFpZIKzXi+42FBZdKn5LO5jox+VCo1bpl+GCNuJkC9dyavDxjanTYkelJjVw2Y907BTJlXKkw+NUU6qMiFsVgToqmH1/kKLDZYllhpslkn2pRMlWQyJcj116kQ5/zI2odVIGpbbxplUdr2ROJGH73texn9RLbXaKLK1Sfg0nBYCedDS0Zk8Gl8jw/dUxUmVE2XHkVvIH07Zw2Q26FYoNdW1WqwVGh+9kAoZDPLBmW1WGG6G8IahXbXQ+pw+FcpKP754e8hxu5hVEAMv+TVRzdA3j+QSAgmBhEAzBFgdPt9889mKUJ8fliBKCPzSEegYubPOPoOA3rRE571p3374MXvoOoFpuhz6chn3pe53hNUFgoHVp1Q7c8Ia0wif8hr90P/pUG6DPPPki0YgyiFzLANFduils0RUuMbbd/8dpbJqqv6qhGFgIyAEJjfKJkkpYwrW0ZP2G698pJvr9jNdSIOtNuyopGTqtPCxc2QEksVmyczpQ4EG2XrEcPn3pafK+O++1Gv2otLtDUq7SmlFd7n6utvkqINOMX8+62VrS0x1/VOv+bCFE5AwkQ/HfiarLLuVPPnoG7L4EgvK/Y9cpqRHSaoOTZrlThVi9WqJWj6nVk2Uf+s+dky2Y9HsxAmTjZCGSb5Y+bDGKWtiuxBzEELSgmSSXDddVdtbt2u4JmCoxLiMVcZaBoEwhVgn/fVonXs3QbdcUdT4IoYSs+q6abLiKsvIwksN0bBkSMOaFU6HfpW9lms5106tl0P2O15XlPWUii4Mx5IMBE2pmeannCW+RhW76DYREzWflXLnPVfIH07ay/RpVAseCyKmfFdpc+3ITyD03KQgOYKf1ikmEeo8PRZNMM+xEVwVDbapmar14IDDdszSD3MgiZplOmQy/U0IJAQSAgmBhMBshEDHyB3sKBuqDAxAL1VieXeRU848Ri1VpbLHDkcpWeFumJsGWTC7im6iCyE6fN+TpKZKpK/u73P4ASfJFx/z9QTmpUEqMlMc5MLoktISNX+tvcGq0qVrowxbaLAMXXQuKy7booNOHRKiBM+iZpaq2mn1cs7ZF+hiiLBfXdizTj/BZSSjTD+X9aXcf8czehEsXEZKsA4hUH+sxt1gs5Xl+dfvkUHzdNGNhJUMQcZUfreK3vLgPa/KcgtvJicc/Xd5742PZPyXE4y31lWWyafvTZCLzh0l6/9uF9lqowPlq8++l33220luvecCG5YssUUZKE6aahVTmeMnjZMjjt1dhiyk+91h/1K1dxixlUyZqptNqj6lpUp4NI9sh2KEx9gXhBiSxco3cFLSVNEo33ytFkdSMJOWnTY5vV7+t4vJxpuvLtUN05SQ68bCerdOquXSK88OYg1TokCwtBTBRZO67oZbdaPJ7tJH9xfs2bNEevXVIfLeeuyjm1D2q9ANNPvKmmuvIAcctb2MfvZmeW7MnbLEckNNeqNZR3UXcM3HmNfeku49uqlsyi1WLpyzGjorSD1mebA8axTVt1u3etkPcge5JY8Fl89sdCudJgQSAgmBhEBCoBMj0MF97rw3NluZcYAwd4w5YSWywyaHyru6Ye7m264hJ5/NR4xhXGVy5233yYP3PSZPPTpGJk/UD99DbDQy87pqG6fKkrr6dYUVFpF9D95N5h0yN1ILcW3+mIY//vAzZdnll5Htd+UbnhAPyCI6QCJFXnnxDXn68Rfk5ZfekMce0Qn/jb3UAqZhsG6xohOrkA5PNmBV0zg1aq1adImFZINNVpd+A7rJnvuMsHTDvnd6Bo8ig3ocoxsiH3v0afLW6+9L/54DdVVVd90upUvY/V7NbPa5MB2iZWiV+YT1qt+0yqnym1V0R+0LTpU5h+iGpWQpA62RoVXN0ztjPpJTdb+4E046RPfeG2KAwk+hLGz/8tKz78l/R90tX30+Xt4Y857mky1MEAIRDhjW6lc8hi00RHp07yJDFx4iJ//1ACnvxudUAnJeBhopGOM4URE3XH2P3PXf0Uq23pEtt1lXTvuHfncPkmyZbnJhmDYo5l+UMGwiXhXmvXkc0vV6EpOvUF8u+vvNcsmF/9GRXPKgfvrD8hmsd3o0iyE/3hB06FoXjjRi/VUiO61mmtw/+lpd2dw7JGZ1gLAI0F+Gb7iZ/iYEEgIJgYRAQmD2QGCWkbsAF0NlkC86Yp12p0N3Ky7OHm3d5LgT95MR+2xswT5+/0upq8FSgxUKawznesMIVxiew0I37+BBagnqoTcyC57KNR6nUSqnVtveaF27Zx15MC8p2dG91pSQjP92sn5WaqKSrgr7RqwNz+KMLKiWEAW7Dt6kD1FqUKsQc+XCnmnBQtT0dQdisu0I8UplwjeTlKC+Jo8+/Iw8pUSyprpOd/ZWC5jG78b8DV3UsOJKv5b1N1hLhm+0gn5HFRLidC1L1zKuq3/VkvXhux/LnAPnk6qa70zveiyJBXKl+dL8Q4QrSrrLmqturvnUXcZt6w9jQ5a3Sp3Xdvvd1+r3WvupFZAFDNxmdXEggAFo/LAaajy2cClDdg/5ftw0WWP1jeWNd59W4vSdlY0NL1MuBaBUIBiaxdYJo+el+dFwctyNorpDKUVVTZJnnXqxPPTAMzqPL8xXLCzssA2MwT/DKxuqte1iND+Q5f0P20UOOEI/OQcJVf0CVBBl6h/1qinFdJYQSAgkBBICCYHZBYFZQO7o5IPVxYlT6FwhGyLvjflC1l97J+napZec/JeDZYeRG1p/jWXLNq51BwlQ0sBwI3O2mPSvhi91gURYMO2wm6xCgcwEuxa9uLGY7KdBIYHwEnzc2y6icFzjmsxFKp8J+24BIiyBnNwgCGsen+WCQGTsgXQ0QYZ4a3WBAASQ1aqsGrYhaO7rAhCGEdHXk7Wk+ZN5vPnqWNlo7d1lQL8BSuyw+qGLB4DoYLPUb/zpsbxMhzJVr0BoyCw/PsUWLJe6PZ7qCIkN8xrDnnwGaJYgc/Qy4qRysFCW6TBxRUVX/a6uLpDQIV8btsYsZ8QKxzHWPiO62d38IQypkqaT80DqmmTpwhRdIFJS0tUsiww3NyhOATBw83OVQf5UTqnme6rOtfzt7xaTy288Xf3IbzYkb3WAX1Sv8kql64RAQiAhkBBICHRyBDpI7tqAjnKBpx9/WUZsfZj07NFXttt5Iznh9P2NI5gVrGCZCkSJ/duYixaIE8OJTkAC0bAJ+8YR2L7DO3Li0vlDMiEFkBpICDRIXRCdU9bTiLyJY4QoEDBb8WlDfcjCusZpIEiQNhZA2PYjhQQ8IfsyqnFG+76qTQDknpOxpjyF1C20flv2fdlqw4OkT4/+tmpWv/QZFg8YBtlQsi3agGBWKtHRVa8sPHHCpaeN/pULtLJVpRAkLJekRNiMoEGk0d0mRPL9S6x7fLFCkdWVy2W6YrbeFj0QMSNxRvKc6CJPZRTFlnshNePNdmWFpg4ZRApD+dw1FSDVLJYwfdWZFZc8Y8EjLj+9q1jOv+BccscDF5m/fXLGVjBrCCfdJiBOzzySSwgkBBICCYGEwGyBgJtkOphZuu+sF7eePHTnZvTRTncV/cbpTbf+2/Y0u/WmR2XTdfaRyd9XaX/sliAm2If4rAAtYQUow6ZGHDIV9TZEjxWSuLA9SkY0QnLmH5JmiE5JA6TAiAHkKuvsM1XtWskDhCasxNQbcENLB0G6urQwkQwPrEFKPjRDtimw/oPUQUjYqiP8IJNB30DvMgCM1CEjs2AZSUKRQGSC+oHw2HYkmi029GVlqn7yXY+wHxYgoF+N/th6hMUfxPS8kZbGLdc4ugJXSqo0nK7EVeZkCOjQa31ZbfbDnxyErUoa1YoqpYqr6hWIM9/YxbKnCzMsvhI9fqpAveYD/lgPsTLy2LLjrm03o796LdfwI77SSsrSiGOgxuQ+EHLkUQho7dWTvJXrl0JK5VfLLix33J8ROyQrCTUUlIgGa6rrk5W3X6ZjQiAhkBBICCQEZhMEZhG5y4hJdqDDNgfBUnICIfuNfj3gkWdG6RywqfL1p9/L6stsI2ecrJ20dtiCNQoLlP7HmmdHyIveKfzsHgRLh/AYL7TrzMJm5+z/pnEgQBaP60Asms7Vn7CF8Blh01W7FhehSmCMctixuQ6WpUw+DJBwpkf8w88cQ4UqQ++FsBpRiZLpZukTPxCT8EWHMCTdWF6hGCm5UrIFtWPOXaMuIgBLI57kHetZtMo2kCBw1PRsCxnSVkw1/TKNZHeUIJY26JCufsvWfpBUlEcjZNvq5YywkknIld4qxDfp/KBr/IhG/Bm4jGA3xcv0Ib6ljfUNSyS48M1dTUOH65m3aYtzdP1umW47M2nyBBmxx8Zy7a1naQBW3CIHnVWEqlGmQ7rhwvWhbNEyuYRAQiAhkBBICMxeCPygvV/Y84xPd4U5UPMv1F9eevN2WWPdpWVK5TS56dqHZblFtpTD9j5VXnvxXUPeJ9QbeQg8zyhI5/wZnQxOCRmfDavXyXKlkDMdKmWPuNnFsfIWssYWOHwNhEUpZeVddRWzLp5pGCe333+BHPWn3Q2Ouhqsp4HYzS74pHwmBBICCYGEQEKgrQj84HPuCluIKIupr9OvRPBxeB12fffNz+WYQ0+TN15+W7ceGaCrTKt0h/AymWPOATL/0HnUr4907dbVNuQ1E1JndDb0qAQPMqfzB6dMrJHRD7+oixpscxi1ZjGc20nzTs6N2Wr+zIrIHDu15alFjrmC1VofplZNkeNPOUx2GbmR6H7R6sLwLJ9PC0PnzBH0TZw7YwVJeUoIJAQSAgmBhMDMI/ADkzuICZ23WmMYgTM7IYTG7XAin7z3hVxz1R1y2y33yYRvp0jXrl2U5OlKU/3WVvjSwg9qXJx5xGZ1jGyBRljtqqtgbXiR7TzATi2ePxW3a8OIa0ehoE7Y8Lu+AdRUVes2LlO03Btk+V8vqV8h2V1WW3tF6dojWOh8Pp7VI9ONxSAcg1W4o7qk+AmBhEBCICGQEOgsCPzA5A6YMoJniDWROrtDR+3eevxGv+ww7qsJ+iWGKVJb6wTHInZSl+EREzi3ZpFjTFud2HJH4VMHysrLdKucLjJgYH+Za+45pHsvCG5YiRxqCHZMA0Zd85eDzDMdEgIJgYRAQiAhkBDIEPgRyF3LWBvtM0sMiwV03zszxYRFAbYnHP34T2a6alnvWXYnJnKWz2yRRiEBVuPOstR+foLIHGVuJDbUBWAIFl5X1ypB5jq5FffnV0JJo4RAQiAhkBD4BSLwk5I78OJj8f5NUFsBmW2BwepJ/7zVLxDXdqgcyF1TRGd1brFqh8hfQBSbYxfGVwva+hBs8J89cPgFFFVSMSGQEEgIJAR+IQj8sOSu0C9zggWGxRQxWcFMg9WO+7Y+Nhqm9a8azA6rIhmCBpd4/hiYOC6/kNrULjXZ/gSCx7zMQPSCNTe7BpdClaEOuSUvzbVrF9wpUkIgIZAQSAh0egR+WHLX6eGbVRmExHVuC92sQioQ3oTVrMMzSUoIJAQSAgmBzoZAmsT0syjRRFbaXgwJq7ZjlUImBBICCYGEwOyIQCJ3s2OppzwnBBICCYGEQEIgIdBpEUjkrtMWbcpYQiAhkBBICCQEEgKzIwKJ3M2OpZ7ynBBICCQEEgIJgYRAp0UgkbtOW7QpYwmBhEBCICGQEEgIzI4IJHI3O5Z6ynNCICGQEEgIJAQSAp0WgUTuOm3RpowlBBICCYGEQEIgITA7IpDI3exY6inPCYGEQEIgIZAQSAh0WgT+HzN0t6uK/8TwAAAAAElFTkSuQmCCAA==" /></p>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :reference_number</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :reporter_email,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: ACKNOWLEDGEMENT OF RECEIPT OF A (AEFI) REPORT :reference_number</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We acknowledge with thanks receipt of the AEFI report <strong>:reference_number</strong>. The report will be processed and tabled for consideration by the Pharmacovigilance and Clinical Trials Committee. We will notify you of the Committee&rsquo;s decision in due course.</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We appreciate your submission of the report and your support of the national pharmacovigilance programme in promoting patient safety. </span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>MEDICINES CONTROL AUTHORITY OF ZIMBABWE</strong></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><em>to insert signature</em></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>DIRECTOR - GENERAL</strong></span></span></span></p>\r\n', 'email', 'Notification sent to manager upon successfull receipt of followup report', NULL, NULL, '2017-12-17 00:11:46', '2017-12-17 00:11:46', NULL),
(34, 'manager_submit_aefi_followup_notification', 'New follow up for report :reference_number', '<p>New follow up report for AEFI report :reference_number created on :created</p>\r\n', 'notification', 'Notification sent to manager upon receipt of follow up report', 'warning', 2, '2017-12-17 00:13:18', '2018-01-06 20:59:32', NULL),
(35, 'applicant_submit_saefi_email', 'New SAEFI report :reference_number', '<p>&nbsp;</p>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :reference_number</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :reporter_email,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: ACKNOWLEDGEMENT OF RECEIPT OF AN SAEFI REPORT :reference_number</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We acknowledge with thanks receipt of the serious adverse event following immunization (SAEFI) report <strong>:reference_number</strong>. The report will be processed and tabled for consideration by the Pharmacovigilance and Clinical Trials Committee. We will notify you of the Committee&rsquo;s decision in due course.</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We appreciate your submission of the report and your support of the national pharmacovigilance programme in promoting patient safety. </span></span></span></p>\r\n\r\n<p style="text-align:left"><em>pdf_copy&nbsp; :pdf_link</em></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>MEDICINES CONTROL AUTHORITY OF ZIMBABWE</strong></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><em>to insert signature</em></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>DIRECTOR - GENERAL</strong></span></span></span></p>\r\n', 'email', 'Email sent to reporter after submitting an SAEFI report', 'info', 4, '2017-12-18 17:19:49', '2018-01-07 22:23:43', NULL),
(36, 'applicant_submit_saefi_notification', 'Submitted report :reference_number', '<p>Thank you for submitting the SAEFI report to MCAZ. An acknowledgement email has been sent to <em>:reporter_email</em>. Your reference number is <strong>:reference_number</strong>.</p>\r\n', 'notification', 'System notification generated for the user when they submit a new SAEFI Report', 'success', 3, '2017-12-18 17:21:03', '2018-01-06 21:00:02', NULL),
(37, 'manager_submit_saefi_email', 'New SAEFI report :reference_number', '<p>Dear :name,</p>\r\n\r\n<p>A new SAEFI report :reference_number, has been submitted from the online portal and is ready for review.</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ PV</p>\r\n', 'email', 'Email sent to evaluators when a new AEFI report is submitted.', NULL, NULL, '2017-12-18 17:22:39', '2017-12-18 22:38:26', NULL),
(38, 'manager_submit_saefi_notification', 'New SAEFI report :reference_number', '<p>New SAEFI report :reference_number submitted on :submitted_date is ready for review.</p>\r\n', 'notification', 'Notification sent to evaluators on new SAEFI report submitted.', 'success', 3, '2017-12-18 17:25:58', '2018-01-06 21:00:24', NULL),
(39, 'applicant_submit_adr_email', 'New SAE report :reference_number', '<p>&nbsp;</p>\r\n\r\n<p style="text-align:right"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">REF: :reference_number</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Dear :reporter_email,</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><u><strong>RE: ACKNOWLEDGEMENT OF RECEIPT OF AN SAE REPORT :reference_number</strong></u></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We acknowledge with thanks receipt of the serious adverse event (SAE) report <strong>:reference_number</strong>. The report will be processed and tabled for consideration by the Pharmacovigilance and Clinical Trials Committee. We will notify you of the Committee&rsquo;s decision in due course.</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">We appreciate your submission of the report and your support of the national pharmacovigilance programme in promoting patient safety. </span></span></span></p>\r\n\r\n<p style="text-align:left"><em>pdf_copy&nbsp; :pdf_link</em></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif">Yours faithfully</span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>MEDICINES CONTROL AUTHORITY OF ZIMBABWE</strong></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><em>to insert signature</em></span></span></span></p>\r\n\r\n<p style="text-align:left"><span style="font-size:12pt"><span style="font-family:&quot;Garamond&quot;,serif"><span style="font-family:Times New Roman,serif"><strong>DIRECTOR - GENERAL</strong></span></span></span></p>\r\n', 'email', 'Email sent to reporter after submitting SAE report', 'info', 4, '2017-12-18 22:33:31', '2018-01-07 22:24:21', NULL),
(40, 'applicant_submit_adr_notification', 'Submitted report :reference_number', '<p>Thank you for submitting the SAE report to MCAZ. An acknowledgement email has been sent to <em>:reporter_email</em>. Your reference number is <strong>:reference_number</strong>.</p>\r\n', 'notification', 'System notification generated for the user when they submit a new SAE Report', 'success', 2, '2017-12-18 22:36:09', '2018-01-06 21:00:48', NULL),
(41, 'manager_submit_adr_email', 'New SAE report :reference_number', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p>A new SAE report :reference_number, has been submitted from the online portal and is ready for review.</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ PV</p>\r\n', 'email', 'Email sent to evaluator on new SAE', NULL, NULL, '2017-12-18 22:38:22', '2018-01-03 02:51:51', NULL),
(42, 'manager_submit_adr_notification', 'New SAE report :reference_number', '<p>New AEFI report :reference_number submitted on :submitted_date is ready for review.</p>\r\n', 'notification', 'Notification sent to evaluators on new SAE report submitted.', NULL, NULL, '2017-12-18 22:40:05', '2017-12-18 22:40:05', NULL),
(43, 'registration_notification', 'Welcome to MCAZ PV site', '<p>Dear :name,</p>\r\n\r\n<p>Welcome to the MCAZ PV reporting website. Your email is :email. Thank you.</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', 'notification', 'Notification posted to reporter after successful registration.', 'success', 1, '2018-01-03 00:35:08', '2018-01-03 13:29:27', NULL),
(44, 'forgot_password_email', 'Forgot Password', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>:mcaz_logo &nbsp; &nbsp; &nbsp;</td>\r\n			<td>\r\n			<h2>Medicines Control Authority of Zimbabwe</h2>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Dear :name,</p>\r\n\r\n<p>You requested for your password to be reset at the :pv_site.</p>\r\n\r\n<p>To reset your password, click on the link below.</p>\r\n\r\n<p><strong>:reset_password_link</strong></p>\r\n\r\n<p>If you click on the link, your new password will be&nbsp;<strong>:new_password</strong>. Ensure you change it after log in.</p>\r\n\r\n<p><em>if&nbsp; you did not request for your password to be reset, you may safely ignore this email</em></p>\r\n', 'email', 'Email sent to reporter to reset password', NULL, NULL, '2018-01-03 02:23:24', '2018-01-03 02:53:29', NULL),
(45, 'reset_password_notification', 'Reset Password', '<p>Hey :name. You have successfully reset your password. Kindly change the default password in your profile using link below:</p>\r\n\r\n<p>:profile_link</p>\r\n', 'notification', 'Notification to reset password after forgot password', NULL, NULL, '2018-01-03 02:27:26', '2018-01-03 02:27:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `system_message` text,
  `user_message` text,
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `sender_id`, `type`, `model`, `foreign_key`, `title`, `url`, `system_message`, `user_message`, `deleted`, `created`, `modified`) VALUES
(3, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 3, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR3/2017</strong>.</p>\r\n', NULL, '2017-12-13 02:33:47', '2017-12-06 00:44:51', '2017-12-06 00:44:51'),
(4, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 3, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR3/2017</strong>.</p>\r\n', NULL, '2017-12-13 02:34:12', '2017-12-06 00:46:42', '2017-12-06 00:46:42'),
(5, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 3, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR3/2017</strong>.</p>\r\n', NULL, '2017-12-16 10:58:30', '2017-12-06 00:50:18', '2017-12-06 00:50:18'),
(6, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 3, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR3/2017</strong>.</p>\r\n', NULL, '2017-12-16 10:58:33', '2017-12-06 00:52:24', '2017-12-06 00:52:24'),
(7, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 3, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR3/2017</strong>.</p>\r\n', NULL, NULL, '2017-12-06 00:56:26', '2017-12-06 00:56:26'),
(8, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 3, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR3/2017</strong>.</p>\r\n', NULL, NULL, '2017-12-06 01:01:57', '2017-12-06 01:01:57'),
(9, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 3, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR3/2017</strong>.</p>\r\n', NULL, NULL, '2017-12-06 01:03:35', '2017-12-06 01:03:35'),
(10, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 3, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR3/2017</strong>.</p>\r\n', NULL, NULL, '2017-12-06 01:05:20', '2017-12-06 01:05:20'),
(11, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 3, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR3/2017</strong>.</p>\r\n', NULL, NULL, '2017-12-06 01:06:31', '2017-12-06 01:06:31'),
(12, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 3, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR3/2017</strong>.</p>\r\n', NULL, NULL, '2017-12-06 01:20:16', '2017-12-06 01:20:16'),
(13, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 3, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR3/2017</strong>.</p>\r\n', NULL, NULL, '2017-12-06 01:28:11', '2017-12-06 01:28:11'),
(14, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 3, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR3/2017</strong>.</p>\r\n', NULL, NULL, '2017-12-06 01:29:30', '2017-12-06 01:29:30'),
(15, 3, NULL, 'applicant_submit_sadr_notification', 'Sadrs', 29, NULL, NULL, '<p>Thank you for submitting the SADR report to MCAZ. An acknowledgement email has been sent to <em>eddieokemwa@gmail.com</em>. Your reference number is <strong>ADR29/2017</strong>.</p>\r\n', NULL, NULL, '2017-12-12 16:46:25', '2017-12-12 16:46:25'),
(16, 2, NULL, 'manager_submit_sadr_notification', 'Sadrs', 29, NULL, NULL, '<p>New SADR report :reference number submitted on 2017-12-12 08:08:45 is ready for review.</p>\r\n', NULL, '2017-12-14 14:22:46', '2017-12-12 16:46:29', '2017-12-12 16:46:29'),
(17, 10, NULL, 'manager_submit_sadr_notification', 'Sadrs', 29, NULL, NULL, '<p>New SADR report :reference number submitted on 2017-12-12 08:08:45 is ready for review.</p>\r\n', NULL, NULL, '2017-12-12 16:46:33', '2017-12-12 16:46:33'),
(18, 11, NULL, 'manager_assign_evaluator_notification', 'Sadrs', 3, NULL, NULL, '<p>Newly assigned SADR Report ADR3/2017 for review. Assigned by </p>\r\n', NULL, NULL, '2017-12-12 16:46:37', '2017-12-12 16:46:37'),
(19, 2, NULL, 'manager_assign_notification', 'Sadrs', 3, NULL, NULL, '<p>Assigned SADR ADR3/2017 to Evaluator2.</p>\r\n', NULL, '2017-12-19 00:16:12', '2017-12-12 16:46:37', '2017-12-12 16:46:37'),
(20, 12, NULL, 'manager_assign_evaluator_notification', 'Sadrs', 29, NULL, NULL, '<p>Newly assigned SADR Report ADR29/2017 for review. Assigned by </p>\r\n', NULL, NULL, '2017-12-13 00:45:17', '2017-12-13 00:45:17'),
(21, 12, NULL, 'manager_assign_evaluator_message', 'Sadrs', 29, NULL, NULL, '<p>&lt;&lt;Message will be inserted from user&gt;&gt;</p>\r\n', 'please review and revert soonest', NULL, '2017-12-13 00:45:17', '2017-12-13 00:45:17'),
(22, 2, NULL, 'manager_assign_notification', 'Sadrs', 29, NULL, NULL, '<p>Assigned SADR ADR29/2017 to Evaluator3.</p>\r\n', NULL, '2017-12-19 00:16:13', '2017-12-13 00:45:18', '2017-12-13 00:45:18'),
(23, 11, NULL, 'manager_assign_evaluator_notification', 'Sadrs', 25, NULL, NULL, '<p>Newly assigned SADR Report ADR25/2017 for review. Assigned by </p>\r\n', NULL, NULL, '2017-12-13 00:45:21', '2017-12-13 00:45:21'),
(24, 11, NULL, 'manager_assign_evaluator_message', 'Sadrs', 25, NULL, NULL, '<p>&lt;&lt;Message will be inserted from user&gt;&gt;</p>\r\n', 'This one comes with a message..', NULL, '2017-12-13 00:45:22', '2017-12-13 00:45:22'),
(25, 2, NULL, 'manager_assign_notification', 'Sadrs', 25, NULL, NULL, '<p>Assigned SADR ADR25/2017 to Evaluator2.</p>\r\n', NULL, NULL, '2017-12-13 00:45:22', '2017-12-13 00:45:22'),
(26, 11, NULL, 'manager_review_assigned_notification', 'Sadrs', 3, NULL, NULL, '<p>Dear Sir/Madam,</p>\r\n\r\n<p>A new review has been submitted for SADR report ADR3/2017 assigned to you.</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-13 15:45:37', '2017-12-13 15:45:37'),
(27, 2, NULL, 'manager_review_notification', 'Sadrs', 3, NULL, NULL, '<p>You have submitted a review for SADR report ADR3/2017</p>\r\n', NULL, NULL, '2017-12-13 15:45:37', '2017-12-13 15:45:37'),
(28, 11, NULL, 'manager_review_assigned_notification', 'Sadrs', 3, NULL, NULL, '<p>Dear Sir/Madam,</p>\r\n\r\n<p>A new review has been submitted for SADR report ADR3/2017 assigned to you.</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-13 15:45:45', '2017-12-13 15:45:45'),
(29, 2, NULL, 'manager_review_notification', 'Sadrs', 3, NULL, NULL, '<p>You have submitted a review for SADR report ADR3/2017</p>\r\n', NULL, NULL, '2017-12-13 15:45:45', '2017-12-13 15:45:45'),
(30, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, 'Please provide more information on this request', NULL, '2017-12-13 17:59:03', '2017-12-13 17:59:03'),
(31, 3, 2, 'request_reporter_info', 'Sadrs', 3, NULL, NULL, NULL, 'Hope this one saves successfully?? crossing fingers', NULL, '2017-12-13 18:01:01', '2017-12-13 18:01:01'),
(32, 11, NULL, 'manager_request_reporter_message', 'Sadrs', 3, NULL, NULL, '<p>Dear Sir/Madam,</p>\r\n\r\n<p>Kindly provide more information for the report ADR3/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p></p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-14 09:41:47', '2017-12-14 09:41:47'),
(33, 11, NULL, 'manager_request_reporter_evaluator_notification', 'Sadrs', 3, NULL, NULL, '<p>A new request for more information for ADR3/2017 has been sent by manager</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p></p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>Edward</p>\r\n', NULL, NULL, '2017-12-14 09:41:47', '2017-12-14 09:41:47'),
(34, 11, NULL, 'manager_request_reporter_message', 'Sadrs', 3, NULL, NULL, '<p>Dear Sir/Madam,</p>\r\n\r\n<p>Kindly provide more information for the report ADR3/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>Hope this one saves successfully?? crossing fingers</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-14 09:41:51', '2017-12-14 09:41:51'),
(35, 11, NULL, 'manager_request_reporter_evaluator_notification', 'Sadrs', 3, NULL, NULL, '<p>A new request for more information for ADR3/2017 has been sent by manager</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>Hope this one saves successfully?? crossing fingers</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>Edward</p>\r\n', NULL, NULL, '2017-12-14 09:41:52', '2017-12-14 09:41:52'),
(36, 3, NULL, 'applicant_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-12-15T11:56:06+00:00</p>\r\n', NULL, NULL, '2017-12-15 15:29:38', '2017-12-15 15:29:38'),
(37, 2, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-11-14T07:57:48+00:00</p>\r\n', NULL, NULL, '2017-12-15 15:29:43', '2017-12-15 15:29:43'),
(38, 10, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-11-14T07:57:48+00:00</p>\r\n', NULL, NULL, '2017-12-15 15:29:48', '2017-12-15 15:29:48'),
(39, 11, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-11-14T07:57:48+00:00</p>\r\n', NULL, NULL, '2017-12-15 15:29:53', '2017-12-15 15:29:53'),
(40, 12, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-11-14T07:57:48+00:00</p>\r\n', NULL, NULL, '2017-12-15 15:29:58', '2017-12-15 15:29:58'),
(41, 3, NULL, 'applicant_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-12-15T13:25:22+00:00</p>\r\n', NULL, NULL, '2017-12-15 15:30:03', '2017-12-15 15:30:03'),
(42, 2, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-11-14T07:57:48+00:00</p>\r\n', NULL, NULL, '2017-12-15 15:30:08', '2017-12-15 15:30:08'),
(43, 10, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-11-14T07:57:48+00:00</p>\r\n', NULL, NULL, '2017-12-15 15:30:13', '2017-12-15 15:30:13'),
(44, 11, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-11-14T07:57:48+00:00</p>\r\n', NULL, NULL, '2017-12-15 15:30:17', '2017-12-15 15:30:17'),
(45, 12, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-11-14T07:57:48+00:00</p>\r\n', NULL, NULL, '2017-12-15 15:30:23', '2017-12-15 15:30:23'),
(46, 3, NULL, 'applicant_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-12-15T15:07:06+00:00</p>\r\n', NULL, NULL, '2017-12-15 15:30:27', '2017-12-15 15:30:27'),
(47, 11, 2, 'request_evaluator_info', 'Sadrs', 3, NULL, NULL, NULL, 'hope this one works', NULL, '2017-12-16 14:51:12', '2017-12-16 14:51:12'),
(48, 3, 2, 'request_reporter_info', 'Sadrs', 3, NULL, NULL, NULL, 'Will it change back to rpt??', NULL, '2017-12-16 14:52:57', '2017-12-16 14:52:57'),
(49, 11, 2, 'request_evaluator_info', 'Sadrs', 3, NULL, NULL, NULL, 'now this should settle it ideally...', NULL, '2017-12-16 14:53:30', '2017-12-16 14:53:30'),
(50, 2, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-11-14T07:57:48+00:00</p>\r\n', NULL, NULL, '2017-12-16 17:49:23', '2017-12-16 17:49:23'),
(51, 10, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-11-14T07:57:48+00:00</p>\r\n', NULL, NULL, '2017-12-16 17:49:29', '2017-12-16 17:49:29'),
(52, 11, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-11-14T07:57:48+00:00</p>\r\n', NULL, NULL, '2017-12-16 17:49:33', '2017-12-16 17:49:33'),
(53, 12, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 29, NULL, NULL, '<p>New follow up report for SADR report ADR29/2017 created on 2017-11-14T07:57:48+00:00</p>\r\n', NULL, NULL, '2017-12-16 17:49:37', '2017-12-16 17:49:37'),
(54, 11, NULL, 'manager_request_evaluator_message', 'Sadrs', 3, NULL, NULL, '<p>Dear Evaluator2,</p>\r\n\r\n<p>Kindly provide more information for the report ADR3/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p></p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-16 17:49:41', '2017-12-16 17:49:41'),
(55, 11, NULL, 'manager_request_evaluator_message', 'Sadrs', 3, NULL, NULL, '<p>Dear Evaluator2,</p>\r\n\r\n<p>Kindly provide more information for the report ADR3/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p></p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-16 17:49:45', '2017-12-16 17:49:45'),
(56, 11, NULL, 'manager_request_evaluator_message', 'Sadrs', 3, NULL, NULL, '<p>Dear Evaluator2,</p>\r\n\r\n<p>Kindly provide more information for the report ADR3/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>hope this one works</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-16 17:49:48', '2017-12-16 17:49:48'),
(57, 3, NULL, 'manager_request_reporter_message', 'Sadrs', 3, NULL, NULL, '<p>Dear Sir/Madam,</p>\r\n\r\n<p>Kindly provide more information for the report ADR3/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>Will it change back to rpt??</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-16 17:49:52', '2017-12-16 17:49:52'),
(58, 11, NULL, 'manager_request_reporter_evaluator_notification', 'Sadrs', 3, NULL, NULL, '<p>A new request for more information for ADR3/2017 has been sent by manager</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>Will it change back to rpt??</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>Edward</p>\r\n', NULL, NULL, '2017-12-16 17:49:52', '2017-12-16 17:49:52'),
(59, 11, NULL, 'manager_request_evaluator_message', 'Sadrs', 3, NULL, NULL, '<p>Dear Evaluator2,</p>\r\n\r\n<p>Kindly provide more information for the report ADR3/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>now this should settle it ideally...</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-16 17:49:56', '2017-12-16 17:49:56'),
(60, 11, NULL, 'manager_committee_assigned_notification', 'Sadrs', 3, NULL, NULL, '<p>Dear Evaluator2,</p>\r\n\r\n<p>A new Committee review has been submitted for report ADR3/2017 assigned to you by manager.</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-16 17:50:00', '2017-12-16 17:50:00'),
(61, 2, NULL, 'manager_committee_notification', 'Sadrs', 3, NULL, NULL, '<p>You have submitted a committee review for report ADR3/2017</p>\r\n', NULL, NULL, '2017-12-16 17:50:00', '2017-12-16 17:50:00'),
(62, 3, NULL, 'reporter_committee_comments_notification', 'Sadrs', 3, NULL, NULL, '<p>MCAZ Review of ADR3/2017,</p>\r\n\r\n<p>MCAZ has reviewed and approved the ADR3/2017 that you submitted on 2017-11-06T06:59:23+00:00.</p>\r\n\r\n<p>MCAZ Comments:</p>\r\n\r\n<p>but these will be visible to the public</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-16 17:50:03', '2017-12-16 17:50:03'),
(63, 11, NULL, 'manager_committee_assigned_notification', 'Sadrs', 3, NULL, NULL, '<p>Dear Evaluator2,</p>\r\n\r\n<p>A new Committee review has been submitted for report ADR3/2017 assigned to you by manager.</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-16 17:50:07', '2017-12-16 17:50:07'),
(64, 2, NULL, 'manager_committee_notification', 'Sadrs', 3, NULL, NULL, '<p>You have submitted a committee review for report ADR3/2017</p>\r\n', NULL, NULL, '2017-12-16 17:50:08', '2017-12-16 17:50:08'),
(65, 3, NULL, 'reporter_committee_comments_notification', 'Sadrs', 3, NULL, NULL, '<p>MCAZ Review of ADR3/2017,</p>\r\n\r\n<p>MCAZ has reviewed and approved the ADR3/2017 that you submitted on 2017-11-06T06:59:23+00:00.</p>\r\n\r\n<p>MCAZ Comments:</p>\r\n\r\n<p>upload a file</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-16 17:50:11', '2017-12-16 17:50:11'),
(66, 3, NULL, 'applicant_submit_aefi_followup_notification', 'Aefis', 2, NULL, NULL, '<p>New follow up report for SADR report AEFI2/2017 created on 2017-12-17T00:44:13+00:00</p>\r\n', NULL, NULL, '2017-12-17 01:04:58', '2017-12-17 01:04:58'),
(67, 2, NULL, 'manager_submit_aefi_followup_notification', 'Aefis', 2, NULL, NULL, '<p>New follow up report for AEFI report AEFI2/2017 created on 2017-11-23T00:51:20+00:00</p>\r\n', NULL, NULL, '2017-12-17 01:05:03', '2017-12-17 01:05:03'),
(68, 10, NULL, 'manager_submit_aefi_followup_notification', 'Aefis', 2, NULL, NULL, '<p>New follow up report for AEFI report AEFI2/2017 created on 2017-11-23T00:51:20+00:00</p>\r\n', NULL, NULL, '2017-12-17 01:05:07', '2017-12-17 01:05:07'),
(69, 11, NULL, 'manager_submit_aefi_followup_notification', 'Aefis', 2, NULL, NULL, '<p>New follow up report for AEFI report AEFI2/2017 created on 2017-11-23T00:51:20+00:00</p>\r\n', NULL, NULL, '2017-12-17 01:05:11', '2017-12-17 01:05:11'),
(70, 12, NULL, 'manager_submit_aefi_followup_notification', 'Aefis', 2, NULL, NULL, '<p>New follow up report for AEFI report AEFI2/2017 created on 2017-11-23T00:51:20+00:00</p>\r\n', NULL, NULL, '2017-12-17 01:05:15', '2017-12-17 01:05:15'),
(71, 12, 2, 'request_evaluator_info', 'Aefis', 1, NULL, NULL, NULL, 'Mbona waogopa??', NULL, '2017-12-18 00:32:04', '2017-12-18 00:32:04'),
(72, NULL, 2, 'request_reporter_info', 'Sadrs', 53, NULL, NULL, NULL, 'Nawajua kondoo wangu', NULL, '2017-12-18 01:04:02', '2017-12-18 01:04:02'),
(73, 3, 2, 'request_reporter_info', 'Aefis', 2, NULL, NULL, NULL, 'Nawajua kondoo wangu', NULL, '2017-12-18 01:06:44', '2017-12-18 01:06:44'),
(74, 11, NULL, 'manager_assign_evaluator_notification', 'Sadrs', 53, NULL, NULL, '<p>Newly assigned Report ADR53/2017 for review. Assigned by manager</p>\r\n', NULL, NULL, '2017-12-18 17:35:27', '2017-12-18 17:35:27'),
(75, 11, NULL, 'manager_assign_evaluator_message', 'Sadrs', 53, NULL, NULL, '<p>&lt;&lt;Message will be inserted from user&gt;&gt;</p>\r\n', 'eti hamuoni??', NULL, '2017-12-18 17:35:27', '2017-12-18 17:35:27'),
(76, 2, NULL, 'manager_assign_notification', 'Sadrs', 53, NULL, NULL, '<p>Assigned ADR53/2017 to Evaluator2.</p>\r\n', NULL, NULL, '2017-12-18 17:35:27', '2017-12-18 17:35:27'),
(77, 12, NULL, 'manager_assign_evaluator_notification', 'Aefis', 1, NULL, NULL, '<p>Newly assigned Report AEFI1/2017 for review. Assigned by manager</p>\r\n', NULL, NULL, '2017-12-18 17:35:31', '2017-12-18 17:35:31'),
(78, 12, NULL, 'manager_assign_evaluator_message', 'Aefis', 1, NULL, NULL, '<p>&lt;&lt;Message will be inserted from user&gt;&gt;</p>\r\n', 'Evaluator3... twende kazi', NULL, '2017-12-18 17:35:31', '2017-12-18 17:35:31'),
(79, 2, NULL, 'manager_assign_notification', 'Aefis', 1, NULL, NULL, '<p>Assigned AEFI1/2017 to Evaluator3.</p>\r\n', NULL, NULL, '2017-12-18 17:35:31', '2017-12-18 17:35:31'),
(80, 12, NULL, 'manager_request_evaluator_message', 'Aefis', 1, NULL, NULL, '<p>Dear Evaluator3,</p>\r\n\r\n<p>Kindly provide more information for the report AEFI1/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>Mbona waogopa??</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-18 17:35:36', '2017-12-18 17:35:36'),
(81, 3, NULL, 'manager_request_reporter_message', 'Aefis', 2, NULL, NULL, '<p>Dear Sir/Madam,</p>\r\n\r\n<p>Kindly provide more information for the report AEFI2/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>Nawajua kondoo wangu</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-18 17:35:41', '2017-12-18 17:35:41'),
(82, 2, NULL, 'manager_committee_notification', 'Aefis', 2, NULL, NULL, '<p>You have submitted a committee review for report AEFI2/2017</p>\r\n', NULL, NULL, '2017-12-18 17:35:41', '2017-12-18 17:35:41'),
(83, 3, NULL, 'reporter_committee_comments_notification', 'Aefis', 2, NULL, NULL, '<p>MCAZ Review of AEFI2/2017,</p>\r\n\r\n<p>MCAZ has reviewed and approved the AEFI2/2017 that you submitted on 2017-11-23T00:51:20+00:00.</p>\r\n\r\n<p>MCAZ Comments:</p>\r\n\r\n<p>ku approve</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-18 17:35:45', '2017-12-18 17:35:45'),
(84, 3, NULL, 'applicant_submit_sadr_followup_notification', 'Sadrs', 3, NULL, NULL, '<p>New follow up report for SADR report ADR3/2017 created on 2017-12-18T01:45:08+00:00</p>\r\n', NULL, NULL, '2017-12-18 17:35:50', '2017-12-18 17:35:50'),
(85, 2, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 3, NULL, NULL, '<p>New follow up report for SADR report ADR3/2017 created on 2017-11-06T06:59:23+00:00</p>\r\n', NULL, NULL, '2017-12-18 17:35:54', '2017-12-18 17:35:54'),
(86, 10, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 3, NULL, NULL, '<p>New follow up report for SADR report ADR3/2017 created on 2017-11-06T06:59:23+00:00</p>\r\n', NULL, NULL, '2017-12-18 17:35:59', '2017-12-18 17:35:59'),
(87, 11, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 3, NULL, NULL, '<p>New follow up report for SADR report ADR3/2017 created on 2017-11-06T06:59:23+00:00</p>\r\n', NULL, NULL, '2017-12-18 17:36:04', '2017-12-18 17:36:04'),
(88, 12, NULL, 'manager_submit_sadr_followup_notification', 'Sadrs', 3, NULL, NULL, '<p>New follow up report for SADR report ADR3/2017 created on 2017-11-06T06:59:23+00:00</p>\r\n', NULL, NULL, '2017-12-18 17:36:09', '2017-12-18 17:36:09'),
(89, 11, 2, 'request_evaluator_info', 'Saefis', 1, NULL, NULL, NULL, 'I need to request for more info here Mr. Sir', NULL, '2017-12-18 20:12:21', '2017-12-18 20:12:21'),
(90, 3, 2, 'request_reporter_info', 'Saefis', 1, NULL, NULL, NULL, 'I hereby request for info', NULL, '2017-12-18 21:01:58', '2017-12-18 21:01:58'),
(91, 12, 2, 'request_evaluator_info', 'Adrs', 1, NULL, NULL, NULL, 'I really need this to work', NULL, '2017-12-18 23:56:45', '2017-12-18 23:56:45'),
(92, 3, 2, 'request_reporter_info', 'Adrs', 1, NULL, NULL, NULL, 'Ki sadou', NULL, '2017-12-19 00:00:17', '2017-12-19 00:00:17'),
(93, 11, NULL, 'manager_assign_evaluator_notification', 'Aefis', 1, NULL, NULL, '<p>Newly assigned Report SAEFI1/2017 for review. Assigned by manager</p>\r\n\r\n<p>I have decided, to follow Jesus</p>\r\n', NULL, NULL, '2017-12-19 00:10:45', '2017-12-19 00:10:45'),
(94, 11, NULL, 'manager_assign_evaluator_message', 'Aefis', 1, NULL, NULL, '<p>Dear Evaluator2,</p>\r\n\r\n<p>I have decided, to follow Jesus</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>manager</p>\r\n', 'I have decided, to follow Jesus', NULL, '2017-12-19 00:10:45', '2017-12-19 00:10:45'),
(95, 2, NULL, 'manager_assign_notification', 'Aefis', 1, NULL, NULL, '<p>Assigned SAEFI1/2017 to Evaluator2.</p>\r\n', NULL, NULL, '2017-12-19 00:10:45', '2017-12-19 00:10:45'),
(96, 11, NULL, 'manager_assign_evaluator_notification', 'Aefis', 1, NULL, NULL, '<p>Newly assigned Report SAEFI1/2017 for review. Assigned by manager</p>\r\n\r\n<p>I have decided, to follow Jesus</p>\r\n', NULL, NULL, '2017-12-19 00:10:49', '2017-12-19 00:10:49'),
(97, 11, NULL, 'manager_assign_evaluator_message', 'Aefis', 1, NULL, NULL, '<p>Dear Evaluator2,</p>\r\n\r\n<p>I have decided, to follow Jesus</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>manager</p>\r\n', 'I have decided, to follow Jesus', NULL, '2017-12-19 00:10:49', '2017-12-19 00:10:49'),
(98, 2, NULL, 'manager_assign_notification', 'Aefis', 1, NULL, NULL, '<p>Assigned SAEFI1/2017 to Evaluator2.</p>\r\n', NULL, NULL, '2017-12-19 00:10:49', '2017-12-19 00:10:49'),
(99, 11, NULL, 'manager_request_evaluator_message', 'Saefis', 1, NULL, NULL, '<p>Dear Evaluator2,</p>\r\n\r\n<p>Kindly provide more information for the report SAEFI1/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>I need to request for more info here Mr. Sir</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-19 00:10:53', '2017-12-19 00:10:53'),
(100, 11, NULL, 'manager_review_assigned_notification', 'Saefis', 1, NULL, NULL, '<p>Dear Evaluator2,</p>\r\n\r\n<p>A new review has been submitted for report SAEFI1/2017 assigned to you.</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-19 00:10:56', '2017-12-19 00:10:56'),
(101, 2, NULL, 'manager_review_notification', 'Saefis', 1, NULL, NULL, '<p>You have submitted a review for report SAEFI1/2017</p>\r\n', NULL, NULL, '2017-12-19 00:10:56', '2017-12-19 00:10:56'),
(102, 3, NULL, 'manager_request_reporter_message', 'Saefis', 1, NULL, NULL, '<p>Dear Sir/Madam,</p>\r\n\r\n<p>Kindly provide more information for the report SAEFI1/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>I hereby request for info</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-19 00:11:00', '2017-12-19 00:11:00'),
(103, 11, NULL, 'manager_request_reporter_evaluator_notification', 'Saefis', 1, NULL, NULL, '<p>A new request for more information for SAEFI1/2017 has been sent by manager</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>I hereby request for info</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>Edward</p>\r\n', NULL, NULL, '2017-12-19 00:11:01', '2017-12-19 00:11:01'),
(104, 11, NULL, 'manager_committee_assigned_notification', 'Saefis', 1, NULL, NULL, '<p>Dear Evaluator2,</p>\r\n\r\n<p>A new Committee review has been submitted for report SAEFI1/2017 assigned to you by manager.</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-19 00:11:04', '2017-12-19 00:11:04'),
(105, 2, NULL, 'manager_committee_notification', 'Saefis', 1, NULL, NULL, '<p>You have submitted a committee review for report SAEFI1/2017</p>\r\n', NULL, NULL, '2017-12-19 00:11:05', '2017-12-19 00:11:05'),
(106, 3, NULL, 'reporter_committee_comments_notification', 'Saefis', 1, NULL, NULL, '<p>MCAZ Review of SAEFI1/2017,</p>\r\n\r\n<p>MCAZ has reviewed and approved the SAEFI1/2017 that you submitted on 2017-11-25T11:48:36+00:00.</p>\r\n\r\n<p>MCAZ Comments:</p>\r\n\r\n<p>saves without intevention??</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-19 00:11:08', '2017-12-19 00:11:08'),
(107, 12, NULL, 'manager_assign_evaluator_notification', 'Adrs', 1, NULL, NULL, '<p>Newly assigned Report SAE1/2017 for review. Assigned by manager</p>\r\n\r\n<p>Special request 2 u</p>\r\n', NULL, NULL, '2017-12-19 00:11:12', '2017-12-19 00:11:12'),
(108, 12, NULL, 'manager_assign_evaluator_message', 'Adrs', 1, NULL, NULL, '<p>Dear Evaluator3,</p>\r\n\r\n<p>Special request 2 u</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>manager</p>\r\n', 'Special request 2 u', NULL, '2017-12-19 00:11:13', '2017-12-19 00:11:13'),
(109, 2, NULL, 'manager_assign_notification', 'Adrs', 1, NULL, NULL, '<p>Assigned SAE1/2017 to Evaluator3.</p>\r\n', NULL, NULL, '2017-12-19 00:11:13', '2017-12-19 00:11:13'),
(110, 12, NULL, 'manager_request_evaluator_message', 'Adrs', 1, NULL, NULL, '<p>Dear Evaluator3,</p>\r\n\r\n<p>Kindly provide more information for the report SAE1/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>I really need this to work</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-19 00:11:16', '2017-12-19 00:11:16'),
(111, 12, NULL, 'manager_review_assigned_notification', 'Adrs', 1, NULL, NULL, '<p>Dear Evaluator3,</p>\r\n\r\n<p>A new review has been submitted for report SAE1/2017 assigned to you.</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-19 00:11:20', '2017-12-19 00:11:20'),
(112, 2, NULL, 'manager_review_notification', 'Adrs', 1, NULL, NULL, '<p>You have submitted a review for report SAE1/2017</p>\r\n', NULL, NULL, '2017-12-19 00:11:20', '2017-12-19 00:11:20'),
(113, 3, NULL, 'manager_request_reporter_message', 'Adrs', 1, NULL, NULL, '<p>Dear Sir/Madam,</p>\r\n\r\n<p>Kindly provide more information for the report SAE1/2017</p>\r\n\r\n<p>Message from MCAZ</p>\r\n\r\n<p>Ki sadou</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-19 00:11:24', '2017-12-19 00:11:24'),
(114, 12, NULL, 'manager_request_reporter_evaluator_notification', 'Adrs', 1, NULL, NULL, '<p>A new request for more information for SAE1/2017 has been sent by manager</p>\r\n\r\n<p>Message:</p>\r\n\r\n<p>Ki sadou</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>Edward</p>\r\n', NULL, NULL, '2017-12-19 00:11:24', '2017-12-19 00:11:24'),
(115, 12, NULL, 'manager_committee_assigned_notification', 'Adrs', 1, NULL, NULL, '<p>Dear Evaluator3,</p>\r\n\r\n<p>A new Committee review has been submitted for report SAE1/2017 assigned to you by manager.</p>\r\n\r\n<p>Regards</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-19 00:11:28', '2017-12-19 00:11:28'),
(116, 2, NULL, 'manager_committee_notification', 'Adrs', 1, NULL, NULL, '<p>You have submitted a committee review for report SAE1/2017</p>\r\n', NULL, NULL, '2017-12-19 00:11:28', '2017-12-19 00:11:28'),
(117, 3, NULL, 'reporter_committee_comments_notification', 'Adrs', 1, NULL, NULL, '<p>MCAZ Review of SAE1/2017,</p>\r\n\r\n<p>MCAZ has reviewed and approved the SAE1/2017 that you submitted on 2017-11-09T16:45:27+00:00.</p>\r\n\r\n<p>MCAZ Comments:</p>\r\n\r\n<p>peee</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>MCAZ</p>\r\n', NULL, NULL, '2017-12-19 00:11:32', '2017-12-19 00:11:32'),
(118, 16, NULL, 'registration_notification', 'Users', 16, NULL, NULL, '<p>Dear reporter,</p>\r\n\r\n<p>Welcome to the MCAZ PV reporting website. Your email is reporter. Thank you.</p>\r\n\r\n<p>Regards,</p>\r\n\r\n<p>Edward</p>\r\n', NULL, NULL, '2018-01-03 01:15:48', '2018-01-03 01:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20171109100258, 'All', '2017-11-09 10:38:19', '2017-11-09 10:38:19', 0),
(20171109102026, 'Initial', '2017-11-09 07:20:26', '2017-11-09 07:20:26', 0),
(20171109124329, 'CreateAdrs', '2017-11-09 10:39:05', '2017-11-09 10:39:05', 0),
(20171109134719, 'CreateAdrListOfDrugs', '2017-11-09 11:07:57', '2017-11-09 11:07:57', 0),
(20171109140212, 'CreateAdrOtherDrugs', '2017-11-09 11:07:57', '2017-11-09 11:07:57', 0),
(20171109141047, 'CreateAdrLabTests', '2017-11-09 11:14:47', '2017-11-09 11:14:47', 0),
(20171109162341, 'AddDosageToAefiListOfVaccines', '2017-11-09 13:24:23', '2017-11-09 13:24:23', 0),
(20171109162408, 'RemoveDoseFromAefiListOfVaccines', '2017-11-09 13:24:23', '2017-11-09 13:24:24', 0),
(20171109163514, 'Initial', '2017-11-09 13:35:14', '2017-11-09 13:35:14', 0),
(20171109202031, 'DropAefis', '2017-11-10 03:28:44', '2017-11-10 03:28:44', 0),
(20171109202102, 'CreateAefis', '2017-11-10 03:28:44', '2017-11-10 03:28:44', 0),
(20171110073326, 'DropAefiListOfVaccines', '2017-11-10 04:40:08', '2017-11-10 04:40:09', 0),
(20171110073359, 'CreateAefiListOfVaccines', '2017-11-10 04:40:09', '2017-11-10 04:40:09', 0),
(20171110073820, 'CreateAefiListOfDiluents', '2017-11-10 04:40:09', '2017-11-10 04:40:09', 0),
(20171111074218, 'DropAefis', '2017-11-11 04:55:44', '2017-11-11 04:55:44', 0),
(20171111074310, 'CreateAefis', '2017-11-11 04:55:44', '2017-11-11 04:55:44', 0),
(20171113193546, 'DropAttachments', '2017-11-13 16:41:06', '2017-11-13 16:41:06', 0),
(20171113193556, 'CreateAttachments', '2017-11-13 16:41:07', '2017-11-13 16:41:07', 0),
(20171120185926, 'AddLabResultsToSadrs', '2017-11-20 16:01:17', '2017-11-20 16:01:18', 0),
(20171120192112, 'AddActionTakenToSadrs', '2017-11-20 16:22:52', '2017-11-20 16:22:53', 0),
(20171120193526, 'AddSubmittedToAefis', '2017-11-20 16:37:36', '2017-11-20 16:37:37', 0),
(20171120193543, 'AddSubmittedToAdrs', '2017-11-20 16:37:37', '2017-11-20 16:37:37', 0),
(20171122164725, 'AddActivationKeyUsers', '2017-11-22 14:01:38', '2017-11-22 14:01:39', 0),
(20171123004633, 'AddProvinceIdToAefis', '2017-11-22 21:47:37', '2017-11-22 21:47:38', 0),
(20171125091632, 'CreateSaefis', '2017-11-25 07:43:04', '2017-11-25 07:43:05', 0),
(20171125100321, 'CreateSaefiListOfVaccines', '2017-11-25 07:43:05', '2017-11-25 07:43:06', 0),
(20171205202337, 'DropMessages', '2017-12-05 20:36:32', '2017-12-05 20:36:33', 0),
(20171205202417, 'CreateMessages', '2017-12-05 20:36:33', '2017-12-05 20:36:34', 0),
(20171205202956, 'CreateNotifications', '2017-12-05 20:37:07', '2017-12-05 20:37:07', 0),
(20171205220310, 'AddDeletedToMessages', '2017-12-05 22:04:05', '2017-12-05 22:04:06', 0),
(20171207212809, 'AddSubmittedToSaefis', '2017-12-07 21:28:50', '2017-12-07 21:28:50', 0),
(20171213024007, 'NameOfTheMigrations', '2017-12-13 02:40:07', '2017-12-13 02:40:07', 0),
(20171214090903, 'ReviewsMigrations', '2017-12-14 09:09:03', '2017-12-14 09:09:03', 0),
(20171217204326, 'IntermediaryMigrations', '2017-12-17 20:43:26', '2017-12-17 20:43:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pqmps`
--

CREATE TABLE `pqmps` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `sub_county_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `facility_name` varchar(100) DEFAULT NULL,
  `facility_code` varchar(100) DEFAULT NULL,
  `facility_address` varchar(100) DEFAULT NULL,
  `facility_phone` varchar(100) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `generic_name` varchar(100) DEFAULT NULL,
  `batch_number` varchar(100) DEFAULT NULL,
  `manufacture_date` varchar(20) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `receipt_date` date DEFAULT NULL,
  `name_of_manufacturer` varchar(100) DEFAULT NULL,
  `country_of_origin` varchar(100) DEFAULT NULL,
  `supplier_name` varchar(100) DEFAULT NULL,
  `supplier_address` varchar(100) DEFAULT NULL,
  `product_formulation` varchar(70) DEFAULT NULL,
  `product_formulation_specify` varchar(250) DEFAULT NULL,
  `colour_change` tinyint(1) DEFAULT NULL,
  `separating` tinyint(1) DEFAULT NULL,
  `powdering` tinyint(1) DEFAULT NULL,
  `caking` tinyint(1) DEFAULT NULL,
  `moulding` tinyint(1) DEFAULT NULL,
  `odour_change` tinyint(1) DEFAULT NULL,
  `mislabeling` tinyint(1) DEFAULT NULL,
  `incomplete_pack` tinyint(1) DEFAULT NULL,
  `complaint_other` tinyint(1) DEFAULT NULL,
  `complaint_other_specify` text,
  `complaint_description` text,
  `require_refrigeration` varchar(10) DEFAULT NULL,
  `product_at_facility` varchar(10) DEFAULT NULL,
  `returned_by_client` varchar(10) DEFAULT NULL,
  `stored_to_recommendations` varchar(10) DEFAULT NULL,
  `other_details` text,
  `comments` text,
  `reporter_name` varchar(100) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `emails` tinyint(2) DEFAULT '0',
  `submitted` tinyint(2) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `device` tinyint(2) DEFAULT '0',
  `notified` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `province_name` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province_name`, `created`, `modified`) VALUES
(1, 'Bulawayo', '2017-11-23 00:57:47', '2017-11-23 00:57:47'),
(2, 'Harare', '2017-11-23 00:57:57', '2017-11-23 00:57:57'),
(3, 'Manicaland', '2017-11-23 00:58:06', '2017-11-23 00:58:06'),
(4, 'Mashonaland Central', '2017-11-23 00:58:18', '2017-11-23 08:36:10'),
(5, 'Mashonaland East', '2017-11-23 08:36:26', '2017-11-23 08:36:26'),
(6, 'Mashonaland West', '2017-11-23 08:36:53', '2017-11-23 08:36:53'),
(7, 'Masvingo', '2017-11-23 08:37:07', '2017-11-23 08:37:07'),
(8, 'Matebeleland North', '2017-11-23 08:37:22', '2017-11-23 08:37:22'),
(9, 'Matebeleland South', '2017-11-23 08:37:33', '2017-11-23 08:37:33'),
(10, 'Midlands', '2017-11-23 08:37:45', '2017-11-23 08:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `queued_jobs`
--

CREATE TABLE `queued_jobs` (
  `id` int(11) NOT NULL,
  `job_type` varchar(45) NOT NULL,
  `data` longtext,
  `job_group` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `notbefore` datetime DEFAULT NULL,
  `fetched` datetime DEFAULT NULL,
  `completed` datetime DEFAULT NULL,
  `progress` float DEFAULT NULL,
  `failed` int(11) NOT NULL DEFAULT '0',
  `failure_message` text,
  `workerkey` varchar(45) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `priority` int(3) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `queued_jobs`
--

INSERT INTO `queued_jobs` (`id`, `job_type`, `data`, `job_group`, `reference`, `created`, `notbefore`, `fetched`, `completed`, `progress`, `failed`, `failure_message`, `workerkey`, `status`, `priority`) VALUES
(36, 'GenericEmail', '{"email_address":"eddieokemwa@gmail.com","user_id":3,"type":"applicant_submit_sadr_email","model":"Sadrs","foreign_key":3,"vars":{"id":3,"user_id":3,"reference_number":"ADR3\\/2017","designation_id":2,"report_type":null,"name_of_institution":"Kenyatta National Hospital","institution_code":"00125","patient_name":"A.O","ip_no":"258","date_of_birth":"-02-1993","age_group":"child","gender":"Male","weight":"75","height":"2.1","date_of_onset_of_reaction":"15-12-2004","date_of_end_of_reaction":"04-02-2010","duration_type":"Hours","duration":"3","description_of_reaction":"Sick","severity":"Yes","severity_reason":"Life-threatening","medical_history":"has been sickly\\r\\n","past_drug_therapy":"dawa\\r\\n","outcome":"Not yet recovered","lab_test_results":"black stool","reporter_name":"Edward","reporter_email":"eddieokemwa@gmail.com","reporter_phone":"0729932475","submitted":2,"emails":0,"active":true,"device":0,"notified":0,"created":"2017-11-06T06:59:23+00:00","modified":"2017-12-06T00:50:09+00:00","action_taken":"","relatedness":"","attachments":[{"id":1,"foreign_key":3,"file":"DSC_1145.jpg","dir":"webroot\\/files\\/Attachments\\/file\\/","size":"106704","type":"image\\/jpeg","model":"Sadrs","category":"attachments","description":"asfa","created":"2017-11-13T19:58:54+00:00","modified":"2017-12-06T00:50:09+00:00"},{"id":2,"foreign_key":3,"file":"DSC_1007.jpg","dir":"webroot\\/files\\/Attachments\\/file\\/","size":"138255","type":"image\\/jpeg","model":"Sadrs","category":"attachments","description":"batch this","created":"2017-11-13T20:22:13+00:00","modified":"2017-12-06T00:50:09+00:00"},{"id":3,"foreign_key":3,"file":"DSC_0815.jpg","dir":"webroot\\/files\\/Attachments\\/file\\/","size":"266055","type":"image\\/jpeg","model":"Sadrs","category":"attachments","description":"Kadenge","created":"2017-11-13T20:24:09+00:00","modified":"2017-12-06T00:50:09+00:00"}],"sadr_other_drugs":[{"id":1,"sadr_id":3,"drug_name":"Miti ni dawa","start_date":"2017-01-06T00:00:00+00:00","stop_date":"2017-02-06T00:00:00+00:00","suspected_drug":"1","created":"2017-11-06T11:22:31+00:00","modified":"2017-11-08T20:38:09+00:00"}],"sadr_list_of_drugs":[{"id":1,"sadr_id":3,"sadr_followup_id":null,"dose_id":3,"route_id":3,"frequency_id":2,"drug_name":"Panadol","brand_name":"dawa","batch_number":"22","dose":"2","start_date":"2008-06-02T00:00:00+00:00","stop_date":"2015-06-17T00:00:00+00:00","indication":"sss","suspected_drug":"1","created":"2017-11-06T11:06:44+00:00","modified":"2017-11-07T21:26:34+00:00"}],"province_id":""}}', NULL, NULL, '2017-12-06 00:50:10', NULL, '2017-12-06 00:52:16', NULL, NULL, 2, 'Cake\\Network\\Exception\\SocketException: SMTP Error: 421 gmx.com Service closing transmission channel - command timeout', '6b1d7d7b8b3b33929bbe3aa68e4b96c221f625f8', NULL, 5),
(38, 'GenericEmail', '{"email_address":"eddieokemwa@gmail.com","user_id":3,"type":"applicant_submit_sadr_email","model":"Sadrs","foreign_key":3,"vars":{"id":3,"user_id":3,"reference_number":"ADR3\\/2017","designation_id":2,"report_type":null,"name_of_institution":"Kenyatta National Hospital","institution_code":"00125","patient_name":"A.O","ip_no":"258","date_of_birth":"-02-1993","age_group":"child","gender":"Male","weight":"75","height":"2.1","date_of_onset_of_reaction":"15-12-2004","date_of_end_of_reaction":"04-02-2010","duration_type":"Hours","duration":"3","description_of_reaction":"Sick","severity":"Yes","severity_reason":"Life-threatening","medical_history":"has been sickly\\r\\n","past_drug_therapy":"dawa\\r\\n","outcome":"Not yet recovered","lab_test_results":"black stool","reporter_name":"Edward","reporter_email":"eddieokemwa@gmail.com","reporter_phone":"0729932475","submitted":2,"emails":0,"active":true,"device":0,"notified":0,"created":"2017-11-06T06:59:23+00:00","modified":"2017-12-06T00:52:04+00:00","action_taken":"","relatedness":"","attachments":[{"id":1,"foreign_key":3,"file":"DSC_1145.jpg","dir":"webroot\\/files\\/Attachments\\/file\\/","size":"106704","type":"image\\/jpeg","model":"Sadrs","category":"attachments","description":"asfa","created":"2017-11-13T19:58:54+00:00","modified":"2017-12-06T00:52:04+00:00"},{"id":2,"foreign_key":3,"file":"DSC_1007.jpg","dir":"webroot\\/files\\/Attachments\\/file\\/","size":"138255","type":"image\\/jpeg","model":"Sadrs","category":"attachments","description":"batch this","created":"2017-11-13T20:22:13+00:00","modified":"2017-12-06T00:52:04+00:00"},{"id":3,"foreign_key":3,"file":"DSC_0815.jpg","dir":"webroot\\/files\\/Attachments\\/file\\/","size":"266055","type":"image\\/jpeg","model":"Sadrs","category":"attachments","description":"Kadenge","created":"2017-11-13T20:24:09+00:00","modified":"2017-12-06T00:52:04+00:00"}],"sadr_other_drugs":[{"id":1,"sadr_id":3,"drug_name":"Miti ni dawa","start_date":"2017-01-06T00:00:00+00:00","stop_date":"2017-02-06T00:00:00+00:00","suspected_drug":"1","created":"2017-11-06T11:22:31+00:00","modified":"2017-11-08T20:38:09+00:00"}],"sadr_list_of_drugs":[{"id":1,"sadr_id":3,"sadr_followup_id":null,"dose_id":3,"route_id":3,"frequency_id":2,"drug_name":"Panadol","brand_name":"dawa","batch_number":"22","dose":"2","start_date":"2008-06-02T00:00:00+00:00","stop_date":"2015-06-17T00:00:00+00:00","indication":"sss","suspected_drug":"1","created":"2017-11-06T11:06:44+00:00","modified":"2017-11-07T21:26:34+00:00"}],"province_id":""}}', NULL, NULL, '2017-12-06 00:52:04', NULL, '2017-12-06 00:56:18', NULL, NULL, 2, 'Cake\\Network\\Exception\\SocketException: SMTP server did not accept the password.', '9cb728961b964a5943727f598137946932b10aad', NULL, 5),
(40, 'GenericEmail', '{"email_address":"eddieokemwa@gmail.com","user_id":3,"type":"applicant_submit_sadr_email","model":"Sadrs","foreign_key":3,"vars":{"id":3,"user_id":3,"reference_number":"ADR3\\/2017","designation_id":2,"report_type":null,"name_of_institution":"Kenyatta National Hospital","institution_code":"00125","patient_name":"A.O","ip_no":"258","date_of_birth":"-02-1993","age_group":"child","gender":"Male","weight":"75","height":"2.1","date_of_onset_of_reaction":"15-12-2004","date_of_end_of_reaction":"04-02-2010","duration_type":"Hours","duration":"3","description_of_reaction":"Sick","severity":"Yes","severity_reason":"Life-threatening","medical_history":"has been sickly\\r\\n","past_drug_therapy":"dawa\\r\\n","outcome":"Not yet recovered","lab_test_results":"black stool","reporter_name":"Edward","reporter_email":"eddieokemwa@gmail.com","reporter_phone":"0729932475","submitted":2,"emails":0,"active":true,"device":0,"notified":0,"created":"2017-11-06T06:59:23+00:00","modified":"2017-12-06T00:56:12+00:00","action_taken":"","relatedness":"","attachments":[{"id":1,"foreign_key":3,"file":"DSC_1145.jpg","dir":"webroot\\/files\\/Attachments\\/file\\/","size":"106704","type":"image\\/jpeg","model":"Sadrs","category":"attachments","description":"asfa","created":"2017-11-13T19:58:54+00:00","modified":"2017-12-06T00:56:12+00:00"},{"id":2,"foreign_key":3,"file":"DSC_1007.jpg","dir":"webroot\\/files\\/Attachments\\/file\\/","size":"138255","type":"image\\/jpeg","model":"Sadrs","category":"attachments","description":"batch this","created":"2017-11-13T20:22:13+00:00","modified":"2017-12-06T00:56:12+00:00"},{"id":3,"foreign_key":3,"file":"DSC_0815.jpg","dir":"webroot\\/files\\/Attachments\\/file\\/","size":"266055","type":"image\\/jpeg","model":"Sadrs","category":"attachments","description":"Kadenge","created":"2017-11-13T20:24:09+00:00","modified":"2017-12-06T00:56:12+00:00"}],"sadr_other_drugs":[{"id":1,"sadr_id":3,"drug_name":"Miti ni dawa","start_date":"2017-01-06T00:00:00+00:00","stop_date":"2017-02-06T00:00:00+00:00","suspected_drug":"1","created":"2017-11-06T11:22:31+00:00","modified":"2017-11-08T20:38:09+00:00"}],"sadr_list_of_drugs":[{"id":1,"sadr_id":3,"sadr_followup_id":null,"dose_id":3,"route_id":3,"frequency_id":2,"drug_name":"Panadol","brand_name":"dawa","batch_number":"22","dose":"2","start_date":"2008-06-02T00:00:00+00:00","stop_date":"2015-06-17T00:00:00+00:00","indication":"sss","suspected_drug":"1","created":"2017-11-06T11:06:44+00:00","modified":"2017-11-07T21:26:34+00:00"}],"province_id":""}}', NULL, NULL, '2017-12-06 00:56:12', NULL, '2017-12-06 00:56:36', NULL, NULL, 2, 'Cake\\Network\\Exception\\SocketException: SMTP server did not accept the password.', '9cb728961b964a5943727f598137946932b10aad', NULL, 5),
(202, 'GenericEmail', '{"email_address":"eddieokemwa@gmail.com","user_id":14,"type":"registration_email","model":"Users","foreign_key":14,"vars":{"id":14,"designation_id":null,"county_id":null,"username":null,"confirm_password":"$2y$10$FvUTtG37bixPK9TczMmnC.XO810d9BHJiD5TaiD\\/V\\/oa7Q0zNfCZi","name":"mike","email":"eddieokemwa@gmail.com","group_id":3,"name_of_institution":null,"institution_address":null,"institution_code":null,"institution_contact":null,"ward":null,"phone_no":null,"forgot_password":0,"initial_email":0,"is_active":true,"deactivated":null,"is_admin":false,"created":"2017-12-13T00:42:17+00:00","modified":"2017-12-13T00:42:17+00:00","activation_key":"21542810","pv_site":"<a href=\\"http:\\/\\/mcazpvdev\\/pages\\/home\\">MCAZ PV website<\\/a>","activation_link":"<a href=\\"http:\\/\\/mcazpvdev\\/users\\/activate\\/21542810\\">ACTIVATE<\\/a>"}}', NULL, NULL, '2018-01-03 11:31:33', NULL, '2018-01-03 11:31:42', '2018-01-03 11:31:48', NULL, 0, NULL, 'cca20a8c12f4c1e3c5d4f25d5880cb2d1e6aabe9', NULL, 5),
(203, 'GenericEmail', '{"email_address":"fakeuser@mail.com","user_id":17,"type":"registration_email","model":"Users","foreign_key":17,"vars":{"email":"fakeuser@mail.com","group_id":3,"created":"2018-01-05T12:19:25+00:00","modified":"2018-01-05T12:19:25+00:00","id":17,"activation_key":21543181,"name":"Sir\\/Madam","pv_site":"<a href=\\"http:\\/\\/mcazpvdev\\/pages\\/home\\">MCAZ PV website<\\/a>","activation_link":"<a href=\\"http:\\/\\/mcazpvdev\\/users\\/activate\\/21543181\\">ACTIVATE<\\/a>"}}', NULL, NULL, '2018-01-05 12:19:25', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 5),
(204, 'GenericNotification', '{"email_address":"fakeuser@mail.com","user_id":17,"type":"registration_notification","model":"Users","foreign_key":17,"vars":{"email":"fakeuser@mail.com","group_id":3,"created":"2018-01-05T12:19:25+00:00","modified":"2018-01-05T12:19:25+00:00","id":17,"activation_key":21543181,"name":"Sir\\/Madam","pv_site":"<a href=\\"http:\\/\\/mcazpvdev\\/pages\\/home\\">MCAZ PV website<\\/a>","activation_link":"<a href=\\"http:\\/\\/mcazpvdev\\/users\\/activate\\/21543181\\">ACTIVATE<\\/a>"}}', NULL, NULL, '2018-01-05 12:19:25', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Table structure for table `queue_phinxlog`
--

CREATE TABLE `queue_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `queue_phinxlog`
--

INSERT INTO `queue_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20150425180802, 'Init', '2017-11-21 12:49:45', '2017-11-21 12:49:45', 0),
(20150511062806, 'Fixmissing', '2017-11-21 12:49:45', '2017-11-21 12:49:45', 0),
(20150911132343, 'ImprovementsForMysql', '2017-11-21 12:49:45', '2017-11-21 12:49:46', 0),
(20161319000000, 'IncreaseDataSize', '2017-11-21 12:49:46', '2017-11-21 12:49:47', 0),
(20161319000001, 'Priority', '2017-11-21 12:49:47', '2017-11-21 12:49:47', 0),
(20161319000002, 'Rename', '2017-11-21 12:49:47', '2017-11-21 12:49:47', 0),
(20161319000003, 'Processes', '2017-11-21 12:49:47', '2017-11-21 12:49:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `queue_processes`
--

CREATE TABLE `queue_processes` (
  `id` int(11) NOT NULL,
  `pid` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `queue_processes`
--

INSERT INTO `queue_processes` (`id`, `pid`, `created`, `modified`) VALUES
(1, '30782', '2017-11-22 08:30:48', '2017-11-22 08:31:38'),
(2, '4075', '2017-11-22 11:11:24', '2017-11-22 11:11:24'),
(3, '4156', '2017-11-22 11:13:44', '2017-11-22 11:13:44'),
(4, '4244', '2017-11-22 11:16:03', '2017-11-22 11:16:14'),
(6, '4307', '2017-11-22 11:17:55', '2017-11-22 11:17:55'),
(7, '4709', '2017-11-22 11:29:45', '2017-11-22 11:29:45'),
(8, '4884', '2017-11-22 11:34:59', '2017-11-22 11:35:10'),
(10, '13361', '2017-11-22 13:30:45', '2017-11-22 13:31:21'),
(11, '14048', '2017-11-22 13:47:54', '2017-11-22 13:48:17'),
(12, '14421', '2017-11-22 13:55:31', '2017-11-22 13:55:41'),
(14, '22091', '2017-11-22 17:08:28', '2017-11-22 17:08:38'),
(15, '22594', '2017-11-22 17:22:46', '2017-11-22 17:22:46'),
(16, '22682', '2017-11-22 17:24:13', '2017-11-22 17:24:13'),
(17, '22695', '2017-11-22 17:24:55', '2017-11-22 17:25:05'),
(18, '22811', '2017-11-22 17:27:15', '2017-11-22 17:27:15'),
(19, '22886', '2017-11-22 17:29:54', '2017-11-22 17:29:54'),
(20, '22919', '2017-11-22 17:30:15', '2017-11-22 17:30:26'),
(21, '22965', '2017-11-22 17:31:28', '2017-11-22 17:31:46'),
(22, '23159', '2017-11-22 17:36:03', '2017-11-22 17:36:20'),
(23, '1430', '2017-11-22 22:17:09', '2017-11-22 22:17:14'),
(24, '3492', '2017-11-22 22:53:02', '2017-11-22 22:53:12'),
(25, '18398', '2017-12-06 00:21:12', '2017-12-06 00:21:20'),
(28, '19290', '2017-12-06 00:44:46', '2017-12-06 00:45:02'),
(29, '19410', '2017-12-06 00:46:15', '2017-12-06 00:46:52'),
(31, '19674', '2017-12-06 00:52:16', '2017-12-06 00:52:35'),
(35, '20372', '2017-12-06 01:05:15', '2017-12-06 01:05:30'),
(36, '20461', '2017-12-06 01:06:26', '2017-12-06 01:07:01'),
(38, '21408', '2017-12-06 01:28:03', '2017-12-06 01:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `category` varchar(55) DEFAULT NULL,
  `model` varchar(40) DEFAULT NULL,
  `comments` text,
  `literature_review` text,
  `references_text` text,
  `file` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `foreign_key`, `category`, `model`, `comments`, `literature_review`, `references_text`, `file`, `dir`, `size`, `type`, `created`, `modified`) VALUES
(1, 2, 3, 'causality', 'Sadrs', 'Some clever comments here', 'literature review text', 'To finish off with reference text here...', NULL, NULL, NULL, NULL, '2017-12-13 15:18:02', '2017-12-13 15:18:02'),
(2, 2, 3, NULL, 'Sadrs', 'by the same manager', 'A second literature review', 'with slightly different text', NULL, NULL, NULL, NULL, '2017-12-13 15:45:03', '2017-12-13 15:45:03'),
(3, 2, 3, 'committee', 'Sadrs', 'These will be visible only to internal MCAZ', 'but these will be visible to the public', NULL, NULL, NULL, NULL, NULL, '2017-12-16 17:12:33', '2017-12-16 17:12:33'),
(4, 2, 3, 'committee', 'Sadrs', 'I wish to', 'upload a file', NULL, 'success-login-username.png', 'webroot/files/Committees/file/', '37789', 'image/png', '2017-12-16 17:23:10', '2017-12-16 17:23:10'),
(5, 2, 2, 'committee', 'Aefis', 'tumeamua', 'ku approve', NULL, 'updater.png', 'webroot/files/Committees/file/', '4030', 'image/png', '2017-12-18 01:07:07', '2017-12-18 01:07:07'),
(6, 2, 1, 'causality', 'Saefis', 'b', 'a', 'c', NULL, NULL, NULL, NULL, '2017-12-18 20:29:56', '2017-12-18 20:29:56'),
(7, 2, 1, 'committee', 'Saefis', 'Is it possible that this one', 'saves without intevention??', NULL, 'IMG_0228.JPG', 'webroot/files/Committees/file/', '2381600', 'image/jpeg', '2017-12-18 21:05:32', '2017-12-18 21:05:32'),
(8, 2, 1, 'causality', 'Adrs', 'yebi me sak', 'sadou makambo', 'basi na bango', NULL, NULL, NULL, NULL, '2017-12-18 23:59:08', '2017-12-18 23:59:08'),
(9, 2, 1, 'committee', 'Adrs', 'pe perreee', 'peee', NULL, 'IMG_0179.JPG', 'webroot/files/Committees/file/', '1993181', 'image/jpeg', '2017-12-19 00:01:19', '2017-12-19 00:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `icsr_code` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `value`, `name`, `icsr_code`, `created`, `modified`) VALUES
(2, 'oral', 'oral', '048', NULL, NULL),
(3, 'intravenous drip', 'intravenous drip', '041', NULL, NULL),
(4, 'intravenous bolus', 'intravenous bolus', '040', NULL, NULL),
(5, 'subcutaneous', 'subcutaneous', '058', NULL, NULL),
(6, 'nasal', 'nasal', '045', NULL, NULL),
(7, 'sublingual', 'sublingual', '060', NULL, NULL),
(8, 'topical', 'topical', '061', NULL, NULL),
(9, 'rectal', 'rectal', '054', NULL, NULL),
(10, 'intra-articular', 'intra-articular', '014', NULL, NULL),
(11, 'intrathecal', 'intrathecal', '037', NULL, NULL),
(12, 'intra-arterial', 'intra-arterial', '013', NULL, NULL),
(13, 'auricular (otic)', 'auricular (otic)', '001', NULL, NULL),
(14, 'buccal', 'buccal', '002', NULL, NULL),
(15, 'cutaneous', 'cutaneous', '003', NULL, NULL),
(16, 'dental', 'dental', '004', NULL, NULL),
(17, 'endocervical', 'endocervical', '005', NULL, NULL),
(18, 'endosinusial', 'endosinusial', '006', NULL, NULL),
(19, 'endotracheal', 'endotracheal', '007', NULL, NULL),
(20, 'epidural', 'epidural', '008', NULL, NULL),
(21, 'extra-amniotic', 'extra-amniotic', '009', NULL, NULL),
(22, 'hemodialysis', 'hemodialysis', '010', NULL, NULL),
(23, 'intra corpus cavernosum', 'intra corpus cavernosum', '011', NULL, NULL),
(24, 'intra-amniotic', 'intra-amniotic', '012', NULL, NULL),
(25, 'intracardiac', 'intracardiac', '016', NULL, NULL),
(26, 'intracavernous', 'intracavernous', '017', NULL, NULL),
(27, 'intracerebral', 'intracerebral', '018', NULL, NULL),
(28, 'intracervical', 'intracervical', '019', NULL, NULL),
(29, 'intracisternal', 'intracisternal', '020', NULL, NULL),
(30, 'intracorneal', 'intracorneal', '021', NULL, NULL),
(31, 'intracoronary', 'intracoronary', '022', NULL, NULL),
(32, 'intradermal', 'intradermal', '023', NULL, NULL),
(33, 'intradiscal (intraspinal)', 'intradiscal (intraspinal)', '024', NULL, NULL),
(34, 'intrahepatic', 'intrahepatic', '025', NULL, NULL),
(35, 'intralesional', 'intralesional', '026', NULL, NULL),
(36, 'intralymphatic', 'intralymphatic', '027', NULL, NULL),
(37, 'intramedullar (bone marrow)', 'intramedullar (bone marrow)', '028', NULL, NULL),
(38, 'intrameningeal', 'intrameningeal', '029', NULL, NULL),
(39, 'intramuscular', 'intramuscular', '030', NULL, NULL),
(40, 'intraocular', 'intraocular', '031', NULL, NULL),
(41, 'intrapericardial', 'intrapericardial', '032', NULL, NULL),
(42, 'intraperitoneal', 'intraperitoneal', '033', NULL, NULL),
(43, 'intrapleural', 'intrapleural', '034', NULL, NULL),
(44, 'intrasynovial', 'intrasynovial', '035', NULL, NULL),
(45, 'intrathoracic', 'intrathoracic', '038', NULL, NULL),
(46, 'intratracheal', 'intratracheal', '039', NULL, NULL),
(47, 'intratumor', 'intratumor', '036', NULL, NULL),
(48, 'intra-uterine', 'intra-uterine', '015', NULL, NULL),
(49, 'intravenous (nos)', 'intravenous (nos)', '042', NULL, NULL),
(50, 'intravesical', 'intravesical', '043', NULL, NULL),
(51, 'iontophoresis', 'iontophoresis', '044', NULL, NULL),
(52, 'occlusive dressing technique', 'occlusive dressing technique', '046', NULL, NULL),
(53, 'ophthalmic', 'ophthalmic', '047', NULL, NULL),
(54, 'oropharingeal', 'oropharingeal', '049', NULL, NULL),
(55, 'other', 'other', '050', NULL, NULL),
(56, 'parenteral', 'parenteral', '051', NULL, NULL),
(57, 'periarticular', 'periarticular', '052', NULL, NULL),
(58, 'perineural', 'perineural', '053', NULL, NULL),
(59, 'respiratory (inhalation)', 'respiratory (inhalation)', '055', NULL, NULL),
(60, 'retrobulbar', 'retrobulbar', '056', NULL, NULL),
(61, 'subdermal', 'subdermal', '059', NULL, NULL),
(62, 'sunconjunctival', 'sunconjunctival', '057', NULL, NULL),
(63, 'transdermal', 'transdermal', '062', NULL, NULL),
(64, 'transmammary', 'transmammary', '063', NULL, NULL),
(65, 'transplacental', 'transplacental', '064', NULL, NULL),
(66, 'unknown', 'unknown', '065', NULL, NULL),
(67, 'urethral', 'urethral', '066', NULL, NULL),
(68, 'vaginal', 'vaginal', '067', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sadrs`
--

CREATE TABLE `sadrs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sadr_id` int(11) DEFAULT NULL,
  `messageid` varchar(255) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `assigned_date` datetime DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `report_type` varchar(20) DEFAULT NULL,
  `name_of_institution` varchar(100) DEFAULT NULL,
  `institution_code` varchar(100) DEFAULT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `institution_address` varchar(255) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `ip_no` varchar(100) DEFAULT NULL,
  `date_of_birth` varchar(20) DEFAULT NULL,
  `age_group` varchar(40) DEFAULT NULL,
  `gender` varchar(7) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `date_of_onset_of_reaction` varchar(20) DEFAULT NULL,
  `date_of_end_of_reaction` varchar(20) DEFAULT NULL,
  `duration_type` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `description_of_reaction` text,
  `severity` varchar(100) DEFAULT NULL,
  `severity_reason` varchar(255) DEFAULT NULL,
  `medical_history` text,
  `past_drug_therapy` text,
  `outcome` varchar(100) DEFAULT NULL,
  `lab_test_results` text,
  `reporter_name` varchar(100) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `reporter_phone` varchar(100) DEFAULT NULL,
  `submitted` tinyint(2) DEFAULT '0',
  `submitted_date` datetime DEFAULT NULL,
  `action_taken` varchar(255) DEFAULT NULL,
  `relatedness` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'UnSubmitted',
  `emails` tinyint(2) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `device` tinyint(2) DEFAULT '0',
  `notified` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sadrs`
--

INSERT INTO `sadrs` (`id`, `user_id`, `sadr_id`, `messageid`, `assigned_to`, `assigned_by`, `assigned_date`, `province_id`, `reference_number`, `designation_id`, `report_type`, `name_of_institution`, `institution_code`, `institution_name`, `institution_address`, `patient_name`, `ip_no`, `date_of_birth`, `age_group`, `gender`, `weight`, `height`, `date_of_onset_of_reaction`, `date_of_end_of_reaction`, `duration_type`, `duration`, `description_of_reaction`, `severity`, `severity_reason`, `medical_history`, `past_drug_therapy`, `outcome`, `lab_test_results`, `reporter_name`, `reporter_email`, `reporter_phone`, `submitted`, `submitted_date`, `action_taken`, `relatedness`, `status`, `emails`, `active`, `device`, `notified`, `created`, `modified`, `deleted`) VALUES
(3, 3, NULL, '555644', 11, 2, NULL, NULL, 'ADR3/2017', 2, NULL, 'Kenyatta National Hospital', '00125', NULL, NULL, 'A.O', '258', '-02-1993', 'child', 'Male', '75', '2.1', '15-12-2004', '04-02-2010', 'Hours', '3', 'Sick', 'Yes', 'Life-threatening', 'has been sickly\r\n', 'dawa\r\n', 'Not yet recovered', 'black stool', 'Edward', 'eddieokemwa@gmail.com', '0729932475', 2, NULL, '', '', 'FollowUp', 0, 1, 0, 0, '2017-11-06 06:59:23', '2017-12-23 19:06:33', NULL),
(25, 3, NULL, '555655', 11, 2, '2017-12-12 22:08:50', NULL, 'ADR25/2017', NULL, NULL, '', '', NULL, NULL, 'Justin', '', '--2017', '', '', '', '', '--', '--', NULL, NULL, '', '', '', '', '', '', '', '', 'fmutunga@safaricom.co.ke', '', 2, NULL, '', '', 'Assigned', 0, 1, 0, 0, '2017-11-07 00:53:10', '2017-12-12 22:08:50', NULL),
(26, 1, NULL, '', NULL, NULL, NULL, NULL, 'ADR26/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eddieokemwa@gmail.com', NULL, 0, NULL, '', '', 'UnSubmitted', 0, 1, 0, 0, '2017-11-09 07:45:08', '2017-11-09 07:45:08', NULL),
(27, 3, NULL, '', NULL, NULL, NULL, NULL, 'ADR27/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eddieokemwa@gmail.com', NULL, 0, NULL, '', '', 'UnSubmitted', 0, 1, 0, 0, '2017-11-09 10:41:42', '2017-11-09 10:41:42', '2018-01-07 12:54:26'),
(28, 3, NULL, '', NULL, NULL, NULL, 4, 'ADR28/2017', 2, NULL, 'Mashongwe', 'ZW040247', 'Mashongwe', '', 'A.O', '', '--', '', 'Male', '', '', '02-02-2016', '--', NULL, NULL, 'asfdsadf', 'Yes', '', '', '', 'Recovering', '', 'Edward', 'eddieokemwa@gmail.com', '254729932475', 1, NULL, 'Dose increased', 'Possible', 'UnSubmitted', 0, 1, 0, 0, '2017-11-09 10:43:38', '2018-01-01 12:57:02', NULL),
(29, 3, NULL, '', 12, 2, '2017-12-12 00:00:00', 2, 'ADR29/2017', 2, NULL, 'This one should be removed', 'but more', NULL, NULL, 'j', 'importantly', '14-11-2017', '', 'Female', '55', '', '14-11-2017', '01-12-2017', NULL, NULL, 'asfa', 'No', 'Death', 'This will be some long text that`', 'can later be \r\nremoved\r\nor even translated', 'Recovered', 'Another successful one from crater automobiles', 'Edward', 'eddieokemwa@gmail.com', '254729932475', 2, '2017-12-12 08:08:45', 'Drug withdrawn', 'Conditional / Unclassified', 'FollowUp', 0, 1, 0, 0, '2017-11-14 07:57:48', '2017-12-15 15:11:03', NULL),
(53, NULL, NULL, '', 11, 2, '2017-12-18 00:21:40', NULL, 'ADR53/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Edward', 'fmutunga@safaricom.co.ke', NULL, 2, NULL, NULL, NULL, 'Archived', 0, 1, 0, 0, '2017-12-08 17:15:29', '2017-12-18 01:04:02', NULL),
(54, NULL, NULL, '', NULL, NULL, NULL, NULL, 'ADR54/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Edward', 'fmutunga@safaricom.co.ke', NULL, 0, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2017-12-08 17:17:03', '2017-12-08 17:17:03', '2018-01-07 21:56:44'),
(55, NULL, NULL, '', NULL, NULL, NULL, NULL, 'ADR55/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Edward', 'fmutunga@safaricom.co.ke', NULL, 0, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2017-12-08 17:25:15', '2017-12-08 17:25:15', NULL),
(56, NULL, NULL, '', NULL, NULL, NULL, NULL, 'ADR56/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Edward', 'fmutunga@safaricom.co.ke', NULL, 0, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2017-12-08 17:26:07', '2017-12-08 17:26:07', NULL),
(57, NULL, NULL, '', NULL, NULL, NULL, NULL, 'ADR57/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Edward', 'fmutunga@safaricom.co.ke', NULL, 0, NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2017-12-08 17:27:52', '2017-12-08 17:27:52', NULL),
(58, NULL, 29, '', NULL, NULL, NULL, NULL, NULL, NULL, 'FollowUp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03-04-2011', '03-02-2014', NULL, NULL, NULL, 'No', 'Life-threatening', 'Some other important text', 'and other yet', NULL, 'without fail', NULL, NULL, NULL, 2, '2017-12-15 12:43:45', NULL, NULL, NULL, 0, 1, 0, 0, '2017-12-15 11:56:06', '2017-12-15 12:43:45', NULL),
(59, NULL, 29, '', NULL, NULL, NULL, NULL, NULL, NULL, 'FollowUp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '--', '--', NULL, NULL, 'Just add this one item... nothing more and save changes', '', '', '', '', NULL, '', NULL, NULL, NULL, 2, '2017-12-15 13:44:32', NULL, NULL, NULL, 0, 1, 0, 0, '2017-12-15 13:25:22', '2017-12-15 13:44:32', NULL),
(60, NULL, 29, '', NULL, NULL, NULL, NULL, NULL, NULL, 'FollowUp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15-12-2017', '15-12-2017', NULL, NULL, '', '', '', '', '', NULL, '', NULL, NULL, NULL, 2, '2017-12-15 15:11:03', NULL, NULL, NULL, 0, 1, 0, 0, '2017-12-15 15:07:06', '2017-12-15 15:11:03', NULL),
(61, NULL, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, 'FollowUp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A folow up description of the reaction', NULL, NULL, 'Medical History follow up', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2017-12-18 01:43:24', NULL, NULL, 'UnSubmitted', 0, 1, 0, 0, '2017-12-18 01:43:24', '2017-12-18 01:43:24', NULL),
(62, NULL, 3, '', NULL, NULL, NULL, NULL, NULL, NULL, 'FollowUp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A folow up description of the reaction', NULL, NULL, 'Medical History follow up', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2017-12-18 01:45:08', NULL, NULL, 'UnSubmitted', 0, 1, 0, 0, '2017-12-18 01:45:08', '2017-12-18 01:45:08', NULL),
(64, 14, NULL, '', NULL, NULL, NULL, 1, 'ADR64/2017', NULL, NULL, NULL, '', NULL, NULL, 'af', '', '--2013', NULL, 'Male', '', '', '--2017', '--', NULL, NULL, 'asfda', 'Yes', 'Disabling', '', '', 'Recovering', '', 'Edward', 'fmutunga@safaricom.co.ke', '', 1, NULL, '', '', 'UnSubmitted', 0, 1, 0, 0, '2017-12-21 16:36:53', '2017-12-21 16:47:36', NULL),
(65, 16, NULL, NULL, NULL, NULL, NULL, NULL, 'ADR65/2018', NULL, NULL, 'bu Bulawayo Maternal Health Clinic', 'ZW090A21', 'bu Bulawayo Maternal Health Clinic', 'kazi moto', 'Justin', '', '', '', 'Male', '', '', '', '', NULL, NULL, 'ii', 'Yes', '', '', '', 'Recovered', '', 'reporter', 'eddyokemwa@gmail.com', '0729932475', 1, NULL, '', '', 'UnSubmitted', 0, 1, 0, 0, '2018-01-03 01:49:22', '2018-01-05 01:59:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sadr_followups`
--

CREATE TABLE `sadr_followups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `sadr_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `description_of_reaction` text,
  `outcome` varchar(100) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `reporter_phone` varchar(100) DEFAULT NULL,
  `submitted` tinyint(2) DEFAULT '0',
  `emails` tinyint(2) DEFAULT '0',
  `active` tinyint(1) DEFAULT '1',
  `device` tinyint(2) DEFAULT '0',
  `notified` tinyint(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `sadr_list_of_drugs`
--

CREATE TABLE `sadr_list_of_drugs` (
  `id` int(11) NOT NULL,
  `sadr_id` int(11) DEFAULT NULL,
  `sadr_followup_id` int(11) DEFAULT NULL,
  `dose_id` int(11) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  `frequency_id` int(11) DEFAULT NULL,
  `drug_name` varchar(100) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `batch_number` varchar(255) DEFAULT NULL,
  `dose` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `stop_date` date DEFAULT NULL,
  `indication` varchar(100) DEFAULT NULL,
  `suspected_drug` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sadr_list_of_drugs`
--

INSERT INTO `sadr_list_of_drugs` (`id`, `sadr_id`, `sadr_followup_id`, `dose_id`, `route_id`, `frequency_id`, `drug_name`, `brand_name`, `batch_number`, `dose`, `start_date`, `stop_date`, `indication`, `suspected_drug`, `created`, `modified`) VALUES
(1, 3, NULL, 3, 3, 2, 'Panadol', 'dawa', '22', '2', '2008-06-02', '2015-06-17', 'sss', '1', '2017-11-06 11:06:44', '2017-11-07 21:26:34'),
(3, 6, NULL, NULL, NULL, NULL, '', '', '', '', '2017-11-06', '2017-11-06', '', '0', '2017-11-06 22:20:45', '2017-11-06 22:20:45'),
(4, 6, NULL, NULL, NULL, NULL, '', '', '', '', '2017-11-06', '2017-11-06', '', '0', '2017-11-06 22:20:45', '2017-11-06 22:20:45'),
(12, 3, NULL, 2, 5, 5, 'Panadol', 'dawa', '22', '2', '2017-12-01', '2017-12-09', 'sss', '1', '2017-11-09 10:43:49', '2017-12-12 08:43:41'),
(14, 25, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, '', '0', '2017-11-14 08:56:49', '2017-11-14 08:56:49'),
(15, 29, NULL, 3, 5, 4, 'Actol', 'dawa', '22', '2', '2017-12-01', '2017-12-01', 'sss', '1', '2017-11-14 09:02:22', '2017-12-11 17:49:13'),
(16, 42, NULL, 7, 4, 4, 'wwqq', 'dawa', NULL, '1', '2017-10-01', '2017-10-21', '1', '', '2017-12-05 18:33:14', '2017-12-05 18:33:14'),
(17, 43, NULL, 7, 4, 4, 'wwqq', 'dawa', NULL, NULL, '2017-10-01', '2017-10-21', '1', '', '2017-12-05 18:38:54', '2017-12-05 18:38:54'),
(18, 44, NULL, 7, 4, 4, 'wwqq', 'dawa', NULL, NULL, '2017-10-01', '2017-10-21', '1', '', '2017-12-05 18:39:37', '2017-12-05 18:39:37'),
(19, 45, NULL, 7, 4, 4, 'wwqq', 'dawa', NULL, '1', '2017-10-01', '2017-10-21', '1', '', '2017-12-05 18:43:28', '2017-12-05 18:43:28'),
(20, 46, NULL, 7, 4, 4, 'wwqq', 'dawa', NULL, '1', '2017-10-01', '2017-10-21', '1', '', '2017-12-05 18:46:38', '2017-12-05 18:46:38'),
(21, 47, NULL, 7, 4, 4, 'wwqq', 'dawa', NULL, '1', '2017-10-01', '2017-10-21', '1', '', '2017-12-05 18:47:08', '2017-12-05 18:47:08'),
(22, 48, NULL, 7, 4, 4, 'wwqq', 'dawa', NULL, '1', '2017-10-01', '2017-10-21', '1', '', '2017-12-05 18:49:07', '2017-12-05 18:49:07'),
(23, 49, NULL, 7, 4, 4, 'wwqq', 'dawa', NULL, '1', '2017-10-01', '2017-10-21', '1', '', '2017-12-05 18:50:17', '2017-12-05 18:50:17'),
(24, 50, NULL, 7, 4, 4, 'wwqq', 'dawa', NULL, '1', '2017-10-01', '2017-10-21', '1', '', '2017-12-05 18:52:12', '2017-12-05 18:52:12'),
(25, 51, NULL, 7, 4, 4, 'wwqq', 'dawa', NULL, '1', '2017-10-01', '2017-10-21', '1', '', '2017-12-05 18:56:43', '2017-12-05 18:56:43'),
(27, 29, NULL, 4, 4, 8, 'Panadol', 'washer', 'okumu', '33', '2017-11-01', '2017-11-09', 'sickllll', '0', '2017-12-12 08:00:05', '2017-12-12 08:00:05'),
(28, 29, NULL, 16, 18, 8, 'Galaxy', 'kibera', '01', '2', '2017-12-01', '2017-12-12', 'dd', '0', '2017-12-12 08:00:05', '2017-12-12 08:03:42'),
(29, 28, NULL, 6, 5, 3, 'Panadol', 'Panadol', 'okumu', '33', '2017-12-01', '2017-12-05', 'sickllll', '0', '2017-12-12 08:43:41', '2018-01-01 12:54:12'),
(30, 58, NULL, 3, 3, 4, 'drug 1', 'brand 1', '1', '2', '2017-12-01', '2017-12-05', 'sss', '0', '2017-12-15 11:56:06', '2017-12-15 12:11:07'),
(31, 58, NULL, 4, 5, 5, 'drug 2 ', 'brand 2', '2 ', '3', '2017-12-01', '2017-12-05', 'sicklll', '0', '2017-12-15 11:56:06', '2017-12-15 12:11:07'),
(36, 60, NULL, 3, 4, 3, 'jamo', 'patty', '2', '2', '2017-12-01', '2017-11-07', 'sss', '0', '2017-12-15 15:10:35', '2017-12-15 15:11:03'),
(37, 28, NULL, NULL, 4, NULL, 'Day & night cold & flu', 'Bromhexine hydrochloride', '', '', NULL, NULL, '', '0', '2018-01-01 12:56:42', '2018-01-01 12:57:02'),
(38, 65, NULL, NULL, NULL, NULL, 'swese', '', '', '', NULL, NULL, '', '0', '2018-01-05 01:59:18', '2018-01-05 01:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `sadr_other_drugs`
--

CREATE TABLE `sadr_other_drugs` (
  `id` int(11) NOT NULL,
  `sadr_id` int(11) DEFAULT NULL,
  `drug_name` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `stop_date` date DEFAULT NULL,
  `suspected_drug` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sadr_other_drugs`
--

INSERT INTO `sadr_other_drugs` (`id`, `sadr_id`, `drug_name`, `start_date`, `stop_date`, `suspected_drug`, `created`, `modified`) VALUES
(1, 3, 'Miti ni dawa', '2017-01-06', '2017-02-06', '1', '2017-11-06 11:22:31', '2017-11-08 20:38:09'),
(3, 6, '', '2017-11-06', '2017-11-06', '0', '2017-11-06 22:20:45', '2017-11-06 22:20:45'),
(4, 6, '', '2017-11-06', '2017-11-06', '0', '2017-11-06 22:20:45', '2017-11-06 22:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `saefis`
--

CREATE TABLE `saefis` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `saefi_id` int(11) DEFAULT NULL,
  `reference_number` varchar(50) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `assigned_by` int(11) DEFAULT NULL,
  `assigned_date` datetime DEFAULT NULL,
  `basic_details` text,
  `place_vaccination` varchar(101) DEFAULT NULL,
  `place_vaccination_other` varchar(250) DEFAULT NULL,
  `site_type` varchar(100) DEFAULT NULL,
  `site_type_other` varchar(100) DEFAULT NULL,
  `vaccination_in` varchar(100) DEFAULT NULL,
  `vaccination_in_other` varchar(255) DEFAULT NULL,
  `reporter_name` varchar(255) DEFAULT NULL,
  `report_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `complete_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `telephone` varchar(40) DEFAULT NULL,
  `mobile` varchar(40) DEFAULT NULL,
  `reporter_email` varchar(100) DEFAULT NULL,
  `patient_name` varchar(200) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `hospitalization_date` date DEFAULT NULL,
  `status_on_date` varchar(255) DEFAULT NULL,
  `died_date` datetime DEFAULT NULL,
  `autopsy_done` varchar(40) DEFAULT NULL,
  `autopsy_done_date` date DEFAULT NULL,
  `autopsy_planned` varchar(55) DEFAULT NULL,
  `autopsy_planned_date` datetime DEFAULT NULL,
  `past_history` varchar(55) DEFAULT NULL,
  `past_history_remarks` text,
  `adverse_event` varchar(100) DEFAULT NULL,
  `adverse_event_remarks` text,
  `allergy_history` varchar(100) DEFAULT NULL,
  `allergy_history_remarks` text,
  `existing_illness` varchar(100) DEFAULT NULL,
  `existing_illness_remarks` text,
  `hospitalization_history` varchar(100) DEFAULT NULL,
  `hospitalization_history_remarks` text,
  `medication_vaccination` varchar(100) DEFAULT NULL,
  `medication_vaccination_remarks` text,
  `faith_healers` varchar(100) DEFAULT NULL,
  `faith_healers_remarks` text,
  `family_history` varchar(100) DEFAULT NULL,
  `family_history_remarks` text,
  `pregnant` varchar(100) DEFAULT NULL,
  `pregnant_weeks` varchar(50) DEFAULT NULL,
  `breastfeeding` varchar(100) DEFAULT NULL,
  `infant` varchar(100) DEFAULT NULL,
  `birth_weight` int(10) DEFAULT NULL,
  `delivery_procedure` varchar(205) DEFAULT NULL,
  `delivery_procedure_specify` text,
  `source_examination` tinyint(1) DEFAULT NULL,
  `source_documents` tinyint(1) DEFAULT NULL,
  `source_verbal` tinyint(1) DEFAULT NULL,
  `verbal_source` text,
  `source_other` tinyint(1) DEFAULT NULL,
  `source_other_specify` text,
  `examiner_name` varchar(205) DEFAULT NULL,
  `other_sources` text,
  `signs_symptoms` text,
  `person_details` varchar(255) DEFAULT NULL,
  `person_designation` varchar(205) DEFAULT NULL,
  `person_date` datetime DEFAULT NULL,
  `medical_care` text,
  `not_medical_care` text,
  `final_diagnosis` text,
  `when_vaccinated` varchar(255) DEFAULT NULL,
  `when_vaccinated_specify` text,
  `prescribing_error` varchar(255) DEFAULT NULL,
  `prescribing_error_specify` text,
  `vaccine_unsterile` varchar(255) DEFAULT NULL,
  `vaccine_unsterile_specify` text,
  `vaccine_condition` varchar(255) DEFAULT NULL,
  `vaccine_condition_specify` text,
  `vaccine_reconstitution` varchar(255) DEFAULT NULL,
  `vaccine_reconstitution_specify` text,
  `vaccine_handling` varchar(255) DEFAULT NULL,
  `vaccine_handling_specify` text,
  `vaccine_administered` varchar(255) DEFAULT NULL,
  `vaccine_administered_specify` text,
  `vaccinated_vial` int(11) DEFAULT NULL,
  `vaccinated_session` int(11) DEFAULT NULL,
  `vaccinated_locations` int(11) DEFAULT NULL,
  `vaccinated_locations_specify` text,
  `vaccinated_cluster` varchar(255) DEFAULT NULL,
  `vaccinated_cluster_number` int(11) DEFAULT NULL,
  `vaccinated_cluster_vial` varchar(255) DEFAULT NULL,
  `vaccinated_cluster_vial_number` int(11) DEFAULT NULL,
  `syringes_used` varchar(255) DEFAULT NULL,
  `syringes_used_specify` varchar(255) DEFAULT NULL,
  `syringes_used_other` varchar(255) DEFAULT NULL,
  `syringes_used_findings` text,
  `reconstitution_multiple` varchar(55) DEFAULT NULL,
  `reconstitution_different` varchar(55) DEFAULT NULL,
  `reconstitution_vial` varchar(55) DEFAULT NULL,
  `reconstitution_syringe` varchar(55) DEFAULT NULL,
  `reconstitution_vaccines` varchar(55) DEFAULT NULL,
  `reconstitution_observations` text,
  `cold_temperature` varchar(55) DEFAULT NULL,
  `cold_temperature_deviation` varchar(55) DEFAULT NULL,
  `cold_temperature_specify` text,
  `procedure_followed` varchar(55) DEFAULT NULL,
  `other_items` varchar(55) DEFAULT NULL,
  `partial_vaccines` varchar(55) DEFAULT NULL,
  `unusable_vaccines` varchar(55) DEFAULT NULL,
  `unusable_diluents` varchar(55) DEFAULT NULL,
  `additional_observations` text,
  `cold_transportation` varchar(55) DEFAULT NULL,
  `vaccine_carrier` varchar(55) DEFAULT NULL,
  `coolant_packs` varchar(55) DEFAULT NULL,
  `transport_findings` text,
  `similar_events` varchar(55) DEFAULT NULL,
  `similar_events_describe` text,
  `similar_events_episodes` int(11) DEFAULT NULL,
  `affected_vaccinated` int(11) DEFAULT NULL,
  `affected_not_vaccinated` int(11) DEFAULT NULL,
  `affected_unknown` varchar(255) DEFAULT NULL,
  `community_comments` text,
  `relevant_findings` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `submitted` int(2) NOT NULL DEFAULT '0',
  `submitted_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT 'UnSubmitted',
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saefis`
--

INSERT INTO `saefis` (`id`, `user_id`, `saefi_id`, `reference_number`, `assigned_to`, `assigned_by`, `assigned_date`, `basic_details`, `place_vaccination`, `place_vaccination_other`, `site_type`, `site_type_other`, `vaccination_in`, `vaccination_in_other`, `reporter_name`, `report_date`, `start_date`, `complete_date`, `designation_id`, `telephone`, `mobile`, `reporter_email`, `patient_name`, `gender`, `hospitalization_date`, `status_on_date`, `died_date`, `autopsy_done`, `autopsy_done_date`, `autopsy_planned`, `autopsy_planned_date`, `past_history`, `past_history_remarks`, `adverse_event`, `adverse_event_remarks`, `allergy_history`, `allergy_history_remarks`, `existing_illness`, `existing_illness_remarks`, `hospitalization_history`, `hospitalization_history_remarks`, `medication_vaccination`, `medication_vaccination_remarks`, `faith_healers`, `faith_healers_remarks`, `family_history`, `family_history_remarks`, `pregnant`, `pregnant_weeks`, `breastfeeding`, `infant`, `birth_weight`, `delivery_procedure`, `delivery_procedure_specify`, `source_examination`, `source_documents`, `source_verbal`, `verbal_source`, `source_other`, `source_other_specify`, `examiner_name`, `other_sources`, `signs_symptoms`, `person_details`, `person_designation`, `person_date`, `medical_care`, `not_medical_care`, `final_diagnosis`, `when_vaccinated`, `when_vaccinated_specify`, `prescribing_error`, `prescribing_error_specify`, `vaccine_unsterile`, `vaccine_unsterile_specify`, `vaccine_condition`, `vaccine_condition_specify`, `vaccine_reconstitution`, `vaccine_reconstitution_specify`, `vaccine_handling`, `vaccine_handling_specify`, `vaccine_administered`, `vaccine_administered_specify`, `vaccinated_vial`, `vaccinated_session`, `vaccinated_locations`, `vaccinated_locations_specify`, `vaccinated_cluster`, `vaccinated_cluster_number`, `vaccinated_cluster_vial`, `vaccinated_cluster_vial_number`, `syringes_used`, `syringes_used_specify`, `syringes_used_other`, `syringes_used_findings`, `reconstitution_multiple`, `reconstitution_different`, `reconstitution_vial`, `reconstitution_syringe`, `reconstitution_vaccines`, `reconstitution_observations`, `cold_temperature`, `cold_temperature_deviation`, `cold_temperature_specify`, `procedure_followed`, `other_items`, `partial_vaccines`, `unusable_vaccines`, `unusable_diluents`, `additional_observations`, `cold_transportation`, `vaccine_carrier`, `coolant_packs`, `transport_findings`, `similar_events`, `similar_events_describe`, `similar_events_episodes`, `affected_vaccinated`, `affected_not_vaccinated`, `affected_unknown`, `community_comments`, `relevant_findings`, `created`, `modified`, `submitted`, `submitted_date`, `status`, `deleted`) VALUES
(1, 3, NULL, 'SAEFI1/2017', 11, 2, '2017-12-18 20:06:24', 'Mbezik details', 'Private health facility', 'Medic', 'Outreach', 'sina makosa', 'Other', 'hasIira', 'Gi', '2017-12-01', '2017-12-02', '2017-12-03', 2, '2034fpw', '0412555A5S', 'eddieokemwa@gmail.com', 'Impeached', 'Male', '2017-12-04', 'Recovering', '2012-12-07 10:35:00', 'Yes', '2017-12-12', 'No', NULL, 'Yes', 'remark1', 'No', 're', 'Unknown', 'asdf', 'Yes', 'as sdf', 'Yes', 'asf ', 'Unknown', 'af ', 'No', 'sdf as', 'Yes', 'asfd af', 'No', '3', 'Yes', 'post-term', 8, 'Caesarean', 'Hakuna', 0, 1, 1, 'verbal autopsy', 1, 'None to specify', 'Joshua', 'no other sources', 'No other symptoms', 'Ndifu', 'kababa', NULL, 'safa', 'asfasdf', 'Hakuna matata', '', 'AFASF', 'Yes', '2', 'No', 'AF', 'Unable to assess', 'FA', 'Unable to assess', 'DF', 'Yes', 'ASD', 'No', 'ASFD', 0, -3, 74, 'ASF', 'No', -1, 'Yes', 2, 'Yes', 'Disposable', 'SAFA', '2FASD', 'No', 'Yes', 'Yes', 'No', 'Yes', 'ASF', 'Yes', 'No', 'sdfad', 'No', 'Unknown', 'Yes', 'No', 'Unknown', 'ASFAS', 'Yes', 'No', 'Unknown', 'asfsadf', 'No', 'ASF', 2, 234, NULL, '4', '2324', 'ASFAS', '2017-11-25 11:48:36', '2017-12-18 21:05:32', 2, '2017-12-18', 'Approved', NULL),
(2, NULL, NULL, 'SAEFI2/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'John', NULL, NULL, '2017-12-01', NULL, '02099988', NULL, NULL, NULL, 'Male', '2017-11-13', 'Disabled', NULL, 'Yes', NULL, 'Yes', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', 'pre-term', 3, 'Caesarean', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ss', 'Ludacris', 'Speaker', NULL, 'sss', 'sss', 'ssd', 'Within the first vaccinations of the session', NULL, 'No', NULL, 'Unable to assess', NULL, 'Unable to assess', NULL, 'Unable to assess', NULL, 'Unable to assess', NULL, NULL, NULL, 2, 1, 2, NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', 'Other', NULL, NULL, 'No', 's', NULL, NULL, NULL, NULL, 'No', 'No', NULL, 'No', 'No', 'No', 'No', NULL, NULL, 'No', 'No', NULL, NULL, 'Unknown', NULL, NULL, 2, 1, '3', NULL, 'asas', '2017-12-06 10:03:46', '2017-12-06 10:03:46', 0, NULL, NULL, '2018-01-07 21:59:28'),
(3, NULL, NULL, 'SAEFI3/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'John', NULL, NULL, '2017-12-01', NULL, '02099988', NULL, NULL, NULL, 'Male', '2017-11-13', 'Disabled', NULL, 'Yes', NULL, 'Yes', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', 'pre-term', 3, 'Caesarean', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ss', 'Ludacris', 'Speaker', NULL, 'sss', 'sss', 'ssd', 'Within the first vaccinations of the session', NULL, 'No', NULL, 'Unable to assess', NULL, 'Unable to assess', NULL, 'Unable to assess', NULL, 'Unable to assess', NULL, NULL, NULL, 2, 1, 2, NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', 'Other', NULL, NULL, 'No', 's', NULL, NULL, NULL, NULL, 'No', 'No', NULL, 'No', 'No', 'No', 'No', NULL, NULL, 'No', 'No', NULL, NULL, 'Unknown', NULL, NULL, 2, 1, '3', NULL, 'asas', '2017-12-06 10:36:08', '2017-12-06 10:36:08', 0, NULL, NULL, NULL),
(4, NULL, NULL, 'SAEFI4/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'John', NULL, NULL, '2017-12-01', NULL, '02099988', NULL, NULL, NULL, 'Male', '2017-11-13', 'Disabled', NULL, 'Yes', NULL, 'Yes', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', 'pre-term', 3, 'Caesarean', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ss', 'Ludacris', 'Speaker', NULL, 'sss', 'sss', 'ssd', 'Within the first vaccinations of the session', NULL, 'No', NULL, 'Unable to assess', NULL, 'Unable to assess', NULL, 'Unable to assess', NULL, 'Unable to assess', NULL, NULL, NULL, 2, 1, 2, NULL, 'Unknown', NULL, 'Unknown', NULL, 'Unknown', 'Other', NULL, NULL, 'No', 's', NULL, NULL, NULL, NULL, 'No', 'No', NULL, 'No', 'No', 'No', 'No', NULL, NULL, 'No', 'No', NULL, NULL, 'Unknown', NULL, NULL, 2, 1, '3', NULL, 'asas', '2017-12-06 10:37:18', '2017-12-06 10:37:18', 0, NULL, NULL, NULL),
(5, 3, NULL, 'SAEFI5/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eddyokemwa@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-18 16:59:57', '2017-12-18 16:59:57', 0, NULL, 'UnSubmitted', '2018-01-07 13:43:21'),
(6, 16, NULL, 'SAEFI6/2018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'reporter', NULL, NULL, NULL, 5, NULL, '0729932475', 'eddyokemwa@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-03 02:00:31', '2018-01-03 02:00:31', 0, NULL, 'UnSubmitted', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saefi_list_of_vaccines`
--

CREATE TABLE `saefi_list_of_vaccines` (
  `id` int(11) NOT NULL,
  `saefi_id` int(11) DEFAULT NULL,
  `vaccine_name` varchar(200) DEFAULT NULL,
  `vaccination_doses` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saefi_list_of_vaccines`
--

INSERT INTO `saefi_list_of_vaccines` (`id`, `saefi_id`, `vaccine_name`, `vaccination_doses`, `created`, `modified`) VALUES
(1, 1, 'Kipindu', 323, '2017-11-25 21:32:03', '2017-11-25 21:32:03'),
(2, 2, 'ss', 2, '2017-12-06 10:03:46', '2017-12-06 10:03:46'),
(3, 3, 'ss', 2, '2017-12-06 10:36:08', '2017-12-06 10:36:08'),
(4, 4, 'ss', 2, '2017-12-06 10:37:18', '2017-12-06 10:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` longtext,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `description`, `content`, `created`, `modified`) VALUES
(1, 'home', '<div class="row">\r\n        <div class="col-md-4">\r\n          <h2>ADR</h2>\r\n          <p>Adverse drug reaction. </p>\r\n          <!-- <p><a class="btn btn-primary" href="/sadrs/add" role="button">Report &raquo;</a></p> -->\r\n          <P><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrationModal">Report &raquo;</button></P>\r\n        </div>\r\n        <div class="col-md-4">\r\n          <h2>AEFI</h2>\r\n          <p>Adverse Event Following Immunization. </p>\r\n          <!-- <p><a class="btn btn-success" href="/aefis/add" role="button">Report &raquo;</a></p> -->\r\n          <p><button type="button" class="btn btn-success" data-toggle="modal" data-target="#registrationModal">Report &raquo;</button></p>\r\n          <p class="has-error"><label>If Serious AEFI...</label></p>\r\n          <p><button type="button" class="btn btn-success" data-toggle="modal" data-target="#registrationModal">Report &raquo;</button></p>\r\n       </div>\r\n        <div class="col-md-4">\r\n          <h2>SAE</h2>\r\n          <p>Serious Adverse Event Reporting Form.</p>\r\n          <p><i>**The SAE form is to be completed for SAEs from Clinical Trials</i></p>\r\n          <!-- <p><a class="btn btn-info" href="/adrs/add" role="button">View details &raquo;</a></p> -->\r\n          <P><button type="button" class="btn btn-info" data-toggle="modal" data-target="#registrationModal">Report &raquo;</button></P>\r\n        </div>\r\n      </div>', '2017-12-30 23:17:05', '2017-12-30 23:54:45'),
(2, 'News', '<div class="row">\r\n        <div class="col-md-4">\r\n          <h2>News</h2>\r\n          <p>News items here... </p>\r\n          </div>\r\n</div>', '2017-12-30 23:18:38', '2017-12-30 23:18:38'),
(3, 'faqs', '<div class="row">\r\n        <div class="col-md-12">\r\n          <h2>Frequently Asked Questions</h2>\r\n          <p>Probably an ordered list </p>\r\n          <ul> \r\n             <li>We need to ensure ability to add images</li>\r\n              <li>Hence the reason we will most likely kill this method</li>\r\n           </ul>\r\n</div>\r\n</div>', '2017-12-30 23:21:13', '2017-12-30 23:21:13'),
(4, 'contactus', '<p>Your feedback is welcome...</p>', '2017-12-30 23:22:24', '2018-01-03 12:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `sub_counties`
--

CREATE TABLE `sub_counties` (
  `id` int(11) NOT NULL,
  `county_id` int(11) DEFAULT NULL,
  `sub_county_name` varchar(50) DEFAULT NULL,
  `county_name` varchar(50) DEFAULT NULL,
  `Province` varchar(50) DEFAULT NULL,
  `Pop_2009` varchar(50) DEFAULT NULL,
  `RegVoters` varchar(50) DEFAULT NULL,
  `AreaSqKms` varchar(50) DEFAULT NULL,
  `CAWards` varchar(50) DEFAULT NULL,
  `MainEthnicGroup` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `county_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` char(140) NOT NULL,
  `confirm_password` char(140) NOT NULL DEFAULT '',
  `name` varchar(100) DEFAULT NULL,
  `email` char(50) NOT NULL DEFAULT '',
  `group_id` int(11) NOT NULL,
  `name_of_institution` varchar(100) DEFAULT NULL,
  `institution_address` varchar(100) DEFAULT NULL,
  `institution_code` varchar(100) DEFAULT NULL,
  `institution_contact` varchar(100) DEFAULT NULL,
  `ward` varchar(100) DEFAULT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `forgot_password` tinyint(2) DEFAULT '0',
  `initial_email` tinyint(2) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '0',
  `deactivated` tinyint(1) DEFAULT '0',
  `is_admin` tinyint(1) DEFAULT '0',
  `deleted` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `activation_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `designation_id`, `county_id`, `username`, `password`, `confirm_password`, `name`, `email`, `group_id`, `name_of_institution`, `institution_address`, `institution_code`, `institution_contact`, `ward`, `phone_no`, `forgot_password`, `initial_email`, `is_active`, `deactivated`, `is_admin`, `deleted`, `created`, `modified`, `activation_key`) VALUES
(1, NULL, NULL, 'admin', '$2y$10$mybZj99JesZpC4.lS90KF.dHxtaVR9i8cgAe0MUMy3cvvWr8WVFOK', 'admin', '', 'admin@mcaz.org', 1, '', '', '', '', '', '', 0, 0, 1, NULL, 0, NULL, '2017-10-31 19:30:54', '2017-10-31 19:30:54', NULL),
(2, NULL, NULL, 'manager', '$2y$10$/RAcYedSg/5/Bj/IhuLgrOAfEd4qjrq/rkrpVmQY5yo5fQdHZX1Z2', 'manager', 'manager', 'manager@mcaz.org', 2, '', '', '', '', '', '', 0, 0, 1, NULL, 0, NULL, '2017-10-31 19:31:23', '2017-10-31 19:31:23', NULL),
(3, 12, NULL, 'eddy', '$2y$10$zenU68Sn0MUlgrLnXERyq.KpTdfxa9oOIolWrDj6QbA0P7XWnlDKu', '$2y$10$NliTQUeDs2/7bRC4vTxeAOI3Jc8jsS7KipFFeDUJ06nII0M1CsFKa', 'Edward', 'eddyokemwa1@gmail.com', 3, 'ha Glen View Satellite Clinic', 'avondale', 'ZW000A14', NULL, NULL, '0729932475', 0, 0, 1, NULL, 0, NULL, '2017-11-01 20:45:21', '2018-01-05 12:28:39', NULL),
(8, NULL, NULL, NULL, '$2y$10$qn5JUahawerEMxRNnl6KjequA2L2mogmRyex8I20nyOh7NNT/JXam', '$2y$10$Llfr1od6H/WDXSsjE/yEyupLBfYFs9g74TPE/yhRf1bZBArPY.Yyq', NULL, 'eddieokemwa22@gmail.com', 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, 0, NULL, '2017-11-22 23:53:40', '2017-11-22 23:53:40', '21541124'),
(9, NULL, NULL, NULL, '$2y$10$W/PmUouRiFyaTrQQQTtWk.WgtB5DcdCHvCd35s2NrHVgtyEqJiVK2', '$2y$10$2hG4Ypmk8xCuFXQaklRNTewtSzEqMnDJKydYdEfcQTXs5q5TvFLli', NULL, 'eondari@safaricom.co.ke', 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, 0, NULL, '2017-11-23 12:39:20', '2017-11-23 12:39:20', '21541124'),
(10, NULL, NULL, 'roberto', '$2y$10$v66Q5kY0zkzVyxUJT5Xo7OwgG1rJW2O4nC3zgbrX5D5rVv9y6zZ0a', '$2y$10$dEMNNcvU4aWGrTRJb/2.I.0P7.WlRq6j7Zpn247Ol7LlDTsznop0a', 'roberto', 'roberto@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, '0729932475', 0, 0, 1, 0, 0, NULL, '2017-12-04 23:23:52', '2017-12-04 23:23:52', NULL),
(11, NULL, NULL, 'evaluator2', '$2y$10$aA/nxzsrZRpvnmiPM8bpPeUZJjAwDQyc4JKTqkjYEcf.7lagAX6v2', '$2y$10$qnhq5jGs0yCjYTGNKnVj8uzd8BcOBtH/9BanUXCZQHFfsNvGIiiuq', 'Evaluator2', 'evaluator2@gmail.com', 4, NULL, NULL, NULL, NULL, NULL, '+257429932475', 0, 0, 1, 0, 0, NULL, '2017-12-04 23:36:27', '2017-12-04 23:36:27', NULL),
(12, NULL, NULL, 'evaluator3', '$2y$10$XwmT8rQS/7I7rMyN14W0MeXu.AmyaCQhDSqfUlzYGOdbx5wR3.fz.', '$2y$10$YH0DyCOGJr.fTlALRbLzKuAo97h0inIlDcDWP8RSlOfFz2XUG9hOC', 'Evaluator3', 'evaluator3@gmail.com', 4, NULL, NULL, NULL, NULL, NULL, '0729932475', 0, 0, 1, NULL, 0, NULL, '2017-12-12 16:06:24', '2017-12-12 16:06:24', NULL),
(14, NULL, NULL, NULL, '$2y$10$OFSzf.iPx8Y.QlS2VN.eduS/pwwWvq77vJYEY4sGHZ/zB.wvnw4nO', '$2y$10$FvUTtG37bixPK9TczMmnC.XO810d9BHJiD5TaiD/V/oa7Q0zNfCZi', 'mike', 'eddieokemwa@gmail.com', 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, NULL, 0, NULL, '2017-12-13 00:42:17', '2017-12-13 00:42:17', '21542810'),
(15, 3, NULL, 'edward', '$2y$10$wup4zcLbhe6VmZ3tKpicE.wOYXIQgY9WaGKCo/MuXeBvQ89lNvHMy', '$2y$10$RAghF2dQi.n1hQ2zW7mbSeJ91v4C2JMLp8UhdabHxsupHA/S2vqGK', 'edward', 'edwardokemwa@gmail.com', 3, NULL, NULL, NULL, NULL, NULL, '+257429932475', 0, 0, 0, NULL, 0, NULL, '2017-12-18 16:39:25', '2017-12-18 16:39:25', '21542419'),
(16, 12, NULL, 'reporter', '$2y$10$PM5c4xbwuqMApIV21NK4WejlAaYuJC6bFzMzfcaeFbLlgd02W8mZ.', '$2y$10$4POoDZErDkP9lyNGbGn.X.Ipr85R9UghhMYJZZW2OjjCvv/oNVfUC', 'reporter', 'eddyokemwa@gmail.com', 3, 'Belvedere', 'kazi moto', 'ZW000A05', NULL, NULL, '0729932475', 0, 0, 1, 0, 0, NULL, '2018-01-03 01:14:48', '2018-01-05 12:18:41', '21542548'),
(17, NULL, NULL, 'fakeuser', '$2y$10$lFLtphOIDkbjJ4133C0N2u7gM32YI53kmxznoIU.s94P/ZlrTKhoa', '$2y$10$6KD5E8iyBwrQBWqbhzGWY.ILP3lhSEIp0c6KIq3dq.4qnHFTuepdi', 'faker', 'fakeuser@mail.com', 3, 'Junction Gate', '', 'ZW010348', NULL, NULL, '', 0, 0, 1, 0, 0, NULL, '2018-01-05 12:19:25', '2018-01-05 12:22:22', '21543181');

-- --------------------------------------------------------

--
-- Table structure for table `who_drugs`
--

CREATE TABLE `who_drugs` (
  `id` varchar(10) NOT NULL,
  `MedId` varchar(35) DEFAULT NULL,
  `drug_record_number` varchar(6) DEFAULT NULL,
  `sequence_no_1` varchar(2) DEFAULT NULL,
  `sequence_no_2` varchar(3) DEFAULT NULL,
  `sequence_no_3` varchar(10) DEFAULT NULL,
  `sequence_no_4` varchar(10) DEFAULT NULL,
  `generic` char(1) DEFAULT NULL,
  `drug_name` varchar(80) DEFAULT NULL,
  `name_specifier` varchar(30) DEFAULT NULL,
  `market_authorization_number` varchar(30) DEFAULT NULL,
  `market_authorization_date` varchar(8) DEFAULT NULL,
  `market_authorization_withdrawal_date` varchar(8) DEFAULT NULL,
  `country` varchar(10) DEFAULT NULL,
  `company` varchar(10) DEFAULT NULL,
  `marketing_authorization_holder` varchar(10) DEFAULT NULL,
  `source_code` varchar(10) DEFAULT NULL,
  `source_country` varchar(10) DEFAULT NULL,
  `source_year` varchar(3) DEFAULT NULL,
  `product_type` varchar(10) DEFAULT NULL,
  `product_group` varchar(10) DEFAULT NULL,
  `create_date` varchar(8) DEFAULT NULL,
  `date_changed` varchar(8) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `who_drugs`
--

INSERT INTO `who_drugs` (`id`, `MedId`, `drug_record_number`, `sequence_no_1`, `sequence_no_2`, `sequence_no_3`, `sequence_no_4`, `generic`, `drug_name`, `name_specifier`, `market_authorization_number`, `market_authorization_date`, `market_authorization_withdrawal_date`, `country`, `company`, `marketing_authorization_holder`, `source_code`, `source_country`, `source_year`, `product_type`, `product_group`, `create_date`, `date_changed`, `created`, `modified`) VALUES
('105142', '', '004300', '01', '001', '0000000001', '0000000001', 'N', 'Atasol compound', '', '', '', '', 'UNS', '0', '0', '056', 'CAN', '78', '001', '0', '20041231', '20041231', NULL, NULL),
('105144', '', '004300', '01', '003', '0000000001', '0000000001', 'N', 'Atasol', '', '', '', '', 'UNS', '0', '0', '064', 'AUS', '90', '001', '0', '20041231', '20041231', NULL, NULL),
('107155', '', '005097', '01', '016', '0000000001', '0000000001', 'N', 'Panadol', '', '', '', '', 'UNS', '0', '0', 'GBR', 'GBR', '94', '001', '0', '20041231', '20041231', NULL, NULL),
('1082797', '', '000469', '01', '009', '0000000125', '0000000001', 'N', 'Crystepin', '', '', '', '', 'EST', '7156', '21245', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1082798', '', '000469', '01', '009', '0000000001', '0000000001', 'N', 'Crystepin', '', '', '', '', 'EST', '7156', '21245', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1082799', '', '000469', '01', '009', '0000000001', '0000000001', 'N', 'Crystepin', '', '', '', '', 'UNS', '7156', '7157', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1082917', '', '000291', '01', '032', '0000000206', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'EST', '7156', '20253', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1082918', '', '000291', '01', '032', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'EST', '7156', '20253', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1082919', '', '000291', '01', '032', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'UNS', '7156', '7157', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1082920', '', '000291', '01', '032', '0000000209', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'EST', '7156', '20253', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1083773', '', '000291', '01', '032', '0000000209', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'LVA', '7156', '23215', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1083774', '', '000291', '01', '032', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'LVA', '7156', '23215', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084139', '', '054876', '01', '001', '0000000252', '0000000001', 'N', 'Anginal', '', '', '', '', 'LVA', '7156', '23141', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084140', '', '054876', '01', '001', '0000000001', '0000000001', 'N', 'Anginal', '', '', '', '', 'LVA', '7156', '23141', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084141', '', '054876', '01', '001', '0000000001', '0000000001', 'N', 'Anginal', '', '', '', '', 'UNS', '7156', '7157', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084142', '', '054876', '01', '001', '0000000176', '0000000001', 'N', 'Anginal', '', '', '', '', 'LVA', '7156', '23141', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084360', '', '000469', '01', '009', '0000000125', '0000000001', 'N', 'Crystepin', '', '', '', '', 'LTU', '7156', '22741', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084361', '', '000469', '01', '009', '0000000001', '0000000001', 'N', 'Crystepin', '', '', '', '', 'LTU', '7156', '22741', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084553', '', '000291', '01', '032', '0000000209', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'LTU', '7156', '21705', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084554', '', '000291', '01', '032', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'LTU', '7156', '21705', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1084610', '', '000291', '01', '032', '0000000206', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'LTU', '7156', '21705', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1086178', '', '000291', '03', '004', '0000000209', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'POL', '7156', '24755', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1086179', '', '000291', '03', '004', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'POL', '7156', '24755', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('1086180', '', '000291', '03', '004', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'UNS', '7156', '7157', '237', 'N/A', '06', '002', '0', '20060119', '20060119', NULL, NULL),
('111886', '', '007242', '01', '001', '0000000001', '0000000001', 'N', 'Cotylenol', '', '', '', '', 'N/A', '0', '0', '011', 'USA', '83', '001', '0', '20041231', '20050930', NULL, NULL),
('117513', '', '010775', '01', '001', '0000000001', '0000000001', 'N', 'Briserin', '', '', '', '', 'UNS', '0', '0', '015', 'DEU', '77', '001', '0', '20041231', '20041231', NULL, NULL),
('117515', '', '010775', '01', '004', '0000000001', '0000000001', 'N', 'Crystepin', '', '', '', '', 'UNS', '0', '0', '091', 'N/A', '93', '001', '0', '20041231', '20041231', NULL, NULL),
('120519', '', '013252', '01', '001', '0000000001', '0000000001', 'N', 'Day & night cold & flu', '', '', '', '', 'UNS', '0', '0', '132', 'GBR', '97', '001', '0', '20041231', '20041231', NULL, NULL),
('121229', '', '013862', '01', '001', '0000000001', '0000000001', 'N', 'Bronchosan', '', '', '', '', 'UNS', '0', '0', '002', 'N/A', '98', '002', '0', '20041231', '20050331', NULL, NULL),
('122306', '', '015172', '01', '002', '0000000001', '0000000001', 'N', 'Ardeycholan n', '', '', '', '', 'UNS', '0', '0', '002', 'N/A', '01', '002', '0', '20041231', '20050331', NULL, NULL),
('126158', '', '000200', '01', '012', '0000000350', '0000000062', 'N', 'Ben-u-ron', '500mg supp. fur schulkinder', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('126159', '', '000200', '01', '012', '0000000350', '0000000001', 'N', 'Ben-u-ron', 'Suppositorien', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('127288', '', '000200', '01', '003', '0000000125', '0000001057', 'N', 'Panadol', 'extend 665 mg depottabletti', '', '', '', 'FIN', '7156', '3957', '051', 'FIN', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('127289', '', '000200', '01', '003', '0000000125', '0000000001', 'N', 'Panadol', 'extend depottabletti', '', '', '', 'FIN', '7156', '3957', '051', 'FIN', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('127290', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', '', '', '', '', 'FIN', '7156', '3957', '051', 'FIN', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('128531', '', '000200', '01', '003', '0000000100', '0000000062', 'N', 'Panadol', 'rapid', '', '', '', 'AUS', '7156', '12085', '214', 'GBR', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('128532', '', '000200', '01', '003', '0000000100', '0000000001', 'N', 'Panadol', 'rapid', '', '', '', 'AUS', '7156', '12085', '214', 'GBR', '05', '001', '0', '20050331', '20050331', NULL, NULL),
('13610', '', '000913', '01', '001', '0000000001', '0000000001', 'Y', 'Psyllium hydrophilic mucilloid', '', '', '', '', 'N/A', '0', '0', '002', 'N/A', '72', '001', '0', '19851231', '19851231', NULL, NULL),
('13619', '', '000913', '01', '010', '0000000001', '0000000001', 'N', 'Mucofalk', '', '', '', '', 'UNS', '0', '7157', '005', 'DEU', '87', '001', '0', '19870331', '19870331', NULL, NULL),
('1925', '', '000047', '01', '001', '0000000001', '0000000001', 'Y', 'Bromhexine', '', '', '', '', 'N/A', '0', '0', '001', 'N/A', '', '001', '0', '19851231', '19851231', NULL, NULL),
('1929', '', '000047', '02', '001', '0000000001', '0000000001', 'Y', 'Bromhexine hydrochloride', '', '', '', '', 'N/A', '0', '0', '179', 'N/A', '', '001', '0', '19851231', '19851231', NULL, NULL),
('1962', '', '000047', '02', '034', '0000000001', '0000000001', 'N', 'Bronchosan', '', '', '', '', 'SVK', '0', '9575', 'SVK', 'SVK', '98', '001', '0', '19980630', '19980930', NULL, NULL),
('207302', '', '007242', '01', '034', '0000000150', '0000000001', 'N', 'Codral cough, cold & flu day & night', '', '', '', '', 'AUS', '7156', '18064', '002', 'N/A', '05', '001', '0', '20050630', '20050630', NULL, NULL),
('207303', '', '007242', '01', '034', '0000000001', '0000000001', 'N', 'Codral cough, cold & flu day & night', '', '', '', '', 'AUS', '7156', '18064', '002', 'N/A', '05', '001', '0', '20050630', '20050630', NULL, NULL),
('207304', '', '007242', '01', '034', '0000000001', '0000000001', 'N', 'Codral cough, cold & flu day & night', '', '', '', '', 'UNS', '7156', '7157', '002', 'N/A', '05', '001', '0', '20050630', '20050630', NULL, NULL),
('236599', '', '000291', '03', '001', '0000000001', '0000000001', 'Y', 'Plantago ovata extract', '', '', '', '', 'N/A', '0', '0', '237', 'N/A', '05', '002', '0', '20050630', '20050630', NULL, NULL),
('271148', '', '012896', '01', '015', '0000000100', '0000000001', 'N', 'Benylin day & night', '', '', '', '', 'IRL', '7156', '26117', '002', 'N/A', '05', '001', '0', '20050823', '20050823', NULL, NULL),
('271149', '', '012896', '01', '015', '0000000001', '0000000001', 'N', 'Benylin day & night', '', '', '', '', 'IRL', '7156', '26117', '002', 'N/A', '05', '001', '0', '20050823', '20050823', NULL, NULL),
('271150', '', '012896', '01', '015', '0000000001', '0000000001', 'N', 'Benylin day & night', '', '', '', '', 'UNS', '7156', '7157', '002', 'N/A', '05', '001', '0', '20050823', '20050823', NULL, NULL),
('27456', '', '004300', '01', '001', '0000000001', '0000000001', 'N', 'Atasol compound', '', '', '', '', 'CAN', '0', '4493', '056', 'CAN', '78', '001', '0', '19851231', '20041231', NULL, NULL),
('27458', '', '004300', '01', '003', '0000000001', '0000000001', 'N', 'Atasol', '8', '', '', '', 'AUS', '0', '8994', '064', 'AUS', '90', '001', '0', '19901231', '20041231', NULL, NULL),
('275605', '', '000429', '01', '001', '0000000100', '0000000023', 'N', 'Dipyridamole', '', '', '', '', 'MYS', '0', '25884', 'MYS', 'MYS', '05', '001', '0', '20050927', '20050927', NULL, NULL),
('275606', '', '000429', '01', '001', '0000000100', '0000000001', 'N', 'Dipyridamole', '', '', '', '', 'MYS', '0', '25884', 'MYS', 'MYS', '05', '001', '0', '20050927', '20050927', NULL, NULL),
('275607', '', '000429', '01', '001', '0000000001', '0000000001', 'N', 'Dipyridamole', '', '', '', '', 'MYS', '0', '25884', 'MYS', 'MYS', '05', '001', '0', '20050927', '20050927', NULL, NULL),
('275608', '', '000429', '01', '001', '0000000100', '0000000039', 'N', 'Dipyridamole', '', '', '', '', 'MYS', '0', '26089', 'MYS', 'MYS', '05', '001', '0', '20050927', '20050927', NULL, NULL),
('275609', '', '000429', '01', '001', '0000000100', '0000000001', 'N', 'Dipyridamole', '', '', '', '', 'MYS', '0', '26089', 'MYS', 'MYS', '05', '001', '0', '20050927', '20050927', NULL, NULL),
('275610', '', '000429', '01', '001', '0000000001', '0000000001', 'N', 'Dipyridamole', '', '', '', '', 'MYS', '0', '26089', 'MYS', 'MYS', '05', '001', '0', '20050927', '20050927', NULL, NULL),
('30075', '', '005097', '01', '001', '0000000001', '0000000001', 'N', 'Para-seltzer', '', '', '', '', 'GBR', '0', '10853', '013', 'GBR', '80', '001', '0', '19851231', '19851231', NULL, NULL),
('30090', '', '005097', '01', '016', '0000000001', '0000000001', 'N', 'Panadol', 'Extra', '', '', '', 'GBR', '0', '9038', 'GBR', 'GBR', '94', '001', '0', '19940930', '20041231', NULL, NULL),
('36106', '', '007242', '01', '001', '0000000001', '0000000001', 'N', 'Cotylenol', '', '', '', '', 'USA', '0', '6247', '011', 'USA', '83', '001', '0', '19851231', '19851231', NULL, NULL),
('36117', '', '007242', '01', '012', '0000000001', '0000000001', 'N', 'Day & night cold & flu', 'Capsules', '', '', '', 'AUS', '0', '7610', '049', 'AUS', '94', '001', '0', '19990630', '20041231', NULL, NULL),
('402236', '', '000200', '01', '003', '0000000105', '0000000062', 'N', 'Panadol', 'Pore 500 mg', '', '', '', 'FIN', '7156', '3957', '051', 'FIN', '05', '001', '0', '20050930', '20050930', NULL, NULL),
('402237', '', '000200', '01', '003', '0000000105', '0000000001', 'N', 'Panadol', 'Pore', '', '', '', 'FIN', '7156', '3957', '051', 'FIN', '05', '001', '0', '20050930', '20050930', NULL, NULL),
('43168', '', '010775', '01', '001', '0000000001', '0000000001', 'N', 'Briserin', '', '', '', '', 'DEU', '0', '8994', '015', 'DEU', '77', '001', '0', '19920630', '19920930', NULL, NULL),
('43171', '', '010775', '01', '004', '0000000001', '0000000001', 'N', 'Crystepin', '', '', '', '', 'CZE', '0', '5737', '091', 'N/A', '93', '001', '0', '19930930', '19930930', NULL, NULL),
('47069', '', '013252', '01', '001', '0000000001', '0000000001', 'N', 'Day & night cold & flu', 'Tablets', '', '', '', 'USA', '0', '10881', '132', 'GBR', '97', '001', '0', '19970630', '20041231', NULL, NULL),
('4762', '', '000200', '01', '001', '0000000001', '0000000001', 'Y', 'Paracetamol', '', '', '', '', 'N/A', '0', '0', '001', 'N/A', '', '001', '0', '19851231', '19851231', NULL, NULL),
('4763', '', '000200', '01', '002', '0000000001', '0000000001', 'N', 'Dymadon', '', '', '', '', 'AUS', '0', '1672', '012', 'AUS', '68', '001', '0', '19851231', '19851231', NULL, NULL),
('4764', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', '', '', '', '', 'NZL', '0', '11043', '017', 'NZL', '68', '001', '0', '19851231', '19851231', NULL, NULL),
('4765', '', '000200', '01', '004', '0000000001', '0000000001', 'N', 'Alvedon', '', '', '', '', 'SWE', '0', '2909', '019', 'SWE', '68', '001', '0', '19851231', '19851231', NULL, NULL),
('4766', '', '000200', '01', '005', '0000000001', '0000000001', 'N', 'Tylenol', '', '', '', '', 'USA', '0', '6247', '010', 'USA', '68', '001', '0', '19851231', '19851231', NULL, NULL),
('4767', '', '000200', '01', '006', '0000000001', '0000000001', 'N', 'Tempra', '', '', '', '', 'CAN', '0', '6255', '014', 'CAN', '68', '001', '0', '19851231', '19851231', NULL, NULL),
('4768', '', '000200', '01', '007', '0000000001', '0000000001', 'N', 'Calpol', '', '', '', '', 'GBR', '0', '1672', '013', 'GBR', '69', '001', '0', '19851231', '19851231', NULL, NULL),
('4769', '', '000200', '01', '008', '0000000001', '0000000001', 'N', 'Atasol', '', '', '', '', 'CAN', '0', '4493', '014', 'CAN', '68', '001', '0', '19851231', '19851231', NULL, NULL),
('4770', '', '000200', '01', '009', '0000000001', '0000000001', 'Y', 'Acetaminophen', '', '', '', '', 'UNS', '0', '0', '006', 'USA', '', '001', '0', '19851231', '19981231', NULL, NULL),
('4771', '', '000200', '01', '010', '0000000001', '0000000001', 'N', 'Acamol', '', '', '', '', 'ISR', '0', '4661', '038', 'ISR', '73', '001', '0', '19851231', '19851231', NULL, NULL),
('4772', '', '000200', '01', '011', '0000000001', '0000000001', 'N', 'Hedex', '', '', '', '', 'NLD', '0', '9848', '016', 'NLD', '73', '001', '0', '19851231', '19851231', NULL, NULL),
('4773', '', '000200', '01', '012', '0000000001', '0000000001', 'N', 'Ben-u-ron', '', '', '', '', 'DEU', '0', '988', '015', 'DEU', '71', '001', '0', '19851231', '19851231', NULL, NULL),
('4790', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'DNK', '0', '2441', '024', 'DNK', '83', '001', '0', '19851231', '20041231', NULL, NULL),
('48010', '', '013862', '01', '001', '0000000001', '0000000001', 'N', 'Bronchosan', '', '', '', '', 'NLD', '0', '1166', '002', 'N/A', '98', '002', '0', '19980930', '20050331', NULL, NULL),
('4816', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'FRA', '0', '5967', '043', 'FRA', '86', '001', '0', '19870930', '20041231', NULL, NULL),
('4819', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'FRA', '0', '10571', 'FRA', 'FRA', '87', '001', '0', '19870930', '20041231', NULL, NULL),
('4823', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', 'Soluble', '', '', '', 'AUS', '0', '11043', '049', 'AUS', '86', '001', '0', '19880331', '20041231', NULL, NULL),
('4833', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'GBR', '0', '9848', '071', 'GBR', '88', '001', '0', '19890331', '20041231', NULL, NULL),
('4849', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'NLD', '0', '3611', 'NLD', 'NLD', '89', '001', '0', '19891231', '20041231', NULL, NULL),
('4853', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'ESP', '0', '11043', '075', 'ESP', '89', '001', '0', '19910630', '20041231', NULL, NULL),
('4879', '', '000200', '01', '005', '0000000001', '0000000001', 'N', 'Tylenol', '', '', '', '', 'AUS', '0', '5053', 'AUS', 'AUS', '93', '001', '0', '19930331', '20041231', NULL, NULL),
('4901', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'GBR', '0', '1406', 'GBR', 'GBR', '94', '001', '0', '19940930', '20041231', NULL, NULL),
('4914', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', 'For children', '', '', '', 'SGP', '0', '9848', '108', 'SGP', '93', '001', '0', '19960331', '20041231', NULL, NULL),
('4915', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'ESP', '0', '4625', '075', 'ESP', '95', '001', '0', '19960331', '20041231', NULL, NULL),
('4924', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'FRA', '0', '1428', 'FRA', 'FRA', '96', '001', '0', '19961231', '20041231', NULL, NULL),
('4926', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'GBR', '0', '2293', '071', 'GBR', '96', '001', '0', '19970331', '20041231', NULL, NULL),
('4927', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'DEU', '0', '2347', '015', 'DEU', '96', '001', '0', '19970331', '20041231', NULL, NULL),
('4931', '', '000200', '01', '008', '0000000001', '0000000001', 'N', 'Atasol', 'Forte', '', '', '', 'CAN', '0', '3641', '056', 'CAN', '97', '001', '0', '19971231', '20041231', NULL, NULL),
('4935', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'EST', '0', '10080', '136', 'EST', '98', '001', '0', '19980630', '20041231', NULL, NULL),
('4937', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'DEU', '0', '9777', '015', 'DEU', '96', '001', '0', '19980630', '20041231', NULL, NULL),
('4941', '', '000200', '01', '006', '0000000001', '0000000001', 'N', 'Tempra', 'Forte', '', '', '', 'PHL', '0', '6255', '115', 'PHL', '98', '001', '0', '19980930', '20041231', NULL, NULL),
('4950', '', '000200', '01', '007', '0000000001', '0000000001', 'N', 'Calpol', 'Suspension', '', '', '', 'TUR', '0', '3953', '147', 'TUR', '98', '001', '0', '19981231', '20041231', NULL, NULL),
('4951', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', 'Hot', '', '', '', 'FIN', '0', '9589', '051', 'FIN', '98', '001', '0', '19990331', '20041231', NULL, NULL),
('4961', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', 'Forte', '', '', '', 'FIN', '0', '9589', '051', 'FIN', '99', '001', '0', '19990630', '20041231', NULL, NULL),
('49634', '', '015172', '01', '001', '0000000001', '0000000001', 'Y', 'Chelidonium majus', '', '', '', '', 'N/A', '0', '0', 'UNS', 'UNS', '', '002', '0', '20010331', '20050331', NULL, NULL),
('49635', '', '015172', '01', '002', '0000000001', '0000000001', 'N', 'Ardeycholan n', '', '', '', '', 'DEU', '0', '572', '002', 'N/A', '01', '002', '0', '20010331', '20050331', NULL, NULL),
('4967', '', '000200', '01', '004', '0000000001', '0000000001', 'N', 'Alvedon', 'Forte', '', '', '', 'SWE', '0', '701', '022', 'SWE', '00', '001', '0', '20000630', '20041231', NULL, NULL),
('4971', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'DEU', '0', '5841', '015', 'DEU', '01', '001', '0', '20010331', '20041231', NULL, NULL),
('4972', '', '000200', '01', '001', '0000000001', '0000000001', 'N', 'Paracetamol', '', '', '', '', 'DEU', '0', '1026', '015', 'DEU', '01', '001', '0', '20010331', '20041231', NULL, NULL),
('51025', '', '004300', '01', '003', '0000000001', '0000000001', 'N', 'Atasol', '30', '', '', '', 'CAN', '0', '1742', '002', 'N/A', '01', '001', '0', '20010930', '20041231', NULL, NULL),
('55595', '', '007242', '01', '012', '0000000150', '0000000001', 'N', 'Day & night cold & flu', '', '', '', '', 'NZL', '7156', '10877', '002', 'N/A', '03', '001', '0', '20030320', '20041231', NULL, NULL),
('55596', '', '007242', '01', '012', '0000000001', '0000000001', 'N', 'Day & night cold & flu', '', '', '', '', 'NZL', '7156', '10877', '002', 'N/A', '03', '001', '0', '20030320', '20041231', NULL, NULL),
('55597', '', '007242', '01', '012', '0000000001', '0000000001', 'N', 'Day & night cold & flu', '', '', '', '', 'UNS', '7156', '7157', '002', 'N/A', '03', '001', '0', '20030320', '20041231', NULL, NULL),
('55969', '', '000200', '01', '005', '0000000001', '0000000001', 'N', 'Tylenol', '', '', '', '', 'CHE', '7156', '5011', '089', 'CHE', '03', '001', '0', '20030523', '20030630', NULL, NULL),
('55970', '', '000200', '01', '005', '0000000001', '0000000001', 'N', 'Tylenol', '', '', '', '', 'UNS', '7156', '7157', '089', 'CHE', '03', '001', '0', '20030523', '20050331', NULL, NULL),
('57203', '', '000200', '01', '003', '0000000127', '0000000001', 'N', 'Panadol', 'Filmtabletten', '', '', '', 'CHE', '0', '11766', 'CHE', 'CHE', '04', '001', '0', '20030626', '20040909', NULL, NULL),
('57204', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', '', '', '', '', 'CHE', '0', '11766', 'CHE', 'CHE', '04', '001', '0', '20030626', '20040909', NULL, NULL),
('57205', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', '', '', '', '', 'UNS', '7156', '7157', 'CHE', 'CHE', '03', '001', '0', '20030626', '20030626', NULL, NULL),
('57333', '', '000200', '01', '005', '0000000100', '0000000062', 'N', 'Tylenol', 'Forte caplets', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '03', '001', '0', '20030626', '20030626', NULL, NULL),
('58905', '', '007242', '01', '017', '0000000100', '0000000001', 'N', 'Comtrex day-night', '', '', '', '', 'USA', '7156', '1515', '010', 'USA', '03', '001', '0', '20030630', '20041231', NULL, NULL),
('58906', '', '007242', '01', '017', '0000000001', '0000000001', 'N', 'Comtrex day-night', '', '', '', '', 'USA', '7156', '1515', '010', 'USA', '03', '001', '0', '20030630', '20041231', NULL, NULL),
('58907', '', '007242', '01', '017', '0000000001', '0000000001', 'N', 'Comtrex day-night', '', '', '', '', 'UNS', '7156', '7157', '010', 'USA', '03', '001', '0', '20030630', '20041231', NULL, NULL),
('59502', '', '000200', '01', '012', '0000000100', '0000000062', 'N', 'Ben-u-ron', 'Tabletten', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('59503', '', '000200', '01', '012', '0000000100', '0000000001', 'N', 'Ben-u-ron', 'Tabletten', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('59504', '', '000200', '01', '012', '0000000001', '0000000001', 'N', 'Ben-u-ron', '', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('59505', '', '000200', '01', '012', '0000000001', '0000000001', 'N', 'Ben-u-ron', '', '', '', '', 'UNS', '7156', '7157', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('60241', '', '000200', '01', '005', '0000000100', '0000000001', 'N', 'Tylenol', 'Caplets', '', '', '', 'CHE', '5010', '5011', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('60324', '', '000200', '01', '005', '0000000100', '0000000062', 'N', 'Tylenol', 'Forte tabletten', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('60819', '', '000200', '01', '005', '0000000100', '0000000001', 'N', 'Tylenol', 'Tabletten', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '03', '001', '0', '20030630', '20030630', NULL, NULL),
('62308', '', '000291', '01', '001', '0000000001', '0000000001', 'Y', 'Plantago ovata', '', '', '', '', 'N/A', '0', '0', 'UNS', 'UNS', '', '002', '0', '20031212', '20050331', NULL, NULL),
('62437', '', '000469', '01', '001', '0000000001', '0000000001', 'Y', 'Rauwolfia serpentina', '', '', '', '', 'N/A', '0', '0', 'UNS', 'UNS', '', '002', '0', '20031212', '20050331', NULL, NULL),
('65504', '', '000200', '01', '005', '0000000100', '0000000062', 'N', 'Tylenol', 'Extra-strength caplets 500mg', '', '', '', 'CAN', '7156', '12679', 'CAN', 'CAN', '04', '001', '0', '20040315', '20040315', NULL, NULL),
('65505', '', '000200', '01', '005', '0000000100', '0000000001', 'N', 'Tylenol', 'Caplets', '', '', '', 'CAN', '7156', '12679', 'CAN', 'CAN', '04', '001', '0', '20040315', '20040315', NULL, NULL),
('65506', '', '000200', '01', '005', '0000000001', '0000000001', 'N', 'Tylenol', '', '', '', '', 'CAN', '7156', '12679', 'CAN', 'CAN', '04', '001', '0', '20040315', '20040315', NULL, NULL),
('65507', '', '000200', '01', '005', '0000000100', '0000000062', 'N', 'Tylenol', 'Extra-strength tab 500mg', '', '', '', 'CAN', '7156', '12679', 'CAN', 'CAN', '04', '001', '0', '20040315', '20040315', NULL, NULL),
('65508', '', '000200', '01', '005', '0000000100', '0000000001', 'N', 'Tylenol', 'Tab', '', '', '', 'CAN', '7156', '12679', 'CAN', 'CAN', '04', '001', '0', '20040315', '20040315', NULL, NULL),
('68190', '', '012896', '01', '001', '0000000001', '0000000001', 'Y', 'Diphenhydra. hcl w/paracetamol/pseudoeph. hcl', '', '', '', '', 'N/A', '0', '0', '002', 'N/A', '04', '001', '0', '20040521', '20040630', NULL, NULL),
('69036', '', '007242', '01', '022', '0000000001', '0000000001', 'N', 'Tylenol', '', '', '', '', 'UNS', '7156', '7157', '214', 'GBR', '04', '001', '0', '20040614', '20040614', NULL, NULL),
('70144', '', '000200', '01', '003', '0000000125', '0000000062', 'N', 'Panadol', 'Gladde', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70145', '', '000200', '01', '003', '0000000125', '0000000001', 'N', 'Panadol', 'Gladde', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70146', '', '000200', '01', '003', '0000000001', '0000000001', 'N', 'Panadol', '', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70147', '', '000200', '01', '003', '0000000127', '0000000001', 'N', 'Panadol', 'Zapp', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70148', '', '000200', '01', '003', '0000000127', '0000000062', 'N', 'Panadol', 'Zapp', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70149', '', '000200', '01', '003', '0000000350', '0000000202', 'N', 'Panadol', 'Zetpil', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70150', '', '000200', '01', '003', '0000000350', '0000000001', 'N', 'Panadol', 'Zetpil', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70151', '', '000200', '01', '003', '0000000350', '0000000001', 'N', 'Panadol', 'Junior', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70152', '', '000200', '01', '003', '0000000350', '0000000157', 'N', 'Panadol', 'Junior', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70153', '', '000200', '01', '003', '0000000350', '0000000068', 'N', 'Panadol', 'Junior', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('70154', '', '000200', '01', '003', '0000000350', '0000000062', 'N', 'Panadol', 'Junior', '', '', '', 'NLD', '7156', '13728', '077', 'NLD', '03', '001', '0', '20040624', '20040624', NULL, NULL),
('71515', '', '005097', '01', '001', '0000000001', '0000000001', 'N', 'Para-seltzer', '', '', '', '', 'UNS', '7156', '7157', '013', 'GBR', '80', '001', '0', '20040831', '20040831', NULL, NULL),
('71882', '', '000200', '01', '003', '0000000127', '0000000062', 'N', 'Panadol', 'Filmtabletten', '', '', '', 'CHE', '0', '11766', 'CHE', 'CHE', '04', '001', '0', '20040909', '20040909', NULL, NULL),
('72255', '', '000200', '01', '012', '0000000350', '0000000068', 'N', 'Ben-u-ron', '250mg supp. fur kleinkinder', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '04', '001', '0', '20040913', '20040913', NULL, NULL),
('72256', '', '000200', '01', '012', '0000000350', '0000000001', 'N', 'Ben-u-ron', 'Supp. fur kleinkinder', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '04', '001', '0', '20040913', '20040913', NULL, NULL),
('72257', '', '000200', '01', '012', '0000000351', '0000000083', 'N', 'Ben-u-ron', '1000mg supp fur erwachsene', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '04', '001', '0', '20040913', '20040913', NULL, NULL),
('72258', '', '000200', '01', '012', '0000000351', '0000000001', 'N', 'Ben-u-ron', 'Supp fur erwachsene', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '04', '001', '0', '20040913', '20040913', NULL, NULL),
('72608', '', '000200', '01', '005', '0000000251', '0000000013', 'N', 'Tylenol', 'Kinder tropfen', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040914', '20040914', NULL, NULL),
('72609', '', '000200', '01', '005', '0000000251', '0000000001', 'N', 'Tylenol', 'Kinder tropfen', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040914', '20040914', NULL, NULL),
('72911', '', '000200', '01', '005', '0000000350', '0000000013', 'N', 'Tylenol', 'Kinder 100 mg suppositorien', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040915', '20040915', NULL, NULL),
('72912', '', '000200', '01', '005', '0000000350', '0000000001', 'N', 'Tylenol', 'Kinder suppositorien', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040915', '20040915', NULL, NULL),
('72913', '', '000200', '01', '005', '0000000350', '0000000014', 'N', 'Tylenol', 'Kinder 200 mg suppositorien', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040915', '20040915', NULL, NULL),
('74158', '', '000200', '01', '005', '0000000104', '0000000053', 'N', 'Tylenol', 'Kinder kautabletten', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040921', '20040921', NULL, NULL),
('74159', '', '000200', '01', '005', '0000000104', '0000000001', 'N', 'Tylenol', 'Kinder kautabletten', '', '', '', 'CHE', '0', '5011', 'CHE', 'CHE', '04', '001', '0', '20040921', '20040921', NULL, NULL),
('74540', '', '000200', '01', '012', '0000000260', '0000000014', 'N', 'Ben-u-ron', 'Sirup', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '04', '001', '0', '20040921', '20050930', NULL, NULL),
('74541', '', '000200', '01', '012', '0000000260', '0000000001', 'N', 'Ben-u-ron', 'Sirup', '', '', '', 'CHE', '0', '11628', 'CHE', 'CHE', '04', '001', '0', '20040921', '20040921', NULL, NULL),
('74647', '', '000200', '01', '003', '0000000105', '0000000062', 'N', 'Panadol', 'Brausetabletten', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('74648', '', '000200', '01', '003', '0000000350', '0000000157', 'N', 'Panadol', '125 mg suppositorien', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('74649', '', '000200', '01', '003', '0000000105', '0000000001', 'N', 'Panadol', 'Brausetabletten', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('74650', '', '000200', '01', '003', '0000000350', '0000000001', 'N', 'Panadol', 'Suppositorien', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('74651', '', '000200', '01', '003', '0000000350', '0000000068', 'N', 'Panadol', '250 mg suppositorien', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('74652', '', '000200', '01', '003', '0000000350', '0000000062', 'N', 'Panadol', '500 mg suppositorien', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('74653', '', '000200', '01', '003', '0000000350', '0000000083', 'N', 'Panadol', '1000 mg suppositorien', '', '', '', 'CHE', '0', '11854', 'CHE', 'CHE', '04', '001', '0', '20040922', '20040922', NULL, NULL),
('82476', '', '000200', '01', '007', '0000000001', '0000000001', 'N', 'Calpol', '', '', '', '', 'UNS', '7156', '7157', '199', 'IRL', '01', '001', '0', '20041231', '20051231', NULL, NULL),
('85405', '', '000047', '02', '034', '0000000001', '0000000001', 'N', 'Bronchosan', '', '', '', '', 'UNS', '0', '0', 'SVK', 'SVK', '98', '001', '0', '20041231', '20041231', NULL, NULL),
('8755', '', '000429', '01', '001', '0000000001', '0000000001', 'Y', 'Dipyridamole', '', '', '', '', 'N/A', '0', '0', '001', 'N/A', '', '001', '0', '19851231', '19851231', NULL, NULL),
('87551', '', '000200', '01', '002', '0000000001', '0000000001', 'N', 'Dymadon', '', '', '', '', 'UNS', '0', '0', '012', 'AUS', '68', '001', '0', '20041231', '20041231', NULL, NULL),
('87552', '', '000200', '01', '004', '0000000001', '0000000001', 'N', 'Alvedon', '', '', '', '', 'UNS', '0', '7157', '019', 'SWE', '68', '001', '0', '20041231', '20060109', NULL, NULL),
('87553', '', '000200', '01', '006', '0000000001', '0000000001', 'N', 'Tempra', '', '', '', '', 'UNS', '0', '0', '014', 'CAN', '68', '001', '0', '20041231', '20041231', NULL, NULL),
('87554', '', '000200', '01', '008', '0000000001', '0000000001', 'N', 'Atasol', '', '', '', '', 'UNS', '0', '0', '014', 'CAN', '68', '001', '0', '20041231', '20041231', NULL, NULL),
('87555', '', '000200', '01', '010', '0000000001', '0000000001', 'N', 'Acamol', '', '', '', '', 'UNS', '0', '0', '038', 'ISR', '73', '001', '0', '20041231', '20041231', NULL, '2012-08-30 13:54:05'),
('87556', '', '000200', '01', '011', '0000000001', '0000000001', 'N', 'Hedex', '', '', '', '', 'UNS', '0', '0', '016', 'NLD', '73', '001', '0', '20041231', '20041231', NULL, NULL),
('8762', '', '000429', '01', '008', '0000000001', '0000000001', 'N', 'Anginal', '', '', '', '', 'JPN', '0', '11137', '036', 'JPN', '76', '001', '0', '19851231', '19851231', NULL, NULL),
('8783', '', '000429', '01', '001', '0000000001', '0000000001', 'N', 'Dipyridamole', '', '', '', '', 'BEL', '0', '3310', '072', 'BEL', '92', '001', '0', '19930630', '20041231', NULL, NULL),
('90683', '', '000429', '01', '008', '0000000001', '0000000001', 'N', 'Anginal', '', '', '', '', 'UNS', '0', '0', '036', 'JPN', '76', '001', '0', '20041231', '20041231', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acl_phinxlog`
--
ALTER TABLE `acl_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `adrs`
--
ALTER TABLE `adrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adr_lab_tests`
--
ALTER TABLE `adr_lab_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adr_list_of_drugs`
--
ALTER TABLE `adr_list_of_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adr_other_drugs`
--
ALTER TABLE `adr_other_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aefis`
--
ALTER TABLE `aefis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aefi_list_of_diluents`
--
ALTER TABLE `aefi_list_of_diluents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aefi_list_of_vaccines`
--
ALTER TABLE `aefi_list_of_vaccines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aro_id` (`aro_id`,`aco_id`),
  ADD KEY `aco_id` (`aco_id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doses`
--
ALTER TABLE `doses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_dictionaries`
--
ALTER TABLE `drug_dictionaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facility_codes`
--
ALTER TABLE `facility_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frequencies`
--
ALTER TABLE `frequencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_infos`
--
ALTER TABLE `help_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pqmps`
--
ALTER TABLE `pqmps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queued_jobs`
--
ALTER TABLE `queued_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue_phinxlog`
--
ALTER TABLE `queue_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `queue_processes`
--
ALTER TABLE `queue_processes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sadrs`
--
ALTER TABLE `sadrs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sadr_followups`
--
ALTER TABLE `sadr_followups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sadr_list_of_drugs`
--
ALTER TABLE `sadr_list_of_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sadr_other_drugs`
--
ALTER TABLE `sadr_other_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saefis`
--
ALTER TABLE `saefis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saefi_list_of_vaccines`
--
ALTER TABLE `saefi_list_of_vaccines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_counties`
--
ALTER TABLE `sub_counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `who_drugs`
--
ALTER TABLE `who_drugs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=487;
--
-- AUTO_INCREMENT for table `adrs`
--
ALTER TABLE `adrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `adr_lab_tests`
--
ALTER TABLE `adr_lab_tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `adr_list_of_drugs`
--
ALTER TABLE `adr_list_of_drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `adr_other_drugs`
--
ALTER TABLE `adr_other_drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `aefis`
--
ALTER TABLE `aefis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `aefi_list_of_diluents`
--
ALTER TABLE `aefi_list_of_diluents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `aefi_list_of_vaccines`
--
ALTER TABLE `aefi_list_of_vaccines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `doses`
--
ALTER TABLE `doses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `facility_codes`
--
ALTER TABLE `facility_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `frequencies`
--
ALTER TABLE `frequencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `help_infos`
--
ALTER TABLE `help_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `pqmps`
--
ALTER TABLE `pqmps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `queued_jobs`
--
ALTER TABLE `queued_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT for table `queue_processes`
--
ALTER TABLE `queue_processes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `sadrs`
--
ALTER TABLE `sadrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `sadr_followups`
--
ALTER TABLE `sadr_followups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sadr_list_of_drugs`
--
ALTER TABLE `sadr_list_of_drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `sadr_other_drugs`
--
ALTER TABLE `sadr_other_drugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `saefis`
--
ALTER TABLE `saefis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `saefi_list_of_vaccines`
--
ALTER TABLE `saefi_list_of_vaccines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_counties`
--
ALTER TABLE `sub_counties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
