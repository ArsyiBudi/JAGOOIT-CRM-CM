-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2023 pada 10.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jagoit-crm-cm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `activity_type_id` int(11) NOT NULL,
  `leads_id` int(11) NOT NULL,
  `xs1` varchar(255) DEFAULT NULL,
  `xs2` varchar(255) DEFAULT NULL,
  `xd` date DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `leads_id` int(11) NOT NULL,
  `email_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `global_params`
--

CREATE TABLE `global_params` (
  `id_params` int(11) NOT NULL,
  `params_name` varchar(255) NOT NULL,
  `id_params_type` int(11) DEFAULT NULL,
  `params_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `global_params`
--

INSERT INTO `global_params` (`id_params`, `params_name`, `id_params_type`, `params_type`) VALUES
(1, 'Recruitment', NULL, NULL),
(2, 'Training', NULL, NULL),
(3, 'Penawaran', NULL, NULL),
(4, 'Appointment Negoisasi', NULL, NULL),
(5, 'Masa Percobaan', NULL, NULL),
(6, 'PO Selesai', NULL, NULL),
(7, 'PO & PKS Selesai', NULL, NULL),
(8, 'Done', NULL, NULL),
(9, 'Appointment', NULL, NULL),
(10, 'Notes', NULL, NULL),
(11, 'Report', NULL, NULL),
(12, 'New', NULL, NULL),
(13, 'Offering', NULL, NULL),
(14, 'Interested', NULL, NULL),
(15, 'Order', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_sector` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `pic_name` varchar(255) NOT NULL,
  `pic_contact_number` varchar(255) NOT NULL,
  `client_indicator` tinyint(1) NOT NULL DEFAULT 0,
  `lead_status` int(11) NOT NULL DEFAULT 12,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `leads`
--

INSERT INTO `leads` (`id`, `business_name`, `business_sector`, `address`, `pic_name`, `pic_contact_number`, `client_indicator`, `lead_status`, `created_at`, `updated_at`) VALUES
(1, 'hane.org', 'IT Support', 'Osborne Plains', 'Dr. Constance Harber Sr.', '(541) 869-5412', 1, 12, '2023-09-27 08:26:16', '2023-09-27 08:26:17'),
(2, 'mohr.com', 'IT Support', 'Tillman Rapid', 'Maureen Braun III', '+1.804.636.0226', 1, 12, '2023-09-27 08:26:16', '2023-09-27 08:26:17'),
(3, 'beahan.com', 'IT Support', 'Hane Prairie', 'Miss Ava Heidenreich I', '469.313.3242', 1, 12, '2023-09-27 08:26:16', '2023-09-27 08:26:17'),
(4, 'hagenes.info', 'IT Support', 'Edythe Meadow', 'Ora Bauch', '1-479-379-9117', 1, 12, '2023-09-27 08:26:16', '2023-09-27 08:26:17'),
(5, 'eichmann.com', 'IT Support', 'Otis Wall', 'Elmore Kuphal', '(936) 842-0138', 1, 12, '2023-09-27 08:26:16', '2023-09-27 08:26:17'),
(6, 'stanton.com', 'IT Support', 'Predovic Village', 'Jose Spencer', '+1-516-456-5876', 0, 12, '2023-09-27 08:26:16', '2023-09-27 08:26:16'),
(7, 'mclaughlin.com', 'IT Support', 'DuBuque Via', 'Arely Gutmann', '+1.361.900.8974', 0, 12, '2023-09-27 08:26:17', '2023-09-27 08:26:17'),
(8, 'weimann.info', 'IT Support', 'Klocko Trace', 'Hattie O\'Conner', '+1-947-839-5863', 1, 12, '2023-09-27 08:26:17', '2023-09-27 08:26:17'),
(9, 'gerlach.biz', 'IT Support', 'Haley Ridge', 'Prof. Adolfo Smith', '339-298-0802', 0, 12, '2023-09-27 08:26:17', '2023-09-27 08:26:17'),
(10, 'kessler.info', 'IT Support', 'Armando Crescent', 'Roel Hintz', '(561) 851-4405', 1, 12, '2023-09-27 08:26:17', '2023-09-27 08:26:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_08_14_013122_create_orders_table', 1),
(3, '2023_08_14_022535_create_order_details_table', 1),
(4, '2023_08_14_033213_create_activity_table', 1),
(5, '2023_08_14_033509_create_global_params_table', 1),
(6, '2023_08_14_042541_create_users_table', 1),
(7, '2023_08_14_042709_create_user_types_table', 1),
(8, '2023_08_14_042745_create_emails_table', 1),
(9, '2023_08_14_042826_create_leads_table', 1),
(10, '2023_08_14_042924_create_popks_letter_table', 1),
(11, '2023_08_14_043031_create_talents_table', 1),
(12, '2023_08_14_043805_create_talent_detail_table', 1),
(13, '2023_08_14_043933_create_talent_detail_types_table', 1),
(14, '2023_08_14_045444_create_offer_letters_table', 1),
(15, '2023_08_14_045731_create_offer_letter_jobs_details_table', 1),
(16, '2023_08_14_050021_add_constraint', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `offer_letters`
--

CREATE TABLE `offer_letters` (
  `id` int(11) NOT NULL,
  `letter_number` varchar(255) DEFAULT NULL,
  `offer_subject` varchar(255) DEFAULT NULL,
  `recipient_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `context` varchar(255) DEFAULT NULL,
  `talent_total` int(11) DEFAULT NULL,
  `weekday_cost` double DEFAULT NULL,
  `weekend_cost` double DEFAULT NULL,
  `consumption_cost` double DEFAULT NULL,
  `transportation_cost` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `offer_letter_jobs_details`
--

CREATE TABLE `offer_letter_jobs_details` (
  `id` int(11) NOT NULL,
  `offer_letters_id` int(11) NOT NULL,
  `needed_job` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `city_location` varchar(255) NOT NULL,
  `contract_duration` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` varchar(255) NOT NULL,
  `leads_id` int(11) NOT NULL,
  `appoinment_activity_id` int(11) DEFAULT NULL,
  `offer_letter_id` int(11) DEFAULT NULL,
  `popks_letter_id` int(11) DEFAULT NULL,
  `order_status` int(11) NOT NULL DEFAULT 1,
  `desired_position` varchar(255) NOT NULL,
  `needed_qty` bigint(20) NOT NULL,
  `due_date` date NOT NULL,
  `description` text NOT NULL,
  `characteristic_desc` text NOT NULL,
  `skills_desc` text NOT NULL,
  `budget_estimation` double NOT NULL,
  `start_recruitment` timestamp NULL DEFAULT NULL,
  `end_recruitment` timestamp NULL DEFAULT NULL,
  `start_training` timestamp NULL DEFAULT NULL,
  `end_training` timestamp NULL DEFAULT NULL,
  `start_offer` timestamp NULL DEFAULT NULL,
  `end_offer` timestamp NULL DEFAULT NULL,
  `start_appointment` timestamp NULL DEFAULT NULL,
  `end_appointment` timestamp NULL DEFAULT NULL,
  `start_probation` timestamp NULL DEFAULT NULL,
  `end_probation` timestamp NULL DEFAULT NULL,
  `start_popks` timestamp NULL DEFAULT NULL,
  `end_popks` timestamp NULL DEFAULT NULL,
  `tor_file` varchar(255) DEFAULT NULL,
  `cv_file` varchar(255) DEFAULT NULL,
  `cv_description` varchar(255) DEFAULT NULL,
  `po_file` varchar(255) DEFAULT NULL,
  `po_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `leads_id`, `appoinment_activity_id`, `offer_letter_id`, `popks_letter_id`, `order_status`, `desired_position`, `needed_qty`, `due_date`, `description`, `characteristic_desc`, `skills_desc`, `budget_estimation`, `start_recruitment`, `end_recruitment`, `start_training`, `end_training`, `start_offer`, `end_offer`, `start_appointment`, `end_appointment`, `start_probation`, `end_probation`, `start_popks`, `end_popks`, `tor_file`, `cv_file`, `cv_description`, `po_file`, `po_description`, `created_at`, `updated_at`) VALUES
('13780F09', 2, NULL, NULL, NULL, 1, 'Health Educator', 8, '1980-04-05', 'At last the Caterpillar took the hookah out of sight: then it watched the Queen till she too began dreaming after a pause: \'the reason is, that there\'s any one of the Rabbit\'s voice; and the second.', 'Two. Two began in a day did you do either!\' And the Gryphon said to herself \'This is Bill,\' she gave her one, they gave him two, You gave us three or more; They all made of solid glass; there was.', 'scale dynamic vortals', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-27 08:26:17', '2023-09-27 08:26:17'),
('23C72A4C', 8, NULL, NULL, NULL, 1, 'Physician', 7, '2021-08-03', 'I\'m afraid,\' said Alice, \'and why it is right?\' \'In my youth,\' said his father, \'I took to the game. CHAPTER IX. The Mock Turtle Soup is made from,\' said the Dodo, pointing to Alice to herself.', 'I\'ve said as yet.\' \'A cheap sort of chance of getting up and beg for its dinner, and all the other ladder?--Why, I hadn\'t quite finished my tea when I was going to be, from one foot up the.', 'benchmark e-business architectures', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-27 08:26:17', '2023-09-27 08:26:17'),
('380DA16E', 4, NULL, NULL, NULL, 1, 'Refinery Operator', 6, '2013-02-04', 'Alice, a little timidly: \'but it\'s no use their putting their heads down! I am so VERY much out of the sort. Next came the royal children; there were any tears. No, there were a Duck and a large.', 'Alice said; but was dreadfully puzzled by the time he was gone, and the others took the thimble, looking as solemn as she could. \'No,\' said Alice. \'And ever since that,\' the Hatter replied. \'Of.', 'aggregate customized niches', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-27 08:26:17', '2023-09-27 08:26:17'),
('570F2416', 5, NULL, NULL, NULL, 1, 'Painter', 1, '2019-11-26', 'Alice thought to herself that perhaps it was certainly English. \'I don\'t know much,\' said Alice, surprised at her rather inquisitively, and seemed to follow, except a tiny little thing!\' said Alice.', 'The only things in the air. She did not appear, and after a pause: \'the reason is, that I\'m doubtful about the reason they\'re called lessons,\' the Gryphon said, in a trembling voice, \'Let us get to.', 'reintermediate customized networks', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-27 08:26:17', '2023-09-27 08:26:17'),
('5CF98B63', 3, NULL, NULL, NULL, 1, 'Construction Manager', 6, '1973-01-31', 'Game, or any other dish? Who would not allow without knowing how old it was, and, as the game was going to dive in among the distant sobs of the fact. \'I keep them to be lost, as she leant against a.', 'Alice. \'I\'ve so often read in the shade: however, the moment she appeared; but she had but to her lips. \'I know what it might end, you know,\' Alice gently remarked; \'they\'d have been changed for.', 'enable global web-readiness', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-27 08:26:17', '2023-09-27 08:26:17'),
('7346A0AA', 1, NULL, NULL, NULL, 1, 'HR Manager', 0, '1995-09-13', 'Don\'t let him know she liked them best, For this must ever be A secret, kept from all the party sat silent and looked along the sea-shore--\' \'Two lines!\' cried the Mouse, in a VERY good opportunity.', 'Alice\'s elbow was pressed so closely against her foot, that there was generally a ridge or furrow in the face. \'I\'ll put a white one in by mistake; and if the Mock Turtle recovered his voice, and.', 'deliver wireless mindshare', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-27 08:26:17', '2023-09-27 08:26:17'),
('7AA45957', 8, NULL, NULL, NULL, 1, 'Merchandise Displayer OR Window Trimmer', 2, '1997-06-03', 'WHAT things?\' said the Mouse, frowning, but very politely: \'Did you say it.\' \'That\'s nothing to do: once or twice, and shook itself. Then it got down off the mushroom, and crawled away in the.', 'Never heard of one,\' said Alice. The King and Queen of Hearts, she made out that one of them.\' In another minute the whole pack rose up into the air. \'--as far out to sea!\" But the snail replied.', 'engineer sticky web-readiness', 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-27 08:26:17', '2023-09-27 08:26:17'),
('A16A4F8F', 4, NULL, NULL, NULL, 1, 'HR Specialist', 2, '2008-06-12', 'Alice replied very solemnly. Alice was only too glad to do that,\' said the Gryphon: and Alice was not an encouraging tone. Alice looked very anxiously into its face was quite silent for a baby.', 'I am to see if she could for sneezing. There was a little before she made some tarts, All on a branch of a tree. \'Did you say \"What a pity!\"?\' the Rabbit was still in existence; \'and now for the.', 'iterate clicks-and-mortar models', 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-27 08:26:18', '2023-09-27 08:26:18'),
('BE3674D2', 10, NULL, NULL, NULL, 1, 'Communications Equipment Operator', 2, '1999-06-16', 'Hatter: \'it\'s very interesting. I never was so full of tears, \'I do wish I had it written down: but I grow up, I\'ll write one--but I\'m grown up now,\' she said, without even looking round. \'I\'ll.', 'King. \'Nearly two miles high,\' added the Gryphon, and the White Rabbit, with a smile. There was no longer to be said. At last the Mock Turtle. \'No, no! The adventures first,\' said the Gryphon: and.', 'syndicate virtual platforms', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-27 08:26:18', '2023-09-27 08:26:18'),
('D5581DFB', 5, NULL, NULL, NULL, 1, 'Financial Specialist', 1, '2013-10-28', 'I ask! It\'s always six o\'clock now.\' A bright idea came into her eyes--and still as she could. \'The game\'s going on rather better now,\' she added aloud. \'Do you mean by that?\' said the Mock Turtle.', 'I could not tell whether they were gardeners, or soldiers, or courtiers, or three times over to herself, in a hoarse growl, \'the world would go round and look up and down in a sulky tone, as it.', 'integrate value-added e-business', 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-27 08:26:17', '2023-09-27 08:26:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `talent_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `pre_score` double DEFAULT NULL,
  `post_score` double DEFAULT NULL,
  `group_score` double DEFAULT NULL,
  `final_score` double DEFAULT NULL,
  `recruitment_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `popks_letter`
--

CREATE TABLE `popks_letter` (
  `id` int(11) NOT NULL,
  `letter_numbers` varchar(255) DEFAULT NULL,
  `leads_id` int(11) NOT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `employee_position` varchar(255) DEFAULT NULL,
  `employee_address` varchar(255) DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `client_position` varchar(255) DEFAULT NULL,
  `client_address` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `nominal_fees` double DEFAULT NULL,
  `included_fees` text DEFAULT NULL,
  `weekday_cost` double DEFAULT NULL,
  `weekend_cost` double DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `consumption_cost` double DEFAULT NULL,
  `transportation_cost` double DEFAULT NULL,
  `billing_due_date` int(11) DEFAULT NULL,
  `billing_days` int(11) DEFAULT NULL,
  `authorized_by` varchar(255) NOT NULL DEFAULT 'PT JAGO TALENTA INDONESIA',
  `account_number` varchar(255) NOT NULL DEFAULT '130-002310546-6',
  `bank_name` varchar(255) NOT NULL DEFAULT 'Bank Mandiri, Cabang Braga Bandung',
  `account_manager_provider` varchar(255) NOT NULL DEFAULT 'Sdr. Septian Nugraha Kudrat',
  `provider_finance_administrator` varchar(255) NOT NULL DEFAULT 'Sdri. Retno Aliifah',
  `jagoit_director` varchar(255) DEFAULT NULL,
  `client_director` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `talents`
--

CREATE TABLE `talents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `domicile` text NOT NULL,
  `pob_talent` varchar(255) DEFAULT NULL,
  `dob_talent` date DEFAULT NULL,
  `age` int(11) NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `religion` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `status_onboard` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `talents`
--

INSERT INTO `talents` (`id`, `name`, `domicile`, `pob_talent`, `dob_talent`, `age`, `gender`, `religion`, `image`, `level`, `phone_number`, `email`, `signature`, `status_onboard`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Anahi Boyer', '43344 Cummings Viaduct\nCarashire, DE 09178', NULL, NULL, 36, NULL, NULL, NULL, NULL, '+12835627930', 'kreynolds@yahoo.com', NULL, NULL, 0, NULL, NULL),
(2, 'Ignatius Littel', '857 Bernier Keys Apt. 159\nNorth Shannon, OK 63137', NULL, NULL, 57, NULL, NULL, NULL, NULL, '212-682-8816', 'stacy.upton@gmail.com', NULL, NULL, 0, NULL, NULL),
(3, 'Prof. Daisha Ebert Jr.', '410 Magnolia Inlet\nWest Daphney, MS 47502', NULL, NULL, 39, NULL, NULL, NULL, NULL, '(816) 379-7705', 'kovacek.neha@wolf.com', NULL, NULL, 0, NULL, NULL),
(4, 'Alison Jast', '61092 Durgan Landing Apt. 260\nEast Hayliefurt, UT 40431', NULL, NULL, 27, NULL, NULL, NULL, NULL, '318-698-2346', 'reilly.susana@murazik.com', NULL, NULL, 0, NULL, NULL),
(5, 'Mckenna Volkman', '209 Larissa Ports\nBeerside, NM 51888', NULL, NULL, 41, NULL, NULL, NULL, NULL, '346-480-0363', 'janae68@hotmail.com', NULL, NULL, 0, NULL, NULL),
(6, 'Mr. Emiliano King IV', '618 Jermaine Course\nBarneyport, CA 78580', NULL, NULL, 56, NULL, NULL, NULL, NULL, '505-555-3915', 'breitenberg.elta@gmail.com', NULL, NULL, 0, NULL, NULL),
(7, 'Kristy Gulgowski', '183 Mayert Roads\nLake Delmer, IN 01271-7265', NULL, NULL, 48, NULL, NULL, NULL, NULL, '+13649153327', 'zsanford@gmail.com', NULL, NULL, 0, NULL, NULL),
(8, 'Ms. Estell Kohler DVM', '74359 Wunsch Fork Suite 817\nAndersonhaven, DC 06144', NULL, NULL, 41, NULL, NULL, NULL, NULL, '+1 (248) 210-1284', 'alysson58@yahoo.com', NULL, NULL, 0, NULL, NULL),
(9, 'Mr. Herminio Bernhard MD', '63898 Joshua Glen\nAdamfurt, UT 17502', NULL, NULL, 28, NULL, NULL, NULL, NULL, '+1 (930) 280-1543', 'dickinson.oscar@koss.com', NULL, NULL, 0, NULL, NULL),
(10, 'Colby Douglas', '5287 Murray Key Suite 889\nPort Elnora, WY 56591-4602', NULL, NULL, 34, NULL, NULL, NULL, NULL, '347-366-9045', 'murphy.toy@schneider.info', NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `talent_details`
--

CREATE TABLE `talent_details` (
  `id` int(11) NOT NULL,
  `id_talent` int(11) NOT NULL,
  `id_talent_details` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `talent_details`
--

INSERT INTO `talent_details` (`id`, `id_talent`, `id_talent_details`, `description`) VALUES
(1, 1, 1, 'Data Analyst'),
(2, 1, 4, 'Python'),
(3, 1, 5, 'D2'),
(4, 2, 1, 'Backend Dev'),
(5, 2, 4, 'Python'),
(6, 2, 5, 'D2'),
(7, 3, 1, 'Dev Ops'),
(8, 3, 4, 'PHP'),
(9, 3, 5, 'D3'),
(10, 4, 1, 'IT Support'),
(11, 4, 4, 'JS'),
(12, 4, 5, 'S2'),
(13, 5, 1, 'Backend Dev'),
(14, 5, 4, 'Python'),
(15, 5, 5, 'S2'),
(16, 6, 1, 'Full-Stack Dev'),
(17, 6, 4, 'C++'),
(18, 6, 5, 'D3'),
(19, 7, 1, 'Dev Ops'),
(20, 7, 4, 'Python'),
(21, 7, 5, 'D3'),
(22, 8, 1, 'IT Support'),
(23, 8, 4, 'HTML + CSS'),
(24, 8, 5, 'S1'),
(25, 9, 1, 'Full-Stack Dev'),
(26, 9, 4, 'JS'),
(27, 9, 5, 'SMA-SMK'),
(28, 10, 1, 'Backend Dev'),
(29, 10, 4, 'Python'),
(30, 10, 5, 'D3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `talent_detail_types`
--

CREATE TABLE `talent_detail_types` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `talent_detail_types`
--

INSERT INTO `talent_detail_types` (`id`, `description`) VALUES
(1, 'Posisi'),
(2, 'Dokumen Legal'),
(3, 'Pengalaman Kerja'),
(4, 'Keterampilan'),
(5, 'Pendidikan'),
(6, 'Level Skill'),
(7, 'Detail Pengalaman Kerja'),
(8, 'Keterampilan Tambahan'),
(9, 'Develop Area'),
(10, 'Kesiapan Bekerja'),
(11, 'Keterampilan Lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `xs1` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `username`, `password`, `token`, `email`, `xs1`) VALUES
(1, 1, 'bintangSobo', '$2y$10$uxkYw3x0dV82emNoPgye8e5rzQsbWn0F0SenBlB.1kFqvf2wyuDZy', NULL, 'lkub@hotmail.com', 'Power Phanter Jos'),
(2, 3, 'wisoky.keshaun', '$2y$10$iRkyExFfaEV/RY5gPRnPOen7LzLbkd2SYEMyoDJva4ER4RYGtHjWq', NULL, 'schowalter.terrance@gmail.com', 'Eladio Conn IV'),
(3, 2, 'homenick.eugenia', '$2y$10$8Vp/NTmzQhR1JmF4yiQaF.R0mUNLI4HUwELl3/Mqqf8NzUrZd6Moe', NULL, 'ukreiger@gmail.com', 'Prof. Janice Mayer V'),
(4, 2, 'camilla18', '$2y$10$DUnC5a6svuf1yjYjFDEgx.cLoMj.44v2juFrCSMkohIznjup0vGPO', NULL, 'hershel.grant@gmail.com', 'Juston Trantow'),
(5, 1, 'theodora.carroll', '$2y$10$Rl1dbqZ0DTyOU0MdDmvQzeDlzIrH5NK/luU1OlrOEawQM26I9GEm2', NULL, 'dexter.berge@ohara.info', 'Bridgette Koelpin'),
(6, 2, 'kiley.senger', '$2y$10$22UTj66amA82uIG0x1yzUuaxaiQDmqNHGzBNrnP0yMeH/v/ncTO1W', NULL, 'hirthe.guadalupe@hotmail.com', 'Frankie Parisian'),
(7, 3, 'mekhi.witting', '$2y$10$vqEN5sOP.ymGAp3/1B654er6XrXvdCYL18tlogMR3fk4TRpnLS7sS', NULL, 'weber.rolando@gmail.com', 'Rosa Lebsack'),
(8, 1, 'bkuhn', '$2y$10$ZPS/YgL56AkhJHxsHAMkTeQ2HZ9URYQ4ybZHhqqVjtlAzXQQo3MXa', NULL, 'katheryn.jerde@heller.com', 'Dr. Declan Stracke'),
(9, 3, 'leonor.bahringer', '$2y$10$l56Vsg/iCZY1EtpvoYpUZeO9mqUT7cGewAb9KKzePtQiqnoh.2Jl6', NULL, 'hilario.schoen@nienow.com', 'Bernice Medhurst'),
(10, 2, 'heloise26', '$2y$10$/mi/GFdeBj9OQNBNPSkxRuHMgINE/zIbXl06hHSWgD9h5hPpd6t7u', NULL, 'leif63@gmail.com', 'Friedrich Gleichner'),
(11, 1, 'rrosenbaum', '$2y$10$7qDkaH5w1ebDFI82M/Ht0.C5xgg4.KQb9xvK5a0W3of7R4C7P.KwW', NULL, 'moore.darren@hotmail.com', 'Hobart Crona');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_types`
--

INSERT INTO `user_types` (`id`, `description`) VALUES
(1, 'Admin'),
(2, 'Karyawan'),
(3, 'Client');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_leads_id_foreign` (`leads_id`),
  ADD KEY `activity_activity_type_id_foreign` (`activity_type_id`);

--
-- Indeks untuk tabel `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emails_leads_id_foreign` (`leads_id`);

--
-- Indeks untuk tabel `global_params`
--
ALTER TABLE `global_params`
  ADD PRIMARY KEY (`id_params`);

--
-- Indeks untuk tabel `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leads_lead_status_foreign` (`lead_status`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `offer_letters`
--
ALTER TABLE `offer_letters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `offer_letter_jobs_details`
--
ALTER TABLE `offer_letter_jobs_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_letter_jobs_details_offer_letters_id_foreign` (`offer_letters_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_leads_id_foreign` (`leads_id`),
  ADD KEY `orders_offer_letter_id_foreign` (`offer_letter_id`),
  ADD KEY `orders_order_status_foreign` (`order_status`),
  ADD KEY `orders_popks_letter_id_foreign` (`popks_letter_id`);

--
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_talent_id_foreign` (`talent_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `popks_letter`
--
ALTER TABLE `popks_letter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `popks_letter_leads_id_foreign` (`leads_id`);

--
-- Indeks untuk tabel `talents`
--
ALTER TABLE `talents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `talent_details`
--
ALTER TABLE `talent_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `talent_details_id_talent_foreign` (`id_talent`),
  ADD KEY `talent_details_id_talent_details_foreign` (`id_talent_details`);

--
-- Indeks untuk tabel `talent_detail_types`
--
ALTER TABLE `talent_detail_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_user_type_id_foreign` (`user_type_id`);

--
-- Indeks untuk tabel `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `global_params`
--
ALTER TABLE `global_params`
  MODIFY `id_params` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `offer_letters`
--
ALTER TABLE `offer_letters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `offer_letter_jobs_details`
--
ALTER TABLE `offer_letter_jobs_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `popks_letter`
--
ALTER TABLE `popks_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `talents`
--
ALTER TABLE `talents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `talent_details`
--
ALTER TABLE `talent_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `talent_detail_types`
--
ALTER TABLE `talent_detail_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_activity_type_id_foreign` FOREIGN KEY (`activity_type_id`) REFERENCES `global_params` (`id_params`),
  ADD CONSTRAINT `activity_leads_id_foreign` FOREIGN KEY (`leads_id`) REFERENCES `leads` (`id`);

--
-- Ketidakleluasaan untuk tabel `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_leads_id_foreign` FOREIGN KEY (`leads_id`) REFERENCES `leads` (`id`);

--
-- Ketidakleluasaan untuk tabel `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_lead_status_foreign` FOREIGN KEY (`lead_status`) REFERENCES `global_params` (`id_params`);

--
-- Ketidakleluasaan untuk tabel `offer_letter_jobs_details`
--
ALTER TABLE `offer_letter_jobs_details`
  ADD CONSTRAINT `offer_letter_jobs_details_offer_letters_id_foreign` FOREIGN KEY (`offer_letters_id`) REFERENCES `offer_letters` (`id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_leads_id_foreign` FOREIGN KEY (`leads_id`) REFERENCES `leads` (`id`),
  ADD CONSTRAINT `orders_offer_letter_id_foreign` FOREIGN KEY (`offer_letter_id`) REFERENCES `offer_letters` (`id`),
  ADD CONSTRAINT `orders_order_status_foreign` FOREIGN KEY (`order_status`) REFERENCES `global_params` (`id_params`),
  ADD CONSTRAINT `orders_popks_letter_id_foreign` FOREIGN KEY (`popks_letter_id`) REFERENCES `popks_letter` (`id`);

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_talent_id_foreign` FOREIGN KEY (`talent_id`) REFERENCES `talents` (`id`);

--
-- Ketidakleluasaan untuk tabel `popks_letter`
--
ALTER TABLE `popks_letter`
  ADD CONSTRAINT `popks_letter_leads_id_foreign` FOREIGN KEY (`leads_id`) REFERENCES `leads` (`id`);

--
-- Ketidakleluasaan untuk tabel `talent_details`
--
ALTER TABLE `talent_details`
  ADD CONSTRAINT `talent_details_id_talent_details_foreign` FOREIGN KEY (`id_talent_details`) REFERENCES `talent_detail_types` (`id`),
  ADD CONSTRAINT `talent_details_id_talent_foreign` FOREIGN KEY (`id_talent`) REFERENCES `talents` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
