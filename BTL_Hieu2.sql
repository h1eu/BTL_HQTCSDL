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
--Tổng số tuyển thủ tham gia?
	MaGD INT IDENTITY(1,1) PRIMARY KEY,
	TenGD NVARCHAR(30) not null,
	DiaDiem NVARCHAR(30) not null,
	TGBatDau DATE not null,
	TGKetThuc DATE not null,
	TongTran int not null,
	TongTT int not null
);

--drop table BANGDIEM,TRANDAU,GIAIDAU,TUYENTHU,TTGIAIDAU



USE QLGD;
CREATE TABLE TRANDAU
(
	MaTD INT IDENTITY(1,1)PRIMARY KEY,
	MaGD INT,
	MaTT1 INT,
	MaTT2 INT,
	TGBD DATETIME,
	Kq int
	FOREIGN KEY (MaGD) REFERENCES GIAIDAU(MaGD),
	FOREIGN KEY(MaTT1) REFERENCES TUYENTHU(MaTT),
	FOREIGN KEY (MaTT2) REFERENCES TUYENTHU(MaTT)
);

ALTER TABLE dbo.TRANDAU ADD DEFAULT -1 FOR Kq
ALTER TABLE dbo.GIAIDAU ADD DEFAULT 32 FOR TongTran;

USE QLGD;
CREATE TABLE BANGDIEM
(
	MATT INT not null,
	TranThang INT,
	TranThua INT,
	TranHoa INT,
	HieuSo INT,
	Diem INT,
	MaGD INT not null,
	FOREIGN KEY (MATT) REFERENCES dbo.TUYENTHU (MaTT),
	FOREIGN KEY (MaGD) REFERENCES dbo.GIAIDAU (MaGD),
	PRIMARY KEY(MATT,MaGD)
);

