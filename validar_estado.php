<?php
require_once("lib/nusoap.php");
$ns="http://localhost/server/";
$server =  new soap_server();
$server->configureWSDL('InteractivoWSserver',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('ConsultaEstado',
array('idchat'=>'xsd:string',),array('return'=>'xsd:string'),$ns);
function ConsultaEstado(
$idchat
){
	$conn=mysqli_connect('localhost','root','AlejaSiza2015','CONTINGENCIA');
	$query = "SELECT ESTADO FROM Campanas WHERE ID_CAMPANA = ".$idchat;
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_assoc($result);
	$taxcalc= $row['ESTADO'];

        return new soapval('return','xsd:string',$taxcalc);
}
if ( !isset( $HTTP_RAW_POST_DATA ) ) $HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
$server->service($HTTP_RAW_POST_DATA);
?>

