-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Sep 17, 2024 at 11:29 AM
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
-- Database: `cswdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `pob` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `educational_attainment` varchar(255) DEFAULT NULL,
  `civil_status` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `monthly_income` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `source_of_referral` varchar(255) DEFAULT NULL,
  `circumstances_of_referral` longtext DEFAULT NULL,
  `family_background` longtext DEFAULT NULL,
  `health_history` longtext DEFAULT NULL,
  `economic_situation` longtext DEFAULT NULL,
  `house_structure` varchar(255) DEFAULT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `number_of_rooms` varchar(255) DEFAULT NULL,
  `appliances` varchar(255) DEFAULT NULL,
  `other_appliances` varchar(255) DEFAULT NULL,
  `monthly_expenses` varchar(255) DEFAULT NULL,
  `indicate` varchar(255) DEFAULT NULL,
  `assessment` varchar(255) DEFAULT NULL,
  `recommendation` varchar(255) DEFAULT NULL,
  `tracking` varchar(255) DEFAULT NULL,
  `problem_identification` varchar(255) DEFAULT NULL,
  `data_gather` varchar(255) DEFAULT NULL,
  `eval` varchar(255) DEFAULT NULL,
  `control_number` varchar(255) DEFAULT NULL,
  `problem_presented` longtext DEFAULT NULL,
  `services` longtext DEFAULT NULL,
  `requirements` varchar(255) DEFAULT NULL,
  `home_visit` varchar(255) DEFAULT NULL,
  `interviewee` varchar(255) DEFAULT NULL,
  `interviewed_by` varchar(255) DEFAULT NULL,
  `layunin` longtext DEFAULT NULL,
  `resulta` longtext DEFAULT NULL,
  `initial_findings` longtext DEFAULT NULL,
  `initial_agreement` longtext DEFAULT NULL,
  `assessment1` longtext DEFAULT NULL,
  `case_management_evaluation` longtext DEFAULT NULL,
  `case_resolution` longtext DEFAULT NULL,
  `reviewing` varchar(255) DEFAULT NULL,
  `approving` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `building_number` varchar(255) DEFAULT NULL,
  `street_name` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `middle`, `suffix`, `age`, `date_of_birth`, `pob`, `sex`, `educational_attainment`, `civil_status`, `religion`, `nationality`, `occupation`, `monthly_income`, `contact_number`, `source_of_referral`, `circumstances_of_referral`, `family_background`, `health_history`, `economic_situation`, `house_structure`, `floor`, `type`, `number_of_rooms`, `appliances`, `other_appliances`, `monthly_expenses`, `indicate`, `assessment`, `recommendation`, `tracking`, `problem_identification`, `data_gather`, `eval`, `control_number`, `problem_presented`, `services`, `requirements`, `home_visit`, `interviewee`, `interviewed_by`, `layunin`, `resulta`, `initial_findings`, `initial_agreement`, `assessment1`, `case_management_evaluation`, `case_resolution`, `reviewing`, `approving`, `created_at`, `updated_at`, `building_number`, `street_name`, `barangay`) VALUES
(1, 'Arzel John', 'Zolina', 'Zolina', 'None', '23', '2001-09-14', 'Koronadal City', 'Male', 'College Graduate', 'Single', 'Other', 'Other', 'Freelancing', '10,000 PHP - 20,000 PHP', '09154138624', 'Ok', NULL, NULL, NULL, NULL, 'Wood', '0-50', 'Apartment', '1', '[\"Refrigerator\",\"Electric Fan\"]', '', '5,000 PHP - 10,000 PHP', 'House Renter', NULL, NULL, 'Approve', 'Done', NULL, 'Done', 'APL 0000001', NULL, '[\"Burial\",\"Funeral\",\"Crisis Intervention Unit = Valid ID\",\"Barangay Clearance.\",\"Medical Certificate.\",\"Incident Report.\",\"Funeral Contract.\",\"Death Certificate.\",\"Valid ID\",\"ID Copy\",\"Senior Citizen ID (60+)\",\"Poverty Alleviation Program = Valid ID\",\"SCSR.\",\"Application Form\",\"Refrigerator,Electric Fan\"]', '[]', '2024-09-21', 'Arzel', 'Arzel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Arzel John Zolina', '2024-09-13 23:28:51', '2024-09-17 01:08:59', 'Lot 1', 'Purok Masagana 1', 'Pagalungan'),
(2, 'Reynald', 'Agustin', 'Sebua', 'Jr.', '22', '2024-09-21', 'Koronadal City', 'Male', 'College 4th Year', 'Widowed', 'Other', 'Other', 'Outsourcing', '100 PHP - 500 PHP', '09090937257', 'Ok', NULL, NULL, NULL, NULL, 'Semi-concrete', '151-200', 'Apartment', '10', '[\"Refrigerator\"]', '', '20,000 PHP - 25,000 PHP', 'House Renter', NULL, NULL, 'Re-access', NULL, NULL, 'Done', 'APL 0000002', NULL, '[\"Financial\",\"Funeral\",\"Crisis Intervention Unit = Valid ID\",\"Barangay Clearance.\",\"Valid ID\",\"Residence Certificate Or Barangay Clearance\",\"Clinical Abstract\\/medical Certificate\",\"Police Report Or Incident Report\",\"Funeral Contract And Registered Death Certificate. (if Applicable)\",\"Solo Parent = Agency Referral\",\"Residency Cert.\",\"Medical Cert.\",\"Billing Proof\",\"Birth Cert.\",\"ID Copy\",\"Senior Citizen ID (60+)\",\"Pre-marriage Counseling = Valid ID\",\"Birth Certificate\",\"After-Care Services = Valid ID\",\"Birth Certificate.\",\"Residence Certificate.\",\"Poverty Alleviation Program = Valid ID\",\"Residence Certificate\",\"Income Certificate\",\"SCSR.\",\"Application Form\",\"Refrigerator\"]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Arzel John Zolina', '2024-09-13 23:29:59', '2024-09-17 01:13:28', '2', 'Diversion Road', 'Panabo'),
(4, 'Savf', 'Fstaft', 'Ftsfatf', 'Sr.', '21', '2024-10-09', 'Koronadal City', 'Male', 'College 3rd Year', 'Widowed', 'Other', 'Other', 'Freelancing', 'No Income', '029182917677', 'Sa', NULL, NULL, NULL, NULL, 'Wood', '51-100', 'Apartment', '9', '[\"Refrigerator\"]', '', '35,000 PHP - 40,000 PHP', 'House Owner', NULL, NULL, 'Re-access', NULL, NULL, NULL, 'APL 0000003', NULL, '[\"Financial\",\"Funeral\",\"Funeral Contract.\",\"Death Certificate.\",\"Valid ID\",\"Residence Certificate Or Barangay Clearance\",\"Clinical Abstract\\/medical Certificate\",\"Police Report Or Incident Report\",\"Funeral Contract And Registered Death Certificate. (if Applicable)\",\"Poverty Alleviation Program = Valid ID\",\"Residence Certificate\",\"Income Certificate\",\"Refrigerator\"]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-14 20:36:49', '2024-09-17 01:13:51', '1103', 'Morato', 'QC'),
(7, 'A', 'A', 'A', 'Jr.', '21', '2024-10-10', 'Koronadal City', 'Male', 'College 3rd Year', 'Divorced', 'Other', 'Other', 'Freelancing', '100 PHP - 500 PHP', '029182917677', 'Ok', NULL, NULL, NULL, NULL, 'Wood', '101-150', 'Single-Family Home', '8', '[\"Refrigerator\"]', '', '35,000 PHP - 40,000 PHP', 'House Renter', NULL, NULL, NULL, NULL, NULL, NULL, 'APL 0000004', NULL, '[\"Refrigerator\"]', '[]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-17 01:02:38', '2024-09-17 01:08:10', 'Md1 Apartment', 'PMCO Village', 'Magsaysay');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_members`
--

