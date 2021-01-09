<?php
    require_once('./config/config.php');
    if(isset($_POST['MaGD'])&&notNull($_POST)){
        global $conn;
        $MaGD=$_POST['MaGD'];
        $MaTT=$_SESSION['MaTT'];
        $sql="INSERT INTO BANGDIEM
        (
            MaGD,
            MaTT
        )
        VALUES
        (
            '$MaGD',
            '$MaTT'
        )";
        if(sqlsrv_query($conn,$sql))
        {
            echo "success";
        }else echo "fail";
    }
        