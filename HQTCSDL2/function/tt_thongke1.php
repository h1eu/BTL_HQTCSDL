<?php
    require_once('../config/config.php');
        if(isset($_POST['MaTT1'])&&(isset($_POST['MaTT2']))){
            global $conn;
            $MaTT1=$_POST['MaTT1'];   
            $MaTT2=$_POST['MaTT2'];   
            $sql="exec tt_thongke $MaTT1,$MaTT2";    
            /*Phai count */
            if($result=sqlsrv_query($conn,$sql))
                $rs=sqlsrv_fetch_all($result);
            else $rs['status']="fail";
        }
        echo json_encode($rs);