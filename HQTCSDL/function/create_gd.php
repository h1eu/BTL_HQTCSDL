<?php
    require_once('../config/config.php');
    $kq['status']="fail";
    if(checkRole())
        if(isset($_POST['TenGD'])&&notNull($_POST)){
            global $conn;
            $TenGD=$_POST['TenGD'];
            $DiaDiem=$_POST['DiaDiem'];
            $TimeStart=$_POST['TimeStart'];
            $TimeEnd=$_POST['TimeEnd'];
            $TongTran=$_POST['TongTran'];
            $TongTT=$_POST['TongTT'];
            $sql="INSERT INTO dbo.GIAIDAU
            (
                TenGD,
                DiaDiem,
                TGBatDau,
                TGKetThuc,
                TongTran,
                TongTT
            )
            VALUES
            (   N'$TenGD',
                N'$DiaDiem',
                '$TimeStart',
                '$TimeEnd', 
                $TongTran,
                $TongTT
            )";
            if(sqlsrv_query($conn,$sql))
            {
                $kq['status']="success";
            }
        }
    echo json_encode($kq);