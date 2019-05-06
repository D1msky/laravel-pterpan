-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 06, 2019 at 09:43 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pterpan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_skripsi`
--

CREATE TABLE `detail_skripsi` (
  `id_dtl` bigint(20) UNSIGNED NOT NULL,
  `id_skripsi` int(11) NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_skripsi`
--

INSERT INTO `detail_skripsi` (`id_dtl`, `id_skripsi`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Catatan untuk yonatan 1', '2019-05-06 00:46:45', '2019-05-06 00:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `user_id`, `nama`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(2, 15, 'Lussy', 'lussy@gmail.com', '$2y$10$fzKvOiEv296/gKTSwg.ZWeP54HcewEONnsH.3zWB6obJpNGaBBP2m', 'Kaprodi', '2019-05-01 01:34:34', '2019-05-01 04:10:58'),
(3, 18, 'Katon Wijana', 'katon@gmail.com', '$2y$10$aoLEwyfbjOFHXcPpuBw8k.zPbvmD8Or7.krsvL3zxYMsSg49mU8eK', 'Dosen', '2019-05-04 00:36:47', '2019-05-04 00:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `user_id`, `nim`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(7, 9, '72160003', 'Dimas', 'dimas.sanjaya@si.ukdw.ac.id', '$2y$10$3jnpBGm2aY1v0ffaH2rSSO33WhJRY4flq5KZwT3DWPKN1R2gkPVdG', '2019-04-12 09:23:19', '2019-04-12 09:23:19'),
(8, 10, '72160013', 'Iren1', 'iren.resna@gmail.com', '$2y$10$SpfIBbPV98hWsv13KRfI9upR.kEDKw4GnORaXfUw4/33mKvwodrka', '2019-04-12 09:23:30', '2019-05-01 04:09:36'),
(9, 17, '72160021', 'Yonatan', 'yoyo@gmail.com', '$2y$10$tTaHxJr5HNtwxuKwUTVLCOixriA5JGFzvMKB10C1mp4c2ZjQ2V/7S', '2019-05-04 00:36:23', '2019-05-04 00:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_03_23_125813_create_dosen_table', 1),
(2, '2019_03_23_125846_create_mahasiswa_table', 1),
(3, '2019_03_23_125922_create_skripsi_table', 1),
(4, '2019_03_23_125952_create_pengajuan_table', 1),
(5, '2019_03_23_130055_create_det_skripsi_table', 1),
(6, '2019_03_25_073657_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dibaca` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `user_id`, `pesan`, `status`, `dibaca`, `created_at`, `updated_at`) VALUES
(1, 9, 'Notifikasi Pertama', 'Sukses', 0, '2019-05-03 16:17:06', '2019-05-04 07:49:35'),
(2, 9, 'Notifikasi Kedua', 'Ditolak', 0, '2019-05-03 16:17:06', '2019-05-04 07:49:35'),
(4, 18, '72160021 Pengajuan Skripsi dengan judul Sistem Informasi Kedai Kopi', 'Sukses', 0, '2019-05-04 00:54:32', '2019-05-04 00:54:32'),
(5, 17, 'Pengajuan Ditolak', 'Ditolak', 0, '2019-05-05 09:03:55', '2019-05-05 09:03:55'),
(6, 17, 'Pengajuan Telah Diterima', 'Sukses', 0, '2019-05-05 09:09:11', '2019-05-05 09:09:11'),
(7, 17, 'BAB 1 anda Ditolak !', 'Ditolak', 0, '2019-05-06 01:03:19', '2019-05-06 01:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` bigint(20) UNSIGNED NOT NULL,
  `id_dosen` bigint(20) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mhs` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_acc` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_dosen`, `judul`, `id_mhs`, `status`, `tgl_acc`, `tgl_selesai`, `created_at`, `updated_at`) VALUES
(1, 2, 'Sistem Informasi Kesehatan', 7, 'Diproses', '2019-05-01', '2019-07-17', NULL, NULL),
(2, 2, 'Sistem Informasi Pilpres', 8, 'Diterima', NULL, NULL, NULL, NULL),
(3, 3, 'Sistem Informasi Kedai Kopi', 9, 'Diterima', '2019-05-05', NULL, '2019-05-04 00:54:32', '2019-05-05 09:10:06'),
(4, 3, 'Test1', 8, 'Diterima', '2019-05-01', '2019-11-14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `id_skripsi` bigint(20) UNSIGNED NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`id_skripsi`, `id_pengajuan`, `judul`, `file`, `tgl_awal`, `tgl_akhir`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'BAB 1', '1557127429_Penelitian.pdf', '1970-01-01', '1970-01-01', 'Ditolak', '2019-05-05 09:10:06', '2019-05-06 01:03:19'),
(2, 3, 'BAB 2', NULL, NULL, NULL, 'Diproses', '2019-05-05 09:10:06', '2019-05-05 09:10:06'),
(3, 3, 'BAB 3', NULL, NULL, NULL, 'Diproses', '2019-05-05 09:10:06', '2019-05-05 09:10:06'),
(4, 3, 'BAB 4', NULL, NULL, NULL, 'Diproses', '2019-05-05 09:10:06', '2019-05-05 09:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Dimas', 'dimas.sanjaya@si.ukdw.ac.id', NULL, '$2y$10$3jnpBGm2aY1v0ffaH2rSSO33WhJRY4flq5KZwT3DWPKN1R2gkPVdG', 'Mahasiswa', 'Rwrd6kcKd9izTKRHkanNsArkQ0NMLAspusA3p9J2SNILAwHCehkGBsXRmemF', '2019-04-12 09:23:19', '2019-04-12 09:23:19'),
(10, 'Iren1', 'iren.resna@gmail.com', NULL, '$2y$10$SpfIBbPV98hWsv13KRfI9upR.kEDKw4GnORaXfUw4/33mKvwodrka', 'Mahasiswa', 'YXtshEaRuKSn6h9OVbybK8IvKe6VyAEpVYjG44PIaInU8WI9iB18986OVc9s', '2019-04-12 09:23:30', '2019-05-01 04:09:36'),
(15, 'Lussy', 'lussy@gmail.com', NULL, '$2y$10$fzKvOiEv296/gKTSwg.ZWeP54HcewEONnsH.3zWB6obJpNGaBBP2m', 'Dosen', 'OITZGRZwI83kVxjyzPFAwuV6GZkdQUCJxB9B9dUoTHFmGqh4JXhRsPSANV3y', '2019-05-01 01:34:34', '2019-05-01 04:10:58'),
(16, 'Admin', 'admin@gmail.com', NULL, '$2y$10$pIkPPYL0nabLeyFG4uV/ouFaXa6FIWemZ/kFsrsUuJiu.NpCgsjT.', 'Admin', '0iBuYyW2KxSMu20zilD2Ls1k3W6NXVtb5jf3Xtb4J4BIiqFlZ0MI6CBaTFGC', '2019-05-03 06:36:35', '2019-05-03 06:36:35'),
(17, 'Yonatan', 'yoyo@gmail.com', NULL, '$2y$10$tTaHxJr5HNtwxuKwUTVLCOixriA5JGFzvMKB10C1mp4c2ZjQ2V/7S', 'Mahasiswa', 'bSmjCGb4lQyeUI836qbNLOHltuqxe0DqV82UpKx68TOJN9R4CM7BUeqRlb8x', '2019-05-04 00:36:23', '2019-05-04 00:36:23'),
(18, 'Katon Wijana', 'katon@gmail.com', NULL, '$2y$10$aoLEwyfbjOFHXcPpuBw8k.zPbvmD8Or7.krsvL3zxYMsSg49mU8eK', 'Dosen', 'Eci9TK1v1OOoupWLTGBry9PRKsjO3smuhiqsoNB7Jg7eKm1tMpgNh7luaMC9', '2019-05-04 00:36:47', '2019-05-04 00:36:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_skripsi`
--
ALTER TABLE `detail_skripsi`
  ADD PRIMARY KEY (`id_dtl`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_skripsi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_skripsi`
--
ALTER TABLE `detail_skripsi`
  MODIFY `id_dtl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `id_skripsi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
