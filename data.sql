
INSERT INTO `cathi` (`cathi_id`, `giobatdau` , `gioketthuc`, `created_at`, `updated_at`) VALUES
('CA01', '07:30:00', '08:30:00', NULL, NULL),
('CA02', '08:40:00', '09:40:00', NULL, NULL),
('CA03', '09:50:00', '10:50:00', NULL, NULL),
('CA04', '13:30:00', '14:30:00', NULL, NULL),
('CA05', '14:40:00', '15:40:00', NULL, NULL),
('CA06', '15:50:00', '16:40:00', NULL, NULL);

INSERT INTO `giangduong` (`giangduong_id`, `tengiangduong`, `created_at`, `updated_at`) VALUES
('G1', 'Giảng đường G1', NULL, NULL),
('G2', 'Giảng đường G2', NULL, NULL),
('G3', 'Giảng đường G3', NULL, NULL),
('G4', 'Giảng đường G4', NULL, NULL),
('G5', 'Giảng đường G5', NULL, NULL),
('G6', 'Giảng đường G6', NULL, NULL),
('G7', 'Giảng đường G7', NULL, NULL);

INSERT INTO `phongthi` (`phongthi_id`, `tenphongthi`, `giangduong_id`, `created_at`, `updated_at`) VALUES
('G1-101', 'Phòng 101', 'G1', NULL, NULL),
('G1-102', 'Phòng 102', 'G1', NULL, NULL),
('G1-103', 'Phòng 103', 'G1', NULL, NULL),
('G1-104', 'Phòng 104', 'G1', NULL, NULL),
('G1-105', 'Phòng 105', 'G1', NULL, NULL),
('G2-101', 'Phòng 101', 'G2', NULL, NULL),
('G2-102', 'Phòng 102', 'G2', NULL, NULL),
('G2-103', 'Phòng 103', 'G2', NULL, NULL),
('G2-104', 'Phòng 104', 'G2', NULL, NULL),
('G2-105', 'Phòng 105', 'G2', NULL, NULL),
('G3-101', 'Phòng 101', 'G3', NULL, NULL),
('G3-102', 'Phòng 102', 'G3', NULL, NULL),
('G3-103', 'Phòng 103', 'G3', NULL, NULL),
('G3-104', 'Phòng 104', 'G3', NULL, NULL),
('G3-105', 'Phòng 105', 'G3', NULL, NULL);

INSERT INTO `khoa` (`khoa_id`, `tenkhoa`, `created_at`, `updated_at`) VALUES
('CNTT', 'Công nghệ thông tin', NULL, NULL),
('XD', 'Xây dựng', NULL, NULL),
('CK', 'Cơ khí', NULL, NULL);

INSERT INTO `bomon` (`bomon_id`, `tenbomon`, `khoa_id`, `created_at`, `updated_at`) VALUES
('TOAN', 'Toán', 'CNTT', NULL, NULL),
('KTPM', 'Kỹ thuật phần mềm', 'CNTT', NULL, NULL),
('MTT', 'Mạng truyền thông', 'CNTT', NULL, NULL),
('HTTQL', 'Hệ thống thông tin quản lý', 'CNTT', NULL, NULL),
('CKT', 'Cơ kỹ thuật', 'XD', NULL, NULL),
('KTXD', 'Kỹ thuật xây dựng', 'XD', NULL, NULL),
('CSXD', 'Cơ sở xây dựng', 'XD', NULL, NULL),
('CTM', 'Chế tạo máy', 'CK', NULL, NULL),
('CDT', 'Cơ điện tử', 'CK', NULL, NULL);

INSERT INTO `monhoc` (`monhoc_id`, `tenmonhoc`, `bomon_id`, `created_at`, `updated_at`) VALUES
('VLKT', 'Vật liệu kỹ thuật', 'CTM', NULL, NULL),
('KTTK', 'Kỹ thuật thủy khí', 'CTM', NULL, NULL),
('DLHCH', 'Động lực học cơ hệ', 'CTM', NULL, NULL),
('NLC', 'Nguyên lý cắt', 'CDT', NULL, NULL),
('CTHTK', 'Công thái học và thiết kế', 'CDT', NULL, NULL),
('SBVL', 'Sức bền vật liệu', 'CDT', NULL, NULL),

