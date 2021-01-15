<?php
    require_once('../../config/config.php');
        if(isset($_POST['MaGD'])){
            global $conn;
            $MaGD = $_POST['MaGD'];
            $sql="exec dbo.ds_tuyenthu @maGD='$MaGD'";    
            /*Phai count */
            if($result=sqlsrv_query($conn,$sql))
                $rs=sqlsrv_fetch_all($result);
            else $rs['status']="fail";
        }
        echo json_encode($rs);