ALTER TABLE BANGDIEM ADD DEFAULT 0 FOR TranThang;
ALTER TABLE BANGDIEM ADD DEFAULT 0 FOR TranThua;
ALTER TABLE BANGDIEM ADD DEFAULT 0 FOR TranHoa;
ALTER TABLE BANGDIEM ADD DEFAULT 0 FOR HieuSo;
ALTER TABLE BANGDIEM ADD DEFAULT 0 FOR Diem;
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
		N'Nguyễn Quốc Huy',       -- TenTT - nvarchar(41)
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
	TongTran,
	TongTT
)
VALUES
(   N'Bích Quế Viên Bôi',       -- TenGD - nvarchar(30)
    N'Trung Của',       -- DiaDiem - nvarchar(30)
    GETDATE(), -- TGBatDau - date
    GETDATE(),  -- TGKetThuc - date
	32,
	8
)
INSERT INTO dbo.GIAIDAU
(
	TenGD,
	DiaDiem,
	TGBatDau,
	TGKetThuc,
	TongTran,
	TongTT
)
VALUES
(   N'Anh Hùng Bàn Cờ',
    N'Trung Của',       -- DiaDiem - nvarchar(30)
    GETDATE(), -- TGBatDau - date
    GETDATE(),  -- TGKetThuc - date
	32,
	8
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
    2,   -- MaTT1 - int
    3,  -- MaTT2 - int
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
    9,
	3,
	0,
	1,
	2,
	6,
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


select * from GIAIDAU

select * from TUYENTHU

select * from TRANDAU

select * from BANGDIEM

--Tham chiếu nhầm khóa của trận đấu
update TUYENTHU set role=2 WHERE MaTT=1
INSERT INTO GIAIDAU ( TenGD, DiaDiem, TGBatDau, TGKetThuc, TongTran ) VALUES (null,null,'2020/10/10','2020/10/10', 32)

use QLGD
create procedure BangXH
update GIAIDAU SET TenGD='Abc', DiaDiem='def', TGBatDau='2012/12/02', TGKetThuc='2012/12/10', TongTran='32',TongTT='10' WHERE MaGD='2';

update GIAIDAU SET 
                TenGD='Abcd',
                DiaDiem='def', 
                TGBatDau='2012-12-02', 
                TGKetThuc='2012-12-10', 
                TongTran='32',
                TongTT='TongTT' 
            WHERE MaGD='2';

select * from TRANDAU
update TRANDAU SET 
    MaTT1='2', 
    MaTT2='1', 
    TGBD='2021-01-08', 
    Kq=N'Chưa'
WHERE MaTD='3';

INSERT INTO TUYENTHU
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
(   N'Hieu',
    '2000/11/27',
    '300',
    N'VN',
    'hieu2000',
    'hieu123',
    'hieusO@gmai.cokl'
)


INSERT INTO BANGDIEM
(
    MaGD,
    MaTT
)
VALUES
(
    '1',
    '1'
)
--Tạo một thủ tục đưa ra danh sách các tuyển thủ đã có 3 trận thắng trong một giải đấu bất kì
create procedure ds_tuyenthu @maGD nvarchar(30)
as 
begin
select BANGDIEM.MaGD ,TUYENTHU.MaTT ,TUYENTHU.Ten ,TUYENTHU.QuocGia from BANGDIEM 
inner join TUYENTHU on BANGDIEM.MaTT=TUYENTHU.MaTT
Where BANGDIEM.MaGD =@maGD and
BANGDIEM.TranThang >=3
end
--drop procedure ds_tuyenthu
exec ds_tuyenthu @maGD=1
--Viết một thủ tục hiển thị ra danh sách tuyển thủ của một giải đấu nào đó
create procedure ds_tt_gd @magd int
as
begin
select BANGDIEM.MATT,TUYENTHU.Ten ,TUYENTHU.QuocGia from BANGDIEM inner join GIAIDAU on BANGDIEM.MaGD = GIAIDAU.MaGD
inner join TUYENTHU on BANGDIEM.MATT = TUYENTHU.MaTT
Where GIAIDAU.MaGD =@magd
end
--drop procedure ds_tt_gd
exec ds_tt_gd @magd =1

-- Viết hàm trả về danh sách các tuyển thủ có hiệu số >=2 của 1 giải đấu bất kì
create function ds_tt_hs ( @magd int)
returns @dstt TABLE (MaTT int ,Ten nvarchar(30) ,QuocGia nvarchar(30) ,NgaySinh date)
as
begin
insert into @dstt
Select TUYENTHU.MaTT,TUYENTHU.Ten,TUYENTHU.QuocGia,TUYENTHU.NgaySinh from TUYENTHU inner join BANGDIEM on TUYENTHU.MaTT=BANGDIEM.MaTT
where BANGDIEM.MaGD =@magd
and BANGDIEM.HieuSo >=2
return
end
select * from ds_tt_hs(1)
-- Viết hàm trả về tuổi trung bình của các tuyển thủ trong một giải đấu
create function tuoi_tb (@magd int)
returns float
as
begin
declare @tuoitb float
select @tuoitb =Avg(datediff (Year,getdate(),TUYENTHU.NgaySinh)) from BANGDIEM
inner join TUYENTHU on TUYENTHU.MaTT=BANGDIEM.MaTT
inner join GIAIDAU on BANGDIEM.MaGD=GIAIDAU.MaGD
where GIAIDAU.MaGD=@magd
return @tuoitb
end
print( dbo.tuoi_tb(1))
--drop function tuoi_tb
-- Tạo view hiển  thị mã tuyển thủ,tên tuyển thủ,quốc gia ,ngày dinh ,Diem trong  giải đấu
create view viewTT(MaTT,Ten,QuocGia,NgaySinh,Diem)
as
select TUYENTHU.MaTT,TUYENTHU.Ten,TUYENTHU.QuocGia,TUYENTHU.NgaySinh,BANGDIEM.Diem from TUYENTHU
inner join BANGDIEM on TUYENTHU.MaTT=BANGDIEM.MaTT
select * from viewTT
-- Tạo view hiển thị mã giải đấu , tên tuyển thủ  , quốc gia số trận thắng , số trận hòa , số trận thua , hiệu số , điểm số của các tuyển thủ tham gia vào giải đấu
create view viewGD (MaGD,TenTT,QuocGia,TranThang,TranHoa,TranThua,Hieuso,Diem)
as
select BANGDIEM.MaGD,TUYENTHU.Ten,TUYENTHU.QUOCGIA,BANGDIEM.TranThang,BANGDIEM.TranHoa,BANGDIEM.TranThua,BANGDIEM.HieuSo,BANGDIEM.Diem from TUYENTHU
inner join BANGDIEM on TUYENTHU.MaTT=BANGDIEM.MaTT


--drop view viewGD ,
select * from viewGD

--Tạo trigger ktra nếu giải đấu có số tuyển thủ tham gia đã đủ thì không cho phép thêm tuyển thủ vào giải đấu nữa
create view TT_GD
as
select BANGDIEM.MaTT,GIAIDAU.TongTT,GIAIDAU.MaGD from GIAIDAU inner join BANGDIEM on BANGDIEM.MaGD=GIAIDAU.MaGD 
select * from TT_GD
drop view TT_GD
create trigger ktra_sl_tt
on BANGDIEM
for insert
as
declare @sltt int
declare @ttdk int
set @sltt = (select TongTT from TT_GD group by TongTT)
set @ttdk =( select count(MaTT)from TT_GD)
if(@ttdk>=@sltt)
begin
print('Giải đấu đã đủ tuyển thủ tham gia')
rollback tran
end
drop trigger ktra_sl_tt
select * from GIAIDAU


-- Tạo trigger sao cho khi xóa 1 giải đấu trong bảng giải đấu , thì thông tin về bảng điểm của giải đấu đó cũng bị xóa
create trigger xoa_gd 
on GIAIDAU
FOR DELETE
AS
BEGIN
DELETE FROM BANGDIEM
WHERE MaGD= (select MaGD from DELETED)
PRINT N'Xóa thành công '
end