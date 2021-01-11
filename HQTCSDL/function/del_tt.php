<?php
    require_once('../config/config.php');
    $kq['status']="fail";
    if(checkRole())
        if(isset($_POST['MaTT'])){
            global $conn;
            $MaGD=$_POST['MaGD'];
            $MaTT=$_POST['MaTT'];
            $sql="Delete from BANGDIEM WHERE MaTT='$MaTT' and MaGD='$MaGD'";
            if(sqlsrv_query($conn,$sql))
            $kq['status']="success";
        }
    echo json_encode($kq);