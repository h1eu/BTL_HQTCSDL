<?php
session_start();
$serverName = "DESKTOP-J81PQ6L";
// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"QLGD","CharacterSet" => "UTF-8");

$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn ) {
    
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

function sqlsrv_fetch_all($result){
     $rs=array();
     while($row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC )){ 
          array_push($rs,$row);
     }
     // if(count($rs)==0) return false;
     return $rs;
}


function notNull($data)
{    

     if(is_array($data))
     {
          foreach($data as $dat)
          if($dat=='') return false;
     }
     else
          if($data=='') return false;
     return true;
}
?>

