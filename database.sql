-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 31, 2018 at 01:30 PM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u577519362_phk`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL DEFAULT '',
  `jabatan_karyawan` varchar(100) NOT NULL,
  `status` enum('daftar','unggulan','belum unggulan') NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `jabatan_karyawan`, `status`, `total`) VALUES
(65, 'Umaysaroh', 'OB', 'unggulan', 3.5181950989198),
(67, 'Irsan Jossy', 'OB', 'unggulan', 0),
(68, 'Subhan Sory', 'OB', 'unggulan', 0),
(69, 'Yahintya', 'OB', 'unggulan', 0),
(70, 'Hadi Ubaidillah', 'OB', 'unggulan', 0),
(71, 'Ichwan', 'OB', 'unggulan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan_nilai`
--

CREATE TABLE `karyawan_nilai` (
  `id_karyawan_nilai` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan_nilai`
--

INSERT INTO `karyawan_nilai` (`id_karyawan_nilai`, `id_karyawan`, `id_kriteria`, `id_subkriteria`, `id_nilai`) VALUES
(226, 51, 13, 46, 46),
(227, 51, 14, 51, 51),
(228, 51, 16, 60, 60),
(229, 51, 17, 66, 66),
(230, 51, 20, 82, 82),
(314, 65, 13, 49, 49),
(315, 65, 14, 53, 53),
(316, 65, 16, 62, 62),
(317, 65, 17, 65, 65),
(318, 65, 20, 82, 82),
(319, 65, 22, 87, 87),
(320, 65, 23, 90, 90),
(321, 65, 24, 95, 95),
(330, 67, 13, 48, 48),
(331, 67, 14, 51, 51),
(332, 67, 16, 61, 61),
(333, 67, 17, 66, 66),
(334, 67, 20, 83, 83),
(335, 67, 22, 86, 86),
(336, 67, 23, 90, 90),
(337, 67, 24, 94, 94),
(338, 68, 13, 45, 45),
(339, 68, 14, 53, 53),
(340, 68, 16, 63, 63),
(341, 68, 17, 68, 68),
(342, 68, 20, 82, 82),
(343, 68, 22, 87, 87),
(344, 68, 23, 92, 92),
(345, 68, 24, 95, 95),
(346, 69, 13, 45, 45),
(347, 69, 14, 53, 53),
(348, 69, 16, 63, 63),
(349, 69, 17, 68, 68),
(350, 69, 20, 83, 83),
(351, 69, 22, 88, 88),
(352, 69, 23, 92, 92),
(353, 69, 24, 96, 96),
(354, 70, 13, 48, 48),
(355, 70, 14, 50, 50),
(356, 70, 16, 60, 60),
(357, 70, 17, 65, 65),
(358, 70, 20, 80, 80),
(359, 70, 22, 87, 87),
(360, 70, 23, 90, 90),
(361, 70, 24, 94, 94),
(362, 71, 13, 46, 46),
(363, 71, 14, 51, 51),
(364, 71, 16, 60, 60),
(365, 71, 17, 66, 66),
(366, 71, 20, 81, 81),
(367, 71, 22, 87, 87),
(368, 71, 23, 91, 91),
(369, 71, 24, 94, 94);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(13, 'Pendidikan'),
(14, 'Lama Waktu Kerja'),
(16, 'Dedikasi'),
(17, 'Umur'),
(20, 'Kinerja'),
(22, 'Kedisiplinan'),
(23, 'Attitude'),
(24, 'Penilaian Subjektif');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_nilai`
--

CREATE TABLE `kriteria_nilai` (
  `id_kriteria_nilai` int(11) NOT NULL,
  `kriteria_id_dari` int(11) NOT NULL,
  `kriteria_id_tujuan` int(11) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_nilai`
--

INSERT INTO `kriteria_nilai` (`id_kriteria_nilai`, `kriteria_id_dari`, `kriteria_id_tujuan`, `nilai`) VALUES
(771, 13, 14, 2),
(772, 13, 16, 3),
(773, 13, 17, 2),
(774, 13, 20, 3),
(775, 13, 22, 2),
(776, 13, 23, 3),
(777, 13, 24, 5),
(778, 14, 16, 2),
(779, 14, 17, 2),
(780, 14, 20, 3),
(781, 14, 22, 3),
(782, 14, 23, 2),
(783, 14, 24, 2),
(784, 16, 17, 3),
(785, 16, 20, 3),
(786, 16, 22, 2),
(787, 16, 23, 2),
(788, 16, 24, 3),
(789, 17, 20, 3),
(790, 17, 22, 3),
(791, 17, 23, 2),
(792, 17, 24, 2),
(793, 20, 22, 2),
(794, 20, 23, 2),
(795, 20, 24, 3),
(796, 22, 23, 2),
(797, 22, 24, 2),
(798, 23, 24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kategori`
--

CREATE TABLE `nilai_kategori` (
  `id_nilai` int(11) NOT NULL,
  `nama_nilai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kategori`
--

INSERT INTO `nilai_kategori` (`id_nilai`, `nama_nilai`) VALUES
(1, 'Sangat Baik'),
(2, 'Baik'),
(3, 'Cukup'),
(4, 'Kurang'),
(5, 'Sangat Kurang');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `tipe` enum('teks','nilai') NOT NULL,
  `nilai_minimum` double DEFAULT NULL,
  `nilai_maksimum` double DEFAULT NULL,
  `op_min` varchar(4) DEFAULT NULL,
  `op_max` varchar(4) DEFAULT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_subkriteria`, `nama_subkriteria`, `id_kriteria`, `tipe`, `nilai_minimum`, `nilai_maksimum`, `op_min`, `op_max`, `id_nilai`) VALUES
(45, 'SMK', 13, 'teks', 91, 100, '=>', '<=', 4),
(46, 'D3', 13, 'teks', 81, 90, '=>', '<=', 3),
(47, 'S1', 13, 'teks', 71, 80, '=>', '<=', 2),
(48, 'S2', 13, 'teks', 61, 70, '=>', '<=', 1),
(49, 'SMA', 13, 'teks', 0, 60, '=>', '<', 5),
(50, '=> 5 <= 10', 14, 'nilai', 5, 10, '=>', '<=', 1),
(51, '=> 3 <= 5', 14, 'nilai', 3, 5, '=>', '<=', 2),
(52, '=> 1 <= 3', 14, 'nilai', 1, 3, '=>', '<=', 3),
(53, '=> 0 <= 1', 14, 'nilai', 0, 1, '=>', '<=', 4),
(55, '=> 91 <= 100', 15, 'nilai', 91, 100, '=>', '<=', 1),
(56, '=> 81 <= 90', 15, 'nilai', 81, 90, '=>', '<=', 2),
(57, '=> 71 <= 80', 15, 'nilai', 71, 80, '=>', '<=', 3),
(58, '=> 61 <= 70', 15, 'nilai', 61, 70, '=>', '<=', 4),
(59, '=> 0 <= 60', 15, 'nilai', 0, 60, '=>', '<=', 5),
(60, '< 80 < 100', 16, 'nilai', 80, 100, '<', '<', 1),
(61, '< 50 < 80', 16, 'nilai', 50, 80, '<', '<', 2),
(62, '< 30 < 50', 16, 'nilai', 30, 50, '<', '<', 3),
(63, '< 0 < 30', 16, 'nilai', 0, 30, '<', '<', 4),
(65, '< 22 < 26', 17, 'nilai', 22, 26, '<', '<', 1),
(66, '< 26 < 35', 17, 'nilai', 26, 35, '<', '<', 2),
(67, '< 35 < 45', 17, 'nilai', 35, 45, '<', '<', 3),
(68, '< 45 < 55', 17, 'nilai', 45, 55, '<', '<', 4),
(70, '100% menggunakan buku teks', 18, 'teks', NULL, NULL, NULL, NULL, 1),
(71, '95%-99% menggunakan buku teks', 18, 'teks', NULL, NULL, NULL, NULL, 2),
(72, '90%-94% menggunakan buku teks', 18, 'teks', NULL, NULL, NULL, NULL, 3),
(73, '85%-89% menggunakan buku teks', 18, 'teks', NULL, NULL, NULL, NULL, 4),
(74, 'Kurang dari 85% menggunakan buku teks', 18, 'teks', NULL, NULL, NULL, NULL, 5),
(75, '20% atau lebih berpendidikan S2 dan/atau S3, seleb', 19, 'teks', NULL, NULL, NULL, NULL, 1),
(76, '100% berpendidikan S1/D4', 19, 'teks', NULL, NULL, NULL, NULL, 2),
(77, '91%-99% berpendidikan S1/D4', 19, 'teks', NULL, NULL, NULL, NULL, 3),
(78, '81%-90% berpendidikan S1/D4', 19, 'teks', NULL, NULL, NULL, NULL, 4),
(79, 'Kurang dari 81% berpendidikan S1/D4', 19, 'teks', NULL, NULL, NULL, NULL, 5),
(80, 'Sangat Baik', 20, 'teks', NULL, NULL, NULL, NULL, 1),
(81, 'Baik', 20, 'teks', NULL, NULL, NULL, NULL, 2),
(82, 'Cukup', 20, 'teks', NULL, NULL, NULL, NULL, 3),
(83, 'Kurang Baik', 20, 'teks', NULL, NULL, NULL, NULL, 4),
(85, 'Sangat Baik', 22, 'teks', NULL, NULL, NULL, NULL, 1),
(86, 'Baik', 22, 'teks', NULL, NULL, NULL, NULL, 2),
(87, 'Cukup', 22, 'teks', NULL, NULL, NULL, NULL, 3),
(88, 'Kurang Baik', 22, 'teks', NULL, NULL, NULL, NULL, 4),
(89, 'Sangat Baik', 23, 'teks', NULL, NULL, NULL, NULL, 1),
(90, 'Baik', 23, 'teks', NULL, NULL, NULL, NULL, 2),
(91, 'Cukup', 23, 'teks', NULL, NULL, NULL, NULL, 3),
(92, 'Kurang Baik', 23, 'teks', NULL, NULL, NULL, NULL, 4),
(93, 'Sangat Baik', 24, 'teks', NULL, NULL, NULL, NULL, 1),
(94, 'Baik', 24, 'teks', NULL, NULL, NULL, NULL, 2),
(95, 'Cukup', 24, 'teks', NULL, NULL, NULL, NULL, 3),
(96, 'Kurang Baik', 24, 'teks', NULL, NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_hasil`
--

CREATE TABLE `subkriteria_hasil` (
  `id_subkriteria_hasil` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `prioritas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_hasil`
--

INSERT INTO `subkriteria_hasil` (`id_subkriteria_hasil`, `id_subkriteria`, `prioritas`) VALUES
(83, 45, 0.20413238951597476),
(84, 46, 0.3417175999113913),
(85, 47, 0.5244670889007481),
(86, 48, 1),
(87, 49, 0.09918741755862778),
(88, 50, 1),
(89, 51, 0.5797605252993434),
(90, 52, 0.5493755632805459),
(91, 53, 0.20072099909875113),
(92, 54, 0.1684946627666549),
(93, 60, 1),
(94, 61, 0.21178188314887259),
(95, 62, 0.18580955091954202),
(96, 63, 0.174678551392686),
(97, 64, 0.1684946627666549),
(98, 65, 1),
(99, 66, 0.21178188314887259),
(100, 67, 0.18580955091954202),
(101, 68, 0.174678551392686),
(102, 69, 0.1684946627666549),
(103, 80, 1),
(104, 81, 0.21178188314887259),
(105, 82, 0.18580955091954202),
(106, 83, 0.174678551392686),
(107, 84, 0.1684946627666549),
(108, 85, 0.5757575757575758),
(109, 86, 0.5757575757575758),
(110, 87, 1),
(111, 88, 0.393939393939394),
(112, 93, 1),
(113, 94, 0.42757857978366576),
(114, 95, 0.29390325435396414),
(115, 96, 0.1445740455789511),
(116, 89, 1),
(117, 90, 0.5527643260694108),
(118, 91, 0.3890234059725585),
(119, 92, 0.20375975248856606);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria_nilai`
--

CREATE TABLE `subkriteria_nilai` (
  `id_subkriteria_nilai` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `subkriteria_id_dari` int(11) NOT NULL,
  `subkriteria_id_tujuan` int(11) NOT NULL,
  `nilai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria_nilai`
--

INSERT INTO `subkriteria_nilai` (`id_subkriteria_nilai`, `id_kriteria`, `subkriteria_id_dari`, `subkriteria_id_tujuan`, `nilai`) VALUES
(585, 16, 60, 61, 3),
(586, 16, 60, 62, 5),
(587, 16, 60, 63, 7),
(588, 16, 60, 64, 9),
(589, 16, 61, 62, 1),
(590, 16, 61, 63, 1),
(591, 16, 61, 64, 1),
(592, 16, 62, 63, 1),
(593, 16, 62, 64, 1),
(594, 16, 63, 64, 1),
(595, 17, 65, 66, 3),
(596, 17, 65, 67, 5),
(597, 17, 65, 68, 7),
(598, 17, 65, 69, 9),
(599, 17, 66, 67, 1),
(600, 17, 66, 68, 1),
(601, 17, 66, 69, 1),
(602, 17, 67, 68, 1),
(603, 17, 67, 69, 1),
(604, 17, 68, 69, 1),
(605, 20, 80, 81, 3),
(606, 20, 80, 82, 5),
(607, 20, 80, 83, 7),
(608, 20, 80, 84, 9),
(609, 20, 81, 82, 1),
(610, 20, 81, 83, 1),
(611, 20, 81, 84, 1),
(612, 20, 82, 83, 1),
(613, 20, 82, 84, 1),
(614, 20, 83, 84, 1),
(615, 22, 85, 86, 1),
(616, 22, 85, 87, 1),
(617, 22, 85, 88, 1),
(618, 22, 86, 87, 1),
(619, 22, 86, 88, 1),
(620, 22, 87, 88, 9),
(631, 13, 48, 47, 5),
(632, 13, 48, 46, 5),
(633, 13, 48, 45, 5),
(634, 13, 48, 49, 5),
(635, 13, 47, 46, 5),
(636, 13, 47, 45, 5),
(637, 13, 47, 49, 4),
(638, 13, 46, 45, 5),
(639, 13, 46, 49, 5),
(640, 13, 45, 49, 5),
(647, 14, 50, 51, 3),
(648, 14, 50, 52, 2),
(649, 14, 50, 53, 3),
(650, 14, 51, 52, 2),
(651, 14, 51, 53, 3),
(652, 14, 52, 53, 5),
(653, 24, 93, 94, 3),
(654, 24, 93, 95, 4),
(655, 24, 93, 96, 5),
(656, 24, 94, 95, 2),
(657, 24, 94, 96, 3),
(658, 24, 95, 96, 3),
(659, 23, 89, 90, 3),
(660, 23, 89, 91, 2),
(661, 23, 89, 92, 4),
(662, 23, 90, 91, 2),
(663, 23, 90, 92, 3),
(664, 23, 91, 92, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', 'suPo-mllp0t.uEXFBxuWeu01206297e748015fbf', 1501472329, 'zEahHqzut9/J0V.p/DgMHe', 1268889823, 1546262460, 1, 'Akbar', 'Abustang', 'ADMIN', '0'),
(2, '::1', 'ubaycreative@gmail.com', '$2y$08$zKAnhhSI42sO3qS7VtAwH.JN.bVmyvEd/yP91trn73V66rfYxozW2', NULL, 'ubaycreative@gmail.com', NULL, NULL, NULL, NULL, 1538713823, NULL, 1, 'Hadi', 'Ubaidillah', 'PT. Vico Indonesia', '81210336631');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(5, 1, 1),
(6, 1, 2),
(8, 2, 1),
(9, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `karyawan_nilai`
--
ALTER TABLE `karyawan_nilai`
  ADD PRIMARY KEY (`id_karyawan_nilai`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  ADD PRIMARY KEY (`id_kriteria_nilai`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `subkriteria_hasil`
--
ALTER TABLE `subkriteria_hasil`
  ADD PRIMARY KEY (`id_subkriteria_hasil`);

--
-- Indexes for table `subkriteria_nilai`
--
ALTER TABLE `subkriteria_nilai`
  ADD PRIMARY KEY (`id_subkriteria_nilai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `karyawan_nilai`
--
ALTER TABLE `karyawan_nilai`
  MODIFY `id_karyawan_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kriteria_nilai`
--
ALTER TABLE `kriteria_nilai`
  MODIFY `id_kriteria_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=799;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilai_kategori`
--
ALTER TABLE `nilai_kategori`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `subkriteria_hasil`
--
ALTER TABLE `subkriteria_hasil`
  MODIFY `id_subkriteria_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `subkriteria_nilai`
--
ALTER TABLE `subkriteria_nilai`
  MODIFY `id_subkriteria_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=665;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
