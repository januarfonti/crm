/*
Navicat MySQL Data Transfer

Source Server         : Januar Fonti
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2014-09-05 13:44:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for al2nq_asset
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_asset`;
CREATE TABLE `al2nq_asset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_asset
-- ----------------------------
INSERT INTO `al2nq_asset` VALUES ('1', 'CodeIgniter');
INSERT INTO `al2nq_asset` VALUES ('3', 'Forms');
INSERT INTO `al2nq_asset` VALUES ('5', 'User');
INSERT INTO `al2nq_asset` VALUES ('6', 'CRM');
INSERT INTO `al2nq_asset` VALUES ('7', 'Others');

-- ----------------------------
-- Table structure for al2nq_blog
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_blog`;
CREATE TABLE `al2nq_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT '0000-00-00',
  `author` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_blog
-- ----------------------------
INSERT INTO `al2nq_blog` VALUES ('15', '1', '1', 'sinar ultraviolet', 'sinar-ultraviolet', '2014-02-04', '1', 'sinar-ultra-violet.jpg', 'sinar ultraviolet yang dihasilkan matahari ini memang tidak tampak tapi bahaya yang ditimulkan bagi kulit sangat besar bahakan bisa menimbulkan kanker.\r\ncegah hal ini sedini mungkin dengan menggunakan UV protection UV yang terkandung pada lotion mampu mencegah sina UV dan radikal bebas lainnya');
INSERT INTO `al2nq_blog` VALUES ('16', '1', '1', 'vitamin dari buah dan sayur', 'vitamin-dari-buah-dan-sayur', '2014-02-04', '1', 'images.jpg', 'senantiasa cukupi kebutuhan nutrisi bagi kulit anda agar kulit anda selalu segar dan sehat.\r\napabila konsumsi sayur dan buah dirasa kurang dan membuat kulit kerig dan kusam segera berikan nutrisi tambahan bagikulit dengan memberikan vitamin tambhan seperti pada serum dan lotion yang mengandung berbagai mcacam mineral yang dibutuhkan oleh kulit');

-- ----------------------------
-- Table structure for al2nq_blog_category
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_blog_category`;
CREATE TABLE `al2nq_blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_blog_category
-- ----------------------------
INSERT INTO `al2nq_blog_category` VALUES ('12', 'Annaouncement', 'annaouncement');
INSERT INTO `al2nq_blog_category` VALUES ('13', 'News', 'news');
INSERT INTO `al2nq_blog_category` VALUES ('14', 'Blog', 'blog');

-- ----------------------------
-- Table structure for al2nq_component
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_component`;
CREATE TABLE `al2nq_component` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parents` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `orders` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `routes` varchar(255) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `fadd` int(11) NOT NULL,
  `fedit` int(11) NOT NULL,
  `fdrop` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_component
-- ----------------------------
INSERT INTO `al2nq_component` VALUES ('1', '1', '0', '1', 'Configuration', 'admin/config', 'admin/config', '0', '0', '0');
INSERT INTO `al2nq_component` VALUES ('5', '0', '1', '0', 'oleeee', '', '', '0', '0', '0');
INSERT INTO `al2nq_component` VALUES ('6', '3', '1', '1', 'Form Manager', 'admin/form', 'admin/form/page', '0', '0', '0');
INSERT INTO `al2nq_component` VALUES ('7', '3', '1', '2', 'Add Form', 'admin/form/add', 'admin/form/add', '0', '0', '0');
INSERT INTO `al2nq_component` VALUES ('8', '3', '1', '3', 'Forms', 'admin/form/:num/add', 'admin/form/edit', '0', '0', '0');
INSERT INTO `al2nq_component` VALUES ('9', '1', '0', '2', 'Component', 'admin/component', 'admin/login/login', '0', '0', '0');
INSERT INTO `al2nq_component` VALUES ('10', '1', '0', '3', 'Admin Verify Login', 'admin/verify', 'admin/login/verify', '0', '0', '0');
INSERT INTO `al2nq_component` VALUES ('12', '5', '0', '1', 'User Manager', 'admin/user', '', '0', '0', '0');
INSERT INTO `al2nq_component` VALUES ('13', '5', '0', '2', 'User Level Manager', 'admin/user/level', '', '0', '0', '0');

-- ----------------------------
-- Table structure for al2nq_config
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_config`;
CREATE TABLE `al2nq_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `metadata` varchar(255) NOT NULL,
  `metakey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_config
-- ----------------------------
INSERT INTO `al2nq_config` VALUES ('1', 'CRM', 'Danny Sugiharto', 'danny sugiharto', 'CMS to CRM', 'crm, cms');

-- ----------------------------
-- Table structure for al2nq_form
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_form`;
CREATE TABLE `al2nq_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `success` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_form
-- ----------------------------
INSERT INTO `al2nq_form` VALUES ('1', 'Blog Category', 'al2nq_blog_category', 'admin/blog/category');
INSERT INTO `al2nq_form` VALUES ('2', 'Blog', 'al2nq_blog', 'admin/blog');

-- ----------------------------
-- Table structure for al2nq_form_field
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_form_field`;
CREATE TABLE `al2nq_form_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form` int(11) NOT NULL,
  `orders` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `defaults` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_form_field
-- ----------------------------
INSERT INTO `al2nq_form_field` VALUES ('1', '1', '0', '', '', '0', '', '');
INSERT INTO `al2nq_form_field` VALUES ('2', '1', '0', '', '', '0', '', '');
INSERT INTO `al2nq_form_field` VALUES ('3', '4', '1', '', 'nama', '1', '', '');
INSERT INTO `al2nq_form_field` VALUES ('4', '5', '1', 'Nama Produk', 'nama', '1', '', '');
INSERT INTO `al2nq_form_field` VALUES ('5', '5', '2', 'Harga Barang', 'harga', '1', '', '');
INSERT INTO `al2nq_form_field` VALUES ('6', '5', '3', 'kuantitas', 'kuantitas', '1', '', '');
INSERT INTO `al2nq_form_field` VALUES ('7', '6', '1', 'name', 'nama', '1', '', '');
INSERT INTO `al2nq_form_field` VALUES ('8', '6', '2', 'file pdf', 'pdf', '1', '', '');
INSERT INTO `al2nq_form_field` VALUES ('10', '1', '1', 'Category Title', 'title', '1', '', '');
INSERT INTO `al2nq_form_field` VALUES ('11', '2', '3', 'Category', 'category', '3', '1', '');
INSERT INTO `al2nq_form_field` VALUES ('12', '2', '2', 'Image', 'image', '6', '', '');
INSERT INTO `al2nq_form_field` VALUES ('13', '2', '1', 'Title', 'title', '1', '', '');
INSERT INTO `al2nq_form_field` VALUES ('14', '2', '0', 'Author', 'author', '9', '', '');
INSERT INTO `al2nq_form_field` VALUES ('15', '2', '-1', 'Created', 'created', '8', '', '');
INSERT INTO `al2nq_form_field` VALUES ('16', '2', '4', 'Content', 'content', '2', '', '');

-- ----------------------------
-- Table structure for al2nq_form_type
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_form_type`;
CREATE TABLE `al2nq_form_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_form_type
-- ----------------------------
INSERT INTO `al2nq_form_type` VALUES ('1', 'text');
INSERT INTO `al2nq_form_type` VALUES ('2', 'textarea');
INSERT INTO `al2nq_form_type` VALUES ('3', 'dropdown');
INSERT INTO `al2nq_form_type` VALUES ('4', 'radio');
INSERT INTO `al2nq_form_type` VALUES ('5', 'checkbox');
INSERT INTO `al2nq_form_type` VALUES ('6', 'upload');
INSERT INTO `al2nq_form_type` VALUES ('7', 'hidden');
INSERT INTO `al2nq_form_type` VALUES ('8', 'GET date');
INSERT INTO `al2nq_form_type` VALUES ('9', 'GET author');

-- ----------------------------
-- Table structure for al2nq_menu
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_menu`;
CREATE TABLE `al2nq_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `permission` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_menu
-- ----------------------------
INSERT INTO `al2nq_menu` VALUES ('1', 'Super Administrator', '1', '1');
INSERT INTO `al2nq_menu` VALUES ('2', 'Admin', '1', '2');
INSERT INTO `al2nq_menu` VALUES ('3', 'Coba', '1', '4');

-- ----------------------------
-- Table structure for al2nq_menu_child
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_menu_child`;
CREATE TABLE `al2nq_menu_child` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` int(11) NOT NULL DEFAULT '1',
  `parent` int(11) NOT NULL,
  `orders` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_menu_child
-- ----------------------------
INSERT INTO `al2nq_menu_child` VALUES ('5', '1', '0', '5', 'Menus', 'th-list', 'menu');
INSERT INTO `al2nq_menu_child` VALUES ('6', '1', '5', '1', 'Add New Menu', '', 'admin/menu/add');
INSERT INTO `al2nq_menu_child` VALUES ('7', '1', '5', '2', 'Menu Manager', '', 'admin/menu');
INSERT INTO `al2nq_menu_child` VALUES ('8', '1', '0', '7', 'Users', 'user', 'user');
INSERT INTO `al2nq_menu_child` VALUES ('10', '1', '8', '3', 'User Manager', '', 'admin/user');
INSERT INTO `al2nq_menu_child` VALUES ('11', '1', '8', '2', 'User Levels', '', 'admin/user/level');
INSERT INTO `al2nq_menu_child` VALUES ('12', '2', '0', '1', 'input barang', 'briefcase', 'admin/inputbarang');
INSERT INTO `al2nq_menu_child` VALUES ('13', '3', '0', '1', 'dfg', '', 'reseller/dfg');
INSERT INTO `al2nq_menu_child` VALUES ('14', '2', '15', '2', 'shoplist', '', 'admin/manageshoplist');
INSERT INTO `al2nq_menu_child` VALUES ('15', '2', '0', '2', 'manage', '', 'admin/manage');
INSERT INTO `al2nq_menu_child` VALUES ('16', '2', '15', '1', 'post', '', 'admin/manage/post');
INSERT INTO `al2nq_menu_child` VALUES ('17', '2', '15', '3', 'promotion', '', 'admin/manage/promotion');
INSERT INTO `al2nq_menu_child` VALUES ('19', '2', '0', '3', 'cek stok', '', 'admin/cekstok');
INSERT INTO `al2nq_menu_child` VALUES ('21', '4', '0', '1', 'emboh', 'desktop', 'admin/user-manager');
INSERT INTO `al2nq_menu_child` VALUES ('22', '4', '21', '1', 'ljsvgwe', '', 'www');
INSERT INTO `al2nq_menu_child` VALUES ('23', '4', '0', '2', 'coba', '', 'admin/user-manager');
INSERT INTO `al2nq_menu_child` VALUES ('24', '4', '23', '1', 'Super', '', 'admin/form');
INSERT INTO `al2nq_menu_child` VALUES ('26', '3', '0', '1', 'pooling', '', 'form/6/add');
INSERT INTO `al2nq_menu_child` VALUES ('28', '1', '0', '8', 'Configuration', 'wrench', 'admin/config');
INSERT INTO `al2nq_menu_child` VALUES ('29', '1', '0', '3', 'Article', 'book', 'blog');
INSERT INTO `al2nq_menu_child` VALUES ('31', '1', '0', '6', 'Shop', 'shopping-cart', 'shop');
INSERT INTO `al2nq_menu_child` VALUES ('32', '1', '31', '2', 'Category', '', 'admin/shop/category');
INSERT INTO `al2nq_menu_child` VALUES ('33', '1', '29', '2', 'Blog', '', 'admin/blog/');
INSERT INTO `al2nq_menu_child` VALUES ('34', '1', '29', '1', 'Category', '', 'admin/blog/category');
INSERT INTO `al2nq_menu_child` VALUES ('35', '1', '31', '1', 'Products', '', 'admin/shop/product');
INSERT INTO `al2nq_menu_child` VALUES ('36', '1', '31', '3', 'Orders', '', 'admin/shop/orders');
INSERT INTO `al2nq_menu_child` VALUES ('37', '1', '0', '7', 'Review', 'buildig-o', 'revew');
INSERT INTO `al2nq_menu_child` VALUES ('38', '1', '37', '1', 'Review Manager', '', 'admin/review');
INSERT INTO `al2nq_menu_child` VALUES ('39', '1', '37', '2', 'Survey', '', 'admin/survey');

-- ----------------------------
-- Table structure for al2nq_review
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_review`;
CREATE TABLE `al2nq_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_review
-- ----------------------------
INSERT INTO `al2nq_review` VALUES ('2', 'Review Pelanggan');

-- ----------------------------
-- Table structure for al2nq_review_answer
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_review_answer`;
CREATE TABLE `al2nq_review_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `scores` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_review_answer
-- ----------------------------
INSERT INTO `al2nq_review_answer` VALUES ('6', '2', '5#4,6#5,', '0');
INSERT INTO `al2nq_review_answer` VALUES ('7', '5', '6#4,7#5,8#4,9#5,10#3,11#4,12#5,13#5,14#4,15#4,', '50');

-- ----------------------------
-- Table structure for al2nq_review_question
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_review_question`;
CREATE TABLE `al2nq_review_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_review_question
-- ----------------------------
INSERT INTO `al2nq_review_question` VALUES ('6', '2', 'Apakah produk ditingkatkan kualitas tetapi harga ditambahkan akan lebih baik?', '5');
INSERT INTO `al2nq_review_question` VALUES ('7', '2', 'Apakah kemasan diperkecil dan juga harga lebih murah apakah menjadi lebih baik?', '5');
INSERT INTO `al2nq_review_question` VALUES ('8', '2', 'Bentuk kemasan akan lebih mewah tetapi ada penambahan sedikit harga, bagaimana menurut anda?', '5');
INSERT INTO `al2nq_review_question` VALUES ('9', '2', 'Penambahan fungsi pada tiap produk ( misal: pemutih sekaligus menghaluskan) ', '5');
INSERT INTO `al2nq_review_question` VALUES ('10', '2', 'Proses pengiriman lebih cepat dengan konsekuensi harga pengiriman sedikit lebih mahal', '5');
INSERT INTO `al2nq_review_question` VALUES ('11', '2', 'Pencatuman label halal dan sertifikasi dari BPOM RI', '5');
INSERT INTO `al2nq_review_question` VALUES ('12', '2', 'Penggunaan segel yang lebih baik sehingga menunjukan keaslian produk', '5');
INSERT INTO `al2nq_review_question` VALUES ('13', '2', 'Pencantuman unsur dari tiap produk dan kegunaan khusus dari tiap produk yang mebedakan dari produk lainnya.', '5');
INSERT INTO `al2nq_review_question` VALUES ('14', '2', 'Penggunaan parfum yang lebih baik sehingga tidak bosan dengan aroma yang ada', '5');
INSERT INTO `al2nq_review_question` VALUES ('15', '2', 'apakah baik', '5');

-- ----------------------------
-- Table structure for al2nq_sample
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_sample`;
CREATE TABLE `al2nq_sample` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_sample
-- ----------------------------
INSERT INTO `al2nq_sample` VALUES ('22', 'pogba', '1394667691.png');
INSERT INTO `al2nq_sample` VALUES ('23', 'david de gea', 'article-2268117-170E4CD8000005DC-384_468x295.jpg');
INSERT INTO `al2nq_sample` VALUES ('24', 'dembele', '85104422.png');
INSERT INTO `al2nq_sample` VALUES ('25', 'cesc fabregas', '1394686364.png');
INSERT INTO `al2nq_sample` VALUES ('26', 'mboh', 'Angelo-Henriquez-Manchester-United-preseason_2983441.jpg');

-- ----------------------------
-- Table structure for al2nq_shop
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_shop`;
CREATE TABLE `al2nq_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_shop
-- ----------------------------

-- ----------------------------
-- Table structure for al2nq_shop_cart
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_shop_cart`;
CREATE TABLE `al2nq_shop_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `prices` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_shop_cart
-- ----------------------------

-- ----------------------------
-- Table structure for al2nq_shop_carts
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_shop_carts`;
CREATE TABLE `al2nq_shop_carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `carts` text NOT NULL,
  `total` int(11) NOT NULL,
  `created` date NOT NULL DEFAULT '0000-00-00',
  `status` int(11) NOT NULL DEFAULT '0',
  `courier` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_shop_carts
-- ----------------------------
INSERT INTO `al2nq_shop_carts` VALUES ('10', '1', '1#5,3#3,							', '3022200', '2014-02-03', '2', '3');
INSERT INTO `al2nq_shop_carts` VALUES ('11', '2', '6#2,							', '600000', '2014-02-04', '2', '3');
INSERT INTO `al2nq_shop_carts` VALUES ('12', '2', '4#1,							', '300000', '2014-04-09', '2', '5');
INSERT INTO `al2nq_shop_carts` VALUES ('13', '2', '7#2,							', '440', '2014-06-05', '2', '4');
INSERT INTO `al2nq_shop_carts` VALUES ('14', '2', '4#1,							', '300000', '2014-06-05', '2', '5');
INSERT INTO `al2nq_shop_carts` VALUES ('15', '2', '6#3,							', '900000', '2014-06-27', '2', '5');
INSERT INTO `al2nq_shop_carts` VALUES ('16', '2', '4#2,							', '600000', '2014-07-14', '2', '1');
INSERT INTO `al2nq_shop_carts` VALUES ('17', '2', '4#2,							', '600000', '2014-07-14', '2', '5');
INSERT INTO `al2nq_shop_carts` VALUES ('18', '2', '6#2,4#1,							', '900000', '2014-08-16', '2', '5');
INSERT INTO `al2nq_shop_carts` VALUES ('19', '2', '4#2,							', '600000', '2014-08-17', '1', '4');
INSERT INTO `al2nq_shop_carts` VALUES ('20', '2', '6#1,							', '300000', '2014-08-29', '1', '1');
INSERT INTO `al2nq_shop_carts` VALUES ('21', '5', '6#2,							', '600000', '2014-08-29', '1', '1');
INSERT INTO `al2nq_shop_carts` VALUES ('22', '2', '4#111,							', '33300000', '2014-08-30', '1', '5');

-- ----------------------------
-- Table structure for al2nq_shop_category
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_shop_category`;
CREATE TABLE `al2nq_shop_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_shop_category
-- ----------------------------
INSERT INTO `al2nq_shop_category` VALUES ('1', 'Cosmetics', 'cosmetics');
INSERT INTO `al2nq_shop_category` VALUES ('2', 'Accessories', 'accessories');

-- ----------------------------
-- Table structure for al2nq_shop_history
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_shop_history`;
CREATE TABLE `al2nq_shop_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `cart` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_shop_history
-- ----------------------------

-- ----------------------------
-- Table structure for al2nq_shop_product
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_shop_product`;
CREATE TABLE `al2nq_shop_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_shop_product
-- ----------------------------
INSERT INTO `al2nq_shop_product` VALUES ('4', '0', 'diamond package', 'diamond-package', '300000', '0', 'diamond.jpg', '1 set perawatan yang terdiri dari lotion, bodywash dan scrub yang mengandung serpihan diamond yang berfungsi memutihkan kulit dan juga merawat serta menyehatkan kulit dilengkapi pula dengan aloe vera yang berguna untuk menyamarkan bekas luka dengan cepat');
INSERT INTO `al2nq_shop_product` VALUES ('5', '1', 'gold package', 'gold-package', '235000', '0', 'gold.jpg', '1 set perlengkapa perawatan tubuh yang terdiri dari lotion sabun mandi dan  juga scrub yang mengandung biji emas dimana berguna untuk memutihkan menyehatkan dan menyegarkan kulit serta dengan aroma yang mewah senantiasa mendampingi anda setiap hari');
INSERT INTO `al2nq_shop_product` VALUES ('6', '1', 'cranberry package', 'cranberry-package', '300000', '0', 'cranberry.jpg', 'set perawatan tubuh yang terdiri dari lotion, body butter dan scrub yang mengandung cranberry yang dipercaya sangat baik untuk kesehatan kulit dan juga memberikan nutrisi secara alami bagi kulit ditemani dengan sbaun dengan wangi parfum yang tahan lama ak');
INSERT INTO `al2nq_shop_product` VALUES ('7', '1', 'diamond package', 'diamond-package', '220', '0', 'diamond.jpg', '');

-- ----------------------------
-- Table structure for al2nq_users
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_users`;
CREATE TABLE `al2nq_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_users
-- ----------------------------
INSERT INTO `al2nq_users` VALUES ('1', '1', 'superadmin', 'sugihartodanny@gmail.com', 'Danny Sugiharto', '1', '4caddd98887ca0acae0916ee13528d11', 'Jl. Danau Kerinci nomer 23', '085755747380', '');
INSERT INTO `al2nq_users` VALUES ('2', '2', 'david', 'yolo@yahoo.com', 'David Prawiro', '1', '172522ec1028ab781d9dfd17eaca4427', 'jl emas 4', '08111111111', '');
INSERT INTO `al2nq_users` VALUES ('4', '4', 'rian', '', 'rian aldian', '1', '1eb6d605e0698d0c6d3121c8cd45e6b5', '', '', '');
INSERT INTO `al2nq_users` VALUES ('5', '2', 'januarfonti', '', 'fonti', '1', 'd9e288ecef3f432a48a3ed87c7bec2b7', '', '', '');

-- ----------------------------
-- Table structure for al2nq_users_level
-- ----------------------------
DROP TABLE IF EXISTS `al2nq_users_level`;
CREATE TABLE `al2nq_users_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `levels` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of al2nq_users_level
-- ----------------------------
INSERT INTO `al2nq_users_level` VALUES ('1', 'Administrator');
INSERT INTO `al2nq_users_level` VALUES ('2', 'Reseller');
INSERT INTO `al2nq_users_level` VALUES ('3', 'Buyer');
INSERT INTO `al2nq_users_level` VALUES ('4', 'User');
