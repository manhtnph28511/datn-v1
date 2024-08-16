-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2024 at 05:30 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datn`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Prada', 'Prada', 'Prada là một nhãn hiệu thời trang của Ý chuyên về các sản phẩm cao cấp cho nam và nữ (giày dép, túi xách, phụ kiện thời trang...), nhãn hiệu Prada được thành lập bởi Mario Prada năm 1913. Prada được xem là một trong những nhà thiết kế có ảnh hưởng nhất trong ngành công nghiệp thời trang.', NULL, NULL, NULL),
(2, 'Gucci', 'Gucci', 'Gucci là thương hiệu thời trang đình đám của Ý. Nhãn hàng được sáng lập vào năm 1921 bởi Guccio Gucci tại Florence – thành phố thời trang của nước Ý. Với kiến thức và kinh nghiệm cá nhân trau dồi được khi làm việc tại London, Guccio Gucci đúc kết và đưa ra tầm nhìn dài hạn với thời trang quý tốc tại Pháp và Anh.', NULL, '2023-07-26 13:36:49', '2023-07-26 13:36:49'),
(3, 'Louis Vuitton', 'Louis Vuitton', 'Năm 1885, LV mở cửa hàng đầu tiên tại đường Oxford, London của Anh. Ngay sau đó, trước những thiết kế giả mạo hàng loạt diễn ra, mô hình Damier Canvas được Louis thành lập, với khẩu hiệu \"thương hiệu L. Vuitton\" 1892: Louis Vuitton qua đời, quyền lãnh đạo công ty được chuyển cho con trai ông -Georges Vuitton.', NULL, '2023-07-28 21:25:46', '2023-07-28 21:25:46'),
(4, 'Hermès', 'Hermès', 'Hermès là một công ty thời trang xa xỉ có trụ sở ở Paris, Pháp. Công ty được sáng lập bởi Thierry Hermès vào năm 1837, ngày nay chuyên sản xuất hàng da, phụ kiện thời trang, nước hoa, hàng xa xỉ, và quần áo may sẵn. Logo của công ty từ những năm 1950, là một chiếc xe ngựa.', NULL, '2024-07-28 21:26:16', '2024-07-28 21:26:16'),
(5, 'Chanel', 'Chanel', 'Được thành lập từ những năm 1909-1910 do Gabrielle \"Coco\" Chanel sáng lập, cái tên Chanel được biết đến như một nhãn hiệu thời trang cao cấp đáng tự hào nhất của ngành công nghiệp thời trang nước Pháp. Hơn bất kì nhãn hiệu nào, Chanel mang trọn vẹn nhiều tinh hoa của ngành thời trang cổ điển thời đại trước.', NULL, '2024-07-28 21:27:00', '2024-07-28 21:27:00'),
(6, 'Burberry', 'Burberry', 'Burberry là một thương hiệu thời trang cao cấp với phong cách quý tộc Anh được sáng lập vào năm 1856 bởi Thomas Burberry khi ông chỉ mới 21 tuổi, nhãn hiệu được thành lập trên sứ mệnh rằng quần áo phải được thiết kế để bảo vệ cơ thể con người trước thời tiết lạnh giá của nước Anh.', NULL, '2024-07-28 21:27:27', '2024-07-28 21:27:27'),
(7, 'Fendi', 'fendi', 'Thương hiệu Fendi được Adele và Edoardo Fendi thành lập vào năm 1925, từ một cửa hàng thời trang đồ lông tại khu Via del Plebiscito, thành phố Roma. Tới năm 1946, thế hệ thứ hai nhà Fendi lên nắm quyền điều hành công ty, với năm chị em Paola, Anna, Franca, Carla và Alda Fendi. Cổ phần mỗi người là 20%.', NULL, '2023-07-28 21:27:51', '2023-11-09 20:54:32'),
(8, 'Dior', 'Dior', 'Công ty Dior được thành lập vào ngày 16 tháng 12 năm 1946 tại nhà riêng của Christian Dior tại số 30 Avenue Montaigne Paris B. Tuy nhiên hiện nay, Dior lấy năm 1947 là năm thành lập. Dior lúc đó được hỗ trợ tài chính bởi doanh nhân Marcel Boussac.. Vốn ban đầu của công ty là 6 triệu Franc với 80 nhân công.', NULL, '2024-06-30 01:07:38', '2024-07-26 02:31:13');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int UNSIGNED NOT NULL,
  `pro_id` int NOT NULL,
  `user_id` int NOT NULL,
  `size_id` int NOT NULL,
  `color_id` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `discounted_total_price` decimal(8,2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `pro_id`, `user_id`, `size_id`, `color_id`, `price`, `quantity`, `total_price`, `discounted_total_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 3000.00, 1, '3000.00', NULL, NULL, '2024-07-24 17:10:24', '2024-07-24 17:10:24'),
