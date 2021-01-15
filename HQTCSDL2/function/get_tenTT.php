<?php
    require_once('../config/config.php');
        if(isset($_POST['MaTT'])){
            global $conn;
            $MaTT=$_POST['MaTT'];
            $sql="select Ten from GIAIDAU WHERE MaTT='$MaTT'";
            $result=sqlsrv_query($conn,$sql);
            $rs=sqlsrv_fetch_all($result);         
        }
        echo json_encode($rs);