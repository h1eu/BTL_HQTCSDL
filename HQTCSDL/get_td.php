<?php
    require_once('./config/config.php');
        if(isset($_POST['MaGD'])){
            global $conn;
            $MaGD=$_POST['MaGD'];
            $sql="select * from TRANDAU WHERE MaGD='$MaGD'";
            $result=sqlsrv_query($conn,$sql);
            $rs=sqlsrv_fetch_all($result);         
        }

        if(isset($_POST['MaTD'])){
            global $conn;
            $MaTD=$_POST['MaTD'];
            $sql="select * from TRANDAU WHERE MaTD='$MaTD'";
            $result=sqlsrv_query($conn,$sql);
            $rs=sqlsrv_fetch_all($result);    
        }
        echo json_encode($rs);