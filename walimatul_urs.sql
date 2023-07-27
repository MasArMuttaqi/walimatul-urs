-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 20, 2023 at 09:28 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

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

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `pin` int(6) NOT NULL,
  `status` int(11) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `pin`, `status`, `ts`) VALUES
(1, 'Riza', 123456, 1, '2022-02-21 16:41:31'),
(2, 'Aftina', 622143, 1, '2022-02-21 16:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `rec_num` int(11) NOT NULL AUTO_INCREMENT,
  `agenda` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` text NOT NULL,
  `tempat` text NOT NULL,
  `koordinat` text NOT NULL,
  PRIMARY KEY (`rec_num`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`rec_num`, `agenda`, `tanggal`, `jam`, `tempat`, `koordinat`) VALUES
(1, 'Akad Nikah dan Walimatul Urs', '2023-10-21', '09:30 - 15:00', 'Sendangagung, Paciran, Lamongan, Jawa Timur', 'https://goo.gl/maps/X4FP9shUk5JZLn5VA'),
(3, 'Ngunduh Mantu', '2023-10-26', '09:00 - 12:00', 'Sulang, Rembang, Jawa Tengah', 'https://goo.gl/maps/VdQDEEER2F2iw6R68'),
(4, 'Ngunduh Mantu (sesi 2)', '2023-10-26', '12:30 - 13:30', 'Sulang, Rembang, Jawa Tengah', 'https://goo.gl/maps/VdQDEEER2F2iw6R68');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

DROP TABLE IF EXISTS `galeri`;
CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `content` text NOT NULL,
  `ts` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `category`, `content`, `ts`) VALUES
(1, 1, '1eaVE26Ectn2VvSIQ5X5TrOL93Az9arsI | <p>Sudah purnama penuh cintaku bersamamu<br />\r\nKamu adalah muara bagiku, kukan tunaikan janji suci untukmu.</p>\r\n', '2022-03-21 14:39:44'),
(2, 2, '<blockquote><strong>Hanya</strong><br />\r\nHanya suara burung yang<br />\r\ndan tak pernah kaulihat burung<br />\r\ntapi tahu burung itu ada di sana.<br />\r\n<br />\r\nHanya desir angin yang kaurasa<br />\r\ndan tak pernah kaulihat angin itu<br />\r\ntapi percaya angin itu di sekitarmu.<br />\r\n<br />\r\nHanya doaku yang bergetar malam ini<br />\r\ndan tak pernah kaulihat siapa aku<br />\r\ntapi yakin aku ada dalam dirimu.<br />\r\n<br />\r\n<em>Sapardi Djoko Damono</em></blockquote>\r\n', '2022-03-13 13:18:53'),
(3, 2, '<blockquote>\r\n<p>Rindumu kuaci, kumakan sekali lalu sulit sekali berhenti</p>\r\n\r\n<p><em>dalam buku Perihal Cinta Kita Semua Pemula - Mohammad Ali Ma&rsquo;ruf</em></p>\r\n</blockquote>\r\n', '2022-03-21 14:17:17'),
(4, 1, '1sxuX3IWx3_i4mhURPB-uRAPX5TCZqk9B | <p>aku jatuh cinta pada apapun, asal itu darimu</p>\r\n\r\n<p><em>dari buku Tidak Apa-Apa Sebab Kita Saling Cinta - Mohammad Ali Ma&#39;ruf</em></p>\r\n', '2022-03-28 09:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

DROP TABLE IF EXISTS `pesan`;
CREATE TABLE IF NOT EXISTS `pesan` (
  `rec_num` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `pesan` text NOT NULL,
  `ts` datetime NOT NULL,
  PRIMARY KEY (`rec_num`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`rec_num`, `nama`, `pesan`, `ts`) VALUES
(1, 'Mas Rangga Bimantika, M.Eng', 'Selamat menempuh lembar hidup baru ya mas... ', '2022-02-18 22:04:43'),
(2, 'Mbak Nur Jannah', 'Alhamdullah, selamat ya', '2022-02-18 22:19:30'),
(3, 'Bapak H. Bekti Indramadji, M.Pd', 'Selamat ya den, semoga keberkahan nikah selalu tercurahkan dari-Nya', '2022-02-21 01:15:52'),
(4, 'Bapak Drs. Labuisi, M.MP', 'Selamat atas pernikahannya semoga menjadi keluarga yang penuh kebahagiaan ', '2022-03-06 11:30:17'),
(5, 'Mas Moch. Dodi Cahyadi, M.Hum', 'Barakallahu laka wa jamaâ€™a bainakuma fi khairin. Barakallahu likulli wahidin minkuma fi shahibihi wa jamaâ€™a bainakuma fi khairin.', '2022-03-14 00:24:51'),
(6, 'Mbak Sri Rahayu, S.Ds', 'Selamat, akhirnya menikah', '2022-03-26 22:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `tamu_undangan`
--

DROP TABLE IF EXISTS `tamu_undangan`;
CREATE TABLE IF NOT EXISTS `tamu_undangan` (
  `uid` varchar(30) NOT NULL,
  `callname` varchar(12) NOT NULL,
  `nama` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `undangan` text NOT NULL,
  `ts` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tamu_undangan`
--

INSERT INTO `tamu_undangan` (`uid`, `callname`, `nama`, `telepon`, `undangan`, `ts`) VALUES
('64b1875432516', 'Mas', 'Moch. Dodi Cahyadi, M.Hum', '0', '4', '2023-07-15 01:19:55'),
('64b8f96fdba20', 'Bapak', 'Moh. Qodri', '0', '4', '2023-07-20 16:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kami`
--

DROP TABLE IF EXISTS `tentang_kami`;
CREATE TABLE IF NOT EXISTS `tentang_kami` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(300) NOT NULL,
  `familyname` text NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `nama`, `familyname`, `deskripsi`, `foto`) VALUES
(1, 'Ahmad Rizaqu Muttaqi, M.Kom', 'bin H. Hardiyono', '<p>Seorang anak satu-satunya dibesarkan dari keluarga guru. Saat ini berkarir di Kementerian Agama RI dan mengajar di Kampus Utama Universitas Terbuka.</p>\r\n', '1OIeD0WYfGbGnQrYG6wjqm-qoiFMjwH6G'),
(2, 'Aftina, SS, M.Pd', 'binti (alm) Hardiyono', '<p>Seorang anak perempuan pertama dari tiga bersaudara dibersarkan dari keluarga guru. Saat ini mengajar di Kampus Utama Universitas Terbuka.</p>\r\n', '1RSyOFolb4pf9J3KtP0bvydVOO0Eamaw8');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

DROP TABLE IF EXISTS `timeline`;
CREATE TABLE IF NOT EXISTS `timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `bagde` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`id`, `judul`, `tanggal`, `deskripsi`, `bagde`) VALUES
(1, 'Awal Perkenalan', '2021-07-21', '<p>Awal kali berkomunikasi saat diperkenalkan dengan seorang teman dekat kita. Awal komunikasi kita masih tergolong formal. Seiring berjalannya waktu komunikasi kita semakin dekat, semakin lama Kuterpikat pada tuturmu, tersihir jiwamu. aku baper dibuatnya, seperti aku memasuki labirinnya. Bukan lagi tentang jatuh cinta, melainkan jatuh hati.</p>\r\n', '1biRhWsknExtJi4bpFN3YhZaTsNUAYUEF'),
(2, 'Jadian', '2022-01-14', '<p>Sekian lama kita terpisahkan oleh jarak dan kesempatan. Akhirnya aku terbang ke Jawa Timur. Saat pramugari memberikan <em>announcement</em>&nbsp; <small><tt><cite>Selamat datang di Bandara Internasional Juanda Surabaya di Sidoarjo,</cite></tt></small>&nbsp;hatiku berdebar pujaan hatiku menjemputmu di Bandara Juanda. Sekali bertemu sudah seperti dua sejoli mengungkapkan kerinduan. Pelan-pelan kita saling curi pandang dan saling menatap menyiratkan kita saling malu-malu tuk mengungkap perasaan. Kali pertama dihidupku merasa <em>awkward</em> tapi perasaanku begitu nyaman.</p>\r\n', '1eaVE26Ectn2VvSIQ5X5TrOL93Az9arsI'),
(3, 'Purpose', '2022-02-27', '<blockquote>\r\n<p><small><em><tt>Kukan menjelang tuk datang<br />\r\nTuk ikrarkan kesungguhan<br />\r\nMenguatkan ikatan penuh dan sungguh</tt></em></small></p>\r\n\r\n<p><small>Bandara Soekarno-Hatta, 27 Feb 2022</small></p>\r\n</blockquote>\r\n\r\n<p>Sampailah aku di Malang. Menjelang malam memang tak ada acara istimewa, seakan kamu tak percaya. Kutarakan kepadamu <em>&quot;Aftina, Marry me ?&quot;</em> sebagai tanda janji dan keseriusanku tersematkan cincin di jari manismu. Dan kamu setuju tuk menikah denganku.</p>\r\n', '1CaMQf4DywD10a8z35j_IIr4gRsMO9uLa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
