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
	Kq NVARCHAR(20)
	FOREIGN KEY (MaGD) REFERENCES GIAIDAU(MaGD),
	FOREIGN KEY(MaTT1) REFERENCES TUYENTHU(MaTT),
	FOREIGN KEY (MaTT2) REFERENCES TUYENTHU(MaTT)
);

ALTER TABLE dbo.TRANDAU ADD DEFAULT N'-1' FOR Kq;
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
(   2,         -- MaGD - int
    5,         -- MaTT1 - int
    9,         -- MaTT2 - int
    '2020/12/07' -- TGBD - datetime
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


update TUYENTHU set role=2 WHERE MaTT=1
INSERT INTO GIAIDAU ( TenGD, DiaDiem, TGBatDau, TGKetThuc, TongTran ) VALUES (null,null,'2020/10/10','2020/10/10', 32)

use QLGD
create procedure BangXH
update GIAIDAU SET TenGD='Abdc', DiaDiem='def', TGBatDau='2012/12/02', TGKetThuc='2012/12/10', TongTran='32',TongTT='10' WHERE MaGD='1';

update GIAIDAU SET 
                TenGD='Abcd',
                DiaDiem='def', 
                TGBatDau='2012-12-02', 
                TGKetThuc='2012-12-10', 
                TongTran='32',
                TongTT='TongTT' 
            WHERE MaGD='2';

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

--Trigger
--Triger
/*C1:Không cho xóa các trận đấu đã có kq*/
Create trigger td_xoa
on TRANDAU for delete
as
begin
declare @sl int
set @sl = (select count(Kq) from deleted where(Kq!=0))
if (@sl>0)
	begin
		print(N'Không thể xóa trận đấu đã có kết quả')
		rollback tran
	end
end

/*C2:Không cho xóa cập nhật trận đấu đã có kq*/
Create trigger td_sua
on TRANDAU for update
as
begin
declare @sl1 int,@sl2 int
set @sl1 = (select count(Kq) from deleted where(Kq!=-1))
if (@sl1>0)
	begin
		print(N'Không thể cập nhật trận đấu đã có kết quả')
		rollback tran
	end
end
drop trigger td_sua

/*C3:Không cho xóa tuyển thủ đã thi đấu khỏi giải đấu, 2 hướng xử lý 1 là tự động xóa luôn các trận đấu trong giải đấu nếu lỗi thì k xóa đc tt, 2 là check xem có*/
Create trigger tt_xoa
on BANGDIEM for delete
as
begin
	declare @matt int,@maGD int
	set @matt = (select MATT FROM deleted);
	set @maGD = (select MaGD FROM deleted);
	Begin Try
		delete from TRANDAU where (MaTT1=@matt or MaTT2=@matt) AND (MaGD=@maGD)
	End Try
	Begin Catch
		print(N'Không thể xóa các tuyển thủ đã thi đấu trong giải đấu')
		rollback tran
	End Catch
end


/*C4: Không cho phép thêm trận đấu lệch thời gian giải đấu hoặc chứa tuyển thủ chưa đăng ký giải đấu*/
Create trigger td_them
on TRANDAU for insert
as
begin
	declare @tgbdGD date,@tgktGD date,@tgTD date,@maGD int,@MaTT1 int,@MaTT2 int
	set @maGD = (select MaGD from inserted)
	set @tgbdGD=(select TGBatDau From GIAIDAU Where MaGD=@maGD)
	set @tgktGD=(select TGKetThuc From GIAIDAU Where MaGD=@maGD)
	set @tgTD = (select TGBD From inserted)
	set @MaTT1 = (select MaTT1 From inserted)
	set @MaTT2 = (select MaTT2 From inserted)

	declare @sotran1 int,@sotran2 int
	set @sotran1=(select count(MaTT) from BANGDIEM Where @maGD=MaGD and (MaTT=@MaTT1))
	set @sotran2=(select count(MaTT) from BANGDIEM Where @maGD=MaGD and (MaTT=@MaTT2))
	if((@tgTD>@tgktGD or @tgTD<@tgbdGD)OR(@sotran1=0)or(@sotran2=0))
	begin
		print(N'Không thể thêm trận đấu ngoài thời gian hoặc 1 trong 2 tuyển thủ chưa đăng ký tham gia!')
		rollback tran
	end
	
end


/*C5: Không cho phép sửa trận đấu lệch thời gian giải đấu hoặc chứa tuyển thủ chưa đăng ký giải đấu*/
Create trigger td_sua2
on TRANDAU for update
as
begin
	declare @tgbdGD date,@tgktGD date,@tgTD date,@maGD int,@MaTT1 int,@MaTT2 int
	set @maGD = (select MaGD from inserted)
	set @tgbdGD=(select TGBatDau From GIAIDAU Where MaGD=@maGD)
	set @tgktGD=(select TGKetThuc From GIAIDAU Where MaGD=@maGD)
	set @tgTD = (select TGBD From inserted)
	set @MaTT1 = (select MaTT1 From inserted)
	set @MaTT2 = (select MaTT2 From inserted)

	declare @sotran1 int,@sotran2 int
	set @sotran1=(select count(MaTT) from BANGDIEM Where @maGD=MaGD and (MaTT=@MaTT1))
	set @sotran2=(select count(MaTT) from BANGDIEM Where @maGD=MaGD and (MaTT=@MaTT2))
	if((@tgTD>@tgktGD or @tgTD<@tgbdGD)OR(@sotran1=0)or(@sotran2=0))
	begin
		print(N'Không thể thêm trận đấu ngoài thời gian hoặc 1 trong 2 tuyển thủ chưa đăng ký tham gia!')
		rollback tran
	end
end

/*C6: ERROR Không cho 1 tuyển thủ đăng ký các giải đấu trùng thời gian*/
Create trigger bd_them
on BANGDIEM for insert
as
begin
	declare @tgbdGD date,@tgktGD date,@tgTD date,@maGD int,@MaTT int;
	set @maGD = (select MaGD from inserted)
	set @MaTT = (select MATT from inserted)
	set @tgbdGD=(select TGBatDau From GIAIDAU Where MaGD=@maGD)
	set @tgktGD=(select TGKetThuc From GIAIDAU Where MaGD=@maGD)
	declare @sl int
	set @sl=0
	set @sl=(select count(MaGD) from GIAIDAU where MaGD=@maGD and ( (TGBatDau>=@tgbdGD)AND(TGBatDau<=@tgktGD)) OR ((TGBatDau<=@tgbdGD)AND(TGKetThuc>=@tgbdGD)) AND MaGD in (select MaGD from BANGDIEM where MATT=@MaTT and MaGD=@maGD))
	if(@sl>0)
	begin
		set @maGD=(select MaGD from BANGDIEM where MATT=@MaTT and MaGD in(Select MaGD From GIAIDAU WHERE ( (TGBatDau>=@tgbdGD)AND(TGBatDau<=@tgktGD)) OR ((TGBatDau<=@tgbdGD)AND(TGKetThuc>=@tgbdGD))))
		print @MaTT
		print @tgbdGD
		print @tgktGD
		print @sl
		print @maGD
		print(N'Không thể đăng ký giải đấu trùng thời gian!')
		rollback tran
	end
end

drop trigger bd_them
/* Lỗi trigger ko rõ lý do
test
USE QLGD

GO
declare @sl int
set @sl=(select count(MaGD) from BANGDIEM where MATT=6 and MaGD in(Select MaGD From GIAIDAU WHERE ( (TGBatDau>='2020/11/27')AND(TGBatDau<='2020/12/27')) OR ((TGBatDau<='2020/11/27')AND(TGKetThuc>='2020/11/27'))))
print @sl
*/

/*C7:Không cho sửa thời gian giải đấu*/

Create trigger gd_sua2
on GIAIDAU for update
as
begin
declare @tgbd date,@tgkt date,@tgbd2 date,@tgkt2 date
set @tgbd = (select TGBatDau from deleted)
set @tgkt = (select TGKetThuc from deleted)
set @tgbd2 = (select TGBatDau from inserted)
set @tgkt2 = (select TGKetThuc from inserted)
if ((@tgbd!=@tgbd2)or(@tgkt!=@tgkt2))
	begin
		print(N'Không thể cập nhật thời gian các giải đấu')
		rollback tran
	end
end


drop trigger gd_sua2

/*C7:Không cho cập nhật kết quả trận đấu khi chưa đủ số trận tối thiểu*/
Create trigger td_sua3
	on TRANDAU for update
	as
	begin
	declare @MaTD int,@MaGD int,@Kq nvarchar(10),@sotrandau int,@Tongtran int
	set @MaTD = (select MaTD from inserted)
	set @MaGD = (select MaGD from inserted)
	set @Kq = (select Kq from inserted)
	set @sotrandau = (select count(MaTD) From TRANDAU where MaGD=@MaGD)
	set @Tongtran = (select TongTT From GIAIDAU Where MaGD=@MaGD)
	set @Tongtran=@Tongtran/2+1;
	if(@Kq!=-1 and @sotrandau<@Tongtran)
	begin
		print(N'Không thể cập nhật kết quả trận đấu khi chưa đủ số trận tối thiểu')
			rollback tran
	end
end
drop trigger gd_sua3

/*C7:Không cho cập nhật kết quả trận đấu khi chưa đủ số trận tối thiểu*/
Create trigger td_kq
	on TRANDAU for update
	as
	begin
	declare @Kq nvarchar(10),@MaTT1 int,@MaTT2 int,@TranHoa int,@TranThang int,@TranThua int,@Diem int,@HieuSo int,@MaGD int,@TranHoa2 int,@TranThang2 int,@TranThua2 int,@Diem2 int,@HieuSo2 int
	set @Kq = (select Kq from inserted)
	set @MaTT1 = (select MaTT1 from inserted)
	set @MaTT2 = (select MaTT2 from inserted)
	set @MaGD = (select MaGD from inserted)
	set @TranHoa = (select TranHoa from BANGDIEM where MATT=@MaTT1 and MaGD=@MaGD)
	set @TranThang = (select TranThang from BANGDIEM where MATT=@MaTT1 and MaGD=@MaGD)
	set @TranThua = (select TranThua from BANGDIEM where MATT=@MaTT1 and MaGD=@MaGD)
	set @HieuSo = (select HieuSo from BANGDIEM where MATT=@MaTT1 and MaGD=@MaGD)
	set @Diem = (select Diem from BANGDIEM where MATT=@MaTT1 and MaGD=@MaGD)
	set @TranHoa2 = (select TranHoa from BANGDIEM where MATT=@MaTT1 and MaGD=@MaGD)
	set @TranThang2 = (select TranThang from BANGDIEM where MATT=@MaTT1 and MaGD=@MaGD)
	set @TranThua2 = (select TranThua from BANGDIEM where MATT=@MaTT1 and MaGD=@MaGD)
	set @HieuSo2 = (select HieuSo from BANGDIEM where MATT=@MaTT1 and MaGD=@MaGD)
	set @Diem2 = (select Diem from BANGDIEM where MATT=@MaTT1 and MaGD=@MaGD)
	if(@Kq!=-1)
	begin try
		if(@Kq=0)
		begin
			update BANGDIEM set TranHoa=(@TranHoa+1) where MaGD=@MaGD and MATT=@MaTT1
			update BANGDIEM set TranHoa=(@TranHoa2+1) where MaGD=@MaGD and MATT=@MaTT2
			update BANGDIEM set Diem=(@Diem+1) where MaGD=@MaGD and MATT=@MaTT1
			update BANGDIEM set Diem=(@Diem2+1) where MaGD=@MaGD and MATT=@MaTT2
		end
		else
			if(@Kq=@MaTT1)
					begin
			update BANGDIEM set TranThang=(@TranThang+1) where MaGD=@MaGD and MATT=@MaTT1
			update BANGDIEM set TranThua=(@TranThua2+1) where MaGD=@MaGD and MATT=@MaTT2
			update BANGDIEM set Diem=(@Diem+2) where MaGD=@MaGD and MATT=@MaTT1
			update BANGDIEM set HieuSo=(@HieuSo+1) where MaGD=@MaGD and MATT=@MaTT1
			update BANGDIEM set HieuSo=(@HieuSo2-1) where MaGD=@MaGD and MATT=@MaTT2
					end
			else
			if(@Kq=@MaTT2)
				begin
			update BANGDIEM set TranThang=(@TranThang2+1) where MaGD=@MaGD and MATT=@MaTT2
			update BANGDIEM set TranThua=(@TranThua+1) where MaGD=@MaGD and MATT=@MaTT1
			update BANGDIEM set Diem=(@Diem2+2) where MaGD=@MaGD and MATT=@MaTT2
			update BANGDIEM set HieuSo=(@HieuSo2+1) where MaGD=@MaGD and MATT=@MaTT2
			update BANGDIEM set HieuSo=(@HieuSo-1) where MaGD=@MaGD and MATT=@MaTT1
					end
	end try
	begin catch
		print 'Không thể cập nhật bảng điểm'
		rollback tran
	end catch
end


drop trigger td_kq

-- VIEW-----------------------
/*Tạo view BXH 20 tuyển thủ thắng nhiều nhất và số trận thắng*/
create view BXH
as
select tt2.MaTT,tt2.Ten,(YEAR(GETDATE())-YEAR(tt2.NgaySinh)) as tuoi,tt2.HeSo,dt.Win from TUYENTHU as tt2,(select TOP 20 tt.MaTT,Count(Kq) as Win from TUYENTHU as tt,TRANDAU as td Where td.Kq=tt.MaTT GROUP BY MaTT ORDER BY Count(Kq) DESC)as dt where tt2.MaTT=dt.MaTT

select * from BXH

/*Tạo view BXH 10 tuyển thủ thua nhiều nhất và số trận thua*/
create view BXH_Thua
as
Select TOP 10 tt.MaTT,tt.Ten,Count(td.Kq) as Thua from TUYENTHU as tt,TRANDAU as td WHERE ((tt.MaTT=td.MaTT1 and td.Kq<>tt.MaTT) or (tt.MaTT=td.MaTT2 and td.Kq<>tt.MaTT)) and(td.Kq!=-1 and td.Kq!=0) group by tt.MaTT,tt.Ten
select * from BXH_Thua

drop view BXH_Thua


--FUNCTION---------
/*Viết một hàm để tính tỷ lệ thắng của 1 tt bất kỳ*/
Create function tt_tilewin1(@MaTT int)
Returns float
As
Begin
	declare @tile float,@sum float,@win float
	set @sum= (select count(MaTD) From TRANDAU Where MaTT1=@MaTT or MaTT2=@MaTT)
	set @win= (select count(MaTD) From TRANDAU Where Kq=@MaTT)
	set @tile=(@win/@sum)*100
	return @tile
End


/*Viết một hàm để tính tỷ lệ thắng của 1 td bất kỳ tra ve ti le thang cua tt 1*/
Create function td_tilewin(@MaTD int)
Returns float
As
Begin
	declare @tile float,@sum float,@win float,@elo1 float,@elo2 float,@maGD int,@MaTT1 int,@MaTT2 int,@tile1 float,@tile2 float,@tile3 float
	set @maGD=(select MaGD from GIAIDAU where MaGD in (select MaGD From TRANDAU Where MaTD=@MaTD))
	set @MaTT1=(select MaTT1 From TRANDAU where MaTD=@MaTD)
	set @MaTT2=(select MaTT2 From TRANDAU where MaTD=@MaTD)
	set @elo1=(select HeSo from TUYENTHU where MaTT=@MaTT1)
	set @elo2=(select HeSo from TUYENTHU where MaTT=@MaTT2)
	set @win=(select count(MaTD) FROM TRANDAU WHERE MaGD=@maGD AND (MaTT1=@MaTT1 OR MaTT1=@MaTT2) AND (MaTT2=@MaTT1 OR MaTT2=@MaTT2) AND Kq=@MaTT1)
	set @sum=(select count(MaTD) FROM TRANDAU WHERE MaGD=@maGD AND (MaTT1=@MaTT1 OR MaTT1=@MaTT2) AND (MaTT2=@MaTT1 OR MaTT2=@MaTT2))
	if(@sum=0) set @tile1=0.2
	else
	set @tile1=(@win/@sum)*0.4

	set @tile2=(@elo1/@elo2)*0.3
	if(dbo.tt_tilewin1(@MaTT2)=0) set @tile3=0.15
	else
	set @tile3=(dbo.tt_tilewin1(@MaTT1)/(dbo.tt_tilewin1(@MaTT1)+dbo.tt_tilewin1(@MaTT2)))*0.3

	set @tile=@tile1+@tile2+@tile3
	return @tile
End

select dbo.tt_tilewin1('9')as tilewin

/*Hàm đưa ra thông tin chi tiết 1 trận đấu và tỉ lệ thắng*/
CREATE FUNCTION td_tt (@MaTD int)
RETURNS @new_table TABLE (MaTD int,MaTT1 int,TenTT1 nvarchar(50),MaTT2 int,TenTT2 nvarchar(50),TGBD date,Kq nvarchar(50),tilewin float)
AS
BEGIN
	DECLARE @matt1 int,@matt2 int,@ten1 nvarchar(50),@ten2 nvarchar(50),@tg date,@rs nvarchar(10),@tile float,@winner nvarchar(50)
	select @matt1=MaTT1,@matt2=MaTT2,@tg=TGBD,@rs=Kq from TRANDAU where MaTD=@MaTD
	select @ten1=Ten FROM TUYENTHU Where MaTT=@matt1
	select @ten2=Ten FROM TUYENTHU Where MaTT=@matt2
	if(@rs=0) set @winner=N'Hòa'
	else
	if(@rs=-1) set @winner=N'Chưa'
	else
	select @winner=Ten From TUYENTHU where MaTT=@rs
	select @tile=dbo.td_tilewin(@MaTD)
    INSERT INTO @new_table VALUES (@MaTD,@matt1,@ten1,@matt2,@ten2,@tg,@winner,@tile)
    RETURN
END

drop function td_tt
select * from td_tt('34')


--PROCEDURE--------------
/* Thủ tục thống kê 10 trận gần nhất của 2 tuyển thủ*/
CREATE PROCEDURE tt_thongke @MaTT1 int,@MaTT2 int
AS
Begin
	select TOP 10 * from TRANDAU where (MaTT1=@MaTT1 OR MaTT1=@MaTT2) AND (MaTT2=@MaTT1 OR MaTT2=@MaTT2) AND (Kq!=-1) ORDER BY TGBD DESC
end

drop procedure tt_thongke
exec tt_thongke 5,9
/* Thủ tục thống kê 10 tuyển thủ thắng nhiều nhất*/
CREATE PROCEDURE tt_thongke2
AS
Begin
	select TOP 10 Kq,Count(Kq) as NumWin from TRANDAU WHERE (Kq!=0) And (Kq!=-1) GROUP BY Kq ORDER BY Count(Kq) DESC 
end

drop procedure tt_thongke3
/* Thủ tục đưa ra danh sách 10 tuyển thủ dưới số tuổi nhập vào có nhiều trận thắng nhất*/
CREATE PROCEDURE tt_thongke3 @tuoi int
AS
Begin
	Select TOP 10 tt.MaTT,tt.Ten,Count(td.Kq) as Thang from TUYENTHU as tt,TRANDAU as td WHERE @tuoi>=(YEAR(GETDATE())-YEAR(tt.NgaySinh)) and ((tt.MaTT=td.MaTT1 and td.Kq=tt.MaTT) or (tt.MaTT=td.MaTT2 and td.Kq=tt.MaTT)) and(td.Kq!=-1 and td.Kq!=0) group by tt.MaTT,tt.Ten ORDER BY Thang DESC
end

exec tt_thongke2
exec tt_thongke3 30






