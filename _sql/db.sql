-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2018 at 06:17 PM
-- Server version: 5.7.20
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e19514_cristina`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `sessionID` varchar(123) NOT NULL,
  `tovarid` int(12) NOT NULL,
  `count` int(123) NOT NULL,
  `price` varchar(123) NOT NULL,
  `id` int(123) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`sessionID`, `tovarid`, `count`, `price`, `id`) VALUES
('aHT17VwA4tak3yEIeHWn4lxPn', 147, 1, '750', 248),
('aHT17VwA4tak3yEIeHWn4lxPn', 147, 1, '750', 249),
('aHT17VwA4tak3yEIeHWn4lxPn', 147, 1, '750', 250),
('aHT17VwA4tak3yEIeHWn4lxPn', 147, 1, '750', 251),
('aHT17VwA4tak3yEIeHWn4lxPn', 147, 1, '750', 252),
('aHT17VwA4tak3yEIeHWn4lxPn', 147, 1, '750', 253),
('aHT17VwA4tak3yEIeHWn4lxPn', 0, 1, 'undefined', 254),
('aHT17VwA4tak3yEIeHWn4lxPn', 147, 1, '750', 255),
('aHT17VwA4tak3yEIeHWn4lxPn', 147, 1, '750', 256),
('aHT17VwA4tak3yEIeHWn4lxPn', 147, 1, '750', 257),
('aHT17VwA4tak3yEIeHWn4lxPn', 147, 1, '750', 258),
('aHT17VwA4tak3yEIeHWn4lxPn', 147, 1, '750', 259),
('aHT17VwA4tak3yEIeHWn4lxPn', 147, 1, '750', 260),
('aHT17VwA4tak3yEIeHWn4lxPn', 145, 1, '333', 261),
('aHT17VwA4tak3yEIeHWn4lxPn', 145, 1, '333', 262),
('aHT17VwA4tak3yEIeHWn4lxPn', 144, 1, '232', 263),
('Uzf3nhPpf5el2ThhKoUyXOOh5', 147, 1, '750', 264),
('vwwd5BYSTQlj7P1j7doR00arh', 147, 1, '750', 265),
('vwwd5BYSTQlj7P1j7doR00arh', 145, 1, '333', 266),
('3HLc07E1nZN7S4MUIccIYvo7e', 147, 1, '750', 267),
('3HLc07E1nZN7S4MUIccIYvo7e', 147, 1, '750', 268),
('y5DWBYynMET2TF4CAVf2aTM6W', 145, 1, '333', 269),
('y5DWBYynMET2TF4CAVf2aTM6W', 145, 1, '333', 270),
('y5DWBYynMET2TF4CAVf2aTM6W', 143, 1, '123', 271),
('PpxWUsBKQSAN4DWzo7u0tWkAZ', 147, 1, '750', 272),
('wuh1yxtyZJTHjyqMpqPW9gU6Y', 145, 1, '333', 273),
('wuh1yxtyZJTHjyqMpqPW9gU6Y', 147, 1, '750', 274),
('sGTkzqmo6Q4b3cdvHVfAl4EOI', 144, 1, '232', 282),
('sGTkzqmo6Q4b3cdvHVfAl4EOI', 144, 1, '232', 283),
('sGTkzqmo6Q4b3cdvHVfAl4EOI', 143, 1, '123', 284),
('PXCg5mRFbXABsZvvkM0mph88p', 145, 1, '333', 286);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(123) NOT NULL,
  `name` varchar(123) NOT NULL,
  `nameEN` varchar(123) NOT NULL,
  `img-onload` varchar(123) NOT NULL,
  `img-hover` varchar(123) NOT NULL,
  `priority` int(123) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `nameEN`, `img-onload`, `img-hover`, `priority`) VALUES
(16, 'Категория 2', 'Category 2', '', '', 3),
(17, 'Категория 1', 'Category 1', '', '', 2),
(18, 'Категория 3', 'Category 3', '', '', 4),
(19, 'Категория 4', '', '', '', 5),
(20, 'Категория 5', '', '', '', 6),
(21, 'Категория 6', '', '', '', 7);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(123) NOT NULL,
  `hoursBudni` varchar(123) CHARACTER SET utf8 NOT NULL,
  `hoursVih` varchar(123) CHARACTER SET utf8 NOT NULL,
  `tel1` varchar(123) CHARACTER SET utf8 NOT NULL,
  `tel2` varchar(123) CHARACTER SET utf8 NOT NULL,
  `adres` varchar(123) CHARACTER SET utf8 NOT NULL,
  `email` varchar(123) CHARACTER SET utf8 NOT NULL,
  `vk` varchar(123) NOT NULL,
  `pin` varchar(123) CHARACTER SET utf8 NOT NULL,
  `inst` varchar(123) CHARACTER SET utf8 NOT NULL,
  `fb` varchar(123) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `hoursBudni`, `hoursVih`, `tel1`, `tel2`, `adres`, `email`, `vk`, `pin`, `inst`, `fb`) VALUES
(1, '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(12) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `textEN` varchar(7777) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `text`, `textEN`) VALUES
(1, '<p>Доставка и оплата страница РУ</p>\n', '<p>Доставка и оплата страница EN</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `imagescategory`
--

CREATE TABLE IF NOT EXISTS `imagescategory` (
  `id` int(12) NOT NULL,
  `name` varchar(123) NOT NULL,
  `category` int(12) NOT NULL,
  `order` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagescategory`
