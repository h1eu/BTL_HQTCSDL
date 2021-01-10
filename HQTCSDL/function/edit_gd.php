<?php
    require_once('../config/config.php');
    $kq['status']="fail";
    if(checkRole())
        if(isset($_POST['TenGD'])&&notNull($_POST)){
            global $conn;
            $MaGD=$_POST['MaGD'];
            $TenGD=$_POST['TenGD'];
            $DiaDiem=$_POST['DiaDiem'];
            $TimeStart=$_POST['TimeStart'];
            $TimeEnd=$_POST['TimeEnd'];
            $TongTran=$_POST['TongTran'];
            $TongTT=$_POST['TongTT'];
            $sql="update GIAIDAU SET 
                TenGD=N'$TenGD',
                DiaDiem=N'$DiaDiem', 
                TGBatDau='$TimeStart', 
                TGKetThuc='$TimeEnd', 
                TongTran='$TongTran',
                TongTT='$TongTT'
            WHERE MaGD='$MaGD';";
            if(sqlsrv_query($conn,$sql))
            $kq['status']="success";
        }
    echo json_encode($kq);