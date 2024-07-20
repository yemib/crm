-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2024 at 04:35 AM
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
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(191) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` text DEFAULT NULL,
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'New Customer created.', 'itwtech Customer created.', 'App\\Models\\Customer', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-04-20 12:32:07', '2023-04-20 12:32:07'),
(3, 'New Country created.', 'Malta Country created.', 'App\\Models\\Country', 10, 'App\\Models\\User', 1, '[]', NULL, '2023-06-19 15:25:07', '2023-06-19 15:25:07'),
(4, 'New Tax Rate created.', 'Def Tax Rate created.', 'App\\Models\\TaxRate', 7, 'App\\Models\\User', 1, '[]', NULL, '2023-06-19 15:26:43', '2023-06-19 15:26:43'),
(5, 'Tax Rate deleted.', 'Madera Tax Rate deleted.', 'App\\Models\\TaxRate', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 11:11:38', '2023-06-20 11:11:38'),
(6, 'Tax Rate deleted.', 'County Tax Rate deleted.', 'App\\Models\\TaxRate', 6, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 11:11:50', '2023-06-20 11:11:50'),
(8, 'New Customer created.', 'TESTING Customer created.', 'App\\Models\\Customer', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 11:53:05', '2023-06-20 11:53:05'),
(9, 'New Customer Group created.', 'Govenment Organizations Customer Group created.', 'App\\Models\\CustomerGroup', 6, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 11:58:43', '2023-06-20 11:58:43'),
(10, 'New Customer Group created.', 'Third Part Organizations Customer Group created.', 'App\\Models\\CustomerGroup', 7, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 11:59:08', '2023-06-20 11:59:08'),
(11, 'New Customer created.', 'Parliament Malta Customer created.', 'App\\Models\\Customer', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:00:07', '2023-06-20 12:00:07'),
(12, 'Customer Group deleted.', 'High Budget Customer Group deleted.', 'App\\Models\\CustomerGroup', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:00:41', '2023-06-20 12:00:41'),
(13, 'Customer Group deleted.', 'Low Budget Customer Group deleted.', 'App\\Models\\CustomerGroup', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:00:46', '2023-06-20 12:00:46'),
(14, 'Customer Group deleted.', 'Wholesaler Customer Group deleted.', 'App\\Models\\CustomerGroup', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:00:50', '2023-06-20 12:00:50'),
(15, 'Customer Group deleted.', 'Wisoky-Robel Customer Group deleted.', 'App\\Models\\CustomerGroup', 5, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:00:55', '2023-06-20 12:00:55'),
(16, 'New Lead created.', 'JOE DOE Lead created.', 'App\\Models\\Lead', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:04:00', '2023-06-20 12:04:00'),
(17, 'Lead updated.', 'JOE DOE Lead updated.', 'App\\Models\\Lead', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:07:04', '2023-06-20 12:07:04'),
(18, 'Tax Rate deleted.', 'Agxm Tax Rate deleted.', 'App\\Models\\TaxRate', 5, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:11:57', '2023-06-20 12:11:57'),
(19, 'Tax Rate deleted.', 'Fernado Tax Rate deleted.', 'App\\Models\\TaxRate', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:12:02', '2023-06-20 12:12:02'),
(20, 'Tax Rate deleted.', 'Agow Tax Rate deleted.', 'App\\Models\\TaxRate', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:12:11', '2023-06-20 12:12:11'),
(21, 'Tax Rate updated.', 'Non-Taxable Tax Rate updated.', 'App\\Models\\TaxRate', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:12:31', '2023-06-20 12:12:31'),
(22, 'Tax Rate updated.', 'Taxable Tax Rate updated.', 'App\\Models\\TaxRate', 7, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:12:50', '2023-06-20 12:12:50'),
(23, 'New Product Group created.', 'AIRCONDITIONING Product Group created.', 'App\\Models\\ProductGroup', 7, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:14:51', '2023-06-20 12:14:51'),
(24, 'New Product created.', 'AIRCONDITION A123 Product created.', 'App\\Models\\Product', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:15:14', '2023-06-20 12:15:14'),
(25, 'Product Group deleted.', 'USB Stick Product Group deleted.', 'App\\Models\\ProductGroup', 6, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:16:04', '2023-06-20 12:16:04'),
(26, 'Product Group deleted.', 'SEO Optimization Product Group deleted.', 'App\\Models\\ProductGroup', 5, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:16:08', '2023-06-20 12:16:08'),
(27, 'Product Group deleted.', 'Marketing Services Product Group deleted.', 'App\\Models\\ProductGroup', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:16:12', '2023-06-20 12:16:12'),
(28, 'Product Group deleted.', 'MacBook Pro Product Group deleted.', 'App\\Models\\ProductGroup', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:16:17', '2023-06-20 12:16:17'),
(29, 'Product Group updated.', 'Servicing Product Group updated.', 'App\\Models\\ProductGroup', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:16:50', '2023-06-20 12:16:50'),
(30, 'Product Group updated.', 'Consultant Services Product Group updated.', 'App\\Models\\ProductGroup', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:17:00', '2023-06-20 12:17:00'),
(31, 'New Member created.', 'Joe  Member created.', 'App\\Models\\User', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:30:06', '2023-06-20 12:30:06'),
(32, 'Member deleted.', 'Joe  Member deleted.', 'App\\Models\\User', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:30:33', '2023-06-20 12:30:33'),
(34, 'New Member created.', 'Jake Borg Member created.', 'App\\Models\\User', 6, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:32:54', '2023-06-20 12:32:54'),
(35, 'Member updated.', 'Jake Borg Member updated.', 'App\\Models\\User', 6, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:33:37', '2023-06-20 12:33:37'),
(36, 'Member updated.', 'Jake Borg Member updated.', 'App\\Models\\User', 6, 'App\\Models\\User', 1, '[]', NULL, '2023-06-20 12:34:15', '2023-06-20 12:34:15'),
(38, 'New Member created.', 'Joe Doe Member created.', 'App\\Models\\User', 8, 'App\\Models\\User', 6, '[]', NULL, '2023-06-20 12:49:27', '2023-06-20 12:49:27'),
(39, 'Member updated.', 'Joe Doe Member updated.', 'App\\Models\\User', 8, 'App\\Models\\User', 6, '[]', NULL, '2023-06-20 12:49:45', '2023-06-20 12:49:45'),
(40, 'Member updated.', 'Joe Doe Member updated.', 'App\\Models\\User', 8, 'App\\Models\\User', 6, '[]', NULL, '2023-06-20 12:51:02', '2023-06-20 12:51:02'),
(41, 'Member updated.', 'Jake Borg Member updated.', 'App\\Models\\User', 6, 'App\\Models\\User', 6, '[]', NULL, '2023-06-20 13:00:39', '2023-06-20 13:00:39'),
(42, 'Member updated.', 'Jake Borg Member updated.', 'App\\Models\\User', 6, 'App\\Models\\User', 6, '[]', NULL, '2023-06-20 13:05:21', '2023-06-20 13:05:21'),
(43, 'New Member created.', 'Emmanuel Obafemi Member created.', 'App\\Models\\User', 9, 'App\\Models\\User', 1, '[]', NULL, '2023-06-21 12:43:07', '2023-06-21 12:43:07'),
(44, 'New Customer created.', 'olotoglobal foundation Customer created.', 'App\\Models\\Customer', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-06-21 12:46:42', '2023-06-21 12:46:42'),
(45, 'New Member created.', 'Cutrico Admin Member created.', 'App\\Models\\User', 10, 'App\\Models\\User', 1, '[]', NULL, '2023-06-26 11:57:10', '2023-06-26 11:57:10'),
(46, 'Member updated.', 'Cutrico Admin Member updated.', 'App\\Models\\User', 10, 'App\\Models\\User', 1, '[]', NULL, '2023-06-26 11:59:26', '2023-06-26 11:59:26'),
(47, 'New Contact created.', 'Charles Contact created.', 'App\\Models\\Contact', 1, 'App\\Models\\User', 10, '[]', NULL, '2023-06-26 12:41:00', '2023-06-26 12:41:00'),
(48, 'New Project created.', 'Replacements of Ac in administration room Project created.', 'App\\Models\\Project', 1, 'App\\Models\\User', 10, '[]', NULL, '2023-06-26 12:43:44', '2023-06-26 12:43:44'),
(49, 'New Estimate created.', 'hyhy Estimate created.', 'App\\Models\\Estimate', 1, 'App\\Models\\User', 10, '[]', NULL, '2023-06-26 13:06:04', '2023-06-26 13:06:04'),
(50, 'New Product created.', 'Labour Work Product created.', 'App\\Models\\Product', 2, 'App\\Models\\User', 10, '[]', NULL, '2023-06-26 13:09:19', '2023-06-26 13:09:19'),
(51, 'New Department created.', 'After Sales Department created.', 'App\\Models\\Department', 7, 'App\\Models\\User', 1, '[]', NULL, '2023-06-27 05:14:39', '2023-06-27 05:14:39'),
(52, 'New Expense Category created.', 'Test Expense Category created.', 'App\\Models\\ExpenseCategory', 13, 'App\\Models\\User', 1, '[]', NULL, '2023-06-27 05:15:01', '2023-06-27 05:15:01'),
(53, 'Customer updated.', 'Parliament Malta Customer updated.', 'App\\Models\\Customer', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-06-27 05:16:13', '2023-06-27 05:16:13'),
(54, 'Contact deleted.', 'Charles Contact deleted.', 'App\\Models\\Contact', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-06-27 13:31:49', '2023-06-27 13:31:49'),
(55, 'New Contact created.', 'Charles Contact created.', 'App\\Models\\Contact', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-06-27 13:34:21', '2023-06-27 13:34:21'),
(56, 'New Invoice created.', 'Installation of AC Invoice created.', 'App\\Models\\Invoice', 1, 'App\\Models\\User', 10, '[]', NULL, '2023-06-27 13:37:58', '2023-06-27 13:37:58'),
(57, 'Service deleted.', 'Acting ability Service deleted.', 'App\\Models\\Service', 13, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:21:08', '2023-06-28 05:21:08'),
(58, 'Service deleted.', 'Adaptability Service deleted.', 'App\\Models\\Service', 10, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:21:12', '2023-06-28 05:21:12'),
(59, 'Service deleted.', 'Attentiveness Service deleted.', 'App\\Models\\Service', 11, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:21:16', '2023-06-28 05:21:16'),
(60, 'Service deleted.', 'Communication skills Service deleted.', 'App\\Models\\Service', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:21:20', '2023-06-28 05:21:20'),
(61, 'Service deleted.', 'Confidence Service deleted.', 'App\\Models\\Service', 8, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:21:29', '2023-06-28 05:21:29'),
(62, 'Service deleted.', 'Empathy Service deleted.', 'App\\Models\\Service', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:21:33', '2023-06-28 05:21:33'),
(63, 'Service deleted.', 'Listening skills Service deleted.', 'App\\Models\\Service', 9, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:21:37', '2023-06-28 05:21:37'),
(64, 'Service updated.', 'Replacement of Outdoor Unit Service updated.', 'App\\Models\\Service', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:21:56', '2023-06-28 05:21:56'),
(65, 'Service deleted.', 'Replacement of Outdoor Unit Service deleted.', 'App\\Models\\Service', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:23:23', '2023-06-28 05:23:23'),
(66, 'Service deleted.', 'Professionalism Service deleted.', 'App\\Models\\Service', 12, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:23:27', '2023-06-28 05:23:27'),
(67, 'Service deleted.', 'Product knowledge Service deleted.', 'App\\Models\\Service', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:23:30', '2023-06-28 05:23:30'),
(68, 'Service deleted.', 'Positive language Service deleted.', 'App\\Models\\Service', 6, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:23:34', '2023-06-28 05:23:34'),
(69, 'Service deleted.', 'Positive attitude Service deleted.', 'App\\Models\\Service', 5, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:23:38', '2023-06-28 05:23:38'),
(70, 'Service deleted.', 'Personal responsibility Service deleted.', 'App\\Models\\Service', 7, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:23:42', '2023-06-28 05:23:42'),
(71, 'Contract Type deleted.', 'Adhesion Contracts Contract Type deleted.', 'App\\Models\\ContractType', 7, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:24:10', '2023-06-28 05:24:10'),
(72, 'Contract Type deleted.', 'Aleatory Contracts Contract Type deleted.', 'App\\Models\\ContractType', 8, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:24:14', '2023-06-28 05:24:14'),
(73, 'Contract Type deleted.', 'Bilateral and Unilateral Contracts Contract Type deleted.', 'App\\Models\\ContractType', 5, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:24:18', '2023-06-28 05:24:18'),
(74, 'Contract Type deleted.', 'Contract under Seal Contract Type deleted.', 'App\\Models\\ContractType', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:24:25', '2023-06-28 05:24:25'),
(75, 'Contract Type deleted.', 'Executed and Executory Contracts Contract Type deleted.', 'App\\Models\\ContractType', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:24:29', '2023-06-28 05:24:29'),
(76, 'Contract Type deleted.', 'Express Contracts Contract Type deleted.', 'App\\Models\\ContractType', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:24:34', '2023-06-28 05:24:34'),
(77, 'Contract Type deleted.', 'Implied Contracts Contract Type deleted.', 'App\\Models\\ContractType', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:24:38', '2023-06-28 05:24:38'),
(78, 'Contract Type deleted.', 'Unconscionable Contracts Contract Type deleted.', 'App\\Models\\ContractType', 6, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:24:44', '2023-06-28 05:24:44'),
(79, 'Contract Type updated.', 'Test Type Contract Type updated.', 'App\\Models\\ContractType', 9, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:24:58', '2023-06-28 05:24:58'),
(80, 'New Contract created.', 'Test 1 Contract created.', 'App\\Models\\Contract', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:26:27', '2023-06-28 05:26:27'),
(81, 'Member deleted.', 'Joe Doe Member deleted.', 'App\\Models\\User', 8, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:55:52', '2023-06-28 05:55:52'),
(82, 'New Member created.', 'Joe Borg Member created.', 'App\\Models\\User', 13, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:56:55', '2023-06-28 05:56:55'),
(83, 'Member updated.', 'Joe Borg Member updated.', 'App\\Models\\User', 13, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:57:57', '2023-06-28 05:57:57'),
(84, 'Member updated.', 'Joe Borg Member updated.', 'App\\Models\\User', 13, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 05:59:02', '2023-06-28 05:59:02'),
(85, 'Project updated.', 'Replacements of Ac in administration room Project updated.', 'App\\Models\\Project', 1, 'App\\Models\\User', 13, '[]', NULL, '2023-06-28 06:01:15', '2023-06-28 06:01:15'),
(86, 'New Ticket created.', 'Water leaking from Ac indoor unit Ticket created.', 'App\\Models\\Ticket', 1, 'App\\Models\\User', 12, '[]', NULL, '2023-06-28 06:03:03', '2023-06-28 06:03:03'),
(87, 'Member deleted.', 'Jake Borg Member deleted.', 'App\\Models\\User', 6, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 06:17:41', '2023-06-28 06:17:41'),
(88, 'Member updated.', 'Cutrico Admin Member updated.', 'App\\Models\\User', 10, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 06:18:08', '2023-06-28 06:18:08'),
(89, 'Member updated.', 'Emmanuel Obafemi Member updated.', 'App\\Models\\User', 9, 'App\\Models\\User', 1, '[]', NULL, '2023-06-28 08:22:15', '2023-06-28 08:22:15'),
(90, 'Country updated.', 'Gozo Country updated.', 'App\\Models\\Country', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-06-29 05:36:31', '2023-06-29 05:36:31'),
(91, 'New Announcement created.', 'new Announcement created.', 'App\\Models\\Announcement', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-06-29 05:56:20', '2023-06-29 05:56:20'),
(92, 'Customer updated.', 'olotoglobal foundation Customer updated.', 'App\\Models\\Customer', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-06-29 06:02:25', '2023-06-29 06:02:25'),
(93, 'New Service created.', ' Service created.', 'App\\Models\\Warranty', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-07-05 10:25:38', '2023-07-05 10:25:38'),
(94, 'New Service created.', ' Service created.', 'App\\Models\\Warranty', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-07-05 10:26:17', '2023-07-05 10:26:17'),
(95, 'Service deleted.', '12345678 Service deleted.', 'App\\Models\\Warranty', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-07-05 12:45:12', '2023-07-05 12:45:12'),
(96, 'New Service created.', ' Service created.', 'App\\Models\\Warranty', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-07-06 05:55:46', '2023-07-06 05:55:46'),
(97, 'New Warranty Product created.', '1 Warranty Product  created.', 'App\\Models\\ProductWarranty', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-07-06 05:56:30', '2023-07-06 05:56:30'),
(98, 'Warranty updated.', ' Warranty updated.', 'App\\Models\\ProductWarranty', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-07-06 05:56:39', '2023-07-06 05:56:39'),
(99, 'New Service created.', ' Service created.', 'App\\Models\\Warranty', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-07-06 05:57:08', '2023-07-06 05:57:08'),
(100, 'New Service created.', ' Service created.', 'App\\Models\\Warranty', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-07-11 03:03:38', '2023-07-11 03:03:38'),
(101, 'New Warranty Product created.', '2 Warranty Product  created.', 'App\\Models\\ProductWarranty', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-07-11 03:04:27', '2023-07-11 03:04:27'),
(102, 'New Service created.', ' Service created.', 'App\\Models\\Warranty', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-07-11 07:22:02', '2023-07-11 07:22:02'),
(103, 'New Service created.', ' Service created.', 'App\\Models\\Job', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-08-01 04:06:34', '2023-08-01 04:06:34'),
(104, 'New Service created.', ' Service created.', 'App\\Models\\Job', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-08-02 04:52:33', '2023-08-02 04:52:33'),
(105, 'New Invoice created.', 'add Invoice created.', 'App\\Models\\Invoice', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-08-02 05:01:27', '2023-08-02 05:01:27'),
(106, 'New Service created.', ' Service created.', 'App\\Models\\Job', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-08-02 05:39:25', '2023-08-02 05:39:25'),
(107, 'New Announcement created.', 'testing Announcement created.', 'App\\Models\\Announcement', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-08-02 05:49:30', '2023-08-02 05:49:30'),
(108, 'Service updated.', '1 Service updated.', 'App\\Models\\jobreminder', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-08-03 05:05:17', '2023-08-03 05:05:17'),
(109, 'Service updated.', ' Service updated.', 'App\\Models\\Job', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-08-03 05:38:52', '2023-08-03 05:38:52'),
(110, 'New Service created.', ' Service created.', 'App\\Models\\Job', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-08-03 05:39:24', '2023-08-03 05:39:24'),
(111, 'Service updated.', ' Service updated.', 'App\\Models\\Job', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-08-03 05:40:07', '2023-08-03 05:40:07'),
(112, 'New Service created.', ' Service created.', 'App\\Models\\Job', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-08-28 06:35:07', '2023-08-28 06:35:07'),
(113, 'New Warranty Product created.', '3 Warranty Product  created.', 'App\\Models\\ProductWarranty', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-08-31 11:20:05', '2023-08-31 11:20:05'),
(114, 'Service deleted.', ' Warranty Product deleted.', 'App\\Models\\ProductWarranty', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-08-31 11:20:10', '2023-08-31 11:20:10'),
(115, 'Member updated.', 'Joe Borg Member updated.', 'App\\Models\\User', 13, 'App\\Models\\User', 1, '[]', NULL, '2023-09-13 04:18:06', '2023-09-13 04:18:06'),
(116, 'Invoice updated.', 'Installation of AC Invoice updated.', 'App\\Models\\Invoice', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-09-13 04:21:51', '2023-09-13 04:21:51'),
(117, 'Member updated.', 'Emmanuel Obafemi Member updated.', 'App\\Models\\User', 9, 'App\\Models\\User', 1, '[]', NULL, '2023-09-13 04:23:17', '2023-09-13 04:23:17'),
(118, 'Member updated.', 'Emmanuel Obafemi Member updated.', 'App\\Models\\User', 9, 'App\\Models\\User', 1, '[]', NULL, '2023-09-13 04:24:46', '2023-09-13 04:24:46'),
(119, 'New Service created.', ' Service created.', 'App\\Models\\Warranty', 5, 'App\\Models\\User', 1, '[]', NULL, '2023-09-13 04:30:15', '2023-09-13 04:30:15'),
(120, 'New Warranty Product created.', '4 Warranty Product  created.', 'App\\Models\\ProductWarranty', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-09-13 04:30:51', '2023-09-13 04:30:51'),
(121, 'Member updated.', 'Emmanuel Obafemi Member updated.', 'App\\Models\\User', 9, 'App\\Models\\User', 1, '[]', NULL, '2023-09-13 04:43:58', '2023-09-13 04:43:58'),
(122, 'Member updated.', 'Emmanuel Obafemi Member updated.', 'App\\Models\\User', 9, 'App\\Models\\User', 1, '[]', NULL, '2023-09-13 05:06:51', '2023-09-13 05:06:51'),
(123, 'New Invoice created.', 'new Invoice created.', 'App\\Models\\Invoice', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-09-13 06:33:05', '2023-09-13 06:33:05'),
(124, 'New Project created.', 'Test A Project created.', 'App\\Models\\Project', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-09-18 12:36:53', '2023-09-18 12:36:53'),
(125, 'New Invoice created.', 'Test A Invoice created.', 'App\\Models\\Invoice', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-09-18 12:38:40', '2023-09-18 12:38:40'),
(126, 'Member updated.', 'Super Admin Member updated.', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-09-18 12:44:43', '2023-09-18 12:44:43'),
(127, 'Invoice deleted.', 'Test A Invoice deleted.', 'App\\Models\\Invoice', 4, 'App\\Models\\User', 13, '[]', NULL, '2023-09-18 12:54:30', '2023-09-18 12:54:30'),
(128, 'New Member created.', 'Bob Vella Member created.', 'App\\Models\\User', 14, 'App\\Models\\User', 1, '[]', NULL, '2023-09-18 12:56:34', '2023-09-18 12:56:34'),
(129, 'Member updated.', 'Cutrico Admin Member updated.', 'App\\Models\\User', 10, 'App\\Models\\User', 1, '[]', NULL, '2023-09-18 13:06:55', '2023-09-18 13:06:55'),
(130, 'Invoice updated.', 'new Invoice updated.', 'App\\Models\\Invoice', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-09-18 13:07:35', '2023-09-18 13:07:35'),
(131, 'Member updated.', 'Bob Vella Member updated.', 'App\\Models\\User', 14, 'App\\Models\\User', 1, '[]', NULL, '2023-09-18 13:09:44', '2023-09-18 13:09:44'),
(132, 'New Member created.', 'ADMIN Cutrico Member created.', 'App\\Models\\User', 15, 'App\\Models\\User', 1, '[]', NULL, '2023-09-19 10:58:37', '2023-09-19 10:58:37'),
(133, 'New Member created.', 'SALES-AGENT CUTICO Member created.', 'App\\Models\\User', 16, 'App\\Models\\User', 15, '[]', NULL, '2023-09-19 11:04:50', '2023-09-19 11:04:50'),
(134, 'New Member created.', 'INSTALLER Cutrico Member created.', 'App\\Models\\User', 17, 'App\\Models\\User', 15, '[]', NULL, '2023-09-19 11:06:27', '2023-09-19 11:06:27'),
(135, 'Invoice deleted.', 'new Invoice deleted.', 'App\\Models\\Invoice', 3, 'App\\Models\\User', 15, '[]', NULL, '2023-09-19 11:42:48', '2023-09-19 11:42:48'),
(136, 'Invoice deleted.', 'add Invoice deleted.', 'App\\Models\\Invoice', 2, 'App\\Models\\User', 15, '[]', NULL, '2023-09-19 11:42:51', '2023-09-19 11:42:51'),
(137, 'Invoice deleted.', 'Installation of AC Invoice deleted.', 'App\\Models\\Invoice', 1, 'App\\Models\\User', 15, '[]', NULL, '2023-09-19 11:42:54', '2023-09-19 11:42:54'),
(138, 'New Payment Mode created.', 'Credit Card Payment Mode created.', 'App\\Models\\PaymentMode', 4, 'App\\Models\\User', 15, '[]', NULL, '2023-09-19 11:43:37', '2023-09-19 11:43:37'),
(139, 'New Invoice created.', 'Installation of AC Units Invoice created.', 'App\\Models\\Invoice', 5, 'App\\Models\\User', 15, '[]', NULL, '2023-09-19 11:44:52', '2023-09-19 11:44:52'),
(140, 'Project deleted.', 'Replacements of Ac in administration room Project deleted.', 'App\\Models\\Project', 1, 'App\\Models\\User', 15, '[]', NULL, '2023-09-19 11:45:41', '2023-09-19 11:45:41'),
(141, 'Project deleted.', 'Test A Project deleted.', 'App\\Models\\Project', 2, 'App\\Models\\User', 15, '[]', NULL, '2023-09-19 11:45:49', '2023-09-19 11:45:49'),
(142, 'Payment success.', 'Credit Card Payment success.', 'App\\Models\\Payment', 1, 'App\\Models\\User', 15, '[]', NULL, '2023-09-19 11:46:58', '2023-09-19 11:46:58'),
(143, 'Service deleted.', '85455656 Service deleted.', 'App\\Models\\Warranty', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-09-19 12:17:36', '2023-09-19 12:17:36'),
(144, 'Service deleted.', '123456 Service deleted.', 'App\\Models\\Warranty', 2, 'App\\Models\\User', 1, '[]', NULL, '2023-09-19 12:17:40', '2023-09-19 12:17:40'),
(145, 'Service deleted.', '12345 Service deleted.', 'App\\Models\\Warranty', 1, 'App\\Models\\User', 1, '[]', NULL, '2023-09-19 12:17:51', '2023-09-19 12:17:51'),
(146, 'Service deleted.', '876543 Service deleted.', 'App\\Models\\Warranty', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-09-19 12:17:54', '2023-09-19 12:17:54'),
(147, 'Service deleted.', '1235486468456 Service deleted.', 'App\\Models\\Warranty', 5, 'App\\Models\\User', 1, '[]', NULL, '2023-09-19 12:17:58', '2023-09-19 12:17:58'),
(148, 'New Product created.', 'Compressor UNIT Product created.', 'App\\Models\\Product', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-09-19 12:22:43', '2023-09-19 12:22:43'),
(149, 'Member updated.', 'Emmanuel Obafemi Member updated.', 'App\\Models\\User', 9, 'App\\Models\\User', 1, '[]', NULL, '2023-09-20 07:21:15', '2023-09-20 07:21:15'),
(150, 'New Project created.', '~Test Project created.', 'App\\Models\\Project', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-09-27 13:14:47', '2023-09-27 13:14:47'),
(151, 'New Invoice created.', 'Test Invoice created.', 'App\\Models\\Invoice', 6, 'App\\Models\\User', 1, '[]', NULL, '2023-09-27 13:15:59', '2023-09-27 13:15:59'),
(152, 'Invoice deleted.', 'Test Invoice deleted.', 'App\\Models\\Invoice', 6, 'App\\Models\\User', 16, '[]', NULL, '2023-10-02 10:53:03', '2023-10-02 10:53:03'),
(153, 'New Invoice created.', 'Testing Bill system Invoice created.', 'App\\Models\\Invoice', 7, 'App\\Models\\User', 16, '[]', NULL, '2023-10-02 10:55:09', '2023-10-02 10:55:09'),
(154, 'Invoice updated.', 'Testing Bill system Invoice updated.', 'App\\Models\\Invoice', 7, 'App\\Models\\User', 16, '[]', NULL, '2023-10-02 11:07:57', '2023-10-02 11:07:57'),
(155, 'Member updated.', 'SALES-AGENT CUTICO Member updated.', 'App\\Models\\User', 16, 'App\\Models\\User', 15, '[]', NULL, '2023-10-02 12:17:19', '2023-10-02 12:17:19'),
(156, 'New Customer created.', 'Testing Customer Customer created.', 'App\\Models\\Customer', 5, 'App\\Models\\User', 16, '[]', NULL, '2023-10-02 12:18:53', '2023-10-02 12:18:53'),
(157, 'Member updated.', 'Joe Borg Member updated.', 'App\\Models\\User', 13, 'App\\Models\\User', 1, '[]', NULL, '2023-10-16 07:15:25', '2023-10-16 07:15:25'),
(158, 'Project updated.', '~Test Project updated.', 'App\\Models\\Project', 3, 'App\\Models\\User', 15, '[]', NULL, '2023-10-17 04:51:05', '2023-10-17 04:51:05'),
(159, 'Member updated.', 'ADMIN Cutrico Member updated.', 'App\\Models\\User', 15, 'App\\Models\\User', 1, '[]', NULL, '2023-10-23 09:54:32', '2023-10-23 09:54:32'),
(160, 'Project deleted.', '~Test Project deleted.', 'App\\Models\\Project', 3, 'App\\Models\\User', 1, '[]', NULL, '2023-10-23 10:58:32', '2023-10-23 10:58:32'),
(161, 'New Customer created.', 'MUSCAT GROUP Customer created.', 'App\\Models\\Customer', 6, 'App\\Models\\User', 1, '[]', NULL, '2023-10-23 11:00:16', '2023-10-23 11:00:16'),
(162, 'New Invoice created.', 'INSTALLATION OF AC Invoice created.', 'App\\Models\\Invoice', 8, 'App\\Models\\User', 1, '[]', NULL, '2023-10-23 11:04:58', '2023-10-23 11:04:58'),
(163, 'Invoice updated.', 'INSTALLATION OF AC Invoice updated.', 'App\\Models\\Invoice', 8, 'App\\Models\\User', 1, '[]', NULL, '2023-10-23 11:15:24', '2023-10-23 11:15:24'),
(164, 'Member updated.', 'INSTALLER Cutrico Member updated.', 'App\\Models\\User', 17, 'App\\Models\\User', 1, '[]', NULL, '2023-10-23 11:34:48', '2023-10-23 11:34:48'),
(166, 'New Member created.', 'Cutricotestingcrm  Member created.', 'App\\Models\\User', 19, 'App\\Models\\User', 1, '[]', NULL, '2023-10-23 11:45:30', '2023-10-23 11:45:30'),
(167, 'Member updated.', 'Cutricotestingcrm  Member updated.', 'App\\Models\\User', 19, 'App\\Models\\User', 1, '[]', NULL, '2023-10-23 11:45:48', '2023-10-23 11:45:48'),
(168, 'Member updated.', 'Joe Borg Member updated.', 'App\\Models\\User', 13, 'App\\Models\\User', 1, '[]', NULL, '2023-10-25 14:28:26', '2023-10-25 14:28:26'),
(169, 'Member deleted.', 'Cutricotestingcrm  Member deleted.', 'App\\Models\\User', 19, 'App\\Models\\User', 1, '[]', NULL, '2023-11-20 11:26:34', '2023-11-20 11:26:34'),
(171, 'New Product created.', 'Toshiba SEIYA indoor &amp; outdoor 10,000 BTUs installed Product created.', 'App\\Models\\Product', 4, 'App\\Models\\User', 1, '[]', NULL, '2023-12-01 13:20:12', '2023-12-01 13:20:12'),
(172, 'Member updated.', 'ADMIN Cutrico Member updated.', 'App\\Models\\User', 15, 'App\\Models\\User', 1, '[]', NULL, '2023-12-01 13:25:17', '2023-12-01 13:25:17'),
(173, 'New Member created.', 'Emmanuel Obafemi Member created.', 'App\\Models\\User', 21, 'App\\Models\\User', 1, '[]', NULL, '2023-12-03 13:18:31', '2023-12-03 13:18:31'),
(174, 'Member deleted.', 'Emmanuel Obafemi Member deleted.', 'App\\Models\\User', 21, 'App\\Models\\User', 1, '[]', NULL, '2023-12-03 15:17:07', '2023-12-03 15:17:07'),
(175, 'New Member created.', 'Emmanuel Obafemi Member created.', 'App\\Models\\User', 22, 'App\\Models\\User', 1, '[]', NULL, '2023-12-03 15:17:56', '2023-12-03 15:17:56'),
(176, 'Member updated.', 'Emmanuel Obafemi Member updated.', 'App\\Models\\User', 22, 'App\\Models\\User', 1, '[]', NULL, '2023-12-03 15:23:31', '2023-12-03 15:23:31'),
(177, 'Member deleted.', 'Emmanuel Obafemi Member deleted.', 'App\\Models\\User', 22, 'App\\Models\\User', 1, '[]', NULL, '2023-12-03 15:25:41', '2023-12-03 15:25:41'),
(178, 'New Member created.', 'Emmanuel Obafemi Member created.', 'App\\Models\\User', 23, 'App\\Models\\User', 1, '[]', NULL, '2023-12-03 15:26:43', '2023-12-03 15:26:43'),
(179, 'Member updated.', 'Emmanuel Obafemi Member updated.', 'App\\Models\\User', 9, 'App\\Models\\User', 1, '[]', NULL, '2023-12-04 01:11:42', '2023-12-04 01:11:42'),
(180, 'Member deleted.', 'Emmanuel Obafemi Member deleted.', 'App\\Models\\User', 23, 'App\\Models\\User', 1, '[]', NULL, '2023-12-04 01:13:15', '2023-12-04 01:13:15'),
(181, 'Member updated.', 'ADMIN Cutrico Member updated.', 'App\\Models\\User', 15, 'App\\Models\\User', 10, '[]', NULL, '2024-01-08 12:04:06', '2024-01-08 12:04:06'),
(182, 'Member updated.', 'ADMIN Cutrico Member updated.', 'App\\Models\\User', 15, 'App\\Models\\User', 1, '[]', NULL, '2024-01-08 12:05:24', '2024-01-08 12:05:24'),
(183, 'Member updated.', 'SALES-AGENT CUTICO Member updated.', 'App\\Models\\User', 16, 'App\\Models\\User', 10, '[]', NULL, '2024-01-08 12:16:27', '2024-01-08 12:16:27'),
(184, 'New Product created.', 'Toshiba SEIYA indoor &amp; outdoor 13,000 BTUs installed Product created.', 'App\\Models\\Product', 5, 'App\\Models\\User', 16, '[]', NULL, '2024-01-08 12:21:45', '2024-01-08 12:21:45'),
(185, 'Member updated.', 'Cutrico Admin Member updated.', 'App\\Models\\User', 10, 'App\\Models\\User', 1, '[]', NULL, '2024-01-08 12:24:21', '2024-01-08 12:24:21'),
(186, 'Member updated.', 'Cutrico Admin Member updated.', 'App\\Models\\User', 10, 'App\\Models\\User', 1, '[]', NULL, '2024-01-08 12:25:11', '2024-01-08 12:25:11'),
(187, 'Member updated.', 'Cutrico Admin Member updated.', 'App\\Models\\User', 10, 'App\\Models\\User', 10, '[]', NULL, '2024-01-08 12:28:08', '2024-01-08 12:28:08'),
(188, 'Member updated.', 'Joe Borg Member updated.', 'App\\Models\\User', 13, 'App\\Models\\User', 10, '[]', NULL, '2024-01-08 12:46:09', '2024-01-08 12:46:09'),
(189, 'New Service created.', 'service one Service created.', 'App\\Models\\Service', 14, 'App\\Models\\User', 1, '[]', NULL, '2024-01-09 08:26:54', '2024-01-09 08:26:54'),
(190, 'Member updated.', 'Emmanuel Obafemi Member updated.', 'App\\Models\\User', 9, 'App\\Models\\User', 1, '[]', NULL, '2024-01-10 13:45:06', '2024-01-10 13:45:06'),
(191, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 13,000 BTUs installed Product updated.', 'App\\Models\\Product', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-01-10 14:07:57', '2024-01-10 14:07:57'),
(192, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 13,000 BTUs installed Product updated.', 'App\\Models\\Product', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-01-10 14:08:14', '2024-01-10 14:08:14'),
(193, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 13,000 BTUs installed Product updated.', 'App\\Models\\Product', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-01-10 14:25:43', '2024-01-10 14:25:43'),
(194, 'Member updated.', 'INSTALLER Cutrico Member updated.', 'App\\Models\\User', 17, 'App\\Models\\User', 10, '[]', NULL, '2024-01-12 12:58:09', '2024-01-12 12:58:09'),
(195, 'New Invoice created.', 'hyhy Invoice created.', 'App\\Models\\Invoice', 9, 'App\\Models\\User', 10, '[]', NULL, '2024-01-12 15:18:40', '2024-01-12 15:18:40'),
(196, 'New Product created.', 'Toshiba SEIYA indoor &amp; outdoor 16,000 BTUs Kw installed Product created.', 'App\\Models\\Product', 6, 'App\\Models\\User', 10, '[]', NULL, '2024-01-26 12:29:54', '2024-01-26 12:29:54'),
(197, 'Expense Category deleted.', 'Education and Training Expense Category deleted.', 'App\\Models\\ExpenseCategory', 3, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:20:45', '2024-01-29 11:20:45'),
(198, 'Expense Category deleted.', 'Personal Expense Category deleted.', 'App\\Models\\ExpenseCategory', 7, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:20:49', '2024-01-29 11:20:49'),
(199, 'Expense Category deleted.', 'Travel Expense Category deleted.', 'App\\Models\\ExpenseCategory', 11, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:20:57', '2024-01-29 11:20:57'),
(200, 'Expense Category deleted.', 'Utilities Expense Category deleted.', 'App\\Models\\ExpenseCategory', 12, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:21:02', '2024-01-29 11:21:02'),
(201, 'Expense Category deleted.', 'Professional Services Expense Category deleted.', 'App\\Models\\ExpenseCategory', 9, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:21:08', '2024-01-29 11:21:08'),
(202, 'Expense Category deleted.', 'Office Expenses & Postage Expense Category deleted.', 'App\\Models\\ExpenseCategory', 5, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:21:21', '2024-01-29 11:21:21'),
(203, 'Expense Category deleted.', 'Employee Benefits Expense Category deleted.', 'App\\Models\\ExpenseCategory', 4, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:21:25', '2024-01-29 11:21:25'),
(204, 'Expense Category deleted.', 'Advertising Expense Category deleted.', 'App\\Models\\ExpenseCategory', 1, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:21:29', '2024-01-29 11:21:29'),
(205, 'Expense Category deleted.', 'Contractors Expense Category deleted.', 'App\\Models\\ExpenseCategory', 2, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:21:33', '2024-01-29 11:21:33'),
(206, 'New Expense Category created.', 'Equipment Installation Expense Category created.', 'App\\Models\\ExpenseCategory', 14, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:22:01', '2024-01-29 11:22:01'),
(207, 'New Expense Category created.', 'Servicing Expense Category created.', 'App\\Models\\ExpenseCategory', 15, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:22:34', '2024-01-29 11:22:34'),
(208, 'Product deleted.', 'Toshiba SEIYA indoor &amp; outdoor 13,000 BTUs installed Product deleted.', 'App\\Models\\Product', 5, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:58:10', '2024-01-29 11:58:10'),
(209, 'Product deleted.', 'Toshiba SEIYA indoor &amp; outdoor 10,000 BTUs installed Product deleted.', 'App\\Models\\Product', 4, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:58:14', '2024-01-29 11:58:14'),
(210, 'Product deleted.', 'Compressor UNIT Product deleted.', 'App\\Models\\Product', 3, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:58:18', '2024-01-29 11:58:18'),
(211, 'Product deleted.', 'Labour Work Product deleted.', 'App\\Models\\Product', 2, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:58:22', '2024-01-29 11:58:22'),
(212, 'Product deleted.', 'AIRCONDITION A123 Product deleted.', 'App\\Models\\Product', 1, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:58:26', '2024-01-29 11:58:26'),
(213, 'New Product created.', 'Toshiba SEIYA indoor &amp; outdoor 10,000 BTUs installed Product created.', 'App\\Models\\Product', 7, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 11:59:36', '2024-01-29 11:59:36'),
(214, 'New Product created.', 'Toshiba SEIYA indoor &amp; outdoor 13,000 BTUs installed Product created.', 'App\\Models\\Product', 8, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:00:40', '2024-01-29 12:00:40'),
(215, 'New Product created.', 'Toshiba SEIYA indoor &amp; outdoor 18,000 BTUs installed Product created.', 'App\\Models\\Product', 9, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:01:39', '2024-01-29 12:01:39'),
(216, 'New Product created.', 'Toshiba SEIYA indoor &amp; outdoor 24,000 BTUs installed Product created.', 'App\\Models\\Product', 10, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:02:44', '2024-01-29 12:02:44'),
(217, 'New Product created.', 'Toshiba Digital Inverter Ducted indoor &amp; outdoor 19,000 BTUs installed Product created.', 'App\\Models\\Product', 11, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:03:27', '2024-01-29 12:03:27'),
(218, 'New Product created.', 'Extra copper split (up-to 1/2) Product created.', 'App\\Models\\Product', 12, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:04:58', '2024-01-29 12:04:58'),
(219, 'New Product created.', 'Mini SMMSe 4 HP single phase (single fan) Product created.', 'App\\Models\\Product', 13, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:07:33', '2024-01-29 12:07:33'),
(220, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 13,000 BTUs installed Product updated.', 'App\\Models\\Product', 8, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:09:50', '2024-01-29 12:09:50'),
(221, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 18,000 BTUs installed Product updated.', 'App\\Models\\Product', 9, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:09:54', '2024-01-29 12:09:54'),
(222, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 16,000 BTUs Kw installed Product updated.', 'App\\Models\\Product', 6, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:10:40', '2024-01-29 12:10:40'),
(223, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 16,000 BTUs Kw installed Product updated.', 'App\\Models\\Product', 6, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:10:47', '2024-01-29 12:10:47'),
(224, 'Member updated.', 'Cutrico Admin Member updated.', 'App\\Models\\User', 10, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:11:36', '2024-01-29 12:11:36'),
(225, 'Estimate deleted.', 'hyhy Estimate deleted.', 'App\\Models\\Estimate', 1, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:13:04', '2024-01-29 12:13:04'),
(226, 'Invoice deleted.', 'Testing Bill system Invoice deleted.', 'App\\Models\\Invoice', 7, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:55:01', '2024-01-29 12:55:01'),
(227, 'Invoice deleted.', 'hyhy Invoice deleted.', 'App\\Models\\Invoice', 9, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:55:04', '2024-01-29 12:55:04'),
(228, 'Invoice deleted.', 'INSTALLATION OF AC Invoice deleted.', 'App\\Models\\Invoice', 8, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 12:55:08', '2024-01-29 12:55:08'),
(229, 'Tag deleted.', 'Tomorrow Tag deleted.', 'App\\Models\\Tag', 6, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 13:02:21', '2024-01-29 13:02:21'),
(230, 'Tag deleted.', 'Logo Tag deleted.', 'App\\Models\\Tag', 4, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 13:02:26', '2024-01-29 13:02:26'),
(231, 'Tag deleted.', 'Bug Tag deleted.', 'App\\Models\\Tag', 1, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 13:02:30', '2024-01-29 13:02:30'),
(232, 'Tag updated.', 'Repair Tag updated.', 'App\\Models\\Tag', 5, 'App\\Models\\User', 10, '[]', NULL, '2024-01-29 13:02:49', '2024-01-29 13:02:49'),
(233, 'Tax Rate deleted.', 'Non-Taxable Tax Rate deleted.', 'App\\Models\\TaxRate', 4, 'App\\Models\\User', 1, '[]', NULL, '2024-01-29 13:40:03', '2024-01-29 13:40:03'),
(234, 'Tax Rate updated.', 'VAT Tax Rate updated.', 'App\\Models\\TaxRate', 7, 'App\\Models\\User', 1, '[]', NULL, '2024-01-29 13:41:26', '2024-01-29 13:41:26'),
(235, 'Member updated.', 'ADMIN Cutrico Member updated.', 'App\\Models\\User', 15, 'App\\Models\\User', 1, '[]', NULL, '2024-01-29 13:42:49', '2024-01-29 13:42:49'),
(236, 'Department updated.', 'Operations Department Department updated.', 'App\\Models\\Department', 2, 'App\\Models\\User', 1, '[]', NULL, '2024-01-31 06:31:28', '2024-01-31 06:31:28'),
(237, 'Lead Source deleted.', 'Google AdWords Lead Source deleted.', 'App\\Models\\LeadSource', 1, 'App\\Models\\User', 1, '[]', NULL, '2024-01-31 06:32:27', '2024-01-31 06:32:27'),
(238, 'Lead Source deleted.', 'Cold Calling/Telemarketing Lead Source deleted.', 'App\\Models\\LeadSource', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-01-31 06:32:31', '2024-01-31 06:32:31'),
(239, 'New Invoice created.', 'Equipment Installation Invoice created.', 'App\\Models\\Invoice', 10, 'App\\Models\\User', 1, '[]', NULL, '2024-01-31 06:36:20', '2024-01-31 06:36:20'),
(240, 'New Customer created.', 'Cammast Properties Ltd Customer created.', 'App\\Models\\Customer', 7, 'App\\Models\\User', 15, '[]', NULL, '2024-02-09 07:18:58', '2024-02-09 07:18:58'),
(241, 'Customer updated.', 'Cammast Properties Ltd Customer updated.', 'App\\Models\\Customer', 7, 'App\\Models\\User', 15, '[]', NULL, '2024-02-09 07:24:11', '2024-02-09 07:24:11'),
(242, 'Customer updated.', 'Cammast Properties Ltd Customer updated.', 'App\\Models\\Customer', 7, 'App\\Models\\User', 15, '[]', NULL, '2024-02-09 07:26:59', '2024-02-09 07:26:59'),
(243, 'New Estimate created.', 'Equipment Installation Estimate created.', 'App\\Models\\Estimate', 2, 'App\\Models\\User', 15, '[]', NULL, '2024-02-09 07:32:30', '2024-02-09 07:32:30'),
(244, 'New Invoice created.', 'Equipment Installation Invoice created.', 'App\\Models\\Invoice', 11, 'App\\Models\\User', 15, '[]', NULL, '2024-02-09 07:35:52', '2024-02-09 07:35:52'),
(245, 'Payment success.', 'Bank Payment success.', 'App\\Models\\Payment', 2, 'App\\Models\\User', 15, '[]', NULL, '2024-02-09 07:37:25', '2024-02-09 07:37:25'),
(246, 'Expense Category deleted.', 'Servicing Expense Category deleted.', 'App\\Models\\ExpenseCategory', 15, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:41:54', '2024-02-11 08:41:54'),
(247, 'Expense Category deleted.', 'Equipment Installation Expense Category deleted.', 'App\\Models\\ExpenseCategory', 14, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:41:58', '2024-02-11 08:41:58'),
(248, 'Expense Category deleted.', 'Test Expense Category deleted.', 'App\\Models\\ExpenseCategory', 13, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:42:02', '2024-02-11 08:42:02'),
(249, 'Expense Category deleted.', 'Other Expenses Expense Category deleted.', 'App\\Models\\ExpenseCategory', 6, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:42:06', '2024-02-11 08:42:06'),
(250, 'Expense Category deleted.', 'Rent or Lease Expense Category deleted.', 'App\\Models\\ExpenseCategory', 8, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:42:10', '2024-02-11 08:42:10'),
(251, 'Expense Category deleted.', 'Supplies Expense Category deleted.', 'App\\Models\\ExpenseCategory', 10, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:42:14', '2024-02-11 08:42:14'),
(252, 'New Expense Category created.', 'Quote for Air-conditioning split units Expense Category created.', 'App\\Models\\ExpenseCategory', 16, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:43:01', '2024-02-11 08:43:01'),
(253, 'New Expense Category created.', 'Quote for Air-conditioning VRF units Expense Category created.', 'App\\Models\\ExpenseCategory', 17, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:43:21', '2024-02-11 08:43:21'),
(254, 'New Expense Category created.', 'Quote for Air-conditioning Industrial units Expense Category created.', 'App\\Models\\ExpenseCategory', 18, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:43:30', '2024-02-11 08:43:30'),
(255, 'New Expense Category created.', 'Quote for Air-conditioning Others Expense Category created.', 'App\\Models\\ExpenseCategory', 19, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:43:37', '2024-02-11 08:43:37'),
(256, 'New Expense Category created.', 'Quote for Electric Under Floor Heating Expense Category created.', 'App\\Models\\ExpenseCategory', 20, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:43:44', '2024-02-11 08:43:44'),
(257, 'New Expense Category created.', 'Quote for Hydronic Under Floor Heating Expense Category created.', 'App\\Models\\ExpenseCategory', 21, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:43:52', '2024-02-11 08:43:52'),
(258, 'New Expense Category created.', 'Quote for Heating Equipment Expense Category created.', 'App\\Models\\ExpenseCategory', 22, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:43:58', '2024-02-11 08:43:58'),
(259, 'New Expense Category created.', 'Quote for Fireplace Expense Category created.', 'App\\Models\\ExpenseCategory', 23, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:44:05', '2024-02-11 08:44:05'),
(260, 'New Expense Category created.', 'Quote for Ventilation Equipment Expense Category created.', 'App\\Models\\ExpenseCategory', 24, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:44:11', '2024-02-11 08:44:11'),
(261, 'New Expense Category created.', 'Quote for Ventilation System Expense Category created.', 'App\\Models\\ExpenseCategory', 25, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:44:18', '2024-02-11 08:44:18'),
(262, 'New Expense Category created.', 'Quote for Air Purification Expense Category created.', 'App\\Models\\ExpenseCategory', 26, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:44:25', '2024-02-11 08:44:25'),
(263, 'New Expense Category created.', 'Quote for Marine Air-conditioning Expense Category created.', 'App\\Models\\ExpenseCategory', 27, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:44:41', '2024-02-11 08:44:41'),
(264, 'New Expense Category created.', 'Quote for Marine Refrigeration Expense Category created.', 'App\\Models\\ExpenseCategory', 28, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:45:07', '2024-02-11 08:45:07'),
(265, 'New Expense Category created.', 'Quote for Marine Water Maker Expense Category created.', 'App\\Models\\ExpenseCategory', 29, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:45:16', '2024-02-11 08:45:16'),
(266, 'New Expense Category created.', 'Quote for Marine Sewage Treatment Plant Expense Category created.', 'App\\Models\\ExpenseCategory', 30, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:46:01', '2024-02-11 08:46:01'),
(267, 'New Expense Category created.', 'Quote for Marine Repairs Expense Category created.', 'App\\Models\\ExpenseCategory', 31, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:46:09', '2024-02-11 08:46:09'),
(268, 'New Expense Category created.', 'Quote for Marine Others Expense Category created.', 'App\\Models\\ExpenseCategory', 32, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:46:23', '2024-02-11 08:46:23'),
(269, 'New Expense Category created.', 'Quote for Maintenance Domestic Expense Category created.', 'App\\Models\\ExpenseCategory', 33, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:46:32', '2024-02-11 08:46:32'),
(270, 'New Expense Category created.', 'Quote for Maintenance Commercial Expense Category created.', 'App\\Models\\ExpenseCategory', 34, 'App\\Models\\User', 1, '[]', NULL, '2024-02-11 08:46:38', '2024-02-11 08:46:38'),
(271, 'New Customer created.', 'testingtwor Customer created.', 'App\\Models\\Customer', 8, 'App\\Models\\User', 1, '[]', NULL, '2024-02-21 15:29:19', '2024-02-21 15:29:19'),
(272, 'Customer deleted.', 'testingtwor Customer deleted.', 'App\\Models\\Customer', 8, 'App\\Models\\User', 1, '[]', NULL, '2024-02-21 15:30:13', '2024-02-21 15:30:13'),
(274, 'Estimate updated.', 'Equipment Installation Estimate updated.', 'App\\Models\\Estimate', 2, 'App\\Models\\User', 1, '[]', NULL, '2024-02-26 15:04:48', '2024-02-26 15:04:48'),
(275, 'Customer updated.', 'Parliament Malta Customer updated.', 'App\\Models\\Customer', 3, 'App\\Models\\User', 1, '[]', NULL, '2024-02-26 15:42:58', '2024-02-26 15:42:58'),
(276, 'Invoice updated.', 'Installation of AC Units Invoice updated.', 'App\\Models\\Invoice', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-02-26 15:43:26', '2024-02-26 15:43:26'),
(277, 'Payment success.', 'Credit Card Payment success.', 'App\\Models\\Payment', 3, 'App\\Models\\User', 1, '[]', NULL, '2024-02-26 15:43:50', '2024-02-26 15:43:50'),
(278, 'Payment success.', 'Credit Card Payment success.', 'App\\Models\\Payment', 4, 'App\\Models\\User', 1, '[]', NULL, '2024-02-26 15:44:46', '2024-02-26 15:44:46'),
(279, 'Payment success.', 'Credit Card Payment success.', 'App\\Models\\Payment', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-02-26 15:45:25', '2024-02-26 15:45:25'),
(280, 'Payment success.', 'Credit Card Payment success.', 'App\\Models\\Payment', 6, 'App\\Models\\User', 1, '[]', NULL, '2024-02-26 15:45:59', '2024-02-26 15:45:59'),
(281, 'Invoice updated.', 'Installation of AC Units Invoice updated.', 'App\\Models\\Invoice', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-02-26 15:47:35', '2024-02-26 15:47:35'),
(282, 'New Invoice created.', 'Quote for Ventilation System Invoice created.', 'App\\Models\\Invoice', 12, 'App\\Models\\User', 1, '[]', NULL, '2024-02-26 15:49:04', '2024-02-26 15:49:04'),
(283, 'Payment success.', 'Credit Card Payment success.', 'App\\Models\\Payment', 7, 'App\\Models\\User', 1, '[]', NULL, '2024-02-26 15:49:26', '2024-02-26 15:49:26'),
(284, 'New Customer created.', '12.8 Ventures Customer created.', 'App\\Models\\Customer', 9, 'App\\Models\\User', 1, '[]', NULL, '2024-02-29 22:00:55', '2024-02-29 22:00:55'),
(285, 'New Invoice created.', 'Quote for Air Purification Invoice created.', 'App\\Models\\Invoice', 13, 'App\\Models\\User', 1, '[]', NULL, '2024-02-29 22:04:25', '2024-02-29 22:04:25'),
(286, 'Payment success.', 'Credit Card Payment success.', 'App\\Models\\Payment', 8, 'App\\Models\\User', 1, '[]', NULL, '2024-02-29 22:13:08', '2024-02-29 22:13:08'),
(287, 'Invoice updated.', 'Equipment Installation Invoice updated.', 'App\\Models\\Invoice', 11, 'App\\Models\\User', 1, '[]', NULL, '2024-03-01 14:02:58', '2024-03-01 14:02:58');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(288, 'Invoice updated.', 'Equipment Installation Invoice updated.', 'App\\Models\\Invoice', 11, 'App\\Models\\User', 1, '[]', NULL, '2024-03-01 14:15:40', '2024-03-01 14:15:40'),
(289, 'Invoice updated.', 'Equipment Installation Invoice updated.', 'App\\Models\\Invoice', 11, 'App\\Models\\User', 1, '[]', NULL, '2024-03-01 14:21:29', '2024-03-01 14:21:29'),
(290, 'Invoice updated.', 'Equipment Installation Invoice updated.', 'App\\Models\\Invoice', 11, 'App\\Models\\User', 1, '[]', NULL, '2024-03-01 14:21:47', '2024-03-01 14:21:47'),
(291, 'Invoice updated.', 'Equipment Installation Invoice updated.', 'App\\Models\\Invoice', 11, 'App\\Models\\User', 1, '[]', NULL, '2024-03-01 14:38:19', '2024-03-01 14:38:19'),
(292, 'New Product Group created.', 'testing Product Group created.', 'App\\Models\\ProductGroup', 8, 'App\\Models\\User', 1, '[]', NULL, '2024-03-01 17:12:51', '2024-03-01 17:12:51'),
(293, 'Product Group updated.', 'testing2 Product Group updated.', 'App\\Models\\ProductGroup', 8, 'App\\Models\\User', 1, '[]', NULL, '2024-03-01 17:13:22', '2024-03-01 17:13:22'),
(294, 'Product Group deleted.', 'testing2 Product Group deleted.', 'App\\Models\\ProductGroup', 8, 'App\\Models\\User', 1, '[]', NULL, '2024-03-01 17:13:29', '2024-03-01 17:13:29'),
(295, 'New Invoice created.', 'Quote for Maintenance Commercial Invoice created.', 'App\\Models\\Invoice', 14, 'App\\Models\\User', 1, '[]', NULL, '2024-03-04 22:11:23', '2024-03-04 22:11:23'),
(296, 'New Member Group created.', 'Administrator Member Group created.', 'App\\Models\\MemberGroup', 1, 'App\\Models\\User', 1, '[]', NULL, '2024-03-06 19:34:16', '2024-03-06 19:34:16'),
(297, 'New Member Group created.', 'Sales Agent Member Group created.', 'App\\Models\\MemberGroup', 2, 'App\\Models\\User', 1, '[]', NULL, '2024-03-06 19:34:42', '2024-03-06 19:34:42'),
(298, 'New Member Group created.', 'Installer Member Group created.', 'App\\Models\\MemberGroup', 3, 'App\\Models\\User', 1, '[]', NULL, '2024-03-06 19:37:32', '2024-03-06 19:37:32'),
(299, 'Member updated.', 'Emmanuel Obafemi Member updated.', 'App\\Models\\User', 9, 'App\\Models\\User', 1, '[]', NULL, '2024-03-06 19:38:02', '2024-03-06 19:38:02'),
(300, 'Member updated.', 'INSTALLER Cutrico Member updated.', 'App\\Models\\User', 17, 'App\\Models\\User', 1, '[]', NULL, '2024-03-06 19:38:29', '2024-03-06 19:38:29'),
(301, 'New Member created.', 'Emmanuel Obafemi Member created.', 'App\\Models\\User', 25, 'App\\Models\\User', 1, '[]', NULL, '2024-03-06 19:39:22', '2024-03-06 19:39:22'),
(302, 'Member deleted.', 'Emmanuel Obafemi Member deleted.', 'App\\Models\\User', 25, 'App\\Models\\User', 1, '[]', NULL, '2024-03-06 19:39:51', '2024-03-06 19:39:51'),
(303, 'New Estimate created.', 'Quote for Maintenance Commercial Estimate created.', 'App\\Models\\Estimate', 3, 'App\\Models\\User', 1, '[]', NULL, '2024-03-11 09:27:51', '2024-03-11 09:27:51'),
(305, 'Member updated.', 'Emmanuel Obafemi Member updated.', 'App\\Models\\User', 9, 'App\\Models\\User', 1, '[]', NULL, '2024-03-11 12:14:55', '2024-03-11 12:14:55'),
(306, 'New Estimate created.', 'Quote for Ventilation System Estimate created.', 'App\\Models\\Estimate', 4, 'App\\Models\\User', 9, '[]', NULL, '2024-03-11 13:00:56', '2024-03-11 13:00:56'),
(307, 'New Estimate created.', 'Quote for Maintenance Commercial Estimate created.', 'App\\Models\\Estimate', 5, 'App\\Models\\User', 9, '[]', NULL, '2024-03-11 13:05:23', '2024-03-11 13:05:23'),
(308, 'New Estimate created.', 'Quote for Maintenance Commercial Estimate created.', 'App\\Models\\Estimate', 6, 'App\\Models\\User', 9, '[]', NULL, '2024-03-11 13:18:02', '2024-03-11 13:18:02'),
(309, 'Invoice updated.', 'Quote for Maintenance Commercial Invoice updated.', 'App\\Models\\Invoice', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-03-12 16:03:25', '2024-03-12 16:03:25'),
(310, 'New Estimate created.', 'Quote for Air-conditioning split units Estimate created.', 'App\\Models\\Estimate', 7, 'App\\Models\\User', 15, '[]', NULL, '2024-03-18 18:41:19', '2024-03-18 18:41:19'),
(311, 'Member deleted.', 'ADMIN Cutrico Member deleted.', 'App\\Models\\User', 15, 'App\\Models\\User', 10, '[]', NULL, '2024-03-18 18:43:32', '2024-03-18 18:43:32'),
(312, 'New Member created.', 'Administrator  Member created.', 'App\\Models\\User', 27, 'App\\Models\\User', 10, '[]', NULL, '2024-03-18 18:46:59', '2024-03-18 18:46:59'),
(313, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 27, 'App\\Models\\User', 10, '[]', NULL, '2024-03-18 18:49:06', '2024-03-18 18:49:06'),
(314, 'Member deleted.', 'Cutrico Admin Member deleted.', 'App\\Models\\User', 10, 'App\\Models\\User', 1, '[]', NULL, '2024-03-18 18:50:33', '2024-03-18 18:50:33'),
(315, 'Member updated.', 'SALES-AGENT CUTICO Member updated.', 'App\\Models\\User', 16, 'App\\Models\\User', 1, '[]', NULL, '2024-03-18 18:50:52', '2024-03-18 18:50:52'),
(316, 'New Estimate created.', 'Quote for Air-conditioning split units Estimate created.', 'App\\Models\\Estimate', 8, 'App\\Models\\User', 16, '[]', NULL, '2024-03-18 18:53:52', '2024-03-18 18:53:52'),
(317, 'Member deleted.', 'Joe Borg Member deleted.', 'App\\Models\\User', 13, 'App\\Models\\User', 1, '[]', NULL, '2024-03-18 19:29:49', '2024-03-18 19:29:49'),
(318, 'Member deleted.', 'Bob Vella Member deleted.', 'App\\Models\\User', 14, 'App\\Models\\User', 1, '[]', NULL, '2024-03-18 19:35:45', '2024-03-18 19:35:45'),
(319, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 27, 'App\\Models\\User', 1, '[]', NULL, '2024-03-18 19:50:43', '2024-03-18 19:50:43'),
(320, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 27, 'App\\Models\\User', 1, '[]', NULL, '2024-03-18 19:50:51', '2024-03-18 19:50:51'),
(321, 'New Ticket created.', 'WARNING Ticket created.', 'App\\Models\\Ticket', 2, 'App\\Models\\User', 1, '[]', NULL, '2024-03-18 19:53:23', '2024-03-18 19:53:23'),
(326, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 27, 'App\\Models\\User', 1, '[]', NULL, '2024-03-19 06:57:00', '2024-03-19 06:57:00'),
(327, 'New Invoice created.', 'Quote for Maintenance Commercial Invoice created.', 'App\\Models\\Invoice', 15, 'App\\Models\\User', 16, '[]', NULL, '2024-03-22 18:32:25', '2024-03-22 18:32:25'),
(328, 'New Estimate created.', 'Quote for Maintenance Commercial Estimate created.', 'App\\Models\\Estimate', 9, 'App\\Models\\User', 16, '[]', NULL, '2024-03-22 18:33:07', '2024-03-22 18:33:07'),
(329, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 27, 'App\\Models\\User', 1, '[]', NULL, '2024-03-22 18:35:10', '2024-03-22 18:35:10'),
(330, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 27, 'App\\Models\\User', 1, '[]', NULL, '2024-03-22 18:35:24', '2024-03-22 18:35:24'),
(331, 'New Goal created.', 'TEST Goal created.', 'App\\Models\\Goal', 1, 'App\\Models\\User', 1, '[]', NULL, '2024-03-22 18:39:23', '2024-03-22 18:39:23'),
(332, 'Goal deleted.', 'TEST Goal deleted.', 'App\\Models\\Goal', 1, 'App\\Models\\User', 1, '[]', NULL, '2024-03-22 18:40:30', '2024-03-22 18:40:30'),
(334, 'Member updated.', 'SALES-AGENT CUTICO Member updated.', 'App\\Models\\User', 16, 'App\\Models\\User', 1, '[]', NULL, '2024-04-01 17:51:33', '2024-04-01 17:51:33'),
(335, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 27, 'App\\Models\\User', 1, '[]', NULL, '2024-04-01 18:19:20', '2024-04-01 18:19:20'),
(336, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 27, 'App\\Models\\User', 1, '[]', NULL, '2024-04-01 18:19:38', '2024-04-01 18:19:38'),
(337, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 27, 'App\\Models\\User', 1, '[]', NULL, '2024-04-01 18:20:33', '2024-04-01 18:20:33'),
(339, 'Member deleted.', 'Emmanuel Obafemi Member deleted.', 'App\\Models\\User', 9, 'App\\Models\\User', 1, '[]', NULL, '2024-04-02 06:11:29', '2024-04-02 06:11:29'),
(351, 'New Member created.', 'Emmanuel Obafemi Member created.', 'App\\Models\\User', 45, 'App\\Models\\User', 1, '[]', NULL, '2024-04-02 11:43:41', '2024-04-02 11:43:41'),
(352, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 27, 'App\\Models\\User', 1, '[]', NULL, '2024-04-08 16:44:28', '2024-04-08 16:44:28'),
(353, 'Member deleted.', 'Administrator  Member deleted.', 'App\\Models\\User', 27, 'App\\Models\\User', 1, '[]', NULL, '2024-04-08 16:47:18', '2024-04-08 16:47:18'),
(354, 'New Member created.', 'Administrator  Member created.', 'App\\Models\\User', 46, 'App\\Models\\User', 1, '[]', NULL, '2024-04-08 16:49:46', '2024-04-08 16:49:46'),
(355, 'Member deleted.', 'Administrator  Member deleted.', 'App\\Models\\User', 46, 'App\\Models\\User', 1, '[]', NULL, '2024-04-08 18:10:03', '2024-04-08 18:10:03'),
(356, 'New Member created.', 'Administrator  Member created.', 'App\\Models\\User', 47, 'App\\Models\\User', 1, '[]', NULL, '2024-04-08 18:11:38', '2024-04-08 18:11:38'),
(357, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 47, 'App\\Models\\User', 1, '[]', NULL, '2024-04-08 18:20:21', '2024-04-08 18:20:21'),
(358, 'New Customer created.', 'Company name 1 Customer created.', 'App\\Models\\Customer', 10, 'App\\Models\\User', 47, '[]', NULL, '2024-04-08 18:26:53', '2024-04-08 18:26:53'),
(359, 'Customer updated.', 'Company name 1 Customer updated.', 'App\\Models\\Customer', 10, 'App\\Models\\User', 47, '[]', NULL, '2024-04-08 18:31:17', '2024-04-08 18:31:17'),
(360, 'New Estimate created.', 'Quote for Air-conditioning split units Estimate created.', 'App\\Models\\Estimate', 10, 'App\\Models\\User', 47, '[]', NULL, '2024-04-08 18:38:14', '2024-04-08 18:38:14'),
(361, 'New Invoice created.', 'Quote for Air-conditioning split units Invoice created.', 'App\\Models\\Invoice', 16, 'App\\Models\\User', 47, '[]', NULL, '2024-04-08 18:40:36', '2024-04-08 18:40:36'),
(362, 'Member updated.', 'INSTALLER Cutrico Member updated.', 'App\\Models\\User', 17, 'App\\Models\\User', 1, '[]', NULL, '2024-04-08 18:44:44', '2024-04-08 18:44:44'),
(363, 'New Member created.', 'Darren Agius Member created.', 'App\\Models\\User', 48, 'App\\Models\\User', 47, '[]', NULL, '2024-04-08 18:47:08', '2024-04-08 18:47:08'),
(364, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 47, 'App\\Models\\User', 1, '[]', NULL, '2024-04-12 18:21:22', '2024-04-12 18:21:22'),
(365, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 47, 'App\\Models\\User', 1, '[]', NULL, '2024-04-12 18:21:32', '2024-04-12 18:21:32'),
(366, 'New Estimate created.', 'Quote for Maintenance Domestic Estimate created.', 'App\\Models\\Estimate', 11, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:24:59', '2024-04-12 18:24:59'),
(367, 'Estimate updated.', 'Quote for Maintenance Domestic Estimate updated.', 'App\\Models\\Estimate', 11, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:27:39', '2024-04-12 18:27:39'),
(368, 'Estimate deleted.', 'Quote for Maintenance Domestic Estimate deleted.', 'App\\Models\\Estimate', 11, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:28:31', '2024-04-12 18:28:31'),
(369, 'Estimate deleted.', 'Quote for Air-conditioning split units Estimate deleted.', 'App\\Models\\Estimate', 10, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:28:36', '2024-04-12 18:28:36'),
(370, 'Estimate deleted.', 'Quote for Maintenance Commercial Estimate deleted.', 'App\\Models\\Estimate', 9, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:28:42', '2024-04-12 18:28:42'),
(371, 'Estimate deleted.', 'Quote for Air-conditioning split units Estimate deleted.', 'App\\Models\\Estimate', 8, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:28:48', '2024-04-12 18:28:48'),
(372, 'Estimate deleted.', 'Quote for Air-conditioning split units Estimate deleted.', 'App\\Models\\Estimate', 7, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:28:52', '2024-04-12 18:28:52'),
(373, 'Estimate deleted.', 'Quote for Maintenance Commercial Estimate deleted.', 'App\\Models\\Estimate', 6, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:28:58', '2024-04-12 18:28:58'),
(374, 'Estimate deleted.', 'Quote for Maintenance Commercial Estimate deleted.', 'App\\Models\\Estimate', 5, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:29:03', '2024-04-12 18:29:03'),
(375, 'Estimate deleted.', 'Quote for Ventilation System Estimate deleted.', 'App\\Models\\Estimate', 4, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:29:17', '2024-04-12 18:29:17'),
(376, 'Estimate deleted.', 'Quote for Maintenance Commercial Estimate deleted.', 'App\\Models\\Estimate', 3, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:29:29', '2024-04-12 18:29:29'),
(377, 'Estimate deleted.', 'Equipment Installation Estimate deleted.', 'App\\Models\\Estimate', 2, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:29:36', '2024-04-12 18:29:36'),
(378, 'Member updated.', 'SALES AGENT Member updated.', 'App\\Models\\User', 16, 'App\\Models\\User', 1, '[]', NULL, '2024-04-12 18:41:14', '2024-04-12 18:41:14'),
(379, 'Invoice deleted.', 'Quote for Air-conditioning split units Invoice deleted.', 'App\\Models\\Invoice', 16, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:42:05', '2024-04-12 18:42:05'),
(380, 'Ticket updated.', 'Water leaking from Ac indoor unit Ticket updated.', 'App\\Models\\Ticket', 1, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:42:56', '2024-04-12 18:42:56'),
(381, 'Member updated.', 'SALES AGENT Member updated.', 'App\\Models\\User', 16, 'App\\Models\\User', 1, '[]', NULL, '2024-04-12 18:44:37', '2024-04-12 18:44:37'),
(382, 'Customer deleted.', 'TESTING Customer deleted.', 'App\\Models\\Customer', 2, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:44:54', '2024-04-12 18:44:54'),
(383, 'New Customer created.', 'Testing Company Customer created.', 'App\\Models\\Customer', 11, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:45:49', '2024-04-12 18:45:49'),
(384, 'Customer deleted.', 'Testing Customer Customer deleted.', 'App\\Models\\Customer', 5, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:48:52', '2024-04-12 18:48:52'),
(385, 'Customer updated.', 'Testing Company Customer updated.', 'App\\Models\\Customer', 11, 'App\\Models\\User', 16, '[]', NULL, '2024-04-12 18:50:28', '2024-04-12 18:50:28'),
(386, 'Invoice updated.', 'Quote for Maintenance Commercial Invoice updated.', 'App\\Models\\Invoice', 5, 'App\\Models\\User', 16, '[]', NULL, '2024-04-15 19:36:22', '2024-04-15 19:36:22'),
(387, 'New Invoice created.', 'Quote for Maintenance Domestic Invoice created.', 'App\\Models\\Invoice', 17, 'App\\Models\\User', 1, '[]', NULL, '2024-04-22 10:50:38', '2024-04-22 10:50:38'),
(388, 'New Customer created.', ' Customer created.', 'App\\Models\\Customer', 12, 'App\\Models\\User', 1, '[]', NULL, '2024-04-22 10:58:43', '2024-04-22 10:58:43'),
(389, 'Customer deleted.', ' Customer deleted.', 'App\\Models\\Customer', 12, 'App\\Models\\User', 1, '[]', NULL, '2024-04-22 11:00:22', '2024-04-22 11:00:22'),
(390, 'Member updated.', 'Emmanuel Obafemi Member updated.', 'App\\Models\\User', 45, 'App\\Models\\User', 1, '[]', NULL, '2024-04-22 11:06:12', '2024-04-22 11:06:12'),
(391, 'New Invoice created.', 'Quote for Maintenance Domestic Invoice created.', 'App\\Models\\Invoice', 18, 'App\\Models\\User', 45, '[]', NULL, '2024-04-22 11:09:20', '2024-04-22 11:09:20'),
(392, 'Invoice updated.', 'Quote for Maintenance Commercial Invoice updated.', 'App\\Models\\Invoice', 18, 'App\\Models\\User', 45, '[]', NULL, '2024-04-22 11:10:06', '2024-04-22 11:10:06'),
(393, 'New Expense Category created.', 'jhj Expense Category created.', 'App\\Models\\ExpenseCategory', 35, 'App\\Models\\User', 1, '[]', NULL, '2024-04-22 11:19:32', '2024-04-22 11:19:32'),
(394, 'Expense Category deleted.', 'jhj Expense Category deleted.', 'App\\Models\\ExpenseCategory', 35, 'App\\Models\\User', 1, '[]', NULL, '2024-04-22 11:19:41', '2024-04-22 11:19:41'),
(395, 'Expense Category updated.', 'Quote for Maintenance Commercial Expense Category updated.', 'App\\Models\\ExpenseCategory', 34, 'App\\Models\\User', 1, '[]', NULL, '2024-04-22 11:20:07', '2024-04-22 11:20:07'),
(396, 'Expense Category updated.', 'Quote for Maintenance Commercial Expense Category updated.', 'App\\Models\\ExpenseCategory', 34, 'App\\Models\\User', 1, '[]', NULL, '2024-04-26 19:24:15', '2024-04-26 19:24:15'),
(397, 'Ticket deleted.', 'Water leaking from Ac indoor unit Ticket deleted.', 'App\\Models\\Ticket', 1, 'App\\Models\\User', 1, '[]', NULL, '2024-04-30 15:22:21', '2024-04-30 15:22:21'),
(398, 'Ticket deleted.', 'WARNING Ticket deleted.', 'App\\Models\\Ticket', 2, 'App\\Models\\User', 1, '[]', NULL, '2024-04-30 15:22:25', '2024-04-30 15:22:25'),
(399, 'New Ticket created.', ' Ticket created.', 'App\\Models\\Ticket', 3, 'App\\Models\\User', 1, '[]', NULL, '2024-04-30 15:22:54', '2024-04-30 15:22:54'),
(400, 'Member updated.', 'Super Admin Member updated.', 'App\\Models\\User', 1, 'App\\Models\\User', 1, '[]', NULL, '2024-05-06 14:41:00', '2024-05-06 14:41:00'),
(401, 'Member updated.', 'Darren Agius Member updated.', 'App\\Models\\User', 48, 'App\\Models\\User', 1, '[]', NULL, '2024-05-06 14:42:31', '2024-05-06 14:42:31'),
(402, 'Member updated.', 'INSTALLER Cutrico Member updated.', 'App\\Models\\User', 17, 'App\\Models\\User', 1, '[]', NULL, '2024-05-06 14:42:51', '2024-05-06 14:42:51'),
(403, 'New Estimate created.', 'Quote for Air-conditioning Others Estimate created.', 'App\\Models\\Estimate', 12, 'App\\Models\\User', 16, '[]', NULL, '2024-05-08 16:31:34', '2024-05-08 16:31:34'),
(404, 'New Invoice created.', 'Quote for Air-conditioning Others Invoice created.', 'App\\Models\\Invoice', 19, 'App\\Models\\User', 16, '[]', NULL, '2024-05-08 16:31:49', '2024-05-08 16:31:49'),
(405, 'Member updated.', 'Installer Cutrico Member updated.', 'App\\Models\\User', 17, 'App\\Models\\User', 47, '[]', NULL, '2024-05-08 16:33:28', '2024-05-08 16:33:28'),
(406, 'Member updated.', 'Installer Cutrico Member updated.', 'App\\Models\\User', 17, 'App\\Models\\User', 47, '[]', NULL, '2024-05-08 16:34:34', '2024-05-08 16:34:34'),
(407, 'Member updated.', 'Installer Cutrico Member updated.', 'App\\Models\\User', 17, 'App\\Models\\User', 47, '[]', NULL, '2024-05-08 16:35:44', '2024-05-08 16:35:44'),
(408, 'New Warranty Type created.', '1Year Warranty Type created.', 'App\\Models\\WarrantyType', 1, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:12:35', '2024-05-13 14:12:35'),
(409, 'New Warranty Type created.', '2Years Warranty Type created.', 'App\\Models\\WarrantyType', 2, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:12:40', '2024-05-13 14:12:40'),
(410, 'New Warranty Type created.', '3Years Warranty Type created.', 'App\\Models\\WarrantyType', 3, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:12:48', '2024-05-13 14:12:48'),
(411, 'Product updated.', 'CHSCPR Product updated.', 'App\\Models\\Product', 62, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:18:32', '2024-05-13 14:18:32'),
(412, 'Product updated.', 'CHSDRN Product updated.', 'App\\Models\\Product', 63, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:18:39', '2024-05-13 14:18:39'),
(413, 'Product updated.', 'CPR Internal 1 Product updated.', 'App\\Models\\Product', 80, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:18:47', '2024-05-13 14:18:47'),
(414, 'Invoice deleted.', 'Quote for Air-conditioning Others Invoice deleted.', 'App\\Models\\Invoice', 19, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:20:13', '2024-05-13 14:20:13'),
(415, 'Invoice deleted.', 'Quote for Maintenance Commercial Invoice deleted.', 'App\\Models\\Invoice', 15, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:20:18', '2024-05-13 14:20:18'),
(416, 'Invoice deleted.', 'Quote for Maintenance Domestic Invoice deleted.', 'App\\Models\\Invoice', 17, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:20:22', '2024-05-13 14:20:22'),
(417, 'Invoice deleted.', 'Quote for Maintenance Commercial Invoice deleted.', 'App\\Models\\Invoice', 18, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:20:27', '2024-05-13 14:20:27'),
(418, 'Invoice deleted.', 'Quote for Ventilation System Invoice deleted.', 'App\\Models\\Invoice', 12, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:20:31', '2024-05-13 14:20:31'),
(419, 'Invoice deleted.', 'Quote for Air Purification Invoice deleted.', 'App\\Models\\Invoice', 13, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:20:35', '2024-05-13 14:20:35'),
(420, 'Invoice deleted.', 'Quote for Maintenance Commercial Invoice deleted.', 'App\\Models\\Invoice', 14, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:20:39', '2024-05-13 14:20:39'),
(421, 'Invoice deleted.', 'Quote for Maintenance Commercial Invoice deleted.', 'App\\Models\\Invoice', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:20:44', '2024-05-13 14:20:44'),
(422, 'Invoice deleted.', 'Equipment Installation Invoice deleted.', 'App\\Models\\Invoice', 10, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:20:48', '2024-05-13 14:20:48'),
(423, 'Invoice deleted.', 'Equipment Installation Invoice deleted.', 'App\\Models\\Invoice', 11, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:20:51', '2024-05-13 14:20:51'),
(424, 'New Invoice created.', 'Quote for Maintenance Commercial Invoice created.', 'App\\Models\\Invoice', 20, 'App\\Models\\User', 1, '[]', NULL, '2024-05-13 14:22:11', '2024-05-13 14:22:11'),
(425, 'Product updated.', 'CHSCPR Product updated.', 'App\\Models\\Product', 62, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 13:49:16', '2024-05-17 13:49:16'),
(426, 'Product updated.', 'CHSDRN Product updated.', 'App\\Models\\Product', 63, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 13:49:29', '2024-05-17 13:49:29'),
(427, 'Product updated.', 'CHSDRN Product updated.', 'App\\Models\\Product', 63, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 13:49:35', '2024-05-17 13:49:35'),
(428, 'Product updated.', 'CPR Internal 1 Product updated.', 'App\\Models\\Product', 80, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 13:49:42', '2024-05-17 13:49:42'),
(429, 'New Tag created.', 'N/A Tag created.', 'App\\Models\\Tag', 7, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 13:53:22', '2024-05-17 13:53:22'),
(430, 'New Estimate created.', 'Quote for Maintenance Commercial Estimate created.', 'App\\Models\\Estimate', 13, 'App\\Models\\User', 16, '[]', NULL, '2024-05-17 13:55:14', '2024-05-17 13:55:14'),
(431, 'New Invoice created.', 'Quote for Maintenance Commercial Invoice created.', 'App\\Models\\Invoice', 21, 'App\\Models\\User', 16, '[]', NULL, '2024-05-17 13:59:02', '2024-05-17 13:59:02'),
(432, 'Member updated.', 'SALES AGENT Member updated.', 'App\\Models\\User', 16, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:01:15', '2024-05-17 14:01:15'),
(433, 'Payment success.', 'Bank Payment success.', 'App\\Models\\Payment', 9, 'App\\Models\\User', 16, '[]', NULL, '2024-05-17 14:02:12', '2024-05-17 14:02:12'),
(434, 'Member updated.', 'SALES AGENT Member updated.', 'App\\Models\\User', 16, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:08:13', '2024-05-17 14:08:13'),
(435, 'Member updated.', 'SALES AGENT Member updated.', 'App\\Models\\User', 16, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:08:37', '2024-05-17 14:08:37'),
(436, 'Member updated.', 'SALES AGENT Member updated.', 'App\\Models\\User', 16, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:12:28', '2024-05-17 14:12:28'),
(437, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 16,000 BTUs Kw installed Product updated.', 'App\\Models\\Product', 6, 'App\\Models\\User', 16, '[]', NULL, '2024-05-17 14:39:12', '2024-05-17 14:39:12'),
(438, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 10,000 BTUs installed Product updated.', 'App\\Models\\Product', 7, 'App\\Models\\User', 16, '[]', NULL, '2024-05-17 14:39:18', '2024-05-17 14:39:18'),
(439, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 13,000 BTUs installed Product updated.', 'App\\Models\\Product', 8, 'App\\Models\\User', 16, '[]', NULL, '2024-05-17 14:39:23', '2024-05-17 14:39:23'),
(440, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 18,000 BTUs installed Product updated.', 'App\\Models\\Product', 9, 'App\\Models\\User', 16, '[]', NULL, '2024-05-17 14:39:28', '2024-05-17 14:39:28'),
(441, 'New Invoice created.', 'Quote for Maintenance Commercial Invoice created.', 'App\\Models\\Invoice', 22, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:44:15', '2024-05-17 14:44:15'),
(442, 'Product updated.', 'RAS-B16E2KVG-E + RAS-16E2AVG-E Product updated.', 'App\\Models\\Product', 55, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:46:07', '2024-05-17 14:46:07'),
(443, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 24,000 BTUs installed Product updated.', 'App\\Models\\Product', 10, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:46:21', '2024-05-17 14:46:21'),
(444, 'Product updated.', 'Toshiba Digital Inverter Ducted indoor &amp; outdoor 19,000 BTUs installed Product updated.', 'App\\Models\\Product', 11, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:46:27', '2024-05-17 14:46:27'),
(445, 'Product updated.', 'Extra copper split (up-to 1/2) Product updated.', 'App\\Models\\Product', 12, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:46:36', '2024-05-17 14:46:36'),
(446, 'New Invoice created.', 'Quote for Maintenance Commercial Invoice created.', 'App\\Models\\Invoice', 23, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:47:21', '2024-05-17 14:47:21'),
(447, 'Product updated.', 'RAS-B10E2KVG-E + RAS-10E2AVG-E Product updated.', 'App\\Models\\Product', 53, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:49:32', '2024-05-17 14:49:32'),
(448, 'Product deleted.', 'Toshiba SEIYA indoor &amp; outdoor 10,000 BTUs installed Product deleted.', 'App\\Models\\Product', 7, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:49:42', '2024-05-17 14:49:42'),
(449, 'New Invoice created.', 'Quote for Maintenance Commercial Invoice created.', 'App\\Models\\Invoice', 24, 'App\\Models\\User', 47, '[]', NULL, '2024-05-17 14:50:01', '2024-05-17 14:50:01'),
(450, 'New Invoice created.', 'Quote for Marine Repairs Invoice created.', 'App\\Models\\Invoice', 25, 'App\\Models\\User', 1, '[]', NULL, '2024-05-19 07:27:51', '2024-05-19 07:27:51'),
(451, 'Invoice updated.', 'Quote for Maintenance Commercial Invoice updated.', 'App\\Models\\Invoice', 21, 'App\\Models\\User', 1, '[]', NULL, '2024-05-20 20:01:08', '2024-05-20 20:01:08'),
(452, 'New Ticket created.', ' Ticket created.', 'App\\Models\\Ticket', 4, 'App\\Models\\User', 1, '[]', NULL, '2024-05-21 13:30:31', '2024-05-21 13:30:31'),
(453, 'Product updated.', 'Toshiba SEIYA indoor &amp; outdoor 13,000 BTUs installed Product updated.', 'App\\Models\\Product', 8, 'App\\Models\\User', 47, '[]', NULL, '2024-05-24 13:33:24', '2024-05-24 13:33:24'),
(454, 'New Ticket created.', ' Ticket created.', 'App\\Models\\Ticket', 5, 'App\\Models\\User', 47, '[]', NULL, '2024-05-24 13:39:11', '2024-05-24 13:39:11'),
(455, 'New Invoice created.', 'Quote for Maintenance Commercial Invoice created.', 'App\\Models\\Invoice', 26, 'App\\Models\\User', 1, '[]', NULL, '2024-06-18 19:07:38', '2024-06-18 19:07:38'),
(456, 'Country updated.', 'Malta Country updated.', 'App\\Models\\Country', 10, 'App\\Models\\User', 1, '[]', NULL, '2024-06-18 19:16:02', '2024-06-18 19:16:02'),
(457, 'New Country created.', 'Test Country created.', 'App\\Models\\Country', 11, 'App\\Models\\User', 1, '[]', NULL, '2024-06-18 19:16:13', '2024-06-18 19:16:13'),
(458, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 47, 'App\\Models\\User', 1, '[]', NULL, '2024-06-18 19:40:53', '2024-06-18 19:40:53'),
(459, 'Member updated.', 'Administrator  Member updated.', 'App\\Models\\User', 47, 'App\\Models\\User', 1, '[]', NULL, '2024-06-18 19:42:58', '2024-06-18 19:42:58'),
(460, 'New Estimate created.', 'Quote for Air-conditioning split units Estimate created.', 'App\\Models\\Estimate', 14, 'App\\Models\\User', 47, '[]', NULL, '2024-06-18 19:56:10', '2024-06-18 19:56:10'),
(461, 'New Invoice created.', 'Quote for Air-conditioning split units Invoice created.', 'App\\Models\\Invoice', 27, 'App\\Models\\User', 47, '[]', NULL, '2024-06-18 19:56:15', '2024-06-18 19:56:15'),
(462, 'Product deleted.', 'RAS-B24E2KVG-E + RAS-24E2AVG-E Product deleted.', 'App\\Models\\Product', 57, 'App\\Models\\User', 47, '[]', NULL, '2024-06-18 19:58:04', '2024-06-18 19:58:04'),
(463, 'Invoice deleted.', 'Quote for Air-conditioning split units Invoice deleted.', 'App\\Models\\Invoice', 27, 'App\\Models\\User', 47, '[]', NULL, '2024-06-18 19:58:25', '2024-06-18 19:58:25'),
(464, 'New Estimate created.', 'Quote for Air-conditioning split units Estimate created.', 'App\\Models\\Estimate', 15, 'App\\Models\\User', 47, '[]', NULL, '2024-06-18 19:59:07', '2024-06-18 19:59:07'),
(465, 'New Invoice created.', 'Quote for Air-conditioning split units Invoice created.', 'App\\Models\\Invoice', 28, 'App\\Models\\User', 47, '[]', NULL, '2024-06-18 19:59:12', '2024-06-18 19:59:12'),
(466, 'New Estimate created.', 'Quote for Air-conditioning split units Estimate created.', 'App\\Models\\Estimate', 16, 'App\\Models\\User', 47, '[]', NULL, '2024-06-18 20:00:52', '2024-06-18 20:00:52'),
(467, 'New Invoice created.', 'Quote for Air-conditioning split units Invoice created.', 'App\\Models\\Invoice', 29, 'App\\Models\\User', 47, '[]', NULL, '2024-06-18 20:01:00', '2024-06-18 20:01:00'),
(468, 'Product deleted.', 'RAV-HM561BTP-E + RAV-GV561ATP-E Product deleted.', 'App\\Models\\Product', 58, 'App\\Models\\User', 47, '[]', NULL, '2024-06-18 20:01:37', '2024-06-18 20:01:37'),
(469, 'New Estimate created.', 'Quote for Air-conditioning split units Estimate created.', 'App\\Models\\Estimate', 17, 'App\\Models\\User', 47, '[]', NULL, '2024-06-18 20:02:20', '2024-06-18 20:02:20'),
(470, 'New Invoice created.', 'Quote for Air-conditioning split units Invoice created.', 'App\\Models\\Invoice', 30, 'App\\Models\\User', 47, '[]', NULL, '2024-06-18 20:02:23', '2024-06-18 20:02:23'),
(471, 'Payment success.', 'Bank Payment success.', 'App\\Models\\Payment', 10, 'App\\Models\\User', 47, '[]', NULL, '2024-06-18 20:02:56', '2024-06-18 20:02:56'),
(472, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 1, 'App\\Models\\User', 1, '[]', NULL, '2024-06-18 21:51:17', '2024-06-18 21:51:17'),
(473, 'New Ticket created.', ' Ticket created.', 'App\\Models\\Ticket', 6, 'App\\Models\\User', 1, '[]', NULL, '2024-06-18 21:52:07', '2024-06-18 21:52:07'),
(474, 'Ticket updated.', 'Repair Ticket updated.', 'App\\Models\\Ticket', 6, 'App\\Models\\User', 1, '[]', NULL, '2024-06-18 21:52:32', '2024-06-18 21:52:32'),
(475, 'New Payment Mode created.', 'test Payment Mode created.', 'App\\Models\\PaymentMode', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-06-20 00:06:36', '2024-06-20 00:06:36'),
(476, 'New Reminder created.', '<p>the desct</p> Reminder created.', 'App\\Models\\reminder', 1, 'App\\Models\\User', 1, '[]', NULL, '2024-06-22 01:03:26', '2024-06-22 01:03:26'),
(477, 'New Reminder created.', '<p>this description is for the administrator</p> Reminder created.', 'App\\Models\\reminder', 2, 'App\\Models\\User', 1, '[]', NULL, '2024-06-22 01:04:58', '2024-06-22 01:04:58'),
(478, 'New Reminder created.', '<p>this description is for the administrator</p> Reminder created.', 'App\\Models\\reminder', 3, 'App\\Models\\User', 1, '[]', NULL, '2024-06-22 01:08:54', '2024-06-22 01:08:54'),
(479, 'New Reminder created.', '<p>this description is for the administrator</p> Reminder created.', 'App\\Models\\reminder', 4, 'App\\Models\\User', 1, '[]', NULL, '2024-06-22 01:10:10', '2024-06-22 01:10:10'),
(480, 'New Reminder created.', 'please send to the agent email address thanks Reminder created.', 'App\\Models\\reminder', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-06-22 01:18:50', '2024-06-22 01:18:50'),
(481, 'Reminder deleted.', '<p>this description is for the administrator</p> Reminder deleted.', 'App\\Models\\reminder', 2, 'App\\Models\\User', 1, '[]', NULL, '2024-06-22 01:20:01', '2024-06-22 01:20:01'),
(482, 'Reminder deleted.', '<p>this description is for the administrator</p> Reminder deleted.', 'App\\Models\\reminder', 4, 'App\\Models\\User', 1, '[]', NULL, '2024-06-22 01:21:28', '2024-06-22 01:21:28'),
(483, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 2, 'App\\Models\\User', 1, '[]', NULL, '2024-06-26 00:11:50', '2024-06-26 00:11:50'),
(484, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 3, 'App\\Models\\User', 1, '[]', NULL, '2024-06-26 13:48:18', '2024-06-26 13:48:18'),
(485, 'New Expense Category created.', 'thanks all welcome Expense Category created.', 'App\\Models\\ExpenseCategory', 37, 'App\\Models\\User', 1, '[]', NULL, '2024-06-26 16:51:22', '2024-06-26 16:51:22'),
(486, 'Expense Category updated.', 'thanks all .... Expense Category updated.', 'App\\Models\\ExpenseCategory', 36, 'App\\Models\\User', 1, '[]', NULL, '2024-06-27 02:53:57', '2024-06-27 02:53:57'),
(487, 'Expense Category updated.', 'thanks all welcome Expense Category updated.', 'App\\Models\\ExpenseCategory', 37, 'App\\Models\\User', 1, '[]', NULL, '2024-06-27 02:55:34', '2024-06-27 02:55:34'),
(488, 'Expense Category updated.', 'thanks all  great guys Expense Category updated.', 'App\\Models\\ExpenseCategory', 36, 'App\\Models\\User', 1, '[]', NULL, '2024-06-27 02:55:52', '2024-06-27 02:55:52'),
(489, 'Expense Category updated.', 'thanks all  great guys Expense Category updated.', 'App\\Models\\ExpenseCategory', 36, 'App\\Models\\User', 1, '[]', NULL, '2024-06-27 02:56:05', '2024-06-27 02:56:05'),
(490, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 4, 'App\\Models\\User', 1, '[]', NULL, '2024-06-29 23:46:58', '2024-06-29 23:46:58'),
(491, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-06-29 23:47:05', '2024-06-29 23:47:05'),
(492, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 6, 'App\\Models\\User', 1, '[]', NULL, '2024-06-29 23:47:12', '2024-06-29 23:47:12'),
(493, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 7, 'App\\Models\\User', 1, '[]', NULL, '2024-06-29 23:47:19', '2024-06-29 23:47:19'),
(494, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 8, 'App\\Models\\User', 1, '[]', NULL, '2024-06-29 23:47:26', '2024-06-29 23:47:26'),
(495, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 9, 'App\\Models\\User', 1, '[]', NULL, '2024-06-29 23:47:33', '2024-06-29 23:47:33'),
(496, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 10, 'App\\Models\\User', 1, '[]', NULL, '2024-06-29 23:47:40', '2024-06-29 23:47:40'),
(497, 'Predefined Reply deleted.', ' Predefined Reply deleted.', 'App\\Models\\PredefinedReply', 10, 'App\\Models\\User', 1, '[]', NULL, '2024-06-29 23:52:50', '2024-06-29 23:52:50'),
(498, 'Predefined Reply deleted.', ' Predefined Reply deleted.', 'App\\Models\\PredefinedReply', 7, 'App\\Models\\User', 1, '[]', NULL, '2024-06-29 23:52:54', '2024-06-29 23:52:54'),
(499, 'Predefined Reply deleted.', ' Predefined Reply deleted.', 'App\\Models\\PredefinedReply', 5, 'App\\Models\\User', 1, '[]', NULL, '2024-06-29 23:53:20', '2024-06-29 23:53:20'),
(500, 'Predefined Reply deleted.', ' Predefined Reply deleted.', 'App\\Models\\PredefinedReply', 4, 'App\\Models\\User', 1, '[]', NULL, '2024-06-29 23:53:57', '2024-06-29 23:53:57'),
(501, 'Predefined Reply deleted.', ' Predefined Reply deleted.', 'App\\Models\\PredefinedReply', 3, 'App\\Models\\User', 1, '[]', NULL, '2024-06-29 23:54:06', '2024-06-29 23:54:06'),
(502, 'New Expense Category created.', 'different category fields display Expense Category created.', 'App\\Models\\ExpenseCategory', 38, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 00:19:08', '2024-07-01 00:19:08'),
(503, 'New Expense Category created.', 'pleae enter field okay Expense Category created.', 'App\\Models\\ExpenseCategory', 39, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 00:25:30', '2024-07-01 00:25:30'),
(504, 'New Expense Category created.', 'final test on this Expense Category created.', 'App\\Models\\ExpenseCategory', 40, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 00:26:42', '2024-07-01 00:26:42'),
(505, 'Expense Category updated.', 'final test on this Expense Category updated.', 'App\\Models\\ExpenseCategory', 40, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 01:01:37', '2024-07-01 01:01:37'),
(506, 'Predefined Reply deleted.', ' Predefined Reply deleted.', 'App\\Models\\PredefinedReply', 8, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 17:00:48', '2024-07-01 17:00:48'),
(507, 'Predefined Reply deleted.', ' Predefined Reply deleted.', 'App\\Models\\PredefinedReply', 2, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 17:01:19', '2024-07-01 17:01:19'),
(508, 'Predefined Reply deleted.', ' Predefined Reply deleted.', 'App\\Models\\PredefinedReply', 9, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 17:01:27', '2024-07-01 17:01:27'),
(509, 'Predefined Reply deleted.', ' Predefined Reply deleted.', 'App\\Models\\PredefinedReply', 6, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 17:02:21', '2024-07-01 17:02:21'),
(510, 'Predefined Reply deleted.', ' Predefined Reply deleted.', 'App\\Models\\PredefinedReply', 1, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 17:02:31', '2024-07-01 17:02:31'),
(511, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 11, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 17:03:13', '2024-07-01 17:03:13'),
(512, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 12, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 17:03:22', '2024-07-01 17:03:22'),
(513, 'New Predefined Reply created.', ' Predefined Reply created.', 'App\\Models\\PredefinedReply', 13, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 17:03:30', '2024-07-01 17:03:30'),
(514, 'New Expense Category created.', 'category new Expense Category created.', 'App\\Models\\ExpenseCategory', 41, 'App\\Models\\User', 1, '[]', NULL, '2024-07-01 17:05:33', '2024-07-01 17:05:33'),
(515, 'Invoice deleted.', 'Quote for Maintenance Commercial Invoice deleted.', 'App\\Models\\Invoice', 20, 'App\\Models\\User', 1, '[]', NULL, '2024-07-03 00:43:07', '2024-07-03 00:43:07'),
(516, 'Invoice deleted.', 'Quote for Maintenance Commercial Invoice deleted.', 'App\\Models\\Invoice', 22, 'App\\Models\\User', 1, '[]', NULL, '2024-07-03 00:43:13', '2024-07-03 00:43:13'),
(517, 'Invoice deleted.', 'Quote for Maintenance Commercial Invoice deleted.', 'App\\Models\\Invoice', 23, 'App\\Models\\User', 1, '[]', NULL, '2024-07-03 00:43:19', '2024-07-03 00:43:19'),
(518, 'Invoice deleted.', 'Quote for Maintenance Commercial Invoice deleted.', 'App\\Models\\Invoice', 24, 'App\\Models\\User', 1, '[]', NULL, '2024-07-03 00:43:24', '2024-07-03 00:43:24'),
(519, 'Invoice deleted.', 'Quote for Marine Repairs Invoice deleted.', 'App\\Models\\Invoice', 25, 'App\\Models\\User', 1, '[]', NULL, '2024-07-03 00:43:29', '2024-07-03 00:43:29'),
(520, 'Invoice deleted.', 'Quote for Maintenance Commercial Invoice deleted.', 'App\\Models\\Invoice', 26, 'App\\Models\\User', 1, '[]', NULL, '2024-07-03 00:43:35', '2024-07-03 00:43:35'),
(521, 'Invoice deleted.', 'Quote for Air-conditioning split units Invoice deleted.', 'App\\Models\\Invoice', 28, 'App\\Models\\User', 1, '[]', NULL, '2024-07-03 00:43:41', '2024-07-03 00:43:41'),
(522, 'Invoice deleted.', 'Quote for Air-conditioning split units Invoice deleted.', 'App\\Models\\Invoice', 29, 'App\\Models\\User', 1, '[]', NULL, '2024-07-03 00:43:46', '2024-07-03 00:43:46'),
(523, 'Invoice deleted.', 'Quote for Air-conditioning split units Invoice deleted.', 'App\\Models\\Invoice', 30, 'App\\Models\\User', 1, '[]', NULL, '2024-07-03 00:43:58', '2024-07-03 00:43:58'),
(524, 'Invoice deleted.', 'Quote for Maintenance Commercial Invoice deleted.', 'App\\Models\\Invoice', 21, 'App\\Models\\User', 1, '[]', NULL, '2024-07-03 00:44:02', '2024-07-03 00:44:02'),
(525, 'Estimate deleted.', 'Quote for Air-conditioning Others Estimate deleted.', 'App\\Models\\Estimate', 12, 'App\\Models\\User', 1, '[]', NULL, '2024-07-03 00:44:28', '2024-07-03 00:44:28'),
(526, 'New Invoice created.', 'final test on this Invoice created.', 'App\\Models\\Invoice', 31, 'App\\Models\\User', 1, '[]', NULL, '2024-07-03 00:46:09', '2024-07-03 00:46:09'),
(527, 'Payment success.', 'Credit Card Payment success.', 'App\\Models\\Payment', 11, 'App\\Models\\User', 45, '[]', NULL, '2024-07-03 00:55:33', '2024-07-03 00:55:33'),
(528, 'New Product created.', 'warranty title Product created.', 'App\\Models\\Product', 92, 'App\\Models\\User', 1, '[]', NULL, '2024-07-04 01:13:24', '2024-07-04 01:13:24'),
(529, 'New Product created.', 'title Product created.', 'App\\Models\\Product', 93, 'App\\Models\\User', 1, '[]', NULL, '2024-07-04 01:20:28', '2024-07-04 01:20:28'),
(530, 'Product updated.', 'title Product updated.', 'App\\Models\\Product', 93, 'App\\Models\\User', 1, '[]', NULL, '2024-07-04 01:24:32', '2024-07-04 01:24:32'),
(531, 'Product updated.', 'title Product updated.', 'App\\Models\\Product', 93, 'App\\Models\\User', 1, '[]', NULL, '2024-07-04 01:24:50', '2024-07-04 01:24:50'),
(532, 'Product updated.', 'title Product updated.', 'App\\Models\\Product', 93, 'App\\Models\\User', 1, '[]', NULL, '2024-07-04 01:25:36', '2024-07-04 01:25:36'),
(533, 'New Invoice created.', 'category new Invoice created.', 'App\\Models\\Invoice', 32, 'App\\Models\\User', 1, '[]', NULL, '2024-07-04 01:51:59', '2024-07-04 01:51:59'),
(534, 'New Estimate created.', 'category new Estimate created.', 'App\\Models\\Estimate', 18, 'App\\Models\\User', 1, '[]', NULL, '2024-07-04 01:52:38', '2024-07-04 01:52:38'),
(535, 'New Product created.', 'title Product created.', 'App\\Models\\Product', 94, 'App\\Models\\User', 1, '[]', NULL, '2024-07-09 01:16:36', '2024-07-09 01:16:36'),
(536, 'Estimate deleted.', 'Quote for Maintenance Commercial Estimate deleted.', 'App\\Models\\Estimate', 13, 'App\\Models\\User', 1, '[]', NULL, '2024-07-15 01:25:46', '2024-07-15 01:25:46'),
(537, 'Estimate deleted.', 'Quote for Air-conditioning split units Estimate deleted.', 'App\\Models\\Estimate', 14, 'App\\Models\\User', 1, '[]', NULL, '2024-07-15 01:25:56', '2024-07-15 01:25:56'),
(538, 'Estimate deleted.', 'Quote for Air-conditioning split units Estimate deleted.', 'App\\Models\\Estimate', 15, 'App\\Models\\User', 1, '[]', NULL, '2024-07-15 01:26:05', '2024-07-15 01:26:05'),
(539, 'Estimate deleted.', 'Quote for Air-conditioning split units Estimate deleted.', 'App\\Models\\Estimate', 16, 'App\\Models\\User', 1, '[]', NULL, '2024-07-15 01:26:12', '2024-07-15 01:26:12'),
(540, 'Estimate deleted.', 'Quote for Air-conditioning split units Estimate deleted.', 'App\\Models\\Estimate', 17, 'App\\Models\\User', 1, '[]', NULL, '2024-07-15 01:26:19', '2024-07-15 01:26:19'),
(541, 'Estimate deleted.', 'category new Estimate deleted.', 'App\\Models\\Estimate', 18, 'App\\Models\\User', 1, '[]', NULL, '2024-07-15 01:26:25', '2024-07-15 01:26:25'),
(542, 'Invoice deleted.', 'final test on this Invoice deleted.', 'App\\Models\\Invoice', 31, 'App\\Models\\User', 1, '[]', NULL, '2024-07-15 01:27:26', '2024-07-15 01:27:26'),
(543, 'Invoice deleted.', 'category new Invoice deleted.', 'App\\Models\\Invoice', 32, 'App\\Models\\User', 1, '[]', NULL, '2024-07-15 01:27:32', '2024-07-15 01:27:32'),
(544, 'New Estimate created.', 'category new Estimate created.', 'App\\Models\\Estimate', 19, 'App\\Models\\User', 1, '[]', NULL, '2024-07-15 02:17:20', '2024-07-15 02:17:20'),
(545, 'New Estimate created.', 'final test on this Estimate created.', 'App\\Models\\Estimate', 20, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 00:48:34', '2024-07-16 00:48:34'),
(546, 'Estimate updated.', 'final test on this Estimate updated.', 'App\\Models\\Estimate', 20, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 00:56:48', '2024-07-16 00:56:48'),
(547, 'Estimate deleted.', 'final test on this Estimate deleted.', 'App\\Models\\Estimate', 20, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 00:57:15', '2024-07-16 00:57:15'),
(548, 'Estimate deleted.', 'category new Estimate deleted.', 'App\\Models\\Estimate', 19, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 00:57:20', '2024-07-16 00:57:20'),
(549, 'New Estimate created.', 'category new Estimate created.', 'App\\Models\\Estimate', 21, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 00:59:41', '2024-07-16 00:59:41'),
(550, 'Estimate updated.', 'category new Estimate updated.', 'App\\Models\\Estimate', 21, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 01:05:55', '2024-07-16 01:05:55'),
(551, 'New Invoice created.', 'category new Invoice created.', 'App\\Models\\Invoice', 33, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 01:11:24', '2024-07-16 01:11:24'),
(552, 'Invoice deleted.', 'category new Invoice deleted.', 'App\\Models\\Invoice', 33, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 01:11:58', '2024-07-16 01:11:58'),
(553, 'Estimate updated.', 'category new Estimate updated.', 'App\\Models\\Estimate', 21, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 01:12:20', '2024-07-16 01:12:20'),
(554, 'New Invoice created.', 'category new Invoice created.', 'App\\Models\\Invoice', 34, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 01:15:20', '2024-07-16 01:15:20'),
(555, 'New Estimate created.', 'category new Estimate created.', 'App\\Models\\Estimate', 22, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 01:18:32', '2024-07-16 01:18:32'),
(556, 'New Invoice created.', 'category new Invoice created.', 'App\\Models\\Invoice', 35, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 01:18:48', '2024-07-16 01:18:48'),
(557, 'New Invoice created.', 'category new Invoice created.', 'App\\Models\\Invoice', 36, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 01:18:53', '2024-07-16 01:18:53'),
(558, 'Invoice deleted.', 'category new Invoice deleted.', 'App\\Models\\Invoice', 34, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 23:30:06', '2024-07-16 23:30:06'),
(559, 'Invoice deleted.', 'category new Invoice deleted.', 'App\\Models\\Invoice', 35, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 23:30:13', '2024-07-16 23:30:13'),
(560, 'Invoice deleted.', 'category new Invoice deleted.', 'App\\Models\\Invoice', 36, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 23:30:20', '2024-07-16 23:30:20'),
(561, 'Estimate deleted.', 'category new Estimate deleted.', 'App\\Models\\Estimate', 22, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 23:30:33', '2024-07-16 23:30:33'),
(562, 'Estimate deleted.', 'category new Estimate deleted.', 'App\\Models\\Estimate', 21, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 23:30:42', '2024-07-16 23:30:42'),
(563, 'New Estimate created.', 'pleae enter field okay Estimate created.', 'App\\Models\\Estimate', 23, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 23:31:39', '2024-07-16 23:31:39'),
(564, 'New Invoice created.', 'pleae enter field okay Invoice created.', 'App\\Models\\Invoice', 37, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 23:32:11', '2024-07-16 23:32:11'),
(565, 'New Invoice created.', 'pleae enter field okay Invoice created.', 'App\\Models\\Invoice', 38, 'App\\Models\\User', 1, '[]', NULL, '2024-07-16 23:36:12', '2024-07-16 23:36:12'),
(566, 'Invoice updated.', 'pleae enter field okay Invoice updated.', 'App\\Models\\Invoice', 37, 'App\\Models\\User', 1, '[]', NULL, '2024-07-17 00:05:17', '2024-07-17 00:05:17'),
(567, 'New Product created.', 'new product testing title Product created.', 'App\\Models\\Product', 95, 'App\\Models\\User', 1, '[]', NULL, '2024-07-17 00:47:15', '2024-07-17 00:47:15'),
(568, 'Product updated.', 'new product testing title 32323 Product updated.', 'App\\Models\\Product', 95, 'App\\Models\\User', 1, '[]', NULL, '2024-07-17 00:47:40', '2024-07-17 00:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(191) DEFAULT NULL,
  `street` varchar(191) DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `zip` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `locality` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `billing_id` int(11) DEFAULT NULL,
  `mapaddress` text DEFAULT NULL,
  `latlog` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `owner_id`, `owner_type`, `street`, `city`, `state`, `zip`, `country`, `type`, `locality`, `created_at`, `updated_at`, `billing_id`, `mapaddress`, `latlog`) VALUES
(1, 3, 'App\\Models\\Customer', 'Triq il Gerbula', 'Mosta', 'Malta', '031455', '10', 'Shipping Address', NULL, '2023-06-26 12:20:14', '2023-06-26 12:20:14', NULL, NULL, NULL),
(4, 3, 'App\\Models\\Customer', 'Triq il Gerbula', NULL, NULL, '031455', '10', 'Billing Address', 'Attard', '2023-07-03 15:54:21', '2024-02-26 15:42:47', NULL, 'Attard Football Club', 'LatLng(35.8905, 14.44115)'),
(5, 3, 'App\\Models\\Customer', 'Triq il Gerbula', NULL, NULL, '031455', '10', 'Shipping Address', 'Attard', '2023-07-03 15:54:21', '2024-02-26 15:42:47', 4, 'Attard, Reġjun tat-Tramuntana', 'LatLng(35.89025, 14.44496)'),
(6, 3, 'App\\Models\\Customer', '31', NULL, NULL, 'MTF1120', '10', 'Billing Address', 'Imtarfa', '2023-07-03 15:54:52', '2024-02-29 21:58:13', NULL, 'Triq Sir Philip Pullicino, Mtarfa, Reġjun tat-Tramuntana, MTF', 'LatLng(35.888655, 14.39322)'),
(7, 3, 'App\\Models\\Customer', 'Test 2', NULL, NULL, '031455', '10', 'Shipping Address', 'Imtarfa', '2023-07-03 15:54:52', '2024-02-29 21:58:13', 6, 'Attard, Reġjun tat-Tramuntana', 'LatLng(35.89025, 14.44496)'),
(14, 7, 'App\\Models\\Customer', 'CASSAR CAMILLERI ZWEJT STREET', NULL, NULL, NULL, '10', 'Billing Address', 'San Ġwann', '2024-02-09 07:26:36', '2024-02-23 12:00:40', NULL, 'San Gwann, Regjun tat-Tramuntana', 'LatLng(35.90905, 14.48107)'),
(15, 7, 'App\\Models\\Customer', 'Ardent Business Centre, Triq L-Ortatorju', NULL, NULL, '2504', '10', 'Shipping Address', 'Naxxar', '2024-02-09 07:26:36', '2024-02-23 12:00:40', 14, 'Naxxar, In-Naxxar', 'LatLng(35.91361, 14.44361)'),
(18, 7, 'App\\Models\\Customer', 'CASSAR CAMILLERI ZWEJT STREET', NULL, NULL, NULL, '10', 'Billing Address', 'San Ġwann', '2024-02-23 11:59:55', '2024-02-23 11:59:55', NULL, 'San Gwann, Regjun tat-Tramuntana', 'LatLng(35.90905, 14.48107)'),
(19, 7, 'App\\Models\\Customer', 'Ardent Business Centre, Triq L-Ortatorju', NULL, NULL, '2504', '10', 'Shipping Address', 'Naxxar', '2024-02-23 11:59:55', '2024-02-23 11:59:55', 18, 'Naxxar, Reġjun tat-Tramuntana', 'LatLng(35.91327, 14.44362)'),
(20, 9, 'App\\Models\\Customer', '25', NULL, NULL, 'HMR-1532', '10', 'Billing Address', 'Ħamrun', '2024-02-29 22:00:55', '2024-02-29 22:02:18', NULL, 'Triq il-Marsa, Ħamrun, Reġjun tan-Nofsinhar, HMR', 'LatLng(35.884565, 14.48946)'),
(21, 9, 'App\\Models\\Customer', '25', NULL, NULL, 'HMR-1532', '10', 'Shipping Address', 'Ħamrun', '2024-02-29 22:00:55', '2024-02-29 22:02:18', 20, 'Triq il-Marsa, Ħamrun, Reġjun tan-Nofsinhar, HMR', 'LatLng(35.884565, 14.48946)'),
(22, 10, 'App\\Models\\Customer', '1', NULL, NULL, 'BKR 3000', '10', 'Billing Address', 'Birkirkara', '2024-04-08 18:26:53', '2024-04-08 18:30:43', NULL, 'Triq il-Ferrovija, Birkirkara, Reġjun tal-Lvant, BKR', 'LatLng(35.893735, 14.47365)'),
(23, 10, 'App\\Models\\Customer', '30', NULL, NULL, NULL, '10', 'Shipping Address', 'Qrendi', '2024-04-08 18:26:53', '2024-04-08 18:30:43', 22, 'Triq Guze\' Duca, Hal Qormi, Regjun tan-Nofsinhar, QRM', 'LatLng(35.87478, 14.468525)'),
(24, 11, 'App\\Models\\Customer', '31', NULL, NULL, 'MTF1120', '10', 'Billing Address', 'Imtarfa', '2024-04-12 18:45:49', '2024-04-12 18:48:41', NULL, 'Triq Sir Philip Pullicino, Mtarfa, Reġjun tat-Tramuntana, MTF', 'LatLng(35.888655, 14.39322)'),
(25, 11, 'App\\Models\\Customer', '31', NULL, NULL, 'MTF1120', '10', 'Shipping Address', NULL, '2024-04-12 18:45:49', '2024-04-12 18:48:41', 24, 'Triq Sir Philip Pullicino, Mtarfa, Reġjun tat-Tramuntana, MTF', 'LatLng(35.888655, 14.39322)');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) NOT NULL,
  `date` datetime NOT NULL,
  `message` text DEFAULT NULL,
  `show_to_clients` tinyint(1) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `subject`, `date`, `message`, `show_to_clients`, `status`, `created_at`, `updated_at`) VALUES
(1, 'new', '2023-06-29 01:00:00', '<p>testing</p>', 1, 0, '2023-06-29 05:56:20', '2023-06-29 05:56:20'),
(2, 'testing', '2023-08-23 05:00:00', '<p>hello</p>', 1, 0, '2023-08-02 05:49:30', '2023-08-02 05:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `internal_article` tinyint(1) DEFAULT NULL,
  `disabled` tinyint(1) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_groups`
