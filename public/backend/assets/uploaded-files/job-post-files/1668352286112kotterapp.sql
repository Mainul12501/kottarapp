-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2022 at 09:21 AM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kotterapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

DROP TABLE IF EXISTS `job_posts`;
CREATE TABLE IF NOT EXISTS `job_posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skill_category_id` bigint(20) UNSIGNED NOT NULL,
  `skill_sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `client_user_id` bigint(20) UNSIGNED NOT NULL,
  `job_unique_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_title` text COLLATE utf8mb4_unicode_ci,
  `project_description` longtext COLLATE utf8mb4_unicode_ci,
  `experience_level` tinyint(4) DEFAULT '0' COMMENT '0=>excited, 1 => eager, 2 => experienced, 3 => expert',
  `budget_type` tinyint(4) DEFAULT '0' COMMENT '0=> fixed; 1 => per hour',
  `budget` double(8,2) DEFAULT '0.00',
  `budget_per_hour` double(8,2) DEFAULT NULL,
  `total_hour` int(11) DEFAULT NULL,
  `total_budget_for_client` double(8,2) DEFAULT NULL,
  `public_visibility` tinyint(4) DEFAULT '0' COMMENT '0 => public, 1=> private',
  `freelancer_working_type` tinyint(4) DEFAULT '0' COMMENT '0=>remotely, 1=> remotely on country, 2=> on site',
  `preferred_freelancer_location_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_location_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_starting_date` date DEFAULT NULL,
  `job_starting_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_ending_time` time DEFAULT NULL,
  `job_ending_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_total_duration` mediumint(9) DEFAULT NULL,
  `job_total_length` mediumint(9) DEFAULT NULL,
  `estimate_project_duration_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1 day or less/ less than a week etc',
  `estimate_project_duration_time` time DEFAULT NULL,
  `estimate_project_duration_time_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion_type` tinyint(4) DEFAULT NULL COMMENT '0=>featured, 1=> urgent, 2 =>pre-funded',
  `job_post_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_expire_date` datetime DEFAULT NULL,
  `post_expire_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '0=>pending, 1=> approved, 2=>completed, 3=>rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_posts_job_unique_code_unique` (`job_unique_code`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `skill_category_id`, `skill_sub_category_id`, `client_user_id`, `job_unique_code`, `project_title`, `project_description`, `experience_level`, `budget_type`, `budget`, `budget_per_hour`, `total_hour`, `total_budget_for_client`, `public_visibility`, `freelancer_working_type`, `preferred_freelancer_location_country`, `job_location_city`, `job_starting_date`, `job_starting_date_timestamp`, `job_ending_time`, `job_ending_time_timestamp`, `job_total_duration`, `job_total_length`, `estimate_project_duration_type`, `estimate_project_duration_time`, `estimate_project_duration_time_timestamp`, `promotion_type`, `job_post_slug`, `post_expire_date`, `post_expire_date_timestamp`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 3, '113823', 'test job title', '<p>A basic, lightweight&nbsp;<em>jQuery page preloader plugin</em>&nbsp;which displays a preloading screen with loading spinner &amp; background before all your web content are fully&nbsp;...</p>', 1, 0, 150.00, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2 days to 4 days', NULL, NULL, NULL, 'test-job-title', NULL, NULL, 0, '2022-10-31 11:45:38', '2022-10-31 11:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `job_post_files`
--

DROP TABLE IF EXISTS `job_post_files`;
CREATE TABLE IF NOT EXISTS `job_post_files` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_post_id` bigint(20) UNSIGNED NOT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_post_files`
--

INSERT INTO `job_post_files` (`id`, `job_post_id`, `file_url`, `file_type`, `file_size`, `created_at`, `updated_at`) VALUES
(2, 4, 'backend/assets/uploaded-files/job-post-files/job-post-113823--1667238338483.jpg', 'image/jpeg', 191106, '2022-10-31 11:45:39', '2022-10-31 11:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `job_post_job_post_question`
--

DROP TABLE IF EXISTS `job_post_job_post_question`;
CREATE TABLE IF NOT EXISTS `job_post_job_post_question` (
  `job_post_question_id` bigint(20) UNSIGNED NOT NULL,
  `job_post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_post_job_post_question`
--

INSERT INTO `job_post_job_post_question` (`job_post_question_id`, `job_post_id`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `job_post_questions`
--

DROP TABLE IF EXISTS `job_post_questions`;
CREATE TABLE IF NOT EXISTS `job_post_questions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_post_questions`
--

INSERT INTO `job_post_questions` (`id`, `question`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'what is ur name', 'what-is-ur-name', 1, '2022-10-31 10:51:34', '2022-10-31 10:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `job_post_skill`
--

DROP TABLE IF EXISTS `job_post_skill`;
CREATE TABLE IF NOT EXISTS `job_post_skill` (
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  `job_post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_post_skill`
--

INSERT INTO `job_post_skill` (`skill_id`, `job_post_id`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 2),
(1, 3),
(2, 3),
(1, 4),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_09_080347_create_permissions_table', 1),
(7, '2022_06_14_042924_create_roles_table', 1),
(8, '2022_06_14_043213_create_permission_role_pivot_table', 1),
(9, '2022_06_14_143519_create_role_user_table', 1),
(10, '2022_10_15_052304_create_sessions_table', 1),
(11, '2022_10_23_000000_create_job_posts_table', 1),
(12, '2022_10_23_000001_create_job_post_questions_table', 1),
(13, '2022_10_23_000002_create_job_post_files_table', 1),
(14, '2022_10_23_000002_create_job_post_job_post_question_table', 1),
(15, '2022_10_23_000003_create_job_post_skill_table', 1),
(16, '2022_10_23_000004_create_skills_table', 1),
(17, '2022_10_23_000005_create_skill_categories_table', 1),
(18, '2022_10_23_000006_create_skill_sub_categories_table', 1),
(19, '2022_10_23_000008_create_user_details_table', 1),
(20, '2022_10_23_009004_add_foreigns_to_skills_table', 1),
(21, '2022_10_23_009005_add_foreigns_to_skill_sub_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'admin permission', NULL, '2022-10-31 07:36:03', '2022-10-31 07:36:03'),
(2, 'client permission', NULL, '2022-10-31 07:36:12', '2022-10-31 07:36:12'),
(3, 'freelancer permission', NULL, '2022-10-31 07:36:21', '2022-10-31 07:36:21'),
(4, 'teacher permission', NULL, '2022-10-31 07:36:41', '2022-10-31 07:36:41'),
(5, 'student permission', NULL, '2022-10-31 07:37:02', '2022-10-31 07:37:02');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  KEY `permission_id_fk_3653` (`permission_id`),
  KEY `role_id_fk_3652` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(2, 1),
(3, 1),
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '2022-10-31 07:37:50', '2022-10-31 07:37:50'),
(2, 'client', NULL, '2022-10-31 07:38:02', '2022-10-31 07:38:02'),
(3, 'freelancer', NULL, '2022-10-31 07:38:16', '2022-10-31 07:38:16'),
(4, 'teacher', NULL, '2022-10-31 07:38:23', '2022-10-31 07:38:23'),
(5, 'student', NULL, '2022-10-31 07:38:31', '2022-10-31 07:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  KEY `role_id_fk_369` (`role_id`),
  KEY `user_id_fk_369` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4gSbtp6ndiUlBiLT30McCgzGRIbszcngv8Xo8vnD', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicE1CTk5rS1BUREFObExVTHcwM3RHNFI3RDdEczBNOEMyM2Zua2xndCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jbGllbnQvY2xpZW50LWRhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkSXZrMVpmQXV4RWtYYW04clFJaG5mZUxpTHZ5M1dQcUVmLmd3YlRPTVMzRS91VjlVL3lYTDIiO30=', 1667226034),
('HHt3hv6VyA5yrZioY570mq9VTGapZSt2HS2SkFj9', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQVZZWm5lRzYxaUV0SXBvQVd0WFdZWkZDZ0dHRTZJWWM3cm1DWVlFVyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0NDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NsaWVudC9qb2ItcG9zdC9jcmVhdGUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NsaWVudC9qb2ItcG9zdC1saXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRJdmsxWmZBdXhFa1hhbThyUUlobmZlTGlMdnkzV1BxRWYuZ3diVE9NUzNFL3VWOVUveVhMMiI7fQ==', 1667240012),
('YFWVmnL7Xp8M5RtrRATsgxe6FqLTcLDpdVAnuHAi', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ2NVOEV1UnBkUEdjTWMyUTZjNkJMdDhqMzVNNGVjMlZkeURyaE9icCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9qb2ItcXVlc3Rpb25zL2NyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkUXZQMncyVmVRNkdmSjlmTjR6MnBFZThjamp2MHdQMDlPMUtIV0xuRURLRXFYOVgvODMwQW0iO30=', 1667236081),
('K5vBKAawJNsMiFeVp8q42JjEVf25xSVM0EuXs7Jv', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNEliR1QzdWtyQ2IxSWZLTlNHQTBYRXBLSVYxckVPVk9hTVMxSTJNMiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NsaWVudC9qb2ItcG9zdC1saXN0Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1667273158);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skill_category_id` bigint(20) UNSIGNED NOT NULL,
  `skill_sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `skill_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `skills_skill_category_id_foreign` (`skill_category_id`),
  KEY `skills_skill_sub_category_id_foreign` (`skill_sub_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_category_id`, `skill_sub_category_id`, `skill_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'php', 'php', 1, '2022-10-31 07:34:11', '2022-10-31 07:34:11'),
(2, 1, 1, 'html', 'html', 1, '2022-10-31 07:34:17', '2022-10-31 07:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `skill_categories`
--

DROP TABLE IF EXISTS `skill_categories`;
CREATE TABLE IF NOT EXISTS `skill_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill_categories`
--

INSERT INTO `skill_categories` (`id`, `category_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'technology', 'technology', 1, '2022-10-31 07:33:44', '2022-10-31 07:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `skill_sub_categories`
--

DROP TABLE IF EXISTS `skill_sub_categories`;
CREATE TABLE IF NOT EXISTS `skill_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skill_category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `skill_sub_categories_skill_category_id_foreign` (`skill_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill_sub_categories`
--

INSERT INTO `skill_sub_categories` (`id`, `skill_category_id`, `sub_category_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'website development', 'website-development', 1, '2022-10-31 07:33:58', '2022-10-31 07:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_details_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `user_role_type` int(11) DEFAULT '0' COMMENT '0=>freelancer, 1=>client, 2=>admin_lv, 3=>trainer, 5=>only student',
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'featured/regular',
  `account_status` tinyint(4) DEFAULT '0' COMMENT '0 => pending, 1 => approved, 2 =>blocked, 3=>canceled',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_details_id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `user_role_type`, `account_type`, `account_status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', NULL, '$2y$10$QvP2w2VeQ6GfJ9fN4z2pEe8cjjv0wP09O1KHWLnEDKEqX9X/830Am', NULL, NULL, NULL, 2, NULL, 0, NULL, NULL, NULL, '2022-10-31 07:29:54', '2022-10-31 07:29:54'),
(2, 2, 'admin 2', 'admin2@admin.com', NULL, '$2y$10$Lc45XTjLLAGrVjzrHkPVBe94RP6V34LNJ45UzG/AIQe/D2mAlcmk.', NULL, NULL, NULL, 2, NULL, 0, NULL, NULL, NULL, '2022-10-31 07:32:18', '2022-10-31 07:32:18'),
(3, 8, 'client', 'client@client.com', NULL, '$2y$10$Ivk1ZfAuxEkXam8rQIhnfeLiLvy3WPqEf.gwbTOMS3E/uV9U/yXL2', NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, '2022-10-31 08:20:33', '2022-10-31 08:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emirate_state_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educational_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `University_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Freelancer_job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Freelancer_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freelancer_description` longtext COLLATE utf8mb4_unicode_ci,
  `Working_type` tinyint(4) DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_establish_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_speciality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_service` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_license_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `first_name`, `Last_name`, `surname`, `country`, `emirate_state_name`, `phone`, `profile_image`, `gender`, `educational_status`, `University_name`, `Freelancer_job_title`, `Freelancer_language`, `freelancer_description`, `Working_type`, `company_name`, `company_establish_year`, `company_status`, `business_name`, `company_size`, `company_speciality`, `company_service`, `trade_license_no`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-31 07:29:54', '2022-10-31 07:29:54'),
(2, 'admin 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-31 07:32:17', '2022-10-31 07:32:17'),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BITM', NULL, NULL, NULL, NULL, NULL, NULL, '12541', '2022-10-31 08:20:33', '2022-10-31 08:20:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
