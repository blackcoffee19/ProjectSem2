-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 29, 2023 lúc 09:32 AM
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
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id_address` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `shipment_fee` int(11) NOT NULL DEFAULT 2,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`id_address`, `id_user`, `receiver`, `address`, `shipment_fee`, `phone`, `email`, `default`, `created_at`, `updated_at`) VALUES
(1, 3, 'Ahri', '10 Đường gì đấy, Xã Lai Uyên, Huyện Bàu Bàng, Bình Dương', 3, '01901919123', 'cattuongw2000@gmail.com', 1, '2023-01-09 17:00:00', NULL),
(2, 2, 'Jinx', '34B Đường, Xã Trà Thanh, Huyện Tây Trà, Tỉnh Quảng Ngãi', 3, '01901919123', 'didi01092k@gmail.com', 0, '2023-02-09 17:00:00', NULL),
(3, 3, 'Melaine', '33 Đường, Xã Việt Tiến, Huyện Bảo Yên, Tỉnh Lào Cai', 3, '01901919123', 'cattuongw2018@gmail.com', 0, '2022-12-09 17:00:00', NULL),
(4, 2, 'Cat Tuong', '135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh', 2, '0919941037', 'cattuongw2000@gmail.com', 1, '2022-11-09 17:00:00', NULL),
(5, 4, 'Cat Tuong', '12 Le Van Sy, Phuong 5, Quan 3, TP Ho Chi Minh', 2, '09219221124', 'cattuongw2018@gmail.com', 1, '2023-01-09 17:00:00', NULL);

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
(1, 'grocery-banner-2.jpg', 'Siêu ưu đãi cuối tuần mùa hè', '#d27979', 'Giả giá 80% mọi sản phẩm', '#ffffff', 'Click mua', '#ff0000', '#ffffff', NULL, NULL, NULL, '2023-04-29 00:30:22'),
(2, 'grocery-banner.png', 'Rau tươi mới nhập', '#ffffff', 'Giảm giá đến 40%', '#ff0000', 'Click ngay', '#ffffff', '#ff0000', NULL, NULL, NULL, '2023-04-29 00:30:52'),
(3, 'Le_Hoi_Trai_Cay.jpg', 'Lễ hội trái cây miền Tây', '#ff0000', 'Siêu ưu đãi lên đến 60%', '#ff0000', 'Click nhanh', '#ff0000', '#ffffff', NULL, NULL, NULL, '2023-04-29 00:31:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `sale` decimal(8,2) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `order_code`, `id_user`, `id_product`, `price`, `sale`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'USR2_0', 2, 10, '22.00', '0.00', 200, '2023-03-09 17:00:00', NULL),
(2, 'USR2_0', 2, 4, '13.00', '0.00', 400, '2023-03-09 17:00:00', NULL),
(3, 'USR2_0', 2, 1, '15.00', '10.00', 100, '2023-03-09 17:00:00', NULL),
(4, 'USR2_0', 2, 3, '22.00', '12.00', 100, '2023-03-09 17:00:00', NULL),
(5, 'USR2_1', 2, 12, '31.00', '0.00', 500, '2023-04-08 17:00:00', NULL),
(6, 'USR2_1', 2, 15, '11.00', '0.00', 500, '2023-04-08 17:00:00', NULL),
(7, 'USR2_2', 2, 11, '22.00', '0.00', 300, '2023-04-09 17:00:00', NULL),
(8, 'USR2_3', 2, 15, '20.20', '0.00', 700, '2023-04-09 17:00:00', NULL),
(9, 'USR2_3', 2, 16, '22.30', '20.00', 240, '2023-04-09 17:00:00', NULL),
(10, 'USR2_3', 2, 13, '28.60', '20.00', 340, '2023-04-09 17:00:00', NULL),
(11, 'USR3_0', 3, 9, '22.00', '0.00', 400, '2023-04-09 17:00:00', NULL),
(12, 'USR3_0', 3, 10, '12.00', '10.00', 300, '2023-04-09 17:00:00', NULL),
(13, 'USR3_0', 3, 8, '8.00', '0.00', 200, '2023-04-09 17:00:00', NULL),
(14, 'USR3_0', 3, 7, '19.00', '10.00', 1000, '2023-04-09 17:00:00', NULL),
(15, 'USR3_1', 3, 6, '15.00', '10.00', 100, '2023-04-15 17:00:00', NULL),
(16, 'USR3_1', 3, 4, '10.00', '20.00', 160, '2023-04-15 17:00:00', NULL),
(17, 'USR3_2', 3, 14, '10.00', '20.00', 160, '2023-04-17 04:00:00', NULL),
(18, 'USR3_2', 3, 9, '19.00', '0.00', 460, '2023-04-17 04:00:00', NULL),
(19, 'USR3_2', 3, 10, '19.00', '0.00', 460, '2023-04-17 04:00:00', NULL),
(20, 'USR3_3', 3, 6, '23.00', '0.00', 440, '2023-04-16 17:00:00', NULL),
(21, 'USR3_3', 3, 2, '21.00', '20.00', 500, '2023-04-16 17:00:00', NULL),
(22, 'USR3_3', 3, 11, '27.00', '10.00', 500, '2023-04-16 17:00:00', NULL),
(23, 'USR3_4', 3, 12, '27.00', '40.00', 500, '2023-04-13 17:00:00', NULL),
(24, 'USR3_4', 3, 8, '17.00', '0.00', 200, '2023-04-13 17:00:00', NULL),
(25, 'USR3_4', 3, 6, '21.00', '0.00', 200, '2023-04-13 17:00:00', NULL),
(26, 'USR3_4', 3, 14, '21.00', '0.00', 500, '2023-04-13 17:00:00', NULL),
(27, 'GUT_0', NULL, 15, '20.00', '0.00', 500, '2023-03-16 17:00:00', NULL),
(28, 'GUT_0', NULL, 12, '14.00', '0.00', 500, '2023-03-16 17:00:00', NULL),
(29, 'GUT_1', NULL, 11, '14.00', '0.00', 500, '2023-04-02 17:00:00', NULL),
(30, 'GUT_1', NULL, 13, '20.00', '10.00', 500, '2023-04-02 17:00:00', NULL),
(31, 'GUT_1', NULL, 9, '18.00', '0.00', 200, '2023-04-02 17:00:00', NULL),
(32, 'GUT_2', NULL, 16, '23.00', '10.00', 1000, '2023-04-16 17:00:00', NULL),
(33, 'GUT_2', NULL, 12, '33.00', '10.00', 300, '2023-04-16 17:00:00', NULL),
(34, 'GUT_2', NULL, 11, '12.00', '10.00', 340, '2023-04-16 17:00:00', NULL),
(35, 'GUT_2', NULL, 13, '21.00', '10.00', 500, '2023-04-16 17:00:00', NULL);

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
(1, 1, 2, 1, NULL, 'So so good', 1, '2023-03-14 17:00:00', NULL),
(2, 3, 2, 1, NULL, 'So so delicious', 2, '2023-03-14 17:00:00', NULL),
(3, 4, 2, 1, NULL, 'So so good', 4, '2023-03-14 17:00:00', NULL),
(4, 10, 2, 1, NULL, 'So so good', 3, '2023-03-14 17:00:00', NULL),
(5, 2, 2, 0, NULL, 'Just a commment', NULL, '2023-04-01 17:00:00', NULL),
(6, 5, 1, 0, NULL, 'Just a good', NULL, '2023-04-02 17:00:00', NULL),
(7, 8, 2, 0, NULL, 'Just a some comment', NULL, '2023-03-01 17:00:00', NULL),
(8, 1, 1, 0, NULL, 'Change this comment', NULL, '2023-03-31 17:00:00', NULL),
(9, 9, 3, 1, NULL, 'So so good', 4, '2023-04-09 17:00:00', NULL),
(10, 10, 3, 1, NULL, 'So so good', 4, '2023-04-09 17:00:00', NULL),
(11, 8, 3, 1, NULL, 'So so good', 3, '2023-04-09 17:00:00', NULL),
(12, 7, 3, 1, NULL, 'So so good', 5, '2023-04-09 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id_coupon` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(40) NOT NULL,
  `code` varchar(20) NOT NULL,
  `discount` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`id_coupon`, `title`, `code`, `discount`, `max`, `status`, `created_at`, `updated_at`) VALUES