(4, 10, 6, 1, 1, 230000.00, 1, '230000.00', NULL, NULL, '2024-07-24 17:14:54', '2024-07-24 17:14:54'),
(13, 17, 6, 1, 1, 69999.00, 1, '69999.00', NULL, NULL, '2024-07-24 17:10:24', '2024-07-24 17:10:24'),
(14, 10, 6, 1, 1, 230000.00, 1, '230000.00', NULL, NULL, '2024-07-24 17:14:54', '2024-07-24 17:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Thời trang', 'thoi-trang', '', NULL, '2023-07-26 13:37:08', '2023-07-26 13:37:08'),
(2, 'Giày Dép', 'giay-dep', '', NULL, '2023-07-26 13:37:17', '2023-07-28 21:57:13'),
(5, 'tên danh mục', 'ten-danh-muc', '', '2023-08-03 20:33:41', '2023-08-03 20:33:36', '2023-08-03 20:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Đen', '#000000', '2023-07-26 13:37:45', '2023-07-26 13:37:45', NULL),
(2, 'Đỏ', '#f50000', '2023-07-26 13:37:57', '2023-07-26 13:37:57', NULL),
(3, 'Xám', '#e3dede', '2023-07-26 13:38:15', '2023-07-26 13:38:15', NULL),
(4, 'Be', '#eee1b5', '2023-07-26 13:38:37', '2023-07-26 13:38:37', NULL),
(5, 'Neon Pink', '#c25695', '2023-07-28 21:50:17', '2023-07-28 21:50:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_06_06_000000_create_failed_jobs_table', 1),
(3, '2024_06_06_000000_create_users_table', 1),
(4, '2024_06_06_000001_create_personal_access_tokens_table', 2),
(5, '2024_06_06_095228_create_carts_table', 2),
(6, '2024_06_06_100000_create_password_reset_tokens_table', 2),
(7, '2024_06_06_102704_create_sub_categories_table', 2),
(8, '2024_06_06_115356_create_products_table', 2),
(9, '2024_06_06_120152_create_brands_table', 2),
(10, '2024_06_06_120214_create_categories_table', 2),
(11, '2024_06_06_120224_create_colors_table', 2),
(12, '2024_06_06_120231_create_sizes_table', 2),
(13, '2024_06_06_145350_create_status_products_table', 2),
(14, '2024_06_06_150107_create_ratings_table', 2),
(15, '2024_06_06_164649_create_orders_table', 2),
(16, '2024_06_06_164935_create_order_details_table', 2),
(17, '2024_07_26_161235_create_comments_table', 2),
(18, '2024_07_26_162124_add_status_to_products_table', 2),
(19, '2024_07_28_161838_add_status_to_users_table', 2),
(20, '2024_07_29_183335_add_email_to_orders_table', 2),
(21, '2024_08_01_055722_update_orders_table', 2),
(22, '2024_08_01_122838_create_order_update_table', 2),
(23, '2024_08_04_160239_add_status_to_order_details_table', 2),
(24, '2024_08_04_160501_reorder_columns_in_order_details_table', 2),
(25, '2024_08_04_164348_update_orders_table', 2),
(26, '2024_08_04_172656_update_payment_method_in_orders_table', 2),
(27, '2024_08_04_173713_remove_type_from_order_details', 2),
(28, '2024_08_05_174755_create_product_variations_table', 2),
(29, '2024_08_06_164026_create_notifications_table', 2),
(30, '2024_08_06_171216_add_order_id_to_notifications_table', 2),
(31, '2024_08_06_174006_remove_user_id_from_notifications', 2),
(32, '2024_08_08_093208_add_image_variant_to_product_variants_table', 2),
(33, '2024_08_08_093825_add_quantity_to_product_variants_table', 2),
(34, '2024_08_12_172544_remove_status_from_order_details_table', 3),
(35, '2024_08_12_173011_create_vouchers_table', 4),
(36, '2024_08_15_100921_update_discount_type_in_vouchers', 5),
(37, '2024_08_15_102516_remove_category_id_from_vouchers_table', 6),
(38, '2024_08_16_095605_update_carts_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `order_id`, `type`, `data`, `is_read`, `created_at`, `updated_at`) VALUES
(3, NULL, 'order_placed', '{\"order_id\":62,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #62\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-06 03:41:55', '2024-08-07 02:12:19'),
(5, NULL, 'order_placed', '{\"order_id\":19,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #64\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-06 03:45:51', '2024-08-07 02:12:42'),
(10, NULL, 'shipping_update', '{\"order_id\":61,\"message\":\"Tr\\u1ea1ng th\\u00e1i \\u0111\\u01a1n h\\u00e0ng c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c c\\u1eadp nh\\u1eadt: \\u0111ang \\u0111\\u01b0\\u1ee3c giao cho ng\\u01b0\\u1eddi nh\\u1eadn\"}', 1, '2024-08-07 02:30:04', '2024-08-07 03:12:40'),
(11, NULL, 'order_received_confirmation', '{\"order_id\":61,\"message\":\"Ng\\u01b0\\u1eddi d\\u00f9ng \\u0111\\u00e3 nh\\u1eadn h\\u00e0ng cho \\u0111\\u01a1n h\\u00e0ng #61\"}', 1, '2024-08-07 03:12:40', '2024-08-07 03:13:15'),
(12, NULL, 'order_delivered', '{\"order_id\":61,\"message\":\"\\u0110\\u01a1n h\\u00e0ng c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao th\\u00e0nh c\\u00f4ng. H\\u00e3y \\u0111\\u00e1nh gi\\u00e1 v\\u00e0 cho \\u00fd ki\\u1ebfn v\\u1ec1 \\u0111\\u01a1n h\\u00e0ng!\"}', 1, '2024-08-07 03:21:51', '2024-08-07 03:24:24'),
(13, NULL, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #69\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-07 05:27:44', '2024-08-07 05:28:46'),
(15, NULL, 'shipping_update', '{\"order_id\":70,\"message\":\"\\u0110\\u01a1n h\\u00e0ng \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao cho ng\\u01b0\\u1eddi nh\\u1eadn. Vui l\\u00f2ng x\\u00e1c nh\\u1eadn \\u0111\\u00e3 nh\\u1eadn h\\u00e0ng.\"}', 1, '2024-08-08 19:13:00', '2024-08-08 19:13:03'),
(17, NULL, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #72\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-08 21:26:37', '2024-08-08 21:34:29'),
(18, NULL, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #73\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-08 21:30:35', '2024-08-08 21:34:29'),
(19, NULL, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #74\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-08 21:33:35', '2024-08-08 21:34:29'),
(20, NULL, 'shipping_update', '{\"order_id\":74,\"message\":\"\\u0110\\u01a1n h\\u00e0ng \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao cho ng\\u01b0\\u1eddi nh\\u1eadn. Vui l\\u00f2ng x\\u00e1c nh\\u1eadn \\u0111\\u00e3 nh\\u1eadn h\\u00e0ng.\"}', 1, '2024-08-08 21:36:42', '2024-08-08 21:36:53'),
(21, NULL, 'order_received_confirmation', '{\"order_id\":74,\"message\":\"Ng\\u01b0\\u1eddi d\\u00f9ng \\u0111\\u00e3 nh\\u1eadn h\\u00e0ng cho \\u0111\\u01a1n h\\u00e0ng #74\"}', 1, '2024-08-08 21:36:53', '2024-08-08 21:37:03'),
(22, NULL, 'order_delivered', '{\"order_id\":74,\"message\":\"\\u0110\\u01a1n h\\u00e0ng c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao th\\u00e0nh c\\u00f4ng. H\\u00e3y \\u0111\\u00e1nh gi\\u00e1 v\\u00e0 cho \\u00fd ki\\u1ebfn v\\u1ec1 \\u0111\\u01a1n h\\u00e0ng!\"}', 1, '2024-08-08 21:37:44', '2024-08-08 21:37:46'),
(23, NULL, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #75\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-12 10:18:29', '2024-08-12 10:18:41'),
(24, NULL, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #76\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-12 10:19:54', '2024-08-15 02:47:16'),
(25, NULL, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #83\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-16 05:25:25', '2024-08-16 05:27:38'),
(26, NULL, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #84\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-16 05:26:01', '2024-08-16 05:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING' COMMENT 'PENDING, SUCCESS, CANCEL',
  `shipment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ORDERPLACE' COMMENT 'ORDERPLACE, PACKED, SHIPPED, INTRANSIT, OUTFORDELIVERY, DELIVERED, DELAYED, EXCEPTION, RETURNED',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `username`, `email`, `phone`, `address`, `note`, `order_status`, `shipment_status`, `payment_method`, `created_at`, `updated_at`) VALUES
(2, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'PENDING', 'DELIVERED', 'COD', '2024-07-24 13:39:45', '2024-08-05 19:13:22'),
(3, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'PENDING', 'RETURNED', 'COD', '2024-07-24 13:56:04', '2024-08-05 19:11:52'),
(4, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'PENDING', 'DELIVERED', 'COD', '2024-07-24 14:03:13', '2024-08-05 19:13:01'),
(5, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 14:07:26', '2024-07-24 14:07:26'),
(6, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'success', 'DELIVERED', 'COD', '2024-07-24 14:10:04', '2024-08-05 19:14:19'),
(7, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'cancel', 'RETURNED', 'COD', '2024-07-24 14:12:49', '2024-08-05 19:14:49'),
(8, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 14:16:21', '2024-07-24 14:16:21'),
(9, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 14:20:32', '2024-07-24 14:20:32'),
(10, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 16:53:16', '2024-07-24 16:53:16'),
(11, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 16:56:12', '2024-07-24 16:56:12'),
(12, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 16:58:57', '2024-07-24 16:58:57'),
(13, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 17:02:52', '2024-07-24 17:02:52'),
(14, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 17:10:30', '2024-07-24 17:10:30'),
(15, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 17:15:03', '2024-07-24 17:15:03'),
(25, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', 'ko co', 'PENDING', 'SHIPPED', 'COD', '2024-08-04 02:28:20', '2024-08-04 02:37:54'),
(26, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'null', '2024-08-04 02:58:07', '2024-08-04 02:58:07'),
(27, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-04 02:58:43', '2024-08-04 02:58:43'),
(33, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-04 03:01:41', '2024-08-04 03:01:41'),
(34, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-04 03:02:00', '2024-08-04 03:02:00'),
(35, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'null', '2024-08-04 03:02:08', '2024-08-04 03:02:08'),
(38, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'RETURNED', 'COD', '2024-08-04 03:07:07', '2024-08-05 19:11:31'),
(40, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'null', '2024-08-04 03:08:02', '2024-08-04 03:08:02'),
(41, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-04 03:08:55', '2024-08-04 03:08:55'),
(42, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-04 03:10:07', '2024-08-04 03:10:07'),
(44, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-04 03:11:05', '2024-08-04 03:11:05'),
(48, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-04 03:20:23', '2024-08-04 03:20:23'),
(54, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-04 03:35:26', '2024-08-04 03:35:26'),
(55, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-04 03:35:56', '2024-08-04 03:35:56'),
(56, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'RETURNED', 'Credit_card', '2024-08-04 03:38:31', '2024-08-05 19:09:02'),
(57, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-04 03:39:14', '2024-08-04 03:39:14'),
(58, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'success', 'DELIVERED', 'Credit_card', '2024-08-05 20:27:54', '2024-08-05 20:29:07'),
(59, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-06 03:29:36', '2024-08-06 03:29:36'),
(60, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-06 03:30:37', '2024-08-06 03:30:37'),
(61, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'success', 'DELIVERED', 'COD', '2024-08-06 03:41:08', '2024-08-07 03:21:51'),
(62, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-06 03:41:55', '2024-08-06 03:41:55'),
(63, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-06 03:42:33', '2024-08-06 03:42:33'),
(64, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-06 03:45:51', '2024-08-06 03:45:51'),
(65, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-06 03:47:47', '2024-08-06 03:47:47'),
(66, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-06 03:51:59', '2024-08-06 03:51:59'),
(67, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-06 03:52:06', '2024-08-06 03:52:06'),
(68, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-06 03:53:02', '2024-08-06 03:53:02'),
(69, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-07 05:27:44', '2024-08-07 05:27:44'),
(70, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'OUTFORDELIVERY', 'COD', '2024-08-08 04:32:41', '2024-08-08 19:13:00'),
(71, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-08 19:29:37', '2024-08-08 19:29:37'),
(72, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-08 21:26:37', '2024-08-08 21:26:37'),
(73, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-08 21:30:35', '2024-08-08 21:30:35'),
(74, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'success', 'DELIVERED', 'Credit_card', '2024-08-08 21:33:35', '2024-08-08 21:37:44'),
(75, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-12 10:18:29', '2024-08-12 10:18:29'),
(76, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-12 10:19:54', '2024-08-12 10:19:54'),
(77, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-16 05:14:11', '2024-08-16 05:14:11'),
(78, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-16 05:14:18', '2024-08-16 05:14:18'),
(79, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-16 05:15:09', '2024-08-16 05:15:09'),
(80, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-16 05:16:40', '2024-08-16 05:16:40'),
(81, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-16 05:24:02', '2024-08-16 05:24:02'),
(82, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-16 05:24:23', '2024-08-16 05:24:23'),
(83, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-16 05:25:25', '2024-08-16 05:25:25'),
(84, 19, 'tran manh', 'minh29122003@gmail.com', '0987654321', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-16 05:26:01', '2024-08-16 05:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `pro_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED DEFAULT NULL,
  `color_id` bigint UNSIGNED DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `pro_id`, `size_id`, `color_id`, `price`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(5, 25, 3, 2, 2, '480000.00', 1, '480000.00', '2024-08-04 02:28:20', '2024-08-04 02:28:20'),
(6, 26, 3, 2, 2, '480000.00', 1, '480000.00', '2024-08-04 02:58:07', '2024-08-04 02:58:07'),
(8, 35, 3, 1, 2, '480000.00', 1, '480000.00', '2024-08-04 03:02:08', '2024-08-04 03:02:08'),
(10, 40, 2, 3, 2, '141234.00', 1, '141234.00', '2024-08-04 03:08:02', '2024-08-04 03:08:02'),
(11, 41, 10, 1, 1, '230000.00', 1, '230000.00', '2024-08-04 03:08:55', '2024-08-04 03:08:55'),
(13, 44, 8, 1, 2, '320000.00', 1, '320000.00', '2024-08-04 03:11:05', '2024-08-04 03:11:05'),
(17, 48, 3, 1, 2, '480000.00', 1, '480000.00', '2024-08-04 03:20:23', '2024-08-04 03:20:23'),
(23, 54, 3, 2, 2, '480000.00', 1, '480000.00', '2024-08-04 03:35:26', '2024-08-04 03:35:26'),
(24, 55, 10, 1, 3, '230000.00', 1, '230000.00', '2024-08-04 03:35:56', '2024-08-04 03:35:56'),
(25, 56, 15, 2, 1, '141234.00', 1, '141234.00', '2024-08-04 03:38:31', '2024-08-04 03:38:31'),
(26, 57, 15, 2, 1, '141234.00', 1, '141234.00', '2024-08-04 03:39:14', '2024-08-04 03:39:14'),
(27, 58, 3, 2, 1, '480000.00', 1, '480000.00', '2024-08-05 20:27:54', '2024-08-05 20:29:07'),
(28, 59, 13, 1, 2, '900000.00', 1, '900000.00', '2024-08-06 03:29:36', '2024-08-06 03:29:36'),
(29, 60, 13, 1, 2, '900000.00', 1, '900000.00', '2024-08-06 03:30:37', '2024-08-06 03:30:37'),
(30, 61, 13, 1, 2, '900000.00', 1, '900000.00', '2024-08-06 03:41:08', '2024-08-07 03:21:51'),
(31, 62, 13, 1, 2, '900000.00', 1, '900000.00', '2024-08-06 03:41:55', '2024-08-06 03:41:55'),
(32, 64, 15, 2, 1, '141234.00', 1, '141234.00', '2024-08-06 03:45:51', '2024-08-06 03:45:51'),
(33, 65, 6, 1, 1, '530000.00', 1, '530000.00', '2024-08-06 03:47:47', '2024-08-06 03:47:47'),
(34, 66, 15, 2, 2, '141234.00', 1, '141234.00', '2024-08-06 03:51:59', '2024-08-06 03:51:59'),
(35, 67, 15, 2, 2, '141234.00', 1, '141234.00', '2024-08-06 03:52:06', '2024-08-06 03:52:06'),
(36, 68, 15, 2, 2, '141234.00', 1, '141234.00', '2024-08-06 03:53:03', '2024-08-06 03:53:03'),
(37, 69, 3, 2, 1, '480000.00', 1, '480000.00', '2024-08-07 05:27:44', '2024-08-07 05:27:44'),
(38, 70, 21, 2, 4, '300.00', 1, '300.00', '2024-08-08 04:32:41', '2024-08-08 19:12:32'),
(39, 70, 21, 2, 4, '300.00', 1, '300.00', '2024-08-08 04:32:41', '2024-08-08 19:12:32'),
(40, 71, 21, 3, 3, '300.00', 1, '300.00', '2024-08-08 19:29:37', '2024-08-08 19:29:37'),
(41, 71, 21, 3, 3, '300.00', 1, '300.00', '2024-08-08 19:29:37', '2024-08-08 19:29:37'),
(42, 72, 13, 3, 3, '900000.00', 1, '900000.00', '2024-08-08 21:26:37', '2024-08-08 21:26:37'),
(43, 72, 21, 2, 4, '300000.00', 2, '600000.00', '2024-08-08 21:26:37', '2024-08-08 21:26:37'),
(44, 73, 21, 2, 4, '300000.00', 1, '300000.00', '2024-08-08 21:30:35', '2024-08-08 21:30:35'),
(45, 73, 6, 5, 1, '530000.00', 2, '1060000.00', '2024-08-08 21:30:35', '2024-08-08 21:30:35'),
(46, 74, 13, 1, 1, '900000.00', 1, '900000.00', '2024-08-08 21:33:35', '2024-08-08 21:37:44'),
(47, 74, 21, 3, 3, '500.00', 1, '500.00', '2024-08-08 21:33:35', '2024-08-08 21:37:44'),
(48, 75, 21, 2, 4, '150.00', 1, '150.00', '2024-08-12 10:18:29', '2024-08-12 10:18:29'),
(49, 76, 17, 2, 3, '69999.00', 1, '69999.00', '2024-08-12 10:19:54', '2024-08-12 10:19:54'),
(50, 80, 21, 2, 4, '300000.00', 2, '600000.00', '2024-08-16 05:16:40', '2024-08-16 05:16:40'),
(51, 81, 21, 2, 4, '300000.00', 2, '600000.00', '2024-08-16 05:24:02', '2024-08-16 05:24:02'),
(52, 82, 21, 2, 4, '300000.00', 2, '600000.00', '2024-08-16 05:24:23', '2024-08-16 05:24:23'),
(53, 83, 21, 2, 4, '300000.00', 2, '600000.00', '2024-08-16 05:25:25', '2024-08-16 05:25:25'),
(54, 84, 21, 2, 4, '300000.00', 2, '600000.00', '2024-08-16 05:26:01', '2024-08-16 05:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_updates`
--

CREATE TABLE `order_updates` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_updates`
--

INSERT INTO `order_updates` (`id`, `order_id`, `user_id`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 25, 17, 'Đơn hàng đã nhận và đang đóng gói.', '2024-08-04 02:37:50', '2024-08-04 02:37:50', NULL),
(2, 25, 17, 'Đơn hàng đã được vận chuyển.', '2024-08-04 02:37:54', '2024-08-04 02:37:54', NULL),
(3, 1, 17, 'Trạng thái thanh toán được cập nhật thành đã thanh toán.', '2024-08-05 18:28:12', '2024-08-05 18:28:12', NULL),
(4, 1, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-05 18:55:55', '2024-08-05 18:55:55', NULL),
(5, 2, 17, 'Đơn hàng đã nhận và đang đóng gói.', '2024-08-05 18:56:26', '2024-08-05 18:56:26', NULL),
(6, 56, 17, 'Đơn hàng đã được hoàn trả lại cho người gửi.', '2024-08-05 19:09:02', '2024-08-05 19:09:02', NULL),
(7, 38, 17, 'Đơn hàng 1.', '2024-08-05 19:11:31', '2024-08-05 19:11:31', NULL),
(8, 3, 17, 'Đơn hàng 1.', '2024-08-05 19:11:52', '2024-08-05 19:11:52', NULL),
(9, 4, 17, 'Đơn hàng 1.', '2024-08-05 19:13:01', '2024-08-05 19:13:01', NULL),
(10, 2, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-05 19:13:22', '2024-08-05 19:13:22', NULL),
(11, 6, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-05 19:14:19', '2024-08-05 19:14:19', NULL),
(12, 7, 17, 'Đơn hàng đã được hoàn trả lại cho người gửi.', '2024-08-05 19:14:49', '2024-08-05 19:14:49', NULL),
(13, 58, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-05 20:29:07', '2024-08-05 20:29:07', NULL),
(14, 61, 17, 'Đơn hàng đang được giao cho người nhận.', '2024-08-07 02:30:04', '2024-08-07 02:30:04', NULL),
(15, 61, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-07 03:21:51', '2024-08-07 03:21:51', NULL),
(16, 70, 17, 'Đơn hàng đã nhận và đang đóng gói.', '2024-08-08 19:12:32', '2024-08-08 19:12:32', NULL),
(17, 70, 17, 'Đơn hàng đã được giao cho người nhận.', '2024-08-08 19:13:00', '2024-08-08 19:13:00', NULL),
(18, 74, 17, 'Đơn hàng đã được giao cho người nhận.', '2024-08-08 21:36:42', '2024-08-08 21:36:42', NULL),
(19, 74, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-08 21:37:44', '2024-08-08 21:37:44', NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `view` int NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cate_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `color_id` int NOT NULL,
  `size_id` int NOT NULL,
  `status_id` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `quantity`, `description`, `view`, `slug`, `cate_id`, `brand_id`, `color_id`, `size_id`, `status_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Cartoon Astronaut T-Shirts', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637576/Cara/Products/jxmoqrh37yknvwnufeou.jpg', 141234.00, 10, '<p><strong>Form Dáng</strong>: Regular Fit.</p><p><strong>Chất liệu:</strong></p><blockquote><ul><li>Định lượng: 330gsm (Dày dặn, xốp, phồng đứng form)</li><li>Thành phần: 35% Cotton - 65% Polyester</li></ul></blockquote><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Thoáng khí và thấm hút cao: Bề mặt vải được dệt mắt lô kim to giúp thoáng khi tuyệt đối cao.</li><li>Vải có 2 bề mặt khác nhau<ul><li>Bề mặt ngoài: Sợi cotton được dệt waffle tạo độ xốp, phồng đứng form áo.</li><li>Bề mặt bên trong: Sợi polyester dệt mịn, trơn vải dạm da mượt, mát, thoáng khí, chống nhăn sau khi giặt.</li></ul></li><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt cùng với chi tiết sọc.</li><li>Dáng regular fit thoải mái.</li><li>Logo TOBI Regular 2024 được in nhung nổi cao thành, chắn chắn.</li></ul></blockquote>', 25, 'cartoon-astronaut-t-shirts', 1, 1, 5, 1, 1, NULL, '2024-07-27 20:34:56', '2024-08-04 01:58:56'),
(2, 'Cartoon Astronaut T-Shirts', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637548/Cara/Products/olkj6gj7e7kflny40axq.jpg', 141234.00, 23, '<p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Thoáng khí và thấm hút cao: Bề mặt vải được dệt mắt lô kim to giúp thoáng khi tuyệt đối cao.</li><li>Vải có 2 bề mặt khác nhau<ul><li>Bề mặt ngoài: Sợi cotton được dệt waffle tạo độ xốp, phồng đứng form áo.</li><li>Bề mặt bên trong: Sợi polyester dệt mịn, trơn vải dạm da mượt, mát, thoáng khí, chống nhăn sau khi giặt.</li></ul></li><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt cùng với chi tiết sọc.</li><li>Dáng regular fit thoải mái.</li><li>Logo TOBI Regular 2024 được in nhung nổi cao thành, chắn chắn.</li></ul></blockquote>', 67, 'cartoon-astronaut-t-shirts', 1, 1, 5, 3, 1, NULL, '2024-07-27 20:52:33', '2024-08-08 02:52:59'),
(3, 'TOBI Regular Raincoat', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637530/Cara/Products/qxxwuol3emz4fahronqf.jpg', 480000.00, 17, '<p><strong>Form Dáng</strong>: Oversize</p><p><strong>Chất liệu</strong>: Dù trượt nước - 100 % Polyester</p><p><strong>Chi tiết sản phẩm</strong>:</p><blockquote><ul><li>Hình in đa dạng</li><li>Phần lai áo được may xẻ tà và có nút bấm.</li></ul></blockquote><p>&nbsp;</p>', 60, 'tobi-ragular-raincoat', 1, 2, 4, 2, 1, NULL, '2024-07-28 21:22:53', '2024-08-07 05:27:22'),
(4, 'Waffle Stripped Polo - Grude', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637506/Cara/Products/mds4i02ts76eg5stpirj.jpg', 430000.00, 10, '<p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Thoáng khí và thấm hút cao: Bề mặt vải được dệt mắt lô kim to giúp thoáng khi tuyệt đối cao.</li><li>Vải có 2 bề mặt khác nhau<ul><li>Bề mặt ngoài: Sợi cotton được dệt waffle tạo độ xốp, phồng đứng form áo.</li><li>Bề mặt bên trong: Sợi polyester dệt mịn, trơn vải dạm da mượt, mát, thoáng khí, chống nhăn sau khi giặt.</li></ul></li><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt cùng với chi tiết sọc.</li><li>Dáng regular fit thoải mái.</li><li>Logo TOBI Regular 2024 được in nhung nổi cao thành, chắn chắn.</li></ul></blockquote>', 31, 'waffle-stripped-polo-grude', 1, 2, 3, 4, 2, NULL, '2024-07-28 21:24:38', '2024-07-23 21:41:26'),
(5, 'Regular Typo Cuban Shirt', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637486/Cara/Products/zshiefnor5oyupnn7lhl.jpg', 450000.00, 32, '<p><strong>Form Dáng:</strong>&nbsp;Boxy Fit.</p><ul><li>Chất liệu: 70% Cotton 30% Nylon</li><li>Định lượng: 161GSM</li></ul><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Form dáng Boxy chia tỉ lệ cơ thể 1/3 giúp tôn dáng người mặc</li><li>In vân đá</li></ul></blockquote>', 2, 'tegular-typo-cuban-shirt', 7, 7, 3, 4, 2, NULL, '2024-07-28 21:44:37', '2024-07-23 21:33:30'),
(6, 'Highclass Cuban Shirt', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699682825/Cara/Products/rbjjn6krrfs0dxs8z1ph.jpg', 530000.00, 22, '<p><strong>Form dáng:</strong> Boxy Fit.</p><p><strong>Chất liệu:</strong> Lụa D100</p><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Form dáng Boxy chia tỉ lệ cơ thể 1/3 giúp tôn dáng người mặc&nbsp;</li><li>Áo được in overprinted toàn bộ áo</li><li>Hoạ tiết trên áo mang hơi hướng summer vibe&nbsp;</li></ul></blockquote>', 23, 'highclass-cuban-shirt', 10, 4, 1, 5, 1, NULL, '2024-07-28 21:46:46', '2024-08-06 03:47:36'),
(7, 'TOBI Basic Boxy T-shirt', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637465/Cara/Products/rg4oynlowmtrxs9wyr5x.jpg', 299999.00, 22, '<p><strong>Form Dáng</strong>: Boxy Fit.</p><p><strong>Chất liệu:</strong></p><blockquote><ul><li>Định lượng: 250GSM</li><li>Thành phần: 100% Cotton - 2 Chiều.</li></ul></blockquote><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Bo cổ dệt định lượng dày, chắc chắn, hạn chế nhão &amp; co rút sau khi giặt.</li><li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li><li>Logo&nbsp;<strong>TOBI®</strong>&nbsp;màu kem in nổi cao thành, chắc chắn.</li></ul></blockquote>', 0, 'tobi-basic-boxy-t-shirt', 7, 5, 3, 5, 3, NULL, '2024-07-28 21:48:47', '2024-11-09 20:31:05'),
(8, 'TOBI SauRieng T-shirt', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637417/Cara/Products/tftdjcgnjr8sspsy9bsm.jpg', 320000.00, 20, '<p><strong>Form Dáng:</strong> Boxy Fit.</p><p><strong>Chất liệu:</strong></p><blockquote><ul><li>Định lượng: 250gsm&nbsp;</li><li>Thành phần: 100% Cotton - 2 Chiều.</li></ul></blockquote><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt.</li><li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li><li>Hình in Trame.</li></ul></blockquote>', 5, 'tobi-saurieng-t-shirt', 8, 8, 5, 3, 1, NULL, '2024-07-28 21:51:45', '2024-08-04 03:10:53'),
(9, 'Dép Sục Hà Mã Mắt To Dễ Thương Hot Trend', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637384/Cara/Products/mxiqa7j1m3id6azkg7md.jpg', 150000.00, 8, '<blockquote><ul><li>Dép làm từ nhựa EVA cao cấp, siêu nhẹ, cực kỳ dẻo dai, khả năng chịu lực cao và hoàn toàn không độc hại&nbsp;</li><li>Đảm bảo đi cực kỳ êm chân, cực bền với thiết kế bề mặt giúp đôi chân luôn thoáng mát, không tạo mùi hôi chân&nbsp;</li><li>Đế thiết kế ma sát, chống trơn trượt, chống nước cực tốt Mọi người đi mưa lội nước thoải mái mà không lo hỏng dép nhé ạ</li></ul></blockquote>', 1, 'dep-suc-ha-ma', 23, 4, 3, 2, 3, NULL, '2024-07-28 22:04:28', '2024-11-20 02:37:31'),
(10, 'Dép lông con sóc siêu cute', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637364/Cara/Products/ms7fbjcpqfyykpnkbzce.jpg', 230000.00, 51, NULL, 28, 'dep-long-con-soc', 26, 8, 4, 1, 1, NULL, '2024-07-28 22:06:19', '2024-08-04 03:35:47'),
(11, 'Dép thời trang nam chữ H', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637345/Cara/Products/mznngajzsysv8buwd1tw.jpg', 124000.00, 11, NULL, 3, 'dep-thoi-trang-nam', 1, 6, 1, 5, 3, NULL, '2024-07-28 22:07:54', '2024-11-20 03:14:50'),
(12, 'Giày Adifom Superstar', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637326/Cara/Products/iiznllyzylr8ynhvy9i0.jpg', 210000.00, 43, '<p><i>👉 Thông tin sản phẩm:&nbsp;</i></p><p><i>✔️ Chất lượng tốt nhất trong tầm giá&nbsp;</i></p><p><i>✔️ Form đẹp chuẩn : Màu sắc giống đến 98 °/ₒ ;&nbsp;</i></p><p><i>✔️ Chất liệu da + da lộn + vải mesh&nbsp;</i></p><p><i>✔️ Logo Mông in dập chìm.&nbsp;</i></p><p><i>✔️ Lưỡi gà cao dày dặn; swoosh sắc nét; Mông mũi làm đẹp&nbsp;</i></p><p><i>✔️ Tem QR CODE Có thể check mã 2D&nbsp;</i></p><p><i>✔️ Đế 2 lớp khâu chỉ đều&nbsp;</i></p><p><i>✔️ Full box + accessories&nbsp;</i></p><p><i>✔️ Mẫu này bạn mang đúng hoặc up 1 size đối với chân bè</i></p>', 5, 'giay-adiform', 21, 2, 1, 3, 2, NULL, '2024-07-28 22:09:29', '2024-08-04 03:11:27'),
(13, 'STYLE 93 SHOE', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637312/Cara/Products/eqg0pg0ssqkgrhwwlu9q.webp', 900000.00, 5, '<p>Style 93, otherwise known as the Vans Mary Jane, debuted around 1994 and flourished as a popular women’s silhouette that tapped into retro nostalgia and a playful interpretation of femininity.&nbsp;</p><p>With a simple buckle and strap, Vans Style 93 took a traditional women’s Mary Jane silhouette and uniquely matched it with a chunky lug rubber outsole,&nbsp;</p><p>making the iconic design more casual and truly Off The Wall. No wonder it’s still a cult favorite today.</p><p>&nbsp;</p><blockquote><ul><li>Mary Jane-style silhouette</li></ul><p>&nbsp;</p><ul><li>Sturdy canvas uppers</li></ul><p>&nbsp;</p><ul><li>Heart buckle closure</li></ul><p>&nbsp;</p><ul><li>Rubber toe caps</li></ul><p>&nbsp;</p><ul><li>Lug rubber outsoles</li></ul></blockquote>', 22, 'van', 21, 5, 3, 3, 1, NULL, '2024-07-28 22:15:52', '2024-08-08 21:13:42'),
(14, 'TOBI Regular Boxy Sweater', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637299/Cara/Products/grvnik1fqpruzongmmk3.jpg', 590000.00, 45, '<p><strong>Form Dáng:</strong>&nbsp;Boxy Fit.</p><p><strong>Chất liệu:</strong></p><ul><li>Định lượng: 430gsm&nbsp;</li><li>Thành phần: 100% Cotton - Chân cua</li></ul><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt.</li><li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li><li>Phần To bản lai áo và tay được may 3cm tạo cảm giác cứng cáp chắc chắn hơn</li><li>Logo TOBI Regular 2024 được in lụa nổi cao thành, chắn chắn.</li></ul></blockquote>', 0, 'tobi-regular-boxy-sweater', 7, 3, 3, 3, 3, NULL, '2024-07-29 18:52:19', '2024-11-09 20:28:19'),
(15, 'Quần jean nam rách gối', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637230/Cara/Products/mum0grnh1m0ndbcqr3cq.jpg', 141234.00, 21, '<p>✔️ Loại : quần jeans nam, quần rach gối nam,quần bò rách gối</p><p>✔️ Màu sắc: quần jean nam đen, quần jean nam xanh, quần jean nam xám, quần jean nam trắng ( màu theo mã trên hình )</p><p>✔️ Thích hợp : quần jean nam ống suông gối thích hợp cho Đi Chơi, Công Sở, Đời Thường</p><p>✔️Chất liệu : quần rin nam được làm từ chất jeans</p><p>✔️kiểu dáng: skinny jean nam, quần jean nam slimfit,quần jean nam ống đứng</p>', 125, 'quan-jean-nam-rach-goi', 11, 6, 1, 4, 1, NULL, '2024-07-29 20:34:20', '2024-08-06 03:51:47'),
(17, 'Sandal Nữ', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637209/Cara/Products/ibueiu32mw9pwckonpba.jpg', 69999.00, 8, '<p>✔️𝐌𝐎̂ 𝐓𝐀̉ 𝐒𝐀̉𝐍 𝐏𝐇𝐀̂̉𝐌&nbsp;</p><p>- Chất liệu: da mềm&nbsp;</p><p>- Màu sắc: đen&nbsp;</p><p>-kiểu dáng thời trang&nbsp;</p><p>- phù hợp với mọi lứa tuổi&nbsp;</p><p>- Kích thước: 35,36,37,38,39</p>', 6, 'sandal-nu', 22, 2, 3, 2, 2, NULL, '2024-07-29 20:42:14', '2024-07-24 17:10:19'),
(20, 'PAULWEEKEND Áo Sơ Mi Dài Tay Form Rộng Phong Cách retro Nhật Bản Cho Nam', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637126/Cara/Products/c5gd2n5z5nrea9wjm8f5.jpg', 158000.00, 32, NULL, 0, NULL, 7, 8, 4, 3, 3, NULL, '2024-11-09 20:25:26', '2024-11-10 09:51:34'),
(21, 'áo thể thao', 'https://res.cloudinary.com/denxdub1l/image/upload/v1722853863/Cara/Products/f0guuvvtcr6n7eftyjm2.jpg', 300000.00, 2, NULL, 13, 'ao-the-thao', 1, 1, 1, 1, 1, NULL, '2024-08-05 03:30:51', '2024-08-08 21:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `image_variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_id` int UNSIGNED NOT NULL,
  `size_id` int UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `image_variant`, `color_id`, `size_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 20, NULL, 1, 1, 3, '300.00', '2024-08-07 21:25:22', '2024-08-07 21:25:22'),
(2, 20, NULL, 3, 4, 4, '300.00', '2024-08-07 21:26:50', '2024-08-07 21:26:50'),
(5, 21, 'images/product_variants/VmcuL0E5VpK8CVCsvC4e0ARwP99OxlyqwLkqclza.jpg', 4, 2, 3, '150.00', '2024-08-07 21:33:14', '2024-08-08 03:17:12'),
(6, 21, 'images/product_variants/YIKS94x5PNlGN4OKHkokTXcQAWjbPlH0mzzhkZ6w.jpg', 3, 3, 4, '500.00', '2024-08-07 21:46:57', '2024-08-08 04:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `rating` double(8,2) DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'S', '', NULL, '2024-07-26 13:38:45', '2024-07-26 13:38:45'),
(2, 'M', '', NULL, '2024-07-26 13:38:53', '2024-07-26 13:38:53'),
(3, 'L', '', NULL, '2024-07-26 13:39:01', '2024-07-26 13:39:01'),
(4, 'XL', '', NULL, '2024-07-26 13:39:08', '2024-07-26 13:39:08'),
(5, 'XXL', '', NULL, '2024-07-26 13:39:15', '2024-07-26 13:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `status_products`
--

CREATE TABLE `status_products` (
  `id` int UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_products`
--

INSERT INTO `status_products` (`id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sản phẩm nổi trội', 'Voluptate commodi sint quis quibusdam. Sunt tempora quo esse molestiae doloribus facere voluptas. Iusto totam ut eum quia. Sit deserunt commodi quia illum nihil nihil. Quasi aliquam aut id voluptatem voluptatum consectetur.', '2024-07-29 18:07:38', '2024-07-29 18:07:38'),
(2, 'Sản phẩm bán chạy nhất', 'Non consequatur repellat sit tempora modi et nostrum. Tempora modi reiciendis nisi at minus rerum. Ad natus quae explicabo tenetur et sint. Harum ab beatae eos ullam natus omnis.', '2024-07-29 18:07:38', '2024-07-29 18:07:38'),
(3, 'Sản phẩm được quan tâm nhất', 'Velit atque similique voluptatum perspiciatis magnam cupiditate et. Sunt id aperiam eligendi tempora. Occaecati exercitationem distinctio laboriosam recusandae impedit minus blanditiis. Ut accusantium vitae quo enim in mollitia.', '2024-07-29 18:07:38', '2024-07-29 18:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `description`, `parent_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Thời trang nam', 'thoi-trang', '', 1, NULL, '2024-07-26 14:19:49', '2024-07-26 19:11:40'),
(6, 'Áo Thun', 'ao-thun', '', 1, NULL, '2024-07-28 21:30:26', '2024-07-28 21:30:26'),
(7, 'Áo Sơ Mi', 'ao-so-mi', '', 1, NULL, '2024-07-28 21:31:32', '2024-07-28 21:31:32'),
(8, 'Áo Khoác', 'ao-khoac', '', 1, NULL, '2024-07-28 21:31:59', '2024-07-28 21:31:59'),
(9, 'Quần Đùi', 'quan-dui', '', 1, NULL, '2024-07-28 21:32:30', '2024-07-28 21:32:30'),
(10, 'Áo Polo', 'ao-polo', '', 1, NULL, '2024-07-28 21:32:55', '2024-07-28 21:32:55'),
(11, 'Quần Jean', 'quan-jean', '', 1, NULL, '2024-07-28 21:38:18', '2024-07-28 21:38:18'),
(12, 'Quần Dài', 'quan-dai', '', 1, NULL, '2024-07-28 21:38:31', '2024-07-28 21:38:31'),
(21, 'Giày Thể Thao', 'giay-the-thao', '', 2, NULL, '2024-07-28 22:00:18', '2024-07-28 22:01:04'),
(22, 'Xăng Đan', 'xang-dan', '', 2, NULL, '2024-07-28 22:01:35', '2024-07-28 22:01:35'),
(23, 'Dép Đi Trong Nhà', 'dep-di-trong-nha', '', 2, NULL, '2024-07-28 22:02:01', '2024-07-28 22:02:01'),
(24, 'Giày Tây', 'giay-tay', '', 2, NULL, '2024-07-28 22:02:17', '2024-07-28 22:02:17'),
(25, 'Bốt', 'bot', '', 2, NULL, '2024-07-28 22:02:33', '2024-07-28 22:02:33'),
(26, 'Dép', 'dep', '', 2, NULL, '2024-07-28 22:05:09', '2024-07-28 22:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `address`, `phone`, `role`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Quản trị viên', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'admin@gmail.com', NULL, '$2y$10$WTUHCBKX30LtFY0egvP98ue9Ae6rod4NJz9eAAlt0ErPimfoy21zu', NULL, NULL, 1, NULL, NULL, '2024-06-26 20:35:16', '2024-07-23 20:35:16', 1),
(2, 'buingocphi', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'phibnph29465@fpt.edu.vn', NULL, '$2y$10$JOtPaOdf04C4gy985Lw8hOD1pr02cDpSDywImGArglptRY8jAoX96', NULL, NULL, 0, NULL, NULL, '2024-06-28 01:56:52', '2024-07-29 00:23:16', 1),
(3, 'Bùi Fee', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699687947/Cara/Profile/kpvg3fzzm3evjydhhnkf.png', 'buingocphinn@gmail.com', NULL, '$2y$10$rQOdhXnOK/3tKOwKYn.3auDLOzdkafHHRNNwDDfWqeJlTeC0BRTT6', 'Kim Sơn - Ninh Bình', '0377674930', 0, NULL, NULL, '2024-06-03 02:08:02', '2024-07-10 17:50:11', 1),
(17, 'tran manh', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'manutd@gmail.com', NULL, '$2y$10$jwW4mLYi/7.L7ekzAGrS4eiQD87eJkOBJA/9QCLVArAjSxQV9JzbG', NULL, NULL, 1, NULL, NULL, '2024-07-28 20:54:41', '2024-07-28 20:55:08', 1),
(18, 'tran manh', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'manhtnph28511@fpt.edu.vn', NULL, '$2y$10$8.22KjCyJfiorzo/LLnsiOJcnLi14ZA4BReeIGuDQyHaZ9NU8/6C.', 'ha noi', NULL, 1, NULL, NULL, '2024-07-28 21:26:46', '2024-07-29 00:16:25', 1),
(19, 'tran manh', 'https://res.cloudinary.com/denxdub1l/image/upload/v1722249803/Cara/Profile/aovxgnserrpty9awcjzs.jpg', 'minh29122003@gmail.com', NULL, '$2y$10$Qpo/Kan2Tlh3EHd1kFdyceVOdhBnf26f8x65DmEwxN6I9UuDpKtDm', 'ha noi', '0987654321', 0, NULL, NULL, '2024-07-29 01:45:09', '2024-07-29 03:43:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `discount_type` enum('percentage','fixed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  `starts_at` date NOT NULL,
  `expires_at` date NOT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `discount`, `discount_type`, `starts_at`, `expires_at`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'mm23', '30.00', 'fixed', '2024-08-15', '2024-08-16', 1, '2024-08-15 03:10:32', '2024-08-15 04:01:06'),
(2, 'mo01', '10.00', 'percentage', '2024-08-16', '2024-08-17', NULL, '2024-08-15 03:34:22', '2024-08-15 03:34:22'),
(4, 'sp', '400.00', 'fixed', '2024-08-17', '2024-08-23', NULL, '2024-08-15 03:53:42', '2024-08-15 03:53:42'),
(5, 'santo', '555.00', 'fixed', '2024-08-16', '2024-08-17', NULL, '2024-08-16 02:39:29', '2024-08-16 02:39:29'),
(6, 'm66686', '100.00', 'fixed', '2024-08-16', '2024-08-17', 21, '2024-08-16 03:03:03', '2024-08-16 03:03:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_order_id_foreign` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_updates`
--
ALTER TABLE `order_updates`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`),
  ADD KEY `product_variants_color_id_foreign` (`color_id`),
  ADD KEY `product_variants_size_id_foreign` (`size_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_products`
--
ALTER TABLE `status_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_code_unique` (`code`),
  ADD KEY `vouchers_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `order_updates`
--
ALTER TABLE `order_updates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_products`
--
ALTER TABLE `status_products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_variants_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