('CHLC', 'Cơ học lưu chất', 'CKT', NULL, NULL),
('DLHCT', 'Động lực học công trình', 'CKT', NULL, NULL),
('CHKC1', 'Cơ học kết cấu 1', 'CKT', NULL, NULL),
('VLXD', 'Vật liệu xây dựng', 'CSXD', NULL, NULL),
('DHKT', 'Đồ họa kỹ thuật', 'CSXD', NULL, NULL),
('MXD', 'Máy xây dựng', 'CSXD', NULL, NULL),
('CTN', 'Cấp thoát nước', 'CSXD', NULL, NULL),
('DCCT', 'Địa chất công trình', 'KTXD', NULL, NULL),
('TLTV', 'Thủy lực & Thủy văn', 'KTXD', NULL, NULL),
('TCTC', 'Tổ chức thi công', 'KTXD', NULL, NULL),

('HTTQL', 'Hệ thống tin quản lý', 'HTTQL', NULL, NULL),
('TKWKD', 'Thiết kế web kinh doanh', 'HTTQL', NULL, NULL),
('QTSX', 'Quản trị sản xuất', 'HTTQL', NULL, NULL),
('MMT', 'Mạng máy tính', 'MTT', NULL, NULL),
('TBMVCH', 'Thiết bị mạng và cấu hình', 'MTT', NULL, NULL),
('LTM', 'Lập trình mạng', 'MTT', NULL, NULL),
('PTUDW', 'Phát triển ứng dụng Web', 'KTPM', NULL, NULL),
('TKW', 'Thiết kế web', 'KTPM', NULL, NULL),
('LTHDT', 'Lập trình hướng đối tượng', 'KTPM', NULL, NULL),
('DSTT', 'Đại số tuyến tính', 'TOAN', NULL, NULL),
('GT', 'Giải tính', 'TOAN', NULL, NULL),
('XSTK', 'Lý thuyết xác suất và thống kê toán', 'TOAN', NULL, NULL);


INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
('','Adminitrastor', NULL, NULL),
('','Thư ký khoa', NULL, NULL),
('','Giảng viên', NULL, NULL),
('','Sinh viên', NULL, NULL);

INSERT INTO `routes` (`id`, `route_name`, `route_title`, `created_at`, `updated_at`) VALUES
('','giangvien.index', 'View giảng viên', NULL, NULL),
('','giangvien.create', 'Thêm giảng viên', NULL, NULL),
('','giangvien.update', 'Cập nhật giảng viên', NULL, NULL),
('','giangvien.delete', 'Xóa giảng viên', NULL, NULL),
('','giangvien.store', 'Lưu giảng viên', NULL, NULL),
('','giangvien.import', 'Import giảng viên', NULL, NULL),

('','khoa.index', 'View khoa', NULL, NULL),
('','khoa.create', 'Thêm khoa', NULL, NULL),
('','khoa.update', 'Cập nhật khoa', NULL, NULL),
('','khoa.store', 'Lưu khoa', NULL, NULL),
('','khoa.delete', 'Xóa khoa', NULL, NULL),

('','phongthi.index', 'View phòng thi', NULL, NULL),
('','phongthi.create', 'Thêm phòng thi', NULL, NULL),
('','phongthi.update', 'Cập nhật phòng thi', NULL, NULL),
('','phongthi.delete', 'Xóa phòng thi', NULL, NULL),
('','phongthi.store', 'Lưu phòng thi', NULL, NULL),

('','monhoc.index', 'View môn học', NULL, NULL),
('','monhoc.create', 'Thêm môn học', NULL, NULL),
('','monhoc.update', 'Cập nhật môn học', NULL, NULL),
('','monhoc.delete', 'Xóa môn học', NULL, NULL),
('','monhoc.store', 'Lưu môn học', NULL, NULL),

('','bomon.index', 'View bộ môn', NULL, NULL),
('','bomon.create', 'Thêm bộ môn', NULL, NULL),
('','bomon.update', 'Cập nhật bộ môn', NULL, NULL),
('','bomon.delete', 'Xóa bộ môn', NULL, NULL),
('','bomon.store', 'Lưu bộ môn', NULL, NULL),

('','buoithi.index', 'View buổi thi', NULL, NULL),
('','buoithi.create', 'Thêm buổi thi', NULL, NULL),
('','buoithi.update', 'Cập nhật buổi thi', NULL, NULL),
('','buoithi.delete', 'Xóa buổi thi', NULL, NULL),
('','buoithi.store', 'Lưu buổi thi', NULL, NULL),

