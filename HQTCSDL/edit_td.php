<?php
    require_once('./config/config.php');
        if(isset($_POST['MaTD'])&&notNull($_POST)){
            global $conn;
            $MaTD=$_POST['MaTD'];
            $MaTT1=$_POST['MaTT1'];
            $MaTT2=$_POST['MaTT2'];
            $TGBD=$_POST['TGBD'];
            $Kq=$_POST['Kq'];
            $sql="update TRANDAU SET 
            MaTT1='$MaTT1', 
            MaTT2='$MaTT2', 
            TGBD='$TGBD', 
            Kq=N'$Kq'
            WHERE MaTD='$MaTD';";
            if(sqlsrv_query($conn,$sql))
            {
                echo "success";
            }else echo "fail".$sql;
        }