--

CREATE TABLE `article_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_name` varchar(191) NOT NULL,
  `color` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_type` varchar(191) NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `position` varchar(191) DEFAULT NULL,
  `primary_contact` tinyint(1) NOT NULL DEFAULT 0,
  `send_welcome_email` tinyint(1) NOT NULL DEFAULT 0,
  `send_password_email` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `customer_id`, `user_id`, `position`, `primary_contact`, `send_welcome_email`, `send_password_email`, `created_at`, `updated_at`) VALUES
(2, 3, 12, 'Facilities Manager', 1, 0, 0, '2023-06-27 13:34:21', '2023-06-27 13:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_email_notifications`
--

CREATE TABLE `contact_email_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL,
  `email_notification_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `contract_value` double DEFAULT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `contract_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `subject`, `description`, `start_date`, `end_date`, `contract_value`, `customer_id`, `contract_type_id`, `created_at`, `updated_at`) VALUES
(1, 'Test 1', NULL, '2023-06-20 08:00:00', NULL, 15000, 3, 9, '2023-06-28 05:26:27', '2023-06-28 05:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `contract_types`
--

CREATE TABLE `contract_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_types`
--

INSERT INTO `contract_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(9, 'Test Type', NULL, '2023-01-11 22:50:13', '2023-06-28 05:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Gozo', '2023-01-11 22:50:14', '2023-06-29 05:36:31'),
(10, 'Malta', '2023-06-19 15:25:07', '2023-06-19 15:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `credit_notes`
--

CREATE TABLE `credit_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `credit_note_number` varchar(191) NOT NULL,
  `credit_note_date` datetime NOT NULL,
  `currency` int(11) NOT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `reference` varchar(191) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `admin_text` text DEFAULT NULL,
  `unit` int(11) NOT NULL,
  `client_note` text DEFAULT NULL,
  `term_conditions` text DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `adjustment` varchar(191) NOT NULL DEFAULT '0',
  `total_amount` double DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `discount_symbol` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_note_addresses`
--

CREATE TABLE `credit_note_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `credit_note_id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `street` text DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `zip_code` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) DEFAULT NULL,
  `vat_number` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `website` varchar(191) DEFAULT NULL,
  `currency` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `default_language` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `company_name`, `vat_number`, `phone`, `website`, `currency`, `country`, `default_language`, `created_at`, `updated_at`, `client_name`) VALUES
