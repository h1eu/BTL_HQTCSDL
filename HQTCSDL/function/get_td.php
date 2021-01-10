<?php
    require_once('../config/config.php');
        if(isset($_POST['MaGD'])){
            $ten = array();
            global $conn;
            $MaGD=$_POST['MaGD'];
            /*Lấy tên */
            $sql="select Ten,MaTT from TUYENTHU WHERE MaTT in (Select MATT from BANGDIEM where MaGD='$MaGD')";
            $result=sqlsrv_query($conn,$sql);
            $rs1=sqlsrv_fetch_all($result);
            foreach($rs1 as $data)
            {
                $ten[$data['MaTT']]=$data['Ten'];
            }
            $sql="select * from TRANDAU WHERE MaGD='$MaGD'";
            $result=sqlsrv_query($conn,$sql);
            $rs=array();
            while($row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC)){ 
                $TD['Ten1']=$ten[$row['MaTT1']];
                $TD['Ten2']=$ten[$row['MaTT2']];
                $TD['MaGD']=$row['MaGD'];
                $TD['MaTD']=$row['MaTD'];
                $TD['MaTT1']=$row['MaTT1'];
                $TD['MaTT2']=$row['MaTT2'];
                $TD['TGBD']=$row['TGBD'];
                $TD['Kq']=$row['Kq'];
                array_push($rs,$TD);
            }
        }

        if(isset($_POST['MaTD'])){
            global $conn;
            $MaTD=$_POST['MaTD'];
            $sql="select * from TRANDAU WHERE MaTD='$MaTD'";
            $result=sqlsrv_query($conn,$sql);
            $rs=sqlsrv_fetch_all($result);    
        }

        echo json_encode($rs);

        
        