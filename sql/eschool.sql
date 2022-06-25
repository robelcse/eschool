-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 10:24 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `attemps`
--

CREATE TABLE `attemps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `chapter_id` bigint(20) NOT NULL,
  `unit_id` bigint(20) NOT NULL,
  `attemp` int(11) NOT NULL DEFAULT 0,
  `mark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attemps`
--

INSERT INTO `attemps` (`id`, `user_id`, `subject_id`, `chapter_id`, `unit_id`, `attemp`, `mark`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(102, 10, 1, 1, 1, 3, '[{\"total_mark\":5,\"pass_mark\":4,\"score\":0,\"status\":\"fail\"},{\"total_mark\":4,\"pass_mark\":3.2,\"score\":2,\"status\":\"fail\"},{\"total_mark\":5,\"pass_mark\":4,\"score\":2,\"status\":\"fail\"}]', '1650087767', '1650087775', '2022-04-15 23:42:30', '2022-04-15 23:42:55'),
(103, 10, 1, 1, 2, 3, '[{\"total_mark\":4,\"pass_mark\":3.2,\"score\":2,\"status\":\"fail\"},{\"total_mark\":4,\"pass_mark\":3.2,\"score\":1,\"status\":\"fail\"},{\"total_mark\":4,\"pass_mark\":3.2,\"score\":1,\"status\":\"fail\"}]', '1650087799', '1650087804', '2022-04-15 23:43:05', '2022-04-15 23:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_approve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_approve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`chapter_id`, `subject_id`, `name`, `admin_approve`, `teacher_approve`, `created_at`, `updated_at`, `grade_id`, `description`) VALUES
(1, 1, 'Chapter-01', '1', NULL, '2022-04-09 21:27:24', '2022-04-09 21:27:24', 1, 'Electorn & Proton'),
(2, 2, 'Chapter-01', '1', NULL, '2022-04-13 04:08:50', '2022-04-13 04:08:50', 1, 'Facebook Review'),
(4, 1, 'Chapter-02', '1', NULL, '2022-04-09 21:27:24', '2022-04-09 21:27:24', 1, 'Velocity'),
(5, 3, 'Chapter-01', '1', NULL, '2022-04-15 22:53:25', '2022-04-15 22:53:25', 1, 'Chapter one description');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Grade-A', '2022-04-09 21:26:56', '2022-04-09 21:26:56');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_07_073314_create_questions_table', 1),
(6, '2021_11_08_004127_add_unit_id_to_questions', 1),
(7, '2021_11_08_004752_create_study_materials_table', 1),
(8, '2021_11_09_003653_add_link_to_study_materials', 1),
(9, '2021_11_09_005315_add_video_to_study_materials', 1),
(10, '2021_11_09_011730_remove_name_to_users', 1),
(11, '2021_11_09_012032_add_profiles_to_users', 1),
(12, '2021_11_14_092247_create_subjects_table', 1),
(13, '2021_11_14_092925_create_grades_table', 1),
(14, '2021_11_22_080845_create_mysubjects_table', 1),
(15, '2021_11_22_172530_create_chapters_table', 1),
(16, '2021_11_23_150756_create_units_table', 1),
(17, '2021_11_27_184243_add_grade_to_chapters', 1),
(18, '2021_12_02_172948_add_grade_to_question_table', 1),
(19, '2021_12_03_171013_add_description_to_chapters_table', 1),
(21, '2022_03_22_091608_add_status_to_users_table', 1),
(22, '2022_03_23_114440_add_approve_to_users_table', 1),
(23, '2022_03_24_110322_add_phone_to_users_table', 1),
(30, '2021_12_04_063614_create_quizes_table', 4),
(31, '2022_04_11_045244_create_attemps_table', 5),
(32, '2022_04_13_090920_create_notifications_table', 6),
(33, '2022_04_14_101728_create_settings_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `mysubjects`
--

CREATE TABLE `mysubjects` (
  `mysubject_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mysubjects`
--

INSERT INTO `mysubjects` (`mysubject_id`, `user_id`, `subject_ids`, `grade`, `created_at`, `updated_at`) VALUES
(1, 2, '1', '1', '2022-04-09 21:38:18', '2022-04-09 22:33:54'),
(2, 3, '1', '1', '2022-04-12 23:48:18', '2022-04-12 23:48:20'),
(3, 4, '1', '1', '2022-04-13 02:46:17', '2022-04-13 02:46:20'),
(4, 5, '1', '1', '2022-04-13 04:06:03', '2022-04-13 04:06:05'),
(5, 6, '2', '1', '2022-04-13 04:15:41', '2022-04-13 04:15:43'),
(6, 7, '1,2', '1', '2022-04-13 04:54:27', '2022-04-13 05:11:54'),
(7, 9, '1,2', '1', '2022-04-14 03:02:04', '2022-04-14 03:29:52'),
(8, 10, '1,2', '1', '2022-04-15 21:59:05', '2022-04-15 22:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notify_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notify_to`, `title`, `message`, `created_at`, `updated_at`) VALUES
(41, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 00:29:33', '2022-04-14 00:29:33'),
(42, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 00:32:39', '2022-04-14 00:32:39'),
(43, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:06:27', '2022-04-14 01:06:27'),
(44, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:06:40', '2022-04-14 01:06:40'),
(45, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:06:49', '2022-04-14 01:06:49'),
(46, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:07:57', '2022-04-14 01:07:57'),
(47, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:08:03', '2022-04-14 01:08:03'),
(48, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:09:00', '2022-04-14 01:09:00'),
(49, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:09:06', '2022-04-14 01:09:06'),
(50, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:09:12', '2022-04-14 01:09:12'),
(51, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:10:49', '2022-04-14 01:10:49'),
(52, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:11:38', '2022-04-14 01:11:38'),
(53, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:11:59', '2022-04-14 01:11:59'),
(54, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:12:07', '2022-04-14 01:12:07'),
(55, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:12:15', '2022-04-14 01:12:15'),
(56, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:12:31', '2022-04-14 01:12:31'),
(57, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:12:38', '2022-04-14 01:12:38'),
(58, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 01:12:43', '2022-04-14 01:12:43'),
(59, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 02:57:54', '2022-04-14 02:57:54'),
(60, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 02:59:00', '2022-04-14 02:59:00'),
(61, '7', 'Student failed in three times', 'Ainsley Troy fail in Chemistry', '2022-04-14 03:00:10', '2022-04-14 03:00:10'),
(62, '9', 'Student failed in three times', 'Morgan Snider fail in Physics', '2022-04-14 03:02:45', '2022-04-14 03:02:45'),
(63, '9', 'Student failed in three times', 'Morgan Snider fail in Physics', '2022-04-14 03:03:14', '2022-04-14 03:03:14'),
(64, '9', 'Student failed in three times', 'Morgan Snider fail in Physics', '2022-04-14 03:04:35', '2022-04-14 03:04:35'),
(65, '9', 'Student failed in three times', 'Morgan Snider fail in Physics', '2022-04-14 03:04:45', '2022-04-14 03:04:45'),
(66, '9', 'Student failed in three times', 'Morgan Snider fail in Physics', '2022-04-14 03:04:55', '2022-04-14 03:04:55'),
(67, '9', 'Student failed in three times', 'Morgan Snider fail in Physics', '2022-04-14 03:05:05', '2022-04-14 03:05:05'),
(68, '9', 'Student failed in three times', 'Morgan Snider fail in Physics', '2022-04-14 03:09:36', '2022-04-14 03:09:36'),
(69, '9', 'Student failed in three times', 'Morgan Snider fail in Physics', '2022-04-14 03:10:16', '2022-04-14 03:10:16'),
(70, '9', 'Student failed in three times', 'Morgan Snider fail in Physics', '2022-04-14 03:10:34', '2022-04-14 03:10:34'),
(71, '9', 'Student failed in three times', 'Morgan Snider fail in Physics', '2022-04-14 03:13:02', '2022-04-14 03:13:02'),
(72, '9', 'Student failed in three times', 'Morgan Snider fail in Physics', '2022-04-14 03:13:50', '2022-04-14 03:13:50'),
(73, '9', 'Student failed in three times', 'Morgan Snider fail in Physics', '2022-04-14 03:14:27', '2022-04-14 03:14:27'),
(74, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 03:31:06', '2022-04-14 03:31:06'),
(75, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 04:37:16', '2022-04-14 04:37:16'),
(76, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 04:38:49', '2022-04-14 04:38:49'),
(77, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 04:39:19', '2022-04-14 04:39:19'),
(78, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 04:39:25', '2022-04-14 04:39:25'),
(79, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 04:39:33', '2022-04-14 04:39:33'),
(80, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 04:41:48', '2022-04-14 04:41:48'),
(81, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 04:41:55', '2022-04-14 04:41:55'),
(82, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 04:42:03', '2022-04-14 04:42:03'),
(83, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 05:02:54', '2022-04-14 05:02:54'),
(84, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 05:03:34', '2022-04-14 05:03:34'),
(85, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 05:03:39', '2022-04-14 05:03:39'),
(86, '9', 'Student failed in three times', 'Morgan Snider fail in Chemistry', '2022-04-14 05:03:42', '2022-04-14 05:03:42'),
(87, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 21:59:27', '2022-04-15 21:59:27'),
(88, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:27:59', '2022-04-15 22:27:59'),
(89, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:28:06', '2022-04-15 22:28:06'),
(90, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:28:12', '2022-04-15 22:28:12'),
(91, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:28:19', '2022-04-15 22:28:19'),
(92, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:28:23', '2022-04-15 22:28:23'),
(93, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:37:05', '2022-04-15 22:37:05'),
(94, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:39:03', '2022-04-15 22:39:03'),
(95, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:39:07', '2022-04-15 22:39:07'),
(96, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:39:13', '2022-04-15 22:39:13'),
(97, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:39:19', '2022-04-15 22:39:19'),
(98, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:39:23', '2022-04-15 22:39:23'),
(99, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:39:27', '2022-04-15 22:39:27'),
(100, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:41:30', '2022-04-15 22:41:30'),
(101, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:42:06', '2022-04-15 22:42:06'),
(102, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:42:50', '2022-04-15 22:42:50'),
(103, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:42:57', '2022-04-15 22:42:57'),
(104, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:43:01', '2022-04-15 22:43:01'),
(105, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:47:19', '2022-04-15 22:47:19'),
(106, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:49:34', '2022-04-15 22:49:34'),
(107, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-15 22:50:29', '2022-04-15 22:50:29'),
(108, '10', 'Student failed in three times', 'Heather Carol fail in Physics', '2022-04-15 23:42:55', '2022-04-15 23:42:55'),
(109, '10', 'Student failed in three times', 'Heather Carol fail in Physics', '2022-04-15 23:43:24', '2022-04-15 23:43:24'),
(110, '10', 'Student failed in three times', 'Heather Carol fail in Physics', '2022-04-15 23:43:44', '2022-04-15 23:43:44'),
(111, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-16 00:26:23', '2022-04-16 00:26:23'),
(112, '10', 'Student failed in three times', 'Heather Carol fail in Chemistry', '2022-04-16 00:27:31', '2022-04-16 00:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_approve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_approve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subject_id`, `chapter_id`, `user_id`, `question`, `type`, `options`, `answer`, `admin_approve`, `teacher_approve`, `created_at`, `updated_at`, `unit_id`, `grade_id`) VALUES
(14, 1, 1, 1, 'Laudantium qui occa', 'radio', '[\"Enim ut dolorem eius\",\"Laboris ullamco exce\",\"Ut nobis sit et lab\",\"Dolore sint tempore\"]', 'Laboris ullamco exce', '1', NULL, '2022-04-12 04:03:03', '2022-04-12 04:03:03', 1, 1),
(15, 1, 1, 1, 'Et aspernatur deseru', 'radio', '[\"Consequatur fugit d\",\"Sed voluptatem cumqu\",\"Sapiente obcaecati s\",\"Consequatur Veniam\"]', 'Sapiente obcaecati s', '1', NULL, '2022-04-12 04:03:07', '2022-04-12 04:03:07', 1, 1),
(16, 1, 1, 1, 'Sed facere id sed f', 'radio', '[\"Nostrud dolorem sit\",\"Iusto alias voluptat\",\"Maxime fugit maxime\",\"Impedit amet dolor\"]', 'Nostrud dolorem sit', '1', NULL, '2022-04-12 04:03:09', '2022-04-12 04:03:09', 1, 1),
(17, 1, 1, 1, 'Quasi elit ea sed d', 'radio', '[\"Aspernatur sint rer\",\"Facilis totam at sus\",\"Et ad nemo et omnis\",\"Eum quidem dolorem a\"]', 'Aspernatur sint rer', '1', NULL, '2022-04-12 04:03:12', '2022-04-12 04:03:12', 1, 1),
(18, 1, 1, 1, 'Voluptas qui tempori', 'radio', '[\"Voluptate iste qui e\",\"Ut iure obcaecati be\",\"Quos consequatur re\",\"Exercitation est est\"]', 'Voluptate iste qui e', '1', NULL, '2022-04-12 04:03:17', '2022-04-12 04:03:17', 1, 1),
(19, 1, 1, 1, 'Tempore inventore u', 'radio', '[\"Non molestiae enim u\",\"Molestiae ut duis no\",\"Qui in et quia aperi\",\"Nihil non nulla iust\"]', 'Non molestiae enim u', '1', NULL, '2022-04-12 04:03:35', '2022-04-12 04:03:35', 2, 1),
(20, 1, 1, 1, 'Doloremque in corpor', 'radio', '[\"Nisi et cupidatat do\",\"Quos est sequi aut l\",\"Aut aute magna et se\",\"Porro ex sed ea iste\"]', 'Nisi et cupidatat do', '1', NULL, '2022-04-12 04:03:38', '2022-04-12 04:03:38', 2, 1),
(21, 1, 1, 1, 'Nostrud fugiat culp', 'radio', '[\"Ut sit at alias poss\",\"Eos enim eveniet su\",\"Sit duis exercitati\",\"Fugiat voluptate of\"]', 'Fugiat voluptate of', '1', NULL, '2022-04-12 04:03:40', '2022-04-12 04:03:40', 2, 1),
(22, 1, 1, 1, 'Voluptates animi do', 'radio', '[\"Fugit sed qui debit\",\"Sint inventore inven\",\"Dolor ex omnis nihil\",\"Eos ea non enim dui\"]', 'Sint inventore inven', '1', NULL, '2022-04-12 04:03:43', '2022-04-12 04:03:43', 2, 1),
(23, 1, 1, 1, 'Consequat Quo non a', 'radio', '[\"Non et ipsum sit mod\",\"Sed iusto dolore aut\",\"Iste velit minus ut\",\"Ea et Nam nihil irur\"]', 'Ea et Nam nihil irur', '1', NULL, '2022-04-12 04:04:14', '2022-04-12 04:04:14', 3, 1),
(24, 1, 1, 1, 'Illum soluta ipsum', 'radio', '[\"Sed aute anim conseq\",\"Cupidatat voluptatum\",\"Ex aut adipisicing a\",\"Pariatur In ut dist\"]', 'Pariatur In ut dist', '1', NULL, '2022-04-12 04:04:17', '2022-04-12 04:04:17', 3, 1),
(25, 1, 1, 1, 'Quia ea perspiciatis', 'radio', '[\"Molestiae illum est\",\"Incidunt anim non i\",\"Qui voluptas quasi m\",\"Eum aut accusamus hi\"]', 'Qui voluptas quasi m', '1', NULL, '2022-04-12 04:04:19', '2022-04-12 04:04:19', 3, 1),
(26, 2, 2, 1, 'Iusto rerum veritati', 'radio', '[\"Commodo et provident\",\"Reiciendis voluptate\",\"Adipisicing qui enim\",\"Laboris quia et anim\"]', 'Commodo et provident', '1', NULL, '2022-04-13 04:11:02', '2022-04-13 04:11:02', 4, 1),
(27, 2, 2, 1, 'Aspernatur mollit te', 'radio', '[\"Et omnis voluptas qu\",\"Aliquid aut aliquip\",\"A voluptas consequat\",\"Ut quos sint ad at s\"]', 'Et omnis voluptas qu', '1', NULL, '2022-04-13 04:11:08', '2022-04-13 04:11:08', 4, 1),
(28, 2, 2, 1, 'Officia aute et ipsu', 'radio', '[\"Fugiat quos dolor la\",\"Cum earum magna elig\",\"Sunt do consequuntur\",\"Dolorum cupidatat ve\"]', 'Fugiat quos dolor la', '1', NULL, '2022-04-13 04:11:13', '2022-04-13 04:11:13', 4, 1),
(29, 2, 2, 1, 'Consequatur Exercit', 'radio', '[\"Aut et debitis eos q\",\"Nulla omnis debitis\",\"Omnis anim id ea es\",\"Eaque asperiores est\"]', 'Eaque asperiores est', '1', NULL, '2022-04-13 04:11:19', '2022-04-13 04:11:19', 4, 1),
(30, 2, 2, 1, 'Excepteur proident', 'radio', '[\"Molestias obcaecati\",\"Magni sed ipsum et\",\"Totam saepe aspernat\",\"Esse enim unde est a\"]', 'Magni sed ipsum et', '1', NULL, '2022-04-13 04:11:22', '2022-04-13 04:11:22', 4, 1),
(31, 2, 2, 1, 'Dolores non dolore f', 'radio', '[\"Exercitation ipsum\",\"Reprehenderit dolor\",\"Pariatur Architecto\",\"Qui sapiente consect\"]', 'Exercitation ipsum', '1', NULL, '2022-04-13 04:12:23', '2022-04-13 04:12:23', 5, 1),
(32, 2, 2, 1, 'Aliquam officia sint', 'radio', '[\"Dolor irure quisquam\",\"Tempore pariatur N\",\"Reprehenderit eu off\",\"Adipisicing alias qu\"]', 'Adipisicing alias qu', '1', NULL, '2022-04-13 04:12:26', '2022-04-13 04:12:26', 5, 1),
(33, 2, 2, 1, 'Fugiat esse volupt', 'radio', '[\"Et in molestias sapi\",\"Beatae quam laborios\",\"Impedit quia saepe\",\"Exercitationem quo i\"]', 'Beatae quam laborios', '1', NULL, '2022-04-13 04:12:28', '2022-04-13 04:12:28', 5, 1),
(34, 2, 2, 1, 'Mollitia quo qui ape', 'radio', '[\"Modi qui aut qui off\",\"Temporibus reprehend\",\"Nihil qui qui deleni\",\"Omnis laudantium vo\"]', 'Temporibus reprehend', '1', NULL, '2022-04-13 04:12:30', '2022-04-13 04:12:30', 5, 1),
(35, 2, 2, 1, 'Odit nihil aliquid u', 'radio', '[\"Laudantium deleniti\",\"Fugiat voluptatem al\",\"Et ut ut minus sunt\",\"Proident sequi sequ\"]', 'Laudantium deleniti', '1', NULL, '2022-04-13 04:14:18', '2022-04-13 04:14:18', 6, 1),
(36, 2, 2, 1, 'Exercitationem tenet', 'radio', '[\"Qui molestiae ea eve\",\"Repudiandae tenetur\",\"A nisi ut sunt nequ\",\"Officia assumenda qu\"]', 'Officia assumenda qu', '1', NULL, '2022-04-13 04:14:21', '2022-04-13 04:14:21', 6, 1),
(37, 2, 2, 1, 'Et officiis aute dol', 'radio', '[\"Voluptatibus nihil v\",\"Labore sit cupiditat\",\"Nostrud eos qui eius\",\"Earum lorem dolores\"]', 'Voluptatibus nihil v', '1', NULL, '2022-04-13 04:14:23', '2022-04-13 04:14:23', 6, 1),
(38, 2, 2, 1, 'Vel et enim velit te', 'radio', '[\"Dolore ad in esse ut\",\"Necessitatibus quia\",\"Atque deleniti offic\",\"Sed non laborum At\"]', 'Necessitatibus quia', '1', NULL, '2022-04-13 04:14:40', '2022-04-13 04:14:40', 7, 1),
(39, 2, 2, 1, 'Cum illo voluptas od', 'radio', '[\"Consectetur et aut e\",\"Sint quaerat ipsum\",\"Omnis beatae eu eius\",\"Reprehenderit incidu\"]', 'Reprehenderit incidu', '1', NULL, '2022-04-13 04:14:43', '2022-04-13 04:14:43', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `question` int(11) DEFAULT NULL,
  `correct_ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`id`, `user_id`, `subject_id`, `chapter_id`, `unit_id`, `question`, `correct_ans`, `answer`, `created_at`, `updated_at`) VALUES
(841, 10, 1, 1, 1, 14, 'Laboris ullamco exce', 'Laboris ullamco exce', '2022-04-15 23:42:49', '2022-04-15 23:42:49'),
(842, 10, 1, 1, 1, 15, 'Sapiente obcaecati s', 'Sapiente obcaecati s', '2022-04-15 23:42:50', '2022-04-15 23:42:50'),
(843, 10, 1, 1, 1, 16, 'Nostrud dolorem sit', 'Maxime fugit maxime', '2022-04-15 23:42:52', '2022-04-15 23:42:52'),
(844, 10, 1, 1, 1, 17, 'Aspernatur sint rer', 'Eum quidem dolorem a', '2022-04-15 23:42:53', '2022-04-15 23:42:53'),
(845, 10, 1, 1, 1, 18, 'Voluptate iste qui e', 'Quos consequatur re', '2022-04-15 23:42:54', '2022-04-15 23:42:54'),
(854, 10, 1, 1, 2, 19, 'Non molestiae enim u', 'Qui in et quia aperi', '2022-04-15 23:43:20', '2022-04-15 23:43:20'),
(855, 10, 1, 1, 2, 20, 'Nisi et cupidatat do', 'Aut aute magna et se', '2022-04-15 23:43:21', '2022-04-15 23:43:21'),
(856, 10, 1, 1, 2, 21, 'Fugiat voluptate of', 'Fugiat voluptate of', '2022-04-15 23:43:23', '2022-04-15 23:43:23'),
(857, 10, 1, 1, 2, 22, 'Sint inventore inven', 'Eos ea non enim dui', '2022-04-15 23:43:23', '2022-04-15 23:43:23'),
(861, 10, 1, 1, 3, 23, 'Ea et Nam nihil irur', 'Iste velit minus ut', '2022-04-15 23:43:35', '2022-04-15 23:43:35'),
(862, 10, 1, 1, 3, 24, 'Pariatur In ut dist', 'Pariatur In ut dist', '2022-04-15 23:43:36', '2022-04-15 23:43:42'),
(863, 10, 1, 1, 3, 25, 'Qui voluptas quasi m', 'Eum aut accusamus hi', '2022-04-15 23:43:37', '2022-04-15 23:43:43'),
(874, 10, 2, 2, 4, 26, 'Commodo et provident', 'Laboris quia et anim', '2022-04-16 00:26:17', '2022-04-16 00:27:27'),
(875, 10, 2, 2, 4, 27, 'Et omnis voluptas qu', 'Aliquid aut aliquip', '2022-04-16 00:26:18', '2022-04-16 00:26:18'),
(876, 10, 2, 2, 4, 28, 'Fugiat quos dolor la', 'Sunt do consequuntur', '2022-04-16 00:26:19', '2022-04-16 00:27:29'),
(877, 10, 2, 2, 4, 29, 'Eaque asperiores est', 'Eaque asperiores est', '2022-04-16 00:26:21', '2022-04-16 00:27:30'),
(878, 10, 2, 2, 4, 30, 'Magni sed ipsum et', 'Esse enim unde est a', '2022-04-16 00:26:22', '2022-04-16 00:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `chapter_id` bigint(20) NOT NULL,
  `unit_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `subject_id`, `chapter_id`, `unit_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 2, 2, 7, 10, 1, '2022-04-15 22:37:05', '2022-04-15 22:47:19'),
(11, 2, 2, 6, 10, 1, '2022-04-15 22:49:34', '2022-04-15 22:49:34'),
(12, 2, 2, 5, 10, 1, '2022-04-15 22:50:29', '2022-04-15 22:50:29'),
(13, 1, 1, 1, 10, 1, '2022-04-15 23:42:55', '2022-04-15 23:42:55'),
(14, 1, 1, 2, 10, 1, '2022-04-15 23:43:24', '2022-04-15 23:43:24'),
(15, 1, 1, 3, 10, 1, '2022-04-15 23:43:44', '2022-04-15 23:43:44'),
(16, 2, 2, 4, 10, 1, '2022-04-16 00:26:23', '2022-04-16 00:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `study_materials`
--

CREATE TABLE `study_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_approve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_approve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `study_materials`
--

INSERT INTO `study_materials` (`id`, `user_id`, `subject_id`, `grade_id`, `chapter_id`, `unit_id`, `documents`, `video`, `video_link`, `video_title`, `document_title`, `admin_approve`, `teacher_approve`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 'unit-one-document-2022-04-10-62524f255bed8.pdf', NULL, 'https://www.youtube.com/embed/TlB_eWDSMt4', 'Unit one video', 'Unit one document', NULL, NULL, '2022-04-09 21:29:41', '2022-04-09 21:29:41'),
(2, 1, 1, 1, 1, 2, 'unit-two-document-2022-04-10-62524fc5dee42.pdf', NULL, 'https://www.youtube.com/embed/qZXt1Aom3Cs', 'Unit two video', 'Unit two document', NULL, NULL, '2022-04-09 21:32:21', '2022-04-09 21:32:21'),
(3, 1, 1, 1, 1, 3, 'unit-three-document-2022-04-10-6252507b58ca0.pdf', NULL, 'https://www.youtube.com/embed/ekgUjyWe1Yc', 'Unit three video', 'Unit three document', NULL, NULL, '2022-04-09 21:35:23', '2022-04-09 21:35:23'),
(4, 1, 2, 1, 2, 4, 'document-01-2022-04-13-6256a1a7e6414.pdf', NULL, 'https://www.youtube.com/embed/FXpIoQ_rT_c', '1 - Intro to Social Science ISS1120', 'Document-01', NULL, NULL, '2022-04-13 04:10:47', '2022-04-13 04:10:47'),
(5, 1, 2, 1, 2, 5, 'document-02-2022-04-13-6256a20144428.pdf', NULL, 'https://www.youtube.com/embed/cuHDQhDhvPE', '1 - Intro to Social Science ISS11201 - Intro to Social Science ISS11201 - Intro to Social Science ISS11201 - Intro to Social Science ISS1120', 'Document-02', NULL, NULL, '2022-04-13 04:12:17', '2022-04-13 04:12:17'),
(6, 1, 2, 1, 2, 6, 'document-03-2022-04-13-6256a247d710b.pdf', NULL, 'https://www.youtube.com/embed/GHTA143_b-s', '1 - Intro to Social Science', 'Document-03', NULL, NULL, '2022-04-13 04:13:27', '2022-04-13 04:13:27'),
(7, 1, 2, 1, 2, 7, 'document-04-2022-04-13-6256a26c99fb4.pdf', NULL, 'https://www.youtube.com/embed/GHTA143_b-s', '1 - Intro to Social Science ISS11201 - Intro to Social Science ISS11201 - Intro to Social Science ISS11201 - Intro to Social Science ISS1120', 'Document-04', NULL, NULL, '2022-04-13 04:14:04', '2022-04-13 04:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_approve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_approve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `name`, `admin_approve`, `teacher_approve`, `created_at`, `updated_at`) VALUES
(1, 'Physics', '1', NULL, '2022-04-09 21:26:43', '2022-04-09 21:26:43'),
(2, 'Chemistry', '1', NULL, '2022-04-13 04:08:36', '2022-04-13 04:08:36'),
(3, 'Mathmatics', '1', NULL, '2022-04-15 22:51:29', '2022-04-15 22:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_approve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_approve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `subject_id`, `chapter_id`, `grade_id`, `name`, `description`, `admin_approve`, `teacher_approve`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Unite-01', 'Unit one description', '1', NULL, '2022-04-09 21:27:47', '2022-04-09 21:27:47'),
(2, 1, 1, 1, 'Unite-02', 'Unit two description', '1', NULL, '2022-04-09 21:28:05', '2022-04-09 21:28:05'),
(3, 1, 1, 1, 'Unite-03', 'Unit three description', '1', NULL, '2022-04-09 21:28:20', '2022-04-09 21:28:20'),
(4, 2, 2, 1, 'Unite-01', 'Unit one description', '1', NULL, '2022-04-13 04:09:08', '2022-04-13 04:09:08'),
(5, 2, 2, 1, 'Unite-02', 'Unit two description', '1', NULL, '2022-04-13 04:09:22', '2022-04-13 04:09:22'),
(6, 2, 2, 1, 'Unite-03', 'Unit three description', '1', NULL, '2022-04-13 04:09:36', '2022-04-13 04:09:36'),
(7, 2, 2, 1, 'Unite-04', 'Unit four description', '1', NULL, '2022-04-13 04:09:54', '2022-04-13 04:09:54'),
(8, 3, 5, 1, 'Unite-01', 'Unit one description', '1', NULL, '2022-04-15 22:53:48', '2022-04-15 22:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `approve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `image`, `remember_token`, `first_name`, `last_name`, `address`, `city`, `zip_code`, `role`, `bio`, `created_at`, `updated_at`, `status`, `approve`, `phone`) VALUES
(1, 'mdrobel.cse@gmail.com', NULL, '$2y$10$YXHoYpzwHg8M87iKpl.hu.PkzTgDgjsuxaDiPdIG9n9Dz97Evbndy', NULL, NULL, 'Md.', 'Robel', 'Dhaka, Bangladesh', 'Dhaka', '1234', '1', 'Software Engineer', '2022-04-09 21:21:43', '2022-04-09 21:21:43', 0, NULL, NULL),
(2, 'admin@gmail.com', NULL, '$2y$10$VKjVJtyMlBs9GhVe8HzumOoiLz1W5beIIItDePo71k/5XEgLLRL6y', NULL, NULL, 'Cleo', 'Sandra', '', '', '', '1', '', '2022-04-09 21:26:02', '2022-04-09 21:26:02', 0, NULL, NULL),
(3, 'student@gmail.com', NULL, '$2y$10$OvkS6ZnpCDuHq6lr2qds0uLZdkScpJ1i84/5B7FbU7OStApanXV3.', NULL, NULL, 'Macon', 'Jonas', '', '', '', '2', '', '2022-04-12 23:48:02', '2022-04-12 23:48:02', 0, NULL, NULL),
(4, 'teacher@gmail.com', NULL, '$2y$10$6X5UfLDC7eXaPp.O.fmxpue5insOBhvDJXQLODMUOm/vTCx7CQqoa', NULL, NULL, 'Kylee', 'Hadassah', '', '', '', '3', '', '2022-04-13 02:46:05', '2022-04-13 02:46:05', 0, NULL, NULL),
(5, 'wewo@mailinator.com', NULL, '$2y$10$R4bS/m9qpUGBU8eA2p/I/.so8JCPHbotnn7i6KP.wOYTIO8.XPpDm', NULL, NULL, 'Lester', 'Ebony', '', '', '', '3', '', '2022-04-13 04:05:49', '2022-04-13 04:05:49', 0, NULL, NULL),
(6, 'jupere@mailinator.com', NULL, '$2y$10$71ho/1mwZjguxrfIKCQXHukS0yDBfYHSVihr/A3cunfOF1MZyYgTy', NULL, NULL, 'Shelley', 'Zachary', '', '', '', '3', '', '2022-04-13 04:15:22', '2022-04-13 04:15:22', 0, NULL, NULL),
(7, 'niho@mailinator.com', NULL, '$2y$10$wBnQsaZMKp21LjDq1J1rrO5vPqsnvIAw.Hs9ZWo1SsNx6goEb4sgi', NULL, NULL, 'Ainsley', 'Troy', '', '', '', '3', '', '2022-04-13 04:51:37', '2022-04-13 04:51:37', 0, NULL, NULL),
(8, 'teacher3@eschool.com', NULL, '$2y$10$qek/U/6FDd3MP5a5cPPay.uMkEp3In0z8MJ33fouK3GsOkqCxcci.', NULL, NULL, 'Teacher', 'Test3', 'Dhaka, Bangladesh', 'Dhaka', '5870', '2', '', '2022-04-13 07:34:57', '2022-04-13 07:34:57', 3, NULL, NULL),
(9, 'mdhasan@gmail.com', NULL, '$2y$10$ekZzwhj7X7NAaHrDznCmwezbv9Fx0WMZlwzreuHt4TCIxdmc626le', NULL, NULL, 'Morgan', 'Snider', '', '', '', '3', '', '2022-04-14 03:01:47', '2022-04-14 03:01:47', 0, NULL, NULL),
(10, 'walefid@mailinator.com', NULL, '$2y$10$Jw7mtiyNdbOeEF.Vl1NwlOVXfUnV1P7G4exdbEK6YNGjl09iaInA.', NULL, NULL, 'Heather', 'Carol', '', '', '', '3', '', '2022-04-15 21:57:49', '2022-04-15 21:57:49', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attemps`
--
ALTER TABLE `attemps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`chapter_id`),
  ADD KEY `chapters_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mysubjects`
--
ALTER TABLE `mysubjects`
  ADD PRIMARY KEY (`mysubject_id`),
  ADD KEY `mysubjects_user_id_foreign` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `study_materials`
--
ALTER TABLE `study_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`),
  ADD KEY `units_subject_id_foreign` (`subject_id`);

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
-- AUTO_INCREMENT for table `attemps`
--
ALTER TABLE `attemps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `chapter_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `mysubjects`
--
ALTER TABLE `mysubjects`
  MODIFY `mysubject_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=879;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `study_materials`
--
ALTER TABLE `study_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE;

--
-- Constraints for table `mysubjects`
--
ALTER TABLE `mysubjects`
  ADD CONSTRAINT `mysubjects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
