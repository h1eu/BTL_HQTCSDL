<?php
    require_once('../../config/config.php');
        if(isset($_POST['log'])){
            global $conn;
            $sql="select * from viewGD";    
            /*Phai count */
            if($result=sqlsrv_query($conn,$sql))
                $rs=sqlsrv_fetch_all($result);
            else $rs['status']="fail";
        }
        echo json_encode($rs);