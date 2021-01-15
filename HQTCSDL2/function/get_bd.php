<?php
    require_once('../config/config.php');
        $kq['log']=false;
        if(isset($_POST['MaGD'])){
            global $conn;
            $MaGD=$_POST['MaGD'];
            $sql="select bd.*,tt.Ten from BANGDIEM as bd,TUYENTHU as tt WHERE bd.MaGD='$MaGD' AND tt.MaTT=bd.MATT ORDER BY bd.Diem DESC,bd.HieuSo DESC";
            $result=sqlsrv_query($conn,$sql);
            $rs=sqlsrv_fetch_all($result);         
        }
        echo json_encode($rs);