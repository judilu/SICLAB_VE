<?php
require_once('../data/conexion.php');
//require_once('../data/funciones.php');
function usuario ()
{
	session_start();
	$_SESSION['nombre'] = GetSQLValueString($_POST['clave1'],"text");
}
function existeSol ($clave)
	{
		$claveSol	= $clave;
		$conexion 	= conectaBDSICLAB();
		$consulta 	= sprintf("select claveCalendarizacion from lbcalendarizaciones 
			where claveCalendarizacion =%s",$claveSol);
		$res 		= mysql_query($consulta); 
		if($row = mysql_fetch_array($res))
		{
			return true;
		}
		return false;
	}
function existeSolLab ($clave)
	{
		$claveSol	= $clave;
		$conexion 	= conectaBDSICLAB();
		$consulta 	= sprintf("select claveSolicitud from lbsolicitudlaboratorios 
			where claveSolicitud =%s",$claveSol);
		$res 		= mysql_query($consulta); 
		if($row = mysql_fetch_array($res))
		{
			return true;
		}
		return false;
	}
//pendiente de terminar
function pendientesLaboratorio()
{
	$respuesta 	= false;
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$maestro	= $_SESSION['nombre'];
		$con 		= 0;
		$rows		= array();
		$renglones	= "";
		$solPendientesLab ="";
		$conexion 	= conectaBDSICLAB();
		$consulta	= sprintf("select s.claveSolicitud,s.GPOCVE,p.tituloPractica,s.fechaSolicitud,s.horaSolicitud from lbusuarios as u INNER JOIN lbsolicitudlaboratorios as s ON u.claveUsuario =s.claveUsuario INNER JOIN lbpracticas as p ON p.clavePractica = s.clavePractica");
		$res 		= mysql_query($consulta);
		$renglones	.= "<thead>";
		$renglones	.= "<tr>";
		$renglones	.= "<th data-field='maestro'>Maestro</th>";
		$renglones	.= "<th data-field='materia'>Materia</th>";
		$renglones	.= "<th data-field='nombrePractica'>Nombre de la práctica</th>";
		$renglones	.= "<th data-field='fecha'>Fecha</th>";
		$renglones	.= "<th data-field='hora'>Hora</th>";
		$renglones	.= "<th data-field='accion'>Acción</th>";
		$renglones	.= "</tr>";
		$renglones	.= "</thead>";
		
		while($row = mysql_fetch_array($res))
		{
			$solPendientesLab .="'".($row["claveSolicitud"])."',";
			$rows[]=$row;
			$respuesta = true;
			$con++;
		}
		$solPendientesLab = (rtrim($solPendientesLab,","));
		for($c= 0; $c< $con; $c++)
		{
			$renglones .= "<tbody>";
			$renglones .= "<tr>";
			$renglones .= "<td>".$rows[$c]["claveSolicitud"]."</td>";
			$renglones .= "<td>".$rows[$c]["GPOCVE"]."</td>";
			$renglones .= "<td>".$rows[$c]["tituloPractica"]."</td>";
			$renglones .= "<td>".$rows[$c]["fechaSolicitud"]."</td>";
			$renglones .= "<td>".$rows[$c]["horaSolicitud"]."</td>";
			$renglones .= "<td><a name = '".$rows[$c]["claveSolicitud"]."' class='btn-floating btn-large waves-effect  green darken-2' type='button' id='btnCalendarizado'><i class='material-icons'>done</i></a></td>";
			$renglones .= "<td><a name = '".$rows[$c]["claveSolicitud"]."' class='btn-floating btn-large waves-effect amber darken-2' id='btnVerMas'><i class='material-icons'>add</i></a></td>";
			$renglones .= "<td><a name = '".$rows[$c]["claveSolicitud"]."' class='btn-floating btn-large waves-effect red darken-1' id='btnEliminarSolLab'><i class='material-icons'>delete</i></a></td>";
			$renglones .= "</tr>";
			$renglones .= "</tbody>";
			$respuesta = true;
		}
	}
	else
	{
		//salir();
	}
	$arrayJSON = array('respuesta' => $respuesta,
		'renglones' => $renglones);
	print json_encode($arrayJSON);
}
//ver mas y ver mas dos falta regresar los datos de las consultas a las pantallas
function verMas()
{
	$clave 		= GetSQLValueString($_POST["clave"],"text");
	$respuesta 		= false;
	$renglones		="";
	$fechaSolicitud	="";
	$horaSolicitud	="";
	$con 			="";
	$grupo			="";
	$nombrePractica ="";
	$nombreArticulo ="";
	$cantidad 		="";
	$rows		= array();
	$conexion 		= conectaBDSICLAB();

	if(existeSolLab($clave))
	{
		$consulta  		= sprintf("select a.fechaSolicitud,a.horaSolicitud,a.GPOCVE,c.tituloPractica, b.nombreArticulo, d.cantidad 
			from lbarticuloscat as b INNER JOIN lbasignaarticulospracticas as d ON b.claveArticulo=d.claveArticulo
		 INNER JOIN lbsolicitudlaboratorios as a ON d.claveSolicitud=a.claveSolicitud 
		 INNER JOIN lbpracticas as c ON a.clavePractica=c.clavePractica
			where a.claveSolicitud =%s",$clave);
		$renglones	.= "<thead>";
		$renglones	.= "<tr>";
		$renglones	.= "<th data-field='nombreArt'>Nombre del artículo</th>";
		$renglones	.= "<th data-field='cantidad'>Cantidad</th>";
		$renglones	.= "</tr>";
		$renglones	.= "</thead>";
		$res 	 	=  mysql_query($consulta);

		while($row = mysql_fetch_array($res))
		{	
			$respuesta = true;
			$fechaSolicitud = $row["fechaSolicitud"];
			$horaSolicitud = $row["horaSolicitud"];
			$grupo = $row["GPOCVE"];
			$nombrePractica = $row["tituloPractica"];
			$rows[]=$row;
			$con++;
			
		}
		for($c= 0; $c< $con; $c++)
		{
			$renglones .= "<tbody>";
			$renglones .= "<tr>";
			$renglones .= "<td>".$rows[$c]["nombreArticulo"]."</td>";
			$renglones .= "<td>".$rows[$c]["cantidad"]."</td>";
			$renglones .= "</tr>";
			$renglones .= "</tbody>";
			$respuesta = true;
		}
		
	}
	$arrayJSON = array('respuesta' => $respuesta, 'fecha' =>$fechaSolicitud, 'hora' => $horaSolicitud,'maestro' => $grupo, 'practica' => $nombrePractica, 'renglones' => $renglones);
		print json_encode($arrayJSON);

}
function verMas2()
{
	$claveCal 		= GetSQLValueString($_POST["clave"],"text");
	if(existeSol($claveCal))
	{
		$respuesta 		= false;
		$conexion 		= conectaBDSICLAB();
		$consulta  		= sprintf("select a.fechaSolicitud,a.horaSolicitud,a.GPOCVE,c.tituloPractica, b.nombreArticulo, d.cantidad 
			from lbarticuloscat as b INNER JOIN lbasignaarticulospracticas as d ON bclaveArticulo=d.claveArticulo
		 INNER JOIN lbpracticas as c ON d.clavePractica=c.clavePractica
		 INNER JOIN lbsolicitudlaboratorios as a ON c.claveSolicitud=a.claveSolicitud 
		 INNER JOIN lbcalendarizadas as e ON a.claveSolicitud=e.claveSolicitud
			where e.claveCalendarizacion =%s",$claveCal);
		$res 	 		=  mysql_query($consulta);
		if($res)
		{	
			$respuesta = true;
		}
		$arrayJSON = array('respuesta' => $respuesta);
		print json_encode($arrayJSON);
	}
}
//adecuar query para la tabla lbcalendarizaciones
function aceptadasLaboratorio()
{
		$respuesta 	= true;
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$maestro	= $_SESSION['nombre'];
		$con 		= 0;
		$rows		= array();
		$renglones	= "";
		$solPendientesLab ="";
		$conexion 	= conectaBDSICLAB();
		$consulta	= sprintf("select s.claveSolicitud,s.GPOCVE,p.tituloPractica,s.fechaSolicitud,s.horaSolicitud from lbusuarios as u INNER JOIN lbsolicitudlaboratorios as s ON u.claveUsuario =s.claveUsuario INNER JOIN lbpracticas as p ON p.clavePractica = s.clavePractica");
		$res 		= mysql_query($consulta);
		$renglones	.= "<thead>";
		$renglones	.= "<tr>";
		$renglones	.= "<th data-field='maestro'>Maestro</th>";
		$renglones	.= "<th data-field='materia'>Materia</th>";
		$renglones	.= "<th data-field='nombrePractica'>Nombre de la práctica</th>";
		$renglones	.= "<th data-field='fecha'>Fecha</th>";
		$renglones	.= "<th data-field='hora'>Hora</th>";
		$renglones	.= "<th data-field='accion'>Acción</th>";
		$renglones	.= "</tr>";
		$renglones	.= "</thead>";
		
		while($row = mysql_fetch_array($res))
		{
			$solPendientesLab .="'".($row["claveSolicitud"])."',";
			$rows[]=$row;
			$respuesta = true;
			$con++;
		}
		$solPendientesLab = (rtrim($solPendientesLab,","));
		for($c= 0; $c< $con; $c++)
		{
			$renglones .= "<tbody>";
			$renglones .= "<tr>";
			$renglones .= "<td>".$rows[$c]["claveSolicitud"]."</td>";
			$renglones .= "<td>".$rows[$c]["GPOCVE"]."</td>";
			$renglones .= "<td>".$rows[$c]["tituloPractica"]."</td>";
			$renglones .= "<td>".$rows[$c]["fechaSolicitud"]."</td>";
			$renglones .= "<td>".$rows[$c]["horaSolicitud"]."</td>";
			$renglones .= "<td><a name = '".$rows[$c]["claveSolicitud"]."' class='btn-floating btn-large waves-effect amber darken-2' id='btnVerMas2'><i class='material-icons'>add</i></a></td>";
			$renglones .= "</tr>";
			$renglones .= "</tbody>";
			$respuesta = true;
		}
	}
	else
	{
		//salir();
	}
	$arrayJSON = array('respuesta' => $respuesta,
		'renglones' => $renglones);
	print json_encode($arrayJSON);
}

function listaArticulos()
{
	$respuesta 	= false;
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$responsable= $_SESSION['nombre'];
		$art 		= "";
		$articulos 	= "";
		$con 		= 0;
		$rows		= array();
		$renglones	= "";
		$conexion 	= conectaBDSICLAB();
		$consulta	= sprintf("select A.claveArticulo,B.nombreArticulo, C.cantidad from lbarticulos as A inner join lbarticuloscat as B ON A.claveArticulo=B.claveArticulo
			inner join lbinventarios as C ON B.claveArticulo=C.claveArticulo where A.estatus='V'",$responsable);
		$res 		= mysql_query($consulta);
		$renglones	.= "<thead>";
		$renglones	.= "<tr>";
		$renglones	.= "<th data-field='codigo'>Código</th>";
		$renglones	.= "<th data-field='nombreArticulo'>Nombre del artículo</th>";
		$renglones	.= "<th data-field='cantidad'>Cantidad</th>";
		$renglones	.= "</tr>";
		$renglones	.= "</thead>";
		while($row = mysql_fetch_array($res))
		{
			$art 	.= "'".($row["claveArticulo"])."',";
			$rows[]=$row;
			$respuesta = true;
			$con++;
		}
		$art = (rtrim($art,","));
		for($c= 0; $c< $con; $c++)
		{
			$renglones .= "<tbody>";
			$renglones .= "<tr>";
			$renglones .= "<td>".$rows[$c]["claveArticulo"]."</td>";
			$renglones .= "<td>".$rows[$c]["nombreArticulo"]."</td>";
			$renglones .= "<td>".$rows[$c]["cantidad"]."</td>";
			$renglones .= "</tr>";
			$renglones .= "</tbody>";
			$respuesta = true;
		}
	}
	else
	{
		//salir();
	}
	$arrayJSON = array('respuesta' => $respuesta,
		'renglones' => $renglones);
	print json_encode($arrayJSON);
}
function altaInventario1 ()
{
	//$cveUsuario		= GetSQLValueString($_POST[""],"text");
	$conexion					= conectaBDSICLAB();
	$imagen						= GetSQLValueString($_POST["imagen"],"text");
	$identificadorArticulo 		= GetSQLValueString($_POST["identificadorArticulo"],"text");
	$modelo						= GetSQLValueString($_POST["modelo"],"text");
	$numeroSerie				= GetSQLValueString($_POST["numeroSerie"],"text");
	$marca						= GetSQLValueString($_POST["marca"],"text");
	$tipoContenedor				= GetSQLValueString($_POST["tipoContenedor"],"text");
	$descripcionArticulo		= GetSQLValueString($_POST["descripcionArticulo"],"text");
	$descripcionUso				= GetSQLValueString($_POST["descripcionUso"],"text");
	$unidadMedida				= GetSQLValueString($_POST["unidadMedida"],"text");
	$fechaCaducidad				= GetSQLValueString($_POST["fechaCaducidad"],"text");
	$claveKit					= GetSQLValueString($_POST["claveKit"],"text");
	$ubicacionAsignada			= GetSQLValueString($_POST["ubicacionAsignada"],"text");
	$claveArticulo 				= GetSQLValueString($_POST["claveArticulo"],"text");	
	//$claveArticulo = claveArt(nombreArt);
	$estatus 					= GetSQLValueString($_POST["estatus"],"text");
	$respuesta 					= false;
	//insert a tabla lbarticulos
	$consulta= sprintf("insert into lbarticulos values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)",
		$claveArticulo,$descripcionUso,$descripcionArticulo,$numeroSerie,$marca,$modelo,$estatus,$unidadMedida,$fechaCaducidad,$tipoContenedor,$imagen,$identificadorArticulo,$ubicacionAsignada,$claveKit);
	$resconsulta = mysql_query($consulta);
	if(mysql_affected_rows()>0)
		$respuesta = true; 
	
	$salidaJSON = array('respuesta' => $respuesta);
	print json_encode($salidaJSON);
	
}
function buscaArticulo()
{
	$respuesta 	= "";
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$responsable= $_SESSION['nombre'];
		$identificadorArticulo= GetSQLValueString($_POST["identificadorArticulo"],"text");
		$rows			= array();
		$modelo			= "";
		$numeroSerie	= "";
		$nombreArticulo	= "";
		$marca			= "";
		$fechaCaducidad	= "";
		$descripcionArticulo	= "";
		$descripcionUso	= "";
		$unidadMedida	= "";
		$tipoContenedor	= "";
		$conexion 	= conectaBDSICLAB();
		$consulta	= sprintf("select A.modelo,A.numeroSerie,B.nombreArticulo,A.marca,A.fechaCaducidad,
			A.descripcionArticulo,A.descripcionUso,A.unidadMedida, A.tipoContenedor
			from lbarticulos as A inner join lbarticuloscat as B on A.claveArticulo=B.claveArticulo
			where A.estatus='V' and A.identificadorArticulo=%s",$identificadorArticulo,$responsable);
		$res 		= mysql_query($consulta);
		
		while($row = mysql_fetch_array($res))
		{
			$respuesta = true;
			$modelo			= $row["modelo"];
			$numeroSerie 	= $row["numeroSerie"];
			$nombreArticulo	= $row["nombreArticulo"];
			$marca		 	= $row["marca"];
			$fechaCaducidad	= $row["fechaCaducidad"];
			$descripcionArticulo	= $row["descripcionArticulo"];
			$descripcionUso	= $row["descripcionUso"];
			$unidadMedida	= $row["unidadMedida"];
			$tipoContenedor	= $row["tipoContenedor"];
		}
	}
	$salidaJSON = array('respuesta' => $respuesta,
		'modelo' => $modelo, 'numeroSerie' => $numeroSerie, 'nombreArticulo' => $nombreArticulo,
		'marca' => $marca, 'fechaCaducidad' => $fechaCaducidad, 'descripcionArticulo' => $descripcionArticulo,
		'descripcionUso' => $descripcionUso, 'unidadMedida' => $unidadMedida, 'tipoContenedor' => $tipoContenedor);
	print json_encode($salidaJSON);
}
function bajaArticulos()
{
	$respuesta = "";
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$responsable= $_SESSION['nombre'];
		$identificadorArticulo	= GetSQLValueString($_POST["identificadorArticulo"],"int");
		$estatus				= GetSQLValueString($_POST["estatus"],"text");
		$observaciones			= GetSQLValueString($_POST["observaciones"],"text");
		$conexion 	= conectaBDSICLAB();
		$consulta1	= sprintf("update lbarticulos set estatus='B' where identificadorArticulo=%d",$identificadorArticulo,$responsable);
		$res = mysql_query($consulta1);
		if(mysql_affected_rows()>0)
			$respuesta = true;
		
		/*else if ($estatus == 'MR') 
		{
			$consulta2	= sprintf("update lbmovimientosarticulos set estatus='MR' where identificadorArticulo=%d",$identificadorArticulo,$responsable);
			$res 		= mysql_query($consulta2);
			if(mysql_affected_rows()>0)
			$respuesta = true;
		} */
	}
	$salidaJSON = array('respuesta' => $respuesta);
	print json_encode($salidaJSON);
}
function mantenimientoArticulos()
{
	$respuesta = false;
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$responsable 			= $_SESSION['nombre'];
		$resp 					= GetSQLValueString($_POST["respons"],"text");
		$periodo				= GetSQLValueString($_POST["periodo"],"text");
		$estatus				= GetSQLValueString($_POST["estatus"],"text");
		$claveMovimiento		= GetSQLValueString($_POST["claveMovimiento"],"text");
		$claveLab				= GetSQLValueString($_POST["claveLab"],"text");
		$identificadorArticulo	= GetSQLValueString($_POST["identificadorArticulo"],"int");
		$observaciones			= GetSQLValueString($_POST["observaciones"],"text");
		$fechaMovimiento		= GetSQLValueString($_POST["fechaMovimiento"],"text");
		$horaMovimiento			= GetSQLValueString($_POST["horaMovimiento"],"text");
		$conexion 	= conectaBDSICLAB();

		$consulta 	= sprintf("insert into lbmovimientosarticulos values(%s,%s,%s,%s,%s,%s,%s,%s,%s)",
						$periodo,$fechaMovimiento,$horaMovimiento,$resp,$identificadorArticulo,$observaciones,
						$estatus,$claveMovimiento,$claveLab);
		//$consulta1	= sprintf("update lbmovimientosarticulos set estatus='M', where identificadorArticulo=%d",$identificadorArticulo,$responsable);
		$res = mysql_query($consulta);
		if(mysql_affected_rows()>0)
			$respuesta = true;
	}
	$salidaJSON = array('respuesta' => $respuesta);
	print json_encode($salidaJSON);
}
function buscaArticuloMtto()
{
	$respuesta 	= "";
	session_start();
	if(!empty($_SESSION['nombre']))
	{ 
		$responsable= $_SESSION['nombre'];
		$identificadorArticulo= GetSQLValueString($_POST["identificadorArticulo"],"text");
		$modelo			= "";
		$numeroSerie	= "";
		$nombreArticulo	= "";
		$marca			= "";
		$fechaCaducidad	= "";
		$conexion 	= conectaBDSICLAB();
		$consulta	= sprintf("select A.modelo,A.numeroSerie,B.nombreArticulo,A.marca,A.fechaCaducidad
			from lbarticulos as A inner join lbarticuloscat as B on A.claveArticulo=B.claveArticulo
			where A.estatus='V' and A.identificadorArticulo=%s",$identificadorArticulo,$responsable);
		$res 		= mysql_query($consulta);
		while($row = mysql_fetch_array($res))
		{
			$respuesta = true;
			$modelo			= $row["modelo"];
			$numeroSerie 	= $row["numeroSerie"];
			$nombreArticulo	= $row["nombreArticulo"];
			$marca		 	= $row["marca"];
			$fechaCaducidad	= $row["fechaCaducidad"];
		}
	}
	$salidaJSON = array('respuesta' => $respuesta
		,'modelo' => $modelo, 'numeroSerie' => $numeroSerie, 'nombreArticulo' => $nombreArticulo,
		'marca' => $marca, 'fechaCaducidad' => $fechaCaducidad
		);
	print json_encode($salidaJSON);
}
//Menú principal
$opc = $_POST["opc"];
switch ($opc){
	case 'altaInventario1':
	altaInventario1();
	break;
	case 'listaArticulos1':
	listaArticulos();
	break;
	case 'usuario1':
	usuario();
	break;
	case 'bajaArticulos1':
	bajaArticulos();
	break;
	case 'buscaArticulos1':
	buscaArticulo();
	break;
	case 'mantenimientoArticulos1':
	mantenimientoArticulos();
	break;
	case 'buscaArticulos2':
	buscaArticuloMtto();
	break;
	case 'pendientesLab1':
	pendientesLaboratorio();
	break;
	case 'aceptadasLab1':
	aceptadasLaboratorio();
	break;
	case 'verMasLab1':
	verMas();
	break;
	case 'verMasLab2':
	verMas2();
	break;
} 
?>