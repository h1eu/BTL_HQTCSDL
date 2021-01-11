<?php
    require_once('../config/config.php');
        if(isset($_POST['MaTT'])){
            global $conn;
            $MaTT=$_POST['MaTT'];   
            $sql="select * from TUYENTHU WHERE MaTT='$MaTT'";    
            if($result=sqlsrv_query($conn,$sql))
            {
                $rs=array();
                $rs=sqlsrv_fetch_all($result);
                if(count($rs)!=0){
                    $sql="select dbo.tt_tilewin1('$MaTT')as tilewin";    
                    $result=sqlsrv_query($conn,$sql);
                    $rs2=sqlsrv_fetch_all($result);
                    array_push($rs,$rs2[0]);
                }
                else $rs['status']="fail";
            }            
            else $rs['status']="fail";
        }
        echo json_encode($rs);