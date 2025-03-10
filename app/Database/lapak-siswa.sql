-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 04:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lapak-siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_level` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `url_image` varchar(255) DEFAULT NULL,
  `status_registrasi` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_level`, `full_name`, `username`, `email`, `password`, `gender`, `group_name`, `url_image`, `status_registrasi`, `created_at`, `updated_at`) VALUES
(1, '3', 'Anur Mustakim', 'anurmustakim', 'anurmustakim@gmail.com', '12345678', 'L', NULL, NULL, NULL, '2025-01-29 19:10:45', '2025-01-29 19:10:45'),
(2, '1', 'John Doe', 'johndoe', 'johndoe@example.com', '$2y$10$EIXxZT0tJqYt3IYVg7mDeO3Rk46GxfjRmb5FV0Prz/M5RhHpZp8Za', 'male', NULL, NULL, 1, '2025-01-29 19:56:03', '2025-01-29 19:56:03'),
(3, '2', 'Jane Smith', 'janesmith', 'janesmith@example.com', '$2y$10$EIXxZT0tJqYt3IYVg7mDeO3Rk46GxfjRmb5FV0Prz/M5RhHpZp8Za', 'female', NULL, NULL, 1, '2025-01-29 19:56:03', '2025-01-29 19:56:03'),
(4, '3', 'Admin User', 'adminuser', 'admin@example.com', '$2y$10$EIXxZT0tJqYt3IYVg7mDeO3Rk46GxfjRmb5FV0Prz/M5RhHpZp8Za', 'male', NULL, NULL, 1, '2025-01-29 19:56:03', '2025-01-29 19:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `saldo` double DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industri_perusahaan`
--

CREATE TABLE `industri_perusahaan` (
  `id_industri` int(11) NOT NULL,
  `id_superadmin` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe_indper` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `superadmin_name` varchar(255) DEFAULT NULL,
  `tgl_mulai_kerjasama` date DEFAULT NULL,
  `tgl_selesai_kerjasama` date DEFAULT NULL,
  `url_image` varchar(255) DEFAULT NULL,
  `status_registrasi` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_product`
--

CREATE TABLE `kategori_product` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id_level` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id_level`, `nama`) VALUES
(1, 'Customer'),
(2, 'Siswa'),
(3, 'Admin'),
(4, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pajak`
--

CREATE TABLE `pajak` (
  `id_pajak` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `besaran` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_industri_perusahaan`
--

CREATE TABLE `product_industri_perusahaan` (
  `id_product` int(11) NOT NULL,
  `id_industri` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `price_final` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `sell` tinyint(1) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `status_registrasi` tinyint(1) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_siswa`
--

CREATE TABLE `product_siswa` (
  `id_product` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `price_final` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `sell` tinyint(1) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `status_registrasi` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `url_image` varchar(255) DEFAULT NULL,
  `status_registrasi` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_industri_perusahaan`
--

CREATE TABLE `transaksi_industri_perusahaan` (
  `id_transaksi` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_industri` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `status_order` enum('belum dibayar','proses','selesai') DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_siswa`
--

CREATE TABLE `transaksi_siswa` (
  `id_transaksi` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `status_order` enum('belum dibayar','proses','selesai') DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `url_image_product_indper`
--

CREATE TABLE `url_image_product_indper` (
  `id_url_image_product` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `url_image_product_siswa`
--

CREATE TABLE `url_image_product_siswa` (
  `id_url_image_product` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `industri_perusahaan`
--
ALTER TABLE `industri_perusahaan`
  ADD PRIMARY KEY (`id_industri`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_superadmin` (`id_superadmin`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `kategori_product`
--
ALTER TABLE `kategori_product`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pajak`
--
ALTER TABLE `pajak`
  ADD PRIMARY KEY (`id_pajak`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `product_industri_perusahaan`
--
ALTER TABLE `product_industri_perusahaan`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_industri` (`id_industri`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `product_siswa`
--
ALTER TABLE `product_siswa`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `transaksi_industri_perusahaan`
--
ALTER TABLE `transaksi_industri_perusahaan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_industri` (`id_industri`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `transaksi_siswa`
--
ALTER TABLE `transaksi_siswa`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `url_image_product_indper`
--
ALTER TABLE `url_image_product_indper`
  ADD PRIMARY KEY (`id_url_image_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `url_image_product_siswa`
--
ALTER TABLE `url_image_product_siswa`
  ADD PRIMARY KEY (`id_url_image_product`),
  ADD KEY `id_product` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level_user` (`id_level`);

--
-- Constraints for table `industri_perusahaan`
--
ALTER TABLE `industri_perusahaan`
  ADD CONSTRAINT `industri_perusahaan_ibfk_1` FOREIGN KEY (`id_superadmin`) REFERENCES `super_admin` (`id_superadmin`),
  ADD CONSTRAINT `industri_perusahaan_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level_user` (`id_level`);

--
-- Constraints for table `pajak`
--
ALTER TABLE `pajak`
  ADD CONSTRAINT `pajak_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level_user` (`id_level`);

--
-- Constraints for table `product_industri_perusahaan`
--
ALTER TABLE `product_industri_perusahaan`
  ADD CONSTRAINT `product_industri_perusahaan_ibfk_1` FOREIGN KEY (`id_industri`) REFERENCES `industri_perusahaan` (`id_industri`),
  ADD CONSTRAINT `product_industri_perusahaan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_product` (`id_kategori`);

--
-- Constraints for table `product_siswa`
--
ALTER TABLE `product_siswa`
  ADD CONSTRAINT `product_siswa_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `product_siswa_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_product` (`id_kategori`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_level`) REFERENCES `level_user` (`id_level`);

--
-- Constraints for table `transaksi_industri_perusahaan`
--
ALTER TABLE `transaksi_industri_perusahaan`
  ADD CONSTRAINT `transaksi_industri_perusahaan_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product_industri_perusahaan` (`id_product`),
  ADD CONSTRAINT `transaksi_industri_perusahaan_ibfk_2` FOREIGN KEY (`id_industri`) REFERENCES `industri_perusahaan` (`id_industri`),
  ADD CONSTRAINT `transaksi_industri_perusahaan_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `transaksi_siswa`
--
ALTER TABLE `transaksi_siswa`
  ADD CONSTRAINT `transaksi_siswa_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product_siswa` (`id_product`),
  ADD CONSTRAINT `transaksi_siswa_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `transaksi_siswa_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `url_image_product_indper`
--
ALTER TABLE `url_image_product_indper`
  ADD CONSTRAINT `url_image_product_indper_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product_industri_perusahaan` (`id_product`);

--
-- Constraints for table `url_image_product_siswa`
--
ALTER TABLE `url_image_product_siswa`
  ADD CONSTRAINT `url_image_product_siswa_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product_siswa` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
