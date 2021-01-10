<?php
    require_once('./config/config.php');
    $kq['status']="fail";
    if(!isset($_SESSION['role']))
    {
        if(isset($_POST['username'])&&notNull($_POST)){
            global $conn;
            $usname=$_POST['username'];
            $pass=$_POST['password'];
            $email=$_POST['email'];
            $name=$_POST['name'];
            $elo=$_POST['elo'];
            $birthday=$_POST['birthday'];
            $ctry=$_POST['ctry'];

            $sql="INSERT INTO TUYENTHU
            (
                Ten,
                NgaySinh,
                HeSo,
                QuocGia,
                username,
                pass,
                email
            )
            VALUES
            (   N'$name',
                '$birthday',
                '$elo',
                N'$ctry',
                '$usname',
                '$pass',
                '$email'
            )";
            if(sqlsrv_query($conn,$sql))
            $kq['status']="success";
        }
    }
    echo json_encode($kq);

    