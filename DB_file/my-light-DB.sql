-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 02:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my-light`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `user_id`, `date`, `total`) VALUES
(7, 21, '2023-08-21 03:09:58', 181),
(8, 21, '2023-08-21 03:16:16', 163),
(9, 21, '2023-08-21 03:35:24', 163),
(10, 21, '2023-08-21 04:11:53', 374),
(11, 25, '2023-08-21 05:33:05', 1001),
(12, 17, '2023-08-21 05:46:51', 88),
(13, 17, '2023-08-21 06:46:28', 493),
(14, 17, '2023-08-21 09:37:26', 414),
(15, 17, '2023-08-21 11:13:27', 458),
(16, 28, '2023-08-21 12:23:37', 140),
(17, 30, '2023-08-21 13:17:52', 38),
(18, 30, '2023-08-21 13:40:47', 1049),
(19, 17, '2023-08-21 13:44:27', 270),
(20, 17, '2023-08-21 13:54:53', 531),
(21, 32, '2023-08-21 14:33:51', 729),
(22, 32, '2023-08-21 14:35:43', 300),
(23, 17, '2023-08-21 14:49:04', 405),
(24, 17, '2023-08-21 14:59:44', 1003),
(25, 33, '2023-08-21 16:14:14', 1300),
(26, 17, '2023-08-21 19:22:44', 645),
(27, 17, '2023-08-21 19:26:09', 799),
(28, 17, '2023-08-21 19:43:48', 1602),
(29, 17, '2023-08-21 20:22:20', 414),
(30, 36, '2023-08-22 06:31:37', 1072),
(31, 37, '2023-08-22 06:48:23', 188),
(32, 37, '2023-08-22 06:48:23', 0),
(33, 39, '2023-10-09 12:51:06', 84),
(34, 39, '2023-10-09 15:19:57', 116),
(35, 39, '2023-10-09 21:22:44', 32),
(36, 40, '2023-10-22 17:45:08', 494),
(37, 40, '2023-10-22 17:55:31', 160),
(38, 41, '2023-11-01 07:22:31', 338);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `quantity`, `user_id`) VALUES
(49, 2, 18, 21),
(54, 3, 2, 21),
(57, 2, 6, 22),
(58, 3, 1, 22),
(59, 4, 13, 22),
(63, 3, 1, 25),
(121, 2, 1, 28),
(122, 4, 1, 28),
(123, 17, 1, 28),
(124, 3, 1, 28),
(161, 17, 1, 36),
(162, 23, 1, 36),
(167, 36, 6, 17),
(168, 2, 1, 17),
(169, 3, 1, 33),
(170, 2, 1, 33),
(171, 24, 2, 32),
(172, 25, 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `images`) VALUES
(1, 'Pendant Lamps', './Images/ProductsImages/cat1.jpg'),
(2, 'LED Lighting Strips', './Images/ProductsImages/cat2.png'),
(3, 'Wall and Mirror Lamps', './Images/ProductsImages/cat3.png'),
(4, 'Floor and Task Lamps', './Images/ProductsImages/cat4.png'),
(13, 'sdfghjk', ''),
(14, 'wertyujihgfdsdfg', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `product_id`, `user_id`) VALUES
(10, 'waesfghjnk', 30, 37),
(11, 'zdvxfbgcnhvmbjn,', 26, 0),
(12, 'zdvxfbgcnhvmbjn,', 26, 32),
(13, 'zdvxfbgcnhvmbjn,', 26, 32),
(14, 'zdvxfbgcnhvmbjn,', 26, 32),
(15, 'zdvxfbgcnhvmbjn,', 26, 32),
(16, 'zxcvbnm', 1, 30),
(17, 'zxcvbnm', 1, 30),
(18, 'zxcvbnm', 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `namee` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjectt` varchar(255) NOT NULL,
  `messagee` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `product_id`, `quantity`, `bill_id`) VALUES
