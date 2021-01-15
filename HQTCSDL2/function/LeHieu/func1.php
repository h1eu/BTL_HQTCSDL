<?php
    require_once('../../config/config.php');
        if(isset($_POST['MaTT'])){
            global $conn;
            $MaTT = $_POST['MaTT'];
            $sql="SELECT  dbo.tinhtuoi($MaTT) as tuoi";    
            /*Phai count */
            if($result=sqlsrv_query($conn,$sql))
                $rs=sqlsrv_fetch_all($result);
            else $rs['status']="fail";
        }
        echo json_encode($rs);