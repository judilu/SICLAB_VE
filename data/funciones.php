<?php
include '../data/conexion.php';
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
function nomMat (clave)
{
	$claveMat 	= clave;
	$conexion	= conectaBDSIE();
	$consulta	= sprintf("select MATNCO from DMATER where MATCVE =%s",$claveMat);
	$res 		= mysql_query($consulta);
	if($row = mysql_fetch_array($res))
	{
		return  $row["MATNCO"];
	}
}
function nomPractica (clave)
{
	$clavePractica 	= clave;
	$conexion		= conectaBDSICLAB();
	$consulta		= sprintf("select tituloPractica from lbpracticas where clavePractica = %d",$clavePractica);
	$res 			= mysql_query($consulta);
	if($row = mysql_fetch_array($res))
	{
		$respuesta = true;
		return  $row["tituloPractica"];

	}
}
function nomLab (clave)
{
	$claveLab 	= clave;
	$conexion	= conectaBDSICLAB();
	$consulta	= sprintf("select nombreLaboratorio from lblaboratorios where claveLaboratorio =%s",$claveLab);
	$res 		= mysql_query($consulta);
	if($row = mysql_fetch_array($res))
	{
		$respuesta = true;
		return  $row["nombreLaboratorio"];

	}
}	 
?>