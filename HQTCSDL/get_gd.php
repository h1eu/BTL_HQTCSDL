<?php
    require_once('./config/config.php');
        if(isset($_POST['MaGD'])){
            global $conn;
            $MaGD=$_POST['MaGD'];
            $sql="select * from GIAIDAU WHERE MaGD='$MaGD'";
            $result=sqlsrv_query($conn,$sql);
            $rs=sqlsrv_fetch_all($result);         
        }
        echo json_encode($rs);