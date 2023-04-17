-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 17, 2023 lúc 02:46 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `freshshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id_banner` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `title_color` varchar(7) NOT NULL DEFAULT '#000000',
  `content` varchar(255) DEFAULT NULL,
  `content_color` varchar(7) NOT NULL DEFAULT '#838E94',
  `btn_content` varchar(20) DEFAULT NULL,
  `btn_bg_color` varchar(7) NOT NULL DEFAULT '#000000',
  `btn_color` varchar(7) NOT NULL DEFAULT '#ffffff',
  `link` varchar(20) DEFAULT NULL,
  `attr` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id_banner`, `image`, `title`, `title_color`, `content`, `content_color`, `btn_content`, `btn_bg_color`, `btn_color`, `link`, `attr`, `created_at`, `updated_at`) VALUES
(1, 'grocery-banner.png', 'Fruits & Vegetables', '#000000', 'Get Upto 30% Off', '#838E94', 'Shop Now', '#000000', '#ffffff', NULL, NULL, NULL, NULL),
(2, 'grocery-banner-2.png', 'Freshly Baked Buns', '#000000', 'Get Upto 25% Off', '#838E94', 'Shop Now', '#000000', '#ffffff', NULL, NULL, NULL, NULL),
(3, 'banner-deal.jpg', '100% Organic Stawberry', '#FFFFFF', 'Get the best deal before close.', '#FFFFFF', 'Shop Now', '#099309', '#000000', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `order_code`, `id_user`, `id_product`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'USR2_0', 2, 10, 200, '2023-03-09 17:00:00', NULL),
(2, 'USR2_0', 2, 4, 400, '2023-03-09 17:00:00', NULL),
(3, 'USR2_0', 2, 1, 100, '2023-03-09 17:00:00', NULL),
(4, 'USR2_0', 2, 3, 100, '2023-03-09 17:00:00', NULL),
(5, 'USR2_1', 2, 2, 500, '2023-04-08 17:00:00', NULL),
(6, 'USR2_1', 2, 5, 500, '2023-04-08 17:00:00', NULL),
(7, 'USR2_2', 2, 11, 300, '2023-04-09 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(20) DEFAULT NULL,
  `context` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `id_product`, `id_user`, `verified`, `name`, `context`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, NULL, 'So so good', 5, '2023-03-14 17:00:00', NULL),
(2, 3, 2, 1, NULL, 'So so delicious', 5, '2023-03-14 17:00:00', NULL),
(3, 4, 2, 1, NULL, 'So so good', 4, '2023-03-14 17:00:00', NULL),
(4, 10, 2, 1, NULL, 'So so good', 3, '2023-03-14 17:00:00', NULL),
(5, 2, 2, 0, NULL, 'Just a commment', NULL, '2023-04-01 17:00:00', NULL),
(6, 5, 1, 0, NULL, 'Just a good', NULL, '2023-04-02 17:00:00', NULL),
(7, 8, 2, 0, NULL, 'Just a some comment', NULL, '2023-03-01 17:00:00', NULL),
(8, 1, 1, 0, NULL, 'Change this comment', NULL, '2023-03-31 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id_coupon` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(40) NOT NULL,
  `code` varchar(20) NOT NULL,
  `discount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`id_coupon`, `title`, `code`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New Member', 'NEWMEM', 40, 1, '2023-04-11 21:11:00', NULL);

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
-- Cấu trúc bảng cho bảng `favourite`
--

CREATE TABLE `favourite` (
  `id_fa` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groupmessage`
--

