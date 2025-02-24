-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2025 at 06:11 AM
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
  `url_image` varchar(255) DEFAULT NULL,
  `group_name` varchar(255) NOT NULL,
  `status_registrasi` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_level`, `full_name`, `username`, `email`, `password`, `gender`, `url_image`, `group_name`, `status_registrasi`, `created_at`, `updated_at`) VALUES
(1, '4', 'Anur Mustakim', 'anurmustakim', 'anurmustakim@gmail.com', '$2y$10$ANyjFAVpTatnuqswqH5xFe862L24jqXiM2OlJGdaA53eGW4R2rAQW', 'male', 'img_user/1738312563_38b93fb8b6629ff5204b.png', 'ALLENT1', 1, '2025-01-29 19:10:45', '2025-02-02 23:42:24'),
(5, '3', 'Mikatsum Runa', 'mikatsumruna', 'mikatsumruna1@gmail.com', '$2y$10$HEOEMNPX3T196KSCA63IjOw4hkNclTcJ3J2lVSoE5jVivPdLTOB92', 'female', 'img_user/1738573203_e5cf636123b36e929d0f.png', 'ALLENT2', 1, '2025-01-30 10:16:14', '2025-02-19 21:42:38'),
(8, '3', 'Zikry Dwi Maulana', 'zikrydwi', 'zikrydwi@gmail.com', '$2y$10$rmEkpZiouNXxV7YU3flYqeCmFp.BGaGWX98LNBWppmpVMSN3AaL6K', 'male', 'img_user/1738313784_f42bfb508e121878d50f.png', 'ALLENT3', 0, '2025-01-31 08:56:24', '2025-02-02 23:42:37'),
(9, '4', 'Super Admin', 'superadmin', 'superadmin@gmail.com', '123456789', 'male', 'img_user/1738563755_8ae5c5bdddabfb3ece53.png', 'ALLENT4', 1, '2025-01-31 21:08:55', '2025-02-02 23:22:35');

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
  `url_image` varchar(255) NOT NULL,
  `alamat` text DEFAULT NULL,
  `saldo` double DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `id_level`, `full_name`, `username`, `email`, `password`, `no_telp`, `gender`, `url_image`, `alamat`, `saldo`, `updated_at`, `created_at`) VALUES
(3, 2, 'Anur Mustakim2', 'anurmustakim2', 'anurmustakim2@gmail.com', '$2y$10$aII2NTge/B1zSLiJsKeQkeNESMQoi4.mo3sGh2Gz6.Af0ssSwxZ2O', '08912344780', 'male', '', 'Batang, Subah, Adinuso, Dk. Damarsari', 300000, '2025-02-06 20:47:18', '2025-02-06 19:50:43'),
(6, 2, 'Anur Mustakim3', 'anurmustakim3', 'anurmustakim3@gmail.com', '$2y$10$33uK55udaJHIqFDdclmVhuiH07wkpUrpMCPKv9oKx3HgSkU5oc2Au', '0891234478', 'male', 'img_user/1738900254_1536bed4421f9142c97e.png', 'Batang, Subah, Adinuso, Dk. Damarsari', 500000, '2025-02-06 20:50:54', '2025-02-06 20:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `group_siswa`
--

CREATE TABLE `group_siswa` (
  `id_group` int(5) NOT NULL,
  `id_admin` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_ad` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_ad` datetime NOT NULL,
  `id_siswa` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industri_perusahaan`
--

