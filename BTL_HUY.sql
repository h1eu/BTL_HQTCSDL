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
CREATE TABLE TTGIAIDAU
(
	MaGD int not null,
	MaTT int not null,
	FOREIGN KEY(MaGD) REFERENCES dbo.GIAIDAU(MaGD),
	FOREIGN KEY (MaTT) REFERENCES dbo.TUYENTHU(MaTT),
	PRIMARY KEY (MaGD,MaTT)
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
	FOREIGN KEY (MaGD) REFERENCES GIAIDAU(MaGD),
	FOREIGN KEY(MaTT1) REFERENCES TUYENTHU(MaTT),
	FOREIGN KEY (MaTT2) REFERENCES TUYENTHU(MaTT)
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

insert into TTGIAIDAU
(
	MaGD,
	MaTT
)
values(
	1,
	1
),(
	1,
	2
)
select * from GIAIDAU

select * from TUYENTHU

select * from TRANDAU

select * from BANGDIEM

select * from TTGIAIDAU
--Tham chiếu nhầm khóa của trận đấu

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
			--Tạo một thủ tục đưa ra danh sách các tuyển thủ đã có 3 trận thắng trong một giải đấu bất kì
USE QLGD
create procedure ds_tuyenthu @tenGD nvarchar(30)
as 
begin
select TTGIAIDAU.MaGD ,TUYENTHU.MaTT ,TUYENTHU.Ten ,TUYENTHU.QuocGia from TTGIAIDAU inner join GIAIDAU on TTGIAIDAU.MaGD = GIAIDAU.MAGD
inner join BANGDIEM on TTGIAIDAU.MaTT = BANGDIEM.MaTT
inner join TUYENTHU on TTGIAIDAU.MaTT=TUYENTHU.MaTT
Where GIAIDAU.TenGD =@tenGD and
BANGDIEM.TranThang >3
end
--drop procedure ds_tuyenthu
exec ds_tuyenthu @tenGD='Bích Quế Viên Bôi'
--Viết một thủ tục hiển thị ra danh sách tuyển thủ của một giải đấu nào đó
create procedure ds_tt_gd @tengd nvarchar(30)
as
begin
select TTGIAIDAU.MATT,TUYENTHU.Ten ,TUYENTHU.QuocGia from TTGIAIDAU inner join GIAIDAU on TTGIAIDAU.MaGD = GIAIDAU.MaGD
inner join TUYENTHU on TTGIAIDAU.MATT = TUYENTHU.MaTT
Where GIAIDAU.TenGD =@tengd
end
exec ds_tt_gd @tengd ='Bích Quế Viên Bôi'
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
declare @tuoi float
declare @tuoitb float
set @tuoi = (select Year(getdate())-Year(TUYENTHU.NgaySinh) from TUYENTHU
inner join TTGIAIDAU on TUYENTHU.MaTT=TTGIAIDAU.MaTT
where TTGIAIDAU.MaGD=@magd)
set @tuoitb = avg(@tuoi)
return @tuoitb
end
print (dbo.tuoi_tb(1))
--cần sửa lại
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


--drop view viewGD
select * from viewGD

--Tạo trigger ktra nếu giải đấu có số tuyển thủ tham gia đã đủ thì không cho phép thêm tuyển thủ vào giải đấu nữa
create trigger tra_sl_tt 
on GIAIDAU
FOR insert
as
declare @sltt int
declare @ttdadk int
select TTGIAIDAU.MaGD,TTGIAIDAU.MaTT,GIAIDAU.TongTT from TTGIAIDAU inner join GIAIDAU on TTGIAIDAU.MAGD =GIAIDAU.MaGD
group by (TTGIAIDAU.MaGD)
set @sltt = GIAIDAU.TongTT
set @ttdk = cout(TTGIAIDAU.MaTT)
if(@ttdk>=@sltt)
begin
print('Giải đấu đã đủ tuyển thủ tham gia')
rollback tran
end
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