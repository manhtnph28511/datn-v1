-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 15, 2024 at 04:29 AM
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
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `content`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu giày thể thao', 'Thiết Kế Chuyên Biệt\r\nĐế Giày: Thường có đế cao su hoặc EVA để đảm bảo độ bám và giảm chấn.\r\nChất Liệu: Sử dụng vải lưới hoặc da tổng hợp để tạo sự thoáng khí và nhẹ nhàng.\r\nHỗ Trợ và Độ Bền\r\nHỗ Trợ Bàn Chân: Nhiều mẫu giày có công nghệ hỗ trợ gót chân và vòm bàn chân, giúp giảm nguy cơ chấn thương.\r\nĐộ Bền Cao: Được chế tạo để chịu được áp lực và ma sát từ các hoạt động thể thao.\r\nHãy đến xem sản phẩm và mua ngay kẻo lỡ!', 23, '2024-08-31 11:35:27', '2024-08-31 11:37:00'),
(2, 'Áo clb Barcelona', 'Áo bóng đá của Barcelona: Biểu tượng của phong cách và truyền thống\r\n\r\nÁo bóng đá của câu lạc bộ Barcelona (Barça) không chỉ là một trang phục thể thao, mà còn là biểu tượng của niềm tự hào, lịch sử và văn hóa xứ Catalonia. Qua nhiều thập kỷ, áo đấu của Barça đã trở thành một phần không thể thiếu của đội bóng và người hâm mộ toàn cầu.\r\nThiết kế áo đấu của Barcelona đã thay đổi nhiều lần qua từng mùa giải, nhưng vẫn luôn giữ lại dấu ấn của truyền thống. Những đường kẻ sọc thay đổi từ dọc, ngang, hoặc thậm chí theo các họa tiết độc đáo. Đôi khi, các mẫu áo còn được thêm vào những chi tiết tinh tế như cờ Catalonia (Senyera) ở cổ áo hoặc tay áo, nhấn mạnh sự kết nối của đội bóng với văn hóa và con người xứ Catalonia.', 12, '2024-08-31 11:50:42', '2024-09-15 03:09:54'),
(3, 'Áo đấu ManUtd', 'Áo đấu của Manchester United, một trong những đội bóng giàu thành tích và được yêu mến nhất trên thế giới, không chỉ là trang phục thể thao mà còn là biểu tượng của sự thành công, truyền thống và niềm tự hào của người hâm mộ đội bóng này. Qua nhiều thập kỷ, thiết kế áo đấu của Manchester United luôn được thay đổi nhưng vẫn giữ nguyên được những giá trị cốt lõi, tạo nên sự độc đáo và sức hấp dẫn riêng.\r\nManchester United nổi tiếng với màu đỏ tươi (màu áo sân nhà), tạo nên biệt danh \"Quỷ đỏ\" (The Red Devils). Màu đỏ tượng trưng cho sức mạnh, lòng quyết tâm và sự đam mê của đội bóng trên sân cỏ. Áo đấu sân nhà truyền thống luôn là sự kết hợp giữa màu đỏ ở phần thân áo với viền trắng hoặc đen ở cổ áo và tay áo.\r\nThiết kế áo đấu của Manchester United đã thay đổi đáng kể qua các giai đoạn khác nhau của lịch sử đội bóng, nhưng luôn giữ lại sự đơn giản và mạnh mẽ trong màu sắc. Các nhà sản xuất áo đấu như Adidas (hiện tại) và Umbro, Nike (trước đây) đã mang đến những nét cải tiến, nhưng luôn giữ nguyên màu đỏ truyền thống.\r\n\r\nNhững năm gần đây, áo đấu thường có các chi tiết đặc biệt như cổ áo gập truyền thống hoặc kiểu cổ tròn hiện đại, cùng với họa tiết sắc nét nhằm tăng tính thẩm mỹ và hiệu suất thi đấu.', 15, '2024-09-15 03:11:30', '2024-09-15 03:11:30'),
(4, 'Áo đấu clb Bayern Munich', 'Áo đấu Bayern Munich: Tinh hoa của đẳng cấp và truyền thống\r\n\r\nÁo đấu của Bayern Munich, đội bóng giàu thành tích nhất nước Đức, không chỉ là trang phục thể thao mà còn là biểu tượng của sự hùng mạnh, đẳng cấp và truyền thống. Bayern Munich, hay còn được gọi là \"Hùm xám xứ Bavaria\", luôn tự hào với bộ áo đấu mang sắc đỏ truyền thống cùng những chi tiết tinh tế qua từng thời kỳ.\r\n\r\n1. Màu sắc đặc trưng\r\nMàu sắc chủ đạo của Bayern Munich là đỏ và trắng, được sử dụng xuyên suốt lịch sử của câu lạc bộ. Màu đỏ tượng trưng cho sức mạnh, lòng quyết tâm và niềm đam mê, trong khi màu trắng mang đến sự tinh khiết và tinh tế. Trên sân nhà, Bayern luôn ra sân với áo đấu màu đỏ đặc trưng, tạo nên sự mạnh mẽ và đẳng cấp.\r\n\r\n2. Thiết kế qua các thời kỳ\r\nThiết kế áo đấu của Bayern Munich đã thay đổi đáng kể qua từng giai đoạn, nhưng màu đỏ chủ đạo luôn được giữ nguyên. Những mẫu áo đấu gần đây thường sử dụng phong cách thiết kế hiện đại, với các đường nét sắc sảo và tinh tế.\r\n\r\nÁo đấu của Bayern được sản xuất bởi Adidas, một trong những thương hiệu thể thao hàng đầu thế giới và cũng là đối tác lâu đời của câu lạc bộ. Các chi tiết như viền tay áo, cổ áo, và logo được chăm chút kỹ lưỡng, mang lại vẻ đẹp cân đối và sự thoải mái cho các cầu thủ.\r\n\r\n3. Chất liệu và công nghệ\r\nÁo đấu của Bayern Munich được trang bị công nghệ HEAT.RDY và AEROREADY từ Adidas, giúp tối ưu hóa khả năng thấm hút mồ hôi và tạo cảm giác thoải mái cho các cầu thủ trong suốt trận đấu. Các chất liệu này không chỉ đảm bảo sự thoáng mát mà còn mang lại tính năng động, nhẹ nhàng và thoải mái, phù hợp với môi trường thi đấu chuyên nghiệp.', 6, '2024-09-15 03:12:32', '2024-09-15 03:12:32'),
(5, 'Áo thi đấu clb Juventus', 'Áo đấu của Juventus, đội bóng nổi tiếng của Serie A và là một trong những câu lạc bộ bóng đá thành công nhất tại Ý, không chỉ là trang phục thể thao mà còn là biểu tượng của sự thanh lịch, truyền thống và đẳng cấp. Được biết đến với biệt danh \"Bà đầm già\" (La Vecchia Signora), áo đấu của Juventus phản ánh sự phát triển và tinh thần của đội bóng qua nhiều thập kỷ.\r\n\r\n1. Màu sắc đặc trưng\r\nMàu sắc truyền thống của Juventus là đen và trắng. Áo đấu sân nhà của Juventus thường được thiết kế với các sọc dọc đen trắng, tạo nên phong cách đặc trưng dễ nhận diện. Màu sắc này không chỉ thể hiện sự mạnh mẽ mà còn mang đậm dấu ấn lịch sử và văn hóa của câu lạc bộ.\r\n\r\n2. Thiết kế qua các thời kỳ\r\nThiết kế áo đấu của Juventus đã trải qua nhiều thay đổi qua các thời kỳ, nhưng màu sắc cơ bản và sự phân chia sọc dọc vẫn được giữ vững. Dưới sự sản xuất của Adidas (trước đây là Nike), áo đấu của Juventus thường mang những đường nét tinh tế, hiện đại, đồng thời giữ được sự thanh lịch trong thiết kế.\r\n\r\nCác mẫu áo đấu gần đây có sự thay đổi với các chi tiết như sọc dọc mảnh hơn, cổ áo kiểu dáng mới và các yếu tố thiết kế bổ sung như logo câu lạc bộ được nhấn mạnh hoặc các yếu tố trang trí thêm.\r\n\r\n3. Chất liệu và công nghệ\r\nÁo đấu của Juventus sử dụng công nghệ AEROREADY từ Adidas, giúp thấm hút mồ hôi hiệu quả và duy trì sự thoải mái cho các cầu thủ. Chất liệu này giúp áo luôn khô ráo và thoáng mát, hỗ trợ tối đa hiệu suất thi đấu của các cầu thủ trên sân.\r\n\r\n4. Bộ trang phục sân khách\r\nÁo đấu sân khách của Juventus thường có thiết kế sáng tạo và đa dạng hơn so với áo đấu sân nhà. Màu sắc của áo đấu sân khách có thể bao gồm các gam màu như xanh navy, xám, vàng, hoặc xanh lá cây. Những mẫu áo này thường mang đến sự mới mẻ và phong cách khác biệt, giúp đội bóng nổi bật trong các trận đấu xa nhà.', 8, '2024-09-15 03:13:46', '2024-09-15 03:13:46');

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
(8, 'Dior', 'Dior', 'Công ty Dior được thành lập vào ngày 16 tháng 12 năm 1946 tại nhà riêng của Christian Dior tại số 30 Avenue Montaigne Paris B. Tuy nhiên hiện nay, Dior lấy năm 1947 là năm thành lập. Dior lúc đó được hỗ trợ tài chính bởi doanh nhân Marcel Boussac.. Vốn ban đầu của công ty là 6 triệu Franc với 80 nhân công.', NULL, '2024-06-30 01:07:38', '2024-07-26 02:31:13'),
(9, 'Adidas', 'adidas', 'Adidas (tiếng Đức: [ˈʔadiˌdas]; cách điệu thành adidas từ năm 1949) là một tập đoàn đa quốc gia của Đức, được thành lập và có trụ sở tại Herzogenaurach, Bavaria, chuyên thiết kế và sản xuất giày dép, quần áo và phụ kiện. Đây là nhà sản xuất đồ thể thao lớn nhất ở châu Âu và lớn thứ hai trên thế giới, sau Nike.', NULL, '2024-08-31 10:19:21', '2024-08-31 10:19:54'),
(10, 'Nike, Inc', 'nike-inc', 'Nike, Inc. (/ˈnaɪki/ hoặc /ˈnaɪk/)[note 1] là một tập đoàn đa quốc gia của Hoa Kỳ tham gia thiết kế, phát triển, sản xuất, tiếp thị và bán giày dép trên toàn thế giới, may mặc, thiết bị, phụ kiện và dịch vụ. Công ty có trụ sở chính gần Beaverton, Oregon, trong vùng đô thị Portland.[4] Đây là nhà cung cấp giày và quần áo thể thao lớn nhất thế giới, đồng thời là nhà sản xuất thiết bị thể thao lớn, với doanh thu vượt 46 tỷ đô la Mỹ trong năm tài chính 2022.[5][6]\r\n\r\nCông ty được Bill Bowerman và Phil Knight thành lập vào ngày 25 tháng 1 năm 1964 với tên gọi \"Blue Ribbon Sports\", và chính thức trở thành Nike, Inc. vào ngày 30 tháng 5 năm 1971. Công ty lấy tên từ Nike, nữ thần chiến thắng của Hy Lạp.[7] Nike tiếp thị sản phẩm của mình dưới thương hiệu riêng, cũng như Nike Golf, Nike Pro, Nike+, Air Jordan, Nike Blazers, Air Force 1, Nike Dunk, Air Max, Foamposite, Nike Skateboarding, Nike CR7,[8] và các công ty con bao gồm Air Jordan và Converse. Nike cũng sở hữu Bauer Hockey từ năm 1995 đến năm 2008 và trước đó đã sở hữu Cole Haan, Umbro và Hurley International.[9] Ngoài việc sản xuất trang phục và thiết bị thể thao, công ty còn điều hành các cửa hàng bán lẻ dưới tên Niketown. Nike tài trợ cho nhiều vận động viên và đội thể thao nổi tiếng trên toàn thế giới, với các thương hiệu được công nhận cao \"Just Do It\" và logo Swoosh.', NULL, '2024-09-03 09:00:20', '2024-09-03 09:00:30');

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
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `total_price` int NOT NULL,
  `image_variant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discounted_total_price` int DEFAULT NULL,
  `voucher_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `pro_id`, `user_id`, `size_id`, `color_id`, `price`, `quantity`, `total_price`, `image_variant`, `discounted_total_price`, `voucher_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(164, 21, 17, 2, 4, 300, 1, 300, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725181615/MWSPORT/Products/ht1yxve7p8uoplmesekn.jpg', NULL, NULL, NULL, '2024-09-05 11:14:50', '2024-09-05 11:14:50');

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
(1, 'Quần áo', 'quan-ao', 'Quần áo thể thao', NULL, '2023-07-26 13:37:08', '2024-09-14 07:34:45'),
(2, 'Giày Dép', 'giay-dep', 'Giày thể thao', NULL, '2023-07-26 13:37:17', '2024-09-14 07:34:30');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_up` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `user_id`, `is_admin`, `message`, `file_up`, `created_at`, `updated_at`) VALUES
(1, 19, 0, 'hêlo', NULL, '2024-08-23 10:44:36', '2024-08-23 10:44:36'),
(2, 19, 1, 'ok', NULL, '2024-08-23 11:23:05', '2024-08-23 11:23:05'),
(5, 19, 1, 'test', 'chat_files/4syrZPaEGcH18xuTBYUiZWNfW9aa7tNQ9H9dM8J5.jpg', '2024-08-30 09:54:29', '2024-08-30 09:54:29'),
(7, 20, 0, 'hello', 'chat_files/SONtrOdGUG6RNLNIUAf0zhG1a4F8LovM1uEktVrx.jpg', '2024-08-30 10:05:23', '2024-08-30 10:05:23'),
(11, 20, 0, 'hi', 'chat_files/Xa53sHoTgnctVDTGXRGH4hQrnsfpw2kCDMGhMs6L.jpg', '2024-08-30 10:33:03', '2024-08-30 10:33:03'),
(12, 20, 1, 'ok success', NULL, '2024-08-30 10:58:58', '2024-08-30 10:58:58'),
(13, 20, 0, 'hay mo tai khoan cho toi', NULL, '2024-09-12 14:25:04', '2024-09-12 14:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `clients_notifications`
--

CREATE TABLE `clients_notifications` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients_notifications`
--

INSERT INTO `clients_notifications` (`id`, `user_id`, `type`, `data`, `is_read`, `created_at`, `updated_at`) VALUES
(72, 19, 'account_update', '{\"user_id\":19,\"message\":\"Ch\\u00fang t\\u00f4i \\u0111\\u00e3 m\\u1edf l\\u1ea1i t\\u00e0i kho\\u1ea3n c\\u1ee7a b\\u1ea1n\"}', 1, '2024-09-01 04:33:22', '2024-09-02 07:58:57'),
(81, 19, 'đã đặt hàng', '{\"order_id\":163,\"message\":\"\\u0110\\u00e3 \\u0111\\u1eb7t h\\u00e0ng! \\u0110\\u01a1n h\\u00e0ng #163Vui l\\u00f2ng ch\\u1edd x\\u00e1c nh\\u1eadn\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-09-01 08:54:51', '2024-09-02 07:58:57'),
(82, 19, 'order_cancel_request', '{\"order_id\":163,\"message\":\"B\\u1ea1n \\u0111\\u00e3 y\\u00eau c\\u1ea7u h\\u1ee7y \\u0111\\u01a1n h\\u00e0ng #163.\"}', 1, '2024-09-01 08:55:21', '2024-09-02 07:58:57'),
(83, 19, 'shipping_update', '{\"order_id\":163,\"message\":\"\\u0110\\u01a1n h\\u00e0ng c\\u1ee7a b\\u1ea1n \\u0110\\u01a1n h\\u00e0ng \\u0111\\u00e3 b\\u1ecb h\\u1ee7y. Vui l\\u00f2ng li\\u00ean h\\u1ec7 v\\u1edbi admin \\u0111\\u1ec3 \\u0111\\u01b0\\u1ee3c ho\\u00e0n ti\\u1ec1n..\"}', 1, '2024-09-01 08:55:47', '2024-09-02 07:58:57'),
(84, 19, 'đã đặt hàng', '{\"order_id\":164,\"message\":\"\\u0110\\u00e3 \\u0111\\u1eb7t h\\u00e0ng! \\u0110\\u01a1n h\\u00e0ng #164,Vui l\\u00f2ng ch\\u1edd x\\u00e1c nh\\u1eadn\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-09-01 09:21:51', '2024-09-02 07:58:57'),
(85, 19, 'shipping_update', '{\"order_id\":164,\"message\":\"\\u0110\\u01a1n h\\u00e0ng c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao h\\u00e0ng th\\u00e0nh c\\u00f4ng.\"}', 1, '2024-09-01 09:27:48', '2024-09-02 07:58:57'),
(86, 20, 'đã đặt hàng', '{\"order_id\":165,\"message\":\"\\u0110\\u00e3 \\u0111\\u1eb7t h\\u00e0ng! \\u0110\\u01a1n h\\u00e0ng #165,Vui l\\u00f2ng ch\\u1edd x\\u00e1c nh\\u1eadn\",\"order_details\":{\"username\":\"manh123\",\"address\":\"hanoi bac tu liem\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-09-02 07:41:20', '2024-09-03 04:24:36'),
(87, 20, 'shipping_update', '{\"order_id\":165,\"message\":\"\\u0110\\u01a1n h\\u00e0ng c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c v\\u1eadn chuy\\u1ec3n.\"}', 1, '2024-09-02 07:42:06', '2024-09-03 04:24:36'),
(88, 20, 'shipping_update', '{\"order_id\":165,\"message\":\"\\u0110\\u01a1n h\\u00e0ng c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao cho ng\\u01b0\\u1eddi nh\\u1eadn.\"}', 1, '2024-09-02 07:42:22', '2024-09-03 04:24:36'),
(89, 20, 'shipping_update', '{\"order_id\":165,\"message\":\"\\u0110\\u01a1n h\\u00e0ng c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao h\\u00e0ng th\\u00e0nh c\\u00f4ng.\"}', 1, '2024-09-02 07:42:26', '2024-09-03 04:24:36'),
(90, 20, 'đã đặt hàng', '{\"message\":\"\\u0110\\u00e3 \\u0111\\u1eb7t h\\u00e0ng! \\u0110\\u01a1n h\\u00e0ng #166Vui l\\u00f2ng ch\\u1edd x\\u00e1c nh\\u1eadn\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-09-02 09:00:11', '2024-09-03 04:24:36'),
(91, 20, 'đã đặt hàng', '{\"message\":\"\\u0110\\u00e3 \\u0111\\u1eb7t h\\u00e0ng! \\u0110\\u01a1n h\\u00e0ng #167Vui l\\u00f2ng ch\\u1edd x\\u00e1c nh\\u1eadn\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-09-02 09:03:12', '2024-09-03 04:24:36'),
(92, 20, 'đã đặt hàng', '{\"order_id\":168,\"message\":\"\\u0110\\u00e3 \\u0111\\u1eb7t h\\u00e0ng! \\u0110\\u01a1n h\\u00e0ng #168,Vui l\\u00f2ng ch\\u1edd x\\u00e1c nh\\u1eadn\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-09-05 11:16:48', '2024-09-07 02:20:34'),
(93, 20, 'đã đặt hàng', '{\"order_id\":169,\"message\":\"\\u0110\\u00e3 \\u0111\\u1eb7t h\\u00e0ng! \\u0110\\u01a1n h\\u00e0ng #169,Vui l\\u00f2ng ch\\u1edd x\\u00e1c nh\\u1eadn\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-09-12 14:21:35', '2024-09-12 14:22:16'),
(94, 20, 'shipping_update', '{\"order_id\":169,\"message\":\"\\u0110\\u01a1n h\\u00e0ng c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 nh\\u1eadn v\\u00e0 \\u0111ang \\u0111ang x\\u1eed l\\u00ed.\"}', 1, '2024-09-12 14:22:36', '2024-09-12 14:22:41'),
(95, 20, 'shipping_update', '{\"order_id\":169,\"message\":\"\\u0110\\u01a1n h\\u00e0ng c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao h\\u00e0ng th\\u00e0nh c\\u00f4ng.\"}', 1, '2024-09-12 14:22:52', '2024-09-12 14:22:57'),
(96, 20, 'account_update', '{\"user_id\":20,\"message\":\"Ch\\u00fang t\\u00f4i \\u0111\\u00e3 nh\\u1eadn th\\u1ea5y 1 s\\u1ed1 h\\u00e0nh \\u0111\\u1ed9ng l\\u1ea1i t\\u1eeb t\\u00e0i kho\\u1ea3n c\\u1ee7a b\\u1ea1n n\\u00ean \\u0111\\u00e3 t\\u1ea1m th\\u1eddi kh\\u00f3a n\\u00f3 . Vui l\\u00f2ng li\\u00ean h\\u1ec7 qua trang chat\"}', 1, '2024-09-12 14:24:40', '2024-09-12 14:24:45'),
(97, 20, 'account_update', '{\"user_id\":20,\"message\":\"Ch\\u00fang t\\u00f4i \\u0111\\u00e3 m\\u1edf l\\u1ea1i t\\u00e0i kho\\u1ea3n c\\u1ee7a b\\u1ea1n\"}', 0, '2024-09-12 14:25:32', '2024-09-12 14:25:32');

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
(4, 'Trắng', '#f2f1ed', '2023-07-26 13:38:37', '2024-09-03 08:39:53', NULL),
(5, 'Hồng', '#c25695', '2023-07-28 21:50:17', '2024-09-03 08:43:24', NULL),
(6, 'Xanh', '#35d09c', '2024-08-31 10:12:52', '2024-09-03 09:05:14', NULL),
(7, 'Xanh lam', '#402dd2', '2024-09-03 09:05:26', '2024-09-03 09:05:41', NULL),
(8, 'Vàng', '#c5e817', '2024-09-03 09:05:59', '2024-09-03 09:05:59', NULL),
(9, 'Cam', '#e5aa57', '2024-09-03 09:15:56', '2024-09-03 09:15:56', NULL),
(10, 'Tím', '#a422c9', '2024-09-07 03:43:38', '2024-09-07 03:43:38', NULL);

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
(38, '2024_08_16_095605_update_carts_table', 7),
(39, '2024_08_16_142650_create_chats_table', 8),
(40, '2024_08_07_194111_update_orders_mail_table', 9),
(41, '2024_08_16_155359_remove_order_id_from_notifications_table', 10),
(42, '2024_08_17_182123_change_price_column_type_in_product_variants_table', 11),
(43, '2024_08_17_182330_change_price_column_type_in_order_details_table', 12),
(44, '2024_08_17_182427_change_total_price_column_type_in_order_details_table', 13),
(45, '2024_08_18_154724_update_carts_price_columns', 14),
(46, '2024_08_18_155544_update_carts_discounted_total_price_columns', 15),
(47, '2024_08_18_171556_change_discount_column_type_in_vouchers_table', 16),
(48, '2024_08_19_083942_update_carts_table', 17),
(49, '2024_08_19_084211_update_carts_final_price_table', 18),
(50, '2024_08_19_084648_update_final_price_in_carts_table', 19),
(51, '2024_08_19_090952_add_columns_to_vouchers_table', 20),
(52, '2024_08_19_092001_dropcolumn_quantity_to_vouchers_table', 21),
(53, '2024_08_19_092847_add_columns_to_vouchers_table', 22),
(54, '2024_08_20_152247_add_voucher_code_to_carts_table', 23),
(55, '2024_08_20_174627_remove_final_price_from_carts_table', 24),
(56, '2024_08_21_172816_create_admin_notifications_table', 25),
(57, '2024_08_22_151610_create_client_notifications_table', 26),
(58, '2024_08_22_152459_create_clients_notifications_table', 27),
(59, '2024_08_25_103542_add_voucher_id_to_users_table', 28),
(60, '2024_08_25_155500_create_user_voucher_table', 29),
(61, '2024_08_26_080135_create_wishlists_table', 30),
(62, '2024_08_26_081858_add_size_and_color_to_wishlists_table', 31),
(63, '2024_08_26_131921_add_image_variant_to_cart_table', 32),
(64, '2024_08_29_092358_add_image_to_order_details_table', 33),
(65, '2024_08_30_162307_add_file_path_to_chats_table', 34),
(66, '2024_08_30_183345_add_user_id_to_clients_notifications_table', 35),
(67, '2024_08_31_175035_update_description_nullable', 36),
(68, '2024_08_31_182312_create_blogs_table', 37),
(69, '2024_09_02_152532_add_pro_id_to_blogs_table', 38),
(70, '2024_09_02_152718_drop_pro_id_from_blogs_table', 39),
(71, '2024_09_14_150103_rename_parent_id_to_categories_id_in_sub_categories', 40);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `data`, `is_read`, `created_at`, `updated_at`) VALUES
(15, 'shipping_update', '{\"order_id\":70,\"message\":\"\\u0110\\u01a1n h\\u00e0ng \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao cho ng\\u01b0\\u1eddi nh\\u1eadn. Vui l\\u00f2ng x\\u00e1c nh\\u1eadn \\u0111\\u00e3 nh\\u1eadn h\\u00e0ng.\"}', 1, '2024-08-08 19:13:00', '2024-08-08 19:13:03'),
(17, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #72\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-08 21:26:37', '2024-08-08 21:34:29'),
(19, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #74\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-08 21:33:35', '2024-08-08 21:34:29'),
(20, 'shipping_update', '{\"order_id\":74,\"message\":\"\\u0110\\u01a1n h\\u00e0ng \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao cho ng\\u01b0\\u1eddi nh\\u1eadn. Vui l\\u00f2ng x\\u00e1c nh\\u1eadn \\u0111\\u00e3 nh\\u1eadn h\\u00e0ng.\"}', 1, '2024-08-08 21:36:42', '2024-08-08 21:36:53'),
(21, 'order_received_confirmation', '{\"order_id\":74,\"message\":\"Ng\\u01b0\\u1eddi d\\u00f9ng \\u0111\\u00e3 nh\\u1eadn h\\u00e0ng cho \\u0111\\u01a1n h\\u00e0ng #74\"}', 1, '2024-08-08 21:36:53', '2024-08-08 21:37:03'),
(22, 'order_delivered', '{\"order_id\":74,\"message\":\"\\u0110\\u01a1n h\\u00e0ng c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao th\\u00e0nh c\\u00f4ng. H\\u00e3y \\u0111\\u00e1nh gi\\u00e1 v\\u00e0 cho \\u00fd ki\\u1ebfn v\\u1ec1 \\u0111\\u01a1n h\\u00e0ng!\"}', 1, '2024-08-08 21:37:44', '2024-08-08 21:37:46'),
(23, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #75\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-12 10:18:29', '2024-08-12 10:18:41'),
(24, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #76\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-12 10:19:54', '2024-08-15 02:47:16'),
(26, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #84\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-16 05:26:01', '2024-08-16 05:27:38'),
(37, 'account_update', '{\"message\":\"T\\u00e0i kho\\u1ea3n c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 b\\u1ecb kh\\u00f3a. Vui l\\u00f2ng li\\u00ean h\\u1ec7 qua trang chat: .<a href=\\\"clients.chats.index\\\"><\\/a>\"}', 1, '2024-08-16 08:33:28', '2024-08-16 08:33:55'),
(38, 'account_update', '{\"message\":\"T\\u00e0i kho\\u1ea3n c\\u1ee7a b\\u1ea1n \\u0111\\u00e3 b\\u1ecb kh\\u00f3a. Vui l\\u00f2ng li\\u00ean h\\u1ec7 qua trang chat: .<a href=\\\"clients.chats.index\\\"><\\/a>\"}', 1, '2024-08-16 08:33:53', '2024-08-16 08:33:55'),
(39, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #85\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-17 11:25:54', '2024-08-17 11:27:48'),
(40, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #86\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-20 09:45:48', '2024-08-21 10:19:18'),
(41, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #87\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-20 09:52:13', '2024-08-21 10:19:18'),
(42, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #88\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-20 10:01:15', '2024-08-21 10:19:18'),
(43, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #89\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-20 10:11:25', '2024-08-21 10:19:18'),
(44, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #90\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-20 10:18:54', '2024-08-21 10:19:18'),
(45, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #91\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-20 10:21:20', '2024-08-21 10:19:18'),
(46, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #92\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-20 10:22:53', '2024-08-21 10:19:18'),
(47, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #93\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-20 10:29:07', '2024-08-21 08:19:05'),
(48, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #94\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-20 10:38:07', '2024-08-21 08:19:03'),
(49, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #95\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-20 10:38:08', '2024-08-21 08:19:00'),
(50, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #96\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 08:29:13', '2024-08-21 10:19:18'),
(51, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #97\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 08:29:38', '2024-08-21 10:19:18'),
(52, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #98\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 08:36:20', '2024-08-21 10:19:18'),
(53, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #99\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 08:37:29', '2024-08-21 10:19:18'),
(54, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #100\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 08:39:06', '2024-08-21 10:19:18'),
(55, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #101\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 08:43:20', '2024-08-21 10:19:18'),
(56, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #102\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 08:45:32', '2024-08-21 10:19:18'),
(57, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #103\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 08:48:24', '2024-08-21 10:19:18'),
(58, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #104\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 08:51:36', '2024-08-21 10:19:18'),
(59, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #105\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:02:09', '2024-08-21 10:19:18'),
(60, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #106\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:03:12', '2024-08-21 10:19:18'),
(61, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #107\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:09:04', '2024-08-21 10:19:18'),
(62, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #108\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:09:50', '2024-08-21 10:19:18'),
(63, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #109\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:13:24', '2024-08-21 10:19:18'),
(64, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #110\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:13:39', '2024-08-21 10:19:18'),
(65, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #111\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:17:24', '2024-08-21 10:19:18'),
(66, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #112\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:18:12', '2024-08-21 10:19:18'),
(67, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #113\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:18:26', '2024-08-21 10:19:18'),
(68, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #114\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:21:26', '2024-08-21 10:19:18'),
(69, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #115\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:21:50', '2024-08-21 10:19:18'),
(70, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #116\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:23:26', '2024-08-21 10:19:18'),
(71, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #117\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:25:31', '2024-08-21 10:19:18'),
(72, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #118\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:28:03', '2024-08-21 10:19:18'),
(73, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #119\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:32:50', '2024-08-21 10:19:18'),
(74, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #120\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:37:23', '2024-08-21 10:19:18'),
(75, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #121\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:47:44', '2024-08-21 10:19:18'),
(76, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #122\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:50:53', '2024-08-21 10:19:18'),
(77, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #123\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 09:54:37', '2024-08-21 10:19:18'),
(78, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #124\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-21 10:05:27', '2024-08-21 10:19:18'),
(79, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #125\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-22 08:27:34', '2024-08-22 08:30:29'),
(80, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #126\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-22 08:40:48', '2024-08-22 08:46:42'),
(81, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #127\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-22 08:44:42', '2024-08-22 08:46:42'),
(82, 'shipping_update', '{\"order_id\":35,\"message\":\"\\u0110\\u01a1n h\\u00e0ng \\u0111\\u00e3 b\\u1ecb h\\u1ee7y\"}', 1, '2024-08-22 09:39:14', '2024-08-22 10:15:22'),
(83, 'shipping_update', '{\"order_id\":127,\"message\":\"\\u0110\\u01a1n h\\u00e0ng \\u0111\\u00e3 b\\u1ecb h\\u1ee7y\"}', 1, '2024-08-22 09:44:42', '2024-08-22 10:15:22'),
(84, 'shipping_update', '{\"order_id\":126,\"message\":\"\\u0110\\u01a1n h\\u00e0ng \\u0111\\u00e3 b\\u1ecb h\\u1ee7y\"}', 1, '2024-08-22 09:49:36', '2024-08-22 10:15:22'),
(85, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #128\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-22 10:20:27', '2024-08-22 11:02:42'),
(86, 'order_received_confirmation', '{\"order_id\":125,\"message\":\"Ng\\u01b0\\u1eddi d\\u00f9ng \\u0111\\u00e3 nh\\u1eadn h\\u00e0ng cho \\u0111\\u01a1n h\\u00e0ng #125\"}', 1, '2024-08-22 11:05:56', '2024-08-22 11:06:08'),
(87, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #129\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-08-22 11:11:58', '2024-08-22 11:24:33'),
(88, 'đã đặt hàng', '{\"order_id\":130,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #130\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-23 09:45:01', '2024-08-23 09:46:28'),
(89, 'order_cancel_request', '{\"order_id\":130,\"message\":\"Ng\\u01b0\\u1eddi d\\u00f9ng y\\u00eau c\\u1ea7u h\\u1ee7y \\u0111\\u01a1n h\\u00e0ng #130.\"}', 1, '2024-08-23 09:45:52', '2024-08-23 09:46:28'),
(90, 'account_update', '{\"user_id\":17,\"message\":\"B\\u1ea1n \\u0111\\u00e3 kh\\u00f3a t\\u00e0i kho\\u1ea3n ng\\u01b0\\u1eddi d\\u00f9ng v\\u1edbi ID: 19\"}', 1, '2024-08-23 09:59:18', '2024-08-23 09:59:21'),
(91, 'account_update', '{\"user_id\":17,\"message\":\"B\\u1ea1n \\u0111\\u00e3 kh\\u00f3a t\\u00e0i kho\\u1ea3n ng\\u01b0\\u1eddi d\\u00f9ng v\\u1edbi ID: 19\"}', 1, '2024-08-23 10:09:13', '2024-08-23 10:09:26'),
(92, 'new_message', '{\"user_id\":\"19\",\"message\":\"C\\u00f3 tin nh\\u1eafn t\\u1eeb ng\\u01b0\\u1eddi d\\u00f9ng #19\"}', 1, '2024-08-23 10:44:36', '2024-08-23 10:44:44'),
(93, 'account_update', '{\"user_id\":17,\"message\":\"B\\u1ea1n \\u0111\\u00e3 m\\u1edf kh\\u00f3a t\\u00e0i kho\\u1ea3n ng\\u01b0\\u1eddi d\\u00f9ng v\\u1edbi ID: 19\"}', 1, '2024-08-23 11:26:40', '2024-08-23 11:26:42'),
(94, 'account_update', '{\"user_id\":17,\"message\":\"B\\u1ea1n \\u0111\\u00e3 kh\\u00f3a t\\u00e0i kho\\u1ea3n ng\\u01b0\\u1eddi d\\u00f9ng v\\u1edbi ID: 19\"}', 1, '2024-08-23 11:26:55', '2024-08-23 11:26:57'),
(95, 'đã đặt hàng', '{\"order_id\":131,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #131\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-25 10:32:30', '2024-08-29 04:21:49'),
(96, 'shipping_update', '{\"order_id\":131,\"message\":\"Tr\\u1ea1ng th\\u00e1i \\u0111\\u01a1n h\\u00e0ng \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c c\\u1eadp nh\\u1eadt l\\u00e0 :\\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao h\\u00e0ng th\\u00e0nh c\\u00f4ng.\"}', 1, '2024-08-25 10:44:25', '2024-08-29 04:21:49'),
(97, 'đã đặt hàng', '{\"order_id\":132,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #132\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 10:53:36', '2024-08-29 04:21:49'),
(98, 'đã đặt hàng', '{\"order_id\":133,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #133\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:02:45', '2024-08-29 04:21:49'),
(99, 'đã đặt hàng', '{\"order_id\":134,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #134\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:04:04', '2024-08-29 04:21:49'),
(100, 'đã đặt hàng', '{\"order_id\":135,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #135\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:04:58', '2024-08-29 04:21:49'),
(101, 'đã đặt hàng', '{\"order_id\":136,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #136\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:08:46', '2024-08-29 04:21:49'),
(102, 'đã đặt hàng', '{\"order_id\":137,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #137\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:11:45', '2024-08-29 04:21:49'),
(103, 'đã đặt hàng', '{\"order_id\":138,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #138\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:13:57', '2024-08-29 04:21:49'),
(104, 'đã đặt hàng', '{\"order_id\":139,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #139\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:16:43', '2024-08-29 04:21:49'),
(105, 'đã đặt hàng', '{\"order_id\":140,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #140\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:25:04', '2024-08-29 04:21:49'),
(106, 'đã đặt hàng', '{\"order_id\":141,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #141\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:28:20', '2024-08-29 04:21:49'),
(107, 'đã đặt hàng', '{\"order_id\":142,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #142\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:33:40', '2024-08-29 04:21:49'),
(108, 'đã đặt hàng', '{\"order_id\":143,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #143\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:52:25', '2024-08-30 09:16:12'),
(109, 'đã đặt hàng', '{\"order_id\":144,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #144\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:54:27', '2024-08-29 04:21:49'),
(110, 'đã đặt hàng', '{\"order_id\":145,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #145\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 11:55:18', '2024-08-29 04:21:49'),
(111, 'đã đặt hàng', '{\"order_id\":146,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #146\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 12:03:05', '2024-08-29 04:21:49'),
(112, 'đã đặt hàng', '{\"order_id\":147,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #147\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-28 13:17:13', '2024-08-29 04:21:49'),
(113, 'đã đặt hàng', '{\"order_id\":148,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #148\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-29 02:21:29', '2024-08-29 04:21:49'),
(114, 'đã đặt hàng', '{\"order_id\":149,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #149\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-29 02:26:30', '2024-08-29 04:21:49'),
(115, 'đã đặt hàng', '{\"order_id\":150,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #150\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-29 02:41:32', '2024-08-29 04:21:49'),
(118, 'đã đặt hàng', '{\"order_id\":153,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #153\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-29 03:01:02', '2024-08-30 09:16:15'),
(119, 'đã đặt hàng', '{\"order_id\":154,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #154\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-08-29 03:02:34', '2024-08-29 04:21:49'),
(122, 'shipping_update', '{\"order_id\":155,\"message\":\"Tr\\u1ea1ng th\\u00e1i 155 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c c\\u1eadp nh\\u1eadt l\\u00e0 :\\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao h\\u00e0ng th\\u00e0nh c\\u00f4ng.\"}', 1, '2024-08-29 10:23:13', '2024-08-30 09:15:49'),
(123, 'account_update', '{\"user_id\":17,\"message\":\"B\\u1ea1n \\u0111\\u00e3 kh\\u00f3a t\\u00e0i kho\\u1ea3n ng\\u01b0\\u1eddi d\\u00f9ng v\\u1edbi ID: 20\"}', 1, '2024-08-30 10:04:58', '2024-08-30 11:06:53'),
(124, 'account_update', '{\"user_id\":17,\"message\":\"B\\u1ea1n \\u0111\\u00e3 m\\u1edf kh\\u00f3a t\\u00e0i kho\\u1ea3n ng\\u01b0\\u1eddi d\\u00f9ng v\\u1edbi ID: 20\"}', 1, '2024-08-30 10:05:00', '2024-08-30 11:06:53'),
(125, 'new_message', '{\"user_id\":\"20\",\"message\":\"C\\u00f3 tin nh\\u1eafn m\\u1edbi t\\u1eeb ng\\u01b0\\u1eddi d\\u00f9ng #20\"}', 1, '2024-08-30 10:05:22', '2024-08-30 11:06:53'),
(126, 'new_message', '{\"user_id\":\"20\",\"message\":\"C\\u00f3 tin nh\\u1eafn m\\u1edbi t\\u1eeb ng\\u01b0\\u1eddi d\\u00f9ng #20\"}', 1, '2024-08-30 10:05:23', '2024-08-30 11:06:53'),
(127, 'new_message', '{\"user_id\":\"20\",\"message\":\"C\\u00f3 tin nh\\u1eafn m\\u1edbi t\\u1eeb ng\\u01b0\\u1eddi d\\u00f9ng #20\"}', 1, '2024-08-30 10:07:15', '2024-08-30 11:06:53'),
(128, 'account_update', '{\"user_id\":17,\"message\":\"B\\u1ea1n \\u0111\\u00e3 kh\\u00f3a t\\u00e0i kho\\u1ea3n ng\\u01b0\\u1eddi d\\u00f9ng v\\u1edbi ID: 20\"}', 1, '2024-08-30 11:08:50', '2024-08-31 11:44:29'),
(129, 'account_update', '{\"user_id\":17,\"message\":\"B\\u1ea1n \\u0111\\u00e3 m\\u1edf kh\\u00f3a t\\u00e0i kho\\u1ea3n ng\\u01b0\\u1eddi d\\u00f9ng v\\u1edbi ID: 20\"}', 1, '2024-08-30 11:08:59', '2024-08-31 11:44:29'),
(130, 'account_update', '{\"user_id\":17,\"message\":\"B\\u1ea1n \\u0111\\u00e3 m\\u1edf kh\\u00f3a t\\u00e0i kho\\u1ea3n ng\\u01b0\\u1eddi d\\u00f9ng v\\u1edbi ID: 19\"}', 1, '2024-09-01 04:33:22', '2024-09-01 04:33:25'),
(131, 'đã đặt hàng', '{\"order_id\":157,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #157\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-09-01 04:35:22', '2024-09-01 08:35:45'),
(132, 'đã đặt hàng', '{\"order_id\":158,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #158\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-09-01 08:32:52', '2024-09-01 08:35:45'),
(133, 'đã đặt hàng', '{\"order_id\":159,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #159\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-09-01 08:33:38', '2024-09-01 08:35:45'),
(134, 'đã đặt hàng', '{\"order_id\":160,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #160\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-09-01 08:34:21', '2024-09-01 08:35:45'),
(135, 'đã đặt hàng', '{\"order_id\":161,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #161\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-09-01 08:35:29', '2024-09-01 08:35:45'),
(136, 'đã đặt hàng', '{\"order_id\":162,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #162\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-09-01 08:37:16', '2024-09-01 08:40:09'),
(137, 'order_cancel_request', '{\"order_id\":162,\"message\":\"Ng\\u01b0\\u1eddi d\\u00f9ng y\\u00eau c\\u1ea7u h\\u1ee7y \\u0111\\u01a1n h\\u00e0ng #162.\"}', 1, '2024-09-01 08:48:45', '2024-09-01 08:48:54'),
(144, 'đã đặt hàng', '{\"order_id\":163,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #163\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-09-01 08:54:51', '2024-09-01 08:55:12'),
(145, 'order_cancel_request', '{\"order_id\":163,\"message\":\"Ng\\u01b0\\u1eddi d\\u00f9ng y\\u00eau c\\u1ea7u h\\u1ee7y \\u0111\\u01a1n h\\u00e0ng #163.\"}', 1, '2024-09-01 08:55:21', '2024-09-01 08:55:27'),
(146, 'shipping_update', '{\"order_id\":163,\"message\":\"Tr\\u1ea1ng th\\u00e1i \\u0111\\u01a1n h\\u00e0ng 163 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c c\\u1eadp nh\\u1eadt l\\u00e0 :\\u0110\\u01a1n h\\u00e0ng \\u0111\\u00e3 b\\u1ecb h\\u1ee7y. Vui l\\u00f2ng li\\u00ean h\\u1ec7 v\\u1edbi admin \\u0111\\u1ec3 \\u0111\\u01b0\\u1ee3c ho\\u00e0n ti\\u1ec1n..\"}', 1, '2024-09-01 08:55:47', '2024-09-01 08:58:10'),
(147, 'đã đặt hàng', '{\"order_id\":164,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #164\",\"order_details\":{\"username\":\"tran manh\",\"address\":\"ha noi\",\"phone\":\"0987654321\",\"email\":\"minh29122003@gmail.com\",\"note\":\"\"}}', 1, '2024-09-01 09:21:51', '2024-09-01 09:23:54'),
(148, 'shipping_update', '{\"order_id\":164,\"message\":\"Tr\\u1ea1ng th\\u00e1i \\u0111\\u01a1n h\\u00e0ng 164 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c c\\u1eadp nh\\u1eadt l\\u00e0 :\\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao h\\u00e0ng th\\u00e0nh c\\u00f4ng.\"}', 1, '2024-09-01 09:27:48', '2024-09-02 07:41:50'),
(149, 'đã đặt hàng', '{\"order_id\":165,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #165\",\"order_details\":{\"username\":\"manh123\",\"address\":\"hanoi bac tu liem\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-09-02 07:41:20', '2024-09-02 07:41:50'),
(150, 'shipping_update', '{\"order_id\":165,\"message\":\"Tr\\u1ea1ng th\\u00e1i \\u0111\\u01a1n h\\u00e0ng 165 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c c\\u1eadp nh\\u1eadt l\\u00e0 :\\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c v\\u1eadn chuy\\u1ec3n.\"}', 1, '2024-09-02 07:42:06', '2024-09-02 07:42:35'),
(151, 'shipping_update', '{\"order_id\":165,\"message\":\"Tr\\u1ea1ng th\\u00e1i \\u0111\\u01a1n h\\u00e0ng 165 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c c\\u1eadp nh\\u1eadt l\\u00e0 :\\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao cho ng\\u01b0\\u1eddi nh\\u1eadn.\"}', 1, '2024-09-02 07:42:22', '2024-09-02 07:42:35'),
(152, 'shipping_update', '{\"order_id\":165,\"message\":\"Tr\\u1ea1ng th\\u00e1i \\u0111\\u01a1n h\\u00e0ng 165 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c c\\u1eadp nh\\u1eadt l\\u00e0 :\\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao h\\u00e0ng th\\u00e0nh c\\u00f4ng.\"}', 1, '2024-09-02 07:42:26', '2024-09-02 07:42:35'),
(153, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #166\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-09-02 09:00:11', '2024-09-03 08:35:38'),
(154, 'đã đặt hàng', '{\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #167\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-09-02 09:03:12', '2024-09-03 08:35:38'),
(155, 'đã đặt hàng', '{\"order_id\":168,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #168\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-09-05 11:16:48', '2024-09-12 14:00:10'),
(156, 'đã đặt hàng', '{\"order_id\":169,\"message\":\"C\\u00f3 \\u0111\\u01a1n h\\u00e0ng m\\u1edbi! \\u0110\\u01a1n h\\u00e0ng #169\",\"order_details\":{\"username\":\"manh123\",\"address\":\"tan phong bx vp\",\"phone\":\"0987184285\",\"email\":\"manhtnph28511@fpt.edu.vn\",\"note\":\"\"}}', 1, '2024-09-12 14:21:35', '2024-09-12 14:22:24'),
(157, 'shipping_update', '{\"order_id\":169,\"message\":\"Tr\\u1ea1ng th\\u00e1i \\u0111\\u01a1n h\\u00e0ng 169 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c c\\u1eadp nh\\u1eadt l\\u00e0 :\\u0111\\u00e3 nh\\u1eadn v\\u00e0 \\u0111ang \\u0111ang x\\u1eed l\\u00ed.\"}', 1, '2024-09-12 14:22:36', '2024-09-12 14:25:12'),
(158, 'shipping_update', '{\"order_id\":169,\"message\":\"Tr\\u1ea1ng th\\u00e1i \\u0111\\u01a1n h\\u00e0ng 169 \\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c c\\u1eadp nh\\u1eadt l\\u00e0 :\\u0111\\u00e3 \\u0111\\u01b0\\u1ee3c giao h\\u00e0ng th\\u00e0nh c\\u00f4ng.\"}', 1, '2024-09-12 14:22:52', '2024-09-12 14:25:12'),
(159, 'account_update', '{\"user_id\":17,\"message\":\"B\\u1ea1n \\u0111\\u00e3 kh\\u00f3a t\\u00e0i kho\\u1ea3n ng\\u01b0\\u1eddi d\\u00f9ng v\\u1edbi ID: 20\"}', 1, '2024-09-12 14:24:40', '2024-09-12 14:25:12'),
(160, 'account_update', '{\"user_id\":17,\"message\":\"B\\u1ea1n \\u0111\\u00e3 m\\u1edf kh\\u00f3a t\\u00e0i kho\\u1ea3n ng\\u01b0\\u1eddi d\\u00f9ng v\\u1edbi ID: 20\"}', 1, '2024-09-12 14:25:32', '2024-09-14 07:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `orders` (`id`, `user_id`, `username`, `phone`, `email`, `address`, `note`, `order_status`, `shipment_status`, `payment_method`, `created_at`, `updated_at`) VALUES
(2, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'PENDING', 'DELIVERED', 'COD', '2024-07-24 13:39:45', '2024-08-05 19:13:22'),
(3, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'PENDING', 'RETURNED', 'COD', '2024-07-24 13:56:04', '2024-08-05 19:11:52'),
(4, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'PENDING', 'DELIVERED', 'COD', '2024-07-24 14:03:13', '2024-08-05 19:13:01'),
(5, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'success', 'DELIVERED', 'COD', '2024-07-24 14:07:26', '2024-08-22 09:11:11'),
(6, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'success', 'DELIVERED', 'COD', '2024-07-24 14:10:04', '2024-08-05 19:14:19'),
(7, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'cancel', 'RETURNED', 'COD', '2024-07-24 14:12:49', '2024-08-05 19:14:49'),
(8, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'PENDING', 'EXCEPTION', 'COD', '2024-07-24 14:16:21', '2024-08-22 09:18:03'),
(9, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'success', 'DELIVERED', 'COD', '2024-07-24 14:20:32', '2024-08-22 09:17:56'),
(10, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'success', 'DELIVERED', 'COD', '2024-07-24 16:53:16', '2024-08-22 09:38:52'),
(11, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'success', 'DELIVERED', 'COD', '2024-07-24 16:56:12', '2024-08-22 09:38:38'),
(12, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 16:58:57', '2024-07-24 16:58:57'),
(13, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 17:02:52', '2024-07-24 17:02:52'),
(14, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 17:10:30', '2024-07-24 17:10:30'),
(15, 6, 'tran manh', '0987184285', '', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-07-24 17:15:03', '2024-07-24 17:15:03'),
(25, 19, 'tran manh', '0987654321', '', 'ha noi', 'ko co', 'PENDING', 'SHIPPED', 'COD', '2024-08-04 02:28:20', '2024-08-04 02:37:54'),
(26, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'null', '2024-08-04 02:58:07', '2024-08-04 02:58:07'),
(27, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-04 02:58:43', '2024-08-04 02:58:43'),
(33, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-04 03:01:41', '2024-08-04 03:01:41'),
(34, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-04 03:02:00', '2024-08-04 03:02:00'),
(35, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'success', 'DELIVERED', 'null', '2024-08-04 03:02:08', '2024-08-22 09:40:09'),
(38, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'RETURNED', 'COD', '2024-08-04 03:07:07', '2024-08-05 19:11:31'),
(40, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'null', '2024-08-04 03:08:02', '2024-08-04 03:08:02'),
(41, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-04 03:08:55', '2024-08-04 03:08:55'),
(42, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-04 03:10:07', '2024-08-04 03:10:07'),
(44, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-04 03:11:05', '2024-08-04 03:11:05'),
(48, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-04 03:20:23', '2024-08-04 03:20:23'),
(54, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'cancel', 'CANCEL', 'Credit_card', '2024-08-04 03:35:26', '2024-08-22 10:17:08'),
(55, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-04 03:35:56', '2024-08-04 03:35:56'),
(56, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'RETURNED', 'Credit_card', '2024-08-04 03:38:31', '2024-08-05 19:09:02'),
(57, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-04 03:39:14', '2024-08-04 03:39:14'),
(58, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'success', 'DELIVERED', 'Credit_card', '2024-08-05 20:27:54', '2024-08-05 20:29:07'),
(59, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-06 03:29:36', '2024-08-06 03:29:36'),
(60, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-06 03:30:37', '2024-08-06 03:30:37'),
(61, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'success', 'DELIVERED', 'COD', '2024-08-06 03:41:08', '2024-08-07 03:21:51'),
(62, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-06 03:41:55', '2024-08-06 03:41:55'),
(63, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-06 03:42:33', '2024-08-06 03:42:33'),
(64, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-06 03:45:51', '2024-08-06 03:45:51'),
(65, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-06 03:47:47', '2024-08-06 03:47:47'),
(66, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-06 03:51:59', '2024-08-06 03:51:59'),
(67, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-06 03:52:06', '2024-08-06 03:52:06'),
(68, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-06 03:53:02', '2024-08-06 03:53:02'),
(69, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-07 05:27:44', '2024-08-07 05:27:44'),
(70, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'OUTFORDELIVERY', 'COD', '2024-08-08 04:32:41', '2024-08-08 19:13:00'),
(71, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-08 19:29:37', '2024-08-08 19:29:37'),
(72, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-08 21:26:37', '2024-08-08 21:26:37'),
(73, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-08 21:30:35', '2024-08-08 21:30:35'),
(74, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'success', 'DELIVERED', 'Credit_card', '2024-08-08 21:33:35', '2024-08-08 21:37:44'),
(75, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-12 10:18:29', '2024-08-12 10:18:29'),
(76, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-08-12 10:19:54', '2024-08-12 10:19:54'),
(77, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-16 05:14:11', '2024-08-16 05:14:11'),
(78, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-16 05:14:18', '2024-08-16 05:14:18'),
(79, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-16 05:15:09', '2024-08-16 05:15:09'),
(80, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-16 05:16:40', '2024-08-16 05:16:40'),
(81, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-16 05:24:02', '2024-08-16 05:24:02'),
(82, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-16 05:24:23', '2024-08-16 05:24:23'),
(83, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-16 05:25:25', '2024-08-16 05:25:25'),
(84, 19, 'tran manh', '0987654321', '', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-16 05:26:01', '2024-08-16 05:26:01'),
(85, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-17 11:25:54', '2024-08-17 11:25:54'),
(86, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-20 09:45:48', '2024-08-20 09:45:48'),
(87, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-20 09:52:13', '2024-08-20 09:52:13'),
(88, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-20 10:01:15', '2024-08-20 10:01:15'),
(89, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-20 10:11:25', '2024-08-20 10:11:25'),
(90, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-20 10:18:54', '2024-08-20 10:18:54'),
(91, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-20 10:21:20', '2024-08-20 10:21:20'),
(92, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-20 10:22:53', '2024-08-20 10:22:53'),
(93, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-20 10:29:07', '2024-08-20 10:29:07'),
(94, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-20 10:38:07', '2024-08-20 10:38:07'),
(95, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-20 10:38:08', '2024-08-20 10:38:08'),
(96, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 08:29:13', '2024-08-21 08:29:13'),
(97, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 08:29:38', '2024-08-21 08:29:38'),
(98, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'cancel', 'CANCEL', 'Credit_card', '2024-08-21 08:36:20', '2024-08-22 09:52:30'),
(99, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 08:37:29', '2024-08-21 08:37:29'),
(100, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 08:39:06', '2024-08-21 08:39:06'),
(101, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 08:43:20', '2024-08-21 08:43:20'),
(102, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 08:45:32', '2024-08-21 08:45:32'),
(103, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 08:48:24', '2024-08-21 08:48:24'),
(104, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 08:51:36', '2024-08-21 08:51:36'),
(105, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:02:09', '2024-08-21 09:02:09'),
(106, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:03:12', '2024-08-21 09:03:12'),
(107, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:09:04', '2024-08-21 09:09:04'),
(108, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:09:50', '2024-08-21 09:09:50'),
(109, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:13:24', '2024-08-21 09:13:24'),
(110, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:13:39', '2024-08-21 09:13:39'),
(111, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:17:24', '2024-08-21 09:17:24'),
(112, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:18:12', '2024-08-21 09:18:12'),
(113, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:18:26', '2024-08-21 09:18:26'),
(114, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:21:26', '2024-08-21 09:21:26'),
(115, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:21:50', '2024-08-21 09:21:50'),
(116, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:23:26', '2024-08-21 09:23:26'),
(117, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:25:31', '2024-08-21 09:25:31'),
(118, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:28:03', '2024-08-21 09:28:03'),
(119, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:32:50', '2024-08-21 09:32:50'),
(120, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:37:23', '2024-08-21 09:37:23'),
(121, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:47:44', '2024-08-21 09:47:44'),
(122, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:50:53', '2024-08-21 09:50:53'),
(123, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-21 09:54:37', '2024-08-21 09:54:37'),
(124, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-08-21 10:05:27', '2024-08-21 10:05:27'),
(125, 19, 'tran manh', '0987654321', 'manhtnph28511@fpt.edu.vn', 'ha noi', '', 'PENDING', 'DELAYED', 'Credit_card', '2024-08-22 08:27:24', '2024-08-22 10:39:30'),
(126, 19, 'tran manh', '0987654321', 'manhtnph28511@fpt.edu.vn', 'ha noi', '', 'cancel', 'DELIVERED', 'Credit_card', '2024-08-22 08:40:39', '2024-08-22 09:49:38'),
(127, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'cancel', 'DELIVERED', 'Credit_card', '2024-08-22 08:44:35', '2024-08-22 09:44:44'),
(128, 19, 'tran manh', '0987654321', 'manhtnph28511@fpt.edu.vn', 'ha noi', '', 'cancel', 'CANCEL', 'Credit_card', '2024-08-22 10:20:17', '2024-08-22 10:21:39'),
(129, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-22 11:11:53', '2024-08-22 11:11:53'),
(130, 19, 'tran manh', '0987654321', 'manhtnph28511@fpt.edu.vn', 'ha noi', '', 'cancel', 'CANCEL', 'Credit_card', '2024-08-23 09:44:54', '2024-08-23 09:46:58'),
(131, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'success', 'DELIVERED', 'Credit_card', '2024-08-25 10:32:25', '2024-08-25 10:44:25'),
(132, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 10:53:26', '2024-08-28 10:53:26'),
(133, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:02:41', '2024-08-28 11:02:41'),
(134, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:03:59', '2024-08-28 11:03:59'),
(135, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:04:52', '2024-08-28 11:04:52'),
(136, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:08:41', '2024-08-28 11:08:41'),
(137, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:11:41', '2024-08-28 11:11:41'),
(138, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:13:51', '2024-08-28 11:13:51'),
(139, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:16:38', '2024-08-28 11:16:38'),
(140, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:24:57', '2024-08-28 11:24:57'),
(141, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:28:08', '2024-08-28 11:28:08'),
(142, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:33:23', '2024-08-28 11:33:23'),
(143, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:52:16', '2024-08-28 11:52:16'),
(144, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:54:17', '2024-08-28 11:54:17'),
(145, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 11:55:13', '2024-08-28 11:55:13'),
(146, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 12:02:58', '2024-08-28 12:02:58'),
(147, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-28 13:17:08', '2024-08-28 13:17:08'),
(148, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-29 02:21:23', '2024-08-29 02:21:23'),
(149, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-29 02:26:16', '2024-08-29 02:26:16'),
(150, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-29 02:41:27', '2024-08-29 02:41:27'),
(151, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-29 02:45:13', '2024-08-29 02:45:13'),
(152, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-29 02:47:17', '2024-08-29 02:47:17'),
(153, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-29 03:00:54', '2024-08-29 03:00:54'),
(154, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'PACKED', 'Credit_card', '2024-08-29 03:02:29', '2024-08-29 03:02:29'),
(155, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'success', 'DELIVERED', 'COD', '2024-08-29 03:03:11', '2024-08-29 10:23:13'),
(156, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'success', 'DELIVERED', 'COD', '2024-08-29 03:05:19', '2024-08-29 09:15:15'),
(157, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-09-01 04:35:15', '2024-09-01 04:35:15'),
(158, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-09-01 08:32:37', '2024-09-01 08:32:37'),
(159, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-09-01 08:33:32', '2024-09-01 08:33:32'),
(160, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-09-01 08:34:14', '2024-09-01 08:34:14'),
(161, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'PENDING', 'PACKED', 'Credit_card', '2024-09-01 08:35:22', '2024-09-01 08:35:22'),
(162, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'success', 'DELIVERED', 'Credit_card', '2024-09-01 08:37:13', '2024-09-01 08:49:49'),
(163, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'cancel', 'CANCEL', 'Credit_card', '2024-09-01 08:54:37', '2024-09-01 08:55:47'),
(164, 19, 'tran manh', '0987654321', 'minh29122003@gmail.com', 'ha noi', '', 'success', 'DELIVERED', 'Credit_card', '2024-09-01 09:21:47', '2024-09-01 09:27:48'),
(165, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'hanoi bac tu liem', '', 'success', 'DELIVERED', 'Credit_card', '2024-09-02 07:41:05', '2024-09-02 07:42:26'),
(166, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-09-02 09:00:04', '2024-09-02 09:00:04'),
(167, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'COD', '2024-09-02 09:03:08', '2024-09-02 09:03:08'),
(168, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'PENDING', 'ORDERPLACE', 'Credit_card', '2024-09-05 11:16:39', '2024-09-05 11:16:39'),
(169, 20, 'manh123', '0987184285', 'manhtnph28511@fpt.edu.vn', 'tan phong bx vp', '', 'success', 'DELIVERED', 'Credit_card', '2024-09-12 14:21:25', '2024-09-12 14:22:52');

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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `total_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `pro_id`, `size_id`, `color_id`, `image`, `price`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(5, 25, 3, 2, 2, NULL, 480000, 1, 480000, '2024-08-04 02:28:20', '2024-08-04 02:28:20'),
(6, 26, 3, 2, 2, NULL, 480000, 1, 480000, '2024-08-04 02:58:07', '2024-08-04 02:58:07'),
(8, 35, 3, 1, 2, NULL, 480000, 1, 480000, '2024-08-04 03:02:08', '2024-08-04 03:02:08'),
(10, 40, 2, 3, 2, NULL, 141234, 1, 141234, '2024-08-04 03:08:02', '2024-08-04 03:08:02'),
(11, 41, 10, 1, 1, NULL, 230000, 1, 230000, '2024-08-04 03:08:55', '2024-08-04 03:08:55'),
(13, 44, 8, 1, 2, NULL, 320000, 1, 320000, '2024-08-04 03:11:05', '2024-08-04 03:11:05'),
(17, 48, 3, 1, 2, NULL, 480000, 1, 480000, '2024-08-04 03:20:23', '2024-08-04 03:20:23'),
(23, 54, 3, 2, 2, NULL, 480000, 1, 480000, '2024-08-04 03:35:26', '2024-08-04 03:35:26'),
(24, 55, 10, 1, 3, NULL, 230000, 1, 230000, '2024-08-04 03:35:56', '2024-08-04 03:35:56'),
(25, 56, 15, 2, 1, NULL, 141234, 1, 141234, '2024-08-04 03:38:31', '2024-08-04 03:38:31'),
(26, 57, 15, 2, 1, NULL, 141234, 1, 141234, '2024-08-04 03:39:14', '2024-08-04 03:39:14'),
(27, 58, 3, 2, 1, NULL, 480000, 1, 480000, '2024-08-05 20:27:54', '2024-08-05 20:29:07'),
(28, 59, 13, 1, 2, NULL, 900000, 1, 900000, '2024-08-06 03:29:36', '2024-08-06 03:29:36'),
(29, 60, 13, 1, 2, NULL, 900000, 1, 900000, '2024-08-06 03:30:37', '2024-08-06 03:30:37'),
(30, 61, 13, 1, 2, NULL, 900000, 1, 900000, '2024-08-06 03:41:08', '2024-08-07 03:21:51'),
(31, 62, 13, 1, 2, NULL, 900000, 1, 900000, '2024-08-06 03:41:55', '2024-08-06 03:41:55'),
(32, 64, 15, 2, 1, NULL, 141234, 1, 141234, '2024-08-06 03:45:51', '2024-08-06 03:45:51'),
(33, 65, 6, 1, 1, NULL, 530000, 1, 530000, '2024-08-06 03:47:47', '2024-08-06 03:47:47'),
(34, 66, 15, 2, 2, NULL, 141234, 1, 141234, '2024-08-06 03:51:59', '2024-08-06 03:51:59'),
(35, 67, 15, 2, 2, NULL, 141234, 1, 141234, '2024-08-06 03:52:06', '2024-08-06 03:52:06'),
(36, 68, 15, 2, 2, NULL, 141234, 1, 141234, '2024-08-06 03:53:03', '2024-08-06 03:53:03'),
(37, 69, 3, 2, 1, NULL, 480000, 1, 480000, '2024-08-07 05:27:44', '2024-08-07 05:27:44'),
(38, 70, 21, 2, 4, NULL, 300, 1, 300, '2024-08-08 04:32:41', '2024-08-08 19:12:32'),
(39, 70, 21, 2, 4, NULL, 300, 1, 300, '2024-08-08 04:32:41', '2024-08-08 19:12:32'),
(40, 71, 21, 3, 3, NULL, 300, 1, 300, '2024-08-08 19:29:37', '2024-08-08 19:29:37'),
(41, 71, 21, 3, 3, NULL, 300, 1, 300, '2024-08-08 19:29:37', '2024-08-08 19:29:37'),
(42, 72, 13, 3, 3, NULL, 900000, 1, 900000, '2024-08-08 21:26:37', '2024-08-08 21:26:37'),
(43, 72, 21, 2, 4, NULL, 300000, 2, 600000, '2024-08-08 21:26:37', '2024-08-08 21:26:37'),
(44, 73, 21, 2, 4, NULL, 300000, 1, 300000, '2024-08-08 21:30:35', '2024-08-08 21:30:35'),
(45, 73, 6, 5, 1, NULL, 530000, 2, 1060000, '2024-08-08 21:30:35', '2024-08-08 21:30:35'),
(46, 74, 13, 1, 1, NULL, 900000, 1, 900000, '2024-08-08 21:33:35', '2024-08-08 21:37:44'),
(47, 74, 21, 3, 3, NULL, 500, 1, 500, '2024-08-08 21:33:35', '2024-08-08 21:37:44'),
(48, 75, 21, 2, 4, NULL, 150, 1, 150, '2024-08-12 10:18:29', '2024-08-12 10:18:29'),
(49, 76, 17, 2, 3, NULL, 69999, 1, 69999, '2024-08-12 10:19:54', '2024-08-12 10:19:54'),
(50, 80, 21, 2, 4, NULL, 300000, 2, 600000, '2024-08-16 05:16:40', '2024-08-16 05:16:40'),
(51, 81, 21, 2, 4, NULL, 300000, 2, 600000, '2024-08-16 05:24:02', '2024-08-16 05:24:02'),
(52, 82, 21, 2, 4, NULL, 300000, 2, 600000, '2024-08-16 05:24:23', '2024-08-16 05:24:23'),
(53, 83, 21, 2, 4, NULL, 300000, 2, 600000, '2024-08-16 05:25:25', '2024-08-16 05:25:25'),
(54, 84, 21, 2, 4, NULL, 300000, 2, 600000, '2024-08-16 05:26:01', '2024-08-16 05:26:01'),
(55, 85, 21, 3, 3, NULL, 500, 1, 500, '2024-08-17 11:25:54', '2024-08-17 11:25:54'),
(56, 85, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-17 11:25:54', '2024-08-17 11:25:54'),
(57, 85, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-17 11:25:54', '2024-08-17 11:25:54'),
(58, 85, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-17 11:25:54', '2024-08-17 11:25:54'),
(59, 86, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-20 09:45:48', '2024-08-20 09:45:48'),
(60, 86, 21, 1, 1, NULL, 300000, 2, 600000, '2024-08-20 09:45:48', '2024-08-20 09:45:48'),
(61, 87, 3, 2, 4, NULL, 480000, 1, 384000, '2024-08-20 09:52:13', '2024-08-20 09:52:13'),
(62, 87, 21, 2, 4, NULL, 150, 1, 0, '2024-08-20 09:52:13', '2024-08-20 09:52:13'),
(63, 88, 3, 2, 4, NULL, 480000, 2, 960000, '2024-08-20 10:01:15', '2024-08-20 10:01:15'),
(64, 88, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-20 10:01:15', '2024-08-20 10:01:15'),
(65, 89, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-20 10:11:25', '2024-08-20 10:11:25'),
(66, 89, 21, 2, 4, NULL, 150, 1, 150, '2024-08-20 10:11:25', '2024-08-20 10:11:25'),
(67, 90, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-20 10:18:54', '2024-08-20 10:18:54'),
(68, 90, 21, 3, 3, NULL, 500, 2, 1000, '2024-08-20 10:18:54', '2024-08-20 10:18:54'),
(69, 91, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-20 10:21:20', '2024-08-20 10:21:20'),
(70, 91, 21, 2, 4, NULL, 150, 1, 150, '2024-08-20 10:21:20', '2024-08-20 10:21:20'),
(71, 92, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-20 10:22:53', '2024-08-20 10:22:53'),
(72, 92, 21, 2, 4, NULL, 150, 1, 150, '2024-08-20 10:22:53', '2024-08-20 10:22:53'),
(73, 93, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-20 10:29:07', '2024-08-20 10:29:07'),
(74, 94, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-20 10:38:07', '2024-08-20 10:38:07'),
(75, 95, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-20 10:38:08', '2024-08-20 10:38:08'),
(76, 96, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-21 08:29:13', '2024-08-21 08:29:13'),
(77, 96, 21, 3, 3, NULL, 500, 1, 500, '2024-08-21 08:29:13', '2024-08-21 08:29:13'),
(78, 97, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-21 08:29:38', '2024-08-21 08:29:38'),
(79, 97, 21, 3, 3, NULL, 500, 1, 500, '2024-08-21 08:29:38', '2024-08-21 08:29:38'),
(80, 98, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-21 08:36:20', '2024-08-21 08:36:20'),
(81, 98, 21, 3, 3, NULL, 500, 1, 500, '2024-08-21 08:36:20', '2024-08-21 08:36:20'),
(82, 99, 3, 2, 4, NULL, 480000, 2, 768000, '2024-08-21 08:37:29', '2024-08-21 08:37:29'),
(83, 100, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 08:39:06', '2024-08-21 08:39:06'),
(84, 101, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 08:43:20', '2024-08-21 08:43:20'),
(85, 102, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 08:45:32', '2024-08-21 08:45:32'),
(86, 103, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 08:48:24', '2024-08-21 08:48:24'),
(87, 104, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 08:51:36', '2024-08-21 08:51:36'),
(88, 105, 3, 2, 4, NULL, 480000, 2, 960000, '2024-08-21 09:02:09', '2024-08-21 09:02:09'),
(89, 106, 3, 2, 4, NULL, 480000, 2, 960000, '2024-08-21 09:03:12', '2024-08-21 09:03:12'),
(90, 107, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 09:09:04', '2024-08-21 09:09:04'),
(91, 108, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 09:09:50', '2024-08-21 09:09:50'),
(92, 109, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 09:13:24', '2024-08-21 09:13:24'),
(93, 110, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 09:13:39', '2024-08-21 09:13:39'),
(94, 111, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 09:17:24', '2024-08-21 09:17:24'),
(95, 112, 3, 2, 4, NULL, 480000, 2, 960000, '2024-08-21 09:18:12', '2024-08-21 09:18:12'),
(96, 113, 3, 2, 4, NULL, 480000, 2, 960000, '2024-08-21 09:18:26', '2024-08-21 09:18:26'),
(97, 114, 3, 2, 4, NULL, 480000, 2, 960000, '2024-08-21 09:21:26', '2024-08-21 09:21:26'),
(98, 115, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 09:21:50', '2024-08-21 09:21:50'),
(99, 116, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 09:23:26', '2024-08-21 09:23:26'),
(100, 117, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 09:25:31', '2024-08-21 09:25:31'),
(101, 118, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 09:28:03', '2024-08-21 09:28:03'),
(102, 119, 3, 2, 4, NULL, 480000, 2, 959600, '2024-08-21 09:32:50', '2024-08-21 09:32:50'),
(103, 120, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-21 09:37:23', '2024-08-21 09:37:23'),
(104, 121, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-21 09:47:44', '2024-08-21 09:47:44'),
(105, 122, 21, 1, 1, NULL, 300000, 2, 600000, '2024-08-21 09:50:53', '2024-08-21 09:50:53'),
(106, 123, 21, 1, 1, NULL, 300000, 2, 600000, '2024-08-21 09:54:37', '2024-08-21 09:54:37'),
(107, 124, 3, 2, 4, NULL, 480000, 2, 864000, '2024-08-21 10:05:27', '2024-08-21 10:05:27'),
(108, 125, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-22 08:27:24', '2024-08-22 08:27:24'),
(109, 126, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-22 08:40:39', '2024-08-22 08:40:39'),
(110, 127, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-22 08:44:35', '2024-08-22 08:44:35'),
(111, 128, 21, 2, 4, NULL, 150, 1, 150, '2024-08-22 10:20:17', '2024-08-22 10:20:17'),
(112, 128, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-22 10:20:17', '2024-08-22 10:20:17'),
(113, 129, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-22 11:11:53', '2024-08-22 11:11:53'),
(114, 130, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-23 09:44:54', '2024-08-23 09:44:54'),
(115, 131, 3, 2, 4, NULL, 480000, 1, 480000, '2024-08-25 10:32:25', '2024-08-25 10:32:25'),
(116, 132, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 10:53:26', '2024-08-28 10:53:26'),
(117, 132, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 10:53:26', '2024-08-28 10:53:26'),
(118, 133, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:02:41', '2024-08-28 11:02:41'),
(119, 133, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:02:41', '2024-08-28 11:02:41'),
(120, 134, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:03:59', '2024-08-28 11:03:59'),
(121, 134, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:03:59', '2024-08-28 11:03:59'),
(122, 135, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:04:52', '2024-08-28 11:04:52'),
(123, 135, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:04:52', '2024-08-28 11:04:52'),
(124, 136, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:08:41', '2024-08-28 11:08:41'),
(125, 136, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:08:41', '2024-08-28 11:08:41'),
(126, 137, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:11:41', '2024-08-28 11:11:41'),
(127, 137, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:11:41', '2024-08-28 11:11:41'),
(128, 138, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:13:51', '2024-08-28 11:13:51'),
(129, 138, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:13:51', '2024-08-28 11:13:51'),
(130, 139, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:16:38', '2024-08-28 11:16:38'),
(131, 139, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:16:38', '2024-08-28 11:16:38'),
(132, 140, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:24:57', '2024-08-28 11:24:57'),
(133, 140, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:24:57', '2024-08-28 11:24:57'),
(134, 141, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:28:09', '2024-08-28 11:28:09'),
(135, 141, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:28:09', '2024-08-28 11:28:09'),
(136, 142, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:33:23', '2024-08-28 11:33:23'),
(137, 142, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:33:23', '2024-08-28 11:33:23'),
(138, 143, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:52:16', '2024-08-28 11:52:16'),
(139, 143, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:52:16', '2024-08-28 11:52:16'),
(140, 144, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:54:17', '2024-08-28 11:54:17'),
(141, 144, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:54:17', '2024-08-28 11:54:17'),
(142, 145, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 11:55:13', '2024-08-28 11:55:13'),
(143, 145, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 11:55:13', '2024-08-28 11:55:13'),
(144, 146, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 12:02:58', '2024-08-28 12:02:58'),
(145, 146, 21, 2, 4, NULL, 150, 2, 300, '2024-08-28 12:02:58', '2024-08-28 12:02:58'),
(146, 147, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-28 13:17:08', '2024-08-28 13:17:08'),
(147, 147, 21, 2, 4, NULL, 300, 1, 300, '2024-08-28 13:17:08', '2024-08-28 13:17:08'),
(148, 148, 21, 1, 1, NULL, 300000, 1, 300000, '2024-08-29 02:21:23', '2024-08-29 02:21:23'),
(149, 148, 21, 2, 4, NULL, 300, 1, 300, '2024-08-29 02:21:23', '2024-08-29 02:21:23'),
(150, 149, 21, 1, 1, 'https://res.cloudinary.com/denxdub1l/image/upload/v1722853863/Cara/Products/f0guuvvtcr6n7eftyjm2.jpg', 300000, 1, 300000, '2024-08-29 02:26:16', '2024-08-29 02:26:16'),
(151, 149, 21, 2, 4, 'https://res.cloudinary.com/denxdub1l/image/upload/v1724849212/Cara/Products/o6v04numvqtu73lclqum.jpg', 300, 1, 300, '2024-08-29 02:26:16', '2024-08-29 02:26:16'),
(152, 150, 21, 2, 4, NULL, 300, 1, 300, '2024-08-29 02:41:27', '2024-08-29 02:41:27'),
(153, 151, 21, 2, 4, 'https://res.cloudinary.com/denxdub1l/image/upload/v1724849212/Cara/Products/o6v04numvqtu73lclqum.jpg', 300, 1, 300, '2024-08-29 02:45:13', '2024-08-29 02:45:13'),
(154, 152, 21, 5, 5, 'https://res.cloudinary.com/denxdub1l/image/upload/v1724849456/Cara/Products/eg6abqtdh2bnptncxylt.jpg', 141234, 1, 141234, '2024-08-29 02:47:18', '2024-08-29 02:47:18'),
(155, 153, 21, 1, 1, 'https://res.cloudinary.com/denxdub1l/image/upload/v1722853863/Cara/Products/f0guuvvtcr6n7eftyjm2.jpg', 300000, 1, 270000, '2024-08-29 03:00:54', '2024-08-29 03:00:54'),
(156, 154, 21, 1, 1, 'https://res.cloudinary.com/denxdub1l/image/upload/v1722853863/Cara/Products/f0guuvvtcr6n7eftyjm2.jpg', 300000, 1, 270000, '2024-08-29 03:02:29', '2024-08-29 03:02:29'),
(157, 155, 21, 1, 1, 'https://res.cloudinary.com/denxdub1l/image/upload/v1722853863/Cara/Products/f0guuvvtcr6n7eftyjm2.jpg', 300000, 1, 270000, '2024-08-29 03:03:11', '2024-08-29 03:03:11'),
(158, 156, 21, 1, 1, 'https://res.cloudinary.com/denxdub1l/image/upload/v1722853863/Cara/Products/f0guuvvtcr6n7eftyjm2.jpg', 300000, 1, 270000, '2024-08-29 03:05:19', '2024-08-29 03:05:19'),
(159, 157, 23, 2, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725159822/MWSPORT/Products/yrqnhex3x3yuzizwwmj2.jpg', 200000, 1, 200000, '2024-09-01 04:35:15', '2024-09-01 04:35:15'),
(160, 158, 23, 2, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725159822/MWSPORT/Products/yrqnhex3x3yuzizwwmj2.jpg', 200000, 1, 200000, '2024-09-01 08:32:37', '2024-09-01 08:32:37'),
(161, 159, 23, 2, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725159822/MWSPORT/Products/yrqnhex3x3yuzizwwmj2.jpg', 200000, 1, 200000, '2024-09-01 08:33:32', '2024-09-01 08:33:32'),
(162, 160, 23, 2, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725159822/MWSPORT/Products/yrqnhex3x3yuzizwwmj2.jpg', 200000, 1, 200000, '2024-09-01 08:34:14', '2024-09-01 08:34:14'),
(163, 161, 23, 2, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725159822/MWSPORT/Products/yrqnhex3x3yuzizwwmj2.jpg', 200000, 1, 200000, '2024-09-01 08:35:22', '2024-09-01 08:35:22'),
(164, 162, 23, 2, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725159822/MWSPORT/Products/yrqnhex3x3yuzizwwmj2.jpg', 200000, 1, 200000, '2024-09-01 08:37:13', '2024-09-01 08:37:13'),
(165, 163, 23, 3, 4, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725159867/MWSPORT/Products/tvxikemfjz79woyyhrui.jpg', 300000, 1, 300000, '2024-09-01 08:54:37', '2024-09-01 08:54:37'),
(166, 164, 21, 2, 3, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725181584/MWSPORT/Products/awjtpzy3uc9ib0of5wej.jpg', 14000, 1, 14000, '2024-09-01 09:21:47', '2024-09-01 09:21:47'),
(167, 164, 23, 2, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725159822/MWSPORT/Products/yrqnhex3x3yuzizwwmj2.jpg', 200000, 1, 200000, '2024-09-01 09:21:47', '2024-09-01 09:21:47'),
(168, 165, 23, 2, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725159822/MWSPORT/Products/yrqnhex3x3yuzizwwmj2.jpg', 200000, 1, 200000, '2024-09-02 07:41:05', '2024-09-02 07:41:05'),
(169, 165, 21, 2, 4, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725181615/MWSPORT/Products/ht1yxve7p8uoplmesekn.jpg', 300, 1, 300, '2024-09-02 07:41:05', '2024-09-02 07:41:05'),
(170, 166, 21, 2, 4, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725181615/MWSPORT/Products/ht1yxve7p8uoplmesekn.jpg', 300, 1, 300, '2024-09-02 09:00:04', '2024-09-02 09:00:04'),
(171, 167, 21, 2, 3, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725181584/MWSPORT/Products/awjtpzy3uc9ib0of5wej.jpg', 14000, 1, 14000, '2024-09-02 09:03:08', '2024-09-02 09:03:08'),
(172, 168, 25, 3, 4, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725354903/MWSPORT/Products/y3wdpvwtojgfhtaflkfk.jpg', 450000, 1, 360000, '2024-09-05 11:16:39', '2024-09-05 11:16:39'),
(173, 169, 25, 3, 4, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725354903/MWSPORT/Products/y3wdpvwtojgfhtaflkfk.jpg', 450000, 1, 405000, '2024-09-12 14:21:25', '2024-09-12 14:21:25'),
(174, 169, 23, 1, 6, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725098847/MWSPORT/Products/tuifk45vrbv5h1y0rkhs.jpg', 150000, 1, 135000, '2024-09-12 14:21:25', '2024-09-12 14:21:25');

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
(19, 74, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-08 21:37:44', '2024-08-08 21:37:44', NULL),
(20, 5, 17, 'Đơn hàng đã gặp vấn đề hoặc ngoại lệ trong quá trình vận chuyển.', '2024-08-22 09:11:04', '2024-08-22 09:11:04', NULL),
(21, 5, 17, 'Đơn hàng đã được hoàn trả lại cho người gửi.', '2024-08-22 09:11:07', '2024-08-22 09:11:07', NULL),
(22, 5, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-22 09:11:11', '2024-08-22 09:11:11', NULL),
(23, 9, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-22 09:17:56', '2024-08-22 09:17:56', NULL),
(24, 10, 17, 'Đơn hàng đã bị trễ hẹn trong quá trình vận chuyển.', '2024-08-22 09:20:13', '2024-08-22 09:20:13', NULL),
(25, 11, 17, 'Đơn hàng đã được giao cho người nhận.', '2024-08-22 09:24:17', '2024-08-22 09:24:17', NULL),
(26, 11, 17, 'Đơn hàng đã bị trễ hẹn trong quá trình vận chuyển.', '2024-08-22 09:26:12', '2024-08-22 09:26:12', NULL),
(27, 11, 17, 'Đơn hàng trạng thái không hợp lệ.', '2024-08-22 09:28:59', '2024-08-22 09:28:59', NULL),
(28, 11, 17, 'Đơn hàng trạng thái không hợp lệ.', '2024-08-22 09:29:02', '2024-08-22 09:29:02', NULL),
(29, 11, 17, 'Đơn hàng đã được giao cho người nhận.', '2024-08-22 09:29:06', '2024-08-22 09:29:06', NULL),
(30, 11, 17, 'Đơn hàng đã được hoàn trả lại cho người gửi.', '2024-08-22 09:32:34', '2024-08-22 09:32:34', NULL),
(31, 10, 17, 'Đơn hàng đã được hoàn trả lại cho người gửi.', '2024-08-22 09:32:52', '2024-08-22 09:32:52', NULL),
(32, 11, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-22 09:38:38', '2024-08-22 09:38:38', NULL),
(33, 10, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-22 09:38:52', '2024-08-22 09:38:52', NULL),
(34, 35, 17, 'Đơn hàng đơn hàng đã bị hủy.', '2024-08-22 09:39:14', '2024-08-22 09:39:14', NULL),
(35, 35, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-22 09:40:09', '2024-08-22 09:40:09', NULL),
(36, 127, 17, 'Đơn hàng đơn hàng đã bị hủy.', '2024-08-22 09:44:42', '2024-08-22 09:44:42', NULL),
(37, 126, 17, 'Đơn hàng đơn hàng đã bị hủy.', '2024-08-22 09:49:36', '2024-08-22 09:49:36', NULL),
(38, 98, 17, 'Đơn hàng đơn hàng đã bị hủy.', '2024-08-22 09:52:30', '2024-08-22 09:52:30', NULL),
(39, 54, 17, 'Đơn hàng đơn hàng đã bị hủy.', '2024-08-22 10:17:08', '2024-08-22 10:17:08', NULL),
(40, 128, 17, 'Đơn hàng đã bị trễ hẹn trong quá trình vận chuyển.', '2024-08-22 10:21:23', '2024-08-22 10:21:23', NULL),
(41, 128, 17, 'Đơn hàng đơn hàng đã bị hủy.', '2024-08-22 10:21:39', '2024-08-22 10:21:39', NULL),
(42, 125, 17, 'Đơn hàng đã được giao cho người nhận.', '2024-08-22 10:39:14', '2024-08-22 10:39:14', NULL),
(43, 125, 17, 'Đơn hàng đã bị trễ hẹn trong quá trình vận chuyển.', '2024-08-22 10:39:30', '2024-08-22 10:39:30', NULL),
(44, 130, 17, 'Đơn hàng đơn hàng đã bị hủy.', '2024-08-23 09:46:58', '2024-08-23 09:46:58', NULL),
(45, 131, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-25 10:44:25', '2024-08-25 10:44:25', NULL),
(46, 156, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-29 09:15:15', '2024-08-29 09:15:15', NULL),
(47, 155, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-08-29 10:23:13', '2024-08-29 10:23:13', NULL),
(48, 162, 17, 'Đơn hàng đơn hàng đã bị hủy.', '2024-09-01 08:49:17', '2024-09-01 08:49:17', NULL),
(49, 162, 17, 'Đơn hàng đã bị trễ hẹn trong quá trình vận chuyển.', '2024-09-01 08:49:31', '2024-09-01 08:49:31', NULL),
(50, 162, 17, 'Đơn hàng đơn hàng đã bị hủy.', '2024-09-01 08:49:35', '2024-09-01 08:49:35', NULL),
(51, 162, 17, 'Đơn hàng đã bị trễ hẹn trong quá trình vận chuyển.', '2024-09-01 08:49:43', '2024-09-01 08:49:43', NULL),
(52, 162, 17, 'Đơn hàng đơn hàng đã bị hủy.', '2024-09-01 08:49:45', '2024-09-01 08:49:45', NULL),
(53, 162, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-09-01 08:49:49', '2024-09-01 08:49:49', NULL),
(54, 163, 17, 'Đơn hàng Đơn hàng đã bị hủy. Vui lòng liên hệ với admin để được hoàn tiền..', '2024-09-01 08:55:47', '2024-09-01 08:55:47', NULL),
(55, 164, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-09-01 09:27:48', '2024-09-01 09:27:48', NULL),
(56, 165, 17, 'Đơn hàng đã được vận chuyển.', '2024-09-02 07:42:06', '2024-09-02 07:42:06', NULL),
(57, 165, 17, 'Đơn hàng đã được giao cho người nhận.', '2024-09-02 07:42:22', '2024-09-02 07:42:22', NULL),
(58, 165, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-09-02 07:42:26', '2024-09-02 07:42:26', NULL),
(59, 169, 17, 'Đơn hàng đã nhận và đang đang xử lí.', '2024-09-12 14:22:36', '2024-09-12 14:22:36', NULL),
(60, 169, 17, 'Đơn hàng đã được giao hàng thành công.', '2024-09-12 14:22:52', '2024-09-12 14:22:52', NULL);

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
('manhtnph28511@fpt.edu.vn', 'eyJpdiI6ImppNDZqN1d3VjdxUithMnhIb3dYT1E9PSIsInZhbHVlIjoiMm1rd205ZE5IYWF5MGpTd0VwejNlb1ZKTzNLNXYxZ1RTMkNoOE8wVEF2ND0iLCJtYWMiOiJmZGY5NDFhMjY0OTEwYzNiOGQ5OTUwYWFkNGI5NjE1ZTc2N2FmNmM5YTVhODkyMGMxNjgzZjExZDA5MmQ4MmFhIiwidGFnIjoiIn0=', '2024-09-03 02:25:14');

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
(1, 'Áo thun thể thao', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725683342/MWSPORT/Products/bm6zq0yuetplo9vvuza3.jpg', 141234.00, 10, '<p><strong>Form Dáng</strong>: Regular Fit.</p><p><strong>Chất liệu:</strong></p><blockquote><ul><li>Định lượng: 330gsm (Dày dặn, xốp, phồng đứng form)</li><li>Thành phần: 35% Cotton - 65% Polyester</li></ul></blockquote><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Thoáng khí và thấm hút cao: Bề mặt vải được dệt mắt lô kim to giúp thoáng khi tuyệt đối cao.</li><li>Vải có 2 bề mặt khác nhau<ul><li>Bề mặt ngoài: Sợi cotton được dệt waffle tạo độ xốp, phồng đứng form áo.</li><li>Bề mặt bên trong: Sợi polyester dệt mịn, trơn vải dạm da mượt, mát, thoáng khí, chống nhăn sau khi giặt.</li></ul></li><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt cùng với chi tiết sọc.</li><li>Dáng regular fit thoải mái.</li><li>Logo TOBI Regular 2024 được in nhung nổi cao thành, chắn chắn.</li></ul></blockquote>', 29, 'cartoon-astronaut-t-shirts', 6, 1, 3, 1, 1, NULL, '2024-07-27 20:34:56', '2024-09-07 09:48:19'),
(2, 'Giày cao cổ thể thao', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725683181/MWSPORT/Products/anldg8x9nls5rohczmxc.jpg', 140000.00, 23, '<p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Thoáng khí và thấm hút cao: Bề mặt vải được dệt mắt lô kim to giúp thoáng khi tuyệt đối cao.</li><li>Vải có 2 bề mặt khác nhau<ul><li>Bề mặt ngoài: Sợi cotton được dệt waffle tạo độ xốp, phồng đứng form áo.</li><li>Bề mặt bên trong: Sợi polyester dệt mịn, trơn vải dạm da mượt, mát, thoáng khí, chống nhăn sau khi giặt.</li></ul></li><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt cùng với chi tiết sọc.</li><li>Dáng regular fit thoải mái.</li><li>Logo TOBI Regular 2024 được in nhung nổi cao thành, chắn chắn.</li></ul></blockquote>', 70, 'cartoon-astronaut-t-shirts', 22, 1, 4, 3, 1, NULL, '2024-07-27 20:52:33', '2024-09-07 09:06:53'),
(3, 'Quần thể thao', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682935/MWSPORT/Products/p4nfehboztm80ymlp6zg.jpg', 480000.00, 80, '<p><strong>Form Dáng</strong>: Oversize</p><p><strong>Chất liệu</strong>: &nbsp;100 % Polyester</p><p><strong>Chi tiết sản phẩm</strong>:</p><blockquote><ul><li>Hình in đa dạng</li><li>Phần lai áo được may xẻ tà và có nút bấm.</li></ul></blockquote><p>&nbsp;</p>', 62, 'tobi-ragular-raincoat', 9, 2, 4, 2, 1, NULL, '2024-07-28 21:22:53', '2024-09-12 14:43:22'),
(4, 'Áo thun thể thao', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682753/MWSPORT/Products/rcdjlwvqcbcd4ogkgkqs.jpg', 430000.00, 10, '<p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Thoáng khí và thấm hút cao: Bề mặt vải được dệt mắt lô kim to giúp thoáng khi tuyệt đối cao.</li><li>Vải có 2 bề mặt khác nhau<ul><li>Bề mặt ngoài: Sợi cotton được dệt waffle tạo độ xốp, phồng đứng form áo.</li><li>Bề mặt bên trong: Sợi polyester dệt mịn, trơn vải dạm da mượt, mát, thoáng khí, chống nhăn sau khi giặt.</li></ul></li><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt cùng với chi tiết sọc.</li><li>Dáng regular fit thoải mái.</li><li>Logo TOBI Regular 2024 được in nhung nổi cao thành, chắn chắn.</li></ul></blockquote>', 31, 'waffle-stripped-polo-grude', 6, 2, 8, 4, 2, NULL, '2024-07-28 21:24:38', '2024-09-07 04:19:00'),
(5, 'Áo thi đấu clb PSG', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682552/MWSPORT/Products/z16jlshysthj5gnu7dst.jpg', 450000.00, 32, '<p><strong>Form Dáng:</strong>&nbsp;Boxy Fit.</p><ul><li>Chất liệu: 70% Cotton 30% Nylon</li><li>Định lượng: 161GSM</li></ul><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Form dáng Boxy chia tỉ lệ cơ thể 1/3 giúp tôn dáng người mặc</li><li>In vân đá</li></ul></blockquote>', 3, 'tegular-typo-cuban-shirt', 7, 7, 9, 4, 2, NULL, '2024-07-28 21:44:37', '2024-09-07 09:42:24'),
(6, 'Áo thi đấu Bayern Munich', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682340/MWSPORT/Products/o1gfrby0lhe72dxdpadq.jpg', 530000.00, 22, '<p><strong>Form dáng:</strong> Boxy Fit.</p><p><strong>Chất liệu:</strong> Lụa D100</p><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Form dáng Boxy chia tỉ lệ cơ thể 1/3 giúp tôn dáng người mặc&nbsp;</li><li>Áo được in overprinted toàn bộ áo</li><li>Hoạ tiết trên áo mang hơi hướng summer vibe&nbsp;</li></ul></blockquote>', 24, 'highclass-cuban-shirt', 8, 4, 4, 5, 1, NULL, '2024-07-28 21:46:46', '2024-09-07 10:32:28'),
(7, 'Áo thi đấu Bayern munchen', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725681849/MWSPORT/Products/sgfwz0gaimv5drrafywf.jpg', 299000.00, 22, '<p><strong>Form Dáng</strong>: Boxy Fit.</p><p><strong>Chất liệu:</strong></p><blockquote><ul><li>Định lượng: 250GSM</li><li>Thành phần: 100% Cotton - 2 Chiều.</li></ul></blockquote><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Bo cổ dệt định lượng dày, chắc chắn, hạn chế nhão &amp; co rút sau khi giặt.</li><li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li><li>Logo&nbsp;<strong>TOBI®</strong>&nbsp;màu kem in nổi cao thành, chắc chắn.</li></ul></blockquote>', 19, 'tobi-basic-boxy-t-shirt', 8, 5, 2, 5, 1, NULL, '2024-07-28 21:48:47', '2024-09-07 10:32:15'),
(8, 'Áo thi đấu clb Juventus', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725681362/MWSPORT/Products/rpgejatcss9p8y7621oh.jpg', 399000.00, 20, '<p><strong>Form Dáng:</strong> Boxy Fit.</p><p><strong>Chất liệu:</strong></p><blockquote><ul><li>Định lượng: 250gsm&nbsp;</li><li>Thành phần: 100% Cotton - 2 Chiều.</li></ul></blockquote><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt.</li><li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li><li>Hình in Trame.</li></ul></blockquote>', 70, 'tobi-saurieng-t-shirt', 12, 7, 1, 3, 1, NULL, '2024-07-28 21:51:45', '2024-09-07 03:55:49'),
(9, 'Áo thi đấu clb Inter Milan', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725681089/MWSPORT/Products/ltwua4ecdsq9ltwle4e9.jpg', 550000.00, 80, '<ul><li>Chất liệu vải thường là vải dệt mè kim hoặc mè tổ ong hoặc mè kim cương dày dặn và thoáng mát.</li><li>Vải mè ít co giãn, không bị nhăn, có khả năng kháng khuẩn, chống nấm mốc, chống nước rất tốt.</li><li>Logo thêu sắc nét.</li><li>Bề ngoài sản phẩm tương đối giống 90-95% so với sản phẩm chính hãng các cầu thủ mặ</li></ul>', 100, 'dep-suc-ha-ma', 12, 1, 9, 2, 1, NULL, '2024-07-28 22:04:28', '2024-09-07 03:51:15'),
(10, 'Áo thi đấu clb AC Milan', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680883/MWSPORT/Products/obcpxevbivmksq4ipuq9.jpg', 599000.00, 56, '<p>➡️ Được làm bởi&nbsp;<strong>chất liệu vải Thailand cao cấp</strong>&nbsp;cho khả năng<strong>&nbsp;hút ẩm và&nbsp;chống nhăn</strong>&nbsp;cực kỳ tốt</p><p>➡️ Vải Thailand có khả năng cách nhiệt và thoáng khí tốt</p><p>➡️ Bề mặt áo mượt mà, không xù, luôn sáng bóng, cảm giác dễ chịu. Hơn nữa&nbsp;<strong>khả năng kháng bụi bẩn cao</strong>&nbsp;giúp tránh bám bẩn trong quá trình sử dụng. Dễ dàng giặt sạch, nhanh khô</p><p>➡️ Các đường may đồng đều, chỉ may cao cấp, cho áo<strong>&nbsp;độ bền cao</strong>, tránh bục rách trong những pha kéo áo</p><p>➡️ Vải Thailand có khả năng giữ màu cao, đạt&nbsp;<strong>tính thẩm mỹ cao</strong></p><p>➡️ &nbsp;Có thể in tên, số áo lên phần sau của áo</p><p>➡️ Size: Full size</p>', 280, 'dep-long-con-soc', 12, 6, 4, 2, 1, NULL, '2024-07-28 22:06:19', '2024-09-07 03:47:49'),
(11, 'Áo thi đấu clb Real Madrid', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680522/MWSPORT/Products/ka9xezgujgl2vtnoa01j.jpg', 999000.00, 110, '<p>➡️ <a href=\"https://dothethao.net.vn/danh-muc/ao-cau-lac-bo/la-liga/ao-real-madrid/\">Áo Real Madrid 2022</a> được làm bởi <strong>chất liệu vải mè lục giác</strong>&nbsp;cao cấp Cotton + Interlock</p><p>➡️ Vải mượt mà, mát mịn,&nbsp;<strong>bền vững</strong>&nbsp;cấu trúc</p><p>➡️ <strong>Thấm hút mồ hô</strong>i tức thời, tỏa nhiệt qua bề mặt vải</p><p>➡️ Kháng khuẩn, khử mùi,&nbsp;<strong>chống bám bẩn</strong>&nbsp;và kháng tĩnh điện</p><p>➡️ Độ bền màu cao,&nbsp;<strong>không phai màu</strong>&nbsp;trong điều kiến thời tiết (nắng/mưa)</p><p>➡️ Các đường may tỉ mỉ, chỉ may cao cấp cho&nbsp;<strong>áo độ bền cao</strong></p><p>➡️ Nơi sản xuất:&nbsp;<strong>Việt Nam</strong></p><p>➡️ Có thể in tên, số áo lên phần sau của áo</p><p>➡️ Size: Full size</p><p><br>&nbsp;</p>', 30, 'dep-thoi-trang-nam', 11, 6, 4, 5, 1, NULL, '2024-07-28 22:07:54', '2024-09-07 03:41:50'),
(12, 'Áo thi đấu clb Barcerlona', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680239/MWSPORT/Products/zanapunmkq9dbrsxdzqh.jpg', 490000.00, 45, '<p><i>👉 Thông tin sản phẩm:&nbsp;</i></p><p><i>✔️ Chất lượng tốt nhất trong tầm giá&nbsp;</i></p><p><i>✔️ Form đẹp chuẩn : Màu sắc giống đến 98 °/ₒ ;&nbsp;</i></p><p><i>✔️ Chất liệu da + da lộn + vải mesh&nbsp;</i></p><p><i>✔️ Logo Mông in dập chìm.&nbsp;</i></p><p><i>✔️ Lưỡi gà cao dày dặn; swoosh sắc nét; Mông mũi làm đẹp&nbsp;</i></p><p><i>✔️ Tem QR CODE Có thể check mã 2D&nbsp;</i></p><p><i>✔️ Đế 2 lớp khâu chỉ đều&nbsp;</i></p><p><i>✔️ Full box + accessories&nbsp;</i></p><p><i>✔️ Mẫu này bạn mang đúng hoặc up 1 size đối với chân bè</i></p>', 50, 'giay-adiform', 11, 8, 3, 3, 2, NULL, '2024-07-28 22:09:29', '2024-09-07 03:37:06'),
(13, 'Áo thi đấu clb Chelsea', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680023/MWSPORT/Products/ixoqpejgkoe3s5lxbxxp.jpg', 900000.00, 800, '<blockquote><ul><li>Áo đấu sân nhà của Chelsea 2020 – 2021 có màu xanh bích đậm và nhạt, cổ áo và cổ tay áo cũng có màu xanh đậm. Kết hợp với họa tiết chữ V bao phủ toàn bộ mặt trước, mặt sau và tay áo mang đến một cái nhìn tinh tế, ấn tượng.&nbsp;Áo đấu sân khách của Chelsea 2020 – 2021 chủ yếu là màu xanh lam sáng. Các logo trên áo bóng đá được in với màu xanh lam rất đậm. Về mặt thiết kế, áo đấu sân khách Nike Chelsea có đồ họa rất giống với áo đấu sân nhà.</li></ul><p>&nbsp;</p><ul><li>Rubber toe caps</li><li>Lug rubber outsoles</li><li>Áo bóng đá Chelsea đủ các size S, M, L, XL, XXL</li><li>Chất liệu thun lạnh thể thao cao cấp, vải mềm, cực kỳ mịn và mát.</li><li>In tên số, logo theo yêu cầu, 1 bộ cũng in</li></ul></blockquote>', 223, 'van', 10, 4, 6, 3, 1, NULL, '2024-07-28 22:15:52', '2024-09-07 10:32:38'),
(14, 'Áo đấu clb Arsenel', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725679637/MWSPORT/Products/ixt7ujeelslznwbe9z3y.jpg', 599000.00, 450, '<p><strong>Form Dáng:</strong>&nbsp;Boxy Fit.</p><p><strong>Chất liệu:</strong></p><ul><li>Định lượng: 430gsm&nbsp;</li><li>Thành phần: 100% Cotton - Chân cua</li></ul><p><strong>Chi tiết sản phẩm:</strong></p><blockquote><ul><li>Bo cổ dệt định lượng dày, chắc chắn, chống nhão, co rút sau khi giặt.</li><li>Dáng boxy chia tỉ lệ vàng cơ thể 1/3.</li><li>Phần To bản lai áo và tay được may 3cm tạo cảm giác cứng cáp chắc chắn hơn</li><li>Logo TOBI Regular 2024 được in lụa nổi cao thành, chắn chắn.</li></ul></blockquote>', 100, 'tobi-regular-boxy-sweater', 10, 5, 2, 3, 1, NULL, '2024-07-29 18:52:19', '2024-09-07 03:27:04'),
(15, 'Áo thi đấu ManUtd', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725679386/MWSPORT/Products/spnfqmowyt6tfdzvwupu.jpg', 999000.00, 200, '<p>Quần áo bóng đá Manchester United mùa bóng 21/22 với thiết kế đẹp, chất liệu thoáng mát thấm hút mồ hôi tốt &amp; thoải mái khi mặc. Với các sợi kỹ thuật thoáng khí, chiếc áo này sẽ hoạt động với cơ thể của bạn để nâng cao hiệu suất của bạn khi bạn cần nhất.</p><p>Logo thêu sắc sảo, bền đẹp không bong tróc. Vải thun lạnh 100% polyester, đặt dệt độc quyền mềm và mịn. Độ co dãn tốt, giúp thoáng mát và thoải mái khi vận động. Màu áo quần cực bền, in ấn có độ thẩm mỹ cao, không bong tróc.</p>', 1001, 'quan-jean-nam-rach-goi', 10, 6, 2, 4, 1, NULL, '2024-07-29 20:34:20', '2024-09-15 03:12:45'),
(17, 'Giày chạy bộ Jogarbola', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725679023/MWSPORT/Products/nqlavlig4blyflonb7da.webp', 699999.00, 80, '<p><strong>CÔNG NGHỆ ĐẾ EVA + TPR</strong></p><p>Nhẹ, linh hoạt, độ bền cao, giảm sốc hiệu quả</p><p><strong>CHẤT LIỆU LƯỚI MESH</strong></p><p>Siêu bền, mềm mại, ôm chân tuyệt đối, thoáng khí nhờ hàng triệu&nbsp;lỗ nhỏ trên bề mặt</p><p><strong>ĐẾ TRONG CẤU TRÚC HẠT XỐP SIÊU NHỎ</strong></p><p>Đàn hồi tốt, cho phép sử dụng thoải mái trên mọi địa hình</p><p><strong>CÔNG NGHỆ ĐÚC LIỀN MẠCH KHÔNG ĐƯỜNG MAY</strong></p><p>Hạn chế cọ xát, không gây xước xát, kích ứng da chân</p>', 600, 'sandal-nu', 25, 7, 4, 3, 2, NULL, '2024-07-29 20:42:14', '2024-09-07 03:16:50'),
(20, 'Giày leo núi Nhật Bản Cho Nam', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725678655/MWSPORT/Products/iarzo3licut1d02ddh8r.avif', 499000.00, 30, '<p><strong>Giày hiking này có tất cả những gì bạn cần để leo núi.Đế bám, thân giày chống thấm nước, tấm chắn đá và giảm chấn toàn bộ giày.</strong></p><p>Mẫu giày chống thấm nước được thiết kế để đồng hành cùng bạn trong các chuyến đi bộ đường dài. Là vật dụng không thể thiếu cho các chuyến đi núi.</p>', 10, 'giay-dep', 26, 8, 1, 3, 4, NULL, '2024-11-09 20:25:26', '2024-09-12 14:27:57'),
(21, 'Áo thể thao', 'https://res.cloudinary.com/denxdub1l/image/upload/v1722853863/Cara/Products/f0guuvvtcr6n7eftyjm2.jpg', 300000.00, 6, '<ul><li>Được chính những Designer bậc thầy trong làng thể thao thiết kế trên&nbsp;<strong>10 năm kinh nghiệm</strong>&nbsp;cho các hãng thể thao Nike, Adidas, Puma.</li><li>Vải được đặt dệt riêng từ những nhà DỆT gia công cho hãng</li><li>Bảo dưỡng và làm đẹp lại sản phẩm&nbsp;<strong>TRỌN ĐỜI.</strong></li><li>Là Xưởng thể thao áo bóng đá được nhiều phản hồi tích cực từ khách hàng và là thương hiệu đi đầu về đặt áo đá banh tự thiết kế tại Pháp.</li></ul>', 58, 'ao-the-thao', 7, 1, 1, 1, 1, NULL, '2024-08-05 03:30:51', '2024-09-07 10:31:56'),
(23, 'Giày thể thao', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725098847/MWSPORT/Products/tuifk45vrbv5h1y0rkhs.jpg', 150000.00, 29, '<p>Chào Đón Sự Xuất Hiện Đỉnh Cao - Giày Bóng Đá Kaiwin Legend với Da MICROFIBER.</p><p>Được tạo ra với tâm huyết và niềm đam mê đối với bóng đá, Kaiwin Legend đánh dấu một bước tiến quan trọng trong thế giới giày bóng đá. Thiết kế độc đáo và tinh tế sẽ khiến bạn tỏa sáng trên sân cỏ.</p><p><br>- Form giày Ka-Fit thích hợp với chân người Việt<br>- Da MICROFIBER cao cấp<br>- Cổ dệt Flyknit ôm cổ chân<br>- Công nghệ in hoạ tiết nổi Matrix - Technical<br>- Công nghệ may 4D họa tiết kim cương<br>- Công nghệ thoáng khí Fresh Air<br>- Đế cao su Ka-Spin tạo độ bám sân tối đa<br>- Công nghệ lót giày E.V.A-CARBON nhẹ thoáng khí</p>', 11, 'giay-the-thao', 21, 10, 6, 1, 4, NULL, '2024-08-31 10:07:20', '2024-09-12 14:20:24'),
(25, 'Bộ quần áo thể thao', 'https://res.cloudinary.com/djwiv368z/image/upload/v1725354903/MWSPORT/Products/y3wdpvwtojgfhtaflkfk.jpg', 500000.00, 98, '<p>QUẦN ÁO BÓNG ĐÁ MU TRẮNG 2022 2023✔️Chất liệu đồ đá banh vải Poly thun lạnh cao cấp ✔️Quần áo bóng đá hàng chất lượng, bền đẹp ✔️Chất vải thun lạnh 100% Polyester thấm hút mồ hôi cực tốt ✔️Quần áo đá bóng thiết chuẩn mẫu của các CLB sẽ ra mắt 2022 - 2023✔️Logo áo bóng đá dệt rồi thêu trực tiếp lên áo nên rất bền đẹp, không bong tróc✔️Hoa văn bộ đồ đá banh in phun kỹ thuật số sắc nét, không bong tróc✔️Đường may gia công tỉ mỉ, chi tiết nhất✅Thông tin sản phẩm:👉Xuất xứ: Việt Nam👉Chất liệu: 100% Polyester thoáng mát, không nhăn, không xù lông👉Size: S M L XL XXL- Size S: 45-55kg, - Size M : 55-62kg- Size L : 62-70kg- Size XL : 70-80kg- Size XXL : 80-88kg✅Bảo quản:👉Không dùng chất tẩy👉Lật mặt trái trước khi giặt để màu sắc được luôn như mới</p>', 110, 'bo-quan-ao-the-thao', 7, 9, 4, 3, 5, NULL, '2024-09-03 09:14:53', '2024-09-12 14:30:31');

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
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `image_variant`, `color_id`, `size_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(19, 21, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725181615/MWSPORT/Products/ht1yxve7p8uoplmesekn.jpg', 4, 2, 97, 300, '2024-08-28 12:46:48', '2024-09-01 09:06:46'),
(20, 21, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725353655/MWSPORT/Products/fiavwf79g41tfst6j3qu.jpg', 3, 5, 20, 140000, '2024-08-28 12:50:51', '2024-09-03 08:54:18'),
(21, 21, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725181584/MWSPORT/Products/awjtpzy3uc9ib0of5wej.jpg', 4, 4, 100, 14000, '2024-08-28 12:54:20', '2024-09-03 08:40:19'),
(22, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725159822/MWSPORT/Products/yrqnhex3x3yuzizwwmj2.jpg', 1, 2, 2, 200000, '2024-09-01 03:03:34', '2024-09-01 03:03:34'),
(23, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725159846/MWSPORT/Products/exuvpwzkfyehtppudsur.jpg', 2, 3, 10, 250000, '2024-09-01 03:03:58', '2024-09-01 03:03:58'),
(24, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725159867/MWSPORT/Products/tvxikemfjz79woyyhrui.jpg', 4, 3, 9, 300000, '2024-09-01 03:04:20', '2024-09-01 03:04:20'),
(25, 21, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725353923/MWSPORT/Products/tceofawgsihsemq0fahg.jpg', 5, 3, 100, 150000, '2024-09-03 08:58:33', '2024-09-03 08:58:33'),
(26, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725354428/MWSPORT/Products/yhgv8ghjwrih7qhgfxtt.jpg', 7, 3, 50, 250000, '2024-09-03 09:06:58', '2024-09-15 03:40:18'),
(27, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725354478/MWSPORT/Products/p56wtfj9twvsejfsgyfm.jpg', 8, 4, 100, 300000, '2024-09-03 09:07:48', '2024-09-03 09:07:48'),
(28, 25, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725354995/MWSPORT/Products/rln87dsr32enbfpfipb1.jpg', 9, 3, 100, 400000, '2024-09-03 09:16:25', '2024-09-03 09:16:25'),
(29, 25, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725355130/MWSPORT/Products/u9eiblwskmix666vnhex.jpg', 5, 1, 200, 500000, '2024-09-03 09:18:40', '2024-09-15 03:32:35'),
(30, 25, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725355209/MWSPORT/Products/kyblwqp3kbmqnoxnnvz6.jpg', 4, 4, 100, 350000, '2024-09-03 09:19:02', '2024-09-03 09:20:00'),
(31, 25, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725355274/MWSPORT/Products/iifciybfsvlk4s43wrnb.jpg', 6, 4, 100, 250000, '2024-09-03 09:21:05', '2024-09-03 09:21:05'),
(32, 20, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725678788/MWSPORT/Products/ea5udz0kxcle8w1chlvn.jpg', 3, 2, 200, 499000, '2024-09-07 03:12:54', '2024-09-12 14:26:45'),
(33, 20, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725678809/MWSPORT/Products/hgrsvfwveitin0cej5vp.jpg', 2, 4, 30, 399000, '2024-09-07 03:13:16', '2024-09-07 03:13:16'),
(34, 20, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725678836/MWSPORT/Products/tyzheay0ss5yihakx57q.jpg', 8, 2, 40, 499000, '2024-09-07 03:13:44', '2024-09-07 03:13:44'),
(35, 17, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725679049/MWSPORT/Products/xqt33fltxkakqbhdwxmg.jpg', 2, 3, 400, 900000, '2024-09-07 03:17:16', '2024-09-07 03:17:16'),
(37, 17, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725679085/MWSPORT/Products/ddwo5boyf6cwjwsytywu.jpg', 7, 3, 400, 500000, '2024-09-07 03:17:52', '2024-09-07 03:17:52'),
(38, 17, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725679115/MWSPORT/Products/di2wtxb2kqacvoyhootg.jpg', 6, 4, 300, 599000, '2024-09-07 03:18:22', '2024-09-07 03:18:22'),
(39, 15, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725679412/MWSPORT/Products/qgkmern2i5zvargufkrs.jpg', 6, 4, 300, 799000, '2024-09-07 03:23:19', '2024-09-07 03:23:19'),
(40, 15, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725679442/MWSPORT/Products/hdeergrmwfu1i5bluyuv.jpg', 1, 3, 400, 699000, '2024-09-07 03:23:49', '2024-09-07 03:23:49'),
(41, 15, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725679463/MWSPORT/Products/go2mlnj9vsttalyyhpm8.jpg', 4, 1, 500, 799000, '2024-09-07 03:24:10', '2024-09-07 03:24:10'),
(42, 14, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725679672/MWSPORT/Products/qvnllpxlgchw37ebvqoq.jpg', 7, 3, 400, 599000, '2024-09-07 03:27:38', '2024-09-07 03:27:38'),
(43, 14, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725679704/MWSPORT/Products/j3iaw7xsrjpbh6ccelyj.jpg', 4, 4, 900, 599000, '2024-09-07 03:28:11', '2024-09-07 03:28:11'),
(44, 14, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725679726/MWSPORT/Products/evbtptptnwvtjesg04ze.jpg', 5, 4, 400, 699000, '2024-09-07 03:28:33', '2024-09-07 03:28:33'),
(45, 13, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680061/MWSPORT/Products/vm8dahyrwmxxzut7rg30.jpg', 6, 1, 400, 499000, '2024-09-07 03:34:09', '2024-09-07 03:34:09'),
(46, 13, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680086/MWSPORT/Products/u8qbg67li0w0clsxwpnw.jpg', 7, 4, 500, 599000, '2024-09-07 03:34:33', '2024-09-07 03:34:33'),
(47, 12, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680322/MWSPORT/Products/lmh8ughpz0zsqgqbusi2.jpg', 7, 1, 40, 490000, '2024-09-07 03:37:37', '2024-09-07 03:38:29'),
(48, 12, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680292/MWSPORT/Products/nprvcnhrsir01efqq8s3.jpg', 2, 1, 40, 499000, '2024-09-07 03:37:59', '2024-09-07 03:37:59'),
(49, 12, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680360/MWSPORT/Products/jfcfunvko4v9drv8vkvn.jpg', 4, 1, 40, 490000, '2024-09-07 03:39:06', '2024-09-07 03:39:06'),
(50, 11, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680552/MWSPORT/Products/kjrkngnyap9yh9u7zx9h.jpg', 1, 1, 50, 499000, '2024-09-07 03:42:19', '2024-09-07 03:42:19'),
(51, 11, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680582/MWSPORT/Products/gtlkqhfwrhmj9apmhvpq.jpg', 8, 3, 50, 599000, '2024-09-07 03:42:49', '2024-09-07 03:42:49'),
(52, 11, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680661/MWSPORT/Products/p6lrgsrc9vve0reeqvwb.jpg', 10, 4, 50, 399000, '2024-09-07 03:43:07', '2024-09-07 03:44:08'),
(53, 10, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680906/MWSPORT/Products/vbnldmhyi9yvvuiaa9al.jpg', 1, 1, 50, 599000, '2024-09-07 03:48:12', '2024-09-07 03:48:12'),
(54, 10, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680924/MWSPORT/Products/wcpk4iveit016gozine5.jpg', 3, 1, 50, 499000, '2024-09-07 03:48:32', '2024-09-07 03:48:32'),
(55, 10, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725680950/MWSPORT/Products/ua6b1qb9o2tryjdnmu6z.jpg', 2, 4, 50, 699000, '2024-09-07 03:48:57', '2024-09-07 03:48:57'),
(56, 9, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725681133/MWSPORT/Products/yn4rkbawxu1jgzoumjv4.jpg', 7, 4, 60, 599000, '2024-09-07 03:52:00', '2024-09-07 03:52:00'),
(57, 9, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725681159/MWSPORT/Products/ojqcbo3dkgzfawztgfyu.jpg', 4, 4, 60, 699000, '2024-09-07 03:52:26', '2024-09-07 03:52:26'),
(58, 8, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725681392/MWSPORT/Products/os3ianmyvykrm9lwlsqj.jpg', 4, 4, 50, 499000, '2024-09-07 03:56:19', '2024-09-07 03:56:19'),
(59, 8, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725681413/MWSPORT/Products/kxcbxriclulpascac2eh.jpg', 7, 4, 50, 599000, '2024-09-07 03:56:39', '2024-09-07 03:56:39'),
(60, 7, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682030/MWSPORT/Products/ggabb1fzoulyljv5tfly.jpg', 4, 1, 50, 499000, '2024-09-07 04:06:57', '2024-09-07 04:06:57'),
(61, 7, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682195/MWSPORT/Products/v1kauiiomo27vp4faw9q.jpg', 6, 1, 50, 299000, '2024-09-07 04:09:42', '2024-09-15 04:14:43'),
(63, 6, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682372/MWSPORT/Products/x1xsi6wwg7h6ls46gbcr.jpg', 2, 4, 50, 599000, '2024-09-07 04:12:39', '2024-09-07 04:12:39'),
(64, 6, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682397/MWSPORT/Products/plxtlnei1larhd75tvwm.jpg', 4, 4, 50, 699000, '2024-09-07 04:13:03', '2024-09-07 04:13:03'),
(65, 6, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682426/MWSPORT/Products/ricnyfebqwtvj2zfwrxo.jpg', 1, 3, 40, 499000, '2024-09-07 04:13:32', '2024-09-15 04:16:47'),
(66, 5, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682581/MWSPORT/Products/ultfjpqafgo6iobtuwbw.jpg', 7, 3, 50, 499000, '2024-09-07 04:16:08', '2024-09-07 04:16:08'),
(67, 5, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682602/MWSPORT/Products/hoqpxqqwwj6snyw2vmvg.jpg', 1, 1, 50, 599000, '2024-09-07 04:16:28', '2024-09-07 04:16:28'),
(68, 5, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682624/MWSPORT/Products/gsna22bpgmlfmgs2enz1.jpg', 5, 4, 40, 499000, '2024-09-07 04:16:51', '2024-09-07 04:16:51'),
(69, 4, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682790/MWSPORT/Products/i6dvadubqmpleazozqwp.jpg', 2, 1, 50, 499000, '2024-09-07 04:19:37', '2024-09-07 04:19:37'),
(70, 4, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682820/MWSPORT/Products/zb71koke47lgfobgvqgi.jpg', 6, 4, 50, 599000, '2024-09-07 04:20:07', '2024-09-07 04:20:07'),
(71, 3, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725682985/MWSPORT/Products/vd77ld6jxo9t9zfcd1gy.jpg', 1, 1, 40, 120000, '2024-09-07 04:22:52', '2024-09-07 04:22:52'),
(72, 3, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725683057/MWSPORT/Products/jzqqlfyxa2ichybqbfbz.jpg', 7, 1, 50, 299000, '2024-09-07 04:24:04', '2024-09-07 04:24:04'),
(73, 2, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725683219/MWSPORT/Products/b5hcg0c8uhl45bloskdo.jpg', 1, 1, 50, 299000, '2024-09-07 04:26:46', '2024-09-07 04:26:46'),
(74, 2, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725683236/MWSPORT/Products/km8pxi7iw0ascsdfemo4.jpg', 2, 1, 40, 399000, '2024-09-07 04:27:03', '2024-09-07 04:27:03'),
(75, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725683369/MWSPORT/Products/lujlyt4zfjvkuu4m0np2.jpg', 7, 1, 40, 199000, '2024-09-07 04:29:15', '2024-09-07 04:29:15'),
(76, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1725683396/MWSPORT/Products/f7518pc11suoeiqjulit.jpg', 8, 4, 40, 299000, '2024-09-07 04:29:43', '2024-09-07 04:29:43'),
(83, 20, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726370853/MWSPORT/Products/pu8lqxii8brurstsrnve.jpg', 3, 1, 40, 699999, '2024-09-15 03:27:30', '2024-09-15 03:27:54'),
(84, 20, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726370904/MWSPORT/Products/qrokhfv7mlyzqgsf8yrm.jpg', 3, 3, 50, 699999, '2024-09-15 03:28:21', '2024-09-15 03:28:21'),
(85, 20, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726370934/MWSPORT/Products/rqbworwjlw4opoh8payi.jpg', 2, 1, 50, 699999, '2024-09-15 03:28:51', '2024-09-15 03:28:51'),
(86, 20, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726370986/MWSPORT/Products/qgsvna96gyejyc70vmae.jpg', 2, 5, 50, 699999, '2024-09-15 03:29:43', '2024-09-15 03:29:43'),
(87, 20, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371032/MWSPORT/Products/betuq66jut3bnnvqqgaa.jpg', 8, 1, 50, 699999, '2024-09-15 03:30:30', '2024-09-15 03:30:30'),
(88, 20, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371067/MWSPORT/Products/av2qj5v0zkgplbgvzig7.jpg', 8, 3, 60, 699999, '2024-09-15 03:31:04', '2024-09-15 03:31:04'),
(89, 25, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371115/MWSPORT/Products/rfrkr9criieoootrfeuh.jpg', 9, 1, 50, 699999, '2024-09-15 03:31:52', '2024-09-15 03:31:52'),
(90, 25, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371134/MWSPORT/Products/iqrk5sevdmjm3ak6s0ve.jpg', 9, 2, 50, 699999, '2024-09-15 03:32:11', '2024-09-15 03:32:11'),
(91, 25, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371178/MWSPORT/Products/olux5xjlnayxi3g0kbqj.jpg', 5, 2, 50, 699999, '2024-09-15 03:32:55', '2024-09-15 03:32:55'),
(92, 25, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371270/MWSPORT/Products/ghrrzq5c5cqihhrewjil.jpg', 5, 3, 50, 530000, '2024-09-15 03:34:27', '2024-09-15 03:34:27'),
(93, 25, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371299/MWSPORT/Products/gdyzescf0buejrpt3gw5.jpg', 4, 5, 50, 530000, '2024-09-15 03:34:56', '2024-09-15 03:34:56'),
(94, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371374/MWSPORT/Products/fudl1ngq4bjkmwdwizdf.jpg', 1, 1, 50, 530000, '2024-09-15 03:36:11', '2024-09-15 03:36:11'),
(95, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371401/MWSPORT/Products/ultac4wgjlocaet1skqc.jpg', 1, 3, 50, 699999, '2024-09-15 03:36:38', '2024-09-15 03:36:38'),
(96, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371471/MWSPORT/Products/qsh8o7hefb81or4tp4tu.jpg', 2, 1, 50, 699999, '2024-09-15 03:37:48', '2024-09-15 03:37:48'),
(97, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371517/MWSPORT/Products/qy2tuwacyvjq47syjcvo.jpg', 2, 2, 50, 699999, '2024-09-15 03:38:34', '2024-09-15 03:38:34'),
(98, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371543/MWSPORT/Products/hdj9kgdemegeqkkxlzcv.jpg', 4, 1, 50, 699999, '2024-09-15 03:39:00', '2024-09-15 03:39:00'),
(99, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371596/MWSPORT/Products/zvp6c804dvuufgxgmz84.jpg', 4, 2, 50, 699999, '2024-09-15 03:39:38', '2024-09-15 03:39:53'),
(100, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371648/MWSPORT/Products/k8uc927bemsgddn1hb5t.jpg', 7, 1, 50, 699999, '2024-09-15 03:40:45', '2024-09-15 03:40:45'),
(101, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371679/MWSPORT/Products/vj87zvezje3frt9tzdh8.jpg', 7, 2, 50, 699999, '2024-09-15 03:41:16', '2024-09-15 03:41:16'),
(102, 23, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371742/MWSPORT/Products/trysnnrpm3fkaqbfta0m.jpg', 8, 5, 50, 699999, '2024-09-15 03:42:19', '2024-09-15 03:42:19'),
(103, 21, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371938/MWSPORT/Products/pzvpbnwadkj2of7sudvw.jpg', 4, 1, 50, 699999, '2024-09-15 03:45:35', '2024-09-15 03:45:35'),
(104, 21, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726371964/MWSPORT/Products/h4mmb2ch7rvxqv7onfmd.jpg', 4, 3, 50, 699999, '2024-09-15 03:46:02', '2024-09-15 03:46:02'),
(105, 21, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372012/MWSPORT/Products/xoa2osrrclkhebmj9v1s.jpg', 5, 1, 50, 699999, '2024-09-15 03:46:49', '2024-09-15 03:46:49'),
(106, 21, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372014/MWSPORT/Products/fyx48vyohev3geazacvc.jpg', 5, 2, 50, 699999, '2024-09-15 03:46:51', '2024-09-15 03:47:06'),
(107, 21, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372059/MWSPORT/Products/peawp9xf2q4r7tr5ulf7.jpg', 3, 4, 50, 699999, '2024-09-15 03:47:36', '2024-09-15 03:47:36'),
(108, 17, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372102/MWSPORT/Products/u0lvxw8zdds4jgmhkwgd.jpg', 2, 1, 50, 699999, '2024-09-15 03:48:19', '2024-09-15 03:48:19'),
(109, 17, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372130/MWSPORT/Products/hmugffm0svh7gn8flyoz.jpg', 2, 2, 50, 699999, '2024-09-15 03:48:47', '2024-09-15 03:48:47'),
(110, 17, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372177/MWSPORT/Products/nfgncwx2iwoxzghbfjhw.jpg', 7, 1, 50, 699999, '2024-09-15 03:49:34', '2024-09-15 03:49:34'),
(111, 17, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372199/MWSPORT/Products/zx3g08hxkgalncdqj3xm.jpg', 7, 2, 50, 699999, '2024-09-15 03:49:56', '2024-09-15 03:49:56'),
(112, 17, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372229/MWSPORT/Products/ofjuk9lm6lc3iwwxrszw.jpg', 6, 5, 50, 699999, '2024-09-15 03:50:26', '2024-09-15 03:50:58'),
(113, 15, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372294/MWSPORT/Products/slpg3dfeqg1pqbo370vs.jpg', 6, 5, 50, 699999, '2024-09-15 03:51:31', '2024-09-15 03:51:31'),
(114, 15, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372315/MWSPORT/Products/qp3zzdy60f1zoy17a2jx.jpg', 1, 1, 50, 699999, '2024-09-15 03:51:52', '2024-09-15 03:51:52'),
(115, 15, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372340/MWSPORT/Products/n05l0mfvzjmcw5sa9i1u.jpg', 1, 2, 50, 699999, '2024-09-15 03:52:17', '2024-09-15 03:52:17'),
(116, 15, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372364/MWSPORT/Products/miqyi4if9ejfzpvpnk3i.jpg', 4, 2, 50, 699999, '2024-09-15 03:52:41', '2024-09-15 03:52:41'),
(117, 15, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372392/MWSPORT/Products/cdyt525difoywnvhxj1n.jpg', 4, 2, 50, 699999, '2024-09-15 03:53:09', '2024-09-15 03:53:09'),
(118, 14, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372499/MWSPORT/Products/lewbhwkjatm42csl25cw.jpg', 7, 2, 50, 699999, '2024-09-15 03:54:56', '2024-09-15 03:54:56'),
(119, 14, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372517/MWSPORT/Products/fgyzppaopcc4cg4vmhk0.jpg', 7, 2, 50, 699999, '2024-09-15 03:55:14', '2024-09-15 03:55:14'),
(120, 14, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372558/MWSPORT/Products/pwh7ngavduw758blwpmm.jpg', 4, 5, 50, 699999, '2024-09-15 03:55:55', '2024-09-15 03:55:55'),
(121, 14, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372582/MWSPORT/Products/szxrxvueesvvpuaztnhy.jpg', 5, 5, 50, 699999, '2024-09-15 03:56:20', '2024-09-15 03:56:20'),
(122, 13, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372684/MWSPORT/Products/s4wz66t6hokwohsyuufy.jpg', 6, 2, 50, 699999, '2024-09-15 03:58:00', '2024-09-15 03:58:00'),
(123, 13, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372704/MWSPORT/Products/jdzwrq7cynnd8ebazvmb.jpg', 6, 3, 50, 699999, '2024-09-15 03:58:21', '2024-09-15 03:58:36'),
(124, 13, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372742/MWSPORT/Products/owy0rbxpxzdborrem9dt.jpg', 7, 5, 50, 699999, '2024-09-15 03:58:59', '2024-09-15 03:58:59'),
(125, 12, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372844/MWSPORT/Products/uwegtlrbqwdjtpjdfur2.jpg', 7, 2, 50, 699999, '2024-09-15 04:00:41', '2024-09-15 04:01:05'),
(126, 12, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372895/MWSPORT/Products/xrfbfvgd3e29sg1ire5q.jpg', 7, 3, 50, 699999, '2024-09-15 04:01:32', '2024-09-15 04:01:32'),
(127, 12, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372923/MWSPORT/Products/ul7esyj0z0e3l4v3kwo7.jpg', 2, 2, 50, 699999, '2024-09-15 04:02:00', '2024-09-15 04:02:00'),
(128, 12, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372972/MWSPORT/Products/ozbp66qj3cq2jsu0cxhf.jpg', 2, 3, 50, 699999, '2024-09-15 04:02:49', '2024-09-15 04:02:49'),
(129, 12, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726372995/MWSPORT/Products/rw2x65eopqul5aitxckb.jpg', 4, 2, 50, 699999, '2024-09-15 04:03:12', '2024-09-15 04:03:12'),
(130, 12, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373014/MWSPORT/Products/mdxnme746vxxm7gpejbh.jpg', 4, 3, 50, 699999, '2024-09-15 04:03:31', '2024-09-15 04:03:31'),
(131, 11, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373169/MWSPORT/Products/z6rz1n3fblkp3dhfgosk.jpg', 1, 2, 50, 699999, '2024-09-15 04:06:06', '2024-09-15 04:06:06'),
(132, 11, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373185/MWSPORT/Products/yrvl1tyd8dit6awataql.jpg', 1, 3, 50, 699999, '2024-09-15 04:06:23', '2024-09-15 04:06:23'),
(133, 11, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373205/MWSPORT/Products/ifmmsitite0gxf6ga3b0.jpg', 8, 2, 50, 699999, '2024-09-15 04:06:42', '2024-09-15 04:06:42'),
(134, 11, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373225/MWSPORT/Products/shnoakt926pnvxo7avjr.jpg', 8, 1, 50, 699999, '2024-09-15 04:07:02', '2024-09-15 04:07:02'),
(135, 11, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373250/MWSPORT/Products/jib3qef0qm1d6tzzwbct.jpg', 10, 5, 50, 699999, '2024-09-15 04:07:27', '2024-09-15 04:07:27'),
(136, 11, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373278/MWSPORT/Products/qkxyjj0sm8zguykybj8i.jpg', 4, 4, 50, 699999, '2024-09-15 04:07:55', '2024-09-15 04:07:55'),
(137, 10, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373374/MWSPORT/Products/obmbtgf8tbraqtyrpc5z.jpg', 1, 2, 50, 699999, '2024-09-15 04:09:31', '2024-09-15 04:09:31'),
(138, 10, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373389/MWSPORT/Products/vanfpqxgte0lcu84ciwo.jpg', 1, 3, 50, 699999, '2024-09-15 04:09:47', '2024-09-15 04:09:47'),
(139, 10, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373407/MWSPORT/Products/aefgpamlbefbhnux5n1t.jpg', 3, 2, 50, 699999, '2024-09-15 04:10:03', '2024-09-15 04:10:03'),
(140, 10, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373426/MWSPORT/Products/mwqzjoabfypbhzcyer4e.jpg', 3, 3, 50, 699999, '2024-09-15 04:10:23', '2024-09-15 04:10:23'),
(141, 10, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373460/MWSPORT/Products/zmmewwxdwpycz1xni61z.jpg', 2, 5, 50, 699999, '2024-09-15 04:10:57', '2024-09-15 04:10:57'),
(142, 9, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373530/MWSPORT/Products/jb8lsd004ckhcvowbb81.jpg', 9, 5, 50, 699999, '2024-09-15 04:12:07', '2024-09-15 04:12:07'),
(143, 9, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373547/MWSPORT/Products/iz0gzhvhsojbtyn8pxlo.jpg', 4, 5, 50, 699999, '2024-09-15 04:12:24', '2024-09-15 04:12:24'),
(144, 8, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373580/MWSPORT/Products/c4p6qxo5i6c3cxdbpfwu.jpg', 4, 5, 50, 699999, '2024-09-15 04:12:57', '2024-09-15 04:12:57'),
(145, 8, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373597/MWSPORT/Products/vhcaukkjnrqc1v223jmo.jpg', 7, 5, 50, 699999, '2024-09-15 04:13:14', '2024-09-15 04:13:14'),
(146, 7, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373638/MWSPORT/Products/cip2dda1ekenuw1ea40o.jpg', 4, 2, 50, 699999, '2024-09-15 04:13:55', '2024-09-15 04:13:55'),
(147, 7, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373658/MWSPORT/Products/ylmsyzyviny877zwvqyv.jpg', 4, 3, 50, 699999, '2024-09-15 04:14:15', '2024-09-15 04:14:15'),
(148, 7, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373680/MWSPORT/Products/u7grrzvd9jgnzxkubmbi.jpg', 6, 2, 50, 699999, '2024-09-15 04:14:37', '2024-09-15 04:14:37'),
(149, 7, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373704/MWSPORT/Products/gdd0pxohihwescmdlq8b.jpg', 6, 3, 50, 699999, '2024-09-15 04:15:01', '2024-09-15 04:15:01'),
(150, 6, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373737/MWSPORT/Products/uw48qzyrmrn7fqqq3mrb.jpg', 2, 5, 50, 699999, '2024-09-15 04:15:34', '2024-09-15 04:15:34'),
(151, 6, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373759/MWSPORT/Products/hhvxfra5saidcgz5mopw.jpg', 4, 5, 50, 699999, '2024-09-15 04:15:56', '2024-09-15 04:15:56'),
(152, 6, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373803/MWSPORT/Products/x3v2u3av9nfq2wfaaavb.jpg', 1, 2, 50, 699999, '2024-09-15 04:16:40', '2024-09-15 04:16:40'),
(153, 6, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373825/MWSPORT/Products/ogzssmi0o5ucltzzs3eu.jpg', 1, 1, 50, 699999, '2024-09-15 04:17:02', '2024-09-15 04:17:02'),
(154, 5, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373869/MWSPORT/Products/qo7jparbjmqde5vc3r6j.jpg', 7, 2, 50, 699999, '2024-09-15 04:17:46', '2024-09-15 04:17:46'),
(155, 5, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373884/MWSPORT/Products/p5byriabyzklqkmgp1bb.jpg', 7, 1, 50, 699999, '2024-09-15 04:18:01', '2024-09-15 04:18:01'),
(156, 5, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373901/MWSPORT/Products/qcmzqkyjexrqpzggcbui.jpg', 1, 2, 50, 699999, '2024-09-15 04:18:18', '2024-09-15 04:18:18'),
(157, 5, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373919/MWSPORT/Products/kpeldraut2atm0mxs3ig.jpg', 1, 3, 50, 699999, '2024-09-15 04:18:36', '2024-09-15 04:18:36'),
(158, 5, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373938/MWSPORT/Products/wgnui2r7pspzaxofwb3c.jpg', 5, 5, 50, 699999, '2024-09-15 04:18:55', '2024-09-15 04:18:55'),
(159, 4, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373981/MWSPORT/Products/pwp7ezknqw1g5gonii5y.jpg', 2, 2, 50, 699999, '2024-09-15 04:19:38', '2024-09-15 04:19:38'),
(160, 4, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726373998/MWSPORT/Products/ir4ko476q4yfklbu1rua.jpg', 2, 3, 50, 699999, '2024-09-15 04:19:55', '2024-09-15 04:19:55'),
(161, 4, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374015/MWSPORT/Products/kfhk0jvs3zyhicfrgxd2.jpg', 6, 5, 50, 699999, '2024-09-15 04:20:12', '2024-09-15 04:20:12'),
(162, 3, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374052/MWSPORT/Products/iksiyohcascrq2qttmuc.jpg', 1, 2, 50, 699999, '2024-09-15 04:20:49', '2024-09-15 04:20:49'),
(163, 3, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374067/MWSPORT/Products/ffen5eqi6budswsosvvn.jpg', 1, 3, 50, 699999, '2024-09-15 04:21:04', '2024-09-15 04:21:04'),
(164, 3, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374083/MWSPORT/Products/tzfxgkmo44vkaqkrangy.jpg', 7, 2, 50, 699999, '2024-09-15 04:21:20', '2024-09-15 04:21:20'),
(165, 3, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374097/MWSPORT/Products/roxbs6eqlaarjxxryqij.jpg', 7, 3, 50, 699999, '2024-09-15 04:21:34', '2024-09-15 04:21:34'),
(166, 3, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374125/MWSPORT/Products/nzmo3txdi0kbcgq04vrd.jpg', 4, 1, 50, 499999, '2024-09-15 04:22:02', '2024-09-15 04:22:02'),
(167, 3, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374142/MWSPORT/Products/pdxbmufkumuirai8jprd.jpg', 4, 3, 50, 499999, '2024-09-15 04:22:19', '2024-09-15 04:22:19'),
(168, 2, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374183/MWSPORT/Products/fwsvvw8ftoone1vyznma.jpg', 4, 2, 50, 699999, '2024-09-15 04:23:00', '2024-09-15 04:23:21'),
(169, 2, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374220/MWSPORT/Products/gxqysskfamfvjpctvexx.jpg', 1, 2, 50, 699999, '2024-09-15 04:23:37', '2024-09-15 04:23:37'),
(170, 2, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374246/MWSPORT/Products/ffmoghtfbtf4mfggril8.jpg', 1, 3, 50, 530000, '2024-09-15 04:24:03', '2024-09-15 04:24:03'),
(171, 2, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374261/MWSPORT/Products/qmjeh3p3n6jqroqbwic9.jpg', 2, 2, 50, 699999, '2024-09-15 04:24:18', '2024-09-15 04:24:18'),
(172, 2, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374275/MWSPORT/Products/txittibuyg4izjm1i7cw.jpg', 2, 3, 50, 699999, '2024-09-15 04:24:32', '2024-09-15 04:24:32'),
(173, 2, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374422/MWSPORT/Products/jokniqsx4jrwvoepkjh2.jpg', 4, 1, 50, 699999, '2024-09-15 04:26:59', '2024-09-15 04:26:59'),
(174, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374463/MWSPORT/Products/xd4i0pb9rrvzun8palac.jpg', 7, 2, 50, 399999, '2024-09-15 04:27:41', '2024-09-15 04:27:41'),
(175, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374485/MWSPORT/Products/opgywu7f1lw7nfo6srce.jpg', 1, 3, 50, 399999, '2024-09-15 04:28:02', '2024-09-15 04:28:02'),
(176, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374506/MWSPORT/Products/a1aczozie0rq1xyfzcfv.jpg', 8, 5, 50, 399999, '2024-09-15 04:28:23', '2024-09-15 04:28:23'),
(177, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374532/MWSPORT/Products/e5zqnolay5j58ycpa6a5.jpg', 3, 2, 50, 399999, '2024-09-15 04:28:49', '2024-09-15 04:28:49'),
(178, 1, 'https://res.cloudinary.com/djwiv368z/image/upload/v1726374552/MWSPORT/Products/d5iv9mgpohorfcwvjdoa.jpg', 3, 3, 50, 399999, '2024-09-15 04:29:09', '2024-09-15 04:29:09');

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

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(4, 20, 21, 5.00, 'tốt', '2024-08-29 09:43:45', '2024-08-29 10:03:41'),
(5, 20, 23, 5.00, 'sản phẩm đẹp ,đúng với mô tả', '2024-09-02 07:43:05', '2024-09-02 07:43:05'),
(6, 20, 25, 5.00, 'toot', '2024-09-12 14:23:12', '2024-09-12 14:23:12');

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
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_products`
--

INSERT INTO `status_products` (`id`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sản phẩm nổi trội', 'Sản phẩm tích hợp các tính năng mà các sản phẩm khác chưa có hoặc chưa phổ biến.\r\nỨng dụng công nghệ mới nhất, mang lại trải nghiệm sử dụng vượt trội cho người dùng.\r\nCó khả năng giải quyết các vấn đề cụ thể một cách hiệu quả hơn so với các sản phẩm khác.', '2024-07-29 18:07:38', '2024-09-03 09:30:01'),
(2, 'Sản phẩm bán chạy nhất', 'Được sản xuất với các tiêu chuẩn chất lượng cao, đảm bảo độ bền, an toàn và hiệu suất hoạt động tốt.\r\nChất liệu và linh kiện được chọn lọc kỹ càng, giúp sản phẩm có tuổi thọ cao hơn.', '2024-07-29 18:07:38', '2024-09-03 09:30:31'),
(4, 'Hàng mới về', 'Sản phẩm hoạt động hiệu quả, ổn định, mang lại giá trị sử dụng cao.\r\nĐược kiểm nghiệm kỹ lưỡng trước khi đưa ra thị trường, hạn chế lỗi phát sinh trong quá trình sử dụng.', '2024-08-31 10:51:31', '2024-09-03 09:30:48'),
(5, 'Hàng chất lượng', 'Sản phẩm được làm từ các loại nguyên liệu tốt nhất, có độ bền cao, không dễ hỏng hóc.\r\nChất liệu thân thiện với môi trường hoặc an toàn cho sức khỏe người dùng.\r\nCó thể là da thật, vải chất lượng, kim loại không gỉ, nhựa chịu lực, v.v.', '2024-08-31 10:54:07', '2024-09-03 09:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `categories_id` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `description`, `categories_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Thời trang nam', 'thoi-trang', '', 1, '2024-09-07 03:03:34', '2024-07-26 14:19:49', '2024-09-07 03:03:34'),
(6, 'Áo Thun', 'ao-thun', 'ao thun nam the thao', 1, NULL, '2024-07-28 21:30:26', '2024-09-14 10:17:21'),
(7, 'Áo Thi Đấu', 'ao-thi-dau', '', 1, NULL, '2024-07-28 21:31:32', '2024-09-07 03:03:59'),
(8, 'Bundesliga', 'Bundesliga', '', 1, NULL, '2024-07-28 21:31:59', '2024-09-07 03:58:00'),
(9, 'Quần thể thao', 'quan-the-thao', '', 1, NULL, '2024-07-28 21:32:30', '2024-09-07 04:22:25'),
(10, 'Primer League', 'Primer-League', '', 1, NULL, '2024-07-28 21:32:55', '2024-09-07 03:04:32'),
(21, 'Giày Thể Thao', 'giay-the-thao', '', 2, NULL, '2024-07-28 22:00:18', '2024-07-28 22:01:04'),
(22, 'Giày cao cổ', 'Giày cao cổ', '', 2, NULL, '2024-07-28 22:01:35', '2024-09-07 03:06:36'),
(23, 'Dép Đi Trong Nhà', 'dep-di-trong-nha', '', 2, '2024-09-07 03:06:45', '2024-07-28 22:02:01', '2024-09-07 03:06:45'),
(24, 'Giày Bóng đá', 'Giày Bóng đá', '', 2, NULL, '2024-07-28 22:02:17', '2024-09-07 03:07:31'),
(25, 'Giày Chạy bộ', 'Giày Chạy bộ', '', 2, NULL, '2024-07-28 22:02:33', '2024-09-07 03:07:47'),
(26, 'Giày Leo núi (Trekking)', 'Giày Leo núi (Trekking)', '', 2, NULL, '2024-07-28 22:05:09', '2024-09-07 03:07:59'),
(29, 'Laliga', 'Laliga', 'Áo đấu của các câu lạc bộ La Liga là biểu tượng của sự kỳ vọng và đam mê bóng đá. Mỗi chiếc áo cầu thủ bóng đá được thiết kế với sự tỉ mỉ cao, phản ánh văn hóa và lịch sử của CLB mà còn cả phong cách chơi độc đáo của họ.\r\nChất liệu áo cao cấp được sử dụng để tạo ra các áo clb bóng đá thi đấu giúp cầu thủ duy trì sự thoải mái và hiệu suất cao nhất trong suốt 90 phút trên sân. Áo La Liga là sản phẩm áo bóng đá Tây Ban Nha được trang trí bằng những họa tiết và màu sắc đặc trưng, khiến chúng trở thành một phần không thể thiếu của bộ sưu tập của bất kỳ người hâm mộ bóng đá nào.', 1, '2024-09-14 11:52:10', '2024-09-14 07:03:02', '2024-09-14 11:52:10'),
(33, 'ko biet', 'o biet', NULL, 1, '2024-09-14 11:34:40', '2024-09-14 10:47:09', '2024-09-14 11:34:40'),
(34, 'tesst1', 'tessta', 'dsagsjg', 2, '2024-09-14 11:34:29', '2024-09-14 10:48:15', '2024-09-14 11:34:29'),
(35, 'naruto', 'nảuto', 'ko co àka', 1, '2024-09-14 11:34:36', '2024-09-14 11:19:19', '2024-09-14 11:34:36'),
(36, 'naruto', 'na-ru', 'ko co', 1, '2024-09-14 11:34:38', '2024-09-14 11:21:33', '2024-09-14 11:34:38'),
(37, 'naruto', 'ka', 'ko có', 1, '2024-09-14 11:25:30', '2024-09-14 11:22:06', '2024-09-14 11:25:30'),
(38, 'hihi', 'hihi', 'hihi', 1, '2024-09-14 11:34:42', '2024-09-14 11:23:13', '2024-09-14 11:34:42'),
(39, 'Laliga', 'La-li-ga', 'Áo đấu của các câu lạc bộ La Liga là biểu tượng của sự kỳ vọng và đam mê bóng đá. Mỗi chiếc áo cầu thủ bóng đá được thiết kế với sự tỉ mỉ cao, phản ánh văn hóa và lịch sử của CLB mà còn cả phong cách chơi độc đáo của họ.\r\nChất liệu áo cao cấp được sử dụng để tạo ra các áo clb bóng đá thi đấu giúp cầu thủ duy trì sự thoải mái và hiệu suất cao nhất trong suốt 90 phút trên sân. Áo La Liga là sản phẩm áo bóng đá Tây Ban Nha được trang trí bằng những họa tiết và màu sắc đặc trưng, khiến chúng trở thành một phần không thể thiếu của bộ sưu tập của bất kỳ người hâm mộ bóng đá nào.', 1, NULL, '2024-09-14 11:53:51', '2024-09-14 11:53:51'),
(40, 'test1', 'test1', 'test1', 6, '2024-09-14 12:06:43', '2024-09-14 12:05:47', '2024-09-14 12:06:43'),
(41, 'ádg', 'adgag', 'agdadg', 8, '2024-09-14 12:07:39', '2024-09-14 12:07:35', '2024-09-14 12:07:39'),
(42, 'ágadsg', 'dhsh', 'adgda', 9, '2024-09-14 12:09:20', '2024-09-14 12:09:17', '2024-09-14 12:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `voucher_id` int UNSIGNED DEFAULT NULL,
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

INSERT INTO `users` (`id`, `voucher_id`, `name`, `avatar`, `email`, `email_verified_at`, `password`, `address`, `phone`, `role`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 9, 'Quản trị viên', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'admin@gmail.com', NULL, '$2y$10$WTUHCBKX30LtFY0egvP98ue9Ae6rod4NJz9eAAlt0ErPimfoy21zu', NULL, NULL, 1, NULL, NULL, '2024-06-26 20:35:16', '2024-08-25 04:06:33', 1),
(2, NULL, 'buingocphi', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'phibnph29465@fpt.edu.vn', NULL, '$2y$10$JOtPaOdf04C4gy985Lw8hOD1pr02cDpSDywImGArglptRY8jAoX96', NULL, NULL, 0, NULL, NULL, '2024-06-28 01:56:52', '2024-08-16 08:22:30', 1),
(3, NULL, 'Bùi Fee', 'https://res.cloudinary.com/denxdub1l/image/upload/v1699687947/Cara/Profile/kpvg3fzzm3evjydhhnkf.png', 'buingocphinn@gmail.com', NULL, '$2y$10$rQOdhXnOK/3tKOwKYn.3auDLOzdkafHHRNNwDDfWqeJlTeC0BRTT6', 'Kim Sơn - Ninh Bình', '0377674930', 0, NULL, NULL, '2024-06-03 02:08:02', '2024-07-10 17:50:11', 1),
(17, NULL, 'tran manh', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'manutd@gmail.com', NULL, '$2y$10$jwW4mLYi/7.L7ekzAGrS4eiQD87eJkOBJA/9QCLVArAjSxQV9JzbG', NULL, NULL, 1, NULL, NULL, '2024-07-28 20:54:41', '2024-07-28 20:55:08', 1),
(19, 9, 'tran manh', 'https://res.cloudinary.com/denxdub1l/image/upload/v1722249803/Cara/Profile/aovxgnserrpty9awcjzs.jpg', 'minh29122003@gmail.com', NULL, '$2y$10$Qpo/Kan2Tlh3EHd1kFdyceVOdhBnf26f8x65DmEwxN6I9UuDpKtDm', 'ha noi', '0987654321', 0, NULL, NULL, '2024-07-29 01:45:09', '2024-09-01 04:28:59', 1),
(20, NULL, 'manh123', 'https://cdn-icons-png.flaticon.com/512/1255/1255974.png', 'manhtnph28511@fpt.edu.vn', NULL, '$2y$10$2aRLQ.5kkz.kC8F2hztMvu0KcfhJEX5CpDTClrMAgnbhrEtRLWNry', NULL, NULL, 0, NULL, NULL, '2024-08-25 10:08:53', '2024-09-12 14:25:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_voucher`
--

CREATE TABLE `user_voucher` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `voucher_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_voucher`
--

INSERT INTO `user_voucher` (`id`, `user_id`, `voucher_id`, `created_at`, `updated_at`) VALUES
(4, 19, 2, '2024-08-25 09:09:22', '2024-08-25 09:09:22'),
(5, 19, 9, '2024-08-25 09:09:49', '2024-08-25 09:09:49'),
(6, 20, 2, '2024-08-29 02:53:39', '2024-08-29 02:53:39'),
(7, 20, 2, '2024-08-29 02:53:39', '2024-08-29 02:53:39'),
(8, 20, 6, '2024-08-29 02:53:43', '2024-08-29 02:53:43'),
(9, 20, 9, '2024-08-29 02:53:45', '2024-08-29 02:53:45'),
(10, 20, 7, '2024-09-05 08:16:40', '2024-09-05 08:16:40'),
(11, 20, 7, '2024-09-05 08:16:40', '2024-09-05 08:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int NOT NULL,
  `discount_type` enum('percentage','fixed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  `starts_at` date NOT NULL,
  `expires_at` date NOT NULL,
  `usage_count` int NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '0',
  `product_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `discount`, `discount_type`, `starts_at`, `expires_at`, `usage_count`, `quantity`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'mm23', 30, 'fixed', '2024-08-15', '2024-08-16', 0, 100, 1, '2024-08-15 03:10:32', '2024-09-05 08:06:58'),
(2, 'mo01', 10, 'percentage', '2024-08-16', '2029-10-10', 7, 17, NULL, '2024-08-15 03:34:22', '2024-09-12 14:20:55'),
(4, 'sp', 400, 'fixed', '2024-08-17', '2024-08-23', 10, 0, NULL, '2024-08-15 03:53:42', '2024-08-21 09:21:42'),
(5, 'santo', 555, 'fixed', '2024-08-16', '2025-09-25', 2, 1000, NULL, '2024-08-16 02:39:29', '2024-09-12 14:07:23'),
(6, 'm66686', 100000, 'fixed', '2024-08-16', '2025-08-25', 4, 70, 21, '2024-08-16 03:03:03', '2024-09-05 08:07:18'),
(7, 'hihi', 20, 'percentage', '2024-08-20', '2024-11-21', 2, 999, NULL, '2024-08-19 02:25:35', '2024-09-05 08:17:09'),
(8, 'premier league', 20, 'percentage', '2024-08-19', '2024-08-30', 11, 19, NULL, '2024-08-19 02:34:13', '2024-08-30 09:05:42'),
(9, 'asd', 20, 'percentage', '2024-08-20', '2024-08-31', 1, 10, 21, '2024-08-20 09:20:29', '2024-08-30 09:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size_id` int UNSIGNED DEFAULT NULL,
  `color_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`, `size_id`, `color_id`) VALUES
(1, 20, 3, '2024-08-26 01:26:00', '2024-08-26 01:26:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_product_id_foreign` (`product_id`);

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
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_user_id_foreign` (`user_id`);

--
-- Indexes for table `clients_notifications`
--
ALTER TABLE `clients_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_voucher_id_foreign` (`voucher_id`);

--
-- Indexes for table `user_voucher`
--
ALTER TABLE `user_voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_voucher_user_id_foreign` (`user_id`),
  ADD KEY `user_voucher_voucher_id_foreign` (`voucher_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_code_unique` (`code`),
  ADD KEY `vouchers_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clients_notifications`
--
ALTER TABLE `clients_notifications`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `order_updates`
--
ALTER TABLE `order_updates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_products`
--
ALTER TABLE `status_products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_voucher`
--
ALTER TABLE `user_voucher`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clients_notifications`
--
ALTER TABLE `clients_notifications`
  ADD CONSTRAINT `clients_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_voucher`
--
ALTER TABLE `user_voucher`
  ADD CONSTRAINT `user_voucher_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_voucher_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
