-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2025 at 02:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa_baluti`
--

-- --------------------------------------------------------

--
-- Table structure for table `domisili`
--

CREATE TABLE `domisili` (
  `id_domisili` int NOT NULL,
  `id_penduduk` int NOT NULL,
  `alamat_asal` varchar(255) NOT NULL,
  `alamat_tujuan` varchar(255) NOT NULL,
  `no_surat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_domisili` varchar(30) NOT NULL,
  `ket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `domisili`
--

INSERT INTO `domisili` (`id_domisili`, `id_penduduk`, `alamat_asal`, `alamat_tujuan`, `no_surat`, `tgl_domisili`, `ket`) VALUES
(1, 1, 'Jalan Baluti RT. 06 RW. 03', 'Desa Haratai RT.01 Rw.01', '', '2025-02-04', 'Diproses'),
(2, 2, 'Jalan Baluti RT. 06 RW. 03', 'Desa Bangkau RT.06 Rw.07', NULL, '', NULL),
(3, 3, 'Jalan Baluti RT. 06 RW. 03', 'Desa Muning Tengah RT.10 Rw.02', NULL, '', NULL),
(4, 4, 'Jalan Baluti RT. 06 RW. 03', 'JL.BRIGJEN H.HASAN BASRI KOMP KERJAKSAAN', NULL, '', NULL),
(5, 5, 'Jalan Baluti RT. 06 RW. 03', 'JL.S.PARMAN NO .19', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kepala`
--

CREATE TABLE `kepala` (
  `id_kepala` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `tahun_menjabat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kepala`
--

INSERT INTO `kepala` (`id_kepala`, `nama`, `alamat`, `no_hp`, `tahun_menjabat`) VALUES
(1, 'Muhammad Alfian Hadi', 'Jl. Baluti', '0883653727', '2024-2028');

-- --------------------------------------------------------

--
-- Table structure for table `md`
--

CREATE TABLE `md` (
  `id_md` int NOT NULL,
  `id_penduduk` int NOT NULL,
  `hari` varchar(30) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `tempat` varchar(150) NOT NULL,
  `disebabkan` varchar(200) NOT NULL,
  `no_surat` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ket` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `md`
--

INSERT INTO `md` (`id_md`, `id_penduduk`, `hari`, `tanggal`, `waktu`, `tempat`, `disebabkan`, `no_surat`, `ket`) VALUES
(1, 6, 'Mingu', '2025-01-12', '05:50', 'Di Rumah', '12 Januari 2025', NULL, NULL),
(2, 7, 'Kamis', '2025-01-23', '17:47', 'Di Jalan Raya', 'Kecelakaan Lalu Lintas', NULL, NULL),
(3, 8, 'Rabu', '2025-02-05', '09:41', 'Rumah Sakit', 'Kanker Paru-Paru', NULL, NULL),
(4, 9, 'Sabtu', '2025-02-07', '17:14', 'Rumah Sakit', 'Komplikasi Diabetes', '', 'Diproses'),
(5, 10, 'Senin', '2025-02-03', '20:15', 'Di Rumah', 'Stroke', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'Alfi', 'Jl.Baluti', '08355373');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nik` varchar(70) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `desa` varchar(150) NOT NULL,
  `kecamatan` varchar(150) NOT NULL,
  `kabupaten` varchar(150) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `pekerjaan` varchar(150) NOT NULL,
  `status_perkawinan` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `nama`, `nik`, `alamat`, `desa`, `kecamatan`, `kabupaten`, `ttl`, `jenis_kelamin`, `pekerjaan`, `status_perkawinan`) VALUES
(1, 'Andi Setiawan', '1234567890123456', 'Jalan Baluti RT. 06 RW. 03', 'Desa Baluti', 'Kandangan', 'Hulu Sungai Selatan', 'Kandangan 12 Januari 1999', 'Laki-Laki', 'Swasta', 'Kawin'),
(2, 'Budi Santoso', '2345678901234567', 'Jalan Baluti RT. 06 RW. 03', 'Desa Baluti', 'Kandangan', 'Hulu Sungai Selatan', 'Kandangan 5 Februari 2000', 'Laki-Laki', 'Swasta', 'Belum Kawin'),
(3, 'Chandra Wijaya', '3456789012345678', 'Jalan Baluti RT. 06 RW. 03', 'Desa Baluti', 'Kandangan', 'Hulu Sungai Selatan', 'Kandangan 20 Maret 1992', 'Laki-Laki', 'PNS', 'Kawin'),
(4, 'Dita Prameswari', '4567890123456789', 'Jalan Baluti RT. 06 RW. 03', 'Desa Baluti', 'Kandangan', 'Hulu Sungai Selatan', 'Kandangan 14 April 2004', 'Perempuan', 'Mahasiswi', 'Belum Kawin'),
(5, 'Eko Subrata', '5678901234567890', 'Jalan Baluti RT. 06 RW. 03', 'Desa Baluti', 'Kandangan', 'Hulu Sungai Selatan', 'Kandangan 7 Juni 2005', 'Laki-Laki', 'Mahasiswa', 'Belum Kawin'),
(6, 'Abdul Kadir', '6371012204020008', 'Jalan Baluti RT. 06 RW. 03', 'Desa Baluti', 'Kandangan', 'Hulu Sungai Selatan', 'Kandangan 17 Januari 1999', 'Laki-Laki', 'Swasta', 'Belum Kawin'),
(7, 'Siti Nurhayati', '6371012204020006', 'Jalan Baluti RT. 06 RW. 03', 'Desa Baluti', 'Kandangan', 'Hulu Sungai Selatan', 'Kandangan 28 Maret 1992', 'Perempuan', 'Ibu Rumah Tangga', 'Kawin'),
(8, ' Joko Prasetyo', '6371012204020005', 'Jalan Baluti RT. 06 RW. 03', 'Desa Baluti', 'Kandangan', 'Hulu Sungai Selatan', 'Kandangan 10 Juni 2005', 'Laki-Laki', 'PNS', 'Kawin'),
(9, 'Maria Lestari', '6371012204020009', 'Jalan Baluti RT. 06 RW. 03', 'Desa Baluti', 'Kandangan', 'Hulu Sungai Selatan', 'Kandangan 17 April 1995', 'Perempuan', 'Ibu Rumah Tangga', 'Kawin'),
(10, 'Hendra Wijaya', '6371012204020010', 'Jalan Baluti RT. 06 RW. 03', 'Desa Baluti', 'Kandangan', 'Hulu Sungai Selatan', 'Kandangan 15 Maret 1992', 'Laki-Laki', 'Swasta', 'Belum Kawin');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Muhammad Alfian Hadi', 'admin', '$2y$10$p6ojo.bnZ82/BKl4R9yD8.02qlPBPUulrZGB3K8.RXgs4PKjLGZTK', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pindah`
--

CREATE TABLE `pindah` (
  `id_pindah` int NOT NULL,
  `id_penduduk` int NOT NULL,
  `alamat_tujuan` varchar(255) NOT NULL,
  `desa_tujuan` varchar(150) NOT NULL,
  `kecamatan_tujuan` varchar(150) NOT NULL,
  `kabupaten_tujuan` varchar(150) NOT NULL,
  `no_surat` varchar(70) DEFAULT NULL,
  `tgl_pindah` varchar(30) NOT NULL,
  `ket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pindah`
--

INSERT INTO `pindah` (`id_pindah`, `id_penduduk`, `alamat_tujuan`, `desa_tujuan`, `kecamatan_tujuan`, `kabupaten_tujuan`, `no_surat`, `tgl_pindah`, `ket`) VALUES
(1, 1, 'Desa Haratai RT.01 Rw.01', 'Haratai', 'Loksado', 'Hulu Sungai Selatan', '', '2025-02-03', 'Diproses'),
(2, 2, 'Desa Bangkau RT.06 Rw.07', 'Bangkau', 'Kandangan', 'Hulu Sungai Selatan', '', '2025-02-05', 'Diproses'),
(3, 3, 'Desa Muning Tengah RT.10 Rw.02', 'Muning Tengah', 'Daha Selatan', 'Hulu Sungai Selatan', '', '', 'Diproses'),
(4, 4, 'JL.BRIGJEN H.HASAN BASRI KOMP KERJAKSAAN', 'Banjarmasin', 'Banjarmasin Utara', 'Banjar', '', '', 'Diproses'),
(5, 5, 'JL.S.PARMAN NO .19', 'Banjarmasin', 'Banjarmasin Utara', 'Banjar', '', '', 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int NOT NULL,
  `id_pengguna` int NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `id_pengguna`, `gambar`) VALUES
(1, 1, '../assets/img/Profil/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sktm`
--

CREATE TABLE `sktm` (
  `id_sktm` int NOT NULL,
  `id_penduduk` int NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `no_surat` varchar(70) DEFAULT NULL,
  `tgl_sktm` varchar(30) NOT NULL,
  `ket` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sktm`
--

INSERT INTO `sktm` (`id_sktm`, `id_penduduk`, `keperluan`, `no_surat`, `tgl_sktm`, `ket`) VALUES
(1, 1, 'Pengajuan Bantuan Sosial', '', '2025-02-07', 'Diproses'),
(2, 2, 'Pengajuan Kartu Indonesia Sehat (KIS)', '', '2025-02-01', 'Diproses'),
(3, 3, 'Pengajuan Rumah Subsidi', '', '', 'Diproses'),
(4, 3, 'Pendaftaran Beasiswa', '', '', 'Diproses'),
(5, 5, 'Pendaftaran Beasiswa', '', '', 'Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `usaha`
--

CREATE TABLE `usaha` (
  `id_usaha` int NOT NULL,
  `id_penduduk` int NOT NULL,
  `alamat_usaha` varchar(255) NOT NULL,
  `jenis_usaha` varchar(150) NOT NULL,
  `penghasilan` int NOT NULL,
  `no_surat` varchar(70) DEFAULT NULL,
  `tgl_usaha` varchar(30) NOT NULL,
  `ket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usaha`
--

INSERT INTO `usaha` (`id_usaha`, `id_penduduk`, `alamat_usaha`, `jenis_usaha`, `penghasilan`, `no_surat`, `tgl_usaha`, `ket`) VALUES
(1, 1, 'Jalan Baluti RT. 06 RW. 03', 'Toko Elektronik', 5000000, '', '2025-02-02', 'Diproses'),
(2, 2, 'Jalan Baluti RT. 06 RW. 03', 'Restoran', 10000000, '', '2025-02-06', 'Diproses'),
(3, 3, 'Jalan Baluti RT. 06 RW. 03', 'Toko Pakaian', 7500000, NULL, '', NULL),
(4, 4, 'JL.BRIGJEN H.HASAN BASRI KOMP KERJAKSAAN', 'Jaga Stand Minuman', 2000000, NULL, '', NULL),
(5, 5, 'JL.S.PARMAN NO .19', 'Barista Cafe', 2500000, NULL, '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`id_domisili`),
  ADD KEY `fk_domisili` (`id_penduduk`);

--
-- Indexes for table `kepala`
--
ALTER TABLE `kepala`
  ADD PRIMARY KEY (`id_kepala`);

--
-- Indexes for table `md`
--
ALTER TABLE `md`
  ADD PRIMARY KEY (`id_md`),
  ADD KEY `fk_md` (`id_penduduk`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pindah`
--
ALTER TABLE `pindah`
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `fk_pindah` (`id_penduduk`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `fk_profil` (`id_pengguna`);

--
-- Indexes for table `sktm`
--
ALTER TABLE `sktm`
  ADD PRIMARY KEY (`id_sktm`),
  ADD KEY `fk_sktm` (`id_penduduk`);

--
-- Indexes for table `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_usaha`),
  ADD KEY `fk_usaha` (`id_penduduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domisili`
--
ALTER TABLE `domisili`
  MODIFY `id_domisili` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kepala`
--
ALTER TABLE `kepala`
  MODIFY `id_kepala` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `md`
--
ALTER TABLE `md`
  MODIFY `id_md` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pindah`
--
ALTER TABLE `pindah`
  MODIFY `id_pindah` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sktm`
--
ALTER TABLE `sktm`
  MODIFY `id_sktm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `domisili`
--
ALTER TABLE `domisili`
  ADD CONSTRAINT `fk_domisili` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`) ON DELETE CASCADE;

--
-- Constraints for table `md`
--
ALTER TABLE `md`
  ADD CONSTRAINT `fk_md` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`) ON DELETE CASCADE;

--
-- Constraints for table `pindah`
--
ALTER TABLE `pindah`
  ADD CONSTRAINT `fk_pindah` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`) ON DELETE CASCADE;

--
-- Constraints for table `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `fk_profil` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;

--
-- Constraints for table `sktm`
--
ALTER TABLE `sktm`
  ADD CONSTRAINT `fk_sktm` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`) ON DELETE CASCADE;

--
-- Constraints for table `usaha`
--
ALTER TABLE `usaha`
  ADD CONSTRAINT `fk_usaha` FOREIGN KEY (`id_penduduk`) REFERENCES `penduduk` (`id_penduduk`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
