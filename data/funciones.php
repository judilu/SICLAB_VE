<?php
require_once('../data/conexion.php');
function salir()
{
	session_start();
	session_destroy();
	$respuesta = true;
	$arrayJSON = array('respuesta' => $respuesta);
	print json_encode($arrayJSON);
}
function periodoActual ()
{
	$conexion 		= conectaBDSIE();
	$consulta 		= sprintf("select PARFOL1 FROM DPARAM WHERE PARCVE='PRDO'");
	$res			= mysql_query($consulta);
	if($row = mysql_fetch_array($res))
	{
		return $row["PARFOL1"];
	}
}
function nomMat ($claves)
{
	$claveMat 	= $claves;
	$materias	= array();
	$conexion	= conectaBDSIE();
	$consulta	= sprintf("select MATCVE, MATNCO from DMATER where MATCVE IN (%s)",$claveMat);
	$res 		= mysql_query($consulta);
		while($row = mysql_fetch_array($res))
		{
			$materias[$row["MATCVE"]] =$row["MATNCO"];
		}
	return $materias;
}
function nomPractica ($clave)
{
	$clavePractica 	= $clave;
	$conexion		= conectaBDSICLAB();
	$consulta		= sprintf("select tituloPractica from lbpracticas where clavePractica = %d",$clavePractica);
	$res 			= mysql_query($consulta);
	if($row = mysql_fetch_array($res))
	{
		$respuesta = true;
		return  $row["tituloPractica"];

	}
}
function nomLab ($clave)
{
	$claveLab 	= $clave;
	$conexion	= conectaBDSICLAB();
	$consulta	= sprintf("select nombreLaboratorio from lblaboratorios where claveLaboratorio =%s",$claveLab);
	$res 		= mysql_query($consulta);
	if($row = mysql_fetch_array($res))
	{
		$respuesta = true;
		return  $row["nombreLaboratorio"];
	}
}
function existeSol ($clave)
{
	$claveSol	= $clave;
	$conexion 	= conectaBDSICLAB();
	$consulta 	= sprintf("select claveCalendarizacion from lbcalendarizaciones where claveCalendarizacion =%s",$claveSol);
	$res 		= mysql_query($consulta); 
	if($row = mysql_fetch_array($res))
	{
		return true;
	}
	return false;
}
$opc = $_POST["opc"];
switch ($opc){
	case 'salir1':
	salir();
	break;
}	 
?>