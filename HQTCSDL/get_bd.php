<?php
    require_once('./config/config.php');
        $kq['log']=false;
        if(isset($_POST['MaGD'])){
            global $conn;
            $MaGD=$_POST['MaGD'];
            $sql="select * from BANGDIEM WHERE MaGD='$MaGD' ORDER BY Diem DESC";
            $result=sqlsrv_query($conn,$sql);
            $rs=sqlsrv_fetch_all($result);         
        }
        echo json_encode($rs);