(1, 'itwtech', '1234', '+919053301171', 'http://itwtech.net', '2', '2', 'en', '2023-04-20 12:32:07', '2023-04-20 12:32:07', NULL),
(3, 'Parliament Malta', '1234568MT', NULL, NULL, NULL, '10', 'en', '2023-06-20 12:00:07', '2024-02-26 15:42:58', 'Parliament Malta'),
(4, 'olotoglobal foundation', '123', '+2348160492362', 'http://power.com.ng', '3', '2', 'en', '2023-06-21 12:46:41', '2023-06-29 06:02:25', NULL),
(6, 'MUSCAT GROUP', 'MT 9653352', NULL, NULL, '3', '10', 'en', '2023-10-23 11:00:16', '2023-10-23 11:00:16', NULL),
(7, 'Cammast Properties Ltd', 'MT11315221', '+35699123456', NULL, NULL, '10', 'en', '2024-02-09 07:18:58', '2024-02-09 07:24:11', NULL),
(9, '12.8 Ventures', 'MT15641561', '+35621249200', NULL, '3', '10', 'en', '2024-02-29 22:00:55', '2024-02-29 22:00:55', 'Wayne Mizzi Ungaro'),
(10, 'Company name 1', '43214321', '+35621498658', 'http://www.test.com', '3', '10', NULL, '2024-04-08 18:26:53', '2024-04-08 18:26:53', 'Test Customer 1'),
(11, 'Testing Company', 'MT4456654', '+35679306383', NULL, '3', '10', NULL, '2024-04-12 18:45:48', '2024-04-12 18:50:28', 'Jake');

