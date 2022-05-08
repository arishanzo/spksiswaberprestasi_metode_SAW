-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2022 pada 11.14
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_kriteria`
--

CREATE TABLE `dt_kriteria` (
  `kd_kriteria` int(11) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `sifat` enum('Benefit','Cost','','') NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_kriteria`
--

INSERT INTO `dt_kriteria` (`kd_kriteria`, `id_kriteria`, `sifat`, `bobot`) VALUES
(10, 'C001', 'Benefit', 0.3),
(11, 'C003', 'Benefit', 0.15),
(12, 'C004', 'Benefit', 0.2),
(13, 'C005', 'Benefit', 0.15),
(14, 'C006', 'Benefit', 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_siswa`
--

CREATE TABLE `dt_siswa` (
  `kd_siswa` varchar(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `jurusan` varchar(15) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_siswa`
--

INSERT INTO `dt_siswa` (`kd_siswa`, `nama_siswa`, `jenis_kelamin`, `jurusan`, `kelas`, `alamat`) VALUES
('SWS001', 'Puspita marsa tami', 'Perempuan', 'Farmasi', '12 Farmasi', 'Kec.Deket'),
('SWS002', 'Muhammad Razha Al-Fauzi', 'Laki - Laki', 'TBSM', '11 TBSM', 'Kec.Lamongan'),
('SWS003', 'MOH. GHIFARI ZAKKAWALI', 'Laki - Laki', 'TBSM', '11 TBSM', 'Kec.Sarirejo'),
('SWS004', 'Muhammad rizky saputra', 'Laki - Laki', 'TBSM', '11 TBSM', 'Gresik'),
('SWS005', 'Ahmad Syarifuddin', 'Laki - Laki', 'TBSM', '11 TBSM', 'Kec.Sarirejo'),
('SWS006', 'Siti Nurhidayah', 'Perempuan', 'Farmasi', '12 Farmasi', 'Kec.Turi'),
('SWS007', 'Muhammad dedy adriyanto', 'Laki - Laki', 'TBSM', '11 TBSM', 'Gresik'),
('SWS008', 'Tutus Qomariyah', 'Perempuan', 'Farmasi', '12 Farmasi', 'Kec.Lamongan'),
('SWS009', 'Dhalia Fatma Angelina', 'Perempuan', 'Farmasi', '12 Farmasi', 'Kec.Lamongan'),
('SWS010', 'Zaini Abdul Ghoni', 'Laki - Laki', 'MM', '12 MM', 'kec.Turi'),
('SWS011', 'Moh masyhun', 'Laki - Laki', 'TBSM', '11 TBSM', 'Kec.Karangbinangun'),
('SWS012', 'Arzuli eka tita Handayani', 'Perempuan', 'TKJ', '12 TKJ', 'Kec. Lamongan'),
('SWS013', 'Moh. Reza Al-Faruq', 'Laki - Laki', 'TBSM', '11 TBSM', 'Kec.Karangbinangun'),
('SWS014', 'Alfian Rahmadani', 'Laki - Laki', 'TBSM', '11 TBSM', 'Kec.Lamongan'),
('SWS015', 'artha mevia anggraini ', 'Perempuan', 'TKJ', '12 TKJ', 'Kec.Turi'),
('SWS016', 'Fatmawati ', 'Perempuan', 'Farmasi', '12 Farmasi', 'Gresik'),
('SWS017', 'RAFI OKTASUMA', 'Laki - Laki', 'TBSM', '11 TBSM', 'Kec.Sarirejo'),
('SWS018', 'ZURROIDAH ARIF VANNY', 'Perempuan', 'Farmasi', '12 Farmasi', 'Kec.Glagah'),
('SWS019', 'Adelia maulidatul khasanah ', 'Perempuan', 'Farmasi', '12 Farmasi', 'Gresik'),
('SWS020', 'Syihabul Millah Arifin', 'Laki - Laki', 'TBSM', '12 TBSM', 'Kec.Lamongan'),
('SWS021', 'Nunuk iswati', 'Perempuan', 'AKL', '11 AKL', 'Kec.Lamongan'),
('SWS022', 'Moch ilvan dany saputa', 'Laki - Laki', 'TKJ', '12 TKJ', 'Kec.Lamongan'),
('SWS023', 'Zahrotul latifah', 'Perempuan', 'AKL', '11 AKL', 'Kec.Kembangbahu'),
('SWS024', 'Alifia Sherly Firnanda', 'Perempuan', 'AKL', '11 AKL', 'Kec.Lamongan'),
('SWS025', 'Fadilatul lailia', 'Perempuan', 'Farmasi', '12 Farmasi', 'Kec.Lamongan'),
('SWS026', 'FARCHAN MAULUDDIN', 'Laki - Laki', 'TBSM', '11 TBSM', 'Kec.Lamongan'),
('SWS027', 'M IVO MAGHFUR ', 'Laki - Laki', 'TKJ', '12 TKJ', 'Gresik'),
('SWS028', 'Intan nur aini', 'Perempuan', 'Farmasi', '12 Farmasi', 'Kec.Sarirejo'),
('SWS029', 'Anis amiliyanti', 'Perempuan', 'TKJ', '12 TKJ', 'Kec.Turi'),
('SWS030', 'Syamsul Maarif ', 'Laki - Laki', 'TBSM', '11 TBSM', 'Kec.Sarirejo'),
('SWS031', 'Nur sholikhatun khasana ', 'Perempuan', 'OTKP', '12 OTKP', 'Kec.Lamongan'),
('SWS032', 'ADELIA AJI PUSPITA SARI', 'Perempuan', 'OTKP', '12 OTKP', 'Kec.Lamongan'),
('SWS033', 'Muslikhah', 'Perempuan', 'OTKP', '12 OTKP', 'Kec.Tikung'),
('SWS034', 'Amelyta Kumala Wardana ', 'Perempuan', 'OTKP', '12 OTKP', 'Kec.Lamongan'),
('SWS035', 'Shelvi Novita Anggreini', 'Perempuan', 'OTKP', '12 OTKP', 'Kec.Kembangbahu'),
('SWS036', 'Farikhah', 'Perempuan', 'OTKP', '12 OTKP', 'Kec.Lamongan'),
('SWS037', 'Siti Nurul Marudloh', 'Perempuan', 'OTKP', '12 OTKP', 'Kec.Karangbinangun'),
('SWS038', 'ANNISA NURISMA APRILYANTI', 'Perempuan', 'Farmasi', '12 Farmasi', 'Kec.Lamongan'),
('SWS039', 'EKA APRILIYA MAFIDAH', 'Perempuan', 'Farmasi', '12 Farmasi', 'Kec.Lamongan'),
('SWS040', 'Aprilia suryan dini', 'Perempuan', 'Farmasi', '12 Farmasi', 'Kec.Turi'),
('SWS041', 'Ayuni rohmaniyah', 'Perempuan', 'Farmasi', '12 Farmasi', 'Gresik'),
('SWS042', 'Muhammad dafin firmansyah', 'Laki - Laki', 'OTKP', '12 OTKP', 'Kec.Tikung'),
('SWS043', 'SALSA MUAZIZAH', 'Perempuan', 'OTKP', '12 OTKP', 'Kec.Lamongan'),
('SWS044', 'Schesa', 'Perempuan', 'OTKP', '12 OTKP', 'Kec.Lamongan'),
('SWS045', 'Aliani Hanifah putri Trisayu', 'Perempuan', 'OTKP', '11 OTKP', 'Kec.Deket'),
('SWS046', 'Aris', 'Laki - Laki', 'Multimedia', '12 MM', 'Lamongan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `kd_hasil` int(11) NOT NULL,
  `kd_siswa` varchar(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`kd_hasil`, `kd_siswa`, `nilai`) VALUES
(2562, 'SWS001', 0.8250000178813934),
(2563, 'SWS002', 0.4312500171363354),
(2564, 'SWS003', 0.33125000819563866),
(2565, 'SWS004', 0.4750000089406967),
(2566, 'SWS005', 0.5562500171363354),
(2567, 'SWS006', 0.6687500216066837),
(2568, 'SWS007', 0.4062500111758709),
(2569, 'SWS008', 0.550000011920929),
(2570, 'SWS009', 0.5437500141561031),
(2571, 'SWS010', 0.6875000223517418),
(2572, 'SWS011', 0.5250000134110451),
(2573, 'SWS012', 0.6125000044703484),
(2574, 'SWS013', 0.381250012665987),
(2575, 'SWS014', 0.48750001192092896),
(2576, 'SWS015', 0.2750000059604645),
(2577, 'SWS016', 0.5062500201165676),
(2578, 'SWS017', 0.6375000104308128),
(2579, 'SWS018', 0.7999999970197678),
(2580, 'SWS019', 0.6562500037252903),
(2581, 'SWS020', 0.4687500111758709),
(2582, 'SWS021', 0.7125000208616257),
(2583, 'SWS022', 0.7875000089406967),
(2584, 'SWS023', 0.700000025331974),
(2585, 'SWS024', 0.9000000357627869),
(2586, 'SWS025', 0.6500000134110451),
(2587, 'SWS026', 0.2937500011175871),
(2588, 'SWS027', 0.3750000149011612),
(2589, 'SWS028', 0.7500000149011612),
(2590, 'SWS029', 0.5875000208616257),
(2591, 'SWS030', 0.32500001043081284),
(2592, 'SWS031', 0.5750000104308128),
(2593, 'SWS032', 0.5375000163912773),
(2594, 'SWS033', 0.48750001937150955),
(2595, 'SWS034', 0.5125000178813934),
(2596, 'SWS035', 0.42500000447034836),
(2597, 'SWS036', 0.45625001564621925),
(2598, 'SWS037', 0.48125001415610313),
(2599, 'SWS038', 0.8750000149011612),
(2600, 'SWS039', 0.5187500081956387),
(2601, 'SWS040', 0.7062500007450581),
(2602, 'SWS041', 0.5625000223517418),
(2603, 'SWS042', 0.4937500189989805),
(2604, 'SWS043', 0.9125000238418579),
(2605, 'SWS044', 0.3062500115483999),
(2606, 'SWS045', 0.618750024586916),
(2607, 'SWS046', 0.7999999970197678);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
('C001', 'Sertifikat Kompetensi Keahlian / Akademik / Non Akademik'),
('C003', 'Keaktifan Di Luar Sekolah'),
('C004', 'Nilai Rata-Rata Semester Ganjil atau Genap'),
('C005', 'Sikap'),
('C006', 'Absensi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int(11) NOT NULL,
  `kd_siswa` varchar(11) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `kd_siswa`, `id_kriteria`, `nilai`) VALUES
(6, 'SWS001', 'C001', 60),
(7, 'SWS001', 'C003', 80),
(8, 'SWS001', 'C004', 60),
(9, 'SWS001', 'C005', 80),
(10, 'SWS001', 'C006', 60),
(11, 'SWS002', 'C001', 10),
(12, 'SWS002', 'C003', 40),
(13, 'SWS002', 'C004', 60),
(14, 'SWS002', 'C005', 10),
(15, 'SWS002', 'C006', 60),
(16, 'SWS003', 'C001', 10),
(17, 'SWS003', 'C003', 10),
(18, 'SWS003', 'C004', 40),
(19, 'SWS003', 'C005', 40),
(20, 'SWS003', 'C006', 40),
(21, 'SWS004', 'C001', 10),
(22, 'SWS004', 'C003', 40),
(23, 'SWS004', 'C004', 60),
(24, 'SWS004', 'C005', 60),
(25, 'SWS004', 'C006', 40),
(26, 'SWS005', 'C001', 10),
(27, 'SWS005', 'C003', 10),
(28, 'SWS005', 'C004', 80),
(29, 'SWS005', 'C005', 80),
(30, 'SWS005', 'C006', 60),
(31, 'SWS006', 'C001', 40),
(32, 'SWS006', 'C003', 10),
(33, 'SWS006', 'C004', 60),
(34, 'SWS006', 'C005', 80),
(35, 'SWS006', 'C006', 80),
(36, 'SWS007', 'C001', 10),
(37, 'SWS007', 'C003', 10),
(38, 'SWS007', 'C004', 40),
(39, 'SWS007', 'C005', 80),
(40, 'SWS007', 'C006', 40),
(41, 'SWS008', 'C001', 10),
(42, 'SWS008', 'C003', 80),
(43, 'SWS008', 'C004', 60),
(44, 'SWS008', 'C005', 60),
(45, 'SWS008', 'C006', 40),
(46, 'SWS009', 'C001', 40),
(47, 'SWS009', 'C003', 10),
(48, 'SWS009', 'C004', 80),
(49, 'SWS009', 'C005', 40),
(50, 'SWS009', 'C006', 40),
(51, 'SWS010', 'C001', 10),
(52, 'SWS010', 'C003', 80),
(53, 'SWS010', 'C004', 60),
(54, 'SWS010', 'C005', 80),
(55, 'SWS010', 'C006', 80),
(56, 'SWS011', 'C001', 10),
(57, 'SWS011', 'C003', 60),
(58, 'SWS011', 'C004', 60),
(59, 'SWS011', 'C005', 40),
(60, 'SWS011', 'C006', 60),
(61, 'SWS012', 'C001', 10),
(62, 'SWS012', 'C003', 60),
(63, 'SWS012', 'C004', 80),
(64, 'SWS012', 'C005', 60),
(65, 'SWS012', 'C006', 60),
(66, 'SWS013', 'C001', 10),
(67, 'SWS013', 'C003', 10),
(68, 'SWS013', 'C004', 60),
(69, 'SWS013', 'C005', 40),
(70, 'SWS013', 'C006', 40),
(71, 'SWS014', 'C001', 10),
(72, 'SWS014', 'C003', 40),
(73, 'SWS014', 'C004', 40),
(74, 'SWS014', 'C005', 40),
(75, 'SWS014', 'C006', 80),
(76, 'SWS015', 'C001', 10),
(77, 'SWS015', 'C003', 10),
(78, 'SWS015', 'C004', 40),
(79, 'SWS015', 'C005', 10),
(80, 'SWS015', 'C006', 40),
(81, 'SWS016', 'C001', 10),
(82, 'SWS016', 'C003', 10),
(83, 'SWS016', 'C004', 60),
(84, 'SWS016', 'C005', 80),
(85, 'SWS016', 'C006', 60),
(86, 'SWS017', 'C001', 40),
(87, 'SWS017', 'C003', 40),
(88, 'SWS017', 'C004', 40),
(89, 'SWS017', 'C005', 60),
(90, 'SWS017', 'C006', 80),
(91, 'SWS018', 'C001', 60),
(92, 'SWS018', 'C003', 60),
(93, 'SWS018', 'C004', 60),
(94, 'SWS018', 'C005', 60),
(95, 'SWS018', 'C006', 80),
(96, 'SWS019', 'C001', 60),
(97, 'SWS019', 'C003', 10),
(98, 'SWS019', 'C004', 60),
(99, 'SWS019', 'C005', 60),
(100, 'SWS019', 'C006', 60),
(101, 'SWS020', 'C001', 10),
(102, 'SWS020', 'C003', 10),
(103, 'SWS020', 'C004', 60),
(104, 'SWS020', 'C005', 60),
(105, 'SWS020', 'C006', 60),
(106, 'SWS021', 'C001', 40),
(107, 'SWS021', 'C003', 80),
(108, 'SWS021', 'C004', 60),
(109, 'SWS021', 'C005', 60),
(110, 'SWS021', 'C006', 60),
(111, 'SWS022', 'C001', 60),
(112, 'SWS022', 'C003', 80),
(113, 'SWS022', 'C004', 60),
(114, 'SWS022', 'C005', 60),
(115, 'SWS022', 'C006', 60),
(116, 'SWS023', 'C001', 40),
(117, 'SWS023', 'C003', 80),
(118, 'SWS023', 'C004', 60),
(119, 'SWS023', 'C005', 80),
(120, 'SWS023', 'C006', 40),
(121, 'SWS024', 'C001', 80),
(122, 'SWS024', 'C003', 80),
(123, 'SWS024', 'C004', 60),
(124, 'SWS024', 'C005', 80),
(125, 'SWS024', 'C006', 60),
(126, 'SWS025', 'C001', 10),
(127, 'SWS025', 'C003', 80),
(128, 'SWS025', 'C004', 60),
(129, 'SWS025', 'C005', 60),
(130, 'SWS025', 'C006', 80),
(131, 'SWS026', 'C001', 10),
(132, 'SWS026', 'C003', 10),
(133, 'SWS026', 'C004', 10),
(134, 'SWS026', 'C005', 60),
(135, 'SWS026', 'C006', 40),
(136, 'SWS027', 'C001', 10),
(137, 'SWS027', 'C003', 10),
(138, 'SWS027', 'C004', 60),
(139, 'SWS027', 'C005', 10),
(140, 'SWS027', 'C006', 60),
(141, 'SWS028', 'C001', 60),
(142, 'SWS028', 'C003', 80),
(143, 'SWS028', 'C004', 60),
(144, 'SWS028', 'C005', 40),
(145, 'SWS028', 'C006', 60),
(146, 'SWS029', 'C001', 10),
(147, 'SWS029', 'C003', 80),
(148, 'SWS029', 'C004', 40),
(149, 'SWS029', 'C005', 80),
(150, 'SWS029', 'C006', 60),
(151, 'SWS030', 'C001', 10),
(152, 'SWS030', 'C003', 10),
(153, 'SWS030', 'C004', 60),
(154, 'SWS030', 'C005', 10),
(155, 'SWS030', 'C006', 40),
(156, 'SWS031', 'C001', 10),
(157, 'SWS031', 'C003', 60),
(158, 'SWS031', 'C004', 60),
(159, 'SWS031', 'C005', 40),
(160, 'SWS031', 'C006', 80),
(161, 'SWS032', 'C001', 10),
(162, 'SWS032', 'C003', 40),
(163, 'SWS032', 'C004', 60),
(164, 'SWS032', 'C005', 40),
(165, 'SWS032', 'C006', 80),
(166, 'SWS033', 'C001', 10),
(167, 'SWS033', 'C003', 40),
(168, 'SWS033', 'C004', 60),
(169, 'SWS033', 'C005', 40),
(170, 'SWS033', 'C006', 60),
(171, 'SWS034', 'C001', 10),
(172, 'SWS034', 'C003', 40),
(173, 'SWS034', 'C004', 60),
(174, 'SWS034', 'C005', 80),
(175, 'SWS034', 'C006', 40),
(176, 'SWS035', 'C001', 10),
(177, 'SWS035', 'C003', 40),
(178, 'SWS035', 'C004', 40),
(179, 'SWS035', 'C005', 60),
(180, 'SWS035', 'C006', 40),
(181, 'SWS036', 'C001', 10),
(182, 'SWS036', 'C003', 10),
(183, 'SWS036', 'C004', 60),
(184, 'SWS036', 'C005', 80),
(185, 'SWS036', 'C006', 40),
(186, 'SWS037', 'C001', 10),
(187, 'SWS037', 'C003', 10),
(188, 'SWS037', 'C004', 80),
(189, 'SWS037', 'C005', 40),
(190, 'SWS037', 'C006', 60),
(191, 'SWS038', 'C001', 60),
(192, 'SWS038', 'C003', 80),
(193, 'SWS038', 'C004', 60),
(194, 'SWS038', 'C005', 80),
(195, 'SWS038', 'C006', 80),
(196, 'SWS039', 'C001', 10),
(197, 'SWS039', 'C003', 10),
(198, 'SWS039', 'C004', 60),
(199, 'SWS039', 'C005', 60),
(200, 'SWS039', 'C006', 80),
(201, 'SWS040', 'C001', 60),
(202, 'SWS040', 'C003', 10),
(203, 'SWS040', 'C004', 60),
(204, 'SWS040', 'C005', 60),
(205, 'SWS040', 'C006', 80),
(206, 'SWS041', 'C001', 10),
(207, 'SWS041', 'C003', 80),
(208, 'SWS041', 'C004', 60),
(209, 'SWS041', 'C005', 40),
(210, 'SWS041', 'C006', 60),
(211, 'SWS042', 'C001', 40),
(212, 'SWS042', 'C003', 10),
(213, 'SWS042', 'C004', 60),
(214, 'SWS042', 'C005', 80),
(215, 'SWS042', 'C006', 10),
(216, 'SWS043', 'C001', 80),
(217, 'SWS043', 'C003', 80),
(218, 'SWS043', 'C004', 60),
(219, 'SWS043', 'C005', 60),
(220, 'SWS043', 'C006', 80),
(221, 'SWS044', 'C001', 10),
(222, 'SWS044', 'C003', 10),
(223, 'SWS044', 'C004', 60),
(224, 'SWS044', 'C005', 40),
(225, 'SWS044', 'C006', 10),
(226, 'SWS045', 'C001', 40),
(227, 'SWS045', 'C003', 10),
(228, 'SWS045', 'C004', 60),
(229, 'SWS045', 'C005', 80),
(230, 'SWS045', 'C006', 60),
(231, 'SWS046', 'C001', 60),
(232, 'SWS046', 'C003', 60),
(233, 'SWS046', 'C004', 60),
(234, 'SWS046', 'C005', 60),
(235, 'SWS046', 'C006', 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_normalisasi`
--

CREATE TABLE `nilai_normalisasi` (
  `kd_normalisasi` int(11) NOT NULL,
  `kd_siswa` varchar(11) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `nilai_normalisasi` float NOT NULL,
  `hitung` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_normalisasi`
--

INSERT INTO `nilai_normalisasi` (`kd_normalisasi`, `kd_siswa`, `id_kriteria`, `nilai_normalisasi`, `hitung`) VALUES
(11831, 'SWS001', 'C001', 0.75, 0.225),
(11832, 'SWS002', 'C001', 0.125, 0.0375),
(11833, 'SWS003', 'C001', 0.125, 0.0375),
(11834, 'SWS004', 'C001', 0.125, 0.0375),
(11835, 'SWS005', 'C001', 0.125, 0.0375),
(11836, 'SWS006', 'C001', 0.5, 0.15),
(11837, 'SWS007', 'C001', 0.125, 0.0375),
(11838, 'SWS008', 'C001', 0.125, 0.0375),
(11839, 'SWS009', 'C001', 0.5, 0.15),
(11840, 'SWS010', 'C001', 0.125, 0.0375),
(11841, 'SWS011', 'C001', 0.125, 0.0375),
(11842, 'SWS012', 'C001', 0.125, 0.0375),
(11843, 'SWS013', 'C001', 0.125, 0.0375),
(11844, 'SWS014', 'C001', 0.125, 0.0375),
(11845, 'SWS015', 'C001', 0.125, 0.0375),
(11846, 'SWS016', 'C001', 0.125, 0.0375),
(11847, 'SWS017', 'C001', 0.5, 0.15),
(11848, 'SWS018', 'C001', 0.75, 0.225),
(11849, 'SWS019', 'C001', 0.75, 0.225),
(11850, 'SWS020', 'C001', 0.125, 0.0375),
(11851, 'SWS021', 'C001', 0.5, 0.15),
(11852, 'SWS022', 'C001', 0.75, 0.225),
(11853, 'SWS023', 'C001', 0.5, 0.15),
(11854, 'SWS024', 'C001', 1, 0.3),
(11855, 'SWS025', 'C001', 0.125, 0.0375),
(11856, 'SWS026', 'C001', 0.125, 0.0375),
(11857, 'SWS027', 'C001', 0.125, 0.0375),
(11858, 'SWS028', 'C001', 0.75, 0.225),
(11859, 'SWS029', 'C001', 0.125, 0.0375),
(11860, 'SWS030', 'C001', 0.125, 0.0375),
(11861, 'SWS031', 'C001', 0.125, 0.0375),
(11862, 'SWS032', 'C001', 0.125, 0.0375),
(11863, 'SWS033', 'C001', 0.125, 0.0375),
(11864, 'SWS034', 'C001', 0.125, 0.0375),
(11865, 'SWS035', 'C001', 0.125, 0.0375),
(11866, 'SWS036', 'C001', 0.125, 0.0375),
(11867, 'SWS037', 'C001', 0.125, 0.0375),
(11868, 'SWS038', 'C001', 0.75, 0.225),
(11869, 'SWS039', 'C001', 0.125, 0.0375),
(11870, 'SWS040', 'C001', 0.75, 0.225),
(11871, 'SWS041', 'C001', 0.125, 0.0375),
(11872, 'SWS042', 'C001', 0.5, 0.15),
(11873, 'SWS043', 'C001', 1, 0.3),
(11874, 'SWS044', 'C001', 0.125, 0.0375),
(11875, 'SWS045', 'C001', 0.5, 0.15),
(11876, 'SWS046', 'C001', 0.75, 0.225),
(11877, 'SWS001', 'C003', 1, 0.15),
(11878, 'SWS002', 'C003', 0.5, 0.075),
(11879, 'SWS003', 'C003', 0.125, 0.01875),
(11880, 'SWS004', 'C003', 0.5, 0.075),
(11881, 'SWS005', 'C003', 0.125, 0.01875),
(11882, 'SWS006', 'C003', 0.125, 0.01875),
(11883, 'SWS007', 'C003', 0.125, 0.01875),
(11884, 'SWS008', 'C003', 1, 0.15),
(11885, 'SWS009', 'C003', 0.125, 0.01875),
(11886, 'SWS010', 'C003', 1, 0.15),
(11887, 'SWS011', 'C003', 0.75, 0.1125),
(11888, 'SWS012', 'C003', 0.75, 0.1125),
(11889, 'SWS013', 'C003', 0.125, 0.01875),
(11890, 'SWS014', 'C003', 0.5, 0.075),
(11891, 'SWS015', 'C003', 0.125, 0.01875),
(11892, 'SWS016', 'C003', 0.125, 0.01875),
(11893, 'SWS017', 'C003', 0.5, 0.075),
(11894, 'SWS018', 'C003', 0.75, 0.1125),
(11895, 'SWS019', 'C003', 0.125, 0.01875),
(11896, 'SWS020', 'C003', 0.125, 0.01875),
(11897, 'SWS021', 'C003', 1, 0.15),
(11898, 'SWS022', 'C003', 1, 0.15),
(11899, 'SWS023', 'C003', 1, 0.15),
(11900, 'SWS024', 'C003', 1, 0.15),
(11901, 'SWS025', 'C003', 1, 0.15),
(11902, 'SWS026', 'C003', 0.125, 0.01875),
(11903, 'SWS027', 'C003', 0.125, 0.01875),
(11904, 'SWS028', 'C003', 1, 0.15),
(11905, 'SWS029', 'C003', 1, 0.15),
(11906, 'SWS030', 'C003', 0.125, 0.01875),
(11907, 'SWS031', 'C003', 0.75, 0.1125),
(11908, 'SWS032', 'C003', 0.5, 0.075),
(11909, 'SWS033', 'C003', 0.5, 0.075),
(11910, 'SWS034', 'C003', 0.5, 0.075),
(11911, 'SWS035', 'C003', 0.5, 0.075),
(11912, 'SWS036', 'C003', 0.125, 0.01875),
(11913, 'SWS037', 'C003', 0.125, 0.01875),
(11914, 'SWS038', 'C003', 1, 0.15),
(11915, 'SWS039', 'C003', 0.125, 0.01875),
(11916, 'SWS040', 'C003', 0.125, 0.01875),
(11917, 'SWS041', 'C003', 1, 0.15),
(11918, 'SWS042', 'C003', 0.125, 0.01875),
(11919, 'SWS043', 'C003', 1, 0.15),
(11920, 'SWS044', 'C003', 0.125, 0.01875),
(11921, 'SWS045', 'C003', 0.125, 0.01875),
(11922, 'SWS046', 'C003', 0.75, 0.1125),
(11923, 'SWS001', 'C004', 0.75, 0.15),
(11924, 'SWS002', 'C004', 0.75, 0.15),
(11925, 'SWS003', 'C004', 0.5, 0.1),
(11926, 'SWS004', 'C004', 0.75, 0.15),
(11927, 'SWS005', 'C004', 1, 0.2),
(11928, 'SWS006', 'C004', 0.75, 0.15),
(11929, 'SWS007', 'C004', 0.5, 0.1),
(11930, 'SWS008', 'C004', 0.75, 0.15),
(11931, 'SWS009', 'C004', 1, 0.2),
(11932, 'SWS010', 'C004', 0.75, 0.15),
(11933, 'SWS011', 'C004', 0.75, 0.15),
(11934, 'SWS012', 'C004', 1, 0.2),
(11935, 'SWS013', 'C004', 0.75, 0.15),
(11936, 'SWS014', 'C004', 0.5, 0.1),
(11937, 'SWS015', 'C004', 0.5, 0.1),
(11938, 'SWS016', 'C004', 0.75, 0.15),
(11939, 'SWS017', 'C004', 0.5, 0.1),
(11940, 'SWS018', 'C004', 0.75, 0.15),
(11941, 'SWS019', 'C004', 0.75, 0.15),
(11942, 'SWS020', 'C004', 0.75, 0.15),
(11943, 'SWS021', 'C004', 0.75, 0.15),
(11944, 'SWS022', 'C004', 0.75, 0.15),
(11945, 'SWS023', 'C004', 0.75, 0.15),
(11946, 'SWS024', 'C004', 0.75, 0.15),
(11947, 'SWS025', 'C004', 0.75, 0.15),
(11948, 'SWS026', 'C004', 0.125, 0.025),
(11949, 'SWS027', 'C004', 0.75, 0.15),
(11950, 'SWS028', 'C004', 0.75, 0.15),
(11951, 'SWS029', 'C004', 0.5, 0.1),
(11952, 'SWS030', 'C004', 0.75, 0.15),
(11953, 'SWS031', 'C004', 0.75, 0.15),
(11954, 'SWS032', 'C004', 0.75, 0.15),
(11955, 'SWS033', 'C004', 0.75, 0.15),
(11956, 'SWS034', 'C004', 0.75, 0.15),
(11957, 'SWS035', 'C004', 0.5, 0.1),
(11958, 'SWS036', 'C004', 0.75, 0.15),
(11959, 'SWS037', 'C004', 1, 0.2),
(11960, 'SWS038', 'C004', 0.75, 0.15),
(11961, 'SWS039', 'C004', 0.75, 0.15),
(11962, 'SWS040', 'C004', 0.75, 0.15),
(11963, 'SWS041', 'C004', 0.75, 0.15),
(11964, 'SWS042', 'C004', 0.75, 0.15),
(11965, 'SWS043', 'C004', 0.75, 0.15),
(11966, 'SWS044', 'C004', 0.75, 0.15),
(11967, 'SWS045', 'C004', 0.75, 0.15),
(11968, 'SWS046', 'C004', 0.75, 0.15),
(11969, 'SWS001', 'C005', 1, 0.15),
(11970, 'SWS002', 'C005', 0.125, 0.01875),
(11971, 'SWS003', 'C005', 0.5, 0.075),
(11972, 'SWS004', 'C005', 0.75, 0.1125),
(11973, 'SWS005', 'C005', 1, 0.15),
(11974, 'SWS006', 'C005', 1, 0.15),
(11975, 'SWS007', 'C005', 1, 0.15),
(11976, 'SWS008', 'C005', 0.75, 0.1125),
(11977, 'SWS009', 'C005', 0.5, 0.075),
(11978, 'SWS010', 'C005', 1, 0.15),
(11979, 'SWS011', 'C005', 0.5, 0.075),
(11980, 'SWS012', 'C005', 0.75, 0.1125),
(11981, 'SWS013', 'C005', 0.5, 0.075),
(11982, 'SWS014', 'C005', 0.5, 0.075),
(11983, 'SWS015', 'C005', 0.125, 0.01875),
(11984, 'SWS016', 'C005', 1, 0.15),
(11985, 'SWS017', 'C005', 0.75, 0.1125),
(11986, 'SWS018', 'C005', 0.75, 0.1125),
(11987, 'SWS019', 'C005', 0.75, 0.1125),
(11988, 'SWS020', 'C005', 0.75, 0.1125),
(11989, 'SWS021', 'C005', 0.75, 0.1125),
(11990, 'SWS022', 'C005', 0.75, 0.1125),
(11991, 'SWS023', 'C005', 1, 0.15),
(11992, 'SWS024', 'C005', 1, 0.15),
(11993, 'SWS025', 'C005', 0.75, 0.1125),
(11994, 'SWS026', 'C005', 0.75, 0.1125),
(11995, 'SWS027', 'C005', 0.125, 0.01875),
(11996, 'SWS028', 'C005', 0.5, 0.075),
(11997, 'SWS029', 'C005', 1, 0.15),
(11998, 'SWS030', 'C005', 0.125, 0.01875),
(11999, 'SWS031', 'C005', 0.5, 0.075),
(12000, 'SWS032', 'C005', 0.5, 0.075),
(12001, 'SWS033', 'C005', 0.5, 0.075),
(12002, 'SWS034', 'C005', 1, 0.15),
(12003, 'SWS035', 'C005', 0.75, 0.1125),
(12004, 'SWS036', 'C005', 1, 0.15),
(12005, 'SWS037', 'C005', 0.5, 0.075),
(12006, 'SWS038', 'C005', 1, 0.15),
(12007, 'SWS039', 'C005', 0.75, 0.1125),
(12008, 'SWS040', 'C005', 0.75, 0.1125),
(12009, 'SWS041', 'C005', 0.5, 0.075),
(12010, 'SWS042', 'C005', 1, 0.15),
(12011, 'SWS043', 'C005', 0.75, 0.1125),
(12012, 'SWS044', 'C005', 0.5, 0.075),
(12013, 'SWS045', 'C005', 1, 0.15),
(12014, 'SWS046', 'C005', 0.75, 0.1125),
(12015, 'SWS001', 'C006', 0.75, 0.15),
(12016, 'SWS002', 'C006', 0.75, 0.15),
(12017, 'SWS003', 'C006', 0.5, 0.1),
(12018, 'SWS004', 'C006', 0.5, 0.1),
(12019, 'SWS005', 'C006', 0.75, 0.15),
(12020, 'SWS006', 'C006', 1, 0.2),
(12021, 'SWS007', 'C006', 0.5, 0.1),
(12022, 'SWS008', 'C006', 0.5, 0.1),
(12023, 'SWS009', 'C006', 0.5, 0.1),
(12024, 'SWS010', 'C006', 1, 0.2),
(12025, 'SWS011', 'C006', 0.75, 0.15),
(12026, 'SWS012', 'C006', 0.75, 0.15),
(12027, 'SWS013', 'C006', 0.5, 0.1),
(12028, 'SWS014', 'C006', 1, 0.2),
(12029, 'SWS015', 'C006', 0.5, 0.1),
(12030, 'SWS016', 'C006', 0.75, 0.15),
(12031, 'SWS017', 'C006', 1, 0.2),
(12032, 'SWS018', 'C006', 1, 0.2),
(12033, 'SWS019', 'C006', 0.75, 0.15),
(12034, 'SWS020', 'C006', 0.75, 0.15),
(12035, 'SWS021', 'C006', 0.75, 0.15),
(12036, 'SWS022', 'C006', 0.75, 0.15),
(12037, 'SWS023', 'C006', 0.5, 0.1),
(12038, 'SWS024', 'C006', 0.75, 0.15),
(12039, 'SWS025', 'C006', 1, 0.2),
(12040, 'SWS026', 'C006', 0.5, 0.1),
(12041, 'SWS027', 'C006', 0.75, 0.15),
(12042, 'SWS028', 'C006', 0.75, 0.15),
(12043, 'SWS029', 'C006', 0.75, 0.15),
(12044, 'SWS030', 'C006', 0.5, 0.1),
(12045, 'SWS031', 'C006', 1, 0.2),
(12046, 'SWS032', 'C006', 1, 0.2),
(12047, 'SWS033', 'C006', 0.75, 0.15),
(12048, 'SWS034', 'C006', 0.5, 0.1),
(12049, 'SWS035', 'C006', 0.5, 0.1),
(12050, 'SWS036', 'C006', 0.5, 0.1),
(12051, 'SWS037', 'C006', 0.75, 0.15),
(12052, 'SWS038', 'C006', 1, 0.2),
(12053, 'SWS039', 'C006', 1, 0.2),
(12054, 'SWS040', 'C006', 1, 0.2),
(12055, 'SWS041', 'C006', 0.75, 0.15),
(12056, 'SWS042', 'C006', 0.125, 0.025),
(12057, 'SWS043', 'C006', 1, 0.2),
(12058, 'SWS044', 'C006', 0.125, 0.025),
(12059, 'SWS045', 'C006', 0.75, 0.15),
(12060, 'SWS046', 'C006', 1, 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `kd_penilaian` int(11) NOT NULL,
  `id_kriteria` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `penilaian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`kd_penilaian`, `id_kriteria`, `keterangan`, `penilaian`) VALUES
(23, 'C001', 'Sertifikat Akademik', 80),
(24, 'C001', 'Sertifikat Keahlian / Jurusan', 60),
(25, 'C001', 'Sertifikat Non Akademik', 40),
(26, 'C001', 'Tidak Punya', 10),
(27, 'C003', 'Organisasi', 80),
(28, 'C003', 'Pelatihan / Webinar', 60),
(29, 'C003', 'Komunitas', 40),
(30, 'C003', 'Tidak Aktif', 10),
(31, 'C004', '100 - 90', 80),
(32, 'C004', '89-75', 60),
(33, 'C004', '74-60', 40),
(34, 'C004', '< 60', 10),
(35, 'C005', 'Baik', 80),
(36, 'C005', 'Lumayan Baik', 60),
(37, 'C005', 'Sedang', 40),
(38, 'C005', 'Kurang Baik', 10),
(39, 'C006', 'Kehadiran 100 %', 80),
(40, 'C006', 'Kehadiran 80 %', 60),
(41, 'C006', 'Kehadiran 60 %', 40),
(42, 'C006', 'Kehadiran < 60 %', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_berprestasi`
--

CREATE TABLE `siswa_berprestasi` (
  `id_berprestasi` int(12) NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `kd_siswa` varchar(11) NOT NULL,
  `Tgl` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa_berprestasi`
--

INSERT INTO `siswa_berprestasi` (`id_berprestasi`, `id_user`, `kd_siswa`, `Tgl`) VALUES
(1, 'USR001', 'SWS043', '2022'),
(2, 'USR001', 'SWS024', '2022'),
(3, 'USR001', 'SWS038', '2022'),
(4, 'USR001', 'SWS001', '2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` enum('Wali Kelas','Petugas','Kepala Sekolah','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `jabatan`) VALUES
('USR001', 'Aris Wahyudi', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Petugas'),
('USR002', 'Aris', 'adm', '21232f297a57a5a743894a0e4a801fc3', 'Petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dt_kriteria`
--
ALTER TABLE `dt_kriteria`
  ADD PRIMARY KEY (`kd_kriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `dt_siswa`
--
ALTER TABLE `dt_siswa`
  ADD PRIMARY KEY (`kd_siswa`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kd_hasil`),
  ADD KEY `kd_siswa` (`kd_siswa`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`),
  ADD KEY `kd_siswa` (`kd_siswa`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_normalisasi`
--
ALTER TABLE `nilai_normalisasi`
  ADD PRIMARY KEY (`kd_normalisasi`),
  ADD KEY `kd_siswa` (`kd_siswa`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`kd_penilaian`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `siswa_berprestasi`
--
ALTER TABLE `siswa_berprestasi`
  ADD PRIMARY KEY (`id_berprestasi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_siswa` (`kd_siswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dt_kriteria`
--
ALTER TABLE `dt_kriteria`
  MODIFY `kd_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `kd_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2608;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT untuk tabel `nilai_normalisasi`
--
ALTER TABLE `nilai_normalisasi`
  MODIFY `kd_normalisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12061;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `kd_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `siswa_berprestasi`
--
ALTER TABLE `siswa_berprestasi`
  MODIFY `id_berprestasi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dt_kriteria`
--
ALTER TABLE `dt_kriteria`
  ADD CONSTRAINT `dt_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`kd_siswa`) REFERENCES `dt_siswa` (`kd_siswa`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kd_siswa`) REFERENCES `dt_siswa` (`kd_siswa`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `nilai_normalisasi`
--
ALTER TABLE `nilai_normalisasi`
  ADD CONSTRAINT `nilai_normalisasi_ibfk_1` FOREIGN KEY (`kd_siswa`) REFERENCES `dt_siswa` (`kd_siswa`),
  ADD CONSTRAINT `nilai_normalisasi_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `siswa_berprestasi`
--
ALTER TABLE `siswa_berprestasi`
  ADD CONSTRAINT `siswa_berprestasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `siswa_berprestasi_ibfk_2` FOREIGN KEY (`kd_siswa`) REFERENCES `dt_siswa` (`kd_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
