<?php
session_start();
$inactivo=300;
if(isset($_SESSION['APOLO_TIME'])){
	echo time()."<br>";
	echo $_SESSION['APOLO_TIME']."<br>";
	$vida_session=time() - $_SESSION['APOLO_TIME'];
	echo "<hr>".$vida_session;
	echo "if(".$vida_session." >= ".$inactivo."){";
	if($vida_session >= $inactivo){
	echo "123";
		session_destroy();
		header("location:index.php");
	}
	$_SESSION['APOLO_TIME']=time();
}
?>
