-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2022 pada 06.55
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sdama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_nilai_siswas`
--

CREATE TABLE `data_nilai_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_ujian_id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ujian_id` bigint(20) UNSIGNED NOT NULL,
  `pkn` int(11) NOT NULL,
  `mtk` int(11) NOT NULL,
  `ing` int(11) NOT NULL,
  `ind` int(11) NOT NULL,
  `jawa` int(11) NOT NULL,
  `pjok` int(11) NOT NULL,
  `ipa` int(11) NOT NULL,
  `ips` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_nilai_siswas`
--

INSERT INTO `data_nilai_siswas` (`id`, `user_id`, `jenis_ujian_id`, `tahun_ujian_id`, `pkn`, `mtk`, `ing`, `ind`, `jawa`, `pjok`, `ipa`, `ips`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1, 85, 92, 80, 85, 0, 0, 0, 0, NULL, NULL),
(4, 5, 4, 1, 80, 85, 82, 88, 0, 0, 0, 0, '2022-05-17 20:47:23', '2022-05-17 20:47:23'),
(6, 7, 4, 1, 84, 94, 90, 70, 0, 0, 0, 0, '2022-05-17 21:09:38', '2022-05-17 21:09:38'),
(7, 6, 4, 1, 79, 85, 75, 88, 0, 0, 0, 0, '2022-05-17 23:36:51', '2022-05-17 23:37:59'),
(8, 6, 4, 2, 82, 85, 90, 70, 0, 0, 0, 0, '2022-05-18 19:47:41', '2022-05-18 19:47:41'),
(9, 5, 4, 2, 72, 80, 75, 72, 0, 0, 0, 0, '2022-05-18 19:53:35', '2022-05-18 21:11:07'),
(10, 15, 4, 3, 0, 0, 0, 0, 0, 0, 0, 0, '2022-06-01 20:59:52', '2022-06-01 21:02:16'),
(11, 15, 4, 3, 88, 80, 75, 72, 80, 78, 80, 75, '2022-06-01 21:07:10', '2022-06-01 21:08:28'),
(12, 14, 4, 3, 80, 81, 88, 75, 80, 78, 70, 75, '2022-06-01 21:07:56', '2022-06-01 21:07:56'),
(13, 15, 4, 1, 79, 80, 75, 70, 80, 78, 70, 75, '2022-06-01 21:09:30', '2022-06-01 21:09:30'),
(14, 14, 4, 1, 84, 94, 90, 88, 85, 78, 70, 75, '2022-06-01 21:10:05', '2022-06-01 21:10:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_ujians`
--

CREATE TABLE `jenis_ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `ujian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_ujians`
--

INSERT INTO `jenis_ujians` (`id`, `id_sekolah`, `ujian`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1500446, 'UTS 1', 'uts1', '2022-05-16 19:45:04', '2022-05-16 19:45:04'),
(2, 1500446, 'UAS 1', 'uas1', '2022-05-16 19:58:52', '2022-05-16 19:58:52'),
(3, 1500446, 'UTS 2', 'uts2', '2022-05-16 19:59:21', '2022-05-16 19:59:21'),
(4, 1500446, 'UAS 2', 'uas2', '2022-05-16 19:59:38', '2022-05-16 19:59:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `id_sekolah`, `kelas`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1500446, 'XI RPL 4', '1500446XIRPL4', '2022-05-14 19:15:24', '2022-05-14 19:15:24'),
(2, 1500446, 'XI RPL 3', '1500446XIRPL3', '2022-05-15 03:32:11', '2022-05-15 03:32:11'),
(3, 1500446, 'XI RPL 5', '1500446XIRPL5', '2022-05-15 03:59:04', '2022-05-15 03:59:04'),
(4, 108009, 'XI RPL 4', '0108009XIRPL4', '2022-05-31 18:48:29', '2022-05-31 18:48:29'),
(5, 108009, 'XI RPL 3', '0108009XIRPL3', '2022-05-31 18:48:45', '2022-05-31 18:48:45');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_11_035555_create_kelas_table', 1),
(6, '2022_04_11_035703_create_wali_kelas_table', 1),
(7, '2022_04_11_035807_create_roles_table', 1),
(8, '2022_04_11_035855_create_jenis_ujians_table', 1),
(9, '2022_04_11_035936_create_tahun_ujians_table', 1),
(10, '2022_04_11_041029_create_data_nilai_siswas_table', 1),
(11, '2022_04_12_061612_create_sekolahs_table', 1);

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
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2022-05-14 19:13:32', '2022-05-14 19:13:32'),
(2, 'Guru', 'guru', '2022-05-14 19:13:32', '2022-05-14 19:13:32'),
(3, 'Siswa', 'siswa', '2022-05-14 19:13:32', '2022-05-14 19:13:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_sekolah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `id_sekolah`, `nama`, `alamat_sekolah`, `created_at`, `updated_at`) VALUES
(1, '1500446', 'School', 'Indo', '2022-05-14 19:14:28', '2022-05-14 19:14:28'),
(2, '3101016', 'My', 'Myzaka', '2022-05-31 07:53:29', '2022-05-31 07:53:29'),
(3, '0108009', 'My School', 'Jakarta', '2022-05-31 18:43:06', '2022-05-31 18:43:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ujians`
--

CREATE TABLE `tahun_ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tahun_ujians`
--

INSERT INTO `tahun_ujians` (`id`, `id_sekolah`, `tahun`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1500446, '2021 - 2022', '20212022', '2022-05-16 10:44:36', '2022-05-16 10:44:36'),
(2, 1500446, '2020 - 2021', '20202021', '2022-05-16 19:24:24', '2022-05-16 19:24:24'),
(3, 0, '2022 - 2023', '20222023', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sekolah_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `walikelas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `nis`, `alamat`, `sekolah_id`, `role_id`, `kelas_id`, `walikelas_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fadhlu Ibnu', 'fad@gmail.com', '$2y$10$1xC3tFAUHSo8Vj8SN6oAJOr3AcPBiq3C.XTOgkTlxQBEc0zQQIWe2', NULL, 'Kebumen', 1, 1, NULL, NULL, NULL, '2022-05-14 19:14:28', '2022-05-31 07:21:47'),
(2, 'Fadhlu Ibnu \'Abbad', 'fadhluibnu@gmail.com', '$2y$10$Uaa0a.z23D3f8Nciyy3Hte5Zr008bzSHVXwPwQypxmhwoULnh24bi', '3103120088', 'Kebumen', 1, 3, 1, NULL, NULL, '2022-05-15 00:45:55', '2022-05-15 00:45:55'),
(4, 'Ibnu Abbad', 'ibnua@gmail.com', '$2y$10$.zSOfkC87fMdac3ahDh8veBaSE22QvUyhSjMOe92Zgf6IoBcreob.', '1234567890', 'Kebumen', 1, 2, NULL, 1, NULL, '2022-05-15 02:11:52', '2022-05-15 18:05:53'),
(5, 'Hamzah', 'hamzah@gmail.com', '$2y$10$gXqfbMVz2GY3fUdmhK0MN.EZMPHbKhWU7GxyJDio0H.BEfYQTQ8UW', '3103120080', 'Jawa Tengah', 1, 3, 1, NULL, NULL, '2022-05-16 01:08:46', '2022-05-16 01:08:46'),
(6, 'Jhjo', 'jo@gmail.com', '$2y$10$8HnVorZNl02/gxglVqkjleSFEooGBOLLpRkRtj/rbeWBC33Bp8sLm', '3103120090', 'Semarang', 1, 3, 1, NULL, NULL, '2022-05-16 01:09:50', '2022-05-16 01:09:50'),
(7, 'Kenzo', 'zo@gmail.com', '$2y$10$vKxzKIa6GNhH/yL0sJITHeo.OFGnT/4YdlR1c6mtivbTmqSbAM6Lq', '3103120079', 'Bandung', 1, 3, 1, NULL, NULL, '2022-05-16 01:11:27', '2022-05-16 01:11:27'),
(8, 'Fadhlu Ibnu', 'f.ibnu@gmail.com', '$2y$10$LBg8hVukAw0q/sl8WqtBve6AflVl.Kue8lrpexpAn74Zc7T6RDfCK', '3103120020', 'Kebumen', 1, 2, NULL, 2, NULL, '2022-05-16 01:12:11', '2022-05-16 01:12:11'),
(10, 'za', 'za@gmail.com', '$2y$10$n6DNMWU1r/aizOJSRuSLFut0Ghw/b8WpbDE4SJeL1.QBLqYOD8BXm', NULL, 'Zakarta', 2, 1, NULL, NULL, NULL, '2022-05-31 07:53:29', '2022-05-31 07:53:29'),
(11, 'Zanu', 'zanu@gmail.com', '$2y$10$MR9jg8XPAEYBhHtdAi17g.bpl3ODGbVcr0Pre4ahEk7FCRWZ7z4fO', NULL, 'Jakarta Pusat', 3, 1, NULL, NULL, NULL, '2022-05-31 18:43:08', '2022-05-31 18:59:32'),
(12, 'Zoro', 'zoro@gmail.com', '$2y$10$mlutGGQqi2B8ixHtkvr.Z.H2E.EpTp2HeSsjDJLZXjpb5fP8YapZu', '3103140068', 'Jakarta', 3, 2, NULL, 5, NULL, '2022-05-31 18:49:36', '2022-05-31 18:49:36'),
(13, 'JoroZ', 'joro@gmail.com', '$2y$10$JIUZms7605HyjugXm6htu.PJEI5tqnyA4I0QvnZI8opWo1IQ57KKC', '3103120089', 'Jakarta Pusat', 3, 2, NULL, 4, NULL, '2022-05-31 18:52:04', '2022-05-31 18:52:48'),
(14, 'Rojoo', 'rojoo@gmail.com', '$2y$10$EKBVoft0UCvWFsmlA96t6.JV0..DFSyPbYdNUqOqXTIUTHPsiQ3Oi', '3103120078', 'Jakarta', 3, 3, 5, NULL, NULL, '2022-05-31 18:55:03', '2022-05-31 18:55:03'),
(15, 'Jojo', 'jojo@gmail.com', '$2y$10$6..1B6v9xy2pF/GbacjRBOCorpPkgA4DPxAGunLntTzIUIvOFrfBi', '3103120070', 'Jakarta', 3, 3, 5, NULL, NULL, '2022-05-31 18:56:01', '2022-05-31 18:56:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `walas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wali_kelas`
--

INSERT INTO `wali_kelas` (`id`, `id_sekolah`, `walas`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1500446, 'XI RPL 4', '1500446XIRPL4', '2022-05-14 19:15:23', '2022-05-14 19:15:23'),
(2, 1500446, 'XI RPL 3', '1500446XIRPL3', '2022-05-15 03:32:11', '2022-05-15 03:32:11'),
(3, 1500446, 'XI RPL 5', '1500446XIRPL5', '2022-05-15 03:59:04', '2022-05-15 03:59:04'),
(4, 108009, 'XI RPL 4', '0108009XIRPL4', '2022-05-31 18:48:29', '2022-05-31 18:48:29'),
(5, 108009, 'XI RPL 3', '0108009XIRPL3', '2022-05-31 18:48:45', '2022-05-31 18:48:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_nilai_siswas`
--
ALTER TABLE `data_nilai_siswas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenis_ujians`
--
ALTER TABLE `jenis_ujians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_ujians`
--
ALTER TABLE `tahun_ujians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_nilai_siswas`
--
ALTER TABLE `data_nilai_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_ujians`
--
ALTER TABLE `jenis_ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tahun_ujians`
--
ALTER TABLE `tahun_ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