(27, 2, 1, 7),
(28, 3, 1, 7),
(29, 4, 2, 7),
(30, 2, 1, 8),
(31, 3, 1, 8),
(32, 2, 1, 9),
(33, 3, 1, 9),
(34, 2, 1, 10),
(35, 3, 3, 10),
(36, 4, 2, 10),
(37, 1, 3, 10),
(38, 2, 8, 11),
(39, 11, 1, 11),
(40, 3, 1, 12),
(41, 15, 1, 12),
(42, 19, 1, 12),
(43, 3, 6, 13),
(44, 8, 1, 13),
(45, 2, 1, 14),
(46, 8, 2, 14),
(47, 7, 1, 14),
(48, 2, 1, 15),
(49, 3, 6, 15),
(50, 3, 1, 16),
(51, 4, 4, 16),
(52, 12, 5, 16),
(53, 1, 1, 16),
(54, 12, 1, 17),
(55, 1, 1, 17),
(56, 4, 1, 17),
(57, 2, 10, 18),
(58, 4, 1, 18),
(59, 2, 1, 19),
(60, 4, 3, 19),
(61, 8, 1, 19),
(62, 3, 9, 20),
(63, 2, 5, 21),
(64, 3, 3, 21),
(65, 7, 1, 21),
(66, 2, 1, 22),
(67, 3, 2, 22),
(68, 30, 1, 22),
(69, 27, 1, 22),
(70, 32, 1, 22),
(71, 12, 1, 22),
(72, 25, 1, 23),
(73, 29, 1, 23),
(74, 26, 1, 23),
(75, 7, 4, 23),
(76, 23, 2, 23),
(77, 14, 12, 23),
(78, 15, 1, 23),
(79, 2, 8, 24),
(80, 8, 1, 24),
(81, 7, 1, 24),
(82, 2, 6, 25),
(83, 11, 4, 25),
(84, 3, 6, 26),
(85, 7, 1, 26),
(86, 2, 2, 26),
(87, 22, 1, 26),
(88, 4, 1, 26),
(89, 17, 1, 26),
(90, 24, 1, 27),
(91, 29, 4, 27),
(92, 23, 1, 27),
(93, 26, 1, 27),
(94, 15, 7, 27),
(95, 12, 2, 27),
(96, 14, 2, 27),
(97, 7, 2, 27),
(98, 1, 2, 27),
(99, 2, 2, 27),
(100, 3, 2, 27),
(101, 2, 12, 28),
(102, 3, 6, 28),
(103, 3, 2, 29),
(104, 4, 1, 29),
(105, 6, 1, 29),
(106, 8, 1, 29),
(107, 14, 2, 29),
(108, 42, 1, 29),
(109, 16, 1, 29),
(110, 17, 1, 29),
(111, 36, 2, 30),
(112, 37, 1, 30),
(113, 35, 2, 30),
(114, 41, 7, 30),
(115, 40, 1, 30),
(116, 2, 1, 30),
(117, 17, 2, 30),
(118, 4, 1, 30),
(119, 23, 3, 31),
(120, 39, 1, 31),
(121, 2, 1, 31),
(122, 3, 1, 33),
(123, 23, 1, 33),
(124, 23, 1, 34),
(125, 3, 1, 34),
(126, 7, 1, 34),
(127, 23, 1, 35),
(128, 17, 1, 35),
(129, 8, 2, 36),
(130, 11, 1, 36),
(131, 9, 1, 36),
(132, 36, 5, 37),
(133, 4, 2, 37),
(134, 1, 1, 37),
(135, 9, 1, 37),
(136, 1, 7, 38),
(137, 2, 1, 38),
(138, 3, 1, 38);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `price` decimal(22,2) NOT NULL,
  `sale_status` tinyint(1) NOT NULL,
  `sale_pre` decimal(6,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `sale_status`, `sale_pre`, `description`, `image`, `status`) VALUES
