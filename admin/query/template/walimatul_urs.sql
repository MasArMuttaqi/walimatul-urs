-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 02:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `walimatul_urs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `pin` int(6) NOT NULL,
  `status` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `pin`, `status`, `ts`) VALUES
(1, 'riza', 123456, 1, '2022-02-20 16:46:17'),
(2, 'Aftina', 789101, 1, '2022-02-20 18:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `rec_num` int(11) NOT NULL,
  `agenda` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` text NOT NULL,
  `tempat` text NOT NULL,
  `koordinat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`rec_num`, `agenda`, `tanggal`, `jam`, `tempat`, `koordinat`) VALUES
(1, 'Akad Nikah', '2023-04-09', '10:25 - 12:49', 'Paciran Lamongan Jawa Timur', 'https://goo.gl/maps/P1JiNfzur3dVZBv5A'),
(2, 'Walimatul Urs', '2023-04-09', '13:00 - 15:50', 'Paciran Lamongan Jawa Timur', 'https://goo.gl/maps/P1JiNfzur3dVZBv5A'),
(3, 'Ngunduh Mantu', '2023-04-12', '09:31 - 13:23', 'Sulang, Rembang, Jawa Tengah', 'https://goo.gl/maps/VdQDEEER2F2iw6R68');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `rec_num` int(11) NOT NULL,
  `nama` text NOT NULL,
  `pesan` text NOT NULL,
  `ts` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`rec_num`, `nama`, `pesan`, `ts`) VALUES
(1, 'Mas Rangga Bimantika, M.Eng', 'Selamat menempuh lembar hidup baru ya mas... ', '2022-02-18 22:04:43'),
(2, 'Mbak Nur Jannah', 'Alhamdullah, selamat ya', '2022-02-18 22:19:30'),
(3, 'Bapak H. Bekti Indramadji, M.Pd', 'Selamat ya den, semoga keberkahan nikah selalu tercurahkan dari-Nya', '2022-02-21 01:15:52');

-- --------------------------------------------------------

--
-- Table structure for table `tamu_undangan`
--

CREATE TABLE `tamu_undangan` (
  `uid` varchar(30) NOT NULL,
  `callname` varchar(6) NOT NULL,
  `nama` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `undangan` text NOT NULL,
  `ts` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tamu_undangan`
--

INSERT INTO `tamu_undangan` (`uid`, `callname`, `nama`, `telepon`, `undangan`, `ts`) VALUES
('620d221d83dcd', 'Bapak', 'Drs. Labuisi, M.MP', '628111186586', 'kirim kabar', '2022-02-16 23:11:09'),
('620d2365ac894', 'Mbak', 'Nur Jannah', '6285161169386', 'Walimatul Urs', '2022-02-19 23:53:12'),
('621254e56d2cb', 'Bapak', 'Rangga Bimantika, M.Eng', '6285161169386', 'Ngunduh Mantu', '2022-02-20 21:52:33'),
('621263c934c60', 'Bapak', 'H. Bekti Indramadji, M.Pd', '628000000000', 'Akad Nikah', '2022-02-20 22:56:00'),
('621263c939758', 'Mbak', 'Sri Rahayu, S.Ds', '6290000000000', 'Akad Nikah', '2022-02-20 23:17:21'),
('621263c93a491', 'Mas', 'Moch. Dodi Cahyadi, M.Hum', '6280000000000', 'Akad Nikah', '2022-02-20 23:16:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`rec_num`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`rec_num`);

--
-- Indexes for table `tamu_undangan`
--
ALTER TABLE `tamu_undangan`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `rec_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `rec_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