('','lichcoithi.index', 'View lịch coi thi', NULL, NULL),
('','lichcoithi.lichcoithiauto', 'Lịch coi thi tự động', NULL, NULL),
('','lichcoithi.store', 'Cập nhật lịch coi thi', NULL, NULL),
('','lichcoithi.cuatoi', 'Lịch của tôi', NULL, NULL),
('','lichcoithi.delete', 'Xóa lịch coi thi', NULL, NULL),
('','lichcoithi.xinvang', 'Xin vắng', NULL, NULL),
('','lichcoithi.export', 'Export lịch', NULL, NULL),

('','donxinvang.index', 'Xin vắng view', NULL, NULL),
('','donxinvang.store', 'Save xin vắng', NULL, NULL),
('','donxinvang.duyetdon', 'Duyệt đơn', NULL, NULL),
('','donxinvang.delete', 'Xóa đơn', NULL, NULL),

('','quanlyroutes.index', 'Danh sách routes', NULL, NULL),
('','quanlyroutes.store', 'Lưu route', NULL, NULL),
('','quanlyroutes.create', 'Tạo route', NULL, NULL),
('','quanlyroutes.blocking', 'Chặn route', NULL, NULL),
('','quanlyroutes.delete', 'Xóa route', NULL, NULL),

('','phanquyen.index', 'Danh sách quyền', NULL, NULL),
('','phanquyen.store', 'Lưu quyền', NULL, NULL),
('','phanquyen.create', 'Tạo quyền', NULL, NULL),
('','phanquyen.delete', 'Xóa quyền', NULL, NULL),

('','tinnhan.index', 'List tin nhắn', NULL, NULL),

('','tintuc.index', 'Danh sách tin tức', NULL, NULL),
('','tintuc.store', 'Lưu tin tức', NULL, NULL),
('','tintuc.create', 'Tạo tin tức', NULL, NULL),
('','tintuc.delete', 'Xóa tin tức', NULL, NULL);

