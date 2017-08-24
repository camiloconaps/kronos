<?php

include ("../bd_conf/conexion.php");
$idcamp = $_REQUEST[campid];
$idest = $_REQUEST[idest];
$sql = "UPDATE Campanas SET ESTADO =".$idest."  WHERE ID_CAMPANA = ".$idcamp;
echo $sql."<hr>";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
?>


