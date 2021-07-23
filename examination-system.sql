-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2021 at 02:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examination-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `department_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Regression Analysis', '2021-07-21 08:25:50', '2021-07-21 08:25:50'),
(2, 1, 'Linear Regression 1', '2021-07-21 08:26:15', '2021-07-21 08:26:15'),
(3, 1, 'Linear Regression 2', '2021-07-21 08:26:21', '2021-07-21 08:26:21'),
(4, 1, 'Statistics basic', '2021-07-21 08:26:34', '2021-07-21 08:26:34'),
(5, 2, 'Calculus 1', '2021-07-21 08:27:27', '2021-07-21 08:27:27'),
(6, 2, 'Calculus 2', '2021-07-21 08:27:30', '2021-07-21 08:27:49'),
(7, 4, 'Anatomy basic 1', '2021-07-21 08:37:06', '2021-07-21 08:37:06'),
(8, 4, 'Anatomy basic 2', '2021-07-21 08:37:13', '2021-07-21 08:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `faculty_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Statistics', '2021-07-21 08:23:12', '2021-07-21 08:23:12'),
(2, 1, 'Mathematic', '2021-07-21 08:23:18', '2021-07-21 08:23:18'),
(3, 1, 'Chemistry', '2021-07-21 08:23:29', '2021-07-21 08:23:29'),
(4, 2, 'Anatomy', '2021-07-21 08:32:23', '2021-07-21 08:32:23'),
(5, 2, 'Pharmacology & Pharmacy', '2021-07-21 08:32:27', '2021-07-21 08:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `course_id`, `completed`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2021-08-09', '2021-07-21 08:26:43', '2021-07-21 08:26:43'),
(2, 2, 0, '2021-08-17', '2021-07-21 08:26:55', '2021-07-21 08:26:55'),
(3, 3, 0, '2021-08-25', '2021-07-21 08:27:05', '2021-07-21 08:27:05'),
(4, 4, 0, '2021-08-23', '2021-07-21 08:27:13', '2021-07-21 08:27:13'),
(5, 5, 0, '2021-08-25', '2021-07-21 08:27:38', '2021-07-21 08:27:38'),
(6, 6, 0, '2021-08-27', '2021-07-21 08:28:01', '2021-07-21 08:28:01'),
(7, 7, 0, '2021-08-25', '2021-07-21 08:37:19', '2021-07-21 08:37:19'),
(8, 8, 0, '2021-08-23', '2021-07-21 08:37:26', '2021-07-21 08:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `uni_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Science', '2021-07-21 08:22:40', '2021-07-21 08:22:40'),
(2, 1, 'Medicine', '2021-07-21 08:22:43', '2021-07-21 08:22:43'),
(3, 1, 'Arts', '2021-07-21 08:22:47', '2021-07-21 08:22:47'),
(4, 2, 'Engineering', '2021-07-21 08:22:59', '2021-07-21 08:22:59'),
(5, 2, 'Information Technology', '2021-07-21 08:23:04', '2021-07-21 08:23:04');

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
(68, '2012_05_25_151522_create_universities_table', 1),
(69, '2013_05_25_151819_create_faculties_table', 1),
(70, '2014_05_25_152008_create_departments_table', 1),
(71, '2014_10_12_000000_create_users_table', 1),
(72, '2014_10_12_100000_create_password_resets_table', 1),
(73, '2019_08_19_000000_create_failed_jobs_table', 1),
(74, '2021_05_25_152130_create_courses_table', 1),
(75, '2021_05_25_152242_create_exams_table', 1),
(76, '2021_05_25_152341_create_student_exams_table', 1),
(77, '2021_05_25_152426_create_news_table', 1),
(78, '2021_05_27_143531_add_description_to_universities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uni_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `st_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_exams`
--

CREATE TABLE `student_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attandance` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `logo`, `created_at`, `updated_at`, `description`) VALUES
(1, 'University of Colombo', '1626875495-University of Colombo-.png', '2021-07-21 08:21:35', '2021-07-21 08:21:35', 'The oldest campus in Sri Lanka, the University of Colombo is a sprawling complex occupying over fifty acres of prime land in the heart of the city. Today, \"College House\" (the administrative hub of the university) with its period architecture, is a well known landmark in the city. In keeping with its motto \"Buddhih Sarvatra Bhrajate\" which means \"Wisdom shines forth every where\", the University of Colombo strives to maintain academic excellence in all areas of study. The Medical and Science Faculties of the University are not only the oldest in the university system of Sri Lanka but are also arguably the best in terms of Faculty and resources. Student life is enhanced by a plethora of extra-curricular activities offered on campus. The beautiful playground and the modern gymnasium offer sportsmen and women the opportunity to exploit and develop their abilities to the fullest. Meanwhile the New Arts Theater is often the arena for spotlighting the dramatic/musical talents of our student population. The location of the University affords the student population all the advantages of a \"metropolitan university\" in easy access to international information/resource centers, libraries, theaters, sports complexes etc. Today, the University of Colombo with a proud history of over 115 years continues in its endeavor to meet the challenge of maintaining its position as the \"metropolitan university, modern and international in outlook and character\".'),
(2, 'University of Moratuwa', '1626875547-University of Moratuwa-.png', '2021-07-21 08:22:27', '2021-07-21 08:22:27', 'The oldest campus in Sri Lanka, the University of Moratuwa is a sprawling complex occupying over fifty acres of prime land in the heart of the city. Today, \"College House\" (the administrative hub of the university) with its period architecture, is a well known landmark in the city. In keeping with its motto \"Buddhih Sarvatra Bhrajate\" which means \"Wisdom shines forth every where\", the University of Moratuwa strives to maintain academic excellence in all areas of study. The Medical and Science Faculties of the University are not only the oldest in the university system of Sri Lanka but are also arguably the best in terms of Faculty and resources. Student life is enhanced by a plethora of extra-curricular activities offered on campus. The beautiful playground and the modern gymnasium offer sportsmen and women the opportunity to exploit and develop their abilities to the fullest. Meanwhile the New Arts Theater is often the arena for spotlighting the dramatic/musical talents of our student population. The location of the University affords the student population all the advantages of a \"metropolitan university\" in easy access to international information/resource centers, libraries, theaters, sports complexes etc.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `index_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT 0,
  `uni_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fac_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dept_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `index_no`, `email`, `image_path`, `email_verified_at`, `password`, `user_type`, `uni_id`, `fac_id`, `dept_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gogul Prasath', '', 'admin@gmail.com', '', NULL, 'admin', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Kisho Kumar', 's14100', 'Kisho@some.com', '1-s14100-.jpg', NULL, '1234', 0, 1, 1, 1, NULL, '2021-07-21 08:23:56', '2021-07-21 08:23:56'),
