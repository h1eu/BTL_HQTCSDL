<?php
    require_once('./config/config.php');
        if(isset($_POST['MaTD'])){
            global $conn;
            $MaTD=$_POST['MaTD'];
            $sql="Delete from TRANDAU WHERE MaTD='$MaTD'";
            if(sqlsrv_query($conn,$sql))
            echo "success";
            else echo "fail";
        }