create database qlsv_php;
use qlsv_php;
create table hocsinh(
	mahs varchar(10) not null primary key,
    tenhs nvarchar(30),
    hinhanh nvarchar(30),
    xeploai nvarchar(30),
    hk1 int(10),
    hk2 int(10)
);
insert into hocsinh values 
('A1',N'Ngô Đúc Vĩnh',N'1.png','A',4,5),
('A2 ',N'Phạm Thanh công',N'2.png','B',8,9);