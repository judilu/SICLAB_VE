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
	$usu 		= "'".$_POST["ALUNOM"]."'";
	$cve 		= "'".$_POST["ALUCTR"]."'";
	$conexion 	= conectaBDSIE();
	$qryValida 	= sprintf("select * from DALUMN where ALUNOM=%s and ALUCTR=%s limit 1",$usu,$cve);
	$res		= mysql_query($qryValida);
	if($row = mysql_fetch_array($res))
	{
		$respuesta = true;
	}
	$arrayJSON = array('respuesta' => $respuesta,
						'contenido' => $row);
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