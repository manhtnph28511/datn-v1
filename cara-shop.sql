-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 21, 2024 lúc 06:01 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cara-shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Prada', '', 'Prada là một nhãn hiệu thời trang của Ý chuyên về các sản phẩm cao cấp cho nam và nữ (giày dép, túi xách, phụ kiện thời trang...), nhãn hiệu Prada được thành lập bởi Mario Prada năm 1913. Prada được xem là một trong những nhà thiết kế có ảnh hưởng nhất trong ngành công nghiệp thời trang.', NULL, '2023-07-27 03:36:12', '2023-08-04 10:31:30'),
(2, 'Gucci', NULL, 'Gucci là thương hiệu thời trang đình đám của Ý. Nhãn hàng được sáng lập vào năm 1921 bởi Guccio Gucci tại Florence – thành phố thời trang của nước Ý. Với kiến thức và kinh nghiệm cá nhân trau dồi được khi làm việc tại London, Guccio Gucci đúc kết và đưa ra tầm nhìn dài hạn với thời trang quý tốc tại Pháp và Anh.', NULL, '2023-07-27 03:36:49', '2023-07-27 03:36:49'),
(3, 'Louis Vuitton', NULL, 'Năm 1885, LV mở cửa hàng đầu tiên tại đường Oxford, London của Anh. Ngay sau đó, trước những thiết kế giả mạo hàng loạt diễn ra, mô hình Damier Canvas được Louis thành lập, với khẩu hiệu \"thương hiệu L. Vuitton\" 1892: Louis Vuitton qua đời, quyền lãnh đạo công ty được chuyển cho con trai ông -Georges Vuitton.', NULL, '2023-07-29 11:25:46', '2023-07-29 11:25:46'),
(4, 'Hermès', NULL, 'Hermès là một công ty thời trang xa xỉ có trụ sở ở Paris, Pháp. Công ty được sáng lập bởi Thierry Hermès vào năm 1837, ngày nay chuyên sản xuất hàng da, phụ kiện thời trang, nước hoa, hàng xa xỉ, và quần áo may sẵn. Logo của công ty từ những năm 1950, là một chiếc xe ngựa.', NULL, '2023-07-29 11:26:16', '2023-07-29 11:26:16'),
(5, 'Chanel', NULL, 'Được thành lập từ những năm 1909-1910 do Gabrielle \"Coco\" Chanel sáng lập, cái tên Chanel được biết đến như một nhãn hiệu thời trang cao cấp đáng tự hào nhất của ngành công nghiệp thời trang nước Pháp. Hơn bất kì nhãn hiệu nào, Chanel mang trọn vẹn nhiều tinh hoa của ngành thời trang cổ điển thời đại trước.', NULL, '2023-07-29 11:27:00', '2023-07-29 11:27:00'),
(6, 'Burberry', NULL, 'Burberry là một thương hiệu thời trang cao cấp với phong cách quý tộc Anh được sáng lập vào năm 1856 bởi Thomas Burberry khi ông chỉ mới 21 tuổi, nhãn hiệu được thành lập trên sứ mệnh rằng quần áo phải được thiết kế để bảo vệ cơ thể con người trước thời tiết lạnh giá của nước Anh.', NULL, '2023-07-29 11:27:27', '2023-07-29 11:27:27'),
(7, 'Fendi', 'fendi', 'Thương hiệu Fendi được Adele và Edoardo Fendi thành lập vào năm 1925, từ một cửa hàng thời trang đồ lông tại khu Via del Plebiscito, thành phố Roma. Tới năm 1946, thế hệ thứ hai nhà Fendi lên nắm quyền điều hành công ty, với năm chị em Paola, Anna, Franca, Carla và Alda Fendi. Cổ phần mỗi người là 20%.', NULL, '2023-07-29 11:27:51', '2023-11-10 10:54:32'),
(8, 'Dior', NULL, 'Công ty Dior được thành lập vào ngày 16 tháng 12 năm 1946 tại nhà riêng của Christian Dior tại số 30 Avenue Montaigne Paris B. Tuy nhiên hiện nay, Dior lấy năm 1947 là năm thành lập. Dior lúc đó được hỗ trợ tài chính bởi doanh nhân Marcel Boussac.. Vốn ban đầu của công ty là 6 triệu Franc với 80 nhân công.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `pro_id`, `user_id`, `size_id`, `price`, `quantity`, `total_price`, `deleted_at`, `created_at`, `updated_at`) VALUES
(38, 11, 3, 3, 124000.00, 1, 124000, NULL, '2023-11-20 17:14:53', '2023-11-20 17:14:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Thời trang', 'thoi-trang', '', NULL, '2023-07-27 03:37:08', '2023-07-27 03:37:08'),
(2, 'Giày Dép', 'giay-dep', '', NULL, '2023-07-27 03:37:17', '2023-07-29 11:57:13'),
(5, 'tên danh mục', 'ten-danh-muc', '', '2023-08-04 10:33:41', '2023-08-04 10:33:36', '2023-08-04 10:33:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Đen', '#000000', '2023-07-27 03:37:45', '2023-07-27 03:37:45', NULL),
(2, 'Đỏ', '#f50000', '2023-07-27 03:37:57', '2023-07-27 03:37:57', NULL),
(3, 'Xám', '#e3dede', '2023-07-27 03:38:15', '2023-07-27 03:38:15', NULL),
(4, 'Be', '#eee1b5', '2023-07-27 03:38:37', '2023-07-27 03:38:37', NULL),
(5, 'Neon Pink', '#c25695', '2023-07-29 11:50:17', '2023-07-29 11:50:17', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_22_115356_create_products_table', 1),
(6, '2023_07_22_120152_create_brands_table', 1),
(7, '2023_07_22_120214_create_categories_table', 1),
(8, '2023_07_22_120224_create_colors_table', 1),
(9, '2023_07_22_120231_create_sizes_table', 1),
(10, '2023_07_27_102704_create_sub_categories_table', 1),
(11, '2023_07_30_145350_create_status_products_table', 1),
(12, '2023_07_30_150323_add_status_product_to_product_table', 1),
(13, '2023_08_02_180851_create_carts_table', 1),
(14, '2023_08_07_164649_create_orders_table', 1),
(15, '2023_08_07_164935_create_order_details_table', 1),
(16, '2023_11_11_150107_create_ratings_table', 1),
(58, '2014_10_12_000000_create_users_table', 1),
(59, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(60, '2019_08_19_000000_create_failed_jobs_table', 1),
(61, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(62, '2023_07_22_115356_create_products_table', 1),
(63, '2023_07_22_120152_create_brands_table', 1),
(64, '2023_07_22_120214_create_categories_table', 1),
(65, '2023_07_22_120224_create_colors_table', 1),
(66, '2023_07_22_120231_create_sizes_table', 1),
(67, '2023_07_26_164856_create_roles_table', 1),
(68, '2023_07_27_102704_create_sub_categories_table', 2),
(69, '2023_07_30_145350_create_status_products_table', 3),
(70, '2023_07_30_150323_add_status_product_to_product_table', 3),
(72, '2023_08_02_180851_create_carts_table', 4),
(73, '2023_08_07_164649_create_orders_table', 5),
(74, '2023_08_07_164935_create_order_details_table', 5),
(75, '2023_11_11_150107_create_ratings_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `username`, `phone`, `address`, `note`, `created_at`, `updated_at`) VALUES
(25, 3, 'Bùi Ngọc Phi', '0376212240', 'Khối 11 , Kim Sơn', NULL, '2023-08-08 10:07:25', '2023-08-08 10:07:25'),
(26, 2, 'phibnph29465', '0377674930', 'Hà Nội', NULL, '2023-08-08 11:21:36', '2023-08-08 11:21:36'),
(27, 3, 'Bùi Ngọc Phi', '0377674930', 'Kim Sơn - Ninh Bình', NULL, '2023-08-09 07:37:39', '2023-08-09 07:37:39'),
(28, 3, 'Bùi Fee', '0377674930', 'Kim Sơn - Ninh Bình', NULL, '2023-11-10 09:24:27', '2023-11-10 09:24:27'),
(29, 3, 'Bùi Fee', '0377674930', 'Kim Sơn - Ninh Bình', NULL, '2023-11-20 16:46:47', '2023-11-20 16:46:47'),
(30, 3, 'Bùi Fee', '0377674930', 'Kim Sơn - Ninh Bình', NULL, '2023-11-20 16:47:22', '2023-11-20 16:47:22'),
(31, 3, 'Bùi Fee', '0377674930', 'Kim Sơn - Ninh Bình', NULL, '2023-11-20 16:48:54', '2023-11-20 16:48:54'),
(32, 3, 'Bùi Fee', '0377674930', 'Kim Sơn - Ninh Bình', NULL, '2023-11-20 17:06:43', '2023-11-20 17:06:43'),
(33, 3, 'Bùi Fee', '0377674930', 'Kim Sơn - Ninh Bình', NULL, '2023-11-20 17:08:07', '2023-11-20 17:08:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `pro_id`, `quantity`, `price`, `total_price`, `created_at`, `updated_at`) VALUES
(19, 25, 1, 1, 141234.00, 141234.00, '2023-08-08 10:07:25', '2023-08-08 10:07:25'),
(20, 25, 3, 2, 480000.00, 960000.00, '2023-08-08 10:07:25', '2023-08-08 10:07:25'),
(21, 26, 17, 1, 69999.00, 69999.00, '2023-08-08 11:21:36', '2023-08-08 11:21:36'),
(22, 26, 13, 2, 900000.00, 999999.99, '2023-08-08 11:21:36', '2023-08-08 11:21:36'),
(23, 27, 15, 2, 141234.00, 282468.00, '2023-08-09 07:37:39', '2023-08-09 07:37:39'),
(24, 28, 3, 1, 480000.00, 480000.00, '2023-11-10 09:24:27', '2023-11-10 09:24:27'),
(25, 29, 9, 1, 150000.00, 150000.00, '2023-11-20 16:46:47', '2023-11-20 16:46:47'),
(26, 31, 1, 1, 141234.00, 141234.00, '2023-11-20 16:48:54', '2023-11-20 16:48:54'),
(27, 32, 3, 1, 480000.00, 480000.00, '2023-11-20 17:06:43', '2023-11-20 17:06:43'),
(28, 33, 6, 1, 530000.00, 530000.00, '2023-11-20 17:08:07', '2023-11-20 17:08:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) DEFAULT NULL,
  `cate_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `quantity`, `description`, `view`, `slug`, `cate_id`, `brand_id`, `color_id`, `size_id`, `status_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Cartoon Astronaut T-Shirts', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637576/Cara/Products/jxmoqrh37yknvwnufeou.jpg', 141234.00, 10, '<p><strong>Form Dáng</strong>: Regular Fit.</p><p><strong>Chất liệu:</strong></p><blockquote><ul><li>Định lượng: 330gsm (Dày dặn, xốp, phồng đứng form)</li><li>Thành phần: 35% Cotton - 65% Polyester</li></ul></blockquote><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Thoáng khí và thấm hút cao: Bề mặt vải được dệt mắt lô kim to giúp thoáng khi tuyệt đối cao.</li><li>Vải có 2 bề mặt khác nhau<ul><li>Bề mặt ngoài: Sợi cotton được dệt waffle tạo độ xốp, phồng đứng form áo.</li><li>Bề mặt bên trong: Sợi polyester dệt mịn, trơn vải dạm da mượt, mát, thoáng khí, chống nhăn sau khi giặt.</li></ul></li><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt cùng với chi tiết sọc.</li><li>Dáng regular fit thoải mái.</li><li>Logo TOBI Regular 2023 được in nhung nổi cao thành, chắn chắn.</li></ul></blockquote>', 24, 'cartoon-astronaut-t-shirts', 1, 1, 5, 1, 1, NULL, '2023-07-28 10:34:56', '2023-11-20 16:48:42'),
(2, 'Cartoon Astronaut T-Shirts', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637548/Cara/Products/olkj6gj7e7kflny40axq.jpg', 141234.00, 23, '<p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Thoáng khí và thấm hút cao: Bề mặt vải được dệt mắt lô kim to giúp thoáng khi tuyệt đối cao.</li><li>Vải có 2 bề mặt khác nhau<ul><li>Bề mặt ngoài: Sợi cotton được dệt waffle tạo độ xốp, phồng đứng form áo.</li><li>Bề mặt bên trong: Sợi polyester dệt mịn, trơn vải dạm da mượt, mát, thoáng khí, chống nhăn sau khi giặt.</li></ul></li><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt cùng với chi tiết sọc.</li><li>Dáng regular fit thoải mái.</li><li>Logo TOBI Regular 2023 được in nhung nổi cao thành, chắn chắn.</li></ul></blockquote>', 59, 'cartoon-astronaut-t-shirts', 1, 1, 5, 3, 1, NULL, '2023-07-28 10:52:33', '2024-05-21 16:00:07'),
(3, 'TOBI Regular Raincoat', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637530/Cara/Products/qxxwuol3emz4fahronqf.jpg', 480000.00, 17, '<p><strong>Form Dáng</strong>: Oversize</p><p><strong>Chất liệu</strong>: Dù trượt nước - 100 % Polyester</p><p><strong>Chi tiết sản phẩm</strong>:</p><blockquote><ul><li>Hình in đa dạng</li><li>Phần lai áo được may xẻ tà và có nút bấm.</li></ul></blockquote><p>&nbsp;</p>', 42, 'tobi-ragular-raincoat', 1, 2, 4, 2, 1, NULL, '2023-07-29 11:22:53', '2023-11-20 16:50:51'),
(4, 'Waffle Stripped Polo - Grude', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637506/Cara/Products/mds4i02ts76eg5stpirj.jpg', 430000.00, 10, '<p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Thoáng khí và thấm hút cao: Bề mặt vải được dệt mắt lô kim to giúp thoáng khi tuyệt đối cao.</li><li>Vải có 2 bề mặt khác nhau<ul><li>Bề mặt ngoài: Sợi cotton được dệt waffle tạo độ xốp, phồng đứng form áo.</li><li>Bề mặt bên trong: Sợi polyester dệt mịn, trơn vải dạm da mượt, mát, thoáng khí, chống nhăn sau khi giặt.</li></ul></li><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt cùng với chi tiết sọc.</li><li>Dáng regular fit thoải mái.</li><li>Logo TOBI Regular 2023 được in nhung nổi cao thành, chắn chắn.</li></ul></blockquote>', 30, 'waffle-stripped-polo-grude', 1, 2, 3, 4, 2, NULL, '2023-07-29 11:24:38', '2023-11-11 08:42:41'),
(5, 'Regular Typo Cuban Shirt', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637486/Cara/Products/zshiefnor5oyupnn7lhl.jpg', 450000.00, 32, '<p><strong>Form Dáng:</strong>&nbsp;Boxy Fit.</p><ul><li>Chất liệu: 70% Cotton 30% Nylon</li><li>Định lượng: 161GSM</li></ul><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Form dáng Boxy chia tỉ lệ cơ thể 1/3 giúp tôn dáng người mặc</li><li>In vân đá</li></ul></blockquote>', 1, 'tegular-typo-cuban-shirt', 7, 7, 3, 4, 2, NULL, '2023-07-29 11:44:37', '2023-11-20 15:38:27'),
(6, 'Highclass Cuban Shirt', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699682825/Cara/Products/rbjjn6krrfs0dxs8z1ph.jpg', 530000.00, 22, '<p><strong>Form dáng:</strong> Boxy Fit.</p><p><strong>Chất liệu:</strong> Lụa D100</p><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Form dáng Boxy chia tỉ lệ cơ thể 1/3 giúp tôn dáng người mặc&nbsp;</li><li>Áo được in overprinted toàn bộ áo</li><li>Hoạ tiết trên áo mang hơi hướng summer vibe&nbsp;</li></ul></blockquote>', 11, 'highclass-cuban-shirt', 10, 4, 0, 5, 1, NULL, '2023-07-29 11:46:46', '2023-11-20 17:07:41'),
(7, 'TOBI Basic Boxy T-shirt', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637465/Cara/Products/rg4oynlowmtrxs9wyr5x.jpg', 299999.00, 22, '<p><strong>Form Dáng</strong>: Boxy Fit.</p><p><strong>Chất liệu:</strong></p><blockquote><ul><li>Định lượng: 250GSM</li><li>Thành phần: 100% Cotton - 2 Chiều.</li></ul></blockquote><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Bo cổ dệt định lượng dày, chắc chắn, hạn chế nhão &amp; co rút sau khi giặt.</li><li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li><li>Logo&nbsp;<strong>TOBI®</strong>&nbsp;màu kem in nổi cao thành, chắc chắn.</li></ul></blockquote>', 0, 'tobi-basic-boxy-t-shirt', 7, 5, 3, 5, 3, NULL, '2023-07-29 11:48:47', '2023-11-10 10:31:05'),
(8, 'TOBI SauRieng T-shirt', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637417/Cara/Products/tftdjcgnjr8sspsy9bsm.jpg', 320000.00, 22, '<p><strong>Form Dáng:</strong> Boxy Fit.</p><p><strong>Chất liệu:</strong></p><blockquote><ul><li>Định lượng: 250gsm&nbsp;</li><li>Thành phần: 100% Cotton - 2 Chiều.</li></ul></blockquote><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt.</li><li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li><li>Hình in Trame.</li></ul></blockquote>', 2, 'tobi-saurieng-t-shirt', 8, 8, 5, 3, 1, NULL, '2023-07-29 11:51:45', '2023-11-20 15:02:06'),
(9, 'Dép Sục Hà Mã Mắt To Dễ Thương Hot Trend', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637384/Cara/Products/mxiqa7j1m3id6azkg7md.jpg', 150000.00, 8, '<blockquote><ul><li>Dép làm từ nhựa EVA cao cấp, siêu nhẹ, cực kỳ dẻo dai, khả năng chịu lực cao và hoàn toàn không độc hại&nbsp;</li><li>Đảm bảo đi cực kỳ êm chân, cực bền với thiết kế bề mặt giúp đôi chân luôn thoáng mát, không tạo mùi hôi chân&nbsp;</li><li>Đế thiết kế ma sát, chống trơn trượt, chống nước cực tốt Mọi người đi mưa lội nước thoải mái mà không lo hỏng dép nhé ạ</li></ul></blockquote>', 1, 'dep-suc-ha-ma', 23, 4, 3, 2, 3, NULL, '2023-07-29 12:04:28', '2023-11-20 16:37:31'),
(10, 'Dép lông con sóc siêu cute', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637364/Cara/Products/ms7fbjcpqfyykpnkbzce.jpg', 230000.00, 51, NULL, 19, 'dep-long-con-soc', 26, 8, 4, 1, 1, NULL, '2023-07-29 12:06:19', '2023-11-12 21:46:27'),
(11, 'Dép thời trang nam chữ H', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637345/Cara/Products/mznngajzsysv8buwd1tw.jpg', 124000.00, 11, NULL, 3, 'dep-thoi-trang-nam', 1, 6, 1, 5, 3, NULL, '2023-07-29 12:07:54', '2023-11-20 17:14:50'),
(12, 'Giày Adifom Superstar', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637326/Cara/Products/iiznllyzylr8ynhvy9i0.jpg', 210000.00, 44, '<p><i>👉 Thông tin sản phẩm:&nbsp;</i></p><p><i>✔️ Chất lượng tốt nhất trong tầm giá&nbsp;</i></p><p><i>✔️ Form đẹp chuẩn : Màu sắc giống đến 98 °/ₒ ;&nbsp;</i></p><p><i>✔️ Chất liệu da + da lộn + vải mesh&nbsp;</i></p><p><i>✔️ Logo Mông in dập chìm.&nbsp;</i></p><p><i>✔️ Lưỡi gà cao dày dặn; swoosh sắc nét; Mông mũi làm đẹp&nbsp;</i></p><p><i>✔️ Tem QR CODE Có thể check mã 2D&nbsp;</i></p><p><i>✔️ Đế 2 lớp khâu chỉ đều&nbsp;</i></p><p><i>✔️ Full box + accessories&nbsp;</i></p><p><i>✔️ Mẫu này bạn mang đúng hoặc up 1 size đối với chân bè</i></p>', 0, 'giay-adiform', 21, 2, 1, 3, 2, NULL, '2023-07-29 12:09:29', '2023-11-10 10:28:46'),
(13, 'STYLE 93 SHOE', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637312/Cara/Products/eqg0pg0ssqkgrhwwlu9q.webp', 900000.00, 10, '<p>Style 93, otherwise known as the Vans Mary Jane, debuted around 1994 and flourished as a popular women’s silhouette that tapped into retro nostalgia and a playful interpretation of femininity.&nbsp;</p><p>With a simple buckle and strap, Vans Style 93 took a traditional women’s Mary Jane silhouette and uniquely matched it with a chunky lug rubber outsole,&nbsp;</p><p>making the iconic design more casual and truly Off The Wall. No wonder it’s still a cult favorite today.</p><p>&nbsp;</p><blockquote><ul><li>Mary Jane-style silhouette</li></ul><p>&nbsp;</p><ul><li>Sturdy canvas uppers</li></ul><p>&nbsp;</p><ul><li>Heart buckle closure</li></ul><p>&nbsp;</p><ul><li>Rubber toe caps</li></ul><p>&nbsp;</p><ul><li>Lug rubber outsoles</li></ul></blockquote>', 1, 'van', 21, 5, 3, 3, 1, NULL, '2023-07-29 12:15:52', '2023-11-15 12:21:42'),
(14, 'TOBI Regular Boxy Sweater', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637299/Cara/Products/grvnik1fqpruzongmmk3.jpg', 590000.00, 45, '<p><strong>Form Dáng:</strong>&nbsp;Boxy Fit.</p><p><strong>Chất liệu:</strong></p><ul><li>Định lượng: 430gsm&nbsp;</li><li>Thành phần: 100% Cotton - Chân cua</li></ul><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt.</li><li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li><li>Phần To bản lai áo và tay được may 3cm tạo cảm giác cứng cáp chắc chắn hơn</li><li>Logo TOBI Regular 2023 được in lụa nổi cao thành, chắn chắn.</li></ul></blockquote>', 0, 'tobi-regular-boxy-sweater', 7, 3, 3, 3, 3, NULL, '2023-07-30 08:52:19', '2023-11-10 10:28:19'),
(15, 'Quần jean nam rách gối', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637230/Cara/Products/mum0grnh1m0ndbcqr3cq.jpg', 141234.00, 21, '<p>✔️ Loại : quần jeans nam, quần rach gối nam,quần bò rách gối</p><p>✔️ Màu sắc: quần jean nam đen, quần jean nam xanh, quần jean nam xám, quần jean nam trắng ( màu theo mã trên hình )</p><p>✔️ Thích hợp : quần jean nam ống suông gối thích hợp cho Đi Chơi, Công Sở, Đời Thường</p><p>✔️Chất liệu : quần rin nam được làm từ chất jeans</p><p>✔️kiểu dáng: skinny jean nam, quần jean nam slimfit,quần jean nam ống đứng</p>', 117, 'quan-jean-nam-rach-goi', 11, 6, 1, 4, 1, NULL, '2023-07-30 10:34:20', '2023-11-20 16:48:38'),
(17, 'Sandal Nữ', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637209/Cara/Products/ibueiu32mw9pwckonpba.jpg', 69999.00, 8, '<p>✔️𝐌𝐎̂ 𝐓𝐀̉ 𝐒𝐀̉𝐍 𝐏𝐇𝐀̂̉𝐌&nbsp;</p><p>- Chất liệu: da mềm&nbsp;</p><p>- Màu sắc: đen&nbsp;</p><p>-kiểu dáng thời trang&nbsp;</p><p>- phù hợp với mọi lứa tuổi&nbsp;</p><p>- Kích thước: 35,36,37,38,39</p>', 5, 'sandal-nu', 22, 2, 3, 2, 2, NULL, '2023-07-30 10:42:14', '2023-11-15 09:15:23'),
(20, 'PAULWEEKEND Áo Sơ Mi Dài Tay Form Rộng Phong Cách retro Nhật Bản Cho Nam', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699637126/Cara/Products/c5gd2n5z5nrea9wjm8f5.jpg', 158000.00, 32, NULL, 0, NULL, 7, 8, 0, 3, 3, NULL, '2023-11-10 10:25:26', '2023-11-10 23:51:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `rating` double(8,2) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(2, 3, 15, 5.00, '10.5 points', '2023-11-13 05:34:45', '2023-11-13 05:34:45'),
(3, 3, 1, 0.50, 'bored', '2023-11-13 05:52:29', '2023-11-13 05:52:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'S', '', NULL, '2023-07-27 03:38:45', '2023-07-27 03:38:45'),
(2, 'M', '', NULL, '2023-07-27 03:38:53', '2023-07-27 03:38:53'),
(3, 'L', '', NULL, '2023-07-27 03:39:01', '2023-07-27 03:39:01'),
(4, 'XL', '', NULL, '2023-07-27 03:39:08', '2023-07-27 03:39:08'),
(5, 'XXL', '', NULL, '2023-07-27 03:39:15', '2023-07-27 03:39:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_products`
--

CREATE TABLE `status_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `status_products`
--

INSERT INTO `status_products` (`id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sản phẩm nổi trội', 'Voluptate commodi sint quis quibusdam. Sunt tempora quo esse molestiae doloribus facere voluptas. Iusto totam ut eum quia. Sit deserunt commodi quia illum nihil nihil. Quasi aliquam aut id voluptatem voluptatum consectetur.', '2023-07-30 08:07:38', '2023-07-30 08:07:38'),
(2, 'Sản phẩm bán chạy nhất', 'Non consequatur repellat sit tempora modi et nostrum. Tempora modi reiciendis nisi at minus rerum. Ad natus quae explicabo tenetur et sint. Harum ab beatae eos ullam natus omnis.', '2023-07-30 08:07:38', '2023-07-30 08:07:38'),
(3, 'Sản phẩm được quan tâm nhất', 'Velit atque similique voluptatum perspiciatis magnam cupiditate et. Sunt id aperiam eligendi tempora. Occaecati exercitationem distinctio laboriosam recusandae impedit minus blanditiis. Ut accusantium vitae quo enim in mollitia.', '2023-07-30 08:07:38', '2023-07-30 08:07:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `description`, `parent_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Thời trang nam', 'thoi-trang', '', 1, NULL, '2023-07-27 04:19:49', '2023-07-27 09:11:40'),
(6, 'Áo Thun', 'ao-thun', '', 1, NULL, '2023-07-29 11:30:26', '2023-07-29 11:30:26'),
(7, 'Áo Sơ Mi', 'ao-so-mi', '', 1, NULL, '2023-07-29 11:31:32', '2023-07-29 11:31:32'),
(8, 'Áo Khoác', 'ao-khoac', '', 1, NULL, '2023-07-29 11:31:59', '2023-07-29 11:31:59'),
(9, 'Quần Đùi', 'quan-dui', '', 1, NULL, '2023-07-29 11:32:30', '2023-07-29 11:32:30'),
(10, 'Áo Polo', 'ao-polo', '', 1, NULL, '2023-07-29 11:32:55', '2023-07-29 11:32:55'),
(11, 'Quần Jean', 'quan-jean', '', 1, NULL, '2023-07-29 11:38:18', '2023-07-29 11:38:18'),
(12, 'Quần Dài', 'quan-dai', '', 1, NULL, '2023-07-29 11:38:31', '2023-07-29 11:38:31'),
(21, 'Giày Thể Thao', 'giay-the-thao', '', 2, NULL, '2023-07-29 12:00:18', '2023-07-29 12:01:04'),
(22, 'Xăng Đan', 'xang-dan', '', 2, NULL, '2023-07-29 12:01:35', '2023-07-29 12:01:35'),
(23, 'Dép Đi Trong Nhà', 'dep-di-trong-nha', '', 2, NULL, '2023-07-29 12:02:01', '2023-07-29 12:02:01'),
(24, 'Giày Tây', 'giay-tay', '', 2, NULL, '2023-07-29 12:02:17', '2023-07-29 12:02:17'),
(25, 'Bốt', 'bot', '', 2, NULL, '2023-07-29 12:02:33', '2023-07-29 12:02:33'),
(26, 'Dép', 'dep', '', 2, NULL, '2023-07-29 12:05:09', '2023-07-29 12:05:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `address`, `phone`, `role`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị viên', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'admin@gmail.com', NULL, '$2y$10$WTUHCBKX30LtFY0egvP98ue9Ae6rod4NJz9eAAlt0ErPimfoy21zu', NULL, NULL, 1, NULL, NULL, '2023-07-27 03:35:16', '2023-07-27 03:35:16'),
(2, 'buingocphi', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'phibnph29465@fpt.edu.vn', NULL, '$2y$10$JOtPaOdf04C4gy985Lw8hOD1pr02cDpSDywImGArglptRY8jAoX96', NULL, NULL, 0, NULL, NULL, '2023-07-28 08:56:52', '2023-07-28 08:56:52'),
(3, 'Bùi Fee', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699687947/Cara/Profile/kpvg3fzzm3evjydhhnkf.png', 'buingocphinn@gmail.com', NULL, '$2y$10$rQOdhXnOK/3tKOwKYn.3auDLOzdkafHHRNNwDDfWqeJlTeC0BRTT6', 'Kim Sơn - Ninh Bình', '0377674930', 0, NULL, NULL, '2023-08-03 09:08:02', '2023-11-11 00:50:11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status_products`
--
ALTER TABLE `status_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `status_products`
--
ALTER TABLE `status_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