(1, 'New Member', 'NEWMEM', 40, 1, 1, '2022-11-14 17:00:00', NULL),
(2, 'Free Ship', 'FREESHIP423', 2, 3, 1, '2023-03-31 17:00:00', NULL),
(3, 'Free Ship', 'FREESHIP522', 2, 3, 0, '2022-04-30 17:00:00', NULL);

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
(1, 1, 'Corn_1.jpg', NULL, NULL),
(2, 1, 'Corn_2.jpg', NULL, NULL),
(3, 1, 'Corn_3.jpg', NULL, NULL),
(4, 1, 'Corn_4.jpg', NULL, NULL),
(5, 2, 'calabash_1.jpg', NULL, NULL),
(6, 2, 'calabash_2.jpg', NULL, NULL),
(7, 2, 'calabash_3.jpg', NULL, NULL),
(8, 2, 'calabash_4.jpg', NULL, NULL),
(9, 3, 'pumkin_1.jpg', NULL, NULL),
(10, 3, 'pumkin_2.jpg', NULL, NULL),
(11, 3, 'pumkin_3.jpg', NULL, NULL),
(12, 3, 'pumkin_4.jpg', NULL, NULL),
(13, 4, 'tomato_1.jpg', NULL, NULL),
(14, 4, 'tomato_2.jpg', NULL, NULL),
(15, 4, 'tomato_3.jpg', NULL, NULL),
(16, 4, 'tomato_4.jpg', NULL, NULL),
(17, 5, 'carrot_1.jpg', NULL, NULL),
(18, 5, 'carrot_2.jpg', NULL, NULL),
(19, 5, 'carrot_3.jpg', NULL, NULL),
(20, 5, 'carrot_4.jpg', NULL, NULL),
(21, 6, 'eggplant_1.jpg', NULL, NULL),
(22, 6, 'eggplant_2.jpg', NULL, NULL),
(23, 6, 'eggplant_3.jpg', NULL, NULL),
(24, 6, 'eggplant_4.jpg', NULL, NULL),
(25, 7, 'White radish_1.jpg', NULL, NULL),
(26, 7, 'White radish_2.jpg', NULL, NULL),
(27, 7, 'White radish_3.jpg', NULL, NULL),
(28, 7, 'White radish_4.jpg', NULL, NULL),
(29, 8, 'onion_1.jpg', NULL, NULL),
(30, 8, 'onion_2.jpg', NULL, NULL),
(31, 8, 'onion_3.jpg', NULL, NULL),
(32, 8, 'onion_4.jpg', NULL, NULL),
(33, 9, 'bell pepper_1.jpg', NULL, NULL),
(34, 9, 'bell pepper_2.jpg', NULL, NULL),
(35, 9, 'bell pepper_3.jpg', NULL, NULL),
(36, 9, 'bell pepper_4.jpg', NULL, NULL),
(37, 10, 'Lettuce_1.jpg', NULL, NULL),
(38, 10, 'Lettuce_2.jpg', NULL, NULL),
(39, 10, 'Lettuce_3.jpg', NULL, NULL),
(40, 10, 'Lettuce_4.jpg', NULL, NULL),
(41, 11, 'coconut_1.jpg', NULL, NULL),
(42, 11, 'coconut_2.jpg', NULL, NULL),
(43, 11, 'coconut_3.png', NULL, NULL),
(44, 11, 'coconut_4.jpg', NULL, NULL),
(45, 12, 'watermelon_1.png', NULL, NULL),
(46, 12, 'watermelon_2.jpg', NULL, NULL),
(47, 12, 'watermelon_3.jpg', NULL, NULL),
(48, 12, 'watermelon_4.png', NULL, NULL),
(49, 13, 'pear_1.jpg', NULL, NULL),
(50, 13, 'pear_2.jpg', NULL, NULL),
(51, 13, 'pear_3.jpg', NULL, NULL),
(52, 13, 'pear_4.jpg', NULL, NULL),
(53, 14, 'plum_1.jpg', NULL, NULL),
(54, 14, 'plum_2.jpg', NULL, NULL),
(55, 14, 'plum_3.jpg', NULL, NULL),
(56, 14, 'plum_4.jpg', NULL, NULL),
(57, 15, 'mangosteen_1.png', NULL, NULL),
(58, 15, 'mangosteen_2.jpeg', NULL, NULL),
(59, 15, 'mangosteen_3.jpg', NULL, NULL),
(60, 15, 'mangosteen_4.jpg', NULL, NULL),
(61, 16, 'durian_1.png', NULL, NULL),
(62, 16, 'durian_2.jpg', NULL, NULL),
(63, 16, 'durian_3.jpg', NULL, NULL),
(64, 16, 'durian_4.png', NULL, NULL),
(65, 17, 'apple_1.jpg', NULL, NULL),
(66, 17, 'apple_2.jpg', NULL, NULL),
(67, 17, 'apple_3.jpg', NULL, NULL),
(68, 17, 'apple_4.jpg', NULL, NULL),
(69, 18, 'pinapple_1.jpg', NULL, NULL),
(70, 18, 'pinapple_2.jpg', NULL, NULL),
(71, 18, 'pinapple_3.jpg', NULL, NULL),
(72, 18, 'pinapple_4.jpg', NULL, NULL),
(73, 19, 'litchi_1.jpg', NULL, NULL),
(74, 19, 'litchi_2.jpg', NULL, NULL),
(75, 19, 'litchi_3.jpg', NULL, NULL),
(76, 19, 'litchi_4.png', NULL, NULL),
(77, 20, 'mango_1.jpg', NULL, NULL),
(78, 20, 'mango_2.jpg', NULL, NULL),
(79, 20, 'mango_3.png', NULL, NULL),
(80, 20, 'mango_4.jpg', NULL, NULL),
(81, 21, 'beef_1.jpg', NULL, NULL),
(82, 21, 'beef_2.jpg', NULL, NULL),
(83, 21, 'beef_3.jpg', NULL, NULL),
(84, 21, 'beef_4.jpg', NULL, NULL),
(85, 22, 'plaice_1.jpg', NULL, NULL),
(86, 22, 'plaice_2.jpg', NULL, NULL),
(87, 22, 'plaice_3.jpg', NULL, NULL),
(88, 22, 'plaice_4.jpg', NULL, NULL),
(89, 23, 'Snakehead fish_1.jpg', NULL, NULL),
(90, 23, 'Snakehead fish_2.jpg', NULL, NULL),
(91, 23, 'Snakehead fish_3.jpg', NULL, NULL),
(92, 23, 'Snakehead fish_4.jpg', NULL, NULL),
(93, 24, 'tuna_1.jpg', NULL, NULL),
(94, 24, 'tuna_2.jpg', NULL, NULL),
(95, 24, 'tuna_3.jpg', NULL, NULL),
(96, 24, 'tuna_4.jpg', NULL, NULL),
(97, 25, 'mackerel_1.jpg', NULL, NULL),
(98, 25, 'mackerel_2.png', NULL, NULL),
(99, 25, 'mackerel_3.jpg', NULL, NULL),
(100, 25, 'mackerel_4.jpg', NULL, NULL),
(101, 26, 'goat_1.jpg', NULL, NULL),
(102, 26, 'goat_2.jpg', NULL, NULL),
(103, 26, 'goat_3.jpg', NULL, NULL),
(104, 26, 'goat_4.png', NULL, NULL),
(105, 27, 'chicken_1.jpg', NULL, NULL),
(106, 27, 'chicken_2.jpg', NULL, NULL),
(107, 27, 'chicken_3.jpg', NULL, NULL),
(108, 27, 'chicken_4.jpg', NULL, NULL),
(109, 28, 'pork_1.jpg', NULL, NULL),
(110, 28, 'pork_2.png', NULL, NULL),
(111, 28, 'pork_3.jpg', NULL, NULL),
(112, 28, 'pork_4.jpg', NULL, NULL),
(113, 29, 'lamb_1.jpg', NULL, NULL),
(114, 29, 'lamb_2.png', NULL, NULL),
(115, 29, 'lamb_3.jpg', NULL, NULL),
(116, 29, 'lamb_4.jpg', NULL, NULL),
(117, 30, 'Buffalo_1.jpg', NULL, NULL),
(118, 30, 'Buffalo_2.jpg', NULL, NULL),
(119, 30, 'Buffalo_3.jpg', NULL, NULL),
(120, 30, 'Buffalo_4.jpg', NULL, NULL);

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
(18, '2023_04_15_031357_create_adddress', 1),
(19, '2023_04_24_084126_add_details_to_users_table', 1);

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
  `send_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_news`, `order_code`, `title`, `id_user`, `link`, `attr`, `send_admin`, `created_at`, `updated_at`) VALUES
