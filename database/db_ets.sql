-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2020 at 08:16 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ets`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admakun`
--

CREATE TABLE `tbl_admakun` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admakun`
--

INSERT INTO `tbl_admakun` (`id`, `email`, `nama`, `password`) VALUES
(1, 'admin@admin.com', 'admin', '123'),
(2, 'admin2@admin.com', 'Budi', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id` int(255) NOT NULL,
  `id_siswa` int(255) NOT NULL,
  `nilai` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quiz`
--

CREATE TABLE `tbl_quiz` (
  `id` varchar(100) NOT NULL,
  `NIS` int(10) NOT NULL,
  `nama_siswa` varchar(10) NOT NULL,
  `sts_quiz1` tinyint(1) NOT NULL,
  `sts_quiz2` tinyint(1) NOT NULL,
  `bobot_niali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `NIS` int(15) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `jk` int(11) NOT NULL,
  `n_quiz1` int(11) NOT NULL,
  `n_quiz2` int(11) NOT NULL,
  `s_quiz1` int(1) NOT NULL,
  `s_quiz2` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`NIS`, `nama_siswa`, `foto`, `kelas`, `jk`, `n_quiz1`, `n_quiz2`, `s_quiz1`, `s_quiz2`) VALUES
(1705002, 'Dwi Andika SI', '1.jpg', '8 - B', 1, 0, 0, 0, 0),
(1705003, 'Dwi Andika', 'aimer_adwn2.jpg', '8 - B', 0, 0, 0, 0, 0),
(1705004, 'Dwi Andika S', '18768520_1388920041198805_6123222665156865020_o.jpg', '8 - A', 1, 0, 0, 0, 0),
(1705005, 'Dwi Andika 5', '23334166_1550726695018138_2215868042835596424_o.jpg', '8 - C', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id_soal` int(25) NOT NULL,
  `soal` text,
  `a` varchar(30) NOT NULL,
  `b` varchar(30) NOT NULL,
  `c` varchar(30) NOT NULL,
  `d` varchar(30) NOT NULL,
  `j_benar` varchar(30) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `quiz` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_soal`
--

INSERT INTO `tbl_soal` (`id_soal`, `soal`, `a`, `b`, `c`, `d`, `j_benar`, `gambar`, `quiz`) VALUES
(7, 'ini soal 1', 'ini jawaban 1', 'ini jawaban salah ke 1', 'ini jawaban salah ke 2', 'ini jawaban salah ke 3', 'a', '', 1),
(9, 'coba ke 2', 'a', 'b', 'c', 'd', 'b', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admakun`
--
ALTER TABLE `tbl_admakun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_siswa` (`id_siswa`);

--
-- Indexes for table `tbl_quiz`
--
ALTER TABLE `tbl_quiz`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NIS` (`NIS`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- Indexes for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admakun`
--
ALTER TABLE `tbl_admakun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id_soal` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
