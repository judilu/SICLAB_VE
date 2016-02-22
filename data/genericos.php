<?php
include '../data/conexion.php';
function solicitudesAceptadas ()
{	
	$maestro	= "'".$_POST["maestro"]."'";
	$respuesta 	= false;
	$renglones	= "";
	$conexion 	= conectaBDSIE();
	$consulta	= sprintf("select * from DALUMN WHERE ALUNOM=%s LIMIT 10",$maestro);
	$res 		= mysql_query($consulta);
	$renglones	.= "<thead>";
	$renglones	.= "<tr>";
	$renglones	.= "<th data-field='materia'>Materia</th>";
	$renglones	.= "<th data-field='nombrePractica'>Nombre de la práctica</th>";
	$renglones	.= "<th data-field='laboratorio'>Laboratorio</th>";
	$renglones	.= "<th data-field='fecha'>Fecha</th>";
	$renglones	.= "<th data-field='hora'>Hora</th>";
	$renglones	.= "</tr>";
	$renglones	.= "<thead>";
	while($row = mysql_fetch_array($res))
	{
		$renglones .= "<tbody>";
		$renglones .= "<tr>";
		$renglones .= "<td>".$row["ALUCTR"]."</td>";
		$renglones .= "<td>".$row["ALUAPP"]."</td>";
		$renglones .= "<td>".$row["ALUAPM"]."</td>";
		$renglones .= "<td>".$row["ALUNOM"]."</td>";
		$renglones .= "<td>".$row["ALUSEX"]."</td>";
		$renglones .= "</tr>";
		$renglones .= "<tbody>";
		$respuesta = true;
	}
	$arrayJSON = array('respuesta' => $respuesta,
						'renglones' => $renglones);
	print json_encode($arrayJSON);
}
//Menú principal
$opc = $_POST["opc"];
switch ($opc){
	case 'solicitudesAceptadas1':
	solicitudesAceptadas();
	break;
} 
?>