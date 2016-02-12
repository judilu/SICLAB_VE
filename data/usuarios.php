<?php
/*function conectaBDSIE()
{
	//Servidor, Usuario, Contraseña
	$conexion = mysql_connect('itculiacan.edu.mx', 'sieapibduser', 'B5fa4x_7*.*');
	//Seleccionamos la BD
	mysql_select_db('sieapibd');
	return $conexion;
}*/
include '../data/conexion.php';
function validaUsuario()
{
	$respuesta	= false;
	$usu 		= GetSQLValueString($_POST["usuario"],"text");
	$cve 		= GetSQLValueString(md5($_POST["cveUsuario"]),"text");
	$tipo		= "0";
	$conexion 	= conectaBDSICLAB();
	$qryValida 	= sprintf("select * from lbusuarios where usuario=%s and cveUsuario=%s limit 1",$usu,$cve);
	$res		= mysql_query($qryValida);
	if($row = mysql_fetch_array($res))
	{
		$respuesta = true;
		$tipo = $row["tipoUsuario"];
	}
	$arrayJSON = array('respuesta' => $respuesta,
						'tipo' => $tipo);
	print json_encode($arrayJSON);
}
//Menú principal
$opc = $_POST["opc"];
switch ($opc){
	case 'validaUsuario':
	validaUsuario();
	break;
} 
?>