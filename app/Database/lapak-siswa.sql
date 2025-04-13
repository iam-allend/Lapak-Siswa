-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Apr 2025 pada 22.42
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `id_level`, `full_name`, `username`, `email`, `password`, `gender`, `url_image`, `group_name`, `status_registrasi`, `created_at`, `updated_at`) VALUES
(1, '4', 'Anur Mustakim', 'anurmustakim', 'anurmustakim@gmail.com', '$2y$10$ANyjFAVpTatnuqswqH5xFe862L24jqXiM2OlJGdaA53eGW4R2rAQW', 'male', 'img_user\\1738312563_38b93fb8b6629ff5204b.png', 'Buana Production', 1, '2025-01-29 19:10:45', '2025-04-11 22:35:27'),
(5, '3', 'Mikatsum Runa', 'mikatsumruna', 'mikatsumruna1@gmail.com', '$2y$10$HEOEMNPX3T196KSCA63IjOw4hkNclTcJ3J2lVSoE5jVivPdLTOB92', 'female', 'img_user/1744575439_59d04ad83787adfdc156.png', 'Monocraft', 1, '2025-01-30 10:16:14', '2025-04-13 13:17:19'),
(8, '3', 'Zikry Dwi Maulana', 'zikrydwi', 'zikrydwi@gmail.com', '$2y$10$rmEkpZiouNXxV7YU3flYqeCmFp.BGaGWX98LNBWppmpVMSN3AaL6K', 'male', 'img_user/1744575450_24cf4403946aea3d05c2.png', 'Local Tshirt', 0, '2025-01-31 08:56:24', '2025-04-13 13:17:30'),
(9, '4', 'Super Admin', 'superadmin', 'superadmin@gmail.com', '123456789', 'male', 'img_user/1738563755_8ae5c5bdddabfb3ece53.png', 'Dis Doom', 1, '2025-01-31 21:08:55', '2025-02-28 04:59:55'),
(12, '3', 'Dewi Sartika', 'dewisartika', 'dewi.sartika@sekolah.sch.id', '12345678', 'female', '', 'Tim Pengajar IPA', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(13, '3', 'Budi Santoso', 'budisantoso', 'budi.santoso@sekolah.sch.id', '12345678', 'male', '', 'Tim Pengajar Matematika', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(14, '3', 'Ratna Wijaya', 'ratnawijaya', 'ratna.wijaya@sekolah.sch.id', '12345678', 'female', '', 'Tim Pengajar Bahasa', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(15, '3', 'Agus Suparman', 'agussuparman', 'agus.suparman@sekolah.sch.id', '12345678', 'male', '', 'Tim Pengajar Olahraga', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(16, '3', 'Siti Rahayu', 'sitirahayu', 'siti.rahayu@sekolah.sch.id', '12345678', 'female', '', 'Tim Pengajar Seni', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(17, '3', 'Hendra Gunawan', 'hendragunawan', 'hendra.gunawan@sekolah.sch.id', '12345678', 'male', '', 'Tim Pengajar Teknologi', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(18, '3', 'Linda Permata', 'lindapermata', 'linda.permata@sekolah.sch.id', '12345678', 'female', '', 'Tim Pengajar Sosial', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(19, '3', 'Joko Prasetyo', 'jokoprasetyo', 'joko.prasetyo@sekolah.sch.id', '12345678', 'male', '', 'Tim Pengajar Agama', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(20, '3', 'Maya Indah', 'mayaindah', 'maya.indah@sekolah.sch.id', '12345678', 'female', '', 'Tim Pengajar Bahasa Asing', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(21, '3', 'Rudi Hartono', 'rudihartono', 'rudi.hartono@sekolah.sch.id', '12345678', 'male', '', 'Tim Pengajar Keterampilan', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_rekening` varchar(50) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `logo_bank` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `nomor_rekening`, `atas_nama`, `logo_bank`, `created_at`, `updated_at`) VALUES
(1, 'BCA', '123456754', 'Anur Mustakim', 'https://', '2025-04-11 16:44:00', '2025-04-11 16:44:00'),
(2, 'BRI', '9876545679876543', 'Najwa Syarif', 'https://', '2025-04-11 16:44:26', '2025-04-11 16:44:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
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
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `id_level`, `full_name`, `username`, `email`, `password`, `no_telp`, `gender`, `url_image`, `alamat`, `saldo`, `updated_at`, `created_at`) VALUES
(3, 2, 'Anur Mustakim 2', 'anurmustakim2', 'anurmustakim2@gmail.com', '$2y$10$33uK55udaJHIqFDdclmVhuiH07wkpUrpMCPKv9oKx3HgSkU5oc2Au', '089123447801', 'male', 'img_user/1744463329_de84c7d69e1d808478e2.png', 'Batang, Subah, Adinuso, Dk. Damarsari        1', 199998.5, '2025-04-13 20:38:13', '2025-02-06 19:50:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deposit`
--

CREATE TABLE `deposit` (
  `id_deposit` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `jumlah_deposit` double NOT NULL,
  `saldo_masuk` double DEFAULT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `status` enum('pending','success') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `deposit`
--

INSERT INTO `deposit` (`id_deposit`, `id_customer`, `id_bank`, `jumlah_deposit`, `saldo_masuk`, `bukti_transfer`, `status`, `created_at`, `updated_at`) VALUES
(9, 3, 1, 500000, 495000, 'img_deposit/1744575585_d533115bd875bf084f53.png', 'success', '2025-04-13 20:19:45', '2025-04-13 20:21:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `group_siswa`
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
-- Struktur dari tabel `industri_perusahaan`
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
  `no_telp` int(11) NOT NULL,
  `tgl_mulai_kerjasama` date DEFAULT NULL,
  `tgl_selesai_kerjasama` date DEFAULT NULL,
  `url_image` varchar(255) DEFAULT NULL,
  `status_registrasi` tinyint(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `industri_perusahaan`
--

INSERT INTO `industri_perusahaan` (`id_industri`, `id_admin`, `id_level`, `nama`, `tipe_indper`, `username`, `email`, `password`, `no_telp`, `tgl_mulai_kerjasama`, `tgl_selesai_kerjasama`, `url_image`, `status_registrasi`, `updated_at`, `created_at`) VALUES
(1, 1, 2, 'Bulog 1', 'Perusahaan', 'bulog', 'bulog@gmail.com', '$2y$10$gHxAut3niTB75X7H9SMyduOQ4d1mGYPDGv77COlTujJGbIy.0M5Qy', 0, '1111-11-11', '1111-11-11', 'img_user/1744575469_b75efa9070ce28d67c43.png', 1, '2025-04-13 13:17:49', '2025-02-05 02:52:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_product`
--

CREATE TABLE `kategori_product` (
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_product`
--

INSERT INTO `kategori_product` (`id_kategori`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Alat Rumah Tangga', '2025-02-11 13:30:55', NULL),
(2, 'Alat Mandi', '2025-02-11 13:37:35', NULL),
(3, 'kebersihan', '2025-02-13 11:19:22', NULL),
(4, 'Makanan', '2025-04-14 02:44:37', NULL),
(5, 'Minuman', '2025-04-14 02:44:44', NULL),
(6, 'Fashion', '2025-04-14 02:45:02', NULL),
(7, 'Dekorasi', '2025-04-14 02:45:20', NULL),
(8, 'Perhiasan', '2025-04-14 02:45:55', NULL),
(9, 'Elektronik', '2025-04-14 02:46:39', NULL),
(10, 'DIgital Product', '2025-04-14 02:46:49', NULL),
(11, 'Sembako', '2025-04-14 02:46:56', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `wali_kelas` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama`, `wali_kelas`, `created_at`, `updated_at`) VALUES
(1, 'XII RPL 1', 'Supriyati S.Pd', '2025-02-11 11:54:22', NULL),
(2, 'XII RPL 2', 'Supriyatno S.Pd', '2025-02-11 11:54:22', NULL),
(4, 'X TKJ 2', 'Anur Mustakim2 S.Kom', '2025-02-11 12:09:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `jenis` enum('pendapatan','pengeluaran') DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `asal` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `id_transaksi`, `jumlah`, `jenis`, `keterangan`, `asal`, `created_at`, `updated_at`) VALUES
(20, 12, 60001.5, 'pendapatan', 'Transaksi produk siswa #12 - Bingkai Foto Rotan', 'Success Order Produk Siswa', '2025-04-13 13:33:23', '2025-04-13 20:33:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_user`
--

CREATE TABLE `level_user` (
  `id_level` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level_user`
--

INSERT INTO `level_user` (`id_level`, `nama`) VALUES
(1, 'Siswa'),
(2, 'Customer'),
(3, 'Admin'),
(4, 'Super Admin'),
(5, 'Industri'),
(6, 'umkm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pajak`
--

CREATE TABLE `pajak` (
  `id_pajak` int(11) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `besaran` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pajak`
--

INSERT INTO `pajak` (`id_pajak`, `id_level`, `besaran`) VALUES
(1, 3, 10),
(2, 5, 5),
(3, 6, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_industri_perusahaan`
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
  `sell` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `status_registrasi` tinyint(1) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `expired` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `product_industri_perusahaan`
--

INSERT INTO `product_industri_perusahaan` (`id_product`, `id_industri`, `id_kategori`, `product_name`, `description`, `stock`, `price`, `price_final`, `weight`, `sell`, `discount`, `status_registrasi`, `kategori`, `expired`, `updated_at`, `created_at`) VALUES
(24, 1, 1, 'Panci Stainless Steel 3pc', 'Set panci stainless steel 3 ukuran', 200, 250000, 235000, 3000, 45, 6, 1, NULL, '2026-12-31', '2025-04-13 13:37:35', '2025-04-12 12:14:06'),
(25, 1, 1, 'Blender Listrik 500W', 'Blender dengan motor kuat 500 watt', 150, 350000, 325000, 2500, 30, 7.14, 1, NULL, '2026-06-30', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(26, 1, 1, 'Set Mangkuk Keramik', 'Set 6 mangkuk makan keramik berkualitas', 180, 180000, 170000, 4000, 25, 5.56, 1, NULL, '2027-01-31', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(27, 1, 2, 'Shower Head Modern', 'Kepala shower dengan teknologi air bertekanan', 120, 120000, 110000, 800, 20, 8.33, 1, NULL, '2026-08-31', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(28, 1, 2, 'Set Perlengkapan Mandi', 'Set lengkap gayung, tempat sabun, dan sikat', 160, 75000, 70000, 1200, 35, 6.67, 1, NULL, '2026-05-31', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(29, 1, 2, 'Handuk Mandi Premium', 'Handuk mandi katun dengan serat panjang', 140, 95000, 90000, 500, 28, 5.26, 1, NULL, '2027-03-31', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(30, 1, 3, 'Vacuum Cleaner Portable', 'Vacuum cleaner praktis untuk rumah', 90, 450000, 425000, 3500, 15, 5.56, 1, NULL, '2026-09-30', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(31, 1, 3, 'Set Kemoceng Elektrostatik', 'Set kemoceng dengan teknologi elektrostatik', 110, 65000, 60000, 300, 22, 7.69, 1, NULL, '2026-04-30', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(32, 1, 3, 'Tempat Sampah Pedal', 'Tempat sampah sistem pedal 30 liter', 75, 150000, 140000, 2500, 12, 6.67, 1, NULL, '2026-11-30', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(33, 1, 1, 'Teapot Keramik', 'Teapot keramik dengan filter bawaan', 130, 85000, 80000, 600, 18, 5.88, 1, NULL, '2026-07-31', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(34, 1, 2, 'Cermin Kamar Mandi', 'Cermin kamar mandi anti kabut', 95, 125000, 115000, 2000, 14, 8, 1, NULL, '2026-10-31', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(35, 1, 3, 'Pel Lantai Mikrofiber', 'Pel lantai dengan teknologi mikrofiber', 200, 55000, 50000, 400, 40, 9.09, 1, NULL, '2027-02-28', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(36, 1, 1, 'Nampan Serving Kayu', 'Nampan serving dari kayu jati', 70, 110000, 105000, 800, 10, 4.55, 1, NULL, '2026-08-31', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(37, 1, 2, 'Rak Shower Corner', 'Rak sudut untuk kamar mandi anti karat', 85, 95000, 90000, 1500, 16, 5.26, 1, NULL, '2026-12-31', '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(38, 1, 3, 'Sapu Ijuk Premium', 'Sapu dari ijuk pilihan dengan gagang kayu', 150, 75000, 70000, 600, 25, 6.67, 1, NULL, '2026-06-30', '2025-04-12 12:14:06', '2025-04-12 12:14:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_siswa`
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
-- Dumping data untuk tabel `product_siswa`
--

INSERT INTO `product_siswa` (`id_product`, `id_admin`, `id_kategori`, `product_name`, `description`, `stock`, `price`, `price_final`, `weight`, `sell`, `expired`, `discount`, `status_registrasi`, `updated_at`, `created_at`) VALUES
(23, 8, 1, 'Tempat Pensil Kayu', 'Tempat pensil ukir kayu dengan motif tradisional', 30, 45000, 42000, 200, 8, '2026-06-30', 6.67, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(24, 5, 1, 'Bingkai Foto Rotan', 'Bingkai foto handmade dari bahan rotan alami', 24, 65000, 60000, 250, 6, '2025-10-15', 7.69, 1, '2025-04-13 20:33:23', '2025-04-12 09:12:21'),
(25, 8, 2, 'Sabun Aromaterapi', 'Sabun mandi alami dengan essential oil lavender', 100, 25000, 23000, 100, 20, '2025-08-20', 8, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(26, 5, 2, 'Scrub Kopi', 'Scrub badan alami dari kopi dan minyak zaitun', 60, 35000, 32000, 150, 15, '2025-09-15', 8.57, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(27, 8, 2, 'Lilin Aromaterapi', 'Lilin aromaterapi untuk relaksasi', 40, 30000, 28000, 120, 10, '2026-01-30', 6.67, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(28, 5, 3, 'Sapu Lidi Organik', 'Sapu dari lidi kelapa berkualitas tinggi', 35, 40000, 38000, 400, 7, '2025-11-30', 5, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(29, 8, 3, 'Kemoceng Bulu Ayam', 'Kemoceng untuk membersihkan debu', 45, 35000, 33000, 150, 12, '2026-02-28', 5.71, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(30, 5, 3, 'Tempat Sampah Daur Ulang', 'Tempat sampah dari bahan daur ulang', 20, 80000, 75000, 500, 4, '2025-12-15', 6.25, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(31, 8, 1, 'Gantungan Kunci Kulit', 'Gantungan kunci handmade dari kulit', 80, 20000, 18000, 50, 25, '2025-12-31', 10, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(32, 5, 2, 'Minyak Pijat Alami', 'Minyak pijat dengan campuran rempah', 50, 40000, 38000, 200, 10, '2025-10-31', 5, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(33, 8, 3, 'Sikat Botol Bambu', 'Sikat pembersih botol dari bambu', 60, 15000, 14000, 100, 18, '2026-03-31', 6.67, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(34, 5, 1, 'Taplak Meja Batik', 'Taplak meja motif batik ukuran 60x60cm', 30, 55000, 50000, 250, 6, '2025-11-30', 9.09, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(35, 8, 2, 'Masker Wajah Alami', 'Masker wajah dari bahan alami', 70, 20000, 18000, 80, 22, '2025-09-30', 10, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(36, 5, 3, 'Spons Cuci Piring Organik', 'Spons dari bahan organik ramah lingkungan', 90, 10000, 9000, 50, 30, '2025-12-31', 10, 1, '2025-04-12 09:12:21', '2025-04-12 09:12:21'),
(37, 5, 1, 'Tas Jinjing Rajut', 'Tas handmade dari bahan rajutan berkualitas', 50, 75000, 70000, 300, 12, '2025-12-31', 6.67, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(38, 8, 1, 'Tempat Pensil Kayu', 'Tempat pensil ukir kayu dengan motif tradisional', 30, 45000, 42000, 200, 8, '2026-06-30', 6.67, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(39, 5, 1, 'Bingkai Foto Rotan', 'Bingkai foto handmade dari bahan rotan alami', 25, 65000, 60000, 250, 5, '2025-10-15', 7.69, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(40, 8, 2, 'Sabun Aromaterapi', 'Sabun mandi alami dengan essential oil lavender', 100, 25000, 23000, 100, 20, '2025-08-20', 8, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(41, 5, 2, 'Scrub Kopi', 'Scrub badan alami dari kopi dan minyak zaitun', 60, 35000, 32000, 150, 15, '2025-09-15', 8.57, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(42, 8, 2, 'Lilin Aromaterapi', 'Lilin aromaterapi untuk relaksasi', 40, 30000, 28000, 120, 10, '2026-01-30', 6.67, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(43, 5, 3, 'Sapu Lidi Organik', 'Sapu dari lidi kelapa berkualitas tinggi', 35, 40000, 38000, 400, 7, '2025-11-30', 5, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(44, 8, 3, 'Kemoceng Bulu Ayam', 'Kemoceng untuk membersihkan debu', 45, 35000, 33000, 150, 12, '2026-02-28', 5.71, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(45, 5, 3, 'Tempat Sampah Daur Ulang', 'Tempat sampah dari bahan daur ulang', 20, 80000, 75000, 500, 4, '2025-12-15', 6.25, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(46, 8, 1, 'Gantungan Kunci Kulit', 'Gantungan kunci handmade dari kulit', 80, 20000, 18000, 50, 25, '2025-12-31', 10, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(47, 5, 2, 'Minyak Pijat Alami', 'Minyak pijat dengan campuran rempah', 50, 40000, 38000, 200, 10, '2025-10-31', 5, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(48, 8, 3, 'Sikat Botol Bambu', 'Sikat pembersih botol dari bambu', 60, 15000, 14000, 100, 18, '2026-03-31', 6.67, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(49, 5, 1, 'Taplak Meja Batik', 'Taplak meja motif batik ukuran 60x60cm', 30, 55000, 50000, 250, 6, '2025-11-30', 9.09, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(50, 8, 2, 'Masker Wajah Alami', 'Masker wajah dari bahan alami', 70, 20000, 18000, 80, 22, '2025-09-30', 10, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06'),
(51, 5, 3, 'Spons Cuci Piring Organik', 'Spons dari bahan organik ramah lingkungan', 90, 10000, 9000, 50, 30, '2025-12-31', 10, 1, '2025-04-12 12:14:06', '2025-04-12 12:14:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
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
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_admin`, `id_kelas`, `id_level`, `full_name`, `username`, `email`, `password`, `gender`, `url_image`, `status_registrasi`, `updated_at`, `created_at`) VALUES
(1, 5, 1, 1, 'Gani Maulana', 'ganimaulana', 'ganimaulana@gmail.com', '$2y$10$X/T/eZXLmNCUhJyE0KWOPOZXKRm8XSTMOiN.Rc9/3O7uoCt0rS0Se', 'male', 'img_user/1744575179_d8b1e0c659ba2265dba6.png', 1, '2025-04-13 13:12:59', '2025-01-31 14:12:09'),
(2, 15, 2, 1, 'Muhammad Surya', 'muhammadsurya', 'muhammadsurya@gmail.com', '$2y$10$BYv0hC0nljMIdTZTqKjcqegSg1d.Q2sXFIlsYo7Cl4.eEw6GP9WkC', 'male', 'img_user/1744575207_dd456a5722f8060b050b.png', 1, '2025-04-13 13:13:27', '2025-01-31 14:41:57'),
(3, 8, 1, 1, 'Galih Maulana', 'galih', 'galih@gmail.com', '$2y$10$zVB8dlucGGxYyUESgMfQFOMdm8MA86P0KG1OpJ5jZy1hLsWhOG5Va', 'male', 'img_user/1744575222_617fd24e2e244917c337.png', 1, '2025-04-13 13:13:42', '2025-02-02 23:50:39'),
(4, 5, 1, 1, 'Anur Mustakim3', 'anurmustakim3', 'anurmustakim3@gmail.com', '$2y$10$hbuhnn4y8M5dT4/eJb7yVuXMyUMT/YpR2YzOWWRk5BDad1NyyAxti', 'male', 'img_user/1744575233_b99aa351ff465e92b33c.png', 1, '2025-04-13 13:13:53', '2025-02-06 21:32:50'),
(6, 20, 1, 1, 'Ahmad Fauzi', 'ahmadfauzi', 'ahmad.fauzi@siswa.sch.id', '12345678', 'male', '', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(7, 20, 1, 1, 'Dina Marlina', 'dinamarlina', 'dina.marlina@siswa.sch.id', '12345678', 'female', '', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(8, 20, 1, 1, 'Eko Prasetyo', 'ekoprasetyo', 'eko.prasetyo@siswa.sch.id', '12345678', 'male', '', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(9, 20, 1, 1, 'Fitriani Sari', 'fitrianisari', 'fitriani.sari@siswa.sch.id', '12345678', 'female', '', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(10, 20, 1, 1, 'Guntur Wibowo', 'gunturwibowo', 'guntur.wibowo@siswa.sch.id', '12345678', 'male', '', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(11, 21, 2, 1, 'Hesti Rahayu', 'hestirahayu', 'hesti.rahayu@siswa.sch.id', '12345678', 'female', '', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(12, 21, 2, 1, 'Irfan Maulana', 'irfanmaulana', 'irfan.maulana@siswa.sch.id', '12345678', 'male', '', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(13, 21, 2, 1, 'Jihan Putri', 'jihanputri', 'jihan.putri@siswa.sch.id', '12345678', 'female', '', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(14, 21, 2, 1, 'Kurniawan Adi', 'kurniawanadi', 'kurniawan.adi@siswa.sch.id', '12345678', 'male', '', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53'),
(15, 21, 2, 1, 'Lina Marlina', 'linamarlina', 'lina.marlina@siswa.sch.id', '12345678', 'female', '', 1, '2025-04-12 08:29:53', '2025-04-12 08:29:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_industri_perusahaan`
--

CREATE TABLE `transaksi_industri_perusahaan` (
  `id_transaksi` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_industri` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price_at_transaction` double NOT NULL,
  `total_price` double DEFAULT NULL,
  `status_order` enum('belum dibayar','proses','selesai') DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_industri_perusahaan`
--

INSERT INTO `transaksi_industri_perusahaan` (`id_transaksi`, `id_product`, `id_industri`, `id_customer`, `quantity`, `price_at_transaction`, `total_price`, `status_order`, `updated_at`, `created_at`) VALUES
(6, 24, 1, 3, 1, 235000, 235000, 'proses', '2025-04-13 13:38:13', '2025-04-13 13:38:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_siswa`
--

CREATE TABLE `transaksi_siswa` (
  `id_transaksi` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price_at_transaction` double NOT NULL,
  `total_price` double DEFAULT NULL,
  `status_order` enum('belum dibayar','proses','selesai') DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_siswa`
--

INSERT INTO `transaksi_siswa` (`id_transaksi`, `id_product`, `id_admin`, `id_customer`, `quantity`, `price_at_transaction`, `total_price`, `status_order`, `updated_at`, `created_at`) VALUES
(12, 24, 5, 3, 1, 60001.5, 60001.5, 'selesai', '2025-04-13 13:33:23', '2025-04-13 13:29:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `url_image_product_indper`
--

CREATE TABLE `url_image_product_indper` (
  `id_url_image_product` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `url_image_product_indper`
--

INSERT INTO `url_image_product_indper` (`id_url_image_product`, `id_product`, `url`) VALUES
(1, 0, 'img_product/1741408754_51557e871ab8e488b6b1.png'),
(10, 24, 'img_product/1744576655_3630151438f1784809c8.png'),
(11, 24, 'img_product/1744576655_c806160216762dedd086.png'),
(12, 24, 'img_product/1744576655_36fc6381c00dfc65397b.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `url_image_product_siswa`
--

CREATE TABLE `url_image_product_siswa` (
  `id_url_image_product` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `url_image_product_siswa`
--

INSERT INTO `url_image_product_siswa` (`id_url_image_product`, `id_product`, `url`) VALUES
(24, 23, 'img_product/1744565608_160485eafd5d9e225c8d.png'),
(25, 24, 'img_product/1744565624_83529016fc38bd5ed4cc.png'),
(26, 25, 'img_product/1744565665_a20a908e6f26d51edf27.png'),
(27, 26, 'img_product/1744565681_8d4d6045a18581dc1d4b.png'),
(28, 27, 'img_product/1744565693_8d09909396e46c0a525b.png'),
(29, 28, 'img_product/1744565739_3129bccc4fc9ac570687.png'),
(30, 29, 'img_product/1744565885_e833e8cb1800d6265cf6.png'),
(31, 30, 'img_product/1744565904_3df848019a2922e77230.png'),
(32, 31, 'img_product/1744565927_56e6a308509434a76567.png'),
(33, 32, 'img_product/1744565944_89b461c2c825d7112af3.png'),
(34, 33, 'img_product/1744565960_861c7a69890e9092a10f.png'),
(35, 34, 'img_product/1744565995_a88193e2260e08f4744c.png'),
(36, 35, 'img_product/1744566036_1222d49bdc1888a45db6.png'),
(37, 36, 'img_product/1744566058_4e5c418bd5291aa37575.png'),
(38, 37, 'img_product/1744566095_d937b7871e983c7e6893.png'),
(39, 38, 'img_product/1744566128_0ae5145959b1121ccf79.png'),
(40, 39, 'img_product/1744566142_d75d6b6b7ef94e097830.png'),
(41, 40, 'img_product/1744566183_9641a623a579e7464e7e.png'),
(43, 41, 'img_product/1744566227_f777e165c8ca070a3581.png'),
(44, 42, 'img_product/1744566242_f7e652a2b79ed0559510.png'),
(45, 43, 'img_product/1744566253_563ada0303d542d21ca8.png'),
(46, 44, 'img_product/1744566266_c7310d8891d321d215d5.png'),
(47, 45, 'img_product/1744566277_353eb774625ee1d8168c.png'),
(48, 46, 'img_product/1744566299_fa44a11a1d7611aef915.png'),
(49, 47, 'img_product/1744566319_27bc6018e9533eb96458.png'),
(50, 48, 'img_product/1744566335_5c599b7ad2e02792b2f7.png'),
(51, 49, 'img_product/1744566351_43bcbfb11e6e747cee0c.png'),
(52, 50, 'img_product/1744566396_f76d0b6005603b03226a.png'),
(53, 51, 'img_product/1744566410_224736d54af93d896116.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id_deposit`),
  ADD KEY `id_bank` (`id_bank`),
  ADD KEY `fk_deposit_customer` (`id_customer`);

--
-- Indeks untuk tabel `group_siswa`
--
ALTER TABLE `group_siswa`
  ADD PRIMARY KEY (`id_group`);

--
-- Indeks untuk tabel `industri_perusahaan`
--
ALTER TABLE `industri_perusahaan`
  ADD PRIMARY KEY (`id_industri`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_admin` (`id_admin`) USING BTREE;

--
-- Indeks untuk tabel `kategori_product`
--
ALTER TABLE `kategori_product`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indeks untuk tabel `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `pajak`
--
ALTER TABLE `pajak`
  ADD PRIMARY KEY (`id_pajak`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `product_industri_perusahaan`
--
ALTER TABLE `product_industri_perusahaan`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_industri` (`id_industri`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `product_siswa`
--
ALTER TABLE `product_siswa`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `transaksi_industri_perusahaan`
--
ALTER TABLE `transaksi_industri_perusahaan`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_industri` (`id_industri`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `transaksi_siswa`
--
ALTER TABLE `transaksi_siswa`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `url_image_product_indper`
--
ALTER TABLE `url_image_product_indper`
  ADD PRIMARY KEY (`id_url_image_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Indeks untuk tabel `url_image_product_siswa`
--
ALTER TABLE `url_image_product_siswa`
  ADD PRIMARY KEY (`id_url_image_product`),
  ADD KEY `id_product` (`id_product`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id_deposit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `group_siswa`
--
ALTER TABLE `group_siswa`
  MODIFY `id_group` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `industri_perusahaan`
--
ALTER TABLE `industri_perusahaan`
  MODIFY `id_industri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_product`
--
ALTER TABLE `kategori_product`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pajak`
--
ALTER TABLE `pajak`
  MODIFY `id_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `product_industri_perusahaan`
--
ALTER TABLE `product_industri_perusahaan`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `product_siswa`
--
ALTER TABLE `product_siswa`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transaksi_industri_perusahaan`
--
ALTER TABLE `transaksi_industri_perusahaan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi_siswa`
--
ALTER TABLE `transaksi_siswa`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `url_image_product_indper`
--
ALTER TABLE `url_image_product_indper`
  MODIFY `id_url_image_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `url_image_product_siswa`
--
ALTER TABLE `url_image_product_siswa`
  MODIFY `id_url_image_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_siswa` (`id_product`);

--
-- Ketidakleluasaan untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level_user` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`),
  ADD CONSTRAINT `deposit_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`),
  ADD CONSTRAINT `fk_deposit_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `industri_perusahaan`
--
ALTER TABLE `industri_perusahaan`
  ADD CONSTRAINT `industri_perusahaan_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `level_user` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `pajak`
--
ALTER TABLE `pajak`
  ADD CONSTRAINT `pajak_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level_user` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `product_industri_perusahaan`
--
ALTER TABLE `product_industri_perusahaan`
  ADD CONSTRAINT `product_industri_perusahaan_ibfk_1` FOREIGN KEY (`id_industri`) REFERENCES `industri_perusahaan` (`id_industri`),
  ADD CONSTRAINT `product_industri_perusahaan_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_product` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `product_siswa`
--
ALTER TABLE `product_siswa`
  ADD CONSTRAINT `product_siswa_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `product_siswa_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_product` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_level`) REFERENCES `level_user` (`id_level`);

--
-- Ketidakleluasaan untuk tabel `transaksi_industri_perusahaan`
--
ALTER TABLE `transaksi_industri_perusahaan`
  ADD CONSTRAINT `transaksi_industri_perusahaan_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product_industri_perusahaan` (`id_product`),
  ADD CONSTRAINT `transaksi_industri_perusahaan_ibfk_2` FOREIGN KEY (`id_industri`) REFERENCES `industri_perusahaan` (`id_industri`),
  ADD CONSTRAINT `transaksi_industri_perusahaan_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Ketidakleluasaan untuk tabel `transaksi_siswa`
--
ALTER TABLE `transaksi_siswa`
  ADD CONSTRAINT `transaksi_siswa_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `transaksi_siswa_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Ketidakleluasaan untuk tabel `url_image_product_indper`
--
ALTER TABLE `url_image_product_indper`
  ADD CONSTRAINT `url_image_product_indper_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product_industri_perusahaan` (`id_product`);

--
-- Ketidakleluasaan untuk tabel `url_image_product_siswa`
--
ALTER TABLE `url_image_product_siswa`
  ADD CONSTRAINT `fk_product_siswa` FOREIGN KEY (`id_product`) REFERENCES `product_siswa` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