(1, 'USR3_3', 'How do you think about your order?', 3, 'feedback', 'USR3_3', 0, '2023-04-16 17:00:00', NULL),
(2, 'USR2_2', 'Order Transaction Failed', 2, 'USR2_2', NULL, 1, '2023-04-09 17:00:00', NULL),
(3, 'USR3_2', 'Order Cancel', 3, 'USR3_2', NULL, 1, '2023-04-18 04:00:00', NULL),
(4, 'USR3_3', 'New Order', 3, 'USR3_3', NULL, 1, '2023-04-16 17:00:00', NULL),
(5, 'GUT_2', 'New Order', NULL, 'GUT_2', NULL, 1, '2023-04-16 17:00:00', NULL),
(6, 'GUT_0', 'Order Cancel', NULL, 'GUT_0', NULL, 1, '2023-03-17 17:00:00', NULL),
(7, NULL, 'New Product', NULL, 'products-details', '17', 0, '2023-04-26 18:55:51', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `receiver` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code_coupon` varchar(255) DEFAULT NULL,
  `shipping_fee` decimal(8,1) NOT NULL DEFAULT 2.0,
  `method` enum('cod','paypal') NOT NULL,
  `status` enum('finished','confirmed','delivery','unconfirmed','cancel','transaction failed') NOT NULL,
  `instruction` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id_order`, `order_code`, `id_user`, `receiver`, `phone`, `address`, `email`, `code_coupon`, `shipping_fee`, `method`, `status`, `instruction`, `created_at`, `updated_at`) VALUES
(1, 'USR2_0', 2, 'Cat Tuong', '0919941037', '135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh', 'cattuongw2000@gmail.com', 'NEWMEM', '2.0', 'cod', 'finished', NULL, '2023-03-09 17:00:00', '2023-03-11 17:00:00'),
(2, 'USR2_1', 2, 'Cat Tuong', '0919941037', '135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh', 'cattuongw2000@gmail.com', NULL, '2.0', 'cod', 'delivery', NULL, '2023-04-08 17:00:00', '2023-04-09 17:00:00'),
(3, 'USR2_2', 2, 'Cat Tuong', '0919941037', '135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh', 'cattuongw2000@gmail.com', NULL, '2.0', 'paypal', 'transaction failed', NULL, '2023-04-09 17:00:00', '2023-04-12 17:00:00'),
(4, 'USR2_3', 2, 'Cat Tuong', '0919941037', '135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh', 'cattuongw2000@gmail.com', 'FREESHIP423', '2.0', 'cod', 'confirmed', NULL, '2023-04-09 17:00:00', '2023-04-10 17:00:00'),
(5, 'USR3_0', 3, 'MM', '0919941037', '33 Đường, Xã Việt Tiến, Huyện Bảo Yên, Tỉnh Lào Cai', 'didi01092k@gmail.com', 'NEWMEM', '3.0', 'cod', 'finished', NULL, '2023-04-09 17:00:00', '2023-04-14 17:00:00'),
(6, 'USR3_1', 3, 'MM', '0919941037', '135 Tran Hung Dao, Phuong Cau Ong Lanh, Quan 1, TP Ho Chi Minh', 'cattuongw2018@gmail.com', NULL, '2.0', 'paypal', 'delivery', NULL, '2023-04-15 17:00:00', '2023-04-16 17:00:00'),
(7, 'USR3_2', 3, 'MM', '0122123435', '34B Đường, Xã Trà Thanh, Huyện Tây Trà, Tỉnh Quảng Ngãi', 'irisk5202402@gmail.com', NULL, '3.0', 'cod', 'cancel', NULL, '2023-04-16 19:00:00', '2023-04-18 04:00:00'),
(8, 'USR3_3', 3, 'MM', '0122123443', '33 Đường, Xã Việt Tiến, Huyện Bảo Yên, Tỉnh Lào Cai', 'cattuongw2000@gmail.com', 'FREESHIP423', '3.0', 'cod', 'finished', NULL, '2023-04-13 17:00:00', '2023-04-17 17:00:00'),
(9, 'USR3_4', 3, 'MM', '0122123456', '43/32 Nguyen Huu Tien, Phuong Tay Thanh, Quan Tan Phu, TP Ho Chi Minh', 'cattuongw2000@gmail.com', 'FREESHIP423', '2.0', 'cod', 'unconfirmed', NULL, '2023-04-16 17:00:00', NULL),
(10, 'GUT_0', NULL, 'OwO', '01221236456', '122 Nguyen Thi Minh Khai, Phuong Pham Ngu Lao, Quan 1, TP Ho Chi Minh', 'cattuongw2000@gmail.com', NULL, '2.0', 'cod', 'cancel', NULL, '2023-03-16 17:00:00', '2023-03-17 17:00:00'),
(11, 'GUT_1', NULL, 'UwU', '01232326799', '123 Nguyen Thi Minh Khai, Phuong Pham Ngu Lao, Quan 1, TP Ho Chi Minh', 'cattuongw2000@gmail.com', NULL, '2.0', 'cod', 'delivery', NULL, '2023-04-02 17:00:00', '2023-04-09 17:00:00'),
(12, 'GUT_2', NULL, 'UwU', '01232326799', '124 Nguyen Thi Minh Khai, Phuong Pham Ngu Lao, Quan 1, TP Ho Chi Minh', 'cattuongw2000@gmail.com', NULL, '2.0', 'paypal', 'unconfirmed', NULL, '2023-04-16 17:00:00', NULL);

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
  `sale` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `name`, `id_type`, `status`, `quantity`, `description`, `original_price`, `price`, `sale`, `created_at`, `updated_at`) VALUES
