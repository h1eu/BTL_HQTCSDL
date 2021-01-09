<?php
    require_once('../config/config.php');
    $kq['status']="fail";
    if(isset($_SESSION['role']))
    {
        if(isset($_POST['out'])){
                unset($_SESSION['MaTT']);
                unset($_SESSION['username']);
                unset($_SESSION['role']);
                $kq['status']="success";
        }
    }
    echo json_encode($kq);
        

    