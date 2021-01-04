CREATE DATABASE QLGD;
USE QLGD;
CREATE TABLE TUYENTHU
(
	MaTT INT IDENTITY(1,1) PRIMARY KEY,
	Ten NVARCHAR(30) not null,
	NgaySinh DATE,
	HeSo FLOAT,
	QuocGia NVARCHAR(30) not null,
	username nvarchar(35) not null,
	pass nvarchar(35) not null,
	email nvarchar(45) not null,
	role int default 1
);
USE QLGD;
CREATE TABLE GIAIDAU
(
	MaGD INT IDENTITY(1,1) PRIMARY KEY,
	TenGD NVARCHAR(30) not null,
	DiaDiem NVARCHAR(30) not null,
	TGBatDau DATE not null,
	TGKetThuc DATE not null,
	TongTran int not null
);
--drop table BANGDIEM,TRANDAU,GIAIDAU,TUYENTHU

USE QLGD;
CREATE TABLE TTGIAIDAU
(
	MaGD int not null,
	MaTT int not null,
	FOREIGN KEY(MaGD) REFERENCES dbo.GIAIDAU(MaGD),
	FOREIGN KEY (MaTT) REFERENCES dbo.TUYENTHU(MaTT)
)

USE QLGD;
CREATE TABLE TRANDAU
(
	MaTD INT IDENTITY(1,1)PRIMARY KEY,
	MaGD INT,
	MaTT1 INT,
	MaTT2 INT,
	TGBD DATETIME,
	Kq NVARCHAR(20)
	FOREIGN KEY (MaGD) REFERENCES dbo.GIAIDAU(MaGD),
	FOREIGN KEY(MaTT1) REFERENCES dbo.TUYENTHU(MaTT),
	FOREIGN KEY (MaTT2) REFERENCES dbo.TUYENTHU(MaTT)
);
ALTER TABLE dbo.TRANDAU ADD DEFAULT N'Chưa' FOR Kq;
ALTER TABLE dbo.GIAIDAU ADD DEFAULT 32 FOR TongTran;
USE QLGD;
CREATE TABLE BANGDIEM
(
	MATT INT not null PRIMARY KEY,
	TranThang INT,
	TranThua INT,
	TranHoa INT,
	HieuSo INT,
	Diem INT,
	MaGD INT not null,
	FOREIGN KEY (MATT) REFERENCES dbo.TUYENTHU (MaTT),
	FOREIGN KEY (MaGD) REFERENCES dbo.GIAIDAU (MaGD)
);

/*USE QLGD
CREATE TABLE ACCOUNT
(
	Id int identity(1,1) PRIMARY KEY,
	
	gold int default 10000
)
*/
INSERT INTO dbo.TUYENTHU
(
    Ten,
	NgaySinh,
	HeSo,
	QuocGia,
	username,
	pass,
	email
)
VALUES
(   N'Lê Văn B',       -- TenTT - nvarchar(41)
    GETDATE(), -- NgaySinh - date
    300,       -- HsElo - float
    N'Hải Phòng',        -- Que - nvarchar(50)
	'hieus207',
	'hieu123',
	'hieutr@gmail.com'
    ),(
		N'Nguyễn Cuốc Huy',       -- TenTT - nvarchar(41)
    GETDATE(), -- NgaySinh - date
    300,       -- HsElo - float
    N'Hải Phòng',
	'huyhayho',
	'huy123',
	'huytrk@gm.com'
	)

INSERT INTO dbo.GIAIDAU
(
	TenGD,
	DiaDiem,
	TGBatDau,
	TGKetThuc,
	TongTran
)
VALUES
(   N'Bích Quế Viên Bôi',       -- TenGD - nvarchar(30)
    N'Trung Của',       -- DiaDiem - nvarchar(30)
    GETDATE(), -- TGBatDau - date
    GETDATE(),  -- TGKetThuc - date
	32
)

INSERT INTO dbo.TRANDAU
(
    MaGD,
    MaTT1,
    MaTT2,
    TGBD
)
VALUES
(   1,         -- MaGD - int
    1,         -- MaTT1 - int
    2,         -- MaTT2 - int
    GETDATE() -- TGBD - datetime
)

insert into BANGDIEM
(
	MATT,
	TranThang,
	TranThua,
	TranHoa,
	HieuSo,
	Diem,
	MaGD
)
values
(
	1,
	1,
	0,
	1,
	1,
	3,
	1
),(
	2,
	0,
	1,
	1,
	1,
	1,
	1
)


select * from BANGDIEM
INSERT INTO GIAIDAU ( TenGD, DiaDiem, TGBatDau, TGKetThuc, TongTran ) VALUES (null,null,'2020/10/10','2020/10/10', 32)


create procedure BangXH
