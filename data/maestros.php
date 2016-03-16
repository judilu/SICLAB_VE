<?php
require_once('../data/conexion.php');
require_once('../data/funciones.php');
function usuario ()
{
	session_start();
	$_SESSION['nombre'] = $_POST['clave1'];
}
function solicitudesAceptadas ()
{
	$respuesta 	= false;
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$maestro	= $_SESSION['nombre'];
		$mat 		= "";
		$materias 	= "";
		$con 		= 0;
		$rows		= array();
		$renglones	= "";
		$conexion 	= conectaBDSICLAB();
		$consulta	= sprintf("select c.claveCalendarizacion, s.MATCVE, p.tituloPractica, l.nombreLaboratorio, c.fechaAsignada, c.horaAsignada from lbcalendarizaciones c INNER JOIN lbsolicitudlaboratorios s ON s.claveSolicitud = c.claveSolicitud INNER JOIN lblaboratorios l ON l.claveLaboratorio = s.claveLaboratorio INNER JOIN lbpracticas p on p.clavePractica = s.clavePractica WHERE c.PDOCVE = '2161' AND s.claveUsuario =%s AND c.estatus = 'NR'",$maestro);
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
			$mat 	.= "'".($row["MATCVE"])."',";
			$rows[]=$row;
			$respuesta = true;
			$con++;
		}
		$mat = (rtrim($mat,","));
		$materias = nomMat($mat);
		for($c= 0; $c< $con; $c++)
		{
			$renglones .= "<tbody>";
			$renglones .= "<tr>";
			$renglones .= "<td>".$materias[$rows[$c]["MATCVE"]]."</td>";
			$renglones .= "<td>".$rows[$c]["tituloPractica"]."</td>";
			$renglones .= "<td>".$rows[$c]["nombreLaboratorio"]."</td>";
			$renglones .= "<td>".$rows[$c]["fechaAsignada"]."</td>";
			$renglones .= "<td>".$rows[$c]["horaAsignada"]."</td>";
			$renglones .= "<td><a name = '".$rows[$c]["claveCalendarizacion"]."' class='btn-floating btn-large waves-effect waves-light green darken-2' id='btnPracticaRealizada'><i class='material-icons'>thumb_up</i></a></td>";
			$renglones .= "</tr>";
			$renglones .= "</tbody>";
			$respuesta = true;
		}
	}
	else
	{
		salir();
	}
	$arrayJSON = array('respuesta' => $respuesta,
		'renglones' => $renglones);
	print json_encode($arrayJSON);
}
function liberarPractica ()
{
	$claveCal 		= GetSQLValueString($_POST["clave"],"text");
	if(existeSol($claveCal))
	{
		$respuesta 		= false;
		$conexion 		= conectaBDSICLAB();
		$consulta  		= sprintf("update lbcalendarizaciones set estatus = 'R' where claveCalendarizacion =%s",$claveCal);
		$res 	 		=  mysql_query($consulta);
		if($res)
		{	
			$respuesta = true;
		}
		$arrayJSON = array('respuesta' => $respuesta);
		print json_encode($arrayJSON);
	}
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
	case 'usuario1':
	usuario();
	break;
	case 'solicitudesAceptadas1':
	solicitudesAceptadas();
	break;
	case 'liberarPractica1':
		liberarPractica();
		break;
	case 'solicitudesPendientes1':
	solicitudesPendientes();
	break;
	case 'solicitudesRealizadas1':
	solicitudesRealizadas();
} 
?>