--

INSERT INTO `imagescategory` (`id`, `name`, `category`, `order`) VALUES
(1, 'e7fd8c07edbf029a1912f43c9bb64b4f.jpg', 10, 1),
(2, '9b7c1806b74322b1ec6cf4df89ea5dbc.jpg', 10, 2),
(9, '33b3214d792caf311e1f00fd22b392c5.jpeg', 11, 1),
(41, 'ecf386f546ca8bb278b820108db9c54b.JPG', 1, 1),
(42, 'c8e5b674f60f203f957d3f6f990b5dba.JPG', 1, 2),
(43, 'f5664af7212cd0bdae32a8a28af9427d.JPG', 1, 3),
(44, '70494488430425e397f1769c6caf4c60.JPG', 1, 4),
(50, '7a6a6a567c7108a78401a348e821305d.JPG', 1, 2),
(51, '1fcf8e20f6db852dbf5bafcf15e09624.JPG', 1, 3),
(61, '6f2d231c126a5c9da61e0606dfd49e27.JPG', 7, 1),
(63, '0996381067bc0fa82a53c3a794b8c996.JPG', 7, 3),
(65, '1f28305a2dd4362a76be76ec8208829e.JPG', 7, 5),
(66, '65bff345d61b8a50af0397f58e810700.JPG', 7, 6),
(90, '627f4d912fba16f21b94fcd2896a6c4a.JPG', 2, 3),
(91, '96a96fcc7eb9ef5a668bcb932319cc8a.JPG', 2, 4),
(93, '53cc8cb90bce435bb4061dcaa2528626.JPG', 2, 1),
(94, '5b3caf1a54b25ba0a7c6a634cece1e80.JPG', 2, 2),
(100, 'c3f9b118cab28082b1d812f3da222ff7.JPG', 4, 1),
(101, 'd4f67db9647b19df15a06dd698964df8.JPG', 4, 2),
(102, 'abb8f8b60df84d9294c0f1c77ad17001.JPG', 4, 3),
(108, '25eb58397bfae3daa8d25b9bcd8bd633.JPG', 3, 1),
(109, '3763ff6464f24ae51f26bcd6f21142f0.JPG', 3, 2),
(111, 'c82a53c4e6a4950243b3db2199bba3ec.JPG', 3, 4),
(130, 'c0f8aac5efd291a53a2f43919dd7a1a2.JPG', 13, 1),
(131, '9b96b3733b01014dc5634c99917baf96.JPG', 13, 2),
(133, '96ef0f53ba2646290393b1be7e0d46f4.JPG', 14, 1),
(134, 'b0018504de90cf719bd417275b999d99.JPG', 14, 2),
(135, 'bead2e89dc970e3be7ab1a5fdbf827d5.JPG', 14, 3),
(136, '9fdd229a84c1939227ba821cac3bf99e.JPG', 14, 4),
(137, 'e64db40270c72a7b2d32f458327a4776.JPG', 14, 5),
(138, '8488308f00ebbe00f8aaa9be6793c317.JPG', 14, 6),
(140, '6f0b511e23705787aae115921ade3e06.JPG', 14, 8),
(141, '5115e1efc44e0306fff22018ff88654e.JPG', 14, 9),
(150, 'cad06efe173a1d1bf5b52d00aaf63f0c.png', 15, 1),
(170, '04296604ad764f2db654385ab328fc2a.JPG', 3, 1),
(171, '86f4076b0e14accd65188c4f6ab0e4e5.JPG', 3, 2),
(172, '016136b4abbed0c78eceec98f4e7db3b.JPG', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `imagesproducts`
--

CREATE TABLE IF NOT EXISTS `imagesproducts` (
  `id` int(12) NOT NULL,
  `image_name` varchar(123) NOT NULL,
  `product_id` int(12) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `type` varchar(123) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3128 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagesproducts`
--

INSERT INTO `imagesproducts` (`id`, `image_name`, `product_id`, `order`, `type`) VALUES
(3102, '5478382489436172.jpg', 142, 1, ''),
(3103, 'Happy-Birthday-To-You-Sister-Images.jpg', 142, 2, ''),
(3104, 'sl1.jpg', 143, 1, ''),
(3105, 'sl2.jpg', 143, 2, ''),
(3106, '2832.jpg', 144, 1, ''),
(3107, '3888102721_480.jpg', 144, 2, ''),
(3108, '20130801162651.jpg', 144, 3, ''),
(3109, 'images_(1).jpg', 145, 1, ''),
(3110, 'images.jpg', 145, 2, ''),
(3111, 'mozhno_li_vernut_tovar_kuplennyy_so_skidkoy.jpg', 145, 3, ''),
(3113, 'mozhno_li_vernut_tovar_kuplennyy_so_skidkoy1.jpg', 146, 1, ''),
(3114, 'online_shoping_pros_cons-550x306.jpg', 146, 2, ''),
(3115, 'poisk_i_vibor_tovara_aliexpress.jpg', 146, 3, ''),
(3116, 'SWl_jSFvit5sPKNy3lI3VJjpR3K5lIEO.png', 146, 4, ''),
(3117, 'vozvrat-tovara.png', 146, 5, ''),
(3127, '9.jpg', 147, 1, '360');

-- --------------------------------------------------------

--
-- Table structure for table `iurinfo`
--

CREATE TABLE IF NOT EXISTS `iurinfo` (
  `id` int(12) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `textEN` varchar(7777) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iurinfo`
--

INSERT INTO `iurinfo` (`id`, `text`, `textEN`) VALUES
(1, '<p><strong>ИП &laquo;Тюрина Дарья Дмитриевна&raquo;</strong><br />\r\n<br />\r\nИНН: 771981860923<br />\r\n<br />\r\nОГРНИП: 316774600492189<br />\r\n<br />\r\nПолитика конфиденциальности:<br />\r\n<br />\r\nЛюбые сведения о пользователях, предоставляемые самими пользователями Сайта, будут использованы ИП &laquo;Тюрина Дарья Дмитриевна&raquo; исключительно для целей совершенствования предоставляемых Вам услуг и качества обслуживания пользователей Сайта, ведения статистики посещения Сайта. ИП &laquo;Тюрина Дарья Дмитриевна&raquo; прилагает все усилия для обеспечения безопасности сбора, передачи и хранения данных о пользователях Сайта в соответствии с характером этих данных, а также к тому, чтобы предоставленные Вами сведения личного характера не использовались без Вашего согласия для направления не затребованных Вами сообщений или для передачи третьим лицам. ИП &laquo;Тюрина Дарья Дмитриевна&raquo; обязуется использовать, хранить и обрабатывать запрошенную информацию личного характера о пользователях Сайта с учетом требования российского законодательства о персональных данных.</p>\r\n\r\n<p>Вместе с тем, ИП &laquo;Тюрина Дарья Дмитриевна&raquo; оставляет за собой право по своему усмотрению периодически проверять оставленную посетителями информацию, редактировать и удалять ее с Сайта без объяснения причин.</p>\r\n', '<p>Description EN</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(12) NOT NULL,
  `logo` varchar(123) NOT NULL,
  `menuColor` varchar(123) NOT NULL,
  `secondMenuColor` varchar(123) NOT NULL,
  `lineColor` varchar(123) NOT NULL,
  `lineImage` varchar(123) NOT NULL,
  `siteBgColor` varchar(123) NOT NULL,
  `siteBgImage` varchar(123) NOT NULL,
  `headerBgColor` varchar(123) NOT NULL,
  `headerBgImage` varchar(123) NOT NULL,
  `priority` varchar(121) NOT NULL,
  `priorityLine` varchar(123) NOT NULL,
  `priorityHeader` varchar(123) NOT NULL,
  `cartNumber` varchar(12) NOT NULL,
  `productDescriptionColor` varchar(123) NOT NULL,
  `productPriceColor` varchar(123) NOT NULL,
  `menuCategoryColor` varchar(123) NOT NULL,
  `menuSubcategoryColor` varchar(123) NOT NULL,
  `image360` varchar(123) NOT NULL,
  `kurs` varchar(123) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `logo`, `menuColor`, `secondMenuColor`, `lineColor`, `lineImage`, `siteBgColor`, `siteBgImage`, `headerBgColor`, `headerBgImage`, `priority`, `priorityLine`, `priorityHeader`, `cartNumber`, `productDescriptionColor`, `productPriceColor`, `menuCategoryColor`, `menuSubcategoryColor`, `image360`, `kurs`) VALUES
(1, 'ca3d0613d8b7c8673c243d49b85005a4.png', '#DBDBDB', '#979797', '#FFFFFF', 'ca036ebc2441df84c65b34ce50154a8b.png', '#000000', '0c15b4c0d6f582fd4f0dd7594cba527b.jpg', '#000', 'ca036ebc2441df84c65b34ce50154a8b.png', 'image', 'color', 'color', 'no', '#', '#', '#', '#', '349fafdb64e5c990bb524e92a9c5627f.png', '59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `price` varchar(123) CHARACTER SET utf8 NOT NULL,
  `yourName` text CHARACTER SET utf8 NOT NULL,
  `yourPhone` text CHARACTER SET utf8 NOT NULL,
  `yourEmail` text CHARACTER SET utf8 NOT NULL,
  `yourAdres` text CHARACTER SET utf8 NOT NULL,
  `yourPochta` text CHARACTER SET utf8 NOT NULL,
  `yourNote` text CHARACTER SET utf8 NOT NULL,
  `oplata` text CHARACTER SET utf8 NOT NULL,
  `transportNumber` varchar(123) CHARACTER SET utf8 NOT NULL,
  `status` varchar(123) CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL,
  `count` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prebuy`
--

CREATE TABLE IF NOT EXISTS `prebuy` (
  `id` int(12) NOT NULL,
  `text` varchar(7777) CHARACTER SET utf8 NOT NULL,
  `textEN` varchar(7777) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prebuy`
--

INSERT INTO `prebuy` (`id`, `text`, `textEN`) VALUES
(1, '<p>Для совершения предзаказа необходимо позвонить по телефону +7 906 056 53 68 или написать на почту janditor89@gmail.com</p>\n', '<p>To make a pre-order, you need to call +7 906 056 53 68 or write to janditor89@gmail.com</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(12) NOT NULL,
  `name` varchar(123) NOT NULL,
  `subcategory` varchar(123) NOT NULL,
  `description` varchar(1234) NOT NULL,
  `descriptionEN` varchar(1234) NOT NULL,
  `price` varchar(123) NOT NULL,
  `productid` varchar(123) NOT NULL,
  `gab_chertej` varchar(123) NOT NULL,
  `visible` int(12) NOT NULL DEFAULT '1',
  `360button` int(12) NOT NULL DEFAULT '1',
  `buybutton` varchar(12) NOT NULL DEFAULT 'yes',
  `show_type` varchar(123) NOT NULL DEFAULT 'carousel'
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `subcategory`, `description`, `descriptionEN`, `price`, `productid`, `gab_chertej`, `visible`, `360button`, `buybutton`, `show_type`) VALUES
(142, 'Товар 1', '57', '123', '1', '123', '', '', 1, 1, 'buy', ''),
(143, 'Товар 2', '55', 'ыва', 'ыва', '123', '', '', 1, 1, 'buy', 'carousel'),
(144, 'Товар 3', '60', 'фыфв', 'фыв', '232', '', '', 1, 1, 'buy', 'carousel'),
(145, 'ТОвар4', '58', 'ыва', 'ыва', '333', '', '', 1, 1, 'buy', 'carousel'),
(146, 'Товар 5', '59', 'фыв', 'фыв', '250', '', '', 1, 1, 'buy', 'carousel'),
(147, 'Товар 6', '56', '123ыв', 'аыва', '750', '', '', 1, 1, 'buy', '');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(12) NOT NULL,
  `image` varchar(123) NOT NULL,
  `priority` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `priority`) VALUES
(10, '5cb82d7fadb363c385840557e455968c.JPG', 1),
(11, '8073eec1cd433aede4160f715f4357d8.JPG', 2),
(12, 'b5062ef4a6ea3c44a6da0b393ee516b7.JPG', 3),
(13, '7c9a82533fce5e76a3e4aaf0f948a3c5.JPG', 4),
(14, '76930bd434fb5af78e30f53e4cc32de8.JPG', 5),
(17, 'c9bf64467d4f2a8c496415ed425672cd.JPG', 6);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(123) NOT NULL,
  `name` varchar(1234) NOT NULL,
  `nameEN` varchar(123) NOT NULL,
  `img-onload` varchar(123) NOT NULL,
  `img-hover` varchar(123) NOT NULL,
  `category` int(123) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `nameEN`, `img-onload`, `img-hover`, `category`) VALUES
(55, 'Подкатегория 1', 'Subcategory 1', '', '', 19),
(56, 'Подкатегория 2', 'Subcategory 2', '', '', 17),
(57, 'Подкатегория 1', 'Subcategory 1', '', '', 21),
(58, 'Подкатегория 2', 'Subcategory 2', '', '', 16),
(59, 'Подкатегория 3', '', '', '', 20),
(60, 'Подкатегория 3', '', '', '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id` int(12) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `textEN` varchar(8888) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `text`, `textEN`) VALUES
(1, '<p><strong>Поддержка покупателей Ру</strong></p>\n', '<p><strong>Поддержка покупателей&nbsp;EN</strong></p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(123) NOT NULL,
  `user_name` text NOT NULL,
  `user_email` varchar(1234) NOT NULL,
  `user_password` varchar(123) NOT NULL,
  `user_gender` varchar(123) NOT NULL,
  `user_status` varchar(123) NOT NULL DEFAULT 'user',
  `activate` int(12) NOT NULL DEFAULT '0',
  `activateCode` varchar(123) NOT NULL,
  `fb_id` varchar(123) NOT NULL DEFAULT 'empty'
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_gender`, `user_status`, `activate`, `activateCode`, `fb_id`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', '', 'admin', 1, '', ''),
(53, '123', '', '', 'male', 'user', 0, '', 'empty'),
(54, '123', '', '', 'male', 'user', 0, '', 'empty'),
(55, 'ннн', 'admin@admin', '123', 'female', 'user', 0, '', 'empty'),
(56, 'Сергей Викторович', 'sadsdf@sdfsd.sdf', '123', 'male', 'user', 0, '', 'empty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagescategory`
--
ALTER TABLE `imagescategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagesproducts`
--
ALTER TABLE `imagesproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iurinfo`
--
ALTER TABLE `iurinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prebuy`
--
ALTER TABLE `prebuy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=287;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `imagescategory`
--
ALTER TABLE `imagescategory`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT for table `imagesproducts`
--
ALTER TABLE `imagesproducts`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3128;
--
-- AUTO_INCREMENT for table `iurinfo`
--
ALTER TABLE `iurinfo`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prebuy`
--
ALTER TABLE `prebuy`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(123) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(123) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
