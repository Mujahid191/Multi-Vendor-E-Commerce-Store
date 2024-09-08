-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2024 at 04:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Multi-Vendor-Ecommrance`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `url`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Everyday Fresh & <br/>Clean with Our<br/>Products', 'www.facebook.com', '65707f44db4869.82262509.png', '2023-12-06 09:03:48', '2023-12-11 08:44:55'),
(2, 'Make your Breakfast Healthy and Easy', 'www.youtube.com', '65707f61d718b7.34550720.png', '2023-12-06 09:04:17', '2023-12-06 09:04:17'),
(3, 'The best Organic Products Online', 'www.google.com', '657082255c3b28.91122287.png', '2023-12-06 09:05:34', '2023-12-06 09:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category_name`, `category_slug`, `created_at`, `updated_at`) VALUES
(1, 'Fresh Fruit', 'fresh-fruit', '2024-01-11 06:45:33', '2024-01-11 06:55:02'),
(2, 'Clothing', 'clothing', '2024-01-11 06:45:46', NULL),
(3, 'Pet Foods', 'pet-foods', '2024-01-11 06:45:55', NULL),
(4, 'Chen Sweater', 'chen-sweater', '2024-01-11 06:46:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `short_description`, `long_description`, `image`, `blog_category_id`, `created_at`, `updated_at`) VALUES
(1, 'I Tried 38 Different Bottles of Mustard — These Are the Ones I’ll Buy Again', 'i-tried-38-different-bottles-of-mustard-—-these-are-the-ones-i’ll-buy-again', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p class=\"single-excerpt\">Helping everyone live happier, healthier lives at home through their kitchen. Kitchn is a daily food magazine on the Web celebrating life in the kitchen through home cooking and kitchen intelligence.</p>\r\n<p>We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.</p>\r\n<p>Those top-end wearables span from the Apple Watch to Fitbits, Garmin watches to Tizen-sporting Samsung watches. There\'s also Wear OS which is Google\'s own wearable operating system in the vein of Apple\'s watchOS - you&rsquo;ll see it show up in a lot of these devices.</p>\r\n<h5 class=\"mt-50\">Lorem ipsum dolor sit amet cons</h5>\r\n<p>Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.</p>\r\n<p>&nbsp;</p>\r\n<p>Tortor, lobortis semper viverra ac, molestie tortor laoreet amet euismod et diam quis aliquam consequat porttitor integer a nisl, in faucibus nunc et aenean turpis dui dignissim nec scelerisque ullamcorper eu neque, augue quam quis lacus pretium eros est amet turpis nunc in turpis massa et eget facilisis ante molestie penatibus dolor volutpat, porta pellentesque scelerisque at ornare dui tincidunt cras feugiat tempor lectus</p>', '65a1465412dc84.06671215.png', 3, '2024-01-12 07:50:08', '2024-01-12 09:27:49'),
(2, 'The Easy Italian Chicken Dinner I Make Over and Over Again', 'the-easy-italian-chicken-dinner-i-make-over-and-over-again', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat', '<p class=\"single-excerpt\">Helping everyone live happier, healthier lives at home through their kitchen. Kitchn is a daily food magazine on the Web celebrating life in the kitchen through home cooking and kitchen intelligence.</p>\r\n<p>We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.</p>\r\n<p>Those top-end wearables span from the Apple Watch to Fitbits, Garmin watches to Tizen-sporting Samsung watches. There\'s also Wear OS which is Google\'s own wearable operating system in the vein of Apple\'s watchOS - you&rsquo;ll see it show up in a lot of these devices.</p>\r\n<h5 class=\"mt-50\">Lorem ipsum dolor sit amet cons</h5>\r\n<p>Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.</p>\r\n<p>Tortor, lobortis semper viverra ac, molestie tortor laoreet amet euismod et diam quis aliquam consequat porttitor integer a nisl, in faucibus nunc et aenean turpis dui dignissim nec scelerisque ullamcorper eu neque, augue quam quis lacus pretium eros est amet turpis nunc in turpis massa et eget facilisis ante molestie penatibus dolor volutpat, porta pellentesque scelerisque at ornare dui tincidunt cras feugiat tempor lectus</p>\r\n<p>&nbsp;</p>', '65a146a4d9ac32.42441897.png', 2, '2024-01-12 07:55:40', '2024-01-12 09:27:03'),
(3, '9 Tasty Ideas That Will Inspire You to Grow a Home Herb Garden Today', '9-tasty-ideas-that-will-inspire-you-to-grow-a-home-herb-garden-today', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '<p class=\"single-excerpt\">Helping everyone live happier, healthier lives at home through their kitchen. Kitchn is a daily food magazine on the Web celebrating life in the kitchen through home cooking and kitchen intelligence.</p>\r\n<p>We\'ve reviewed and ranked all of the best smartwatches on the market right now, and we\'ve made a definitive list of the top 10 devices you can buy today. One of the 10 picks below may just be your perfect next smartwatch.</p>\r\n<p>Those top-end wearables span from the Apple Watch to Fitbits, Garmin watches to Tizen-sporting Samsung watches. There\'s also Wear OS which is Google\'s own wearable operating system in the vein of Apple\'s watchOS - you&rsquo;ll see it show up in a lot of these devices.</p>\r\n<h5 class=\"mt-50\">Lorem ipsum dolor sit amet cons</h5>\r\n<p>Throughout our review process, we look at the design, features, battery life, spec, price and more for each smartwatch, rank it against the competition and enter it into the list you\'ll find below.</p>\r\n<p>Tortor, lobortis semper viverra ac, molestie tortor laoreet amet euismod et diam quis aliquam consequat porttitor integer a nisl, in faucibus nunc et aenean turpis dui dignissim nec scelerisque ullamcorper eu neque, augue quam quis lacus pretium eros est amet turpis nunc in turpis massa et eget facilisis ante molestie penatibus dolor volutpat, porta pellentesque scelerisque at ornare dui tincidunt cras feugiat tempor lectus</p>\r\n<p>&nbsp;</p>', '65a1465d58b7f7.40198129.png', 1, '2024-01-12 08:02:20', '2024-01-12 09:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 'Oppo', 'oppo', '6564a0bc5e4d84.32115275.png', '2023-11-27 05:24:09', '2023-11-27 08:59:24'),
(2, 'Apple iPhone', 'apple-iphone', '65646e7e983025.93128399.png', '2023-11-27 05:25:02', '2023-11-27 08:59:00'),
(13, 'Huawei', 'huawei', '6577bd41709552.95179601.png', '2023-12-11 20:54:09', '2023-12-11 20:54:09'),
(14, 'Samsung', 'samsung', '6577bd4f22be77.84362610.png', '2023-12-11 20:54:23', '2023-12-11 20:54:23'),
(15, 'Vivo', 'vivo', '6577bd5c8db444.05847626.png', '2023-12-11 20:54:36', '2023-12-11 20:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_image`, `created_at`, `updated_at`) VALUES
(15, 'Clothing', 'clothing', '6576e0230404b4.13998885.jpg', '2023-12-10 23:14:14', '2023-12-11 05:10:43'),
(16, 'Fashion', 'fashion', '65768cd85ae845.51439370.jpg', '2023-12-10 23:15:20', '2023-12-10 23:15:20'),
(17, 'Shoes', 'shoes', '65768d168ed7a6.62568607.webp', '2023-12-10 23:16:22', '2023-12-10 23:16:22'),
(18, 'Vagetables', 'vagetables', '65768d43c97c87.53903118.png', '2023-12-10 23:17:07', '2023-12-10 23:17:07'),
(19, 'Fresh Fruit', 'fresh-fruit', '65768d53eb82f0.19863608.png', '2023-12-10 23:17:23', '2023-12-10 23:17:23'),
(20, 'Electronics', 'electronics', '65768d79d339c4.71451947.jpg', '2023-12-10 23:18:01', '2023-12-10 23:18:01'),
(21, 'Cooking', 'cooking', '65768e8e5d8dc4.21627382.jpg', '2023-12-10 23:22:38', '2023-12-10 23:22:38'),
(22, 'Accessories', 'accessories', '65768ef6270a98.92588972.jpg', '2023-12-10 23:24:22', '2023-12-10 23:24:22'),
(23, 'Furniture', 'furniture', '657691957a2642.45444019.webp', '2023-12-10 23:35:33', '2023-12-10 23:35:33'),
(24, 'Home Appliance', 'home-appliance', '6576e0f7090ac7.11350917.webp', '2023-12-11 05:14:15', '2023-12-11 05:14:15'),
(25, 'Office Items', 'office-items', '6576e17dae69f1.82277373.jpg', '2023-12-11 05:16:11', '2023-12-11 05:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `compares`
--

CREATE TABLE `compares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compares`
--

INSERT INTO `compares` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(21, 3, 12, '2024-01-18 07:24:50', NULL),
(23, 3, 20, '2024-01-19 07:10:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Love', 5, '2023-12-20', 1, '2023-12-27 08:00:52', '2023-12-27 08:00:52'),
(2, 'Easy Learning', 20, '2024-01-03', 1, '2023-12-27 08:08:58', '2023-12-27 08:08:58'),
(3, 'Happy New Year', 27, '2024-01-15', 1, '2023-12-27 08:18:08', '2024-01-14 02:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Fsd', 2, '2023-12-26 07:58:24', NULL),
(2, 'Multan', 5, '2023-12-26 07:58:37', '2023-12-26 08:33:44'),
(3, 'Burewala', 2, '2023-12-26 08:33:04', '2023-12-26 08:33:04'),
(5, 'Multan', 5, '2023-12-26 21:09:02', NULL),
(6, 'New Multan', 5, '2023-12-26 21:37:19', NULL),
(7, 'Gojra', 1, '2023-12-26 21:37:32', NULL),
(8, 'New Fsd', 1, '2023-12-26 21:37:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Lahore', NULL, NULL),
(2, 'Islamabad', NULL, NULL),
(3, 'Gujranwala', NULL, NULL),
(4, 'Vehari', NULL, NULL),
(5, 'Karachi', NULL, NULL);

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
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Fresh Vegetables', 'Save up to 50% off in your first order', '65701621b1f7d2.16155292.png', '2023-12-06 01:35:14', '2023-12-10 08:45:58'),
(2, 'Amazing grocery deals', 'Sign up for the daily newsletter', '65701a3fd5bd30.47359241.png', '2023-12-06 01:37:49', '2024-01-14 02:30:42');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_27_065825_create_brands_table', 2),
(7, '2023_11_28_013842_create_categories_table', 3),
(8, '2023_11_28_033147_create_sub_categories_table', 4),
(11, '2023_11_30_132707_create_products_table', 5),
(12, '2023_11_30_134933_create_multi_images_table', 5),
(13, '2023_12_06_041453_create_home_sliders_table', 6),
(14, '2023_12_06_131334_create_banners_table', 7),
(15, '2023_12_24_082113_create_wishlists_table', 8),
(16, '2023_12_25_095502_create_compares_table', 9),
(20, '2023_12_26_033017_create_divisions_table', 10),
(21, '2023_12_26_075255_create_districts_table', 11),
(22, '2023_12_27_021703_create_states_table', 12),
(24, '2023_12_27_100800_create_coupons_table', 13),
(26, '2023_12_31_104210_create_orders_table', 14),
(28, '2023_12_31_111558_create_order_items_table', 15),
(29, '2024_01_11_111028_create_blog_categories_table', 16),
(30, '2024_01_12_070129_create_blog_posts_table', 17),
(31, '2024_01_13_082026_create_reviews_table', 18),
(32, '2024_01_18_074921_create_settings_table', 19),
(33, '2024_01_19_140153_create_seos_table', 20),
(34, '2024_01_21_092350_create_permission_tables', 21),
(35, '2024_01_28_103408_create_notifications_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `multi_images`
--

CREATE TABLE `multi_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_images`
--

INSERT INTO `multi_images` (`id`, `image_name`, `product_id`, `created_at`, `updated_at`) VALUES
(22, '6576ed74a31e78.19648364.jpg', 8, '2023-12-11 06:07:32', '2023-12-11 06:07:32'),
(23, '6576ed74b74278.32997776.jpg', 8, '2023-12-11 06:07:32', '2023-12-11 06:07:32'),
(24, '6576ef1e421c76.69859364.jpg', 9, '2023-12-11 06:14:38', '2023-12-11 06:14:38'),
(25, '6576ef1e4ffac2.04396010.jpg', 9, '2023-12-11 06:14:38', '2023-12-11 06:14:38'),
(26, '6576f0514ae630.90182835.jpg', 10, '2023-12-11 06:19:45', '2023-12-11 06:19:45'),
(27, '6576f051565320.93049787.jpg', 10, '2023-12-11 06:19:45', '2023-12-11 06:19:45'),
(28, '6576f051622c08.64793320.jpg', 10, '2023-12-11 06:19:45', '2023-12-11 06:19:45'),
(29, '6576f119ec8277.83833672.jpg', 11, '2023-12-11 06:23:06', '2023-12-11 06:23:06'),
(30, '6576f11a050ea5.50633989.jpg', 11, '2023-12-11 06:23:06', '2023-12-11 06:23:06'),
(31, '6576f11a10dd74.85617740.jpg', 11, '2023-12-11 06:23:06', '2023-12-11 06:23:06'),
(32, '6576f11a1d1af6.31349176.jpg', 11, '2023-12-11 06:23:06', '2023-12-11 06:23:06'),
(33, '6576f205823347.59411480.jpg', 12, '2023-12-11 06:27:01', '2023-12-11 06:27:01'),
(34, '6576f2058f7301.65504786.jpg', 12, '2023-12-11 06:27:01', '2023-12-11 06:27:01'),
(35, '6576f2059cb0b9.00772610.jpg', 12, '2023-12-11 06:27:01', '2023-12-11 06:27:01'),
(36, '6576f205a8e2d7.64159690.jpg', 12, '2023-12-11 06:27:01', '2023-12-11 06:27:01'),
(37, '6576f2aae00bd1.07771904.jpg', 13, '2023-12-11 06:29:46', '2023-12-11 06:29:46'),
(38, '6576f2aaed7e40.41379523.jpg', 13, '2023-12-11 06:29:47', '2023-12-11 06:29:47'),
(39, '6576f2ab060e85.56145904.jpg', 13, '2023-12-11 06:29:47', '2023-12-11 06:29:47'),
(40, '6576f3d6ae80e5.80650542.jpg', 14, '2023-12-11 06:34:46', '2023-12-11 06:34:46'),
(41, '6576f3d6bdd4e3.50904626.jpg', 14, '2023-12-11 06:34:46', '2023-12-11 06:34:46'),
(42, '6576f3d6c9c687.21496824.jpg', 14, '2023-12-11 06:34:46', '2023-12-11 06:34:46'),
(43, '6576f48eeb0604.89253536.webp', 15, '2023-12-11 06:37:51', '2023-12-11 06:37:51'),
(44, '6576f48f173910.13797364.webp', 15, '2023-12-11 06:37:51', '2023-12-11 06:37:51'),
(45, '6576f48f37fc39.04930630.webp', 15, '2023-12-11 06:37:51', '2023-12-11 06:37:51'),
(46, '6576f48f569356.46363436.webp', 15, '2023-12-11 06:37:51', '2023-12-11 06:37:51'),
(47, '6576f48f7a6d49.84480605.webp', 15, '2023-12-11 06:37:51', '2023-12-11 06:37:51'),
(48, '6576f572edbb43.08154909.webp', 16, '2023-12-11 06:41:39', '2023-12-11 06:41:39'),
(49, '6576f573198ae1.05375280.webp', 16, '2023-12-11 06:41:39', '2023-12-11 06:41:39'),
(50, '6576f573340f42.21002809.webp', 16, '2023-12-11 06:41:39', '2023-12-11 06:41:39'),
(51, '65770631598af9.51898873.webp', 17, '2023-12-11 07:53:05', '2023-12-11 07:53:05'),
(52, '6577063178ea49.99398373.webp', 17, '2023-12-11 07:53:05', '2023-12-11 07:53:05'),
(53, '657706319306a1.41887776.webp', 17, '2023-12-11 07:53:05', '2023-12-11 07:53:05'),
(54, '65770631a94e31.03222364.webp', 17, '2023-12-11 07:53:05', '2023-12-11 07:53:05'),
(55, '657706a9310701.89931117.webp', 18, '2023-12-11 07:55:05', '2023-12-11 07:55:05'),
(56, '657706a94bf007.17900918.webp', 18, '2023-12-11 07:55:05', '2023-12-11 07:55:05'),
(57, '657706a9636087.87233422.webp', 18, '2023-12-11 07:55:05', '2023-12-11 07:55:05'),
(58, '65770734245ce4.52549718.webp', 19, '2023-12-11 07:57:24', '2023-12-11 07:57:24'),
(59, '657707343f95a5.09715057.webp', 19, '2023-12-11 07:57:24', '2023-12-11 07:57:24'),
(60, '65770734591b36.90572133.webp', 19, '2023-12-11 07:57:24', '2023-12-11 07:57:24'),
(61, '657707d5e3d984.49654000.webp', 20, '2023-12-11 08:00:06', '2023-12-11 08:00:06'),
(62, '657707d60efba0.90878852.webp', 20, '2023-12-11 08:00:06', '2023-12-11 08:00:06'),
(63, '657707d626fd54.36065428.webp', 20, '2023-12-11 08:00:06', '2023-12-11 08:00:06'),
(64, '657707d64e1ae7.42277988.webp', 20, '2023-12-11 08:00:06', '2023-12-11 08:00:06'),
(65, '6577093898f472.26007810.webp', 21, '2023-12-11 08:06:00', '2023-12-11 08:06:00'),
(66, '65770938ba8616.67505053.webp', 21, '2023-12-11 08:06:00', '2023-12-11 08:06:00'),
(67, '65770938d53a10.43189647.webp', 21, '2023-12-11 08:06:00', '2023-12-11 08:06:00'),
(68, '65770938ef9321.51758217.webp', 21, '2023-12-11 08:06:01', '2023-12-11 08:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0a85e059-bc40-491a-8060-6fbdea55a7b5', 'App\\Notifications\\VendorNotification', 'App\\Models\\User', 1, '{\"message\":\"You received new vendor request.\"}', '2024-01-28 20:44:48', '2024-01-28 20:44:38', '2024-01-28 20:44:48'),
('0e98daa3-70b7-42c0-b2ed-7dd01e766d40', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 11, '{\"message\":\"You received new order.\"}', NULL, '2024-02-04 22:59:44', '2024-02-04 22:59:44'),
('1d6fa152-cf09-43d5-b4fa-000cadafa3d4', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"message\":\"New Order Added in Shop.\"}', '2024-01-28 07:51:35', '2024-01-28 07:26:25', '2024-01-28 07:51:35'),
('25c10fc5-80ac-4705-9b10-acdc86864748', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"message\":\"You received new order.\"}', '2024-02-04 22:37:19', '2024-02-04 22:36:47', '2024-02-04 22:37:19'),
('378fab5d-d47d-4884-bc90-35acbe7a9451', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 11, '{\"message\":\"You received new order.\"}', NULL, '2024-02-04 22:36:47', '2024-02-04 22:36:47'),
('8987e1c1-8952-4a7b-857f-98795b8ac312', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 11, '{\"message\":\"You have received new order.\"}', NULL, '2024-01-28 07:07:17', '2024-01-28 07:07:17'),
('8a485eb2-b36c-4fd5-9fb2-0fe9e36a18ef', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"message\":\"You have received new order.\"}', '2024-01-28 07:51:35', '2024-01-28 06:44:49', '2024-01-28 07:51:35'),
('a48721b8-4751-42a5-851a-e63fc1acbf77', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 11, '{\"message\":\"New Order Added in Shop.\"}', NULL, '2024-01-28 06:16:56', '2024-01-28 06:16:56'),
('c04ab053-23c8-4d40-aa7a-fb46b03623fd', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"message\":\"New Order Added in Shop.\"}', '2024-01-28 06:23:31', '2024-01-28 06:16:56', '2024-01-28 06:23:31'),
('ca6de6f3-20cb-4c4c-930c-62a6cd8ba130', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"message\":\"You received new order.\"}', '2024-02-04 22:59:53', '2024-02-04 22:59:44', '2024-02-04 22:59:53'),
('d5b2acdf-a238-4f26-8047-5d90903c0c47', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 11, '{\"message\":\"You have received new order.\"}', NULL, '2024-01-28 06:44:49', '2024-01-28 06:44:49'),
('e44092f6-0abf-4ac0-965f-271a7b37194a', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 11, '{\"message\":\"New Order Added in Shop.\"}', NULL, '2024-01-28 07:56:03', '2024-01-28 07:56:03'),
('e71674de-1cb8-41fd-a5e1-a8e2f6e09965', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"message\":\"You have received new order.\"}', '2024-01-28 07:51:35', '2024-01-28 07:07:17', '2024-01-28 07:51:35'),
('e8e3bc04-1ff0-4935-a3e1-59c65fca0ce1', 'App\\Notifications\\VendorNotification', 'App\\Models\\User', 11, '{\"message\":\"You received new vendor request.\"}', NULL, '2024-01-28 20:44:38', '2024-01-28 20:44:38'),
('e9c1bd63-80c4-4b0c-a1bf-44f549e0e9e5', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 1, '{\"message\":\"New Order Added in Shop.\"}', '2024-01-28 07:56:09', '2024-01-28 07:56:03', '2024-01-28 07:56:09'),
('faff85ab-266c-4a57-a041-124e84c68faf', 'App\\Notifications\\OrderNotification', 'App\\Models\\User', 11, '{\"message\":\"New Order Added in Shop.\"}', NULL, '2024-01-28 07:26:25', '2024-01-28 07:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `post_code`, `address`, `info`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `invoice_number`, `order_number`, `order_date`, `order_month`, `order_year`, `confirm_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `return_order`, `status`, `user_id`, `division_id`, `district_id`, `state_id`, `created_at`, `updated_at`) VALUES
(7, 'First User', 'firstuser@gmail.com', '+13452367654', '36050', 'main chok', 'info', 'cash on delivery', 'cash', NULL, 'usd', 266.00, 'EOS47246182', NULL, '01 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'confirm', 3, 5, 2, 2, '2024-01-01 03:50:02', '2024-01-04 00:10:03'),
(8, 'Third User', 'thirduser@gmail.com', '+13452367654', '456123', 'Mamo Kanja', 'Third info', 'cash on delivery', 'cash', NULL, 'usd', 352.00, 'EOS16589019', NULL, '01 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'confirm', 3, 5, 2, 2, '2024-01-01 07:56:41', '2024-01-03 23:43:59'),
(9, 'Shahid Ali', 'shahidali@gmail.com', '+13452367654', '454565', 'Super Market', 'Information', 'cash on delivery', 'cash', NULL, 'usd', 376.00, 'EOS92946428', NULL, '03 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Product is Broken', '3', 'delivered', 3, 5, 2, 2, '2024-01-03 05:01:46', '2024-01-04 21:37:44'),
(10, 'M Ali', 'user@gmail.com', '+13452367654', '36050', 'New Market', 'Info', 'cash on delivery', 'cash', NULL, 'usd', 340.00, 'EOS56185138', NULL, '05 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Product is Not Good', '2', 'delivered', 3, 5, 2, 2, '2024-01-04 21:55:53', '2024-01-04 22:03:24'),
(11, 'User', 'user@gmail.com', '+13452367654', '45623', 'main chok', 'info', 'cash on delivery', 'cash', NULL, 'usd', 440.00, 'EOS43704761', NULL, '20 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', 3, 5, 2, 2, '2024-01-20 04:51:47', '2024-01-20 04:53:30'),
(12, 'User', 'user@gmail.com', '+13452367654', '36050', 'New Market', 'infoo', 'cash on delivery', 'cash', NULL, 'usd', 220.00, 'EOS88549112', NULL, '20 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', 3, 5, 2, 2, '2024-01-20 04:55:57', '2024-01-20 04:56:15'),
(13, 'User', 'user@gmail.com', '+13452367654', '45623', 'Mamo Kanjan', 'inforn', 'cash on delivery', 'cash', NULL, 'usd', 220.00, 'EOS74607155', NULL, '20 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', 3, 5, 2, 2, '2024-01-20 05:00:26', '2024-01-20 05:00:40'),
(14, 'User', 'user@gmail.com', '+13452367654', '45623', 'Mamo Kanjan', 'jkjkj', 'cash on delivery', 'cash', NULL, 'usd', 220.00, 'EOS18088428', NULL, '20 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', 3, 5, 2, 2, '2024-01-20 05:04:09', '2024-01-20 05:04:26'),
(15, 'User', 'user@gmail.com', '+13452367654', '454565', 'Mamo Kanjan', 'hjhjj', 'cash on delivery', 'cash', NULL, 'usd', 220.00, 'EOS43342687', NULL, '20 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', 3, 5, 2, 2, '2024-01-20 05:08:21', '2024-01-20 05:08:34'),
(16, 'User', 'user@gmail.com', '+13452367654', '36050', 'main chok', 'jkhkhk', 'cash on delivery', 'cash', NULL, 'usd', 220.00, 'EOS93213088', NULL, '20 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', 3, 5, 2, 2, '2024-01-20 05:13:02', '2024-01-20 05:13:13'),
(17, 'User', 'user@gmail.com', '+13452367654', '36050', 'Mamo Kanjan', 'hjkhhk', 'cash on delivery', 'cash', NULL, 'usd', 220.00, 'EOS27791596', NULL, '20 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', 3, 5, 2, 2, '2024-01-20 05:17:19', '2024-01-20 05:17:33'),
(18, 'User', 'user@gmail.com', '+13452367654', '454565', 'Super Market', 'jkjkjk', 'cash on delivery', 'cash', NULL, 'usd', 30.00, 'EOS84811911', NULL, '20 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', 3, 5, 2, 2, '2024-01-20 05:21:15', '2024-01-20 05:21:52'),
(19, 'User', 'user@gmail.com', '+13452367654', '45623', 'Mamo Kanjan', 'kjkjkj', 'cash on delivery', 'cash', NULL, 'usd', 30.00, 'EOS21689726', NULL, '20 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', 3, 5, 2, 2, '2024-01-20 05:24:12', '2024-01-20 05:24:26'),
(20, 'User', 'user@gmail.com', '+13452367654', '454565', 'New Market', 'jkjkkj', 'cash on delivery', 'cash', NULL, 'usd', 15.00, 'EOS63515354', NULL, '20 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', 3, 5, 2, 2, '2024-01-20 05:27:00', '2024-01-20 05:27:11'),
(21, 'User', 'user@gmail.com', '+13452367654', '45623', 'New Market', 'ghjhhh', 'cash on delivery', 'cash', NULL, 'usd', 250.00, 'EOS78880089', NULL, '20 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', 3, 5, 2, 2, '2024-01-20 05:28:18', '2024-01-20 05:28:31'),
(22, 'User', 'user@gmail.com', '+13452367654', '36050', 'New Market', 'hjhjjhjh', 'cash on delivery', 'cash', NULL, 'usd', 100.00, 'EOS45007277', NULL, '28 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 3, 5, 2, 2, '2024-01-28 06:08:45', NULL),
(23, 'User', 'user@gmail.com', '+13452367654', '36050', 'main chok', 'jkhjkhj', 'cash on delivery', 'cash', NULL, 'usd', 120.00, 'EOS87244179', NULL, '28 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 3, 5, 2, 2, '2024-01-28 06:16:56', NULL),
(24, 'User', 'user@gmail.com', '+13452367654', '45623', 'Mamo Kanjan', 'jkjkjk', 'cash on delivery', 'cash', NULL, 'usd', 170.00, 'EOS18675508', NULL, '28 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 3, 5, 2, 2, '2024-01-28 06:44:49', NULL),
(25, 'User', 'user@gmail.com', '+13452367654', '36050', 'main chok', 'hjkhkj', 'cash on delivery', 'cash', NULL, 'usd', 170.00, 'EOS91573700', NULL, '28 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 3, 5, 2, 2, '2024-01-28 07:07:17', NULL),
(26, 'User', 'user@gmail.com', '+13452367654', '454565', 'main chok', 'jkjk', 'cash on delivery', 'cash', NULL, 'usd', 80.00, 'EOS85216062', NULL, '28 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 3, 5, 2, 2, '2024-01-28 07:26:25', NULL),
(27, 'User', 'user@gmail.com', '+13452367654', '36050', 'New Market', 'dsfdfd', 'cash on delivery', 'cash', NULL, 'usd', 80.00, 'EOS24182209', NULL, '28 January 2024', 'January', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 3, 5, 2, 2, '2024-01-28 07:56:03', NULL),
(28, 'User', 'user@gmail.com', '+13452367654', '36050', 'New Market', 'fdfdf', 'cash on delivery', 'cash', NULL, 'usd', 120.00, 'EOS93361759', NULL, '05 February 2024', 'February', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'pending', 3, 5, 2, 2, '2024-02-04 22:36:47', NULL),
(29, 'User', 'user@gmail.com', '+13452367654', '36050', 'main chok', 'trtrt', 'cash on delivery', 'cash', NULL, 'usd', 15.00, 'EOS54496686', NULL, '05 February 2024', 'February', '2024', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 'delivered', 3, 5, 2, 2, '2024-02-04 22:59:44', '2024-02-04 23:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `user_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(2, 7, 21, 5, 'Blue', NULL, '1', 15.00, '2024-01-01 03:50:02', NULL),
(3, 7, 14, 2, 'Black', 'Medium', '1', 150.00, '2024-01-01 03:50:02', NULL),
(4, 7, 13, 5, 'Red', 'Small', '2', 100.00, '2024-01-01 03:50:02', NULL),
(5, 8, 11, 2, 'Red', NULL, '1', 220.00, '2024-01-01 07:56:41', NULL),
(6, 8, 18, 2, 'Black', NULL, '1', 30.00, '2024-01-01 07:56:41', NULL),
(7, 8, 8, 2, 'Black', NULL, '1', 190.00, '2024-01-01 07:56:41', NULL),
(8, 9, 21, 5, 'Blue', NULL, '1', 15.00, '2024-01-03 05:01:46', NULL),
(9, 9, 17, 5, 'Black', NULL, '1', 80.00, '2024-01-03 05:01:46', NULL),
(10, 9, 9, 2, 'Red', 'Medium', '1', 135.00, '2024-01-03 05:01:46', NULL),
(11, 9, 10, 2, 'white', 'Medium', '2', 120.00, '2024-01-03 05:01:46', NULL),
(12, 10, 12, 5, 'Black', 'Large', '2', 170.00, '2024-01-04 21:55:53', NULL),
(13, 11, 19, 5, NULL, 'Medium', '2', 220.00, '2024-01-20 04:51:47', NULL),
(14, 12, 19, 5, NULL, 'Medium', '1', 220.00, '2024-01-20 04:55:57', NULL),
(15, 13, 19, 5, NULL, 'Medium', '1', 220.00, '2024-01-20 05:00:26', NULL),
(16, 14, 19, 5, NULL, 'Medium', '1', 220.00, '2024-01-20 05:04:09', NULL),
(17, 15, 19, 5, NULL, 'Medium', '1', 220.00, '2024-01-20 05:08:21', NULL),
(18, 16, 19, 5, NULL, 'Medium', '1', 220.00, '2024-01-20 05:13:02', NULL),
(19, 17, 19, 5, NULL, 'Medium', '1', 220.00, '2024-01-20 05:17:19', NULL),
(20, 18, 18, 2, 'Black', NULL, '1', 30.00, '2024-01-20 05:21:15', NULL),
(21, 19, 18, 2, 'Black', NULL, '1', 30.00, '2024-01-20 05:24:12', NULL),
(22, 20, 21, 5, 'Blue', NULL, '1', 15.00, '2024-01-20 05:27:00', NULL),
(23, 21, 14, 2, 'Black', 'Medium', '1', 150.00, '2024-01-20 05:28:18', NULL),
(24, 21, 13, 5, 'Red', 'Small', '1', 100.00, '2024-01-20 05:28:18', NULL),
(25, 22, 15, 2, 'Blue', 'Small', '1', 100.00, '2024-01-28 06:08:45', NULL),
(26, 23, 20, 2, 'Blue', NULL, '1', 120.00, '2024-01-28 06:16:56', NULL),
(27, 24, 16, 2, 'Red', 'Medium', '1', 170.00, '2024-01-28 06:44:49', NULL),
(28, 25, 12, 5, 'Red', 'Medium', '1', 170.00, '2024-01-28 07:07:17', NULL),
(29, 26, 17, 5, 'Black', NULL, '1', 80.00, '2024-01-28 07:26:25', NULL),
(30, 27, 17, 5, 'Black', NULL, '1', 80.00, '2024-01-28 07:56:03', NULL),
(31, 28, 20, 2, 'Blue', NULL, '1', 120.00, '2024-02-04 22:36:47', NULL),
(32, 29, 21, 5, 'Blue', NULL, '1', 15.00, '2024-02-04 22:59:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$fku2zx5prX30qsK/rgh4FuwJhxXDc5l29WMX.eeBYoZKyEfbslIfi', '2024-01-30 22:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'brand.menu', 'web', '2024-01-21 09:28:59', '2024-01-21 10:07:45'),
(2, 'brand.list', 'web', '2024-01-21 09:52:39', '2024-01-21 09:52:39'),
(3, 'brand.add', 'web', '2024-01-21 09:52:48', '2024-01-21 09:52:48'),
(4, 'brand.edit', 'web', '2024-01-21 09:53:02', '2024-01-21 09:53:02'),
(5, 'brand.delete', 'web', '2024-01-21 09:53:10', '2024-01-21 09:53:10'),
(6, 'category.menu', 'web', '2024-01-21 09:53:25', '2024-01-21 09:53:25'),
(7, 'category.list', 'web', '2024-01-21 09:58:45', '2024-01-21 09:58:45'),
(8, 'category.add', 'web', '2024-01-21 09:58:54', '2024-01-21 09:58:54'),
(9, 'category.edit', 'web', '2024-01-21 09:59:01', '2024-01-21 09:59:01'),
(10, 'category.delete', 'web', '2024-01-21 09:59:09', '2024-01-21 09:59:09'),
(12, 'subcategory.menu', 'web', '2024-01-27 06:44:10', '2024-01-27 06:44:10'),
(13, 'subcategory.list', 'web', '2024-01-27 06:44:21', '2024-01-27 06:44:21'),
(14, 'subcategory.add', 'web', '2024-01-27 06:44:33', '2024-01-27 06:44:33'),
(15, 'subcategory.edit', 'web', '2024-01-27 06:44:43', '2024-01-27 06:44:43'),
(16, 'subcategory.delete', 'web', '2024-01-27 06:44:54', '2024-01-27 06:44:54'),
(17, 'product.menu', 'web', '2024-01-27 06:45:03', '2024-01-27 06:45:03'),
(18, 'product.list', 'web', '2024-01-27 06:45:11', '2024-01-27 06:45:11'),
(19, 'product.add', 'web', '2024-01-27 06:45:19', '2024-01-27 06:45:19'),
(20, 'product.edit', 'web', '2024-01-27 06:45:29', '2024-01-27 06:45:29'),
(21, 'product.delete', 'web', '2024-01-27 06:45:41', '2024-01-27 06:45:41'),
(22, 'slider.menu', 'web', '2024-01-27 06:45:52', '2024-01-27 06:45:52'),
(23, 'slider.list', 'web', '2024-01-27 06:46:04', '2024-01-27 06:46:04'),
(24, 'slider.add', 'web', '2024-01-27 06:46:16', '2024-01-27 06:46:16'),
(25, 'slider.edit', 'web', '2024-01-27 06:46:24', '2024-01-27 06:46:24'),
(26, 'slider.delete', 'web', '2024-01-27 06:46:34', '2024-01-27 06:46:34'),
(27, 'coupon.menu', 'web', '2024-01-27 06:46:59', '2024-01-27 06:46:59'),
(28, 'coupon.list', 'web', '2024-01-27 06:47:07', '2024-01-27 06:47:07'),
(29, 'coupon.add', 'web', '2024-01-27 06:47:14', '2024-01-27 06:47:14'),
(30, 'coupon.edit', 'web', '2024-01-27 06:47:21', '2024-01-27 06:47:21'),
(31, 'coupon.delete', 'web', '2024-01-27 06:47:30', '2024-01-27 06:47:30'),
(32, 'return.order.menu', 'web', '2024-01-27 06:48:00', '2024-01-27 06:48:00'),
(33, 'user.management.menu', 'web', '2024-01-27 06:48:10', '2024-01-27 06:48:10'),
(34, 'review.menu', 'web', '2024-01-27 06:48:18', '2024-01-27 06:48:18'),
(35, 'blog.menu', 'web', '2024-01-27 06:48:25', '2024-01-27 06:48:25'),
(36, 'site.menu', 'web', '2024-01-27 06:48:33', '2024-01-27 06:48:33'),
(37, 'admin.user.menu', 'web', '2024-01-27 06:48:51', '2024-01-27 06:48:51'),
(38, 'role.permission.menu', 'web', '2024-01-27 06:49:08', '2024-01-27 06:49:08'),
(39, 'stock.menu', 'web', '2024-01-27 06:49:23', '2024-01-27 06:49:23'),
(40, 'order.menu', 'web', '2024-01-27 06:49:32', '2024-01-27 06:49:32'),
(41, 'order.list', 'web', '2024-01-27 06:49:38', '2024-01-27 06:49:38'),
(42, 'order.edit', 'web', '2024-01-27 06:49:45', '2024-01-27 06:49:45'),
(43, 'order.delete', 'web', '2024-01-27 06:49:56', '2024-01-27 06:49:56'),
(44, 'vendor.menu', 'web', '2024-01-27 06:50:04', '2024-01-27 06:50:04');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` decimal(12,0) NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` int(11) DEFAULT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_slug`, `tags`, `product_code`, `product_quantity`, `product_size`, `product_color`, `selling_price`, `discount_price`, `short_description`, `long_description`, `thumbnail`, `featured`, `hot_deals`, `special_deals`, `special_offer`, `status`, `brand_id`, `category_id`, `subcategory_id`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 'men\'s casual fashion watch', 'men\'s-casual-fashion-watch', 'men\'s watch,watch', 'M-Wacth', '0', NULL, 'Black', '200', '10', 'Upgrade your style with our sophisticated men\'s casual fashion watch – the perfect blend of elegance and functionality.', '<p>Discover the epitome of timeless elegance and modern functionality with our meticulously crafted men\'s casual <strong>fashion watch</strong>. This exceptional timepiece seamlessly fuses classic design with contemporary trends, presenting a versatile accessory that effortlessly complements your casual wardrobe. Engineered with precision and attention to detail, the watch features a durable yet lightweight construction, ensuring both comfort and durability in every wear. The dial, adorned with refined markers and hands, reflects a harmonious balance between sophistication and simplicity, while the carefully selected materials exude quality and refinement.</p>', '6576ed7489db66.66635222.jpg', 1, NULL, NULL, NULL, 1, NULL, 16, 21, 2, '2023-12-11 06:07:32', NULL),
(9, 'men\'s shoulder bag', 'men\'s-shoulder-bag', 'shoulder bag,Bag', 'M-BAG', '15', 'Medium', 'Red,Blue', '150', '15', 'Elevate your daily style with our versatile men\'s shoulder bag, blending functionality and fashion effortlessly for the modern man on the go.', '<p>Introducing our meticulously designed <strong>men\'s shoulder bag</strong>&mdash;a perfect fusion of style, practicality, and sophistication. This versatile accessory seamlessly integrates into your daily routine, providing both form and function. Crafted from premium materials, the bag boasts a sleek yet durable exterior that stands up to the demands of your active lifestyle.</p>\r\n<p>The thoughtfully organized interior features multiple compartments, ensuring ample space for your essentials, from gadgets to documents.</p>', '6576ef1e33b638.97470425.jpg', 1, 1, NULL, NULL, 1, NULL, 16, 21, 2, '2023-12-11 06:14:38', NULL),
(10, 'men\'s casual shoes', 'men\'s-casual-shoes', 'men\'s casual shoes,shoes,Men shoes', 'M-SHOES', '25', 'Medium,Large', 'white,blue,Gray', '120', NULL, 'Step into effortless style and comfort with our men\'s casual shoes—a perfect blend of contemporary design and everyday versatility', '<p>Transform your footwear collection with our meticulously crafted <strong>men\'s casual shoes</strong>, offering a harmonious marriage of fashion-forward design and unparalleled comfort. Designed for the modern man seeking both style and functionality, these shoes effortlessly elevate your everyday look.</p>\r\n<p>Crafted from high-quality materials, these shoes not only exude sophistication but also promise durability for your daily adventures. The thoughtfully engineered sole provides optimal support and cushioning, ensuring each step is a comfortable one.</p>', '6576f0513eb711.39436927.jpg', NULL, NULL, 1, 1, 1, NULL, 17, 24, 2, '2023-12-11 06:19:45', '2023-12-11 06:45:03'),
(11, 'Wireless Headphone', 'wireless-headphone', 'headphone,wireless headphone', 'HeadPhone-10', '30', NULL, 'Red,Black', '220', NULL, 'Experience unparalleled freedom with our wireless headphones—an immersive audio solution designed for those who crave untethered sound and dynamic performance.', '<p>Step into a world of unrivaled audio freedom and immersive sound experiences with our cutting-edge <strong>wireless headphones</strong>. Meticulously engineered for the modern audiophile, these headphones seamlessly blend state-of-the-art technology with contemporary design, delivering a premium audio solution that redefines your listening journey.</p>\r\n<p>Experience the true essence of wireless convenience as you move effortlessly without the constraints of traditional cables. Our headphones feature advanced <strong>Bluetooth connectivity</strong>, ensuring a seamless and stable connection for your music, calls, and entertainment.</p>', '6576f119deab65.34905559.jpg', 1, 1, NULL, NULL, 1, NULL, 22, NULL, 2, '2023-12-11 06:23:05', '2023-12-11 08:11:04'),
(12, 'woman\'s fashion one piece', 'woman\'s-fashion-one-piece', 'woman\'s fashion,woman\'s dress,woman\'s fashion one piece', 'WOMEN-DRESS-15', '30', 'Medium,Large', 'Red,Black', '175', '5', 'Elevate your style with our women\'s fashion one-piece—a chic and versatile wardrobe essential for a modern and confident look', '<p>Introducing our <strong>women\'s fashion one-piece</strong>&mdash;a statement piece that effortlessly encapsulates contemporary elegance and versatile style. This carefully curated garment transcends fashion norms, offering a harmonious blend of sophistication and comfort for the modern woman.</p>\r\n<p>Crafted from <strong>premium materials</strong>, the one-piece showcases meticulous attention to detail, ensuring a flattering fit that complements various body types. The design seamlessly combines chic aesthetics with practical elements, making it an ideal choice for both casual outings and more formal occasions.</p>', '6576f205741992.08313800.jpg', 1, NULL, NULL, 1, 1, NULL, 15, 18, 5, '2023-12-11 06:27:01', NULL),
(13, 'kid\'s fashion party dress', 'kid\'s-fashion-party-dress', 'kid\'s fashion party dress,kid\'s fashion,kid\'s party dress', 'KD-50', '49', 'Small,Medium', 'Red,Black', '110', '10', 'Dress your little one in charm and elegance with our kid\'s fashion party dress—a delightful blend of playful design and festive sophistication.', '<p>Transform your child into the belle of the ball with our enchanting<strong> kid\'s fashion party dress</strong>. Designed to capture the essence of joyous celebrations, this dress is a perfect harmony of whimsy and elegance.</p>\r\n<p>Crafted from high-quality fabrics, the dress boasts a soft and comfortable feel, ensuring your little one is both stylish and at ease during festive occasions. The attention to detail is evident in every stitch, with delicate embellishments, bows, or lace adding a touch of refinement.</p>\r\n<p>The vibrant colors and playful patterns make this dress a delightful choice for any party or special event.</p>', '6576f2aad1e571.41499725.jpg', 1, NULL, 1, NULL, 1, NULL, 15, 17, 5, '2023-12-11 06:29:46', '2024-01-20 05:28:31'),
(14, 'Man\'s fashion Dress Coat', 'man\'s-fashion-dress-coat', 'man\'s fashion Dress Coat,Dress Coat', 'MDC-70', '24', 'Medium,Large', 'Black', '160', '10', 'Elevate your style with our men\'s fashion dress coat—a timeless wardrobe essential that seamlessly combines sophistication with contemporary flair.', '<p>Indulge in refined elegance with our meticulously crafted men\'s <strong>fashion dress coat</strong>&mdash;an embodiment of timeless style and contemporary sophistication. This exquisitely tailored piece is designed to be the crowning touch to your formal ensemble, adding a layer of distinction to your wardrobe.</p>\r\n<p>Crafted from premium materials, our dress coat is a testament to superior quality and attention to detail. The classic silhouette is complemented by modern accents, striking the perfect balance between tradition and trend. The versatile design makes it an impeccable choice for a myriad of occasions, from formal dinners to important meetings.</p>', '6576f3d6a1aca5.75839420.jpg', 1, NULL, 1, 1, 1, NULL, 16, 25, 2, '2023-12-11 06:34:46', '2024-01-20 05:28:31'),
(15, 'Men\'s Shirts', 'men\'s-shirts', 'Men\'s Shirts,shirts', 'SH-11', '13', 'Small,Medium', 'Blue', '100', NULL, 'Elevate your wardrobe with our men\'s shirts—a collection designed for timeless style and versatile sophistication, perfect for every occasion.', '<p>Introducing our curated collection of men\'s shirts, where style meets substance in a symphony of versatility and sophistication. Crafted with the modern man in mind, each shirt is a testament to timeless design, ensuring you make a statement at every turn.</p>\r\n<p>Impeccable craftsmanship and attention to detail define our shirts, providing a perfect blend of comfort and refinement. Choose from a variety of styles, including crisp button-downs, casual flannels, and elegant dress shirts.</p>', '6576f48ec4c3d5.21995875.webp', NULL, NULL, NULL, NULL, 1, NULL, 16, 25, 2, '2023-12-11 06:37:50', '2024-01-20 05:02:55'),
(16, 'Women Sneakers', 'women-sneakers', 'Women Sneakers', 'WS-22', '21', 'Medium,Large', 'Red,Black', '170', NULL, 'Step into style and comfort with our women\'s sneakers—a perfect blend of fashion and functionality for the modern woman on the move.', '<p>Discover the epitome of fashion-meets-comfort with our meticulously curated collection of <strong>women\'s sneakers</strong>. Crafted for the dynamic lifestyle of the modern woman, these sneakers seamlessly merge trend-setting style with unparalleled functionality.</p>\r\n<p>Our sneakers are more than just footwear; they are a statement of individuality and an embodiment of comfort.</p>', '6576f572d0aa69.31829228.webp', NULL, NULL, NULL, NULL, 1, 14, 17, 16, 2, '2023-12-11 06:41:38', '2024-01-20 05:04:26'),
(17, 'Wireless Keyboard', 'wireless-keyboard', 'Wireless Keyboard,Keyboard', 'KK-33', '12', NULL, 'Black', '80', NULL, 'A wireless keyboard is an input device that transmits data to a computer or other compatible device without the need for physical cables, typically using radio frequency or Bluetooth technology.', '<p>A wireless keyboard is an input device that allows users to input text and commands into a computer or other compatible devices without the need for a physical connection. Instead of using traditional cables, wireless keyboards typically utilize radio frequency (RF) signals, Bluetooth technology, or other wireless protocols to communicate with the connected device. This provides users with increased flexibility and freedom of movement, as they can operate the keyboard from a distance. Wireless keyboards are commonly used with laptops, desktop computers, smart TVs, and other devices that support wireless input. They often feature a compact and lightweight design, making them convenient for various computing environments. Many wireless keyboards are powered by batteries or rechargeable batteries, providing a cord-free and convenient typing experience.</p>', '657706313134d8.34303384.webp', 1, NULL, NULL, NULL, 1, NULL, 22, NULL, 5, '2023-12-11 07:53:05', '2024-01-20 05:08:34'),
(18, 'Wireless Mouse', 'wireless-mouse', 'Wireless Mouse,Mouse', 'MM-22', '10', NULL, 'Black', '30', NULL, 'A wireless mouse is an input device that communicates with a computer or device without the need for cables, typically using radio frequency or Bluetooth technology for cursor control and navigation.', '<p>A wireless mouse is a cordless input device designed for interacting with a computer or compatible device, offering freedom of movement without the constraints of physical cables. It employs wireless communication technologies such as radio frequency (RF) or Bluetooth, allowing users to control cursor movements and execute commands with ease. The absence of a tethered connection enhances flexibility, reduces clutter, and facilitates a more ergonomic computing experience. Typically powered by batteries or rechargeable cells, wireless mice come in various ergonomic designs and functionalities, catering to diverse user preferences. They are widely used in conjunction with laptops, desktop computers, and other devices, providing a convenient and efficient means of navigating digital interfaces.</p>', '657706a912b665.31904056.webp', NULL, NULL, NULL, NULL, 1, NULL, 22, NULL, 2, '2023-12-11 07:55:05', '2024-01-20 05:13:13'),
(19, 'Digital Printer', 'digital-printer', 'Digital Printer,Printer', 'PP-15', '2', 'Medium', NULL, '220', NULL, 'A digital printer is a high-speed printing device that produces text and graphics by directly translating digital data from a computer or other digital sources onto various print media, such as paper or transparencies, using technologies like laser or inkjet.', '<p>A digital printer is a sophisticated printing device that translates digital data from computers or other digital sources into physical copies on various print media. Unlike traditional analog printing methods, such as offset or letterpress, digital printers operate by directly interpreting digital files, enabling high-speed and precise reproduction of text, images, and graphics.</p>\r\n<p>Two prevalent types of digital printing technologies are inkjet and laser printing. Inkjet printers use liquid ink or toner and apply it in droplets onto the printing surface, while laser printers use a laser beam to create an electrostatic image on a drum, which is then fused onto the paper using toner.</p>', '6577073406fa05.97295323.webp', NULL, NULL, NULL, NULL, 1, NULL, 22, NULL, 5, '2023-12-11 07:57:24', '2024-01-20 05:20:26'),
(20, 'Low Back Office Chair', 'low-back-office-chair', 'Low Back Office Chair,chair', 'CC-19', '7', NULL, 'Blue', '130', '10', 'A low back office chair is a seating solution designed with a shorter backrest, typically reaching up to the lower part of the user\'s back. These chairs are often chosen for their contemporary and minimalist design, providing lower back support while allowing for increased airflow.', '<p>A low back office chair is a seating fixture tailored for office or workspace environments, characterized by a backrest that extends up to the lower part of the user\'s back. This design distinguishes it from high-back chairs, offering a more open and airy aesthetic. These chairs are often chosen for their contemporary and minimalist appeal, contributing to a modern office decor.</p>\r\n<p>The lower back support provided by these chairs is generally sufficient for short to moderate periods of seated work. While they may not offer the same level of upper back support as high-back alternatives, they are favored for promoting a more casual and collaborative atmosphere in the workplace.</p>', '657707d5c31a06.67455738.webp', NULL, 1, NULL, NULL, 1, NULL, 25, NULL, 2, '2023-12-11 08:00:05', '2024-01-20 05:21:52'),
(21, 'Samsung Galaxy A13 Case', 'samsung-galaxy-a13-case', 'Samsung Galaxy A13 Case', 'A13', '62', NULL, 'Blue', '20', '5', 'Samsung Galaxy A13 Mobile Case', '<p>Samsung Galaxy A13 Mobile Case</p>\r\n<p>Samsung Galaxy A13 Mobile Case</p>\r\n<p>Samsung Galaxy A13 Mobile Case</p>', '65770938762805.14726946.webp', NULL, 1, NULL, NULL, 1, NULL, 20, 20, 5, '2023-12-11 08:06:00', '2024-02-04 23:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 13, 3, 'Good Product', 1, '2024-01-13 04:07:29', NULL),
(2, 3, 13, 5, 'nice Adjust the code according to your actual rating values and how you want the width to be determined based on those ratings.\n\nAlternatively, you could also create CSS classes for different rating ranges in your stylesheet and apply them dynamically:product', 1, '2024-01-13 08:52:25', NULL),
(4, 3, 13, 3, 'Thank so much i like this product', 1, '2024-01-13 09:48:33', NULL),
(5, 3, 12, 4, 'I like it, Its a good Product.', 1, '2024-01-14 02:16:02', '2024-01-14 02:22:37'),
(6, 3, 20, 3, 'Good Product i will one more, On time Delivery.\r\nThank you so much', 1, '2024-01-17 21:03:54', '2024-01-17 21:04:39'),
(7, 3, 9, 5, 'It looks good, Nice Product i will buy one more for my friend.', 1, '2024-01-17 21:41:13', '2024-01-17 21:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2024-01-21 08:57:52', '2024-01-21 08:57:52'),
(2, 'Admin', 'web', '2024-01-21 08:58:22', '2024-01-21 08:58:22'),
(3, 'Accountant', 'web', '2024-01-21 08:58:43', '2024-01-21 08:58:43'),
(4, 'Manager', 'web', '2024-01-21 08:59:15', '2024-01-21 09:08:58');

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
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
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
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `title`, `author`, `keywords`, `description`, `created_at`, `updated_at`) VALUES
(1, 'fdfs21', '212dfdfsa', 'fdfdss212', 'fdfdss212', NULL, '2024-01-19 09:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `support_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `support_phone`, `phone`, `email`, `address`, `facebook`, `twitter`, `youtube`, `instagram`, `copyright`, `created_at`, `updated_at`) VALUES
(1, '65a8e7553a6714.78139238.png', '1900 - 888', '(+91) - 540-025-124553', 'sale@Nest.com', '5171 W Campbell Ave undefined Kent, Utah 53127 United States', 'facebook.com', 'twitter.com', 'youtube.com', 'instagram.com', '© 2024, Nest All rights reserved', '2024-01-18 03:54:45', '2024-01-18 03:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `division_id`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'Main Chowk', 1, 8, '2023-12-27 01:40:21', '2023-12-27 01:40:21'),
(2, 'F 12', 5, 2, '2023-12-27 01:40:42', '2023-12-27 01:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subCategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subCategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subCategory_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subCategory_name`, `subCategory_slug`, `subCategory_image`, `category_id`, `created_at`, `updated_at`) VALUES
(15, 'Men\'s Shirt', 'men\'s-shirt', '65768f57840833.68145798.jpg', 15, '2023-12-10 23:25:59', '2023-12-10 23:25:59'),
(16, 'Women Shoes', 'women-shoes', '65768f7765bcb5.23789041.jpg', 17, '2023-12-10 23:26:31', '2023-12-10 23:31:20'),
(17, 'Kids Clothe', 'kids-clothe', '65768f8a7fdcc6.57199744.jpg', 15, '2023-12-10 23:26:50', '2023-12-10 23:26:50'),
(18, 'Women Clothe', 'women-clothe', '65768fac656e74.20960101.jpg', 15, '2023-12-10 23:27:24', '2023-12-10 23:27:24'),
(19, 'Laptop', 'laptop', '65768fcf7da875.79247920.jpg', 20, '2023-12-10 23:27:59', '2023-12-10 23:27:59'),
(20, 'Mobiles', 'mobiles', '65768fe7165d79.60820742.jpg', 20, '2023-12-10 23:28:23', '2023-12-10 23:28:23'),
(21, 'Watches', 'watches', '65769038e5bac4.69036230.jpg', 16, '2023-12-10 23:28:50', '2023-12-10 23:29:45'),
(22, 'Fruit', 'fruit', '6576905e0e5d44.23717283.png', 19, '2023-12-10 23:30:22', '2023-12-10 23:30:22'),
(23, 'Powder Items', 'powder-items', '657690816bdfc1.26359496.jpg', 21, '2023-12-10 23:30:57', '2023-12-10 23:30:57'),
(24, 'Men\'s Shoes', 'men\'s-shoes', '657690c9dc25c5.65994808.webp', 17, '2023-12-10 23:32:09', '2023-12-10 23:32:09'),
(25, 'Men\'s Wear', 'men\'s-wear', '6576912fdfea98.01897993.webp', 16, '2023-12-10 23:33:51', '2023-12-10 23:33:51'),
(26, 'Chairs', 'chairs', '65769164b03d11.52896753.webp', 23, '2023-12-10 23:34:44', '2023-12-10 23:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','vendor','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_active_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `phone`, `address`, `shop_info`, `role`, `status`, `image`, `remember_token`, `created_at`, `updated_at`, `last_active_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$12$8bH4cM.IRxy2aPgsaqy2y.vrA6PVWC2Aij6OLTz44CHmqTcAsr5.y', '+13452367654', 'Bay Area, San Francisco, CA', NULL, 'admin', 'active', '6560412facfbc5.76493644.png', NULL, '2023-11-22 08:15:56', '2024-02-04 23:01:30', '2024-02-04 23:01:30'),
(2, 'Vendor Shop', 'vendor', 'vendor@gmail.com', NULL, '$2y$12$0ler0q/VIV5dpWUjrvbRvOKvDWDZCSRjrJn.0U6ag8DrRORE/hW62', '+13452367654', 'Bay Area, San Francisco, CA', 'Shop Info', 'vendor', 'active', '6561625b23afd1.20768410.png', NULL, '2023-11-22 08:16:33', '2024-01-28 21:13:03', '2024-01-28 21:13:03'),
(3, 'User', 'user1', 'user@gmail.com', NULL, '$2y$12$Eua8wVtiMM.9KAEmLkRsm.0Bs5cfJUDfc6DHGqGk.SxjIbpM/urxK', '+13452367654', 'Bay Area, San Francisco, CA', NULL, 'user', 'active', '6561fcef8bdb94.60162036.png', NULL, '2023-11-22 08:17:07', '2024-02-04 23:27:20', '2024-02-04 23:27:20'),
(4, 'M Mujahid', NULL, 'mm1700254@gmail.com', NULL, '$2y$12$C6Q39mdtzObvq6kR0Lv3DuNvGMD8Cx0l/63SoyhESa3..U1iel7l2', NULL, 'Bay Area, San Francisco, CA', NULL, 'user', 'active', NULL, NULL, '2023-11-25 04:58:30', '2024-01-10 22:59:39', '2024-01-10 22:59:39'),
(5, 'Ali Mobiles', 'ali', 'ali@gmail.com', NULL, '$2y$12$ZXUWK1Qyd3Jjn5WdqRJb9eJOvpQZl5MBRncwM0.N9S3BEp1pDLT/S', '+13452367654', 'Bay Area, San Francisco, CA', 'Bay Area, San Francisco, CA', 'vendor', 'active', '657b06e8e9f656.39329934.png', NULL, '2023-11-28 22:44:11', '2023-12-14 08:45:12', NULL),
(6, 'Super Market', 'super', 'super@gmail.com', NULL, '$2y$12$A8.7K7ekPWLc7qP8Eu1h2OqDBK.EGJFJ7Bopxu.bUS0HC6x4LcQtC', '+1 (454) 226-4779', 'Bay Area, San Francisco, CA', NULL, 'vendor', 'active', NULL, NULL, '2023-11-29 07:41:12', '2023-11-29 22:37:43', NULL),
(7, 'Makka Mobile', 'makkamobile', 'mobile@gmail.com', NULL, '$2y$12$cPElvj28URq/SLZYOIQkPesLOUNbhfyLpm8/Bmjb1bqFU9E1G46iG', '+1 (919) 896-5519', 'Bay Area, San Francisco, CA', 'Bay Area, San Francisco, CA', 'vendor', 'inactive', '657b074ad9cca7.03063814.png', NULL, '2023-11-29 08:47:57', '2023-12-14 08:46:50', NULL),
(11, 'Ali', 'Ali191', 'ali191@gmail.com', NULL, '$2y$12$rQzD5LtMXma.aiBFIOGlpuUpxgljy1LQHu.qrNYu0VkjZv1v/.mNG', '(+91) - 540-025-124553', 'Lahore', NULL, 'admin', 'active', NULL, NULL, '2024-01-27 06:16:38', '2024-01-27 06:16:38', NULL),
(12, 'Amazon Product', 'AP191', 'amazon@gmailcom', NULL, '$2y$12$bAeVWF4OgepUK6VJ3k0AMej/7K3Jf6gJYEct0tA9nUH..dbIMh3Jq', '03355412569', NULL, NULL, 'vendor', 'inactive', NULL, NULL, '2024-01-28 20:44:38', '2024-01-28 20:44:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(18, 3, 12, '2024-01-19 07:21:02', NULL),
(19, 3, 13, '2024-01-19 07:21:03', NULL),
(20, 3, 20, '2024-01-19 07:27:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_posts_blogcategory_id_foreign` (`blog_category_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compares`
--
ALTER TABLE `compares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compares_user_id_foreign` (`user_id`),
  ADD KEY `compares_product_id_foreign` (`product_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `divisions_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
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
-- Indexes for table `multi_images`
--
ALTER TABLE `multi_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `multi_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_division_id_foreign` (`division_id`),
  ADD KEY `orders_district_id_foreign` (`district_id`),
  ADD KEY `orders_state_id_foreign` (`state_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_division_id_foreign` (`division_id`),
  ADD KEY `states_district_id_foreign` (`district_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `compares`
--
ALTER TABLE `compares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `multi_images`
--
ALTER TABLE `multi_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_blogcategory_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`);

--
-- Constraints for table `compares`
--
ALTER TABLE `compares`
  ADD CONSTRAINT `compares_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `compares_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);

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
-- Constraints for table `multi_images`
--
ALTER TABLE `multi_images`
  ADD CONSTRAINT `multi_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `orders_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
  ADD CONSTRAINT `orders_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`),
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `states_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
