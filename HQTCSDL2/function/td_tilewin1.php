<?php
    require_once('../config/config.php');
        if(isset($_POST['MaTD'])){
            global $conn;
            $MaTD=$_POST['MaTD'];   
            $sql="select * from td_tt('$MaTD')";    
            if($result=sqlsrv_query($conn,$sql))
            $rs=sqlsrv_fetch_all($result);
            else $rs['status']="fail";
        }
        echo json_encode($rs);