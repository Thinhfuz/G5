-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 04, 2021 lúc 04:06 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `test5`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `created_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `updated_at`, `created_at`) VALUES
(1, 'BREAD', 'bread', '2021-08-04 04:02:54.000000', '2021-06-29 12:56:43.000000'),
(2, 'CAKE', 'cake', '2021-08-04 06:54:51.892663', '2021-06-29 13:21:17.000000'),
(3, 'PASTRY', 'pastry', '2021-08-04 06:55:02.996291', '2021-06-29 13:21:17.000000'),
(4, 'COFFEE', 'coffee', '2021-08-04 06:55:08.070137', '2021-06-29 13:21:17.000000'),
(5, 'TEA', 'tea', '2021-08-04 06:55:13.979851', '2021-06-29 13:21:17.000000'),
(6, 'SMOOTHIE', 'smoothie', '2021-08-04 06:55:33.092980', '2021-06-29 13:21:17.000000'),
(7, 'ANOTHER FOOD', 'food', '2021-08-04 06:55:45.685891', '2021-06-29 13:21:17.000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL DEFAULT 'fixed percent',
  `value` varchar(256) NOT NULL,
  `cart_value` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL,
  `expiry_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subtotal` varchar(200) NOT NULL,
  `discount` decimal(10,0) NOT NULL DEFAULT 0,
  `tax` decimal(10,0) DEFAULT NULL,
  `total` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `line1` varchar(200) NOT NULL,
  `line2` varchar(200) DEFAULT NULL,
  `city` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `is_shipping_different` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `delivered_date` date DEFAULT NULL,
  `canceled_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `firstname`, `lastname`, `mobile`, `email`, `line1`, `line2`, `city`, `province`, `country`, `zipcode`, `status`, `is_shipping_different`, `created_at`, `updated_at`, `delivered_date`, `canceled_date`) VALUES