CREATE TABLE `industri_perusahaan` (
  `id_industri` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe_indper` enum('Perusahaan','Industri','','') NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_mulai_kerjasama` date DEFAULT NULL,
  `tgl_selesai_kerjasama` date DEFAULT NULL,
  `url_image` varchar(255) DEFAULT NULL,
  `status_registrasi` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `industri_perusahaan`
--

INSERT INTO `industri_perusahaan` (`id_industri`, `id_admin`, `id_level`, `nama`, `tipe_indper`, `username`, `email`, `password`, `tgl_mulai_kerjasama`, `tgl_selesai_kerjasama`, `url_image`, `status_registrasi`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 'Bulog 1', 'Perusahaan', 'bulog', 'bulog@gmail.com', '$2y$10$gHxAut3niTB75X7H9SMyduOQ4d1mGYPDGv77COlTujJGbIy.0M5Qy', '1111-11-11', '1111-11-11', 'img_user/1738749173_b114f039326684da7ffb.png', 1, '2025-02-05 21:22:38', '2025-02-05 02:52:53');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_product`
--

CREATE TABLE `kategori_product` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_product`
--

INSERT INTO `kategori_product` (`id_kategori`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Alat Rumah Tangga', '2025-02-11 13:30:55', NULL),
(2, 'Alat Mandi', '2025-02-11 13:37:35', NULL),
(3, 'kebersihan', '2025-02-13 11:19:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `wali_kelas` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`, `wali_kelas`, `created_at`, `updated_at`) VALUES
(1, 'XII RPL 1', 'Supriyati S.Pd', '2025-02-11 11:54:22', NULL),
(2, 'XII RPL 2', 'Supriyatno S.Pd', '2025-02-11 11:54:22', NULL),
(4, 'X TKJ 2', 'Anur Mustakim2 S.Kom', '2025-02-11 12:09:13', NULL);

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
(1, 'Siswa'),
(2, 'Customer'),
(3, 'Admin'),
(4, 'Super Admin'),
(5, 'Industri'),
(6, 'Kerjasama');

-- --------------------------------------------------------

--
-- Table structure for table `pajak`
--

CREATE TABLE `pajak` (
  `id_pajak` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `besaran` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pajak`
--

INSERT INTO `pajak` (`id_pajak`, `id_level`, `besaran`) VALUES
(1, 3, 10),
(2, 5, 10),
(3, 6, 5);

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

--
-- Dumping data for table `product_siswa`
--

INSERT INTO `product_siswa` (`id_product`, `id_admin`, `id_kategori`, `product_name`, `description`, `stock`, `price`, `price_final`, `weight`, `sell`, `expired`, `discount`, `status_registrasi`, `updated_at`, `created_at`) VALUES
(1, 8, 1, 'Produk 1 ', 'Dbkajwbd kawjdbawj k', 400, 20000, 19000, 300, 10, '2026-11-26', 5, 1, '2025-02-12 21:20:05', '2025-02-12 00:40:11'),
(2, 5, 1, 'Produk 3', 'adawdojpawo', 200, 30000, 30000, 1000, 5, '2028-07-01', 0, 0, '2025-02-12 15:58:54', '2025-02-12 00:41:21'),
(5, 5, 2, 'Produk 4', 'eeww', 500, 40000, 20000, 700, 7, '2027-09-13', 50, 1, '2025-02-12 16:22:53', '2025-02-12 14:48:39'),
(6, 5, 1, 'Digital Course', 'Produk Digital kelas online', 1000, 12000, 11520, 90, NULL, '2025-02-28', 4, 1, '2025-02-19 21:37:33', '2025-02-19 21:37:33');

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
  `url_image` varchar(255) DEFAULT NULL,
  `status_registrasi` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_admin`, `id_kelas`, `id_level`, `full_name`, `username`, `email`, `password`, `gender`, `url_image`, `status_registrasi`, `updated_at`, `created_at`) VALUES
(1, 5, 1, 1, 'Gani Maulana', 'ganimaulana', 'ganimaulana@gmail.com', '$2y$10$X/T/eZXLmNCUhJyE0KWOPOZXKRm8XSTMOiN.Rc9/3O7uoCt0rS0Se', 'male', 'img_user/1738568170_45298caf0e96d33a771c.png', 1, '2025-02-19 23:38:21', '2025-01-31 14:12:09'),
(2, 9, 2, 1, 'Muhammad Surya', 'muhammadsurya', 'muhammadsurya@gmail.com', '$2y$10$BYv0hC0nljMIdTZTqKjcqegSg1d.Q2sXFIlsYo7Cl4.eEw6GP9WkC', 'male', 'img_user/1738573232_e3ec05699ffaf95fee6c.png', 1, '2025-02-06 20:46:30', '2025-01-31 14:41:57'),
(3, 8, 1, 1, 'Galih Maulana', 'galih', 'galih@gmail.com', '$2y$10$zVB8dlucGGxYyUESgMfQFOMdm8MA86P0KG1OpJ5jZy1hLsWhOG5Va', 'male', 'img_user/1738565438_3e4eb9117ed45853c44e.png', 1, '2025-02-02 23:50:39', '2025-02-02 23:50:39'),
(4, 5, 1, 1, 'Anur Mustakim3', 'anurmustakim3', 'anurmustakim3@gmail.com', '$2y$10$hbuhnn4y8M5dT4/eJb7yVuXMyUMT/YpR2YzOWWRk5BDad1NyyAxti', 'male', 'img_user/1738902770_70af10e1e4110969caf8.png', 1, '2025-02-19 23:38:45', '2025-02-06 21:32:50');

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
-- Dumping data for table `url_image_product_siswa`
--

INSERT INTO `url_image_product_siswa` (`id_url_image_product`, `id_product`, `url`) VALUES
(5, 2, 'img_product/1739396589_39357aa0209756c22e99.png'),
(10, 5, 'img_product/1739396919_cb66f75f13063bff5c84.png'),
(11, 5, 'img_product/1739396919_105b59b21b43ffdf1600.png'),
(13, 1, 'img_product/1739400770_8fbf75a8ee072eb00e63.png'),
(14, 1, 'img_product/1739400770_7c730daa8fd5a3a354f0.png'),
(15, 1, 'img_product/1739420405_8109bf7ae59e3d4ab5d1.png'),
(16, 6, 'img_product/1740026253_bcbe0edd08667e0cbef6.png');

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
-- Indexes for table `group_siswa`
--
ALTER TABLE `group_siswa`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `industri_perusahaan`
--
ALTER TABLE `industri_perusahaan`
  ADD PRIMARY KEY (`id_industri`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_admin` (`id_admin`) USING BTREE;

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_siswa`
--
ALTER TABLE `group_siswa`
  MODIFY `id_group` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industri_perusahaan`
--
ALTER TABLE `industri_perusahaan`
  MODIFY `id_industri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_product`
--
ALTER TABLE `kategori_product`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pajak`
--
ALTER TABLE `pajak`
  MODIFY `id_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_siswa`
--
ALTER TABLE `product_siswa`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `url_image_product_siswa`
--
ALTER TABLE `url_image_product_siswa`
  MODIFY `id_url_image_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  ADD CONSTRAINT `fk_product_siswa` FOREIGN KEY (`id_product`) REFERENCES `product_siswa` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
