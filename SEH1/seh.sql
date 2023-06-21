-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2023 at 02:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_seh`
--

CREATE TABLE `admin_seh` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_seh`
--

INSERT INTO `admin_seh` (`id_admin`, `nama`, `email`, `password`, `status`) VALUES
(3, 'Aura', 'aura@staff.uns.ac.id', 'd12023d0d740af4d707d7a3c7919ce76', 0),
(7, 'Yonaka', 'yonaka@staff.uns.ac.id', '95488ef6daa5a49a38ea076c37ea3143', 0),
(8, 'Rizki', 'rizki@staff.uns.ac.id', '3e089c076bf1ec3a8332280ee35c28d4', 0),
(9, 'Super Admin', 'sadmin@staff.uns.ac.id', 'c5edac1b8c1d58bad90a246d8f08f53b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nama_event` varchar(200) NOT NULL,
  `tgl_event` date NOT NULL,
  `tglakhir_event` date NOT NULL,
  `lokasi_event` varchar(200) NOT NULL,
  `deskripsi_event` text NOT NULL,
  `kategori_event` int(11) NOT NULL,
  `cp` bigint(20) NOT NULL,
  `regist_link` varchar(200) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `nama_event`, `tgl_event`, `tglakhir_event`, `lokasi_event`, `deskripsi_event`, `kategori_event`, `cp`, `regist_link`, `image`) VALUES
(1, 'NCT DREAM : THE', '2023-12-14', '2023-12-14', 'Tjoloemadoe', 'NCT DREAM : THE DREAM SHOW 2 CONCERTS', 1, 89123456789, 'https://dyandraglobal.com/event/nct-127-2nd-tour-neo-city-jakarta-the-link/', 'image 12.png'),
(2, 'Virtual Job Fair', '2023-12-15', '2023-11-15', 'Zoom Meeting', 'CARILOKER VIRTUAL JOBFAIR JAWA TENGAH', 4, 78, 'bit.ly', 'image9.png'),
(5, 'Beswan Talk', '2023-06-24', '2023-06-24', 'Zoom Meetings', 'Introducing Beasiswa Djarum Plus untuk mahasiswa sem 4', 2, 85466789123, 'bit.ly', 'image14.png'),
(7, 'AIESEC Future Leaders', '2023-12-28', '2023-12-28', 'Zoom Meetings', 'Leadership Mentoring with Coach\r\n        ', 4, 98, 'bit.ly', '6473ef25cca34.png'),
(8, 'Virtual Job Fair', '2023-07-01', '2023-07-08', 'UNS', 'CARILOKER VIRTUAL JOBFAIR JAWA TENGAH', 4, 9, 'http://', '6472a9911cddb.png'),
(9, 'Charlie Puth Concert', '2023-07-08', '2023-05-27', 'Zoom', 'Free Live Stream', 1, 8, 'htp', '64702db43c714.jpg'),
(10, 'seminar', '2023-05-25', '2023-05-25', 'uns', 'b', 2, 98, 'bit.ly', '646d71efc5449.png'),
(11, 'workshop', '2023-05-28', '2023-05-31', 'fkip', 'b', 3, 98, 'bit.ly', '646d72ca3d7cc.jpg'),
(16, 'concert', '2023-06-08', '2023-06-09', 'fkip', 'nct', 1, 8952637372, 'bit.ly', '647ff3cce79cb.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_event`
--

CREATE TABLE `kategori_event` (
  `id` int(4) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_event`
--

INSERT INTO `kategori_event` (`id`, `kategori`) VALUES
(1, 'concert'),
(2, 'seminar'),
(3, 'bazaar'),
(4, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `nama_event` varchar(200) NOT NULL,
  `tgl_event` date NOT NULL,
  `tglakhir_event` date NOT NULL,
  `lokasi_event` varchar(200) NOT NULL,
  `deskripsi_event` text NOT NULL,
  `kategori_event` int(4) NOT NULL,
  `cp` bigint(20) NOT NULL,
  `regist_link` varchar(200) NOT NULL,
  `image` varchar(150) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Requesting',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `nama_event`, `tgl_event`, `tglakhir_event`, `lokasi_event`, `deskripsi_event`, `kategori_event`, `cp`, `regist_link`, `image`, `status`, `user_id`) VALUES
(8, 'workart', '2023-05-28', '2023-05-31', 'fkip', 'b', 3, 99, 'bit.ly', '646d72ca3d7cc.jpg', 'accepted', 5),
(9, 'workshop', '2023-05-25', '2023-05-25', 'uns', 'g', 1, 98, 'bit.ly', '646d75962f0e0.jpg', 'rejected', 5),
(10, 'workshop', '2023-06-03', '2023-06-04', 'fkip', 'ghkgdh', 1, 98, 'bit.ly', '6472cef2779fe.jpg', 'rejected', 5),
(11, 'hello', '2023-05-31', '2023-05-31', 'hai', 'ga', 1, 98, 'bit.ly', '6472cedac93c7.jpg', 'accepted', 5),
(12, 'coldplay', '2023-06-01', '2023-06-02', 'gbk', 'konser', 1, 98, 'bit.ly', '6472ce9a72a9d.jpg', 'requested', 5),
(15, 'Charlie Puth Concert', '2023-05-29', '2023-05-29', 'hai', 'hhvbn', 1, 98, 'bit.ly', '64746ad755e47.png', 'requested', 6),
(24, 'workshop', '2023-05-30', '2023-05-30', 'uns', 'c', 1, 98, 'b', '64760fb0197b1.jpg', 'requested', 6),
(25, 'hello', '2023-05-30', '2023-05-30', 'fkip', 'v', 3, 98, 'bit.ly', '64761024ef550.jpg', 'requested', 7),
(26, 'workshop', '2023-06-29', '2023-06-30', 'uns', 'marketing workshop bisnis', 2, 8952637372, 'bit.ly', '647ff1ad046e9.png', 'requested', 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`) VALUES
(5, 'Yonaka', 'yonakatitin@student.uns.ac.id', '95488ef6daa5a49a38ea076c37ea3143'),
(8, 'Shalsabila Aura', 'shalsabila@student.uns.ac.id', 'c11807299e8ba167645c32f333dddbfd'),
(9, 'sekar', 'sekar@student.uns.ac.id', '114148d50080f83b81f26ead2941b69f'),
(16, 'titin', 'titin@student.uns.ac.id', 'e00fba6fedfb8a49e13346f7099a23fc');

-- --------------------------------------------------------

--
-- Table structure for table `validasi`
--

CREATE TABLE `validasi` (
  `id_validasi` tinyint(2) NOT NULL,
  `validasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `validasi`
--

INSERT INTO `validasi` (`id_validasi`, `validasi`) VALUES
(1, 'accept'),
(2, 'reject');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_seh`
--
ALTER TABLE `admin_seh`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_event` (`kategori_event`);

--
-- Indexes for table `kategori_event`
--
ALTER TABLE `kategori_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_event` (`kategori_event`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `validasi`
--
ALTER TABLE `validasi`
  ADD PRIMARY KEY (`id_validasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_seh`
--
ALTER TABLE `admin_seh`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori_event`
--
ALTER TABLE `kategori_event`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `validasi`
--
ALTER TABLE `validasi`
  MODIFY `id_validasi` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`kategori_event`) REFERENCES `kategori_event` (`id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`kategori_event`) REFERENCES `kategori_event` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
