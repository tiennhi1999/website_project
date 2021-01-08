-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2021 lúc 07:27 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlhoinghi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`) VALUES
(1, 'Bóng đá'),
(3, 'Vật lý'),
(4, 'Khoa học'),
(5, 'Chính trị');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diadiemtc`
--

CREATE TABLE `diadiemtc` (
  `MADD` int(11) NOT NULL,
  `TENDD` varchar(100) DEFAULT NULL,
  `DIACHI` varchar(100) DEFAULT NULL,
  `SUCCHUA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diadiemtc`
--

INSERT INTO `diadiemtc` (`MADD`, `TENDD`, `DIACHI`, `SUCCHUA`) VALUES
(1, 'Khách sạn Majestic', '1 Đồng Khởi, Quân 1, TP.HCM', 450),
(2, 'Sofitel Sai Gon Plaza', '17 Lê Duẩn Quận 1 TPHCM', 350),
(3, 'Gem Center', '8 Nguyễn Bỉnh Khiêm, Đa Kao, Quận 1, TP.HCM', 100),
(4, 'Việt Thương Music 369', '369 Điện Biên Phủ, Phường 4, Quận 3, TPHCM.', 150);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ds_dangki`
--

CREATE TABLE `ds_dangki` (
  `MA_DSDK` int(11) NOT NULL,
  `MA_USER` int(11) DEFAULT NULL,
  `HN_ID` int(11) DEFAULT NULL,
  `duyet` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ds_dangki`
--

INSERT INTO `ds_dangki` (`MA_DSDK`, `MA_USER`, `HN_ID`, `duyet`) VALUES
(4, 3, 1, b'1'),
(8, 3, 4, b'1'),
(9, 3, 2, b'1');

--
-- Bẫy `ds_dangki`
--
DELIMITER $$
CREATE TRIGGER `XOA` AFTER DELETE ON `ds_dangki` FOR EACH ROW BEGIN
	DELETE FROM ds_thamgia WHERE OLD.MA_USER = ds_thamgia.MA_USER AND ds_thamgia.HN_ID = DS.MAHN;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ds_them` AFTER UPDATE ON `ds_dangki` FOR EACH ROW BEGIN
IF(NEW.DUYET = 1)
THEN INSERT INTO ds_thamgia(MA_USER, MAHN) VALUES
	(NEW.MA_USER, NEW.HN_ID);
   END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `duyet` BEFORE INSERT ON `ds_dangki` FOR EACH ROW BEGIN
SET NEW.DUYET = 0;	
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ds_thamgia`
--

CREATE TABLE `ds_thamgia` (
  `MA_DSTG` int(11) NOT NULL,
  `MA_USER` int(11) DEFAULT NULL,
  `MAHN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ds_thamgia`
--

INSERT INTO `ds_thamgia` (`MA_DSTG`, `MA_USER`, `MAHN`) VALUES
(2, 3, 1),
(3, 3, 4),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoi_nghi`
--

CREATE TABLE `hoi_nghi` (
  `MAHN` int(11) NOT NULL,
  `MADD` int(11) DEFAULT NULL,
  `IDDANHMUC` int(11) DEFAULT NULL,
  `TENHN` varchar(100) DEFAULT NULL,
  `MOTANG` varchar(100) DEFAULT NULL,
  `MOTA` text DEFAULT NULL,
  `HINHANH` text DEFAULT NULL,
  `THOIGIAN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoi_nghi`
--

INSERT INTO `hoi_nghi` (`MAHN`, `MADD`, `IDDANHMUC`, `TENHN`, `MOTANG`, `MOTA`, `HINHANH`, `THOIGIAN`) VALUES
(1, 1, 1, ' Hội nghị khoa học quốc tế về Thể thao, Giáo dục thể chất và Phát triển thế hệ trẻ năm 2019', '(Tổ Quốc) - Hội nghị khoa học quốc tế về Thể thao, Giáo dục thể chất và Phát triển thế hệ trẻ năm 20', '<p>Đ&acirc;y l&agrave; một hoạt động do Trường Đại học Thể dục thể thao th&agrave;nh phố Hồ Ch&iacute; Minh phối hợp với Viện Khoa học Thể thao H&agrave;n Quốc, Hội Khoa học Thể dục thể thao Việt Nam, Trung t&acirc;m Huấn luyện Thể thao Quốc gia Th&agrave;nh phố Hồ Ch&iacute; Minh tổ chức.</p>\r\n\r\n<p><a href=\"https://toquoc.mediacdn.vn/2019/11/25/h-15746524507251064054207.jpg\" title=\"Ảnh minh họa: Nam Nguyễn\"><img alt=\"Hội nghị khoa học quốc tế về Thể thao, Giáo dục thể chất và Phát triển thế hệ trẻ năm 2019 - Ảnh 1.\" id=\"img_829c46d0-0f33-11ea-a870-e1a6a282bff0\" src=\"https://toquoc.mediacdn.vn/2019/11/25/h-15746524507251064054207.jpg\" title=\"Hội nghị khoa học quốc tế về Thể thao, Giáo dục thể chất và Phát triển thế hệ trẻ năm 2019 - Ảnh 1.\" /></a></p>\r\n\r\n<p>Ảnh minh họa: Nam Nguyễn</p>\r\n\r\n<p>Hội nghị sẽ tập trung v&agrave;o c&aacute;c vấn đề: Khoa học thể thao, huấn luyện, đ&agrave;o tạo v&agrave; tuyển chọn vận động vi&ecirc;n; quản l&yacute; thể thao, thể thao giải tr&iacute;; gi&aacute;o dục thể chất; ph&aacute;t triển thể hệ trẻ th&ocirc;ng qua hoạt động vận động v&agrave; giải tr&iacute;.</p>\r\n\r\n<p>Th&ocirc;ng qua đ&oacute;, Hội nghị sẽ tạo n&ecirc;n một diễn đ&agrave;n để c&aacute;c nh&agrave; khoa học, giảng vi&ecirc;n, nghi&ecirc;n cứu sinh v&agrave; sinh vi&ecirc;n của c&aacute;c trường đại học thể dục thể thao, c&aacute;c khoa gi&aacute;o dục thể chất của cơ sở đ&agrave;o tạo&hellip;.c&ugrave;ng n&ecirc;u quan điểm v&agrave; đ&oacute;ng g&oacute;p c&aacute;c s&aacute;ng kiến, giải ph&aacute;p nhằm n&acirc;ng cao chất lượng c&aacute;c hoạt động thể thao v&agrave; gi&aacute;o dục thể chất.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>\r\n', 'http://127.0.0.1/QLHoiNghi//uploads/hoinghi.jpg', '2021-01-30 12:00:00'),
(2, 1, 4, 'Hội nghị chống biến đổi khí hậu: Trắng đêm đàm phán rồi... về tay không', 'TTO - Sau gần hai tuần tụ tập thương lượng chán chê ở thủ đô Madrid của Tây Ban Nha, Hội nghị khí hậ', '<p><a href=\"https://cdn.tuoitre.vn/2019/12/16/bien-doi-khi-hau-1-15764569944811364145633.jpg\" target=\"_blank\" title=\"Phản đối kết quả tệ hại của Hội nghị COP25, độ một chục thành viên phong trào Extinction Rebellion cho kéo một xe tải phân ngựa đến đổ gần trung tâm hội nghị ở thủ đô Madrid ngày 14-12. Họ giương biểu ngữ yêu cầu “Chúng tôi muốn được sống” và “Còn bao nhiêu người phải chết nữa?” - Ảnh: REUTERS\"><img alt=\"Hội nghị chống biến đổi khí hậu: Trắng đêm đàm phán rồi... về tay không - Ảnh 1.\" id=\"img_85657700-1f9c-11ea-ad2e-a39cd5789feb\" src=\"https://cdn.tuoitre.vn/thumb_w/586/2019/12/16/bien-doi-khi-hau-1-15764569944811364145633.jpg\" title=\"Hội nghị chống biến đổi khí hậu: Trắng đêm đàm phán rồi... về tay không - Ảnh 1.\" /></a></p>\r\n\r\n<p>Phản đối kết quả tệ hại của Hội nghị COP25, độ một chục th&agrave;nh vi&ecirc;n phong tr&agrave;o Extinction Rebellion cho k&eacute;o một xe tải ph&acirc;n ngựa đến đổ gần trung t&acirc;m hội nghị ở thủ đ&ocirc; Madrid ng&agrave;y 14-12. Họ giương biểu ngữ y&ecirc;u cầu &ldquo;Ch&uacute;ng t&ocirc;i muốn được sống&rdquo; v&agrave; &ldquo;C&ograve;n bao nhi&ecirc;u người phải chết nữa?&rdquo; - Ảnh: REUTERS</p>\r\n\r\n<p>&quot;Đ&atilde; đến l&uacute;c h&agrave;nh động&quot;. Đ&oacute; l&agrave; c&acirc;u khẩu hiệu mang t&iacute;nh khẩn thiết của Hội nghị lần thứ 25 c&aacute;c b&ecirc;n tham gia C&ocirc;ng ước khung của Li&ecirc;n Hiệp Quốc về biến đổi kh&iacute; hậu (COP25). Ngắn gọn nhưng mang t&iacute;nh y&ecirc;u cầu cao về chuyện kh&ocirc;ng c&ograve;n thời gian cho chuyện b&agrave;n l&ugrave;i.</p>\r\n\r\n<p>Thế nhưng sau gần 2 tuần gặp mặt thương thảo, vẫn chưa c&oacute; h&agrave;nh động cụ thể n&agrave;o được thống nhất mang t&iacute;nh trấn an cho tương lai nh&acirc;n loại.&nbsp;</p>\r\n\r\n<p>Trước cứ tưởng đ&acirc;y l&agrave; Hội nghị COP của tham vọng, nhưng ch&uacute;ng t&ocirc;i chẳng được thấy tham vọng đ&oacute; ở đ&acirc;y&quot;.</p>\r\n\r\n<p>Carlos Fuller (trưởng đại diện đ&agrave;m ph&aacute;n của nh&oacute;m 44 quốc gia đảo chịu ảnh hưởng nước biển d&acirc;ng)</p>\r\n\r\n<p>Hội nghị lẽ ra phải kết th&uacute;c v&agrave;o ng&agrave;y&nbsp;14-12 (d&ugrave; đ&atilde; k&eacute;o th&ecirc;m một ng&agrave;y) nhưng c&aacute;c nh&agrave; đ&agrave;m ph&aacute;n v&agrave; c&aacute;c nh&agrave; ngoại giao phải l&agrave;m việc xuy&ecirc;n đ&ecirc;m sang rạng s&aacute;ng 15-12 với mong muốn c&oacute; được kết quả khả dĩ n&agrave;o đ&oacute; cho một hội nghị đang được cả thế giới tr&ocirc;ng chờ.</p>\r\n\r\n<p><strong>Tiếp tục &quot;đ&aacute; b&oacute;ng&quot;&nbsp;tr&aacute;ch nhiệm</strong></p>\r\n\r\n<p>Mục ti&ecirc;u lớn nhất của COP25 c&oacute; thể n&oacute;i l&agrave; soạn thảo đường đi, một thứ &quot;v&aacute;n ph&oacute;ng&quot; chuẩn bị cho COP26, sẽ được tổ chức tại Glasgow (Scotland) v&agrave;o th&aacute;ng 11-2020. V&agrave;o thời điểm đ&oacute;, theo như kế hoạch c&oacute; trong Thỏa thuận kh&iacute; hậu Paris đ&atilde; thống nhất hồi COP21, c&aacute;c quốc gia sẽ ngồi lại t&aacute;i đ&aacute;nh gi&aacute; c&aacute;c mục ti&ecirc;u của m&igrave;nh.&nbsp;</p>\r\n\r\n<p>Những cam kết hồi COP21 chỉ l&agrave; t&igrave;m c&aacute;ch giới hạn mức tăng nhiệt độ to&agrave;n cầu th&ecirc;m 3,2&deg;C từ nay cho đến cuối thế kỷ. Trong khi c&aacute;c nh&agrave; khoa học cho rằng phải hạn chế mức tăng chỉ 2&deg;C, thậm ch&iacute; l&agrave; 1,5&deg;C th&igrave; mới hiệu quả.</p>\r\n\r\n<p><a href=\"https://cdn.tuoitre.vn/2019/12/16/bien-doi-khi-hau-2-15764569643561660819155.jpg\" target=\"_blank\" title=\"Cuộc họp kéo dài khiến nhiều người phải qua đêm trên ghế trong trung tâm hội nghị ở Madrid - Ảnh: AFP\"><img alt=\"Hội nghị chống biến đổi khí hậu: Trắng đêm đàm phán rồi... về tay không - Ảnh 3.\" id=\"img_0dd26440-1f9d-11ea-93a4-11ea49e45789\" src=\"https://cdn.tuoitre.vn/thumb_w/586/2019/12/16/bien-doi-khi-hau-2-15764569643561660819155.jpg\" title=\"Hội nghị chống biến đổi khí hậu: Trắng đêm đàm phán rồi... về tay không - Ảnh 3.\" /></a></p>\r\n\r\n<p>Cuộc họp k&eacute;o d&agrave;i khiến nhiều người phải qua đ&ecirc;m tr&ecirc;n ghế trong trung t&acirc;m hội nghị ở Madrid - Ảnh: AFP</p>\r\n\r\n<p>Thế nhưng kết quả của COP25 lại vẫn chỉ l&agrave; những cam kết, thậm ch&iacute; chỉ c&oacute; 80 quốc gia nhỏ (chiếm 10,5% lượng kh&iacute; thải g&acirc;y hiệu ứng nh&agrave; k&iacute;nh) hứa sẽ n&acirc;ng th&ecirc;m mức cam kết của m&igrave;nh. Những &ocirc;ng lớn xả thải như Mỹ, Trung Quốc, Brazil, &Uacute;c, Nhật, Canada... gần như kh&ocirc;ng đưa ra tuy&ecirc;n bố đ&aacute;ng kể n&agrave;o.&nbsp;</p>\r\n\r\n<p>Ngay như Ấn Độ v&agrave; Trung Quốc c&ograve;n k&egrave;o n&agrave;i kiểu kh&ocirc;ng đưa ra cam kết nỗ lực mới đến khi n&agrave;o c&aacute;c quốc gia ph&aacute;t triển chịu hứa l&agrave;m nhiều hơn v&agrave; t&ocirc;n trọng cam kết trợ gi&uacute;p t&agrave;i ch&iacute;nh cho c&aacute;c nước đang ph&aacute;t triển.</p>\r\n\r\n<p>Những kỳ k&egrave;o &quot;đ&aacute; b&oacute;ng&quot; tr&aacute;ch nhiệm như thế khiến nhiều quốc gia tham dự hội nghị - đặc biệt l&agrave; c&aacute;c nước nhỏ, c&aacute;c đảo quốc đang bị đe dọa nặng nề v&igrave; biến đổi kh&iacute; hậu - cảm thấy thất vọng to&agrave;n tập.&nbsp;</p>\r\n\r\n<p>Từ s&aacute;ng 14-12, họ đ&atilde; nhận thấy kh&ocirc;ng c&oacute; g&igrave; đ&aacute;ng kể trong c&aacute;c văn bản đặt l&ecirc;n b&agrave;n của Chile - quốc gia chủ tịch COP25. B&agrave; Tina Stege - đại diện quần đảo Marshall - tuy&ecirc;n bố: &quot;T&ocirc;i cần trở về nh&agrave;, nh&igrave;n thẳng v&agrave;o mắt con c&aacute;i v&agrave; n&oacute;i rằng ch&uacute;ng ta đ&atilde; c&oacute; một kết quả đảm bảo tương lai cho ch&uacute;ng&quot;.</p>\r\n\r\n<p><strong>Điểm s&aacute;ng ch&acirc;u &Acirc;u</strong></p>\r\n\r\n<p>C&oacute; lẽ điểm s&aacute;ng duy nhất của COP25 l&agrave;&nbsp;<a href=\"https://tuoitre.vn/eu-thong-qua-thoa-thuan-xanh-lich-su-de-cuu-moi-truong-20191212114957031.htm\" target=\"_blank\" title=\"thỏa thuận xanh\">thỏa thuận xanh</a>&nbsp;&quot;Green Deal&quot; của Li&ecirc;n minh ch&acirc;u &Acirc;u (EU) cho ph&eacute;p khối n&agrave;y thực hiện mục ti&ecirc;u triệt ti&ecirc;u kh&iacute; thải cacbon v&agrave;o năm 2050.</p>\r\n\r\n<p>Quyết định của EU n&ecirc;u r&otilde; một th&agrave;nh vi&ecirc;n của khối (Ba Lan) ở thời điểm hiện tại chưa thể tham gia mục ti&ecirc;u tr&ecirc;n v&agrave; EU sẽ thảo luận lại vấn đề n&agrave;y trong th&aacute;ng 6-2020. Ngo&agrave;i ra, thỏa thuận của c&aacute;c nh&agrave; l&atilde;nh đạo EU c&oacute; nội dung cho ph&eacute;p một số quốc gia th&agrave;nh vi&ecirc;n quyết định đưa năng lượng hạt nh&acirc;n v&agrave;o danh mục c&aacute;c nguồn năng lượng cần thiết.&nbsp;</p>\r\n\r\n<p>Đ&acirc;y l&agrave; một t&iacute;n hiệu phần n&agrave;o xoa dịu CH Czech v&igrave; nước n&agrave;y lu&ocirc;n muốn thỏa thuận phải quy định r&otilde; năng lượng nguy&ecirc;n tử l&agrave; một nguồn năng lượng được chấp nhận.</p>\r\n\r\n<p>L&atilde;nh đạo 27 quốc gia th&agrave;nh vi&ecirc;n EU (kh&ocirc;ng bao gồm Anh) đ&atilde; th&ocirc;ng qua c&aacute;c kết luận tr&ecirc;n sau một phi&ecirc;n tranh luận căng thẳng. Việc c&aacute;c b&ecirc;n cuối c&ugrave;ng tiến tới thỏa thuận cho thấy quyết t&acirc;m thực hiện vai tr&ograve; đi đầu trong cuộc chiến chống biến đổi kh&iacute; hậu m&agrave; t&acirc;n Chủ tịch Ủy ban ch&acirc;u &Acirc;u (EC) Ursula von der Leyen từng đề cập khi&nbsp;nhậm chức.</p>\r\n\r\n<p>Trong khi đ&oacute; nước Anh, chắc chắn sẽ rời EU thời gian tới, cam kết sẽ l&agrave;m hết sức trong vấn đề kh&iacute; hậu. B&agrave; Claire O&#39;Neill, trưởng đại diện ph&aacute;i đo&agrave;n Anh tại COP25, khẳng định kh&iacute; hậu sẽ l&agrave; &quot;ưu ti&ecirc;n số 1 của ch&uacute;ng t&ocirc;i trong vấn đề quốc tế v&agrave;o năm tới&quot;.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>\r\n', 'http://127.0.0.1/QLHoiNghi//uploads/khihau.jpg', '2021-01-27 07:00:00'),
(3, 1, 5, 'Hội nghị khoa học toàn quốc năm 2020', 'Lựa chọn thuốc hợp lý, an toàn, hiệu quả trong điều trị', '<p>Tham dự Hội nghị c&oacute;, PGS.TS.Nguyễn Thị Xuy&ecirc;n, Chủ tịch Tổng hội Y học Việt Nam, nguy&ecirc;n Thứ trưởng Bộ Y tế; TS.Phạm Lương Sơn, Ph&oacute; tổng Gi&aacute;m đốc Bảo hiểm x&atilde; hội Việt Nam; GS.TS.L&ecirc; Ngọc Trọng, nguy&ecirc;n Thứ trưởng Bộ Y tế; GS.TS.L&ecirc; Quang Cường, nguy&ecirc;n Thứ trưởng Bộ Y tế; GS.TS.Nguyễn Viết Tiến, nguy&ecirc;n Thứ trưởng Bộ Y tế; đại diện l&atilde;nh đạo v&agrave; chuy&ecirc;n vi&ecirc;n một số Vụ, Cục, Văn ph&ograve;ng, đơn vị thuộc v&agrave; trực thuộc Bộ Y tế.</p>\r\n\r\n<p><img alt=\"\" src=\"https://moh.gov.vn/documents/174521/287391/29.10.2020+TT+Son.jpg/a539e441-2bae-4ef4-96aa-5183edf29e04?t=1603964772204\" /></p>\r\n\r\n<p><em>PGS.TS.Nguyễn Trường Sơn, Thứ trưởng Bộ Y tế ph&aacute;t biểu tại Hội nghị</em></p>\r\n\r\n<p>Ph&aacute;t biểu tại Hội nghị, PGS.TS.Nguyễn Trường Sơn, Thứ trưởng Bộ Y tế cho biết: những năm qua ng&agrave;nh Y tế &nbsp;đ&atilde; đạt được nhiều th&agrave;nh tựu trong lĩnh vực sức khỏe như c&aacute;c chỉ số sức khỏe; tuổi thọ b&igrave;nh qu&acirc;n được cải thiện; Việt Nam được c&aacute;c tổ chức quốc tế đ&aacute;nh gi&aacute; l&agrave; điểm s&aacute;ng về thực hiện c&aacute;c Mục ti&ecirc;u Ph&aacute;t triển Thi&ecirc;n ni&ecirc;n kỷ của Li&ecirc;n hiệp quốc&hellip;</p>\r\n\r\n<p>Năm 2016, Luật Dược được th&ocirc;ng qua với nhiều nội dung mới, đ&aacute;p ứng được y&ecirc;u cầu sản xuất, kinh doanh, cung ứng v&agrave; sử dụng thuốc c&oacute; chất lượng, an to&agrave;n, hợp l&yacute;, hiệu quả. Tuy nhi&ecirc;n hiện nay, nhiều loại thuốc kh&aacute;ng sinh mới được ph&aacute;t minh v&agrave; đưa v&agrave;o sử dụng phổ biến trong điều trị người bệnh như ung thư, c&aacute;c bệnh kh&ocirc;ng l&acirc;y nhiễm.</p>\r\n\r\n<p>Việc thực hiện Quyết định số 68/QĐ-TTg ng&agrave;y 10/1/2014 của Thủ tướng Ch&iacute;nh phủ ban h&agrave;nh Ch&iacute;nh s&aacute;ch Quốc gia về Dược giai đoạn 2011-2020, tầm nh&igrave;n 2030 với mục ti&ecirc;u cung ứng đủ thuốc c&oacute; chất lượng đ&aacute;p ứng nhu cầu sử dụng của người d&acirc;n v&agrave; sử dụng thuốc an to&agrave;n, hợp l&yacute;, hiệu quả đ&atilde; đạt được những kết quả quan trọng.</p>\r\n\r\n<p>&nbsp;Ngo&agrave;i việc n&acirc;ng cao nhận thức của cộng đồng v&agrave; c&aacute;n bộ y tế về kh&aacute;ng thuốc kh&aacute;ng sinh, Bộ Y tế cũng đ&atilde; c&oacute; những chương tr&igrave;nh để bảo đảm khả năng cung ứng đủ thuốc, tăng cường ho&agrave;n thiện hệ thống gi&aacute;m s&aacute;t quốc gia về sử dụng kh&aacute;ng sinh v&agrave; kh&aacute;ng thuốc; tăng cường sử dụng thuốc an to&agrave;n.</p>\r\n\r\n<p>Những thay đổi trong hệ thống cung ứng thuốc sẽ tạo điều kiện cho thầy thuốc v&agrave; người bệnh được tiếp cận nhanh ch&oacute;ng với những th&agrave;nh tựu của nh&acirc;n loại, được sử dụng những loại thuốc mới ph&aacute;t minh, những thuốc chuy&ecirc;n khoa đặc trị d&ugrave;ng để chẩn đo&aacute;n v&agrave; chữa trị những bệnh nan y v&agrave; đảm bảo sử dụng thuốc an to&agrave;n, hợp l&yacute;, hiệu quả trong điều trị.</p>\r\n\r\n<p>Trong thời gian tới, việc sử dụng bằng chứng đ&aacute;nh gi&aacute; c&ocirc;ng nghệ y tế trong x&acirc;y dựng ch&iacute;nh s&aacute;ch thuốc bảo hiểm y tế sẽ kh&ocirc;ng c&ograve;n mang t&iacute;nh khuyến kh&iacute;ch m&agrave; chắc chắn sẽ trở th&agrave;nh y&ecirc;u cầu bắt buộc, nhất l&agrave; đối với c&aacute;c thuốc đề xuất bổ sung mới v&agrave;o danh mục&hellip;</p>\r\n\r\n<p><img alt=\"\" src=\"https://moh.gov.vn/documents/176127/0/29.10.2020+TT+Son+anh+02.jpg/9fa74b4e-f750-4b99-8738-139c586d4767?t=1603964253241\" /></p>\r\n\r\n<p><em>PGS.TS.Nguyễn Thị Xuy&ecirc;n, Chủ tịch Tổng hội Y học Việt Nam, nguy&ecirc;n Thứ trưởng Bộ Y tế ph&aacute;t biểu tại Hội nghị</em></p>\r\n\r\n<p>Ph&aacute;t biểu khai mạc Hội nghị, PGS.TS.Nguyễn Thị Xuy&ecirc;n, Chủ tịch Tổng hội Y học Việt Nam, nguy&ecirc;n Thứ trưởng Bộ Y tế cho biết: thực hiện Nghị quyết li&ecirc;n tịch giữa Bộ Y tế v&agrave; Tổng hội Y học Việt Nam về việc phối hợp hoạt động trong c&ocirc;ng t&aacute;c bảo vệ, chăm s&oacute;c v&agrave; n&acirc;ng cao sức khỏe Nh&acirc;n d&acirc;n giai đoạn 2017-2021. Năm nay, Tổng hội Y học Việt Nam phối hợp với Bộ Y tế tổ chức Hội thảo khoa học năm 2020 với chủ đề &ldquo;Lựa chọn thuốc hợp l&yacute;, an to&agrave;n, hiệu quả trong điều trị&rdquo;.</p>\r\n\r\n<p>Hội nghị l&agrave; dịp để c&aacute;c chuy&ecirc;n gia trong nước v&agrave; quốc thế thảo luận c&aacute;c vấn đề li&ecirc;n quan để l&agrave;m thế n&agrave;o để lựa chọn thuốc bảo đảm hợp l&yacute;, an to&agrave;n, hiệu quả cho người bệnh, lựa chọn được thuốc ph&ugrave; hợp với nhu cầu điều trị v&agrave; khả năng thanh to&aacute;n của người d&acirc;n (kể cả người c&oacute; thẻ bảo hiểm y tế) nhất l&agrave; trong bối cảnh t&igrave;nh trạng kh&aacute;ng thuốc ng&agrave;y một gia tăng để g&oacute;p phần n&acirc;ng cao chất lượng, hiệu quả điều trị, bảo vệ, chăm s&oacute;c v&agrave; n&acirc;ng cao sức khỏe Nh&acirc;n d&acirc;n&hellip;</p>\r\n\r\n<p><img alt=\"\" src=\"https://moh.gov.vn/documents/176127/0/29.10.2020+TT+Son+anh+03.jpg/41ed9b91-b30a-4ce6-a49e-cb7616c7b56a?t=1603964256773\" /></p>\r\n\r\n<p><em>Ng&agrave;i Gareth Ward, Đại sứ Vương quốc Anh tại Việt Nam ph&aacute;t biểu tại Hội nghị</em></p>\r\n\r\n<p>Tại Hội nghị, ng&agrave;i Gareth Ward, Đại sứ Vương quốc Anh tại Việt Nam cho biết: Vương quốc Anh cam kết sẽ hỗ trợ Việt Nam giải quyết c&aacute;c vấn đề li&ecirc;n quan tới lĩnh vực y tế, trong đ&oacute; c&oacute; vấn đề kh&aacute;ng kh&aacute;ng sinh v&agrave; sử dụng thuốc hợp l&yacute; an to&agrave;n qua c&aacute;c quỹ t&agrave;i trợ của Anh.</p>\r\n\r\n<p>Theo Đại sứ Gareth Ward sự hỗ trợ của Vương quốc Anh triển khai trong thời gian qua tại Việt Nam l&agrave; những đ&oacute;ng g&oacute;p thiết thực v&agrave; l&acirc;u d&agrave;i. C&aacute;c c&ocirc;ng ty dược phẩm của Anh lu&ocirc;n cam kết v&agrave; hỗ trợ Việt Nam trong vấn đề giảm t&igrave;nh trạng kh&aacute;ng kh&aacute;ng sinh.</p>\r\n\r\n<p>&quot;Thuốc đ&atilde; g&oacute;p phần hiệu quả rất lớn trong c&ocirc;ng t&aacute;c điều trị nhiễm tr&ugrave;ng. Con người hiện nay được hưởng lợi từ nhiều ph&aacute;t minh thuốc mới. Tuy nhi&ecirc;n ng&agrave;y nay nhiều loại thuốc kh&aacute;ng sinh đang dần mất đi t&aacute;c dụng, giảm hiệu quả do t&igrave;nh trạng kh&aacute;ng thuốc kh&aacute;ng sinh. Ch&uacute;ng t&ocirc;i k&ecirc;u gọi những h&agrave;nh động về n&acirc;ng cao nhận thức của người d&acirc;n trong sử dụng thuốc kh&aacute;ng sinh v&agrave; về vấn đề k&ecirc; đơn kh&aacute;ng sinh lợp l&yacute; từ đội ngũ nh&acirc;n vi&ecirc;n y tế. Đ&acirc;y l&agrave; tr&aacute;ch nhiệm chung của người d&acirc;n v&agrave; nh&acirc;n vi&ecirc;n y tế,&quot; vị Đại sứ Anh khẳng định.</p>\r\n\r\n<p>Đại sứ Vương quốc Anh cũng ph&acirc;n t&iacute;ch: lựa chọn thuốc hợp l&yacute;, an to&agrave;n, hiệu quả trong điều trị đ&acirc;y l&agrave; vấn đề mang t&iacute;nh to&agrave;n cầu, sự hợp t&aacute;c giữa hai nước trong lĩnh vực y tế để c&ugrave;ng nhau thực hiện những mục ti&ecirc;u tốt đẹp trong chăm s&oacute;c sức khỏe người d&acirc;n. Đặc biệt, đại dịch COVID-19 kh&ocirc;ng phải l&agrave; vấn đề duy nhất m&agrave; ng&agrave;nh Y tế đang phải đối mặt, m&agrave; cần quan t&acirc;m v&agrave; đẩy mạnh hơn tới vấn đề kh&aacute;ng kh&aacute;ng sinh. Đ&acirc;y kh&ocirc;ng chỉ l&agrave; th&aacute;ch thức của Việt Nam m&agrave; n&oacute; đ&atilde; mang t&iacute;nh to&agrave;n cầu&hellip;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>\r\n', 'http://127.0.0.1/QLHoiNghi//uploads/29.10.2020 TT Son.jpg', '2021-01-06 07:00:00'),
(4, 1, 4, 'Hội Y Học TP.HCM – Hội nghị khoa học thường niên – Năm 2020', 'Hội nghị khoa học thường niên năm 2020 do Hội Y học TPHCM tổ chức diễn ra trong hai ngày 7 và 8/1 th', '<p>S&aacute;ng ng&agrave;y 7/11/2020, Hội Y học TPHCM đ&atilde; tổ chức chương tr&igrave;nh hội nghị khoa học thường năm 2020 với chủ đề đặc biệt, thời sự &ldquo;Cập nhật về bệnh nhiễm SARS-CoV-2&rdquo;</p>\r\n\r\n<p><img alt=\"\" src=\"https://media.alobacsi.com/upload/phuongnguyen/2020/11/08/152503-Cap_nhat_benh_nhiem_SARS-CoV-2_Hoi_Y_hoc_TPHCM_2.jpg\" style=\"height:387px; width:611px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://media.alobacsi.com/upload/phuongnguyen/2020/11/08/152503-Cap_nhat_benh_nhiem_SARS-CoV-2_Hoi_Y_hoc_TPHCM_4.jpg\" style=\"height:369px; width:609px\" /></p>\r\n\r\n<p>Người tham dự tu&acirc;n thủ quy tắc an to&agrave;n, đeo khẩu trang, đo th&acirc;n nhiệt trước khi bắt đầu hội thảo</p>\r\n\r\n<p><img alt=\"\" src=\"https://media.alobacsi.com/upload/phuongnguyen/2020/11/08/152243-Cap_nhat_benh_nhiem_SARS-CoV-2_Hoi_Y_hoc_TPHCM_32.jpg\" style=\"height:395px; width:602px\" /></p>\r\n\r\n<p>Ph&aacute;t biểu khai mạc hội nghị, PGS.TS.BS Nguyễn Thị Ngọc Dung &ndash; Chủ tịch Hội Y học TPHCM chia sẻ, COVID-19 thực sự khiến cả thế giới đi&ecirc;u đứng. Ng&agrave;nh Y tế TPHCM cũng như cả nước đ&atilde; v&agrave; đang đối mặt với những th&aacute;ch thức chưa từng c&oacute; trong những thập ni&ecirc;n gần đ&acirc;y. Hiện, dịch bệnh vẫn diễn tiến phức tạp, v&igrave; thế theo PGS Ngọc Dung hội nghị năm 2020, Hội Y học TPHCM đ&atilde; tập trung v&agrave;o những vấn đề li&ecirc;n quan đến COVID-19 với 6 b&agrave;i b&aacute;o c&aacute;o đến từ c&aacute;c chuy&ecirc;n gia đầu ng&agrave;nh.</p>\r\n\r\n<p>PGS.TS.BS Tăng Ch&iacute; Thượng &ndash; Ph&oacute; gi&aacute;m đốc Sở Y tế TPHCM mở đầu hội nghị với chủ đề &ldquo;Từ bệnh viện d&atilde; chiến đến bệnh viện an to&agrave;n trong ph&ograve;ng chống dịch COVID-19 tại TPHCM&rdquo; mang đến nhiều th&ocirc;ng tin th&uacute; vị &iacute;t ai biết trong qu&aacute; tr&igrave;nh x&acirc;y dựng bệnh viện d&atilde; chiến tại TPHCM. Trong đ&oacute;, c&oacute; cả ph&ograve;ng mổ, hồi sức, đặc biệt l&agrave; x&acirc;y dựng 10 ph&ograve;ng c&aacute;ch ly &aacute;p lực &acirc;m được trang bị đầy đủ c&aacute;c thiết bị hồi sức bệnh nặng (m&aacute;y thở, monitor&hellip;). C&aacute;c thiết bị X-quang, si&ecirc;u &acirc;m di động của Bệnh viện quận Thủ Đức cũng được điều động đến phục vụ người bệnh tại Bệnh viện d&atilde; chiến.</p>\r\n\r\n<p><img alt=\"\" src=\"https://media.alobacsi.com/upload/phuongnguyen/2020/11/08/151931-Cap_nhat_benh_nhiem_SARS-CoV-2_Hoi_Y_hoc_TPHCM_9.jpg\" style=\"height:385px; width:603px\" /></p>\r\n\r\n<p>&ldquo;Đặc biệt, để thu hẹp khoảng c&aacute;ch ng&ocirc;n ngữ giữa b&aacute;c sĩ v&agrave; c&aacute;c bệnh nh&acirc;n đến từ đa quốc gia, bệnh viện d&atilde; chiến c&ograve;n trang bị th&ocirc;ng tin li&ecirc;n lạc bằng m&aacute;y phi&ecirc;n dịch, tiết kiệm nh&acirc;n lực v&agrave; chi ph&iacute;. Đồng thời, để bảo vệ nh&acirc;n vi&ecirc;n y tế, giảm thiểu nguy cơ l&acirc;y nhiễm trong bệnh viện, chỉ trong 20 ng&agrave;y robot khử khuẩn cũng được ra mắt, kịp thời phục vụ trong cuộc chiến chống dịch COVID-19&hellip;&rdquo; &ndash; PGS.TS.BS Tăng Ch&iacute; Thượng n&oacute;i.</p>\r\n\r\n<p><img alt=\"\" src=\"https://media.alobacsi.com/upload/phuongnguyen/2020/11/08/152155-Cap_nhat_benh_nhiem_SARS-CoV-2_Hoi_Y_hoc_TPHCM_15.jpg\" style=\"height:369px; width:603px\" /></p>\r\n\r\n<p>Những slide b&aacute;o c&aacute;o sinh động của GVC.BS Huỳnh Khắc Cường &ndash; Chủ tịch Li&ecirc;n Chi hội Tai Mũi Họng mang đến cho hội nghị một &ldquo;diện mạo&rdquo; to&agrave;n diện của SARS-CoV-2. &Ocirc;ng v&iacute; loại virus n&agrave;y như những &ldquo;zombie&rdquo;, kh&ocirc;ng chỉ t&aacute;c động l&ecirc;n hệ h&ocirc; hấp n&oacute; c&ograve;n tấn c&ocirc;ng to&agrave;n bộ cơ thể, đặc biệt c&ograve;n g&acirc;y ra t&igrave;nh trạng đ&ocirc;ng m&aacute;u.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all:unset\">&nbsp;</div>\r\n', 'http://127.0.0.1/QLHoiNghi//uploads/hoinghi1.jpg', '2021-02-07 07:30:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_`
--

CREATE TABLE `user_` (
  `MA_USER` int(11) NOT NULL,
  `TENUSER` varchar(50) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `USER_PWD` varchar(50) DEFAULT NULL,
  `USER_EMAIL` varchar(100) DEFAULT NULL,
  `SDT` varchar(12) NOT NULL,
  `level` bit(1) NOT NULL,
  `CHAN` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_`
--

INSERT INTO `user_` (`MA_USER`, `TENUSER`, `USERNAME`, `USER_PWD`, `USER_EMAIL`, `SDT`, `level`, `CHAN`) VALUES
(1, 'Ksor Âu', 'autinn123', '852000', 'autinn123@gmail.com', '0862330358', b'1', b'0'),
(3, 'Nguyễn Hoàng Minh Trí', 'TriNguyen123', '1234', 'minhtri3013@gmail.com', '0706827031', b'0', b'0');

--
-- Bẫy `user_`
--
DELIMITER $$
CREATE TRIGGER `TUDONG` BEFORE INSERT ON `user_` FOR EACH ROW BEGIN
	SET NEW.LEVEL = 0;
    SET NEW.CHAN = 0;
END
$$
DELIMITER ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diadiemtc`
--
ALTER TABLE `diadiemtc`
  ADD PRIMARY KEY (`MADD`);

--
-- Chỉ mục cho bảng `ds_dangki`
--
ALTER TABLE `ds_dangki`
  ADD PRIMARY KEY (`MA_DSDK`),
  ADD KEY `FK_DS_DANGK_CO__USER` (`MA_USER`),
  ADD KEY `FK_DS_DANGK_CO__TRONG_HOI_NGHI` (`HN_ID`);

--
-- Chỉ mục cho bảng `ds_thamgia`
--
ALTER TABLE `ds_thamgia`
  ADD PRIMARY KEY (`MA_DSTG`),
  ADD KEY `FK_DS_THAMG_CO___USER` (`MA_USER`),
  ADD KEY `FK_DS_THAMG_THUO_C_HOI_NGHI` (`MAHN`);

--
-- Chỉ mục cho bảng `hoi_nghi`
--
ALTER TABLE `hoi_nghi`
  ADD PRIMARY KEY (`MAHN`),
  ADD KEY `FK_HOI_NGHI_TO__CHU_C_DIADIEMT` (`MADD`),
  ADD KEY `FK_HOI_NGHI_TO__DM` (`IDDANHMUC`);

--
-- Chỉ mục cho bảng `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`MA_USER`),
  ADD UNIQUE KEY `emailU` (`USER_EMAIL`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `diadiemtc`
--
ALTER TABLE `diadiemtc`
  MODIFY `MADD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ds_dangki`
--
ALTER TABLE `ds_dangki`
  MODIFY `MA_DSDK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `ds_thamgia`
--
ALTER TABLE `ds_thamgia`
  MODIFY `MA_DSTG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hoi_nghi`
--
ALTER TABLE `hoi_nghi`
  MODIFY `MAHN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user_`
--
ALTER TABLE `user_`
  MODIFY `MA_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ds_dangki`
--
ALTER TABLE `ds_dangki`
  ADD CONSTRAINT `FK_DS_DANGK_CO__TRONG_HOI_NGHI` FOREIGN KEY (`HN_ID`) REFERENCES `hoi_nghi` (`MAHN`),
  ADD CONSTRAINT `FK_DS_DANGK_CO__USER` FOREIGN KEY (`MA_USER`) REFERENCES `user_` (`MA_USER`);

--
-- Các ràng buộc cho bảng `ds_thamgia`
--
ALTER TABLE `ds_thamgia`
  ADD CONSTRAINT `FK_DS_THAMG_CO___USER` FOREIGN KEY (`MA_USER`) REFERENCES `user_` (`MA_USER`),
  ADD CONSTRAINT `FK_DS_THAMG_THUO_C_HOI_NGHI` FOREIGN KEY (`MAHN`) REFERENCES `hoi_nghi` (`MAHN`);

--
-- Các ràng buộc cho bảng `hoi_nghi`
--
ALTER TABLE `hoi_nghi`
  ADD CONSTRAINT `FK_HOI_NGHI_TO__CHU_C_DIADIEMT` FOREIGN KEY (`MADD`) REFERENCES `diadiemtc` (`MADD`),
  ADD CONSTRAINT `FK_HOI_NGHI_TO__DM` FOREIGN KEY (`IDDANHMUC`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
