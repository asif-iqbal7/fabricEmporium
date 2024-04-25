-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 09:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fabrics_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `user_name`, `password`) VALUES
('3', 'fabrics@gmail.com', '21232F297A57A5A743894A0E4A801FC3');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`b_id`, `b_name`) VALUES
(1, 'lime lite'),
(2, 'nishat'),
(3, 'khaddi'),
(4, 'sana safinas'),
(5, 'Maria B'),
(6, 'Beech tree');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(20) NOT NULL,
  `product` varchar(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(20) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'summer collection'),
(2, 'winter collection'),
(3, 'bride'),
(4, 'groom'),
(5, 'kids'),
(6, 'party wear'),
(7, 'casual'),
(8, 'gents collection'),
(9, 'Stitched'),
(10, 'UnStitched'),
(11, 'Ladies Collection');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`) VALUES
('PDR18', 'Saba', 'Good service and beautiful dress');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(20) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `phone_no` varchar(14) NOT NULL,
  `address` varchar(150) NOT NULL,
  `city` varchar(20) NOT NULL,
  `token` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `cust_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `first_name`, `last_name`, `email`, `user_name`, `user_pass`, `phone_no`, `address`, `city`, `token`, `status`, `cust_status`) VALUES
(26, 'Saba', 'Liaqat', 'asif110f@gmail.com', 'asifiqbal', '$2y$10$SuvtQ2rhCmrES5ts.A5/VuaVD/LxvtEqg6XYsOPbFGTqXnd/0eUwe', '3377100338', 'college', 'ctn', 'a3a1ae63e77bf8c5caf6b9b3efd2bf', 'active', 1),
(27, 'saba', 'Liaqat', 'sam03037161818@gmail.com', 'saba', '$2y$10$YaOktsQoLl8UWd.cPkiGCuY5ZI3KEa47THBqgQObQGxfjE3aL0of2', '3016944272', 'Check no 18 SB teh.kotmomin Des sargodha', 'Kotmomin', '4be7e43f068c53a1b3df2b3df85f82', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fabric_type`
--

CREATE TABLE `fabric_type` (
  `fab_id` int(11) NOT NULL,
  `fab_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fabric_type`
--

INSERT INTO `fabric_type` (`fab_id`, `fab_name`) VALUES
(1, 'cotton'),
(2, 'lawn'),
(3, 'shaffon'),
(4, 'Organza'),
(5, 'Wool'),
(6, 'Karandi'),
(7, 'Net'),
(8, 'Tissue'),
(9, 'jamawar');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderNumber` int(20) NOT NULL,
  `productCode` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `totalQty` varchar(20) NOT NULL,
  `totalAmount` int(50) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(25) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `paymentStatus` tinyint(4) NOT NULL,
  `delivery` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderNumber`, `productCode`, `qty`, `totalQty`, `totalAmount`, `firstName`, `lastName`, `address`, `city`, `phoneNumber`, `orderDate`, `paymentStatus`, `delivery`) VALUES
(29, 'MH2022', '1', '1', 3000, 'asif', 'iqbal', 'college', 'ctn', 2147483647, '2022-07-09 18:56:51', 0, 1),
(58, 'PDR18', '1', '1', 1899, 'saba', 'liaqat', 'Check no 18 SB teh.kotmomin Des sargodha', 'Kotmomin', 2147483647, '2022-07-08 19:00:00', 1, 0),
(59, 'PDR18,PRD008,PRD012', '2,1,1', '4', 109797, 'saba', 'liaqat', 'Check no 18 SB ', 'Kotmomin', 2147483647, '2022-07-09 19:20:56', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(20) NOT NULL,
  `pay_amt` int(20) NOT NULL,
  `pay_date` datetime(6) NOT NULL,
  `cid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` varchar(10) NOT NULL,
  `pro_title` text NOT NULL,
  `pro_cat` tinyint(20) NOT NULL,
  `pro_brand` tinyint(20) NOT NULL,
  `pro_short_desc` varchar(100) NOT NULL,
  `pro_desc` varchar(500) NOT NULL,
  `pro_image` longblob NOT NULL,
  `pro_image2` longblob NOT NULL,
  `pro_fab_type` tinyint(34) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_sale_price` int(11) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `saller_status` tinyint(5) NOT NULL,
  `pro_sale_status` tinyint(5) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_title`, `pro_cat`, `pro_brand`, `pro_short_desc`, `pro_desc`, `pro_image`, `pro_image2`, `pro_fab_type`, `pro_price`, `pro_sale_price`, `pro_qty`, `saller_status`, `pro_sale_status`, `keywords`) VALUES
('PDR004', 'Party Wear', 6, 2, 'Eye pleasing creamy white shirt on luxurious chiffon canvas', 'Eye pleasing creamy white shirt on luxurious chiffon canvas, beautifully embroidered in floral and geometrical motifs featuring self resham & zari embroidery highlighted with sequins. This soothing look is completed with straight pants having embroidered border on its hem and chiffon dupatta finished with embroidered border and trim. Perfect choice for your wardrobe.', 0x7077342e706e67, 0x707734342e706e67, 3, 15580, 14000, 10, 1, 0, 'party wear, 15000, 14000, embroidered dress, formal dress, white color, long frock'),
('PDR011', ' Mehndi lehnga', 3, 4, 'Most demanding mehndi lehgha for Asian bridal', 'Includes:\r\nPishwas\r\ntrouser\r\ndupatta\r\nFabric: Raw Silk\r\nWork Technique: Embroidered\r\nDescription:  Synthetic Raw Silk Pishwaz\r\nNote:\r\nColor of this outfit may slightly vary due to photographic lighting sources or your monitor settings.', 0x6d686e326e2e706e67, 0x6d686e326e2e706e67, 3, 90000, 80500, 8, 0, 0, 'Mehndi lehenga, Limelite, bridal collection, Organza, 90000,80000,80500, lime lite'),
('PDR016', 'new trendy kids collection', 5, 3, 'Shirt- Cotton long length screen printed suit', 'Shirt- Cotton long length screen printed with fancy samosa lace embedded within panels and embellished with fancy mirror work.\r\nTrousers- Cotton Screen Printed\r\n\r\nThis is 2 Piece Stitched outfit.', 0x6b6964332e706e67, 0x6b696433332e706e67, 1, 1389, 1199, 14, 0, 0, 'kids collection, kids lawn suit, lawn, nishat, 3000.4000'),
('PDR18', 'new trendy kids collection', 5, 6, 'Shirt fabric lawn Trouser Fabric Lawn.', 'Shirt fabric lawn Trouser Fabric Lawn.\r\n\r\nThis is 2 Piece stitched outfit', 0x6b6964342e706e67, 0x6b696434342e706e67, 1, 1899, 1300, 23, 0, 0, 'kids collection, kids lawn suit, lawn, nishat,2pcs. Beechtree'),
('PRD001', ' Party Wear', 1, 1, 'Asim Jofa New Arrival party wear dress 2022', 'Taking a cue from our traditional craftmanship and rich heritage, we bring you another classy navy blue attite featuring exquisite details adorned with divine embellishment on its front bodice along with decorative hangings. Back of this flowy gown crafted with heavy embroidery details, this number excudes regal allure. Paired up with straight pants & luxurious chiffon dupatta with jamawar finishing, the centre is also highlighted with sparkling spray. This gorgeous attire makes it a statement p', 0x7077312e706e67, 0x707731312e706e67, 1, 7000, 6500, 10, 1, 0, 'party wear, dark blue, shaffon, embroided, embroidery, cloth '),
('PRD002', 'Party Wear', 6, 2, 'A dreamy bright pink ensemble complements elegance frock', 'A dreamy bright pink ensemble complements elegance with indigenous embroidery details on kalidaar peplum in a high low silhouette. This self-colored embroidery details in a gorgeous pattern enhanced with transparent sequins makes it more regal yet elegant. This peplum silhouette is paired up with flared gharara finished with embroidered borders and flowy well decorated embroidered chiffon dupatta. Perfect choice for your wardrobe.', 0x7077332e706e67, 0x707733332e706e67, 3, 8000, 7000, 10, 0, 0, 'party wear, 8000, 7000, 7500, embroidered dress, formal dress, red color '),
('PRD003', 'Party Wear', 6, 1, 'This delightful peacy attire on luxe fabric chiffon complements elegance  dress', 'This delightful peacy attire on luxe fabric chiffon complements elegance with indigenous embroidery technique adorned in pastel hues beautifully enhanced with sparking stones & material.This front slit maxi has decorative tussels on its back ,it also has underneath hand-printed maxi to add  volume. The set completes its entire look with straight pants & contrast coral-colored self-organza dupatta enganced with embroidered motifs and trim. Perfect pick for a festive.', 0x7077322e706e67, 0x707732322e706e67, 3, 10000, 9000, 10, 0, 0, 'party wear, 10000, 9000, embroidered dress, formal dress, red color, short frock with grarah'),
('PRD005', 'semi formal', 7, 4, 'Elegant round shaped neckline with virgule hand embellished front on organza fabric', 'Elegant round shaped neckline with virgule hand embellished front on organza fabric, full sleeves with hand embellished botanical border, attached cotton silk inner and raw silk pencil trouser, paired with appealing floral printed dupatta.\r\nHand embellished front\r\nPlain back\r\nHand embellished sleeves\r\nDyed trouser\r\nPrinted dupatta', 0x7366312e706e67, 0x736631312e706e67, 4, 9200, 8150, 15, 1, 0, 'semi formal, 9000, 8000, printed dress, formal dress, black color, capri shirt'),
('PRD006', 'Lawn', 1, 4, 'Soft, sophisticated, and elegant. Keep it simple with our comfortable digital printed and Embroidere', 'Soft, sophisticated, and elegant. Keep it simple with our comfortable digital printed and Embroidered lawn article.3pcs suit \r\nPrinted lawn shirt with motifs\r\nprinted lawn trousers\r\nprinter shaffon duppata', 0x534d312e706e67, 0x534d31312e706e67, 2, 4099, 3500, 15, 0, 1, 'Ash White, Lawn, summer collection, sana safinas 4000,3500 price, off white and purple'),
('PRD007', 'Winter COLLECTION 2022', 2, 3, 'There is a  fusion of Persian  and mughal print suit', 'There is a  fusion of Persian  and mughal print with embroidered trouser and digital printed  duptta, shirt slit highlight with traditional beads.', 0x534d322e706e67, 0x534d32322e706e67, 5, 1999, 1500, 10, 0, 1, 'winter collection, red, white, gray, khaddi, wool, 3pcs'),
('PRD008', '3pcs suit', 2, 5, 'With its detailed embroidery, classic with a straight silhouette', 'With its detailed embroidery this print fabric doesn’t need more, go classic with a straight silhouette', 0x534d352e706e67, 0x534d35352e706e67, 6, 5999, 5000, 15, 1, 1, '3pcs, winter collection, karandi, Maria B, 5000, 6500, 7000, white, blue '),
('PRD009', '  Unstitched 3pcs', 9, 1, 'Elegantdetailed hand embellished neckline with hand embellished front', 'Elegant round shaped detailed hand embellished neckline with hand embellished front on organza fabric, full sleeves with embellished border, attached cotton silk inner and raw silk shalwar, beautifully paired with prepossessing floral printed dupatta.\r\n\r\nHand embellished front\r\nPlain back\r\nDyed Sleeves with embellished border\r\nDyed shalwar\r\nPrinted dupatta.', 0x534d342e706e67, 0x534d34342e706e67, 3, 2999, 2499, 15, 0, 1, '3pcs, unstitched, lawn 1500 2000, pink and brown '),
('PRD010', '  Mehndi lehnga', 3, 2, 'Digital printed heavily embellished pishwaz', 'Work Technique: Embroidered\r\nDescription: Digital printed heavily embellished Pishwas is perfect to wear on your mehndi day. This ensemble is inspired by the celestial hues with handwork beads, sequence & stunning pearls. Raw silk lehenga & patchwork organza dupatta completed this swoon-worthy look.\r\n\r\nDisclaimer: The color of the outfit may vary due to the lightening effect of photography', 0x6d686e316e2e706e67, 0x6d686e316e2e706e67, 4, 100000, 90000, 5, 0, 0, 'mehndi dress, mehndi lehnga, bridal, mehnadi bridal, Maria B lehnga, bridal'),
('PRD012', 'Bridal lehnga', 3, 4, 'Most demanding bridal lehgha for Asian bridal', 'As Shown in the picture', 0x62726964616c2e706e67, 0x62726964616c2e706e67, 4, 100000, 90500, 9, 1, 0, 'Bridal lehenga, Sana Safinas, bridal collection, Organza, 90000,100000'),
('PRD013', 'Walima dress', 3, 5, 'Most demanding walima pashwaz', 'This mesmerizing ensemble with its celestial hues creates a never-before-seen look. Meticulously handcrafted with extravagant pearls & Swarovski embellishment. This statement look is completed with an elegant trail Lehnga & Dupatta with scallop border\r\n\r\nDisclaimer: The color of the outfit may vary due to the lightening effect of photography', 0x76616c696d612e706e67, 0x76616c696d612e706e67, 7, 90599, 90000, 9, 1, 0, 'walima dress, walima maxi, walima pashwaz, net dress, tissue dress, bridal dress'),
('PRD014', 'new trendy kids collection', 5, 2, 'The Pink cotton dress in the perfect bright color', 'The Pink cotton dress in the perfect bright pink shade is enhanced with the beautiful intricate sequins embroidery on the shirt embellished with mirror work and laces. The matching tulip shalwar detailed with the golden lining is a perfect blend of traditional elegance and style.\r\n\r\nIts a 3 Piece stitched Dress', 0x6b6964312e706e67, 0x6b696431312e706e67, 2, 3999, 3455, 14, 0, 0, 'kids collection, kids lawn suit, lawn, nishat, 3000.4000'),
('PRD015', 'new trendy kids collection', 5, 5, 'The classic composition of fine black shade cotton top ', 'The classic composition of fine black shade cotton top with detailed embroidery work in contrasting elegant red shade ornamented with matching thread tassels on neck. The design of the Kurta with the blend of black and red contrasting hues concocts the magnificent look particularly for the Spring Summer look book.\r\n\r\nThis is a 1 Piece Stitched Outfit', 0x6b6964322e706e67, 0x6b696432322e706e67, 1, 1999, 1799, 12, 1, 0, 'kids collection, kids cotton suit, lawn, MariaB, 3000.4000'),
('PRD016', 'Beige Sherwani', 4, 1, 'Premium Embroidered Beige Sherwani', 'Premium Embroidered Beige Sherwani skin and red jamawar fabric', 0x67726d312e6a7067, 0x67726d31312e706e67, 9, 75900, 70000, 8, 0, 0, ''),
('PRD017', ' Embroidered Sherwani', 4, 4, 'Classic Cream Cotton Net Traditional Embroidered Sherwani', 'Crafted in Pakistan as a part of the spring collection, this cream sherwani features gold Amir Adnan signature embossed buttons. The outer garment is created using jamawar fabric that makes the garment soft yet structured. With a straight cut, this sherwani is tapered along the waist and hips to create a slim yet broad-shouldered look. The regular fit allows for layering underneath and makes this garment perfect for formal occasions.', 0x67726d322e706e67, 0x67726d32322e706e67, 9, 80000, 75000, 10, 1, 0, 'sherwani, cotton net,80000'),
('PRD018', 'Embroidered Kurta', 8, 4, 'Basic Poly Viscose Wren Slim Fit Embroidered Kurta', 'Basic Poly Viscose Wren Slim Fit Embroidered Kurta with white shalwar ', 0x676e74312e706e67, 0x676e7431312e706e67, 1, 5000, 4400, 10, 0, 0, 'men kurta, Embroidered kurtra,  '),
('PRD019', 'Eid special', 8, 5, 'Classic Poly Viscose Anthracite Classic-Fit Embroidered Suit', 'Classic Poly Viscose Anthracite Classic-Fit Embroidered Suit  special for Eid', 0x676e74322e706e67, 0x676e7432322e706e67, 1, 3999, 3599, 9, 0, 0, 'Viscose, Embroidered suit, Eid collection'),
('PRD020', '2PC suit', 10, 2, 'Product: 2 Pieces Embroidered Lawn Dresses', 'Product Highlights:\r\n- Product: 2 Pieces Embroidered Lawn Dresses\r\n- Type: Scroll Embroidered Lawn Dress\r\n- Collection: Lawn Collection 2022\r\n- Scroll Embroidered Lawn Front\r\n- Plain Lawn Back\r\n- Embroidered Lawn Sleeves\r\n- Heavy Embroidered Daman Patch\r\n- Plain Trouser with Embroidered Patches\r\n- Color & Design: As Shown in Pictures\r\n- Occasion: Casual\r\n- Attractive Design', 0x756e73312e706e67, 0x756e7331312e706e67, 2, 1870, 1699, 10, 0, 0, 'lawn suit, Embroidered suit, skin red suit, '),
('PRD021', 'Unstitched suit', 10, 5, 'Heavy Embroidered Grey Net Wedding Dress 2022', '- Silwar color with blue dupatta\r\n- Neck hand work stone work\r\n- Front net heavy embroidery 🧵 with sequence work*\r\n- Back net heavy embroidery 🧵 with sequence work &*\r\n- Sleeves net heavy embroidery 🧵 with sequence work stone hand work & tassel attached*\r\n- Silk trouser included\r\n- Net heavy embroidery 🧵 dupatta with 4 side fancy original less applic\r\n- Patry Wear Dresses, Wedding dresses for girls', 0x756e73322e706e67, 0x756e7332322e706e67, 7, 5999, 4500, 12, 0, 0, 'Embroidered Grey Net Wedding, Net'),
('PRD022', 'Ladies collection', 11, 6, 'Add a touch of grandeur to your Eid Look with our Limited Festive Edition. ', 'Fabric: Viscose Linen\r\nWork Technique: Screen Printed\r\nDescription: Add a touch of grandeur to your Eid Look with our Limited Festive Edition. The colors, cuts, prints, and silhouettes all exude regality.\r\nFrock \r\nColor of this outfit may slightly vary due to the photography lighting sources or settings of your monitor.', 0x4c63312e706e67, 0x4c6331312e706e67, 4, 20000, 18000, 18, 1, 0, 'Black, 3pcs, Ladiews collection,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `fabric_type`
--
ALTER TABLE `fabric_type`
  ADD PRIMARY KEY (`fab_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderNumber`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `fabric_type`
--
ALTER TABLE `fabric_type`
  MODIFY `fab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderNumber` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