(1, 1, 'Pendant lamp shade, smoked, 30 cm', 25.00, 0, 0.00, 'You can easily transform this mouth-blown lampshade in smoked clear glass into a personal pendant lamp with a matching cord set and a decorative LED bulb. Perfect to hang over the dining table.', '.\\Images\\ProductsImages\\1.png', 'on stock'),
(2, 1, 'Pendant lamp, black/nickel-plated rectangle', 104.00, 0, 0.00, '3 neat and airy lampshades in a row with a common ceiling bracket – perfect to hang over a dining table, kitchen island or in a hallway. Complete with decorative LED bulbs you like and let the light flow.', '.\\Images\\ProductsImages\\2.png', 'on stock'),
(3, 1, 'Pendant lamp, rattan/black', 59.00, 1, 30.00, 'Designer Mikael Axelsson has created this lamp shade in rattan. With its airy herringbone pattern, it spreads a decorative light that gives the room a warm and welcoming feel. Handmade and unique.', '.\\Images\\ProductsImages\\3.png', 'on stock'),
(4, 1, 'Pendant lamp, black, 19 cm', 9.00, 0, 0.00, 'Metal, rugged constructions and timeless design – enjoy the SKURUP lamp series for a long time. Simple adjustments and different types of lamps make the series practical and flexible throughout the home.', '\r\n.\\Images\\ProductsImages\\4.png\r\n', 'on stock'),
(5, 1, 'Chandelier, 7-armed, chrome-plated/opal white glass', 119.00, 0, 0.00, 'A stylish glass and chrome lamp from the SIMRISHAMN series. Modern lighting for an entire home that creates a nice atmosphere. Use it as a standalone eye-catcher or mix it with other lamps in the series.', '.\\Images\\ProductsImages\\5.png', 'on stock'),
(6, 1, 'Pendant lamp, black, 20 cm', 16.00, 0, 0.00, 'This pendant lamp with its open and decorative shape goes just as well over the dining table as in the hallway – and its design is so neat that you can hang several in a row.', '.\\Images\\ProductsImages\\6.png', 'on stock'),
(7, 1, 'Pendant lamp, white, 50 cm', 32.00, 1, 10.00, 'Like a white fluffy cloud of recycled polyester, the sewn shade of this pendant lamp creates a nice atmosphere with its soft glow. Perfect for hanging in the bedroom or over the coffee table.', '.\\Images\\ProductsImages\\7.png', 'on stock'),
(8, 1, 'Pendant lamp with 4 lamps, black', 139.00, 0, 0.00, 'Modern design with an industrial feel. This pendant lamp in black metal with 4 lights is perfect to hang over a kitchen island or a long table. You decide the brightness by your choice of bulb.', '.\\Images\\ProductsImages\\8.png', 'on stock'),
(9, 1, 'Pendant lamp, double globe nickel-plated', 47.00, 0, 0.00, 'Like a lovely full moon on a serene summer evening, this LED bulb shines with a warm glow and, together with the black cord set and textile cable, it’s a decorative eye-catcher as soon as you turn it on.', '.\\Images\\ProductsImages\\9.png', 'on stock'),
(10, 1, 'Pendant lamp, chrome effect, 51 cm', 64.00, 0, 0.00, 'The wavy shape and shiny silver surface make this lampshade an exciting eye-catcher. With its chromed inner side, the light dances around before being directed down to create a soft light.', '.\\Images\\ProductsImages\\10.png', 'on stock'),
(11, 1, 'LED pendant lamp, white frosted glass', 169.00, 0, 0.00, 'This pendant lamp has 3 U-shaped arms in frosted glass with LED lighting strips inside that spread a warm light. Let it be an alluring beacon of light that makes the dining table a natural gathering point', '.\\Images\\ProductsImages\\11.png', 'on stock'),
(12, 2, 'LED lighting strip, white, 1 m', 4.00, 0, 0.00, 'With this LED lighting strip, you can unleash your creativity and decorate with light in all kinds of places in your home – above cabinets, by the TV or under the sofa. The possibilities are endless!', '.\\Images\\ProductsImages\\12.png', 'on stock'),
(13, 2, 'LED lighting strip flexible, dimmable, 2m', 25.00, 0, 0.00, 'Be creative with your lighting. This LED strip can be used in so many ways – in drawers, behind the TV, by your favourite work of art or under your bed. The only limit is your imagination.', '.\\Images\\ProductsImages\\13.png', 'on stock'),
(14, 2, 'LED cabinet lighting strip w sensor, battery-operated white, 32 cm', 9.00, 0, 0.00, 'The simplest way to light up your wardrobe without waking your partner in the morning. A soft light switches on as you open the door. It’s battery-operated, so you don’t have to deal with cables.', '.\\Images\\ProductsImages\\14.png', 'on stock'),
(15, 2, 'LED kitchen worktop lighting strip, dimmable white, 40 cm', 12.00, 0, 0.00, 'The lighting enhances both function and atmosphere in your kitchen and makes kitchen work less of a chore. Easy to install – no electrician needed.', '.\\Images\\ProductsImages\\15.png', 'on stock'),
(16, 2, 'LED bathroom lighting strip, dimmable white, 60 cm', 16.00, 0, 0.00, 'Lighting creates atmosphere in homes and makes everyday life easier. This LED lighting strip is specially designed for the ENHET series, but is of course just as easy to install in an existing bathroom.', '.\\Images\\ProductsImages\\16.png', 'on stock'),
(17, 2, 'LED lighting strip, multicolour, 1 m', 7.00, 1, 40.00, 'With this LED lighting strip, you can unleash your creativity and decorate with light in all kinds of places in your home – above cabinets, by the TV or under the sofa. The possibilities are endless!', '.\\Images\\ProductsImages\\17.png', 'on stock'),
(18, 2, 'LED bathroom lighting strip, dimmable anthracite, 60 cm', 16.00, 0, 0.00, 'Lighting creates atmosphere in homes and makes everyday life easier. This LED lighting strip is specially designed for the ENHET series, but is of course just as easy to install in an existing bathroom.', '.\\Images\\ProductsImages\\18.png', 'on stock'),
(19, 2, 'LED kitchen worktop lighting strip, dimmable white, 60 cm', 17.00, 0, 0.00, 'The lighting enhances both function and atmosphere in your kitchen and makes kitchen work less of a chore. Easy to install – no electrician needed.', '.\\Images\\ProductsImages\\19.png', 'on stock'),
(20, 2, 'LED kitchen worktop lighting strip, dimmable white, 100 cm', 21.00, 0, 0.00, 'The lighting enhances both function and atmosphere in your kitchen and makes kitchen work less of a chore', '.\\Images\\ProductsImages\\20.png', 'on stock'),
(21, 2, 'LED kitchen worktop lighting strip, dimmable white, 20 cm', 11.00, 0, 0.00, 'The lighting enhances both function and atmosphere in your kitchen and makes kitchen work less of a chore', '.\\Images\\ProductsImages\\21.png', 'on stock'),
(22, 2, 'LED lighting strip, multicolour, 180 m', 35.00, 0, 0.00, 'With this LED lighting strip, you can unleash your creativity and decorate with light in all kinds of places in your home – above cabinets, by the TV or under the sofa', '.\\Images\\ProductsImages\\22.png', 'on stock'),
(23, 3, 'Wall/clamp spotlight, off-white', 25.00, 1, 20.00, 'RANARP lamps are reminiscent of the past, crafted with details like the steel joints and striped textile cord. The floor and work lamps are heavy and very stable, yet fully adjustable.', '.\\Images\\ProductsImages\\23.png', 'on stock'),
(24, 3, 'LED cab/mirror light, aluminium-colour, 350 mm', 15.00, 0, 0.00, 'This lamp\'s clean design with straight shapes suits almost any bathroom. Easy to mount over a mirror or wall cabinet and gives you a glare-free light while shaving or putting on make-up.', '.\\Images\\ProductsImages\\24.png', 'on stock'),
(25, 3, 'LED cabinet/wall lighting, white, 80 cm', 45.00, 0, 0.00, 'You can mount this lamp either above a mirror or bathroom cabinet to provide even and good lighting when shaving or putting on make-up – or use it as a wall shelf for extra storage and decorative downward facing lighting.', '.\\Images\\ProductsImages\\25.png', 'on stock'),
(26, 3, 'Wall lamp, brass/white', 13.00, 0, 0.00, 'One of our most cherished lamp series and it’s no wonder why – it has a timeless design that fits right in. Combine several lamps from the series to create a soft, comfortable light and a unified look.', '.\\Images\\ProductsImages\\26.png', 'on stock'),
(27, 3, 'Wall lamp, wired-in installation, brass-colour/glass', 22.00, 0, 0.00, 'The glass shade provides balanced general lighting throughout the room.', '.\\Images\\ProductsImages\\27.png', 'on stock'),
(28, 3, 'Wall lamp, wired-in installation, chrome-plated', 16.00, 1, 30.00, 'You can hang it horizontally or vertically.', '.\\Images\\ProductsImages\\28.png', 'on stock'),
(29, 3, 'LED wall lamp with mirror, dimmable chrome-plated/glossy, 20 cm', 49.00, 0, 0.00, 'Wall lamp in a modern art deco style with a removeable mirror and a built-in dimmable LED bulb. Full light to put on make-up and more diffused to create a calm atmosphere, just like in a hotel bathroom.', '.\\Images\\ProductsImages\\29.png', 'on stock'),
(30, 3, 'Wall lamp w swing arm, wired-in, white', 39.00, 0, 0.00, 'Brilliant and timeless design. NYMÅNE lamps have attitude and blend in with most decors. Why not combine several different lamps for a uniform style at home?', '.\\Images\\ProductsImages\\30.png', 'on stock'),
(31, 3, 'LED wall lamp, dimmable white/frosted glass white', 55.00, 0, 0.00, 'The wall lamp\'s frosted glass shade spreads a pleasant light, and since it’s dimmable you can vary the intensity as needed. Approved for bathrooms, but is also practical to have by a mirror in the hallway.', '.\\Images\\ProductsImages\\31.png', 'on stock'),
(32, 3, 'Wall lamp, nickel-plated/white', 13.00, 0, 0.00, 'One of our most cherished lamp series and it’s no wonder why – it has a timeless design that fits right in. Combine several lamps from the series to create a soft, comfortable light and a unified look.', '.\\Images\\ProductsImages\\32.png', 'on stock'),
(33, 3, 'LED wall lamp, dimmable chrome-plated/glossy, 47x14 cm', 59.00, 0, 0.00, 'Wall lamp in a modern art deco style with a built-in dimmable LED bulb. Full light to put on make-up or shave, and more diffused light to create a calm and comfy atmosphere, just like in a hotel bathroom.', '.\\Images\\ProductsImages\\33.png', 'on stock'),
(34, 4, 'Work/wall lamp, black', 42.00, 0, 0.00, 'Metal, rugged constructions and timeless design – enjoy the SKURUP lamp series for a long time. Simple adjustments and different types of lamps make the series practical and flexible throughout the home.', '.\\Images\\ProductsImages\\34.png', 'on stock'),
(35, 4, 'Work lamp, nickel-plated', 35.00, 0, 0.00, 'Classic style work lamp in steel that will brighten up your day. The arm and shade are adjustable which makes it a great lamp for reading by the desk, bed or sofa', './Images/ProductsImages/10.png', 'on stock\r\n'),
(36, 4, 'Work lamp, black', 14.00, 0, 0.00, 'Metal, rugged constructions and timeless design – enjoy the SKURUP lamp series for a long time. Simple adjustments and different types of lamps make the series practical and flexible throughout the home', './Images/ProductsImages/9.png', 'on stock'),
(37, 4, 'LED floor lamp, smart black', 99.00, 0, 0.00, 'PILSKOTT floor lamp has a modern graphic shape and a bended LED strip that creates dynamic light effects. You can also dim it wirelessly with the IKEA Home smart app and TRÅDFRI remote control.', './Images/ProductsImages/8.png', 'on stock'),
(38, 4, 'LED floor lamp, black', 89.00, 0, 0.00, 'This sculptural LED floor lamp spreads an atmospheric light reminiscent of light at a live concert. Designed in collaboration with the pros from Swedish House Mafia and part of the OBEGRÄNSAD collection.', './Images/ProductsImages/7.png', 'on stock'),
(39, 4, 'Work lamp, black', 9.00, 0, 0.00, 'A neat lamp with a rotatable head that you can direct as you like. Ready to light up your book or magazine, day or night. Perfect to have by the armchair, bed or on the desk.', './Images/ProductsImages/6.png', 'on stock'),
(41, 4, 'Work lamp with wireless charging, dark grey', 99.00, 0, 0.00, 'The simple, oversized metal shape is inspired by old lamps from places like factories and theatres. Used together, HEKTAR lamps support different activities and create a unified, rustic look in the room.', './Images/ProductsImages/4.png', 'on stock'),
(42, 4, 'Floor lamp, black brass/brass', 91.00, 0, 0.00, 'Brass-coloured base with clean lines and a black perforated shade on top that spreads a decorative pattern in the room when the lamp is on. Like the style? Decorate with more lamps from the same series.', './Images/ProductsImages/3.png', 'on stock'),
(43, 4, 'Floor/reading lamp, aluminium', 35.00, 0, 0.00, 'This floor lamp in aluminium is perfect to have by the sofa or your favourite armchair. You can easily direct the lamp arm so you get the light exactly where you want it when sitting down to read.', './Images/ProductsImages/2.png', 'on stock'),
(44, 4, 'Floor lamp, arched, beige/black', 182.00, 0, 0.00, 'This decorative lamp shade’s pattern is made of rope that winds over a textile-covered inside. A combination that creates exciting light effects in a room.', './Images/ProductsImages/1.png', 'on stock');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(22) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `datee` date NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `user_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `mobile`, `pass`, `datee`, `is_admin`, `is_delete`, `user_img`) VALUES
(17, 'maha', 'yaseen', '12345@gmail.com', 2147483647, '$2y$10$N/Ea4jGyB5JR6grgsLUn5.BE3ogDBnWh5bqQkIrOR7z.PaUMtZUny', '1995-03-31', 0, 0, ''),
(19, 'mohammad', 'yaseen', 'ss@gmail.com', 2147483647, '$2y$10$f9nNps5AeFbs0gwb4rjHNuG7wVmfgPIiuCaF0IRCvNn61dJsmttyG', '2000-02-21', 0, 1, ''),
(20, 'sara', 'yaseen', 'sss@gmail.com', 78888889, '53bfef360f0c4e9d70cc1e6b262e24f1', '1990-08-16', 0, 1, ''),
(21, 'moh', 'roa', 'somiayaseen59@gmail.com', 1234567222, '$2y$10$euqGCzhx0cPSC0CZIijrs.8QLpVCklb5UhmrwZ5NSg4fnVPMfXKjG', '0000-00-00', 0, 0, ''),
(22, 'eee', 'moh', 'eee@gmail.com', 1234567899, '$2y$10$FSvYAR4xfnClNCWnrXYLN.qqPl..n5nKgA8tAnfY7UaMBKgVj98ie', '0000-00-00', 0, 0, ''),
(23, 'eee', 'moh', 'eee@gmail.com', 1234567899, '$2y$10$ko/.anNSXpenaLMte1N9Q.QYJD2n7hJm.t4tnft65A0HkpKcY3FBy', '0000-00-00', 0, 0, ''),
(24, 'eee', 'moh', 'eee@gmail.com', 1234567899, '$2y$10$yBJYVCTxZpO3Rcj67KrabOklqrOxfM9gF.CZS/ZybwYh4J2XT2Fhq', '0000-00-00', 0, 0, ''),
(25, 'bar', 'ahmad', 'test@gmail.com', 987654321, '$2y$10$chz9cdhJv8tC8k8AFSTt1eKmxWKY9k.1VI8FR30WrmF8v4u9UOlZe', '0000-00-00', 0, 1, ''),
(26, 'somia', 'yaseen', '12345@gmail.com', 780000000, '$2y$10$McNWmCxnq5K4R9IG.ulFEukNWpxXmI9iqGMlwN9DQZzRq8MeQcISi', '0000-00-00', 0, 0, ''),
(27, 'maha', 'yaseen', 'qwer@gmail.com', 788888888, '$2y$10$VIuA7TTv7GjHyh0m2qmjJ.mt8cLf8whXaVp/ITnNy.W5dD8vR8kgi', '0000-00-00', 0, 0, ''),
(28, 'motamez', 'yaseen', 'dfhjjb@ghjk.com', 1111111111, '$2y$10$3mwDS1Ve7mYVwEAZYvS8xOL1kjLUmaACxtf9tl3qF2QJfx0K/8lLS', '0000-00-00', 0, 0, ''),
(29, 'awsedrftygu', 'dxfghjk', 'fghs@gmail.com', 2147483647, '$2y$10$Yvre5t9JKkvc8itN.xxe/evo2HEG2UuTbW8QEp90cr4XiaLzfhyam', '0000-00-00', 0, 0, ''),
(30, 'snaa', 'sanaa', 'zxcv@gmail.com', 2147483647, '$2y$10$Zmxdirw1mvBLny86LOs3Je7bni0081LDaj9m0CNGVQXlR5bikeq9u', '0000-00-00', 0, 0, ''),
(31, 'asedrfg', 'asdfgh', 'awsdfv@gmail.com', 2147483647, '$2y$10$UM6cRyiN63hpyEhUIb1OZu3WRfwX1C4uQUoImvJv6rc.BRpj7nkGu', '0000-00-00', 0, 0, ''),
(32, 'sara', 'arhjjr', 'qwwerr@gmail.com', 2147483647, '$2y$10$yq4hzUo31vFNb8b6IPgRKuR7td995jDdKhjUiswTv4P37Ul.dlWS6', '0000-00-00', 0, 0, ''),
(33, 'somaiah', 'mona', 'admin@gmail.com', 2147483647, '$2y$10$/vi3u7BDeI00AtM1oH0ArevDObvWZx1zq392VGcuVflVTqqd71Tke', '0000-00-00', 1, 0, ''),
(34, 'ahmad', 'majale', 'as@gmail.com', 789999999, 'Asdf@1234', '0000-00-00', 0, 0, ''),
(35, 'sara', 'yaseen', '12345@gmail.com', 777777777, '$2y$10$c6R0Pdgbm0GlXn1kDQX1POjpuKXOyw.I3zS6OvjveqMA2B0pSYJlG', '0000-00-00', 0, 0, ''),
(36, 'maha', 'yaseen', 'mew@gmail.com', 788888888, '$2y$10$mjrDMyG7AKsk6MxSdGmT5uE6xEQM4WTIM8dljdcYNYxHhZfZ.YH0a', '0000-00-00', 0, 0, ''),
(37, 'osama', 'Hw', 'new@gmail.com', 12345678, 'sfdcgk', '0000-00-00', 1, 0, ''),
(38, 'ahmad', 'majale', 'As@gmail.com', 789999999, 'Qwer@1234', '0000-00-00', 0, 0, ''),
(39, 'maha', 'yaseen', 'maha@gmail.com', 2147483647, '$2y$10$QP8MgMWTwZLZhKcAiHpyz.tkLeIYYtKIw.gjTlYZn0jsP.Gcydhoq', '0000-00-00', 0, 0, ''),
(40, 'ahmad', 'yaseen', 'Ahmad@gmail.com', 2147483647, '$2y$10$xsOwJa/T3VyQeqcMDbnBduUOy2brP5T2hH7ordcP7bA7AlndOPZ2.', '0000-00-00', 0, 0, ''),
(41, 'maha', 'yaseen', 'sanaa@gmail.com', 2147483647, '$2y$10$w5T9xQelo/4/Hyu7CxanLO2JYTYQ8kzjO8qyOLPvbi1JeOF7EuOqW', '0000-00-00', 1, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
