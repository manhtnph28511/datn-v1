-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2024 at 11:53 AM
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
-- Database: `cara-shop`
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
(2, 'Gucci', 'Gucci', 'Gucci là thương hiệu thời trang đình đám của Ý. Nhãn hàng được sáng lập vào năm 1921 bởi Guccio Gucci tại Florence – thành phố thời trang của nước Ý. Với kiến thức và kinh nghiệm cá nhân trau dồi được khi làm việc tại London, Guccio Gucci đúc kết và đưa ra tầm nhìn dài hạn với thời trang quý tốc tại Pháp và Anh.', NULL, '2023-07-26 20:36:49', '2023-07-26 20:36:49'),
(3, 'Louis Vuitton', 'Louis Vuitton', 'Năm 1885, LV mở cửa hàng đầu tiên tại đường Oxford, London của Anh. Ngay sau đó, trước những thiết kế giả mạo hàng loạt diễn ra, mô hình Damier Canvas được Louis thành lập, với khẩu hiệu \"thương hiệu L. Vuitton\" 1892: Louis Vuitton qua đời, quyền lãnh đạo công ty được chuyển cho con trai ông -Georges Vuitton.', NULL, '2023-07-29 04:25:46', '2023-07-29 04:25:46'),
(4, 'Hermès', 'Hermès', 'Hermès là một công ty thời trang xa xỉ có trụ sở ở Paris, Pháp. Công ty được sáng lập bởi Thierry Hermès vào năm 1837, ngày nay chuyên sản xuất hàng da, phụ kiện thời trang, nước hoa, hàng xa xỉ, và quần áo may sẵn. Logo của công ty từ những năm 1950, là một chiếc xe ngựa.', NULL, '2024-07-29 04:26:16', '2024-07-29 04:26:16'),
(5, 'Chanel', 'Chanel', 'Được thành lập từ những năm 1909-1910 do Gabrielle \"Coco\" Chanel sáng lập, cái tên Chanel được biết đến như một nhãn hiệu thời trang cao cấp đáng tự hào nhất của ngành công nghiệp thời trang nước Pháp. Hơn bất kì nhãn hiệu nào, Chanel mang trọn vẹn nhiều tinh hoa của ngành thời trang cổ điển thời đại trước.', NULL, '2024-07-29 04:27:00', '2024-07-29 04:27:00'),
(6, 'Burberry', 'Burberry', 'Burberry là một thương hiệu thời trang cao cấp với phong cách quý tộc Anh được sáng lập vào năm 1856 bởi Thomas Burberry khi ông chỉ mới 21 tuổi, nhãn hiệu được thành lập trên sứ mệnh rằng quần áo phải được thiết kế để bảo vệ cơ thể con người trước thời tiết lạnh giá của nước Anh.', NULL, '2024-07-29 04:27:27', '2024-07-29 04:27:27'),
(7, 'Fendi', 'fendi', 'Thương hiệu Fendi được Adele và Edoardo Fendi thành lập vào năm 1925, từ một cửa hàng thời trang đồ lông tại khu Via del Plebiscito, thành phố Roma. Tới năm 1946, thế hệ thứ hai nhà Fendi lên nắm quyền điều hành công ty, với năm chị em Paola, Anna, Franca, Carla và Alda Fendi. Cổ phần mỗi người là 20%.', NULL, '2023-07-29 04:27:51', '2023-11-10 03:54:32'),
(8, 'Dior', 'Dior', 'Công ty Dior được thành lập vào ngày 16 tháng 12 năm 1946 tại nhà riêng của Christian Dior tại số 30 Avenue Montaigne Paris B. Tuy nhiên hiện nay, Dior lấy năm 1947 là năm thành lập. Dior lúc đó được hỗ trợ tài chính bởi doanh nhân Marcel Boussac.. Vốn ban đầu của công ty là 6 triệu Franc với 80 nhân công.', NULL, '2024-06-30 08:07:38', '2024-07-26 09:31:13');

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
  `total_price` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `pro_id`, `user_id`, `size_id`, `color_id`, `price`, `quantity`, `total_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 3000.00, 1, 3000, NULL, '2024-07-25 00:10:24', '2024-07-25 00:10:24'),
(4, 10, 6, 1, 1, 230000.00, 1, 230000, NULL, '2024-07-25 00:14:54', '2024-07-25 00:14:54'),
(13, 17, 6, 1, 1, 69999.00, 1, 69999, NULL, '2024-07-25 00:10:24', '2024-07-25 00:10:24'),
(14, 10, 6, 1, 1, 230000.00, 1, 230000, NULL, '2024-07-25 00:14:54', '2024-07-25 00:14:54');

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
(1, 'Thời trang', 'thoi-trang', '', NULL, '2023-07-26 20:37:08', '2023-07-26 20:37:08'),
(2, 'Giày Dép', 'giay-dep', '', NULL, '2023-07-26 20:37:17', '2023-07-29 04:57:13'),
(5, 'tên danh mục', 'ten-danh-muc', '', '2023-08-04 03:33:41', '2023-08-04 03:33:36', '2023-08-04 03:33:41');

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
(1, 'Đen', '#000000', '2023-07-26 20:37:45', '2023-07-26 20:37:45', NULL),
(2, 'Đỏ', '#f50000', '2023-07-26 20:37:57', '2023-07-26 20:37:57', NULL),
(3, 'Xám', '#e3dede', '2023-07-26 20:38:15', '2023-07-26 20:38:15', NULL),
(4, 'Be', '#eee1b5', '2023-07-26 20:38:37', '2023-07-26 20:38:37', NULL),
(5, 'Neon Pink', '#c25695', '2023-07-29 04:50:17', '2023-07-29 04:50:17', NULL);

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
(15, '2024_06_06_150323_add_status_product_to_product_table', 2),
(18, '2024_06_06_000001_create_personal_access_tokens_table', 3),
(19, '2024_06_06_095228_create_carts_table', 3),
(20, '2024_06_06_100000_create_password_reset_tokens_table', 3),
(21, '2024_06_06_102704_create_sub_categories_table', 3),
(22, '2024_06_06_115356_create_products_table', 3),
(23, '2024_06_06_120152_create_brands_table', 3),
(24, '2024_06_06_120214_create_categories_table', 3),
(25, '2024_06_06_120224_create_colors_table', 3),
(26, '2024_06_06_120231_create_sizes_table', 3),
(27, '2024_06_06_145350_create_status_products_table', 3),
(28, '2024_06_06_150107_create_ratings_table', 3),
(29, '2024_06_06_164649_create_orders_table', 3),
(30, '2024_06_06_164935_create_order_details_table', 3),
(33, '2024_07_26_161235_create_comments_table', 4),
(34, '2024_07_26_162124_add_status_to_products_table', 5),
(35, '2024_07_26_170006_create_vouchers_table', 6),
(36, '2024_07_26_170309_add_voucher_id_to_products_table', 6),
(37, '2024_07_28_161838_add_status_to_users_table', 7),
(38, '2024_07_29_183335_add_email_to_orders_table', 8);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `username`, `email`, `phone`, `address`, `note`, `created_at`, `updated_at`) VALUES
(1, 6, 'tran manh', 'tranmanh832003@gmail.com', '0987184285', 'tan phong bx vp', 'hoàn thành', '2024-07-24 20:37:56', '2024-07-29 11:02:21'),
(2, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-24 20:39:45', '2024-07-24 20:39:45'),
(3, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-24 20:56:04', '2024-07-24 20:56:04'),
(4, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-24 21:03:13', '2024-07-24 21:03:13'),
(5, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-24 21:07:26', '2024-07-24 21:07:26'),
(6, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-24 21:10:04', '2024-07-24 21:10:04'),
(7, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-24 21:12:49', '2024-07-24 21:12:49'),
(8, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-24 21:16:21', '2024-07-24 21:16:21'),
(9, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-24 21:20:32', '2024-07-24 21:20:32'),
(10, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-24 23:53:16', '2024-07-24 23:53:16'),
(11, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-24 23:56:12', '2024-07-24 23:56:12'),
(12, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-24 23:58:57', '2024-07-24 23:58:57'),
(13, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-25 00:02:52', '2024-07-25 00:02:52'),
(14, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-25 00:10:30', '2024-07-25 00:10:30'),
(15, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-25 00:15:03', '2024-07-25 00:15:03'),
(16, 6, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-25 00:15:26', '2024-07-25 00:15:26'),
(17, 13, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-28 01:13:14', '2024-07-28 01:13:14'),
(18, 13, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-28 01:14:17', '2024-07-28 01:14:17'),
(19, 13, 'tran manh', NULL, '0987184285', 'tan phong bx vp', '', '2024-07-28 01:15:55', '2024-07-28 01:15:55');

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
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `pro_id`, `size_id`, `color_id`, `price`, `quantity`, `total_price`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '3000.00', 1, '3000.00', 'đã hủy', NULL, '2024-07-29 10:53:54'),
(2, 1, 1, 1, 1, '3000.00', 1, '3000.00', 'hoàn thành', NULL, '2024-07-29 11:02:21');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `voucher_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `quantity`, `description`, `view`, `slug`, `cate_id`, `brand_id`, `color_id`, `size_id`, `status_id`, `deleted_at`, `created_at`, `updated_at`, `voucher_id`) VALUES
(1, 'Cartoon Astronaut T-Shirts', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637576/Cara/Products/jxmoqrh37yknvwnufeou.jpg', 141234.00, 10, '<p><strong>Form Dáng</strong>: Regular Fit.</p><p><strong>Chất liệu:</strong></p><blockquote><ul><li>Định lượng: 330gsm (Dày dặn, xốp, phồng đứng form)</li><li>Thành phần: 35% Cotton - 65% Polyester</li></ul></blockquote><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Thoáng khí và thấm hút cao: Bề mặt vải được dệt mắt lô kim to giúp thoáng khi tuyệt đối cao.</li><li>Vải có 2 bề mặt khác nhau<ul><li>Bề mặt ngoài: Sợi cotton được dệt waffle tạo độ xốp, phồng đứng form áo.</li><li>Bề mặt bên trong: Sợi polyester dệt mịn, trơn vải dạm da mượt, mát, thoáng khí, chống nhăn sau khi giặt.</li></ul></li><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt cùng với chi tiết sọc.</li><li>Dáng regular fit thoải mái.</li><li>Logo TOBI Regular 2024 được in nhung nổi cao thành, chắn chắn.</li></ul></blockquote>', 24, 'cartoon-astronaut-t-shirts', 1, 1, 5, 1, 1, NULL, '2024-07-28 03:34:56', '2024-11-20 09:48:42', NULL),
(2, 'Cartoon Astronaut T-Shirts', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637548/Cara/Products/olkj6gj7e7kflny40axq.jpg', 141234.00, 23, '<p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Thoáng khí và thấm hút cao: Bề mặt vải được dệt mắt lô kim to giúp thoáng khi tuyệt đối cao.</li><li>Vải có 2 bề mặt khác nhau<ul><li>Bề mặt ngoài: Sợi cotton được dệt waffle tạo độ xốp, phồng đứng form áo.</li><li>Bề mặt bên trong: Sợi polyester dệt mịn, trơn vải dạm da mượt, mát, thoáng khí, chống nhăn sau khi giặt.</li></ul></li><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt cùng với chi tiết sọc.</li><li>Dáng regular fit thoải mái.</li><li>Logo TOBI Regular 2024 được in nhung nổi cao thành, chắn chắn.</li></ul></blockquote>', 64, 'cartoon-astronaut-t-shirts', 1, 1, 5, 3, 1, NULL, '2024-07-28 03:52:33', '2024-07-24 20:17:31', NULL),
(3, 'TOBI Regular Raincoat', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637530/Cara/Products/qxxwuol3emz4fahronqf.jpg', 480000.00, 17, '<p><strong>Form Dáng</strong>: Oversize</p><p><strong>Chất liệu</strong>: Dù trượt nước - 100 % Polyester</p><p><strong>Chi tiết sản phẩm</strong>:</p><blockquote><ul><li>Hình in đa dạng</li><li>Phần lai áo được may xẻ tà và có nút bấm.</li></ul></blockquote><p>&nbsp;</p>', 49, 'tobi-ragular-raincoat', 1, 2, 4, 2, 1, NULL, '2024-07-29 04:22:53', '2024-07-24 21:09:48', NULL),
(4, 'Waffle Stripped Polo - Grude', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637506/Cara/Products/mds4i02ts76eg5stpirj.jpg', 430000.00, 10, '<p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Thoáng khí và thấm hút cao: Bề mặt vải được dệt mắt lô kim to giúp thoáng khi tuyệt đối cao.</li><li>Vải có 2 bề mặt khác nhau<ul><li>Bề mặt ngoài: Sợi cotton được dệt waffle tạo độ xốp, phồng đứng form áo.</li><li>Bề mặt bên trong: Sợi polyester dệt mịn, trơn vải dạm da mượt, mát, thoáng khí, chống nhăn sau khi giặt.</li></ul></li><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt cùng với chi tiết sọc.</li><li>Dáng regular fit thoải mái.</li><li>Logo TOBI Regular 2024 được in nhung nổi cao thành, chắn chắn.</li></ul></blockquote>', 31, 'waffle-stripped-polo-grude', 1, 2, 3, 4, 2, NULL, '2024-07-29 04:24:38', '2024-07-24 04:41:26', NULL),
(5, 'Regular Typo Cuban Shirt', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637486/Cara/Products/zshiefnor5oyupnn7lhl.jpg', 450000.00, 32, '<p><strong>Form Dáng:</strong>&nbsp;Boxy Fit.</p><ul><li>Chất liệu: 70% Cotton 30% Nylon</li><li>Định lượng: 161GSM</li></ul><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Form dáng Boxy chia tỉ lệ cơ thể 1/3 giúp tôn dáng người mặc</li><li>In vân đá</li></ul></blockquote>', 2, 'tegular-typo-cuban-shirt', 7, 7, 3, 4, 2, NULL, '2024-07-29 04:44:37', '2024-07-24 04:33:30', NULL),
(6, 'Highclass Cuban Shirt', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699682825/Cara/Products/rbjjn6krrfs0dxs8z1ph.jpg', 530000.00, 22, '<p><strong>Form dáng:</strong> Boxy Fit.</p><p><strong>Chất liệu:</strong> Lụa D100</p><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Form dáng Boxy chia tỉ lệ cơ thể 1/3 giúp tôn dáng người mặc&nbsp;</li><li>Áo được in overprinted toàn bộ áo</li><li>Hoạ tiết trên áo mang hơi hướng summer vibe&nbsp;</li></ul></blockquote>', 14, 'highclass-cuban-shirt', 10, 4, 1, 5, 1, NULL, '2024-07-29 04:46:46', '2024-07-24 23:55:58', NULL),
(7, 'TOBI Basic Boxy T-shirt', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637465/Cara/Products/rg4oynlowmtrxs9wyr5x.jpg', 299999.00, 22, '<p><strong>Form Dáng</strong>: Boxy Fit.</p><p><strong>Chất liệu:</strong></p><blockquote><ul><li>Định lượng: 250GSM</li><li>Thành phần: 100% Cotton - 2 Chiều.</li></ul></blockquote><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Bo cổ dệt định lượng dày, chắc chắn, hạn chế nhão &amp; co rút sau khi giặt.</li><li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li><li>Logo&nbsp;<strong>TOBI®</strong>&nbsp;màu kem in nổi cao thành, chắc chắn.</li></ul></blockquote>', 0, 'tobi-basic-boxy-t-shirt', 7, 5, 3, 5, 3, NULL, '2024-07-29 04:48:47', '2024-11-10 03:31:05', NULL),
(8, 'TOBI SauRieng T-shirt', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637417/Cara/Products/tftdjcgnjr8sspsy9bsm.jpg', 320000.00, 20, '<p><strong>Form Dáng:</strong> Boxy Fit.</p><p><strong>Chất liệu:</strong></p><blockquote><ul><li>Định lượng: 250gsm&nbsp;</li><li>Thành phần: 100% Cotton - 2 Chiều.</li></ul></blockquote><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt.</li><li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li><li>Hình in Trame.</li></ul></blockquote>', 4, 'tobi-saurieng-t-shirt', 8, 8, 5, 3, 1, NULL, '2024-07-29 04:51:45', '2024-07-24 20:55:43', NULL),
(9, 'Dép Sục Hà Mã Mắt To Dễ Thương Hot Trend', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637384/Cara/Products/mxiqa7j1m3id6azkg7md.jpg', 150000.00, 8, '<blockquote><ul><li>Dép làm từ nhựa EVA cao cấp, siêu nhẹ, cực kỳ dẻo dai, khả năng chịu lực cao và hoàn toàn không độc hại&nbsp;</li><li>Đảm bảo đi cực kỳ êm chân, cực bền với thiết kế bề mặt giúp đôi chân luôn thoáng mát, không tạo mùi hôi chân&nbsp;</li><li>Đế thiết kế ma sát, chống trơn trượt, chống nước cực tốt Mọi người đi mưa lội nước thoải mái mà không lo hỏng dép nhé ạ</li></ul></blockquote>', 1, 'dep-suc-ha-ma', 23, 4, 3, 2, 3, NULL, '2024-07-29 05:04:28', '2024-11-20 09:37:31', NULL),
(10, 'Dép lông con sóc siêu cute', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637364/Cara/Products/ms7fbjcpqfyykpnkbzce.jpg', 230000.00, 51, NULL, 25, 'dep-long-con-soc', 26, 8, 4, 1, 1, NULL, '2024-07-29 05:06:19', '2024-07-28 01:15:41', NULL),
(11, 'Dép thời trang nam chữ H', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637345/Cara/Products/mznngajzsysv8buwd1tw.jpg', 124000.00, 11, NULL, 3, 'dep-thoi-trang-nam', 1, 6, 1, 5, 3, NULL, '2024-07-29 05:07:54', '2024-11-20 10:14:50', NULL),
(12, 'Giày Adifom Superstar', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637326/Cara/Products/iiznllyzylr8ynhvy9i0.jpg', 210000.00, 43, '<p><i>👉 Thông tin sản phẩm:&nbsp;</i></p><p><i>✔️ Chất lượng tốt nhất trong tầm giá&nbsp;</i></p><p><i>✔️ Form đẹp chuẩn : Màu sắc giống đến 98 °/ₒ ;&nbsp;</i></p><p><i>✔️ Chất liệu da + da lộn + vải mesh&nbsp;</i></p><p><i>✔️ Logo Mông in dập chìm.&nbsp;</i></p><p><i>✔️ Lưỡi gà cao dày dặn; swoosh sắc nét; Mông mũi làm đẹp&nbsp;</i></p><p><i>✔️ Tem QR CODE Có thể check mã 2D&nbsp;</i></p><p><i>✔️ Đế 2 lớp khâu chỉ đều&nbsp;</i></p><p><i>✔️ Full box + accessories&nbsp;</i></p><p><i>✔️ Mẫu này bạn mang đúng hoặc up 1 size đối với chân bè</i></p>', 4, 'giay-adiform', 21, 2, 1, 3, 2, NULL, '2024-07-29 05:09:29', '2024-07-25 00:02:41', NULL),
(13, 'STYLE 93 SHOE', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637312/Cara/Products/eqg0pg0ssqkgrhwwlu9q.webp', 900000.00, 9, '<p>Style 93, otherwise known as the Vans Mary Jane, debuted around 1994 and flourished as a popular women’s silhouette that tapped into retro nostalgia and a playful interpretation of femininity.&nbsp;</p><p>With a simple buckle and strap, Vans Style 93 took a traditional women’s Mary Jane silhouette and uniquely matched it with a chunky lug rubber outsole,&nbsp;</p><p>making the iconic design more casual and truly Off The Wall. No wonder it’s still a cult favorite today.</p><p>&nbsp;</p><blockquote><ul><li>Mary Jane-style silhouette</li></ul><p>&nbsp;</p><ul><li>Sturdy canvas uppers</li></ul><p>&nbsp;</p><ul><li>Heart buckle closure</li></ul><p>&nbsp;</p><ul><li>Rubber toe caps</li></ul><p>&nbsp;</p><ul><li>Lug rubber outsoles</li></ul></blockquote>', 14, 'van', 21, 5, 3, 3, 1, NULL, '2024-07-29 05:15:52', '2024-07-28 01:14:00', NULL),
(14, 'TOBI Regular Boxy Sweater', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637299/Cara/Products/grvnik1fqpruzongmmk3.jpg', 590000.00, 45, '<p><strong>Form Dáng:</strong>&nbsp;Boxy Fit.</p><p><strong>Chất liệu:</strong></p><ul><li>Định lượng: 430gsm&nbsp;</li><li>Thành phần: 100% Cotton - Chân cua</li></ul><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt.</li><li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li><li>Phần To bản lai áo và tay được may 3cm tạo cảm giác cứng cáp chắc chắn hơn</li><li>Logo TOBI Regular 2024 được in lụa nổi cao thành, chắn chắn.</li></ul></blockquote>', 0, 'tobi-regular-boxy-sweater', 7, 3, 3, 3, 3, NULL, '2024-07-30 01:52:19', '2024-11-10 03:28:19', NULL),
(15, 'Quần jean nam rách gối', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637230/Cara/Products/mum0grnh1m0ndbcqr3cq.jpg', 141234.00, 21, '<p>✔️ Loại : quần jeans nam, quần rach gối nam,quần bò rách gối</p><p>✔️ Màu sắc: quần jean nam đen, quần jean nam xanh, quần jean nam xám, quần jean nam trắng ( màu theo mã trên hình )</p><p>✔️ Thích hợp : quần jean nam ống suông gối thích hợp cho Đi Chơi, Công Sở, Đời Thường</p><p>✔️Chất liệu : quần rin nam được làm từ chất jeans</p><p>✔️kiểu dáng: skinny jean nam, quần jean nam slimfit,quần jean nam ống đứng</p>', 120, 'quan-jean-nam-rach-goi', 11, 6, 1, 4, 1, NULL, '2024-07-30 03:34:20', '2024-07-24 21:16:09', NULL),
(17, 'Sandal Nữ', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637209/Cara/Products/ibueiu32mw9pwckonpba.jpg', 69999.00, 8, '<p>✔️𝐌𝐎̂ 𝐓𝐀̉ 𝐒𝐀̉𝐍 𝐏𝐇𝐀̂̉𝐌&nbsp;</p><p>- Chất liệu: da mềm&nbsp;</p><p>- Màu sắc: đen&nbsp;</p><p>-kiểu dáng thời trang&nbsp;</p><p>- phù hợp với mọi lứa tuổi&nbsp;</p><p>- Kích thước: 35,36,37,38,39</p>', 6, 'sandal-nu', 22, 2, 3, 2, 2, NULL, '2024-07-30 03:42:14', '2024-07-25 00:10:19', NULL),
(20, 'PAULWEEKEND Áo Sơ Mi Dài Tay Form Rộng Phong Cách retro Nhật Bản Cho Nam', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637126/Cara/Products/c5gd2n5z5nrea9wjm8f5.jpg', 158000.00, 32, NULL, 0, NULL, 7, 8, 4, 3, 3, NULL, '2024-11-10 03:25:26', '2024-11-10 16:51:34', NULL);

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
(1, 'S', '', NULL, '2024-07-26 20:38:45', '2024-07-26 20:38:45'),
(2, 'M', '', NULL, '2024-07-26 20:38:53', '2024-07-26 20:38:53'),
(3, 'L', '', NULL, '2024-07-26 20:39:01', '2024-07-26 20:39:01'),
(4, 'XL', '', NULL, '2024-07-26 20:39:08', '2024-07-26 20:39:08'),
(5, 'XXL', '', NULL, '2024-07-26 20:39:15', '2024-07-26 20:39:24');

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
(1, 'Sản phẩm nổi trội', 'Voluptate commodi sint quis quibusdam. Sunt tempora quo esse molestiae doloribus facere voluptas. Iusto totam ut eum quia. Sit deserunt commodi quia illum nihil nihil. Quasi aliquam aut id voluptatem voluptatum consectetur.', '2024-07-30 01:07:38', '2024-07-30 01:07:38'),
(2, 'Sản phẩm bán chạy nhất', 'Non consequatur repellat sit tempora modi et nostrum. Tempora modi reiciendis nisi at minus rerum. Ad natus quae explicabo tenetur et sint. Harum ab beatae eos ullam natus omnis.', '2024-07-30 01:07:38', '2024-07-30 01:07:38'),
(3, 'Sản phẩm được quan tâm nhất', 'Velit atque similique voluptatum perspiciatis magnam cupiditate et. Sunt id aperiam eligendi tempora. Occaecati exercitationem distinctio laboriosam recusandae impedit minus blanditiis. Ut accusantium vitae quo enim in mollitia.', '2024-07-30 01:07:38', '2024-07-30 01:07:38');

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
(1, 'Thời trang nam', 'thoi-trang', '', 1, NULL, '2024-07-26 21:19:49', '2024-07-27 02:11:40'),
(6, 'Áo Thun', 'ao-thun', '', 1, NULL, '2024-07-29 04:30:26', '2024-07-29 04:30:26'),
(7, 'Áo Sơ Mi', 'ao-so-mi', '', 1, NULL, '2024-07-29 04:31:32', '2024-07-29 04:31:32'),
(8, 'Áo Khoác', 'ao-khoac', '', 1, NULL, '2024-07-29 04:31:59', '2024-07-29 04:31:59'),
(9, 'Quần Đùi', 'quan-dui', '', 1, NULL, '2024-07-29 04:32:30', '2024-07-29 04:32:30'),
(10, 'Áo Polo', 'ao-polo', '', 1, NULL, '2024-07-29 04:32:55', '2024-07-29 04:32:55'),
(11, 'Quần Jean', 'quan-jean', '', 1, NULL, '2024-07-29 04:38:18', '2024-07-29 04:38:18'),
(12, 'Quần Dài', 'quan-dai', '', 1, NULL, '2024-07-29 04:38:31', '2024-07-29 04:38:31'),
(21, 'Giày Thể Thao', 'giay-the-thao', '', 2, NULL, '2024-07-29 05:00:18', '2024-07-29 05:01:04'),
(22, 'Xăng Đan', 'xang-dan', '', 2, NULL, '2024-07-29 05:01:35', '2024-07-29 05:01:35'),
(23, 'Dép Đi Trong Nhà', 'dep-di-trong-nha', '', 2, NULL, '2024-07-29 05:02:01', '2024-07-29 05:02:01'),
(24, 'Giày Tây', 'giay-tay', '', 2, NULL, '2024-07-29 05:02:17', '2024-07-29 05:02:17'),
(25, 'Bốt', 'bot', '', 2, NULL, '2024-07-29 05:02:33', '2024-07-29 05:02:33'),
(26, 'Dép', 'dep', '', 2, NULL, '2024-07-29 05:05:09', '2024-07-29 05:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `address`, `phone`, `role`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Quản trị viên', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'admin@gmail.com', NULL, '$2y$10$WTUHCBKX30LtFY0egvP98ue9Ae6rod4NJz9eAAlt0ErPimfoy21zu', NULL, NULL, 1, NULL, NULL, '2024-06-27 03:35:16', '2024-07-24 03:35:16', 1),
(2, 'buingocphi', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'phibnph29465@fpt.edu.vn', NULL, '$2y$10$JOtPaOdf04C4gy985Lw8hOD1pr02cDpSDywImGArglptRY8jAoX96', NULL, NULL, 0, NULL, NULL, '2024-06-28 08:56:52', '2024-07-29 07:23:16', 1),
(3, 'Bùi Fee', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699687947/Cara/Profile/kpvg3fzzm3evjydhhnkf.png', 'buingocphinn@gmail.com', NULL, '$2y$10$rQOdhXnOK/3tKOwKYn.3auDLOzdkafHHRNNwDDfWqeJlTeC0BRTT6', 'Kim Sơn - Ninh Bình', '0377674930', 0, NULL, NULL, '2024-06-03 09:08:02', '2024-07-11 00:50:11', 1),
(17, 'tran manh', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'manutd@gmail.com', NULL, '$2y$10$jwW4mLYi/7.L7ekzAGrS4eiQD87eJkOBJA/9QCLVArAjSxQV9JzbG', NULL, NULL, 1, NULL, NULL, '2024-07-29 03:54:41', '2024-07-29 03:55:08', 1),
(18, 'tran manh', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'manhtnph28511@fpt.edu.vn', NULL, '$2y$10$8.22KjCyJfiorzo/LLnsiOJcnLi14ZA4BReeIGuDQyHaZ9NU8/6C.', 'ha noi', NULL, 1, NULL, NULL, '2024-07-29 04:26:46', '2024-07-29 07:16:25', 1),
(19, 'tran manh', 'https://res.cloudinary.com/denxdub1l/image/upload/v1722249803/Cara/Profile/aovxgnserrpty9awcjzs.jpg', 'minh29122003@gmail.com', NULL, '$2y$10$Qpo/Kan2Tlh3EHd1kFdyceVOdhBnf26f8x65DmEwxN6I9UuDpKtDm', 'ha noi', '0987654321', 0, NULL, NULL, '2024-07-29 08:45:09', '2024-07-29 10:43:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_voucher_id_foreign` (`voucher_id`);

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
  ADD UNIQUE KEY `vouchers_code_unique` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
