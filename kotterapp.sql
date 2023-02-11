-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2023 at 02:07 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

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
-- Table structure for table `apply_jobs`
--

DROP TABLE IF EXISTS `apply_jobs`;
CREATE TABLE IF NOT EXISTS `apply_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `job_post_id` bigint(20) UNSIGNED NOT NULL,
  `freelancer_user_id` bigint(20) UNSIGNED NOT NULL,
  `proposal_text` longtext COLLATE utf8mb4_unicode_ci,
  `budget_proposal` int(11) DEFAULT NULL,
  `first_time_proposal_submit` tinyint(4) DEFAULT '0' COMMENT '0=>No; 1 => yes',
  `project_starting_date` datetime DEFAULT NULL,
  `project_ending_date` datetime DEFAULT NULL,
  `is_selected_for_project` tinyint(4) DEFAULT '0' COMMENT '0 => no, 1 => yes',
  `status` tinyint(4) DEFAULT '3' COMMENT '0 => rejected; 1 => declined by system; 2 => approved; 3 => applied',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply_jobs`
--

INSERT INTO `apply_jobs` (`id`, `job_post_id`, `freelancer_user_id`, `proposal_text`, `budget_proposal`, `first_time_proposal_submit`, `project_starting_date`, `project_ending_date`, `is_selected_for_project`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 6, NULL, NULL, 1, NULL, NULL, 0, 3, '2022-11-29 22:44:26', '2022-12-12 09:52:11'),
(2, 14, 6, NULL, NULL, 1, NULL, NULL, 0, 2, '2023-02-07 22:22:40', '2023-02-08 11:57:27'),
(3, 14, 11, NULL, NULL, 1, NULL, NULL, 0, 3, '2023-02-07 22:24:32', '2023-02-07 22:24:32'),
(4, 5, 11, NULL, NULL, 1, NULL, NULL, 0, 3, '2023-02-08 00:44:12', '2023-02-08 00:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

DROP TABLE IF EXISTS `ch_favorites`;
CREATE TABLE IF NOT EXISTS `ch_favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

DROP TABLE IF EXISTS `ch_messages`;
CREATE TABLE IF NOT EXISTS `ch_messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `job_apply_files`
--

DROP TABLE IF EXISTS `job_apply_files`;
CREATE TABLE IF NOT EXISTS `job_apply_files` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `apply_job_id` bigint(20) UNSIGNED NOT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
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
  `job_starting_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_starting_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_ending_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_ending_date_timestamp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `skill_category_id`, `skill_sub_category_id`, `client_user_id`, `job_unique_code`, `project_title`, `project_description`, `experience_level`, `budget_type`, `budget`, `budget_per_hour`, `total_hour`, `total_budget_for_client`, `public_visibility`, `freelancer_working_type`, `preferred_freelancer_location_country`, `job_location_city`, `job_starting_date`, `job_starting_date_timestamp`, `job_ending_date`, `job_ending_date_timestamp`, `job_total_duration`, `job_total_length`, `estimate_project_duration_type`, `estimate_project_duration_time`, `estimate_project_duration_time_timestamp`, `promotion_type`, `job_post_slug`, `post_expire_date`, `post_expire_date_timestamp`, `status`, `created_at`, `updated_at`) VALUES
(12, 1, 1, 8, '772322', 'gig title here', '<p>asdasdasd</p>', 1, 0, 150.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'gig-title-here', NULL, '0', 1, '2022-11-28 06:42:36', '2022-11-28 06:42:36'),
(13, 1, 1, 8, '651639', 'test job title le 2nd', '<p>sdfsdf</p>\r\n\r\n<p>sdf</p>\r\n\r\n<p>sd</p>\r\n\r\n<p>fd</p>\r\n\r\n<p>d</p>\r\n\r\n<p>d</p>\r\n\r\n<p>&nbsp;</p>', 1, 0, 152.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'test-job-title-le-2nd', NULL, '0', 1, '2022-12-03 22:01:33', '2022-12-03 22:01:33'),
(5, 1, 1, 8, '84131', 'cvccvv', '<p>1</p>\r\n\r\n<p>asd</p>\r\n\r\n<p>asd</p>\r\n\r\n<p>asd</p>\r\n\r\n<p>asd</p>\r\n\r\n<p>&nbsp;</p>', 2, 0, 1.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'cvccvv', NULL, '0', 1, '2022-11-21 02:59:15', '2022-11-25 11:24:44'),
(14, 1, 1, 8, '406401', 'job post title test', '<p>local description</p>', 2, 0, 150.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, 'job-post-title-test', NULL, '0', 1, '2023-02-07 12:17:56', '2023-02-07 12:17:56');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_post_files`
--

INSERT INTO `job_post_files` (`id`, `job_post_id`, `file_url`, `file_type`, `file_size`, `created_at`, `updated_at`) VALUES
(6, 13, 'backend/assets/uploaded-files/job-post-files/job-post-651639--1670126494638.jpg', 'image/jpeg', NULL, '2022-12-03 22:01:34', '2022-12-03 22:01:34'),
(5, 12, 'backend/assets/uploaded-files/job-post-files/job-post-772322--1669639356999.jpg', 'image/jpeg', NULL, '2022-11-28 06:42:37', '2022-11-28 06:42:37'),
(3, 5, 'backend/assets/uploaded-files/job-post-files/job-post-84131--1669021155833.jpg', 'image/jpeg', 380542, '2022-11-21 02:59:15', '2022-11-21 02:59:15'),
(4, 5, 'backend/assets/uploaded-files/job-post-files/job-post-84131--1669021155530.jpg', 'image/jpeg', 393668, '2022-11-21 02:59:16', '2022-11-21 02:59:16'),
(7, 14, 'backend/assets/uploaded-files/job-post-files/16757938765373symphony-app-download-list.txt', 'text/plain', NULL, '2023-02-07 12:17:56', '2023-02-07 12:17:56');

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
(1, 12),
(1, 5),
(1, 13),
(1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `job_post_project`
--

DROP TABLE IF EXISTS `job_post_project`;
CREATE TABLE IF NOT EXISTS `job_post_project` (
  `job_post_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  KEY `job_post_id_fk_3360` (`job_post_id`),
  KEY `project_id_fk_3360` (`project_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_post_project`
--

INSERT INTO `job_post_project` (`job_post_id`, `project_id`) VALUES
(13, 1);

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
(1, 'What is your name?', 'What-is-your-name?', 1, '2022-11-20 23:33:46', '2022-11-20 23:33:46');

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
(1, 12),
(1, 5),
(2, 12),
(1, 13),
(1, 14);

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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(11, '2022_10_23_000000_create_apply_jobs_table', 1),
(12, '2022_10_23_000000_create_job_posts_table', 1),
(13, '2022_10_23_000001_create_job_apply_files_table', 1),
(14, '2022_10_23_000001_create_job_post_questions_table', 1),
(15, '2022_10_23_000002_create_job_post_files_table', 1),
(16, '2022_10_23_000002_create_job_post_job_post_question_table', 1),
(17, '2022_10_23_000003_create_job_post_skill_table', 1),
(18, '2022_10_23_000004_create_skills_table', 1),
(19, '2022_10_23_000005_create_skill_categories_table', 1),
(20, '2022_10_23_000006_create_skill_sub_categories_table', 1),
(21, '2022_10_23_000007_create_trade_license_files_table', 1),
(22, '2022_10_23_000008_create_user_details_table', 1),
(23, '2022_10_23_000009_create_skill_user_table', 1),
(24, '2022_10_23_009004_add_foreigns_to_skills_table', 1),
(25, '2022_10_23_009005_add_foreigns_to_skill_sub_categories_table', 1),
(39, '2022_10_23_000005_create_site_settings_table', 2),
(40, '2022_11_23_999999_add_active_status_to_users', 2),
(41, '2022_11_23_999999_add_avatar_to_users', 2),
(42, '2022_11_23_999999_add_dark_mode_to_users', 2),
(43, '2022_11_23_999999_add_messenger_color_to_users', 2),
(44, '2022_11_23_999999_create_favorites_table', 2),
(45, '2022_11_23_999999_create_messages_table', 2),
(46, '2022_10_23_000003_create_job_post_project_table', 3),
(47, '2022_10_23_000004_create_projects_table', 3);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'demo', NULL, '2022-11-17 22:53:45', '2022-11-17 22:53:45');

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
(1, 2),
(1, 3),
(1, 4),
(1, 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'auth_token', '348d9e954d67ebbc04a7ab32736cb53476b16f3242d63acb34fb1c4abd64fac0', '[\"*\"]', NULL, NULL, '2022-11-18 06:50:10', '2022-11-18 06:50:10'),
(2, 'App\\Models\\User', 3, 'auth_token', '991ecbacca21315b672557954dca6f00e4edc68c16b1e4292e8a0dd6d537921f', '[\"*\"]', NULL, NULL, '2022-11-18 06:57:32', '2022-11-18 06:57:32'),
(3, 'App\\Models\\User', 4, 'auth_token', '4932ede5eef5028a9de113114103d974c3218d1d75a43c079785352a3da497cb', '[\"*\"]', NULL, NULL, '2022-11-18 09:19:50', '2022-11-18 09:19:50'),
(4, 'App\\Models\\User', 5, 'auth_token', '81b3390599858a5c26b2a08db7c6d9ae97e5b30fffe543350f789093914ce450', '[\"*\"]', NULL, NULL, '2022-11-18 09:20:36', '2022-11-18 09:20:36'),
(5, 'App\\Models\\User', 7, 'auth_token', 'f0056209e19830389439cee3e8c5e3e306eb9502fbb8477afc9bf62c1ff1de26', '[\"*\"]', NULL, NULL, '2022-11-18 11:54:05', '2022-11-18 11:54:05'),
(6, 'App\\Models\\User', 3, 'auth_token', '366b75bb6496a4b6c3e2c08a6fe0abd2292f3ad5b0798109991eaa0575461267', '[\"*\"]', '2022-11-19 07:06:40', NULL, '2022-11-19 06:09:38', '2022-11-19 07:06:40'),
(7, 'App\\Models\\User', 8, 'auth_token', '601d9758f5648e80b0e7509e610deabba55eab521606f60514bf2aa6675b2db9', '[\"*\"]', '2022-11-19 07:21:25', NULL, '2022-11-19 07:20:22', '2022-11-19 07:21:25'),
(8, 'App\\Models\\User', 9, 'auth_token', '5c52a88c0d1bec02fddce0fcef371e295cedc540117f011401df8c105a8e00b1', '[\"*\"]', NULL, NULL, '2022-11-19 08:27:31', '2022-11-19 08:27:31'),
(9, 'App\\Models\\User', 8, 'auth_token', '84ba719b31d363c7bdcdbcf343de2d689b012653f0d2e0a418b7cdc607ed0d50', '[\"*\"]', '2022-11-21 03:06:18', NULL, '2022-11-21 02:28:19', '2022-11-21 03:06:18'),
(10, 'App\\Models\\User', 8, 'auth_token', 'f9e91501942f76ad8a3b3edbbe30b891db6b5b0a8f02c6a65db860eb90fe4ee3', '[\"*\"]', '2022-11-26 09:40:30', NULL, '2022-11-26 09:11:30', '2022-11-26 09:40:30'),
(11, 'App\\Models\\User', 8, 'auth_token', 'b2d26283bfba34de66f42eab49df7bc5d58c1a7b6a97c62b5ad651adcb091a7c', '[\"*\"]', '2022-11-26 10:21:32', NULL, '2022-11-26 10:18:36', '2022-11-26 10:21:32'),
(12, 'App\\Models\\User', 8, 'auth_token', '70206529a6e52ab47d1d7876be297c7e2d860be482d6ce85820cdbb8ac8b959f', '[\"*\"]', '2022-11-26 10:36:10', NULL, '2022-11-26 10:30:54', '2022-11-26 10:36:10'),
(13, 'App\\Models\\User', 8, 'auth_token', 'cca356d45763162e1184978c66ce310dac24f3b0b64d071454531d95140f0ec5', '[\"*\"]', '2022-11-28 06:32:19', NULL, '2022-11-28 05:22:55', '2022-11-28 06:32:19'),
(14, 'App\\Models\\User', 8, 'auth_token', '18367164f559760a054a50a02764e1bb16baa3a1b8c4161ddae4584e2b733580', '[\"*\"]', '2022-11-28 11:07:13', NULL, '2022-11-28 10:56:19', '2022-11-28 11:07:13'),
(15, 'App\\Models\\User', 6, 'auth_token', '841f33ed565cb14f846f6a8f1f852aa5b805e8515ac4b76fc3a60d1cad74a950', '[\"*\"]', '2022-11-28 11:26:41', NULL, '2022-11-28 11:07:43', '2022-11-28 11:26:41'),
(16, 'App\\Models\\User', 6, 'auth_token', '4e8c616fb812faf3e0ef5d9f6b8d4191aca27f62bb34c630aa5b097a487a2840', '[\"*\"]', '2022-12-12 09:51:22', NULL, '2022-12-12 09:41:57', '2022-12-12 09:51:22'),
(17, 'App\\Models\\User', 8, 'auth_token', '506d9918f3b36456bf0e70b8e1a4d5712d07d4332183982553276fee42612dee', '[\"*\"]', '2022-12-12 12:08:24', NULL, '2022-12-12 09:51:49', '2022-12-12 12:08:24'),
(18, 'App\\Models\\User', 8, 'auth_token', 'ad74709863f012f20adf2fbceb9059dd4a6f40acf5972386b9eefba11d102f1e', '[\"*\"]', '2023-02-07 00:37:26', NULL, '2023-02-06 22:02:11', '2023-02-07 00:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_gigs` tinyint(4) DEFAULT NULL,
  `total_budget` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '0=> not published; 1=> published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `client_id`, `title`, `total_gigs`, `total_budget`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'first project test', NULL, NULL, 'first-project-test', NULL, '2022-12-03 22:00:45', '2023-02-08 11:05:17'),
(3, 8, 'jkkj', NULL, NULL, 'jkkj', 1, '2023-02-04 04:53:42', '2023-02-04 04:53:42');

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
(1, 'Student', 'Student', NULL, NULL),
(2, 'SME', 'SME', NULL, NULL),
(3, 'Admin', 'Admin', NULL, NULL),
(4, 'Trainer', 'Trainer', NULL, NULL),
(5, 'Super Admin', 'Super-Admin', NULL, NULL);

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

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(5, 1),
(2, 2),
(1, 6),
(2, 8),
(2, 9),
(2, 3),
(1, 10),
(1, 11);

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
('eYXjszax5Lb4gGEbbluMJeMBMPIK9np8xIcsZ5NW', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieUN3bGJuR2p2aGhHMjdXOUNvUFY4bTFNczJpZDNYTkZwNU9TeEZIbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6OTAwL2NsaWVudC9qb2ItcG9zdC9jcmVhdGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo4O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHpyWktmZGhldTZIZ2dEUVdLZElMNC44eURVZDlGaWZBZEVjTi9kelcwaDNLZVA2UFpxRlphIjt9', 1676091221),
('BtVwTxfiPhFVMmkyxokyIDvojrcLy1Mx70sNZgMw', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQXdSMWUyUGVSVVhGTkU4QktJZWhMMzFjZFJjUURnYUkzcTFHb3lrUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mcmVlbGFuY2VyL2ZyZWVsYW5jZXItc3VibWl0LW9yZGVyL2pvYi1wb3N0LXRpdGxlLXRlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGwvWFBLVEVZaXQxQmtrdUxMajh2emVoVm9PL2lrTkVkMU5PaEIxSFlqLkJFT1ZuZ1ZyUzN1Ijt9', 1676097097),
('cwM5CL7URuZpngbEGtcTvIsNQEf7CEEl1JKKbc48', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNURWYUlSbzlNb2V1MjE1WXZRTENnNHNzVFY0cnBEU0pCd3lYV05POCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1676091501);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_fav_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_meta` longtext COLLATE utf8mb4_unicode_ci,
  `author_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_post_validate_time` mediumint(9) DEFAULT NULL,
  `seo_header` longtext COLLATE utf8mb4_unicode_ci,
  `seo_footer` longtext COLLATE utf8mb4_unicode_ci,
  `job_service_charge` mediumint(9) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_title`, `site_name`, `site_fav_icon`, `site_logo`, `site_banner`, `site_meta`, `author_name`, `job_post_validate_time`, `seo_header`, `seo_footer`, `job_service_charge`, `created_at`, `updated_at`) VALUES
(1, 'knotter', 'knotter', NULL, 'backend/assets/uploaded-files/site-settings/fav-icon-1669627662390.jpg', 'backend/assets/uploaded-files/site-settings/fav-icon-1669627663908.jpg', 'asd', 'Monu', NULL, 'asd', 'asd', NULL, '2022-11-28 03:27:44', '2022-11-28 04:13:14');

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
(1, 1, 1, 'php', 'php', 1, '2022-11-18 11:20:42', '2022-11-18 11:20:42'),
(2, 1, 1, 'html', 'html', 1, '2022-11-18 11:20:47', '2022-11-18 11:20:47');

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
(1, 'technology', 'technology', 1, '2022-11-18 11:20:21', '2022-11-18 11:20:21');

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
(1, 1, 'website development', 'website-development', 1, '2022-11-18 11:20:30', '2022-11-18 11:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `skill_user`
--

DROP TABLE IF EXISTS `skill_user`;
CREATE TABLE IF NOT EXISTS `skill_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  KEY `role_id_fk_369` (`user_id`),
  KEY `skill_id_fk_369` (`skill_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill_user`
--

INSERT INTO `skill_user` (`user_id`, `skill_id`) VALUES
(7, 1),
(7, 2),
(9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trade_license_files`
--

DROP TABLE IF EXISTS `trade_license_files`;
CREATE TABLE IF NOT EXISTS `trade_license_files` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trade_license_files`
--

INSERT INTO `trade_license_files` (`id`, `user_id`, `file_url`, `file_type`, `file_size`, `created_at`, `updated_at`) VALUES
(5, 5, 'backend/assets/uploaded-files/user-document-files/client-trade-license-file--1668784835411.jpg', 'image/jpeg', 393668, '2022-11-18 09:20:35', '2022-11-18 09:20:35'),
(4, 5, 'backend/assets/uploaded-files/user-document-files/client-trade-license-file--1668784834722.jpg', 'image/jpeg', 380542, '2022-11-18 09:20:35', '2022-11-18 09:20:35'),
(6, 5, 'backend/assets/uploaded-files/user-document-files/client-trade-license-file--1668784835454.jpg', 'image/jpeg', 383822, '2022-11-18 09:20:36', '2022-11-18 09:20:36'),
(7, 7, 'backend/assets/uploaded-files/user-document-files/client-trade-license-file--1668794043103.jpg', 'image/jpeg', 380542, '2022-11-18 11:54:04', '2022-11-18 11:54:04'),
(8, 7, 'backend/assets/uploaded-files/user-document-files/client-trade-license-file--1668794044514.jpg', 'image/jpeg', 393668, '2022-11-18 11:54:05', '2022-11-18 11:54:05'),
(9, 8, 'backend/assets/uploaded-files/user-document-files/client-trade-license-file--1669726113250.jpg', 'image/jpeg', NULL, '2022-11-29 06:48:33', '2022-11-29 06:48:33'),
(10, 8, 'backend/assets/uploaded-files/user-document-files/client-trade-license-file--1669726113500.jpg', 'image/jpeg', NULL, '2022-11-29 06:48:34', '2022-11-29 06:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_details_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `user_role_type` int(11) DEFAULT '0' COMMENT '1=>freelancer, 2=>client, 3=>admin_lv, 4=>trainer, 5 => SuperAdmin, 6=>only student',
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'featured/regular',
  `account_status` tinyint(4) DEFAULT '0' COMMENT '0 => pending, 1 => approved, 2 =>blocked, 3=>canceled',
  `submit_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 => Not submitted; 1 => submitted; 2 => submitted and approved',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `messenger_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_details_id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `user_role_type`, `account_type`, `account_status`, `submit_status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 1, 'Super Admin', 'mainul125011@gmail.com', NULL, '$2y$10$JDRv0X9uyjKdlyFOmcj2Deya2votg7sdlvDjfBy/3XyGnLfN2DarG', NULL, NULL, NULL, 5, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 'avatar.png', 0, '#2180f3'),
(2, 2, 'admin', 'admin@admin.com', NULL, '$2y$10$z1A9qtnVlFs8hLOyKC/nKu6.zqmQeYEVBgRrdx0ICZ.S2N8HN6wBO', NULL, NULL, NULL, 3, NULL, 0, 0, NULL, NULL, NULL, '2022-11-17 21:43:44', '2022-11-17 21:43:44', 0, 'avatar.png', 0, '#2180f3'),
(3, 3, 'api-test', 'api@api.com', NULL, '$2y$10$3PPdph6OW.zWPRM51VxbG.JfshFmZqNm2j5IFoc3D5y0l6pkuAH66', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2022-11-18 06:57:32', '2022-11-18 06:57:32', 0, 'avatar.png', 0, '#2180f3'),
(4, 4, 'api-test', 'apij1@api.com', NULL, '$2y$10$.p.8vZn8Z77JLStTaE.u9OOri31zLY5nIn2sgNQnUwMJllLOIEmES', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2022-11-18 09:19:50', '2022-11-18 09:19:50', 0, 'avatar.png', 0, '#2180f3'),
(5, 5, 'api-test', 'apij11@api.com', NULL, '$2y$10$gR7Oz/c4bsQUyKH9K6UKQ.13VHwYAF1TfBOsEfqwq.uVmw5AG8n56', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2022-11-18 09:20:34', '2022-11-18 09:20:34', 0, 'avatar.png', 0, '#2180f3'),
(6, 6, 'student', 'student@student.com', NULL, '$2y$10$l/XPKTEYit1BkkuLLj8vzehVoO/ikNEd1NOhB1HYj.BEOVngVrS3u', NULL, NULL, NULL, 1, NULL, 1, 0, NULL, NULL, NULL, '2022-11-18 09:53:38', '2022-11-18 09:53:38', 0, 'avatar.png', 0, '#2180f3'),
(7, 7, 'sdf', 'a@a.bz', NULL, '$2y$10$9z7C8hXf0GxppZQEtKey7O.pZFGzm5i3BC4E8gdpHWJwJOGj17GdO', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, '2022-11-18 11:54:03', '2022-11-18 11:54:03', 0, 'avatar.png', 0, '#2180f3'),
(8, 8, 'client', 'client@client.com', NULL, '$2y$10$zrZKfdheu6HggDQWKdIL4.8yDUd9FifAdEcN/dzW0h3KeP6PZqFZa', NULL, NULL, NULL, 2, NULL, 1, 1, NULL, NULL, NULL, '2022-11-19 06:07:57', '2022-11-28 06:48:42', 0, 'avatar.png', 0, '#2180f3'),
(9, 9, 'pranto', 'prant13u11@gmail.com', NULL, '$2y$10$puMNCaetqomvLvNN4fHb6.gDvBHH75BbHcSnVbNWGVcUVjebe8Nk6', NULL, NULL, NULL, 2, NULL, 0, 0, NULL, NULL, NULL, '2022-11-19 08:27:31', '2022-11-19 08:27:31', 0, 'avatar.png', 0, '#2180f3'),
(11, 11, 'student2', 'student2@student.com', NULL, '$2y$10$jz/5AaxGieEG8/cXgPicGOyIvJU9h8LgNFU/cocP1vPNBbsGVrDsG', NULL, NULL, NULL, 1, NULL, 1, 0, NULL, NULL, NULL, '2023-02-07 22:23:32', '2023-02-07 22:23:32', 0, 'avatar.png', 0, '#2180f3');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emirate_state_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('male','female','other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educational_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freelancer_job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freelancer_language` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emirates_id_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `first_name`, `last_name`, `surname`, `country`, `emirate_state_name`, `phone`, `profile_image`, `gender`, `educational_status`, `university_name`, `freelancer_job_title`, `freelancer_language`, `bank_account_no`, `bank_name`, `emirates_id_no`, `description`, `Working_type`, `company_name`, `company_establish_year`, `company_status`, `business_name`, `company_size`, `company_speciality`, `company_service`, `trade_license_no`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 21:43:44', '2022-11-17 21:43:44'),
(3, 'fff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-18 06:57:32', '2022-11-18 06:57:32'),
(4, 'fff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-18 09:19:50', '2022-11-18 09:19:50'),
(5, 'fff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-18 09:20:34', '2022-11-18 09:20:34'),
(6, 'Monu', 'Mia', NULL, NULL, NULL, NULL, 'backend/assets/uploaded-files/user-profile-pictures/profile-image--1668794043766.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-18 09:53:38', '2022-11-18 09:53:38'),
(7, 'asd', NULL, NULL, NULL, NULL, NULL, 'backend/assets/uploaded-files/user-profile-pictures/profile-image--1668794043766.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-18 11:54:03', '2022-11-18 11:54:03'),
(8, 'client', 'client', NULL, 'United Arab Emirates', 'Sharjah', '012365489654', 'backend/assets/uploaded-files/user-profile-pictures/profile-image--1669726021658.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'client', '1558', 'Enterprise, Government', 'business name', '15-50 Person', 'Food industry', 'Financial institution', 'client', '2022-11-19 06:07:57', '2023-02-07 10:27:27'),
(9, NULL, NULL, NULL, 'dubai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1111111111111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-19 08:27:31', '2022-11-19 08:27:31'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-20 23:33:14', '2022-11-20 23:33:14'),
(11, 'student', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-07 22:23:32', '2023-02-07 22:23:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