(3, 'Methmal', 's14101', 'Meth@gamil.com', '2-s14101-.jpg', NULL, '1234', 0, 1, 1, 2, NULL, '2021-07-21 08:24:23', '2021-07-21 08:24:23'),
(4, 'Perera', 's14102', 'perera@gmail.com', '1-s14102-.jpg', NULL, '1234', 0, 1, 1, 1, NULL, '2021-07-21 08:25:11', '2021-07-21 08:25:11'),
(5, 'Harrish', 'm14100', 'harrish@gmail.com', '4-m14100-.jpg', NULL, '1234', 0, 1, 2, 4, NULL, '2021-07-21 08:34:30', '2021-07-21 08:34:30'),
(6, 'Indran Jayatharan', 's14069', 'indran@gmail.com', '1-s14069-.png', NULL, '1234', 0, 1, 1, 1, NULL, '2021-07-23 06:30:48', '2021-07-23 06:30:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_department_id_foreign` (`department_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_course_id_foreign` (`course_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculties_uni_id_foreign` (`uni_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_uni_id_foreign` (`uni_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_exams`
--
ALTER TABLE `student_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_exams_exam_id_foreign` (`exam_id`),
  ADD KEY `student_exams_student_id_foreign` (`student_id`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_uni_id_foreign` (`uni_id`),
  ADD KEY `users_fac_id_foreign` (`fac_id`),
  ADD KEY `users_dept_id_foreign` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_exams`
--
ALTER TABLE `student_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_uni_id_foreign` FOREIGN KEY (`uni_id`) REFERENCES `universities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_uni_id_foreign` FOREIGN KEY (`uni_id`) REFERENCES `universities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_exams`
--
ALTER TABLE `student_exams`
  ADD CONSTRAINT `student_exams_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_exams_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_fac_id_foreign` FOREIGN KEY (`fac_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_uni_id_foreign` FOREIGN KEY (`uni_id`) REFERENCES `universities` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