-- --------------------------------------------------------

--
-- Table structure for table `customer_groups`
--

CREATE TABLE `customer_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_groups`
--

INSERT INTO `customer_groups` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'VIP', 'This is VIP', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(6, 'Govenment Organizations', NULL, '2023-06-20 11:58:43', '2023-06-20 11:58:43'),
(7, 'Third Part Organizations', NULL, '2023-06-20 11:59:08', '2023-06-20 11:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `customer_to_customer_groups`
--

CREATE TABLE `customer_to_customer_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_to_customer_groups`
--

INSERT INTO `customer_to_customer_groups` (`id`, `customer_id`, `customer_group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2023-04-20 12:32:07', '2023-04-20 12:32:07'),
(2, 3, 6, '2023-06-20 12:00:07', '2023-06-20 12:00:07'),
(3, 4, 3, '2023-06-21 12:46:42', '2023-06-21 12:46:42'),
(5, 6, 7, '2023-10-23 11:00:16', '2023-10-23 11:00:16'),
(6, 7, 3, '2024-02-09 07:18:58', '2024-02-09 07:18:58'),
(8, 9, 7, '2024-02-29 22:00:55', '2024-02-29 22:00:55'),
(9, 10, 7, '2024-04-08 18:26:53', '2024-04-08 18:26:53'),
(10, 11, 3, '2024-04-12 18:45:49', '2024-04-12 18:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Marketing Department', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(2, 'Operations Department', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(3, 'Finance Department', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(4, 'Sales Department', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(5, 'Human Resource Department', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(6, 'Purchase Department', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(7, 'After Sales', '2023-06-27 05:14:39', '2023-06-27 05:14:39');

-- --------------------------------------------------------

--
-- Table structure for table `email_notifications`
--

CREATE TABLE `email_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `template_name` varchar(191) NOT NULL,
  `template_type` int(11) NOT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `from_name` varchar(191) NOT NULL,
  `send_plain_text` tinyint(1) NOT NULL DEFAULT 0,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `email_message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `estimates`
--

CREATE TABLE `estimates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `estimate_number` varchar(191) NOT NULL,
  `reference` varchar(191) DEFAULT NULL,
  `sales_agent_id` int(10) UNSIGNED DEFAULT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `estimate_date` datetime NOT NULL,
  `estimate_expiry_date` datetime DEFAULT NULL,
  `admin_note` text DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `unit` int(11) NOT NULL,
  `sub_total` double DEFAULT NULL,
  `adjustment` varchar(191) NOT NULL DEFAULT '0',
  `client_note` text DEFAULT NULL,
  `term_conditions` text DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `discount_symbol` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hsn_tax` varchar(191) DEFAULT NULL,
  `discount_approved` varchar(11) DEFAULT NULL,
  `is_admin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estimates`
--

INSERT INTO `estimates` (`id`, `title`, `customer_id`, `status`, `currency`, `estimate_number`, `reference`, `sales_agent_id`, `discount_type`, `estimate_date`, `estimate_expiry_date`, `admin_note`, `discount`, `unit`, `sub_total`, `adjustment`, `client_note`, `term_conditions`, `total_amount`, `discount_symbol`, `created_at`, `updated_at`, `hsn_tax`, `discount_approved`, `is_admin`) VALUES
(23, 'pleae enter field okay', 11, 0, 3, 'SAD1-0001', NULL, 1, 2, '2024-07-17 00:30:45', '2024-08-15 23:30:45', 'This is the admin note of the CutricoCRM project.', 0, 1, 40, '0', 'This is the client note of the CutricoCRM project.', NULL, 47.2, 1, '2024-07-16 23:31:39', '2024-07-16 23:31:39', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `estimate_addresses`
--

CREATE TABLE `estimate_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `estimate_id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `street` text DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `zip_code` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `billing_id` int(11) DEFAULT NULL,
  `latlog` text DEFAULT NULL,
  `mapaddress` text DEFAULT NULL,
  `locality` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estimate_addresses`
--

INSERT INTO `estimate_addresses` (`id`, `estimate_id`, `type`, `street`, `city`, `state`, `zip_code`, `country`, `created_at`, `updated_at`, `billing_id`, `latlog`, `mapaddress`, `locality`) VALUES
(50, 23, 1, '31', 'Imtarfa', 'Imtarfa', 'MTF1120', 'Malta', '2024-07-16 23:31:39', '2024-07-16 23:31:39', NULL, 'LatLng(35.888655, 14.39322)', 'Triq Sir Philip Pullicino, Mtarfa, Reġjun tat-Tramuntana, MTF', 'Imtarfa'),
(51, 23, 2, '31', NULL, NULL, 'MTF1120', 'Malta', '2024-07-16 23:31:39', '2024-07-16 23:31:39', 50, 'LatLng(35.888655, 14.39322)', 'Triq Sir Philip Pullicino, Mtarfa, Reġjun tat-Tramuntana, MTF', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `note` text DEFAULT NULL,
  `expense_category_id` int(10) UNSIGNED NOT NULL,
  `expense_date` datetime NOT NULL,
  `amount` double NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `currency` int(11) NOT NULL,
  `tax_applied` tinyint(1) NOT NULL DEFAULT 0,
  `tax_1_id` int(10) UNSIGNED DEFAULT NULL,
  `tax_2_id` int(10) UNSIGNED DEFAULT NULL,
  `tax_rate` double DEFAULT NULL,
  `payment_mode_id` int(10) UNSIGNED DEFAULT NULL,
  `reference` varchar(191) DEFAULT NULL,
  `billable` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `term` text DEFAULT NULL,
  `predefined_field` text DEFAULT NULL,
  `predefined_value` text DEFAULT NULL,
  `predefined_label` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `term`, `predefined_field`, `predefined_value`, `predefined_label`) VALUES
(16, 'Quote for Air-conditioning split units', NULL, '2024-02-11 08:43:01', '2024-02-11 08:43:01', NULL, NULL, NULL, NULL),
(17, 'Quote for Air-conditioning VRF units', NULL, '2024-02-11 08:43:21', '2024-02-11 08:43:21', NULL, NULL, NULL, NULL),
(18, 'Quote for Air-conditioning Industrial units', NULL, '2024-02-11 08:43:30', '2024-02-11 08:43:30', NULL, NULL, NULL, NULL),
(19, 'Quote for Air-conditioning Others', NULL, '2024-02-11 08:43:37', '2024-02-11 08:43:37', NULL, NULL, NULL, NULL),
(20, 'Quote for Electric Under Floor Heating', NULL, '2024-02-11 08:43:44', '2024-02-11 08:43:44', NULL, NULL, NULL, NULL),
(21, 'Quote for Hydronic Under Floor Heating', NULL, '2024-02-11 08:43:52', '2024-02-11 08:43:52', NULL, NULL, NULL, NULL),
(22, 'Quote for Heating Equipment', NULL, '2024-02-11 08:43:58', '2024-02-11 08:43:58', NULL, NULL, NULL, NULL),
(23, 'Quote for Fireplace', NULL, '2024-02-11 08:44:05', '2024-02-11 08:44:05', NULL, NULL, NULL, NULL),
(24, 'Quote for Ventilation Equipment', NULL, '2024-02-11 08:44:11', '2024-02-11 08:44:11', NULL, NULL, NULL, NULL),
(25, 'Quote for Ventilation System', NULL, '2024-02-11 08:44:18', '2024-02-11 08:44:18', NULL, NULL, NULL, NULL),
(26, 'Quote for Air Purification', NULL, '2024-02-11 08:44:25', '2024-02-11 08:44:25', NULL, NULL, NULL, NULL),
(27, 'Quote for Marine Air-conditioning', NULL, '2024-02-11 08:44:41', '2024-02-11 08:44:41', NULL, NULL, NULL, NULL),
(28, 'Quote for Marine Refrigeration', NULL, '2024-02-11 08:45:07', '2024-02-11 08:45:07', NULL, NULL, NULL, NULL),
(29, 'Quote for Marine Water Maker', NULL, '2024-02-11 08:45:16', '2024-02-11 08:45:16', NULL, NULL, NULL, NULL),
(30, 'Quote for Marine Sewage Treatment Plant', NULL, '2024-02-11 08:46:01', '2024-02-11 08:46:01', NULL, NULL, NULL, NULL),
(31, 'Quote for Marine Repairs', NULL, '2024-02-11 08:46:09', '2024-02-11 08:46:09', NULL, NULL, NULL, NULL),
(32, 'Quote for Marine Others', NULL, '2024-02-11 08:46:23', '2024-02-11 08:46:23', NULL, NULL, NULL, NULL),
(33, 'Quote for Maintenance Domestic', NULL, '2024-02-11 08:46:32', '2024-02-11 08:46:32', NULL, NULL, NULL, NULL),
(34, 'Quote for Maintenance Commercial', NULL, '2024-02-11 08:46:38', '2024-04-26 19:24:15', 'terms and conditions TEST FOR THEMAINTANCE', NULL, NULL, NULL),
(36, 'thanks all  great guys', '<p>tite</p>', '2024-06-26 16:50:48', '2024-06-27 02:56:05', '<p>terms and conde</p>', '[\"project3\",\"another one okay\"]', NULL, NULL),
(37, 'thanks all welcome', '<p>tite</p>', '2024-06-26 16:51:21', '2024-06-27 02:55:34', '<p>terms and conde tha</p>', '[\"another one okay\",\"noted\"]', NULL, NULL),
(38, 'different category fields display', NULL, '2024-07-01 00:19:08', '2024-07-01 00:19:08', NULL, NULL, NULL, NULL),
(39, 'pleae enter field okay', NULL, '2024-07-01 00:25:30', '2024-07-01 00:25:30', NULL, NULL, NULL, NULL),
(40, 'final test on this', NULL, '2024-07-01 00:26:42', '2024-07-01 01:01:37', NULL, NULL, '[\"field 10\",\"field 9\",\"field 7\",\"another one okay\",\"nopted\"]', '[\"field 10\",\"field 9\",\"field 7\",\"another one okay\",\"noted\"]'),
(41, 'category new', NULL, '2024-07-01 17:05:33', '2024-07-01 17:05:33', NULL, NULL, '[\"field one\",\"field two\",\"field three\"]', '[\"field 3\",\"field 2\",\"field 1\"]');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) DEFAULT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `goal_type` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `achievement` double DEFAULT NULL,
  `is_notify` tinyint(1) DEFAULT NULL,
  `is_not_notify` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goal_members`
--

CREATE TABLE `goal_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `goal_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goal_types`
--

CREATE TABLE `goal_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `installation_notes`
--

CREATE TABLE `installation_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `predefined_fields` text DEFAULT NULL,
  `predefined_value` text DEFAULT NULL,
  `predefined_label` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installation_notes`
--

INSERT INTO `installation_notes` (`id`, `invoice_id`, `note`, `type`, `created_at`, `updated_at`, `predefined_fields`, `predefined_value`, `predefined_label`) VALUES
(1, 13, 'Step 1 finished', 'Pause Installation  Note', '2024-02-29 22:09:22', '2024-02-29 22:09:22', NULL, NULL, NULL),
(2, 13, 'Step 2 finished', 'Pause Installation  Note', '2024-02-29 22:09:39', '2024-02-29 22:09:39', NULL, NULL, NULL),
(3, 13, 'Project finished', 'End Installation  Note', '2024-02-29 22:10:16', '2024-02-29 22:10:16', NULL, NULL, NULL),
(4, 16, 'To continue after gypsum ', 'Pause Installation  Note', '2024-04-08 18:48:59', '2024-04-08 18:48:59', NULL, NULL, NULL),
(5, 16, 'Installation complete.installed 4 meters extra copper. ACs commissioned', 'End Installation  Note', '2024-04-08 18:50:13', '2024-04-08 18:50:13', NULL, NULL, NULL),
(6, 19, 'AC done', 'End Installation  Note', '2024-05-08 16:40:05', '2024-05-08 16:40:05', NULL, NULL, NULL),
(8, 21, 'Break', 'Pause Installation  Note', '2024-05-17 14:21:10', '2024-05-17 14:21:10', NULL, NULL, NULL),
(9, 21, 'Finished Installing Humidifier with serial no 123456', 'Pause Installation  Note', '2024-05-17 14:22:10', '2024-05-17 14:22:10', NULL, NULL, NULL),
(10, 21, 'Prepared Extra Copper for AC UNIT', 'Pause Installation  Note', '2024-05-17 14:23:01', '2024-05-17 14:23:01', NULL, NULL, NULL),
(11, 21, 'Finished Installation Of AC with serial no QFDF47487983FFD', 'Pause Installation  Note', '2024-05-17 14:24:47', '2024-05-17 14:24:47', NULL, NULL, NULL),
(12, 21, 'Finished Installation and finishing touches. Warranty will start now', 'End Installation  Note', '2024-05-17 14:25:19', '2024-05-17 14:25:19', NULL, NULL, NULL),
(13, 22, 'Finished', 'End Installation  Note', '2024-05-17 14:45:20', '2024-05-17 14:45:20', NULL, NULL, NULL),
(14, 23, 'done', 'End Installation  Note', '2024-05-17 14:48:43', '2024-05-17 14:48:43', NULL, NULL, NULL),
(16, 30, 'AC installed.Copper lengths 5 mtrs Drains prepared by client', 'End Installation  Note', '2024-06-18 20:09:22', '2024-06-18 20:09:22', NULL, NULL, NULL),
(20, 20, 'helo 2', 'End Installation  Note', '2024-06-26 04:17:14', '2024-06-26 04:17:14', NULL, NULL, NULL),
(21, 20, 'another key', 'End Installation  Note', '2024-06-26 04:21:15', '2024-06-26 04:21:15', NULL, NULL, NULL),
(22, 20, 'thanks guusr', 'End Installation  Note', '2024-06-26 04:24:11', '2024-06-26 04:24:11', NULL, NULL, NULL),
(23, 20, 'helo 2', 'End Installation  Note', '2024-06-26 04:27:32', '2024-06-26 04:27:32', NULL, NULL, NULL),
(24, 20, 'please', 'End Installation  Note', '2024-06-26 04:27:54', '2024-06-26 04:27:54', NULL, NULL, NULL),
(25, 20, 'please', 'End Installation  Note', '2024-06-26 04:30:57', '2024-06-26 04:30:57', NULL, NULL, NULL),
(26, 20, 'thanks guusr', 'End Installation  Note', '2024-06-26 04:32:49', '2024-06-26 04:32:49', '[\"another one okay\",\"noted\"]', NULL, NULL),
(27, 20, 'pleae we need to conclude thanks', 'End Installation  Note', '2024-06-26 04:34:21', '2024-06-26 04:34:21', '[\"another one okay\",\"noted\"]', NULL, NULL),
(28, 20, 'please end it will string only', 'End Installation  Note', '2024-06-26 04:37:15', '2024-06-26 04:37:15', 'another one okay, noted', NULL, NULL),
(29, 20, 'thanks', 'End Installation  Note', '2024-06-26 13:48:56', '2024-06-26 13:48:56', 'another one okay, noted', NULL, NULL),
(30, 20, 'pause installation note', 'Pause Installation  Note', '2024-06-26 13:51:35', '2024-06-26 13:51:35', NULL, NULL, NULL),
(31, 20, 'this is installation noted  thanks for the message.', 'End Installation  Note', '2024-06-26 14:10:37', '2024-06-26 14:10:37', 'another one okay, noted', NULL, NULL),
(32, 20, 'Please end the installation now', 'End Installation  Note', '2024-06-26 14:11:41', '2024-06-26 14:11:41', 'project3, noted', NULL, NULL),
(33, 20, 'please pause the installation okay', 'Pause Installation  Note', '2024-06-26 14:19:25', '2024-06-26 14:19:25', NULL, NULL, NULL),
(34, 20, 'Please we need this to pause now okay!!', 'Pause Installation  Note', '2024-06-26 14:21:06', '2024-06-26 14:21:06', 'project3, another one okay', NULL, NULL),
(35, 20, 'end it niw', 'End Installation  Note', '2024-06-30 00:22:15', '2024-06-30 00:22:15', NULL, '[\"fied  10 value\",\"fied  10 value\",\"fied  10 value\",\"\",\"\"]', '[\"field 10\",\"field 9\",\"field 7\",\"another one okay\",\"noted\"]'),
(36, 20, 'testing field', 'End Installation  Note', '2024-06-30 00:51:43', '2024-06-30 00:51:43', NULL, '[\"fiedl 10\",\"fiedld 9\",\"fiedl 7\",\"\",\"\"]', '[\"field 10\",\"field 9\",\"field 7\",\"another one okay\",\"noted\"]'),
(37, 20, 'please end installation now thanks', 'End Installation  Note', '2024-07-01 01:03:11', '2024-07-01 01:03:11', NULL, '[\"field 10 \",\"fiedl  9\",\"\",\"\",\"\"]', '[\"field 10\",\"field 9\",\"field 7\",\"another one okay\",\"noted\"]'),
(38, 20, 'this is to test thing oka', 'End Installation  Note', '2024-07-01 01:38:11', '2024-07-01 01:38:11', NULL, '[\"field 10\",\"field 9\",\"\",\"\",\"\"]', '[\"field 10\",\"field 9\",\"field 7\",\"another one okay\",\"noted\"]'),
(39, 20, 'this is to test thing oka', 'End Installation  Note', '2024-07-01 01:38:55', '2024-07-01 01:38:55', NULL, '[\"field 10\",\"field 9\",\"\",\"\",\"\"]', '[\"field 10\",\"field 9\",\"field 7\",\"another one okay\",\"noted\"]'),
(40, 20, 'the end installatiin of note is here...', 'End Installation  Note', '2024-07-01 01:44:04', '2024-07-01 01:44:04', NULL, '[\"field  10\",\"field  9\",\"field 7\",\"\",\"\"]', '[\"field 10\",\"field 9\",\"field 7\",\"another one okay\",\"noted\"]'),
(41, 20, 'please pause the installation  okay', 'Pause Installation  Note', '2024-07-01 01:53:51', '2024-07-01 01:53:51', NULL, NULL, NULL),
(42, 20, 'end the installation guy thanks', 'End Installation  Note', '2024-07-01 01:54:22', '2024-07-01 01:54:22', NULL, '[\"\",\"\",\"\",\"another one okay\",\"\"]', '[\"field 10\",\"field 9\",\"field 7\",\"another one okay\",\"noted\"]'),
(43, 20, 'pLease end the installation now gus', 'End Installation  Note', '2024-07-01 01:55:48', '2024-07-01 01:55:48', NULL, '[\"\",\"\",\"field 7\",\"\",\"\"]', '[\"field 10\",\"field 9\",\"field 7\",\"another one okay\",\"noted\"]'),
(44, 20, 'end note', 'End Installation  Note', '2024-07-01 17:04:32', '2024-07-01 17:04:32', NULL, '[\"field 3\",\"one\",\"two\"]', '[\"field 3\",\"field 2\",\"field 1\"]'),
(45, 31, 'End installation of the invoice', 'End Installation  Note', '2024-07-03 00:50:13', '2024-07-03 00:50:13', NULL, '[\"field 3\",\"field 3\",\"\"]', '[\"field 3\",\"field 2\",\"field 1\"]'),
(46, 32, 'done okay', 'End Installation  Note', '2024-07-04 01:57:04', '2024-07-04 01:57:04', NULL, '[\"\",\"\",\"\"]', '[\"field 3\",\"field 2\",\"field 1\"]'),
(47, 34, 'yes end the installation okay !', 'End Installation  Note', '2024-07-16 01:20:56', '2024-07-16 01:20:56', NULL, '[\"\",\"\",\"\"]', '[\"field 3\",\"field 2\",\"field 1\"]'),
(48, 35, 'doib', 'End Installation  Note', '2024-07-16 02:10:38', '2024-07-16 02:10:38', NULL, '[\"\",\"\",\"\"]', '[\"field 3\",\"field 2\",\"field 1\"]'),
(49, 37, 'please end the installation okay!!', 'End Installation  Note', '2024-07-16 23:47:59', '2024-07-16 23:47:59', NULL, '[\"\",\"\",\"\"]', '[\"field 3\",\"field 2\",\"field 1\"]');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `invoice_number` varchar(191) NOT NULL,
  `invoice_date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `sales_agent_id` int(10) UNSIGNED DEFAULT NULL,
  `currency` int(11) NOT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `admin_text` text DEFAULT NULL,
  `unit` int(11) NOT NULL,
  `client_note` text DEFAULT NULL,
  `term_conditions` text DEFAULT NULL,
  `sub_total` double DEFAULT NULL,
  `adjustment` varchar(191) NOT NULL DEFAULT '0',
  `total_amount` double DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `discount_symbol` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hsn_tax` varchar(191) DEFAULT NULL,
  `job_done` int(11) DEFAULT 0,
  `installation_date` text DEFAULT NULL,
  `employees` text DEFAULT NULL,
  `lat` text DEFAULT NULL,
  `longitude` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `map` text DEFAULT NULL,
  `warranty` int(11) DEFAULT NULL,
  `progress` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `pause_date` datetime DEFAULT NULL,
  `resume_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `discount_approved` varchar(11) DEFAULT NULL,
  `is_admin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `title`, `customer_id`, `invoice_number`, `invoice_date`, `due_date`, `sales_agent_id`, `currency`, `discount_type`, `discount`, `admin_text`, `unit`, `client_note`, `term_conditions`, `sub_total`, `adjustment`, `total_amount`, `payment_status`, `discount_symbol`, `created_at`, `updated_at`, `hsn_tax`, `job_done`, `installation_date`, `employees`, `lat`, `longitude`, `address`, `map`, `warranty`, `progress`, `start_date`, `pause_date`, `resume_date`, `end_date`, `discount_approved`, `is_admin`) VALUES
(37, 'pleae enter field okay', 11, 'SAD1-0001', '2024-07-17', '2024-08-15', 45, 3, 2, 0, NULL, 1, NULL, NULL, 40, '0', 40, 1, 1, '2024-07-16 23:32:11', '2024-07-17 00:05:17', NULL, 2, '2024-07-26', '45', '35.892423', '14.440963', NULL, NULL, 1, 4, '2024-07-17 00:47:31', NULL, NULL, '2024-07-17 00:47:59', NULL, 1),
(38, 'pleae enter field okay', 11, 'SAD1-0002', '2024-07-17', '2024-08-15', 1, 3, 2, 0, NULL, 1, NULL, NULL, 40, '0', 47.2, 1, NULL, '2024-07-16 23:36:11', '2024-07-16 23:36:12', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_addresses`
--

CREATE TABLE `invoice_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `street` text DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `zip_code` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `billing_id` int(11) DEFAULT NULL,
  `latlog` text DEFAULT NULL,
  `mapaddress` text DEFAULT NULL,
  `locality` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payment_modes`
--

CREATE TABLE `invoice_payment_modes` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_mode_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_payment_modes`
--

INSERT INTO `invoice_payment_modes` (`id`, `payment_mode_id`, `invoice_id`, `created_at`, `updated_at`) VALUES
(80, 1, 37, NULL, NULL),
(81, 2, 37, NULL, NULL),
(82, 3, 37, NULL, NULL),
(83, 4, 37, NULL, NULL),
(84, 5, 37, NULL, NULL),
(85, 1, 38, NULL, NULL),
(86, 2, 38, NULL, NULL),
(87, 3, 38, NULL, NULL),
(88, 4, 38, NULL, NULL),
(89, 5, 38, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `rate` double NOT NULL,
  `tax_1_id` int(11) DEFAULT NULL,
  `tax_2_id` int(11) DEFAULT NULL,
  `item_group_id` int(10) UNSIGNED NOT NULL,
  `stock` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `subcategory1` text DEFAULT NULL,
  `subcategory2` text DEFAULT NULL,
  `product_code` text DEFAULT NULL,
  `warranty_period` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `description`, `rate`, `tax_1_id`, `tax_2_id`, `item_group_id`, `stock`, `created_at`, `updated_at`, `brand`, `subcategory1`, `subcategory2`, `product_code`, `warranty_period`) VALUES
(6, 'Toshiba SEIYA indoor &amp; outdoor 16,000 BTUs Kw installed', NULL, 448.59, 7, NULL, 7, 100, '2024-01-26 12:29:54', '2024-05-17 14:39:12', 'Toshiba', 'Split units', 'Highwall', 'RAS-B16E2KVG-E + RAS-16E2AVG-E', 2),
(8, 'Toshiba SEIYA indoor &amp; outdoor 13,000 BTUs installed', 'Toshiba SEIYA\n  indoor &amp; outdoor 13,000 BTUs installed', 345.53, 7, NULL, 7, NULL, '2024-01-29 12:00:40', '2024-05-17 14:39:23', 'Toshiba', 'Split units', 'Highwall', 'RAS-B13E2KVG-E + RAS-13E2AVG-E', 2),
(9, 'Toshiba SEIYA indoor &amp; outdoor 18,000 BTUs installed', 'Toshiba SEIYA\n  indoor &amp; outdoor 18,000 BTUs installed', 519.68, 7, NULL, 7, NULL, '2024-01-29 12:01:39', '2024-05-17 14:39:28', 'Toshiba', 'Split units', 'Highwall', 'RAS-B18E2KVG-E + RAS-18E2AVG-E', 2),
(10, 'Toshiba SEIYA indoor &amp; outdoor 24,000 BTUs installed', 'Toshiba SEIYA\n  indoor &amp; outdoor 24,000 BTUs installed', 632.96, 7, NULL, 7, NULL, '2024-01-29 12:02:44', '2024-05-17 14:46:21', 'Toshiba', 'Split units', 'Highwall', 'RAS-B24E2KVG-E + RAS-24E2AVG-E', 2),
(11, 'Toshiba Digital Inverter Ducted indoor &amp; outdoor 19,000 BTUs installed', 'Toshiba Digital\n  Inverter Ducted indoor &amp; outdoor 19,000 BTUs installed', 1020.8, 7, NULL, 7, NULL, '2024-01-29 12:03:27', '2024-05-17 14:46:27', 'Toshiba', 'Split units', 'Ducted', 'RAV-HM561BTP-E + RAV-GV561ATP-E', 2),
(12, 'Extra copper split (up-to 1/2)', 'Extra copper split\n  (up-to 1/2)', 0, 7, NULL, 7, NULL, '2024-01-29 12:04:58', '2024-05-17 14:46:36', NULL, 'Split units', 'Extra Works', 'EXTRCPRSP12', 2),
(13, 'Mini SMMSe 4 HP single phase (single fan)', '\n  Mini SMMSe 4 HP\n  single phase (single fan)\n', 1457.53, 7, NULL, 7, NULL, '2024-01-29 12:07:33', '2024-07-04 01:37:39', 'Toshiba', 'VRF', 'Outdoor', 'MCY-MHP0406HT-E', 2),
(53, 'RAS-B10E2KVG-E + RAS-10E2AVG-E', 'Toshiba SEIYA indoor &amp; outdoor 10,000 BTUs installed', 327.27, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-05-17 14:49:32', 'Toshiba', 'Split units', 'Highwall', 'RAS-B10E2KVG-E + RAS-10E2AVG-E', 2),
(54, 'RAS-B13E2KVG-E + RAS-13E2AVG-E', 'Toshiba SEIYA indoor & outdoor 13,000 BTUs installed', 345.53, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:39', 'Toshiba', 'Split units', 'Highwall', 'RAS-B13E2KVG-E + RAS-13E2AVG-E', 2),
(55, 'RAS-B16E2KVG-E + RAS-16E2AVG-E', 'Toshiba SEIYA indoor &amp; outdoor 16,000 BTUs Kw installed', 448.59, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-05-17 14:46:07', 'Toshiba', 'Split units', 'Highwall', 'RAS-B16E2KVG-E + RAS-16E2AVG-E', 2),
(56, 'RAS-B18E2KVG-E + RAS-18E2AVG-E', 'Toshiba SEIYA indoor & outdoor 18,000 BTUs installed', 519.68, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:39', 'Toshiba', 'Split units', 'Highwall', 'RAS-B18E2KVG-E + RAS-18E2AVG-E', 2),
(59, 'EXTRCPRSP12', 'Extra copper split (up-to 1/2)', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:39', 'N/A', 'Split units', 'Extra Works', 'EXTRCPRSP12', 2),
(60, 'EXTRCPRSP58', 'Extra copper split (up-to 5/8)', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'N/A', 'Split units', 'Extra Works', 'EXTRCPRSP58', 2),
(61, 'EXTRDRNSP', 'Extra condensate drain split', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'N/A', 'Split units', 'Extra Works', 'EXTRDRNSP', 2),
(62, 'CHSCPR', 'Chasing in wall for copper', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-05-17 13:49:16', 'N/A', 'Split units', 'Extra Works', 'CHSCPR', 2),
(63, 'CHSDRN', 'Chasing in wall for drain', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'N/A', 'Split units', 'Extra Works', 'CHSDRN', 2),
(64, 'DTC', 'Design, testing & commissioning excluding refrigerrant', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'N/A', 'VRF', 'Extra Works', 'DTC', 2),
(65, 'WADWG', 'Working & as-fitted drawings', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'N/A', 'VRF', 'Extra Works', 'WADWG', 2),
(66, 'R410A', 'Additional R-410A refrigerrant (KG)', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'N/A', 'VRF', 'Extra Works', 'R410A', 2),
(67, 'MCY-MHP0406HT-E', 'Mini SMMSe 4 HP single phase (single fan)', 1457.526414708, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'Toshiba', 'VRF', 'Outdoor', 'MCY-MHP0406HT-E', 2),
(68, 'MCY-MHP0506HT-E1', 'Mini SMMSe 5HP single phase (single fan)', 1520.010499644, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'Toshiba', 'VRF', 'Outdoor', 'MCY-MHP0506HT-E1', 2),
(69, 'MMK-UP0091HP-E', 'Highwall VRF 9,000 BTU\'s (2.8Kw)', 324.3432735504, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'Toshiba', 'VRF', 'Highwall', 'MMK-UP0091HP-E', 2),
(70, 'MMK-UP0121HP-E', 'Highwall VRF 12,000 BTU\'s (3.6Kw)', 329.6292860952, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'Toshiba', 'VRF', 'Highwall', 'MMK-UP0121HP-E', 2),
(71, 'MMK-UP0151HP-E', 'Highwall VRF 15,000 BTU\'s (4.5Kw)', 373.1178358674, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'Toshiba', 'VRF', 'Highwall', 'MMK-UP0151HP-E', 2),
(72, 'MMK-UP0181HP-E', 'Highwall VRF 18,000 BTU\'s (5.6Kw)', 379.7152637382, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'Toshiba', 'VRF', 'Highwall', 'MMK-UP0181HP-E', 2),
(73, 'MMK-UP0241HP-E', 'Highwall VRF 24,000 BTU\'s (7.1Kw)', 386.3227794192, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:40', 'Toshiba', 'VRF', 'Highwall', 'MMK-UP0241HP-E', 2),
(74, 'CPR Riser 1', 'Copper riser for Mini SMMSe 4 HP & 5HP 5/8 & 3/8', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Riser 1', 2),
(75, 'CPR Riser 2', 'Copper riser for Mini SMMSe 6 HP 3/4 & 3/8', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Riser 2', 2),
(76, 'CPR Riser 3', 'Copper riser for Mini SMMSe & SMMSu 8 HP & 10 HP 3/4 & 1/2', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Riser 3', 2),
(77, 'CPR Riser 4', 'Copper riser for SMMSu 12 HP 1 1/8 & 1/2', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Riser 4', 2),
(78, 'CPR Riser 5', 'Copper riser for SMMSu 14, 16, 18 & 20 HP 1 1/8 & 5/8', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Riser 5', 2),
(79, 'CPR Riser 6', 'Copper riser for SMMSu 22 & 24 HP 1 1/8 & 3/4', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Riser 6', 2),
(80, 'CPR Internal 1', 'Internal copper upto 1/2', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Internal 1', 2),
(81, 'CPR Internal 2', 'Internal copper upto 5/8', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Internal 2', 2),
(82, 'CPR Internal 3', 'Internal copper upto 3/4', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Internal 3', 2),
(83, 'CPR Internal 4', 'Internal copper upto 7/8', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Internal 4', 2),
(84, 'CPR Internal 5', 'Internal copper upto 1 1/8', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Internal 5', 2),
(85, 'CPR Internal 6', 'Internal copper upto 1 3/8', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Internal 6', 2),
(86, 'CPR Internal 7', 'Internal copper upto 1 5/8', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'CPR Internal 7', 2),
(87, 'Drain 1', 'Insulated PVC drain 25mm', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'Drain 1', 2),
(88, 'Drain 2', 'Insulated PVC drain 32mm', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'Drain 2', 2),
(89, 'Refnet Y 1', 'For Mini-VRF', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'Refnet Y 1', 2),
(90, 'Refnet Y 2', 'For VRF from 8HP to 22HP', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'Refnet Y 2', 2),
(91, 'Refnet Y 3', 'For VRF from 24HP to 50HP', 0, 7, NULL, 9, NULL, '2024-03-04 12:05:00', '2024-07-04 01:37:41', 'N/A', 'VRF', 'Installation Accessories', 'Refnet Y 3', 2),
(92, 'warranty title', 'the description of everything is here', 20, 7, NULL, 7, 2, '2024-07-04 01:13:23', '2024-07-04 01:13:24', 'brand', 'VRF', 'category2', 'warranty default code', 2),
(93, 'title', '<p>the description is here</p>', 20, 7, NULL, 7, 34, '2024-07-04 01:20:27', '2024-07-04 01:25:36', 'brand', 'Split units', 'Installation Accessories', 'product code testing 23', 3),
(94, 'title', '<p>the description of the product</p>', 20, 7, NULL, 7, 33, '2024-07-09 01:16:35', '2024-07-09 01:16:43', 'brand', 'VRF', 'category2', 'no vat product', 1),
(95, 'new product testing title 32323', '<p>descrsd</p>', 12000, 7, 7, 1, 21, '2024-07-17 00:47:15', '2024-07-17 00:47:40', '123344', 'VRF', 'category2', '121323', 2);

-- --------------------------------------------------------

--
-- Table structure for table `item_groups`
--

CREATE TABLE `item_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_groups`
--

INSERT INTO `item_groups` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Consultant Services', NULL, '2023-01-11 22:50:13', '2023-06-20 12:17:00'),
(2, 'Servicing', NULL, '2023-01-11 22:50:13', '2023-06-20 12:16:50'),
(7, 'AIRCONDITIONING', NULL, '2023-06-20 12:14:51', '2023-06-20 12:14:51'),
(9, 'Air conditioning', NULL, '2024-03-04 11:58:20', '2024-03-04 11:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `jobreminders`
--

CREATE TABLE `jobreminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` longtext DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `date` longtext DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobreminders`
--

INSERT INTO `jobreminders` (`id`, `subject`, `message`, `date`, `job_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'hello', 'we will come for the installation next week.', '2023-08-07 01:00:00', 2, 1, '2023-08-03 05:05:17', '2023-08-03 05:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `installation_date` text DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `map_cordinate` varchar(191) DEFAULT NULL,
  `google_map` varchar(191) DEFAULT NULL,
  `product_name` varchar(191) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(191) DEFAULT NULL,
  `invoice_name` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `locality` varchar(191) DEFAULT NULL,
  `lat` varchar(191) DEFAULT NULL,
  `long` varchar(191) DEFAULT NULL,
  `invoice_id` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `installation_date`, `address`, `map_cordinate`, `google_map`, `product_name`, `product_id`, `customer_id`, `customer_name`, `invoice_name`, `country`, `locality`, `lat`, `long`, `invoice_id`, `created_at`, `updated_at`) VALUES
(1, '2023-08-03', 'Malta University Residence Aparthotel', NULL, NULL, 'Labour Work', 2, 1, 'itwtech', NULL, NULL, NULL, '35.90125', ' 14.44818', '[[2]]', '2023-08-02 04:52:32', '2023-08-02 05:01:27'),
(2, '2023-08-11', 'Abuja Municipal, Federal Capital Territory', NULL, NULL, 'AIRCONDITION A123', 1, 2, 'TESTING', NULL, NULL, NULL, '9.06344', ' 7.46228', '[]', '2023-08-02 05:39:25', '2023-08-02 05:39:25'),
(3, '2023-08-05', 'Malta Aviation Museum', NULL, NULL, 'AIRCONDITION A123', 1, 2, 'TESTING', NULL, NULL, NULL, '35.89331', ' 14.41648', '[]', '2023-08-03 05:39:24', '2023-08-03 05:40:07'),
(4, '2023-08-29', 'Malta University Residence Aparthotel', NULL, NULL, 'AIRCONDITION A123', 1, 2, 'TESTING', NULL, NULL, NULL, '35.90125', ' 14.44818', '[\"1\",\"2\"]', '2023-08-28 06:35:07', '2023-08-31 11:37:03'),
(5, '2024-06-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Quote for Air-conditioning split units', NULL, NULL, NULL, NULL, '30', '2024-06-18 20:04:42', '2024-06-18 20:04:42'),
(6, '2024-07-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'final test on this', NULL, NULL, NULL, NULL, '31', '2024-07-03 00:47:39', '2024-07-03 00:47:39'),
(7, '2024-07-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'category new', NULL, NULL, NULL, NULL, '32', '2024-07-04 01:55:57', '2024-07-04 01:55:57'),
(8, '2024-07-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'category new', NULL, NULL, NULL, NULL, '34', '2024-07-16 01:19:55', '2024-07-16 01:19:55'),
(9, '2024-07-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'category new', NULL, NULL, NULL, NULL, '35', '2024-07-16 02:09:36', '2024-07-16 02:09:36'),
(10, '2024-07-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pleae enter field okay', NULL, NULL, NULL, NULL, '37', '2024-07-16 23:47:09', '2024-07-16 23:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `description`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(2, 'es', 'Spanish', 0, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(3, 'fr', 'French', 0, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(4, 'de', 'German', 0, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(5, 'ru', 'Russian', 0, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(6, 'pt', 'Portuguese', 0, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(7, 'ar', 'Arabic', 0, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(8, 'zh', 'Chinese', 0, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(9, 'tr', 'Turkish', 0, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(10, 'mt', NULL, 0, '2023-06-19 15:25:33', '2023-06-19 15:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `source_id` int(10) UNSIGNED NOT NULL,
  `assign_to` int(10) UNSIGNED DEFAULT NULL,
  `company_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `position` varchar(191) DEFAULT NULL,
  `website` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `estimate_budget` double DEFAULT NULL,
  `default_language` varchar(191) DEFAULT NULL,
  `public` int(11) DEFAULT NULL,
  `lead_convert_customer` tinyint(1) NOT NULL DEFAULT 0,
  `lead_convert_date` date DEFAULT NULL,
  `contacted_today` int(11) DEFAULT NULL,
  `date_contacted` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `locality` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `status_id`, `source_id`, `assign_to`, `company_name`, `name`, `position`, `website`, `phone`, `description`, `estimate_budget`, `default_language`, `public`, `lead_convert_customer`, `lead_convert_date`, `contacted_today`, `date_contacted`, `created_at`, `updated_at`, `country`, `locality`) VALUES
(1, 4, 8, NULL, 'COMPANY MALTA', 'JOE DOE', NULL, NULL, '+35696969696', NULL, 15000, 'en', 0, 0, NULL, 1, '2023-06-20 14:04:00', '2023-06-20 12:04:00', '2023-06-20 12:07:04', '10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lead_sources`
--

CREATE TABLE `lead_sources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_sources`
--

INSERT INTO `lead_sources` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Other Search Engines', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(3, 'Google (organic)', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(4, 'Social Media (Facebook, Twitter etc)', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(6, 'Advertising', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(7, 'Custom Referral', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(8, 'Expo/Seminar', '2023-01-11 22:50:13', '2023-01-11 22:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `lead_statuses`
--

CREATE TABLE `lead_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `color` varchar(191) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_statuses`
--

INSERT INTO `lead_statuses` (`id`, `name`, `color`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Attempted', '#ff2d42', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(2, 'Not Attempted', '#84c529', 2, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(3, 'Contacted', '#0000ff', 3, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(4, 'New Opportunity', '#c0c0c0', 4, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(5, 'Additional Contact', '#03a9f4', 5, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(6, 'In Progress', '#9C27B0', 5, '2023-01-11 22:50:13', '2023-01-11 22:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `file_name` varchar(191) NOT NULL,
  `mime_type` varchar(191) DEFAULT NULL,
  `disk` varchar(191) NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` text NOT NULL,
  `custom_properties` text NOT NULL,
  `responsive_images` text NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `conversions_disk` varchar(191) DEFAULT NULL,
  `uuid` char(36) DEFAULT NULL,
  `generated_conversions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `size`, `manipulations`, `custom_properties`, `responsive_images`, `order_column`, `created_at`, `updated_at`, `conversions_disk`, `uuid`, `generated_conversions`) VALUES
(10, 'App\\Models\\User', 11, 'profile', 'Passport photo', 'Passport-photo.png', 'image/png', 'public', 159894, '[]', '[]', '[]', 1, '2023-06-26 12:41:00', '2023-06-26 12:41:00', 'public', '972b48f9-254f-4e7b-b6b9-e14a044ca957', '[]'),
(11, 'App\\Models\\Setting', 3, 'settings', 'WhatsApp Image 2023-06-26 at 15.41.29', 'WhatsApp-Image-2023-06-26-at-15.41.29.jpg', 'image/jpeg', 'public', 1461, '[]', '[]', '[]', 1, '2023-06-26 12:55:20', '2023-06-26 12:55:20', 'public', '91dd0270-9fa4-43f5-833f-e325a1c3f840', '[]'),
(12, 'App\\Models\\Setting', 2, 'settings', 'phone-call', 'phone-call.png', 'image/png', 'public', 11726, '[]', '[]', '[]', 1, '2023-06-27 05:09:33', '2023-06-27 05:09:33', 'public', '007fdc9e-39ee-4696-a8b7-99c1a8b3952c', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `member_groups`
--

CREATE TABLE `member_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_groups`
--

INSERT INTO `member_groups` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', NULL, '2024-03-06 19:34:16', '2024-03-06 19:34:16'),
(2, 'Sales Agent', NULL, '2024-03-06 19:34:42', '2024-03-06 19:34:42'),
(3, 'Installer', NULL, '2024-03-06 19:37:32', '2024-03-06 19:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `member_to_member_groups`
--

CREATE TABLE `member_to_member_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `member_group_id` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_to_member_groups`
--

INSERT INTO `member_to_member_groups` (`id`, `user_id`, `member_group_id`, `created_at`, `updated_at`) VALUES
(1, 9, '2', NULL, NULL),
(2, 17, '3', NULL, NULL),
(3, 0, '3', '2024-03-06 19:39:22', '2024-03-06 19:39:22'),
(5, 0, '1', '2024-03-18 18:46:59', '2024-03-18 18:46:59'),
(7, 16, '2', NULL, NULL),
(33, 0, '1', '2024-04-02 11:43:41', '2024-04-02 11:43:41'),
(34, 27, '3', NULL, NULL),
(35, 0, '1', '2024-04-08 16:49:46', '2024-04-08 16:49:46'),
(36, 0, '1', '2024-04-08 18:11:38', '2024-04-08 18:11:38'),
(37, 0, '3', '2024-04-08 18:47:08', '2024-04-08 18:47:08'),
(38, 45, '3', NULL, NULL),
(39, 45, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_03_000001_create_customer_columns', 1),
(4, '2019_05_03_000002_create_subscriptions_table', 1),
(5, '2019_05_03_000003_create_subscription_items_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_03_30_113645_create_languages_table', 1),
(8, '2020_03_31_072201_create_tags_table', 1),
(9, '2020_03_31_101748_create_customer_groups_table', 1),
(10, '2020_04_02_120049_create_permission_tables', 1),
(11, '2020_04_03_042555_create_article_groups_table', 1),
(12, '2020_04_03_045459_create_predefined_replies_table', 1),
(13, '2020_04_03_063710_create_customers_table', 1),
(14, '2020_04_03_064745_create_address_table', 1),
(15, '2020_04_03_080033_create_ticket_priorities_table', 1),
(16, '2020_04_03_091117_create_expense_categories_table', 1),
(17, '2020_04_03_113351_create_customer_to_customer_groups_table', 1),
(18, '2020_04_03_123515_create_services_table', 1),
(19, '2020_04_04_035019_create_ticket_statuses_table', 1),
(20, '2020_04_06_040305_create_lead_statuses_table', 1),
(21, '2020_04_06_054337_create_lead_sources_table', 1),
(22, '2020_04_06_055647_create_item_groups_table', 1),
(23, '2020_04_06_064803_create_tax_rates_table', 1),
(24, '2020_04_06_065009_create_announcements_table', 1),
(25, '2020_04_06_083033_create_articles_table', 1),
(26, '2020_04_06_095554_create_payment_modes_table', 1),
(27, '2020_04_07_042816_create_items_table', 1),
(28, '2020_04_07_055247_create_contacts_table', 1),
(29, '2020_04_08_042058_create_contract_types_table', 1),
(30, '2020_04_08_060610_create_departments_table', 1),
(31, '2020_04_08_061359_create_tickets_table', 1),
(32, '2020_04_08_094756_add_type_column_into_permissions_table', 1),
(33, '2020_04_08_113224_create_invoices_table', 1),
(34, '2020_04_09_052358_create_invoice_addresses_table', 1),
(35, '2020_04_09_084032_create_taggables_table', 1),
(36, '2020_04_09_095706_create_invoice_payment_modes_table', 1),
(37, '2020_04_09_114622_create_sales_items_table', 1),
(38, '2020_04_10_043112_create_media_table', 1),
(39, '2020_04_10_070725_create_email_notifications_table', 1),
(40, '2020_04_10_103613_create_user_departments_table', 1),
(41, '2020_04_14_063726_create_notes_table', 1),
(42, '2020_04_14_065429_create_contact_email_notifications_table', 1),
(43, '2020_04_15_092420_create_reminders_table', 1),
(44, '2020_04_15_112744_create_sales_items_taxes_table', 1),
(45, '2020_04_16_054536_create_projects_table', 1),
(46, '2020_04_16_075039_create_sales_taxes_table', 1),
(47, '2020_04_17_101231_create_project_members_table', 1),
(48, '2020_04_20_051641_create_expenses_table', 1),
(49, '2020_04_20_082756_create_comments_table', 1),
(50, '2020_04_20_090457_add_goal_types_table', 1),
(51, '2020_04_20_111756_add_goals_table', 1),
(52, '2020_04_20_124358_create_leads_table', 1),
(53, '2020_04_21_114258_add_contracts_table', 1),
(54, '2020_04_22_082049_create_payments_table', 1),
(55, '2020_04_22_085449_add_settings_table', 1),
(56, '2020_04_23_060014_create_credit_notes_table', 1),
(57, '2020_04_23_060243_create_credit_note_addresses_table', 1),
(58, '2020_04_24_054022_create_email_templates_table', 1),
(59, '2020_04_27_045332_create_proposals_table', 1),
(60, '2020_04_27_061619_create_estimates_table', 1),
(61, '2020_04_27_100038_create_estimate_addresses_table', 1),
(62, '2020_04_28_122023_create_proposal_addresses_table', 1),
(63, '2020_07_06_045925_add_new_fields_into_users_table', 1),
(64, '2020_07_14_134831_create_tasks_table', 1),
(65, '2020_07_31_095218_add_image_field_in_articles_table', 1),
(66, '2020_08_24_052215_create_project_contacts_table', 1),
(67, '2020_09_02_130829_create_goal_members_table', 1),
(68, '2020_12_10_062217_add_status_field_to_announcements_table', 1),
(69, '2020_12_10_114422_add_status_filed_to_reminders_table', 1),
(70, '2020_12_19_061159_add_country_to_leads_table', 1),
(71, '2020_12_25_074509_drop_predefine_relation_on_tickets_table', 1),
(72, '2020_12_25_093030_drop_department_relation_on_tickets_table', 1),
(73, '2020_12_25_111608_drop_foreign_key_to_invoices_table', 1),
(74, '2020_12_25_111700_drop_foreign_key_to_estimates_table', 1),
(75, '2020_12_26_045434_drop_member_id_foreign_key_on_tasks_table', 1),
(76, '2021_01_04_090933_add_stripe_id_and_meta_fields_in_payments_table', 1),
(77, '2021_01_19_124232_make_start_date_nullable_in_tasks_table', 1),
(78, '2021_01_20_050318_make_priority_and_service_field_nullable_in_tickets_table', 1),
(79, '2021_03_10_054614_create_activity_log_table', 1),
(80, '2021_05_10_112220_create_notifications_table', 1),
(81, '2021_07_05_121647_change_customer_foreign_key_table_name_in_expenses_table', 1),
(82, '2021_07_22_082312_create_countries_table', 1),
(83, '2021_09_03_000000_add_uuid_to_failed_jobs_table', 1),
(84, '2021_09_11_113710_add_conversions_disk_column_in_media_table', 1),
(85, '2022_04_27_062115_add_is_admin_field_in_users_table', 1),
(86, '2022_05_24_073300_change_properties_field_type_in_activity_log_table', 1),
(87, '2022_07_27_055736_add_hsn_tax_field_in_invoices_and_proposals_and_estimates', 1),
(88, '2022_09_13_045308_run_default_country_code_seeder', 1),
(89, '2022_09_13_124102_add_is_default_field_in_languages_table', 1),
(90, '2022_09_19_055209_run_default_languages_seeder_table', 1),
(91, '2022_10_06_124122_run_set_default_language_seeder', 1),
(92, '2022_11_08_115827_run_ticket_permission_in_seeder', 1),
(93, '2022_11_14_092357_create_ticket_replies_table', 1),
(94, '2022_12_19_120935_add_batch_uuid_column_to_activity_log_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 11),
(1, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 45),
(2, 'App\\Models\\User', 47),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 45),
(3, 'App\\Models\\User', 47),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 45),
(4, 'App\\Models\\User', 47),
(5, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 45),
(5, 'App\\Models\\User', 47),
(6, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 45),
(6, 'App\\Models\\User', 47),
(7, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 45),
(7, 'App\\Models\\User', 47),
(8, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 45),
(9, 'App\\Models\\User', 1),
(9, 'App\\Models\\User', 45),
(10, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 45),
(11, 'App\\Models\\User', 1),
(11, 'App\\Models\\User', 16),
(11, 'App\\Models\\User', 45),
(11, 'App\\Models\\User', 47),
(12, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 16),
(12, 'App\\Models\\User', 45),
(12, 'App\\Models\\User', 47),
(13, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 16),
(13, 'App\\Models\\User', 17),
(13, 'App\\Models\\User', 45),
(13, 'App\\Models\\User', 47),
(14, 'App\\Models\\User', 1),
(14, 'App\\Models\\User', 16),
(14, 'App\\Models\\User', 45),
(14, 'App\\Models\\User', 47),
(15, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 16),
(15, 'App\\Models\\User', 45),
(15, 'App\\Models\\User', 47),
(16, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 45),
(16, 'App\\Models\\User', 47),
(17, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 45),
(18, 'App\\Models\\User', 1),
(18, 'App\\Models\\User', 16),
(18, 'App\\Models\\User', 45),
(18, 'App\\Models\\User', 47),
(19, 'App\\Models\\User', 1),
(19, 'App\\Models\\User', 16),
(19, 'App\\Models\\User', 45),
(19, 'App\\Models\\User', 47),
(20, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 45),
(20, 'App\\Models\\User', 47),
(21, 'App\\Models\\User', 1),
(21, 'App\\Models\\User', 45),
(21, 'App\\Models\\User', 47),
(22, 'App\\Models\\User', 1),
(22, 'App\\Models\\User', 16),
(22, 'App\\Models\\User', 45),
(22, 'App\\Models\\User', 47),
(23, 'App\\Models\\User', 1),
(23, 'App\\Models\\User', 16),
(23, 'App\\Models\\User', 45),
(23, 'App\\Models\\User', 47),
(24, 'App\\Models\\User', 1),
(24, 'App\\Models\\User', 16),
(24, 'App\\Models\\User', 45),
(24, 'App\\Models\\User', 47),
(25, 'App\\Models\\User', 1),
(25, 'App\\Models\\User', 16),
(25, 'App\\Models\\User', 45),
(25, 'App\\Models\\User', 47),
(26, 'App\\Models\\User', 1),
(26, 'App\\Models\\User', 16),
(26, 'App\\Models\\User', 45),
(26, 'App\\Models\\User', 47),
(27, 'App\\Models\\User', 1),
(27, 'App\\Models\\User', 45),
(27, 'App\\Models\\User', 47),
(28, 'App\\Models\\User', 1),
(28, 'App\\Models\\User', 45),
(28, 'App\\Models\\User', 47),
(29, 'App\\Models\\User', 1),
(29, 'App\\Models\\User', 16),
(29, 'App\\Models\\User', 45),
(29, 'App\\Models\\User', 47),
(30, 'App\\Models\\User', 1),
(30, 'App\\Models\\User', 45),
(31, 'App\\Models\\User', 1),
(31, 'App\\Models\\User', 45),
(31, 'App\\Models\\User', 47),
(32, 'App\\Models\\User', 1),
(32, 'App\\Models\\User', 45),
(32, 'App\\Models\\User', 47),
(33, 'App\\Models\\User', 1),
(33, 'App\\Models\\User', 45),
(34, 'App\\Models\\User', 1),
(34, 'App\\Models\\User', 45),
(35, 'App\\Models\\User', 1),
(35, 'App\\Models\\User', 45),
(37, 'App\\Models\\User', 11),
(37, 'App\\Models\\User', 12),
(41, 'App\\Models\\User', 1),
(41, 'App\\Models\\User', 16),
(41, 'App\\Models\\User', 17),
(41, 'App\\Models\\User', 45),
(41, 'App\\Models\\User', 47),
(41, 'App\\Models\\User', 48),
(42, 'App\\Models\\User', 1),
(42, 'App\\Models\\User', 16),
(42, 'App\\Models\\User', 17),
(42, 'App\\Models\\User', 45),
(42, 'App\\Models\\User', 47),
(42, 'App\\Models\\User', 48),
(43, 'App\\Models\\User', 1),
(43, 'App\\Models\\User', 16),
(43, 'App\\Models\\User', 17),
(43, 'App\\Models\\User', 45),
(43, 'App\\Models\\User', 47),
(43, 'App\\Models\\User', 48),
(44, 'App\\Models\\User', 16),
(44, 'App\\Models\\User', 45),
(44, 'App\\Models\\User', 47),
(45, 'App\\Models\\User', 16),
(45, 'App\\Models\\User', 45),
(45, 'App\\Models\\User', 47),
(46, 'App\\Models\\User', 17),
(46, 'App\\Models\\User', 45),
(46, 'App\\Models\\User', 47),
(47, 'App\\Models\\User', 16),
(47, 'App\\Models\\User', 45),
(47, 'App\\Models\\User', 47),
(48, 'App\\Models\\User', 16),
(48, 'App\\Models\\User', 45),
(48, 'App\\Models\\User', 47),
(50, 'App\\Models\\User', 45);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 16),
(2, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 45),
(2, 'App\\Models\\User', 47),
(2, 'App\\Models\\User', 48),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 12);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_type` varchar(191) NOT NULL,
  `note` text DEFAULT NULL,
  `added_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `type`, `description`, `read_at`, `user_id`, `created_at`, `updated_at`, `link`) VALUES
(1, 'Removed From Lead', 'App\\Models\\Lead', 'You removed from JOE DOE', NULL, NULL, '2023-06-20 12:07:04', '2023-06-20 12:07:04', NULL),
(4, 'New Project Assigned', 'App\\Models\\Project', 'You are assigned to Replacements of Ac in administration room', NULL, 12, '2023-06-28 06:01:15', '2023-06-28 06:01:15', NULL),
(8, 'New Ticket Created', 'App\\Models\\Ticket', 'You are assigned to Water leaking from Ac indoor unit', NULL, 12, '2023-06-28 06:03:03', '2023-06-28 06:03:03', NULL),
(9, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to Installation of AC', NULL, 12, '2023-09-13 04:21:50', '2023-09-13 04:21:50', NULL),
(12, 'New Project Assigned', 'App\\Models\\Contact', 'You are assigned to Test A', NULL, 12, '2023-09-18 12:36:53', '2023-09-18 12:36:53', NULL),
(13, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to new', NULL, 12, '2023-09-18 13:07:35', '2023-09-18 13:07:35', NULL),
(17, 'New Project Assigned', 'App\\Models\\Project', 'You are assigned to ~Test', NULL, 16, '2023-09-27 13:14:47', '2023-09-27 13:14:47', NULL),
(18, 'New Project Assigned', 'App\\Models\\Contact', 'You are assigned to ~Test', NULL, 12, '2023-09-27 13:14:47', '2023-09-27 13:14:47', NULL),
(19, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to Testing Bill system', NULL, 16, '2023-10-02 11:07:57', '2023-10-02 11:07:57', NULL),
(20, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to INSTALLATION OF AC', NULL, 16, '2023-10-23 11:15:24', '2023-10-23 11:15:24', NULL),
(21, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to hyhy', NULL, 12, '2024-01-12 15:18:40', '2024-01-12 15:18:40', NULL),
(24, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to Installation of AC Units', NULL, 12, '2024-02-26 15:43:26', '2024-02-26 15:43:26', NULL),
(25, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to Installation of AC Units', NULL, 16, '2024-02-26 15:43:26', '2024-02-26 15:43:26', NULL),
(26, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to Installation of AC Units', NULL, 12, '2024-02-26 15:47:35', '2024-02-26 15:47:35', NULL),
(27, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to Installation of AC Units', '2024-03-18 18:54:56', 16, '2024-02-26 15:47:35', '2024-03-18 18:54:56', NULL),
(33, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to Quote for Maintenance Commercial', NULL, 12, '2024-03-12 16:03:25', '2024-03-12 16:03:25', NULL),
(34, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to Quote for Maintenance Commercial', '2024-03-18 18:54:53', 16, '2024-03-12 16:03:25', '2024-03-18 18:54:53', NULL),
(35, 'Estimate  Discount  Above 10% ', 'App\\Models\\Estimate', 'Estimate  Discount  Above 10% Approval', '2024-03-18 18:56:15', 1, '2024-03-18 18:41:16', '2024-03-18 18:56:15', 'http://cutrico.12dot8.mt/admin/estimates/7/edit'),
(36, 'Estimate  Discount  Above 10% ', 'App\\Models\\Estimate', 'Estimate  Discount  Above 10% Approval', '2024-03-18 18:56:14', 1, '2024-03-18 18:53:51', '2024-03-18 18:56:14', 'http://cutrico.12dot8.mt/admin/estimates/8/edit'),
(38, 'Invoice Discount  Above 10% ', 'App\\Models\\Invoice', 'Invoice  Discount  Above 10% Approval', '2024-04-02 05:43:26', 1, '2024-03-22 18:32:22', '2024-04-02 05:43:26', 'http://cutrico.12dot8.mt/admin/invoices/15/edit'),
(40, 'Estimate  Discount  Above 10% ', 'App\\Models\\Estimate', 'Estimate  Discount  Above 10% Approval', '2024-04-02 05:43:23', 1, '2024-03-22 18:33:04', '2024-04-02 05:43:23', 'http://cutrico.12dot8.mt/admin/estimates/9/edit'),
(43, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to Quote for Air-conditioning split units', NULL, 47, '2024-04-08 18:40:36', '2024-04-08 18:40:36', NULL),
(44, 'Estimate  Discount  Above 10% ', 'App\\Models\\Estimate', 'Estimate  Discount  Above 10% Approval', '2024-05-03 11:03:31', 1, '2024-04-12 18:24:54', '2024-05-03 11:03:31', 'http://cutrico.12dot8.mt/admin/estimates/11/edit'),
(45, 'Estimate  Discount  Above 10% ', 'App\\Models\\Estimate', 'Estimate  Discount  Above 10% Approval', NULL, 45, '2024-04-12 18:24:56', '2024-04-12 18:24:56', 'http://cutrico.12dot8.mt/admin/estimates/11/edit'),
(46, 'Estimate  Discount  Above 10% ', 'App\\Models\\Estimate', 'Estimate  Discount  Above 10% Approval', NULL, 47, '2024-04-12 18:24:58', '2024-04-12 18:24:58', 'http://cutrico.12dot8.mt/admin/estimates/11/edit'),
(47, 'New Estimate Created', 'App\\Models\\Estimate', 'You are assigned to Quote for Maintenance Domestic', NULL, 16, '2024-04-12 18:27:39', '2024-04-12 18:27:39', NULL),
(48, 'Removed From Ticket', 'App\\Models\\Ticket', 'You removed from Water leaking from Ac indoor unit', NULL, NULL, '2024-04-12 18:42:56', '2024-04-12 18:42:56', NULL),
(49, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to Quote for Maintenance Commercial', NULL, 12, '2024-04-15 19:36:21', '2024-04-15 19:36:21', NULL),
(50, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to Quote for Maintenance Commercial', NULL, 16, '2024-04-15 19:36:21', '2024-04-15 19:36:21', NULL),
(51, 'Invoice Discount  Above 10% ', 'App\\Models\\Invoice', 'Invoice  Discount  Above 10% Approval', '2024-05-03 11:03:31', 1, '2024-04-22 11:09:17', '2024-05-03 11:03:31', 'http://cutrico.12dot8.mt/admin/invoices/18/edit'),
(52, 'Invoice Discount  Above 10% ', 'App\\Models\\Invoice', 'Invoice  Discount  Above 10% Approval', NULL, 47, '2024-04-22 11:09:19', '2024-04-22 11:09:19', 'http://cutrico.12dot8.mt/admin/invoices/18/edit'),
(53, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to Quote for Maintenance Commercial', NULL, 45, '2024-04-22 11:10:06', '2024-04-22 11:10:06', NULL),
(54, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to Quote for Air-conditioning Others', NULL, 16, '2024-05-08 16:31:49', '2024-05-08 16:31:49', NULL),
(55, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to Quote for Air-conditioning Others', NULL, 12, '2024-05-08 16:31:49', '2024-05-08 16:31:49', NULL),
(56, 'Estimate  Discount  Above 10% ', 'App\\Models\\Estimate', 'Estimate  Discount  Above 10% Approval', NULL, 1, '2024-05-17 13:55:10', '2024-05-17 13:55:10', 'http://cutrico.12dot8.mt/admin/estimates/13/edit'),
(57, 'Estimate  Discount  Above 10% ', 'App\\Models\\Estimate', 'Estimate  Discount  Above 10% Approval', NULL, 47, '2024-05-17 13:55:12', '2024-05-17 13:55:12', 'http://cutrico.12dot8.mt/admin/estimates/13/edit'),
(58, 'Invoice Discount  Above 10% ', 'App\\Models\\Invoice', 'Invoice  Discount  Above 10% Approval', NULL, 1, '2024-05-17 13:59:00', '2024-05-17 13:59:00', 'http://cutrico.12dot8.mt/admin/invoices/21/edit'),
(59, 'Invoice Discount  Above 10% ', 'App\\Models\\Invoice', 'Invoice  Discount  Above 10% Approval', NULL, 47, '2024-05-17 13:59:02', '2024-05-17 13:59:02', 'http://cutrico.12dot8.mt/admin/invoices/21/edit'),
(60, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to Quote for Maintenance Commercial', NULL, 16, '2024-05-17 13:59:02', '2024-05-17 13:59:02', NULL),
(61, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to Quote for Maintenance Commercial', NULL, 16, '2024-05-20 20:01:08', '2024-05-20 20:01:08', NULL),
(62, 'New Ticket Created', 'App\\Models\\Ticket', 'You are assigned to ', NULL, 48, '2024-05-21 13:30:31', '2024-05-21 13:30:31', NULL),
(63, 'New Ticket Created', 'App\\Models\\Ticket', 'You are assigned to ', NULL, 17, '2024-05-24 13:39:11', '2024-05-24 13:39:11', NULL),
(64, 'New Estimate Created', 'App\\Models\\Estimate', 'You are assigned to Quote for Air-conditioning split units', NULL, 47, '2024-06-18 19:56:10', '2024-06-18 19:56:10', NULL),
(65, 'New Estimate Created', 'App\\Models\\Estimate', 'You are assigned to Quote for Air-conditioning split units', NULL, 12, '2024-06-18 19:56:10', '2024-06-18 19:56:10', NULL),
(66, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to Quote for Air-conditioning split units', NULL, 47, '2024-06-18 19:56:15', '2024-06-18 19:56:15', NULL),
(67, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to Quote for Air-conditioning split units', NULL, 12, '2024-06-18 19:56:15', '2024-06-18 19:56:15', NULL),
(68, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to Quote for Air-conditioning split units', NULL, 47, '2024-06-18 19:59:12', '2024-06-18 19:59:12', NULL),
(69, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to Quote for Air-conditioning split units', NULL, 12, '2024-06-18 19:59:12', '2024-06-18 19:59:12', NULL),
(70, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to Quote for Air-conditioning split units', NULL, 47, '2024-06-18 20:01:00', '2024-06-18 20:01:00', NULL),
(71, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to Quote for Air-conditioning split units', NULL, 47, '2024-06-18 20:02:23', '2024-06-18 20:02:23', NULL),
(72, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to Quote for Air-conditioning split units', NULL, 12, '2024-06-18 20:02:23', '2024-06-18 20:02:23', NULL),
(73, 'New Estimate Assigned', 'App\\Models\\Estimate', 'You are assigned to final test on this', NULL, 12, '2024-07-16 00:56:48', '2024-07-16 00:56:48', NULL),
(74, 'New Estimate Created', 'App\\Models\\Estimate', 'You are assigned to final test on this', NULL, 1, '2024-07-16 00:56:48', '2024-07-16 00:56:48', NULL),
(75, 'New Estimate Created', 'App\\Models\\Estimate', 'You are assigned to category new', NULL, 1, '2024-07-16 01:05:55', '2024-07-16 01:05:55', NULL),
(76, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to category new', NULL, 1, '2024-07-16 01:11:24', '2024-07-16 01:11:24', NULL),
(77, 'New Estimate Created', 'App\\Models\\Estimate', 'You are assigned to category new', NULL, 1, '2024-07-16 01:12:20', '2024-07-16 01:12:20', NULL),
(78, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to category new', NULL, 1, '2024-07-16 01:15:20', '2024-07-16 01:15:20', NULL),
(79, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to category new', NULL, 1, '2024-07-16 01:18:48', '2024-07-16 01:18:48', NULL),
(80, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to category new', NULL, 1, '2024-07-16 01:18:53', '2024-07-16 01:18:53', NULL),
(81, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to pleae enter field okay', NULL, 1, '2024-07-16 23:32:11', '2024-07-16 23:32:11', NULL),
(82, 'New Invoice Created', 'App\\Models\\Invoice', 'You are assigned to pleae enter field okay', NULL, 1, '2024-07-16 23:36:12', '2024-07-16 23:36:12', NULL),
(83, 'Removed From Invoice', 'App\\Models\\Invoice', 'You removed from pleae enter field okay', NULL, 1, '2024-07-17 00:05:17', '2024-07-17 00:05:17', NULL),
(84, 'New Invoice Assigned', 'App\\Models\\Invoice', 'You are assigned to pleae enter field okay', NULL, 45, '2024-07-17 00:05:17', '2024-07-17 00:05:17', NULL),
(85, 'New User Assigned to Invoice', 'App\\Models\\Invoice', 'Emmanuel Obafemi assigned to pleae enter field okay', NULL, 1, '2024-07-17 00:05:17', '2024-07-17 00:05:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('cutricotestingcrm@gmail.com', '$2y$10$0fuMUx5bxIahxX0m1PJAMev3KEax1Yt.ehAbOuYyBEri7vViqIVYW', '2024-04-01 17:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_type` varchar(191) NOT NULL,
  `amount_received` double NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_mode` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(191) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `send_mail_to_customer_contacts` tinyint(1) DEFAULT NULL,
  `stripe_id` varchar(191) DEFAULT NULL,
  `meta` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `owner_id`, `owner_type`, `amount_received`, `payment_date`, `payment_mode`, `transaction_id`, `note`, `send_mail_to_customer_contacts`, `stripe_id`, `meta`, `created_at`, `updated_at`) VALUES
(1, 5, 'App\\Models\\Invoice', 48000, '2023-09-19 13:46:52', 4, '', NULL, 0, NULL, NULL, '2023-09-19 11:46:58', '2023-09-19 11:46:58'),
(2, 11, 'App\\Models\\Invoice', 350, '2024-02-09 08:36:39', 1, '', '<p>Deposit payment</p>', 0, NULL, NULL, '2024-02-09 07:37:25', '2024-02-09 07:37:25'),
(3, 5, 'App\\Models\\Invoice', 48, '2024-02-26 10:43:31', 4, 'TRANSACTIN 1D', NULL, 1, NULL, NULL, '2024-02-26 15:43:50', '2024-02-26 15:43:50'),
(4, 5, 'App\\Models\\Invoice', 48000, '2024-02-26 10:44:20', 4, '121212S32323232323', NULL, 1, NULL, NULL, '2024-02-26 15:44:46', '2024-02-26 15:44:46'),
(5, 5, 'App\\Models\\Invoice', 48000, '2024-02-26 10:44:59', 4, '121212S32323232322', NULL, 1, NULL, NULL, '2024-02-26 15:45:25', '2024-02-26 15:45:25'),
(6, 5, 'App\\Models\\Invoice', 96048, '2024-02-26 10:45:34', 4, '121212S32323232325', NULL, 1, NULL, NULL, '2024-02-26 15:45:59', '2024-02-26 15:45:59'),
(7, 12, 'App\\Models\\Invoice', 6879, '2024-02-26 10:49:10', 4, '121212S32323232326', '<p>completed</p>', 1, NULL, NULL, '2024-02-26 15:49:26', '2024-02-26 15:49:26'),
(8, 13, 'App\\Models\\Invoice', 386, '2024-02-29 17:13:04', 4, '', NULL, 0, NULL, NULL, '2024-02-29 22:13:08', '2024-02-29 22:13:08'),
(9, 21, 'App\\Models\\Invoice', 926.38, '2024-05-17 10:01:52', 1, '', NULL, 0, NULL, NULL, '2024-05-17 14:02:12', '2024-05-17 14:02:12'),
(10, 30, 'App\\Models\\Invoice', 1204.54, '2024-06-18 16:02:42', 1, '', NULL, 1, NULL, NULL, '2024-06-18 20:02:56', '2024-06-18 20:02:56'),
(11, 31, 'App\\Models\\Invoice', 896.14, '2024-07-03 01:54:59', 4, '12544566FGFGHFHG56', '<p>paid okay</p>', 0, NULL, NULL, '2024-07-03 00:55:33', '2024-07-03 00:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `name`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Bank', NULL, 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(2, 'Gold', NULL, 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(3, 'Stripe', NULL, 1, '2023-01-11 22:50:14', '2023-01-11 22:50:14'),
(4, 'Credit Card', NULL, 1, '2023-09-19 11:43:37', '2023-09-19 11:43:37'),
(5, 'test', NULL, 1, '2024-06-20 00:06:36', '2024-06-20 00:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `type`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'contact_tickets', 'Contact Tickets', NULL, 'Contacts', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(2, 'manage_customer_groups', 'Manage Customer Groups', NULL, 'Customers', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(3, 'manage_customers', 'Manage Customers', NULL, 'Customers', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(4, 'manage_staff_member', 'Manage Staff Member', NULL, 'Members', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(5, 'manage_article_groups', 'Manage Article Groups', NULL, 'Articles', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(6, 'manage_articles', 'Manage Articles', NULL, 'Articles', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(7, 'manage_tags', 'Manage Tags', NULL, 'Tags', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(8, 'manage_leads', 'Manage Leads', NULL, 'Leads', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(9, 'manage_lead_status', 'Manage Lead Status', NULL, 'Leads', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(10, 'manage_tasks', 'Manage Tasks', NULL, 'Tasks', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(11, 'manage_ticket_priority', 'Manage Ticket Priority', NULL, 'Tickets', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(12, 'manage_ticket_statuses', 'Manage Ticket Statuses', NULL, 'Tickets', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(13, 'manage_tickets', 'Manage Tickets', NULL, 'Tickets', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(14, 'manage_invoices', 'Manage Invoices', NULL, 'Invoices', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(15, 'manage_payments', 'Manage Payments', NULL, 'Payments', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(16, 'manage_payment_mode', 'Manage Payment Mode', NULL, 'Payments', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(17, 'manage_credit_notes', 'Manage Credit Note', NULL, 'Credit Note', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(18, 'manage_proposals', 'Manage Proposals', NULL, 'Proposals', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(19, 'manage_estimates', 'Manage Estimates', NULL, 'Estimates', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(20, 'manage_departments', 'Manage Departments', NULL, 'Departments', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(21, 'manage_predefined_replies', 'Manage Predefined Replies', NULL, 'Predefined Replies', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(22, 'manage_expense_category', 'Manage Expense Category', NULL, 'Expenses', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(23, 'manage_expenses', 'Manage Expenses', NULL, 'Expenses', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(24, 'manage_services', 'Manage Services', NULL, 'Services', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(25, 'manage_items', 'Manage Items', NULL, 'Items', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(26, 'manage_items_groups', 'Manage Items Groups', NULL, 'Items', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(27, 'manage_tax_rates', 'Manage Tax Rates', NULL, 'TaxRate', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(28, 'manage_announcements', 'Manage Announcements', NULL, 'Announcements', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(29, 'manage_calenders', 'Manage Calenders', NULL, 'Calenders', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(30, 'manage_lead_sources', 'Manage Lead Sources', NULL, 'Leads', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(31, 'manage_contracts_types', 'Manage Contract Types', NULL, 'Contracts', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(32, 'manage_contracts', 'Manage Contracts', NULL, 'Contracts', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(33, 'manage_projects', 'Manage Projects', NULL, 'Projects', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(34, 'manage_goals', 'Manage Goals', NULL, 'Goals', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(35, 'manage_settings', 'Manage Settings', NULL, 'Settings', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(36, 'contact_projects', 'Contact Projects', NULL, 'Contacts', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(37, 'contact_invoices', 'Contact Invoices', NULL, 'Contacts', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(38, 'contact_proposals', 'Contact Proposals', NULL, 'Contacts', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(39, 'contact_contracts', 'Contact Contracts', NULL, 'Contacts', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(40, 'contact_estimates', 'Contact Estimates', NULL, 'Contacts', 'web', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(41, 'assign_installations', 'Assign Installations', NULL, 'Installations', 'web', '2023-09-13 04:17:06', '2023-09-13 04:17:06'),
(42, 'manage_installations', 'Manage Installations', NULL, 'Installations', 'web', '2023-09-13 04:17:06', '2023-09-13 04:17:06'),
(43, 'view_installations', 'View installations', NULL, 'Installations', 'web', '2023-09-13 04:17:06', '2023-09-13 04:17:06'),
(44, 'manage_products', 'Manage Products', NULL, 'Products', 'web', '2023-10-25 14:03:47', '2023-10-25 14:03:47'),
(45, 'manage_products_groups', 'Manage Products Groups', NULL, 'Products', 'web', '2023-10-25 14:03:47', '2023-10-25 14:03:47'),
(46, 'manage_open_warranties', 'Manage Open Warranties', NULL, 'Warranties', 'web', '2023-12-03 13:09:02', '2023-12-03 13:09:02'),
(47, 'manage_view_warranties', 'Manage View Warranties', NULL, 'Warranties', 'web', '2023-12-03 13:09:02', '2023-12-03 13:09:02'),
(48, 'manage_void_warranties', 'Manage Void Warranties', NULL, 'Warranties', 'web', '2023-12-03 13:09:02', '2023-12-03 13:09:02'),
(50, 'manage_new_projects', 'New Projects', NULL, 'Projects', 'web', '2024-01-10 13:16:55', '2024-01-10 13:16:55'),
(51, 'manage_job', 'Job', NULL, 'Jobs', 'web', '2024-07-02 02:11:20', '2024-07-02 02:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `predefined_replies`
--

CREATE TABLE `predefined_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `reply_name` varchar(191) NOT NULL,
  `body` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `predefined_replies`
--

INSERT INTO `predefined_replies` (`id`, `reply_name`, `body`, `created_at`, `updated_at`) VALUES
(11, 'field 1', NULL, '2024-07-01 17:03:13', '2024-07-01 17:03:13'),
(12, 'field 2', NULL, '2024-07-01 17:03:22', '2024-07-01 17:03:22'),
(13, 'field 3', NULL, '2024-07-01 17:03:30', '2024-07-01 17:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(191) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `calculate_progress_through_tasks` tinyint(1) DEFAULT NULL,
  `progress` varchar(191) DEFAULT NULL,
  `billing_type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `estimated_hours` varchar(191) DEFAULT NULL,
  `start_date` date NOT NULL,
  `deadline` date NOT NULL,
  `description` text DEFAULT NULL,
  `send_email` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_contacts`
--

CREATE TABLE `project_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_type` varchar(191) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(10) UNSIGNED NOT NULL,
  `proposal_number` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `related_to` varchar(191) DEFAULT NULL,
  `date` datetime NOT NULL,
  `open_till` datetime DEFAULT NULL,
  `currency` int(11) NOT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `assigned_user_id` int(11) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `unit` int(11) NOT NULL,
  `sub_total` double DEFAULT NULL,
  `adjustment` varchar(191) NOT NULL DEFAULT '0',
  `total_amount` double DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(191) DEFAULT NULL,
  `discount_symbol` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hsn_tax` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_addresses`
--

CREATE TABLE `proposal_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `proposal_id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `street` text DEFAULT NULL,
  `city` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `zip_code` varchar(191) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_type` varchar(191) NOT NULL,
  `notified_date` datetime NOT NULL,
  `reminder_to` int(10) UNSIGNED NOT NULL,
  `added_by` int(11) NOT NULL,
  `description` text NOT NULL,
  `is_notified` tinyint(1) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `owner_id`, `owner_type`, `notified_date`, `reminder_to`, `added_by`, `description`, `is_notified`, `status`, `created_at`, `updated_at`) VALUES
(1, 20, 'App\\Models\\User', '2024-06-21 00:00:00', 16, 1, '<p>the desct</p>', 1, 1, '2024-06-22 01:03:26', '2024-06-22 01:03:26'),
(3, 20, 'App\\Models\\User', '2024-06-26 00:00:00', 47, 1, '<p>this description is for the administrator</p>', 1, 0, '2024-06-22 01:08:54', '2024-06-22 01:08:54'),
(5, 20, 'App\\Models\\User', '2024-06-26 21:59:00', 16, 1, 'please send to the agent email address thanks', 1, 1, '2024-06-22 01:18:49', '2024-06-22 01:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `guard_name` varchar(191) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `guard_name`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, 'web', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(2, 'staff_member', 'Staff Member', NULL, 'web', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(3, 'client', 'Client', NULL, 'web', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_type` varchar(191) NOT NULL,
  `item` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `rate` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `warranty` text DEFAULT NULL,
  `warranty_type` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `serial_no` text DEFAULT NULL,
  `warranty_period` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`id`, `owner_id`, `owner_type`, `item`, `description`, `quantity`, `rate`, `total`, `created_at`, `updated_at`, `warranty`, `warranty_type`, `image`, `serial_no`, `warranty_period`) VALUES
(125, 23, 'App\\Models\\Estimate', 'Refnet Y 3', 'Refnet Y 3', 1, 0, 20, '2024-07-16 23:31:40', '2024-07-16 23:31:40', NULL, NULL, NULL, NULL, 2),
(126, 23, 'App\\Models\\Estimate', 'product code testing 23', 'title', 1, 20, 20, '2024-07-16 23:31:40', '2024-07-16 23:31:40', NULL, NULL, NULL, NULL, 3),
(129, 38, 'App\\Models\\Invoice', 'Refnet Y 3', 'Refnet Y 3', 1, 0, 20, '2024-07-16 23:36:12', '2024-07-16 23:36:12', NULL, NULL, NULL, NULL, 2),
(130, 38, 'App\\Models\\Invoice', 'product code testing 23', 'title', 1, 20, 20, '2024-07-16 23:36:12', '2024-07-16 23:36:12', NULL, NULL, NULL, NULL, 3),
(131, 37, 'App\\Models\\Invoice', 'Refnet Y 3', 'Refnet Y 3', 1, 0, 20, '2024-07-17 00:05:17', '2024-07-17 00:05:17', NULL, NULL, NULL, NULL, 2),
(132, 37, 'App\\Models\\Invoice', 'product code testing 23', 'title', 1, 20, 20, '2024-07-17 00:05:18', '2024-07-17 00:05:18', NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sales_item_taxes`
--

CREATE TABLE `sales_item_taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `sales_item_id` int(10) UNSIGNED NOT NULL,
  `tax_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_item_taxes`
--

INSERT INTO `sales_item_taxes` (`id`, `sales_item_id`, `tax_id`, `created_at`, `updated_at`) VALUES
(91, 125, 7, '2024-07-16 23:31:40', '2024-07-16 23:31:40'),
(92, 126, 7, '2024-07-16 23:31:40', '2024-07-16 23:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `sales_taxes`
--

CREATE TABLE `sales_taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_type` varchar(191) NOT NULL,
  `tax` varchar(191) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_taxes`
--

INSERT INTO `sales_taxes` (`id`, `owner_id`, `owner_type`, `tax`, `amount`, `created_at`, `updated_at`) VALUES
(62, 23, 'App\\Models\\Estimate', '18', 7.2, '2024-07-16 23:31:40', '2024-07-16 23:31:40');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(14, 'service one', '2024-01-09 08:26:54', '2024-01-09 08:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` text DEFAULT NULL,
  `group` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `group`, `created_at`, `updated_at`) VALUES
(1, 'default_country_code', 'mt', 1, '2023-01-11 22:50:13', '2023-06-19 15:23:23'),
(2, 'logo', '/uploads/logo1024.png', 1, '2023-01-11 22:50:13', '2023-07-03 13:54:42'),
(3, 'favicon', '/uploads/WhatsApp Image 2023-06-26 at 15.41.29 -.png', 1, '2023-01-11 22:50:13', '2023-07-03 13:54:11'),
(4, 'company_name', 'CUTRICO CRM', 1, '2023-01-11 22:50:13', '2023-07-03 13:57:00'),
(5, 'company_domain', '127.0.0.1', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(6, 'file_type', '.png,.jpg,.pdf,.doc,.docx,.xls,.xlsx,.zip,.rar,.txt', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(7, 'term_and_conditions', 'This project is following all term and conditions and privacy.', 1, '2023-01-11 22:50:13', '2023-06-28 05:22:32'),
(8, 'company', '12dot8', 2, '2023-01-11 22:50:13', '2023-06-20 11:56:36'),
(9, 'address', 'HAMRUN', 2, '2023-01-11 22:50:13', '2023-06-27 13:10:21'),
(10, 'city', 'Hamrun', 2, '2023-01-11 22:50:13', '2023-06-19 15:24:41'),
(11, 'state', 'Malta', 2, '2023-01-11 22:50:13', '2023-06-19 15:24:41'),
(12, 'country_code', 'Malta [MT]', 2, '2023-01-11 22:50:13', '2023-06-19 15:24:41'),
(13, 'zip_code', NULL, 2, '2023-01-11 22:50:13', '2023-06-19 15:24:41'),
(14, 'phone', '+3567777 7777', 2, '2023-01-11 22:50:13', '2023-06-20 11:56:36'),
(15, 'vat_number', '1234567890', 2, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(16, 'current_currency', 'eur', 2, '2023-01-11 22:50:13', '2023-06-19 15:24:41'),
(17, 'website', '12dot8.mt', 2, '2023-01-11 22:50:13', '2023-06-20 12:21:29'),
(18, 'company_information_format', '{company_name}\n                        {address}\n                        {city} {state}\n                        {country_code} {zip_code}\n                        {vat_number_with_label}', 2, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(19, 'admin_note', 'This is the admin note of the CutricoCRM project.', 3, '2023-01-11 22:50:13', '2023-06-27 13:10:57'),
(20, 'client_note', 'This is the client note of the CutricoCRM project.', 3, '2023-01-11 22:50:13', '2023-06-27 13:10:57'),
(21, 'email_smtp', 'cutricotestingcrm@gmail.com', 1, '2023-10-25 14:03:47', '2024-04-12 18:21:03'),
(22, 'password_smtp', 'ctaymbrhjjgteoxw', 1, '2023-10-25 14:03:47', '2024-04-12 18:21:03'),
(23, 'host_smtp', 'smtp.gmail.com', 1, '2023-10-25 14:03:47', '2024-03-18 19:50:04'),
(24, 'port_smtp', '465', 1, '2023-10-25 14:03:47', '2024-04-02 11:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `stripe_id` varchar(191) NOT NULL,
  `stripe_status` varchar(191) NOT NULL,
  `stripe_price` varchar(191) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(191) NOT NULL,
  `stripe_product` varchar(191) NOT NULL,
  `stripe_price` varchar(191) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(11) NOT NULL,
  `taggable_type` varchar(191) NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taggables`
--

INSERT INTO `taggables` (`id`, `taggable_id`, `taggable_type`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Models\\Project', 3, NULL, NULL),
(4, 2, 'App\\Models\\Project', 2, NULL, NULL),
(6, 3, 'App\\Models\\Project', 3, NULL, NULL),
(21, 3, 'App\\Models\\Ticket', 3, NULL, NULL),
(24, 4, 'App\\Models\\Ticket', 3, NULL, NULL),
(25, 5, 'App\\Models\\Ticket', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Follow Up', 'Follow Up', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(3, 'Important', 'Important', '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(7, 'N/A', NULL, '2024-05-17 13:53:22', '2024-05-17 13:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `member_id` int(10) UNSIGNED DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `billable` tinyint(1) DEFAULT NULL,
  `subject` varchar(191) NOT NULL,
  `status` int(11) NOT NULL,
  `hourly_rate` varchar(191) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `related_to` int(11) DEFAULT NULL,
  `owner_type` varchar(191) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_rates`
--

CREATE TABLE `tax_rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `tax_rate` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tax_rates`
--

INSERT INTO `tax_rates` (`id`, `name`, `tax_rate`, `created_at`, `updated_at`) VALUES
(7, 'VAT', 18, '2023-06-19 15:26:42', '2024-01-29 13:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) NOT NULL,
  `contact_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `cc` varchar(191) DEFAULT NULL,
  `assign_to` int(10) UNSIGNED DEFAULT NULL,
  `priority_id` int(10) UNSIGNED DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `predefined_reply_id` int(10) UNSIGNED DEFAULT NULL,
  `body` text DEFAULT NULL,
  `ticket_status_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `products` text DEFAULT NULL,
  `warranty_related` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `ticket_no` text DEFAULT NULL,
  `subject_incident` text DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `subject`, `contact_id`, `name`, `email`, `department_id`, `cc`, `assign_to`, `priority_id`, `service_id`, `predefined_reply_id`, `body`, `ticket_status_id`, `created_at`, `updated_at`, `products`, `warranty_related`, `date`, `ticket_no`, `subject_incident`, `customer_id`) VALUES
(3, '', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, '<p>remarks</p>', 1, '2024-04-30 15:22:54', '2024-04-30 15:22:54', NULL, 'No', '2024-04-30', 'INC-SAD1-0001', 'Repair', 11),
(4, '', NULL, NULL, NULL, NULL, NULL, 48, 3, NULL, NULL, '<p>please check oka</p>', 1, '2024-05-21 13:30:31', '2024-05-21 13:30:31', '[\"73\",\"74\"]', 'Yes', '2024-05-21', 'INC-SAD1-0002', 'Repair', 11),
(5, '', NULL, NULL, NULL, NULL, NULL, 17, 3, NULL, NULL, NULL, 1, '2024-05-24 13:39:11', '2024-05-24 13:39:11', '[\"74\"]', 'Yes', '2024-05-24', 'INC-A1-0003', 'Repair', 11),
(6, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>noted</p>', 1, '2024-06-18 21:52:07', '2024-06-18 21:52:32', '[\"73\",\"74\"]', 'Yes', '2024-06-18', 'INC-SAD1-0004', 'Repair', 11);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_priorities`
--

CREATE TABLE `ticket_priorities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_priorities`
--

INSERT INTO `ticket_priorities` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Low', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(2, 'Medium', 1, '2023-01-11 22:50:13', '2024-04-12 18:43:19'),
(3, 'High', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(4, 'Urgent', 1, '2023-01-11 22:50:13', '2024-04-12 18:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reply` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_replies`
--

INSERT INTO `ticket_replies` (`id`, `ticket_id`, `user_id`, `reply`, `created_at`, `updated_at`) VALUES
(3, 4, 1, '<p>cheking the solution okay</p>', '2024-05-21 13:31:26', '2024-05-21 13:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_statuses`
--

CREATE TABLE `ticket_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `pick_color` varchar(191) NOT NULL,
  `is_default` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_statuses`
--

INSERT INTO `ticket_statuses` (`id`, `name`, `pick_color`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Open', '#fc544b', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(2, 'In Progress', '#6777ef', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(3, 'Answered', '#3abaf4', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(4, 'On Hold', '#ffa426', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13'),
(5, 'Closed', '#47c363', 1, '2023-01-11 22:50:13', '2023-01-11 22:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `last_name` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `owner_type` varchar(191) DEFAULT NULL,
  `is_enable` tinyint(1) NOT NULL DEFAULT 1,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(191) DEFAULT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `linkedin` varchar(191) DEFAULT NULL,
  `skype` varchar(191) DEFAULT NULL,
  `staff_member` tinyint(1) DEFAULT NULL,
  `send_welcome_email` tinyint(1) DEFAULT NULL,
  `default_language` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) DEFAULT NULL,
  `pm_type` varchar(191) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `member_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `owner_id`, `owner_type`, `is_enable`, `is_admin`, `image`, `facebook`, `linkedin`, `skype`, `staff_member`, `send_welcome_email`, `default_language`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`, `member_id`) VALUES
(1, 'Super', 'Admin', 'admin@infycrm.com', '+35621249200', '$2y$10$wxDbHkXgU6M.wT4SUOdfFu70Y8Rb2v9fW6GNzKkwwLFNTOadYwVNy', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 0, 0, NULL, '2023-01-11 22:50:13', 'LXRJ73ESFDkhgmELGfpT1suJKYJeHLZmw7qkpbQaWRiADLzVk4LudYiyJudh', '2023-01-11 22:50:13', '2024-05-06 14:41:00', NULL, NULL, NULL, NULL, 'SupeA001'),
(12, 'Charles', 'Muscat', 'charles@parliament.mt', '+35679888856', '$2y$10$TO/0K5AVRcXl3VtWWZYxQ.kKjC8iHTB3UshobFY.HgWSWoMa9oVeW', 2, 'App\\Models\\Contact', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-27 13:34:21', '2024-03-06 19:39:22', NULL, NULL, NULL, NULL, 'CharM001'),
(16, 'SALES', 'AGENT', 'salescutrico@email.com', '+35679425029', '$2y$10$fKMji.Y7menS/rYkgl8U1ec19.HThQPr/p552zGmcwIfhsWxVyOSm', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, 0, 0, 'en', '2023-09-19 11:05:04', NULL, '2023-09-19 11:04:50', '2024-04-12 18:32:02', NULL, NULL, NULL, NULL, 'SALEC001'),
(17, 'Installer', 'Cutrico', 'installercutrico@email.com', '+35679465029', '$2y$10$wY00j2aiZ/x9aWM0hyYwc./9yAChHKbQZDSRJQ8MFNhkidTXvkGdS', NULL, NULL, 1, 0, '/uploads/male-avatar-portrait-of-a-young-man-with-a-beard-illustration-of-male-character-in-modern-color-style-vector.jpg', NULL, NULL, NULL, 0, 0, NULL, '2023-09-19 11:06:32', '4e6JwjblkO2BFQIwXNjBqlevGMHQf6ahPPeUR1sgedbCIr4Ha26BMrXx9I10', '2023-09-19 11:06:27', '2024-05-06 14:42:51', NULL, NULL, NULL, NULL, 'INSTC001'),
(45, 'Emmanuel', 'Obafemi', 'obafemie@gmail.com', '+2348160492362', '$2y$10$ucdFKD5SKAoTSHfT6Drr6OyUgFWOhlEdEDuSca22VN0lqK8vuWvMe', NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, '2024-04-02 11:43:41', '2024-04-22 11:06:12', NULL, NULL, NULL, NULL, 'EmmaO001'),
(47, 'Administrator', NULL, 'cutricotestingcrm@gmail.com', '+35699455871', '$2y$10$sdWpoIeMwMGi/FtjPg4IHObRoFtx2ybeORMFSyPX74SagFgH1M1YS', NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 0, 1, NULL, '2024-04-08 18:15:16', NULL, '2024-04-08 18:11:38', '2024-04-12 18:21:32', NULL, NULL, NULL, NULL, 'Admi001'),
(48, 'Darren', 'Agius', 'darren.a.cutrico@gmail.com', '+35679934470', '$2y$10$7Ubal34W3PWjy5lYHEjoz.oGX17S/WyFqCdgUHVIqeWUKBGzhY4.2', NULL, NULL, 1, 0, '/uploads/male-avatar-portrait-of-a-young-man-with-a-beard-illustration-of-male-character-in-modern-color-style-vector.jpg', NULL, NULL, NULL, 0, 0, 'en', NULL, NULL, '2024-04-08 18:47:08', '2024-05-06 14:42:31', NULL, NULL, NULL, NULL, 'DarrA001');

-- --------------------------------------------------------

--
-- Table structure for table `user_departments`
--

CREATE TABLE `user_departments` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warranties`
--

CREATE TABLE `warranties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(191) DEFAULT NULL,
  `customer_group` varchar(191) DEFAULT NULL,
  `customer_group_id` int(11) DEFAULT NULL,
  `customer` varchar(191) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product` varchar(191) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `country` varchar(191) DEFAULT NULL,
  `locality` varchar(191) DEFAULT NULL,
  `installation_date` varchar(191) DEFAULT NULL,
  `product_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warrantyproducts`
--

CREATE TABLE `warrantyproducts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warranty_id` int(11) DEFAULT NULL,
  `product` varchar(191) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `duration` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warrantyproducts`
--

INSERT INTO `warrantyproducts` (`id`, `warranty_id`, `product`, `product_id`, `quantity`, `description`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, 'AIRCONDITION A123', 1, 20, 'description', '1 years', '2023-07-06 05:56:30', '2023-07-06 05:56:39'),
(2, 3, 'AIRCONDITION A123', 1, 1, NULL, '1', '2023-07-11 03:04:27', '2023-07-11 03:04:27'),
(4, 5, 'AIRCONDITION A123', 1, 6, NULL, '1', '2023-09-13 04:30:51', '2023-09-13 04:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `warranty_types`
--

CREATE TABLE `warranty_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warranty_types`
--

INSERT INTO `warranty_types` (`id`, `number`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Year', '2024-05-13 14:12:35', '2024-05-13 14:12:35'),
(2, 2, 'Years', '2024-05-13 14:12:40', '2024-05-13 14:12:40'),
(3, 3, 'Years', '2024-05-13 14:12:48', '2024-05-13 14:12:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_group_id_foreign` (`group_id`);

--
-- Indexes for table `article_groups`
--
ALTER TABLE `article_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_groups_group_name_unique` (`group_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_customer_id_foreign` (`customer_id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_email_notifications`
--
ALTER TABLE `contact_email_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_email_notifications_contact_id_foreign` (`contact_id`),
  ADD KEY `contact_email_notifications_email_notification_id_foreign` (`email_notification_id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contracts_subject_unique` (`subject`),
  ADD KEY `contracts_customer_id_foreign` (`customer_id`),
  ADD KEY `contracts_contract_type_id_foreign` (`contract_type_id`);

--
-- Indexes for table `contract_types`
--
ALTER TABLE `contract_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contract_types_name_unique` (`name`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_notes`
--
ALTER TABLE `credit_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_notes_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `credit_note_addresses`
--
ALTER TABLE `credit_note_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_note_addresses_credit_note_id_foreign` (`credit_note_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_groups`
--
ALTER TABLE `customer_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_groups_name_unique` (`name`);

--
-- Indexes for table `customer_to_customer_groups`
--
ALTER TABLE `customer_to_customer_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_to_customer_groups_customer_id_foreign` (`customer_id`),
  ADD KEY `customer_to_customer_groups_customer_group_id_foreign` (`customer_group_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `email_notifications`
--
ALTER TABLE `email_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estimates`
--
ALTER TABLE `estimates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estimates_customer_id_foreign` (`customer_id`),
  ADD KEY `estimates_sales_agent_id_foreign` (`sales_agent_id`);

--
-- Indexes for table `estimate_addresses`
--
ALTER TABLE `estimate_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estimate_addresses_estimate_id_foreign` (`estimate_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_expense_category_id_foreign` (`expense_category_id`),
  ADD KEY `expenses_tax_1_id_foreign` (`tax_1_id`),
  ADD KEY `expenses_tax_2_id_foreign` (`tax_2_id`),
  ADD KEY `expenses_payment_mode_id_foreign` (`payment_mode_id`),
  ADD KEY `expenses_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expense_categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `goals_subject_unique` (`subject`);

--
-- Indexes for table `goal_members`
--
ALTER TABLE `goal_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `goal_members_user_id_foreign` (`user_id`),
  ADD KEY `goal_members_goal_id_foreign` (`goal_id`);

--
-- Indexes for table `goal_types`
--
ALTER TABLE `goal_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `goal_types_name_unique` (`name`);

--
-- Indexes for table `installation_notes`
--
ALTER TABLE `installation_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_customer_id_foreign` (`customer_id`),
  ADD KEY `invoices_sales_agent_id_foreign` (`sales_agent_id`);

--
-- Indexes for table `invoice_addresses`
--
ALTER TABLE `invoice_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_addresses_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `invoice_payment_modes`
--
ALTER TABLE `invoice_payment_modes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_payment_modes_payment_mode_id_foreign` (`payment_mode_id`),
  ADD KEY `invoice_payment_modes_invoice_id_foreign` (`invoice_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_item_group_id_foreign` (`item_group_id`);

--
-- Indexes for table `item_groups`
--
ALTER TABLE `item_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_groups_name_unique` (`name`);

--
-- Indexes for table `jobreminders`
--
ALTER TABLE `jobreminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leads_status_id_foreign` (`status_id`),
  ADD KEY `leads_source_id_foreign` (`source_id`),
  ADD KEY `leads_assign_to_foreign` (`assign_to`);

--
-- Indexes for table `lead_sources`
--
ALTER TABLE `lead_sources`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lead_sources_name_unique` (`name`);

--
-- Indexes for table `lead_statuses`
--
ALTER TABLE `lead_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `member_groups`
--
ALTER TABLE `member_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_to_member_groups`
--
ALTER TABLE `member_to_member_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_added_by_foreign` (`added_by`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_payment_mode_foreign` (`payment_mode`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_modes_name_unique` (`name`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predefined_replies`
--
ALTER TABLE `predefined_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `project_contacts`
--
ALTER TABLE `project_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_contacts_contact_id_foreign` (`contact_id`),
  ADD KEY `project_contacts_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_members_user_id_foreign` (`user_id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proposals_proposal_number_unique` (`proposal_number`);

--
-- Indexes for table `proposal_addresses`
--
ALTER TABLE `proposal_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_addresses_proposal_id_foreign` (`proposal_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reminders_reminder_to_foreign` (`reminder_to`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_item_taxes`
--
ALTER TABLE `sales_item_taxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_item_taxes_tax_id_foreign` (`tax_id`),
  ADD KEY `sales_item_taxes_sales_item_id_foreign` (`sales_item_id`);

--
-- Indexes for table `sales_taxes`
--
ALTER TABLE `sales_taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taggables_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_member_id_foreign` (`member_id`);

--
-- Indexes for table `tax_rates`
--
ALTER TABLE `tax_rates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tax_rates_name_unique` (`name`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_priority_id_foreign` (`priority_id`),
  ADD KEY `tickets_service_id_foreign` (`service_id`),
  ADD KEY `tickets_ticket_status_id_foreign` (`ticket_status_id`),
  ADD KEY `tickets_predefined_reply_id_foreign` (`predefined_reply_id`),
  ADD KEY `tickets_contact_id_foreign` (`contact_id`),
  ADD KEY `tickets_department_id_foreign` (`department_id`),
  ADD KEY `tickets_assign_to_foreign` (`assign_to`);

--
-- Indexes for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_priorities_name_unique` (`name`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_replies_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_statuses_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `user_departments`
--
ALTER TABLE `user_departments`
  ADD KEY `user_departments_user_id_foreign` (`user_id`),
  ADD KEY `user_departments_department_id_foreign` (`department_id`);

--
-- Indexes for table `warranties`
--
ALTER TABLE `warranties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warrantyproducts`
--
ALTER TABLE `warrantyproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warranty_types`
--
ALTER TABLE `warranty_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=569;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_groups`
--
ALTER TABLE `article_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_email_notifications`
--
ALTER TABLE `contact_email_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `credit_notes`
--
ALTER TABLE `credit_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_note_addresses`
--
ALTER TABLE `credit_note_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_groups`
--
ALTER TABLE `customer_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer_to_customer_groups`
--
ALTER TABLE `customer_to_customer_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_notifications`
--
ALTER TABLE `email_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimates`
--
ALTER TABLE `estimates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `estimate_addresses`
--
ALTER TABLE `estimate_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `goal_members`
--
ALTER TABLE `goal_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `goal_types`
--
ALTER TABLE `goal_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installation_notes`
--
ALTER TABLE `installation_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `invoice_addresses`
--
ALTER TABLE `invoice_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `invoice_payment_modes`
--
ALTER TABLE `invoice_payment_modes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `item_groups`
--
ALTER TABLE `item_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobreminders`
--
ALTER TABLE `jobreminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lead_sources`
--
ALTER TABLE `lead_sources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lead_statuses`
--
ALTER TABLE `lead_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `member_groups`
--
ALTER TABLE `member_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member_to_member_groups`
--
ALTER TABLE `member_to_member_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `predefined_replies`
--
ALTER TABLE `predefined_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_contacts`
--
ALTER TABLE `project_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal_addresses`
--
ALTER TABLE `proposal_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `sales_item_taxes`
--
ALTER TABLE `sales_item_taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `sales_taxes`
--
ALTER TABLE `sales_taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_rates`
--
ALTER TABLE `tax_rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ticket_priorities`
--
ALTER TABLE `ticket_priorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `warranties`
--
ALTER TABLE `warranties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `warrantyproducts`
--
ALTER TABLE `warrantyproducts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `warranty_types`
--
ALTER TABLE `warranty_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `article_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_email_notifications`
--
ALTER TABLE `contact_email_notifications`
  ADD CONSTRAINT `contact_email_notifications_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contact_email_notifications_email_notification_id_foreign` FOREIGN KEY (`email_notification_id`) REFERENCES `email_notifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_contract_type_id_foreign` FOREIGN KEY (`contract_type_id`) REFERENCES `contract_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contracts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_notes`
--
ALTER TABLE `credit_notes`
  ADD CONSTRAINT `credit_notes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_note_addresses`
--
ALTER TABLE `credit_note_addresses`
  ADD CONSTRAINT `credit_note_addresses_credit_note_id_foreign` FOREIGN KEY (`credit_note_id`) REFERENCES `credit_notes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_to_customer_groups`
--
ALTER TABLE `customer_to_customer_groups`
  ADD CONSTRAINT `customer_to_customer_groups_customer_group_id_foreign` FOREIGN KEY (`customer_group_id`) REFERENCES `customer_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_to_customer_groups_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `estimates`
--
ALTER TABLE `estimates`
  ADD CONSTRAINT `estimates_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estimates_sales_agent_id_foreign` FOREIGN KEY (`sales_agent_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `estimate_addresses`
--
ALTER TABLE `estimate_addresses`
  ADD CONSTRAINT `estimate_addresses_estimate_id_foreign` FOREIGN KEY (`estimate_id`) REFERENCES `estimates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expenses_expense_category_id_foreign` FOREIGN KEY (`expense_category_id`) REFERENCES `expense_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expenses_payment_mode_id_foreign` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_modes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expenses_tax_1_id_foreign` FOREIGN KEY (`tax_1_id`) REFERENCES `tax_rates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expenses_tax_2_id_foreign` FOREIGN KEY (`tax_2_id`) REFERENCES `tax_rates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `goal_members`
--
ALTER TABLE `goal_members`
  ADD CONSTRAINT `goal_members_goal_id_foreign` FOREIGN KEY (`goal_id`) REFERENCES `goals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goal_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoices_sales_agent_id_foreign` FOREIGN KEY (`sales_agent_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `invoice_addresses`
--
ALTER TABLE `invoice_addresses`
  ADD CONSTRAINT `invoice_addresses_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_payment_modes`
--
ALTER TABLE `invoice_payment_modes`
  ADD CONSTRAINT `invoice_payment_modes_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_payment_modes_payment_mode_id_foreign` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_modes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_item_group_id_foreign` FOREIGN KEY (`item_group_id`) REFERENCES `item_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_assign_to_foreign` FOREIGN KEY (`assign_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leads_source_id_foreign` FOREIGN KEY (`source_id`) REFERENCES `lead_sources` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leads_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `lead_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_payment_mode_foreign` FOREIGN KEY (`payment_mode`) REFERENCES `payment_modes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_contacts`
--
ALTER TABLE `project_contacts`
  ADD CONSTRAINT `project_contacts_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_contacts_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_members`
--
ALTER TABLE `project_members`
  ADD CONSTRAINT `project_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proposal_addresses`
--
ALTER TABLE `proposal_addresses`
  ADD CONSTRAINT `proposal_addresses_proposal_id_foreign` FOREIGN KEY (`proposal_id`) REFERENCES `proposals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_reminder_to_foreign` FOREIGN KEY (`reminder_to`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_item_taxes`
--
ALTER TABLE `sales_item_taxes`
  ADD CONSTRAINT `sales_item_taxes_sales_item_id_foreign` FOREIGN KEY (`sales_item_id`) REFERENCES `sales_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_item_taxes_tax_id_foreign` FOREIGN KEY (`tax_id`) REFERENCES `tax_rates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_assign_to_foreign` FOREIGN KEY (`assign_to`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_predefined_reply_id_foreign` FOREIGN KEY (`predefined_reply_id`) REFERENCES `predefined_replies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `ticket_priorities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ticket_status_id_foreign` FOREIGN KEY (`ticket_status_id`) REFERENCES `ticket_statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD CONSTRAINT `ticket_replies_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_departments`
--
ALTER TABLE `user_departments`
  ADD CONSTRAINT `user_departments_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_departments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
