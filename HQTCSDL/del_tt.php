<?php
    require_once('./config/config.php');
        if(isset($_POST['MaTT'])){
            global $conn;
            $MaTT=$_POST['MaTT'];
            $sql="Delete from BANGDIEM WHERE MaTT='$MaTT'";
            if(sqlsrv_query($conn,$sql))
            echo "success";
            else echo "fail";
        }else echo "fail";