-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2024 at 08:25 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrifinx`
--

-- --------------------------------------------------------

--
-- Table structure for table `agricultural_officers`
--

CREATE TABLE `agricultural_officers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agricultural_officers`
--

INSERT INTO `agricultural_officers` (`id`, `email`, `email_verified_at`, `password`, `f_name`, `l_name`, `phone`, `address`, `dateofbirth`, `created_at`, `updated_at`) VALUES
(3, 'dhaka@gmail.com', NULL, '$2y$12$bQOrNbSXgBOFPToah7pWGeslVbW1USwDIWwehRwCBc6C96uVEBEcW', 'Dhaka', 'Office', '016546546', 'Dhaka', NULL, '2024-04-14 12:38:32', '2024-04-14 12:38:51'),
(4, 'pabna@gmail.com', NULL, '$2y$12$bHs.RU3FaOLi0t1.qTLwUOvvLRE15fYNdvPsc2yA7cE/YT1kSiMyW', 'Pabna', 'Office', '1654165', 'Pabna', NULL, '2024-04-14 12:39:18', '2024-04-14 12:39:41'),
(5, 'feni@gmail.com', NULL, '$2y$12$Bpki28LBWbMwK1oCYS4JIOo0hFgqwXIl93IWVVM5.F1wSikQY0NO2', 'Feni', 'Office', '654654654', 'Feni', NULL, '2024-04-14 12:40:05', '2024-04-14 12:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `cropprojects`
--

CREATE TABLE `cropprojects` (
  `id` bigint UNSIGNED NOT NULL,
  `farmer_id` bigint UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `crop_id` bigint UNSIGNED NOT NULL,
  `launch_date` date NOT NULL,
  `end_date` date NOT NULL,
  `farm_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `corp_quality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesticide_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labour_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funding_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sells` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cropprojects`
--

INSERT INTO `cropprojects` (`id`, `farmer_id`, `project_name`, `description`, `crop_id`, `launch_date`, `end_date`, `farm_size`, `corp_quality`, `pesticide_cost`, `labour_cost`, `funding_status`, `created_at`, `updated_at`, `sells`) VALUES
(7, 8, 'Rice Diversity Project (RDP)', 'Description: This project aims to promote the cultivation of diverse rice varieties, including Aman, Boro, and Aus, to enhance crop resilience and improve food security for Bengali farmers.', 2, '2024-01-15', '2024-06-15', '120', '100', '5000', '12000', 1, '2024-04-14 13:05:40', '2024-04-14 13:27:38', '73'),
(8, 8, 'Jute Sustainability Initiative (JSI)', 'Description: The Jute Sustainability Initiative focuses on promoting sustainable jute cultivation practices in Bangladesh to ensure the long-term viability of the jute industry and improve the livelihoods of jute farmers.', 4, '2024-05-01', '2024-11-10', '720', '500', '4000', '14000', 1, '2024-04-14 13:08:22', '2024-04-14 13:44:25', '110'),
(9, 8, 'Potato Innovation Project (PIP)', 'The Potato Innovation Project introduces innovative farming practices and technologies to potato farmers in Bangladesh, aiming to increase yields, reduce post-harvest losses, and improve profitability.', 5, '2024-10-01', '2024-12-05', '500', '600', '2000', '10000', 0, '2024-04-14 13:10:20', '2024-04-14 13:11:30', '40'),
(10, 8, 'Sugarcane Sustainability Scheme (SSS)', 'Description: The Sugarcane Sustainability Scheme promotes sustainable sugarcane cultivation practices among farmers in Bangladesh, aiming to improve productivity, conserve natural resources, and enhance farmer livelihoods.', 7, '2024-05-15', '2024-11-07', '300', '800', '1000', '5000', 1, '2024-04-14 13:12:54', '2024-04-14 13:27:53', '60'),
(11, 8, 'Eggplant Excellence Program (EEP)', 'Description: The Eggplant Excellence Program aims to promote the cultivation of high-quality eggplants in Bangladesh. Through this project, farmers receive training in advanced cultivation techniques, access to disease-resistant varieties, and support in marketing their produce, leading to increased eggplant yields and improved incomes for farmers.', 8, '2024-01-01', '2024-10-22', '400', '1000', '4000', '12000', 1, '2024-04-14 13:14:44', '2024-04-14 13:28:24', '70'),
(12, 11, 'Tomato Fram', 'i', 1, '2024-06-06', '2024-11-13', '20', '200', '3500', '500', 0, '2024-06-06 08:36:05', '2024-06-06 08:36:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `crops`
--

CREATE TABLE `crops` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cultavation_start` date NOT NULL,
  `cultavation_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Current_Price` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crops`
--

INSERT INTO `crops` (`id`, `name`, `cultavation_start`, `cultavation_end`, `created_at`, `updated_at`, `Current_Price`, `price_date`) VALUES
(1, 'Tomato', '2024-02-28', '2024-03-26', '2024-03-30 12:13:08', '2024-04-14 11:52:31', '80', '2024-04-13 18:00:00'),
(2, 'Rice', '2024-03-19', '2024-03-26', '2024-03-30 12:13:19', '2024-04-14 11:55:27', '70', '2024-04-13 18:00:00'),
(4, 'Jute', '2024-05-15', '2024-07-10', '2024-04-14 12:05:10', '2024-04-14 12:10:59', '120', '2024-04-14 18:00:00'),
(5, 'Potato', '2024-10-15', '2024-02-08', '2024-04-14 12:07:53', '2024-04-14 12:11:10', '45', '2024-04-14 18:00:00'),
(6, 'Corn', '2024-04-15', '2024-09-01', '2024-04-14 12:08:53', '2024-04-14 12:11:29', '70', '2024-04-14 18:00:00'),
(7, 'Sugarcane', '2024-11-01', '2024-03-19', '2024-04-14 12:09:33', '2024-04-14 12:11:39', '55', '2024-04-14 18:00:00'),
(8, 'Eggplant', '2024-02-14', '2024-05-20', '2024-04-14 12:10:46', '2024-04-14 12:11:59', '62', '2024-04-14 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `email`, `email_verified_at`, `password`, `f_name`, `l_name`, `nid`, `phone`, `address`, `dateofbirth`, `created_at`, `updated_at`) VALUES
(8, 'rahim@gmail.com', NULL, '$2y$12$sfOywkRgpvkOhwc./lNAweX6.4sLN1EpoWwl4lpELxu51sXyzHwR.', 'Rahim', 'Mia', NULL, '0156354685', 'Feni', '2024-02-15', '2024-04-14 12:33:51', '2024-04-14 12:35:10'),
(9, 'remu@gmail.com', NULL, '$2y$12$fjiU/a4vdeSWZGrdFEfPYu1Fdn1qIlUzCj8Fi8HtrKMF9ddW.YDOW', 'Remu', 'Khan', NULL, '3216541', 'Dhaka', '2024-04-15', '2024-04-14 12:36:09', '2024-04-14 12:36:25'),
(10, 'joymia@gmail.com', NULL, '$2y$12$4o6USgE8xHF7PvHugTrQjefakAgI9xCMLy2je8zqsBES2TshT2XsS', 'joy', 'mia', NULL, '018654654', 'Pabna', '2024-01-08', '2024-04-14 12:36:58', '2024-04-14 12:37:18'),
(11, 'nakibulislam54@gmail.com', NULL, '$2y$12$BG3.pnK963V0D6KWurGJbuMCvs3Vw8cCyvsWwtJiu3pfS7mTZrgQG', 'MD Nakibul', 'Islam', NULL, '01627199815', 'Bashundhara R/A  C Block 8 Road 215 House 501 Flat', '2024-06-13', '2024-06-06 08:30:11', '2024-06-07 21:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `flnancial_groups`
--

CREATE TABLE `flnancial_groups` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Orgnization_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flnancial_groups`
--

