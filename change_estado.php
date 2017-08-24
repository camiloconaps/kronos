<?php
include ("val_session.php");
include ("bd_conf/conexion.php");
$idcamp = $_REQUEST[campid];
$idest = $_REQUEST[idest];
$iduser = $_REQUEST[iduser];
$iduser = 0;
	$sql = "UPDATE Campanas SET ESTADO =".$idest."  WHERE ID_CAMPANA = ".$idcamp;
	if ($conn->query($sql) === TRUE) {
	echo "update";
	}else{
	echo "no update";
	}
	$sql_insert = "INSERT INTO Logs (CAMP_ID,USER_ID,ESTADO_ID) values ('".$idcamp."','".$iduser."','".$idest."')";
	if ($conn->query($sql_insert) === TRUE) {
		echo " insert";
	}else{
		echo " no insert"."INSERT INTO Logs (CAMP_ID,USER_ID,ESTADO_ID) values ('".$idcamp."','".$iduser."','".$idest."')";
	}

?>


