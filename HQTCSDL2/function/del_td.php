<?php
    require_once('../config/config.php');
    $kq['status']="fail";
    if(checkRole())
        if(isset($_POST['MaTD'])){
            global $conn;
            $MaTD=$_POST['MaTD'];
            $sql="Delete from TRANDAU WHERE MaTD='$MaTD'";
            if(sqlsrv_query($conn,$sql))
            $kq['status']="success";
        }
    echo json_encode($kq);