INSERT INTO `flnancial_groups` (`id`, `email`, `email_verified_at`, `password`, `f_name`, `l_name`, `phone`, `address`, `Orgnization_type`, `created_at`, `updated_at`) VALUES
(7, 'zantech@gmail.com', NULL, '$2y$12$iXouZ88hFCO3u79UpgP5sObyv3Rcs2E..QoZ5WpeKoi7YCrCvXrsO', 'ZAN', 'Tech', '0186546545', 'Dhaka', 'insurance_organization', '2024-04-14 10:56:33', '2024-04-14 10:57:07'),
(8, 'napver@gmail.com', NULL, '$2y$12$uaSm9yth6MzX0cB.3H9xvORjkW.gRa.UNawrzCVi6oP2cZ8wkpTCG', 'napver', 'ltd', '016685465456', 'Feni', 'insurance_organization', '2024-04-14 11:00:56', '2024-04-14 11:01:41'),
(9, 'cisco@gmail.com', NULL, '$2y$12$T8DSJHGShKJ6C4bbjwI.ROTKvZk7Bkozk2.eyyrjtQvoPHUuRRVd.', 'CISCO', 'REO', '015654654', 'Pabna', 'insurance_organization', '2024-04-14 11:03:47', '2024-04-14 11:04:30'),
(10, 'napinsurance@gmail.com', NULL, '$2y$12$p.KSv5zWBY4C6JqXi5drFO9PD5OUiOxcwUAhSl0.snkkkd/5.cGtG', 'napinsurance', 'ltd', '0185156654', 'Dhaka', 'insurance_organization', '2024-04-14 11:06:38', '2024-04-14 11:07:06'),
(11, 'Keya@gmail.com', NULL, '$2y$12$gAkPV2kDpEJZlvoHvWGr5ONd0WVs8OlOUQ8euKP55bMkXD.ZLKlGC', 'Keya', 'Ltd', '016545674', 'Feni', 'insurance_organization', '2024-04-14 11:08:45', '2024-04-14 11:09:18'),
(12, 'ahisan@gmail.com', NULL, '$2y$12$AV/JwKU5FMqKoiGYFYski.J3zmhsyq2pMnJA3TKdPUGYjIbPgECN6', 'Ahisan', 'Ltd', '0165644674', 'Dhaka', 'loan_provider', '2024-04-14 11:14:30', '2024-04-14 11:15:42'),
(13, 'labello@gmail.com', NULL, '$2y$12$JlbTlBlaqjvjFC02v4B5uOqZTKVXYi8BuWFP9UdFElysNPDTFJLHy', 'Labello', 'Ltd', '0156854541', 'Feni', 'loan_provider', '2024-04-14 11:17:41', '2024-04-14 11:18:01'),
(14, 'sunlite@gmail.com', NULL, '$2y$12$58aTXQPEbepjkNkgXn7Osut3QfsBbW88elarDB2ynpFfczB5wK826', 'Sunlite', 'Group', '0186546544', 'Dhaka', 'loan_provider', '2024-04-14 11:19:29', '2024-04-14 11:19:47'),
(15, 'sesip@gmail.com', NULL, '$2y$12$wOZpyoSfJ4Y/PLDOu8g1TeFkz5cRULqFVeW1Bea6P/7BJK27VuHGi', 'Sesip', 'ltd', '0176565464', 'Feni', 'loan_provider', '2024-04-14 11:21:11', '2024-04-14 11:21:32'),
(16, 'living@gmail.com', NULL, '$2y$12$Hn6QuNNVmsV9eqxT8P0o/.EjMEvPFuz6hXunpiHfYdfheRqM/iipC', 'Living', 'Home', '019645456', 'Dhaka', 'loan_provider', '2024-04-14 11:22:54', '2024-04-14 11:23:13'),
(17, 'microlab@gmail.com', NULL, '$2y$12$LRIokTLTgxxalA/.DhlYIe.KjR/DN4wMEutOriBx8jM6ELzSITE7u', 'Microlab', 'Ltd', '0156465456', 'Dhaka', 'investing_organization', '2024-04-14 11:31:32', '2024-04-14 11:31:53'),
(18, 'samsung@gmail.com', NULL, '$2y$12$PA3DWZflNmB7gVWyU.WqWeQ6uZzGuBPGbD1K/fQmDmXqheigw2F9S', 'Samsung', 'Group', '01789654654', 'Dhaka', 'investing_organization', '2024-04-14 11:33:19', '2024-04-14 11:33:35'),
(19, 'formulae@gmail.com', NULL, '$2y$12$4x0UVMco.cmjVIucmBsaEuPCEealF9QZUNa8u1ZFWt32QyjUl1bGG', 'Formula E', 'Ltd', '0128574415', 'Feni', 'investing_organization', '2024-04-14 11:35:23', '2024-04-14 11:35:39'),
(20, 'reo@gmail.com', NULL, '$2y$12$t6A3lCL.LVKMfQW8JPqK9.3qVpzTgkvgWcDRlfciDU.JE1yfxXvoO', 'Reo', 'LFR', '0465465445', 'Dhaka', 'investing_organization', '2024-04-14 11:37:31', '2024-04-14 11:37:49'),
(21, 'fantech@gmail.com', NULL, '$2y$12$ftMlHOGIA9mDKoiNLcveX.SGJ8kMgbJcTCHCYrE7UDrCefQMpCWZa', 'Fantech', 'Ltd', '0156845654', 'Dhaka', 'investing_organization', '2024-04-14 11:49:37', '2024-04-14 11:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `ingo_financial_grups`
--

CREATE TABLE `ingo_financial_grups` (
  `id` bigint UNSIGNED NOT NULL,
  `Organization_id` bigint UNSIGNED NOT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_service` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `team` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `conditions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ingo_financial_grups`
--

INSERT INTO `ingo_financial_grups` (`id`, `Organization_id`, `about`, `type_of_service`, `team`, `conditions`, `created_at`, `updated_at`) VALUES
(5, 7, 'FarmGuard Insurance is dedicated to protecting farmers and their livelihoods. With decades of experience in the agricultural sector, we offer comprehensive insurance solutions tailored to your farm\'s needs.', '<ul><li>Crop Insurance</li><li>Livestock Insurance</li><li>Farm Equipment Insurance</li><li>Agricultural Liability Insurance</li></ul>', 'In the event of a claim, the insured must provide timely notification and cooperate fully with the claims investigation process. Failure to comply with policy requirements may result in denial of coverage. Coverage is subject to adjustment based on the accuracy of information provided by the insured.', '<p>In the event of a claim, the insured must provide timely notification and cooperate fully with the claims investigation process. Failure to comply with policy requirements may result in denial of coverage. Coverage is subject to adjustment based on the accuracy of information provided by the insured.</p>', '2024-04-14 10:59:58', '2024-04-14 10:59:58'),
(6, 8, 'HarvestSafe Assurance provides peace of mind to farmers with reliable insurance coverage. Our team understands the unique challenges faced by agricultural businesses and offers specialized solutions to mitigate risks.', '<ul><li>Weather Insurance</li><li>Dairy Farm Insurance</li><li>Orchard Insurance</li><li>Aquaculture Insurance</li></ul>', 'Coverage for weather-related losses may be subject to the insured implementing recommended risk mitigation measures, such as use of protective coverings or irrigation systems. The insured must maintain accurate records of farming activities and provide access to relevant documentation upon request by the insurer.', '<p>Coverage for weather-related losses may be subject to the insured implementing recommended risk mitigation measures, such as use of protective coverings or irrigation systems. The insured must maintain accurate records of farming activities and provide access to relevant documentation upon request by the insurer.</p>', '2024-04-14 11:02:34', '2024-04-14 11:02:34'),
(7, 9, 'AgriShield Mutual is committed to supporting the agricultural community with affordable insurance options. Our cooperative structure ensures that farmers have a say in the policies that affect their operations.', '<ul><li>Agribusiness Insurance</li><li>Crop Hail Insurance</li><li>Farm Property Insurance</li><li>Livestock Mortality Insurance</li></ul>', 'The insured must adhere to best management practices for crop and livestock management as outlined by agricultural authorities. Failure to implement recommended practices may affect eligibility for coverage or result in adjustments to premium rates.', '<p>The insured must adhere to best management practices for crop and livestock management as outlined by agricultural authorities. Failure to implement recommended practices may affect eligibility for coverage or result in adjustments to premium rates.</p>', '2024-04-14 11:05:39', '2024-04-14 11:05:39'),
(8, 10, 'RuralRisk Underwriters offers comprehensive insurance solutions for rural businesses and agricultural operations. Our team of experts understands the unique challenges faced by farmers and ranchers.', '<ul><li>&nbsp;Farm Income Insurance</li><li>&nbsp;Poultry Insurance</li><li>&nbsp;Timber Insurance</li><li>&nbsp;Farm Vehicle Insurance</li></ul>', 'Coverage for certain perils, such as equipment breakdown or farm pollution, may be contingent upon the insured conducting regular maintenance and implementing pollution prevention measures. The insured must notify the insurer of any changes in farm operations that may increase risk exposure.', '<p>Coverage for certain perils, such as equipment breakdown or farm pollution, may be contingent upon the insured conducting regular maintenance and implementing pollution prevention measures. The insured must notify the insurer of any changes in farm operations that may increase risk exposure.</p>', '2024-04-14 11:07:56', '2024-04-14 11:07:56'),
(9, 11, 'AgriProtect Assurance specializes in protecting agricultural operations from unforeseen risks. With a focus on reliability and customer service, we strive to be the trusted insurance partner for farmers.', '<ul><li>&nbsp;Pasture, Rangeland, and Forage Insurance</li><li>&nbsp;Farm Weather Insurance</li><li>&nbsp;&nbsp;Agricultural Contract Grower Insurance</li><li>&nbsp; Livestock Theft Insurance</li></ul>', 'The insured must maintain accurate records of crop production and yield data for the insured property. In the event of a loss, the insured must provide documentation to support the claim, including planting and harvest dates, crop inventory reports, and production records.', '<p>The insured must maintain accurate records of crop production and yield data for the insured property. In the event of a loss, the insured must provide documentation to support the claim, including planting and harvest dates, crop inventory reports, and production records.</p>', '2024-04-14 11:10:05', '2024-04-14 11:10:05'),
(10, 12, 'GreenGrow Loans is dedicated to supporting small-scale farmers and agricultural businesses in accessing affordable financing solutions. Our mission is to empower farmers to expand their operations sustainably and contribute to the growth of local economies.', '<ol><li>Seasonal Crop Loans</li><li>Equipment Purchase Loans</li><li>Livestock Expansion Loans</li><li>Irrigation System Loans</li><li>Farm Infrastructure Improvement Loans</li></ol>', 'Loan amounts ranging from $1,000 to $50,000\r\nFlexible repayment schedules tailored to agricultural seasons\r\nCompetitive interest rates starting from 4%\r\nNo collateral required for loans under $10,000\r\nQuick approval process with minimal paperwork', '<ul><li>Loan amounts ranging from $1,000 to $50,000</li><li>Flexible repayment schedules tailored to agricultural seasons</li><li>Competitive interest rates starting from 4%</li><li>No collateral required for loans under $10,000</li><li>Quick approval process with minimal paperwork</li></ul>', '2024-04-14 11:16:59', '2024-04-14 11:16:59'),
(11, 13, 'AgriFin Solutions is committed to addressing the financial needs of farmers and agribusinesses by providing accessible and innovative microloan products. We strive to foster agricultural development and improve livelihoods in rural communities.', '<ol><li>Working Capital Loans</li><li>Crop Insurance Loans</li><li>Organic Farming Loans</li><li>Post-Harvest Storage Loans</li><li>Agrochemical Purchase Loans</li></ol>', 'Loan amounts ranging from $500 to $100,000\r\nRepayment terms tailored to crop cycles and revenue streams\r\nCompetitive interest rates with discounts for timely repayments\r\nFlexible eligibility criteria with minimal documentation\r\nDedicated support for loan application and agricultural advice', '<ul><li>Loan amounts ranging from $500 to $100,000</li><li>Repayment terms tailored to crop cycles and revenue streams</li><li>Competitive interest rates with discounts for timely repayments</li><li>Flexible eligibility criteria with minimal documentation</li><li>Dedicated support for loan application and agricultural advice</li></ul>', '2024-04-14 11:18:28', '2024-04-14 11:18:28'),
(12, 14, 'FarmFund Microloans is dedicated to bridging the financial gap for smallholder farmers and rural entrepreneurs. Our goal is to promote agricultural productivity and enhance food security through accessible and affordable microfinance solutions.', '<ol><li>Seed Capital Loans</li><li>Agri-input Purchase Loans</li><li>Farm Equipment Leasing</li><li>Women in Agriculture Loans</li><li>Climate Adaptation Loans</li></ol>', 'Loan amounts ranging from $200 to $20,000\r\nFlexible repayment options aligned with farming seasons\r\nLow-interest rates starting from 3%\r\nSimple application process with quick approval\r\nSupportive customer service and financial literacy training', '<ul><li>Loan amounts ranging from $200 to $20,000</li><li>Flexible repayment options aligned with farming seasons</li><li>Low-interest rates starting from 3%</li><li>Simple application process with quick approval</li><li>Supportive customer service and financial literacy training</li></ul>', '2024-04-14 11:20:13', '2024-04-14 11:20:13'),
(13, 15, 'Harvest Finance Solutions is committed to empowering farmers with the financial resources they need to thrive. We provide tailored microloan products and personalized support to help farmers overcome challenges and achieve their goals.', '<ol><li>Farm Infrastructure Loans</li><li>Sustainable Agriculture Loans</li><li>Agro-processing Loans</li><li>Export Market Development Loans</li><li>Diversification Grants</li></ol>', 'Loan amounts ranging from $1,000 to $50,000\r\nFlexible repayment terms based on cash flow projections\r\nCompetitive interest rates with discounts for sustainable practices\r\nOnline loan application process for convenience\r\nDedicated agricultural experts for guidance and support', '<ul><li>Loan amounts ranging from $1,000 to $50,000</li><li>Flexible repayment terms based on cash flow projections</li><li>Competitive interest rates with discounts for sustainable practices</li><li>Online loan application process for convenience</li><li>Dedicated agricultural experts for guidance and support</li></ul>', '2024-04-14 11:21:57', '2024-04-14 11:21:57'),
(14, 16, 'AgroAdvance Microfinance is dedicated to providing financial solutions tailored to the unique needs of agricultural entrepreneurs. We believe in fostering inclusive growth and building resilient farming communities through accessible microcredit and capacity-building initiatives.', '<ol><li>Agri-technology Loans</li><li>Market Access Loans</li><li>Farmer Producer Organization (FPO) Support Loans</li><li>Agri-Export Financing</li><li>Climate Smart Agriculture Loans</li></ol>', 'Loan amounts ranging from $300 to $30,000\r\nCustomizable repayment schedules to suit farming cycles\r\nCompetitive interest rates with flexible terms\r\nMinimal documentation and hassle-free application process\r\nTraining and extension services for sustainable farming practices', '<ul><li>Loan amounts ranging from $300 to $30,000</li><li>Customizable repayment schedules to suit farming cycles</li><li>Competitive interest rates with flexible terms</li><li>Minimal documentation and hassle-free application process</li><li>Training and extension services for sustainable farming practices</li></ul>', '2024-04-14 11:23:35', '2024-04-14 11:23:35'),
(15, 17, 'AgriInvest Capital specializes in providing investment opportunities in the agricultural sector, supporting sustainable farming practices and rural development. Our mission is to connect investors with impactful agricultural projects while generating attractive returns.', '<p>1. Farmland Acquisition Funds</p><p>2. Agro-processing Venture Capital</p><p>3. Sustainable Agriculture Technology Funds</p><p>4. Farm-to-Table Investment Portfolios</p><p>5. Agricultural Infrastructure Development Funds</p>', 'Minimum investment amounts vary by fund, starting from $5,000\r\nTargeted returns ranging from 8% to 12% annually\r\nDiversified portfolios to mitigate investment risks\r\nTransparent fee structure with no hidden charges\r\nRegular updates and performance reports for investors', '<p>- Minimum investment amounts vary by fund, starting from $5,000</p><p>- Targeted returns ranging from 8% to 12% annually</p><p>- Diversified portfolios to mitigate investment risks</p><p>- Transparent fee structure with no hidden charges</p><p>- Regular updates and performance reports for investors</p><p>&nbsp;</p>', '2024-04-14 11:32:33', '2024-04-14 11:32:33'),
(16, 18, 'Harvest Investments Group is dedicated to unlocking the potential of agriculture through strategic investments in innovative projects. We strive to create value for investors while driving positive impact in farming communities worldwide.', '<p>1. AgTech Startup Incubation Funds</p><p>2. Sustainable Farming Impact Bonds</p><p>3. Agricultural Commodity Futures Trading</p><p>4. AgriTourism Development Projects</p><p>5. Carbon Credit Investment Opportunities</p>', 'Minimum investment amounts vary by project, starting from $1,000\r\nPotential returns aligned with project performance and market conditions\r\nEthical investment principles with a focus on environmental sustainability\r\nAccess to exclusive investment opportunities through a trusted network\r\nProfessional advisory services to guide investment decisions', '<p>- Minimum investment amounts vary by project, starting from $1,000</p><p>- Potential returns aligned with project performance and market conditions</p><p>- Ethical investment principles with a focus on environmental sustainability</p><p>- Access to exclusive investment opportunities through a trusted network</p><p>- Professional advisory services to guide investment decisions</p>', '2024-04-14 11:34:26', '2024-04-14 11:34:26'),
(17, 19, 'FarmGrow Investments is committed to supporting the growth of agriculture by providing strategic capital and expertise to farming enterprises. Our goal is to deliver financial returns while promoting responsible farming practices and rural prosperity.', '<p>1. Agri-business Expansion Equity Investments</p><p>2. Crop Insurance Risk Pooling Funds</p><p>3. Sustainable Agriculture Bonds</p><p>4. Rural Infrastructure Development Trusts</p><p>5. Agroforestry Investment Partnerships</p>', 'Minimum investment amounts vary by opportunity, starting from $10,000\r\nProjected returns ranging from 6% to 15% depending on investment type\r\nRigorous due diligence process to assess investment viability and risk\r\nInvestor-friendly terms with transparent communication and reporting\r\nOpportunities for co-investment and portfolio diversification', '<p>- Minimum investment amounts vary by opportunity, starting from $10,000</p><p>- Projected returns ranging from 6% to 15% depending on investment type</p><p>- Rigorous due diligence process to assess investment viability and risk</p><p>- Investor-friendly terms with transparent communication and reporting</p><p>- Opportunities for co-investment and portfolio diversification</p><p><br>&nbsp;</p>', '2024-04-14 11:36:30', '2024-04-14 11:36:30'),
(18, 20, 'AgroFund Partners is a leading agricultural investment firm dedicated to driving positive change in the food and farming industry. We offer a range of investment opportunities designed to deliver financial growth while fostering sustainable agriculture practices.', '<p>1. Agri-Real Estate Investment Trusts (REITs)</p><p>2. Farmer Co-op Equity Investments</p><p>3. Precision Farming Technology Funds</p><p>4. Agricultural Supply Chain Financing</p><p>5. Impactful Agribusiness Private Equity</p>', 'Minimum investment amounts vary by fund, starting from $20,000\r\nCompetitive returns with potential for capital appreciation and dividends\r\nActive portfolio management to optimize investment performance\r\nInvestor education and engagement initiatives for informed decision-making\r\nCommitment to environmental, social, and governance (ESG) principles', '<p>- Minimum investment amounts vary by fund, starting from $20,000</p><p>- Competitive returns with potential for capital appreciation and dividends</p><p>- Active portfolio management to optimize investment performance</p><p>- Investor education and engagement initiatives for informed decision-making</p><p>- Commitment to environmental, social, and governance (ESG) principles</p>', '2024-04-14 11:46:49', '2024-04-14 11:46:49'),
(19, 21, 'RuralVenture Capital specializes in funding innovative agricultural ventures that have the potential to transform rural communities. Our investment approach combines financial expertise with a deep understanding of the agricultural landscape.', '<p>1. Agri-Tech Accelerator Programs</p><p>2. Farm-to-Consumer Supply Chain Investments</p><p>3. Renewable Energy in Agriculture Funds</p><p>4. Farmer-Owned Cooperative Expansion</p><p>5. Sustainable Aquaculture Investment Opportunities</p>', 'Minimum investment amounts vary by project, starting from $5,000\r\n Expected returns commensurate with project risks and growth potential\r\nEmphasis on long-term value creation and positive social impact Access to a diverse range of investment opportunities across the agricultural value chain\r\nDedicated investor relations team to support investors throughout their journey', '<p>- Minimum investment amounts vary by project, starting from $5,000</p><p>- Expected returns commensurate with project risks and growth potential</p><p>- Emphasis on long-term value creation and positive social impact</p><p>- Access to a diverse range of investment opportunities across the agricultural value chain</p><p>- Dedicated investor relations team to support investors throughout their journey</p>', '2024-04-14 11:51:13', '2024-04-14 11:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `id` bigint UNSIGNED NOT NULL,
  `Organization_id` bigint UNSIGNED NOT NULL,
  `farmer_id` bigint UNSIGNED NOT NULL,
  `minimum_sellamountt` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disaster_type` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loss_amount` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_premium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `claim_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crop_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approvel_status` tinyint(1) NOT NULL,
  `issue_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `crop_projectId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurances`
--

INSERT INTO `insurances` (`id`, `Organization_id`, `farmer_id`, `minimum_sellamountt`, `disaster_type`, `reason`, `loss_amount`, `insurance_premium`, `claim_amount`, `crop_amount`, `approvel_status`, `issue_date`, `created_at`, `updated_at`, `crop_projectId`) VALUES
(23, 7, 8, '50', 'Flood', 'I have no mony.', '20000', '850', '17000', '100', 1, NULL, '2024-04-14 13:24:48', '2024-04-20 02:44:30', 7),
(24, 7, 8, NULL, NULL, NULL, NULL, '300', '6000', '800', 0, NULL, '2024-04-14 13:24:58', '2024-04-20 02:44:05', 10),
(25, 11, 8, '80', 'Flood', '\"I want to invest in drought-resistant crops and water-saving technologies to mitigate the impact of drought on my farm', '70000', '600', '12000', '600', 1, NULL, '2024-04-14 13:25:12', '2024-04-14 13:43:17', 9),
(26, 11, 8, NULL, NULL, NULL, NULL, '800', '16000', '1000', 0, NULL, '2024-04-14 13:25:28', '2024-04-14 13:25:28', 11),
(27, 7, 8, NULL, NULL, NULL, NULL, '850', '17000', '100', 0, NULL, '2024-07-08 11:11:14', '2024-07-08 11:11:14', 7);

-- --------------------------------------------------------

--
-- Table structure for table `investingorg_tracks`
--

CREATE TABLE `investingorg_tracks` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `investingorg_id` bigint UNSIGNED NOT NULL,
  `investing_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `investing_date` date NOT NULL,
  `percentage_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investing_tracks`
--

CREATE TABLE `investing_tracks` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `investor_id` bigint UNSIGNED NOT NULL,
  `investing_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `investing_date` date NOT NULL,
  `percentage_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investing_tracks`
--

INSERT INTO `investing_tracks` (`id`, `project_id`, `investor_id`, `investing_amount`, `investing_date`, `percentage_rate`, `created_at`, `updated_at`) VALUES
(6, 7, 1, '50000', '2024-04-14', '8', '2024-04-14 13:27:38', '2024-04-14 13:27:38'),
(7, 10, 1, '100000', '2024-04-14', '12', '2024-04-14 13:27:53', '2024-04-14 13:27:53'),
(8, 11, 1, '80000', '2024-04-14', '10', '2024-04-14 13:28:24', '2024-04-14 13:28:24'),
(9, 8, 1, '40000', '2024-04-14', '12', '2024-04-14 13:44:25', '2024-04-14 13:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `investing_track__organizations`
--

CREATE TABLE `investing_track__organizations` (
  `id` bigint UNSIGNED NOT NULL,
  `Organization_id` bigint UNSIGNED NOT NULL,
  `investor_id` bigint UNSIGNED NOT NULL,
  `investing_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `investing_date` date NOT NULL,
  `percentage_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investing_track__organizations`
--

INSERT INTO `investing_track__organizations` (`id`, `Organization_id`, `investor_id`, `investing_amount`, `investing_date`, `percentage_rate`, `created_at`, `updated_at`) VALUES
(2, 17, 1, '100000', '2024-04-14', '12', '2024-04-14 13:29:13', '2024-04-14 13:29:13'),
(3, 21, 1, '80000', '2024-04-14', '8', '2024-04-14 13:29:28', '2024-04-14 13:29:28'),
(4, 20, 1, '90000', '2024-04-14', '12', '2024-04-14 13:29:47', '2024-04-14 13:29:47');

-- --------------------------------------------------------

--
-- Table structure for table `investors`
--

CREATE TABLE `investors` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investors`
--

INSERT INTO `investors` (`id`, `email`, `email_verified_at`, `password`, `f_name`, `l_name`, `nid`, `phone`, `address`, `dateofbirth`, `created_at`, `updated_at`) VALUES
(1, 'nakibulislam54@gmail.com', NULL, '$2y$12$RgnP7le2FeaIJw3q.eAgvu1Do.kzY370Q5qHahywu02E5eJpeL2em', 'MD Nakibul', 'Islam', NULL, NULL, NULL, NULL, '2024-03-30 12:21:44', '2024-03-30 12:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `micro_loans`
--

CREATE TABLE `micro_loans` (
  `id` bigint UNSIGNED NOT NULL,
  `Organization_id` bigint UNSIGNED NOT NULL,
  `farmer_id` bigint UNSIGNED NOT NULL,
  `reason_of_taking_loan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interest_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installment_period` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approval_status` tinyint(1) NOT NULL,
  `loan_issue_date` date DEFAULT NULL,
  `debt_repayment_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `micro_loans`
--

INSERT INTO `micro_loans` (`id`, `Organization_id`, `farmer_id`, `reason_of_taking_loan`, `amount`, `interest_rate`, `installment_period`, `approval_status`, `loan_issue_date`, `debt_repayment_date`, `created_at`, `updated_at`) VALUES
(3, 12, 8, 'I want to expand my crop production this season to meet increasing demand from local markets.', '50000', '4000', 'monthly', 1, '2024-04-20', '2024-04-20', '2024-04-14 13:23:20', '2024-04-20 02:37:28'),
(4, 12, 8, 'I require funds to purchase seeds, fertilizers, and pesticides for the upcoming planting season', '70000', '5600', 'yearly', 1, '2024-04-20', '2024-04-20', '2024-04-14 13:24:01', '2024-04-20 02:37:37'),
(5, 13, 8, 'I plan to build a new storage facility to store harvested crops and minimize post-harvest losses.', '100000', '8000', 'monthly', 1, '2024-04-15', '2026-04-15', '2024-04-14 13:24:29', '2024-04-14 13:24:29'),
(6, 12, 11, 'I used it for fixed and structured my code.', '1000', '80', 'yearly', 0, NULL, NULL, '2024-07-01 14:09:08', '2024-07-01 14:09:08'),
(7, 13, 8, 'ggggg', '5000', '400', 'yearly', 0, NULL, NULL, '2024-07-08 07:41:56', '2024-07-08 07:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_03_15_062836_create_crops_table', 1),
(2, '2024_03_15_070801_create_flnancial_groups_table', 2),
(3, '2024_03_15_082501_create_agricultural_officers_table', 3),
(4, '2014_10_12_000000_create_users_table', 4),
(5, '2014_10_12_100000_create_password_reset_tokens_table', 4),
(6, '2019_08_19_000000_create_failed_jobs_table', 4),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(8, '2024_03_15_053132_create_farmers_table', 4),
(9, '2024_03_15_055947_create_cropprojects_table', 4),
(10, '2024_03_15_062556_create_investors_table', 4),
(11, '2024_03_15_063926_create_crop_marcket_prices_table', 4),
(12, '2024_03_15_064716_create_production_of_crops_table', 4),
(13, '2024_03_15_065517_create_investing_tracks_table', 4),
(14, '2024_03_15_071629_create_investing_track__organizations_table', 4),
(15, '2024_03_15_072156_create_micro_loans_table', 4),
(16, '2024_03_15_073326_create_insurances_table', 4),
(17, '2024_03_15_075211_create_insurance_claim_reasons_table', 4),
(18, '2024_03_15_080531_create_subsidies_table', 4),
(19, '2024_03_21_154958_create_ingo_financial_grups_table', 4),
(20, '2024_03_30_171210_create_investingorg_tracks_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `production_of_crops`
--

CREATE TABLE `production_of_crops` (
  `id` bigint UNSIGNED NOT NULL,
  `crop_id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `production_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subsidies`
--

CREATE TABLE `subsidies` (
  `id` bigint UNSIGNED NOT NULL,
  `farmer_id` bigint UNSIGNED NOT NULL,
  `agri_officer_id` bigint UNSIGNED NOT NULL,
  `reason_of_taking_subsidies` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `farm_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approvel_status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsidies`
--

INSERT INTO `subsidies` (`id`, `farmer_id`, `agri_officer_id`, `reason_of_taking_subsidies`, `farm_size`, `amount`, `approvel_status`, `created_at`, `updated_at`) VALUES
(5, 8, 4, 'I aim to diversify my farm\'s products by investing in alternative crops with higher market demand', '150', '10000', 1, '2024-04-14 13:26:10', '2024-04-14 13:26:10'),
(6, 8, 3, 'I want to attend agricultural training programs to learn modern farming techniques and improve productivity.', '500', '50000', 1, '2024-04-14 13:26:33', '2024-04-14 14:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Nakibul islam', 'nakibulislam54@gmail.com', NULL, '$2y$12$1es9pfp7sy5RBm2GzPLuruBmvgHOpfQkMIvSE0Oc7RkSHs39Vrdc6', 'FLuVLHqxTRb2Qc71GFVQsovyV9NjTvZGE7MVINbrdeDFoI60klGkjVldWBSg', '2024-03-30 12:07:31', '2024-03-30 12:07:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agricultural_officers`
--
ALTER TABLE `agricultural_officers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agricultural_officers_email_unique` (`email`);

--
-- Indexes for table `cropprojects`
--
ALTER TABLE `cropprojects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cropprojects_farmer_id_foreign` (`farmer_id`),
  ADD KEY `cropprojects_crop_id_foreign` (`crop_id`);

--
-- Indexes for table `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `farmers_email_unique` (`email`);

--
-- Indexes for table `flnancial_groups`
--
ALTER TABLE `flnancial_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `flnancial_groups_email_unique` (`email`);

--
-- Indexes for table `ingo_financial_grups`
--
ALTER TABLE `ingo_financial_grups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingo_financial_grups_organization_id_foreign` (`Organization_id`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insurances_organization_id_foreign` (`Organization_id`),
  ADD KEY `insurances_farmer_id_foreign` (`farmer_id`),
  ADD KEY `crop_projectId.FK` (`crop_projectId`);

--
-- Indexes for table `investingorg_tracks`
--
ALTER TABLE `investingorg_tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investingorg_tracks_project_id_foreign` (`project_id`),
  ADD KEY `investingorg_tracks_investingorg_id_foreign` (`investingorg_id`);

--
-- Indexes for table `investing_tracks`
--
ALTER TABLE `investing_tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investing_tracks_project_id_foreign` (`project_id`),
  ADD KEY `investing_tracks_investor_id_foreign` (`investor_id`);

--
-- Indexes for table `investing_track__organizations`
--
ALTER TABLE `investing_track__organizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investing_track__organizations_organization_id_foreign` (`Organization_id`),
  ADD KEY `investing_track__organizations_investor_id_foreign` (`investor_id`);

--
-- Indexes for table `investors`
--
ALTER TABLE `investors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `investors_email_unique` (`email`);

--
-- Indexes for table `micro_loans`
--
ALTER TABLE `micro_loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `micro_loans_organization_id_foreign` (`Organization_id`),
  ADD KEY `micro_loans_farmer_id_foreign` (`farmer_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `production_of_crops`
--
ALTER TABLE `production_of_crops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `production_of_crops_crop_id_foreign` (`crop_id`),
  ADD KEY `production_of_crops_project_id_foreign` (`project_id`);

--
-- Indexes for table `subsidies`
--
ALTER TABLE `subsidies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subsidies_farmer_id_foreign` (`farmer_id`),
  ADD KEY `subsidies_agri_officer_id_foreign` (`agri_officer_id`);

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
-- AUTO_INCREMENT for table `agricultural_officers`
--
ALTER TABLE `agricultural_officers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cropprojects`
--
ALTER TABLE `cropprojects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `crops`
--
ALTER TABLE `crops`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `flnancial_groups`
--
ALTER TABLE `flnancial_groups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ingo_financial_grups`
--
ALTER TABLE `ingo_financial_grups`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `investingorg_tracks`
--
ALTER TABLE `investingorg_tracks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investing_tracks`
--
ALTER TABLE `investing_tracks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `investing_track__organizations`
--
ALTER TABLE `investing_track__organizations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `investors`
--
ALTER TABLE `investors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `micro_loans`
--
ALTER TABLE `micro_loans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `production_of_crops`
--
ALTER TABLE `production_of_crops`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subsidies`
--
ALTER TABLE `subsidies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cropprojects`
--
ALTER TABLE `cropprojects`
  ADD CONSTRAINT `cropprojects_crop_id_foreign` FOREIGN KEY (`crop_id`) REFERENCES `crops` (`id`),
  ADD CONSTRAINT `cropprojects_farmer_id_foreign` FOREIGN KEY (`farmer_id`) REFERENCES `farmers` (`id`);

--
-- Constraints for table `ingo_financial_grups`
--
ALTER TABLE `ingo_financial_grups`
  ADD CONSTRAINT `ingo_financial_grups_organization_id_foreign` FOREIGN KEY (`Organization_id`) REFERENCES `flnancial_groups` (`id`);

--
-- Constraints for table `insurances`
--
ALTER TABLE `insurances`
  ADD CONSTRAINT `insurances_farmer_id_foreign` FOREIGN KEY (`farmer_id`) REFERENCES `farmers` (`id`),
  ADD CONSTRAINT `insurances_organization_id_foreign` FOREIGN KEY (`Organization_id`) REFERENCES `flnancial_groups` (`id`);

--
-- Constraints for table `investingorg_tracks`
--
ALTER TABLE `investingorg_tracks`
  ADD CONSTRAINT `investingorg_tracks_investingorg_id_foreign` FOREIGN KEY (`investingorg_id`) REFERENCES `flnancial_groups` (`id`),
  ADD CONSTRAINT `investingorg_tracks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `cropprojects` (`id`);

--
-- Constraints for table `investing_tracks`
--
ALTER TABLE `investing_tracks`
  ADD CONSTRAINT `investing_tracks_investor_id_foreign` FOREIGN KEY (`investor_id`) REFERENCES `investors` (`id`),
  ADD CONSTRAINT `investing_tracks_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `cropprojects` (`id`);

--
-- Constraints for table `investing_track__organizations`
--
ALTER TABLE `investing_track__organizations`
  ADD CONSTRAINT `investing_track__organizations_investor_id_foreign` FOREIGN KEY (`investor_id`) REFERENCES `investors` (`id`),
  ADD CONSTRAINT `investing_track__organizations_organization_id_foreign` FOREIGN KEY (`Organization_id`) REFERENCES `flnancial_groups` (`id`);

--
-- Constraints for table `micro_loans`
--
ALTER TABLE `micro_loans`
  ADD CONSTRAINT `micro_loans_farmer_id_foreign` FOREIGN KEY (`farmer_id`) REFERENCES `farmers` (`id`),
  ADD CONSTRAINT `micro_loans_organization_id_foreign` FOREIGN KEY (`Organization_id`) REFERENCES `flnancial_groups` (`id`);

--
-- Constraints for table `production_of_crops`
--
ALTER TABLE `production_of_crops`
  ADD CONSTRAINT `production_of_crops_crop_id_foreign` FOREIGN KEY (`crop_id`) REFERENCES `crops` (`id`),
  ADD CONSTRAINT `production_of_crops_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `cropprojects` (`id`);

--
-- Constraints for table `subsidies`
--
ALTER TABLE `subsidies`
  ADD CONSTRAINT `subsidies_agri_officer_id_foreign` FOREIGN KEY (`agri_officer_id`) REFERENCES `agricultural_officers` (`id`),
  ADD CONSTRAINT `subsidies_farmer_id_foreign` FOREIGN KEY (`farmer_id`) REFERENCES `farmers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
