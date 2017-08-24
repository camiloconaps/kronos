<?php 
session_start();
include ("bd_conf/conexion.php");
$a1= $_POST['caso'];
$a2= $_POST['mod'];
$decode_a1 = base64_decode($a1);
$decode_a2 = base64_decode($a2);
$sql = " SELECT * FROM Usuarios WHERE USER ='".$decode_a1."' AND PASS='".$decode_a2."' AND ESTADO=0 ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($line = $result->fetch_assoc()) {
		$_SESSION['APOLO_IDUSER']=$line['ID_USER'];;
		$_SESSION['APOLO_NAME']=$line['NOMBRE'];;
		$_SESSION['APOLO_ROL']=$line['ROL'];;
		$_SESSION['APOLO_TIME']=time();
	echo $line['NOMBRE'];
	}
}else{
	echo "Error";
}
?>
