Create database qlnv;
use qlnv;
create table Nhanvien(
manv nvarchar(10) primary key not null,
hoten nvarchar(20),
hinhanh nvarchar(30),
xeploai nvarchar(30),
ngayluong int(10),
ngaycong int(10)
);
insert into Nhanvien values 
('A1',N'Ngô Đức Vĩnh','1.png','A',150000,25),
('A2',N'Phạm Thành Công','2.png','A',100000,19);