(1, 'Corn', 1, 1, '5000.00', 'Maize or corn or sheath (two parts nomenclature: Zea mays L. ssp. mays) is a food crop that was domesticated in Central America and then spread throughout the Americas. Maize spread to the rest of the world after European contact with the Americas in the late 15th and early 16th centuries. Maize is the most widely grown food crop in the Americas (in the Americas alone). In the United States, production is already about 270 million tons per year). Hybrid maize varieties are preferred by farmers over conventional maize varieties due to their high yield and hybrid advantages. While some varieties of maize can grow up to 7 m (23 ft) tall in some places,[1] commercial varieties of maize have been produced with a height of only about 2.5 m (8 ft). Sweet corn (Zea mays var. rugosa or Zea mays var. saccharata) is generally lower than that of other varieties.', '15.00', '18.00', '20.00', '2023-03-28 17:00:00', NULL),
(2, 'calabash', 1, 1, '4000.00', '\n                Herbaceous vines have branched tendrils, covered with many soft white hairs. Leaves are broad, heart-shaped, not lobed or widely lobed, with white velvety hairs; The peduncle has 2 glands at the apex. The flowers are unisexual at the same base, large, white, with flower stalks up to 20 cm long. Berries are light green or dark green, variegated or round, straight or waist-length, aged rind hardens, white flesh. Seeds white, 1.5 cm long. <br/>\n                A long, cylindrical gourd with smooth green bark <br/>\n                There are many things grown, differing by the shape and size of the fruit, such as:  <br/>\n                - The fruit is cylindrical, long (sometimes up to 1m long), and has a spotted rind (star gourd). <br/>\n                - Has a cylindrical fruit similar to a star gourd, but the rind has no spots. This is the type that is common in Vietnam (see photo below and thumbnail 2). <br/>\n                - There are constriction fruits like wine gourds (Gourd Nam); This type can be used to make water bottles, wine bottles, and gourds. <br/>\n                - Has solid fruit. This is a new variety in Vietnam with high yield and efficiency. People can both sell tops, gourd flowers, and sell fruits <br/>\n                ', '10.00', '15.00', '20.00', '2023-03-28 17:00:00', NULL),
(3, 'pumkin', 1, 1, '5000.00', '\n                Pumpkin or pumpkin (called pumpkin in Southern dialect) is a type of string plant of the genus Cucurbita, family Cucurbitaceae. This is a common name for plants of the following species: Cucurbita pepo, Cucurbita mixta, Cucurbita maxima, and Cucurbita moschata.\n                The origin of the pumpkin is unknown, but many believe that the pumpkin originated in North America. The oldest evidence of pumpkin seeds dating from 7000 to 5500 BC has been found in Mexico. This is the largest fruit in the world.\n                Pumpkins weigh 0.45 kg or more and can weigh up to more than 450 kg, as was the case with an English farmer who planted a fruit that reached 608.3 kg. Pumpkin is spherical or cylindrical, when ripe, it is orange-yellow. The outside is notched and divided into segments. Pumpkin intestines have many seeds. Flat, oval seeds contain a lot of oil. Today\'s heaviest pumpkin was weighed in 2014, 1054 kg\n                ', '10.00', '20.00', '45.00', '2023-03-28 17:00:00', NULL),
(4, 'tomato', 1, 1, '4000.00', 'Tomato (two part nomenclature: Solanum lycopersicum), belonging to the Solanaceae family, is a vegetable for food. The fruit is initially green, turning yellow to red when ripe. Tomatoes have a slightly sour taste and are a nutritious food, good for the body, rich in vitamins C and A, especially rich in healthy lycopene.\n                Tomato belongs to the Ca family, plants in this family usually grow 1 to 3 meters in height, having soft stems that crawl on the ground or vines on other stems, such as grapes. This family of plants is a perennial in its native habitat, but it is now grown as an annual in temperate and tropical climates.\n                ', '10.00', '14.00', '36.00', '2023-03-28 17:00:00', NULL),
(5, 'carrot', 1, 1, '3500.00', 'The carrot (from the French carotte /kaʁɔt/, scientific name: Daucus carota subsp. sativus) is a bulbous plant, usually red, yellow, white or purple. The edible part of the carrot is the tuber, which is actually its taproot, which contains many precursors of vitamin A, which is good for the eyes.\n                In the wild, it is a biennial plant that develops a leaf reservoir during spring and summer, while accumulating large amounts of sugar in its fat taproot, storing energy for flowering throughout the year. Monday. Flowering stems can grow up to 1 m (3 ft) tall, with a canopy containing small white flowers, which produce fruit, known to botanists as pods\n                Carrots are vegetables that contain just enough sodium to maintain blood pressure at a reasonable level in the body. People who consume carrots regularly will have a higher than average rate of maintaining blood pressure at a healthy level.\n                ', '12.00', '16.00', '25.00', '2023-03-28 17:00:00', NULL),
(6, 'eggplant', 1, 1, '4500.00', 'Eggplant (two-part nomenclature: Solanum melongena) is a species of plant in the eggplant family with the same name, generally used as a culinary vegetable. Eggplant is closely related to tomato, potato, eggplant, eggplant and is native to southern India and Sri Lanka. Eggplant is an annual plant, growing to 40–150 cm (16–57 in) tall, usually spiny, with large coarsely lobed leaves, 10–20 cm long and 5–10 cm wide. Flowers white or purplish, with five-lobed corolla and yellow stamens.\n                Eggplant fruit is a fleshy berry, less than 3 cm in diameter in wild plants, but much larger in cultivated varieties. The fruit contains many small and soft seeds. Wild varieties can be larger, growing to 225 cm (84 inches) tall and large leaves (up to 30 cm long and 15 cm wide). The name eggplant does not really reflect this fruit, because there are many other types of eggplant that are also purple or eggplants that are sometimes not purple. However, the name eggplant also does not reflect the true shape of the fruit, because the fruit of many eggplant varieties is not oval as elongated as the goat\'s but rather round, with a diameter of 5 cm to 8 cm. cm..\n                ', '11.00', '17.00', '32.00', '2023-03-28 17:00:00', NULL),
(7, 'White radish', 1, 1, '3900.00', 'White radish (Japanese: Daikon-大根 - Great root, literally: large root) is a variety of radish plant. This variety has fast, long leaves (about 15 cm or more), white, and is native to Southeast or East Asia.They are used in Asian cuisine, in Japan they are ingredients for Daikon oden or radish stew (whole sliced) and sashimi accompaniment, in Vietnam they are the ingredients for pickled dishes. bread, and a stew in a bowl of noodles.\n                In terms of benefits, white radish has the ability to lower serum cholesterol levels and triglyceride levels, while increasing HDL cholesterol (good cholesterol).The mild spicy substance in white radish helps to fight bacteria and relieve pain. Helps support the liver and prevent cardiovascular disease because of the biological active ingredient betaine. This substance supports the liver to work better, and at the same time reduces the amount of homocysteine in the blood plasma - one of the causes of cardiovascular disease.\n                ', '10.00', '14.00', '44.00', '2023-03-28 17:00:00', NULL),
(8, 'onion', 1, 1, '4400.00', 'Most plants of the genus Allium are collectively known as onions. In practice, however, the word onion is generally used to refer to a plant species with the dichotomous name Allium cepa.\n                Onions include plant varieties: French red onion, red onion.\n                Onions are vegetables, unlike onions, which are spices. If we can use both the leaves and the tubers, but our onions are actually very small, onions mainly use the bulbs. The onion bulb is the stem part of the onion plant. Onions are related to purple onions, which are often dried or dried to make onions. Onions originating from Central Asia were transmitted to Europe and then to Vietnam. This species is suitable for temperate climates.\n                ', '11.00', '15.00', '35.00', '2023-03-28 17:00:00', NULL),
(9, 'bell pepper', 1, 1, '2000.00', 'Bell peppers, also known as sweet peppers (called pepper in the United Kingdom of Great Britain and Northern Ireland, Canada, Ireland or capsicum[1] in India, Bangladesh, Australia, Singapore and New Zealand), are the fruit of a group of bell peppers. plants, species Capsicum annuum.[2] Plants of this species produce fruit in a variety of colors, including red, yellow, orange, green, chocolate/brown, vanilla/white, and purple. Bell peppers are sometimes classified as the least pungent peppers in the same category as sweet peppers. Bell peppers have meat, a lot of meat. Bell peppers are native to Mexico, Central America, and northern South America. The stem and seeds inside the bell pepper are edible, but some people will find it bitter.[3] Bell pepper seeds were brought to Spain in 1493 and from there spread throughout Europe, Africa, and Asia. Today, China is the world\'s largest exporter of bell peppers, followed by Mexico and Indonesia.', '12.00', '18.00', '50.00', '2023-03-28 17:00:00', NULL),
(10, 'Lettuce', 1, 1, '5000.00', 'Lettuce also known as cabbage, cauliflower (scientific name: Lactuca sativa) is a species of flowering plant in the Asteraceae family that was first scientifically described by botanist L. in 1753. It is commonly grown as a leafy vegetable, especially in salads, sandwiches, burgers and many other dishes.\n                It is also known as lettuce, known since time immemorial for its refreshing, purifying and sedative properties. Its name comes from the milky (rubber) juice that oozes from the stems of vegetables after being cut\n                Species Lactuca sativa include types such as:\n                Iceburg Lettuce or Iceberg/crisphead: The outer leaf layer is greener and the inner leaf layer is whiter. This variety is most popular because of its crunchy leaf texture, mild flavor, and watery content. It is a rich source of choline (a naturally occurring amine, C5H15NO2, commonly classified as a B complex vitamin, and a component of many other important biomolecules, such as acetylcholine and lecithin).\n                Romaine Lettuce or Cos Lettuce (Romaine Lettuce, Lettuce): Has long, dark green leaves. It has a crispy leaf texture and a richer flavor than other varieties. It is a rich source of vitamins A, C, B1 and B2, and folic acid.\n                Butterhead Lettuce: This is a salad with large and loosely arranged leaves that are easy to separate from its stem. It has a softer leaf texture, with a sweeter flavor than its relative.\n                Loose-leaf Lettuce: As the name suggests, this variety has discretely arranged leaves, with a wide, curly crown. It has a mild flavor and a slightly crunchy leaf texture.\n                ', '13.00', '18.00', '48.00', '2023-03-28 17:00:00', NULL),
(11, 'coconut', 2, 1, '4000.00', 'Coconut (Cocos nucifera) is a species of woody plant, member of the family Arecaceae and the only living species of the genus Cocos.[1] Coconuts are ubiquitous in coastal tropical regions and are a tropical cultural icon. Coconuts provide food, fuel, cosmetics, folk medicine and building materials, among many other uses. The inner flesh of the ripe coconut, as well as the coconut milk that is extracted from it, is a familiar part of the diet of people living in the tropics and subtropics. The coconut fruit is different from other fruits because the endosperm contains a large amount of clear liquid, known as coconut water. Ripe coconuts are used as food, or processed to get coconut oil and coconut milk from the fruit pulp, charcoal from the hard shell and coir from the fibrous shell. The desiccated coconut meat is called copra, the oil and juice extracted from this is often used in cooking - frying in particular - as well as in soaps and cosmetics. Sweet coconut sap can be used as a drink or fermented into coconut wine, coconut vinegar. Hard shells, fibrous husks and long leaves can be used as raw materials to make a variety of interior decoration products.', '15.00', '20.00', '30.00', '2023-03-28 17:00:00', NULL),
(12, 'watermelon', 2, 1, '3900.00', 'Watermelon (scientific name Citrullus lanatus) is a species of plant in the family Cucurbitaceae, a vine-like flowering plant native to West Africa. It is grown for its fruit. Watermelon (Citrullus lanatus) is a species of long, twisted vine in the flowering plant family Cucurbitaceae. There is evidence from watermelon seeds in Pharaoh\'s tombs in ancient Egypt. Watermelon is grown in tropical and subtropical regions worldwide for its edible fruit, is a special type of berry with a hard rind and no division in the fruit, botanically known as pepo. The flesh is sweet, succulent, often deep red to pink, with many black seeds, although seedless varieties have also been produced. The fruit can be eaten raw or processed, and the peel can be eaten after cooking. Breeding efforts have produced disease-resistant varieties of watermelon. Many varieties of watermelon plants can produce mature fruit within 100 days of planting.', '11.00', '18.00', '45.00', '2023-03-28 17:00:00', NULL),
(13, 'pear', 2, 1, '2500.00', 'Pears are native to coastal and temperate regions of the Old World, from western Europe and northern Africa eastward across Asia. They are moderately sized trees, growing to 10–17 m tall, often with tall, narrow foliage; Some species are shrubs. Their leaves are alternate, simple, 2–12 cm long, glossy green in some species, with dense silvery-white hairs in others; Leaf shape ranges from broad oval to narrow lanceolate. Most are deciduous, but 1-2 species in Southeast Asia are evergreen. Most species are cold tolerant, surviving temperatures down to between −25 °C and −40 °C in winter, with the exception of evergreen species, which are tolerant to colds only to about −15 ° C.', '11.00', '16.00', '30.00', '2023-03-28 17:00:00', NULL),
(14, 'plum', 2, 1, '2800.00', 'Plums are the fruit of several species in the subgenus Plums. Plums that are dried are called prunes. Plum is a fruit tree domesticated by humans very early. Plums have long appeared in cuisine in many parts of the world. Although there are many different species of plum, there are currently only two species of global commercial value, the plum plum and the European plum.\n\n                Because plums are large and succulent, they are not suitable for making prunes, but with a long shelf life, the species dominates the fresh fruit market. European plums are quite firm, have a high content of soluble solids and do not ferment during the drying process, so most prunes on the market are made from this species.\n                ', '11.00', '19.00', '20.00', '2023-03-28 17:00:00', NULL),
(15, 'mangosteen', 2, 1, '4600.00', 'Mangosteen (Garcinia mangostana), also known as sweet garlic[2], is a species of tree in the Clusiaceae family. It is also a tropical evergreen tree with edible fruit, native to the island nations of Southeast Asia. Its origin is uncertain due to extensive prehistoric cultivation.[3][4] It grows mainly in Southeast Asia, Southwest India and other tropical areas such as Colombia, Puerto Rico and Florida,[3][5][6] where the tree has been introduced. The tree is 6 to 25 m (19.7 to 82.0 ft) tall.[3] The fruit when ripe has a thick outer skin, dark purple red color, the skin is inedible.[3][5] The flesh is ivory white, succulent, slightly fibrous and divided into many segments, a fruit can contain about 4, 8 packs, very rarely 3 or 9. The fruit has a sweet and sour taste and an attractive aroma. Within each fruit, the edible aromatic flesh surrounding each seed is the vegetative pod, i.e. the inner layer of the ovary.[7][8] The seeds are almond-shaped and small in size.', '12.00', '18.00', '25.00', '2023-03-28 17:00:00', NULL),
(16, 'durian', 2, 1, '3400.00', 'Durian is considered by many in Southeast Asia as the (king of fruits). It is characterized by its large size, strong odor, and many sharp spines surrounding its shell. The fruit can reach 30 centimeters (12 in) in length and 15 centimeters (6 in) in diameter, often weighing one to three kilograms (2 to 7 lb). Depending on the species, the fruit has an oblong to round shape, the color of the peel is from green to brown, and the color of the fruit is from light yellow to red.\n                The flesh of the fruit is edible, and gives off a characteristic, heavy and strong odor, even when the rind is intact. Some people find durian to have a pleasant sweet aroma, but others are intolerable and uncomfortable with the smell. The scent of durian produces reactions ranging from fascination to intense disgust, and has been described as rotten onion, turpentine or sewage. Due to the long-lasting smell of durian, it is banned from some hotels and public transport in Southeast Asia.\n                ', '20.00', '30.00', '10.00', '2023-03-28 17:00:00', NULL),
(17, 'apple', 2, 1, '5000.00', 'Apples contain a lot of nutrients that are beneficial to your health such as Carb, fiber, sugar, fat, vitamin C, potassium, magnesium, etc. Although providing many nutrients, an apple only contains 52 nutrients. calories.\n                Besides, another reason why many people choose this fruit is that it is delicious and can be processed in many different ways. When combined with other foods, the dishes from apples will be more diverse and rich, bringing delicious and attractive flavors while still ensuring nutritional value.\n                ', '13.00', '17.00', '40.00', '2023-03-28 17:00:00', NULL),
(18, 'pinapple', 2, 1, '4600.00', 'Pineapple has other names such as: pineapple, pineapple, ba la, scientific name Ananas comosus, is a tropical fruit. Pineapple is native to Paraguay and southern Brazil.\n                The commonly called pineapple fruit is actually the axis of the flower and the succulent bracts gathered together, and are indeed the (pineapple eyes). Pineapple is eaten fresh or canned as slices, slices, juices or mixed juices. There are two types of pineapples, pineapples with thorns and without thorns: pineapples with thorns, the West called (clumps)and those without thorns called (Thomas).\n                Pineapple has spiny leaves that grow in asterisk clusters. The leaves are long and lance-shaped and have margins with serrations or spines. The flowers grow from the central part of the asterisk-shaped leaves, each with its own sepals. They grow in strong head-shaped clusters on short, stout stems. The sepals become fat and watery and develop into a complex known as the pineapple fruit (false fruit), which grows above the asteroid clusters of leaves.\n                ', '13.00', '20.00', '25.00', '2023-03-28 17:00:00', NULL),
(19, 'litchi', 2, 1, '3600.00', 'Litchi is a tropical woody fruit tree, native to southern China; where it is known as 荔枝 (pinyin: luizhī, Sino-Vietnamese: le chi), distributed south to Indonesia and east to the Philippines (where it is called alupag).\n                Litchi is an evergreen tree of medium size, growing to 15–20 m tall, with alternately pinnate leaves, each 15–25 cm long, with 2-8 lateral leaflets 5–10 cm long. and no leaflets at the apex. The newly sprouted young leaves are bright copper-red, then gradually turn green when reaching their maximum size. The flowers are small, greenish-white or yellowish-white, in panicles up to 30 cm long.\n                The fruit is a drupe, globose or slightly oblong, 3–4 cm long and 3 cm in diameter. The outer skin is red, rough texture, inedible but easily peeled. Inside is a layer of translucent white flesh, sweet and rich in vitamin C, with a texture similar to that of grapes. In the center of the fruit is a brown seed, 2 cm long and 1-1.5 cm in diameter. The seeds - similar to those of the horse chestnut fruit - are mildly toxic and should not be eaten. Fruit ripens from June (in regions near the equator) to October (in regions far from the equator), about 100 days after flowering.\n                ', '14.00', '30.00', '15.00', '2023-03-28 17:00:00', NULL),
(20, 'mango', 2, 1, '4000.00', 'Mango is a sweet-tasting fruit of the genus Mango, which includes numerous tropical fruits, grown mainly as edible fruit. The majority of species found in the wild are wild mangoes. They all belong to the Anacardiaceae family of flowering plants. The mango is native to South and Southeast Asia, from where it has been distributed worldwide to become one of the most cultivated fruits in the tropics. The highest densities of the genus Mango (Magifera) are found west of Malesia (Sumatra, Java and Borneo) and in Myanmar and India.[1] While other Mangifera species (e.g. horse mango, M. Foetida) are also grown on a more local basis, Mangifera indica - common mango or Indian mango - is a mango tree commonly grown only in many areas. tropical and subtropical regions. It is native to India and Myanmar.[2] It is the national fruit of India, Pakistan, the Philippines, and the national tree of Bangladesh.[3] In some cultures, its fruit and leaves are used as ceremonial decorations at weddings, celebrations, and religious ceremonies.', '15.00', '25.00', '40.00', '2023-03-28 17:00:00', NULL),
(21, 'beef', 3, 1, '5000.00', 'Cow is the common name for animals in the genus Bos with the scientific name Bos, including bison and domestic cows. The genus Bos can be divided into 4 subgenus: Bos, Bibos, Novibos, Poephagus, but the distinction between them is still controversial. This genus currently has 5 extant species. However, some authors consider this genus to have up to 7 species because domesticated cattle breeds are also considered separate species by them.\n                The Bovine family is known from fossil records from the Early Miocene, about 20 Ma. The earliest bovines, such as Eotragus, were small animals, somewhat similar to present-day Gazelles and probably lived in woodland habitats. The number of bovine species increased sharply in the Late Miocene, when many species adapted to a more open and grassland environment.\n                The greatest number of modern species of the bovine family belongs to Africa, while the largest but less diverse populations are found in Asia and North America. Many species of this family are thought to have evolved in Asia but were unable to survive due to predation by humans from Africa in the late Pleistocene. In contrast, African species have many thousands or millions of years to adapt to the gradual development of human hunting skills. However, many of the domesticated species in this family are of Asian origin (goats, sheep, buffalo and yaks). This may be because these species are less afraid of humans and more docile.\n                ', '20.00', '50.00', '20.00', '2023-03-28 17:00:00', NULL),
(22, 'plaice', 3, 1, '3700.00', 'In addition to sea bream fish, now in our country there are also freshwater pomfrets. Freshwater pompano has the scientific name of Colossoma brachypomum, originated in the Amazon region, South America, and was imported into our country in 1998.\n                This fish gives delicious meat, and grows 3-4 times faster than other fish species, currently being raised in many localities. The freshwater white pomfret has a silvery gray color or a bluish silver color, the upper and lower jaws of the fish both have sharp teeth that work to tear food (small fish, shrimp, shrimp...).\n                Lives off the coast of the Middle East, South Asia, Southeast Asia. This fish is prized in the Indo-Pacific region for its taste. It is often confused with Trachinotus carolinus, which lives off the coast of the Gulf of Mexico.\n                ', '12.00', '38.00', '40.00', '2023-03-28 17:00:00', NULL),
(23, 'Snakehead fish', 3, 1, '4012.00', 'Fish family (other names: Banana fish, Snakehead fish, Lobster fish, Tilapia fish, Betel nut, flatfish, Dolphin, depending on the region) are fish species of the family Channidae. This family has 2 genera and the living species is Channa, currently known with 39 species, Parachanna currently has 3 species in Africa.\n                In Vietnam, mainly Channa maculata (there is a document called Ophiocephalus maculatus / Bostrychus maculatus) and Channa argus (also known as Ophiocephalus argus or Chinese fruit fish).\n                Dorsal fin with 40 - 46 rays; anal fin with 28 - 30 rays, lateral scales 41 - 55. The head of the Channa maculata has a pattern similar to the word most and the two letters bowl while the head of the Channa argus is relatively pointed and long like a snake\'s head. Their head is flat compared to the body, the scales are gray-brown streaked with light gray spots. The back is brownish black.\n                ', '29.00', '34.00', '16.00', '2023-03-28 17:00:00', NULL),
(24, 'tuna', 3, 1, '3105.00', 'Tuna (also known as humpback fish) is a large fish of the family Scombridae, mainly of the genus Thunnus, living in warm seas, about 185 km from the shore. In Vietnam, Tuna is the local name for bigeye tuna and yellowfin tuna[1]. Tuna is a particularly delicious seafood, very nutritious (bigeye tuna), processed into a variety of delicious dishes and created a valuable source of export goods.\n                Tuna fishing in Vietnam was born in 1994, thanks to the effort of discovering the fishing method of Phu Yen fishermen. After that, this profession gradually spread, becoming the strength of fishermen in the South Central Coast such as Quang Ngai, Binh Dinh, Phu Yen, Khanh Hoa.... On average, Binh Dinh fishermen can catch 10,000 tons of fish each year. Ocean tuna (CNDD), accounting for more than 50% of the country\'s total catch\n                ', '15.00', '25.00', '13.00', '2023-03-28 17:00:00', NULL),
(25, 'mackerel', 3, 1, '4738.00', 'Mackerel is the common name applied to several different species of fish mainly from the Tuna family. They inhabit both tropical and temperate seas. The vast majority of mackerel species live offshore in marine environments, but some, for example Spanish mackerel (Spanish mackerel, scientific name Scomberomorus maculatus) are inshore and can be found near coastal areas. bridge and jetty. The largest type of mackerel is King Mackerel (scientific name Scomberomorus cavalla) which can grow up to 1.68 m long. The common feature of all types of mackerel is a long, slender body (different from tuna, which has a gourd body), with many small fins located behind the large fins on the back and abdomen. Mackerel, if it has scales, is also very small.\n                Mackerel is preferred and caught a lot because of its rich meat and fish oil; They are also known to be capable of fighting. Mackerel is an important object in the industrial fishery and recreational fishing industry. The flesh of mackerel is perishable, rapidly decomposing, especially in hot and humid tropical environments, and so can cause poisoning if eaten rotten fish. Unless handled and stored properly, mackerel must be made into food the same day. For this reason, mackerel has traditionally been sold in London even on Sundays and it is also the only fish that must be salted when making sushi.\n                ', '27.00', '24.00', '14.00', '2023-03-28 17:00:00', NULL),
(26, 'goat', 3, 1, '5558.00', 'Goat meat is a food meat from domestic goats, which is an important and popular food source in some countries such as Bangladesh, Nepal, Sri Lanka, Pakistan, India and some regions in Vietnam (with The specialty is Ninh Binh mountain goat), goat meat is said to be a nutritious food and has the effect of enhancing physiological ability.\n                Goat meat has a delicious taste, has a nutritious effect, keeps warm very well, very suitable to eat in the cold season.[4] In general, goat meat has the effect of promoting blood circulation, increasing body temperature, useful in treating tuberculosis, bronchitis, asthma. Nutritious dishes that are easy to prepare such as porridge, goat meat stewed with garlic, goat meat stewed with carrots, stewed with wine... According to oriental medicine, goat meat is a nutritious food, helping to cure many diseases.\n                ', '27.00', '50.00', '30.00', '2023-03-28 17:00:00', NULL),
(27, 'chicken', 3, 1, '5830.00', 'Chicken or chicken, Hill chicken (three-part nomenclature: Gallus gallus domesticus) is a subspecies of bird that has been domesticated by humans thousands of years ago. Some suggest that this species descended from wild birds in India and tropical red junglefowl in Southeast Asia. In the bird world, chickens are the most dominant species with 24 billion individuals (statistics in 2003).[1] People often use chicken meat, chicken eggs and chicken feathers. In addition, today, people also use chicken to do scientific research experiments in the fields of biology, physics, chemistry.\n                Chickens are omnivores. In the wild, they often dig through the soil looking for seeds, insects, lizards or young mice. The lifespan of chickens can range from five to ten years depending on the breed.[2] The oldest hen in the world lived for 16 years and was recorded in the Guinness Book of Records.[3] Roosters often look different from hens by their colorful plumage, long and glossy tail, and the pointed feathers on the neck and back that are usually lighter and darker in color. However, in some chicken breeds such as the Sebright, the rooster has the same color as the hen, only slightly different in the slightly pointed neck feathers. Males can be differentiated from hens based on the cock\'s crest or the growth of spurs on the rooster\'s legs. Adult chickens also have fleshy bibs on their necks below their beaks. Both roosters and hens have crests and abs, but in most breeds these are only prominent in roosters. In some breeds, a mutation occurs that causes the chicken\'s head to have a feather that looks like a human beard.\n                Although generally light birds can fly short distances at low altitudes, such as over hedges or bushes, most domestic birds are burrowing birds and are not able to fly as far as those that fly with Full body structure adapted for aerial behavior. Chickens sometimes fly in bursts when exploring their surroundings or hiding from danger.\n                ', '18.00', '24.00', '16.00', '2023-03-28 17:00:00', NULL),
(28, 'pork', 3, 1, '4218.00', 'The domestic pig or domestic pig is a domesticated breed of wild boar, raised for meat. Most domestic pigs have a thin coat on the surface of their skin. The domestic pig is often thought to be a subspecies from their wild ancestor, the wild boar, in which case they are given the biological name Sus scrofa domesticus. Some taxonomists consider domestic pigs a separate species and name them Sus domesticus, and wild boar S. scrofa. Wild boars joined humans 13,000–12,700 years ago. Domestic pigs escaped from captivity have returned to the wild in some parts of the world (e.g., New Zealand) and pose a number of environmental hazards as pests.\n                Domesticated pigs are mostly considered a subspecies of their wild ancestor, Sus scrofa according to Carl Linnaeus in 1758, giving in this case the official name Sus scrofa domesticus. In 1777, Johann Christian Polycarp Erxleben classified the domesticated pig as an independent species from the wild, and named it Sus domesticus, which is still used by some taxonomists.\n                ', '27.00', '32.00', '10.00', '2023-03-28 17:00:00', NULL),
(29, 'lamb', 3, 1, '3154.00', 'Lamb is similar in appearance to duck and beef, but good lamb is a meat with a smooth, tender, highly elastic texture that seems a bit pliable. A piece of meat that has a light pink to red cut, a little white fat inside the meat is fresh, a piece of lamb that has turned purple or yellow fat is the lamb has not reached the best quality. The characteristic of lamb is that it has a pungent smell due to the sharp fat attached to it.\n                Lamb meat is also a strange dish that contains a lot of nutrients beneficial to health, especially the immune system, nervous system, memory... Lamb helps to add many nutrients and blood, to help keep the penis healthy. . Compared with goat, the content of nutrients in lamb is not inferior. Lamb meat is delicious, rich in nutrients, low in fat, low in cholesterol, plus the sheep only eat grass, so it is clean, so lamb is being chosen by many consumers.\n                ', '28.00', '25.00', '23.00', '2023-03-28 17:00:00', NULL),
(30, 'Buffalo', 3, 1, '2580.00', 'Buffalo meat is the meat of domestic buffalo species. Buffalo meat is an important food source for the inhabitants of South Asia and Southeast Asia where buffalo farming is common. In terms of nutritional value, buffalo meat is not inferior to other types of meat such as beef or pork, even has some advantages such as buffalo meat with the advantage of low fat, high iron content, welding properties but not toxic, suitable for cooking in hot season[1]. Buffalo meat with buffalo horns, buffalo milk, buffalo teeth, many other parts such as buffalo skin, liver viscera, spleen, buffalo stomach are used. Compared to beef, in fact, buffalo meat and beef have the same nutritional value and deliciousness', '19.00', '45.00', '15.00', '2023-03-28 17:00:00', NULL);

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
(1, 'slide-1.jpg', 'SuperMarket For Fresh Gorcery', '#000000', 'Always supply a high-quality product at a cheaper cost for everyone', '#5C6C75', '', 'Shop Now', '#ffffff', '#000000', '', 'New Product', 'fs-6', '#000000', '#FFC107', '2023-04-26 18:55:50', NULL),
(2, 'slider-2.jpg', 'Free Shipping - orders over $100', '#000000', 'Signup to to get coupon -40% for first order', '#5C6C75', '', 'Sign Up', '#ffffff', '#000000', '', 'Get coupon', 'fs-6', '#000000', '#FFC107', '2023-04-26 18:55:50', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeproduct`
--

CREATE TABLE `typeproduct` (
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `typeproduct`
--

INSERT INTO `typeproduct` (`id_type`, `type`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'vegetable', 'vegetable.jpg', 'Active', '2023-03-31 17:00:01', '2023-04-24 17:00:01'),
(2, 'fruit', 'fruit.jpg', 'Active', '2023-03-31 17:00:01', '2023-04-24 17:00:01'),
(3, 'meat', 'meat.jpg', 'Active', '2023-03-31 17:00:01', '2023-04-24 17:00:01'),
(4, 'Dairy, Bread & Eggs', 'category-dairy-bread-eggs.jpg', 'Disabled', '2023-03-31 17:00:00', '2023-04-26 23:46:10'),
(5, 'Snack & Munchies', 'category-snack-munchies.jpg', 'Disabled', '2023-03-31 17:00:01', '2023-04-24 17:00:01'),
(6, 'Bakery & Biscuits', 'category-bakery-biscuits.jpg', 'Disabled', '2023-03-31 17:00:01', '2023-04-24 17:00:01'),
(7, 'Instant Food', 'category-instant-food.jpg', 'Disabled', '2023-03-31 17:00:01', '2023-04-24 17:00:01'),
(8, 'Tea, Coffee & Drinks', 'category-tea-coffee-drinks.jpg', 'Disabled', '2023-03-31 17:00:01', '2023-04-24 17:00:01'),
(9, 'Atta, Rice & Dal', 'category-atta-rice-dal.jpg', 'Disabled', '2023-03-31 17:00:01', '2023-04-24 17:00:01'),
(10, 'Baby Care', 'category-baby-care.jpg', 'Disabled', '2023-03-31 17:00:01', '2023-04-24 17:00:01'),
(11, 'Chicken, Meat & Fish', 'category-chicken-meat-fish.jpg', 'Disabled', '2023-03-31 17:00:01', '2023-04-24 17:00:01'),
(12, 'Cleaning Essentials', 'category-cleaning-essentials.jpg', 'Disabled', '2023-03-31 17:00:01', '2023-04-24 17:00:01'),
(13, 'Pet Care', 'category-pet-care.jpg', 'Disabled', '2023-03-31 17:00:01', '2023-04-24 17:00:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `admin` enum('0','1','2') NOT NULL DEFAULT '0',
  `google_id` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `name`, `phone`, `avatar`, `email`, `admin`, `google_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'admin', '01244345692', 'admin.png', 'admin@gmail.com', '1', NULL, NULL, '$2y$10$WU5wlRAVXAhKM8uKBE7uj.HEJGQd6HZK8VjjubBUor6TmVKKYB0nm', NULL, '2022-11-22 17:00:00', NULL, 1),