INSERT INTO `users` (`id`, `user_id`, `email`, `password`, `name`, `connho`, `ngaysinh`, `diachi`, `sodienthoai`, `avatar`, `bomon_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `role_id`, `thongbaomail`, `trangthaihoatdong`) VALUES
('', '60130041', 'mangbao@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Mang Bảo', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'baobao.jpg', 'MTT', NULL, NULL, NULL, NULL, 1, 0, 0),
('', '2004017', 'nguyenkhaccuong@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Khắc Cường', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'MTT', NULL, NULL, NULL, NULL, 2, 0, 0),
('', '2019025', 'nguyenhuynhhuy@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Huỳnh Huy', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'MTT', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2005016', 'tranmanhkhang@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Trần Mạnh Khang', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'MTT', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2008005', 'huynhtuananh@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Huỳnh Tuấn Anh', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'MTT', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '1998003', 'nguyenthanhquynhchau@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Thanh Quỳnh Châu', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'KTPM', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2004006', 'nguyendinhcuong@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Đình Cường', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'KTPM', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2002006', 'lethibichhang@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Lê Thị Bích Hằng', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'KTPM', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2001011', 'nguyendinhhung@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Đình Hưng', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'KTPM', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '1986006', 'nguyendinhai@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Đình Ái', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'TOAN', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2004008', 'nguyenthiha@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Thị Hà', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'TOAN', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2007019', 'nguyencanhhung@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Cảnh Hùng', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'TOAN', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '1987002', 'phamgiahung@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Phạm Gia Hưng', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'TOAN', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2005002', 'nguyenthuydoantrang@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Thủy Đoan Trang', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'HTTQL', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2007031', 'nguyendinhhoangson@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Đình Hoàng Sơn', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'HTTQL', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2001025', 'phamthithuthuy@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Phạm Thị Thu Thúy', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'HTTQL', NULL, NULL, NULL, NULL, 2, 0, 0),
('', '2004009', 'hathithanhnga@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Hà Thị Thanh Ngà', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'HTTQL', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2009026', 'lethanhcao@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Lê Thanh Cao', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'KTXD', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2009005', 'bachvansy@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Bạch Văn Sỹ', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'KTXD', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2015021', 'tranquanghuy@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Trần Quang Huy', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'KTXD', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2012007', 'hochihan@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Hồ Chí Hân', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'KTXD', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2020003', 'truongthanhchung@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Trương Thành Chung', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CKT', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2009008', 'truongdacdung@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Trương Đắc Dũng', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CKT', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2009009', 'duongdinhhao@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Dương Đình Hảo', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CKT', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '1997012', 'quachhoainam@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Quách Hoài Nam', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CKT', NULL, NULL, NULL, NULL, 2, 0, 0),
('', '2007048', 'phamtuananh@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Phạm Tuấn Anh', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CSXD', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '1991003', 'truongtronganh@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Trương Trọng Ánh', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CSXD', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '1981003', 'levanbinh@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Lê Văn Bình', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CSXD', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '1987009', 'tranngocnhuan@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Trần Ngọc Nhuần', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CSXD', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2007011', 'nguyenthienchuong@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Thiên Chương', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CDT', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2007040', 'tranvanhung@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Trần Văn Hùng', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CDT', NULL, NULL, NULL, NULL, 2, 0, 0),
('', '2014006', 'vuthinhai@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Vũ Thị Nhài', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CDT', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2007014', 'nguyenvandinh@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Văn Định', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CDT', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2010015', 'vungocchien@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Vũ Ngọc Chiên', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CTM', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2007018', 'nguyenvanhan@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Văn Hân', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CTM', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '1999004', 'trandoanhung@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Trần Doãn Hùng', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CTM', NULL, NULL, NULL, NULL, 3, 0, 0),
('', '2010001', 'nguyenminhquan@gmail.com', '$2y$10$t6XbG4dcDi.DdOR6GLE7peezGjXdNou2ssYA55RKYiCKEOFGGBYF6', 'Nguyễn Minh Quân', 0, '2000-01-13', 'Cam Ranh - Khánh Hòa', '0372978074', 'user_avt.png', 'CTM', NULL, NULL, NULL, NULL, 2, 0, 0);

INSERT INTO `permission` (`role_id`, `route_id`, `status`, `created_at`, `updated_at`) VALUES
('1','1', '1', NULL, NULL),
('1','2', '1', NULL, NULL),
('1','3', '1', NULL, NULL),
('1','4', '1', NULL, NULL),
('1','5', '1', NULL, NULL),
('1','6', '1', NULL, NULL),
('1','7', '1', NULL, NULL),
('1','8', '1', NULL, NULL),
('1','9', '1', NULL, NULL),
('1','10', '1', NULL, NULL),
('1','11', '1', NULL, NULL),
('1','12', '1', NULL, NULL),
('1','13', '1', NULL, NULL),
('1','14', '1', NULL, NULL),
('1','15', '1', NULL, NULL),
('1','16', '1', NULL, NULL),
('1','17', '1', NULL, NULL),
('1','18', '1', NULL, NULL),
('1','19', '1', NULL, NULL),
('1','20', '1', NULL, NULL),
('1','21', '1', NULL, NULL),
('1','22', '1', NULL, NULL),
('1','23', '1', NULL, NULL),
('1','24', '1', NULL, NULL),
('1','25', '1', NULL, NULL),
('1','26', '1', NULL, NULL),
('1','27', '1', NULL, NULL),
('1','28', '1', NULL, NULL),
('1','29', '1', NULL, NULL),
('1','30', '1', NULL, NULL),
('1','31', '1', NULL, NULL),
('1','32', '1', NULL, NULL),
('1','33', '1', NULL, NULL),
('1','34', '1', NULL, NULL),
('1','35', '1', NULL, NULL),
('1','36', '1', NULL, NULL),
('1','37', '1', NULL, NULL),
('1','38', '1', NULL, NULL),
('1','39', '1', NULL, NULL),
('1','40', '1', NULL, NULL),
('1','41', '1', NULL, NULL),
('1','43', '1', NULL, NULL),
('1','44', '1', NULL, NULL),
('1','45', '1', NULL, NULL),
('1','46', '1', NULL, NULL),
('1','47', '1', NULL, NULL),
('1','48', '1', NULL, NULL),
('1','49', '1', NULL, NULL),
('1','50', '1', NULL, NULL),
('1','51', '1', NULL, NULL),
('1','52', '1', NULL, NULL),
('1','53', '1', NULL, NULL),
('1','54', '1', NULL, NULL),
('1','55', '1', NULL, NULL),
('1','56', '1', NULL, NULL),

('2','17', '1', NULL, NULL),
('2','18', '1', NULL, NULL),
('2','19', '1', NULL, NULL),
('2','20', '1', NULL, NULL),
('2','21', '1', NULL, NULL),
('2','22', '1', NULL, NULL),
('2','23', '1', NULL, NULL),
('2','24', '1', NULL, NULL),
('2','25', '1', NULL, NULL),
('2','26', '1', NULL, NULL),
('2','27', '1', NULL, NULL),
('2','28', '1', NULL, NULL),
('2','29', '1', NULL, NULL),
('2','30', '1', NULL, NULL),
('2','31', '1', NULL, NULL),
('2','32', '1', NULL, NULL),
('2','33', '1', NULL, NULL),
('2','34', '1', NULL, NULL),
('2','35', '1', NULL, NULL),
('2','36', '1', NULL, NULL),
('2','37', '1', NULL, NULL),
('2','38', '1', NULL, NULL),
('2','39', '1', NULL, NULL),
('2','40', '1', NULL, NULL),
('2','41', '1', NULL, NULL),
('2','42', '1', NULL, NULL),
('2','52', '1', NULL, NULL),
('2','53', '1', NULL, NULL),
('2','54', '1', NULL, NULL),
('2','55', '1', NULL, NULL),
('2','56', '1', NULL, NULL),

('3','32', '1', NULL, NULL),
('3','37', '1', NULL, NULL),
('3','38', '1', NULL, NULL),
('3','40', '1', NULL, NULL),
('3','35', '1', NULL, NULL),
('3','52', '1', NULL, NULL),
('3','53', '1', NULL, NULL),
('3','54', '1', NULL, NULL),
('3','55', '1', NULL, NULL),
('3','56', '1', NULL, NULL);

INSERT INTO `buoithi` (`id`, `ngaythi`, `created_at`, `updated_at`) VALUES
('', '2022-04-04', NULL, NULL),
('', '2022-04-04', NULL, NULL),
('', '2022-04-04', NULL, NULL),
('', '2022-04-04', NULL, NULL),
('', '2022-04-04', NULL, NULL),

('', '2022-04-05', NULL, NULL),
('', '2022-04-05', NULL, NULL),
('', '2022-04-05', NULL, NULL),
('', '2022-04-05', NULL, NULL),
('', '2022-04-05', NULL, NULL),

('', '2022-04-06', NULL, NULL),
('', '2022-04-06', NULL, NULL),
('', '2022-04-06', NULL, NULL),
('', '2022-04-06', NULL, NULL),
('', '2022-04-06', NULL, NULL),

('', '2022-04-07', NULL, NULL),
('', '2022-04-07', NULL, NULL),
('', '2022-04-07', NULL, NULL),
('', '2022-04-07', NULL, NULL),
('', '2022-04-07', NULL, NULL),

('', '2022-04-08', NULL, NULL),
('', '2022-04-08', NULL, NULL),
('', '2022-04-08', NULL, NULL),
('', '2022-04-08', NULL, NULL),
('', '2022-04-08', NULL, NULL);

INSERT INTO `monthi_buoithi` (`buoithi_id`, `monthi_id`, `created_at`, `updated_at`) VALUES
(1, 'VLKT', NULL, NULL),
(2, 'LTM', NULL, NULL),
(3, 'TLTV', NULL, NULL),
(4, 'CTN', NULL, NULL),
(5, 'TBMVCH', NULL, NULL),

(6, 'XSTK', NULL, NULL),
(7, 'GT', NULL, NULL),
(8, 'KTTK', NULL, NULL),
(9, 'CHLC', NULL, NULL),
(10, 'MMT', NULL, NULL),

(11, 'DSTT', NULL, NULL),
(12, 'LTHDT', NULL, NULL),
(13, 'TCTC', NULL, NULL),
(14, 'MXD', NULL, NULL),
(15, 'DLHCH', NULL, NULL),

(16, 'TKW', NULL, NULL),
(17, 'PTUDW', NULL, NULL),
(18, 'VLXD', NULL, NULL),
(19, 'NLC', NULL, NULL),
(20, 'SBVL', NULL, NULL),

(21, 'HTTQL', NULL, NULL),
(22, 'TKWKD', NULL, NULL),
(23, 'DHKT', NULL, NULL),
(24, 'CTHTK', NULL, NULL),
(25, 'DCCT', NULL, NULL);

INSERT INTO `phongthi_buoithi` (`buoithi_id`, `phongthi_id`, `created_at`, `updated_at`) VALUES
(1,'G1-101', NULL, NULL),
(2,'G2-101', NULL, NULL),
(3,'G1-103', NULL, NULL),
(4,'G1-104', NULL, NULL),
(5,'G1-105', NULL, NULL),

(6,'G3-101', NULL, NULL),
(7,'G3-101', NULL, NULL),
(8,'G2-101', NULL, NULL),
(9,'G1-101', NULL, NULL),
(10,'G3-101', NULL, NULL),

(11,'G1-101', NULL, NULL),
(12,'G1-101', NULL, NULL),
(13,'G3-101', NULL, NULL),
(14,'G1-101', NULL, NULL),
(15,'G3-101', NULL, NULL),

(16,'G3-101', NULL, NULL),
(17,'G2-101', NULL, NULL),
(18,'G1-101', NULL, NULL),
(19,'G2-101', NULL, NULL),
(20,'G1-101', NULL, NULL),

(21,'G1-101', NULL, NULL),
(22,'G3-101', NULL, NULL),
(23,'G1-101', NULL, NULL),
(24,'G2-101', NULL, NULL),
(25,'G1-101', NULL, NULL);

INSERT INTO `cathi_buoithi` (`buoithi_id`, `cathi_id`, `created_at`, `updated_at`) VALUES
(1,'CA02',  NULL, NULL),
(2,'CA02',  NULL, NULL),
(3,'CA03',  NULL, NULL),
(4,'CA04',  NULL, NULL),
(5,'CA05',  NULL, NULL),

(6, 'CA04',  NULL, NULL),
(7, 'CA02',  NULL, NULL),
(8,'CA03',  NULL, NULL),
(9,'CA04',  NULL, NULL),
(10, 'CA05', NULL, NULL),

(11, 'CA05', NULL, NULL),
(12, 'CA02', NULL, NULL),
(13, 'CA03', NULL, NULL),
(14, 'CA04', NULL, NULL),
(15, 'CA05', NULL, NULL),

(16, 'CA03', NULL, NULL),
(17, 'CA02', NULL, NULL),
(18, 'CA03', NULL, NULL),
(19, 'CA04', NULL, NULL),
(20, 'CA05', NULL, NULL),

(21, 'CA01', NULL, NULL),
(22, 'CA02', NULL, NULL),
(23, 'CA03', NULL, NULL),
(24, 'CA04', NULL, NULL),
(25, 'CA05', NULL, NULL);

INSERT INTO `tintuc` (`id`, `user_id`, `title`, `heading1`, `content1`, `image1`, `heading2`, `content2`, `image2`, `heading3`, `content3`, `image3`, `created_at`, `updated_at`) VALUES
('', '1', 'Tuyển sinh các ngành', 'Tuyển sinh các ngành', 'Tuyển sinh các ngành', 'ntu-cac-nganh-tuyen-sinh-2020.jpg', '', '', '', '', '', '', '2022-05-30 15:28:50', '2022-05-30 15:28:50'),
('', '1', 'Chỉ tiêu tuyển sinh', 'Chỉ tiêu tuyển sinh', 'Chỉ tiêu tuyển sinh', 'ntu-chi-tieu-tuyen-sinh-2022.jpg', '', '', '', '', '', '', '2022-05-30 15:28:50', '2022-05-30 15:28:50'),
('', '1', 'Phương thức xét tuyển', 'Phương thức xét tuyển', 'Phương thức xét tuyển', 'phuong-thuc-xet-tuyen-2022_optimized.jpg', '', '', '', '', '', '', '2022-05-30 15:28:50', '2022-05-30 15:28:50'),
('', '1', 'The 6 technology conference', 'The 6 technology conference', 'The 6 technology conference', 'the-6-technology-conference.jpg', '', '', '', '', '', '', '2022-05-30 15:28:50', '2022-05-30 15:28:50'),
('', '1', 'Viettesol international convention 2022', 'Viettesol international convention 2022', 'Viettesol international convention 2022', 'viettesol-international-convention-2022-1.jpg', '', '', '', '', '', '', '2022-05-30 15:28:50', '2022-05-30 15:28:50'),
('', '1', 'Xét tuyển thẳng đại học chính quy', 'Xét tuyển thẳng đại học chính quy', 'Xét tuyển thẳng đại học chính quy', 'xet-tuyen-thang-dh-chinh-quy-2022.jpg', '', '', '', '', '', '', '2022-05-30 15:28:50', '2022-05-30 15:28:50');
