<?php
require_once('../data/conexion.php');
require_once('../data/funciones.php');
function usuario ()
{
	session_start();
	$_SESSION['nombre'] = GetSQLValueString($_POST['clave1'],"text");
}
function solicitudesAceptadas ()
{
	$respuesta 	= false;
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$periodo	= periodoActual();
		$maestro	= $_SESSION['nombre'];
		$mat 		= "";
		$materias 	= "";
		$con 		= 0;
		$rows		= array();
		$renglones	= "";
		$conexion 	= conectaBDSICLAB();
		$consulta	= sprintf("select c.claveCalendarizacion, s.MATCVE, p.tituloPractica, l.nombreLaboratorio, c.fechaAsignada, c.horaAsignada from lbcalendarizaciones c INNER JOIN lbsolicitudlaboratorios s ON s.claveSolicitud = c.claveSolicitud INNER JOIN lblaboratorios l ON l.claveLaboratorio = s.claveLaboratorio INNER JOIN lbpracticas p on p.clavePractica = s.clavePractica WHERE c.PDOCVE =%s AND s.claveUsuario =%s AND c.estatus = 'NR'",$periodo,$maestro);
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
			$renglones .= "<td><a name = '".$rows[$c]["claveCalendarizacion"]."' class='btn-floating btn-large waves-effect waves-light green darken-2'><i class='material-icons'>thumb_up</i></a></td>";
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
	$respuesta 	= false;
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$periodo	= periodoActual();
		$maestro	= $_SESSION['nombre'];
		$mat   		= "";
		$materias 	= "";
		$con 		= 0;
		$rows 		= array();
		$renglones	= "";
		$conexion 	= conectaBDSICLAB();
		$consulta	= sprintf("select s. claveSolicitud, MATCVE, p.tituloPractica, l.nombreLaboratorio, s.fechaSolicitud, s.horaSolicitud from lbsolicitudlaboratorios s inner join lbpracticas p on s.clavePractica = p.clavePractica inner join lblaboratorios l on s.claveLaboratorio = l.claveLaboratorio left join lbcalendarizaciones c ON c.claveSolicitud = s.claveSolicitud where s.PDOCVE ='%s' and s.claveUsuario =%s and c.claveSolicitud is NULL",$periodo,$maestro);
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
		while($row = mysql_fetch_array($res))
		{
			$mat 		.= "'".($row["MATCVE"])."',";
			$rows[] 	= $row;
			$respuesta 	= true;
			$con++;
		}
		$mat = (rtrim($mat,","));
		$materias = nomMat($mat);
		for($c=0; $c< $con; $c++)
		{
			$renglones .= "<tbody>";
			$renglones .= "<tr>";
			$renglones .= "<td>".$materias[$rows[$c]["MATCVE"]]."</td>";
			$renglones .= "<td>".$rows[$c]["tituloPractica"]."</td>";
			$renglones .= "<td>".$rows[$c]["nombreLaboratorio"]."</td>";
			$renglones .= "<td>".$rows[$c]["fechaSolicitud"]."</td>";
			$renglones .= "<td>".$rows[$c]["horaSolicitud"]."</td>";
			$renglones .= "<td><input type='hidden'/><a class='btnEditarSolicitudLab btn-floating btn-large 
			waves-effect waves-light amber darken-2'>
			<i class='material-icons'>mode_edit</i></a> <a class='btnEliminarSolicitudLab btn-floating btn-large 
			waves-effect waves-light red darken-1'><i class='material-icons'>
			delete</i></a></td>";
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
function comboMat ()
{
	$periodo	= periodoActual();
	$maestro	= $_SESSION['nombre'];
	$respuesta  = false;
	$conexion 	= conectaBDSIE();
	$consulta	= sprintf("SELECT g.MATCVE, m.MATNCO from DGRUPO g inner join DMATER m ON g.MATCVE = m.MATCVE where g.PDOCVE =%s and g.PERCVE =%d",$periodo,$maestro);
	$res 		= mysql_query($consulta);
	if($row = mysql_fetch_array($res))
	{
		$respuesta = true;
		return  $row["nombreLaboratorio"];
	}

}
function solicitudesRealizadas ()
{
	//MODIFICAR
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
		$consulta	= sprintf("select c.claveCalendarizacion, s.MATCVE, p.tituloPractica, l.nombreLaboratorio, c.fechaAsignada, c.horaAsignada from lbcalendarizaciones c INNER JOIN lbsolicitudlaboratorios s ON s.claveSolicitud = c.claveSolicitud INNER JOIN lblaboratorios l ON l.claveLaboratorio = s.claveLaboratorio INNER JOIN lbpracticas p on p.clavePractica = s.clavePractica WHERE c.PDOCVE = '2161' AND s.claveUsuario =%s AND c.estatus = 'R'",$maestro);
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
	case 'comboMat1':
		comboMat();
		break;
} 
?>