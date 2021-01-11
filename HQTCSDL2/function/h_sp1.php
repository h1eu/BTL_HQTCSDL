<?php
    require_once('../config/config.php');
        if(isset($_POST['MaGD'])){
            global $conn;
            $maGD=$_POST['MaGD'];   
            $sql="select * from GIAIDAU WHERE MaGD='$maGD'";    
            if($result=sqlsrv_query($conn,$sql))
            {
                $rs=array();
                $rs=sqlsrv_fetch_all($result);
                if(count($rs)!=0){
                    $sql="select dbo.ds_tuyenthu('$maGD')";    
                    $result=sqlsrv_query($conn,$sql);
                    $rs2=sqlsrv_fetch_all($result);
                    array_push($rs,$rs2[0]);
                }
                else $rs['status']="fail";
            }            
            else $rs['status']="fail";
        }
        echo json_encode($rs);