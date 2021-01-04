<?php
    require_once('./config/config.php');
    if(!isset($_SESSION['role']))
    {
        $kq['log']=false;
        if(isset($_POST['username'])){
            global $conn;
            $usname=$_POST['username'];
            $pass=$_POST['password'];
            $sql="select * from ACCOUNT where username='$usname' AND pass='$pass'";
            $result=sqlsrv_query($conn,$sql);
            $rs=sqlsrv_fetch_all($result);
            if(count($rs)!=0){
                $_SESSION['username']=$rs[0]['username'];
                $_SESSION['gold']=$rs[0]['gold'];
                $_SESSION['role']=$rs[0]['role'];
                $kq['log']=true;
            }           
        }
        echo json_encode($kq);
    }

    