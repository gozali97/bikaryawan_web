-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 08:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_baliindah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `nama_divisi`, `gaji_pokok`, `uang_makan`) VALUES
(1, 'Manager', '5000000', '1000000'),
(2, 'Kasir', '2800000', '500000'),
(3, 'Photocopy', '2500000', '400000'),
(14, 'Studio Photo', '3200000', '500000'),
(15, 'Digital Printing', '3500000', '600000'),
(16, 'Cuci Cetak', '3000000', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_karyawan` varchar(225) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `divisi` varchar(50) DEFAULT NULL,
  `tgl_masuk` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `email`, `password`, `jenis_kelamin`, `divisi`, `tgl_masuk`, `status`, `photo`, `no_tlp`, `alamat`, `role_id`) VALUES
(1, '23314141212243', 'Administrator', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Laki-Laki', 'Manager', '2022-07-08', '1', 'avatar5.png', '0822332231', 'Jl Kabupaten', 1),
(2, '43314141212243', 'Tuti', 'tama10@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Perempuan', 'Kasir', '2012-07-11', '1', 'pngwing_com_(2).png', '0853231324', 'Jl. Magelang', 2),
(8, '5124321412341', 'Noni', 'noni@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Perempuan', 'Kasir', '2022-07-19', 'Pegawai Tetap', 'avatar3.png', '082243452631', 'Jl. Macasan', 2),
(9, '512432141242', 'Toro', 'toro@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Laki-Laki', 'Photocopy', '2013-03-13', 'Pegawai Tetap', 'avatar4.png', '083143123411', 'Jl. Imam Safii', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `keterangan` text NOT NULL,
  `lampiran` varchar(225) NOT NULL,
  `karyawan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `created_at`, `keterangan`, `lampiran`, `karyawan_id`) VALUES
(2, 'FC buku', '2022-07-24', 'Fotocopy buku ajar SD', '120895619_2500208563603406_6244398979574916713_o.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kehadiran`
--

CREATE TABLE `tb_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_karyawan` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kehadiran`
--

INSERT INTO `tb_kehadiran` (`id_kehadiran`, `bulan`, `nik`, `nama_karyawan`, `jenis_kelamin`, `nama_divisi`, `hadir`, `sakit`, `alpha`) VALUES
(1, '092022', '43314141212243', 'Tuti', 'Perempuan', 'Manager', 28, 1, 1),
(2, '072022', '23314141212243', 'Tama', 'Laki-Laki', 'Kasir', 30, 0, 0),
(3, '072022', '43314141212243', 'Tuti', 'Perempuan', 'Manager', 27, 1, 3),
(4, '012022', '23314141212243', 'Tama', 'Laki-Laki', 'Kasir', 30, 0, 1),
(5, '012022', '43314141212243', 'Tuti', 'Perempuan', 'Manager', 29, 1, 0),
(6, '022022', '23314141212243', 'Tama', 'Laki-Laki', 'Kasir', 28, 0, 0),
(7, '022022', '43314141212243', 'Tuti', 'Perempuan', 'Manager', 27, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_potongan_gaji`
--

CREATE TABLE `tb_potongan_gaji` (
  `id_potongan` int(11) NOT NULL,
  `jenis_potongan` varchar(120) NOT NULL,
  `jml_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_potongan_gaji`
--

INSERT INTO `tb_potongan_gaji` (`id_potongan`, `jenis_potongan`, `jml_potongan`) VALUES
(2, 'Alpha', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `keterangan`) VALUES
(1, 'Admin'),
(2, 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `tb_potongan_gaji`
--
ALTER TABLE `tb_potongan_gaji`
  ADD PRIMARY KEY (`id_potongan`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_potongan_gaji`
--
ALTER TABLE `tb_potongan_gaji`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
