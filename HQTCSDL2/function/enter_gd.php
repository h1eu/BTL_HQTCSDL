<?php
    require_once('../config/config.php');
    $kq['status']="fail";
    if(checkRole(1))
        if(isset($_POST['MaGD'])&&notNull($_POST)){
            global $conn;
            $MaGD=$_POST['MaGD'];
            $MaTT=$_SESSION['MaTT'];
            $sql="INSERT INTO BANGDIEM
            (
                MaGD,
                MaTT
            )
            VALUES
            (
                '$MaGD',
                '$MaTT'
            )";
            if(sqlsrv_query($conn,$sql))
            $kq['status']="success";
            }
    echo json_encode($kq);
        