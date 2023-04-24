-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 24, 2023 lúc 10:51 AM
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
(35, 'GUT_2', NULL, 13, '21.00', '10.00', 500, '2023-04-16 17:00:00', NULL),
(39, NULL, 1, 20, '50000.00', '50.00', 100, '2023-04-23 19:45:15', '2023-04-23 19:45:15');

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
(1, 1, 'product-img-2.jpg', NULL, NULL),
(2, 2, 'product-img-4.jpg', NULL, NULL),
(3, 3, 'product-img-6.jpg', NULL, NULL),
(4, 4, 'product-img-3.jpg', NULL, NULL),
(5, 5, 'product-img-7.jpg', NULL, NULL),
(6, 6, 'product-img-8.jpg', NULL, NULL),
(7, 6, 'thanh-long-1.jpg', NULL, NULL),
(8, 6, 'thanh-long-2.jpg', NULL, NULL),
(9, 6, 'thanh-long-3.jpg', NULL, NULL),
(10, 7, 'product-img-9.jpg', NULL, NULL),
(11, 8, 'product-img-10.jpg', NULL, NULL),
(12, 9, 'product-img-1.jpg', NULL, NULL),
(13, 10, 'product-img-13.jpg', NULL, NULL),
(14, 11, 'product-img-11.jpg', NULL, NULL),
(15, 12, 'product-img-12.jpg', NULL, NULL),
(16, 13, 'product-img-16.jpg', NULL, NULL),
(17, 14, 'product-single-img-1.jpg', NULL, NULL),
(18, 15, 'product-single-img-2.jpg', NULL, NULL),
(19, 16, 'product-single-img-3.jpg', NULL, NULL),
(20, 17, 'product-single-img-4.jpg', NULL, NULL),
(21, 18, 'rau muống_1.jpg', '2023-04-23 09:52:00', '2023-04-23 09:52:00'),
(22, 18, 'rau muống_2.jpg', '2023-04-23 09:52:00', '2023-04-23 09:52:00'),
(23, 18, 'rau muống_3.jpg', '2023-04-23 09:52:00', '2023-04-23 09:52:00'),
(24, 18, 'rau muống_4.jpg', '2023-04-23 09:52:00', '2023-04-23 09:52:00'),
(25, 19, 'tomato_4.jpg', '2023-04-23 09:52:44', '2023-04-23 09:52:44'),
(26, 19, 'tomato_3.jpg', '2023-04-23 09:52:44', '2023-04-23 09:52:44'),
(27, 19, 'tomato_2.jpg', '2023-04-23 09:52:44', '2023-04-23 09:52:44'),
(28, 19, 'tomato_1.jpg', '2023-04-23 09:52:44', '2023-04-23 09:52:44'),
(29, 20, 'apple_4.jpg', '2023-04-23 09:53:19', '2023-04-23 09:53:19'),
(30, 20, 'apple_3.jpg', '2023-04-23 09:53:19', '2023-04-23 09:53:19'),
(31, 20, 'apple_2.jpg', '2023-04-23 09:53:19', '2023-04-23 09:53:19'),
(32, 20, 'apple_1.jpg', '2023-04-23 09:53:19', '2023-04-23 09:53:19'),
(33, 21, 'beef_4.jpg', '2023-04-23 09:59:13', '2023-04-23 09:59:13'),
(34, 21, 'beef_3.jpg', '2023-04-23 09:59:13', '2023-04-23 09:59:13'),
(35, 21, 'beef_2.jpg', '2023-04-23 09:59:13', '2023-04-23 09:59:13'),
(36, 21, 'beef_1.jpg', '2023-04-23 09:59:13', '2023-04-23 09:59:13');

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
(19, '2023_04_24_084126_add_details_to_users_table', 2);

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
(7, NULL, 'New Product', NULL, 'products-details', '17', 0, '2023-04-23 09:06:34', NULL);

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
(18, 'Rau muống', 5, 1, '100.00', 'Rau muống xào tỏi', '15000.00', '30000.00', '20.00', '2023-04-23 09:52:00', '2023-04-23 09:52:00'),
(19, 'Cà chua', 5, 1, '100.00', 'Cà chua tươi ngon', '12000.00', '25000.00', '30.00', '2023-04-23 09:52:44', '2023-04-23 09:52:44'),
(20, 'Táo', 6, 1, '100.00', 'Táo dòn ngọt', '15000.00', '50000.00', '50.00', '2023-04-23 09:53:19', '2023-04-23 09:53:19'),
(21, 'Bò tươi ÚC', 7, 1, '100.00', 'Thịt bò tươi ngon', '50000.00', '80000.00', '55.00', '2023-04-23 09:59:13', '2023-04-23 09:59:13');

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
(1, 'slide-1.jpg', 'SuperMarket For Fresh Gorcery', '#000000', 'Always supply a high-quality product at a cheaper cost for everyone', '#5C6C75', '', 'Shop Now', '#ffffff', '#000000', '', 'New Product', 'fs-6', '#000000', '#FFC107', '2023-04-23 09:06:34', NULL),
(2, 'slider-2.jpg', 'Free Shipping - orders over $100', '#000000', 'Signup to to get coupon -40% for first order', '#5C6C75', '', 'Sign Up', '#ffffff', '#000000', '', 'Get coupon', 'fs-6', '#000000', '#FFC107', '2023-04-23 09:06:34', NULL);

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
(5, 'vegetable', 'vegetable.jpg', 'Active', '2023-04-23 09:50:44', '2023-04-23 09:50:44'),
(6, 'fruit', 'fruit.jpg', 'Active', '2023-04-23 09:51:06', '2023-04-23 09:51:06'),
(7, 'meat', 'meat.jpg', 'Disabled', '2023-03-31 17:00:00', '2023-04-23 22:45:12');

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
(1, 'admin', '01244345692', 'admin.png', 'admin@gmail.com', '1', NULL, NULL, '$2y$10$C/CqkfnlcN6LqNu5fK..ou94HuQVYukd3000587KjYyqvTbLtK6PW', NULL, '2022-11-22 17:00:00', NULL, 1),
(2, 'guest 1', '01243234568', NULL, 'guest1@gmail.com', '0', NULL, NULL, '$2y$10$9vbimIScsSTZWF0sn1A/7etUSO0Gq0lO41AGzl/5gxxMu6WDEslHq', NULL, '2023-01-20 17:00:00', NULL, 1),
(3, 'guest 2', '01243234666', NULL, 'guest2@gmail.com', '0', NULL, NULL, '$2y$10$pLXr2na7XPFNcKoIMAZQqeuuDfgByGJeW.Ccm79bIbDHPOsdH9SJe', NULL, '2023-01-20 17:00:00', NULL, 1),
(4, 'Cat Tuong', '0919941037', 'user_0_meme-2.jpg', 'cattuongw2000@gmail.com', '1', NULL, NULL, '$2y$10$im9U5NLQjLR6AtT/ICE.2uT/9QL1efAH64kKmVKRLPL4GVYep8lcC', NULL, '2022-11-22 17:00:00', NULL, 1),
(5, 'host', NULL, NULL, 'host@gmail.com', '2', NULL, NULL, '$2y$10$PqzMrMwBel5gmUnu2p05V.IDOVueRmcpAGyvbrA29zyfZZw4Fm/MO', NULL, '2023-03-20 17:00:00', NULL, 1);

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
  MODIFY `id_cart` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
  MODIFY `id_lib` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `id_type` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