CREATE TABLE `groupmessage` (
  `id_group` bigint(20) UNSIGNED NOT NULL,
  `code_group` varchar(10) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `library`
--

CREATE TABLE `library` (
  `id_lib` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `library`
--

INSERT INTO `library` (`id_lib`, `id_product`, `image`, `created_at`, `updated_at`) VALUES
(79, 55, 'rau_muong_4.jpg', '2023-04-17 04:54:21', '2023-04-17 04:54:21'),
(80, 55, 'rau_muong_3.jpg', '2023-04-17 04:54:21', '2023-04-17 04:54:21'),
(81, 55, 'rau_muong_2.jpg', '2023-04-17 04:54:21', '2023-04-17 04:54:21'),
(82, 55, 'rau_muong_1.jpg', '2023-04-17 04:54:21', '2023-04-17 04:54:21'),
(83, 56, 'tomato_4.jpg', '2023-04-17 04:59:37', '2023-04-17 04:59:37'),
(84, 56, 'tomato_3.jpg', '2023-04-17 04:59:37', '2023-04-17 04:59:37'),
(85, 56, 'tomato_2.jpg', '2023-04-17 04:59:37', '2023-04-17 04:59:37'),
(86, 56, 'tomato_1.jpg', '2023-04-17 04:59:37', '2023-04-17 04:59:37'),
(91, 57, 'apple_4.jpg', '2023-04-17 05:07:56', '2023-04-17 05:07:56'),
(92, 57, 'apple_3.jpg', '2023-04-17 05:07:56', '2023-04-17 05:07:56'),
(93, 57, 'apple_2.jpg', '2023-04-17 05:07:56', '2023-04-17 05:07:56'),
(94, 57, 'apple_1.jpg', '2023-04-17 05:07:56', '2023-04-17 05:07:56'),
(95, 58, 'amaranth_1.jpg', '2023-04-17 05:40:46', '2023-04-17 05:40:46'),
(96, 58, 'amaranth_4.jpg', '2023-04-17 05:40:46', '2023-04-17 05:40:46'),
(97, 58, 'amaranth_3.jpg', '2023-04-17 05:40:46', '2023-04-17 05:40:46'),
(98, 58, 'amaranth_2.jpg', '2023-04-17 05:40:46', '2023-04-17 05:40:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `id_message` bigint(20) UNSIGNED NOT NULL,
  `code_group` varchar(10) DEFAULT NULL,
  `message` varchar(200) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(5, '2023_04_11_015958_create_typeproduct', 1),
(6, '2023_04_11_020011_create_product', 1),
(7, '2023_04_11_020024_create_comment', 1),
(8, '2023_04_11_020035_create_order', 1),
(9, '2023_04_11_020041_create_cart', 1),
(10, '2023_04_11_020051_create_coupon', 1),
(11, '2023_04_11_020057_create_news', 1),
(12, '2023_04_11_020115_create_banner', 1),
(13, '2023_04_11_020121_create_slide', 1),
(14, '2023_04_11_020159_create_library', 1),
(15, '2023_04_11_020440_create_favourite', 1),
(16, '2023_04_11_020457_create_message', 1),
(17, '2023_04_11_020505_create_groupmessage', 1),
(18, '2023_04_14_003659_typeproduct', 2),
(19, '2023_04_14_010258_add_details_to_typeproduct_table', 3),
(20, '2023_04_14_021623_edit_status', 4),
(21, '2023_04_14_022339_add_status_to_typeproduct_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_news` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) DEFAULT NULL,
  `title` varchar(40) NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `attr` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_address` varchar(255) NOT NULL,
  `order_phone` varchar(255) NOT NULL,
  `order_email` varchar(255) NOT NULL,
  `code_coupon` varchar(255) DEFAULT NULL,
  `shipping_fee` decimal(8,1) NOT NULL DEFAULT 2.0,
  `method` enum('online','cod') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('finished','confirmed','delivery','unconfimred','cancel','transaction failed') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id_order`, `order_code`, `id_user`, `order_name`, `order_address`, `order_phone`, `order_email`, `code_coupon`, `shipping_fee`, `method`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'USR2_0', 2, 'Cat Tuong', '135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh', '0919941037', 'cattuongw2000@gmail.com', 'NEWMEM', '2.0', 'cod', NULL, 'finished', '2023-03-09 17:00:00', NULL),
(2, 'USR2_1', 2, 'Cat Tuong', '135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh', '0919941037', 'cattuongw2000@gmail.com', NULL, '2.0', 'cod', NULL, 'delivery', '2023-04-08 17:00:00', NULL),
(3, 'USR2_2', 2, 'Cat Tuong', '135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh', '0919941037', 'cattuongw2000@gmail.com', NULL, '2.0', 'cod', NULL, 'confirmed', '2023-04-09 17:00:00', NULL);

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
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `quantity` decimal(8,2) NOT NULL,
  `description` longtext DEFAULT NULL,
  `original_price` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `sale` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `name`, `id_type`, `status`, `quantity`, `description`, `original_price`, `price`, `sale`, `created_at`, `updated_at`) VALUES
(55, 'Rau Muống', 1, 1, '100.00', 'Có nhiều từ tiếng Anh khác nhau được dùng để chỉ “rau muống”, nếu muốn gọi tên một loại rau ăn lá quen thuộc của người Việt, từ nào là chính xác?\r\n\r\nKhi lướt mạng, thấy có chỗ nói \"rau muống\" tiếng Anh là \"morning glory\", tôi ngạc nhiên. \"Morning glory\" là loại cây leo, có hoa giống như hình cái kèn trumpet. Nếu tìm kiếm \"morning glory\" bằng hình ảnh, bạn sẽ thấy đặc trưng của nó là các loại hoa giống như hoa rau muống, nhưng có nhiều cây có lá to, hoặc trên lá có lông tơ.\r\nRau muống là một trong những giống cây thuộc về \"morning glory\", và hoa rau muống thì chính xác là hoa của cây \"morning glory\". Tuy nhiên, dịch \"morning glory\" thành \"rau muống\", theo tôi dễ bị hiểu nhầm.\r\n\r\nTìm hiểu thêm, tôi thấy có một số website ở Anh để \"morning glory\" là \"rau muống\". Tôi không ở Anh nên không biết, nhưng nếu trong một khu vực nhất định, mọi người thống nhất \"morning glory\" là \"rau muống\" thì khi tới đó, bạn có thể hỏi: \"Do you know where I can buy morning glory?\". Nhưng, người dùng hãy thận trọng về mức độ phổ biến của từ này.\r\n\r\nCòn ở Mỹ, có nhiều website để hình ảnh rau muống kèm theo từ \"swamp morning glory\" – cây \"morning glory\" đầm lầy. Điều thú vị là khi tìm kiếm cụm từ \"swamp morning glory\" trên Google, bạn sẽ thấy ngay cây rau muống quen thuộc, và nó được miêu tả là loại \"thực vật xâm hại\" (invasive species). Khả năng cao tên này bắt nguồn từ việc cây rau muống phát triển mạnh ở nước (swamp), và nó là giống \"morning glory\".\r\n\r\nNếu buộc phải dùng tiếng Anh, tôi sẽ dùng từ \"water spinach\" – rau \"spinach\" ở dưới nước. Khi tìm kiếm cụm từ này bằng hình ảnh, hàng loạt kết quả trên Google là rau muống theo cách nghĩ của người Việt.', '1.00', '2.00', 30, '2023-04-17 04:54:21', '2023-04-17 04:54:21'),
(56, 'tomato', 1, 1, '100.00', 'Cà chua (danh pháp hai phần: Solanum lycopersicum), thuộc họ Cà (Solanaceae), là một loại rau quả làm thực phẩm. Quả ban đầu có màu xanh, chín ngả màu từ vàng đến đỏ. Cà chua có vị hơi chua và là một loại thực phẩm bổ dưỡng, tốt cho cơ thể, giàu vitamin C và A, đặc biệt là giàu lycopene tốt cho sức khỏe.\r\n\r\nCà chua thuộc họ Cà, các loại cây trong họ này thường phát triển từ 1 đến 3 mét chiều cao, có những cây thân mềm bò trên mặt đất hoặc dây leo trên thân cây khác, ví dụ nho. Họ cây này là một loại cây lâu năm trong môi trường sống bản địa của nó, nhưng nay nó được trồng như một loại cây hàng năm ở các vùng khí hậu ôn đới và nhiệt đới.', '15.00', '30.00', 20, '2023-04-17 04:59:37', '2023-04-17 04:59:37'),
(57, 'apple', 3, 1, '500.00', 'Quả táo có chứa rất nhiều dưỡng chất có lợi cho sức khỏe của bạn chẳng hạn như Carb, chất xơ, đường, chất béo, vitamin C, kali, magie,… Tuy cung cấp nhiều dinh dưỡng nhưng một quả táo chỉ có chứa 52 calo.\r\n<br>\r\nBên cạnh đó, một lý do khiến nhiều người lựa chọn loại quả này đó là thơm ngon và có thể chế biến theo nhiều cách khác nhau. Khi kết hợp với các loại thực phẩm khác thì các món ăn từ táo sẽ càng đa dạng, phong phú, mang đến hương vị thơm ngon, hấp dẫn mà vẫn đảm bảo giá trị dinh dưỡng.', '16.00', '50.00', 30, '2023-04-17 05:05:24', '2023-04-17 05:05:24'),
(58, 'amaranth', 1, 1, '100.00', 'Rau dền, là tên gọi chung để chỉ các loài trong Chi Dền do ở Việt Nam thường được sử dụng làm rau. Chi Dền gồm những loài đều có hoa không tàn, một số mọc hoang dại nhưng nhiều loài được sử dụng làm lương thực, rau, cây cảnh ở các vùng khác nhau trên thế giới.', '15.00', '30.00', 25, '2023-04-17 05:40:46', '2023-04-17 05:40:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id_slide` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(60) NOT NULL,
  `title_color` varchar(7) NOT NULL DEFAULT '#000000',
  `content` varchar(200) DEFAULT NULL,
  `content_color` varchar(7) NOT NULL DEFAULT '#343A40',
  `link` varchar(20) DEFAULT NULL,
  `btn_content` varchar(20) DEFAULT NULL,
  `btn_color` varchar(7) NOT NULL DEFAULT '#ffffff',
  `btn_bg_color` varchar(7) NOT NULL DEFAULT '#000000',
  `attr` varchar(255) DEFAULT NULL,
  `alert` varchar(40) DEFAULT NULL,
  `alert_size` varchar(4) NOT NULL DEFAULT 'fs-6',
  `alert_color` varchar(7) NOT NULL DEFAULT '#000000',
  `alert_bg` varchar(7) NOT NULL DEFAULT '#dc3545',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id_slide`, `image`, `title`, `title_color`, `content`, `content_color`, `link`, `btn_content`, `btn_color`, `btn_bg_color`, `attr`, `alert`, `alert_size`, `alert_color`, `alert_bg`, `created_at`, `updated_at`) VALUES
(1, 'slide-1.jpg', 'SuperMarket For Fresh Gorcery', '#000000', 'Always supply a high-quality product at a cheaper cost for everyone', '#5C6C75', '', 'Shop Now', '#ffffff', '#000000', '', 'New Product', 'fs-6', '#000000', '#FFC107', '2023-04-11 21:10:35', NULL),
(2, 'slider-2.jpg', 'Free Shipping - orders over $100', '#000000', 'Signup to to get coupon -40% for first order', '#5C6C75', '', 'Sign Up', '#ffffff', '#000000', '', 'Get coupon', 'fs-6', '#000000', '#FFC107', '2023-04-11 21:10:35', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeproduct`
--

CREATE TABLE `typeproduct` (
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `typeproduct`
--

INSERT INTO `typeproduct` (`id_type`, `type`, `created_at`, `updated_at`, `image`, `status`) VALUES
(1, 'vegetable', '2023-03-31 17:00:00', '2023-04-17 02:02:27', 'vegetable.jpg', 'Active'),
(2, 'fruit', '2023-04-01 17:00:00', '2023-04-13 20:57:11', 'fruit.jpg', 'Active'),
(3, 'meat', '2023-03-31 17:00:00', '2023-04-17 02:14:33', 'meat.jpg', 'Active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `google_id` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id_coupon`),
  ADD UNIQUE KEY `coupon_code_unique` (`code`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id_fa`);

--
-- Chỉ mục cho bảng `groupmessage`
--
ALTER TABLE `groupmessage`
  ADD PRIMARY KEY (`id_group`);

--
-- Chỉ mục cho bảng `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id_lib`);

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

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
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Chỉ mục cho bảng `typeproduct`
--
ALTER TABLE `typeproduct`
  ADD PRIMARY KEY (`id_type`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id_coupon` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id_fa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `groupmessage`
--
ALTER TABLE `groupmessage`
  MODIFY `id_group` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `library`
--
ALTER TABLE `library`
  MODIFY `id_lib` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id_message` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `id_type` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
