CREATE DATABASE QLGD;
USE QLGD;
CREATE TABLE TUYENTHU
(
	MaTT INT IDENTITY(1,1) PRIMARY KEY,
	Ten NVARCHAR(30),
	NgaySinh DATE,
	HeSo FLOAT,
	QuocGia NVARCHAR(30),
);
USE QLGD;
CREATE TABLE GIAIDAU
(
	MaGD INT IDENTITY(1,1) PRIMARY KEY,
	TenGD NVARCHAR(30),
	DiaDiem NVARCHAR(30),
	TGBatDau DATE,
	TGKetThuc DATE
);
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
USE QLGD;
CREATE TABLE BANGDIEM
(
	MATT INT ,
	TranThang INT,
	TranThua INT,
	TranHoa INT,
	HieuSo INT,
	Diem INT,
	FOREIGN KEY (MATT) REFERENCES dbo.TUYENTHU (MaTT)
);

INSERT INTO dbo.TUYENTHU
(
    Ten,
	NgaySinh,
	HeSo,
	QuocGia
)
VALUES
(   N'Lê Văn B',       -- TenTT - nvarchar(41)
    GETDATE(), -- NgaySinh - date
    300,       -- HsElo - float
    N'Hải Phòng'        -- Que - nvarchar(50)
    ),(
		N'Nguyễn Cuốc Huy',       -- TenTT - nvarchar(41)
    GETDATE(), -- NgaySinh - date
    300,       -- HsElo - float
    N'Hải Phòng' 
	)

INSERT INTO dbo.GIAIDAU
(
	TenGD,
	DiaDiem,
	TGBatDau,
	TGKetThuc
)
VALUES
(   N'Bích Quế Viên Bôi',       -- TenGD - nvarchar(30)
    N'Trung Của',       -- DiaDiem - nvarchar(30)
    GETDATE(), -- TGBatDau - date
    GETDATE()  -- TGKetThuc - date
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