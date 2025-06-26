-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2025 pada 03.20
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `phone`, `address`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'Abdullah Faqih', '0812345678901', 'Grogol', '2025-06-16 00:03:09', '2025-06-16 02:44:12', NULL),
(2, 'Ananda Nabiilah Luthfiyyah', '0812345665438', 'Awaludin', '2025-06-16 02:43:19', NULL, NULL),
(3, 'Muhammad Reihan', '087777', 'Dimana aja', '2025-06-17 00:10:09', '2025-06-18 01:06:07', NULL),
(4, 'Agra Saputra', '0812345678902', 'indonesia', '2025-06-18 01:06:52', NULL, NULL),
(5, 'Aldo Rio Prayoga', '0812345678903', 'Indonesia', '2025-06-18 01:07:16', NULL, NULL),
(6, 'Angela', '0812345678904', 'Indonesia', '2025-06-18 01:07:32', NULL, NULL),
(7, 'Aryo Putranto', '0812345678905', 'Indonesia', '2025-06-18 01:08:00', NULL, NULL),
(8, 'Erssa Istary Yusuf', '0812345678906', 'Indonesia', '2025-06-18 01:08:40', NULL, NULL),
(9, 'Hardianti', '0812345678907', 'Indonesia', '2025-06-18 01:08:58', NULL, NULL),
(10, 'Intan Dwi Yasarah', '0812345678910', 'Indonesia', '2025-06-18 01:11:52', NULL, NULL),
(11, 'Muhammad Siddiq', '0812345678911', 'Indonesia', '2025-06-18 01:12:38', NULL, NULL),
(12, 'Raihan Adliansyah', '0812345678922', 'Indonesia', '2025-06-18 01:14:17', NULL, NULL),
(13, 'Raymond Agung Nugroho', '0812345678933', 'Indonesia', '2025-06-18 01:16:13', NULL, NULL),
(14, 'Salsabila Suci Gustiani', '0812345678944', 'Indonesia', '2025-06-18 01:16:42', NULL, NULL),
(15, 'Sayyid Hamzah Azzami', '0812345678955', 'Indonesia', '2025-06-18 01:20:53', NULL, NULL),
(16, 'Sayyid Umar Hasani', '0812345678999', 'Indonesia', '2025-06-18 02:55:16', NULL, NULL),
(17, 'Shofian Al Fikri Subagio', '0812345678801', 'Indonesia', '2025-06-18 02:55:47', NULL, NULL),
(18, 'William Setiady', '0812345611111', 'Indonesia', '2025-06-18 02:56:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `level_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', '2025-06-16 00:02:00', NULL, NULL),
(2, 'Operator', '2025-06-16 00:02:06', NULL, NULL),
(3, 'Leader', '2025-06-16 00:02:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Laundry Diri', 'diriansyah03@gmail.com', '+6282297789349', 'Jl. Bungur Besar VII No.8', '2025-06-24 03:45:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_laundry_pickup`
--

CREATE TABLE `trans_laundry_pickup` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `pickup_date` datetime NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_laundry_pickup`
--

INSERT INTO `trans_laundry_pickup` (`id`, `id_order`, `id_customer`, `pickup_date`, `notes`, `created_at`, `updated_at`) VALUES
(3, 12, 1, '2025-06-24 02:22:27', '', '2025-06-24 00:22:27', NULL),
(4, 15, 3, '2025-06-24 02:46:49', '', '2025-06-24 00:46:49', NULL),
(5, 19, 7, '2025-06-24 02:51:02', '', '2025-06-24 00:51:02', NULL),
(6, 16, 4, '2025-06-24 02:53:17', '', '2025-06-24 00:53:17', NULL),
(7, 21, 9, '2025-06-24 02:54:53', '', '2025-06-24 00:54:53', NULL),
(8, 18, 6, '2025-06-24 02:57:14', '', '2025-06-24 00:57:14', NULL),
(9, 14, 2, '2025-06-24 05:03:00', '', '2025-06-24 03:03:00', NULL),
(10, 31, 9, '2025-06-24 10:14:48', '', '2025-06-24 08:14:48', NULL),
(11, 30, 18, '2025-06-25 10:12:45', '', '2025-06-25 08:12:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order`
--

CREATE TABLE `trans_order` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `order_code` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `order_end_date` date NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  `order_pay` int(11) NOT NULL,
  `order_change` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_order`
--

INSERT INTO `trans_order` (`id`, `id_customer`, `order_code`, `order_date`, `order_end_date`, `order_status`, `created_at`, `updated_at`, `deleted_at`, `order_pay`, `order_change`, `total`) VALUES
(12, 1, 'DR1', '2025-06-24', '2025-06-30', 1, '2025-06-24 00:21:23', '2025-06-24 00:50:11', '2025-06-24 07:50:11', 200000, 93800, 106200),
(14, 2, 'DR13', '2025-06-24', '2025-06-30', 1, '2025-06-24 00:46:05', '2025-06-24 03:03:33', '2025-06-24 10:03:33', 80000, 12100, 67900),
(15, 3, 'DR15', '2025-06-24', '2025-07-02', 1, '2025-06-24 00:46:40', '2025-06-24 00:50:13', '2025-06-24 07:50:13', 100000, 60850, 39150),
(16, 4, 'DR16', '2025-06-24', '2025-07-04', 1, '2025-06-24 00:48:16', '2025-06-24 00:53:25', '2025-06-24 07:53:25', 80000, 16800, 63200),
(17, 5, 'DR17', '2025-06-24', '2025-06-28', 0, '2025-06-24 00:49:23', '2025-06-24 00:49:23', NULL, 0, 0, 8000),
(18, 6, 'DR18', '2025-06-24', '2025-06-27', 1, '2025-06-24 00:50:01', '2025-06-24 00:57:21', '2025-06-24 07:57:21', 50000, 6000, 44000),
(19, 7, 'DR19', '2025-06-24', '2025-06-27', 1, '2025-06-24 00:50:52', '2025-06-24 00:51:09', '2025-06-24 07:51:09', 20000, 3500, 16500),
(20, 8, 'DR20', '2025-06-24', '2025-06-28', 0, '2025-06-24 00:51:55', '2025-06-24 00:51:55', NULL, 0, 0, 52400),
(21, 9, 'DR21', '2025-06-24', '2025-06-26', 1, '2025-06-24 00:52:20', '2025-06-24 00:54:57', '2025-06-24 07:54:57', 50000, 5000, 45000),
(22, 10, 'DR22', '2025-06-24', '2025-06-27', 0, '2025-06-24 00:52:42', '2025-06-24 00:52:42', NULL, 0, 0, 74000),
(23, 11, 'DR23', '2025-06-24', '2025-06-27', 0, '2025-06-24 00:54:02', '2025-06-24 00:54:02', NULL, 0, 0, 67300),
(24, 12, 'DR24', '2025-06-24', '2025-06-26', 0, '2025-06-24 00:54:28', '2025-06-24 00:54:28', NULL, 0, 0, 46500),
(25, 13, 'DR25', '2025-06-24', '2025-06-28', 0, '2025-06-24 00:54:44', '2025-06-24 00:54:44', NULL, 0, 0, 70000),
(26, 14, 'DR26', '2025-06-24', '2025-06-27', 0, '2025-06-24 00:55:37', '2025-06-24 00:55:37', NULL, 0, 0, 10500),
(27, 15, 'DR27', '2025-06-24', '2025-06-26', 0, '2025-06-24 00:56:00', '2025-06-24 00:56:00', NULL, 0, 0, 56000),
(28, 16, 'DR28', '2025-06-24', '2025-06-30', 0, '2025-06-24 00:56:27', '2025-06-24 00:56:27', NULL, 0, 0, 26000),
(29, 17, 'DR29', '2025-06-24', '2025-06-28', 0, '2025-06-24 00:56:44', '2025-06-24 00:56:44', NULL, 0, 0, 54000),
(30, 18, 'DR30', '2025-06-24', '2025-06-27', 1, '2025-06-24 00:57:00', '2025-06-25 08:13:03', '2025-06-25 15:13:03', 50000, 26000, 24000),
(31, 9, 'DR31', '2025-06-24', '2025-06-27', 1, '2025-06-24 08:14:34', '2025-06-24 23:51:01', '2025-06-25 06:51:01', 30000, 6300, 23700),
(32, 16, 'DR32', '2025-06-25', '2025-06-27', 0, '2025-06-25 08:19:39', '2025-06-25 08:19:39', NULL, 0, 0, 21700);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_order_detail`
--

CREATE TABLE `trans_order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_service` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` double(10,2) NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `trans_order_detail`
--

INSERT INTO `trans_order_detail` (`id`, `id_order`, `id_service`, `qty`, `subtotal`, `notes`, `created_at`, `updated_at`) VALUES
(22, 12, 4, 10100, 70700.00, 'bersih', '2025-06-24 00:21:23', NULL),
(23, 12, 3, 2600, 13000.00, 'rapih', '2025-06-24 00:21:23', NULL),
(24, 12, 1, 4500, 22500.00, '', '2025-06-24 00:21:23', NULL),
(25, 14, 4, 4200, 29400.00, 'bersih mengkilap', '2025-06-24 00:46:05', NULL),
(26, 14, 1, 7700, 38500.00, '', '2025-06-24 00:46:05', NULL),
(27, 15, 2, 8700, 39150.00, '', '2025-06-24 00:46:40', NULL),
(28, 16, 4, 3400, 23800.00, 'hati-hati udah usang tolong pelan-pelan bersihinnya', '2025-06-24 00:48:16', NULL),
(29, 16, 3, 1200, 6000.00, '', '2025-06-24 00:48:16', NULL),
(30, 16, 2, 5200, 23400.00, '', '2025-06-24 00:48:16', NULL),
(31, 16, 1, 2000, 10000.00, 'bersih rapih', '2025-06-24 00:48:16', NULL),
(32, 17, 3, 1600, 8000.00, '', '2025-06-24 00:49:23', NULL),
(33, 18, 3, 2100, 10500.00, 'yang rapih buat kerja', '2025-06-24 00:50:01', NULL),
(34, 18, 1, 6700, 33500.00, '', '2025-06-24 00:50:01', NULL),
(35, 19, 3, 3300, 16500.00, '', '2025-06-24 00:50:52', NULL),
(36, 20, 2, 4200, 18900.00, 'pake sabun colek', '2025-06-24 00:51:55', NULL),
(37, 20, 1, 6700, 33500.00, '', '2025-06-24 00:51:55', NULL),
(38, 21, 2, 10000, 45000.00, '', '2025-06-24 00:52:20', NULL),
(39, 22, 3, 3600, 18000.00, '', '2025-06-24 00:52:42', NULL),
(40, 22, 4, 8000, 56000.00, '', '2025-06-24 00:52:42', NULL),
(41, 23, 4, 8900, 62300.00, '', '2025-06-24 00:54:02', NULL),
(42, 23, 3, 1000, 5000.00, '', '2025-06-24 00:54:02', NULL),
(43, 24, 3, 1600, 8000.00, '', '2025-06-24 00:54:28', NULL),
(44, 24, 4, 5500, 38500.00, '', '2025-06-24 00:54:28', NULL),
(45, 25, 4, 10000, 70000.00, '', '2025-06-24 00:54:44', NULL),
(46, 26, 3, 2100, 10500.00, '', '2025-06-24 00:55:37', NULL),
(47, 27, 2, 9000, 40500.00, '', '2025-06-24 00:56:00', NULL),
(48, 27, 3, 3100, 15500.00, '', '2025-06-24 00:56:00', NULL),
(49, 28, 3, 5200, 26000.00, '', '2025-06-24 00:56:27', NULL),
(50, 29, 2, 12000, 54000.00, '', '2025-06-24 00:56:44', NULL),
(51, 30, 3, 3000, 15000.00, '', '2025-06-24 00:57:00', NULL),
(52, 30, 2, 2000, 9000.00, '', '2025-06-24 00:57:00', NULL),
(53, 31, 3, 3200, 16000.00, 'bersih', '2025-06-24 08:14:34', NULL),
(54, 31, 4, 1100, 7700.00, 'yg bener', '2025-06-24 08:14:34', NULL),
(55, 32, 4, 3100, 21700.00, 'weqwe', '2025-06-25 08:19:39', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_of_service`
--

CREATE TABLE `type_of_service` (
  `id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `type_of_service`
--

INSERT INTO `type_of_service` (`id`, `service_name`, `price`, `description`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 'Wash and Ironing', 5000, 'Jasa Cuci dan Gosok harganya Rp.5.000 per Kg', '2025-06-16 01:29:47', NULL, NULL),
(2, 'Wash', 4500, 'Jasa Cuci dengan harga Rp.4.500 per Kg', '2025-06-16 01:33:06', NULL, NULL),
(3, 'Ironing', 5000, 'Jasa gosok dengan harga Rp.5.000 per Kg', '2025-06-16 01:33:57', NULL, NULL),
(4, 'Big Laundry', 7000, 'Jasa Laundry Besar seperti selimut, karpet, mantel, dan sprei my love dengan harga Rp.7.000 per Kg', '2025-06-16 01:37:49', '2025-06-16 07:06:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_level`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Diriansyah', 'admin@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '2025-06-15 23:55:32', NULL),
(2, 2, 'Budi', 'budi@gmail.com', '30a96cdbc1205b1ed4ae399350fe8f6d839f32cc', '2025-06-16 00:02:44', NULL),
(3, 3, 'Muhammad Reza Ibrahim', 'pakreza@gmail.com', 'c2c035fdf6170d48dc1f0d129776bf2ca17b1a72', '2025-06-18 23:46:30', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trans_laundry_pickup`
--
ALTER TABLE `trans_laundry_pickup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `trans_order_detail_ibfk_2` (`id_service`);

--
-- Indeks untuk tabel `type_of_service`
--
ALTER TABLE `type_of_service`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `trans_laundry_pickup`
--
ALTER TABLE `trans_laundry_pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `type_of_service`
--
ALTER TABLE `type_of_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `trans_laundry_pickup`
--
ALTER TABLE `trans_laundry_pickup`
  ADD CONSTRAINT `trans_laundry_pickup_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `trans_order` (`id`),
  ADD CONSTRAINT `trans_laundry_pickup_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Ketidakleluasaan untuk tabel `trans_order`
--
ALTER TABLE `trans_order`
  ADD CONSTRAINT `trans_order_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trans_order_detail`
--
ALTER TABLE `trans_order_detail`
  ADD CONSTRAINT `trans_order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `trans_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trans_order_detail_ibfk_2` FOREIGN KEY (`id_service`) REFERENCES `type_of_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
