-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 09 Bulan Mei 2023 pada 04.31
-- Versi server: 5.7.34
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `no_akun` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_akun` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`no_akun`, `nm_akun`) VALUES
('105', 'Kas'),
('500', 'Penjualan Sparepart'),
('505', 'Penjualan Jasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` enum('pcs','pck') COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `supplier_id`, `barcode`, `nama`, `satuan`, `stok`, `harga_beli`, `harga_jual`, `profit`, `created_at`, `updated_at`) VALUES
(2, 2, '1112', 'Ban', 'pcs', 20, 10000, 20000, 10000, '2023-05-05 04:06:05', '2023-05-05 04:06:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_penjualan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `kode_penjualan`, `total_pembayaran`, `pembayaran`, `kembalian`, `created_at`, `updated_at`) VALUES
(7, 'LM1104230001', 7000, 10000, 3000, '2023-04-11 04:34:03', '2023-04-11 04:34:03'),
(8, 'LM1104230002', 5000, 10000, 5000, '2023-04-11 05:14:17', '2023-04-11 05:14:17'),
(9, 'LM1604230002', 7000, 10000, 3000, '2023-04-16 03:21:46', '2023-04-16 03:21:46'),
(10, 'LM0305230001', 5000, 10000, 5000, '2023-05-03 06:21:28', '2023-05-03 06:21:28'),
(11, 'LM0305230002', 2000, 2000, 0, '2023-05-03 07:45:17', '2023-05-03 07:45:17'),
(12, 'LM0305230003', 10000, 10000, 0, '2023-05-03 07:54:24', '2023-05-03 07:54:24'),
(13, 'LM0405230001', 50000, 50000, 0, '2023-05-04 03:59:18', '2023-05-04 03:59:18'),
(14, 'LM0405230002', 25000, 30000, 5000, '2023-05-04 05:33:00', '2023-05-04 05:33:00'),
(15, 'LM0405230003', 20000, 20000, 0, '2023-05-04 05:51:42', '2023-05-04 05:51:42'),
(16, 'FB0405230004', 20000, 50000, 30000, '2023-05-04 06:14:26', '2023-05-04 06:14:26'),
(17, 'FB0405230005', 20000, 40000, 20000, '2023-05-04 06:36:27', '2023-05-04 06:36:27'),
(18, 'FB0405230006', 20000, 20000, 0, '2023-05-04 08:16:22', '2023-05-04 08:16:22'),
(19, 'FB0705230001', 20000, 20000, 0, '2023-05-07 05:09:19', '2023-05-07 05:09:19'),
(20, 'FB0805230001', 40000, 50000, 10000, '2023-05-08 08:31:25', '2023-05-08 08:31:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `no_jurnal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_jurnal` date NOT NULL,
  `no_akun` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `lap_jurnal`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `lap_jurnal` (
`nm_akun` varchar(50)
,`tgl` date
,`debet` decimal(32,0)
,`kredit` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2023_04_07_085656_create_penjualans_table', 4),
(10, '2023_04_07_091611_create_detail_penjualan_table', 5),
(14, '2023_04_16_132200_create_akuns_table', 8),
(15, '2023_05_03_105338_create_registers_table', 9),
(16, '2023_05_03_124859_jurnal', 9),
(22, '2023_05_04_120056_create_penjualans_table', 11),
(23, '2023_04_04_093025_create_suppliers_table', 12),
(24, '2023_04_06_041816_create_barangs_table', 13),
(25, '2023_04_04_093025_create_customers_table', 14),
(26, '2023_05_09_103550_create_services_table', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kode_penjualan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `user_id`, `kode_penjualan`, `nama`, `qty`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 1, 'LM0405230001', 'Ban', '1', '20000', '2023-05-04 05:31:43', '2023-05-04 05:31:43'),
(2, 1, 'LM0405230002', 'Ban', '1', '20000', '2023-05-04 05:32:40', '2023-05-04 05:32:40'),
(3, 1, 'LM0405230002', 'Rantai', '1', '5000', '2023-05-04 05:32:51', '2023-05-04 05:32:51'),
(4, 1, 'LM0405230003', 'Ban', '1', '20000', '2023-05-04 05:51:32', '2023-05-04 05:51:32'),
(5, 1, 'FB0405230004', 'Ban', '1', '20000', '2023-05-04 06:14:13', '2023-05-04 06:14:13'),
(6, 1, 'FB0405230005', 'Ban', '1', '20000', '2023-05-04 06:36:19', '2023-05-04 06:36:19'),
(7, 1, 'FB0405230006', 'Service Rem', '1', '20000', '2023-05-04 08:15:47', '2023-05-04 08:15:47'),
(8, 1, 'FB0705230001', 'ban', '1', '20000', '2023-05-07 05:09:01', '2023-05-07 05:09:01'),
(9, 11, 'FB0805230001', 'Ban', '2', '40000', '2023-05-08 08:31:07', '2023-05-08 08:31:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `registers`
--

CREATE TABLE `registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'PT. Agung Jaya', 'Jalan Pahlawan', '2023-05-05 03:58:50', '2023-05-05 03:58:50'),
(2, 'PT. JUARA', 'BUBULAK/08123456', '2023-05-05 04:05:08', '2023-05-07 06:09:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Putri', 'putri123@gmail.com', '2023-04-06 06:46:08', '$2y$10$zUDgV.Y8.KDzRoMnqjCEQuQJDzAipA2XU90uORR0nnP7GBhuv1Fva', 'UBXRkAjEsQxEpeqIs48KB8f1a9IMkDacoIB0m0rOwOyF2ppOHvGUYGiXNT9c', 'admin', '1683423271-kantor pajak di malang.jpg', NULL, '2023-05-07 01:34:31'),
(2, 'contoh', 'kepsek@sch.id', '2023-04-06 06:48:52', '$2y$10$aUtQiJCi74Ng.4hutD1twuEG/m.WT97pGKYjCLez76zK8WlpHZegq', 'czra2ISqzjXFsK0ySZnR4i0FSzAAoPRpd9ebkcRExR7KiyMYYIooXvcWgvPq', 'customer', 'user.png', NULL, '2023-05-08 14:42:44'),
(7, 'Devi', 'devi@gmail.com', NULL, '$2y$10$HWYNYLREXWLPTBJNG77FtO4RyzdRVmAaoddxA6/FLJxZy5oqMJWxG', NULL, 'kasir', 'user.png', '2023-04-06 07:28:23', '2023-05-07 02:33:08'),
(11, 'Caca Tiyas', 'caca@gmail.com', '2023-05-07 03:16:12', '$2y$10$XMx0WakOmpMN.LXe7wP4ju.D2xHkQ06QO4Qi1cr5v/JiVsU55QcWK', 'mNjQvT0HpU3cBVvtCYupZedKkHqvFYfDlgaY0Z1gocrNNAIRFwu41tVdcptu', 'kasir', 'user.png', NULL, '2023-05-07 03:16:51'),
(12, 'contoh', 'example@gmail.com', NULL, '$2y$10$zaF5nSBp4MXXGu3R6OsII.qXGomdeF37WeKByZonMs3wgeqs54RCK', NULL, 'kasir', 'user.png', '2023-05-08 13:49:41', '2023-05-08 13:49:41'),
(13, 'ihya', 'admin@gmail.com', NULL, '$2y$10$zzm2LVsiSe6FUb3.OSsaxePb5WSa2EWHwkXtZkRk2XJKqySAwEd6q', NULL, 'customer', 'user.png', '2023-05-08 13:50:29', '2023-05-08 13:50:29'),
(14, 'pemda', 'contoh@gmail.com', NULL, '$2y$10$/VYmHk2dzbkFi4LrRjWovO5AEUJclWs013IkOWI7rRBuMp5vwZ2fS', NULL, 'customer', 'user.png', '2023-05-08 14:05:02', '2023-05-08 14:05:02'),
(15, 'contoh', 'lucu@gmail.com', NULL, '$2y$10$apYtnbIktCtHfohEVrSdiOqsLHlPe9A9MYZJYTqBHRJF2te6bREX6', NULL, 'customer', 'user.png', '2023-05-08 18:38:11', '2023-05-08 18:38:11'),
(22, 'yoi', 'ihya@email.com', NULL, '$2y$10$T4HKywNYwAKRbPwZ6e7el.5HHfaAGE3/NZYwZJilGhGfWo0/GVkJa', NULL, 'customer', 'user.png', '2023-05-08 19:18:00', '2023-05-08 19:18:00');

-- --------------------------------------------------------

--
-- Struktur untuk view `lap_jurnal`
--
DROP TABLE IF EXISTS `lap_jurnal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lap_jurnal`  AS SELECT `akun`.`nm_akun` AS `nm_akun`, `jurnal`.`tgl_jurnal` AS `tgl`, sum(`jurnal`.`debet`) AS `debet`, sum(`jurnal`.`kredit`) AS `kredit` FROM (`akun` join `jurnal`) WHERE (`akun`.`no_akun` = `jurnal`.`no_akun`) GROUP BY `jurnal`.`no_jurnal` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_akun`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `registers`
--
ALTER TABLE `registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