(112, NULL, '90.00', '0', '9', '99.00', 'Tan', 'Nguyen', '0906894529', 'tan2091999@gmail.com', 'đường 5', 'linh xuân quận thủ đức', 'Ho Chi Minh', '123', 'Việt Nam', 123, 'ordered', 0, '2021-08-03 22:08:16', '2021-08-04 05:08:16', NULL, NULL),
(113, NULL, '90.00', '0', '9', '99.00', 'Tan', 'Nguyen', '0906894529', 'tan2091999@gmail.com', 'đường 5', 'linh xuân quận thủ đức', 'Ho Chi Minh', '123', 'Việt Nam', 123, 'ordered', 0, '2021-08-03 22:09:11', '2021-08-04 05:09:11', NULL, NULL),
(114, 4, '60.00', '0', '6', '66.00', 'Thi', 'Phan', '0909123456', 'tan2091999@gmail.com', 'testline1', 'testline1', 'testline1', 'testline1', 'testline1', 1234, 'delivered', 0, '2021-08-04 05:27:31', '2021-08-04 05:27:31', '2021-08-04', NULL),
(115, 6, '95.00', '0', '10', '104.50', 'Tan', 'Nguyen', '0906894529', 'tan2091999@gmail.com', 'đường 5', 'linh xuân quận thủ đức', 'Ho Chi Minh', '123', 'Việt Nam', 123, 'delivered', 0, '2021-08-04 09:13:41', '2021-08-04 09:13:41', '2021-08-04', NULL),
(117, 6, '15.00', '0', '2', '16.50', 'Tan', 'Nguyen', '0906894529', 'tan2091999@gmail.com', 'đường 5', 'linh xuân quận thủ đức', 'Ho Chi Minh', '123', 'Việt Nam', 123, 'ordered', 0, '2021-08-04 04:10:04', '2021-08-04 11:10:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `rstatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`, `rstatus`) VALUES
(76, 3, 112, 30, 2, '2021-08-03 22:08:16', '2021-08-04 05:08:16', 0),
(77, 5, 112, 30, 1, '2021-08-03 22:08:16', '2021-08-04 05:08:16', 0),
(78, 3, 113, 30, 2, '2021-08-03 22:09:11', '2021-08-04 05:09:11', 0),
(79, 5, 113, 30, 1, '2021-08-03 22:09:11', '2021-08-04 05:09:11', 0),
(80, 4, 114, 30, 1, '2021-08-04 05:28:15', '2021-08-04 05:28:15', 1),
(81, 6, 114, 30, 1, '2021-08-04 05:35:21', '2021-08-04 05:35:21', 1),
(82, 3, 115, 40, 2, '2021-08-04 09:14:13', '2021-08-04 09:14:13', 1),
(83, 2, 115, 15, 1, '2021-08-04 02:12:06', '2021-08-04 09:12:06', 0),
(85, 2, 117, 15, 1, '2021-08-04 04:10:04', '2021-08-04 11:10:04', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` int(11) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` enum('instock','outofstock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Banh Mi', 'banh-mi', 'The banh mi is an airy and crunchy French baguette, stuffed with an ever-varying combination of meats, vegetables, and sauces.', 'The banh mi is an airy and crunchy French baguette, stuffed with an ever-varying combination of meats, vegetables, and sauces.', 20, NULL, '1001', 'instock', 1, 137, 'banhmi (1).jpg', '[\"banhmi (2).jpg\",\"banhmi (3).jpg\",\"banhmi (4).jpg\"]', 1, '2021-06-28 23:21:17', '2021-08-02 16:58:48'),
(2, 'Macaron', 'macaron', 'French macarons are thin, flavorful meringue cookies that are sandwiched together with some kind of filling.', 'French macarons are thin, flavorful meringue cookies that are sandwiched together with some kind of filling.', 15, NULL, '1002', 'instock', 0, 5, 'maracon1.jpg', '[\"maracon1.jpg\",\"maracon2.jpg\",\"maracon4.jpg\"]', 3, '2021-06-28 23:21:17', '2021-08-02 17:17:15'),
(3, 'Bông Lan Phô Mai Tỏi', 'bong-lan-pho-mai-toi', 'Irreproachable!!', 'If you have tried this cake, you will understand why it is not difficult for cheese garlic bread to cause a fever, especially for those who are \"addicted\" to cheese. The greasy, salty and sweet taste of butter and cheese permeates each layer of bread, making the insides more fragrant and soft, combined with the slightly scorched crust, crispy in the mouth, two opposing feelings but is the \"key\" to create the attractiveness of the dish.', 40, NULL, '1003', 'instock', 1, 134, 'banhphomaitoi1.jpg', '[\"bonglantrungmuoi2.jpg\",\"bonglantrungmuoi3.jpg\",\"bonglantrungmuoi4.jpg\"]', 1, '2021-06-28 23:21:17', '2021-08-02 16:01:40'),
(4, 'Blueberry Cupcake', 'blueberry-cupcake', 'These blueberry cupcakes are breakfast for dessert', 'These blueberry cupcakes are breakfast for dessert', 25, NULL, '1004', 'instock', 1, 125, 'blueberry-cupcake1.jpg', '[\"blueberry-cupcake2.jpg\",\"blueberry-cupcake3.jpg\",\"blueberry-cupcake4.jpg\"]', 3, '2021-06-28 23:21:17', '2021-08-02 16:05:03'),
(5, 'Bông Lan Trứng Muối', 'bong-lan-trung-muoi', 'Irreproachable!!', 'Belonging to the salty cake line, SaiGon Bakery salted egg sponge does not cause boredom like cream cake (for those who do not like sweet). After eating, I want to eat again. From baby to adult, old or young, boys or girls all love to eat and eat all day without getting bored!!!', 40, NULL, '1005', 'instock', 1, 200, 'bonglantrungmuoi1.jpg', '[\"bonglantrungmuoi2.jpg\",\"bonglantrungmuoi3.jpg\",\"bonglantrungmuoi4.jpg\"]', 1, '2021-06-28 23:21:17', '2021-06-28 23:21:17'),
(6, 'Burger', 'burger', 'Um ba la ba Hambuger !!', 'A hamburger (also burger for short) is a food, typically considered a sandwich, consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun. The patty may be pan fried, grilled, smoked or flame broiled. Hamburgers are often served with cheese, lettuce, tomato, onion, pickles, bacon, or chiles; condiments such as ketchup, mustard, mayonnaise, relish, or a \"special sauce\", often a variation of Thousand Island dressing; and are frequently placed on sesame seed buns. A hamburger topped with cheese is called a cheeseburger.', 35, NULL, '1006', 'instock', 1, 124, 'burger1.jpg', '[\"burger2.jpg\",\"burger3.jpg\",\"burger4.jpg\"]', 7, '2021-06-28 23:21:17', '2021-08-02 16:06:36'),
(7, 'Random Maracon', 'random-maracon', 'Cheese Tart is a dessert made of creamy and velvety cheese filling that is nestled on a flaky cream cheese pie crust. The tandem of the two combined makes for such a heavenly, rich dessert.', 'French macarons are thin, flavorful meringue cookies that are sandwiched together with some kind of filling. The meringues are what make the cookies unique. They have a smooth, crisp shell and a moist, chewy interior. They are made with egg whites and lots of ground nuts, which helps them to attain that chewy texture without drying out and becoming too crispy, like a simple meringue cookie made with just egg whites and sugar. The fillings can be almost anything that will stay between the cookies, from jams and preserves to caramel to buttercream frosting. I’ve even used Nutella to finish off a batch of macarons before. Although they can come in any size, macarons are typically small enough to be eaten in one or two bites.', 20, NULL, '1007', 'instock', 0, 125, 'banhgidaytroi1.jpg', '[\"banhgidaytroi2.jpg\",\"bbanhgidaytroi3.jpg\",\"banhgidaytroi4.jpg\"]', 3, '2021-06-28 23:21:17', '2021-06-28 23:21:17'),
(8, 'Cheese Tart', 'cheese-tart', 'Cheese Tart is a dessert made of creamy and velvety cheese filling that is nestled on a flaky cream cheese pie crust. The tandem of the two combined makes for such a heavenly, rich dessert.', 'Cheese Tart is a dessert made of creamy and velvety cheese filling that is nestled on a flaky cream cheese pie crust. The tandem of the two combined makes for such a heavenly, rich dessert.', 27, NULL, '1008', 'instock', 0, 158, 'cheesetart1.jpg', '[\"cheesetart2.jpg\",\"cheesetart3.jpg\",\"cheesetart4.jpg\"]', 3, '2021-06-28 23:21:17', '2021-06-28 23:21:17'),
(9, 'Croissant', 'croissant', 'A croissant is a laminated, yeast-leavened bakery product that contains dough/roll-in fat layers to create a flaky, crispy texture.', 'A croissant is a laminated, yeast-leavened bakery product that contains dough/roll-in fat layers to create a flaky, crispy texture. Croissants belong to the Viennoiserie or pastry category of baked goods along with brioche, Danish and puff pastries. A croissant usually contains normal levels of salt, yeast and sugar It should be puffy! A beautiful, perfect croissant is puffy because it is “feuilleté”. This means that the dough has been folded over and over again to create perfect buttery layers with air in between. The perfect croissant is not stiff and lifeless. It is airy, Springy, puffy and full of pizzazz!', 17, NULL, '1009', 'instock', 0, 123, 'Croissant1.jpg', '[\"Croissant2.jpg\",\"Croissant3.jpg\",\"Croissant4.jpg\"]', 1, '2021-06-28 23:21:17', '2021-06-28 23:21:17'),
(10, 'Colorful Cupcake', 'colorful-cupcake', ' Cupcakes are small, tasty snack cakes that are favored for their portability and portion-control. They are batter cakes baked in a cup-shaped foil or temperature resistant paper.', ' Cupcakes are small, tasty snack cakes that are favored for their portability and portion-control. They are batter cakes baked in a cup-shaped foil or temperature resistant paper.', 28, NULL, '1010', 'instock', 0, 197, 'cupcake1.jpg', '[\"cupcake2.jpg\",\"cupcake3.jpg\",\"cupcake4.jpg\"]', 2, '2021-06-28 23:21:17', '2021-06-28 23:21:17'),
(11, 'Matacha Macaron', 'matcha-macaron', 'Matcha macarons has green tea infused into the shells making them extra flavorful', 'Matcha macarons has green tea infused into the shells making them extra flavorful. White chocolate ganache is sandwiched in between for a delicious Japanese-bakery-inspired flavor pairing. Matcha macarons has green tea infused into the shells making them extra flavorful Matcha green tea macarons is one of the most popular macaron flavors and for good reason. Matcha green tea has a slightly bitter taste and is a great contrast to sweet macaron shells which are comprised mainly of sugar and almonds. Green tea and white chocolate filling is a great pairing, especially so for those who find macarons to be \"too sweet\". The astringency from the matcha powder will help to balance out the sweetness.', 30, NULL, '1011', 'instock', 0, 102, 'matcha-macaron.jpg', '[\"matcha-macaron2.jpg\" ,\"matcha-macaron3.jpg\",\"matcha-macaron4.jpg\"]', 3, '2021-06-28 23:21:17', '2021-06-28 23:21:17'),
(12, 'Oreo Cupcake', 'oreo-cupcake', 'Rainbow Donuts – these fun donuts are made using fruity pebbles, white chocolate and shredded coconut! You won’t be able to get your hand off these delicious donuts!', 'Rainbow Donuts – these fun donuts are made using fruity pebbles, white chocolate and shredded coconut! You won’t be able to get your hand off these delicious donuts!', 30, NULL, '1012', 'instock', 0, 186, 'oreo-cupcake1.jpg', '[\"oreo-cupcake2.jpg\",\"oreo-cupcake3.jpg\",\"oreo-cupcake4.jpg\"]', 2, '2021-06-28 23:21:17', '2021-06-28 23:21:17'),
(13, 'Rainbow Donut', 'raibow-donut', 'Rainbow Donuts – these fun donuts are made using fruity pebbles, white chocolate and shredded coconut! You won’t be able to get your hand off these delicious donuts!', 'Rainbow Donuts – these fun donuts are made using fruity pebbles, white chocolate and shredded coconut! You won’t be able to get your hand off these delicious donuts!', 24, NULL, '1013', 'instock', 0, 114, 'rainbow-donut.jpg', '[\"rainbow-donut2.jpg\",\"rainbow-donut3.jpg\",\"rainbow-donut4.jpg\"]', 3, '2021-06-28 23:21:17', '2021-06-28 23:21:17'),
(14, 'Rose Cupcake', 'rose-cupcake', 'Beautiful buttercream roses top a moist vanilla cupcake.', 'Beautiful buttercream roses top a moist vanilla cupcake. These Strawberry Rosé Cupcakes are a dense vanilla sponge cake spiked with rosé. These cupcakes are filled with a fresh strawberry filling and topped with a whipped vanilla buttercream.', 28, NULL, '1014', 'instock', 0, 168, 'rose-cupcake.jpg', '[\"rose-cupcake2.jpg\",\"rose-cupcake3.jpg\",\"rose-cupcake4.jpg\"]', 2, '2021-06-28 23:21:17', '2021-06-28 23:21:17'),
(15, 'Sanwich', 'sanwich', 'Just a like normal another Sandwich ', 'A sandwich is a food typically consisting of vegetables, sliced cheese or meat, placed on or between slices of bread, or more generally any dish wherein bread serves as a container or wrapper for another food type. The sandwich began as a portable, convenient finger food in the Western world, though over time it has become prevalent worldwide. ', 22, NULL, '1015', 'instock', 0, 112, 'sandwich1.jpg', '[\"sandwich2.jpg\",\"sandwich3.jpg\",\"sandwich4.jpg\"]', 1, '2021-06-28 23:21:17', '2021-06-28 23:21:17'),
(16, 'Stawberry Slicecake', 'stawberry-slicecake', 'As the name suggests, kiwi smoothie has the main ingredient from kiwi fruit ', 'Strawberry cake is a cake that uses strawberry as a primary ingredient. Strawberries may be used in the cake batter, atop cakes and in a strawberry cake\'s frosting. Some are served chilled or partially frozen, and they are sometimes served as a Valentine\'s Day dish. Strawberry cakes may be prepared with strawberries in the batter,[2] with strawberries atop them,[1] with strawberries or a strawberry filling in between the layers of a layer cake,[3] and in any combination thereof.', 27, NULL, '1112', 'instock', 0, 179, 'strawberry-slicecake1.jpg', '[\"strawberry-slicecake2.jpg\",\"strawberry-slicecake3.jpg\",\"strawberry-slicecake4.jpg\"]', 2, '2021-06-28 23:21:17', '2021-06-28 23:21:17'),
(17, 'Black Coffee', 'black-coffee', 'Black coffee is simply coffee that is normally brewed without the addition of additives such as sugar, milk, cream, or added flavors.', 'Black coffee is simply coffee that is normally brewed without the addition of additives such as sugar, milk, cream, or added flavors. While it has a slightly bitter taste compared to when it is flavored with additives, many people love a strong cup of black coffee. In fact, for some, it is part of their everyday diet.', 27, NULL, '1016', 'instock', 0, 100, 'cafeden3.jpg', '[\"cafeden2.jpg\",\"cafeden4.jpg\",\"cafeden1.jpg\"]', 4, '2021-06-28 23:21:17', '2021-08-03 02:38:09'),
(18, 'Milk Coffee', 'milk-coffee', 'Milk and coffee are best friends.', 'Milk and coffee are best friends. Milk provides a sweetness and texture that’s perfectly complementary without overpowering or undermining your coffee experience. With so much effort and care going into finding the right coffee beans, don’t forget to put a little attention into using the right milk for your perfect latte, cortado, iced coffee or cappuccino. Vietnamese Iced Milk Coffee! The authentic taste of Vietnam! A bold blend of the finest Vietnamese Robusta and Arabica coffee beans, hand roasted and flavored to perfection, then slow drip brewed through a traditional Vietnamese ‘Phin’ filter. Sweet condensed milk and ice are added to create this deliciously indulgent pick me up! ORIGINAL COFFEE Vietnamese Iced Black Coffee! For committed caffeine lovers! Made from our signature Highlands Traditional Blend. Rich, slow brewed coffee mixed with a teaspoon of sugar and poured over ice to bring you the bold taste of Vietnam!', 33, NULL, '1017', 'instock', 0, 100, 'cafesua2.jpg', '[\"cafesua3.jpg\",\"cafesua4.jpg\",\"cafesua1.jpg\"]', 4, '2021-06-28 23:21:17', '2021-08-03 02:40:20'),
(19, 'Ice Blended Cofffee', 'ice-blended-coffee', 'The store manager’s makeshift blended iced coffee drink soon became the beverage-of-choice for the team members behind-the-bar', 'The store manager’s makeshift blended iced coffee drink soon became the beverage-of-choice for the team members behind-the-bar. Customers would come in, prepared to order their usual, and spot a team member drinking something off the menu. Intrigued, the customers would ask, “What are you drinking?” When unsure of their order, they would say, “I’ll have what you’re having.” It became apparent that we had a hit on our hands and needed to name this drink right away to add it to the menu. Our magic makers put their heads together, and because the drink included coffee, powder, and milk, just like a Café Mocha, and it was iced and blended, a highly original name emerged: the Ice Blended Café Mocha. Eventually, we added more flavors, and the menu item name became Ice Blended drinks. With that refreshing, cool twist on coffee widely available in our stores, The Coffee Bean & Tea Leaf saw a surge in popularity. Thanks to a commitment to defy convention and push for new inspiration, our team created something now cherished around the world.', 35, NULL, '1018', 'instock', 0, 100, 'iceblendedcoffee2.jpg', '[\"iceblendedcoffee3.jpg\",\"iceblendedcoffee4.jpg\",\"iceblendedcoffee1.jpg\"]', 4, '2021-06-28 23:21:17', '2021-08-03 02:43:38'),
(20, 'Chip Cookie', 'chip-cookie', 'A chocolate chip cookie is a drop cookie that features chocolate chips or chocolate morsels as its distinguishing ingredient.', 'A chocolate chip cookie is a drop cookie that features chocolate chips or chocolate morsels as its distinguishing ingredient. Chocolate chip cookies originated in the United States around 1938, when Ruth Graves Wakefield chopped up a Nestlé semi-sweet chocolate bar and added the chopped chocolate to a cookie recipe.', 21, NULL, '1019', 'instock', 0, 137, 'chipcookie3.jpg', '[\"chipcookie4.jpg\",\"chipcookie1.jpg\",\"chipcookie2.jpg\"]', 3, '2021-06-28 23:21:17', '2021-08-03 02:47:25'),
(21, 'Choco Cookie', 'choco-cookie', 'We all know that homemade brownies are exceptionally rich.', 'We all know that homemade brownies are exceptionally rich. And when it comes to brownie cookies, these are the richest– trust me, I’ve done my research! They’re extra chewy with soft fudge-like centers and only require about 20 minutes of chill time before baking. For best results, use pure baking chocolate. See all of my success tips below.', 22, NULL, '1020', 'instock', 0, 176, 'cookiechocolate2.jpg', '[\"cookiechocolate1.jpg\",\"cookiechocolate3.jpg\",\"cookiechocolate4.jpg\"]', 3, '2021-06-28 23:21:17', '2021-08-03 02:49:07'),
(23, 'Lemon Tea', 'lemon-tea', 'Lemon tea is prepared using black tea or green tea and by adding the right amount of lemon juice to it', 'Lemon tea is prepared using black tea or green tea and by adding the right amount of lemon juice to it. When you add lemon juice to your tea, it changes the colour of tea. This effect is known as the bathochromic shift, and it also changes the taste of the tea. This unique taste makes it a wonderful cup of drink', 30, NULL, '1022', 'instock', 0, 100, 'lemontea.jpg', '[\"lemontea (2).jpg\",\"lemontea (3).jpg\",\"lemontea (4).jpg\"]', 5, '2021-08-02 16:20:21', '2021-08-03 02:53:28'),
(25, 'Matcha Tea', 'matcha-tea', 'Matcha is a type of green tea made by taking young tea leaves and grinding them into a bright green powder', 'What is matcha tea? Matcha is a type of green tea made by taking young tea leaves and grinding them into a bright green powder. The powder is then whisked with hot water. ... The shade increases the amount of chlorophyll content in the leaves, which is what makes them bright green and full of nutrients.', 40, NULL, '3891', 'instock', 0, 100, 'matcha.jpg', '[\"matcha (4).jpg\",\"matcha (7).jpg\",\"matcha (5).jpg\"]', 5, '2021-08-03 00:20:10', '2021-08-03 00:20:10'),
(26, 'Peach Tea', 'peach-tea', 'Peach tea is made from the dried leaves and bark of a peach tree.', 'Peach tea is made from the dried leaves and bark of a peach tree. Peaches have long been recognized for both their culinary and medicinal properties. Peach tea brewed from the leaves of a peach tree contains no caffeine and it also retains the nutritional benefits and active ingredients of peaches.', 35, NULL, '1130', 'instock', 0, 100, 'peachtea.jpg', '[\"peachtea (2).jpg\",\"peachtea (3).jpg\",\"peachtea (4).jpg\"]', 5, '2021-08-03 00:24:48', '2021-08-03 00:24:48'),
(27, 'Rose Tea', 'rose-tea', 'Roses have been used for cultural and medicinal purposes for thousands of years.', 'Roses have been used for cultural and medicinal purposes for thousands of years. Rose tea is an aromatic herbal beverage made from the fragrant petals and buds of rose flowers. It’s claimed to offer numerous health benefits, though many of these are not well supported by science.', 32, NULL, '1131', 'instock', 0, 100, 'rosetea.jpg', '[\"rosetea (6).jpg\",\"rosetea (2).jpg\",\"rosetea (5).jpg\"]', 5, '2021-08-03 00:30:38', '2021-08-03 00:30:38'),
(28, 'Stawberry Smoothie', 'stawberry-smothiee', 'Stawberry smoothie is a fresh, nutritious and refreshing drink on summer days.', 'tawberry smoothie is a fresh, nutritious and refreshing drink on summer days.', 38, NULL, '1137', 'instock', 0, 100, 'Smoothie-dau.jpg', '[\"Smoothie-dau (2).jpg\",\"Smoothie-dau (3).jpg\"]', 6, '2021-08-03 00:51:30', '2021-08-03 00:54:12'),
(29, 'Pineapple Smoothie', 'pineapple-smothiee', 'This pineapple smoothie is a tropical combination of pineapple, banana, pineapple juice and Greek yogurt', 'This pineapple smoothie is a tropical combination of pineapple, banana, pineapple juice and Greek yogurt, all blended together until creamy and smooth. A great smoothie for breakfast or snack time! When I want to feel like I\'m on a island vacation, I reach for a pineapple smoothie.', 38, NULL, '1136', 'instock', 0, 100, 'Smoothie-dua.jpg', '[\"Smoothie-dua (3).jpg\",\"Smoothie-dua (2).jpg\",\"Smoothie-dua (4).jpg\"]', 6, '2021-08-03 00:58:33', '2021-08-03 00:58:33'),
(30, 'Blueberry Smoothie', 'blueberry-smoothie', 'This creamy and refreshing blueberry smoothie is made with juice, yogurt, frozen blueberries and banana, all blended together into a frosty drink. An easy and delicious way to start off your day!', 'This creamy and refreshing blueberry smoothie is made with juice, yogurt, frozen blueberries and banana, all blended together into a frosty drink. An easy and delicious way to start off your day! When I’m looking for an easy breakfast or snack for the kids, I often turn to smoothies. This version is packed with nutritious blueberries and looks as good as it tastes.', 40, NULL, '1132', 'instock', 0, 100, 'Smoothie-viet-quat (3).jpg', '[\"Smoothie-viet-quat (5).jpg\",\"Smoothie-viet-quat (4).jpg\",\"Smoothie-viet-quat (2).jpg\"]', 6, '2021-08-03 01:12:54', '2021-08-03 01:12:54'),
(31, 'Avocado Smoothie', 'avocado-smothiee', 'Full of fiber and healthy fats, avocado makes this smoothie creamy and dreamy and thick, almost like a milkshake', 'Full of fiber and healthy fats, avocado makes this smoothie creamy and dreamy and thick, almost like a milkshake. Next comes dairy-free milk for a smooth and dreamy texture and some greens of choice for fiber, nutrients, and a beautiful green hue.', 35, NULL, '1131', 'instock', 0, 100, 'Smoothie-bo (2).jpg', '[\"Smoothie-bo(4).jpg\",\"Smoothie-bo (3).jpg\",\"Smoothie-bo.jpg\"]', 6, '2021-08-03 01:23:26', '2021-08-03 01:23:26'),
(34, 'Bac Xiu', 'bac-xiu', 'Bạc Tẩy Xỉu Phé', 'You have probably already heard about the famous Vietnamese Cà phê sữa đá which is basically a glass of strong dark coffee mixed with an equal amount of condensed sweetened milk and a generous amount of ice. For those of you who are after a less caffeine-charged way of drinking coffee, Vietnamese people have the alternative called Bạc Xỉu. A glass of a dark coffee mixed with condensed sweetened milk and a generous amount of ice. “Ups, but didn’t we just say the same thing about cà phê sữa đá“  Yes, here is the difference. While ingredients in both drinks are exactly the same, the proportions are very different. Bạc Xỉu is basically a glass of sweetened condensed milk mixed with ice and a tiny bit of coffee as opposed to cà phê sữa đá that comes served with a larger amount of dark coffee mixed with an equal amount of condensed milk and heaps of ice.', 34, NULL, '1133', 'instock', 1, 100, 'bacxiu4.jpg', '[\"bacxiu1.jpg\",\"bacxiu2.jpg\",\"bacxiu3.jpg\"]', 4, '2021-08-03 02:51:26', '2021-08-03 02:51:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` varchar(256) DEFAULT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `comment`, `order_item_id`, `created_at`, `updated_at`) VALUES
(14, 4, 'dcmmmm ngon vl', 80, '2021-08-03 22:28:15', '2021-08-04'),
(15, 5, 'nice', 81, '2021-08-03 22:35:21', '2021-08-04'),
(16, 4, 'ngon', 82, '2021-08-04 02:14:13', '2021-08-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FmRhhfcl3XruG4G8mDCVo92VqDYVithNN6vXJEeD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNW9kbzhsbUVGYlVGRFY5WWdVQXlFbjBIQlpleWcyUzJTeGR4d3VkZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1628069970),
('vPw2XQTy9FyrlpxKVZgQuI2ZJwQiUXbC4M9W6UQ6', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWTZuQWRDRDA1aDNLb3ZaMzFyeFFLcTVGcG5vaWh6VkVjQkxqVXB2VSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL3Byb2ZpbGUvZWRpdCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7czo1OiJ1dHlwZSI7czozOiJVU1IiO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkOWtzcGlyUnJxci4zV1EubWd4L3gvdWc1SkEyRlNSN05oVUZXLjZXa2FoNG1tZGtsS0ZKYksiO30=', 1628080489);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shippings`
--

CREATE TABLE `shippings` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `line1` varchar(200) NOT NULL,
  `line2` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `province` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `mode` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(107, NULL, 113, 'cod', 'pending', '2021-08-03 22:09:11', '2021-08-04 05:09:11'),
(108, NULL, 114, 'cod', 'pending', '2021-08-03 22:25:39', '2021-08-04 05:25:39'),
(109, NULL, 115, 'cod', 'pending', '2021-08-04 02:12:07', '2021-08-04 09:12:07'),
(110, NULL, 116, 'cod', 'pending', '2021-08-04 02:16:16', '2021-08-04 09:16:16'),
(111, NULL, 117, 'cod', 'pending', '2021-08-04 04:10:04', '2021-08-04 11:10:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM for Admin and USR for User or Customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `utype`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '', '$2y$10$sgFZ.jUwfzcHcdhkvWITCOLDp9lrclFmaAEhFQ4NAL1D5JkxARcu2', NULL, NULL, NULL, NULL, NULL, 'ADM', '2021-07-28 07:16:08', '2021-07-28 07:16:08'),
(4, 'Quang', 'quang@gmail.com', NULL, '', '$2y$10$EJq2uwuw2bFZ6k6GPMyES.vhgw1ADWT3jqy2Bd8BB.kPBbopnxDhu', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-08-03 10:26:52', '2021-08-03 23:04:20'),
(6, 'Tan Nguyen', 'tan2091999@gmail.com', NULL, '0906894529', '$2y$10$laISGxGAXYWSZA1KTQ2FeOTr28aROaxULXp5GxxkAjmlmtPuE0KkW', NULL, NULL, 'Z13NRiwS5NX7Q8AW21ZtgMbuWYEUTSSMMxK4NjQxBkP1QxVng13BtHBVsoUK', NULL, NULL, 'USR', '2021-08-04 02:09:25', '2021-08-04 04:07:50'),
(7, 'Tan', 'user@user.com', NULL, '0906894529', '$2y$10$9kspirRrqr.3WQ.mgx/x/ug5JA2FSR7NhUFW.6Wkah4mmdklKFJbK', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-08-04 04:30:11', '2021-08-04 05:34:48'),
(8, 'quang', 'trangkute734@gmail.com', NULL, NULL, '$2y$10$KwcuNfPaF/AwuS9JgKg9kemQ7N7UcQmdgrhBhhqDm/RxKxm8qbM.a', NULL, NULL, NULL, NULL, NULL, 'USR', '2021-08-04 05:29:01', '2021-08-04 05:29:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`category_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_ibfk_1` (`order_item_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `test3`.`categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`);

--
-- Các ràng buộc cho bảng `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
