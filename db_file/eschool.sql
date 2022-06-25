-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 12:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
(2, 2, 1, 1, 1, 1, '[{\"total_mark\":8,\"pass_mark\":6.4,\"score\":5,\"status\":\"fail\"}]', '1656152208', '1656152220', '2022-06-25 17:16:48', '2022-06-25 17:17:00'),
(3, 2, 1, 1, 2, 4, '[{\"total_mark\":10,\"pass_mark\":8,\"score\":2,\"status\":\"fail\"},{\"total_mark\":10,\"pass_mark\":8,\"score\":4,\"status\":\"fail\"},{\"total_mark\":10,\"pass_mark\":8,\"score\":3,\"status\":\"fail\"},{\"total_mark\":10,\"pass_mark\":8,\"score\":1,\"status\":\"fail\"}]', '1656152318', '1656152332', '2022-06-25 17:17:09', '2022-06-25 17:18:52');

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
(1, 1, 'Lilah Landry', '1', NULL, '2022-06-25 16:58:57', '2022-06-25 16:58:57', 1, 'Facere nisi ea dolor');

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
(1, 'Grade - 01', '2022-06-25 16:58:44', '2022-06-25 16:58:44');

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
(20, '2021_12_04_063614_create_quizes_table', 1),
(21, '2022_03_22_091608_add_status_to_users_table', 1),
(22, '2022_03_23_114440_add_approve_to_users_table', 1),
(23, '2022_03_24_110322_add_phone_to_users_table', 1),
(24, '2022_04_11_045244_create_attemps_table', 1),
(25, '2022_04_13_090920_create_notifications_table', 1),
(26, '2022_04_14_101728_create_settings_table', 1);

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
(2, 2, '1', '1', '2022-06-25 17:16:23', '2022-06-25 17:16:25');

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
(1, '2', 'Student failed in three times', 'Jillian King fail in Joseph Huff', '2022-06-25 17:17:44', '2022-06-25 17:17:44'),
(2, '2', 'Student failed in three times', 'Jillian King fail in Joseph Huff', '2022-06-25 17:18:52', '2022-06-25 17:18:52');

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
(19, 1, 1, 1, 'Ut consectetur in ar', 'radio', '[\"Assumenda deserunt l\",\"Dolor dolorem sint l\",\"Ipsum sequi id dol\",\"Labore in est quaera\"]', 'Dolor dolorem sint l', '1', NULL, '2022-06-25 17:12:13', '2022-06-25 17:12:13', 2, 1),
(20, 1, 1, 1, 'Laboriosam quia dol', 'radio', '[\"Ex harum tempora rer\",\"Nihil officiis eius\",\"Et maiores veritatis\",\"Nostrum quis aut ius\"]', 'Nostrum quis aut ius', '1', NULL, '2022-06-25 17:12:15', '2022-06-25 17:12:15', 2, 1),
(21, 1, 1, 1, 'Ullamco omnis lorem', 'radio', '[\"Est veniam alias ad\",\"Pariatur Earum corr\",\"Aut dolore optio no\",\"Accusamus natus quae\"]', 'Accusamus natus quae', '1', NULL, '2022-06-25 17:12:18', '2022-06-25 17:12:18', 2, 1),
(22, 1, 1, 1, 'Sunt velit laboriosa', 'radio', '[\"Eum harum sed vero p\",\"Cillum et rerum temp\",\"Iusto nobis neque in\",\"Et ducimus dolore o\"]', 'Cillum et rerum temp', '1', NULL, '2022-06-25 17:12:22', '2022-06-25 17:12:22', 2, 1),
(23, 1, 1, 1, 'Harum aliqua Ipsum', 'radio', '[\"Quia alias proident\",\"Atque tempore ipsum\",\"Dicta excepturi magn\",\"Proident aut totam\"]', 'Dicta excepturi magn', '1', NULL, '2022-06-25 17:12:24', '2022-06-25 17:12:24', 2, 1),
(24, 1, 1, 1, 'Odio delectus solut', 'radio', '[\"Labore distinctio S\",\"Sit et vero vitae l\",\"Corporis ex qui est\",\"Eum sit eius recusan\"]', 'Sit et vero vitae l', '1', NULL, '2022-06-25 17:12:27', '2022-06-25 17:12:27', 2, 1),
(25, 1, 1, 1, 'Placeat neque fugia', 'radio', '[\"Et omnis reprehender\",\"Rerum ad aperiam con\",\"Beatae sed consequun\",\"Ex eu aliquip rem se\"]', 'Beatae sed consequun', '1', NULL, '2022-06-25 17:12:30', '2022-06-25 17:12:30', 2, 1),
(26, 1, 1, 1, 'Voluptas reprehender', 'radio', '[\"Blanditiis dolore in\",\"Officiis impedit mo\",\"Repudiandae in quaer\",\"Rerum qui eligendi a\"]', 'Officiis impedit mo', '1', NULL, '2022-06-25 17:12:33', '2022-06-25 17:12:33', 2, 1),
(27, 1, 1, 1, 'Provident ex ullamc', 'radio', '[\"Doloremque commodo q\",\"Et quam est ex pari\",\"Ut est saepe omnis o\",\"Non veniam et et mi\"]', 'Et quam est ex pari', '1', NULL, '2022-06-25 17:12:36', '2022-06-25 17:12:36', 2, 1),
(28, 1, 1, 1, 'Amet ipsam nisi ame', 'radio', '[\"Magni tempore dolor\",\"Unde dignissimos aut\",\"Dolore amet sapient\",\"Aute nesciunt volup\"]', 'Magni tempore dolor', '1', NULL, '2022-06-25 17:12:38', '2022-06-25 17:12:38', 2, 1),
(29, 1, 1, 1, 'Iure elit enim dolo', 'radio', '[\"Culpa a est id id\",\"In nihil et duis duc\",\"Et quia ipsa ea lab\",\"Sint facilis vel ut\"]', 'Culpa a est id id', '1', NULL, '2022-06-25 17:13:27', '2022-06-25 17:13:27', 1, 1),
(30, 1, 1, 1, 'Hic commodo expedita', 'radio', '[\"Adipisci alias sint\",\"Voluptatem in necess\",\"Rerum et eveniet qu\",\"Minima commodi iusto\"]', 'Rerum et eveniet qu', '1', NULL, '2022-06-25 17:13:29', '2022-06-25 17:13:29', 1, 1),
(31, 1, 1, 1, 'Ducimus ut autem ea', 'radio', '[\"Reiciendis doloremqu\",\"Assumenda voluptatem\",\"Voluptatem Culpa q\",\"Obcaecati perferendi\"]', 'Assumenda voluptatem', '1', NULL, '2022-06-25 17:13:32', '2022-06-25 17:13:32', 1, 1),
(32, 1, 1, 1, 'Dolor temporibus adi', 'radio', '[\"Molestias natus labo\",\"Quod quo similique e\",\"Nostrum labore conse\",\"Ullamco aut error qu\"]', 'Molestias natus labo', '1', NULL, '2022-06-25 17:13:34', '2022-06-25 17:13:34', 1, 1),
(33, 1, 1, 1, 'Incidunt eos quis', 'radio', '[\"Consequatur Natus d\",\"Voluptas aut nostrud\",\"Quis aut lorem repud\",\"Quos deserunt ex neq\"]', 'Consequatur Natus d', '1', NULL, '2022-06-25 17:13:37', '2022-06-25 17:13:37', 1, 1),
(34, 1, 1, 1, 'Laudantium ea rem e', 'radio', '[\"Sint fugiat minus\",\"Veritatis et cumque\",\"Ipsa ut ex quibusda\",\"Perspiciatis provid\"]', 'Sint fugiat minus', '1', NULL, '2022-06-25 17:13:40', '2022-06-25 17:13:40', 1, 1),
(35, 1, 1, 1, 'Sint a tempor est qu', 'radio', '[\"Qui debitis delectus\",\"Molestiae enim quod\",\"Irure aute tempore\",\"Sit deserunt incidu\"]', 'Irure aute tempore', '1', NULL, '2022-06-25 17:13:42', '2022-06-25 17:13:42', 1, 1),
(36, 1, 1, 1, 'Aute voluptatibus de', 'radio', '[\"Culpa non quod reru\",\"Dolores unde anim do\",\"Sed quasi qui laudan\",\"Inventore quas exerc\"]', 'Dolores unde anim do', '1', NULL, '2022-06-25 17:13:45', '2022-06-25 17:13:45', 1, 1);

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
(9, 2, 1, 1, 1, 29, 'Culpa a est id id', 'Culpa a est id id', '2022-06-25 17:16:50', '2022-06-25 17:16:50'),
(10, 2, 1, 1, 1, 30, 'Rerum et eveniet qu', 'Voluptatem in necess', '2022-06-25 17:16:52', '2022-06-25 17:16:52'),
(11, 2, 1, 1, 1, 31, 'Assumenda voluptatem', 'Assumenda voluptatem', '2022-06-25 17:16:54', '2022-06-25 17:16:54'),
(12, 2, 1, 1, 1, 32, 'Molestias natus labo', 'Molestias natus labo', '2022-06-25 17:16:55', '2022-06-25 17:16:55'),
(13, 2, 1, 1, 1, 33, 'Consequatur Natus d', 'Consequatur Natus d', '2022-06-25 17:16:56', '2022-06-25 17:16:56'),
(14, 2, 1, 1, 1, 34, 'Sint fugiat minus', 'Sint fugiat minus', '2022-06-25 17:16:57', '2022-06-25 17:16:57'),
(15, 2, 1, 1, 1, 35, 'Irure aute tempore', 'Qui debitis delectus', '2022-06-25 17:16:58', '2022-06-25 17:16:58'),
(16, 2, 1, 1, 1, 36, 'Dolores unde anim do', 'Culpa non quod reru', '2022-06-25 17:16:59', '2022-06-25 17:16:59'),
(37, 2, 1, 1, 2, 19, 'Dolor dolorem sint l', 'Ipsum sequi id dol', '2022-06-25 17:17:36', '2022-06-25 17:18:40'),
(38, 2, 1, 1, 2, 20, 'Nostrum quis aut ius', 'Nihil officiis eius', '2022-06-25 17:17:37', '2022-06-25 17:17:37'),
(39, 2, 1, 1, 2, 21, 'Accusamus natus quae', 'Est veniam alias ad', '2022-06-25 17:17:37', '2022-06-25 17:18:42'),
(40, 2, 1, 1, 2, 22, 'Cillum et rerum temp', 'Eum harum sed vero p', '2022-06-25 17:17:38', '2022-06-25 17:17:38'),
(41, 2, 1, 1, 2, 23, 'Dicta excepturi magn', 'Quia alias proident', '2022-06-25 17:17:39', '2022-06-25 17:18:44'),
(42, 2, 1, 1, 2, 24, 'Sit et vero vitae l', 'Eum sit eius recusan', '2022-06-25 17:17:40', '2022-06-25 17:18:47'),
(43, 2, 1, 1, 2, 25, 'Beatae sed consequun', 'Rerum ad aperiam con', '2022-06-25 17:17:41', '2022-06-25 17:18:48'),
(44, 2, 1, 1, 2, 26, 'Officiis impedit mo', 'Officiis impedit mo', '2022-06-25 17:17:42', '2022-06-25 17:17:42'),
(45, 2, 1, 1, 2, 27, 'Et quam est ex pari', 'Ut est saepe omnis o', '2022-06-25 17:17:43', '2022-06-25 17:17:43'),
(46, 2, 1, 1, 2, 28, 'Magni tempore dolor', 'Dolore amet sapient', '2022-06-25 17:17:44', '2022-06-25 17:18:51');

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
(1, 1, 1, 2, 2, 1, '2022-06-25 17:17:44', '2022-06-25 17:18:52');

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
(3, 1, 1, 1, 1, 2, 'odit-possimus-dolor-2022-06-25-62b6df6f5e085.pdf', NULL, 'https://www.youtube.com/embed/qZXt1Aom3Cs', 'Vue js crush course', 'Odit possimus dolor', NULL, NULL, '2022-06-25 17:11:59', '2022-06-25 17:11:59'),
(4, 1, 1, 1, 1, 1, 'voluptatum-sint-pers-2022-06-25-62b6dfc06ad17.pdf', NULL, 'https://www.youtube.com/embed/w7ejDZ8SWv8', 'React Js Crush Course', 'Voluptatum sint pers', NULL, NULL, '2022-06-25 17:13:20', '2022-06-25 17:13:20');

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
(1, 'Joseph Huff', '1', NULL, '2022-06-25 16:57:04', '2022-06-25 16:57:04');

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
(1, 1, 1, 1, 'Baker Everett', 'Dolorum explicabo A', '1', NULL, '2022-06-25 16:59:07', '2022-06-25 16:59:07'),
(2, 1, 1, 1, 'Hedwig Sharp', 'Cupiditate error fac', '1', NULL, '2022-06-25 17:00:47', '2022-06-25 17:00:47');

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
(1, 'admin@eschool.com', NULL, '$2y$10$X2.nMLGHBBWRnBLOVIcVxu6DJeQK1DsGRvqluDzmVDCtDUXKfoJSK', NULL, NULL, 'Aaron', 'Lysandra', '', '', '', '1', '', '2022-06-25 16:56:02', '2022-06-25 16:56:02', 3, NULL, NULL),
(2, 'student@eschool.com', NULL, '$2y$10$t9b0dl6RHLBPAHCNhDaAzuF23vOUJbiRPucFQqmNLH6E4XgaqjMKq', NULL, NULL, 'Jillian', 'King', 'Eaque cum sed omnis', 'Officiis voluptas is', '85320', '3', '', '2022-06-25 16:56:45', '2022-06-25 16:56:45', 1, NULL, NULL),
(3, 'teacher@eschool.com', NULL, '$2y$10$JvlA/w5P4W4Gyg8N26NOj.J8gCECmDNpLiu9ja3c1aaUzPo3p01HK', NULL, NULL, 'Martena', 'Mcmillan', 'Repellendus Volupta', 'Harum ex officia eu', '11929', '2', '', '2022-06-25 16:56:55', '2022-06-25 16:56:55', 3, NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `chapter_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mysubjects`
--
ALTER TABLE `mysubjects`
  MODIFY `mysubject_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `study_materials`
--
ALTER TABLE `study_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
