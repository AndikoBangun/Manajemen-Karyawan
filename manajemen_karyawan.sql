-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2025 at 03:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `masuk` time DEFAULT NULL,
  `pulang` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `user_id`, `tanggal`, `masuk`, `pulang`, `created_at`, `updated_at`) VALUES
(1, 2, '2025-11-18', '16:02:42', '16:02:48', '2025-11-18 09:02:42', '2025-11-18 09:02:48'),
(2, 12, '2025-11-19', '09:21:30', NULL, '2025-11-19 02:21:30', '2025-11-19 02:21:30'),
(3, 2, '2025-11-19', '09:21:55', NULL, '2025-11-19 02:21:55', '2025-11-19 02:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `gaji` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `nama`, `jabatan`, `divisi`, `email`, `no_hp`, `gaji`, `tanggal_masuk`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Surya', 'Supervisior', 'Komputer', 'surya@gmail.com', '082312323223', '5.000.000', '2025-11-18', '2025-11-18 08:19:05', '2025-11-18 08:19:05', 2),
(2, 'Andi Pratama', 'Staff Administrasi', 'Administrasi', 'andipratama@example.com', '081234567801', '4.500.000', '2025-06-17', '2025-11-19 02:09:02', '2025-11-19 02:09:02', 3),
(3, 'Rina Sari', 'HRD', 'Human Resource', 'rinasari@example.com', '081234567802', '6.000.000', '2025-07-22', '2025-11-19 02:10:26', '2025-11-19 02:10:26', 4),
(4, 'Dimas Kurniawan', 'Staff Gudang', 'Logistik', 'dimaskurniawan@example.com', '081234567803', '4.000.000', '2025-03-12', '2025-11-19 02:11:06', '2025-11-19 02:11:06', 5),
(5, 'Siti Rahmawati', 'Kasir', 'Keuangan', 'sitirahma@example.com', '081234567804', '4.200.000', '2025-03-13', '2025-11-19 02:11:49', '2025-11-19 02:11:49', 6),
(6, 'Budi Hartono', 'Supervisor Produksi', 'Produksi', 'budihartono@example.com', '081234567805', '7.500.000', '2024-09-11', '2025-11-19 02:13:15', '2025-11-19 02:13:15', 7),
(7, 'Maya Lestari', 'Customer Service', 'Pelayanan', 'mayalestari@example.com', '081234567806', '4.300.000', '2025-03-01', '2025-11-19 02:13:55', '2025-11-19 02:13:55', 8),
(8, 'Fadli Ramadhan', 'Teknisi', 'IT Support', 'fadli.ramadhan@example.com', '081234567807', '5.000.000', '2025-04-10', '2025-11-19 02:14:27', '2025-11-19 02:14:27', 9),
(9, 'Wulan Anggraini', 'Staff Marketing', 'Marketing', 'wulananggraini@example.com', '081234567808', '5.300.000', '2025-04-02', '2025-11-19 02:15:13', '2025-11-19 02:15:13', 10),
(10, 'Kevin Mahendra', 'Programmer', 'IT', 'kevinmahendra@example.com', '081234567809', '8.000.000', '2024-12-11', '2025-11-19 02:17:14', '2025-11-19 02:17:14', 11),
(11, 'Novi Amelia', 'Staff Kebersihan', 'General Affairs', 'novi.amelia@example.com', '081234567810', '3.000.000', '2025-05-14', '2025-11-19 02:17:55', '2025-11-19 02:17:55', 12);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporans`
--

INSERT INTO `laporans` (`id`, `user_id`, `bulan`, `file`, `created_at`, `updated_at`) VALUES
(1, 2, 'November', 'laporan/PRKuIxT4eGB9ZpK5MU8hQlfA2GEUPPfen5G4lONV.pdf', '2025-11-18 09:03:08', '2025-11-18 09:03:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_04_061135_create_employees_table', 1),
(5, '2025_11_05_031058_add_role_to_users_table', 1),
(6, '2025_11_11_043353_add_user_id_to_employees_table', 1),
(7, '2025_11_17_054540_create_absensi_table', 1),
(8, '2025_11_18_152532_create_laporans_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('726KMnDAdCGB1qA7GipfcAKMdM4WTDi6U716Rz7e', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSjRvZk5SSU00SnFPR0llSmt0TFlTanpJVHpkb3VLU01EbzhwSVhkaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImRhc2hib2FyZC5hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1763519983);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'karyawan',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andiko Bangun', 'andiko@gmail.com', NULL, '$2y$12$p..Zhuh5C9u.86LBRD6Jq.D8zv2kogAlqHIniud1rV/ggRXohl8yO', 'admin', NULL, '2025-11-18 08:18:42', '2025-11-18 08:18:42'),
(2, 'Surya', 'surya@gmail.com', NULL, '$2y$12$NWxxxhBab3iXeCqnLmqekOhz7jK/5bACqaSR/5BMwf8xDnxFNoY0e', 'karyawan', NULL, '2025-11-18 08:19:05', '2025-11-18 08:19:05'),
(3, 'Andi Pratama', 'andipratama@example.com', NULL, '$2y$12$YCTmHqZhn2UpPjutaWGGq.1iByCdY6xRnI.tEFJanYMYi.tpIILLC', 'karyawan', NULL, '2025-11-19 02:09:02', '2025-11-19 02:09:02'),
(4, 'Rina Sari', 'rinasari@example.com', NULL, '$2y$12$wg.8.MfFisg.I/rNiZcf8uVXX6Jt6Pk8tedhQl5K8Wu2igMs0bpwy', 'karyawan', NULL, '2025-11-19 02:10:26', '2025-11-19 02:10:26'),
(5, 'Dimas Kurniawan', 'dimaskurniawan@example.com', NULL, '$2y$12$dKc9qpDzF2srnVZoNlxs9OTsfHgnkeFRc86NlNys5Igm.7vQWEDKG', 'karyawan', NULL, '2025-11-19 02:11:06', '2025-11-19 02:11:06'),
(6, 'Siti Rahmawati', 'sitirahma@example.com', NULL, '$2y$12$Rb7d4aUzZQOzIbxjpsInNO5j80.GPB.BHQY9WTc3r49xtr/BcJ64i', 'karyawan', NULL, '2025-11-19 02:11:49', '2025-11-19 02:11:49'),
(7, 'Budi Hartono', 'budihartono@example.com', NULL, '$2y$12$kmn6cV1cvkkS8UEKsbErJe.eJJrULSXSo.kBPddeHzUOS/o9qcG/S', 'karyawan', NULL, '2025-11-19 02:13:15', '2025-11-19 02:13:15'),
(8, 'Maya Lestari', 'mayalestari@example.com', NULL, '$2y$12$4B9k04PqmQ926KiKzL.DOOxUAF7sWDH3Bx1ncl2GitPyRvPH5qTBa', 'karyawan', NULL, '2025-11-19 02:13:55', '2025-11-19 02:13:55'),
(9, 'Fadli Ramadhan', 'fadli.ramadhan@example.com', NULL, '$2y$12$itktoVeij988nYMD9MsusertC4idz42saP5xz9zXPbDo3zHDFupg6', 'karyawan', NULL, '2025-11-19 02:14:27', '2025-11-19 02:14:27'),
(10, 'Wulan Anggraini', 'wulananggraini@example.com', NULL, '$2y$12$6dPItWRMFz9RGLVyAbWv5.16.BLpQ32O3iTyj7SqYm92CkMVzzsCa', 'karyawan', NULL, '2025-11-19 02:15:13', '2025-11-19 02:15:13'),
(11, 'Kevin Mahendra', 'kevinmahendra@example.com', NULL, '$2y$12$y7B.WODE1F9nAx55fc7Y9euAMJNSbn9oLhRQ0gwBNg0IUX4hmNfma', 'karyawan', NULL, '2025-11-19 02:17:14', '2025-11-19 02:17:14'),
(12, 'Novi Amelia', 'novi.amelia@example.com', NULL, '$2y$12$L0bGMVAvLtSGteXKJ1/efuDv4HYKzmZ243DVEpmQ7EK9WyC7cReDe', 'karyawan', NULL, '2025-11-19 02:17:55', '2025-11-19 02:17:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_user_id_unique` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporans`
--
ALTER TABLE `laporans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
