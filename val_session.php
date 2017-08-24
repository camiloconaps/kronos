<?php
session_start();
$inactivo=300;
if($_SESSION['APOLO_TIME'] == ""){
                session_destroy();
                header("location:close.php");
}
if(isset($_SESSION['APOLO_TIME'])){
        $vida_session=time() - $_SESSION['APOLO_TIME'];
        if($vida_session >= $inactivo){
                session_destroy();
                header("location:close.php");
        }
        $_SESSION['APOLO_TIME']=time();
}
include ("bd_conf/conexion.php");
?>

