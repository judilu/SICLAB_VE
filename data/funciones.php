<?php
include '../data/conexion.php';
function periodoActual ()
{
	$conexion 		= conectaBDSIE();
	$consulta 		= sprintf("select PARFOL1 FROM DPARAM WHERE PARCVE='PRDO'");
	$res			= mysql_query($consulta);
	if($row = mysql_fetch_array($res))
	{
		$respuesta = true;
		$tipo = $row["tipoUsuario"];
		$usuario = $row["usuario"];
		return $row["PARFOL1"];
	}
}	 
?>