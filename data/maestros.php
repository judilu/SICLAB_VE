<?php
include '../data/conexion.php';
function solicitudesAceptadas ()
{	
	$maestro	= "'".$_POST["maestro"]."'";
	$respuesta 	= false;
	$renglones	= "";
	$conexion 	= conectaBDSIE();
	$consulta	= sprintf("select * from DALUMN WHERE ALUNOM=%s LIMIT 5",$maestro);
	$res 		= mysql_query($consulta);
	$renglones	.= "<thead>";
	$renglones	.= "<tr>";
	$renglones	.= "<th data-field='materia'>Materia</th>";
	$renglones	.= "<th data-field='nombrePractica'>Nombre de la práctica</th>";
	$renglones	.= "<th data-field='laboratorio'>Laboratorio</th>";
	$renglones	.= "<th data-field='fecha'>Fecha</th>";
	$renglones	.= "<th data-field='hora'>Hora</th>";
	$renglones	.= "<th data-field='accion'>Acción</th>";
	$renglones	.= "</tr>";
	$renglones	.= "</thead>";
	while($row = mysql_fetch_array($res))
	{
		$renglones .= "<tbody>";
		$renglones .= "<tr>";
		$renglones .= "<td>".$row["ALUCTR"]."</td>";
		$renglones .= "<td>".$row["ALUAPP"]."</td>";
		$renglones .= "<td>".$row["ALUAPM"]."</td>";
		$renglones .= "<td>".$row["ALUNOM"]."</td>";
		$renglones .= "<td>".$row["ALUSEX"]."</td>";
		$renglones .= "<td><a class='btn-floating btn-large waves-effect waves-light green darken-2' id='btnPracticaRealizada'><i class='material-icons'>thumb_up</i></a></td>";
		$renglones .= "</tr>";
		$renglones .= "</tbody>";
		$respuesta = true;
	}
	$arrayJSON = array('respuesta' => $respuesta,
		'renglones' => $renglones);
	print json_encode($arrayJSON);
}
function solicitudesPendientes ()
{	
	$maestro	= "'".$_POST["maestro"]."'";
	$respuesta 	= false;
	$renglones	= "";
	$conexion 	= conectaBDSIE();
	$consulta	= sprintf("select * from DALUMN WHERE ALUNOM=%s LIMIT 5",$maestro);
	$res 		= mysql_query($consulta);
	$renglones	.= "<thead>";
	$renglones	.= "<tr>";
	$renglones	.= "<th data-field='materia'>Materia</th>";
	$renglones	.= "<th data-field='nombrePractica'>Nombre de la práctica</th>";
	$renglones	.= "<th data-field='laboratorio'>Laboratorio</th>";
	$renglones	.= "<th data-field='fecha'>Fecha</th>";
	$renglones	.= "<th data-field='hora'>Hora</th>";
	$renglones	.= "<th data-field='acciones'>Acciones</th>";
	$renglones	.= "</tr>";
	$renglones	.= "</thead>";
	$con=1;
	while($row = mysql_fetch_array($res))
	{
		$cont = "'".$con."'";
		$renglones .= "<tr>";
		$renglones .= "<td>".$row["ALUCTR"]."</td>";
		$renglones .= "<td>".$row["ALUAPP"]."</td>";
		$renglones .= "<td>".$row["ALUAPM"]."</td>";
		$renglones .= "<td>".$row["ALUNOM"]."</td>";
		$renglones .= "<td>".$row["ALUSEX"]."</td>";
		$renglones .= "<td><input type='hidden' value='876' /><a class='btn-floating btn-large 
		waves-effect waves-light amber darken-2' id='btnEditarSolicitudLab'>
		<i class='material-icons'>mode_edit</i></a> <a class='btn-floating btn-large 
		waves-effect waves-light red darken-1' id='btnEliminarSolicitudLab'><i class='material-icons'>
		delete</i></a></td>";
		$renglones .= "</tr>";
		$respuesta = true;
		$con = $con+1;
	}
	$arrayJSON = array('respuesta' => $respuesta,
		'renglones' => $renglones);
	print json_encode($arrayJSON);
}
function solicitudesRealizadas ()
{

	$maestro	= "'".$_POST["maestro"]."'";
	$respuesta 	= false;
	$renglones	= "";
	$conexion 	= conectaBDSIE();
	$consulta	= sprintf("select * from DALUMN WHERE ALUNOM=%s LIMIT 5",$maestro);
	$res 		= mysql_query($consulta);
	$renglones	.= "<thead>";
	$renglones	.= "<tr>";
	$renglones	.= "<th data-field='materia'>Materia</th>";
	$renglones	.= "<th data-field='nombrePractica'>Nombre de la práctica</th>";
	$renglones	.= "<th data-field='laboratorio'>Laboratorio</th>";
	$renglones	.= "<th data-field='fecha'>Fecha</th>";
	$renglones	.= "<th data-field='hora'>Hora</th>";
	$renglones	.= "</tr>";
	$renglones	.= "</thead>";
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
		$renglones .= "</tbody>";
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
	case 'solicitudesPendientes1':
	solicitudesPendientes();
	break;
	case 'solicitudesRealizadas1':
	solicitudesRealizadas();
} 
?>