CREATE TABLE `family_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `fam_lastname` varchar(255) DEFAULT NULL,
  `fam_firstname` varchar(255) DEFAULT NULL,
  `fam_middlename` varchar(255) DEFAULT NULL,
  `fam_relationship` varchar(255) DEFAULT NULL,
  `fam_birthday` date DEFAULT NULL,
  `fam_age` int(11) DEFAULT NULL,
  `fam_gender` varchar(255) DEFAULT NULL,
  `fam_status` varchar(255) DEFAULT NULL,
  `fam_education` varchar(255) DEFAULT NULL,
  `fam_occupation` varchar(255) DEFAULT NULL,
  `fam_income` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_members`
--

INSERT INTO `family_members` (`id`, `client_id`, `fam_lastname`, `fam_firstname`, `fam_middlename`, `fam_relationship`, `fam_birthday`, `fam_age`, `fam_gender`, `fam_status`, `fam_education`, `fam_occupation`, `fam_income`, `created_at`, `updated_at`) VALUES
(1, 1, 'Zolina', 'Joncena', 'Rata', 'Sibling', '2005-11-13', 18, 'Male', 'Single', 'Senior High School', 'Student', 0.00, '2024-09-13 23:35:00', '2024-09-13 23:40:07'),
(2, 1, 'Saloga', 'Rhodora', 'Rata', 'Parent', '1972-08-12', 32, 'Female', 'Separated', 'High School', 'OFW', 20000.00, '2024-09-13 23:36:04', '2024-09-13 23:36:04'),
(3, 2, 'Agustin', 'Luis', 'Mercado', 'Relative', '2024-09-12', 21, 'Male', 'Married', 'Senior High School', 'OFW', 40000.00, '2024-09-13 23:36:40', '2024-09-13 23:36:40'),
(4, 2, 'Mercado', 'Reynaldo', 'Agustin', 'Relative', '2024-09-11', 18, 'Male', 'Single', 'Senior High School', 'OFW', 50000.00, '2024-09-13 23:37:19', '2024-09-13 23:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '2024_03_25_030544_create_failed_jobs_table', 1),
(4, '2024_08_21_054439_create_clients_table', 1),
(5, '2024_08_21_054756_update_clients_table', 1),
(6, '2024_09_01_125351_create_family_members_table', 1),
(7, '2024_09_17_085323_add_address_fields_to_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('qsGTMXtuKRbUHf4NvFqLyZxTUU9TRMjAORrhTYly', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUkFHVVFZRWtPQnYwUDhNeWdHVVpYSlZFakFnZjZBMW0wajVDUksyUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC92aWV3LW9uZ29pbmctY2xpZW50cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzI2NTY1MjI3O319', 1726565329);

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
  `role` varchar(255) NOT NULL DEFAULT 'social-worker',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Social Worker', 'socialworker@gmail.com', NULL, '$2y$12$9jYejAZ3lvYJdjJdB9yX1OdQPSFR7d8GVPPSAg2AtM4EB9Q2mG1gm', 'social-worker', NULL, '2024-09-13 23:31:32', '2024-09-13 23:31:32'),
(2, 'Social Worker 2', 'socialworker2@gmail.com', NULL, '$2y$12$fdEDpT9MZiSgEVDM/06TW.f6KcWiM8nnxyaIQpTixsVBkNYvZfBJG', 'social-worker', NULL, '2024-09-14 04:33:54', '2024-09-14 04:33:54'),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$12$rp9i.0jVfSMBLYPWV1KuS.tAgAqCK7Hdczx7yNRJSwXUgb05RHPAC', 'admin', NULL, '2024-09-15 04:45:32', '2024-09-15 04:45:32');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `family_members`
--
ALTER TABLE `family_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `family_members_client_id_foreign` (`client_id`);

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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_members`
--
ALTER TABLE `family_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `family_members`
--
ALTER TABLE `family_members`
  ADD CONSTRAINT `family_members_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
