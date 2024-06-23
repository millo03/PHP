Create database qltd;
use qltd;
create table tiendien(
	makh varchar(10) not null primary key,
    tenkh nvarchar(30),
    hinhanh varchar(30),
    sodien int(10),
    hinhthuc varchar(10)
);
insert into tiendien values 
('D1',N'Hà Mạnh Đào','1.jpg',900,'Kd'),
('D2',N'Nguyễn Thị Nhung','2.jpg',500,'Gd');