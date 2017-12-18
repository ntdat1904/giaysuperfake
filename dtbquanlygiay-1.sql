-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 31, 2017 lúc 10:56 AM
-- Phiên bản máy phục vụ: 5.7.19
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dtbquanlygiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banggia`
--

DROP TABLE IF EXISTS `banggia`;
CREATE TABLE IF NOT EXISTS `banggia` (
  `ID_BangGia` int(11) NOT NULL AUTO_INCREMENT,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  PRIMARY KEY (`ID_BangGia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `banggia`
--

INSERT INTO `banggia` (`ID_BangGia`, `NgayBatDau`, `NgayKetThuc`) VALUES
(1, '2017-09-01', '2017-09-30'),
(2, '2017-08-01', '2017-09-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
CREATE TABLE IF NOT EXISTS `binhluan` (
  `ID_BinhLuan` int(11) NOT NULL AUTO_INCREMENT,
  `NoiDung` varchar(200) NOT NULL,
  `NgayBinhLuan` date NOT NULL,
  `ID_SanPhamFK` int(11) NOT NULL,
  `ID_KhachHangFK` int(11) NOT NULL,
  PRIMARY KEY (`ID_BinhLuan`),
  KEY `ID_SanPhamFK` (`ID_SanPhamFK`,`ID_KhachHangFK`),
  KEY `ID_KhachHangFK` (`ID_KhachHangFK`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`ID_BinhLuan`, `NoiDung`, `NgayBinhLuan`, `ID_SanPhamFK`, `ID_KhachHangFK`) VALUES
(1, 'Sản phẩm rất đẹp và bền.', '2017-10-02', 1, 1),
(2, 'Shop luôn cập nhập sản phẩm mới và giá cả hợp lí', '2017-09-28', 3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluantin`
--

DROP TABLE IF EXISTS `binhluantin`;
CREATE TABLE IF NOT EXISTS `binhluantin` (
  `ID_BinhLuanTin` int(11) NOT NULL AUTO_INCREMENT,
  `NoiDung` varchar(200) NOT NULL,
  `NgayBinhLuan` date NOT NULL,
  `ID_TinTucFK` int(11) NOT NULL,
  `ID_KhachHangFK` int(11) NOT NULL,
  PRIMARY KEY (`ID_BinhLuanTin`),
  KEY `ID_TinTucFK` (`ID_TinTucFK`,`ID_KhachHangFK`),
  KEY `ID_KhachHangFK` (`ID_KhachHangFK`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `binhluantin`
--

INSERT INTO `binhluantin` (`ID_BinhLuanTin`, `NoiDung`, `NgayBinhLuan`, `ID_TinTucFK`, `ID_KhachHangFK`) VALUES
(1, 'Nike thể thao N420 còn hàng ko shop.', '2017-09-19', 1, 3),
(2, 'Mình ko phải là thành viên của shop thì có được giảm giá không.', '2017-10-01', 2, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietbanggia`
--

DROP TABLE IF EXISTS `chitietbanggia`;
CREATE TABLE IF NOT EXISTS `chitietbanggia` (
  `ID_ChiTietBangGia` int(11) NOT NULL AUTO_INCREMENT,
  `Gia` double NOT NULL,
  `ID_SanPhamFK` int(11) NOT NULL,
  `ID_BangGiaFK` int(11) NOT NULL,
  PRIMARY KEY (`ID_ChiTietBangGia`),
  KEY `ID_SanPhamFK` (`ID_SanPhamFK`,`ID_BangGiaFK`),
  KEY `ID_BangGiaFK` (`ID_BangGiaFK`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietbanggia`
--

INSERT INTO `chitietbanggia` (`ID_ChiTietBangGia`, `Gia`, `ID_SanPhamFK`, `ID_BangGiaFK`) VALUES
(1, 1500000, 1, 1),
(2, 12000000, 3, 2),
(3, 1400000, 2, 1),
(4, 850000, 5, 2),
(5, 1000000, 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgiamgia`
--

DROP TABLE IF EXISTS `chitietgiamgia`;
CREATE TABLE IF NOT EXISTS `chitietgiamgia` (
  `ID_ChiTietGiamGia` int(11) NOT NULL AUTO_INCREMENT,
  `ChietKhau` int(11) NOT NULL,
  `ID_SanPhamFK` int(11) NOT NULL,
  `ID_GiamGIaFK` int(11) NOT NULL,
  PRIMARY KEY (`ID_ChiTietGiamGia`),
  KEY `ID_SanPhamFK` (`ID_SanPhamFK`,`ID_GiamGIaFK`),
  KEY `ID_GiamGIaFK` (`ID_GiamGIaFK`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietgiamgia`
--

INSERT INTO `chitietgiamgia` (`ID_ChiTietGiamGia`, `ChietKhau`, `ID_SanPhamFK`, `ID_GiamGIaFK`) VALUES
(7, 10, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

DROP TABLE IF EXISTS `chitiethoadon`;
CREATE TABLE IF NOT EXISTS `chitiethoadon` (
  `ID_ChiTietHoaDon` int(11) NOT NULL AUTO_INCREMENT,
  `NgayXuat` date NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` double NOT NULL,
  `ID_DonHangFK` int(11) NOT NULL,
  `ID_SanPhamFK` int(11) NOT NULL,
  PRIMARY KEY (`ID_ChiTietHoaDon`),
  KEY `ID_DonHangFK` (`ID_DonHangFK`,`ID_SanPhamFK`),
  KEY `ID_SanPhamFK` (`ID_SanPhamFK`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`ID_ChiTietHoaDon`, `NgayXuat`, `SoLuong`, `DonGia`, `ID_DonHangFK`, `ID_SanPhamFK`) VALUES
(1, '2017-10-10', 2, 3000000, 1, 1),
(2, '2017-09-22', 1, 1200000, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsp`
--

DROP TABLE IF EXISTS `danhmucsp`;
CREATE TABLE IF NOT EXISTS `danhmucsp` (
  `ID_DanhMuc` int(11) NOT NULL AUTO_INCREMENT,
  `TenDanhMuc` varchar(100) NOT NULL,
  `ID_NhomFK` int(11) NOT NULL,
  PRIMARY KEY (`ID_DanhMuc`),
  KEY `ID_NhomFK` (`ID_NhomFK`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhmucsp`
--

INSERT INTO `danhmucsp` (`ID_DanhMuc`, `TenDanhMuc`, `ID_NhomFK`) VALUES
(1, 'Thể Thao', 1),
(2, 'Thời Trang', 2),
(3, 'Thể Thao', 2),
(4, 'Mùa Đông', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `ID_DonHang` int(11) NOT NULL AUTO_INCREMENT,
  `NgayDatHang` date NOT NULL,
  `NgayGiaoHang` date NOT NULL,
  `TinhTrangGiaoHang` tinyint(1) NOT NULL,
  `TinhTrangThanhToan` tinyint(1) NOT NULL,
  `GhiChu` varchar(100) NOT NULL,
  `DiaChiGiao` varchar(100) NOT NULL,
  `ID_TaiKhoanFK` int(11) NOT NULL,
  `ID_KhachHangFK` int(11) NOT NULL,
  PRIMARY KEY (`ID_DonHang`),
  KEY `ID_TaiKhoanFK` (`ID_TaiKhoanFK`,`ID_KhachHangFK`),
  KEY `ID_KhachHangFK` (`ID_KhachHangFK`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`ID_DonHang`, `NgayDatHang`, `NgayGiaoHang`, `TinhTrangGiaoHang`, `TinhTrangThanhToan`, `GhiChu`, `DiaChiGiao`, `ID_TaiKhoanFK`, `ID_KhachHangFK`) VALUES
(1, '2017-10-10', '2017-10-12', 0, 1, 'Sản phẩm được giảm 10% nhân ngày sinh nhật và giao cho khách vào buổi chiều.', 'Nha Trang', 2, 1),
(2, '2017-09-22', '2017-09-22', 1, 1, 'Giao cho khách vào buổi tối trong ngày.', 'Quận 10', 4, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giamgia`
--

DROP TABLE IF EXISTS `giamgia`;
CREATE TABLE IF NOT EXISTS `giamgia` (
  `ID_GiamGia` int(11) NOT NULL AUTO_INCREMENT,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `MoTa` varchar(200) NOT NULL,
  `MucGiam` double NOT NULL,
  PRIMARY KEY (`ID_GiamGia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giamgia`
--

INSERT INTO `giamgia` (`ID_GiamGia`, `NgayBatDau`, `NgayKetThuc`, `MoTa`, `MucGiam`) VALUES
(1, '2017-10-01', '2017-10-31', 'Kỷ niệm 1 năm sinh nhật shop , shop giảm tất cả các mặt hàng tại shop trong vòng 1 tháng.', 10),
(2, '2017-09-01', '2017-09-02', 'Nhân ngày Quốc Khánh shop giảm giá 2 ngày cho các mặt hàng.', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `ID_KhachHang` int(11) NOT NULL AUTO_INCREMENT,
  `TenDangNhap` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `TenKhachHang` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `NgayDangKy` date NOT NULL,
  `NamSinh` int(11) NOT NULL,
  PRIMARY KEY (`ID_KhachHang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`ID_KhachHang`, `TenDangNhap`, `Password`, `TenKhachHang`, `DiaChi`, `GioiTinh`, `SDT`, `NgayDangKy`, `NamSinh`) VALUES
(1, 'KhachHang1', '6367c48dd193d56ea7b0baad25b19455e529f5ee', 'Lionel Messi', 'Barcelona', 0, '0124578412', '2017-08-24', 1988),
(2, 'KhachHang2', '4be30d9814c6d4e9800e0d2ea9ec9fb00efa887b', 'Ibrahimovic', 'Sweeden', 0, '0905645214', '2017-09-21', 1985),
(3, 'KhachHang3', '53eb4c071e8aec4bfa1c0896f5581ad855eea8d5', 'Đàm Vĩnh Hưng', 'Quận 3', 0, '0214561244', '2017-10-01', 1984),
(4, 'KhachHang4', '875f22481f595d8261b41cafff7d6ca731f55258', 'Mỹ Tâm', 'Quận 1', 1, '0904521346', '2017-10-11', 1990);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

DROP TABLE IF EXISTS `nhacungcap`;
CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `ID_NhaCungCap` int(11) NOT NULL AUTO_INCREMENT,
  `TenNhaCungCap` varchar(100) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Fax` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_NhaCungCap`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`ID_NhaCungCap`, `TenNhaCungCap`, `SDT`, `Email`, `Fax`) VALUES
(1, 'Nike', '0124574114', 'Nike@gmail.com', NULL),
(2, 'Addidas', '0214574514', 'Addidas@gmail.com', '123456'),
(3, 'Vans', '0255874115', 'vans@gmail.com', NULL),
(4, 'Biti\'s', '0904125474', 'bitis@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom`
--

DROP TABLE IF EXISTS `nhom`;
CREATE TABLE IF NOT EXISTS `nhom` (
  `ID_Nhom` int(11) NOT NULL AUTO_INCREMENT,
  `GioiTinh` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_Nhom`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhom`
--

INSERT INTO `nhom` (`ID_Nhom`, `GioiTinh`) VALUES
(1, 0),
(2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `ID_SanPham` int(11) NOT NULL AUTO_INCREMENT,
  `TenSanPham` varchar(100) NOT NULL,
  `SoLuongTon` int(11) NOT NULL,
  `MoTa` varchar(200) NOT NULL,
  `Size` int(11) NOT NULL,
  `ID_DanhMucFK` int(11) NOT NULL,
  `ID_NhaCungCapFK` int(11) NOT NULL,
  PRIMARY KEY (`ID_SanPham`),
  KEY `ID_DanhMucFK` (`ID_DanhMucFK`,`ID_NhaCungCapFK`),
  KEY `ID_NhaCungCapFK` (`ID_NhaCungCapFK`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID_SanPham`, `TenSanPham`, `SoLuongTon`, `MoTa`, `Size`, `ID_DanhMucFK`, `ID_NhaCungCapFK`) VALUES
(1, 'Giày Nike Thể Thao N420', 0, 'Giày Nike Thể Thao N420 là mặt hàng mới đang được rất nhiều bạn trẻ yêu thích.', 42, 1, 1),
(2, 'Giày Addidas Thể Thao A420', 1, 'Giày Addidas Thể Thao A420 rất thích hợp cho các bạn nữ mang để chạy bộ.', 40, 3, 2),
(3, 'Giày Addidas Thời Trang A320', 2, 'Giày Addidas Thời Trang A320 là sẳn phẩm đang được ưa chuộng trên thế giới.', 40, 2, 2),
(4, 'Giày Vans V420', 1, 'Giày Vans V420 là loại giày cổ cao , thích hợp để mang vào mùa đông.', 42, 4, 3),
(5, 'Giày Biti\'s Hunter B420', 0, 'Giày Biti\'s Hunter B420 là loại thể thao thích hợp cho cả nam và nữ.', 41, 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `ID_TaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `TenDangNhap` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `NgayDangKy` date NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `PhanQuyen` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID_TaiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`ID_TaiKhoan`, `TenDangNhap`, `Password`, `HoTen`, `DiaChi`, `GioiTinh`, `NgayDangKy`, `SDT`, `PhanQuyen`) VALUES
(1, 'admin1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Lê Công Vinh', 'Nghệ An', 0, '2017-08-01', '0125647512', 0),
(2, 'nhanvien1', '654321', 'Lương Xuân Trường', 'Gia Lai', 0, '2017-10-01', '02141254124', 1),
(3, 'admin2', 'df2983700ffecb52e6649f0cb3981b66537083a4', 'Michael Ballack', 'Germany', 0, '2017-09-14', '0124741452', 0),
(4, 'nhanvien2', '789456', 'Đông Nhi', 'Quận 1', 1, '2017-09-08', '021412415', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

DROP TABLE IF EXISTS `tintuc`;
CREATE TABLE IF NOT EXISTS `tintuc` (
  `ID_TinTuc` int(11) NOT NULL AUTO_INCREMENT,
  `TieuDe` varchar(100) NOT NULL,
  `NoiDung` varchar(200) NOT NULL,
  `NgayTao` date NOT NULL,
  `ID_TaiKhoan` int(11) NOT NULL,
  PRIMARY KEY (`ID_TinTuc`),
  KEY `ID_TaiKhoan` (`ID_TaiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`ID_TinTuc`, `TieuDe`, `NoiDung`, `NgayTao`, `ID_TaiKhoan`) VALUES
(1, 'Hàng mới về ', 'Shop mới cập nhập những sản phẩm mới đang hot trong năm 2017 , 5 bạn đầu tiên qua mua sản phẩm vào ngày 21-09-2017 sẽ được giảm giá 5%', '2017-09-19', 1),
(2, 'Chương trình khuyến mãi', 'Nhân ngày Shop Giày tròn 1 tuổi , sẽ giảm giá các sẩn phẩm 10% trong vòng 1 tháng.', '2017-10-01', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuvan`
--

DROP TABLE IF EXISTS `tuvan`;
CREATE TABLE IF NOT EXISTS `tuvan` (
  `ID_TuVan` int(11) NOT NULL AUTO_INCREMENT,
  `NoiDung` varchar(100) NOT NULL,
  `NgayDang` date NOT NULL,
  `TraLoi` varchar(200) NOT NULL,
  `ID_BinhLuanFK` int(11) NOT NULL,
  `ID_TaiKhoanFK` int(11) NOT NULL,
  PRIMARY KEY (`ID_TuVan`),
  KEY `ID_BinhLuanFK` (`ID_BinhLuanFK`,`ID_TaiKhoanFK`),
  KEY `ID_TaiKhoanFK` (`ID_TaiKhoanFK`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tuvan`
--

INSERT INTO `tuvan` (`ID_TuVan`, `NoiDung`, `NgayDang`, `TraLoi`, `ID_BinhLuanFK`, `ID_TaiKhoanFK`) VALUES
(1, 'Đánh giá sản phẩm của khách hàng', '2017-10-02', 'Cảm ơn bạn đã ủng hộ shop.', 1, 1),
(2, 'Đánh giá sản phẩm của khách hàng', '2017-09-28', 'Cảm ơn bạn đã ủng hộ shop.', 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuatxu`
--

DROP TABLE IF EXISTS `xuatxu`;
CREATE TABLE IF NOT EXISTS `xuatxu` (
  `ID_XuatXu` int(11) NOT NULL AUTO_INCREMENT,
  `TenXuatXu` varchar(100) NOT NULL,
  `ID_NhaCungCapFK` int(11) NOT NULL,
  PRIMARY KEY (`ID_XuatXu`),
  KEY `ID_NhaCungCapFK` (`ID_NhaCungCapFK`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `xuatxu`
--

INSERT INTO `xuatxu` (`ID_XuatXu`, `TenXuatXu`, `ID_NhaCungCapFK`) VALUES
(1, 'Mỹ', 1),
(2, 'Mỹ', 2),
(3, 'Biti\'s', 4),
(4, 'Pháp', 3);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`ID_SanPhamFK`) REFERENCES `sanpham` (`ID_SanPham`) ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`ID_KhachHangFK`) REFERENCES `khachhang` (`ID_KhachHang`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `binhluantin`
--
ALTER TABLE `binhluantin`
  ADD CONSTRAINT `binhluantin_ibfk_1` FOREIGN KEY (`ID_TinTucFK`) REFERENCES `tintuc` (`ID_TinTuc`) ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluantin_ibfk_2` FOREIGN KEY (`ID_KhachHangFK`) REFERENCES `khachhang` (`ID_KhachHang`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietbanggia`
--
ALTER TABLE `chitietbanggia`
  ADD CONSTRAINT `chitietbanggia_ibfk_1` FOREIGN KEY (`ID_SanPhamFK`) REFERENCES `sanpham` (`ID_SanPham`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietbanggia_ibfk_2` FOREIGN KEY (`ID_BangGiaFK`) REFERENCES `banggia` (`ID_BangGia`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietgiamgia`
--
ALTER TABLE `chitietgiamgia`
  ADD CONSTRAINT `chitietgiamgia_ibfk_1` FOREIGN KEY (`ID_SanPhamFK`) REFERENCES `sanpham` (`ID_SanPham`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietgiamgia_ibfk_2` FOREIGN KEY (`ID_GiamGIaFK`) REFERENCES `giamgia` (`ID_GiamGia`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`ID_DonHangFK`) REFERENCES `donhang` (`ID_DonHang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`ID_SanPhamFK`) REFERENCES `sanpham` (`ID_SanPham`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD CONSTRAINT `danhmucsp_ibfk_1` FOREIGN KEY (`ID_NhomFK`) REFERENCES `nhom` (`ID_Nhom`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`ID_TaiKhoanFK`) REFERENCES `taikhoan` (`ID_TaiKhoan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`ID_KhachHangFK`) REFERENCES `khachhang` (`ID_KhachHang`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`ID_DanhMucFK`) REFERENCES `danhmucsp` (`ID_DanhMuc`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`ID_NhaCungCapFK`) REFERENCES `nhacungcap` (`ID_NhaCungCap`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`ID_TaiKhoan`) REFERENCES `taikhoan` (`ID_TaiKhoan`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tuvan`
--
ALTER TABLE `tuvan`
  ADD CONSTRAINT `tuvan_ibfk_1` FOREIGN KEY (`ID_BinhLuanFK`) REFERENCES `binhluan` (`ID_BinhLuan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tuvan_ibfk_2` FOREIGN KEY (`ID_TaiKhoanFK`) REFERENCES `taikhoan` (`ID_TaiKhoan`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `xuatxu`
--
ALTER TABLE `xuatxu`
  ADD CONSTRAINT `xuatxu_ibfk_1` FOREIGN KEY (`ID_NhaCungCapFK`) REFERENCES `nhacungcap` (`ID_NhaCungCap`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
