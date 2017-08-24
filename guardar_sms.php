<?php

foreach ($_GET as $key => $value){
        $post= "key=".$key."value=".$value;

}

//print_r($_POST);
$text="";


echo "<hr>".$post."<hr>";

include ("bd_conf/conexionSMS.php");
/*$idcamp = $_REQUEST[campid];
$idest = $_REQUEST[idest];
$iduser = $_REQUEST[iduser];*/

	switch($_GET[alerta]){
		case "Reinicio":
		 $text="Alerta ".$_GET[alerta]." ".$_GET[nodo];
		 break;
		case "Down":
		 $text="Servidor Abajo";
		 break;
		}
	$sql_insert = "INSERT INTO SMS_PRUEBAS (DESC_SMS) values ('<ALERTA=$_GET[alerta]><DATE=$_GET[date]><NODO=$_GET[nodo]><STATUS=$_GET[status]>$text')";
	if ($conn->query($sql_insert) === TRUE) {
		echo " insert";
	}else{
		echo " no inserto";
	}

?>


