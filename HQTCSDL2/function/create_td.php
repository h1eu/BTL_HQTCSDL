<?php
    require_once('../config/config.php');
    $kq['status']="fail";
    if(checkRole())
        if(isset($_POST['MaTT1'])&&notNull($_POST)){
            global $conn;
            $MaGD=$_POST['maGD'];
            $MaTT1=$_POST['MaTT1'];
            $MaTT2=$_POST['MaTT2'];
            $TGBD=$_POST['TGBD'];
            $sql="INSERT INTO dbo.TRANDAU
            (
                MaGD,
                MaTT1,
                MaTT2,
                TGBD
            )
            VALUES
            (
                '$MaGD',
                '$MaTT1',
                '$MaTT2',
                '$TGBD'
            )";
            if(sqlsrv_query($conn,$sql))
            $kq['status']="success";
        }
    echo json_encode($kq);