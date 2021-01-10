<?php
    require_once('../config/config.php');
    $kq['status']="fail";
    if(checkRole())
        if(isset($_POST['MaGD'])){
            global $conn;
            $MaGD=$_POST['MaGD'];
            $sql="Delete from GIAIDAU WHERE MaGD='$MaGD'";
            if(sqlsrv_query($conn,$sql))
            $kq['status']="success";
        }
    echo json_encode($kq);