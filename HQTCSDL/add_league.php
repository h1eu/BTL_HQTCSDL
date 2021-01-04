<?php include_once('./includes/header.php');
    if(isset($_POST['TenGD']))
    {   
        $kq=FALSE;
        if(notNull($_POST)){
            $tengd=$_POST['TenGD'];
            $DiaDiem=$_POST['DiaDiem'];
            $tbegin=$_POST['TimeBegin'];
            $tend=$_POST['TimeEnd'];
            $sotran=$_POST['Tong'];
            $sql="INSERT INTO GIAIDAU
            (
                TenGD,
                DiaDiem,
                TGBatDau,
                TGKetThuc,
                TongTran
            )
            VALUES
            (
                N'$tengd',
                N'$DiaDiem',
                '$tbegin',
                '$tend',
                $sotran
            )";
            $result=sqlsrv_query($conn,$sql);
            if(notNull($result))
            $kq=TRUE;
        }
        if($kq) echo "Thêm thành công";
        else echo "Thêm thất bại";
    }
        
?>

<div class="container border border-dark mt-5">
    <h1>ADD LEAGUE</h1>
    <form action="" method="post">
        <div class="form-group">
          <label for="">Tên Giải Đấu</label>
          <input type="text"
            class="form-control" name="TenGD" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Địa Điểm</label>
          <input type="text"
            class="form-control" name="DiaDiem" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Ngày Bắt Đầu</label>
          <input type="text"
            class="form-control" name="TimeBegin" id="" aria-describedby="helpId" placeholder="yyyy/mm/dd">
        </div>
        <div class="form-group">
          <label for="">Ngày Kết Thúc</label>
          <input type="text"
            class="form-control" name="TimeEnd" id="" aria-describedby="helpId" placeholder="yyyy/mm/dd">
        </div>
        <div class="form-group">
          <label for="">Tổng Số Trận</label>
          <input type="number" name="Tong" value="32" data-decimals="2" min="8" max="256" step="2"/>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-primary">Close</button>
    </form>
</div>
<?php include_once('./includes/footer.php');