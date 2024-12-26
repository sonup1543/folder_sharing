-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 25, 2024 at 11:13 PM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `folder_sharing`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `activity_type` varchar(255) DEFAULT NULL,
  `new_summery` text DEFAULT NULL,
  `old_summery` text DEFAULT NULL,
  `ipaddress` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `fullname`, `activity_type`, `new_summery`, `old_summery`, `ipaddress`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sitanshu Dabir', 'Employee Update', '{\"_token\":\"l8F76pKl5jsMPQfWtGlXsXNzYVuoDaVpV3S5xbn6\",\"employee_name\":\"employee\",\"official_emailid\":\"employee@gmail.com\",\"mobile_number\":\"9874563210\",\"department_id\":\"2\",\"password\":\"\",\"confirm_password\":\"\",\"status\":\"1\",\"nameofthebu_ids\":\"0\",\"countrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode1\":\"\",\"countrycode2\":\"\",\"emgcountrycode\":\"\",\"emgcountrycode1\":\"\",\"added_by\":\"1\",\"employee_id\":\"2\",\"user_id\":\"2\"}', '{\"id\":2,\"employee_name\":\"employee\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"employee@gmail.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"9874563210\",\"mbl_cc1\":null,\"father_husband_cotact_number\":null,\"mbl_cc2\":null,\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":null,\"emg_mobile_number\":null,\"emgmbl_cc1\":null,\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":1,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2023-07-23T20:23:03.000000Z\",\"updated_at\":\"2024-12-02T10:52:05.000000Z\"}', '127.0.0.1', '2024-12-02 05:23:06', '2024-12-02 05:23:06'),
(2, 1, 'Sitanshu Dabir', 'Admin Profile Update', '{\"_token\":\"l8F76pKl5jsMPQfWtGlXsXNzYVuoDaVpV3S5xbn6\",\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"user_id\":\"1\"}', '{\"id\":1,\"name\":\"Sitanshu Dabir\",\"email\":\"admin@nykaevents.com\",\"email_verified_at\":null,\"roles_id\":1,\"theme_id\":1,\"status\":1,\"created_at\":\"2023-07-04T06:49:19.000000Z\",\"updated_at\":\"2024-02-14T01:58:45.000000Z\"}', '127.0.0.1', '2024-12-02 05:24:25', '2024-12-02 05:24:25'),
(3, 1, 'Admin', 'Employee Status Update', '{\"status\":\"1\",\"employee_id\":\"6\",\"_token\":\"ItK9oeG2ecngKz6GDbn7aefWJkSKTxQKVTr5xoUk\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"7896543211\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":0,\"archive_permission\":0,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T09:52:40.000000Z\"}', '103.201.142.219', '2024-12-24 16:53:53', '2024-12-24 16:53:53'),
(4, 1, 'Admin', 'Employee Status Update', '{\"status\":\"0\",\"employee_id\":\"6\",\"_token\":\"ItK9oeG2ecngKz6GDbn7aefWJkSKTxQKVTr5xoUk\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"7896543211\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":1,\"archive_permission\":0,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T09:53:53.000000Z\"}', '103.201.142.219', '2024-12-24 16:54:00', '2024-12-24 16:54:00'),
(5, 1, 'Admin', 'Employee Status Update', '{\"status\":\"1\",\"employee_id\":\"6\",\"_token\":\"ItK9oeG2ecngKz6GDbn7aefWJkSKTxQKVTr5xoUk\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"7896543211\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":0,\"archive_permission\":0,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T09:54:00.000000Z\"}', '103.201.142.219', '2024-12-24 16:54:05', '2024-12-24 16:54:05'),
(6, 1, 'Admin', 'Employee Status Update', '{\"status\":\"0\",\"employee_id\":\"6\",\"_token\":\"ItK9oeG2ecngKz6GDbn7aefWJkSKTxQKVTr5xoUk\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"7896543211\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":1,\"archive_permission\":0,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T09:54:05.000000Z\"}', '103.201.142.219', '2024-12-24 16:54:46', '2024-12-24 16:54:46'),
(7, 1, 'Admin', 'Employee Status Update', '{\"status\":\"1\",\"employee_id\":\"6\",\"_token\":\"HDctH4QsSIhAWmp46F8nK9uKTlL1mAy4trc0lUPg\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"7896543211\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":0,\"archive_permission\":0,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T09:54:46.000000Z\"}', '103.201.142.219', '2024-12-24 17:23:14', '2024-12-24 17:23:14'),
(8, 1, 'Admin', 'Theme Color Change', '{\"themeid\":\"2\"}', '{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"email_verified_at\":null,\"roles_id\":1,\"theme_id\":1,\"status\":1,\"created_at\":\"2023-07-03T18:19:19.000000Z\",\"updated_at\":\"2024-12-01T22:24:25.000000Z\"}', '103.201.142.219', '2024-12-24 17:24:48', '2024-12-24 17:24:48'),
(9, 1, 'Admin', 'Theme Color Change', '{\"themeid\":\"2\"}', '{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"email_verified_at\":null,\"roles_id\":1,\"theme_id\":2,\"status\":1,\"created_at\":\"2023-07-03T18:19:19.000000Z\",\"updated_at\":\"2024-12-24T10:24:48.000000Z\"}', '103.201.142.219', '2024-12-24 17:24:54', '2024-12-24 17:24:54'),
(10, 1, 'Admin', 'Theme Color Change', '{\"themeid\":\"2\"}', '{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"email_verified_at\":null,\"roles_id\":1,\"theme_id\":2,\"status\":1,\"created_at\":\"2023-07-03T18:19:19.000000Z\",\"updated_at\":\"2024-12-24T10:24:48.000000Z\"}', '103.201.142.219', '2024-12-24 17:24:55', '2024-12-24 17:24:55'),
(11, 1, 'Admin', 'Theme Color Change', '{\"themeid\":\"2\"}', '{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"email_verified_at\":null,\"roles_id\":1,\"theme_id\":2,\"status\":1,\"created_at\":\"2023-07-03T18:19:19.000000Z\",\"updated_at\":\"2024-12-24T10:24:48.000000Z\"}', '103.201.142.219', '2024-12-24 17:25:02', '2024-12-24 17:25:02'),
(12, 1, 'Admin', 'Theme Color Change', '{\"themeid\":\"2\"}', '{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"email_verified_at\":null,\"roles_id\":1,\"theme_id\":2,\"status\":1,\"created_at\":\"2023-07-03T18:19:19.000000Z\",\"updated_at\":\"2024-12-24T10:24:48.000000Z\"}', '103.201.142.219', '2024-12-24 17:25:02', '2024-12-24 17:25:02'),
(13, 1, 'Admin', 'Theme Color Change', '{\"themeid\":\"1\"}', '{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"email_verified_at\":null,\"roles_id\":1,\"theme_id\":2,\"status\":1,\"created_at\":\"2023-07-03T18:19:19.000000Z\",\"updated_at\":\"2024-12-24T10:24:48.000000Z\"}', '103.201.142.219', '2024-12-24 17:25:04', '2024-12-24 17:25:04'),
(14, 1, 'Admin', 'Employee Status Update', '{\"status\":\"0\",\"employee_id\":\"6\",\"_token\":\"dyDocM0BDbJ2tq5NRIcu8JY8MqdZJFAQ29gRuyhU\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"7896543211\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":1,\"archive_permission\":0,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T10:23:13.000000Z\"}', '103.201.142.219', '2024-12-24 17:27:12', '2024-12-24 17:27:12'),
(15, 1, 'Admin', 'Employee Update', '{\"_token\":\"HDctH4QsSIhAWmp46F8nK9uKTlL1mAy4trc0lUPg\",\"employee_name\":\"Siya\",\"official_emailid\":\"siya@mailinator.com\",\"mobile_number\":\"7896543211\",\"department_id\":\"2\",\"password\":\"\",\"confirm_password\":\"\",\"status\":\"1\",\"nameofthebu_ids\":\"0\",\"countrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emgcountrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emgcountrycode1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"added_by\":\"1\",\"employee_id\":\"6\",\"user_id\":\"6\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"7896543211\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":0,\"archive_permission\":0,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T10:27:12.000000Z\"}', '103.201.142.219', '2024-12-24 17:27:56', '2024-12-24 17:27:56'),
(16, 1, 'Admin', 'Admin Profile Update', '{\"_token\":\"HDctH4QsSIhAWmp46F8nK9uKTlL1mAy4trc0lUPg\",\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"user_id\":\"1\"}', '{\"id\":1,\"name\":\"Admin\",\"email\":\"admin@gmail.com\",\"email_verified_at\":null,\"roles_id\":1,\"theme_id\":1,\"status\":1,\"created_at\":\"2023-07-03T18:19:19.000000Z\",\"updated_at\":\"2024-12-24T10:25:04.000000Z\"}', '103.201.142.219', '2024-12-24 17:28:13', '2024-12-24 17:28:13'),
(17, 1, 'Admin', 'Employee Status Update', '{\"status\":\"0\",\"employee_id\":\"6\",\"_token\":\"dyDocM0BDbJ2tq5NRIcu8JY8MqdZJFAQ29gRuyhU\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"7896543211\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":1,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T10:27:56.000000Z\"}', '103.201.142.219', '2024-12-24 17:28:18', '2024-12-24 17:28:18'),
(18, 1, 'Admin', 'Employee Status Update', '{\"status\":\"1\",\"employee_id\":\"6\",\"_token\":\"MI63maLXOuco0nXNnDLJQU57VY1nU89aUA0M4Sl8\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"7896543211\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":0,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T10:28:18.000000Z\"}', '103.201.142.219', '2024-12-24 17:32:40', '2024-12-24 17:32:40'),
(19, 6, 'Siya', 'CG Profile Update', '{\"_token\":\"QScsAMZEJ5xGsTlgtYAODoxlP6kOQ2LeQopbEkXL\",\"employee_name\":\"Siya\",\"official_emailid\":\"siya@mailinator.com\",\"mobile_number\":\"078965 43211\",\"nameofthebu_ids\":\"0\",\"countrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emgcountrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emgcountrycode1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"added_by\":\"6\",\"employee_id\":\"6\",\"user_id\":\"6\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"7896543211\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":1,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T10:32:40.000000Z\"}', '103.201.142.219', '2024-12-24 17:34:22', '2024-12-24 17:34:22'),
(20, 6, 'Siya', 'CG Profile Update', '{\"_token\":\"QScsAMZEJ5xGsTlgtYAODoxlP6kOQ2LeQopbEkXL\",\"employee_name\":\"Siya\",\"official_emailid\":\"siya@mailinator.com\",\"mobile_number\":\"078965 43210\",\"nameofthebu_ids\":\"0\",\"countrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emgcountrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emgcountrycode1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"added_by\":\"6\",\"employee_id\":\"6\",\"user_id\":\"6\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"078965 43211\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":1,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T10:34:22.000000Z\"}', '103.201.142.219', '2024-12-24 17:34:35', '2024-12-24 17:34:35'),
(21, 6, 'Siya', 'CS Password Update', '{\"_token\":\"QScsAMZEJ5xGsTlgtYAODoxlP6kOQ2LeQopbEkXL\",\"password\":\"123456789\",\"confirm_password\":\"123456789\",\"user_id\":\"6\"}', '{\"id\":6,\"name\":\"Siya\",\"email\":\"siya@mailinator.com\",\"email_verified_at\":null,\"roles_id\":2,\"theme_id\":1,\"status\":1,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T10:32:40.000000Z\"}', '103.201.142.219', '2024-12-24 17:35:03', '2024-12-24 17:35:03'),
(22, 2, 'employee', 'CG Profile Update', '{\"_token\":\"AUDHfEUCFjmviMLk9gUhSdwsPxH9tYemy18DxLsM\",\"employee_name\":\"employee\",\"official_emailid\":\"employee@gmail.com\",\"mobile_number\":\"098745 63210\",\"nameofthebu_ids\":\"0\",\"countrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode1\":\"\",\"countrycode2\":\"\",\"emgcountrycode\":\"\",\"emgcountrycode1\":\"\",\"added_by\":\"2\",\"employee_id\":\"2\",\"user_id\":\"2\"}', '{\"id\":2,\"employee_name\":\"employee\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"employee@gmail.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"098745 63210\",\"mbl_cc1\":null,\"father_husband_cotact_number\":null,\"mbl_cc2\":null,\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":null,\"emg_mobile_number\":null,\"emgmbl_cc1\":null,\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":1,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2023-07-23T07:53:03.000000Z\",\"updated_at\":\"2024-12-17T22:50:35.000000Z\"}', '103.201.142.219', '2024-12-24 17:35:29', '2024-12-24 17:35:29'),
(23, 2, 'employee', 'CG Profile Update', '{\"_token\":\"AUDHfEUCFjmviMLk9gUhSdwsPxH9tYemy18DxLsM\",\"employee_name\":\"Sonu\",\"official_emailid\":\"sonu@gmail.com\",\"mobile_number\":\"098745 63210\",\"nameofthebu_ids\":\"0\",\"countrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode1\":\"\",\"countrycode2\":\"\",\"emgcountrycode\":\"\",\"emgcountrycode1\":\"\",\"added_by\":\"2\",\"employee_id\":\"2\",\"user_id\":\"2\"}', '{\"id\":2,\"employee_name\":\"employee\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"employee@gmail.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"098745 63210\",\"mbl_cc1\":null,\"father_husband_cotact_number\":null,\"mbl_cc2\":null,\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":null,\"emg_mobile_number\":null,\"emgmbl_cc1\":null,\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":1,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2023-07-23T07:53:03.000000Z\",\"updated_at\":\"2024-12-17T22:50:35.000000Z\"}', '103.201.142.219', '2024-12-24 17:35:41', '2024-12-24 17:35:41'),
(24, 1, 'Admin', 'Employee Status Update', '{\"status\":\"0\",\"employee_id\":\"6\",\"_token\":\"TQIkLFKpVQiMUI9b6ZUJD1LMLPqKJbWBAXGwCJyn\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"078965 43210\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"123456789\",\"status\":1,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-24T10:35:03.000000Z\"}', '103.201.142.219', '2024-12-25 11:58:56', '2024-12-25 11:58:56'),
(25, 1, 'Admin', 'Employee Status Update', '{\"status\":\"0\",\"employee_id\":\"5\",\"_token\":\"TQIkLFKpVQiMUI9b6ZUJD1LMLPqKJbWBAXGwCJyn\"}', '{\"id\":5,\"employee_name\":\"Praveen\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"praveen@gmail.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"987456321\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":1,\"archive_permission\":0,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-23T20:37:27.000000Z\",\"updated_at\":\"2024-12-23T20:37:27.000000Z\"}', '103.201.142.219', '2024-12-25 12:03:12', '2024-12-25 12:03:12'),
(26, 1, 'Admin', 'Employee Status Update', '{\"status\":\"1\",\"employee_id\":\"5\",\"_token\":\"TQIkLFKpVQiMUI9b6ZUJD1LMLPqKJbWBAXGwCJyn\"}', '{\"id\":5,\"employee_name\":\"Praveen\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"praveen@gmail.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"987456321\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":0,\"archive_permission\":0,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-23T20:37:27.000000Z\",\"updated_at\":\"2024-12-25T05:03:12.000000Z\"}', '103.201.142.219', '2024-12-25 12:09:22', '2024-12-25 12:09:22'),
(27, 5, 'Praveen', 'CG Profile Update', '{\"_token\":\"UcNysqAJs72d7WKHGuxNULuZrCWQOnqrkx8fVzio\",\"employee_name\":\"Praveen\",\"official_emailid\":\"praveen@gmail.com\",\"mobile_number\":\"987456320\",\"nameofthebu_ids\":\"0\",\"countrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emgcountrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emgcountrycode1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"added_by\":\"5\",\"employee_id\":\"5\",\"user_id\":\"5\"}', '{\"id\":5,\"employee_name\":\"Praveen\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"praveen@gmail.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"987456321\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"12345678\",\"status\":1,\"archive_permission\":0,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-23T20:37:27.000000Z\",\"updated_at\":\"2024-12-25T05:09:22.000000Z\"}', '103.201.142.219', '2024-12-25 12:44:17', '2024-12-25 12:44:17'),
(28, 1, 'Admin', 'Employee Status Update', '{\"status\":\"1\",\"employee_id\":\"6\",\"_token\":\"au52PfbF9WDOMwWIXYZoRxszU1lQe4B6LixUuekm\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"078965 43210\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"123456789\",\"status\":0,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-25T04:58:56.000000Z\"}', '103.201.142.219', '2024-12-25 13:08:13', '2024-12-25 13:08:13'),
(29, 1, 'Admin', 'Employee Status Update', '{\"status\":\"0\",\"employee_id\":\"6\",\"_token\":\"au52PfbF9WDOMwWIXYZoRxszU1lQe4B6LixUuekm\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"078965 43210\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"123456789\",\"status\":1,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-25T06:08:12.000000Z\"}', '103.201.142.219', '2024-12-25 13:13:06', '2024-12-25 13:13:06'),
(30, 1, 'Admin', 'Employee Status Update', '{\"status\":\"1\",\"employee_id\":\"6\",\"_token\":\"CqkSNc3QWdIiOsXp1TPiYhuZlaCrOOzDQ3mCY36r\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"078965 43210\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"123456789\",\"status\":0,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-25T06:13:06.000000Z\"}', '103.201.142.219', '2024-12-25 13:20:04', '2024-12-25 13:20:04'),
(31, 1, 'Admin', 'Employee Update', '{\"_token\":\"jM1Rg0mN0dFwOq9rx9qE5ZvVLxgbv7AKasoynAzX\",\"employee_name\":\"Siya\",\"official_emailid\":\"siya@mailinator.com\",\"mobile_number\":\"078965 43210\",\"department_id\":\"2\",\"password\":\"123456\",\"confirm_password\":\"123456\",\"status\":\"1\",\"nameofthebu_ids\":\"0\",\"countrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"countrycode2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emgcountrycode\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emgcountrycode1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"added_by\":\"1\",\"employee_id\":\"6\",\"user_id\":\"6\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"078965 43210\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"123456789\",\"status\":1,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-25T06:20:04.000000Z\"}', '103.201.142.219', '2024-12-25 13:22:53', '2024-12-25 13:22:53'),
(32, 6, 'Siya', 'Theme Color Change', '{\"themeid\":\"2\"}', '{\"id\":6,\"name\":\"Siya\",\"email\":\"siya@mailinator.com\",\"email_verified_at\":null,\"roles_id\":2,\"theme_id\":1,\"status\":1,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-25T06:22:53.000000Z\"}', '103.201.142.219', '2024-12-25 13:26:20', '2024-12-25 13:26:20'),
(33, 1, 'Admin', 'Employee Status Update', '{\"status\":\"0\",\"employee_id\":\"6\",\"_token\":\"Iwr60zuDGIwLW2NXc3DfkdFudKuhtYmRNr9PWPBw\"}', '{\"id\":6,\"employee_name\":\"Siya\",\"joining_date\":null,\"personal_emailid\":null,\"father_husband_name\":null,\"official_emailid\":\"siya@mailinator.com\",\"mother_name\":null,\"mbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number\":\"078965 43210\",\"mbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"father_husband_cotact_number\":null,\"mbl_cc2\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"mobile_number1\":null,\"profile_image\":null,\"address1\":null,\"adhar_copy\":null,\"address2\":null,\"pan_copy\":null,\"address3\":null,\"salary_slip\":null,\"pincode\":null,\"state\":null,\"name_of_emergency_contact\":null,\"relationship_of_emergency_contact\":null,\"emgmbl_cc\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number\":null,\"emgmbl_cc1\":\"India (\\u092d\\u093e\\u0930\\u0924)+91\",\"emg_mobile_number1\":null,\"department_id\":2,\"nameofthebu_id\":0,\"password\":\"123456\",\"status\":1,\"archive_permission\":null,\"added_by\":1,\"locked_unlocked\":\"0\",\"unlocked_start\":null,\"unlocked_end\":null,\"created_at\":\"2024-12-24T09:50:35.000000Z\",\"updated_at\":\"2024-12-25T06:22:53.000000Z\"}', '103.201.142.219', '2024-12-25 13:26:54', '2024-12-25 13:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `added_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `status`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 1, '2023-07-21 05:07:29', '2024-12-24 16:48:28'),
(2, 'Employee', 1, 1, '2023-07-21 05:07:40', '2024-12-24 16:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `personal_emailid` varchar(255) DEFAULT NULL,
  `father_husband_name` varchar(255) DEFAULT NULL,
  `official_emailid` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `mbl_cc` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `mbl_cc1` varchar(100) DEFAULT NULL,
  `father_husband_cotact_number` varchar(20) DEFAULT NULL,
  `mbl_cc2` varchar(100) DEFAULT NULL,
  `mobile_number1` varchar(128) DEFAULT NULL,
  `profile_image` varchar(128) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `adhar_copy` varchar(128) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `pan_copy` varchar(128) DEFAULT NULL,
  `address3` varchar(255) DEFAULT NULL,
  `salary_slip` varchar(128) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `name_of_emergency_contact` varchar(255) DEFAULT NULL,
  `relationship_of_emergency_contact` varchar(128) DEFAULT NULL,
  `emgmbl_cc` varchar(100) DEFAULT NULL,
  `emg_mobile_number` varchar(20) DEFAULT NULL,
  `emgmbl_cc1` varchar(100) DEFAULT NULL,
  `emg_mobile_number1` varchar(128) DEFAULT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL,
  `nameofthebu_id` int(11) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `status` int(10) UNSIGNED DEFAULT NULL,
  `archive_permission` int(11) DEFAULT 0,
  `added_by` int(10) UNSIGNED DEFAULT NULL,
  `locked_unlocked` varchar(255) NOT NULL DEFAULT '0' COMMENT '0=unlock, 1=lock',
  `unlocked_start` date DEFAULT NULL,
  `unlocked_end` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `joining_date`, `personal_emailid`, `father_husband_name`, `official_emailid`, `mother_name`, `mbl_cc`, `mobile_number`, `mbl_cc1`, `father_husband_cotact_number`, `mbl_cc2`, `mobile_number1`, `profile_image`, `address1`, `adhar_copy`, `address2`, `pan_copy`, `address3`, `salary_slip`, `pincode`, `state`, `name_of_emergency_contact`, `relationship_of_emergency_contact`, `emgmbl_cc`, `emg_mobile_number`, `emgmbl_cc1`, `emg_mobile_number1`, `department_id`, `nameofthebu_id`, `password`, `status`, `archive_permission`, `added_by`, `locked_unlocked`, `unlocked_start`, `unlocked_end`, `created_at`, `updated_at`) VALUES
(2, 'Sonu', NULL, NULL, NULL, 'sonu@gmail.com', NULL, 'India (भारत)+91', '098745 63210', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, '12345678', 1, NULL, 1, '0', NULL, NULL, '2023-07-23 14:53:03', '2024-12-24 17:35:41'),
(3, 'Rahul', NULL, NULL, NULL, 'rahul@gmail.com', NULL, 'India (भारत)+91', '9874563210', 'India (भारत)+91', NULL, 'India (भारत)+91', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'India (भारत)+91', NULL, 'India (भारत)+91', NULL, 2, 0, '123456789', 1, 0, 1, '0', NULL, NULL, '2024-12-24 01:38:18', '2024-12-24 01:38:18'),
(4, 'Raj', NULL, NULL, NULL, 'raj@gmail.com', NULL, 'India (भारत)+91', '9874563210', 'India (भारत)+91', NULL, 'India (भारत)+91', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'India (भारत)+91', NULL, 'India (भारत)+91', NULL, 2, 0, '12345678', 1, NULL, 1, '0', NULL, NULL, '2024-12-24 03:29:38', '2024-12-24 03:29:55'),
(5, 'Praveen', NULL, NULL, NULL, 'praveen@gmail.com', NULL, 'India (भारत)+91', '987456320', 'India (भारत)+91', NULL, 'India (भारत)+91', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'India (भारत)+91', NULL, 'India (भारत)+91', NULL, 2, 0, '12345678', 1, 0, 1, '0', NULL, NULL, '2024-12-24 03:37:27', '2024-12-25 12:44:17'),
(6, 'Siya', NULL, NULL, NULL, 'siya@mailinator.com', NULL, 'India (भारत)+91', '078965 43210', 'India (भारत)+91', NULL, 'India (भारत)+91', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'India (भारत)+91', NULL, 'India (भारत)+91', NULL, 2, 0, '123456', 0, NULL, 1, '0', NULL, NULL, '2024-12-24 16:50:35', '2024-12-25 13:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `file_datas`
--

CREATE TABLE `file_datas` (
  `id` int(11) NOT NULL,
  `name` varchar(512) DEFAULT NULL,
  `fname` varchar(512) DEFAULT NULL,
  `parent_id` int(50) NOT NULL DEFAULT 0,
  `uploaded_by` int(50) NOT NULL DEFAULT 0,
  `path` varchar(512) DEFAULT NULL,
  `delete_at` int(50) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_datas`
--

INSERT INTO `file_datas` (`id`, `name`, `fname`, `parent_id`, `uploaded_by`, `path`, `delete_at`, `created_at`, `updated_at`) VALUES
(1, 'studentimportfile.xlsx', '1735106941_676ba17d35ba6.xlsx', 1, 1, 'public/filemanager/1735106941_676ba17d35ba6.xlsx', 0, '2024-12-25 13:09:01', '2024-12-25 13:09:01'),
(2, 'testingnames.txt', '1735106941_676ba17d372ae.txt', 1, 1, 'public/filemanager/1735106941_676ba17d372ae.txt', 0, '2024-12-25 13:09:01', '2024-12-25 13:09:01'),
(3, 'universityimportfile.xlsx', '1735106941_676ba17d38a7b.xlsx', 1, 1, 'public/filemanager/1735106941_676ba17d38a7b.xlsx', 0, '2024-12-25 13:09:01', '2024-12-25 13:09:01'),
(4, 'UserImport - Copy.xlsx', '1735106941_676ba17d39853.xlsx', 1, 1, 'public/filemanager/1735106941_676ba17d39853.xlsx', 0, '2024-12-25 13:09:01', '2024-12-25 13:09:01'),
(5, 'UserImport (2).xlsx', '1735106941_676ba17d3adfe.xlsx', 1, 1, 'public/filemanager/1735106941_676ba17d3adfe.xlsx', 0, '2024-12-25 13:09:01', '2024-12-25 13:09:01'),
(6, 'UserImport.xlsx', '1735106941_676ba17d3c7c7.xlsx', 1, 1, 'public/filemanager/1735106941_676ba17d3c7c7.xlsx', 0, '2024-12-25 13:09:01', '2024-12-25 13:09:01'),
(7, 'UserImport - Copy_1.xlsx', '1735106991_676ba1af18edf.xlsx', 1, 1, 'public/filemanager/1735106991_676ba1af18edf.xlsx', 0, '2024-12-25 13:09:51', '2024-12-25 13:09:51'),
(8, 'Screenshot_4 - Copy (2).png', '1735107054_676ba1ee1dbaa.png', 5, 1, 'public/filemanager/1735107054_676ba1ee1dbaa.png', 0, '2024-12-25 13:10:54', '2024-12-25 13:10:54'),
(9, 'Screenshot_4 - Copy.png', '1735107054_676ba1ee1e74b.png', 5, 1, 'public/filemanager/1735107054_676ba1ee1e74b.png', 0, '2024-12-25 13:10:54', '2024-12-25 13:10:54'),
(10, 'Screenshot_4.png', '1735107054_676ba1ee1f104.png', 5, 1, 'public/filemanager/1735107054_676ba1ee1f104.png', 0, '2024-12-25 13:10:54', '2024-12-25 13:10:54'),
(11, 'Screenshot_5 - Copy.png', '1735107054_676ba1ee1fa53.png', 5, 1, 'public/filemanager/1735107054_676ba1ee1fa53.png', 0, '2024-12-25 13:10:54', '2024-12-25 13:10:54'),
(12, 'Screenshot_5.png', '1735107054_676ba1ee20402.png', 5, 1, 'public/filemanager/1735107054_676ba1ee20402.png', 0, '2024-12-25 13:10:54', '2024-12-25 13:10:54'),
(13, 'Screenshot_6.png', '1735107054_676ba1ee20dcb.png', 5, 1, 'public/filemanager/1735107054_676ba1ee20dcb.png', 0, '2024-12-25 13:10:54', '2024-12-25 13:10:54'),
(14, 'Screenshot_4 - Copy (2).png', NULL, 6, 1, 'public/filemanager/1735107054_676ba1ee1dbaa.png', 0, '2024-12-25 13:11:18', '2024-12-25 13:11:18'),
(15, 'Screenshot_4 - Copy.png', NULL, 6, 1, 'public/filemanager/1735107054_676ba1ee1e74b.png', 0, '2024-12-25 13:11:18', '2024-12-25 13:11:18'),
(16, 'Screenshot_4.png', NULL, 6, 1, 'public/filemanager/1735107054_676ba1ee1f104.png', 0, '2024-12-25 13:11:18', '2024-12-25 13:11:18'),
(17, 'Screenshot_5 - Copy.png', NULL, 6, 1, 'public/filemanager/1735107054_676ba1ee1fa53.png', 0, '2024-12-25 13:11:18', '2024-12-25 13:11:18'),
(18, 'Screenshot_5.png', NULL, 6, 1, 'public/filemanager/1735107054_676ba1ee20402.png', 0, '2024-12-25 13:11:18', '2024-12-25 13:11:18'),
(19, 'Screenshot_6.png', NULL, 6, 1, 'public/filemanager/1735107054_676ba1ee20dcb.png', 0, '2024-12-25 13:11:18', '2024-12-25 13:11:18'),
(20, 'studentimportfile_1.xlsx', '1735107121_676ba2310d6bb.xlsx', 1, 1, 'public/filemanager/1735107121_676ba2310d6bb.xlsx', 0, '2024-12-25 13:12:01', '2024-12-25 13:12:01'),
(21, 'universityimportfile_1.xlsx', '1735107121_676ba2310ef8d.xlsx', 1, 1, 'public/filemanager/1735107121_676ba2310ef8d.xlsx', 0, '2024-12-25 13:12:01', '2024-12-25 13:12:01'),
(22, 'UserImport (2)_1.xlsx', '1735107121_676ba231105ee.xlsx', 1, 1, 'public/filemanager/1735107121_676ba231105ee.xlsx', 0, '2024-12-25 13:12:01', '2024-12-25 13:12:01'),
(23, 'UserImport_1.xlsx', '1735107121_676ba231119b3.xlsx', 1, 1, 'public/filemanager/1735107121_676ba231119b3.xlsx', 0, '2024-12-25 13:12:01', '2024-12-25 13:12:01'),
(24, 'UserImport (2)_2.xlsx', '1735107287_676ba2d7d54e5.xlsx', 2, 5, 'public/filemanager/1735107287_676ba2d7d54e5.xlsx', 0, '2024-12-25 13:14:47', '2024-12-25 13:14:47'),
(25, 'UserImport_2.xlsx', '1735107287_676ba2d7d7123.xlsx', 2, 5, 'public/filemanager/1735107287_676ba2d7d7123.xlsx', 0, '2024-12-25 13:14:47', '2024-12-25 13:14:47'),
(26, 'ImportQuoteVsEC_CS (1).xlsx', '1735107287_676ba2d7d9972.xlsx', 2, 5, 'public/filemanager/1735107287_676ba2d7d9972.xlsx', 0, '2024-12-25 13:14:47', '2024-12-25 13:14:47'),
(27, 'studentimportfile_2.xlsx', '1735107287_676ba2d7db36f.xlsx', 2, 5, 'public/filemanager/1735107287_676ba2d7db36f.xlsx', 0, '2024-12-25 13:14:47', '2024-12-25 13:14:47'),
(28, 'testingnames_1.txt', '1735107287_676ba2d7dce65.txt', 2, 5, 'public/filemanager/1735107287_676ba2d7dce65.txt', 0, '2024-12-25 13:14:47', '2024-12-25 13:14:47'),
(29, 'universityimportfile_2.xlsx', '1735107287_676ba2d7de0aa.xlsx', 2, 5, 'public/filemanager/1735107287_676ba2d7de0aa.xlsx', 0, '2024-12-25 13:14:47', '2024-12-25 13:14:47'),
(30, 'UserImport - Copy_2.xlsx', '1735107287_676ba2d7df68c.xlsx', 2, 5, 'public/filemanager/1735107287_676ba2d7df68c.xlsx', 0, '2024-12-25 13:14:47', '2024-12-25 13:14:47'),
(31, 'Screenshot_4 - Copy (2).png', NULL, 7, 5, 'public/filemanager/1735107054_676ba1ee1dbaa.png', 0, '2024-12-25 13:15:26', '2024-12-25 13:15:26'),
(32, 'Screenshot_4 - Copy.png', NULL, 7, 5, 'public/filemanager/1735107054_676ba1ee1e74b.png', 0, '2024-12-25 13:15:26', '2024-12-25 13:15:26'),
(33, 'Screenshot_4.png', NULL, 7, 5, 'public/filemanager/1735107054_676ba1ee1f104.png', 0, '2024-12-25 13:15:26', '2024-12-25 13:15:26'),
(34, 'Screenshot_5 - Copy.png', NULL, 7, 5, 'public/filemanager/1735107054_676ba1ee1fa53.png', 0, '2024-12-25 13:15:26', '2024-12-25 13:15:26'),
(35, 'Screenshot_5.png', NULL, 7, 5, 'public/filemanager/1735107054_676ba1ee20402.png', 0, '2024-12-25 13:15:26', '2024-12-25 13:15:26'),
(36, 'Screenshot_6.png', NULL, 7, 5, 'public/filemanager/1735107054_676ba1ee20dcb.png', 0, '2024-12-25 13:15:26', '2024-12-25 13:15:26'),
(37, 'Screenshot (1).png', '1735107543_676ba3d7e6ba3.png', 10, 1, 'public/filemanager/1735107543_676ba3d7e6ba3.png', 0, '2024-12-25 13:19:03', '2024-12-25 13:19:03'),
(38, 'Screenshot (1).png', NULL, 12, 1, 'public/filemanager/1735107543_676ba3d7e6ba3.png', 0, '2024-12-25 13:19:23', '2024-12-25 13:19:23'),
(39, 'Linkedin_Innovation_23 Feb-2016.xlsx', '1735107844_676ba504cfbc6.xlsx', 7, 6, 'public/filemanager/1735107844_676ba504cfbc6.xlsx', 0, '2024-12-25 13:24:04', '2024-12-25 13:24:04'),
(40, 'Screenshot (1).png', NULL, 18, 1, 'public/filemanager/1735107543_676ba3d7e6ba3.png', 0, '2024-12-25 13:27:25', '2024-12-25 13:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `file_managers`
--

CREATE TABLE `file_managers` (
  `id` int(20) NOT NULL,
  `name` varchar(512) DEFAULT NULL,
  `parent_id` int(50) NOT NULL DEFAULT 0,
  `created_by` int(50) NOT NULL DEFAULT 0,
  `assigned_to` varchar(512) NOT NULL DEFAULT '0',
  `path` varchar(512) DEFAULT NULL,
  `delete_at` int(50) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_managers`
--

INSERT INTO `file_managers` (`id`, `name`, `parent_id`, `created_by`, `assigned_to`, `path`, `delete_at`, `created_at`, `updated_at`) VALUES
(1, 'folder1', 0, 1, '0', 'folder1', 0, '2024-12-25 13:06:47', '2024-12-25 13:06:47'),
(2, 'folder2', 0, 1, '0', 'folder2', 0, '2024-12-25 13:07:22', '2024-12-25 13:07:22'),
(3, 'folder3', 0, 1, '0', 'folder3', 0, '2024-12-25 13:07:32', '2024-12-25 13:07:32'),
(4, 'sonu', 0, 1, '0', 'sonu', 0, '2024-12-25 13:08:17', '2024-12-25 13:08:17'),
(5, 'Foler1_sub', 1, 1, '0', 'folder1/Foler1_sub', 0, '2024-12-25 13:10:08', '2024-12-25 13:10:08'),
(6, 'Foler1_sub', 2, 1, '0', 'folder1/Foler1_sub_Foler1_sub', 0, '2024-12-25 13:11:18', '2024-12-25 13:11:18'),
(7, 'Foler1_sub', 3, 5, '0', 'folder1/Foler1_sub_Foler1_sub', 0, '2024-12-25 13:15:26', '2024-12-25 13:15:26'),
(8, 'rahul', 0, 1, '0', 'rahul', 0, '2024-12-25 13:17:46', '2024-12-25 13:17:46'),
(9, 'one', 8, 1, '0', 'rahul/one', 0, '2024-12-25 13:18:33', '2024-12-25 13:18:33'),
(10, 'second', 9, 1, '0', 'rahul/one/second', 0, '2024-12-25 13:18:50', '2024-12-25 13:18:50'),
(11, 'one', 4, 1, '0', 'rahul/one_one', 0, '2024-12-25 13:19:23', '2024-12-25 13:19:23'),
(12, 'second', 11, 1, '0', 'rahul/one/second_second', 0, '2024-12-25 13:19:23', '2024-12-25 13:19:23'),
(13, 'subfoler', 7, 6, '0', 'folder1/Foler1_sub_Foler1_sub/subfoler', 0, '2024-12-25 13:24:27', '2024-12-25 13:24:27'),
(14, 'sub_subfolder', 13, 6, '0', 'folder1/Foler1_sub_Foler1_sub/subfoler/sub_subfolder', 0, '2024-12-25 13:24:47', '2024-12-25 13:24:47'),
(15, 'sub_subfolder', 7, 6, '0', 'folder1/Foler1_sub_Foler1_sub/subfoler/sub_subfolder_sub_subfolder', 0, '2024-12-25 13:24:57', '2024-12-25 13:24:57'),
(16, 'second', 0, 1, '0', 'second', 0, '2024-12-25 13:26:54', '2024-12-25 13:26:54'),
(17, 'one', 16, 1, '0', 'second/one', 0, '2024-12-25 13:27:25', '2024-12-25 13:27:25'),
(18, 'second', 17, 1, '0', 'second/one/second', 0, '2024-12-25 13:27:25', '2024-12-25 13:27:25'),
(19, 'Folder1_Sub2', 5, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2', 0, '2024-12-25 13:35:01', '2024-12-25 13:35:01'),
(20, 'Folder1_Sub2', 19, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(21, 'Folder1_Sub2', 20, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(22, 'Folder1_Sub2', 21, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(23, 'Folder1_Sub2', 22, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(24, 'Folder1_Sub2', 23, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(25, 'Folder1_Sub2', 24, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(26, 'Folder1_Sub2', 25, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(27, 'Folder1_Sub2', 26, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(28, 'Folder1_Sub2', 27, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(29, 'Folder1_Sub2', 28, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(30, 'Folder1_Sub2', 29, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(31, 'Folder1_Sub2', 30, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(32, 'Folder1_Sub2', 31, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(33, 'Folder1_Sub2', 32, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(34, 'Folder1_Sub2', 33, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(35, 'Folder1_Sub2', 34, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(36, 'Folder1_Sub2', 35, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(37, 'Folder1_Sub2', 36, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(38, 'Folder1_Sub2', 37, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(39, 'Folder1_Sub2', 38, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(40, 'Folder1_Sub2', 39, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(41, 'Folder1_Sub2', 40, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(42, 'Folder1_Sub2', 41, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(43, 'Folder1_Sub2', 42, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(44, 'Folder1_Sub2', 43, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(45, 'Folder1_Sub2', 44, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(46, 'Folder1_Sub2', 45, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(47, 'Folder1_Sub2', 46, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(48, 'Folder1_Sub2', 47, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(49, 'Folder1_Sub2', 48, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(50, 'Folder1_Sub2', 49, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(51, 'Folder1_Sub2', 50, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(52, 'Folder1_Sub2', 51, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(53, 'Folder1_Sub2', 52, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(54, 'Folder1_Sub2', 53, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(55, 'Folder1_Sub2', 54, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34'),
(56, 'Folder1_Sub2', 55, 5, '0', 'folder1/Foler1_sub/Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2_Folder1_Sub2', 0, '2024-12-25 13:35:34', '2024-12-25 13:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `folder_user_assignments`
--

CREATE TABLE `folder_user_assignments` (
  `id` int(50) NOT NULL,
  `folder_id` int(50) NOT NULL DEFAULT 0,
  `user_id` int(50) NOT NULL DEFAULT 0,
  `assigned_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `folder_user_assignments`
--

INSERT INTO `folder_user_assignments` (`id`, `folder_id`, `user_id`, `assigned_at`, `updated_at`, `created_at`) VALUES
(1, 1, 2, '2024-12-25 13:07:46', '2024-12-25 13:07:46', '2024-12-25 13:07:46'),
(2, 1, 3, '2024-12-25 13:07:46', '2024-12-25 13:07:46', '2024-12-25 13:07:46'),
(3, 1, 4, '2024-12-25 13:07:46', '2024-12-25 13:07:46', '2024-12-25 13:07:46'),
(4, 1, 5, '2024-12-25 13:07:46', '2024-12-25 13:07:46', '2024-12-25 13:07:46'),
(5, 2, 5, '2024-12-25 13:07:58', '2024-12-25 13:07:58', '2024-12-25 13:07:58'),
(6, 3, 2, '2024-12-25 13:08:31', '2024-12-25 13:08:31', '2024-12-25 13:08:31'),
(7, 3, 3, '2024-12-25 13:08:31', '2024-12-25 13:08:31', '2024-12-25 13:08:31'),
(8, 3, 4, '2024-12-25 13:08:31', '2024-12-25 13:08:31', '2024-12-25 13:08:31'),
(9, 3, 5, '2024-12-25 13:08:31', '2024-12-25 13:08:31', '2024-12-25 13:08:31'),
(10, 3, 6, '2024-12-25 13:08:31', '2024-12-25 13:08:31', '2024-12-25 13:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `recipient_id` int(11) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `read` tinyint(1) DEFAULT 0,
  `datetimes` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `remember_token` varchar(100) DEFAULT NULL,
  `roles_id` int(11) DEFAULT NULL COMMENT 'Admin=1, employee=2',
  `theme_id` int(11) DEFAULT NULL COMMENT 'Light=1, Dark=2  ',
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `roles_id`, `theme_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$zn2vLJ4DaVPo0ZCDBCU0Geu8H/bARnQi2V9jGSDKtJResIEQ1kSlO', 'hzM6atqHNVymdWrv89sVrYdNGpoQJNp4AAC5H6ZlPkwnWIu3kUbUB3IAFZZC', 1, 1, 1, '2023-07-04 01:19:19', '2024-12-24 17:25:04'),
(2, 'Sonu', 'sonu@gmail.com', NULL, '$2y$10$u0gnTHG5bmSTgUN3QbHD7uV.PwuUwwK/3JqKYYlfWabQwgSXp2CMq', 'qJnawt2VIUqe7cifMApRKoIQ2pLp9gG8jCer43ttAbmev6G86VK7z3SwtkKi', 2, 1, 1, '2023-07-23 20:23:03', '2024-12-24 17:35:41'),
(3, 'Rahul', 'rahul@gmail.com', NULL, '$2y$12$9tD3V/8OTE8cOrHyd7RvReQabV4hu6yzke.pXSdDcjGP.LmQcq1WW', NULL, 2, 1, 1, '2024-12-24 01:38:18', '2024-12-24 01:38:18'),
(4, 'Raj', 'raj@gmail.com', NULL, '$2y$12$D6tXykBONWZ44cy543vKjecf6keF/yYH0QJMJg60g6Y3tvHpFbz6y', NULL, 2, 1, 1, '2024-12-24 03:29:39', '2024-12-24 03:29:39'),
(5, 'Praveen', 'praveen@gmail.com', NULL, '$2y$12$0c3cSjCD2WkG3XSHCgyQAu4Q1ciTdR9x3qBWcJvGWsVHaYNhFRmU.', NULL, 2, 1, 1, '2024-12-24 03:37:28', '2024-12-25 12:09:22'),
(6, 'Siya', 'siya@mailinator.com', NULL, '$2y$12$sDsMcEz3GQ5/Y/eAsiC9cuc6A8mZVVPP7jm1Z9itApfYPiz8WAH9G', NULL, 2, 2, 0, '2024-12-24 16:50:35', '2024-12-25 13:26:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_datas`
--
ALTER TABLE `file_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_managers`
--
ALTER TABLE `file_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folder_user_assignments`
--
ALTER TABLE `folder_user_assignments`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `file_datas`
--
ALTER TABLE `file_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `file_managers`
--
ALTER TABLE `file_managers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `folder_user_assignments`
--
ALTER TABLE `folder_user_assignments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
