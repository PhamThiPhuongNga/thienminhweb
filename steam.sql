-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 06:08 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `steam`
--

-- --------------------------------------------------------

--
-- Table structure for table `e4_analytics_code`
--

CREATE TABLE IF NOT EXISTS `e4_analytics_code` (
  `id` int(5) NOT NULL,
  `title_vn` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_vn` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `region` int(2) NOT NULL DEFAULT '0',
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_created` int(20) NOT NULL,
  `user_created` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_updated` int(20) NOT NULL,
  `user_updated` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_analytics_code`
--

INSERT INTO `e4_analytics_code` (`id`, `title_vn`, `description_vn`, `code`, `position`, `region`, `status`, `date_created`, `user_created`, `date_updated`, `user_updated`) VALUES
(3, 'ManyChat', 'ManyChat', '<!-- ManyChat -->\r\n<script src="//widget.manychat.com/153987.js" async="async"></script>', 'header', 2, 'active', 1487872053, 'admin@gmail.com', 1595493737, 'admin@gmail.com'),
(11, 'Google', 'Google Analytics', '<!-- Global site tag (gtag.js) - Google Ads: 663102357 -->\r\n<script async src="https://www.googletagmanager.com/gtag/js?id=AW-663102357"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(''js'', new Date());\r\n\r\n  //gtag(''config'', ''AW-663102357'');\r\n  gtag(''config'', ''UA-159669318-1'',{ ''optimize_id'': ''GTM-PFZ9QJV''});\r\n</script>', 'header', 1, 'active', 1594719612, 'admin@gmail.com', 1595493664, 'admin@gmail.com'),
(12, 'Facebook', 'Mã nhúng theo dõi facebook connect', '<!-- Facebook Pixel Code -->\r\n<script>\r\n  !function(f,b,e,v,n,t,s)\r\n  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?\r\n  n.callMethod.apply(n,arguments):n.queue.push(arguments)};\r\n  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=''2.0'';\r\n  n.queue=[];t=b.createElement(e);t.async=!0;\r\n  t.src=v;s=b.getElementsByTagName(e)[0];\r\n  s.parentNode.insertBefore(t,s)}(window, document,''script'',\r\n  ''https://connect.facebook.net/en_US/fbevents.js'');\r\n  fbq(''init'', ''238627553830211'');\r\n  fbq(''track'', ''PageView'');\r\n</script>\r\n<noscript><img height="1" width="1" style="display:none"\r\n  src="https://www.facebook.com/tr?id=238627553830211&ev=PageView&noscript=1"\r\n/></noscript>\r\n<!-- End Facebook Pixel Code -->', 'footer', 4, 'active', 1595493161, 'admin@gmail.com', 1595493705, 'admin@gmail.com'),
(13, 'Map', 'Nhúng bản đồ vào trang liên hệ', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.0769262300387!2d105.83011561489695!3d20.989553286019593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad7983bf139f%3A0xd715ed4e538ae441!2zQ8O0bmcgdHkgbmdoacOqbiBj4bupdSB0aOG7iyB0csaw4budbmcgVmlldEFuYWx5dGljcw!5e0!3m2!1sen!2s!4v1592551768791!5m2!1sen!2s" height="720"></iframe>', 'header', 3, 'active', 1597128379, 'admin@gmail.com', 1597129187, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `e4_blocks`
--

CREATE TABLE IF NOT EXISTS `e4_blocks` (
`id` int(11) NOT NULL,
  `bname` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bfilename` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bposition` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bpublish` int(1) NOT NULL,
  `region` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_blocks`
--

INSERT INTO `e4_blocks` (`id`, `bname`, `bfilename`, `bposition`, `bpublish`, `region`) VALUES
(1, 'top_care', 'block.top_care.php', 'top_care', 1, 0),
(61, 'header', 'block.header.php', 'header', 1, 2),
(69, 'head', 'block.head.php', 'head', 1, 1),
(72, 'product_featured', 'block.product_featured.php', 'product_featured', 1, 4),
(73, 'footer', 'block.footer.php', 'footer', 1, 19),
(75, 'footer_script', 'block.footer_script.php', 'footer_script', 1, 20),
(85, 'news_recent', 'block.news_recent.php', 'news_recent', 1, 11),
(86, 'news_related', 'block.news_related.php', 'news_related', 1, 14),
(95, 'product_home', 'block.product_home.php', 'product_home', 1, 5),
(96, 'sale_home', 'block.sale_home.php', 'sale_home', 1, 0),
(97, 'home_advertisement', 'block.home_advertisement.php', 'home_advertisement', 1, 0),
(98, 'home_comment', 'block.home_comment.php', 'home_comment', 1, 0),
(99, 'product_sale', 'block.product_sale.php', 'product_sale', 1, 0),
(100, 'product_left', 'block.product_left.php', 'product_left', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `e4_contacts`
--

CREATE TABLE IF NOT EXISTS `e4_contacts` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL DEFAULT '0',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `date_created` bigint(20) NOT NULL DEFAULT '0',
  `date_updated` bigint(20) NOT NULL DEFAULT '0',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'contact'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_contacts`
--

INSERT INTO `e4_contacts` (`id`, `customer_id`, `name`, `phone`, `email`, `address`, `content`, `date_created`, `date_updated`, `comment`, `status`, `type`) VALUES
(1, 0, 'Nguyễn Hữu Thắng', '0982269600', 'huuthangb2k50@gmail.com', 'Số 3/257 Xuân Khanh, Sơn Tây, Hà Nội', 'Liên hệ với chúng tôi', 1597130460, 0, NULL, 'new', 'contact'),
(2, 0, 'Nguyễn Hữu Thắng', '0982269600', '', '', ' required ', 1597130520, 0, NULL, 'new', 'contact'),
(3, 0, 'Nguyễn Hữu Thắng', '0982269600', 'huuthangb2k50@gmail.com', 'Số 3/257 Xuân Khanh, Sơn Tây, Hà Nội', 'Thu lai gui mail xem dc ko', 1597130876, 0, NULL, 'new', 'contact'),
(4, 0, 'Nguyễn Hữu Thắng', '0982269600', 'huuthangb2k50@gmail.com', 'Số 3/257 Xuân Khanh, Sơn Tây, Hà Nội', 'Thu lai gui mail xem dc ko', 1597130961, 0, NULL, 'new', 'contact'),
(5, 0, 'Nguyễn Hữu Thắng', '0982269600', 'huuthangb2k50@gmail.com', 'Số 3/257 Xuân Khanh, Sơn Tây, Hà Nội', 'Thu lai gui mail xem dc ko', 1597131031, 0, NULL, 'new', 'contact'),
(6, 0, 'Nguyễn Hữu Thắng', '0982269600', 'huuthangb2k50@gmail.com', 'Số 3/257 Xuân Khanh, Sơn Tây, Hà Nội', 'Nguyenhuuthang@123', 1597131102, 0, NULL, 'new', 'contact'),
(8, 0, NULL, NULL, 'huuthangb2k50@gmail.com', NULL, NULL, 0, 0, NULL, 'new', 'newsletter');

-- --------------------------------------------------------

--
-- Table structure for table `e4_functions`
--

CREATE TABLE IF NOT EXISTS `e4_functions` (
  `id` int(10) NOT NULL,
  `function_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `function_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `module_id` int(5) NOT NULL,
  `date_created` int(20) NOT NULL,
  `user_created` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Danh sach cac function duoc dinh nghia tren he thong admin';

--
-- Dumping data for table `e4_functions`
--

INSERT INTO `e4_functions` (`id`, `function_code`, `function_name`, `module_id`, `date_created`, `user_created`, `status`) VALUES
(1, 'menu_admin_add', 'Thêm mới Menu Admin', 31, 1483898597, '1', 'active'),
(2, 'menu_admin_edit', 'Sửa Menu Admin', 31, 1483898611, '1', 'active'),
(3, 'menu_admin_delete', 'Xóa Menu Admin', 31, 1483898622, '1', 'active'),
(4, 'menu_admin_view', 'Xem danh sách Menu Admin', 31, 1483898634, '1', 'active'),
(5, 'module_add', 'Thêm mới module', 34, 1483898661, '1', 'active'),
(6, 'module_edit', 'Sửa module', 34, 1483898672, '1', 'active'),
(7, 'module_delete', 'Xóa module', 34, 1483898683, '1', 'active'),
(8, 'module_view', 'Xem danh sách module', 34, 1483898693, '1', 'active'),
(9, 'roles_view', 'Xem danh sách nhóm quyền', 46, 1483898712, '1', 'active'),
(10, 'roles_add', 'Thêm mới nhóm quyền', 46, 1483898721, '1', 'active'),
(11, 'roles_edit', 'Sửa nhóm quyền', 46, 1483898731, '1', 'active'),
(12, 'roles_delete', 'Xóa nhóm quyền', 46, 1483898740, '1', 'active'),
(13, 'roles_module_action', 'Phân quyền thao tác chức năng cho nhóm quyền', 46, 1483898754, '1', 'active'),
(14, 'roles_menu_access', 'Phần quyền thao tác menu admin cho nhóm quyền', 46, 1483898762, '1', 'active'),
(15, 'task_add', 'Thêm mới Task', 50, 1483898783, '1', 'active'),
(16, 'task_edit', 'Sửa Task', 50, 1483898790, '1', 'active'),
(17, 'task_delete', 'Xóa Task', 50, 1483898806, '1', 'active'),
(18, 'task_view', 'Xem danh sách task - modules', 50, 1483898826, '1', 'active'),
(19, 'block_add', 'Thêm mới Block', 51, 1483898844, '1', 'active'),
(20, 'block_edit', 'Sửa Block', 51, 1483898853, '1', 'active'),
(21, 'block_delete', 'Xóa Block', 51, 1483898865, '1', 'active'),
(22, 'block_view', 'Xem danh sách Block', 51, 1483898880, '1', 'active'),
(23, 'user_add', 'Thêm mới người dùng', 1, 1483898897, '1', 'active'),
(24, 'user_edit', 'Sửa người dùng', 1, 1483898905, '1', 'active'),
(25, 'user_delete', 'Xóa người dùng', 1, 1483898918, '1', 'active'),
(26, 'user_publish', 'Kích hoạt người dùng', 1, 1483898929, '1', 'active'),
(27, 'user_unpublish', 'Khóa người dùng', 1, 1483898936, '1', 'active'),
(28, 'user_view', 'Xem danh sách người dùng', 1, 1483898945, '1', 'active'),
(29, 'news_add', 'Thêm mới tin tức', 115, 1483898959, '1', 'active'),
(30, 'news_category_add', 'Thêm mới danh mục tin tức', 4, 1483898970, '1', 'active'),
(31, 'news_delete', 'Xóa tin tức', 115, 1483898979, '1', 'active'),
(32, 'news_category_delete', 'Xóa danh mục tin tức', 4, 1483898988, '1', 'active'),
(33, 'news_category_edit', 'Sửa danh mục tin tức', 4, 1483898998, '1', 'active'),
(34, 'news_category_view', 'Xem danh sách danh mục tin tức', 4, 1483899008, '1', 'active'),
(35, 'news_edit', 'Sửa tin tức', 115, 1483899021, '1', 'active'),
(36, 'news_view', 'Xem danh sách tin tức', 115, 1483899032, '1', 'active'),
(37, 'profile_edit', 'Sửa thông tin tài khoản cá nhân', 108, 1483947014, '1', 'active'),
(38, 'profile_change_pass', 'Đổi mật khẩu tài khoản cá nhân', 108, 1483947040, '1', 'active'),
(39, 'product_view', 'Xem danh sách sản phẩm', 109, 1484233794, '1', 'active'),
(40, 'product_add', 'Thêm mới sản phẩm', 109, 1484233825, '1', 'active'),
(41, 'product_edit', 'Sửa sản phẩm', 109, 1484233841, '1', 'active'),
(42, 'product_delete', 'Xóa sản phẩm', 109, 1484233855, '1', 'active'),
(43, 'product_category_add', 'Thêm mới danh mục sản phẩm', 109, 1484233880, '1', 'active'),
(44, 'product_category_edit', 'Sửa danh mục sản phẩm', 109, 1484233901, '1', 'active'),
(45, 'product_category_view', 'Xem danh sách danh mục sản phẩm', 109, 1484233920, '1', 'active'),
(46, 'product_category_delete', 'Xóa danh mục sản phẩm', 109, 1484233942, '1', 'active'),
(51, 'web_menu_add', 'Thêm mới Menu website', 107, 1484681667, '1', 'active'),
(52, 'web_menu_edit', 'Sửa Menu website', 107, 1484681695, '1', 'active'),
(53, 'web_menu_delete', 'Xóa Menu website', 107, 1484681709, '1', 'active'),
(54, 'web_menu_view', 'Xem danh sách Menu website', 107, 1484681722, '1', 'active'),
(55, 'web_home_add', 'Thêm mới nội dung', 111, 1484753712, '1', 'active'),
(56, 'web_home_edit', 'Sửa nội dung', 111, 1484753724, '1', 'active'),
(57, 'web_home_delete', 'Xóa nội dung', 111, 1484753736, '1', 'active'),
(58, 'web_home_view', 'Xem danh sách nội dung', 111, 1484753747, '1', 'active'),
(59, 'web_image_add', 'Thêm mới hình ảnh', 112, 1484761002, '1', 'active'),
(60, 'web_image_edit', 'Sửa hình ảnh', 112, 1484761013, '1', 'active'),
(61, 'web_image_delete', 'Xóa hình ảnh', 112, 1484761023, '1', 'active'),
(62, 'web_image_view', 'Xem danh sách hình ảnh', 112, 1484761035, '1', 'active'),
(63, 'web_branches_add', 'Thêm mới chi nhánh', 114, 1487872320, '1', 'active'),
(64, 'web_branches_delete', 'Xóa thông tin chi nhánh', 114, 1487872338, '1', 'active'),
(65, 'web_branches_edit', 'Sửa thông tin chi nhánh', 114, 1487872352, '1', 'active'),
(66, 'web_information_edit', 'Sửa thông tin website', 114, 1487872371, '1', 'active'),
(67, 'news_group_add', 'Thêm nhóm tin tức', 116, 1595237243, '1', 'active'),
(68, 'news_group_edit', 'Sửa nhóm tin tức', 116, 1595237261, '1', 'active'),
(69, 'news_group_delete', 'Xóa nhóm tin tức', 116, 1595237301, '1', 'active'),
(70, 'news_group_view', 'Xem danh sách nhóm tin tức', 116, 1595237323, '1', 'active'),
(71, 'news_type_edit', 'Sửa loại tin tức', 117, 1595237641, '1', 'active'),
(72, 'news_type_add', 'Thêm loại tin tức', 117, 1595237654, '1', 'active'),
(73, 'news_type_delete', 'Xóa loại tin tức', 117, 1595237673, '1', 'active'),
(74, 'news_type_view', 'Xem danh sách loại tin tức', 117, 1595237694, '1', 'active'),
(76, 'news_topic_add', 'Thêm chuyên đề', 118, 1595237950, '1', 'active'),
(77, 'news_topic_delete', 'Xóa chuyên đề', 118, 1595237962, '1', 'active'),
(78, 'news_topic_edit', 'Sửa chuyên đề', 118, 1595237975, '1', 'active'),
(79, 'news_topic_view', 'Xem danh sách chuyên đề', 118, 1595237990, '1', 'active'),
(80, 'analytics_code_add', 'Thêm mã', 119, 1595491797, '1', 'active'),
(81, 'analytics_code_edit', 'Sửa mã', 119, 1595491809, '1', 'active'),
(82, 'analytics_code_delete', 'Xóa mã', 119, 1595491824, '1', 'active'),
(83, 'analytics_code_view', 'Xem danh sách mã', 119, 1595491869, '1', 'active'),
(84, 'news_tags_add', 'Thêm Tags', 120, 1595917396, '1', 'active'),
(85, 'news_tags_delete', 'Xóa Tags', 120, 1595917413, '1', 'active'),
(86, 'news_tags_edit', 'Sửa Tags', 120, 1595917426, '1', 'active'),
(87, 'news_tags_view', 'Xem danh sách tags', 120, 1595917454, '1', 'active'),
(88, 'product_category_add', 'Thêm danh mục sản phẩm', 122, 1596719752, '1', 'active'),
(89, 'product_category_edit', 'Sửa danh mục sản phẩm', 122, 1596719916, '1', 'active'),
(90, 'product_category_delete', 'Xóa danh mục sản phẩm', 122, 1596720071, '1', 'active'),
(91, 'product_category_view', 'Xem danh mục sản phẩm', 122, 1596720093, '1', 'active'),
(92, 'product_add', 'Thêm mới sản phẩm', 123, 1596720172, '1', 'active'),
(93, 'product_delete', 'Xóa sản phẩm', 123, 1596720186, '1', 'active'),
(94, 'product_edit', 'Sửa sản phẩm', 123, 1596720198, '1', 'active'),
(95, 'product_view', 'Xem danh sách sản phẩm', 123, 1596720212, '1', 'active'),
(96, 'product_group_add', 'Thêm mới nhóm sản phẩm', 126, 1596824838, '1', 'active'),
(97, 'product_group_edit', 'Sửa nhóm sản phẩm', 126, 1596824855, '1', 'active'),
(98, 'product_group_delete', 'Xóa nhóm sản phẩm', 126, 1596824870, '1', 'active'),
(99, 'product_group_view', 'Xem danh sách nhóm sản phẩm', 126, 1596824881, '1', 'active'),
(100, 'product_type_add', 'Thêm mới phân loại sản phẩm', 127, 1596869985, '1', 'active'),
(101, 'product_type_edit', 'Sửa phân loại sản phẩm', 127, 1596870006, '1', 'active'),
(102, 'product_type_delete', 'Xóa phân loại sản phẩm', 127, 1596870022, '1', 'active'),
(103, 'product_type_view', 'Danh sách phân loại sản phẩm', 127, 1596870045, '1', 'active'),
(104, 'cart_view', 'Xem danh sách đơn hàng', 130, 1597135503, '1', 'active'),
(106, 'cart_delete', 'Xóa đơn hàng', 130, 1597135582, '1', 'active'),
(107, 'cart_edit', 'Sửa đơn hàng', 130, 1597135606, '1', 'active'),
(108, 'contact_delete', 'Xóa liên hệ', 132, 1597135899, '1', 'active'),
(109, 'contact_edit', 'Sửa liên hệ', 132, 1597135913, '1', 'active'),
(110, 'contact_view', 'Xem liên hệ', 132, 1597135927, '1', 'active'),
(111, 'contact_newsletter', 'Danh sách nhận bản tin - newsletter', 132, 1597135969, '1', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `e4_leftmenu`
--

CREATE TABLE IF NOT EXISTS `e4_leftmenu` (
  `id` int(5) NOT NULL,
  `parent_id` int(5) NOT NULL DEFAULT '0',
  `title_vi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `level` int(2) NOT NULL DEFAULT '0',
  `region` int(3) NOT NULL DEFAULT '0',
  `toolbar` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'deactive',
  `user_created` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_created` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_leftmenu`
--

INSERT INTO `e4_leftmenu` (`id`, `parent_id`, `title_vi`, `title_en`, `icon`, `link`, `status`, `level`, `region`, `toolbar`, `user_created`, `date_created`) VALUES
(2, 0, 'Quản lý hệ thống', 'System Management', 'fa fa-database', '', 'active', 1, 11, '0', '', 0),
(10, 2, 'Quản lý nhóm quyền', 'Roles Group Management', '', '?module=roles', 'active', 2, 42, '0', '', 0),
(11, 2, 'Quản lý người dùng', 'User Management', '', '?module=user', 'active', 2, 43, 'active', '', 0),
(13, 2, 'Quản lý Menu Admin', 'Menu Admin Management', '', '?module=menu_admin', 'active', 2, 41, 'active', '', 0),
(15, 95, 'Quản lý danh mục tin tức', 'News Category Management', 'fa fa-files-o', '?module=news_category', 'active', 2, 0, 'deactive', '', 0),
(25, 74, 'Quản lý Modules', 'Modules Management', '', '?module=module', 'active', 2, 52, '1', '', 0),
(33, 74, 'Quản lý Blog (Admin System)', 'Quản lý Blog (Admin System)', '', '?module=block', 'active', 2, 51, '0', '', 0),
(49, 0, 'Quản lý thông tin cấu hình', 'Quản lý thông tin cấu hình', 'fa fa-cogs', '', 'active', 1, 9, '0', '', 0),
(51, 74, 'Quản lý Tasks - Modules', 'Tasks & Modules Management', '', '?module=task', 'active', 2, 53, '0', '', 0),
(72, 0, 'Quản lý liên hệ - Newsletter', 'Contacts Management', 'fa fa-headphones', '?module=contact', 'active', 1, 1, 'deactive', '', 0),
(73, 49, 'Quản lý menu website', 'Quản lý menu website', '', '?module=web_menu', 'active', 2, 31, 'deactive', '', 0),
(74, 0, 'Dành cho người phát triển', 'Dành cho người phát triển', 'fa fa-cubes', '', 'active', 1, 10, '0', '', 0),
(87, 0, 'Tài khoản cá nhân', 'Your Profile', 'fa fa-user', '?module=profile', 'active', 1, 6, 'active', '', 1483904741),
(90, 49, 'Quản lý cấu hình trang chủ', 'Homepage Management', '', '?module=web_home', 'active', 2, 32, 'deactive', '', 1484751727),
(91, 49, 'Quản lý hình ảnh hệ thống', 'System Image Management', 'fa fa-picture-o', '?module=web_image', 'active', 2, 7, 'deactive', '', 1484761092),
(92, 49, 'Quản lý thông tin website', 'Website information management', 'fa fa-globe', '?module=web_information', 'active', 2, 4, '', '', 1487872412),
(95, 0, 'Quản lý nội dung tin tức', 'News Content Management', '', '', 'active', 1, 1, '', '', 1592553201),
(96, 95, 'Quản lý nhóm tin tức', 'News Group management', '', '?module=news_group', 'active', 2, 0, '', '', 1595237154),
(97, 95, 'Quản lý phân loại tin tức', 'News Type Management', '', '?module=news_type', 'active', 2, 0, '', '', 1595237446),
(98, 95, 'Quản lý chuyên đề tin tức', 'News Topic Management', '', '?module=news_topic', 'active', 2, 0, '', '', 1595237512),
(99, 49, 'Quản lý mã nhúng', 'Analytics code', '', '?module=analytics_code', 'active', 2, 0, '', '', 1595491947),
(100, 95, 'Quản lý thẻ - tags', 'Tags Management', 'fa fa-tags', '?module=news_tags', 'active', 2, 0, '', '', 1595917972),
(101, 0, 'Quản lý bài viết', 'Posts Management', 'fa fa-files-o', '?module=news', 'active', 1, 0, '', '', 1595919917),
(102, 106, 'Quản lý danh mục sản phẩm', 'Product categoty management', '', '?module=product_category', 'active', 2, 0, 'deactive', '1', 1596720755),
(103, 0, 'Quản lý sản phẩm', 'Product Management', '', '?module=product', 'active', 1, 0, 'deactive', '1', 1596722636),
(104, 106, 'Quản lý nhóm sản phẩm', 'Product Group Management', '', '?module=product_group', 'active', 2, 0, 'deactive', '1', 1596824928),
(105, 106, 'Quản lý phân loại sản phẩm', 'Product Type Management', '', '?module=product_type', 'active', 2, 0, 'deactive', '1', 1596870101),
(106, 0, 'Quản lý nội dung sản phẩm', 'Product Content Management', '', '', 'active', 1, 0, 'deactive', '1', 1596871407),
(107, 0, 'Quản lý đơn hàng', 'Order-Product Management', 'fa fa-shopping-cart', '?module=cart', 'active', 1, 0, 'deactive', '1', 1597135674);

-- --------------------------------------------------------

--
-- Table structure for table `e4_modules`
--

CREATE TABLE IF NOT EXISTS `e4_modules` (
  `id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `folder` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_modules`
--

INSERT INTO `e4_modules` (`id`, `name`, `title`, `folder`, `type`, `status`) VALUES
(0, 'account', 'tài khoản', 'mdl_account', 'public', 'active'),
(1, 'user', 'Quản lý người dùng hệ thống', 'mdl_user', 'admin', 'active'),
(4, 'news_category', 'Quản lý danh mục tin tức', 'mdl_news_category', 'admin', 'active'),
(31, 'menu_admin', 'Quản lý Menu admin', 'mdl_menu_admin', 'admin', 'active'),
(34, 'module', 'Quản lý modules hệ thống ( Dành cho Lập trình viên)', 'mdl_module', 'admin', 'active'),
(46, 'roles', 'Quản lý nhóm quyền', 'mdl_roles', 'admin', 'active'),
(50, 'task', 'Quản lý tasks theo module ( Dành cho Lập trình viên)', 'mdl_task', 'admin', 'active'),
(51, 'block', 'Quản lý Blocks ( Dành cho Lập trình viên)', 'mdl_block', 'admin', 'active'),
(107, 'web_menu', 'Quản lý menu website ngoài', 'mdl_web_menu', 'admin', 'active'),
(108, 'profile', 'Tài khoản cá nhân', 'mdl_profile', 'admin', 'active'),
(109, 'product', 'Quản lý sản phẩm - dịch vụ', 'mdl_product', 'admin', 'active'),
(111, 'web_home', 'Cấu hình trang chủ', 'mdl_web_home', 'admin', 'active'),
(112, 'web_image', 'Quản lý hình ảnh hệ thống', 'mdl_web_image', 'admin', 'active'),
(114, 'web_information', 'Quản lý thông tin website', 'mdl_web_information', 'admin', 'active'),
(115, 'news', 'Quản lý tin tức', 'mdl_news', 'admin', 'active'),
(116, 'news_group', 'Quản lý nhóm tin tức', 'mdl_news_group', 'admin', 'active'),
(117, 'news_type', 'Quản lý phân loại tin tức', 'mdl_news_type', 'admin', 'active'),
(118, 'news_topic', 'Quản lý chuyên đề tin tức', 'mdl_news_topic', 'admin', 'active'),
(119, 'analytics_code', 'Quản lý mã nhúng theo dõi truy cập', 'mdl_analytics_code', 'admin', 'active'),
(120, 'news_tags', 'Quản lý thẻ - tags', 'mdl_news_tags', 'admin', 'active'),
(121, 'trang-chu', 'Trang chủ', 'mdl_home', 'public', 'active'),
(122, 'product_category', 'Danh mục sản phẩm', 'mdl_product_category', 'admin', 'active'),
(123, 'product', 'Quản lý sản phẩm', 'mdl_product', 'admin', 'active'),
(124, 'san-pham', 'Sản phẩm', 'mdl_product', 'public', 'active'),
(125, 'chi-tiet', 'Chi tiết', 'mdl_detail', 'public', 'active'),
(126, 'product_group', 'Nhóm sản phẩm', 'mdl_product_group', 'admin', 'active'),
(127, 'product_type', 'Phân loại sản phẩm', 'mdl_product_type', 'admin', 'active'),
(128, 'blog', 'Blog', 'mdl_news', 'public', 'active'),
(129, 'lien-he', 'Liên hệ', 'mdl_contact', 'public', 'active'),
(130, 'cart', 'Quản lý đơn hàng', 'mdl_cart', 'admin', 'active'),
(131, 'gio-hang', 'Giỏ hàng', 'mdl_cart', 'public', 'active'),
(132, 'contact', 'Quản lý liên hệ - Newsletter', 'mdl_contact', 'admin', 'active'),
(200, 'yeu-thich', 'yêu thích', 'mdl_wishlist', 'public', 'active'),
(201, 'giao-hang', 'giao hàng', 'mdl_check_out', 'public', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `e4_options`
--

CREATE TABLE IF NOT EXISTS `e4_options` (
  `id` bigint(20) unsigned NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_options`
--

INSERT INTO `e4_options` (`id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'comments_notify', '1', 'yes'),
(2, 'mailserver_url', 'smtp.gmail.com', 'yes'),
(3, 'mailserver_login', 'nhaphangtaobao.contact@gmail.com', 'yes'),
(4, 'mailserver_pass', 'Nguyenhuuthang@123', 'yes'),
(5, 'mailserver_port', '465', 'yes'),
(6, 'default_comment_status', 'open', 'yes'),
(7, 'posts_per_page', '12', 'yes'),
(8, 'image_max_size', '3', 'yes'),
(9, 'name_vi', 'Buno Shop', 'yes'),
(10, 'name_en', 'Buno Shop', 'yes'),
(11, 'slogan_vi', 'Thay đổi để trưởng thành', 'yes'),
(12, 'slogan_en', 'Nothing is impossible', 'yes'),
(13, 'address_vi', 'Nơi tương lai tươi đẹp', 'yes'),
(14, 'address_en', 'Silicon Valley', 'yes'),
(15, 'brief_vi', 'Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore edolore magna aliquapendisse ultrices gravida.', 'yes'),
(16, 'brief_en', 'Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore edolore magna aliquapendisse ultrices gravida.', 'yes'),
(17, 'meta_title_vi', 'Buno Shop', 'yes'),
(18, 'meta_title_en', 'Buno Shop', 'yes'),
(19, 'meta_keyword_vi', '', 'yes'),
(20, 'meta_keyword_en', '', 'yes'),
(21, 'meta_description_vi', '', 'yes'),
(22, 'meta_description_en', '', 'yes'),
(23, 'phone', '0982269600-2', 'yes'),
(24, 'hotline', '098 226 9600', 'yes'),
(25, 'admin_email', 'huuthangb2k50@gmail.com', 'yes'),
(2078, 'fax', '1122 6699', 'yes'),
(2079, 'max_file_size', '', 'yes'),
(2080, 'facebook', 'Facebook', 'yes'),
(2081, 'twitter', 'Twitter', 'yes'),
(2084, 'youtube', 'Youtube', 'yes'),
(2085, 'instagram', 'Instagram', 'yes'),
(2086, 'product_per_page', '9', 'yes'),
(2087, 'admin_per_page', '20', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `e4_posts`
--

CREATE TABLE IF NOT EXISTS `e4_posts` (
`id` bigint(20) unsigned NOT NULL,
  `title_vi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief_vi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_vi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `url_part` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  `post_created` bigint(20) NOT NULL,
  `user_created` bigint(20) unsigned NOT NULL,
  `post_modified` bigint(20) NOT NULL,
  `user_modified` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visited_count` bigint(20) NOT NULL DEFAULT '0',
  `product_price` int(10) NOT NULL DEFAULT '0',
  `product_sale` int(10) NOT NULL DEFAULT '0',
  `rating` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_posts`
--

INSERT INTO `e4_posts` (`id`, `title_vi`, `title_en`, `brief_vi`, `brief_en`, `content_vi`, `content_en`, `post_type`, `post_status`, `comment_status`, `url_part`, `comment_count`, `post_created`, `user_created`, `post_modified`, `user_modified`, `image`, `image_thumb`, `visited_count`, `product_price`, `product_sale`, `rating`) VALUES
(2, 'Agela Phương Trinh ăn chơi nè', '', 'Agela Phương Trinh ăn chơi nè Agela Phương Trinh ăn chơi nè', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', 'post', 'active', 'close', 'agela-phuong-trinh-an-choi-ne', 0, 1596017147, 1, 1596809155, 1, 'http://localhost/steam/templates/buno/img/discount.jpg', '', 0, 0, 0, 3),
(3, 'Agela Phương Trinhgg', '', 'Agela Phương TrinhggAgela Phương TrinhggAgela Phương TrinhggAgela Phương Trinhgg\r\n', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', 'post', 'active', 'close', 'agela-phuong-trinhgg', 0, 1596017204, 1, 1596809135, 1, 'http://localhost/steam/templates/buno/img/discount.jpg', '', 0, 0, 0, 2),
(4, 'Tin giáo dục ứng dụng', '', 'Buttons tweed blazer Buttons tweed blazer Buttons tweed blazer\r\n', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<div class="blog__details__desc">\r\n<p>Afashion season can be defined as much by the people on the catwalk as it can by the clothes they are wearing. This time around, a key moment came at the end of Marc Jacobs’ New York show, when an almost makeup-free Christy Turlington made a rare return to the catwalk, aged 50 (she also stars, with the designer himself, in the label’s AW ad campaign), where the average catwalk model is around 18.</p>\r\n\r\n<p>A few days later, Simone Rocha arguably upped the ante. The 32-year-old’s show – in part inspired by Louise Bourgeois, who lived until she was 98 – featured models in their 30s and 40s, including cult favourite Jeny Howorth and actor Chloë Sevigny.</p>\r\n</div>\r\n</body>\r\n</html>\r\n', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', 'post', 'active', 'close', 'tin-giao-duc-ung-dung', 0, 1596017265, 1, 1597068085, 1, 'http://localhost/steam/templates/buno/img/blog/details/blog-details.jpg', '', 0, 0, 0, 5),
(6, 'Buttons tweed blazer', '', '', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', 'product', 'active', 'open', 'buttons-tweed-blazer', 0, 1596774514, 1, 1596826222, 1, 'http://localhost/steam/templates/buno/img/product/product-1.jpg', '', 0, 0, 0, 4),
(7, 'Flowy striped skirt', '', '', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', 'product', 'active', 'open', 'flowy-striped-skirt', 0, 1596774560, 1, 1596826216, 1, 'http://localhost/steam/templates/buno/img/product/product-2.jpg', '', 0, 0, 0, 5),
(8, 'Cotton T-Shirt', '', '', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', 'product', 'active', 'open', 'cotton-t-shirt', 0, 1596774577, 1, 1597045225, 1, 'http://localhost/steam/templates/buno/img/product/product-3.jpg', '', 0, 200000, 150000, 1),
(9, 'Slim striped pocket shirt', '', '', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', 'product', 'active', 'open', 'slim-striped-pocket-shirt', 0, 1596774609, 1, 1596829791, 1, 'http://localhost/steam/templates/buno/img/product/product-4.jpg', '', 0, 0, 65000, 5),
(10, 'Fit micro corduroy shirt', '', '', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', 'product', 'active', 'open', 'fit-micro-corduroy-shirt', 0, 1596774628, 1, 1596825638, 1, 'http://localhost/steam/templates/buno/img/product/product-5.jpg', '', 0, 0, 0, 0),
(11, 'Tropical Kimono', '', '', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', 'product', 'active', 'open', 'tropical-kimono', 0, 1596774646, 1, 1597041997, 1, 'http://localhost/steam/templates/buno/img/product/product-6.jpg', '', 0, 0, 65000, 0),
(12, 'Contrasting sunglasses', 'Contrasting sunglasses', 'Nemo enim ipsam voluptatem quia aspernatur aut odit aut loret fugit, sed quia consequuntur magni lores eos qui ratione voluptatem sequi nesciunt.', 'Nemo enim ipsam voluptatem quia aspernatur aut odit aut loret fugit, sed quia consequuntur magni lores eos qui ratione voluptatem sequi nesciunt.', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret. Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla consequat massa quis enim.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>\r\n</body>\r\n</html>\r\n', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret. Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla consequat massa quis enim.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>\r\n</body>\r\n</html>\r\n', 'product', 'active', 'open', 'contrasting-sunglasses', 0, 1596774662, 1, 1597109410, 1, 'http://localhost/steam/templates/buno/img/product/product-7.jpg', '', 0, 150000, 125000, 5),
(13, 'Water resistant backpack', '', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret. Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla consequat massa quis enim.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>\r\n</body>\r\n</html>\r\n', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret. Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla consequat massa quis enim.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>\r\n</body>\r\n</html>\r\n', 'product', 'active', 'open', 'water-resistant-backpack', 0, 1596774675, 1, 1597114330, 1, 'http://localhost/steam/templates/buno/img/product/product-8.jpg', '', 0, 75000, 50000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `e4_posts_image`
--

CREATE TABLE IF NOT EXISTS `e4_posts_image` (
  `image_id` int(10) NOT NULL,
  `object_id` int(10) unsigned NOT NULL,
  `image_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'related',
  `image_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_posts_image`
--

INSERT INTO `e4_posts_image` (`image_id`, `object_id`, `image_type`, `image_link`, `order`) VALUES
(7, 22, 'related', 'http://localhost/steam/templates/buno/img/discount.jpg', 1),
(8, 22, 'related', 'http://localhost/steam/templates/buno/img/blog/details/blog-details.jpg', 2),
(9, 22, 'related', 'https://cafebiz.cafebizcdn.vn/zoom/380_238/162123310254002176/2020/8/10/photo1597048670035-15970486702101409803684.jpg', 3),
(13, 13, 'related', 'http://localhost/steam/templates/buno/img/discount.jpg', 1),
(14, 13, 'related', 'http://localhost/steam/templates/buno/img/blog/details/blog-details.jpg', 2),
(15, 13, 'related', 'http://localhost/steam/templates/buno/img/logo.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `e4_posts_meta`
--

CREATE TABLE IF NOT EXISTS `e4_posts_meta` (
  `meta_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_posts_meta`
--

INSERT INTO `e4_posts_meta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(10, 4, 'meta_title_vi', 'Meta Title Tiếng Việt Men fashio'),
(11, 4, 'meta_title_en', 'Meta Title Tiếng Anh:'),
(12, 4, 'meta_keyword_vi', 'Meta Keyword Tiếng Việt:');

-- --------------------------------------------------------

--
-- Table structure for table `e4_roles`
--

CREATE TABLE IF NOT EXISTS `e4_roles` (
  `id` int(5) NOT NULL,
  `role_code` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role_desc` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL,
  `menu_id` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `module_name_list` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `function_code_list` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_roles`
--

INSERT INTO `e4_roles` (`id`, `role_code`, `role_desc`, `status`, `menu_id`, `module_name_list`, `function_code_list`) VALUES
(5, 'Quyền quản trị hệ thống', 'Dành cho người quản trị hệ thống', 1, '101,103,106,102,104,105,107,72,95,15,96,97,98,100,87,49,99,92,91,73,90,74,33,25,51,2,13,10,11', 'contact,cart,product_type,product_group,product,product_category,news_tags,analytics_code,news_topic,news_type,news_group,news,web_information,web_image,web_home,product,profile,web_menu,block,task,roles,module,menu_admin,news_category,user', 'contact_delete,contact_edit,contact_newsletter,contact_view,cart_delete,cart_edit,cart_view,product_type_add,product_type_delete,product_type_edit,product_type_view,product_group_add,product_group_delete,product_group_edit,product_group_view,product_add,product_delete,product_edit,product_view,product_category_add,product_category_delete,product_category_edit,product_category_view,news_tags_add,news_tags_delete,news_tags_edit,news_tags_view,analytics_code_add,analytics_code_delete,analytics_code_edit,analytics_code_view,news_topic_add,news_topic_delete,news_topic_edit,news_topic_view,news_type_add,news_type_delete,news_type_edit,news_type_view,news_group_add,news_group_delete,news_group_edit,news_group_view,news_add,news_delete,news_edit,news_view,web_branches_add,web_branches_delete,web_branches_edit,web_information_edit,web_image_add,web_image_delete,web_image_edit,web_image_view,web_home_add,web_home_delete,web_home_edit,web_home_view,product_add,product_category_add,product_category_delete,product_category_edit,product_category_view,product_delete,product_edit,product_view,profile_change_pass,profile_edit,web_menu_add,web_menu_delete,web_menu_edit,web_menu_view,block_add,block_delete,block_edit,block_view,task_add,task_delete,task_edit,task_view,roles_add,roles_delete,roles_edit,roles_menu_access,roles_module_action,roles_view,module_add,module_delete,module_edit,module_view,menu_admin_add,menu_admin_delete,menu_admin_edit,menu_admin_view,news_category_add,news_category_delete,news_category_edit,news_category_view,user_add,user_delete,user_edit,user_publish,user_unpublish,user_view'),
(9, 'Quyền quản trị nội dung', 'Dành cho nhân viên quản trị nội dung', 1, '87,74', 'lien-he,dich-vu,recruitments,projects,product,profile,news', 'recruitments_add,recruitments_category_add,recruitments_category_delete,recruitments_category_edit,recruitments_category_view,recruitments_delete,recruitments_edit,recruitments_view,projects_add,projects_category_add,projects_category_delete,projects_category_edit,projects_category_view,projects_delete,projects_edit,projects_view,product_add,product_category_add,product_category_delete,product_category_edit,product_category_view,product_delete,product_edit,product_view,profile_change_pass,profile_edit,news_add,news_category_add,news_category_delete,news_category_edit,news_category_view,news_delete,news_edit,news_view');

-- --------------------------------------------------------

--
-- Table structure for table `e4_term_meta`
--

CREATE TABLE IF NOT EXISTS `e4_term_meta` (
  `meta_id` bigint(20) unsigned NOT NULL,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_term_meta`
--

INSERT INTO `e4_term_meta` (`meta_id`, `term_id`, `meta_key`, `meta_value`) VALUES
(1, 14, 'meta_title_vi', 'Meta Title Tiếng Việt Men fashio');

-- --------------------------------------------------------

--
-- Table structure for table `e4_term_relationships`
--

CREATE TABLE IF NOT EXISTS `e4_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  `object_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_term_relationships`
--

INSERT INTO `e4_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`, `object_type`) VALUES
(2, 3, 0, 'post'),
(2, 5, 0, 'post'),
(2, 7, 0, 'post'),
(2, 10, 0, 'post'),
(2, 11, 0, 'post'),
(2, 12, 0, 'post'),
(3, 3, 0, 'post'),
(3, 4, 0, 'post'),
(3, 5, 0, 'post'),
(3, 7, 0, 'post'),
(3, 9, 0, 'post'),
(3, 11, 0, 'post'),
(4, 2, 0, 'post'),
(4, 3, 0, 'post'),
(4, 11, 0, 'post'),
(4, 12, 0, 'post'),
(6, 13, 0, 'product'),
(6, 18, 0, 'product'),
(7, 14, 0, 'product'),
(7, 18, 0, 'product'),
(8, 13, 0, 'product'),
(8, 18, 0, 'product'),
(8, 32, 0, 'product'),
(9, 17, 0, 'product'),
(9, 18, 0, 'product'),
(10, 16, 0, 'product'),
(10, 19, 0, 'product'),
(10, 21, 0, 'product'),
(11, 14, 0, 'product'),
(11, 15, 0, 'product'),
(11, 18, 0, 'product'),
(11, 19, 0, 'product'),
(11, 20, 0, 'product'),
(11, 24, 0, 'product'),
(11, 25, 0, 'product'),
(12, 14, 0, 'product'),
(12, 20, 0, 'product'),
(12, 21, 0, 'product'),
(12, 22, 0, 'product'),
(12, 23, 0, 'product'),
(12, 24, 0, 'product'),
(12, 25, 0, 'product'),
(12, 26, 0, 'product'),
(12, 28, 0, 'product'),
(12, 29, 0, 'product'),
(13, 13, 0, 'product'),
(13, 16, 0, 'product'),
(13, 18, 0, 'product'),
(13, 19, 0, 'product'),
(13, 22, 0, 'product'),
(13, 23, 0, 'product'),
(13, 24, 0, 'product'),
(13, 25, 0, 'product'),
(13, 28, 0, 'product'),
(13, 29, 0, 'product');

-- --------------------------------------------------------

--
-- Table structure for table `e4_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `e4_term_taxonomy` (
  `id` bigint(20) unsigned NOT NULL,
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `parent` bigint(20) NOT NULL DEFAULT '0',
  `title_vi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief_vi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_part` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` bigint(20) NOT NULL DEFAULT '0',
  `order` int(5) NOT NULL DEFAULT '0',
  `position` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_term_taxonomy`
--

INSERT INTO `e4_term_taxonomy` (`id`, `taxonomy`, `parent`, `title_vi`, `title_en`, `brief_vi`, `brief_en`, `image`, `url_part`, `count`, `order`, `position`, `status`) VALUES
(1, 'category', 0, 'Tin giáo dục thời sự', 'Mystery Shopping', 'Giới thiệu Tiếng Việt', 'About education', NULL, 'tin-giao-duc-thoi-su', 1, 0, 'right', 'active'),
(2, 'category', 1, 'Tin giáo dục ứng dụng', 'Our Clients', ' Giới ', ' Anh', NULL, 'tin-giao-duc-ung-dung', 1, 0, 'right', 'active'),
(3, 'category', 0, 'Tin tức', 'news', '    ', '    ', NULL, 'tin-tuc', 3, 0, 'right', 'active'),
(4, 'group', 0, 'Tin nóng', 'Hot news', ' tin nóng', ' Hot news', NULL, 'tin-nong', 2, 0, 'header', 'active'),
(5, 'group', 0, 'Bài đọc nhiều', 'Views', ' ', ' ', NULL, 'bai-doc-nhieu', 3, 0, '', 'active'),
(7, 'type', 0, 'Bài chuyên gia', 'Professor', '  ', '  ', NULL, 'bai-chuyen-gia', 3, 0, 'home', 'active'),
(8, 'type', 0, 'Bài sản xuất', 'Productions', '', '', NULL, 'bai-san-xuat', 1, 0, '', 'active'),
(9, 'topic', 0, 'Thời sự 24h', 'Daily news', ' ', ' ', NULL, 'thoi-su-24h', 2, 0, 'footer', 'active'),
(10, 'topic', 0, 'Tin tức bốn phương', 'News', '', '', NULL, 'tin-tuc-bon-phuong', 2, 0, '', 'active'),
(11, 'post_tags', 0, 'Agela Phương Trinh', 'Phuong Trinh', '', '', NULL, 'agela-phuong-trinh', 3, 0, '', 'active'),
(12, 'post_tags', 0, 'Ngọc Trinh', 'Ngoc Trinh', '', '', NULL, 'ngoc-trinh', 2, 0, '', 'active'),
(13, 'product_category', 0, 'Thời trang nữ', 'Women’s fashion', '     Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore edolore magna aliquapendisse ultrices gravida.', '  Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore edolore magna aliquapendisse ultrices gravida.   ', 'http://localhost/steam/templates/buno/img/categories/category-1.jpg', 'thoi-trang-phu-nu', 4, 1, 'home', 'active'),
(14, 'product_category', 0, 'Thời trang nam', 'Men’s fashion', '    ', '    ', 'http://localhost/steam/templates/buno/img/categories/category-2.jpg', 'thoi-trang-cho-nam', 3, 2, 'home', 'active'),
(15, 'product_category', 0, 'Trẻ em', 'Kid’s fashion', ' ', ' ', 'http://localhost/steam/templates/buno/img/categories/category-3.jpg', 'thoi-trang-cho-tre-em', 1, 3, 'home', 'active'),
(16, 'product_category', 0, 'Mỹ phẩm', 'Cosmetics', '', '', 'http://localhost/steam/templates/buno/img/categories/category-4.jpg', 'my-pham', 2, 4, 'home', 'active'),
(17, 'product_category', 0, 'Phụ kiện', 'Accessories', '', '', 'http://localhost/steam/templates/buno/img/categories/category-5.jpg', 'phu-kien', 1, 5, 'home', 'active'),
(18, 'product_group', 0, 'Sản phẩm nổi bật', 'Featured Products', '', '', NULL, 'san-pham-noi-bat', 6, 1, 'home', 'active'),
(19, 'product_group', 0, 'Sản phẩm bán chạy', 'Best seller', '', '', NULL, 'san-pham-ban-chay', 3, 3, 'home', 'active'),
(20, 'product_group', 0, 'Sản phẩm mới', 'New Products', '', '', NULL, 'san-pham-moi', 2, 4, 'home', 'active'),
(21, 'product_group', 0, 'Hot trend', 'Hot trend', '', '', NULL, 'hot-trend', 2, 2, 'home', 'active'),
(22, 'product_type', 0, 'Kích cỡ', 'Size', '', '', NULL, 'kich-co', 2, 0, '', 'active'),
(23, 'product_type', 0, 'Màu sắc', 'Color', '', '', NULL, 'mau-sac', 2, 0, '', 'active'),
(24, 'product_type', 22, 'XXL', 'XXL', '', '', NULL, 'xxl', 3, 0, '', 'active'),
(25, 'product_type', 22, 'XL', 'XL', '', '', NULL, 'xl', 3, 0, '', 'active'),
(26, 'product_type', 22, 'L', 'L', '', '', NULL, 'l', 1, 0, '', 'active'),
(27, 'product_type', 22, 'M', 'M', '', '', NULL, 'm', 0, 0, '', 'active'),
(28, 'product_type', 23, 'Đen', 'Black', '', '', NULL, 'den', 2, 0, '', 'active'),
(29, 'product_type', 23, 'Trắng', 'White', '', '', NULL, 'trang', 2, 0, '', 'active'),
(30, 'product_type', 23, 'Xanh lá', 'Green', '', '', NULL, 'xanh-la', 0, 0, '', 'active'),
(31, 'product_type', 23, 'Vàng', 'Yellow', '', '', NULL, 'vang', 0, 0, '', 'active'),
(32, 'product_category', 14, 'Coats', 'Coats', '', '', '', 'coats', 1, 0, '', 'active'),
(33, 'product_category', 14, 'Jackets', 'Jackets', '', '', '', 'jackets', 0, 0, '', 'active'),
(0, 'product_category', 0, 'Tài khoản', 'My Account', '', '', '', 'account', 0, 0, '', 'active'),
(0, 'product_category', 0, 'Tài khoản', 'My Account', '', '', '', 'account', 0, 0, '', 'active'),
(0, 'product_category', 0, 'Tài khoản', 'My Account', '', '', '', 'account', 0, 0, '', 'active'),
(0, 'product_category', 0, 'Tài khoản', 'My Account', '', '', '', 'account', 0, 0, '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `e4_users`
--

CREATE TABLE IF NOT EXISTS `e4_users` (
`id` int(11) NOT NULL,
  `user_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'admin hoac public',
  `fullname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(36) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `permission` int(5) NOT NULL,
  `publish` int(1) NOT NULL,
  `random` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `homephone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobifone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `yahoo` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_created` int(20) NOT NULL,
  `user_created` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_updated` int(20) NOT NULL,
  `user_updated` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status_public` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_users`
--

INSERT INTO `e4_users` (`id`, `user_type`, `fullname`, `password`, `email`, `permission`, `publish`, `random`, `address`, `homephone`, `mobifone`, `image_url`, `facebook`, `yahoo`, `skype`, `date_created`, `user_created`, `date_updated`, `user_updated`, `status_public`) VALUES
(1, 'admin', 'Administrator', '3de6a8f9608ddd4ba89f97b36d7587d6', 'admin@gmail.com', 5, 1, 'b6356128c7df86c0b1024590ad12c482adafa', 'Số 29/394 Mỹ Đình, Nam Từ Liêm, Hà Nội', '0433 839 932', '098 226 9600', '', 'nguyenhuuthang.1987', 'huuthangb2k50@yahoo.com', 'huuthangb2k50', 1512438986, '', 1594715708, 'admin@gmail.com', ''),
(2, 'admin', 'Nguyễn Thắng', '', 'huuthangb2k50@gmail.com', 9, 1, '', '', '0433 839 932', '098 226 9600', '', '', '', '', 1594625935, 'admin@gmail.com', 1595236785, 'admin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `e4_users_meta`
--

CREATE TABLE IF NOT EXISTS `e4_users_meta` (
  `meta_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e4_web_home`
--

CREATE TABLE IF NOT EXISTS `e4_web_home` (
  `id` int(11) NOT NULL,
  `parent` int(5) NOT NULL,
  `title_vi` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `brief_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `brief_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_download` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order` int(5) NOT NULL,
  `date_created` int(20) NOT NULL,
  `user_created` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_updated` int(20) NOT NULL,
  `user_updated` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Lưu thông tin về cấu hình các box trên trang chủ';

--
-- Dumping data for table `e4_web_home`
--

INSERT INTO `e4_web_home` (`id`, `parent`, `title_vi`, `title_en`, `brief_vi`, `brief_en`, `content_vi`, `content_en`, `image`, `file_download`, `icon`, `link`, `link_name`, `status`, `order`, `date_created`, `user_created`, `date_updated`, `user_updated`) VALUES
(34, 0, 'Banner quảng cáo', 'Banner quảng cáo', '', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n&nbsp;\r\n\r\n', 'http://localhost/steam/templates/buno/img/banner/banner-1.jpg', '', '', '', '', 'active', 1, 1575276668, 'admin@gmail.com', 1596784055, 'admin@gmail.com'),
(50, 0, 'Summer 2019', 'Summer 2019', 'Discount', 'Discount', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body><span>Sale</span> 50%</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n<span>Sale</span> 50%\r\n\r\n', 'http://localhost/steam/templates/buno/img/discount.jpg', '', '', '#', 'Shop now', 'active', 2, 1576676722, 'admin@gmail.com', 1596856290, 'admin@gmail.com'),
(53, 0, 'Thanh toán', 'Payment', '', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n&nbsp;\r\n\r\n', '', '', '', '', '', 'active', 3, 1576676813, 'admin@gmail.com', 1596784641, 'admin@gmail.com'),
(60, 50, '46', '46', 'min', 'phút', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n&nbsp;\r\n\r\n', '', '', '', '', '', 'active', 4, 1592462805, 'admin@gmail.com', 1596784407, 'admin@gmail.com'),
(61, 50, '09', '09', 'hours', 'giờ', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n&nbsp;\r\n\r\n', '', '', '', '', '', 'active', 3, 1592462831, 'admin@gmail.com', 1596784384, 'admin@gmail.com'),
(62, 50, '30', '30', 'days', 'ngày', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n&nbsp;\r\n\r\n', '', '', '', '', '', 'active', 2, 1592462842, 'admin@gmail.com', 1596784363, 'admin@gmail.com'),
(63, 50, '25', '25', 'sec', 'giây', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n&nbsp;\r\n\r\n', '', '', '', '', '', 'active', 1, 1592463390, 'admin@gmail.com', 1596784433, 'admin@gmail.com'),
(66, 53, 'Miễn phí vận chuyển', 'Free Shipping', 'For all oder over $99', 'For all oder over $99', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n&nbsp;\r\n\r\n', '', '', 'fa fa-car', '', '', 'active', 1, 1592463752, 'admin@gmail.com', 1596856438, 'admin@gmail.com'),
(67, 53, 'Chính sách bảo hiểm', 'Money Back Guarantee', 'If good have Problems', 'If good have Problems', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n&nbsp;\r\n\r\n', '', '', 'fa fa-money', '', '', 'active', 2, 1592463795, 'admin@gmail.com', 1596856474, 'admin@gmail.com'),
(68, 53, 'Bảo mật thanh toán', 'Payment Secure', '100% secure payment', '100% secure payment', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n&nbsp;\r\n\r\n', '', '', 'fa fa-headphones', '', '', 'active', 4, 1592463828, 'admin@gmail.com', 1596856493, 'admin@gmail.com'),
(69, 53, 'Hỗ trợ online 24/7', 'Online Support 24/7', 'Dedicated support', 'Dedicated support', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n&nbsp;\r\n\r\n', '', '', 'fa fa-support', '', '', 'active', 3, 1592463857, 'admin@gmail.com', 1596856485, 'admin@gmail.com'),
(82, 34, 'The Project Jacket 1', 'The Project Jacket 1', 'The Chloe Collection 1', 'The Chloe Collection 1', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n&nbsp;\r\n\r\n', '', '', '', '', '', 'active', 1, 1592476536, 'admin@gmail.com', 1596783337, '1'),
(84, 34, 'The Project Jacket 12', 'The Project Jacket 12', 'The Chloe Collection 2', 'The Chloe Collection 2', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>&nbsp;</body>\r\n</html>\r\n', '\r\n\r\n	\r\n\r\n&nbsp;\r\n\r\n', '', '', '', '', '', 'active', 2, 1592476562, 'admin@gmail.com', 1596784091, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `e4_web_image`
--

CREATE TABLE IF NOT EXISTS `e4_web_image` (
  `id` int(5) NOT NULL,
  `title_vi` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `region` int(2) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_created` int(20) NOT NULL,
  `user_created` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_updated` int(20) NOT NULL,
  `user_updated` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_web_image`
--

INSERT INTO `e4_web_image` (`id`, `title_vi`, `title_en`, `image`, `link`, `position`, `region`, `status`, `date_created`, `user_created`, `date_updated`, `user_updated`) VALUES
(2, 'Logo', 'Logo', 'http://localhost/steam/templates/buno/img/logo.png', '', 'logo', 0, 'active', 1487872000, 'admin@gmail.com', 1596790342, 'admin@gmail.com'),
(3, 'Ảnh icon cho trình duyệt', 'Ảnh icon cho trình duyệt', 'https://demo.auburnforest.com/wordpress/pivotal/wp-content/uploads/2020/02/fav-1.png', '', 'icon', 1, 'active', 1487872053, 'admin@gmail.com', 1592465484, 'admin@gmail.com'),
(11, 'Ảnh quảng cáo', 'Image Adv', 'http://localhost/steam/templates/buno/img/banner/banner-1.jpg', '', 'banner', 0, 'active', 1594719612, 'admin@gmail.com', 1596775247, 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `e4_web_menu`
--

CREATE TABLE IF NOT EXISTS `e4_web_menu` (
`id` int(5) NOT NULL,
  `title_vi` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order` int(5) NOT NULL,
  `parent` int(11) NOT NULL,
  `url_html` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_created` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_created` int(20) NOT NULL,
  `user_updated` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_updated` int(20) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0: post;'
) ENGINE=InnoDB AUTO_INCREMENT=1340 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `e4_web_menu`
--

INSERT INTO `e4_web_menu` (`id`, `title_vi`, `title_en`, `order`, `parent`, `url_html`, `status`, `user_created`, `date_created`, `user_updated`, `date_updated`, `type`) VALUES
(2, 'Trang chủ', 'Home', 1, 0, 'trang-chu.html', 'active', '', 0, 'admin@gmail.com', 1594731898, 0),
(4, 'Thời trang phụ nữ', 'Women’s fashion', 3, 0, 'san-pham/thoi-trang-phu-nu.html', 'active', '', 0, 'admin@gmail.com', 1596860872, 1),
(8, 'Liên hệ', 'Contacts', 5, 0, 'lien-he.html', 'active', '', 0, 'admin@gmail.com', 1594032683, 0),
(43, 'Blog', 'Blog', 4, 0, 'blog.html', 'active', 'admin@gmail.com', 1592465875, 'admin@gmail.com', 1597048051, 0),
(47, 'Thời trang cho nam', 'Men’s fashion', 2, 0, 'san-pham/thoi-trang-cho-nam.html', 'active', 'admin@gmail.com', 1594648747, 'admin@gmail.com', 1596860864, 1),
(48, 'Nghiên cứu thị trường', 'Market research', 2, 4, '#', 'active', 'admin@gmail.com', 1594648799, 'admin@gmail.com', 1596805369, 1),
(49, 'Báo cáo và tin tức', 'Report and News Provider', 3, 4, '#', 'active', 'admin@gmail.com', 1594648849, 'admin@gmail.com', 1596805374, 1),
(1339, 'tài khoản', 'My Account', 6, 0, 'account.html', 'active', '1', 0, 'admin@gmail.com', 1594731898, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `e4_analytics_code`
--
ALTER TABLE `e4_analytics_code`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e4_blocks`
--
ALTER TABLE `e4_blocks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e4_contacts`
--
ALTER TABLE `e4_contacts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e4_functions`
--
ALTER TABLE `e4_functions`
 ADD PRIMARY KEY (`id`), ADD KEY `Module Id` (`module_id`);

--
-- Indexes for table `e4_leftmenu`
--
ALTER TABLE `e4_leftmenu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e4_modules`
--
ALTER TABLE `e4_modules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e4_options`
--
ALTER TABLE `e4_options`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `e4_posts`
--
ALTER TABLE `e4_posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e4_users`
--
ALTER TABLE `e4_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e4_web_menu`
--
ALTER TABLE `e4_web_menu`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `e4_blocks`
--
ALTER TABLE `e4_blocks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `e4_posts`
--
ALTER TABLE `e4_posts`
MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `e4_users`
--
ALTER TABLE `e4_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `e4_web_menu`
--
ALTER TABLE `e4_web_menu`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1340;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
