-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2021 at 10:26 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2020_11_15_100218_add_level_status_to_users_table', 1),
(22, '2020_11_16_140119_create_tbl_category', 1),
(23, '2020_11_25_145241_create_brand_table', 1),
(27, '2020_11_29_031600_create_product_table', 2),
(28, '2014_10_12_000000_create_users_table', 3),
(33, '2021_01_27_152333_create_table_orders', 4),
(34, '2021_01_27_152422_create_table_orders_details', 4),
(44, '2020_10_25_150855_create_table_admin', 6),
(45, '2021_02_25_143703_create_news_table', 7),
(46, '2021_02_25_150506_create_news_comments_table', 7),
(47, '2021_02_25_152430_create_tags_table', 7),
(48, '2021_02_25_152550_create_news_tags_table', 7),
(49, '2021_03_10_221036_create_table_admin_news', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`, `name`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$5lEXhrStQydey5bEY0Fcye/SeIuYjDbqg/0KWtUDdF5W975rTsjlW', 'Admin', '0977457889', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_news`
--

CREATE TABLE `tbl_admin_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Samsung', '<p>Samsung Electronics</p>', 1, NULL, '2020-12-16 06:49:22', NULL),
(2, 'Nokia', '<p>Nokia</p>', 1, NULL, NULL, NULL),
(3, 'VinSmart', '<p>VinSmart</p>', 1, NULL, NULL, NULL),
(4, 'Asus', '<p>Asus</p>', 1, NULL, '2020-12-16 06:33:07', NULL),
(5, 'Huawei', '<p>Huawei</p>', 1, NULL, '2020-12-16 06:32:42', NULL),
(6, 'Lenovo', '<p>Lenovo l&agrave; một thương hiệu của TQ</p>', 1, NULL, '2021-03-08 14:16:48', NULL),
(7, 'Apple', '<p>Apple</p>', 0, NULL, '2020-12-16 06:51:48', NULL),
(8, 'Oppo', '<p>Oppo</p>', 1, NULL, '2020-12-16 06:33:28', NULL),
(9, 'Xiaomi', '<p>Xiaomi</p>', 1, NULL, '2020-12-16 06:39:02', NULL),
(10, 'BlackBerry', '<p>BlackBerry Limited l&agrave; một tập đo&agrave;n điện tử của Canada chuy&ecirc;n sản xuất, bu&ocirc;n b&aacute;n c&aacute;c thiết bị di động v&agrave; giải ph&aacute;p di động như mẫu điện thoại ăn kh&aacute;ch BlackBerry.</p>', 0, '2021-02-28 01:41:45', '2021-02-28 01:41:55', NULL),
(11, 'Netflix', '<p>Netflix</p>', 1, '2021-03-08 14:05:48', '2021-03-08 14:05:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_desc`, `cat_status`, `created_at`, `updated_at`) VALUES
(1, 'Pin củ sạc dự phòng', '<p>Pin củ sạc dự ph&ograve;ng</p>', 1, NULL, '2020-12-16 07:46:57'),
(2, 'Sạc cáp', '<p>Sạc c&aacute;p</p>', 1, NULL, '2020-12-16 06:30:11'),
(3, 'Tai nghe', '<p>Tai nghe</p>', 1, NULL, '2020-12-16 06:30:37'),
(4, 'Loa', '<p>Loa</p>', 1, NULL, '2020-12-16 06:30:44'),
(5, 'Thẻ nhớ', '<p>Thẻ nhớ</p>', 1, NULL, '2020-12-16 06:32:11'),
(6, 'Chuột bàn phím', '<p>Chuột b&agrave;n ph&iacute;m</p>', 1, NULL, '2020-12-16 07:46:54'),
(7, 'Ốp lưng miếng dán', '<p>Ốp lưng miếng d&aacute;n</p>', 1, NULL, '2020-12-16 06:31:47'),
(10, 'Ba lô túi chống sốc', '<p>Ba l&ocirc; t&uacute;i chống sốc</p>', 1, '2020-12-10 06:55:40', '2020-12-16 07:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `count_views` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `title`, `images`, `content`, `status`, `count_views`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bạn trai Britney Spears muốn có con', 'britney62.jpg', '<p>Huấn luyện vi&ecirc;n thể h&igrave;nh Sam Asghari - bạn trai Britney Spears - bức x&uacute;c v&igrave; bố c&ocirc; lu&ocirc;n kiểm so&aacute;t mối quan hệ của hai người.</p>\r\n\r\n<p>H&ocirc;m 9/2, Sam Asghari viết tr&ecirc;n Instagram: &quot;Thời điểm n&agrave;y, quan trọng l&agrave; mọi người cần hiểu, t&ocirc;i kh&ocirc;ng c&oacute; ch&uacute;t t&ocirc;n trọng n&agrave;o với kẻ li&ecirc;n tục kiểm so&aacute;t, ngăn cản mối quan hệ của ch&uacute;ng t&ocirc;i. Jamie l&agrave; một l&atilde;o khốn. T&ocirc;i kh&ocirc;ng thể kể chi tiết v&igrave; đ&oacute; l&agrave; chuyện ri&ecirc;ng tư&quot;.</p>\r\n\r\n<p>Sam Asghari l&ecirc;n tiếng giữa bối cảnh dư luận đang x&ocirc;n xao về phim t&agrave;i liệu <em>Framing Britney Spears. </em>Trước đ&oacute;, h&ocirc;m 8/2, anh trả lời tr&ecirc;n <em>People</em>: <em>&quot;</em>T&ocirc;i lu&ocirc;n mong những điều tốt đẹp nhất đến với nửa kia của m&igrave;nh. T&ocirc;i sẽ tiếp tục ủng hộ c&ocirc; ấy theo đuổi ước mơ v&agrave; x&acirc;y dựng tương lai c&ocirc; ấy mong muốn v&agrave; xứng đ&aacute;ng. T&ocirc;i rất biết ơn v&igrave; sự ủng hộ của fan tr&ecirc;n to&agrave;n thế giới d&agrave;nh cho c&ocirc; ấy. T&ocirc;i mong ch&uacute;ng t&ocirc;i c&oacute; thể x&acirc;y dựng một tương lai hạnh ph&uacute;c v&agrave; b&igrave;nh dị c&ugrave;ng nhau&quot;.</p>', 1, NULL, '2021-03-11 15:06:13', '2021-03-11 15:06:13', NULL),
(2, 'Quảng Ninh: Bệnh nhân dương tính SARS-CoV-2 sau khi hết thời gian cách ly', 'covid22.jpg', '<p>Theo th&ocirc;ng tin từ Trung t&acirc;m Kiểm so&aacute;t Bệnh tật tỉnh Quảng Ninh s&aacute;ng nay (14/3), tại thị x&atilde; Đ&ocirc;ng Triều c&oacute; ghi nhận một trường hợp c&oacute; kết quả x&eacute;t nghiệm dương t&iacute;nh với <a href=\"https://dantri.com.vn/suc-khoe/dai-dich-covid-19.htm\">SARS-CoV-2</a> sau khi hết thời gian c&aacute;ch ly tập trung tại TP Ch&iacute; Linh (Hải Dương) trở về.</p>\r\n\r\n<p>Sau khi nhận được th&ocirc;ng tin, bệnh nh&acirc;n đ&atilde; được Hải Dương đưa về c&aacute;ch ly, điều trị theo quy định.</p>\r\n\r\n<p>Cụ thể, bệnh nh&acirc;n c&oacute; địa chỉ thường tr&uacute; tại th&ocirc;n Bắc M&atilde;, x&atilde; B&igrave;nh Dương, TX Đ&ocirc;ng Triều, l&agrave; c&ocirc;ng nh&acirc;n tại C&ocirc;ng ty POYUN (TP Ch&iacute; Linh, tỉnh Hải Dương). Bệnh nh&acirc;n l&agrave; F1 của trường hợp dương t&iacute;nh cũng l&agrave;m việc tại C&ocirc;ng ty POYUN.</p>\r\n\r\n<p>Từ ng&agrave;y 29/1 đến ng&agrave;y 12/3, bệnh nh&acirc;n được c&aacute;ch ly tập trung tại Trung đo&agrave;n 125 (TP Ch&iacute; Linh, Hải Dương).</p>\r\n\r\n<p>Ng&agrave;y 29/1 đến ng&agrave;y 24/2, bệnh nh&acirc;n được lấy mẫu x&eacute;t nghiệm 8 lần, tất cả đều cho kết quả &acirc;m t&iacute;nh với SARS-CoV-2. Trong thời gian c&aacute;ch ly tập trung, c&ugrave;ng ph&ograve;ng bệnh nh&acirc;n c&oacute; ghi nhận một số ca dương t&iacute;nh do đ&oacute; thời gian c&aacute;ch ly tập trung của bệnh nh&acirc;n được k&eacute;o d&agrave;i hơn.</p>\r\n\r\n<p>Lần gần nhất ghi nhận ca dương t&iacute;nh ở c&ugrave;ng ph&ograve;ng bệnh nh&acirc;n l&agrave; ng&agrave;y 24/2 c&ugrave;ng thời điểm đ&oacute; bệnh nh&acirc;n c&oacute; kết quả x&eacute;t nghiệm &acirc;m t&iacute;nh lần 8.</p>\r\n\r\n<p><img alt=\"Quảng Ninh: Bệnh nhân dương tính SARS-CoV-2 sau khi hết thời gian cách ly - 2\" class=\"pswp-img\" src=\"https://icdn.dantri.com.vn/thumb_w/640/2021/02/16/fbimg-1613005965951-1613446436455.jpg\" title=\"Quảng Ninh: Bệnh nhân dương tính SARS-CoV-2 sau khi hết thời gian cách ly - 2\" /></p>\r\n\r\n<p>Khi trở về địa phương, bệnh nh&acirc;n đ&atilde; được theo d&otilde;i, c&aacute;ch ly tại nh&agrave; v&agrave; chuẩn bị được lấy mẫu x&eacute;t nghiệm kiểm tra lại th&igrave; được Trung t&acirc;m CDC Hải Dương c&ocirc;ng bố dương t&iacute;nh.</p>\r\n\r\n<p>Ng&agrave;y 7/3, bệnh nh&acirc;n xuất hiện sốt, ho, tức ngực, đau người, mỏi cơ, ti&ecirc;u chảy. Ng&agrave;y 10/3, bệnh nh&acirc;n được Trung t&acirc;m Kiểm so&aacute;t bệnh tật tỉnh Hải Dương lấy mẫu x&eacute;t nghiệm lần 9 khi đủ thời gian c&aacute;ch ly 14 ng&agrave;y v&agrave; cho kết quả dương t&iacute;nh với SARS-CoV-2 trong ng&agrave;y trả phiếu 12/3.</p>', 1, NULL, '2021-03-14 08:38:05', '2021-03-14 08:38:05', NULL),
(4, 'Dân văn phòng đọc ngay nếu muốn khỏi đau vai gáy', 'giai-phap-giam-dau-vai-gay83.png', '<p><strong>Những cơn đau mỏi diễn ra triền mi&ecirc;n </strong></p>\r\n\r\n<p>C&ocirc;ng việc bận rộn, l&agrave;m việc với mức độ tập trung cao, n&ecirc;n anh H&ugrave;ng gần như ngồi li&ecirc;n tục trong suốt 10 tiếng mỗi ng&agrave;y l&agrave;m việc. Th&oacute;i quen xấu n&agrave;y nhanh ch&oacute;ng khiến anh gặp vấn đề về khớp, kh&oacute; chịu nhất l&agrave; <a href=\"https://bone.vn/giai-quyet-nhe-nhang-chung-dau-co-vai-gay-khong-tai-phat\">chứng đau cổ vai g&aacute;y</a>.</p>\r\n\r\n<p>Khoảng giữa năm 2015, anh bắt đầu thấy đau mỏi cổ, cơn đau &acirc;m ỉ, triền mi&ecirc;n cả ng&agrave;y lẫn đ&ecirc;m kh&ocirc;ng dứt. Sự kh&oacute; chịu n&agrave;y ảnh hưởng kh&aacute; nhiều tới c&ocirc;ng việc, quay qua tr&aacute;i qua phải để lấy t&agrave;i liệu l&agrave; đau, l&agrave;m việc cũng kh&ocirc;ng tập trung v&agrave; chỉ ngồi được khoảng một tiếng l&agrave; mỏi mệt, bứt rứt kh&ocirc;ng chịu nổi. Khi đ&oacute;, anh tự ph&aacute;n đo&aacute;n m&igrave;nh bị đau cổ vai g&aacute;y do ngồi l&agrave;m việc l&acirc;u n&ecirc;n kh&aacute; b&igrave;nh thản, chỉ tranh thủ nghỉ ngơi trong giờ l&agrave;m, d&ugrave;ng cao d&aacute;n v&agrave; c&aacute;c loại cồn thuốc xoa b&oacute;p v&agrave;o buổi tối. Tuy nhi&ecirc;n, hai th&aacute;ng sau t&igrave;nh trạng đau cổ vai g&aacute;y vẫn kh&ocirc;ng đỡ.</p>\r\n\r\n<p>Những cơn đau tiếp tục tăng l&ecirc;n theo thời gian, lan xuống vai, nhức v&agrave; t&ecirc; mỏi cả hai c&aacute;nh tay. V&ugrave;ng g&aacute;y cũng bị cảm gi&aacute;c cứng v&agrave; mỏi hơn, thỉnh thoảng lại nh&oacute;i l&ecirc;n cơn đau như điện giật. D&ugrave; đ&atilde; xoa b&oacute;p nhiều bằng dầu n&oacute;ng, nhưng những cảm gi&aacute;c &ecirc; mỏi vẫn kh&ocirc;ng hết, đ&ecirc;m ngủ kh&ocirc;ng ngon giấc, phải trở m&igrave;nh nhiều lần, thay đổi mọi tư thế m&agrave; kh&ocirc;ng thể n&agrave;o thoải m&aacute;i được.</p>\r\n\r\n<p><img alt=\"Dân văn phòng đọc ngay nếu muốn khỏi đau vai gáy - 1\" class=\"pswp-img\" src=\"https://icdn.dantri.com.vn/thumb_w/640/2020/09/10/sua-99-giai-phap-giam-dau-vai-gay-hieu-qua-cho-dan-van-phong-1-1-docx-1599710536091.png\" title=\"Dân văn phòng đọc ngay nếu muốn khỏi đau vai gáy - 1\" /></p>\r\n\r\n<p>Th&oacute;i quen ngồi l&agrave;m việc nhiều giờ liền nhanh ch&oacute;ng khiến anh H&ugrave;ng bị đau vai g&aacute;y</p>\r\n\r\n<p><strong>Chủ quan tưởng bệnh đơn giản nhưng chữa m&atilde;i kh&ocirc;ng dứt</strong></p>\r\n\r\n<p>C&aacute;c cơn đau cổ vai g&aacute;y khiến anh H&ugrave;ng kh&ocirc;ng thể chịu được nữa n&ecirc;n đầu năm 2016, vừa ăn Tết xong anh liền đi kh&aacute;m ngay. Sau khi thăm kh&aacute;m l&acirc;m s&agrave;ng v&agrave; c&oacute; kết quả chụp X-quang, b&aacute;c sĩ kết luận anh bị đau cổ vai g&aacute;y do ngồi l&acirc;u ở một tư thế, &iacute;t vận động g&acirc;y căng cứng cơ trong thời gian d&agrave;i v&agrave;&nbsp;<a href=\"https://bone.vn/thoai-hoa-cot-song\"><strong>tho&aacute;i h&oacute;a đốt sống cổ</strong></a>. Kết quả kh&ocirc;ng c&oacute; g&igrave; bất ngờ, thế nhưng qu&aacute; tr&igrave;nh chữa bệnh kh&ocirc;ng su&ocirc;n sẻ như anh nghĩ.</p>\r\n\r\n<p>Tu&acirc;n thủ theo hướng dẫn của b&aacute;c sĩ, ngo&agrave;i việc uống thuốc được k&ecirc;, anh H&ugrave;ng chịu kh&oacute; tập c&aacute;c b&agrave;i thể dục nhẹ nh&agrave;ng cuối buổi l&agrave;m, đồng thời bổ sung th&ecirc;m c&aacute;c loại thực phẩm gi&agrave;u canxi như trứng, sữa&hellip; L&agrave; người cẩn thận, n&ecirc;n mọi nhắc nhở từ b&aacute;c sĩ, anh đều thực hiện rất tốt. Tuy nhi&ecirc;n, kết quả kh&ocirc;ng như mong đợi. Hiện tượng đau mỏi c&oacute; đỡ sau khi d&ugrave;ng thuốc, nhưng lại nhanh ch&oacute;ng t&aacute;i ph&aacute;t.</p>\r\n\r\n<p>Suốt gần một năm, anh đ&atilde; uống kh&ocirc;ng biết bao nhi&ecirc;u đợt thuốc, thay đổi nhiều loại, thậm ch&iacute; mua cả 4 &ndash; 5 loại sản phẩm được quảng c&aacute;o tr&ecirc;n truyền h&igrave;nh d&agrave;nh cho người bệnh khớp, nhưng bệnh t&igrave;nh vẫn kh&ocirc;ng hề được cải thiện m&agrave; c&ograve;n nặng hơn.</p>', 1, NULL, '2021-03-14 08:45:39', '2021-03-14 08:45:39', NULL),
(5, 'Ráo riết thăm các đồng minh, Mỹ tích cực trở lại châu Á', 'tham-dong-minh17.jpeg', '<div class=\"dt-news__sapo\">\r\n<h2>Ngoại trưởng Mỹ Antony Binken v&agrave; Bộ trưởng Quốc ph&ograve;ng Llyod Austin chuẩn bị c&oacute; chuyến c&ocirc;ng du nước ngo&agrave;i đầu ti&ecirc;n k&eacute;o d&agrave;i 4 ng&agrave;y tới hai quốc gia đồng minh Đ&ocirc;ng Bắc &Aacute; l&agrave; Nhật Bản v&agrave; H&agrave;n Quốc.</h2>\r\n</div>\r\n\r\n<div class=\"dt-news__content\">\r\n<div>\r\n<div>\r\n<div>Chuyến đi kh&ocirc;ng chỉ được xem l&agrave; nhằm củng cố quan hệ đối t&aacute;c với những đồng minh quan trọng tại khu vực sau 4 năm lạnh nhạt dưới thời cựu Tổng thống Donald Trump, m&agrave; rộng hơn l&agrave; hồi sinh ch&iacute;nh s&aacute;ch xoay trục của Mỹ sang ch&acirc;u &Aacute;- Th&aacute;i B&igrave;nh Dương, vốn được khởi động từ thời ch&iacute;nh quyền cựu Tổng thống Barack Obama.</div>\r\n\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<div><img alt=\"Ráo riết thăm các đồng minh, Mỹ tích cực trở lại châu Á - 1\" class=\"pswp-img\" src=\"https://icdn.dantri.com.vn/thumb_w/640/2021/03/14/2594-1615732724202.jpeg\" title=\"Ráo riết thăm các đồng minh, Mỹ tích cực trở lại châu Á - 1\" />\r\n<p>Ngoại trưởng Mỹ Antony Blinken. Ảnh: AP.</p>\r\n\r\n<p>Chuyến thăm diễn ra chỉ hơn 1 tuần sau khi c&aacute;c nh&agrave; đ&agrave;m ph&aacute;n Mỹ v&agrave; H&agrave;n Quốc đ&atilde; vượt qua được nhiều năm bế tắc dưới thời cựu Tổng thống Donald Trump để đi tới một thỏa thuận về chia sẻ chi ph&iacute; qu&acirc;n sự. Cũng giống như đ&atilde; l&agrave;m với c&aacute;c đồng minh ch&acirc;u &Acirc;u, cựu Tổng thống Donald Trump từng đe dọa giảm hợp t&aacute;c an ninh trừ khi c&aacute;c đồng minh tại Đ&ocirc;ng Bắc &Aacute; chấp nhận chi nhiều hơn. Ch&iacute;nh lập trường n&agrave;y đ&atilde; l&agrave;m dấy l&ecirc;n lo ngại về khả năng r&uacute;t qu&acirc;n của Mỹ v&agrave;o một thời điểm kh&ocirc;ng chắc chắn khi Trung Quốc kh&ocirc;ng ngừng t&igrave;m c&aacute;ch mở rộng ảnh hưởng v&agrave; Triều Ti&ecirc;n chưa từ bỏ tham vọng vũ kh&iacute; hạt nh&acirc;n.</p>\r\n</div>\r\n</div>', 1, NULL, '2021-03-14 15:22:44', '2021-03-14 15:22:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_comments`
--

CREATE TABLE `tbl_news_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_tags`
--

CREATE TABLE `tbl_news_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `tags_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_news_tags`
--

INSERT INTO `tbl_news_tags` (`id`, `news_id`, `tags_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-03-11 15:06:13', '2021-03-11 15:06:13'),
(2, 1, 2, '2021-03-11 15:06:13', '2021-03-11 15:06:13'),
(3, 1, 3, '2021-03-11 15:06:13', '2021-03-11 15:06:13'),
(4, 2, 1, '2021-03-14 08:38:05', '2021-03-14 08:38:05'),
(5, 2, 5, '2021-03-14 08:38:05', '2021-03-14 08:38:05'),
(9, 4, 1, '2021-03-14 08:45:39', '2021-03-14 08:45:39'),
(10, 4, 4, '2021-03-14 08:45:39', '2021-03-14 08:45:39'),
(11, 4, 5, '2021-03-14 08:45:39', '2021-03-14 08:45:39'),
(12, 5, 2, '2021-03-14 15:22:44', '2021-03-14 15:22:44'),
(13, 5, 3, '2021-03-14 15:22:44', '2021-03-14 15:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `orders_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` int(11) NOT NULL,
  `orders_subtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orders_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orders_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`orders_id`, `user_id`, `customer_name`, `email`, `phone`, `address`, `note`, `payment_method`, `orders_subtotal`, `taxes`, `orders_total`, `orders_status`, `created_at`, `updated_at`) VALUES
(3, 2, 'Gái Già Xóm Trọ', 'orgasm@co.dom', '098766543', 'Phủ Lý Hà Nam', 'Giao trong giờ hành chính', 1, '22,065,000.00', '4,633,650.00', '26,698,650.00', 4, '2021-02-25 07:33:32', '2021-02-25 07:35:03'),
(4, 2, 'Lâm Sài Gòn', 'vuem123@gmail.com', '098766543', 'động Bàn Tơ', 'Giao chủ nhật hoặc thứ bảy', 1, '1,165,000.00', '244,650.00', '1,409,650.00', 2, '2021-02-25 07:34:10', '2021-02-25 07:35:16'),
(5, 2, 'Thu Hương', 'trangCaveVagina123@co.uk', '09887777555', '18 ngách 1/2 thủ dầu một Hải Phòng', 'Giao ngay 27/12', 2, '870,000.00', '182,700.00', '1,052,700.00', 3, '2021-02-25 07:34:42', '2021-02-25 07:34:51'),
(6, 2, 'Vú Em', 'tomanyeuem@gmail.com', '0977xxxxx', 'động Bàn Tơ', 'Giao khi có bầu', 2, '2,850,000.00', '598,500.00', '3,448,500.00', 1, '2021-02-25 07:36:17', '2021-02-25 07:36:17'),
(7, 2, 'Sơn Nguyễn', 'tomanyeuem@gmail.com', '0988777223', '67 Hoài Đức Thanh Trì Hà Nội', 'Giao ngay trong ngày', 2, '360,000', '36,000', '396,000', 1, '2021-03-01 14:11:52', '2021-03-01 14:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders_details`
--

CREATE TABLE `tbl_orders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_orders_details`
--

INSERT INTO `tbl_orders_details` (`id`, `orders_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(4, 3, 10, 3, 7000000, '2021-02-25 07:33:32', '2021-02-25 07:33:32'),
(5, 3, 3, 5, 45000, '2021-02-25 07:33:32', '2021-02-25 07:33:32'),
(6, 3, 1, 7, 120000, '2021-02-25 07:33:32', '2021-02-25 07:33:32'),
(7, 4, 3, 1, 45000, '2021-02-25 07:34:10', '2021-02-25 07:34:10'),
(8, 4, 8, 2, 560000, '2021-02-25 07:34:11', '2021-02-25 07:34:11'),
(9, 5, 9, 1, 300000, '2021-02-25 07:34:42', '2021-02-25 07:34:42'),
(10, 5, 7, 1, 570000, '2021-02-25 07:34:42', '2021-02-25 07:34:42'),
(11, 6, 7, 5, 570000, '2021-02-25 07:36:17', '2021-02-25 07:36:17'),
(12, 7, 1, 3, 120000, '2021-03-01 14:11:52', '2021-03-01 14:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `cat_id`, `brand_id`, `product_name`, `product_desc`, `product_content`, `product_image`, `product_price`, `product_quantity`, `product_status`, `created_at`, `updated_at`) VALUES
(1, 10, 5, 'Balo laptop artic hunter', '<p>Balo laptop artic hunter</p>', '<p>Balo laptop artic hunter</p>', 'balo-laptop-15-inch-cong-usb-arctic-hunter21.jpg', '120000', 20, 1, '2020-12-16 07:36:38', '2020-12-16 07:36:38'),
(2, 2, 7, 'Cáp type C lightning', '<p>Cáp type C lightning</p>', '<p>Cáp type C Lightning dành cho Iphone 12, 11, pro max</p>', 'cap-type-c-lightning15.jpg', '350000', 66, 1, '2020-12-16 07:38:39', '2020-12-16 07:38:39'),
(3, 6, 6, 'Chuột không dây anker', '<p>Chuột không dây anker đen</p>', '<p>Chuột không dây anker đen</p>', 'chuot-khong-day-rapoo-1620-den0.jpg', '45000', 2, 1, '2020-12-16 07:39:40', '2020-12-16 07:39:40'),
(4, 10, 2, 'Loa microlab đen', '<p>Loa microlab đen</p>', '<p>Loa microlab đen</p>', 'microlab-m318bt-den47.jpg', '1000000', 35, 1, '2020-12-16 07:40:11', '2020-12-16 07:40:11'),
(5, 7, 4, 'Miếng dán lưng iphone 12', '<p>Miếng d&aacute;n lưng iphone 12</p>', '<p>Miếng d&aacute;n lưng iphone 12</p>', 'mieng-dan-lung-iphone-1284.jpg', '67000', 100, 1, '2020-12-16 07:40:48', '2020-12-16 07:40:48'),
(6, 5, 3, 'Ổ cứng di động ssd 1TB', '<p>Ổ cứng di động ssd 1TB</p>', '<p>Ổ cứng di động ssd 1TB</p>', 'o-cung-ssd-1tb-wd-my-passportpg64.jpg', '7000000', 29, 1, '2020-12-16 07:41:39', '2020-12-16 07:41:39'),
(7, 1, 8, 'Pin dự phòng 3000 mAH', '<p>Pin dự ph&ograve;ng 3000 mAH</p>', '<p>Pin dự ph&ograve;ng 3000 mAH</p>', 'pin-sac-du-phong-7500mah71.jpg', '570000', 78, 1, '2020-12-16 07:42:30', '2020-12-16 07:42:30'),
(8, 10, 7, 'Pin dự phòng 7500 mAH', '<p>Pin dự ph&ograve;ng 7500 mAH</p>', '<p>Pin dự ph&ograve;ng 7500 mAH</p>', 'sac-du-phong-polymer-10000mah71.jpg', '560000', 89, 0, '2020-12-16 07:42:58', '2020-12-16 07:42:58'),
(9, 3, 1, 'Tai nghe bluetooth DEATHZONE', '<p>Tai nghe bluetooth DEATHZONE</p>', '<p>Tai nghe bluetooth DEATHZONE</p>', 'tai-nghe-bluetooth-true-wireless-mozard-ts13-den54.jpg', '300000', 15, 1, '2020-12-16 07:43:48', '2021-02-21 02:41:48'),
(10, 5, 6, 'Thẻ nhớ microsd 160GB', '<p>Thẻ nhớ microsd 160GB</p>', '<p>Thẻ nhớ microsd 160GB</p>', 'the-nho-microsd-128gb-class-10-uhs163.jpg', '7000000', 88, 1, '2020-12-16 07:44:23', '2020-12-16 07:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hot', 1, '2021-03-11 14:19:50', '2021-03-11 14:19:50', NULL),
(2, 'World', 1, '2021-03-11 14:19:56', '2021-03-11 14:19:56', NULL),
(3, 'National', 1, '2021-03-11 14:20:01', '2021-03-11 14:20:01', NULL),
(4, 'Business', 1, '2021-03-11 14:20:10', '2021-03-11 14:20:10', NULL),
(5, 'Trending', 1, '2021-03-11 14:20:17', '2021-03-11 14:20:17', NULL),
(6, 'Sales', 1, '2021-03-11 14:20:22', '2021-03-11 14:20:22', NULL),
(7, 'New Product', 0, '2021-03-11 14:20:27', '2021-03-11 14:20:27', NULL),
(8, 'Covid', 1, '2021-03-14 08:42:29', '2021-03-14 08:42:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `email`, `password`, `phone`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$7K3RJnUGtkgZ.MPQWTAXkub9SaRs4gxYEF12PNQfynoM/3F4XLAfe', '0977036293', NULL, NULL, '2021-02-13 21:18:27', '2021-02-13 21:18:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `tbl_admin_email_unique` (`email`),
  ADD UNIQUE KEY `tbl_admin_name_unique` (`name`);

--
-- Indexes for table `tbl_admin_news`
--
ALTER TABLE `tbl_admin_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news_comments`
--
ALTER TABLE `tbl_news_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_news_comments_user_id_index` (`user_id`),
  ADD KEY `tbl_news_comments_news_id_index` (`news_id`);

--
-- Indexes for table `tbl_news_tags`
--
ALTER TABLE `tbl_news_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_news_tags_news_id_index` (`news_id`),
  ADD KEY `tbl_news_tags_tags_id_index` (`tags_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `tbl_orders_details`
--
ALTER TABLE `tbl_orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_tags_name_unique` (`name`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `tbl_users_username_unique` (`username`),
  ADD UNIQUE KEY `tbl_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin_news`
--
ALTER TABLE `tbl_admin_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_news_comments`
--
ALTER TABLE `tbl_news_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_news_tags`
--
ALTER TABLE `tbl_news_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `orders_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_orders_details`
--
ALTER TABLE `tbl_orders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_news_comments`
--
ALTER TABLE `tbl_news_comments`
  ADD CONSTRAINT `tbl_news_comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `tbl_news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_news_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_news_tags`
--
ALTER TABLE `tbl_news_tags`
  ADD CONSTRAINT `tbl_news_tags_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `tbl_news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_news_tags_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tbl_tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
