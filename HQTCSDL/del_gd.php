<?php
    require_once('./config/config.php');
        if(isset($_POST['MaGD'])){
            global $conn;
            $MaGD=$_POST['MaGD'];
            $sql="Delete from GIAIDAU WHERE MaGD='$MaGD'";
            if(sqlsrv_query($conn,$sql))
            echo "success";
            else echo "fail";
        }