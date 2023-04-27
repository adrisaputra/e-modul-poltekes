-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table db_emodul_poltekes.baca_job_sheet_tbl
CREATE TABLE IF NOT EXISTS `baca_job_sheet_tbl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `modul_id` int(11) unsigned NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `villages_subdistrict_id_foreign` (`modul_id`) USING BTREE,
  KEY `FK_baca_job_sheet_tbl_users` (`user_id`),
  CONSTRAINT `FK_baca_job_sheet_tbl_modul_tbl` FOREIGN KEY (`modul_id`) REFERENCES `modul_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_baca_job_sheet_tbl_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_emodul_poltekes.baca_job_sheet_tbl: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `baca_job_sheet_tbl` DISABLE KEYS */;
INSERT INTO `baca_job_sheet_tbl` (`id`, `modul_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
	(4, 6, 3, 0, '2022-12-02 07:19:16', '2022-12-02 07:19:16');
/*!40000 ALTER TABLE `baca_job_sheet_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_emodul_poltekes.failed_jobs: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.job_sheet_tbl
CREATE TABLE IF NOT EXISTS `job_sheet_tbl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_emodul_poltekes.job_sheet_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `job_sheet_tbl` DISABLE KEYS */;
INSERT INTO `job_sheet_tbl` (`id`, `judul`, `created_at`, `updated_at`) VALUES
	(1, 'Asuhan Kebidanan Kehamilan pada  Kunjungan Awal', '2022-11-24 13:53:45', '2022-11-24 14:48:26');
/*!40000 ALTER TABLE `job_sheet_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.kelas_tbl
CREATE TABLE IF NOT EXISTS `kelas_tbl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_dosen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_emodul_poltekes.kelas_tbl: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `kelas_tbl` DISABLE KEYS */;
INSERT INTO `kelas_tbl` (`id`, `kelas`, `nama_dosen`, `ruangan`, `created_at`, `updated_at`) VALUES
	(2, '1B', 'sasa', 'sasa', '2022-11-24 16:57:25', '2022-11-24 16:58:11');
/*!40000 ALTER TABLE `kelas_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.mahasiswa_tbl
CREATE TABLE IF NOT EXISTS `mahasiswa_tbl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) unsigned DEFAULT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_mahasiswa_tbl_kelas_tbl` (`kelas_id`),
  CONSTRAINT `FK_mahasiswa_tbl_kelas_tbl` FOREIGN KEY (`kelas_id`) REFERENCES `kelas_tbl` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_emodul_poltekes.mahasiswa_tbl: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `mahasiswa_tbl` DISABLE KEYS */;
INSERT INTO `mahasiswa_tbl` (`id`, `kelas_id`, `nim`, `nama`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
	(3, 2, 'E1E109096', 'ADRI SAPUTRA IBRAHIM', NULL, NULL, '2022-11-24 17:41:59', '2022-11-24 17:41:59');
/*!40000 ALTER TABLE `mahasiswa_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_emodul_poltekes.migrations: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
	(6, '2021_03_24_124828_create_sessions_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.modul_tbl
CREATE TABLE IF NOT EXISTS `modul_tbl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `job_sheet_id` int(11) unsigned NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `villages_subdistrict_id_foreign` (`job_sheet_id`) USING BTREE,
  CONSTRAINT `FK_modul_tbl_job_sheet_tbl` FOREIGN KEY (`job_sheet_id`) REFERENCES `job_sheet_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_emodul_poltekes.modul_tbl: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `modul_tbl` DISABLE KEYS */;
INSERT INTO `modul_tbl` (`id`, `job_sheet_id`, `judul`, `file`, `gambar`, `created_at`, `updated_at`) VALUES
	(6, 1, 'MEMPERKENALKAN DIRI KEPADA PASIEN', '1669335489.pdf', '1676807412.png', '2022-11-25 00:18:09', '2023-02-19 11:50:12'),
	(7, 1, 'xxx', '1676807855.pdf', '1676807855.jpg', '2023-02-19 11:57:35', '2023-02-19 11:57:35');
/*!40000 ALTER TABLE `modul_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_emodul_poltekes.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.pendahuluan_tbl
CREATE TABLE IF NOT EXISTS `pendahuluan_tbl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_emodul_poltekes.pendahuluan_tbl: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `pendahuluan_tbl` DISABLE KEYS */;
INSERT INTO `pendahuluan_tbl` (`id`, `file`, `created_at`, `updated_at`) VALUES
	(1, '1676812646.pdf', '2023-02-19 04:54:53', '2023-02-19 13:17:26');
/*!40000 ALTER TABLE `pendahuluan_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.pengaturan_tbl
CREATE TABLE IF NOT EXISTS `pengaturan_tbl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(300) DEFAULT NULL,
  `url` varchar(300) DEFAULT NULL,
  `file` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_emodul_poltekes.pengaturan_tbl: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `pengaturan_tbl` DISABLE KEYS */;
INSERT INTO `pengaturan_tbl` (`id`, `judul`, `url`, `file`, `created_at`, `updated_at`) VALUES
	(1, 'Link Ujian', 'https://www.instagram.com/poltekkes.kendari/?hl=id', NULL, '2021-03-28 15:35:33', '2022-12-01 23:33:55');
/*!40000 ALTER TABLE `pengaturan_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_emodul_poltekes.personal_access_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.post_test_tbl
CREATE TABLE IF NOT EXISTS `post_test_tbl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_emodul_poltekes.post_test_tbl: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `post_test_tbl` DISABLE KEYS */;
INSERT INTO `post_test_tbl` (`id`, `judul`, `url`, `created_at`, `updated_at`) VALUES
	(2, 'yttt', 'iiiii', '2023-02-19 04:54:53', '2023-02-19 04:54:59');
/*!40000 ALTER TABLE `post_test_tbl` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_emodul_poltekes.sessions: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('1hMmyGKth9fhUPYT8iwFY6Kys6lpCz8OJHCUYvXj', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNmV4cm1nRmlmR1BaSXR1eXZHRGxmMWZWUzVYMVBrZEpDYWdSNWI0WCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3QvZS1tb2R1bC1wb2x0ZWtlcy9wZW5nYXR1cmFuIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGJON1FtaDZPRjZ4S2lrTUNDaVl6N3V3dm5RWlVLLjJRcDBraWs5bW1lTWljMFM4N0NqWHFtIjt9', 1680760795),
	('e6kZHcaIw0rsdYjlu6KLJHtYXVlLdbweJedSDmRU', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZjNDdGJWem1Ua3hkbjNLejcyVkpmVmRCWVdNOHpnVGt2VHVRblFmViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvZS1tb2R1bC1wb2x0ZWtlcy9tb2R1bC8xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGJON1FtaDZPRjZ4S2lrTUNDaVl6N3V3dm5RWlVLLjJRcDBraWs5bW1lTWljMFM4N0NqWHFtIjt9', 1679626515),
	('gyyMgkXznOP9XzMCl4RUoz4EtKjM4bjQ8cXRBSxI', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMnd2SlpVSGlzMUlWQVRRWERQTDZXVk5sOTJEV2F6R1Ezak92cmo3biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3QvZS1tb2R1bC1wb2x0ZWtlcy9qb2Jfc2hlZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkYk43UW1oNk9GNnhLaWtNQ0NpWXo3dXd2blFaVUsuMlFwMGtpazltbWVNaWMwUzg3Q2pYcW0iO30=', 1679147807),
	('MMXczdKMpb8kWQIqRacOg60VJFoZXfSpagiTHwML', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicWRrQ1dlcG1iYXdZTms2d0ZPNlF6dG1pZld0ME5jY1NBcWNxSEdYcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvZS1tb2R1bC1wb2x0ZWtlcy9tb2R1bC8xIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGJON1FtaDZPRjZ4S2lrTUNDaVl6N3V3dm5RWlVLLjJRcDBraWs5bW1lTWljMFM4N0NqWHFtIjt9', 1679147666);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel db_emodul_poltekes.users: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `group`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', 'administrator@gmail.com', NULL, '$2y$10$bN7Qmh6OF6xKikMCCiYz7uwvnQZUK.2Qp0kik9mmeMic0S87CjXqm', NULL, NULL, NULL, '1', '2021-03-24 12:59:05', '2021-03-24 12:59:05'),
	(3, 'E1E109096', 'E1E109096@gmail.com', NULL, '$2y$10$2/d1mfixgijYePgigSVZwOep1qjYGJ.0yMznBtF5sJ2ryIE5z9spO', NULL, NULL, NULL, '2', '2022-11-24 17:41:59', '2022-11-24 17:41:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- membuang struktur untuk table db_emodul_poltekes.video_tbl
CREATE TABLE IF NOT EXISTS `video_tbl` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Membuang data untuk tabel db_emodul_poltekes.video_tbl: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `video_tbl` DISABLE KEYS */;
INSERT INTO `video_tbl` (`id`, `judul`, `url`, `created_at`, `updated_at`) VALUES
	(2, 'aaaaa', 'https://www.youtube.com/watch?v=fAcDu1uYX0Q', '2023-02-19 04:39:22', '2023-02-19 04:43:36');
/*!40000 ALTER TABLE `video_tbl` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
