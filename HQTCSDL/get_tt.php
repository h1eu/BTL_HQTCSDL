<?php
    require_once('./config/config.php');
        if(isset($_POST['maGD'])){
            global $conn;
            $MaGD=$_POST['maGD'];
            $sql="SELECT MaTT,Ten From TUYENTHU WHERE MaTT in (select MaTT from TTGIAIDAU WHERE MaGD='$MaGD')";
            $result=sqlsrv_query($conn,$sql);
            $rs=sqlsrv_fetch_all($result);         
        }
        echo json_encode($rs);