(2, 'guest 1', '01243234568', NULL, 'guest1@gmail.com', '0', NULL, NULL, '$2y$10$HJvgZWwv2zaCyU75MpLwGu4VW0LqmoWkSDL1P0gsr5Laq5VlbSkJS', NULL, '2023-01-20 17:00:00', NULL, 1),
(3, 'guest 2', '01243234666', NULL, 'guest2@gmail.com', '0', NULL, NULL, '$2y$10$7gmQ/vHNrwD0vC6euAN2feSpty3LdUxg8umqvGF7LO.GU4YGen7be', NULL, '2023-01-20 17:00:00', NULL, 1),
(4, 'Cat Tuong', '0919941037', 'user_0_meme-2.jpg', 'cattuongw2000@gmail.com', '1', NULL, NULL, '$2y$10$640yD3Y44HP5Cn6cysoRQOUwbcg4Mek56aLnuDdSDb9Dxn1.unebm', NULL, '2022-11-22 17:00:00', NULL, 1),
(5, 'host', NULL, NULL, 'host@gmail.com', '2', NULL, NULL, '$2y$10$q4T8bgyh8Pz/9Kct998nye8Q.Csmeh2HvhQNpMqhULXmDmkFwfPHG', NULL, '2023-03-20 17:00:00', NULL, 1),
(6, 'Hiển Vũ', NULL, 'gguser_116526290178629162871.jpg', 'hienkhoca@gmail.com', '0', '116526290178629162871', '2023-04-28 02:23:23', NULL, NULL, '2023-04-28 02:23:23', '2023-04-28 02:23:23', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_address`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id_address` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id_coupon` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_lib` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id_message` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_news` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `id_type` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
