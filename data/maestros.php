<?php
function consultaAlu($id_Proceso)
{
	$respuesta = false;
	$conexion = conectaBDSIE();
	$consulta = sprintf("select ALUNOM, ALUCTR from DALUMN where ALUNOM=Judith && ALUNOM=Ana");
  $resconsulta = mysql_query($consulta); //ejecutamos la consulta.
  if ($registro = mysql_fetch_array($resconsulta)) 
  {
  	$respuesta = true;
  }
  return $respuesta;
}
?>