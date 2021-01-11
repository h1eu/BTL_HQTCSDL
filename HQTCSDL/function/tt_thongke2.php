<?php
    require_once('../config/config.php');
        if(isset($_POST['age'])){
            global $conn;
            $age = $_POST['age'];
            $sql="exec tt_thongke3 $age";    
            /*Phai count */
            if($result=sqlsrv_query($conn,$sql))
                $rs=sqlsrv_fetch_all($result);
            else $rs['status']="fail";
        }
        echo json_encode($rs);